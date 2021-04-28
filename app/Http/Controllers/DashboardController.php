<?php

namespace App\Http\Controllers;

use App\Helpers\Constant;
use App\Models\Job;
use App\Models\Meeting;
use App\Models\MeetingUser;
use App\Models\Status;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends ProtectedController
{
    public function index(Request $request)
    {
        $requestYear = !empty($request->year) ? $request->year : Carbon::now()->year;

        $queryJob = Job::query();


        // lấy năm tạo job
        $createdYearJobs = $queryJob->select(DB::raw('YEAR(created_at)  as years'))->get();

        $yearJob = [];
        foreach ($createdYearJobs as $job) {
            array_push($yearJob, $job->years);
        }
        $listYears = array_unique($yearJob);

        $statuses = Status::query()->get()->pluck('name', 'id')->toArray();

        $statusApprovalId = Status::query()->where('name', Constant::STATUS_APPROVAL)->first()->id;
        if ($this->currentUser->role === 1) {

            // thống kê
            $countJob = $queryJob->whereYear('created_at', $requestYear)->count();
            $countJobCompleted = $queryJob->where('status_id', $statusApprovalId)
                ->whereYear('created_at', $requestYear)
                ->count();

            $countUser = User::query()->whereYear('created_at', $requestYear)->count();

            $meetingUpcomings = Meeting::query()
                ->whereDate('date_meeting', '>=', Carbon::now()->toDateString())
                ->whereYear('created_at', $requestYear)
                ->orderBy('date_meeting', 'asc')->get();

            $countMeetingUpcoming = $meetingUpcomings->count();

            $jobApprovals = Job::query()->where('status_id', $statusApprovalId)
                ->whereYear('created_at', $requestYear)
                ->orderBy('deadline', 'asc')->get();

            // Trạng thái công việc
            $statusJob = DB::table('active_jobs')
                ->select([
                    'statuses.name as name',
                    'statuses.id as status_id',
                ])
                ->join('statuses', 'statuses.id', '=', 'status_id')
                ->whereYear('active_jobs.created_at', $requestYear)
                ->get();

            // Thông kê tiến dộ công việc
            $jobUser = DB::table('active_jobs')
                ->join('statuses', 'active_jobs.status_id', '=', 'statuses.id')
                ->join('users', 'active_jobs.user_id', '=', 'users.id')
                ->select(
                    DB::raw('users.id as user_id, users.name as user_name,
                users.role as user_role, active_jobs.id as active_job_id, active_jobs.name as active_jobs_name,
                active_jobs.created_at as active_job_created_at, statuses.id as status_id, statuses.name as status_name'))
                ->whereYear('active_jobs.created_at', $requestYear)
                ->get();

            $response = [];
            $users = User::query()->get()->pluck('name', 'id')->toArray();
            $label = [];
            $dataSetStart = [];
            $dataSetCompleted = [];
            $dataSetApproval = [];
            $dataSetOutOfDate = [];
            $labelStatus = [
                Constant::STATUS_START,
                Constant::STATUS_APPROVAL,
                Constant::STATUS_COMPLETED,
                Constant::STATUS_OUT_OF_DATE,
            ];
            foreach ($users as $userId => $userName) {
                foreach ($statuses as $statusId => $statusName) {
                    $response[$userName][$statusName] = $jobUser->where('user_id', $userId)->where('status_id', $statusId)->count();
                }
            }

            foreach ($response as $key=>$item) {
                array_push($label, $key);
                array_push($dataSetStart, $item[Constant::STATUS_START]);
                array_push($dataSetApproval, $item[Constant::STATUS_APPROVAL]);
                array_push($dataSetCompleted, $item[Constant::STATUS_COMPLETED]);
                array_push($dataSetOutOfDate, $item[Constant::STATUS_OUT_OF_DATE]);
            }

            $jobProgress = [
                'data' => $label,
                'label' => $labelStatus,
                'start' => $dataSetStart,
                'approval' => $dataSetApproval,
                'completed' => $dataSetCompleted,
                'out_of_date' => $dataSetOutOfDate,
            ];

            $statistical = [
                'countJob' => $countJob,
                'countUser' => $countUser,
                'countJobCompleted' => $countJobCompleted,
                'meetingUpcoming' => $countMeetingUpcoming
            ];

            return view('elements.dashboard.index', compact('jobProgress', 'statistical', 'listYears', 'meetingUpcomings', 'jobApprovals'));
        } else {

            $userId = $this->currentUser->id;

            $meetingUserIds = MeetingUser::query()->where('user_id', $userId)->pluck('meeting_id','meeting_id')->toArray();

            $countMeetingUpcoming = Meeting::query()
                ->whereIn('id', $meetingUserIds)
                ->whereDate('date_meeting', '>=', Carbon::now()->toDateString())
                ->whereYear('created_at', $requestYear)
                ->count();

            $countJob = $queryJob->where('user_id', $userId)
                ->whereDate('deadline', '>=', Carbon::now()->toDateString())
                ->whereYear('created_at', $requestYear)->count();

            $countJobStart = $queryJob->where('user_id', $userId)
                ->where('status_id', Status::query()->where('name', Constant::STATUS_START)->first()->id)
                ->whereDate('deadline', '>=', Carbon::now()->toDateString())
                ->whereYear('created_at', $requestYear)->count();

            $countJobOutOfDate = $queryJob->where('user_id', $userId)
                ->where('status_id', Status::query()->where('name', Constant::STATUS_OUT_OF_DATE)->first()->id)
                ->whereDate('deadline', '>=', Carbon::now()->toDateString())
                ->whereYear('created_at', $requestYear)->count();


            // Trạng thái công việc
            $statusJob = DB::table('active_jobs')
                ->select([
                    'statuses.name as name',
                    'statuses.id as status_id',
                ])
                ->join('statuses', 'statuses.id', '=', 'status_id')
                ->where('active_jobs.user_id', $userId)
                ->whereYear('active_jobs.created_at', $requestYear)
                ->get();

            // Thông kê tiến dộ công việc
            $jobUser = DB::table('active_jobs')
                ->join('statuses', 'active_jobs.status_id', '=', 'statuses.id')
                ->join('users', 'active_jobs.user_id', '=', 'users.id')
                ->select(
                    DB::raw('users.id as user_id, users.name as user_name,
                users.role as user_role, active_jobs.id as active_job_id, active_jobs.name as active_jobs_name,
                active_jobs.created_at as active_job_created_at, statuses.id as status_id, statuses.name as status_name'))
                ->where('active_jobs.user_id', $userId)
                ->whereYear('active_jobs.created_at', $requestYear)
                ->get();

            $response = [];

            foreach ($statuses as $statusId => $statusName) {
                $response[] = $jobUser->where('user_id', $userId)->where('status_id', $statusId)->count();
            }

            $responseStatus = [];
            foreach ($statuses as $statusId=>$statusName) {
                $responseStatus[] = $statusJob->where('status_id', $statusId)->count();
            }

            $statistical = [
                'countJob' => $countJob,
                'countJobOutOfDate' => $countJobOutOfDate,
                'countJobStart' => $countJobStart,
                'meetingUpcoming' => $countMeetingUpcoming
            ];

            return view('elements.dashboard.user_index', compact('listYears', 'statistical', 'response', 'responseStatus'));
        }
    }
}
