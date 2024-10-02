<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Reminder;
use App\Models\User;
use App\Notifications\TelegramNotification;
use Carbon\Carbon;

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
        $reminders = Reminder::where('tanggal_tagihan', $now)
            ->where('status_pembayaran', '!=', 'Lunas')
            ->get();

        foreach ($reminders as $reminder) {
            $user = User::find($reminder->user_id); // Pastikan user_id ada di tabel reminders
            if ($user) {
                $message = "Reminder: Your bill is due today.";
                $user->notify(new TelegramNotification($message));
            }
        }

        $this->info('Reminder notifications have been sent.');
    }
}