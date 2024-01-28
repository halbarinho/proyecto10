<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\UserController;


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
});

// Route::view('/welcome', 'welcome')->name('welcome');


// Route::view('/login', 'login')->name('login');
// Route::view('/registro', 'registro')->name('registro');
// Route::view('/privada', 'privada')->middleware('auth')->name('privada');


// Route::post('/login', [LoginController::class, 'login']);
// Route::post('/registro', [RegisterController::class, 'register']);
// Route::post('/inicia-sesion', [LoginController::class, 'login'])->name('iniciar-sesion');

// Route::get('/logout', [LogoutController::class, 'logout'])->name('logout');

//Ruta para CRUD
Route::resource('/gestion', UserController::class);


Route::get('/login', [LoginController::class, 'show'])->name('loginShow');

Route::group(['namespace' => 'App\Http\Controllers'], function () {
    /**
     * Home Routes
     */
    Route::view('/welcome', 'welcome')->name('welcome');
    Route::view('/dashboard', 'dashboard')->name('dashboard');

    // Route::get('/login', 'LoginController@show')->name('loginShow');

    Route::get('/registro', 'RegisterController@show')->name('registro.show');


    Route::group(['middleware' => ['guest']], function () {
        /**
         * Register Routes
         */
        // Route::get('/registro', 'RegisterController@show')->name('registro.show');
        Route::post('/registro', 'RegisterController@register')->name('registro');

        /**
         * Login Routes
         */
        // Route::get('/login', 'LoginController@show')->name('login.show');
        Route::post('/login', 'LoginController@authenticate')->name('login');

    });

    Route::group(['middleware' => ['auth']], function () {

        /**
         * Logout Routes
         */
        Route::get('/logout', 'LogoutController@perform')->name('logout');
    });
});
