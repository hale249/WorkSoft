<?php

namespace Database\Seeders;

use App\Models\TimeTable;
use Illuminate\Database\Seeder;

class SubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TimeTable::query()->updateOrCreate([
            'staff_code' => '0803-11',
            'sub_code' => '7080313',
            'subject_name' => 'Thông tin địa học đại cương	',
            'group' => '01',
            'credit' => '3',
            'class_code' => 'DCCTDH63A',
            'credit_tuit' => '3',
            'semester' => '2',
        ]);

        TimeTable::query()->updateOrCreate([
            'staff_code' => '0803-11',
            'sub_code' => '7080324',
            'subject_name' => 'Thông tin địa học đại cương',
            'group' => 'DCCTDH63A',
            'credit' => '3',
            'class_code' => 'DCCTDH63A',
            'credit_tuit' => '3',
            'semester' => '2',
        ]);

        TimeTable::query()->updateOrCreate([
            'staff_code' => '0803-05',
            'sub_code' => '7080313',
            'subject_name' => 'Thông tin địa học đại cương',
            'group' => '02',
            'credit' => '3',
            'class_code' => 'DCCTDH63B',
            'credit_tuit' => '3',
            'semester' => '2',
        ]);

        TimeTable::query()->updateOrCreate([
            'staff_code' => '0803-07',
            'sub_code' => '4080113',
            'subject_name' => 'Cơ sở dữ liệu nâng cao',
            'group' => 'MT',
            'credit' => '2',
            'class_code' => '',
            'credit_tuit' => '2',
            'semester' => '2',
        ]);

        TimeTable::query()->updateOrCreate([
            'staff_code' => '0803-07',
            'sub_code' => '7080211',
            'subject_name' => 'Hệ quản trị cơ sở dữ liệu',
            'group' => '05',
            'credit' => '2',
            'class_code' => 'DCCTCT64E',
            'credit_tuit' => '',
            'semester' => '2',
        ]);
        TimeTable::query()->updateOrCreate([
            'staff_code' => '0803-07',
            'sub_code' => '7080302',
            'subject_name' => 'Cơ sở xử lý ảnh số',
            'group' => '01',
            'credit' => '3',
            'class_code' => 'DCCTDH63B',
            'credit_tuit' => '3',
            'semester' => '2',
        ]);
    }
}
