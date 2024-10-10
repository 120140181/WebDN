<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    protected $commands = [
        Commands\SendTelegramNotification::class,
    ];

    protected function schedule(Schedule $schedule)
    {
        // Menjadwalkan command SendTelegramNotification untuk dijalankan setiap hari pada jam 7 pagi
        $schedule->command('telegram:send')->dailyAt('07:00');
        $schedule->command('queue:work --tries=3')->everyMinute();
        $schedule->command('queue:restart')->daily();
    }

    protected function commands()
    {
        $this->load(__DIR__ . '/Commands');

        require base_path('routes/console.php');
    }
}