<?php

namespace App\Models;

use App\Models\Traits\Attributes\ProjectAttribute;
use App\Models\Traits\Attributes\TaskAttribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Task extends Model
{
    use TaskAttribute;
    use SoftDeletes;

    protected $table = 'tasks';
    protected $guarded = [];

    public function status()
    {
        return $this->belongsTo(Status::class, 'status_id', 'id');
    }
}
