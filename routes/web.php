<?php

use App\Http\Controllers\PersonalController;
use Illuminate\Support\Facades\Route;

// Retorna la vista de inicio con todos los resultados
Route::get('/', PersonalController::class . '@index')->name('personal.index');

// Retorna el formulario para agregar un nuevo registro
Route::get('/personal/create', PersonalController::class . '@create')->name('personal.create');

// Agrega un nuevo registro a la base de datos
Route::post('/personal', PersonalController::class . '@store')->name('personal.store');

// Retorna una vista con informacion detallada de un registro
Route::get('/personal/{id}', PersonalController::class . '@show')->name('personal.show');

// Retorna el formulario para editar un registro
Route::get('/personal/{id}/edit', PersonalController::class . '@edit')->name('personal.edit');

// Actualiza registro
Route::put('/personal/{id}', PersonalController::class . '@update')->name('personal.update');

// Elimina un registro
Route::delete('/personal/{id}', Personalcontroller::class . '@destroy')->name('personal.destroy');