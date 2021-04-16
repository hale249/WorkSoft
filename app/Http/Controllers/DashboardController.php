<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Models\Job;
use App\Models\Meeting;
use App\Models\MeetingUser;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardController extends ProtectedController
{
    public function index(Request $request)
    {
        /*jobProgress = Job::query()
            ->join('statuses', 'active_jobs.status_id', '=', 'statuses.id')
            ->join('users', function ($a) {
                $a->on('active_jobs.user_id', '=', 'users.id') ;
            })
            ->select([
                DB::raw('COUNT(*) as total'),
                DB::raw('YEAR(active_jobs.created_at) as year'),
                'statuses.name as status',
                'users.name as username'])
            ->groupBy('statuses.name', 'users.name', 'year')
            ->get();

        $data = [
            'year' => [],
            'status' => [],
            'username' => [],
            'total' => []
        ];

        foreach ($jobProgress as $job) {
           array_push($data['year'], $job->year);
           array_push($data['status'], $job->status);
           array_push($data['username'], $job->username);
           array_push($data['total'], $job->total);
        }

        $timeNow = Carbon::today()->toDateString();
        $startM = Meeting::query()
            ->where('date_meeting','>=', $timeNow)
            ->orderBy('date_meeting', 'asc')
            ->first();

        $meetingUser = MeetingUser::query()->where('meeting_id', $startM->id)
            ->where('user_id', Auth::id())
            ->first();

        if ((!Helper::checkRole($this->currentUser) && !empty($meetingUser)) || Helper::checkRole($this->currentUser)) {
            $meetingStart = $startM;
        } else {
            $meetingStart = '';
        }

        $queryJob = Job::query();
        $jobUsers = $queryJob->where('deadline', '>=' ,$timeNow)
            ->where('user_id', Auth::id())->get();

        $queryMeeting = Meeting::query();
        $meetingTime = $queryMeeting->where('date_meeting','>=', $timeNow)
            ->get();

        if ($request->year) {
            $jobs = $queryJob->where('created_at', 'LIKE', $request->year)->get();
        } else {
            $jobs = $queryJob->get();
        }

        $countUser = count(User::all());

        $jobTime = Job::query()->where('deadline', '>=' ,$timeNow)->get();

        $statusJob = Job::query()
            ->select([
                'statuses.name as name',
                'statuses.color as color',
                DB::raw('COUNT(*) as total')
            ])
            ->join('statuses', 'statuses.id', '=', 'status_id')
            ->groupBy('name', 'color')
            ->get();

        $labels = $statusJob->pluck('name')->toArray();
        $totalValues = $statusJob->pluck('total')->toArray();
        $colorValues = $statusJob->pluck('color')->toArray();

        $statusJob = (object)[
            'label' => $labels,
            'color' => $colorValues,
            'data' => $totalValues
        ];

        $statistical = (object) [
            'countMeeting' => count($meetingTime),
            'countJobTime' => count($jobTime),
            'countJob' => count($jobs),
            'countUser' => $countUser,
        ];*/

        return view('elements.dashboard.index');
    }
}
