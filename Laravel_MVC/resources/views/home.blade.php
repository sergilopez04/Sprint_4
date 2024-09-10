<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Add a Team</title>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="bg-white p-8 rounded-lg shadow-md w-96">
        <h1 class="text-2xl font-bold mb-6 text-center">Add a Team</h1>
        <form action="{{url('/add_team')}}" method="Post" enctype="multipart/form-data">
            @csrf

            <div class="mb-4">
                <label for="team_name" class="block text-sm font-medium text-gray-700">Team Name</label>
                <input type="text" name="team_name" class="mt-1 block w-full border border-gray-300 rounded-md p-2" required>
            </div>

            <div class="mb-4">
                <label for="team_city" class="block text-sm font-medium text-gray-700">Team City</label>
                <input type="text" name="team_city" class="mt-1 block w-full border border-gray-300 rounded-md p-2" required>
            </div>

            <div class="mb-4">
                <label for="team_category" class="block text-sm font-medium text-gray-700">Team Category</label>
                <input type="text" name="team_category" class="mt-1 block w-full border border-gray-300 rounded-md p-2" required>
            </div>
            
            <div class="mb-4">
                <label for="image" class="block text-sm font-medium text-gray-700">Team's Image</label>
                <input type="file" name="image" class="mt-1 block w-full border border-gray-300 rounded-md p-2">
            </div>
            <div>
                <input type="submit" value="Add to the DataBase" class="w-full bg-green-800 text-white font-bold py-2 rounded-md hover:bg-green-700 transition duration-200">
            </div>
        </form>
    </div>
</body>
</html>
