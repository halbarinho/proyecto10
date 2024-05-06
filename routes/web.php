<?php
/**
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\StageController;
use App\Http\Controllers\AlertaController;
use App\Http\Controllers\AnswerController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\DocenteController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ActivityController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ClassroomController;
use App\Http\Controllers\EstudianteController;
use App\Http\Controllers\StageLevelController;
use App\Http\Controllers\UserSearchController;
use App\Http\Controllers\ContactFormController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\TrackingSheetController;
use App\Http\Controllers\ForgetPasswordController;
use App\Http\Controllers\ActivitiesResultController;
use App\Http\Controllers\ActivityQuestionController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;


//ESTO LO HE COMENTADO PORQUE ME DABA ERROR PERO
//SON DE BREEZE SI NO NO FUNCIONA
//Rutas de autenticacion y perfil
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
//HASTA AQUI

require __DIR__ . '/auth.php';


/**
 * RUTAS PUBLICAS
 */

Route::get('/', function () {



    if (Auth::check()) {

        if (Auth::user()->hasRole('docente')) {
            return redirect()->route('docente.dashboard');
        } elseif (Auth::user()->hasRole('admin')) {
            return redirect()->route('admin.dashboard');
        } else {
            return redirect()->route('estudiante.dashboard');
        }

    }
    return view('welcome');

})->name('welcome');


//Ruta para recuperar/cambiar password
Route::get('/forget-password', [ForgetPasswordController::class, 'forgetPassword'])->name('forgetPassword');

//Ruta que gestiona el Request de recuperar/cambiar password
Route::post('/forget-password', [ForgetPasswordController::class, 'forgetPasswordPost'])->name('forgetPasswordPost');


//ESTE LOGOUT ES CON BREEZE
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
    ->name('logout');

/**
 *Ruta para el Formulario Contacto
 */
Route::view('/contact', 'contact.contactForm')->name('contact');

Route::post('/contactForm', [ContactFormController::class, 'store'])->name('contact.send');

Route::view('/contact/formSent', 'contact.formSent')->name('contact.formSent');
//FIN RUTAS FORMULARIO CONTACTO//

//Ruta para el aboutUs
Route::view('/about/aboutUs', 'about.aboutUs')->name('about.aboutUs');

//FIN RUTAS PUBLICAS//

/**
 * RUTAS ADMINISTRADOR
 */
Route::middleware(['auth', 'hasRole:admin'])->group(function () {
    // Route::view('/admin/dashboard', 'admin.dashboard')->name('admin.dashboard');
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('/admin/activities', [AdminController::class, 'activityIndex'])->name('admin.activities');
    Route::get('/admin/activity/{activity}/edit', [AdminController::class, 'editActivity'])->name('admin.editActivity');
    Route::put('/admin/activity/{activity}', [AdminController::class, 'updateActivity'])->name('admin.updateActivity');
    Route::get('/admin/posts', [AdminController::class, 'postIndex'])->name('admin.posts');
    Route::get('/admin/classroom', [AdminController::class, 'classroomIndex'])->name('admin.classroom');
    Route::get('/admin/alertas', [AdminController::class, 'alertasIndex'])->name('admin.alertas');
    Route::get('/admin/alerta/{alerta}/edit', [AdminController::class, 'editAlerta'])->name('admin.editAlerta');
    Route::put('/admin/alerta/{alerta}', [AdminController::class, 'updateAlerta'])->name('admin.updateAlerta');
    Route::get('/admin/notifications', [AdminController::class, 'notificationIndex'])->name('admin.notifications');
    Route::get('/admin/notification/{notification}/edit', [AdminController::class, 'editNotification'])->name('admin.editNotification');
    Route::put('/admin/notification/{notification}', [AdminController::class, 'updateNotification'])->name('admin.updateNotification');
    Route::delete('/admin/notification/delete/{id}', [AdminController::class, 'destroyNotification'])->name('admin.notificationDestroy');
    Route::post('/admin/notification/deleteNotifications', [AdminController::class, 'deleteNotifications'])->name('admin.deleteNotifications');

    Route::get('/admin/users', [UserController::class, 'listUsers'])->name('user.listUsers');

    Route::get('/admin/users/estudiantes', [EstudianteController::class, 'index'])->name('admin.estudiantesIndex');
    Route::get('/admin/users/docentes', [DocenteController::class, 'index'])->name('admin.docentesIndex');

});


//FIN RUTAS ADMINISTRADOR//

/**
 * RUTAS DOCENTE
 */
Route::middleware(['auth', 'hasRole:docente'])->group(function () {

    Route::view('/docente/dashboard', 'docente.dashboard')->name('docente.dashboard');
    Route::get('/docente/showClassrooms', [ClassroomController::class, 'showClassrooms'])->name('docente.showClassrooms');

    Route::get('/docente/posts', [PostController::class, 'index'])->name('docente.posts.index');

    Route::get('/posts/showPosts', [PostController::class, 'showPosts'])->name('post.showPosts');

});
//FIN RUTAS DOCENTE//

/**
 * RUTAS RESOURCES CON MIDDLEWARE
 */
Route::middleware(['auth'])->group(function () {
    Route::resources([
        'user' => UserController::class,
        'classroom' => ClassroomController::class,
        'activity' => ActivityController::class,
        'question' => QuestionController::class,
        'category' => CategoryController::class,
        'post' => PostController::class,
        'alerta' => AlertaController::class,
    ]);


    /**
     * Ruta creada para poder gestionar la solicitud DELETE sin errores
     */
    Route::get('post/delete/{id}', [PostController::class, 'destroy'])->name('post.delete');

});



/**
 * RUTAS PARA CHAT
 */
Route::middleware(['auth'])->group(function () {
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

    //AÑado index chat yo
    Route::get('/chat', [ChatController::class, 'index'])->name('chat.index');

    //Ruta para el campo busqueda
    Route::get('/search/users', [UserSearchController::class, 'search']);
});

//FIN RUTAS PARA CHAT//


Route::group(['namespace' => 'App\Http\Controllers', 'middleware' => ['auth']], function () {



    Route::view('/alumno/dashboard', 'estudiante.dashboard')->name('estudiante.dashboard');



    Route::get('/stage', [StageController::class, 'index']);
    //Ruta para obtener por axios los stagelevels
    Route::get('/stageLevels/{stage}', [StageLevelController::class, 'showLevelForStage']);
    Route::get('/categories', [CategoryController::class, 'showCategoriesForPost']);

    //Ruta creada para obtener el user_id
    Route::get('/user_id', [UserController::class, 'getUserId']);

    //Esta funcionaba con un unico estudiante
    Route::get('/estudiante/{estudiante}/discardClassroom', [EstudianteController::class, 'discardClassroom'])->name('estudiante.discardClassroom');


    Route::get('/estudiante/discardClassroom/{estudiantesList}', [EstudianteController::class, 'discardClassroomStudentList'])
        ->name('estudiantes.discardClassroom');

    Route::post('/estudiante/discardClassroom', [EstudianteController::class, 'discardClassroomStudentList'])
        ->name('estudiantes.discardClassroom.post');

    //Ruta para ver/editar los alumnos de una clase determinada
    Route::get('/classroom/{classroom}/students', [ClassroomController::class, 'classroomStudents'])->name('classroom.classroomStudents');

    //Ruta para añadir alumnos a las clases
    Route::get('/classroom/{classroom}/addestudiantes', [EstudianteController::class, 'addStudents'])
        ->name('studentsList.index');

    //ruta para ver los estudiantes que no pertenecen a una determinada clase y añadirlos
    Route::view('/addStudents', 'estudiante.addStudents');

    Route::put('/estudiantes/addStudentsToClass', [EstudianteController::class, 'addStudentsToClass'])
        ->name('estudiante.addStudentsToClass');

    Route::get('/estudiantes/addStudentToClass/{estudiante}/{classroom}', [EstudianteController::class, 'addStudentToClass'])
        ->name('estudiante.addStudentToClass');


    //RUTA PARA MOSTRAR LAS ACTIVIDADES QUE PERTENECEN AL USUARIO
    Route::get('/activities/{user}/show', [ActivityController::class, 'showUserActivities'])
        ->name('activity.showUserActivities');

    //Ruta para eliminar las actividades seleccionadas con el checkbox
    Route::post('/activity/deleteActivities', [ActivityController::class, 'deleteActivities'])->name('activity.deleteActivities');


    //Ruta para enviar las actividades a las clases seleccionadas
    Route::post('activity/sendActivity/{activityId}', [ActivityController::class, 'sendActivity'])->name('activity.sendActivity');
    // Route::get('/classroom/{classroom}', [ClassroomController::class, 'classroomList'])->name('classroom.list');

    //Ruta para obtener las notificaciones
    Route::get('notification/getNotifications', [NotificationController::class, 'getNotifications'])->name('notification.getNotifications');

    Route::post('/notification/markAsRead/{notificationId}', [NotificationController::class, 'markAsRead'])->name('notification.markAsRead');

    //Ruta para enviar notificacion desde axios
    Route::post('/send/notification', [NotificationController::class, 'sendNotification'])->name('notification.send');


    //Ruta para obtener las notificaciones de chat del user
    Route::get('/notification/{chat_id}/getChatNotifications', [NotificationController::class, 'getChatNotifications'])->name('notificaton.getChatNotifications');

    Route::get('/estudiante/{student_id}/activity/{activity_id}', [ActivityQuestionController::class, 'makeActivity'])->name('activityQuestion.makeActivity');

    //Ruta enviar actividad rellenada por el estudiante
    Route::post('/activity/sendAnswer', [AnswerController::class, 'store'])->name('activity.sendAnswer');

    //Rutas alertas
    Route::get('/alerta', [AlertaController::class, 'index'])->name('alerta.index');

    /**
     * Ruta creada para poder gestionar la solicitud DELETE sin errores
     */
    Route::get('alerta/delete/{id}', [AlertaController::class, 'destroy'])->name('alerta.delete');


    Route::post('/alerta/deleteAlertas', [AlertaController::class, 'deleteAlertas'])->name('alerta.deleteAlertas');

    //Ruta para que el docente evalue las actividades sale todos los estudiantes
    Route::get('/activity/evaluate/{activity_id}', [ActivityController::class, 'evaluateIndex'])->name('activity.evaluateIndex');

    //Ruta evaluacion cada actividad por estudiante
    Route::get('/activity/{activity_id}/evaluate/{student_id}', [ActivityController::class, 'evaluateActivity'])->name('activity.evaluateActivity');

    //Ruta para almacenar trackingSheets
    Route::post('/trackingSheet/store', [TrackingSheetController::class, 'sendTrackingSheet'])->name('trackingSheet.send');

    //Ruta para ver trackingSheets
    Route::get('/trackingSheet/student/{studentId}', [TrackingSheetController::class, 'show'])->name('trackingSheet.show');

    //Ruta para ver/editar trackingSheets
    Route::get('/trackingSheet/{trackingSheet}/edit', [TrackingSheetController::class, 'edit'])->name('trackingSheet.edit');

    //Ruta para ver/editar trackingSheets
    Route::delete('/trackingSheet/{trackingSheet}', [TrackingSheetController::class, 'destroy'])->name('trackingSheet.destroy');

    //Ruta para actualizar trackingSheet
    Route::put('/trackingSheet/update', [TrackingSheetController::class, 'update'])->name('trackingSheet.update');

    //Ruta para eliminar las ActivitiesResult
    Route::delete('/activitiesResult/{selectedActivityId}/{selectedStudentId}', [ActivitiesResultController::class, 'destroy'])->name('activitiesResult.destroy');

    //Ruta para eliminar las actividadesResult seleccionadas con el checkbox
    Route::post('/activity/deleteActivitiesResult', [ActivitiesResultController::class, 'deleteActivities'])->name('activitiesResult.deleteActivities');

    Route::put('/estudiante/statusUpdate', [EstudianteController::class, 'statusUpdate'])->name('estudiante.statusUpdate');


    //Ruta para editar el perfil del usuario
    Route::get('/userProfile/', [UserController::class, 'profileIndex'])->name('user.userProfile');

    //Ruta para que el usuario actualice su imagen de perfil
    Route::put('/userProfile/{user}/updateProfilePhoto', [UserController::class, 'updateProfilePhoto'])->name('user.updateProfilePhoto');



});
