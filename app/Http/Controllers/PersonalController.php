<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Personal;
use Illuminate\Http\Request;

class PersonalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $personal = Personal::all();

        return view('personal.index', compact('personal'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|max:50',
            'apellido_paterno' => 'required|max:30',
            'apellido_materno' => 'required|max:30',
            'fecha_nacimiento' => 'required|date',
            'telefono' => 'required|max:20',
            'domicilio' => 'required|max:255',
        ]);

        Personal::create($request->all());

        return redirect()->route('personal.index')->with('success', 'Registro creado astisfactoriamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $personal = Personal::find($id);

        return view('personal.show', compact('personal'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nombre' => 'required|max:50',
            'apellido_paterno' => 'required|max:30',
            'apellido_materno' => 'required|max:30',
            'fecha_nacimiento' => 'required|date',
            'telefono' => 'required|max:20',
            'domicilio' => 'required|max:255',
        ]);

        $personal = Personal::find($id);
        $personal->update($request->all());

        return redirect()->route('personal.index')->with('success', 'Registro actualizado exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $personal = Personal::find($id);
        $personal->delete();

        return redirect()->route('personal.index')->with('success', 'Registro eliminado exitosamente');
    }

    public function edit($id)
    {
        $personal = Personal::find($id);

        return view('personal.edit', compact('personal'));
    }

    public function create()
    {
        return view('personal.create');
    }
}
