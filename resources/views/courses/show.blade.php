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
    <div class="w-full max-w-2xl h-[600px] mt-[84px] p-6  bg-gray-300  border border-gray-200 rounded-lg flex flex-col text-center overflow-hidden">
        <!-- Nama Kursus -->
        <h1 class="mb-4 text-2xl font-bold tracking-tight text-gray-900">
            {{ $course->course_name }}
        </h1>

        <!-- Deskripsi Kursus -->
        <p class="mb-3 font-normal text-gray-700 overflow-y-auto max-h-24 no-scrollbar">
            {{ $course->description }}
        </p>

     
        <!-- Konten Kursus -->
        <h2 class="mb-3 text-xl font-bold tracking-tight text-gray-900 ">Contents</h2>
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

        <!-- Pesan Kesalahan (Jika Ada) -->
        @if (session('error'))
            <div class="alert alert-danger mb-4">
                {{ session('error') }}
            </div>
        @endif

        

       <!-- Tanggal Mulai dan Selesai -->
    <div class="flex justify-center space-x-4 mb-2 mt-20">
        <p><strong>Start Date:</strong> {{ $course->start_date }}</p>
        <p><strong>End Date:</strong> {{ $course->end_date }}</p>
    </div>

      <!-- Jumlah Murid Terdaftar -->
      <p class="mb-4"><strong>Enrolled Students:</strong> {{ $course->enrollments->count() }}</p>



    <div class="absolute bottom-4 left-1/2 transform -translate-x-1/2 mb-10">
          <!-- Tombol Aksi untuk Bergabung -->
          @if(auth()->user()->role === 'Student' && !$course->enrollments->where('user_id', auth()->id())->count())
          <form action="{{ route('enrollments.store') }}" method="POST" class="mb-4">
              @csrf
              <input type="hidden" name="course_id" value="{{ $course->id }}">
              <button type="submit" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300">
                  Join Course
              </button>
          </form>
      @else
          <p class="text-success mb-4">already Joined.</p>
      @endif
        <a href="{{ route('dashboard') }}" class="inline-flex items-center px-4 py-2 text-sm font-medium text-center text-white bg-black rounded-lg hover:bg-violet-500 focus:ring-4 focus:outline-none focus:ring-gray-300">
            Back to Dashboard
        </a>
        
    </div>
    </div>
</div>
@endsection
