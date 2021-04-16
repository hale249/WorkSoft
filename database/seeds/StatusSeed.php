<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Status;
use Illuminate\Database\Seeder;

class StatusSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Status::query()->updateOrCreate([
            'name' => 'Bắt đầu',
            'description' => 'Bắt đầu nhận việc làm'
        ]);

        Status::query()->updateOrCreate([
            'name' => 'Đang làm',
            'description' => 'Đang trong tiến độ làm'
        ]);

        Status::query()->updateOrCreate([
            'name' => 'Hoàn thành đúng hạn',
            'description' => 'Hoàn thành công việc'
        ]);

        Status::query()->updateOrCreate([
            'name' => 'Hoàn thành quá hạn',
            'description' => 'Hoàn thành công việc'
        ]);

        Status::query()->updateOrCreate([
            'name' => 'Quá hạn',
            'description' => 'Hoàn thành công việc'
        ]);


        Category::query()->updateOrCreate([
            'name' => 'Công việc bộ môn',
            'description' => 'Công việc bộ môn',
        ]);

        Category::query()->updateOrCreate([
            'name' => 'Công việc khoa',
            'description' => 'Công việc khoa',
        ]);
    }
}
