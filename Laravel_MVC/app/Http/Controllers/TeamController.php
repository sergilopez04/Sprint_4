<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Teams;

class TeamController extends Controller
{
    public function index()
    {
        $teams = Teams::all();
        return view('add_team', compact('teams'));
    }

    public function create(Request $request)
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

    public function edit($id)
    {
        $team = Teams::findOrFail($id);
        return view('edit_team', compact('team'));
    }

    public function update(Request $request, $id)
    {
        // Validación de los datos de entrada
        $request->validate([
            'team_name' => 'required|string|max:255',
            'team_city' => 'required|string|max:255',
            'team_category' => 'required|string|max:255',
        ]);

        try {
            $team = Teams::findOrFail($id);
            $team->name = $request->team_name;
            $team->city = $request->team_city;
            $team->category = $request->team_category;
            $team->save();

            return redirect()->route('teams.index')->with('success', 'Team updated successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error: ' . $e->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            $team = Teams::findOrFail($id);
            $team->delete();

            return redirect()->route('teams.index')->with('success', 'Team deleted successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error: ' . $e->getMessage());
        }
    }
}
