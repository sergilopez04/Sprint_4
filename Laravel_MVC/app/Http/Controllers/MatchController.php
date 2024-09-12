<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Matches;
use App\Models\Teams;

class MatchController extends Controller
{
    public function index()
    {
        $teams = Teams::all();
        return view('add_match', compact('teams'));
    }

    public function create(Request $request)
    {
        $request->validate([
            'home_team_id' => 'required|exists:teams,id',
            'away_team_id' => 'required|exists:teams,id',
            'match_date' => 'required|date',
            'score' => 'nullable|string|max:255',
        ]);

        try {
            $match = new Matches();
            $match->home_team_id = $request->home_team_id;
            $match->away_team_id = $request->away_team_id;
            $match->match_date = $request->match_date;
            $match->score = $request->score;
            $match->save();

            return redirect()->back()->with('success', 'Match added successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error: ' . $e->getMessage());
        }
    }

    public function edit($id)
    {
        $match = Matches::findOrFail($id);
        $teams = Teams::all();
        return view('home', compact('match', 'teams'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'home_team_id' => 'required|exists:teams,id',
            'away_team_id' => 'required|exists:teams,id',
            'match_date' => 'required|date',
            'score' => 'nullable|string|max:255',
        ]);

        try {
            $match = Matches::findOrFail($id);
            $match->home_team_id = $request->home_team_id;
            $match->away_team_id = $request->away_team_id;
            $match->match_date = $request->match_date;
            $match->score = $request->score;
            $match->save();

            return redirect()->route('home')->with('success', 'Match updated successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error: ' . $e->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            $match = Matches::findOrFail($id);
            $match->delete();

            return redirect()->back()->with('success', 'Match deleted successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error: ' . $e->getMessage());
        }
    }
}
