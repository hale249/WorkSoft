<?php

namespace App\Console;

use App\Console\Commands\CommandCheckAndUpdateStatusJob;
use App\Console\Commands\PermissionsRefresh;
use App\Console\Commands\SyncTimeatable;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        SyncTimeatable::class,
        CommandCheckAndUpdateStatusJob::class
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
         $schedule->command('user:sync-timeatabel')->monthly();
         $schedule->command('job:check-deadline-status')->daily();
         $schedule->command('meeting:resend-notice')->hourly();
         $schedule->command('job:resend-notice')->hourly();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
