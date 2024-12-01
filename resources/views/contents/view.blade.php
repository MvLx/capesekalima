@extends('layouts.app')

@section('content')
<div class="flex justify-center items-center min-h-screen bg-gray-100 mt-20">
    <div class="bg-white rounded-lg shadow-md w-full md:w-3/4 lg:w-1/2 p-6">
        <!-- Media Konten -->
        <div class="media">
            @if ($content->media_type === 'youtube')
                <!-- YouTube Embed -->
                <div class="relative">
                    <iframe 
                        class="w-full h-60 md:h-96" 
                        src="{{ $content->media_path }}" 
                        frameborder="0" 
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                        allowfullscreen>
                    </iframe>
                </div>
            @elseif ($content->media_type === 'video')
                <!-- Video Player -->
                <video 
                    controls 
                    class="w-full max-h-96 rounded-md">
                    <source src="{{ asset('storage/' . $content->media_path) }}" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
            @elseif ($content->media_type === 'file')
                <!-- File Viewer -->
                @php
                    $fileExtension = pathinfo($content->media_path, PATHINFO_EXTENSION);
                @endphp

                @if (in_array($fileExtension, ['pdf']))
                    <!-- PDF Viewer -->
                    <iframe 
                        src="{{ asset('storage/' . $content->media_path) }}" 
                        frameborder="0" 
                        class="w-full h-96">
                    </iframe>
                @else
                    <!-- Download Link for Other Files -->
                    <a 
                        href="{{ asset('storage/' . $content->media_path) }}" 
                        download 
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded inline-block">
                        Download {{ strtoupper($fileExtension) }} File
                    </a>
                @endif
            @endif
        </div>

        <!-- Detail Konten -->
        <div class="mt-6">
            <h1 class="text-3xl font-bold text-gray-800">{{ $content->title }}</h1>
        </div>
        <div class="mt-6 text-center">
            <p class="text-gray-600 text-lg mt-2">
                {{ $content->body }}
            </p>
        </div>

        <!-- Tombol Aksi -->
        <div class="flex flex-col md:flex-row justify-center items-center mt-6 space-y-4 md:space-y-0 md:space-x-4">
            <form action="{{ route('progress.markAsDone', $content->id) }}" method="POST">
                @csrf
                <button type="submit" class="bg-violet-500 hover:bg-black text-white font-bold py-2 px-4 rounded">
                    Mark as Done
                </button>
            </form>

            <a href="{{ route('courses.show', $content->course_id) }}" class="bg-black hover:bg-violet-500 text-white font-bold py-2 px-4 rounded">
                Back to Courses
            </a>
        </div>
    </div>
</div>
@endsection
