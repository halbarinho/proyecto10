<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\User;
use App\Models\Alerta;
use App\Models\Docente;
use App\Models\Classroom;
use App\Models\Estudiante;
use App\Models\Notification;
use Illuminate\Http\Request;
use App\Events\NotificationSend;
use Illuminate\Support\Facades\Log;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Validator;

class AlertaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $classes = User::findOrFail(auth()->user()->id)->Classroom;

        // obtener el id de la clase anonima
        $anonymousClass = Classroom::where('class_name', 'anonymous')->first();

        // añadir a las clases del usuario autenticado la anonima
        $classes->push($anonymousClass);
        // Log::info($classes);

        $classesIds = $classes->pluck('id');

        $alertas = Alerta::whereIn('class_id', $classesIds)->get();

        // Log::info('Alertas: ', [$alertas]);


        return view('alerta.index', ['alertas' => $alertas]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('alerta.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        Log::info('Aqui estoy con los datos', $request->all());


        $validator = Validator::make(
            $request->all(),
            [
                'identificado' => 'required',
                'content' => 'required|string|min:15|max:500',

            ],
            [
                'content.required' => __('El contenido no puede estar vacío.'),
                'required' => __('El :attribute es obligatorio.'),
                'string' => __('El :attribute debe ser una cadena.'),
                'min' => __('El contenido no cumple la longitud mínima.'),
                'max' => __('El contenido no cumple la longitud máxima.'),
            ]
        );


        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator);
            // return response()->json(['errors' => $validator->errors()], 422);
        }



        try {


            $estudiante = Estudiante::findOrFail(auth()->user()->id);

            //Obtener la clase
            $class = $estudiante->classroom;


            //obtener tutor para enviar notificacion
            $tutor = $class->docente;


            // obtener el id de la clase anonima
            $anonymousClass = Classroom::where('class_name', 'anonymous')->first();

            $estudiante_id = null;
            $class_id = $anonymousClass->id ?? null;

            $identificado = $request->input('identificado');


            if ($identificado === 'false') {

                $estudiante_id = auth()->user()->id;
                $class_id = $class->id;
            }




            $alerta = Alerta::create([
                'class_id' => $class_id,
                'content' => $request->input('content'),
                'estudiante_id' => $estudiante_id,
            ]);

            $notificationAlerta = Notification::create([
                'message' => 'Alerta: ' . $alerta->id . ' en la Aula: ' . $class->id,
                'type' => 'alerta',
                'user_id' => $tutor->user_id,
                'target_id' => $alerta->id,
            ]);


            //Enviar evento al tutor
            broadcast(new NotificationSend($notificationAlerta->type, $notificationAlerta->user_id, $notificationAlerta->message))->toOthers();

            return redirect()->back()->with('success', 'Alerta Enviada con Exito');

        } catch (QueryException $e) {

            return redirect()->back()->withErrors(['error' => $e->getMessage() . "/n Failed to create post. Please try again."])->withInput();
        } catch (Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage() . "/n Failed to create post. Please try again."])->withInput();

        }

    }

    /**
     * Display the specified resource.
     */
    public function show(int $alertaId)
    {
        try {

            // Log::info('alerta', [$alertaId]);

            $alerta = Alerta::findOrFail($alertaId);

            //Añado status para el seguimiento estudiante
            $status = ['Sin Seguimiento' => 'safe', 'Precacución' => 'caution', 'Atención Prioritaria' => 'warning'];




            //Marco como leida la notificacion si la hubiera
            $notification = Notification::where([
                'user_id' => auth()->user()->id,
                'type' => 'alerta',
                'target_id' => $alerta->id,
            ])->get();

            if ($notification) {

                Notification::where([
                    'user_id' => auth()->user()->id,
                    'type' => 'alerta',
                    'target_id' => $alerta->id,
                ])->update(['read' => true]);

            }






            return view('alerta.show', ['alerta' => $alerta, 'status' => $status]);

        } catch (QueryException $e) {

            return redirect()->back()->withErrors(['error' => $e->getMessage() . "/n Failed to create post. Please try again."])->withInput();
        } catch (Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage() . "/n Failed to create post. Please try again."])->withInput();

        }

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Alerta $alerta)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $alertaId)
    {
        $validator = Validator::make(
            $request->all(),
            [

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


            Log::info($checked);


            $selectedAlerta->update([
                'active' => $checked,
            ]);

            return redirect()->route('alerta.index');

        } catch (Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage() . "/n Fallo buscando user id."])->withInput();
        } catch (QueryException $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage() . "/n Failed to update post. Please try again."])->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $alertaId)
    {
        $selectedAlerta = Alerta::findOrFail($alertaId);

        $selectedAlerta->delete();

        $alertas = Alerta::all();

        // return redirect()->route('post.index', ['posts' => $posts]);

        // return view('alerta.index', ['alertas' => $alertas]);
        return redirect()->route('alerta.index');

    }

    /** */
    public function deleteAlertas(Request $request)
    {

        try {
            Log::info($request);


            if (!isset($request->alertasList)) {
                throw new Exception('No se han seleccionado alertas.');
            }

            $alertas = $request->alertasList;

            foreach ($alertas as $alertaId) {
                Log::info('Valor', [$alertaId]);
                $alerta = Alerta::findOrFail($alertaId);
                $alerta->delete();
            }

            return redirect()->back()->with('success', 'Registros Actualizados con Exito');


        } catch (Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()])->withInput();
        } catch (QueryException $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage() . "/n Failed to update post. Please try again."])->withInput();
        }
    }



}
