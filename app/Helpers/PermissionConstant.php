<?php

namespace App\Helpers;

interface PermissionConstant
{
    /*
    |--------------------------------------------------------------------------
    | Roles
    |--------------------------------------------------------------------------
    */
    public const ROLE_ADMIN = 'ADMIN';
    public const ROLE_MANAGER = 'MANAGER';

    public const ROLES = [
        self::ROLE_ADMIN,
        self::ROLE_MANAGER,
    ];
 }
