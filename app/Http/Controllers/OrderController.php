<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\User;
use App\Notifications\NewOrderNotification;
use Filament\Notifications\Notification as FilamentNotification;
use Filament\Actions\Action;

class OrderController extends Controller
{
    public function store(Request $request)
    {
        $order = Order::create([
            'order_number' => $request->order_number,
            'user_id'      => $request->user_id,
            'status'       => $request->status,
            'total_amount' => $request->total_amount,
            'active'       => $request->active ?? true,
        ]);

        $admins = User::where('role', 'admin')->get();

        foreach ($admins as $admin) {
            $admin->notify(new NewOrderNotification($order));

            FilamentNotification::make()
                ->title('New Order Created')
                ->body('A new order with order number ' . $order->order_number)
                ->icon('heroicon-o-shopping-cart')
                ->color('success')
                ->actions([
                    Action::make('View')
                        ->url(route('filament.admin.resources.orders.edit', $order)),
                ])
                ->sendToDatabase($admin);
        }
    }
}
