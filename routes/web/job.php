<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobController;

Route::get('jobs', [JobController::class, 'index'])->name('jobs.index');
Route::post('jobs', [JobController::class, 'store'])->name('jobs.store');
Route::get('jobs/{id}', [JobController::class, 'show'])->name('jobs.show');
Route::get('jobs/{id}/edit', [JobController::class, 'edit'])->name('jobs.edit');
Route::put('jobs/{id}', [JobController::class, 'update'])->name('jobs.update');
Route::put('jobs/{id}/send-message', [JobController::class, 'sendMessage'])->name('jobs.send-message');


/*Route::get('job/{id}/items', [TaskController::class, 'index'])->name('job_task.index');
Route::get('job/{id}/items/create', [TaskController::class, 'create'])->name('job_task.create');
Route::post('job/{id}/items/store', [TaskController::class, 'store'])->name('job_task.store');
Route::get('job/{id}/items/{taskId}/show', [TaskController::class, 'show'])->name('job_task.show');
Route::get('job/{id}/items/{taskId}/edit', [TaskController::class, 'edit'])->name('job_task.edit');
Route::put('job/{id}/items/{taskId}', [TaskController::class, 'update'])->name('job_task.update');
Route::delete('job/{id}/items/{taskId}', [TaskController::class, 'destroy'])->name('job_task.destroy');*/

Route::post('ajax/{jobId}/upload-attachment', [JobController::class, 'ajaxUploadAttachment'])->name('jobs.upload-attachment');
Route::delete('jobs/{jobId}/delete-attachment/{attachmentId}', [JobController::class, 'ajaxDeleteAttachment'])->name('jobs.delete-attachment');

/*Route::get('jobs/{id}/tasks', [JobController::class, 'taskList'])->name('task.list');
Route::get('jobs/{id}/tasks', [JobController::class, 'taskList'])->name('task.list');
Route::get('jobs/{id}/tasks', [JobController::class, 'taskList'])->name('task.list');
Route::get('jobs/{id}/tasks', [JobController::class, 'taskList'])->name('task.list');*/
