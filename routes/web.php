<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ConsultaController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/**
 * Ruta principal - Muestra todas las consultas SQL
 * 
 * Esta ruta ejecuta las 10 consultas definidas en ConsultaController
 * y muestra los resultados en una vista organizada con Tailwind CSS
 */
Route::get('/', [ConsultaController::class, 'index'])->name('consultas.index');
