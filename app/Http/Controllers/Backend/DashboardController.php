<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Job;
use App\Models\Meeting;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $countUser = User::query()->count();
        $countProject = Job::query()->count();
        $countMeetingUpcoming = Meeting::query()->where('date_meeting', '>' ,date('Y-m-d'))->count();
        $countTask = Task::query()->count();

        $statusPro = Job::query()
            ->select([
                'statuses.name as name',
                'statuses.color as color',
                DB::raw('COUNT(*) as totalProject')
            ])
            ->join('statuses', 'statuses.id', '=', 'status_id')
            ->groupBy('name', 'color')
            ->get();

        $labels = $statusPro->pluck('name')->toArray();
        $totalValues = $statusPro->pluck('totalProject')->toArray();
        $colorValues = $statusPro->pluck('color')->toArray();

        $statusJob = (object)[
            'label' => $labels,
            'color' => $colorValues,
            'data' => $totalValues
        ];

        $statistical = (object) [
            'user' => $countUser,
            'project' => $countProject,
            'meeting' => $countMeetingUpcoming,
            'task' => $countTask,
        ];
        return view('backend.elements.dashboard.index', compact('statistical', 'statusJob'));
    }

    public function personRatings()
    {
        $jobs = Job::all();
    }
}
