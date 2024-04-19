<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('boletoscarrera', function(Blueprint $table){
            $table->id();
            $table->string('folio')->unique();
            $table->string('nombre');
            $table->string('apellido_paterno');
            $table->string('apellido_materno');
            $table->integer('edad')->unsigned();
            $table->string('sexo');
            $table->string('estado');
            $table->string('ciudad');
            $table->string('telefono');
            $table->string('correo');
            $table->string('club');
            $table->string('talla');
            $table->string('prueba');
            $table->timestamps();   
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
