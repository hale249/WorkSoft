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
}
