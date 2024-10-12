<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class AlarmNotification extends Notification
{
    use Queueable;
    protected $item;

    public function __construct($item)
    {
        $this->item = $item;
    }

    public function via($notifiable)
    {
        return ['database', 'broadcast']; // This will store in the database and broadcast via WebSockets
    }

    public function toArray($notifiable)
    {
        return [
            'title' => $this->item->title ?? 'Appointment Reminder',
            'description' => $this->item->description ?? 'You have an appointment or medicine reminder!',
            'time' => now()->format('g:i A'),
        ];
    }
}
