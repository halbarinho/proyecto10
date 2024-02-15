<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\User;
use App\Models\Docente;
use App\Models\Estudiante;
use Illuminate\Http\Request;
use App\Rules\DniNieValidationRule;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\UpdateRequest;
use App\Models\Classroom;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        $docentes = Docente::all();
        $estudiantes = Estudiante::all();
        $classes = Classroom::all();

        return view('user.index', ['users' => $users, 'docentes' => $docentes, 'estudiantes' => $estudiantes, 'classes' => $classes]);

        // return view("CRUD.index");
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //AÑADO LAS CLASSROOM
        $classes = Classroom::all();

        return view("user.create", ['classes' => $classes]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RegisterRequest $request)
    {
        try {
            $data = $request->validated();

            $user = User::create([
                'name' => $data['name'],
                'dni' => $data['dni'],
                'last_name_1' => $data['last_name_1'],
                'last_name_2' => $data['last_name_2'],
                'gender' => $data['gender'],
                'email' => $data['email'],
                'password' => $data['password'],

                'user_type' => $data['user_type'],
            ]);

            if ($request->user_type == 'docente') {

                $docente = $user->Docente()->create([
                    'speciality' => $data['speciality'],
                    // 'dni_FK' => $data['dni'],

                ]);

                //actualizo la tabla CLASSROOM para asociar al DOCENTE
                $class_id = $data['class_id'];

                // $classroom = Classroom::findOrFail($class_id);

                if (!is_null($classroom = Classroom::find($class_id))) {

                    $classroom->user_id = $docente->user_id;
                    $classroom->save();
                }


            } elseif ($request->user_type == 'estudiante') {
                $user->Estudiante()->create([
                    // 'dni_FK' => $data['dni'],
                    'date_of_birth' => $data['date_of_birth'],
                    'history' => $data['history'],

                    //AÑADO LA CLASE
                    'class_id' => $data['class_id'],
                ]);
            }

            // // INCORPORAR AULA
            // $docente->Classroom()->create([

            // ]);

            $user->Phone()->create([
                'phone_number' => $data['phone_number'],
            ]);


            //ESTA LINEA AUTENTIFICA AL USUARIO CREADO
            // Auth::login($user);

        } catch (QueryException $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage() . "/n Failed to create post. Please try again."])->withInput();
        }
        // return redirect('welcome')->with('success', 'Cuenta creada con exito');

        //Recupero el contenido de las tablas
        $docentes = Docente::all();
        $estudiantes = Estudiante::all();
        $users = User::all();

        return view('user.index', ['users' => $users, 'docentes' => $docentes, 'estudiantes' => $estudiantes]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $userSelected = User::findOrFail($id);
        return view('user.edit', ['user' => $userSelected]);


    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, string $id)
    {
        //
        $data = $request->validated();

        try {
            $userSelected = User::findOrFail($id);

            $userSelected->update($request->all());

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
    public function destroy(string $id)
    {
        //
        $selectedUser = User::findOrFail($id);

        $selectedUser->delete();

        $users = User::all();
        $docentes = Docente::all();
        $estudiantes = Estudiante::all();


        // return view('user.index', ['users' => $users, 'docentes' => $docentes, 'estudiantes' => $estudiantes]);
        return redirect()->route('user.index', ['users' => $users, 'docentes' => $docentes, 'estudiantes' => $estudiantes]);
    }
}
