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
Route::get('/cars', [Cars::class, 'index']);
Route::get('/cars/create', [Cars::class, 'create']);
Route::get('/cars/{id}', [Cars::class, 'show']);
Route::patch('/cars/{id}', [Cars::class, 'update']);
Route::post('/cars', [Cars::class, 'store']);






Route::get('/posts', [Posts::class, 'index'])->name('posts.showAll');
Route::get('/posts/create', [Posts::class, 'create']);
Route::get('/posts/{id}', [Posts::class, 'show'])->name('posts.show');
Route::get('/posts/{id}/edit', [Posts::class, 'edit']);
Route::post('/posts', [Posts::class, 'store'])->name('posts.store');
Route::put('/posts/{id}', [Posts::class, 'update'])->name('posts.update');


