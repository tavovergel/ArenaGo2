<?php

use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\EscenarioController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('inicio');
});


// El parámetro {id} es obligatorio para identificar el escenario
Route::get('/escenario/{id}', [App\Http\Controllers\EscenarioController::class, 'show'])->name('escenarios.show');
Route::post('/escenarios', [EscenarioController::class, 'store'])->name('escenarios.store');
Route::put('/escenarios/{id_escenario}', [EscenarioController::class, 'update'])->name('escenarios.update');
Route::delete('/escenarios/{id_escenario}', [EscenarioController::class, 'destroy'])->name('escenarios.destroy');

Route::get('/mapa', [App\Http\Controllers\EscenarioController::class, 'mapa'])->name('mapa.index');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/escenarios', [EscenarioController::class, 'index'])->name('escenarios.index');
Route::get('/api/escenarios', [App\Http\Controllers\EscenarioController::class, 'apiEscenarios'])->name('api.escenarios');

Route::middleware(['auth'])->group(function () {
    Route::resource('usuarios', UserController::class);
});