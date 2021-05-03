<?php

namespace App\Models;

use App\Models\Traits\Attributes\MeetingAttribute;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Meeting extends Model
{
    use MeetingAttribute, SoftDeletes;

    protected $table = 'meetings';

    protected $guarded = [];

    protected $appends = ['count_user_join', 'count_user_attend', 'sent_count_meeting'];

    public function meetingUsers()
    {
        return $this->hasMany(MeetingUser::class, 'meeting_id', 'id');
    }

    public function getTimeStartEndAttribute()
    {
        return Carbon::createFromFormat('H:i:s',$this->time_start)->format('h:i') . ' - ' . Carbon::createFromFormat('H:i:s',$this->time_end)->format('h:i');
    }

    public function auth()
    {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }

    public function meetingUser()
    {
        return $this->hasMany(MeetingUser::class, 'meeting_id', 'id');
    }

    public function getCountUserJoinAttribute()
    {
        $userJoins = $this->meetingUser;
        $dem = 0;
        foreach ($userJoins as $meeting) {
            if ($meeting->is_embark) {
                $dem ++;
            }
        }
        return $dem;
    }

    public function getCountUserAttendAttribute()
    {
        $userJoins = $this->meetingUser;
        $dem = 0;
        foreach ($userJoins as $meeting) {
            if ($meeting->is_attend) {
                $dem ++;
            }
        }
        return $dem;
    }

    public function getSentCountMeetingAttribute()
    {
        $userJoins = $this->meetingUser;
        $dem = 0;
        foreach ($userJoins as $meeting) {
            if ($meeting->user_id) {
                $dem ++;
            }
        }
        return $dem;
    }
}
