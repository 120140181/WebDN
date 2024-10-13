<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Jobs\SendTelegramReminder;
use App\Models\Reminder;

class SendReminderCommand extends Command
{
    protected $signature = 'php artisan reminder:send {id}';
    protected $description = 'Send reminder via Telegram';

    public function handle()
    {
        $reminderId = $this->argument('id');
        $reminder = Reminder::find($reminderId);

        if ($reminder) {
            // Menambahkan job ke dalam queue
            SendTelegramReminder::dispatch($reminder);
            $this->info('Reminder job has been dispatched to the queue.');
        } else {
            $this->error('Reminder not found.');
        }
    }
}
