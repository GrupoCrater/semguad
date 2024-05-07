<?php

use App\Http\Controllers\AdministradoresController;
use App\Http\Controllers\BoletosCarreraController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SeminaristasController;
use Illuminate\Support\Facades\Route;
use Laravel\Jetstream\Http\Controllers\AuthenticatedSessionController;
use Laravel\Jetstream\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\CustomAuthenticatedSessionController;
use App\Http\Middleware\MasterMiddleware;


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    // Retorna la vista de inicio con todos los resultados
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    // RUTAS BOLETOS
    Route::get('/boletos', BoletosCarreraController::class . '@index')->name('boletos.index');
    //Ruta para descargarpdf
    Route::get('/descargar-pdf/{id}/{folio}', [BoletosCarreraController::class, 'descargarPDF'])->name('descargar.pdf');
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
    // END RUTAS BOLETOS
    // END RUTAS ADMINISTRADORES
});

// RUTAS MASTER 
// USAMOS DIRECTAMENTE EL MIDDLEWARE MASTER QUE CREAMOS
Route::group(['middleware' => MasterMiddleware::class], function () {
    Route::get('/administradores', [AdministradoresController::class, 'index'])->name('administradores.index');
    Route::get('/administradores/{id}/edit', [AdministradoresController::class, 'edit'])->name('administradores.edit');
    Route::post('/administradores', [AdministradoresController::class, 'store'])->name('administradores.store');
    Route::delete('/administradores/{id}', [AdministradoresController::class, 'destroy'])->name('administradores.destroy');
    Route::post('/administradores/update', [AdministradoresController::class, 'update'])->name('administradores.update');
});