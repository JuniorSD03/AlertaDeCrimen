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
Route::apiResource('/localizacions', LocalizacionController::class);
Route::apiResource('/reportes', ReporteController::class);
Route::apiResource('/notificacions', NotificacionController::class);
Route::apiResource('/comentarios', ComentarioController::class);

Route::get('/formularioReporte', function () {
    return view('reporte.formularioReporte');
})->name('formularioReporte');

Route::get('/formularioReporte', function () {
    return view('reporte.formularioReporte');
})->name('formularioReporte');

Route::get('/verReporte', function () {
    return view('reporte.verReporte');
})->name('formularioReporte');

Route::get('/formularioComentario', function () {
    return view('comentario.formularioComentario');
})->name('formularioComentario');