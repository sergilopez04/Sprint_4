<?php
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\MatchController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home.index');

Route::get('/teams', [TeamController::class, 'index'])->name('teams.index');
Route::get('/matches', [MatchController::class, 'index'])->name('matches.index');

Route::post('/add_team', [TeamController::class, 'add_team']);
Route::post('/add_match', [MatchController::class, 'add_match']);

Route::get('/matches/{id}/edit', [MatchController::class, 'edit'])->name('matches.edit');
Route::put('/matches/{id}', [MatchController::class, 'update'])->name('matches.update');
Route::delete('/matches/{id}', [MatchController::class, 'destroy'])->name('matches.destroy');

Route::get('/teams/{id}/edit', [TeamController::class, 'edit'])->name('teams.edit');
Route::put('/teams/{id}', [TeamController::class, 'update'])->name('teams.update');
Route::delete('/teams/{id}', [TeamController::class, 'destroy'])->name('teams.destroy');
