<?php

namespace App\Console;

use App\Jobs\SendClassReminderEmail;
use App\Models\ScheduleTiming;
use Carbon\Carbon;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    protected function schedule(Schedule $schedule)
{
    $schedule->command('send:class-reminders')->hourly(); // Run every hour
}
    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
