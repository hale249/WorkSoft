<?php


namespace App\Http\Controllers\Backend;


use App\Helpers\Constant;
use App\Http\Controllers\Controller;
use App\Http\Requests\TaskRequest;
use App\Models\Job;
use App\Models\Status;
use App\Models\Task;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TaskController extends Controller
{
    public function index(Request $request, int $jobId)
    {
        $name = $request->input('name');
        $status = $request->input('status');
        $job = Job::query()->findOrFail($jobId);
        $tasks = Task::query()
            ->where('project_id', $jobId);
        if (!empty($name)) {
            $tasks = $tasks->where('name','like', '%' . $name . '%');
        }
        if (!empty($status)) {
            $tasks = $tasks->where('status_id', $status);
        }
        $tasks = $tasks->orderBy('created_at', 'desc')
            ->paginate(Constant::DEFAULT_PER_PAGE);

        $statuses = Status::all();

        return view('backend.elements.task.index', compact('tasks', 'job', 'statuses'));
    }

    public function create(int $jobId)
    {
        $job = Job::query()->findOrFail($jobId);
        $statuses = Status::all();

        return view('backend.elements.task.create', compact('job', 'statuses'));
    }

    public function store(TaskRequest $request, int $jobId)
    {
        $userId = Auth::id();
        $data = $request->only([
            'name',
            'description',
            'status_id',
            'deadline',
        ]);
        $data['project_id'] = $jobId;
        $data['created_by'] = $userId;
        $data['slug'] = Str::slug($request->get('name'));
        Task::create($data);

        return redirect()->route('backend.job_task.index', ['id' => $jobId])->with('flash_success', __('Tạo nhiệm thành công'));
    }

    public function show(int $jobId, $taskId)
    {
        $job = Job::query()->findOrFail($jobId);
        $task = Task::query()->where('id', $taskId)->with('status')->first();

        return view('backend.elements.task.show', compact('job', 'task'));
    }

    public function edit(int $jobId, $taskId)
    {
        $job = Job::query()->findOrFail($jobId);
        $task = Task::query()->where('id', $taskId)->with('status')->first();
        $statuses = Status::all();

        return view('backend.elements.task.edit', compact('job', 'task', 'statuses'));
    }

    public function update(TaskRequest $request, int $jobId, int $taskId)
    {
        $task = Task::query()->findOrFail($taskId);
        $userId = Auth::id();
        $data = $request->only([
            'name',
            'description',
            'status_id',
            'deadline',
        ]);
        $data['project_id'] = $jobId;
        $data['created_by'] = $userId;
        $data['slug'] = Str::slug($request->get('name'));

        $task->update($data);

        return redirect()->route('backend.job_task.index', ['id' => $jobId])->with('flash_success', __('Chỉnh sửa nhiệm thành công'));
    }

    public function destroy(int $jobId, int $taskId)
    {
        $job = Job::query()->findOrFail($jobId);
        $category = Task::query()->findOrFail($taskId);
        $category->delete();

        return redirect()->route('backend.job_task.index', ['id' => $jobId])->with('flash_success', __('Xoá nhiệm vụ thành công'));
    }
}
