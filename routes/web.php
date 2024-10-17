<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\adminPageController;
use App\Http\Controllers\postController;



Route::get('/',[adminPageController::class,'index'])->name('blogs');
Route::get('/admin',[adminPageController::class,'index'])->name('kelola.blog');

Route::get('/article/add',[adminPageController::class,'create'])->name('article.create');
Route::post('/article/add',[adminPageController::class,'store'])->name('article.add.store');
Route::get('/articles/edit/{id}',[adminPageController::class, 'edit'])->name('articles.edit');
Route::patch('/articles/update/{id}',[adminPageController::class, 'update'])->name('articles.edit.update');
Route::delete('/articles/{id}', [adminPageController::class, 'destroy'])->name('articles.destroy');
Route::get('/articles/post/{id}',[postController::class, 'index'])->name('articles.post');
