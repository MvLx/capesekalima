<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create New Course</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="bg-white p-8 rounded-lg shadow-lg max-w-md w-full">
        <h1 class="text-2xl font-bold mb-6 text-center text-gray-800">Create New Course</h1>
        <form action="{{ route('courses.store') }}" method="POST" class="space-y-4">
            @csrf
            
            <div>
                <label for="course_name" class="block text-gray-700 font-medium">Course Name:</label>
                <input type="text" name="course_name" id="course_name" class="w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-violet-500" value="{{ old('course_name') }}" required>
            </div>

            <div>
                <label for="description" class="block text-gray-700 font-medium">Description:</label>
                <textarea name="description" id="description" class="w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-violet-500" required></textarea>
            </div>

            <div>
                <label for="start_date" class="block text-gray-700 font-medium">Start Date:</label>
                <input type="date" name="start_date" id="start_date" class="w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-violet-500" required>
            </div>

            <div>
                <label for="end_date" class="block text-gray-700 font-medium">End Date:</label>
                <input type="date" name="end_date" id="end_date" class="w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-violet-500" required>
            </div>

            <button type="submit" class="w-full bg-violet-500 hover:bg-violet-600 text-white font-medium py-2 rounded-lg focus:outline-none focus:ring-4 focus:ring-violet-300">
                Create Course
            </button>
        </form>
    </div>
</body>
</html>
