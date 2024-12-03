@extends('layouts.app')

@section('content')
<div class="container mt-24 flex flex-col items-center">


    @if ($courses->isEmpty())
        <p class="text-gray-700 dark:text-gray-300">No courses found for your search.</p>
    @else
        <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3 justify-center">
            @foreach ($courses as $course)
            <div class="max-w-sm p-6 bg-gradient-to-b from-violet-400 to-white border border-gray-200 rounded-lg shadow">
                <a href="{{ route('courses.show', $course->id) }}">
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-black">
                        {{ $course->course_name }}
                    </h5>
                </a>
                <p class="mb-3 font-normal text-gray-700 ">
                    {{ Str::limit($course->description, 100, '...') }}
                </p>
                <a href="{{ route('courses.show', $course->id) }}" 
                   class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-violet-400 rounded-lg hover:bg-violet-600 focus:ring-4 focus:outline-none focus:ring-blue-300">
                    Read more
                    <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                    </svg>
                </a>
            </div>
            @endforeach
        </div>
    @endif

    <div class="mt-6 flex space-x-4">
        <a href="{{ route('dashboard') }}" 
           class="inline-flex items-center px-3 py-2 text-sm font-medium text-white bg-gray-600 rounded-lg hover:bg-gray-700">
            Back to Dashboard
        </a>
</div>
@endsection
