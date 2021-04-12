<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;

/**
 * @see \App\Http\Controllers\ProfileController::profile()
 */
Route::get('profile', [ProfileController::class, 'index'])
    ->name('profile.index');

/**
 * @see \App\Http\Controllers\ProfileController::update()
 */
Route::put('profile', [ProfileController::class, 'update'])
    ->name('profile.update');

/**
 * @see \App\Http\Controllers\ProfileController::showFormChangePassword();
 */
Route::get('profile/change-password', [ProfileController::class, 'showFormChangePassword'])
    ->name('profile.show_form_change_password');

/**
 * @see \App\Http\Controllers\ProfileController::changePassword();
 */
Route::put('profile/change-password', [ProfileController::class, 'changePassword'])
    ->name('profile.change_password');
