<?php

namespace App\Http\Controllers;

use App\Models\User;

use App\Http\Requests;
use App\Models\Docente;
use App\Models\Estudiante;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\RegisterRequest;
use Illuminate\Database\QueryException;

class RegisterController extends Controller
{


    public function show()
    {
        // if (Auth::check()) {
        //     return redirect()->route('welcome');
        // }

        $users = User::all();
        $docentes = Docente::all();
        $estudiantes = Estudiante::all();


        // return view('registro'); //este guay
        return view('CRUD.index', ['users' => $users, 'docentes' => $docentes, 'estudiantes' => $estudiantes]);
        // return redirect()->route('registro.show');
    }

    public function create()
    {
        return view('registro');
    }
    public function register(RegisterRequest $request)
    {

        // Validar los inputs a la vez
        // $user = User::create($request->validated());


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


            $user->Phone()->create([
                'phone_number' => $data['phone_number'],
            ]);


            //ESTA LINEA AUTENTIFICA AL USUARIO CREADO
            // Auth::login($user);

        } catch (QueryException $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage() . "/n Failed to create post. Please try again."])->withInput();
        }
        // return redirect('welcome')->with('success', 'Cuenta creada con exito');

        return view('CRUD.index');
        // return route('registro.show');
    }


}
