<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Job;
use App\Models\Status;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class JobSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // Du lieu mau bang cong viec
        Job::query()->updateOrCreate([
            'name' => 'Lập kế hoach giảng dạy tin học đại cương',
            'description' => 'Lập kế hoach giang dạy tin học đại cuong',
            'category_id' => Category::query()->first()->id,
            'deadline' => Carbon::tomorrow()->toDateString(),
            'user_id' => 2,
            'uuid' => Str::uuid()->toString(),
            'created_by' => User::query()->first()->id,
            'status_id' => Status::query()->first()->id,
        ]);
    }
}
