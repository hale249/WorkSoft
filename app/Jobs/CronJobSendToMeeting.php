<?php


namespace App\Jobs;


use App\Helpers\QueueConstants;
use App\Mail\CustomerMail;
use App\Models\Meeting;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Ramsey\Collection\Collection;

class CronJobSendToMeeting implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        Meeting::query()->whereDate('date_meeting', Carbon::now()->toDateString())->chunk(30, function (Collection $meetings) {
            foreach ($meetings as $meeting) {
                try {
                    if (($meeting->date_meeting) - Carbon::now()->toDateString() == 2) {
                        $meetingUsers = $meeting->meetingUser;

                        foreach ($meetingUsers as $meetingUser) {
                            $text = 'Bạn có cuộc họp sắp diễn ra ngày' . $meeting->date_meeting;
                            Mail::to($meetingUser->user->email)->send(new CustomerMail($meetingUser->user->name, $meeting, $text, 'Thông báo cuộc họp sắp diễn ra', 300));
                        }

                    }
                }  catch (\Exception $exception) {
                    Log::error($exception->getMessage());
                }
            }
        });
    }
}
