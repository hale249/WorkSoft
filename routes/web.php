<?php

use Illuminate\Support\Facades\Route;
use App\Helpers\PermissionConstant;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Backend\TaskController;
use \App\Http\Controllers\PreviewController;
use App\Http\Controllers\ConfirmMeetingController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/**
 * @see \App\Http\Controllers\AuthController::showFormLogin()
 */
Route::get('login', [AuthController::class, 'showFormLogin'])->name('auth.show-form-login');

/**
 * @see \App\Http\Controllers\AuthController::login()
 */
Route::post('login', [AuthController::class, 'login'])->name('auth.login');

/**
 * @see \App\Http\Controllers\AuthController::logout()
 */
Route::post('logout',  [AuthController::class, 'logout'])->name('auth.logout');

/**
 * @see \App\Http\Controllers\AuthController::showFormRegister()
 */
Route::get('register', [AuthController::class, 'showFormRegister'])->name('auth.show-form-register');

/**
 * @see \App\Http\Controllers\AuthController::register()
 */
Route::post('register', [AuthController::class, 'register'])->name('auth.register');


Route::group(['middleware' => 'auth'], function () {
    require __DIR__ . '/web/dashboard.php';
    require __DIR__ . '/web/user.php';
    require __DIR__ . '/web/profile.php';
    require __DIR__ . '/web/category.php';
    require __DIR__ . '/web/meeting.php';
    require __DIR__ . '/web/job.php';
    require __DIR__ . '/web/status.php';
    require __DIR__ . '/web/timetable.php';

    Route::get('excel', [\App\Http\Controllers\JobController::class, 'excel'])->name('excel');

});

Route::get('preview/meeting-{uuid}', [PreviewController::class, 'meeting'])->name('preview.meeting');
Route::get('preview/job-{uuid}', [PreviewController::class, 'job'])->name('preview.job');

Route::get('meeting/{meetingId}/reject/{userId}', [ConfirmMeetingController::class, 'reject'])->name('meeting.reject');
Route::get('meeting/{meetingId}/accept/{userId}', [ConfirmMeetingController::class, 'accept'])->name('meeting.accept');

Route::get('abc/{year}', function ($year) {
    $data =\Illuminate\Support\Facades\DB::table('active_jobs')
        ->join('statuses', 'active_jobs.status_id', '=', 'statuses.id')
        ->join('users', 'active_jobs.user_id', '=', 'users.id')
        ->select(\Illuminate\Support\Facades\DB::raw('users.id as user_id, users.name as user_name, users.role as user_role, active_jobs.id as active_job_id, active_jobs.name as active_jobs_name, active_jobs.created_at as active_job_created_at, statuses.id as status_id, statuses.name as status_name'))
        ->whereYear('active_jobs.created_at', $year)
        ->get();

    $response = [];
    $users = \App\Models\User::query()->get()->pluck('name', 'id')->toArray();
    $statuses = \App\Models\Status::query()->get()->pluck('name', 'id')->toArray();
    foreach ($users as $userId => $userName) {
        foreach ($statuses as $statusId => $statusName) {
            $response[$userName][$statusName] = $data->where('user_id', $userId)->where('status_id', $statusId)->count();
        }
    }

    dd($response);
});
