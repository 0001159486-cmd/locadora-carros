<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CarroController;
use App\Http\Controllers\AgendamentoController;

Route::get('/', function () { return view('login'); })->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');

Route::middleware(['auth'])->group(function () {
    Route::get('/carros', [CarroController::class, 'index'])->name('carros.index');
    Route::resource('carros', CarroController::class);
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::post('/agendamentos', [AgendamentoController::class, 'store'])->name('agendamentos.store');
    Route::post('/agendamentos/finalizar/{id}', [AgendamentoController::class, 'finalizar'])->name('agendamentos.finalizar');
});