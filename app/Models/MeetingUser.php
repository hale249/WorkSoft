<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MeetingUser extends Model
{
    protected $table = 'meeting_users';

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'meeting_id');
    }
}
