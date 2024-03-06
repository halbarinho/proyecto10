<?php

use App\Models\Category;
use Illuminate\Support\Facades\Route;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


//ESTO LO HE COMENTADO PORQUE ME DABA ERROR PERO
//SON DE BREEZE SI NO NO FUNCIONA
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
//HASTA AQUI

require __DIR__ . '/auth.php';


use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;

use App\Http\Controllers\LoginController;
use App\Http\Controllers\StageController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ActivityController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ClassroomController;
use App\Http\Controllers\StageLevelController;
use App\Http\Controllers\ForgetPasswordController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\MessageController;

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


// Route::get('/login', [LoginController::class, 'show'])->name('loginShow');

//ESTE METODO LOGOUT ES CON AUTH DE LARAVEL PROPIA
// Route::get('/logout', [LogoutController::class, 'logout'])->name('logout');

//ESTE LOGOUT ES CON BREEZE
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
    ->name('logout');


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




// Route::get('user/{user}/edit', [UserController::class, 'edit'])->name('user.edition');
// Route::get('user/{user}', [UserController::class, 'destroy'])->name('user.destroy');


Route::resources([
    'user' => UserController::class,
    'classroom' => ClassroomController::class,
    'activity' => ActivityController::class,
    'question' => QuestionController::class,
    'category' => CategoryController::class,
    'post' => PostController::class,
]);



//RUTAS PARA CHAT
// Route::get('/chat', function () {
//     return view('chat');
// })->middleware('auth');

Route::get('chat/{chat}', [ChatController::class, 'show'])->name('chat.show');

Route::get('chat/with/{user}', [ChatController::class, 'chatWith'])->name('chat.with');

Route::get('chat/{chat}/get_users', [ChatController::class, 'get_users'])->name('chat.get_users');

Route::get('chat/{chat}/get_messages', [ChatController::class, 'get_messages'])->name('chat.get_messages');

Route::post('message/send', [MessageController::class, 'send'])->name('message.send');


Route::get('auth/user', function () {
    if (auth()->check()) {
        return response()->json([
            'authUser' => auth()->user(),
        ]);
    }

    return null;
});




/**
 * Ruta creada para poder gestionar la solicitud DELETE sin errores
 */
Route::get('post/delete/{id}', [PostController::class, 'destroy'])->name('post.delete');


Route::group(['namespace' => 'App\Http\Controllers'], function () {
    /**
     * Home Routes
     */
    Route::view('/welcome', 'welcome')->name('welcome')
        ->middleware('hasRole:docente');
    Route::view('/dashboard', 'dashboard')->name('dashboard');



    Route::get('/stage', [StageController::class, 'index']);
    //Ruta para obtener por axios los stagelevels
    Route::get('/stageLevels/{stage}', [StageLevelController::class, 'showLevelForStage']);
    Route::get('/categories', [CategoryController::class, 'showCategoriesForPost']);




    // Route::get('/classroom/{classroom}', [ClassroomController::class, 'classroomList'])->name('classroom.list');

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
