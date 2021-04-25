<?php


namespace App\Jobs;


use App\Helpers\Constant;
use App\Helpers\QueueConstants;
use App\Models\Meeting;
use App\Models\TimeTable;
use App\Models\User;
use App\Notifications\CustomSendNotify;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use voku\helper\HtmlDomParser;

class CrawlerTimetableJob implements ShouldQueue
{
    public $user;
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function handle()
    {
        $dom = HtmlDomParser::file_get_html(Constant::URL_TIMEATABLE . $this->user->staff_code);
        foreach($dom->findMulti('.grid-roll2 > .body-table') as $element) {
            TimeTable::query()->updateOrCreate([
                'staff_code' => '0803-11',
                'sub_code' => $element->find('tr td', 0)->plaintext,
                'subject_name' => $element->find('tr td', 1)->plaintext,
                'group' => $element->find('tr td', 2)->plaintext,
                'credit' => $element->find('tr td', 3)->plaintext,
                'class_code' => $element->find('tr td', 4)->plaintext,
                'credit_tuit' => $element->find('tr td', 5)->plaintext,
                'semester' => $this->getSemester(),
                'link' => $element->find('tr td a', 0)->href,
            ]);
        }
    }

    private function getSemester()
    {
        $month = Carbon::now()->month;
        if ($month <= 5) {
            $semester = 2;
        } elseif ($month > 5 && $month <= 8) {
            $semester = 3;
        }else {
            $semester = 1;
        }

        return $semester;
    }
}
