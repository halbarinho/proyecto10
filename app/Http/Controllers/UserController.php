<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\User;
use App\Models\Docente;
use App\Models\Classroom;
use App\Models\Estudiante;
use App\Models\Notification;
use Illuminate\Http\Request;
use App\Rules\DniNieValidationRule;
use Illuminate\Support\Facades\Log;
use App\Http\Requests\UpdateRequest;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\RegisterRequest;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {


    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //AÑADO LAS CLASSROOM
        $classes = Classroom::all();

        //Paso notifications
        $notifications = Notification::all();

        return view("user.create", ['classes' => $classes, 'notifications' => $notifications]);
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


                if (!is_null($classroom = Classroom::find($class_id))) {

                    $classroom->user_id = $docente->user_id;
                    $classroom->save();
                }

                //ASIGNO EL ROL
                $user->assignRole('docente');


            } elseif ($request->user_type == 'estudiante') {
                $user->Estudiante()->create([
                    // 'dni_FK' => $data['dni'],
                    'date_of_birth' => $data['date_of_birth'],
                    'history' => $data['history'],

                    //AÑADO LA CLASE
                    'class_id' => $data['class_id'],
                ]);


                //Asigno el rol
                $user->assignRole('alumno');

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


        //Recupero el contenido de las tablas
        $docentes = Docente::all();
        $estudiantes = Estudiante::all();
        $users = User::all();

        //Paso notifications
        $notifications = Notification::all();

        return view('user.index', ['users' => $users, 'docentes' => $docentes, 'estudiantes' => $estudiantes, 'notifications' => $notifications]);
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

        $userSelected = User::findOrFail($id);

        //Paso notifications
        $notifications = Notification::all();

        return view('user.edit', ['user' => $userSelected, 'notifications' => $notifications]);


    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, string $id)
    {

        $data = $request->validated();

        try {
            $userSelected = User::findOrFail($id);



            if (!empty($data['password'])) {
                $userSelected->update([
                    'name' => $data['name'],
                    'dni' => $data['dni'],
                    'last_name_1' => $data['last_name_1'],
                    'last_name_2' => $data['last_name_2'],
                    'gender' => $data['gender'],
                    'email' => $data['email'],
                    'password' => ($data['password']), //No Hashea la nueva contraseña porque ya se realiza
                ]);

            } else {
                // Si la contraseña no se proporciona o está vacía, mantiene la contraseña existente
                $userSelected->update([
                    'name' => $data['name'],
                    'dni' => $data['dni'],
                    'last_name_1' => $data['last_name_1'],
                    'last_name_2' => $data['last_name_2'],
                    'gender' => $data['gender'],
                    'email' => $data['email'],
                ]);
            }

            if ($userSelected->user_type == 'docente') {

                $docenteSelected = $userSelected->docente;


                $userSelected->Docente()->update([
                    'speciality' => $data['speciality'],
                ]);

            } elseif ($userSelected->user_type == 'estudiante') {


                $estudianteSelected = $userSelected->Estudiante;

                $estudianteSelected->update([
                    'history' => $data['history'],
                    'date_of_birth' => $data['date_of_birth'],
                ]);
            }


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

        $selectedUser = User::findOrFail($id);

        $selectedUser->delete();

        $users = User::all();
        $docentes = Docente::all();
        $estudiantes = Estudiante::all();

        return redirect()->route('user.listUsers', ['users' => $users, 'docentes' => $docentes, 'estudiantes' => $estudiantes]);
    }


    /**
     * Metodo para obtener el userId
     */
    public function getUserId()
    {

        $userId = auth()->user()->id;

        return response()->json($userId);
    }

    public function profileIndex()
    {

        try {


            $userId = Auth::user()->id;

            $selectedUser = User::findOrFail($userId);

            return view('user.profileIndex', ['user' => $selectedUser]);

        } catch (QueryException $e) {

            return redirect()->back()->withErrors(['error' => $e->getMessage() . "<br> Failed to update post. Please try again."])->withInput();

        } catch (Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage() . "<br>"])->withInput();
        }
    }



    public function updateProfilePhoto(Request $request, string $id)
    {


        try {
            $userSelected = User::findOrFail($id);

            if ($request->hasFile('profile_photo_path')) {

                if ($userSelected->profile_photo_path) {
                    Storage::delete($userSelected->profile_photo_path);
                }
                //almaceno
                $img_path = Storage::putFile('public/images/profiles', $request->file('profile_photo_path'));
                //cambio el path
                $new_path = str_replace('public/', '', $img_path);

                $userSelected->update([
                    'profile_photo_path' => $new_path,
                ]);

            } else {
                //AÑADO IMAGEN POR DEFECTO
                // $new_path = '\images\defaultCollege.png';
            }


            return redirect()->back()->with('success', 'Registro Actualizado con Exito');

        } catch (Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage() . "/n Fallo buscando user id."])->withInput();
        } catch (QueryException $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage() . "/n Failed to update post. Please try again."])->withInput();
        }
    }


    public function listUsers()
    {
        $users = User::all();
        $docentes = Docente::all();
        $estudiantes = Estudiante::all();


        //Paso notifications
        $notifications = Notification::all();

        return view('user.index', ['users' => $users, 'docentes' => $docentes, 'estudiantes' => $estudiantes, 'notifications' => $notifications]);

    }

}
