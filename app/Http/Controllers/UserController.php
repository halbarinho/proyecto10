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

        return view('user.index', ['users' => $users, 'docentes' => $docentes, 'estudiantes' => $estudiantes]);

        // return view("CRUD.index");
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view("user.create");
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

                $user->Docente()->create([
                    'speciality' => $data['speciality'],
                    'dni_FK' => $data['dni'],
                ]);
            } elseif ($request->user_type == 'estudiante') {
                $user->Alumno()->create([
                    'dni_FK' => $data['dni'],
                    'date_of_birth' => $data['date_of_birth'],
                    'history' => $data['history'],
                ]);
            }


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


        return view('user.index', ['users' => $users, 'docentes' => $docentes, 'estudiantes' => $estudiantes]);
    }
}
