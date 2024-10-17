<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\adminPageController;
use App\Http\Controllers\postController;
use App\Http\Controllers\UserController;



Route::get('/',[adminPageController::class,'index'])->name('blogs');
Route::get('/admin',[adminPageController::class,'index'])->name('kelola.blog');

Route::get('/article/add',[adminPageController::class,'create'])->name('article.create');
Route::post('/article/add',[adminPageController::class,'store'])->name('article.add.store');
Route::get('/articles/edit/{id}',[adminPageController::class, 'edit'])->name('articles.edit');
Route::patch('/articles/update/{id}',[adminPageController::class, 'update'])->name('articles.edit.update');
Route::delete('/articles/{id}', [adminPageController::class, 'destroy'])->name('articles.destroy');
Route::get('/articles/post/{id}',[postController::class, 'index'])->name('articles.post');

Route::get('/user', [UserController::class, 'index'])->name('user');
Route::get('/login/add', [UserController::class, 'create'])->name('login.add');
Route::post('/login/add/proses', [UserController::class, 'store'])->name('login.add.proses');

Route::delete('/user/delete/{id}', [UserController::class, 'destroy'])->name('users.delete');

Route::get('/user/edit/{id}', [UserController::class, 'edit'])->name('user.edit');
Route::patch('/user/update/{id}', [UserController::class, 'update'])->name('user.edit.update');