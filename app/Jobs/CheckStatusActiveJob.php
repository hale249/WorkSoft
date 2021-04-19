<?php

namespace App\Jobs;

use App\Models\Job;
use App\Notifications\CustomSendNotify;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Log;

class CheckStatusActiveJob implements ShouldQueue
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
        Job::query()->chunk(30, function (Collection $jobs) {
            foreach ($jobs as $job) {
                try {
                    if (($job->deadline) - Carbon::now() == 2) {
                        $users = $job->user;
                        foreach ($users as $user) {
                            dispatch(new CustomSendNotify('Bạn có cuộc họp dien ra lúc' ));
                        }
                    }
                }  catch (\Exception $exception) {
                    Log::error($exception->getMessage());
                }
            }
        });
    }
}
