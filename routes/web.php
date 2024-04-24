<?php

use App\Http\Controllers\BoletosCarreraController;
use Illuminate\Support\Facades\Route;
use Laravel\Jetstream\Http\Controllers\AuthenticatedSessionController;
use Laravel\Jetstream\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\CustomAuthenticatedSessionController;

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {  
    // Retorna la vista de inicio con todos los resultados
    Route::get('/', BoletosCarreraController::class . '@index')->name('dashboard');

    // Route::get('/dashboard', function () {
    //     return view('dashboard');
    //     })->name('dashboard');

    // Retorna el formulario para agregar un nuevo registro
    Route::get('/boletos/create', BoletosCarreraController::class . '@create')->name('boletos.create');

    // Agrega un nuevo registro a la base de datos
    Route::post('/boletos', BoletosCarreraController::class . '@store')->name('boletos.store');

    // Retorna una vista con informacion detallada de un registro
    Route::get('/boletos/{id}', BoletosCarreraController::class . '@show')->name('boletos.show');

    // Retorna el formulario para editar un registro
    Route::get('/boletos/{id}/edit', BoletosCarreraController::class . '@edit')->name('boletos.edit');

    // Actualiza registro
    Route::put('/boletos/{id}', BoletosCarreraController::class . '@update')->name('boletos.update');

    // Elimina un registro
    Route::delete('/boletos/{id}', BoletosCarreraController::class . '@destroy')->name('boletos.destroy');
});

Route::post('/logout', [CustomAuthenticatedSessionController::class,'logout'])->name('logout');


