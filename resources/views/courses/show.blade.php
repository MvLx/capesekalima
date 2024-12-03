@extends('layouts.app')

@section('content')
<style>
    .no-scrollbar::-webkit-scrollbar {
        display: none;
    }
    .no-scrollbar {
        -ms-overflow-style: none;  /* Internet Explorer 10+ */
        scrollbar-width: none;  /* Firefox */
    }
</style>
<div class="container flex justify-center items-center min-h-screen">
    <div class="w-full max-w-2xl h-[600px] mt-[84px] p-6 bg-gray-300 border border-gray-200 rounded-lg flex flex-col text-center overflow-hidden relative">
        <!-- Tombol Back to Dashboard -->
        <a href="{{ route('dashboard') }}" class="absolute top-4 left-4 text-gray-500 hover:text-gray-700">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12h18M3 12l6-6M3 12l6 6"/>
            </svg>
        </a>

        <!-- Nama Kursus dan Tombol Join Course -->
        <h1 class="text-2xl font-bold tracking-tight text-gray-900">
            {{ $course->course_name }}
        </h1>
        <div class="flex justify-end">
            @if(auth()->user()->role === 'Student' && !$course->enrollments->where('user_id', auth()->id())->count())
                <form action="{{ route('enrollments.store') }}" method="POST" class="mb-4">
                    @csrf
                    <input type="hidden" name="course_id" value="{{ $course->id }}">
                    <button type="submit" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-violet-500 rounded-lg hover:bg-violet-700 focus:ring-4 focus:outline-none focus:ring-blue-300">
                        Join Course
                    </button>
                </form>
            @else
                <p class="text-success mb-4">already Joined.</p>
            @endif
        </div>

        <!-- Deskripsi Kursus -->
        <p class="mb-3 font-normal text-gray-700 overflow-y-auto max-h-24 no-scrollbar">
            {{ $course->description }}
        </p>

        <!-- Konten Kursus -->
        <h2 class="mb-3 text-xl font-bold tracking-tight text-gray-900">Contents</h2>
        <div class="mb-4 overflow-y-auto max-h-32 border border-gray-300 rounded p-2 bg-gray-300 no-scrollbar">
            <ul class="list-disc list-inside">
                @forelse ($course->contents as $content)
                    <li class="mb-2">
                        <strong>{{ $content->title }}</strong> 
                        <a href="{{ route('contents.view', $content->id) }}" class="text-violet-500 hover:underline ml-2">View Content</a>
                    </li>
                @empty
                    <p class="text-gray-700">No contents available for this course.</p>
                @endforelse
            </ul>
        </div>

        <!-- Forums -->
        <h2 class="text-2xl font-semibold text-gray-800 mb-4">Forums</h2>
        <ul class="space-y-4 mb-6">
            @forelse ($course->forums as $forum)
                <li class="bg-white p-4 rounded-lg shadow">
                    <a href="{{ route('forums.show', $forum->id) }}" class="text-lg font-bold text-blue-500 hover:underline">
                        {{ $forum->topic }}
                    </a>
                    <p class="text-gray-600">{{ $forum->discussions->count() }} discussions</p>
                </li>
            @empty
                <p class="text-gray-500">No forums available yet.</p>
            @endforelse
        </ul>

        <!-- Create Forum button -->
        @if(auth()->user()->role === 'Teacher' || auth()->user()->role === 'Student')
            <a href="{{ route('forums.create', $course->id) }}" class="bg-violet-500 text-white px-4 py-2 rounded-lg hover:bg-violet-600">
                Create Forum
            </a>
        @endif

        <!-- Pesan Kesalahan (Jika Ada) -->
        @if (session('error'))
            <div class="alert alert-danger mb-4">
                {{ session('error') }}
            </div>
        @endif

        <!-- Jumlah Murid Terdaftar -->
        <p class="mb-4"><strong>Enrolled Students:</strong> {{ $course->enrollments->count() }}</p>

        <!-- Tanggal Mulai dan Selesai -->
        <div class="flex justify-center space-x-4 mb-2 mt-20">
            <p><strong>Start Date:</strong> {{ $course->start_date }}</p>
            <p><strong>End Date:</strong> {{ $course->end_date }}</p>
        </div>
    </div>
</div>
@endsection