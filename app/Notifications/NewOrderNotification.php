<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Filament\Notifications\Notification as FilamentNotification;
use Filament\Actions\Action;



class NewOrderNotification extends Notification
{
    use Queueable;

    public function __construct(public $order)
    {
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['database'];
    }

    public function toDatabase($notifiable)
    {
        // FilamentNotification::make()
        //     ->title('new order created')
        //     ->body('A new order with order number ' . $this->order->id)
        //     ->icon('heroicon-o-shopping-cart')
        //     ->color('success')
        //     ->actions([
        //         Action::make('View')
        //         ->url(route('filament.admin.resources.orders.edit', $this->order)),
        //     ])
        //     ->sendToDatabase($notifiable);
        return [
            'title'    => 'New Order Created',
            'message' => 'A new order with order number ' . $this->order->order_number,
            'order_id' => $this->order->order_number,
        ];
    }

    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->line('The introduction to the notification.')
            ->action('Notification Action', url('/'))
            ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
