<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;

class DonationNotification extends Notification
{
    use Queueable;

    protected $donation;

    /**
     * Create a new notification instance.
     */
    public function __construct(object $donation)
    {
        $this->donation = $donation;
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

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            "donation" => $this->donation,
            "titre" => "Nouveau don effectué",
            "message" => "L'utilisateur ".$this->donation->user->name." a été effectué un don sur le post : ".$this->donation->post->title,
            "action" => "Voir le don",
            "link" => route('donations.show', $this->donation->id),
        ];
    }

}

