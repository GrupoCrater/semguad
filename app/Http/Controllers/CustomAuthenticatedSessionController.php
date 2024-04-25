<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Fortify\Http\Controllers\AuthenticatedSessionController;


class CustomAuthenticatedSessionController extends AuthenticatedSessionController
{
    /**
     * Log the user out of the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login'); // Aquí es donde se redirige después de cerrar sesión
    }

     // Método para redireccionar después del inicio de sesión
    //  protected function authenticated(Request $request, $user)
    //  {
    //      return redirect()->intended('/'); // Redirige al usuario a la ruta raíz (localhost)
    //  }
}
