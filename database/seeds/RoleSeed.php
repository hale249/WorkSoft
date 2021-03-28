<?php

namespace Database\Seeders;

use App\Helpers\PermissionConstant;
use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::query()->updateOrCreate([
            'name' => PermissionConstant::ROLE_ADMIN,
            'description' => 'Quản trị viên'
        ]);

        Role::query()->updateOrCreate([
            'name' => PermissionConstant::ROLE_MANAGER,
            'description' => 'Giảng viên'
        ]);

        Role::query()->updateOrCreate([
            'name' => PermissionConstant::ROLE_CUSTOMER,
            'description' => 'Hỗ trợ'
        ]);
    }
}
