<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ForgetPasswordController;


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


Route::get('/logout', [LogoutController::class, 'logout'])->name('logout');

//Ruta para recuperar/cambiar password
Route::get('/forget-password', [ForgetPasswordController::class, 'forgetPassword'])->name('forgetPassword');

//Ruta que gestiona el Request de recuperar/cambiar password
Route::post('/forget-password', [ForgetPasswordController::class, 'forgetPasswordPost'])->name('forgetPasswordPost');

// Route::get('/reset-password/{token}', function (string $token) {
//     return view('auth.reset-password', ['token' => $token]);
// })->middleware('guest')->name('password.reset');

Route::get('/reset-password/{token}', [ForgetPasswordController::class, 'resetPassword'])
    // ->middleware('guest')
    ->name('password.reset');

Route::post('/reset-password', [ForgetPasswordController::class, 'resetPasswordPost'])->name('password.update');


//ESTAS RUTAS ME FUNCIONAN CON REGISTERCONTROLLER
// Route::get('/CRUD.index', [RegisterController::class, 'show'])->name('registro.show');
// Route::get('/registro', [RegisterController::class, 'create'])->name('registro.create');
// Route::post('/registro', [RegisterController::class, 'register'])->name('registro.post');


Route::resource('user', UserController::class);

// Route::get('user/{user}/edit', [UserController::class, 'edit'])->name('user.edition');
// Route::get('user/{user}', [UserController::class, 'destroy'])->name('user.destroy');


Route::group(['namespace' => 'App\Http\Controllers'], function () {
    /**
     * Home Routes
     */
    Route::view('/welcome', 'welcome')->name('welcome');
    Route::view('/dashboard', 'dashboard')->name('dashboard');

    // Route::get('/login', 'LoginController@show')->name('loginShow');

    // Route::get('/registro', 'RegisterController@show')->name('registro.show');


    // Route::group(['middleware' => ['guest']], function () {
    //     /**
    //      * Register Routes
    //      */
    //     // Route::get('/registro', 'RegisterController@show')->name('registro.show');
    //     // Route::post('/registro', 'RegisterController@register')->name('registroPost');

    //     /**
    //      * Login Routes
    //      */
    //     // Route::get('/login', 'LoginController@show')->name('login.show');

    //     //LA UNICA DESCOMENTADA
    //     Route::post('/login', 'LoginController@authenticate')->name('login');

    // });
    // //PARA PODER USARLO A LO MEJOR DEBO RENOMBRAR auth-> COMO authMiddleware para que no se dupliquen los nombres de las clases
    // Route::group(['middleware' => ['auth']], function () {

    //     /**
    //      * Logout Routes
    //      */
    //     // Route::get('/logout', 'LogoutController@logout')->name('logout');
    //     // Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
    // });
});
