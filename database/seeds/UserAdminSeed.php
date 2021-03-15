<?php

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
        $user = User::query()
            ->create([
                'first_name' => 'Lê văn',
                'last_name' => 'Hà',
                'username' => 'levanha',
                'email' => 'lehatybg1@gmail.com',
                'password' => Hash::make('123456')
            ]);

    }
}
