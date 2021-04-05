<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\Backend\MeetingController;

Route::resource('meeting', 'MeetingController');

Route::get('meeting/{id}/reply/{userId}', [MeetingController::class, 'reply'])->name('meeting.reply');
