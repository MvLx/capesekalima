<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Courses</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        function openModal(id) {
            document.getElementById('modal-' + id).classList.remove('hidden');
        }

        function closeModal(id) {
            document.getElementById('modal-' + id).classList.add('hidden');
        }

        function openProgressModal(id) {
            document.getElementById('progress-modal-' + id).classList.remove('hidden');
        }

        function closeProgressModal(id) {
            document.getElementById('progress-modal-' + id).classList.add('hidden');
        }
    </script>
</head>
<body class="bg-gray-100 mt-28">
    @include('components.navbar')
    <button type="button" class="mb-4 ml-10 inline-flex items-center px-3 py-2 text-sm font-medium text-white bg-gray-600 rounded-lg hover:bg-gray-700">
        <a href="{{ route('dashboard') }}">Back to Dashboard</a>
    </button>
    <a href="{{ route('courses.create') }}" class=" ml-4 inline-flex items-center px-3 py-2 text-sm font-medium text-white bg-violet-500 rounded-lg hover:bg-violet-700">
        Create New Course
    </a>
    <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3 p-8">
        @foreach ($courses as $course)
        <div class="max-w-sm p-6 bg-gradient-to-b from-violet-500 to-white border border-gray-200 rounded-lg shadow">
            <a href="{{ route('courses.show', $course->id) }}">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-white">
                    {{ $course->course_name }}
                </h5>
            </a>
            <button 
                class="mb-3 font-normal text-black underline"
                onclick="openModal({{ $course->id }})"
            >
                View Description
            </button>
            <div class="flex space-x-2">
                <a href="{{ route('courses.edit', $course->id) }}" 
                   class="px-3 py-2 text-sm font-medium text-black bg-white rounded-lg hover:bg-violet-300">
                    Edit
                </a>
                <form action="{{ route('courses.destroy', $course->id) }}" method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" 
                            class="px-3 py-2 text-sm font-medium text-white bg-red-600 rounded-lg hover:bg-red-700">
                        Delete
                    </button>
                </form>
                <button 
                    onclick="openProgressModal({{ $course->id }})" 
                    class="px-3 py-2 text-sm font-medium text-white bg-blue-500 rounded-lg hover:bg-blue-600">
                    See Progress
                </button>
            </div>
        </div>

        <!-- Modal for Description -->
        <div id="modal-{{ $course->id }}" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto h-full bg-gray-900 bg-opacity-50 flex items-center justify-center">
            <div class="relative w-full max-w-md bg-violet-200 rounded-lg shadow">
                <div class="p-6">
                    <h3 class="mb-4 text-xl font-medium text-black">Course Description</h3>
                    <div class="mb-4 text-gray-700 max-h-48 overflow-y-auto">
                        {{ $course->description }}
                    </div>
                    <button 
                        onclick="closeModal({{ $course->id }})"
                        class="w-full px-3 py-2 text-sm font-medium text-white bg-black rounded-lg hover:bg-violet-500">
                        Close
                    </button>
                </div>
            </div>
        </div>

        <!-- Modal for Progress -->
        <div id="progress-modal-{{ $course->id }}" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto h-full bg-gray-900 bg-opacity-50 flex items-center justify-center">
            <div class="relative w-full max-w-md bg-violet-200 rounded-lg shadow">
                <div class="p-6">
                    <h3 class="mb-4 text-xl font-medium text-black">Enrollment Progress</h3>
                    <ul class="mb-4 text-gray-700 max-h-48 overflow-y-auto">
                        @foreach ($course->enrollments as $enrollment)
                            <li>
                                {{ $enrollment->user->username }}: {{ $enrollment->progress }}%
                            </li>
                        @endforeach
                    </ul>
                    <button 
                        onclick="closeProgressModal({{ $course->id }})"
                        class="w-full px-3 py-2 text-sm font-medium text-white bg-black rounded-lg hover:bg-violet-500">
                        Close
                    </button>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</body>
</html>
