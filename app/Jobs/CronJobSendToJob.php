<?php


namespace App\Jobs;


use App\Helpers\QueueConstants;
use App\Models\Meeting;
use App\Notifications\CustomSendNotify;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
use Ramsey\Collection\Collection;

class CronJobSendToJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->queue = QueueConstants::getQueueUrl(QueueConstants::QUEUE_APP_NOTIFICATIONS);
    }

    public function handle()
    {
        Meeting::query()->where('status', true)->chunk(30, function (Collection $meetings) {
            foreach ($meetings as $meeting) {
                try {
                    if (($meeting->date_meeting) - Carbon::now() == 2) {
                        $users = $meeting->user;
                        foreach ($users as $user) {
                            dispatch(new CustomSendNotify('Bạn có cuộc họp dien ra lúc' . $meeting->data_meeting));
                        }
                    }
                }  catch (\Exception $exception) {
                    Log::error($exception->getMessage());
                }
            }
        });
    }
}
