<?php


namespace App\Models;

use App\Models\Traits\Attributes\PermissionAttribute;
use \Spatie\Permission\Models\Permission as PermissionModel;

class Permission extends PermissionModel
{
    use PermissionAttribute;

    protected $table = 'permissions';

    protected $guarded = [];

}
