@extends('layouts.app')

@section('title', 'Home')

@section('content')
    <div class="flex items-center justify-center min-h-screen">
        <div class="flex space-x-8 w-full max-w-6xl p-8">
            <!-- Sección de Equipos -->
            <div class="bg-white p-6 rounded-lg shadow-md w-1/3">
                <h1 class="text-2xl font-bold mb-4 text-center">Teams</h1>
                <ul class="space-y-2">
                    @foreach($teams as $team)
                        <li class="border-b border-gray-300 pb-2">
                            <div class="flex items-center justify-between">
                                <span class="font-medium">{{ $team->name }}</span>
                                <span class="text-sm text-gray-500">{{ $team->city }}</span>
                            </div>
                            <span class="text-xs text-gray-400">{{ $team->category }}</span>
                        </li>
                    @endforeach
                </ul>
            </div>

            <!-- Sección de Partidos -->
            <div class="bg-white p-6 rounded-lg shadow-md w-2/3">
                <h1 class="text-2xl font-bold mb-4 text-center">Matches</h1>
                <table class="min-w-full divide-y divide-gray-200">
                    <thead>
                        <tr>
                            <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">Edit</th>
                            <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">Home Team</th>
                            <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">Away Team</th>
                            <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">Match Date</th>
                            <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">Score</th>
                            <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">Delete</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach($matches as $match)
                            <tr>
                                <td class="px-4 py-2 text-center">
                                    <button class="text-blue-500 hover:text-blue-700" onclick="document.getElementById('edit-form-{{ $match->id }}').classList.toggle('hidden');">
                                        <i class="fas fa-edit fa-lg"></i>
                                    </button>
                                </td>
                                <td class="px-4 py-2">{{ $match->homeTeam->name }}</td>
                                <td class="px-4 py-2">{{ $match->awayTeam->name }}</td>
                                <td class="px-4 py-2">{{ $match->match_date }}</td>
                                <td class="px-4 py-2">{{ $match->score ?? 'N/A' }}</td>
                                <td class="px-4 py-2 text-center">
                                    <form action="{{ route('matches.destroy', $match->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Are you sure you want to delete this match?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-500 hover:text-red-700">
                                            <i class="fas fa-trash fa-lg"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            <tr id="edit-form-{{ $match->id }}" class="hidden">
                                <td colspan="6" class="p-4">
                                    <form action="{{ route('matches.update', $match->id) }}" method="POST" class="space-y-4">
                                        @csrf
                                        @method('PUT')

                                        <div class="mb-4">
                                            <label for="home_team_id" class="block text-sm font-medium text-gray-700">Home Team</label>
                                            <div class="relative">
                                                <select name="home_team_id" id="home_team_id" class="mt-1 block w-full border border-gray-300 rounded-md p-2 appearance-none bg-white text-gray-700 focus:outline-none focus:ring focus:ring-green-500" required>
                                                    <option value="" disabled selected>Select a team</option>
                                                    @foreach($teams as $team)
                                                        <option value="{{ $team->id }}" {{ $match->home_team_id == $team->id ? 'selected' : '' }}>{{ $team->name }}</option>
                                                    @endforeach
                                                </select>
                                                <div class="absolute inset-y-0 right-0 flex items-center px-2 pointer-events-none">
                                                    <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 10l5 5 5-5H7z"></path>
                                                    </svg>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="mb-4">
                                            <label for="away_team_id" class="block text-sm font-medium text-gray-700">Away Team</label>
                                            <div class="relative">
                                                <select name="away_team_id" id="away_team_id" class="mt-1 block w-full border border-gray-300 rounded-md p-2 appearance-none bg-white text-gray-700 focus:outline-none focus:ring focus:ring-green-500" required>
                                                    <option value="" disabled selected>Select a team</option>
                                                    @foreach($teams as $team)
                                                        <option value="{{ $team->id }}" {{ $match->away_team_id == $team->id ? 'selected' : '' }}>{{ $team->name }}</option>
                                                    @endforeach
                                                </select>
                                                <div class="absolute inset-y-0 right-0 flex items-center px-2 pointer-events-none">
                                                    <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 10l5 5 5-5H7z"></path>
                                                    </svg>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="mb-4">
                                            <label for="match_date" class="block text-sm font-medium text-gray-700">Match Date</label>
                                            <input type="datetime-local" name="match_date" id="match_date" class="mt-1 block w-full border border-gray-300 rounded-md p-2" value="{{ $match->match_date }}" required>
                                        </div>

                                        <div class="mb-4">
                                            <label for="score" class="block text-sm font-medium text-gray-700">Score</label>
                                            <input type="text" name="score" id="score" class="mt-1 block w-full border border-gray-300 rounded-md p-2" placeholder="Optional" value="{{ $match->score }}">
                                        </div>

                                        <div class="flex space-x-2">
                                            <button type="submit" class="w-full bg-green-800 text-white font-bold py-2 rounded-md hover:bg-green-700 transition duration-200">
                                                <i class="fas fa-edit"></i> Update
                                            </button>
                                            <button type="button" class="w-12 h-12 bg-gray-300 text-gray-700 rounded-md hover:bg-gray-400 transition duration-200" onclick="document.getElementById('edit-form-{{ $match->id }}').classList.toggle('hidden');">
                                                <i class="fas fa-times"></i>
                                            </button>
                                        </div>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
