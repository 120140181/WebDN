<?php

namespace App\Notifications;

use Illuminate\Notifications\Notification;
use NotificationChannels\Telegram\TelegramChannel;
use NotificationChannels\Telegram\TelegramMessage;
use Illuminate\Support\Facades\Log;

class TelegramNotification extends Notification
{
    protected $message;

    public function __construct($message)
    {
        $this->message = $message;
    }

    public function via($notifiable)
    {
        return [TelegramChannel::class];
    }

    public function toTelegram($notifiable)
    {
        Log::info('Sending Telegram notification to: ' . $notifiable->routeNotificationForTelegram());
        Log::info('Message: ' . $this->message);

        return TelegramMessage::create()
            ->to($notifiable->routeNotificationForTelegram()) // routeNotificationForTelegram should return the chat ID
            ->content($this->message);
    }
}