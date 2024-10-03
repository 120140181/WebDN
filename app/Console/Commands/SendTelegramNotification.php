<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Reminder;
use App\Models\User;
use App\Notifications\TelegramNotification;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;

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

        $reminders = Reminder::whereDate('tanggal_tagihan', $now)
            ->where('status_pembayaran', '!=', 'Lunas')
            ->get();

        if ($reminders->isEmpty()) {
            Log::info('No reminders found for today.');
            $this->info('No reminders found for today.');
            return;
        }

        foreach ($reminders as $reminder) {
            $user = User::find($reminder->user_id); // Pastikan user_id ada di tabel reminders
            if ($user) {
                $message = "Reminder: Ada tagihan yang sudah jatuh tempo hari ini!";
                $user->notify(new TelegramNotification($message));
                Log::info('Notification sent to user ID: ' . $user->id . ' for reminder ID: ' . $reminder->id);
            } else {
                Log::error('User not found for reminder ID: ' . $reminder->id);
            }
        }

        $this->info('Reminder notifications have been sent.');
        Log::info('Reminder notifications have been sent.');
    }
}