<?php

namespace App\Helpers;

interface Constant
{
    public const DEFAULT_PER_PAGE = 20;

    public const TIME_EXPIRED_TOKEN = 23;

    public const STATUS_START = 'Đang thực hiện';
    public const STATUS_COMPLETED = 'Hoàn thành';
    public const STATUS_OUT_OF_DATE = 'Quá hạn';
    public const STATUS_APPROVAL = 'Chờ phê duyệt';

    public const URL_TIMEATABLE = 'https://daotao.humg.edu.vn/Default.aspx?page=thoikhoabieu&id=';
}
