<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Fecha;
use Carbon\Carbon;

class FechasController extends Controller
{

    public function index()
    {
        $existeFecha = Fecha::first();

        if($existeFecha){
            $existeFecha = "fechasExistentes";
        }

        $fechas = Fecha::all();
        // dd($fechas);
        $fechasFormateadas = $fechas->map(function ($fecha){
            $inicioRegistro = Carbon::parse($fecha->inicio_registro)->format('d-m-Y');
            $finRegistro = Carbon::parse($fecha->fin_registro)->format('d-m-Y');
            $limiteProntoPago = Carbon::parse($fecha->limite_pronto_pago)->format('d-m-Y');

            return[
                'id' => $fecha->id,
                'inicio_registro' => $inicioRegistro,
                'fin_registro' => $finRegistro,
                'limite_pronto_pago' => $limiteProntoPago,
                'costo_pronto_pago'=> $fecha->costo_pronto_pago,
                'costo_normal' => $fecha->costo_normal
            ];
        });

        return view('fechas.index', compact('fechasFormateadas', 'existeFecha'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {        

         //Perzonalizamos algunos mensajes
         $messages =[
            // 'password.confirmed' => 'Las contraseñas no coinciden.',
        ];

        // Validamos los  datos de entrada
        $request->validate([
            'inicio_registro' => 'required',
            'fin_registro' => 'required',
            'limite_pronto_pago' => 'required',
            'costo_pronto_pago' => 'required|numeric',
            'costo_normal' => 'required|numeric',
        ], $messages);

        $fecha = new Fecha();
        $fecha->fill($request->all());
        $fecha->save();
        return redirect()->route('fechas.index')->with('store', 'Administrador creadoexitosamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $fechas = Fecha::find($id);

        return response()->json($fechas);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $fecha = Fecha::find($request->fechaId);

        // Actualizamos los campos comunes
        $fecha->inicio_registro = $request->input('inicio_registroEdit');
        $fecha->fin_registro = $request->input('fin_registroEdit');
        $fecha->limite_pronto_pago = $request->input('limite_pronto_pagoEdit');
        $fecha->costo_pronto_pago = $request->input('costo_pronto_pagoEdit');
        $fecha->costo_normal = $request->input('costo_normalEdit');


        $fecha->update();

        return redirect()->route('fechas.index')->with('update', 'Administrador actualizado con exito');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $fecha = Fecha::find($id);
        $fecha->delete();

        return redirect()->route('fechas.index')->with('destroy', 'Registro eliminado con exito');
    }
}
