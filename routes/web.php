<?php

use Illuminate\Support\Facades\Route;
use App\Helpers\PermissionConstant;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Backend\TaskController;

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

Route::group(['namespace' => 'Backend', 'as' => 'backend.', 'middleware' => 'auth'], function () {
    require __DIR__ . '/backend/dashboard.php';
    require __DIR__ . '/backend/user.php';
    require __DIR__ . '/backend/profile.php';
    require __DIR__ . '/backend/category.php';
    require __DIR__ . '/backend/meeting.php';
    require __DIR__ . '/backend/project.php';
});
