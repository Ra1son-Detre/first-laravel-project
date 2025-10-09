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
Route::post('/cars', [Cars::class, 'store']);


/* Route::get('/posts', [Posts::class, 'index']);
Route::get('/posts/create', [Posts::class, 'create']);
Route::get('/posts/{id}', [Posts::class, 'show']);
Route::post('/posts', [Posts::class, 'store']); */


