<?php

use App\Http\Controllers\CamaraController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;

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


// Proteger las rutas que requieren autenticación
Route::middleware(['auth'])->group(function () {

    Route::get('/insert', function () {
        return view('actividades.index');
    });

    Route::get('/user', function () {
        return view('usuario.index');
    });
    Route::get('/login', function () {
        return view('usuario.home');
    });
    //Insertar
    Route::post('/insert', [CamaraController::class, 'store'])->name('actividades');
    //Consultar
    Route::get('/view', [CamaraController::class, 'index'])->name('camaras.index');
    //Eliminar
    Route::delete('/view/{id}', [CamaraController::class, 'destroy'])->name('camaras-destroy');
    //Actualizar
    Route::get('/edit/{id}', [CamaraController::class, 'show'])->name('camaras-edit');
    Route::patch('/edit/{id}', [CamaraController::class, 'update'])->name('camaras-update');

    // Usuarios (si es necesario proteger estas rutas)
    Route::post('/user', [CamaraController::class, 'store'])->name('usuario');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');