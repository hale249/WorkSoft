<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends ProtectedController
{
    public function index(Request $request)
    {
        $jobProgress = Job::query()
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
        return view('elements.dashboard.index');
    }
}
