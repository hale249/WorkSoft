<?php

namespace App\Helpers;

class Helper
{
    public static function clearCache()
    {
        return app()->make(\Spatie\Permission\PermissionRegistrar::class)->forgetCachedPermissions();
    }
}
