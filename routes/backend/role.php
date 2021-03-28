<?php

use Illuminate\Support\Facades\Route;

Route::resource('roles', 'RoleController')->except(['create', 'show', 'store']);
