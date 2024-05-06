<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class MasterMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Verifica si el usuario tiene el rol de administrador
        if (auth()->user()->rol !== 'master') {
            // Si no es administrador, redirige a alguna otra página o devuelve un error
            session()->flash('alert', 'No tienes los permisosnecesarios ');

            // Redirige de nuevo a la página anterior o a donde desees
            return back();
        }

        return $next($request);
    }
}
