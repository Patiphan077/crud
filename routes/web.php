<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('home/show/{id}', [App\Http\Controllers\HomeController::class, 'show'])->name('show');
Route::get('home/show2/{id}', [App\Http\Controllers\HomeController::class, 'show2'])->name('show2');
Route::get('home/create', [App\Http\Controllers\HomeController::class, 'create'])->name('create');


Route::post('home/create', [App\Http\Controllers\HomeController::class, 'create'])->name('create');

Route::put('home/create', [App\Http\Controllers\HomeController::class, 'create'])->name('create');
Route::delete('home/create', [App\Http\Controllers\HomeController::class, 'create'])->name('create');
