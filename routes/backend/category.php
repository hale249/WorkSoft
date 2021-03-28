<?php

use App\Helpers\PermissionConstant;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\CategoryController;

///**
// * @see \App\Http\Controllers\Backend\CategoryController::index()
// */
//Route::get('categories', [CategoryController::class, 'index'])
//    ->name('category.index');
///**
// * @see \App\Http\Controllers\Backend\CategoryController::create()
// */
//Route::get('categories/create', [CategoryController::class, 'create'])
//    ->name('category.create');
///**
// * @see \App\Http\Controllers\Backend\CategoryController::store()
// */
//Route::post('categories', [CategoryController::class, 'store'])
//    ->name('category.store');
///**
// * @see \App\Http\Controllers\Backend\CategoryController::edit()
// */
//Route::get('categories/{id}/edit', [CategoryController::class, 'edit'])
//    ->name('category.edit');
///**
// * @see \App\Http\Controllers\Backend\CategoryController::update()
// */
//Route::put('categories/{id}', [CategoryController::class, 'update'])
//    ->name('category.update');
///**
// * @see \App\Http\Controllers\Backend\CategoryController::show()
// */
//Route::get('categories/{id}', [CategoryController::class, 'show'])
//    ->name('category.show');
///**
// * @see \App\Http\Controllers\Backend\CategoryController::destroy()
// */
//Route::delete('categories/{id}', [CategoryController::class, 'destroy'])
//    ->name('category.destroy');

Route::resource('category', 'CategoryController');
