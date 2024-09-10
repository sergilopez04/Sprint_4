<?php

namespace App\Http\Controllers;

use App\Models\Matches;
use App\Models\Teams;

class HomeController extends Controller
{
    public function index()
    {
        $teams = Teams::all();
        $matches = Matches::with(['homeTeam', 'awayTeam'])->get();

        return view('home', compact('teams', 'matches'));
    }
}
