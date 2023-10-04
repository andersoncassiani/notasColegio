<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EstudianteController;
use App\Models\Estudiantes;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [EstudianteController::class, 'index']);
Route::post('registrar', [EstudianteController::class, 'crear'])->name('est.registrar');
Route::get('usuario/{id}', [EstudianteController::class, 'obtenerDatosDelEst'])->name('est.datos');
Route::get('actulizar/{id}',[EstudianteController::class,'actualizar'])->name('est.actualizar');  
Route::delete('eliminar/{id}', [EstudianteController::class, 'eliminar'])->name('est.eliminar');