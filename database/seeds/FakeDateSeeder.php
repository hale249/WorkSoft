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

class FakeDateSeeder extends Seeder
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
            'description' => 'Công việc đang thực hiện'
        ]);

        Status::query()->updateOrCreate([
            'name' => Constant::STATUS_COMPLETED,
            'description' => 'Công việc đã hoàn thành'
        ]);

        Status::query()->updateOrCreate([
            'name' => Constant::STATUS_APPROVAL,
            'description' => 'Công việc đang chờ phê duyệt'
        ]);

        Status::query()->updateOrCreate([
            'name' => Constant::STATUS_OUT_OF_DATE,
            'description' => 'Công việc quá hạn'
        ]);

        // Tạo dữ liệu mẫu bảng danh mục
        Category::query()->updateOrCreate([
            'name' => 'Công việc khoa',
            'description' => 'Công việc của khoa'
        ]);

        Category::query()->updateOrCreate([
            'name' => 'Công việc bộ môn',
            'description' => 'Công việc của bô môn'
        ]);

        //Dữ liệu mẫu bảng meeting
        $listUser = User::all();

        $meeting = Meeting::query()->updateOrCreate([
            'name' => 'Họp báo cáo cuối tháng',
            'description' => 'Thông báo tổng kết cuối tháng',
            'date_meeting' => Carbon::now()->toDateString(),
            'time_start' => Carbon::now()->toTimeString(),
            'time_end' => Carbon::now()->toTimeString(),
            'uuid' => Str::uuid()->toString()
        ]);

        foreach ($listUser as $user) {
            MeetingUser::query()->updateOrCreate([
                'meeting_id' => $meeting->id,
                'user_id' => $user->id
            ]);
        }

        $meeting2 = Meeting::query()->updateOrCreate([
            'name' => 'Họp báo cáo cuối năm',
            'description' => 'Thông báo tổng kết cuối năm',
            'date_meeting' => Carbon::now()->toDateString(),
            'time_start' => Carbon::now()->toTimeString(),
            'time_end' => Carbon::now()->toTimeString(),
            'uuid' => Str::uuid()->toString()
        ]);

        foreach ($listUser as $user) {
            MeetingUser::query()->updateOrCreate([
                'meeting_id' => $meeting2->id,
                'user_id' => $user->id
            ]);
        }

        // Du lieu mau bang cong viec
        Job::query()->updateOrCreate([
            'name' => 'Lập kế hoach giảng dạy tin học đại cương',
            'description' => 'Lập kế hoach giang dạy tin học đại cuong',
            'category_id' => Category::query()->first()->id,
            'deadline' => Carbon::now()->toDateString(),
            'user_id' => 2,
            'uuid' => Str::uuid()->toString(),
            'created_by' => User::query()->first()->id,
            'status_id' => Status::query()->first()->id,
        ]);

        Job::query()->updateOrCreate([
            'name' => 'Lập kế hoach mở lớp khoa học dữ liẹu',
            'description' => 'Lập kế hoach mở lớp khoa học dư liẹu',
            'category_id' => Category::query()->first()->id,
            'deadline' => Carbon::now()->toDateString(),
            'user_id' => 2,
            'uuid' => Str::uuid()->toString(),
            'created_by' => User::query()->first()->id,
            'status_id' => Status::query()->first()->id,
        ]);
    }
}
