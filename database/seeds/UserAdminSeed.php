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
                'name' => 'Admin',
                'staff_code' => 'A0001',
                'email' => 'admin@gmail.com',
                'role' => 1,
                'password' => Hash::make('123456')
            ]);

        User::query()->updateOrCreate([
            'name' => 'Nguyễn Văn A',
            'staff_code' => 'A000A',
            'email' => 'nguyenvana@gmail.com',
            'role' => 0,
            'password' => Hash::make('123456')
        ]);

        User::query()->updateOrCreate([
            'name' => 'Nguyễn Văn B',
            'staff_code' => 'A000B',
            'email' => 'nguyenvanB@gmail.com',
            'role' => 0,
            'password' => Hash::make('123456')
        ]);

        User::query()->updateOrCreate([
            'name' => 'Nguyễn Văn C',
            'staff_code' => 'A000C',
            'email' => 'nguyenvanc@gmail.com',
            'role' => 0,
            'password' => Hash::make('123456')
        ]);

        User::query()->updateOrCreate([
            'name' => 'Nguyễn Văn D',
            'staff_code' => 'A000D',
            'email' => 'nguyenvand@gmail.com',
            'role' => 0,
            'password' => Hash::make('123456')
        ]);
    }
}
