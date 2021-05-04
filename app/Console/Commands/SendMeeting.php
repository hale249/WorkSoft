<?php

namespace App\Console\Commands;

use App\Jobs\CronJobSendToMeeting;
use Illuminate\Console\Command;

class SendMeeting extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'meeting:send-meeting';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send meeting';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        dispatch(new ($user));
        return 0;
    }
}
