<?php


namespace App\Http\Controllers\Backend;


use App\Helpers\Constant;
use App\Http\Controllers\Controller;
use App\Http\Requests\TaskRequest;
use App\Models\Project;
use App\Models\Status;
use App\Models\Task;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TaskController extends Controller
{
    public function index(Request $request, int $projectId)
    {
        $data = $request->input('name');
        $project = Project::query()->findOrFail($projectId);
        $tasks = Task::query()
            ->where('project_id', $projectId);
        if (!empty($data)) {
            $tasks = $tasks->where('name','like', '%' . $data . '%');
        }
        $tasks = $tasks->orderBy('created_at', 'desc')
            ->paginate(Constant::DEFAULT_PER_PAGE);

        return view('backend.elements.task.index', compact('tasks', 'project'));
    }

    public function create(int $projectId)
    {
        $project = Project::query()->findOrFail($projectId);
        $statuses = Status::all();

        return view('backend.elements.task.create', compact('project', 'statuses'));
    }

    public function store(TaskRequest $request, int $projectId)
    {
        $userId = Auth::id();
        $data = $request->only([
            'name',
            'description',
            'status_id',
            'deadline',
        ]);
        $data['project_id'] = $projectId;
        $data['created_by'] = $userId;
        $data['slug'] = Str::slug($request->get('name'));
        Task::create($data);

        return redirect()->route('backend.project_task.index', ['id' => $projectId])->with('flash_success', __('Tạo nhiệm thành công'));
    }

    public function show(int $projectId, $taskId)
    {
        $project = Project::query()->findOrFail($projectId);
        $task = Task::query()->where('id', $taskId)->with('status')->first();

        return view('backend.elements.task.show', compact('project', 'task'));
    }

    public function edit(int $projectId, $taskId)
    {
        $project = Project::query()->findOrFail($projectId);
        $task = Task::query()->where('id', $taskId)->with('status')->first();
        $statuses = Status::all();

        return view('backend.elements.task.edit', compact('project', 'task', 'statuses'));
    }

    public function update(TaskRequest $request, int $projectId, int $taskId)
    {
        $task = Task::query()->findOrFail($taskId);
        $userId = Auth::id();
        $data = $request->only([
            'name',
            'description',
            'status_id',
            'deadline',
        ]);
        $data['project_id'] = $projectId;
        $data['created_by'] = $userId;
        $data['slug'] = Str::slug($request->get('name'));

        $task->update($data);

        return redirect()->route('backend.project_task.index', ['id' => $projectId])->with('flash_success', __('Chỉnh sửa nhiệm thành công'));
    }

    public function destroy(int $projectId, int $taskId)
    {
        $project = Project::query()->findOrFail($projectId);
        $category = Task::query()->findOrFail($taskId);
        $category->delete();

        return redirect()->route('backend.project_task.index', ['id' => $projectId])->with('flash_success', __('Xoá nhiệm vụ thành công'));
    }
}
