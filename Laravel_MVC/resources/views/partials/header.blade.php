<nav class="bg-green-800 p-4">
    <div class="container mx-auto flex">
        <a href="{{ route('home.index') }}" class="text-white font-bold hover:text-green-300 flex-grow basis-1/4 text-center">
            <i class="fas fa-home"></i> 
        </a>
        <a href="{{ route('teams.index') }}" class="text-white font-bold hover:text-green-300 flex-grow basis-1/2 text-center">Create Team</a>
        <a href="{{ route('matches.index') }}" class="text-white font-bold hover:text-green-300 flex-grow basis-1/4 text-center">Create Matches</a>
    </div>
</nav>


