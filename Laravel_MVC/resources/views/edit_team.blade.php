@extends('layouts.app')

@section('title', 'Edit Teams')

@section('content')
<div class="bg-white p-6 rounded-lg shadow-md w-2/3 mx-auto">
    <h1 class="text-2xl font-bold mb-4 text-center">Edit Teams</h1>
    @if(session('success'))
        <div class="bg-green-200 text-green-800 p-2 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif
    @if(session('error'))
        <div class="bg-red-200 text-red-800 p-2 rounded mb-4">
            {{ session('error') }}
        </div>
    @endif
    <table class="min-w-full divide-y divide-gray-200">
        <thead>
            <tr>
                <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">Edit</th>
                <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">Team Name</th>
                <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">City</th>
                <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">Category</th>
                <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">Delete</th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
            @foreach($teams as $team)
                <tr>
                    <td class="px-4 py-2 text-center">
                        <button onclick="document.getElementById('edit-form-{{ $team->id }}').classList.toggle('hidden');" class="text-blue-500 hover:text-blue-700">
                            <i class="fas fa-edit fa-lg"></i>
                        </button>
                    </td>
                    <td class="px-4 py-2">{{ $team->name }}</td>
                    <td class="px-4 py-2">{{ $team->city }}</td>
                    <td class="px-4 py-2">{{ $team->category }}</td>
                    <td class="px-4 py-2 text-center">
                        <form action="{{ route('teams.destroy', $team->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Are you sure you want to delete this team?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500 hover:text-red-700">
                                <i class="fas fa-trash fa-lg"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                <tr id="edit-form-{{ $team->id }}" class="hidden">
                    <td colspan="5" class="p-4">
                        <form action="{{ route('teams.update', $team->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="mb-4">
                                <label for="team_name" class="block text-sm font-medium text-gray-700">Team Name</label>
                                <input type="text" name="team_name" id="team_name" class="mt-1 block w-full border border-gray-300 rounded-md p-2" value="{{ $team->name }}" required>
                            </div>

                            <div class="mb-4">
                                <label for="team_city" class="block text-sm font-medium text-gray-700">City</label>
                                <input type="text" name="team_city" id="team_city" class="mt-1 block w-full border border-gray-300 rounded-md p-2" value="{{ $team->city }}" required>
                            </div>

                            <div class="mb-4">
                                <label for="team_category" class="block text-sm font-medium text-gray-700">Category</label>
                                <input type="text" name="team_category" id="team_category" class="mt-1 block w-full border border-gray-300 rounded-md p-2" value="{{ $team->category }}" required>
                            </div>

                            <div class="flex space-x-2">
                                <button type="submit" class="w-full bg-green-700 text-white font-bold py-2 rounded-md hover:bg-green-800 transition duration-200">
                                    Update Team
                                </button>
                                <button type="button" class="w-12 h-12 bg-gray-300 text-gray-700 rounded-md hover:bg-gray-400 transition duration-200" onclick="document.getElementById('edit-form-{{ $team->id }}').classList.toggle('hidden');">
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
@endsection
