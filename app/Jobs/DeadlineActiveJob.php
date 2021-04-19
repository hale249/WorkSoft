<?php

namespace App\Jobs;

use App\Helpers\Constant;
use App\Models\Job;
use App\Models\Status;
use App\Notifications\CustomSendNotify;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
use Ramsey\Collection\Collection;

class DeadlineActiveJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $statusIds = Status::query()->whereIn('name', [Constant::STATUS_APPROVAL, Constant::STATUS_START])->pluck('id', 'id')->toArray();
        Job::query()->whereIn('status_id', $statusIds)->chunk(30, function (Collection $jobs) {
            foreach ($jobs as $job) {
                try {
                    if (($job->deadline) - Carbon::now()->toDateString() == 2) {
                        $users = $job->user_id;
                        dispatch(new CustomSendNotify('Bạn có cuộc họp dien ra lúc'));
                    }
                }  catch (\Exception $exception) {
                    Log::error($exception->getMessage());
                }
            }
        });
    }
}
