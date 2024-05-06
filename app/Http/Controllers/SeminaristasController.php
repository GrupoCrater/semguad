<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Seminaristas;

class SeminaristasController extends Controller
{
    public function index()
    {
        $seminaristas = Seminaristas::orderby('id', 'desc')->get();
        return view('seminaristas.index', compact('seminaristas'));
    }
}
