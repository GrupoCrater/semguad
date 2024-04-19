<?php

namespace App\Listeners;

use App\Events\PDFGenerated;
use Dompdf\Dompdf;
use Carbon\Carbon;
use Dompdf\Options;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;



class DownloadPDF
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(PDFGenerated $event)
    {
        $boleto = $event->boleto;
        $precio = $event->precio; //Obtener el precio del evento

        $logoBase64 = base64_encode(file_get_contents(public_path('imagenes/boletoPDF/seminario.png')));

        //Configurar opciones para Dompdf
        $options = new Options();
        $options->set('defaultFont', 'Arial');      

        //Crear instancia de Dompdf
        $dompdf = new Dompdf($options);

        //Renderizar la vista a HTML
        $html = view('pdf.boleto', ['boleto' => $boleto, 'precio' => $precio, 'logoBase64'=> $logoBase64])->render();

        //cargar HTML en Dompdf
        $dompdf->loadHtml($html);

        $dompdf->setPaper('A4', 'portrait');

        //Renderizar PDF
        $dompdf->render();

        //Generar el nombre del archivo PDF
        $filename = 'boleto_' . $boleto->folio . '.pdf';

        //Guardar PDF en el almacenamiento
        $output = $dompdf->output();
        Storage::put('public/pdfs/' . $filename, $output);

        //Marcar que el PDF ha sido generado
        Session::put('pdf_generated', true);
        
    }
}
