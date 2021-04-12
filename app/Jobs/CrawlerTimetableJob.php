<?php


namespace App\Jobs;


use App\Helpers\Constant;
use App\Helpers\QueueConstants;
use App\Models\Meeting;
use App\Models\User;
use App\Notifications\CustomSendNotify;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
use Ramsey\Collection\Collection;

class CrawlerTimetableJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public function __construct()
    {
    }

    public function handle()
    {
        $codeUser = User::query()->select(['staff_code'])->whereNotNull('staff_code')->get();

        foreach ($codeUser as $code) {
            $link = Constant::URL_TIMEATABLE . $code;
        }
    }
}
