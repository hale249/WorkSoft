<?php

namespace App\Models\Traits\Relationships;

use App\Http\Requests\TaskRequest;
use App\Models\Category;
use App\Models\User;

trait ProjectRelationship
{
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function tasks()
    {
        return $this->hasMany(TaskRequest::class, 'product_id', 'id');
    }
}
