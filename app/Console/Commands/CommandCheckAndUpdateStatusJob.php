<?php

namespace App\Console\Commands;

use App\Helpers\Constant;
use App\Jobs\CheckAndUpdateStatusJob;
use App\Models\Job;
use App\Models\Status;
use Illuminate\Console\Command;

class CommandCheckAndUpdateStatusJob extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'job:check-deadline-status';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Cap nhat nhung cong viec qua han chua';

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
        $status = Status::query()->where('name', Constant::STATUS_COMPLETED)->first();
        $jobs = Job::query()->where('status_id', '!=', $status->id)->get();

        foreach ($jobs as $job) {
            dispatch(new CheckAndUpdateStatusJob($job));
        }
        return true;
    }
}
