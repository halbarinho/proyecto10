<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Post;
use App\Models\Alerta;
use App\Models\Docente;
use App\Models\Activity;
use App\Models\Classroom;
use App\Models\Estudiante;
use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Log;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{



    protected $notifications;

    public function __construct()
    {
        $this->notifications = Notification::all();
        view()->share('notifications', $this->notifications);
    }


    public function index()
    {

        $notifications = Notification::all();
        $docentes = Docente::all();
        $estudiantes = Estudiante::all();
        $alertas = Alerta::all();
        $actividades = Activity::all();

        // Obtener las últimas actividades subidas
        $actividadesRecientes = Activity::latest()->take(4)->get();
        Log::info($actividadesRecientes);


        return view('admin.dashboard', [
            'notifications' => $notifications,
            'docentes' => $docentes,
            'estudiantes' => $estudiantes,
            'alertas' => $alertas,
            'actividades' => $actividades,
            'actividadesRecientes' => $actividadesRecientes,
        ]);
    }


    /**
     * Undocumented function
     *
     *   @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function activityIndex()
    {
        $activities = Activity::all();

        $classrooms = Classroom::all();




        return view('admin.activity.activities', ['activities' => $activities, 'classrooms' => $classrooms]);

    }


    public function editActivity(int $id)
    {

        try {
            $selectedActivity = Activity::findOrFail($id);

        } catch (Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage() . "/n Fallo buscando activity id."])->withInput();
        }

        return view('admin.activity.edit', ['activity' => $selectedActivity]);

    }
    /**
     * Undocumented function
     *
     * @param Request $request
     * @param Activity $activity
     * @return void
     */
    public function updateActivity(Request $request, Activity $activity)
    {

        $validator = Validator::make(
            $request->all(),
            [
                // 'title' => 'required|string|unique:posts|min:3',
                'activity_name' => [
                    'required',
                    'string',
                    'min:3',
                    'max:25',
                    Rule::unique('activities')->ignore($activity->id),
                ],
                // 'slug' => 'nullable',
                'activity_description' => 'required|string|min:15|max:80',
            ],
            [
                'unique' => __('El :attribute ya existe, prueba con otro.'),
                'required' => __('El :attribute es obligatorio.'),
                'string' => __('El :attribute debe ser una cadena.'),
                'min' => __('El :attribute no cumple la longitud mínima.'),
                'max' => __('El :attribute no cumple la longitud máxima.'),
            ]
        );


        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator);
        }



        try {


            $selectedActivity = Activity::findOrFail($activity->id);

            $selectedActivity->update([
                'activity_name' => $request->input('activity_name'),
                'activity_description' => $request->input('activity_description'),
            ]);


            return redirect()->route('admin.activities');


        } catch (Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage() . "/n Fallo buscando user id."])->withInput();
        } catch (QueryException $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage() . "/n Failed to update post. Please try again."])->withInput();
        }
    }

    public function postIndex()
    {

        $posts = Post::all();


        return view('admin.post.index', ['posts' => $posts]);

    }

    public function classroomIndex()
    {
        $classes = Classroom::all();

        return view('admin.classroom.index', ['classes' => $classes]);
    }

    public function alertasIndex()
    {
        $alertas = Alerta::all();

        return view('admin.alerta.index', ['alertas' => $alertas]);
    }


    public function editAlerta(int $id)
    {

        try {
            $selectedAlerta = Alerta::findOrFail($id);

        } catch (Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage() . "/n Fallo buscando activity id."])->withInput();
        }

        return view('admin.alerta.edit', ['alerta' => $selectedAlerta]);

    }


    public function updateAlerta(Request $request, int $alertaId)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'title' => 'required|string|min:3|max:25',
                'content' => 'required|string|min:15|max:500',
            ],
            [
                'content.required' => __('El contenido es obligatorio.'),
                'required' => __('El :attribute es obligatorio.'),
                'string' => __('El :attribute debe ser una cadena.'),
                'min' => __('El :attribute no cumple la longitud mínima.'),
                'max' => __('El :attribute no cumple la longitud máxima.'),
            ]
        );


        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator);
            // return response()->json(['errors' => $validator->errors()], 422);
        }



        try {

            $selectedAlerta = Alerta::findOrFail($alertaId);

            $checked = false;

            if ($request->has('active')) {
                $checked = $request->has('active');
            }

            $selectedAlerta->update([
                'active' => $checked,
            ]);

            return redirect()->route('admin.alertas');

        } catch (Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage() . "/n Fallo buscando user id."])->withInput();
        } catch (QueryException $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage() . "/n Failed to update post. Please try again."])->withInput();
        }
    }



    public function notificationIndex()
    {
        $notifications = Notification::all();

        return view('admin.notification.index', ['notifications' => $notifications]);
    }


    public function editNotification(int $id)
    {

        try {
            $selectedNotification = Notification::findOrFail($id);

        } catch (Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage() . "/n Fallo buscando notification id."])->withInput();
        }

        return view('admin.notification.edit', ['notification' => $selectedNotification]);

    }


    public function updateNotification(Request $request, int $id)
    {
        $validator = Validator::make(
            $request->all(),
            [

            ],
            [
                // 'content.required' => __('El contenido es obligatorio.'),
                // 'required' => __('El :attribute es obligatorio.'),
                // 'string' => __('El :attribute debe ser una cadena.'),
                // 'min' => __('El :attribute no cumple la longitud mínima.'),
                // 'max' => __('El :attribute no cumple la longitud máxima.'),
            ]
        );


        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator);
            // return response()->json(['errors' => $validator->errors()], 422);
        }



        try {

            $selectedNotification = Notification::findOrFail($id);

            $checked = false;

            if ($request->has('read')) {
                $checked = $request->has('read');
            }

            $selectedNotification->update([
                'read' => $checked,
            ]);

            return redirect()->route('admin.notifications');

        } catch (Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage() . "/n Fallo buscando user id."])->withInput();
        } catch (QueryException $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage() . "/n Failed to update post. Please try again."])->withInput();
        }
    }


    public function destroyNotification(int $id)
    {
        try {

            $selectedNotification = Notification::findOrFail($id);

            $selectedNotification->delete();

            return redirect()->back();

        } catch (Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage() . "/n Fallo buscando category id."])->withInput();
        } catch (QueryException $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage() . "/n Failed to delete category. Please try again."])->withInput();
        }
    }


    public function deleteNotifications(Request $request)
    {
        try {

            Log::info('hasta aqui', [$request]);
            if (!isset($request->notificationsList)) {
                throw new Exception('El elemento "notificationsList" no está definido.');
            }
            Log::info($request);
            $notifications = $request->notificationsList;

            foreach ($notifications as $notificationId) {
                // Log::info('Valor', [$notificationId]);
                $notification = Notification::findOrFail($notificationId);
                $notification->delete();
            }

            return redirect()->back()->with('success', 'Registros Actualizados con Exito');


        } catch (Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage() . "/n"])->withInput();
        } catch (QueryException $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage() . "/n Failed to update post. Please try again."])->withInput();
        }
    }

}
