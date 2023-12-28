<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\CategoryController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

//Route::controller(UserController::class)->prefix('users')->name('users.')->group(function () {
//    Route::get('/', 'index')->name('index');
//    Route::get('/create', 'create')->name('create');
//    Route::post('/store', 'store')->name('store');
//    Route::get('/{id}', 'show')->name('show');
//    Route::get('/{id}/edit', 'edit')->name('edit');
//    Route::put('/{id}', 'update')->name('update');
//    Route::delete('/{id}/delete', 'destroy')->name('destroy');
//});

Route::resource('users', UserController::class);

Route::controller(EventController::class)->prefix('events')->name('events.')->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/create', 'create')->name('create');
    Route::post('/store', 'store')->name('store');
    Route::get('/{id}', 'show')->name('show');
    Route::get('/{id}/edit', 'edit')->name('edit');
    Route::put('/{id}', 'update')->name('update');
    Route::delete('/{id}/delete', 'destroy')->name('destroy');
});

Route::controller(CategoryController::class)->prefix('categories')->name('categories.')->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/create', 'create')->name('create');
    Route::post('/store', 'store')->name('store');
    Route::get('/{id}', 'show')->name('show');
    Route::get('/{id}/edit', 'edit')->name('edit');
    Route::put('/{id}', 'update')->name('update');
    Route::delete('/{id}/delete', 'destroy')->name('destroy');
});
