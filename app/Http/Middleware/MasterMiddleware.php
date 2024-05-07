<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class MasterMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        // Verifica si el usuario tiene el rol de administrador
        if (auth()->user()->rol !== 'master') {
            // Si no es administrador, redirige a alguna otra página o devuelve un error
            session()->flash('alert', 'No tienes los permisos necesarios ');

            // Redirige de nuevo a la página anterior o a donde desees
            return back();
        }

        return $next($request);
    }
}
