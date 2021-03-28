<?php


namespace App\Models;


use App\Models\Traits\Attributes\StatusAttribute;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    use StatusAttribute;

    protected $table = 'statuses';

    protected $guarded = [];
}
