<?php

namespace App\Helpers;

interface Constant
{
    public const DEFAULT_PER_PAGE = 20;


    public const STATUS = [
        1 => 'Bắt đầu',
        2 => 'Thực hiện',
        3 => 'Hoàn thành'
    ];
}
