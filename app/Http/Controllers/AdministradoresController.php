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

    // Tuve que quitar el AdminstradoresRequest porque no me dejaba insertar usuarios con las validaciones aparte
    public function store(Request $request)
    {
        //Perzonalizamos algunos mensajes
        $messages =[
            'password.confirmed' => 'Las contraseñas no coinciden.',
        ];

        // Validamos los  datos de entrada
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email|max:255',
            'rol' => 'required|string|max:255',
            'password' => 'required|string|min:8|max:255|confirmed',
        ], $messages);

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

        // Actualizamos los campos comunes
        $usuario->name = $request->input('nameedit');
        $usuario->email = $request->input('emailedit');
        $usuario->rol = $request->input('roledit');

        // Verificamos si se proporciono una nueva contraseña
        if ($request->filled('passwordedit')) {
            $password = $request->input('passwordedit');
            $confirmpassword = $request->input('password_confirmationedit');

            // Verificar si las contraseñas coinciden
            if ($password !== $confirmpassword) {
                // No hay productos, establece un mensaje en la sesión flash
                session()->flash('alert', 'Las contraseñas no coinciden');
                return back();
            } else{
                $usuario->password = Hash::make($password);
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
