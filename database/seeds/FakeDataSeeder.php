<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Helpers\Constant;
use App\Models\Category;
use App\Models\Job;
use App\Models\Meeting;
use App\Models\MeetingUser;
use App\Models\Status;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Str;

class FakeDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Status::query()->updateOrCreate([
            'name' => Constant::STATUS_START,
            'description' => 'Công việc đang thực hiện',
            'color' => '#00bfff',
        ]);

        Status::query()->updateOrCreate([
            'name' => Constant::STATUS_COMPLETED,
            'description' => 'Công việc đã hoàn thành',
            'color' => '#00ff00',
        ]);

        Status::query()->updateOrCreate([
            'name' => Constant::STATUS_APPROVAL,
            'description' => 'Công việc đang chờ phê duyệt',
            'color' => '#ff8000',
        ]);

        Status::query()->updateOrCreate([
            'name' => Constant::STATUS_OUT_OF_DATE,
            'description' => 'Công việc quá hạn',
            'color' => '#ff0000',
        ]);

    }
}
