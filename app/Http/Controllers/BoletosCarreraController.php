<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Boletos;
use App\Models\Fecha;
use App\Http\Requests\BoletosRequest;
use App\Events\PDFGenerated;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class BoletosCarreraController extends Controller
{
    public function index()
    {
        $boletos = Boletos::orderby('folio', 'desc')->get();

        // GENERAR FOLIO
        //Paso 1. Generamos la fecha del folio
        $fechaFolio = date('dmy');

        //Paso 2. Consultamos el ultimo folio en la base de datos
        $ultimoBoleto = Boletos::latest()->first();

        //Paso 3. Incrementamos el ultimo digito del folio
        if ($ultimoBoleto) {
            $ultimoNumero = intval(substr($ultimoBoleto->folio, -4));
            $nuevoNumero = str_pad($ultimoNumero + 1, 4, '0', STR_PAD_LEFT);
        } else {
            $nuevoNumero = '0001';
        }

        //Paso 4: Creamos el nuevo folio
        $nuevoFolio = $fechaFolio . '-' . $nuevoNumero;
        // END GENERAR FOLIO

        // ASIGNACION DE PRECIO
        // Obtenemos la fecha actual
        $fechaActual = Carbon::now();

        // Extraemos los valores de fechas y precios de la tabla fechas
        $fechasYPrecios = Fecha::first();

        if($fechasYPrecios){
            if ($fechaActual < $fechasYPrecios->inicio_registro ){
                $precio = "atesDeFecha";
            }else if ($fechaActual > $fechasYPrecios->fin_registro){
                $precio = "despuesDeFecha";
            }else{
                if ($fechaActual <= $fechasYPrecios->limite_pronto_pago) {
                    $precio =$fechasYPrecios->costo_pronto_pago;
                } else {
                    $precio =$fechasYPrecios->costo_normal;
                }
            }            
        }else{
            $precio = "sinRegistro";
        }
        // END ASIGNACION DE PRECIO

        return view('boletos.index', compact('boletos', 'nuevoFolio', 'precio'));
    }


    public function store(BoletosRequest $request)
    {
        $userId = Auth::id(); //Guardamos el id de usuario en una variable

        //Creamos un nuevo registro con los datos del formulario y el ID del usuario.
        $boleto = Boletos::create(array_merge($request->all(), ['id_user' => $userId]));

        // START EVENTO para crear PDF
        //Accedo a las fechas y precios registrados para la carrera
        $fechasYPrecios = Fecha::first();
        
        //Obener la fecha de registro del folio
        $fechaRegistro = Carbon::createFromFormat('dmy', substr($boleto->folio, 0, 6));

        //Determinar el precio
        if ($fechaRegistro <= $fechasYPrecios->limite_pronto_pago) {
            $precio = $fechasYPrecios->costo_pronto_pago;
        } else {
            $precio = $fechasYPrecios->costo_normal;
        }

        //Disparar evento una vez que se ha generado el PDF
        event(new PDFGenerated($boleto, $precio));
        $filename = 'boleto_' . $boleto->folio . '.pdf';

        //Generar la URL del PDF para su descarga
        $pdfPath = 'public/pdfs/' . $filename;
        $pdfUrl = Storage::url($pdfPath);

        $request->session()->put('pdfUrl', $pdfUrl);
        // END EVENTO

        return redirect()->route('boletos.index')->with('store', $pdfUrl);
    }

    public function descargarPDF($id, $folio)
    {
        $rutaPDF = public_path('storage/pdfs/boleto_' . $folio . '.pdf');

        if (file_exists($rutaPDF)) {

            header('Location:' . asset('storage/pdfs/boleto_' . $folio . '.pdf'), true, 302);
            exit;
            // return response()->file($rutaPDF);
            // return response()->download($rutaPDF);

        } else { //Si el archivo no existe lo genera y lo descarga        

            $boleto = Boletos::find($id);

            //Obener la fecha de registro del folio
            $fechaRegistro = Carbon::createFromFormat('dmy', substr($boleto->folio, 0, 6));

            //Determinar el precio
            $precio = $fechaRegistro->isBefore('2024-04-01') ? '$350' : '$400';

            //Disparar evento una vez que se ha generado el PDF
            event(new PDFGenerated($boleto, $precio));

            header('Location:' . asset('storage/pdfs/boleto_' . $folio . '.pdf'), true, 302);
            exit;
        }
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

        return redirect()->route('boletos.index')->with('update', 'Registro actualizado con exito');
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


    public function create() //NO ESTOY USANDO ESTA FUNCION YA QUE TENGO EL FORMULARIO EN UN MODAL, PASO LOS DATOS EN LA FUNCION INDEX
    {
        // CREACION DE FOLIO
        //Paso 1. Generamos la fecha del folio
        $fechaFolio = date('dmy');

        //Paso 2. Consultamos el ultimo folio en la base de datos
        $ultimoBoleto = Boletos::latest()->first();

        //Paso 3. Incrementamos el ultimo digito del folio
        if ($ultimoBoleto) {
            $ultimoNumero = intval(substr($ultimoBoleto->folio, -4));
            $nuevoNumero = str_pad($ultimoNumero + 1, 4, '0', STR_PAD_LEFT);
        } else {
            $nuevoNumero = '0001';
        }

        //Paso 4: Creamos el nuevo folio
        $nuevoFolio = $fechaFolio . '-' . $nuevoNumero;
        // END CREACION DE FOLIO

        // ASIGNACION DE PRECIO
        // Obtenemos la fecha actual
        $fechaActual = Carbon::now();

        // Estraemos los valores de fechas y precios de la tabla fechas
        $fechasYPrecios = Fecha::first();

        if ($fechaActual <= $fechasYPrecios->limite_pronto_pago) {
            $precio = $fechasYPrecios->costo_pronto_pago;
        } else {
            $precio = $fechasYPrecios->costo_normal;
        }
        // END ASIGNACION DE PRECIO

        return view('boletos.create', compact('nuevoFolio', 'precio'));
    }
}
