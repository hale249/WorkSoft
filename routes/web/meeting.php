<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\MeetingController;

Route::resource('meeting', 'MeetingController')->except(['show']);

Route::get('meeting/{id}/view', [MeetingController::class, 'viewed'])->name('meeting.viewed');

Route::get('meeting/{id}/reply/{userId}', [MeetingController::class, 'reply'])->name('meeting.reply');
