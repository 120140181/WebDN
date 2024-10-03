<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Reminder;
use App\Notifications\TelegramNotification;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;

class SendTelegramNotification extends Command
{
    protected $signature = 'telegram:send';
    protected $description = 'Send Telegram notifications for due reminders';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $now = Carbon::now()->startOfDay();
        Log::info('Checking reminders for date: ' . $now);

        $reminders = Reminder::where('tanggal_tagihan', $now)
            ->where('status_pembayaran', '!=', 'Lunas')
            ->get();

        if ($reminders->isEmpty()) {
            Log::info('No reminders found for today.');
            $this->info('No reminders found for today.');
            return;
        }

        $chatId = env('TELEGRAM_CHAT_ID');
        $botToken = env('TELEGRAM_BOT_TOKEN');

        foreach ($reminders as $reminder) {
            $message = "Reminder: Ada tagihan yang sudah jatuh tempo hari ini!";

            // Kirim pesan ke Telegram menggunakan bot
            $response = Http::post("https://api.telegram.org/bot{$botToken}/sendMessage", [
                'chat_id' => $chatId,
                'text'    => $message,
            ]);

            if ($response->successful()) {
                Log::info('Notification sent for reminder ID: ' . $reminder->id);
            } else {
                Log::error('Failed to send notification for reminder ID: ' . $reminder->id);
            }
        }

        $this->info('Reminder notifications have been sent.');
        Log::info('Reminder notifications have been sent.');
    }
}
