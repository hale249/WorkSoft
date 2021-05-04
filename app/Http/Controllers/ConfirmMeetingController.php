<?php


namespace App\Http\Controllers;


use App\Models\Meeting;
use App\Models\MeetingUser;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ConfirmMeetingController
{
    public function reject($meetingId, $userId, Request $request)
    {
        $meeting = MeetingUser::query()
            ->where('meeting_id', $meetingId)
            ->where('user_id', $userId)
            ->first();

        return view('reject.meeting', compact('meeting'));
    }

    public function sendReject($meetingId, $userId, Request $request)
    {
        $request->validate([
            'note' => 'required',
        ]);
        $meeting = MeetingUser::query()
            ->where('meeting_id', $meetingId)
            ->where('user_id', $userId)
            ->first();

        $meeting->update([
                'is_embark' => 0,
                'note' => $request->note,
                'reply_at' => Carbon::now()
            ]);

        return view('accuracy.reject');
    }

    public function accept(Request $request)
    {
        $meeting = MeetingUser::query()
            ->where('meeting_id', $request->meetingId)
            ->where('user_id', $request->userId)
            ->update([
            'is_embark' => 1,
            'reply_at' => Carbon::now()
        ]);
        return view('accuracy.accept');
    }
}
