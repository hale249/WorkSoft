<?php

namespace App\Http\Controllers\Backend;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Models\Job;
use App\Models\Meeting;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $queryJob = Job::query();
        $queryMeeting = Meeting::query();
        if (Helper::checkRole(Auth::user())) {
            $queryJob = $queryJob->where('user_id', Auth::id());
            $queryMeeting = $queryMeeting->whereHas('meetingUser', function ($q) {
                $q->where('user_id', Auth::id());
            });
        }
        $listYears = $this->getListYears();
        $countUser = User::query()->count();
        $countProject = $queryJob->count();
        $countMeetingUpcoming = $queryMeeting->where('date_meeting', '>' ,date('Y-m-d'))->count();
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
//        dd($this->statisticalUser());
        return view('backend.elements.dashboard.index', compact('statistical', 'statusJob', 'listYears'));
    }

    public function personRatings()
    {
        $jobs = Job::all();
    }

    private function getListYears()
    {
        return Job::query()
            ->selectRaw('YEAR(created_at) as years')
            ->pluck('years', 'years')
            ->toArray();
    }

    private function statisticalUser()
    {
        $static = DB::table('users')
            ->leftJoin('projects', 'users.id', '=', 'projects.user_id')
            ->select(['users.first_name', 'users.last_name', 'projects.id'])
            ->get();
        return $static;
    }
}
