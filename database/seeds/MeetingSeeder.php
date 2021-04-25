<?php

namespace Database\Seeders;

use App\Models\Meeting;
use App\Models\MeetingUser;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class MeetingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        //Dữ liệu mẫu bảng meeting
        $listUser = User::all();

        $meeting = Meeting::query()->updateOrCreate([
            'name' => 'Mở lớp khoa học dữ liệu',
            'description' => 'Thông báo mở lớp khoa học dữ liệu',
            'date_meeting' => Carbon::tomorrow()->toDateString(),
            'time_start' => Carbon::tomorrow()->toTimeString(),
            'time_end' => Carbon::tomorrow()->toTimeString(),
            'uuid' => Str::uuid()->toString()
        ]);

        foreach ($listUser as $user) {
            MeetingUser::query()->updateOrCreate([
                'meeting_id' => $meeting->id,
                'user_id' => $user->id
            ]);
        }

        $meeting2 = Meeting::query()->updateOrCreate([
            'name' => '',
            'description' => 'Thông báo tổng kết cuối năm',
            'date_meeting' => Carbon::tomorrow()->toDateString(),
            'time_start' => Carbon::tomorrow()->toTimeString(),
            'time_end' => Carbon::tomorrow()->toTimeString(),
            'uuid' => Str::uuid()->toString()
        ]);

        foreach ($listUser as $user) {
            MeetingUser::query()->updateOrCreate([
                'meeting_id' => $meeting2->id,
                'user_id' => $user->id
            ]);
        }
    }
}
