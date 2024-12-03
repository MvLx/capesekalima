@extends('layouts.app')

@section('content')
<div class="flex justify-center items-start min-h-screen bg-gray-100 mt-20">
    <div class="bg-gradient-to-t from-violet-500 to-violet-200 rounded-lg shadow-md w-full md:w-3/4 lg:w-3/5 p-6 mt-8">
        <!-- Media Konten -->
        <div class="relative">
            @if ($content->media_type === 'youtube')
                <iframe 
                    class="w-full h-60 md:h-96" 
                    src="{{ $content->media_path }}" 
                    frameborder="0" 
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                    allowfullscreen>
                </iframe>
            @elseif ($content->media_type === 'video')
                <video 
                    controls 
                    class="w-full max-h-96 rounded-md">
                    <source src="{{ asset('storage/' . $content->media_path) }}" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
            @endif
        </div>

        <!-- Tombol Aksi di Bawah Video -->
        <div class="flex flex-col md:flex-row justify-center items-center mt-6 space-y-4 md:space-y-0 md:space-x-4">
            <form action="{{ route('progress.markAsDone', $content->id) }}" method="POST">
                @csrf
                <button type="submit" class="bg-white hover:bg-gray-200 text-black font-bold py-2 px-4 rounded">
                    Mark as Done
                </button>
            </form>

            <a href="{{ route('courses.show', $content->course_id) }}" class="bg-white hover:bg-gray-200 text-black font-bold py-2 px-4 rounded">
                Back to Courses
            </a>
        </div>
    </div>

    <!-- Panel Body di Samping -->
    <div class="bg-white rounded-lg shadow-md w-full md:w-1/4 lg:w-2/5 p-4 ml-4 mt-8">
        <h2 class="text-2xl font-bold text-gray-800 mb-4">{{ $content->title }}</h2>
        <p class="text-gray-600 text-lg">
            {{ $content->body }}
        </p>
    </div>
</div>
@endsection
