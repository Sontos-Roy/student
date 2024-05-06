<?php

namespace App\Notifications;

use DateTime;
use DateTimeZone;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class PaymentNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public $message;
    public $for;
    public $type;
    public $from;
    public function __construct($data = null)
    {
        
        $this->message = $data['message'] ?? 'You Have New Payment Notification';
        $this->type = $data['type'] ?? 'Payment';
        $this->for = $data['for'] ?? 'Payment';
        $this->from = $data['from'] ?? 'PSTU';
    }
    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable)
    {
        return ['database'];
    }
    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!');
    }
    // public function broadcastOn()
	// {
	// 	return ['notifications'];
	// }
    public function toDatabase($notifiable)
    {
        return [
            'message' => $this->message,
            'type' => $this->type,
            'for' => $this->for,
            'from' => $this->from,
        ];
    }
    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            'message' => 'You have successfully logged in.',
            'type' => 'login',
        ];
    }
}
