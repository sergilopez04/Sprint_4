<?php
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AddTeamController;
use App\Http\Controllers\AddMatchController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home.index');

Route::get('/create_team', [AddTeamController::class, 'index'])->name('teams.index');
Route::get('/create_match', [AddMatchController::class, 'index'])->name('matches.index');

Route::post('/add_team', [AddTeamController::class, 'add_team']);
Route::post('/add_match', [AddMatchController::class, 'add_match']);

