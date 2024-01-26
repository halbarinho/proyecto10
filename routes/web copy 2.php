<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LogoutController;


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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::view('/welcome', 'welcome')->name('welcome');
Route::view('/login', 'login')->name('login');
Route::view('/registro', 'registro')->name('registro');
Route::view('/privada', 'privada')->middleware('auth')->name('privada');


Route::post('/login', [LoginController::class, 'login']);
Route::post('/registro', [RegisterController::class, 'register']);
Route::post('/inicia-sesion', [LoginController::class, 'login'])->name('iniciar-sesion');

Route::get('/logout', [LogoutController::class, 'logout'])->name('logout');
