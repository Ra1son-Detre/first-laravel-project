<?php

use App\Http\Controllers\Posts;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Cars;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/cars', [Cars::class, 'index'])->name('cars.showAll');
Route::get('/cars/test', [Cars::class, 'test'])->name('cars.test');//Тест
Route::get('/cars/check', [Cars::class, 'check']); //Тест
Route::get('/cars/create', [Cars::class, 'create'])->name('cars.create');
Route::post('/cars', [Cars::class, 'store'])->name('cars.store');
Route::patch('/cars/{id}', [Cars::class, 'update'])->name('cars.update');
Route::get('/cars/{id}/redaction', [Cars::class, 'redactionById'])->name('cars.redactionById'); //Дубль над чем работаем 
Route::get('/cars/{id}', [Cars::class, 'show'])->name('cars.showById');
/* Route::patch('/cars/{id}', [Cars::class, 'update'])->name('cars.update'); *///Это потом убрать
Route::delete('/cars/{id}', [Cars::class, 'destroy'])->name('cars.delete');







/* Route::get('/posts', [Posts::class, 'index'])->name('posts.showAll');
Route::get('/posts/create', [Posts::class, 'create']);
Route::get('/posts/{id}', [Posts::class, 'show'])->name('posts.show');
Route::get('/posts/{id}/edit', [Posts::class, 'edit']);
Route::post('/posts', [Posts::class, 'store'])->name('posts.store');
Route::put('/posts/{id}', [Posts::class, 'update'])->name('posts.update'); */


