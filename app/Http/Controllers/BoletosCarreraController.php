<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Boletos;
use App\Http\Requests\BoletosRequest;
use App\Events\PDFGenerated;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;
use Carbon\Carbon;

class BoletosCarreraController extends Controller
{
    public function index()
    {
        $boletos = Boletos::all();

        return view('boletos.index', compact('boletos'));

       
    }


    public function store(BoletosRequest $request)
    {          
        $boleto = Boletos::create($request->all());

        //Obener la fecha de registro del folio
        $fechaRegistro = Carbon::createFromFormat('dmY', substr($boleto->folio, 0, 8));

        //Determinar el precio
        $precio = $fechaRegistro->isBefore('2024-04-01') ? '$350' : '$400';
       
        //Disparar evento una vez que se ha generado el PDF
        event(new PDFGenerated($boleto, $precio)); 
        $filename = 'boleto_' . $boleto->folio .'.pdf';

        //Generar la URL del PDF para su descarga
        $pdfPath = 'public/pdfs/' . $filename;
        $pdfUrl = Storage::url($pdfPath);

        $request->session()->put('pdfUrl', $pdfUrl);
        
        return redirect()->route('boletos.index')->with('store', $pdfUrl);
    }


    public function show(string $id)
    {
        $boleto = Boletos::find($id);

        return view('boletos.show', compact('boleto'));
    }

    public function update(BoletosRequest $request, string $id)
    {        
        $boleto = Boletos::find($id);
        $boleto->update($request->all());

        return redirect()->route('boletos.show',['id' => $id])->with('update', 'Registro actualizado con exito');
    }

    public function destroy(string $id)
    {
        $boletos = Boletos::find($id);
        $boletos->delete();

        return redirect()->route('boletos.index')->with('destroy', 'Registro eliminado con exito');
    }

    public function edit($id)
    {
        $boleto = Boletos::find($id);

        return view('boletos.edit', compact('boleto'));
    }


    public function create()
    {
        //Paso 1. Generamos la fecha del folio
        $fechaFolio = date('dmY');

        //Paso 2. Consultamos el ultimo folio en la base de datos
        $ultimoBoleto = Boletos::latest()->first();

        //Paso 3. Incrementamos el ultimo digito del folio
        if ($ultimoBoleto) {
            $ultimoNumero = intval(substr($ultimoBoleto->folio, -3));
            $nuevoNumero = str_pad($ultimoNumero + 1, 3, '0', STR_PAD_LEFT);
        } else {
            $nuevoNumero = '001';
        }

        //Paso 4: Creamos el nuevo folio
        $nuevoFolio = $fechaFolio . '-' . $nuevoNumero;

        return view('boletos.create', compact('nuevoFolio'));
    }
}
