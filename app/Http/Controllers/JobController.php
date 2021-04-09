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
use App\Models\JobUser;
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
        $status = $request->get('status');
        if (!empty($name)) {
            $jobs = $jobs->where('name', 'like', '%' . $name . '%');
        }
        if (!empty($status)) {
            $jobs = $jobs->where('status_id', $status);
        }
        $jobs = $jobs->orderBy('deadline', 'desc')
            ->paginate(Constant::DEFAULT_PER_PAGE);

        $statuses = Status::all();
        $categories = Category::all();
        $users = User::all();

        return view('elements.job.index', compact('jobs', 'statuses', 'users', 'categories'));
    }

    public function store(Request $request)
    {
        $data = $request->only([
            'name',
            'description',
            'category_id',
            'deadline',
            'job_ranting'
        ]);
        $data['created_by'] = $this->currentUser->id;
        $data['status_id'] = Status::query()->first()->id ?? 1;
        $job = Job::create($data);

        JobUser::query()->updateOrCreate([
            'job_id' => $job->id,
            'user_id' => $request->user_id,
            'person_support' => $request->person_mission,
        ]);
        dispatch( new SendMail([$this->getUserDetail($request->user_id)->email], new EmailAssignJob($this->getUserDetail($request->user_id), $job)));
        dispatch( new SendMail([$this->getUserDetail($request->person_mission)->email], new EmailAssignJob($this->getUserDetail($request->person_mission), $job)));

        foreach ($request->person_support as $item) {
            JobUserPerson::query()->updateOrCreate([
                'job_id' => $job->id,
                'job_user_id' => $request->user_id,
                'user_id' => $item,
            ]);
            dispatch( new SendMail([$this->getUserDetail($item)->email], new EmailAssignJob($this->getUserDetail($item), $job)));
        }
       /* if ($job) {
            Mail::to($job->user->email)->send(new EmailAssignJob($job->user, $job));
        }*/

        return $this->success('Tạo công việc thành công', $job);
    }

    public function show(int $id)
    {
        $job = Job::query()->where('id', $id)->with(['user', 'category'])->first();

        return view('backend.elements.job.show', compact('job'));
    }

    public function edit(int $id)
    {
        $job = Job::find($id);
        $categories = Category::all();
        $users = User::all();
        $statuses = Status::all();

        $data = [
            'job'=> $job,
            'categories'=> $categories,
            'users'=> $users,
            'statuses'=> $statuses,
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
            'person_support',
            'person_mission',
            'job_ranting'
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
        $pathToFile = 'jobs/' . $jobId . '/attachments/' . $imageName;

        Storage::put($pathToFile, fopen($attachment, 'r+'), 'public');

        $url = Storage::url($pathToFile);

        $now = Carbon::now();
        $attachment = JobAttachment::create([
            'project_id' => $jobId,
            'file_name' => $imageName,
            'file_path' => $pathToFile,
            'url' => $url,
            'upload_by' => $userId,
            'type' => JobAttachment::getFileType($extension),
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        return $this->success('Attachment has been uploaded successfully.', $attachment);
    }

    public function ajaxDeleteAttachment(int $jobId, int $attachmentId)
    {
        $attachment = JobAttachment::query()
            ->where('project_id', $jobId)
            ->where('id', $attachmentId)
            ->first();

        $attachment->delete();

        return redirect()->route('backend.jobs.index')->with('flash_success', __('Xoá tài liệu thành công'));
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
}
