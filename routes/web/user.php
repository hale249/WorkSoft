<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

/**
 * @see \App\Http\Controllers\UserController::index()
 */
Route::get('users', [UserController::class, 'index'])
    ->name('users.index');
/**
 * @see \App\Http\Controllers\UserController::edit()
 */
Route::get('users/{id}/edit', [UserController::class, 'edit'])
    ->name('users.edit');
/**
 * @see \App\Http\Controllers\UserController::create
 */
Route::get('users/create', [UserController::class, 'create'])
    ->name('users.create');

/**
 * @see \App\Http\Controllers\UserController::store()
 */
Route::post('users', [UserController::class, 'store'])
    ->name('users.store');

/**
 * @see \App\Http\Controllers\UserController::update()
 */
Route::put('users/{id}', [UserController::class, 'update'])
    ->name('users.update');

/**
 * @see \App\Http\Controllers\UserController::destroy()
 */
Route::delete('users/{id}', [UserController::class, 'destroy'])
    ->name('users.destroy');

/**
 * @see \App\Http\Controllers\UserController::showFormChangePassword()
 */
Route::get('users/{id}/change-password', [UserController::class, 'showFormChangePassword'])
    ->name('users.show_form_change_password');

/**
 * @see \App\Http\Controllers\UserController::changePassword()
 */
Route::post('users/{id}/change-password', [UserController::class, 'changePassword'])
    ->name('users.change_password');
