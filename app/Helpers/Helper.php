<?php

namespace App\Helpers;

class Helper
{
    public static function clearCache()
    {
        return app()->make(\Spatie\Permission\PermissionRegistrar::class)->forgetCachedPermissions();
    }

    public static function checkRole($user)
    {
        if ($user->role === 1) {
            return true;
        }
        return false;
    }
}
