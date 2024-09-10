@extends('layouts.app') <!-- Extiende la plantilla base -->

@section('title', 'Add a Match') <!-- Título específico para esta vista -->

@section('content') <!-- Contenido específico -->
    <div class="flex items-center justify-center min-h-screen">
        <div class="bg-white p-8 rounded-lg shadow-md w-96">
            <h1 class="text-2xl font-bold mb-6 text-center">Add a Match</h1>
            <form action="{{ url('/add_match') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-4">
                    <label for="home_team_id" class="block text-sm font-medium text-gray-700">Home Team</label>
                    <select name="home_team_id" id="home_team_id" class="mt-1 block w-full border border-gray-300 rounded-md p-2" required>
                        @foreach($teams as $team)
                            <option value="{{ $team->id }}">{{ $team->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-4">
                    <label for="away_team_id" class="block text-sm font-medium text-gray-700">Away Team</label>
                    <select name="away_team_id" id="away_team_id" class="mt-1 block w-full border border-gray-300 rounded-md p-2" required>
                        @foreach($teams as $team)
                            <option value="{{ $team->id }}">{{ $team->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-4">
                    <label for="match_date" class="block text-sm font-medium text-gray-700">Match Date</label>
                    <input type="datetime-local" name="match_date" id="match_date" class="mt-1 block w-full border border-gray-300 rounded-md p-2" required>
                </div>

                <div class="mb-4">
                    <label for="score" class="block text-sm font-medium text-gray-700">Score</label>
                    <input type="text" name="score" id="score" class="mt-1 block w-full border border-gray-300 rounded-md p-2" placeholder="Optional">
                </div>

                <div>
                    <input type="submit" value="Add Match" class="w-full bg-green-800 text-white font-bold py-2 rounded-md hover:bg-green-700 transition duration-200">
                </div>
            </form>
        </div>
    </div>
@endsection
