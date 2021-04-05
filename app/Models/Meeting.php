<?php

namespace App\Models;

use App\Models\Traits\Attributes\MeetingAttribute;
use Illuminate\Database\Eloquent\Model;

class Meeting extends Model
{
    use MeetingAttribute;

    protected $table = 'meetings';

    protected $guarded = [];

    public function users()
    {
        return $this->hasMany(MeetingUser::class, 'user_id', 'id');
    }

    public function getTimeStartEndAttribute()
    {
        return $this->start_meeting . ' - ' . $this->end_meeting;
    }

    public function auth()
    {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }

    public function meetingUser()
    {
        return $this->hasMany(MeetingUser::class, 'meeting_id', 'id');
    }
}
