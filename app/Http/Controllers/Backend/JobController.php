<?php

namespace App\Http\Controllers\Backend;

use App\Helpers\Constant;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProjectRequest;
use App\Mail\EmailAssignJob;
use App\Models\Category;
use App\Models\Job;
use App\Models\JobAttachment;
use App\Models\Status;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use \Illuminate\Support\Str;

class JobController extends Controller
{
    public function index(Request $request)
    {
        $name = $request->get('name');
        $status = $request->get('status');
        $jobs = Job::query();
        if (!empty($name)) {
            $jobs = $jobs->where('name','like', '%' . $name . '%');
        }
        if (!empty($status)) {
            $jobs = $jobs->where('status_id', $status);
        }
        $jobs = $jobs->orderBy('deadline', 'desc')
            ->paginate(Constant::DEFAULT_PER_PAGE);

        $statuses = Status::all();

        return view('backend.elements.job.index', compact('jobs', 'statuses'));
    }

    public function create()
    {
        $categories = Category::all();
        $users = User::all();
        $statuses = Status::all();

        return view('backend.elements.job.create', compact('categories', 'users', 'statuses'));
    }

    public function store(ProjectRequest $request)
    {
        $userId = Auth::id();
        $data = $request->only([
            'name',
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
        $data['slug'] = Str::slug($request->get('name'));
        $job = Job::create($data);
        if ($job) {
            Mail::to($job->user->email)->send(new EmailAssignJob($job->user, $job));
        }

        return redirect()->route('backend.jobs.index')->with('flash_success', __('Tạo công việc thành công'));
    }

    public function show(int $id)
    {
        $job =Job::query()->where('id', $id)->with(['user', 'category'])->first();

        return view('backend.elements.job.show', compact('job'));
    }

    public function edit(int $id)
    {
        $job = Job::find($id);
        $categories = Category::all();
        $users = User::all();
        $statuses = Status::all();

        return view('backend.elements.job.edit', compact('job', 'categories', 'users', 'statuses'));
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

        return redirect()->route('backend.jobs.index')->with('flash_success', __('Chỉnh sửa công việc thành công'));
    }

    public function ajaxUploadAttachment(Request $request, int $jobId): JsonResponse
    {
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
            'job_id' => $jobId,
            'name' => $imageName,
            'path_name' => $pathToFile,
            'url' => $url,
            'type' => JobAttachment::getFileType($extension),
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        return $this->success('Attachment has been uploaded successfully.', $attachment);
    }

    public function ajaxDeleteAttachment(int $jobId, int $attachmentId): JsonResponse
    {
        $attachment = JobAttachment::query()
            ->where('job_id', $jobId)
            ->where('id', $attachmentId)
            ->first();
        if (empty($attachment)) {
            return $this->error('Attachment is not found.');
        }

        $attachment->delete();

        return $this->success('Attachment has been deleted successfully.');
    }
}
