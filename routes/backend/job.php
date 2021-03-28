<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\TaskController;
use App\Http\Controllers\Backend\JobController;

Route::resource('jobs', 'JobController');

Route::get('jobs/{id}/items', [TaskController::class, 'index'])->name('job_task.index');
Route::get('jobs/{id}/items/create', [TaskController::class, 'create'])->name('job_task.create');
Route::post('jobs/{id}/items/store', [TaskController::class, 'store'])->name('job_task.store');
Route::get('jobs/{id}/items/{taskId}/show', [TaskController::class, 'show'])->name('job_task.show');
Route::get('jobs/{id}/items/{taskId}/edit', [TaskController::class, 'edit'])->name('job_task.edit');
Route::put('jobs/{id}/items/{taskId}', [TaskController::class, 'update'])->name('job_task.update');
Route::delete('jobs/{id}/items/{taskId}', [TaskController::class, 'destroy'])->name('job_task.destroy');

Route::post('ajax/{projectId}/upload-attachment', [JobController::class, 'ajaxUploadAttachment'])->name('upload-attachment');
Route::delete('ajax/{projectId}/delete-attachment/{attachmentId}', [JobController::class, 'ajaxDeleteAttachment'])->name('delete-attachment');
