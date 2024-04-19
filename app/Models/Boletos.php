<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Boletos extends Model
{
    use HasFactory;

    protected $table = 'boletoscarrera';

    protected $fillable = [
        'folio',
        'nombre',
        'apellido_paterno',
        'apellido_materno',
        'edad',
        'sexo',
        'estado',
        'ciudad',
        'telefono',
        'correo',
        'club',
        'talla',
        'prueba',
    ];
}
