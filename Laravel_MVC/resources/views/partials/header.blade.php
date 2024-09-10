{{-- <nav class="bg-green-800 p-4">
    <div class="container mx-auto flex justify-around">
        <a href="{{ route('teams.index') }}" class="text-white font-bold hover:text-green-300">Show Teams</a>
        {{-- <a href="{{ route('teams.create') }}" class="text-white font-bold hover:text-green-300">Create Team</a>
        <a href="{{ route('matches.create') }}" class="text-white font-bold hover:text-green-300">Create Matches</a> --}}
        {{-- <a href="{{ route('matches.index') }}" class="text-white font-bold hover:text-green-300">Show Matches</a> --}}
    {{-- </div>
</nav> --}}

<nav class="bg-green-800 p-4">
    <div class="container mx-auto flex">
        <a href="{{ route('home.index') }}" class="text-white font-bold hover:text-green-300 flex-grow basis-1/4 text-center">
            <i class="fas fa-home"></i> 
        </a>
        <a href="{{ route('teams.index') }}" class="text-white font-bold hover:text-green-300 flex-grow basis-1/2 text-center">Create Team</a>
        <a href="{{ route('matches.index') }}" class="text-white font-bold hover:text-green-300 flex-grow basis-1/4 text-center">Create Matches</a>
    </div>
</nav>


