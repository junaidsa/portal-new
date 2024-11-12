<?php

namespace App\Console;

use App\Jobs\SendClassReminderEmail;
use App\Models\ScheduleTiming;
use Carbon\Carbon;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->call(function () {
            $upcomingClasses = ScheduleTiming::where('schedule_date', Carbon::now()->addDay()->toDateString())
                ->whereNull('reminder_sent_at')
                ->with(['student', 'teacher', 'classType'])
                ->get();
    
            foreach ($upcomingClasses as $class) {
                dispatch(new SendClassReminderEmail($class));
            }
        })->everyMinute();
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
