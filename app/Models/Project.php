<?php

namespace App\Models;

use App\Models\Traits\Attributes\ProjectAttribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Project extends Model
{
    use ProjectAttribute;
    use SoftDeletes;

    protected $table = 'projects';

    protected $guarded = [];

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
}
