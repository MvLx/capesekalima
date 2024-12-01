<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Courses</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@3.2.1/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
    <link href="https://unpkg.com/flowbite@1.4.7/dist/flowbite.min.css" rel="stylesheet"/>
</head>
<body>
    <style>
        #slider::-webkit-scrollbar {
            display: none;
        }
    </style>
    
    @include('components.navbar')

    <!-- Slider Container -->
    <div class="relative m-8 mt-20">
        <!-- Tombol Navigasi Kiri -->
        <button id="prev" class="absolute left-0 top-1/2 transform -translate-y-1/2 -ml-4 bg-black hover:bg-violet-500 text-gray-800 font-bold py-2 px-4 rounded-full z-10">
            <img src="{{ asset('images/arr.png') }}" class="w-6 h-6">
        </button>

        <!-- Slider -->
        <div id="slider" class="flex gap-6 overflow-x-auto scroll-smooth snap-x snap-mandatory p-8" style="scrollbar-width: none; -ms-overflow-style: none;">
            @foreach ($courses as $course)
            <div class="snap-start flex-shrink-0 w-64 bg-white border border-gray-200 rounded-lg shadow">
                <a href="{{ route('courses.show', $course->id) }}">
                    <img class="rounded-t-lg" src="{{ asset('images/onlinelearn.jpg') }}" alt="Course Image" />
                </a>
                <div class="p-5 flex-grow overflow-hidden">
                    <a href="{{ route('courses.show', $course->id) }}">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">{{ $course->course_name }}</h5>
                    </a>
                    <p class="mb-3 font-normal text-gray-700 max-h-24 overflow-hidden text-ellipsis">{{ $course->description }}</p>
                    <a href="{{ route('courses.show', $course->id) }}" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-violet-500 rounded-lg hover:bg-black focus:ring-1 focus:outline-none focus:ring-black">
                        Read more
                        <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                        </svg>
                    </a>
                </div>
            </div>
            @endforeach
        </div>

        <!-- Tombol Navigasi Kanan -->
        <button id="next" class="absolute right-0 top-1/2 transform -translate-y-1/2 -mr-4 bg-black hover:bg-violet-500 text-gray-800 font-bold py-2 px-4 rounded-full z-10">
            <img src="{{ asset('images/arrkanan.png') }}" class="w-6 h-6">
        </button>
    </div>

    <script>
        const slider = document.getElementById('slider');
        const next = document.getElementById('next');
        const prev = document.getElementById('prev');

        let scrollAmount = 0;

        // Fungsi untuk looping slider ke awal
        next.addEventListener('click', () => {
            const maxScrollLeft = slider.scrollWidth - slider.clientWidth;
            
            if (scrollAmount >= maxScrollLeft) {
                slider.scrollTo({ left: 0, behavior: 'smooth' });
                scrollAmount = 0;
            } else {
                slider.scrollBy({ left: 300, behavior: 'smooth' });
                scrollAmount += 300;
            }
        });

        // Fungsi untuk looping slider ke akhir
        prev.addEventListener('click', () => {
            if (scrollAmount <= 0) {
                scrollAmount = slider.scrollWidth - slider.clientWidth;
                slider.scrollTo({ left: scrollAmount, behavior: 'smooth' });
            } else {
                slider.scrollBy({ left: -300, behavior: 'smooth' });
                scrollAmount -= 300;
            }
        });

        // Deteksi jika user melakukan scroll manual
        slider.addEventListener('scroll', () => {
            scrollAmount = slider.scrollLeft;
        });
    </script>

    <!-- Tombol Back to Dashboard -->
    <div class="flex justify-center mt-8">
        <a href="{{ route('dashboard') }}" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-black rounded-lg hover:bg-violet-600 focus:ring-1 focus:outline-none focus:ring-black">
            <svg class="w-3.5 h-3.5 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 5H1m0 0l4-4M1 5l4 4"/>
            </svg>
            Back To Dashboard
        </a>
    </div>
</body>
</html>