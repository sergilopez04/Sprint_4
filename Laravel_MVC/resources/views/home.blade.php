@extends('layouts.app') <!-- Extiende la plantilla base -->

@section('title', 'Home') <!-- Título específico para esta vista -->

@section('content') <!-- Contenido específico -->
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
                            <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">Home Team</th>
                            <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">Away Team</th>
                            <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">Match Date</th>
                            <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">Score</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach($matches as $match)
                            <tr>
                                <td class="px-4 py-2">{{ $match->homeTeam->name }}</td>
                                <td class="px-4 py-2">{{ $match->awayTeam->name }}</td>
                                <td class="px-4 py-2">{{ $match->match_date }}</td>
                                <td class="px-4 py-2">{{ $match->score ?? 'N/A' }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
