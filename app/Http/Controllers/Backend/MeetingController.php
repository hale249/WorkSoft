<?php

namespace App\Http\Controllers\Backend;

use App\Helpers\Constant;
use App\Helpers\Helper;
use App\Helpers\Traits\FileHelperTrait;
use App\Http\Controllers\Controller;
use App\Http\Requests\MeetingRequest;
use App\Jobs\SendEmailMeetingJob;
use App\Models\Meeting;
use App\Models\MeetingUser;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class MeetingController extends Controller
{
    use FileHelperTrait;

    public function index(Request $request)
    {
        $meetings = Meeting::query();
        if (Helper::checkRole(Auth::user()) === false) {
            $meetings = $meetings->whereHas('meetingUser', function ($q) {
                $q->where('user_id', Auth::id());
            });
        }
        $data = $request->input('name');
        if (!empty($data)) {
            $meetings = $meetings->where('name','like', '%' . $data . '%');
        }
        $meetings = $meetings->orderBy('date_meeting', 'desc')
            ->paginate(Constant::DEFAULT_PER_PAGE);


        return view('backend.elements.meeting.index', compact('meetings'));
    }

    public function create()
    {
        $userId = Auth::id();
        $users = User::query()->where('id', '!=', $userId)->get();
        return view('backend.elements.meeting.create', compact('users'));
    }

    public function store(MeetingRequest $request)
    {
        $userId = Auth::id();
        $data = $request->only([
            'name',
            'description',
            'date_meeting',
            'start_meeting',
            'end_meeting',
        ]);
        if ($request->hasFile('document_file')) {
            if (!empty($dataFile)) {
                $dataFile = $this->uploadFile($request->file('document_file'), 'meetings', 'meetings');
                $data['document_file'] = $dataFile['file_name'];
                $data['document_file_url'] = $dataFile['url'];
            }
        }

        $users = User::query()->where('id', '!=', $userId)->get();
        $data['created_by'] = $userId;
        $meeting = Meeting::create($data);
        $emailJob = new SendEmailMeetingJob($users, $meeting);
        dispatch($emailJob);

        return redirect()->route('backend.meeting.index')->with('flash_success', __('Tạo cuộc họp thành công'));
    }

    public function show(int $id)
    {
        $meeting = Meeting::find($id);

        return view('backend.elements.meeting.show', compact('meeting'));
    }

    public function edit(int $id)
    {
        $meeting = Meeting::find($id);

        return view('backend.elements.meeting.edit', compact('meeting'));

    }

    public function update(MeetingRequest $request, int $id)
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
        if ($request->hasFile('document_file')) {
            if (!empty($dataFile)) {
                $dataFile = $this->uploadFile($request->file('document_file'), 'meetings', 'meetings');
                $data['document_file'] = $dataFile['file_name'];
                $data['document_file_url'] = $dataFile['url'];
            }
        }
        $users = User::query()->where('id', '!=', $userId)->get();
        $data['created_by'] = $userId;

       /* $emailJob = new SendEmailMeetingJob($users, $meeting);
        dispatch($emailJob);*/

        $meeting->update($data);

        return redirect()->route('backend.meeting.index')->with('flash_success', __('Chỉnh sửa lập lịch'));
    }

    public function destroy(int $id)
    {
        $category = Meeting::query()->findOrFail($id);
        $category->delete();

        return redirect()->route('backend.meeting.index')->with('flash_success', __('Xóa lập lịch thành công'));
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
