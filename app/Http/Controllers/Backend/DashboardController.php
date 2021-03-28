<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Meeting;
use App\Models\Project;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $countUser = User::query()->count();
        $countProject = Project::query()->count();
        $countMeetingUpcoming = Meeting::query()->where('date_meeting', '>' ,date('Y-m-d'))->count();
        $countTask = Task::query()->count();

        $statistical = (object) [
            'user' => $countUser,
            'project' => $countProject,
            'meeting' => $countMeetingUpcoming,
            'task' => $countTask,
        ];
        return view('backend.elements.dashboard.index', compact('statistical'));
    }
}
