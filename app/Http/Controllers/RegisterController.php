<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{


    public function show()
    {
        if (Auth::check()) {
            return redirect()->route('welcome');
        }
        return view('registro');
        // return redirect()->route('registro.show');
    }
    public function register(RegisterRequest $request)
    {

        //Validar los datos
        $user = User::create($request->validated());

        Auth::login($user);

        //  return redirect('welcome')->with('success', 'Cuenta creada con exito');

        return view('/dashboard');
    }
}
