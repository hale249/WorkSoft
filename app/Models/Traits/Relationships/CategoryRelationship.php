<?php

namespace App\Models\Traits\Relationships;

use App\Models\Product;
use App\Models\User;

trait CategoryRelationship
{
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function products()
    {
        return $this->hasMany(Product::class, 'category_id', 'id');
    }
}
