<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StatusController;

Route::resource('status', 'StatusController')->except(['show', 'create']);
