<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\User;
use App\Models\Stage;
use App\Models\Docente;
use App\Models\Classroom;
use App\Models\Estudiante;
use App\Models\StageLevel;
use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ClassroomRequest;
use Illuminate\Database\QueryException;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Query\JoinClause;
use Illuminate\Support\Facades\Validator;

class ClassroomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $classes = Classroom::all();

        return view('classroom.index', ['classes' => $classes]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //Recupero los usuarios docentes
        $docentes = Docente::all();
        $stages = Stage::all();
        $levels = StageLevel::all();
        $notifications = Notification::all();

        return view('classroom.create', ['docentes' => $docentes, 'stages' => $stages, 'levels' => $levels, 'notifications' => $notifications]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ClassroomRequest $request)
    {
        /**Eto funciona */
        // $data = $request->all();

        // $validator = Validator::make(
        //     $data,
        //     [
        //         // 'title' => 'required|string|unique:posts|min:3',
        //         'class_name' => [
        //             'required',
        //             'string',
        //             'min:3',
        //             'max:25',
        //         ],
        //         'user_id' => 'nullable',
        //         'stage_id' => 'required|integer|',
        //         'level_id' => 'required|integer|',
        //     ],
        //     [
        //         // 'unique' => __('El :attribute ya existe, prueba con otro.'),
        //         'required' => __('El :attribute es obligatorio.'),
        //         'string' => __('El :attribute debe ser una cadena.'),
        //         'min' => __('El :attribute no cumple la longitud mínima.'),
        //         'max' => __('El :attribute no cumple la longitud máxima.'),
        //         'integer' => __('El :attribute debe ser un entero.'),
        //     ]
        // );


        // if ($validator->fails()) {
        //     Log::info('validator', [$validator]);
        //     return redirect()->back()
        //         ->withErrors($validator);
        // }
/**hasta aqui */

        $data = $request->validated();

        try {

            // $data = $request->validated();


            $class = Classroom::create([
                'class_name' => $data['class_name'],
                'user_id' => $data['user_id'],
                'stage_id' => $data['stage_id'],
                'level_id' => $data['level_id'],
            ]);


        } catch (QueryException $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage() . "/n Failed to create classroom. Please try again."])->withInput();
        } catch (Exception $e) {

            return redirect()->back()->withErrors(['error' => $e->getMessage() . "/n Failed to create classroom. Please try again."])->withInput();

        }

        $classes = Classroom::all();

        // return view('classroom.index', ['classes' => $classes]);
        return redirect()->route('admin.classroom', ['classes' => $classes]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Classroom $classroom)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */

    //LO COMENTO PARA IMPLEMENTAR EL OTRO LUEGO DEBO MODIFICARLO

    // public function edit(int $id)
    // {
    //     $selectedClass = Classroom::findOrFail($id);

    //     $docentes = Docente::all();

    //     //Comprobacion de si la clase tiene asignado un profesor
    //     if (is_null($selectedClass->user_id)) {
    //         $docenteName = "Sin asignar";
    //         $docenteValue = "";
    //     } else {

    //         //Paso valores de Docentes
    //         $users = User::all();

    //         $filteredUsers = $users->where('id', $selectedClass->user_id);
    //         //$docenteName = $filteredUsers->all();
    //         $docenteName = $filteredUsers[0]->name . ' ' . $filteredUsers[0]->last_name_1 . ' ' . $filteredUsers[0]->last_name_2;
    //         $docenteValue = $filteredUsers[0]->id;


    //     }
    //     // redirect()->route('classroom.edit', ['classroom' => $selectedClass, 'docentes' => $filteredDocentes]);
    //     return view('classroom.edit', ['classroom' => $selectedClass, 'docentes' => $docentes, 'docenteValue' => $docenteValue, 'docenteName' => $docenteName]);
    // }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
    {
        Log::info('id', [$id]);
        $class = Classroom::findOrFail((int) $id);

        $data = $request->all();

        $validator = Validator::make(
            $data,
            [
                'class_name' => [
                    'required',
                    'string',
                    'min:3',
                    'max:25',
                    Rule::unique('classrooms', 'class_name')->ignore($class->id),
                ],
                'user_id' => 'nullable',
                'stage_id' => 'required|integer|',
                'level_id' => 'required|integer|',
            ],
            [
                'class_name.required' => 'El nombre de la clase es obligatorio.',
                'class_name.unique' => 'El nombre de la clase ya existe, prueba con otro.',
                'class_name.string' => 'El nombre de la clase debe ser una cadena.',
                'class_name.min' => 'El nombre de la clase debe tener una longitud mínima de 3.',
                'class_name.max' => 'El nombre de la clase debe tener una longitud máxima de 25.',

                'user_id.nullable' => '',

                'stage_id.required' => 'La etapa formativa es obligatoria.',
                'stage_id.integer' => 'El valor introducido no es válido.',

                'level_id.required' => 'El curso es obligatorio.',
                'level_id.integer' => 'El valor introducido no es válido.',
            ]
        );


        if ($validator->fails()) {
            Log::info('validator', [$validator]);
            return redirect()->back()
                ->withErrors($validator);
        }



        try {

            $selectedClass = Classroom::findOrFail($id);

            $selectedClass->update($request->all());

            return redirect()->back()->with('success', 'Registro Actualizado con Exito');

        } catch (Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage() . "/n Fallo buscando user id."])->withInput();
        } catch (QueryException $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage() . "/n Failed to update post. Please try again."])->withInput();
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $selectedClass = Classroom::findOrFail($id);

        $selectedClass->delete();

        $classes = Classroom::all();

        // return view('classroom.index', ['classes' => $classes]);
        return redirect()->route('classroom.index', ['classes' => $classes]);
    }


    /**
     * Devolver lista de alumnos en una clase para editar sus miembros
     */

    // public function edit(int $id)
    // {
    //     $selectedClass = Classroom::findOrFail($id);

    //     //$students = DB::table('estudiantes')->where('class_id', $selectedClass);

    //     $studentList = DB::table('users')
    //         ->join('estudiantes', function (JoinClause $join) use ($selectedClass) {
    //             $join->on('users.id', '=', 'estudiantes.user_id')
    //                 ->where('estudiantes.class_id', '=', $selectedClass->id);
    //         })
    //         ->get();




    //     return view('classroom.edit', ['classroom' => $selectedClass, 'studentList' => $studentList]);
    // }

    public function edit(Classroom $classroom)
    {

        $selectedClass = Classroom::findOrFail($classroom->id);


        $docentes = Docente::all();
        $stages = Stage::all();
        $levels = StageLevel::all();
        $notifications = Notification::all();



        return view('classroom.edit', ['class' => $selectedClass, 'docentes' => $docentes, 'stages' => $stages, 'levels' => $levels, 'notifications' => $notifications]);
    }


    /**
     * METODO PARA VER ESTUDIANTES DE LA CLASE
     *
     * @param Classroom $classroom
     * @return void
     */
    public function classroomStudents(Classroom $classroom)
    {

        $selectedClass = Classroom::findOrFail($classroom->id);

        // $studentList = DB::table('users')
        //     ->join('estudiantes', function (JoinClause $join) use ($selectedClass) {
        //         $join->on('users.id', '=', 'estudiantes.user_id')
        //             ->where('estudiantes.class_id', '=', $selectedClass->id);
        //     })
        //     ->get();


        $studentList = Estudiante::with('TrackingSheet')
            ->where('class_id', $selectedClass->id)
            ->get();

        Log::info($studentList);

        if (Auth::user()->hasRole('admin')) {
            $notifications = Notification::all();

            return view('admin.classroom.editStudents', ['classroom' => $selectedClass, 'studentList' => $studentList, 'notifications' => $notifications]);
        }

        $notifications = Notification::all();

        return view('classroom.addStudents', ['classroom' => $selectedClass, 'studentList' => $studentList]);

    }

    /**
     * Metodo para mostrar todos las clases a los profesores
     */
    public function showClassrooms()
    {
        // $classes = Classroom::all();


        $classes = Classroom::whereHas('docente', function (Builder $query) {
            $user = Auth::user()->id;
            Log::info($user);
            $query->where('user_id', 'like', $user);

        })->get();
        return view('docente.showClassrooms', ['classes' => $classes]);
    }
}


