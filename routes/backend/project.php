<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\ProjectController;
use App\Http\Controllers\Backend\TaskController;

Route::resource('projects', 'ProjectController');

Route::get('projects/{id}/items', [TaskController::class, 'index'])->name('project_task.index');
Route::get('projects/{id}/items/create', [TaskController::class, 'create'])->name('project_task.create');
Route::post('projects/{id}/items/store', [TaskController::class, 'store'])->name('project_task.store');
Route::get('projects/{id}/items/{taskId}/show', [TaskController::class, 'show'])->name('project_task.show');
Route::get('projects/{id}/items/{taskId}/edit', [TaskController::class, 'edit'])->name('project_task.edit');
Route::put('projects/{id}/items/{taskId}', [TaskController::class, 'update'])->name('project_task.update');
