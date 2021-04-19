<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserAdminSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         User::query()->updateOrCreate([
                'name' => 'Nguyễn Thị Mai Dung',
                'staff_code' => '0803-05',
                'email' => 'nguyenthimaidung@humg.edu.vn',
                'role' => 1,
                'sex' => 1,
                'phone_number' => '0985276806',
                'position' => 'Đảng ủy viên Khoa, Trưởng bộ môn, Phó Trưởng khoa, UV Hội đồng Khoa',
                'degree' => 'Tiến sĩ',
                'password' => Hash::make('admin@admin!')
            ]);

        User::query()->updateOrCreate([
            'name' => 'Nguyễn Hoàng Long',
            'staff_code' => '0803-11',
            'email' => 'nguyenhoanglong@humg.edu.vn',
            'role' => 1,
            'sex' => 1,
            'phone_number' => '0916666384',
            'position' => 'Phó Trưởng bộ môn, UV Hội đồng Khoa',
            'degree' => 'Tiến sĩ',
            'password' => Hash::make('admin@admin!')
        ]);

        User::query()->updateOrCreate([
            'name' => 'Nguyễn Quang Khánh',
            'staff_code' => '0803-03',
            'email' => 'nguyenquangkhanh@humg.edu.vn',
            'role' => 0,
            'sex' => 1,
            'phone_number' => 'O912189981',
            'position' => 'Cán bộ giảng dạy, UV Hội đồng Khoa',
            'degree' => 'Tiến sĩ',
            'password' => Hash::make('admin@admin!')
        ]);

        User::query()->updateOrCreate([
            'name' => 'Trần Trung Chuyên',
            'staff_code' => '0803-02',
            'email' => 'trantrungchuyen@humg.edu.vn',
            'role' => 0,
            'sex' => 1,
            'phone_number' => '0983448779',
            'position' => 'Trưởng phòng, Cán bộ giảng dạy, UV Hội đồng Khoa',
            'degree' => 'Tiến sĩ',
            'password' => Hash::make('admin@admin!')
        ]);

        User::query()->updateOrCreate([
            'name' => 'Ngô Thị Phương Thảo',
            'staff_code' => '0803-08',
            'email' => 'ngothiphuongthao@humg.edu.vn',
            'role' => 0,
            'sex' => 0,
            'phone_number' => '0982198688',
            'position' => 'Cán bộ giảng dạy',
            'degree' => 'Thạc sĩ',
            'password' => Hash::make('admin@admin!')
        ]);

        User::query()->updateOrCreate([
            'name' => 'Trần Trường Giang',
            'staff_code' => '0803-12',
            'email' => 'trantruonggiang@humg.edu.vn',
            'role' => 0,
            'sex' => 1,
            'phone_number' => '',
            'position' => 'Cán bộ giảng dạy',
            'degree' => 'Thạc sĩ',
            'password' => Hash::make('admin@admin!')
        ]);

        User::query()->updateOrCreate([
            'name' => 'Trần Mai Hương',
            'staff_code' => '0803-07',
            'email' => 'tranmaihuong@humg.edu.vn',
            'role' => 0,
            'sex' => 0,
            'phone_number' => '0904629269',
            'position' => 'Cán bộ giảng dạy',
            'degree' => 'Thạc sĩ',
            'password' => Hash::make('admin@admin!')
        ]);

        User::query()->updateOrCreate([
            'name' => 'Đinh Bảo Ngọc',
            'staff_code' => '0803-14',
            'email' => 'dinhbaongoc@humg.edu.vn',
            'role' => 0,
            'sex' => 1,
            'phone_number' => '0975 275 118',
            'position' => 'Bí thư Chi đoàn Cán bộ, Cán bộ giảng dạy',
            'degree' => 'Thạc sĩ',
            'password' => Hash::make('admin@admin!')
        ]);

        User::query()->updateOrCreate([
            'name' => 'Trần Thị Hòa',
            'staff_code' => '0803-13',
            'email' => 'tranthihoa@humg.edu.vn',
            'role' => 0,
            'sex' => 0,
            'phone_number' => '0979090687',
            'position' => 'Cán bộ giảng dạy',
            'degree' => 'Thạc sĩ',
            'password' => Hash::make('admin@admin!')
        ]);

        User::query()->updateOrCreate([
            'name' => 'Đoàn Khánh Hoàng',
            'staff_code' => '0803-06',
            'email' => 'doankhanhhoang@humg.edu.vn',
            'role' => 0,
            'sex' => 1,
            'phone_number' => '0904744590',
            'position' => 'Cán bộ giảng dạy',
            'degree' => 'Nguyên cứu sinh',
            'password' => Hash::make('admin@admin!')
        ]);

        User::query()->updateOrCreate([
            'name' => 'Nguyễn Trường Linh',
            'staff_code' => '0803-15',
            'email' => 'nguyentruonglinh@humg.edu.vn',
            'role' => 0,
            'sex' => 1,
            'phone_number' => '',
            'position' => 'Cán bộ giảng dạy',
            'degree' => 'Kỹ sư',
            'password' => Hash::make('admin@admin!')
        ]);

        User::query()->updateOrCreate([
            'name' => 'Diêm Thị Thùy',
            'staff_code' => '0803-09',
            'email' => 'diemthithuy@humg.edu.vn',
            'role' => 0,
            'sex' => 0,
            'phone_number' => '0984 290 010',
            'position' => 'Nhân viên hành chính',
            'degree' => 'Thạc sĩ',
            'password' => Hash::make('admin@admin!')
        ]);

        User::query()->updateOrCreate([
            'name' => 'Nguyễn Thị Phấn',
            'staff_code' => '0803-10',
            'email' => 'nguyenthiphan@humg.edu.vn',
            'role' => 0,
            'sex' => 0,
            'phone_number' => '0946 946 968',
            'position' => 'Nhân viên hành chính',
            'degree' => 'Kỹ sư',
            'password' => Hash::make('admin@admin!')
        ]);

    }
}
