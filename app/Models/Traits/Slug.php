<?php

namespace App\Models\Traits;

use Illuminate\Support\Str;

trait Slug
{
    protected static function boot(): void
    {
        parent::boot();

        static::creating(function ($model) {
            $slug = Str::slug($model->name);
            $i = 1;
            while (true) {
                if(!self::query()->where('slug', $slug)->count()) {
                    break;
                }

                $slug = Str::slug($model->name) . '-' . $i;
                $i++;
            }
            $model->slug = $slug;
        });
    }
}
