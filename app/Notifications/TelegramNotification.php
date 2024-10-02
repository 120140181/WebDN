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
        Log::info('TelegramNotification instantiated with message: ' . $message);
    }

    public function via($notifiable)
    {
        Log::info('Determining notification channels for notifiable: ' . get_class($notifiable));
        return [TelegramChannel::class];
    }

    public function toTelegram($notifiable)
    {
        $chatId = $notifiable->routeNotificationForTelegram();
        Log::info('Sending Telegram notification to: ' . $chatId);
        Log::info('Message: ' . $this->message);

        if (empty($chatId)) {
            Log::error('Chat ID is empty.');
            return;
        }

        return TelegramMessage::create()
            ->to($chatId) // routeNotificationForTelegram should return the chat ID
            ->content($this->message);
    }
}