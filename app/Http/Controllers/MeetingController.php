<?php

namespace App\Http\Controllers;

use App\Helpers\Constant;
use App\Helpers\Helper;
use App\Helpers\ResponseTrait;
use App\Helpers\Traits\FileHelperTrait;
use App\Http\Controllers\Controller;
use App\Http\Requests\MeetingRequest;
use App\Jobs\SendEmailMeetingJob;
use App\Jobs\SendMail;
use App\Mail\EmailMeeting;
use App\Models\Meeting;
use App\Models\MeetingUser;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class MeetingController extends ProtectedController
{
    use FileHelperTrait, ResponseTrait;

    public function index(Request $request)
    {
        $meetings = Meeting::query();
        $data = $request->input('name');
        if (!empty($data)) {
            $meetings = $meetings->where('name','like', '%' . $data . '%');
        }
        $meetings = $meetings->orderBy('date_meeting', 'desc')
            ->paginate(Constant::DEFAULT_PER_PAGE);

        $users = User::query()
            ->where('id', '<>', $this->currentUser->id)
            ->get();

        return view('elements.meeting.index', compact('meetings','users'));
    }

    public function store(MeetingRequest $request)
    {
        $data = $request->only([
            'name',
            'description',
            'date_meeting',
            'time_start',
            'time_end',
        ]);
        $data['uuid'] = Str::uuid()->toString();
        $meeting = Meeting::create($data);

        foreach ($request->user as $userId) {
            $user = User::find($userId);
            MeetingUser::query()->updateOrCreate([
                'meeting_id' => $meeting->id,
                'user_id' => $userId
            ]);
//            dispatch( new SendMail([$user->email], new EmailMeeting($user, $meeting)));
         }

        return $this->success('Tạo cuộc họp thành công', $meeting);
    }

    public function edit(int $id)
    {
        $meeting = Meeting::find($id);

        return $this->success('Chỉnh sửa lập lịch', $meeting);

    }

    public function update(Request $request, int $id)
    {
        $meeting = Meeting::find($id);
        $userId = Auth::id();
        $data = $request->only([
            'name',
            'description',
            'date_meeting',
            'start_meeting',
            'end_meeting',
        ]);

        $meeting->update($data);

        return $this->success('Chỉnh sửa lập lịch');
    }

    public function destroy(int $id)
    {
        $category = Meeting::query()->findOrFail($id);
        $category->delete();

        return $this->success('Xóa thành công');
    }

    public function reply(Request $request, int $meetingId, int $userId)
    {
        $join = $request->is_join;
        $meeting = MeetingUser::query()
            ->where('meeting_id', $meetingId)
            ->where('user_id', $userId)
            ->first();
        $meeting->update([
            'is_join' => $join,
            'reply_at' => Carbon::now()
        ]);

        return redirect()->route('meeting.show', ['id' => $meetingId]);
    }
}
