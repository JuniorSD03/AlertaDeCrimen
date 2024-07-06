<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TipoDelitoController;
use App\Http\Controllers\LocalizacionController;
use App\Http\Controllers\ReporteController;
use App\Http\Controllers\NotificacionController;
use App\Http\Controllers\ComentarioController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::apiResource('/tipodelitos', TipoDelitoController::class);
Route::get('/registrartipodelitos', [TipoDelitoController::class, 'create']);
Route::get('/editartipodelitos/{id}', [TipoDelitoController::class, 'edit']);

Route::apiResource('/localizacions', LocalizacionController::class);
Route::get('/registrarlocalizacions', [LocalizacionController::class, 'create']);
Route::get('/editarlocalizacions/{id}', [LocalizacionController::class, 'edit']);

Route::apiResource('/reportes', ReporteController::class);
Route::get('/registrarReportes', [ReporteController::class, 'create']);
Route::get('/editarReportes/{id}', [ReporteController::class, 'edit']);

Route::apiResource('/notificacions', NotificacionController::class);
Route::get('/registrarNotificacions', [NotificacionController::class, 'create']);
Route::get('/editarNotificacions/{id}', [NotificacionController::class, 'edit']);

Route::apiResource('/comentarios', ComentarioController::class);
Route::get('/registrarComentarios', [ComentarioController::class, 'create']);
Route::get('/editarComentarios/{id}', [ComentarioController::class, 'edit']);
