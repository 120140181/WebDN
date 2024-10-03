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

        $reminderCount = $reminders->count();

        if ($reminderCount === 0) {
            Log::info('No reminders found for today.');
            $this->info('No reminders found for today.');
            return;
        }

        $message = "Reminder: Ada $reminderCount tagihan yang sudah jatuh tempo hari ini!";

        // Mengirim pesan ke semua pengguna yang memiliki tagihan jatuh tempo
        $userIds = $reminders->pluck('user_id')->unique();
        foreach ($userIds as $userId) {
            $user = User::find($userId);
            if ($user) {
                $user->notify(new TelegramNotification($message));
                Log::info('Notification sent to user ID: ' . $user->id);
            } else {
                Log::error('User not found for user ID: ' . $userId);
            }
        }

        $this->info('Reminder notifications have been sent.');
        Log::info('Reminder notifications have been sent.');
    }
}