<?php
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\MatchController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home.index');

Route::get('/create_team', [TeamController::class, 'index'])->name('teams.index');
Route::get('/create_match', [MatchController::class, 'index'])->name('matches.index');

Route::post('/add_team', [TeamController::class, 'add_team']);
Route::post('/add_match', [MatchController::class, 'add_match']);

Route::get('/matches/{id}/edit', [MatchController::class, 'edit'])->name('matches.edit');
Route::put('/matches/{id}', [MatchController::class, 'update'])->name('matches.update');
Route::delete('/matches/{id}', [MatchController::class, 'destroy'])->name('matches.destroy');