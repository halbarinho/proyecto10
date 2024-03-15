<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\User;
use App\Models\Stage;
use App\Models\Docente;
use App\Models\Classroom;
use App\Models\StageLevel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\ClassroomRequest;
use Illuminate\Database\Query\JoinClause;
use Illuminate\Database\QueryException;

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

        return view('classroom.create', ['docentes' => $docentes, 'stages' => $stages, 'levels' => $levels]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ClassroomRequest $request)
    {
        try {

            // $data = $request->validated();
            $data = $request->all();

            $class = Classroom::create([
                'class_name' => $data['class_name'],
                'user_id' => $data['user_id'],
                'stage_id' => $data['stage_id'],
                'level_id' => $data['level_id'],
            ]);


        } catch (QueryException $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage() . "/n Failed to create post. Please try again."])->withInput();
        }

        $classes = Classroom::all();

        // return view('classroom.index', ['classes' => $classes]);
        return redirect()->route('classroom.index', ['classes' => $classes]);
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
    public function update(ClassroomRequest $request, int $id)
    {

        $data = $request->validated();



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

        $studentList = DB::table('users')
            ->join('estudiantes', function (JoinClause $join) use ($selectedClass) {
                $join->on('users.id', '=', 'estudiantes.user_id')
                    ->where('estudiantes.class_id', '=', $selectedClass->id);
            })
            ->get();


        return view('classroom.edit', ['classroom' => $selectedClass, 'studentList' => $studentList]);
    }

    /**
     * Metodo para mostrar todos las clases a los profesores
     */
    public function showClassrooms()
    {
        $classes = Classroom::all();

        return view('docente.showClassrooms', ['classes' => $classes]);
    }
}


