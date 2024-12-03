<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Forum</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        function updateBackButton() {
            const courseId = document.getElementById('course_id').value;
            const backButton = document.getElementById('backButton');
            backButton.href = `/courses/${courseId}`; // Sesuaikan dengan route yang benar
        }
    </script>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="w-full max-w-lg bg-white p-8 rounded-lg shadow-lg">
        <h1 class="text-2xl font-bold text-violet-700 mb-6 text-center">Create Forum</h1>

        @if (session('success'))
            <div class="mb-4 p-4 bg-green-100 text-green-700 rounded-lg">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="mb-4 p-4 bg-red-100 text-red-700 rounded-lg">
                {{ session('error') }}
            </div>
        @endif

        <form action="{{ route('forums.store') }}" method="POST" class="space-y-6">
            @csrf
            <div>
                <label for="topic" class="block text-gray-700">Forum Topic</label>
                <input type="text" name="topic" id="topic" class="w-full border border-gray-300 rounded-lg p-2 focus:ring-violet-500 focus:border-violet-500" required>
            </div>
            <div>
                <label for="course_id" class="block text-gray-700">Select Course</label>
                <select name="course_id" id="course_id" class="w-full border border-gray-300 rounded-lg p-2 focus:ring-violet-500 focus:border-violet-500" required onchange="updateBackButton()">
                    @foreach ($courses as $course)
                        <option value="{{ $course->id }}">{{ $course->course_name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="w-full bg-violet-500 text-white font-medium py-2 px-4 rounded-lg hover:bg-violet-600">
                Create Forum
            </button>
        </form>

        <a id="backButton" href="{{ route('courses.show', $courses->first()->id) }}" class="mt-4 inline-block w-full text-center bg-gray-600 text-white py-2 px-4 rounded-lg hover:bg-gray-700">
            Back to Course
        </a>
    </div>
</body>
</html>
