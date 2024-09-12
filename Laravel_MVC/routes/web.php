<?php
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\MatchController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home.index');

// Rutas para equipos
Route::get('/teams', [TeamController::class, 'index'])->name('teams.index');
Route::get('teams/add', [TeamController::class, 'index'])->name('teams.add');
Route::post('teams/add', [TeamController::class, 'create'])->name('teams.create');
Route::get('/teams/edit', [TeamController::class, 'edit'])->name('teams.edit');
Route::put('/teams/{id}', [TeamController::class, 'update'])->name('teams.update');
Route::delete('/teams/{id}', [TeamController::class, 'destroy'])->name('teams.destroy');

// Rutas para partidos
Route::get('/matches', [MatchController::class, 'index'])->name('matches.index');
Route::get('/matches/add', [MatchController::class, 'index'])->name('matches.add'); 
Route::post('teams/add', [MatchController::class, 'create'])->name('matches.create');
Route::get('/matches/{id}/edit', [MatchController::class, 'edit'])->name('matches.edit');
Route::put('/matches/{id}', [MatchController::class, 'update'])->name('matches.update');
Route::delete('/matches/{id}', [MatchController::class, 'destroy'])->name('matches.destroy');
