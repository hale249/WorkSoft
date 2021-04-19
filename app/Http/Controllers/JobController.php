<?php

namespace App\Http\Controllers;

use App\Helpers\Constant;
use App\Helpers\Helper;
use App\Helpers\ResponseTrait;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateJobRequest;
use App\Jobs\SendMail;
use App\Mail\EmailAssignJob;
use App\Mail\EmailMeeting;
use App\Models\Category;
use App\Models\Job;
use App\Models\JobAttachment;
use App\Models\JobUserPerson;
use App\Models\Status;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use \Illuminate\Support\Str;
use App\Helpers\FileType;
use Maatwebsite\Excel\Excel;

class JobController extends ProtectedController
{
    use ResponseTrait;

    public function index(Request $request)
    {
        $jobs = Job::query();
        if (Helper::checkRole(Auth::user()) === false) {
            $jobs = $jobs->where('user_id', Auth::id());
        }
        $name = $request->get('name');
        $status = $request->status;
        if (!empty($name)) {
            $jobs = $jobs->where('name', 'like', '%' . $name . '%');
        }

        if (!empty($status)) {
            $jobs = $jobs->where('status_id', $status);
        }
        $jobs = $jobs->orderBy('deadline', 'desc')
            ->paginate(Constant::DEFAULT_PER_PAGE);

        $categories = Category::all();
        $users = User::all();
        $statuses = Status::all();

        return view('elements.job.index', compact('jobs', 'users', 'categories', 'statuses'));
    }

    public function store(Request $request)
    {
        $data = $request->only([
            'name',
            'description',
            'category_id',
            'deadline',
            'user_id',
        ]);
        $data['uuid'] = Str::uuid()->toString();
        $data['created_by'] = $this->currentUser->id;
        $data['status_id']  = Status::query()->first()->id;
        $job = Job::create($data);

        dispatch( new SendMail([$this->getUserDetail($job->user_id)->email], new EmailAssignJob($this->getUserDetail($job->user_id), $job)));

        return redirect()->back()->with('message','Tạo công việc thành công');
    }

    public function show(int $id)
    {
        $job = Job::query()->where('id', $id)->with([
            'user', 'category', 'createdBy', 'status'])->first();

        $attachments = JobAttachment::query()
            ->where('job_id', $id)
            ->get();

        $users = User::query()->select(['id', 'name'])->get();

        $statuses = Status::all();

        return view('elements.job.show', compact('job', 'users', 'statuses', 'attachments'));
    }

    public function edit(int $id)
    {
        $job = Job::find($id);
        $categories = Category::all();
        $users = User::all();

        $data = [
            'job'=> $job,
            'categories'=> $categories,
            'users'=> $users,
        ];

        return $this->success('Hien thi thanh cong', $data);
    }

    public function update(Request $request, int $id)
    {
        $job = Job::find($id);
        $userId = Auth::id();
        $data = $request->only([
            'description',
            'content',
            'category_id',
            'user_id',
            'deadline',
            'content',
            'status_id',
        ]);
        $data['created_by'] = $userId;

        $job->update($data);

        return $this->success('Chỉnh sửa công việc thành công');
    }

    public function ajaxUploadAttachment(Request $request, int $jobId)
    {
        $userId = Auth::id();
        $job = Job::find($jobId);
        if (empty($job)) {
            return $this->error('Job not found.');
        }

        $attachment = $request->file('file');
        $imageName = time() . $attachment->getClientOriginalName();
        $extension = $attachment->getClientOriginalExtension();
        $pathToFile = 'files/jobs/' . $imageName;

        Storage::put($pathToFile, fopen($attachment, 'r+'), 'public');

        $url = Storage::url($pathToFile);

        $now = Carbon::now();
        $attachment = JobAttachment::create([
            'job_id' => $jobId,
            'file_name' => $imageName,
            'file_path' => $pathToFile,
            'url' => $url,
            'created_by' => $userId,
            'type' => JobAttachment::getFileType($extension),
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        return $this->success('Attachment has been uploaded successfully.', $attachment);
    }

    public function ajaxDeleteAttachment(int $jobId, int $attachmentId)
    {
        $attachment = JobAttachment::query()
            ->where('job_id', $jobId)
            ->where('id', $attachmentId)
            ->first();

        $attachment->delete();

        return redirect()->back()->with('message', __('Xoá tài liệu thành công'));
    }

    public static function getFileType(?string $extension): ?string
    {
        $extension = strtolower(trim($extension)) ?? '';

        switch ($extension) {
            case 'pdf':
                return FileType::PDF;

            case 'doc':
            case 'docx':
                return FileType::WORD;

            case 'xls':
            case 'xlsx':
                return FileType::EXCEL;

            case 'ppt':
            case 'pptx':
                return FileType::POWERPOINT;

            case 'xml':
                return FileType::XML;

            case 'csv':
                return FileType::CSV;

            case 'png':
            case 'jpg':
            case 'jpeg':
            case 'gif':
            case 'svg':
                return FileType::IMAGE;

            default:
                return null;
        }
    }

    public function getUserDetail($id) {
        return User::find($id);
    }

    public function sendMessage(Request $request, $id)
    {
        $request->validate([
            'finish_mess' => 'required',
        ]);

        $job = Job::find($id);
        $job->update([
            'finish_mess' => $request->finish_mess
        ]);

        return redirect()->back()->with('message','Gửi xác nhận nội dung công việc thành công');
    }

    public function taskList(int $jobId) {

    }
}
