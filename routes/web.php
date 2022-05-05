<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

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
    return view('evento.index');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/evento', [App\Http\Controllers\EventoController::class, 'index'])->name('evento.index');
Route::post('/evento/agregar', [App\Http\Controllers\EventoController::class, 'store'])->name('evento.store');
Route::get('/evento/mostrar', [App\Http\Controllers\EventoController::class, 'show'])->name('evento.show');




Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
