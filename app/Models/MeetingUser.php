<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MeetingUser extends Model
{
    protected $table = 'meeting_users';

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function getIsEmbarkedAttribute()
    {
        if ($this->is_embark) {
            return '<span class="badge badge-success">Tham gia</span>';
        }
        return  '<span class="badge badge-secondary">Chưa xác nhận</span>';
    }

}
