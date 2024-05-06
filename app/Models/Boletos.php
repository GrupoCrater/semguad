<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Boletos extends Model
{
    use HasFactory;

    protected $table = 'boletoscarrera';

    protected $fillable = [
        'id_user', //Este valor no se pasa por el fomulario, se asigna en el controlador, sin embargo, fue necesario agregarlo para que hiciera el registro
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

    public function user(){
        return $this->belongsTo(User::class, 'id_user');
    }
}
