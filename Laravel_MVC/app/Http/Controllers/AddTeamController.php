<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Teams;

class AddTeamController extends Controller
{
    public function index()
    {
        return view('add_team');
    }

    public function add_team(Request $request)
    {
        // Validación de los datos de entrada
        $request->validate([
            'team_name' => 'required|string|max:255',
            'team_city' => 'required|string|max:255',
            'team_category' => 'required|string|max:255', 
        ]);

        try {
            $data = new Teams;
            $data->name = $request->team_name;
            $data->city = $request->team_city;
            $data->category = $request->team_category;
            $data->save();

            return redirect()->back()->with('success', 'Team added successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error: ' . $e->getMessage());
        }
    }
}
