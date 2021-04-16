<?php

namespace App\Models;

use App\Models\Traits\Attributes\JobAttribute;
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
        'job_ranting' => 'integer',
        'user_id' => 'integer',
        'person_support' => 'integer',
    ];

//    protected $appends = 'totals';

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
}
