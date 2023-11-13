<?php

use App\Http\Controllers\CamaraController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/insert', function(){
    return view('actividades.index');
});
//Insertar
Route::post('/insert',[CamaraController::class,'store'])->name('actividades');
//Consultar
Route::get('/view',[CamaraController::class,'index'])->name('camaras.index');
//Eliminar
Route::delete('/view/{id}', [CamaraController::class, 'destroy'])->name('camaras-destroy');
//Actualizar
Route::get('/edit/{id}', [CamaraController::class, 'show'])->name('camaras-edit');
Route::patch('/edit/{id}', [CamaraController::class, 'update'])->name('camaras-update');



