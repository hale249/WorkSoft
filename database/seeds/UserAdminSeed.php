<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\UserRole;
use App\Models\Role;
use App\Helpers\PermissionConstant;
use \App\Helpers\Helper;

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
                'email' => 'halet2@gmail.com',
                'password' => Hash::make('123456')
            ]);

        if (!empty($user)) {
            UserRole::query()->create([
                'role_id' => Role::query()->where('name', PermissionConstant::ROLE_ADMIN)->first()->id,
                'model_type' => User::class,
                'model_id' => $user->id
            ]);
            Helper::clearCache();
        }

    }
}
