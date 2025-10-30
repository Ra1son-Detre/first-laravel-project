<?php

use App\Http\Controllers\Posts;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Cars;
use App\Http\Controllers\Brands;


Route::get('/cars', [Cars::class, 'index'])->name('cars.showAll'); //вывод на гоавную всех машин
Route::get('/cars/test', [Cars::class, 'test'])->name('cars.test'); //Тест
Route::get('/cars/check', [Cars::class, 'check']); //Тест
Route::get('/cars/create', [Cars::class, 'create'])->name('cars.create'); //Переход на страничку создания
Route::post('/cars', [Cars::class, 'store'])->name('cars.store'); //Создание новой сущности (просто записи) в базе
Route::get('/cars/trash', [Cars::class, 'showTrashCars'])->name('cars.showTrashCars'); //Показ удаленных машин
Route::put('/cars/{car}/restore', [Cars::class, 'restore'])->name('cars.restore'); //Восстановление 1 машины
Route::patch('/cars/{id}', [Cars::class, 'update'])->name('cars.update'); //Редактирование 1 записи
Route::get('/cars/{id}/redaction', [Cars::class, 'redactionById'])->name('cars.redactionById'); //Дубль над чем работаем 
Route::get('/cars/{id}', [Cars::class, 'show'])->name('cars.showById');
Route::delete('/cars/{id}/destroyForever', [Cars::class, 'destroyForever'])->name('cars.destroyForever'); //Окончательное удаление 1 машины
Route::delete('/cars/{id}', [Cars::class, 'destroy'])->name('cars.delete');




Route::resource('brands', Brands::class);







/* Route::get('/posts', [Posts::class, 'index'])->name('posts.showAll');
Route::get('/posts/create', [Posts::class, 'create']);
Route::get('/posts/{id}', [Posts::class, 'show'])->name('posts.show');
Route::get('/posts/{id}/edit', [Posts::class, 'edit']);
Route::post('/posts', [Posts::class, 'store'])->name('posts.store');
Route::put('/posts/{id}', [Posts::class, 'update'])->name('posts.update'); */


