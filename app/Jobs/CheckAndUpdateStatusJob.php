<?php

namespace App\Jobs;

use App\Helpers\Constant;
use App\Models\Job;
use App\Models\Status;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class CheckAndUpdateStatusJob implements ShouldQueue
{
    public $job;

    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Job $job)
    {
        $this->job = $job;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $day = Carbon::now();
        $outOfDate = Status::query()->where('name', Constant::STATUS_OUT_OF_DATE)->first();
        $approval = Status::query()->where('name', Constant::STATUS_APPROVAL)->first();
        if ($day > $this->job->deadline && $this->job->status_id !== $approval) {
            $this->job->update([
                'status_id' => $outOfDate
            ]);
        }
        return;
    }
}
