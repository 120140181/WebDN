<?php
// File: app/Console/Commands/SendTelegramNotification.php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Reminder;
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
        $now = Carbon::today();
        Log::info('Checking reminders for date: ' . $now);

        $reminders = Reminder::whereDate('tanggal_tagihan', $now)
            ->where('status_pembayaran', '=', 'Pending')
            ->get();

        $reminderCount = $reminders->count();

        if ($reminderCount === 0) {
            Log::info('No reminders found for today.');
            $this->info('No reminders found for today.');
            return;
        }

        $chatId = env('TELEGRAM_CHAT_ID');
        $botToken = env('TELEGRAM_BOT_TOKEN');

        Log::info('Using chat ID: ' . $chatId);

        foreach ($reminders as $reminder) {
            $message = "Reminder : Ada Tagihan yang sudah jatuh tempo hari ini\n" .
                "\n" .
                "Reminder Pembayaran:\n" .
                "Nama Nasabah: {$reminder->nama_nasabah}\n" .
                "Nomor Kwitansi: {$reminder->nomor_kwitansi}\n" .
                "Nominal Tagihan: Rp. {$reminder->nominal_tagihan}\n" .
                "Status Pembayaran: {$reminder->status_pembayaran}\n" .
                "Tanggal Tagihan: {$reminder->tanggal_tagihan}";

            // Kirim pesan ke Telegram menggunakan bot
            $url = "https://api.telegram.org/bot{$botToken}/sendMessage";
            Log::info('Sending request to URL: ' . $url);

            $response = Http::post($url, [
                'chat_id' => $chatId,
                'text' => $message,
            ]);

            if ($response->successful()) {
                Log::info('Notification sent for reminder ID: ' . $reminder->id);
            } else {
                Log::error('Failed to send notification for reminder ID: ' . $reminder->id);
                Log::error('Response Status: ' . $response->status());
                Log::error('Response Body: ' . $response->body());
            }
        }

        $this->info('Reminder notifications have been sent.');
        Log::info('Reminder notifications have been sent.');
    }
}