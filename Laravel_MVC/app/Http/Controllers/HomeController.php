<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use App\Models\Teams;

class HomeController extends Controller
{
    public function index(){
        return view('home');
    }

    public function add_team(Request $request){
        try {
            $data = new Teams;
            $data->name = $request->team_name;
            $data->city = $request->team_city;
            $data->category = $request->team_category;  // Corrige el campo
            $data->save();
    
            return redirect()->back()->with('success', 'Team added successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error: '.$e->getMessage());
        }
    }

}
