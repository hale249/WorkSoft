<?php

namespace App\Console\Commands;

use App\Jobs\CronJobSendToMeeting;
use Illuminate\Console\Command;

class ResendMeetingNotices extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'meeting:resend-notice';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Gửi lại thông báo sắp có cuộc họp diễn ra';

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
        dispatch(new CronJobSendToMeeting());
        return 0;
    }
}
