<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;

class GeneralNotification extends Notification
{
    use Queueable;

    private $message;
    private $subject;
    /**
     * @var mixed|null
     */
    private $link;
    /**
     * @var mixed|null
     */
    private $icon;
    /**
     * @var mixed|null
     */
    private $color;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($subject, $message, $link = '#', $icon = 'fa fa-bell', $color = '#f39c12')
    {
        $this->message = $message;
        $this->subject = $subject;
        $this->link = $link;
        $this->icon = $icon;
        $this->color = $color;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param mixed $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
    }


    /**
     * Get the array representation of the notification.
     *
     * @param mixed $notifiable
     * @return array
     */
    public function toDatabase($notifiable)
    {
        return [
            'subject' => $this->subject,
            'message' => $this->message,
            'link' => $this->link,
            'icon' => $this->icon,
            'color' => $this->color,
        ];
    }
}
