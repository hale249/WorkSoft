<?php

namespace App\Models\Traits\Relationships;

use App\Models\Project;
use App\Models\User;

trait CategoryRelationship
{
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function project()
    {
        return $this->belongsTo(Project::class, 'category_id', 'id');
    }
}
