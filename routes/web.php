<?php

use Illuminate\Support\Facades\Route;
use App\Helpers\PermissionConstant;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Backend\TaskController;
use \App\Http\Controllers\PreviewController;
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

    Route::get('excel', [\App\Http\Controllers\JobController::class, 'excel'])->name('excel');

});

Route::get('preview/meeting-{uuid}', [PreviewController::class, 'meeting'])->name('preview.meeting');
Route::get('preview/job-{uuid}', [PreviewController::class, 'job'])->name('preview.job');
