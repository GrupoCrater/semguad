<?php

namespace App\Http\Controllers;

use App\Models\Boletos;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // $boletos = Boletos::all();
        $boletos = Boletos::orderby('folio', 'desc')->take(5)->get();

        return view('dashboard', compact('boletos'));
    }
}
