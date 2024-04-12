<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$roles): Response
    {

        //Verifico que el usuario esté autenticado
        if (!Auth::check()) {
            return redirect()->route('login');
        }
        foreach ($roles as $rol) {
            if (auth()->user()->hasRole($rol)) {
                return $next($request);
            }
        }

        return redirect('/')->with('error', 'No estás autorizado para acceder a esta página.');

    }
}
