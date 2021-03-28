<?php


namespace App\Models;

use App\Models\Traits\Attributes\RoleAttribute;
use \Spatie\Permission\Models\Role as RoleModel;

class Role extends RoleModel
{
    use RoleAttribute;

    protected $table = 'roles';

    protected $guarded = [];
}
