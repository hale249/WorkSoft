<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TimetableController;

Route::get('time-table', [TimetableController::class, 'index'])->name('timetable.index');
