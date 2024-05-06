<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Carbon;
use App\Http\Requests\AdministradoresRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;


class AdministradoresController extends Controller
{
    public function index()
    {
        $administradores = User::withCount('boletos')->orderby('id', 'desc')->get();
        return view('administradores.index', compact('administradores'));
    }

    // Tuve que quitar el AdminstradoresRequest porque no me dejaba insertar usuarios conlas validaciones aparte
    public function store(Request $request)
    {
        // INSERTAR VALIDACIONES
        $nuevoAdministrador = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'rol' => $request->rol,
            'password' => Hash::make($request->password)
        ]);

        return redirect()->route('administradores.index')->with('store', 'Administrador creadoexitosamente');
    }

    public function update(Request $request)
    {
        $usuario = User::find($request->userId);
        Log::info($request);

        // $usuario->update($request->all());
        $usuario->name = $request->input('nameedit');
        $usuario->email = $request->input('emailedit');
        $usuario->rol = $request->input('roledit');

        if ($request->has('passwordedit')) {
            Log::info('Entro al primer if');
            $password = $request->input('passwordedit');
            $confirmpassword = $request->input('password_confirmationedit');
            if ($password !== $confirmpassword) {
                // No hay productos, establece un mensaje en la sesión flash
                session()->flash('alert', 'Las contraseñas no coinciden');
                Log::info("Entro en la comparacion de contraseñas");

                // Redirige de nuevo a la página anterior o a donde desees
                return back();
            } else {
                // $usuario->password = Hash::make($request->input('password'));
                $usuario->password = ($request->input('passwordedit'));

            }
        }

        $usuario->update();

        return redirect()->route('administradores.index')->with('update', 'Administrador actualizado con exito');
    }

    public function destroy(string $id)
    {
        // Para poder elminar un usuario primero tengo que deshabilitar la clave externa y luego volver a habilitarla
        DB::statement('SET FOREIGN_KEY_CHECKS=0'); //Deshabilitar tempralmente la restriccion de clave externa

        $boletos = User::find($id); //Buscar el usuario que se quiere eliminar
        $boletos->delete();

        DB::statement('SET FOREIGN_KEY_CHECKS=1'); //Deshabilitar tempralmente la restriccion de clave externa

        return redirect()->route('administradores.index')->with('destroy', 'Administrador eliminado con exito');
    }

    public function edit($id)
    {
        $administrador = User::find($id);

        return response()->json($administrador);
    }
}
