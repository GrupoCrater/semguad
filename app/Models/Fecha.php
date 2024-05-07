<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fecha extends Model
{
    use HasFactory;

    protected $table =  'fechas';

    protected $fillable = [
        'inicio_registro',
        'fin_registro',
        'limite_pronto_pago',
        'costo_pronto_pago',
        'costo_normal',
    ];

}
