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
         User::query()->create([
                'name' => 'Lê Văn Hà',
                'staff_code' => 'A0001',
                'email' => 'halet2@gmail.com',
                'role' => 1,
                'password' => Hash::make('123456')
            ]);
    }
}
