<?php

use Illuminate\Support\Facades\Route;

Route::resource('status', 'StatusController')->except(['show']);
