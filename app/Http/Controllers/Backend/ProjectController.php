<?php

namespace App\Http\Controllers\Backend;

use App\Helpers\Constant;
use App\Http\Controllers\Controller;
use App\Http\Requests\MeetingRequest;
use App\Http\Requests\ProjectRequest;
use App\Mail\EmailAssignJob;
use App\Models\Category;
use App\Models\Meeting;
use App\Models\Project;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use \Illuminate\Support\Str;

class ProjectController extends Controller
{
    public function index(Request $request)
    {
        $data = $request->get('name');
        $projects = Project::query();
        if (!empty($data)) {
            $projects = $projects->where('name','like', '%' . $data . '%');
        }
        $projects = $projects->orderBy('created_at', 'desc')
            ->paginate(Constant::DEFAULT_PER_PAGE);

        return view('backend.elements.project.index', compact('projects'));
    }

    public function create()
    {
        $categories = Category::all();
        $users = User::all();

        return view('backend.elements.project.create', compact('categories', 'users'));
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
            'content'
        ]);
        $data['created_by'] = $userId;
        $data['slug'] = Str::slug($request->get('name'));
        $project = Project::create($data);
        if ($project) {
            Mail::to($project->user->email)->send(new EmailAssignJob($project->user, $project));
        }

        return redirect()->route('backend.projects.index')->with('flash_success', __('Tạo cuộc họp thành công'));
    }

    public function show(int $id)
    {
        $project =Project::query()->where('id', $id)->with(['user', 'category'])->first();

        return view('backend.elements.project.show', compact('project'));
    }

    public function edit(int $id)
    {
        $project = Project::find($id);
        $categories = Category::all();
        $users = User::all();

        return view('backend.elements.project.edit', compact('project', 'categories', 'users'));
    }

    public function update(int $id)
    {

    }
}
