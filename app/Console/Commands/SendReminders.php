<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Notifications\ReminderNotification;
use Illuminate\Support\Facades\Notification;
use App\Models\Reminder;

class SendReminders extends Command
{
    protected $signature = 'reminders:send';
    protected $description = 'Send reminders to users via Telegram';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $now = now();
        $reminders = Reminder::where('reminder_date', '<=', $now)
            ->where('sent', false)
            ->get();

        foreach ($reminders as $reminder) {
            $user = User::find($reminder->user_id); // Pastikan Anda memiliki model User
            Notification::send($user, new ReminderNotification($reminder->message));

            $reminder->update(['sent' => true]);
        }

        $this->info('Reminders sent successfully!');
    }
}
