<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Classroom;
use App\Models\Estudiante;
use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\QueryException;

class EstudianteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $estudiantes = Estudiante::all();

        //inicializo la variable $estudiantesList
        // $estudiantesList = [];

        //Paso notifications
        $notifications = Notification::all();

        return view('estudiante.index', ['estudiantes' => $estudiantes, 'notifications' => $notifications]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Estudiante $estudiante)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Estudiante $estudiante)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Estudiante $estudiante)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Estudiante $estudiante)
    {
        //
    }


    //Este funciona recibiendo un int
    public function discardClassroom(int $estudianteId)
    {

        try {

            $selectedStudent = Estudiante::findOrFail($estudianteId);



            $selectedStudent->update([
                'class_id' => null,
            ]);

            return redirect()->back()->with('success', 'Registro Actualizado con Exito');


        } catch (Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage() . "/n Fallo buscando user id."])->withInput();
        } catch (QueryException $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage() . "/n Failed to update post. Please try again."])->withInput();
        }

    }


    public function discardClassroomStudentList(Request $request)
    {

        try {

            $estudiantesList = $request->estudiantesList;

            if (isset($estudiantesList) && is_array($estudiantesList) && count($estudiantesList) > 0) {
                foreach ($estudiantesList as $estudiante) {

                    $selectedStudent = Estudiante::findOrFail($estudiante);


                    $selectedStudent->update([
                        'class_id' => null,
                    ]);

                    return redirect()->back()->with('success', 'Registro Actualizado con Exito');

                }
            } else {
                return redirect()->back()->withErrors(['error' => 'No se han pasado elementos en el array'])->withInput();
            }




        } catch (Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage() . "/n Fallo buscando user id."])->withInput();
        } catch (QueryException $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage() . "/n Failed to update post. Please try again."])->withInput();
        }

    }



    public function addStudents(int $classroomId)
    {

        try {
            $selectedClass = Classroom::findOrFail($classroomId);
            $users = Estudiante::all();
            // $selectedUsers = $users->diff(Estudiante::whereIn('class_id', ['$classroomId'])->get());


            // $selectedUsers = Estudiante::where('class_id', '<>', $classroomId)->get();



            // $selectedUsers = DB::table('estudiantes')
            //     ->where([
            //         ['class_id', '=', $classroomId],
            //     ])
            //     ->get();

            //ESTO FUNCIONA LO ANTERIOR NO Y NO LO ENTIENDO POR QUE?
            $selectedUsers = $users->filter(function ($user) use ($classroomId) {
                return $user->class_id != $classroomId;
            });

            $estudiantesList = [];

            if (Auth::user()->hasRole('admin')) {
                $notifications = Notification::all();
                return view('admin.classroom.addStudents', ['estudiantes' => $selectedUsers, 'estudiantesList' => $estudiantesList, 'classroom' => $classroomId, 'notifications' => $notifications]);
            }

            return view('estudiante.addStudents', ['estudiantes' => $selectedUsers, 'estudiantesList' => $estudiantesList, 'classroom' => $classroomId]);

        } catch (Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage() . "/n Fallo buscando user id."])->withInput();
        } catch (QueryException $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage() . "/n Failed to update post. Please try again."])->withInput();
        }
    }


    public function addStudentToClass(int $estudiante, int $classroom)
    {

        try {

            $selectedStudent = Estudiante::findOrFail($estudiante);



            $selectedStudent->update([
                'class_id' => $classroom,
            ]);

            return redirect()->back()->with('success', 'Registro Actualizado con Exito');


        } catch (Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage() . "/n Fallo buscando user id."])->withInput();
        } catch (QueryException $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage() . "/n Failed to update post. Please try again."])->withInput();
        }

    }


    public function addStudentsToClass(Request $request)
    {

        try {

            $estudiantesList = $request->estudiantesList;
            $classroom = $request->classroom;

            if (isset($estudiantesList) && is_array($estudiantesList) && count($estudiantesList) > 0) {
                foreach ($estudiantesList as $estudiante) {

                    $selectedStudent = Estudiante::findOrFail($estudiante);


                    $selectedStudent->update([
                        'class_id' => $classroom,
                    ]);

                }
                return redirect()->back()->with('success', 'Registro Actualizado con Exito');
            } else {
                return redirect()->back()->withErrors(['error' => 'No se han pasado elementos en el array'])->withInput();
            }




        } catch (Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage() . "/n Fallo buscando user id."])->withInput();
        } catch (QueryException $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage() . "/n Failed to update post. Please try again."])->withInput();
        }

    }


    public function statusUpdate(Request $request)
    {

        try {

            Log::info('Bueno hasta aqui');

            $data = $request->all();

            Log::info($data);

            $selectedUser = Estudiante::findOrFail($data['estudianteId']);

            // $status = $request->input('status');

            Log::info($selectedUser);

            $selectedUser->update([
                'status' => $request->input('status'),
            ]);

            Log::info('bis', [$selectedUser]);

            return redirect()->back()->with('success', 'Registro Actualizado con Exito');


        } catch (Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage() . "/n Fallo buscando user id."])->withInput();
        } catch (QueryException $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage() . "/n Failed to update post. Please try again."])->withInput();
        }

    }

}
