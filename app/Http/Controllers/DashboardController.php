<?php

namespace App\Http\Controllers;

use App\Models\Boletos;
use App\Models\Fecha;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;


class DashboardController extends Controller
{
    public function index()
    {
        $numUsuarios = User::count();
        $numBoletos = Boletos::count();
        $totalRecaudado = Boletos::sum('precio_boleto');
        $fechaLimite  = Fecha::first();

        $boletos = Boletos::orderby('folio', 'desc')->take(5)->get();

        return view('dashboard', compact('boletos', 'numUsuarios', 'numBoletos', 'totalRecaudado', 'fechaLimite'));
    }
}
