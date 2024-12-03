<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>My Enrollments</title>
</head>
<body class="bg-gray-100 mt-24">
    @include('components.navbar')

    <div class="relative">
        <a href="{{ route('dashboard') }}" class="absolute top-4 left-4 text-gray-500 hover:text-gray-700 ml-4">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12h18M3 12l6-6M3 12l6 6"/>
            </svg>
        </a>
        <h1 class="text-3xl font-bold mb-6 text-center">Enrollments</h1>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 p-4">
        @foreach ($enrollments as $enrollment)
            <div class="bg-white border border-gray-200 rounded-lg shadow-md h-full flex flex-col">
                <!-- Header Section -->
                <div class="h-24 bg-violet-300 rounded-t-lg flex items-center justify-center">
                    <span class="text-xl font-bold text-violet-700">{{ $enrollment->course->course_name }}</span>
                </div>

                <!-- Konten Kartu -->
                <div class="p-5 flex-grow">
                    <a href="">
                        <h5 class="mb-2 text-xl font-bold tracking-tight text-gray-900 ">
                            {{ $enrollment->course->course_name }}
                        </h5>
                        <h1 class="mb-2 text-sm  tracking-tight text-gray-900 ">
                            Created By : {{ $enrollment->course->user->username ?? 'unknown' }}
                        </h1>
                    </a>
                    <p class="mb-1 text-blue-700 font-bold">{{ $enrollment->course->course_code }}</p>

                    <!-- Progress Bar -->
                    <div class="w-full bg-gray-500 rounded-full mt-2">
                        <div class="bg-violet-500 text-xs font-medium text-blue-100 text-center p-0.5 leading-none rounded-full" 
                             style="width: {{ $enrollment->progress }}%">
                            {{ $enrollment->progress }}%Completed
                        </div>
                    </div>
                </div>

                <!-- Footer Section -->
                <div class="p-4 border-t border-gray-200 flex justify-between items-center">
                    <a href="{{ route('courses.contents', $enrollment->course->id) }}" 
                       class="text-blue-600 text-sm hover:underline">View Contents</a>
                    <button class="text-gray-400 hover:text-gray-600">
                        <i class="fas fa-ellipsis-h"></i>
                    </button>
                </div>
            </div>
        @endforeach
    </div>
</body>
</html>