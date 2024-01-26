<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use Illuminate\Http\Request;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{
    //

    public function register(RegisterRequest $request)
    {

        //Validar los datos
        $user = new User();

        $user->dni = $request->dni;
        $user->name = $request->name;
        $user->last_name_1 = $request->last_name_1;
        $user->last_name_2 = $request->last_name_2;
        $user->gender = $request->gender;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->profile_photo_path = $request->profile_photo_path;

        $user->save();

        Auth::login($user);

        return redirect(route('privada'));

    }


    public function login(Request $request)
    {
        //Validar datos

        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        //Mantener la sesion iniciada

        $remember = ($request->has('remember') ? true : false);

        if (Auth::attempt($credentials, $remember)) {

            $request->session()->regenerate();

            //mantiene la pagina a la que queria acceder y si no, por defecto mando
            //a privada
            return redirect()->intended(route('privada'));

        } else {
            return redirect(route('login'));
        }

    }


    public function logout(Request $request)
    {

        Auth::logout();

        //Resetear la sesion para evitar problemas
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect(route('login'));
    }
}
