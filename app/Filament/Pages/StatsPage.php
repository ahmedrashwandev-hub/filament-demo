<?php

namespace App\Filament\Pages;

use BackedEnum;
use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use App\Models\Category;
use Filament\Pages\Page;
use Filament\Notifications\Notification;

class StatsPage extends Page
{
    protected static ?string $navigationLabel = 'Stats'; // name page
    protected static ?int $navigationSort = 2; // order in navigation
    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-chart-pie';

    public $totalOrders;
    public $totalCategories;
    public $totalProducts;
    public $totalUsers;


    public function mount(): void
    {
        $this->totalOrders = Order::count();
        $this->totalCategories = Category::count();
        $this->totalProducts = Product::count();
        $this->totalUsers = User::count();


        Notification::make()
        ->title('Notification Done Successfully')
        ->body(' First Notification in Filament')
        ->success()
        ->send();
    }

    protected string $view = 'filament.pages.stats-page';
}
