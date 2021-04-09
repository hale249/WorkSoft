<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobController;

Route::get('jobs', [JobController::class, 'index'])->name('jobs.index');
Route::post('jobs', [JobController::class, 'store'])->name('jobs.store');
Route::get('job/{id}', [JobController::class, 'show'])->name('jobs.show');
Route::get('job/{id}/edit', [JobController::class, 'edit'])->name('jobs.edit');
Route::put('job/{id}', [JobController::class, 'update'])->name('jobs.update');


/*Route::get('job/{id}/items', [TaskController::class, 'index'])->name('job_task.index');
Route::get('job/{id}/items/create', [TaskController::class, 'create'])->name('job_task.create');
Route::post('job/{id}/items/store', [TaskController::class, 'store'])->name('job_task.store');
Route::get('job/{id}/items/{taskId}/show', [TaskController::class, 'show'])->name('job_task.show');
Route::get('job/{id}/items/{taskId}/edit', [TaskController::class, 'edit'])->name('job_task.edit');
Route::put('job/{id}/items/{taskId}', [TaskController::class, 'update'])->name('job_task.update');
Route::delete('job/{id}/items/{taskId}', [TaskController::class, 'destroy'])->name('job_task.destroy');*/

Route::post('ajax/{jobId}/upload-attachment', [JobController::class, 'ajaxUploadAttachment'])->name('job.upload-attachment');
Route::delete('job/{jobId}/items/delete-attachment/{attachmentId}', [JobController::class, 'ajaxDeleteAttachment'])->name('job.delete-attachment');
