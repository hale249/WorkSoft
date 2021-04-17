<?php

namespace App\Models;

use App\Helpers\Constant;
use App\Models\Traits\Attributes\JobAttribute;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Job extends Model
{
    use JobAttribute;
    use SoftDeletes;

    protected $table = 'active_jobs';

    protected $guarded = [];

    protected $casts = [
        'category_id' => 'integer',
        'user_id' => 'integer',
    ];

    protected $appends = ['status_name'];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function tasks()
    {
        return $this->hasMany(Task::class, 'task_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }

    public function status()
    {
        return $this->belongsTo(Status::class, 'status_id', 'id');
    }


      public function getStatusNameAttribute()
    {
        $now = strtotime(Carbon::now()->toDateString());
        $timeDead = strtotime($this->deadline);
        $tonTai = strtotime($this->finish_at);

        if (empty($tonTai)) {
            if ($timeDead > $now) {
                $text = Constant::STATUS_START;
            } else {
                $text = Constant::STATUS_OUT_OF_DATE;
            }
        } else {
            if ($timeDead >= $tonTai) {
                $text = Constant::STATUS_COMPLETED;
            } else {
                $text = Constant::STATUS_OUT_OF_DATE;
            }
        }

        return $text;
    }
}
