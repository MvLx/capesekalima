<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>Smart Course</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet"/>
    <link href="https://unpkg.com/flowbite@1.4.7/dist/flowbite.min.css" rel="stylesheet"/>
    <style>
        body {
            font-family: 'Roboto', sans-serif;
        }
        body, html {
            overflow-x: hidden;
        }
    </style>
</head>
<body class="bg-gray-100 scroll-smooth">
    {{-- NAVBAR SECTION --}}
    <nav class="bg-transparent absolute top-0 w-full z-50">
        <div class="max-w-screen-xl mx-auto flex items-center justify-between p-4">
            <!-- Logo -->
            <a href="#" class="flex items-center">
                {{-- <img src="https://flowbite.com/docs/images/logo.svg" class="h-8" alt="Education Logo" /> --}}
                <span class="ml-5 text-2xl font-semibold text-white">Smart Course</span>
            </a>
            <!-- Navbar Links -->
            <div class="hidden md:flex items-center space-x-6">
                <a href="#" class="text-white hover:text-gray-400 transition">Home</a>
                <a href="#preview-section" class="text-white hover:text-gray-400 transition">All Courses</a>
                <a href="#testimoni-section" class="text-white hover:text-gray-400 transition">About Us</a>
                <a href="#footer-section" class="text-white hover:text-gray-400 transition">Contact</a>
                <a href="{{ route('login') }}" class="bg-violet-600 text-white px-7 py-2 rounded-full hover:bg-violet-700 transition">Login</a>
                <a href="{{ route('register') }}" class="bg-white text-black px-7 py-2 rounded-full hover:bg-violet-600 hover:text-white transition">Register</a>
            </div>
            <!-- Mobile Menu Button -->
            {{-- <button class="md:hidden text-white focus:outline-none" id="menu-toggle">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                </svg>
            </button> --}}
        </div>
    </nav>
    {{-- HERO SECTION --}}
    <section class="relative bg-cover bg-center h-screen" style="background-image: url('{{ asset('images/learning.jpg') }}'); background-attachment: fixed;">
        <div class="absolute inset-0 bg-gray-600 opacity-80"></div>
        <div class="container mx-auto px-4 py-32 relative z-10 text-white ml-5">
            <div class="text-xl  uppercase mt-28">Welcome To Smart Course</div>
            <h1 id="quotes" class="text-5xl font-bold mt-4 break-words w-full max-w-3xl leading-relaxed">"Code is like humor. When you have to explain it, it’s bad."</h1>
            <p class="mt-4 text-lg">A Place Where You Can Find The Learning Materials You Need.</p>
            <div class="mt-8">
                <a class="bg-violet-600 text-white px-2 py-3 rounded mr-2 hover:bg-violet-700" href="#">View All Courses</a>
            </div>
        </div>
    </section>
    {{-- THINGS SECTION --}}
    <section class="py-16 bg-white">
        <div class="container mx-auto px-4 text-center">
            <h2 class="text-3xl font-bold">Things You Can Learn With Us!</h2>
            <div class="flex justify-center space-x-8 mt-8">
                <i class="fab fa-html5 text-5xl text-gray-400 transition hover:text-orange-600"></i>
                <i class="fab fa-css3-alt text-5xl text-gray-400 transition hover:text-blue-600"></i>
                <i class="fab fa-js text-5xl text-gray-400 transition hover:text-yellow-300"></i>
                <i class="fab fa-php text-5xl text-gray-400 hover:text-sky-600"></i>
                <i class="fab fa-laravel text-5xl text-gray-400 hover:text-red-600"></i>
            </div>
        </div>
    </section>
    {{-- PREVIEW SECTION --}}
    <section id="preview-section" class="py-16 bg-gray-100">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-center">Preview</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mt-8">
                <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                    <img alt="HTML5/CSS3 Essentials" class="w-full h-48 object-cover" height="300" src="{{ asset('images/stockhtml.jpg') }}">
                    <div class="p-4">
                        <h3 class="text-xl font-bold">HTML5/CSS3 Essentials</h3>
                        <p class="mt-2 text-gray-600">Start with HTML to build the web structure, then use CSS to make it more attractive and stylish!</p>
                        <a class="mt-10 inline-block bg-violet-600 text-white px-4 py-2 rounded" href="#">See more...</a>
                    </div>
                </div>
                <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                    <img alt="E-Commerce Course" class="w-full h-48 object-cover" height="300" src="{{ asset('images/ecommercestock.jpg') }}" width="400"/>
                    <div class="p-4">
                        <h3 class="text-xl font-bold">Online Shopping Website Tutorial </h3>
                        <p class="mt-2 text-gray-600">You can learn how to make website such like Online Shopping Website!</p>
                        <a class="mt-10 inline-block bg-violet-600 text-white px-4 py-2 rounded" href="#">See more...</a>
                    </div>
                </div>
                <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                    <img alt="WordPress Basic Tutorial" class="w-full h-48 object-cover" height="300" src="{{ asset('images/stockphp.jpg') }}"/>
                    <div class="p-4">
                        <h3 class="text-xl font-bold">PHP Basic Tutorial</h3>
                        <p class="mt-2 text-gray-600">PHP is a server-side programming language that allows you to build dynamic and interactive websites easily!</p>
                        <a class="mt-4 inline-block bg-violet-600 text-white px-4 py-2 rounded" href="#">See more...</a>
                    </div>
                </div>
                
            </div>
        </div>
    </section>
    {{-- TESTIMONI SECTION --}}
    <section id="testimoni-section" class="py-16 bg-gray-100">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-center">Trusted by Thousand of Students and Tutors</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mt-8">
                <div>
                    <div class="bg-white shadow-lg rounded-lg p-6">
                        <p class="text-gray-600">"Massa amet, at dolor tellus pellentesque congue in eget massa tincidunt habitasse volutpat adipiscing sed id ut auctor eu vivamus nulla."</p>
                        <div class="flex items-center mt-4">
                            <img alt="Emma Hart" class="w-12 h-12 rounded-full" height="50" src="{{ asset('images/student1.jpeg') }}" width="50"/>
                            <div class="ml-4">
                                <h3 class="text-lg font-bold">Marsha lenathea Lapian</h3>
                                <p class="text-gray-600">Student</p>
                            </div>
                        </div>
                    </div>
                    <div class="bg-white shadow-lg rounded-lg p-6 mt-8">
                        <p class="text-gray-600">"Donec in varius facilisis justo, curabitur aliquet sit justo sed sit interdum diam dolor ornare quia a felis adipiscing hendrerit quisque enim."</p>
                        <div class="flex items-center mt-4">
                            <img alt="Jonathan Doe" class="w-12 h-12 rounded-full" height="50" src="{{ asset('images/Haerin icon.jpg') }}" width="50"/>
                            <div class="ml-4">
                                <h3 class="text-lg font-bold">Kang Haerin</h3>
                                <p class="text-gray-600">Student</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="bg-white shadow-lg rounded-lg p-6">
                        <p class="text-gray-600">"Ut mauris felis, felis massa quam sit massa, amet, atibendum pulvinar elit in adipiscing amet imperdiet at felis sapien enim, elementum orci."</p>
                        <div class="flex items-center mt-4">
                            <img alt="Eddie Johnson" class="w-12 h-12 rounded-full" height="50" src="{{ asset('images/lapu api windah.jpg') }}" width="50"/>
                            <div class="ml-4">
                                <h3 class="text-lg font-bold">Windah Batubara Ambatussauda</h3>
                                <p class="text-gray-600">Tutor</p>
                            </div>
                        </div>
                    </div>
                    <div class="bg-white shadow-lg rounded-lg p-6 mt-8">
                        <p class="text-gray-600">"Aliquam erat vitae enim, diam et nullam erat eo lacinia et, a pulvinar gravida enim in blandit mauris vitae volutpat urna sed justo hendrerit."</p>
                        <div class="flex items-center mt-4">
                            <img alt="Mike Edward" class="w-12 h-12 rounded-full" height="50" src="{{ asset('images/student2.jpeg') }}" width="50"/>
                            <div class="ml-4">
                                <h3 class="text-lg font-bold">Reynaldy Al</h3>
                                <p class="text-gray-600">Tutor</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    
{{-- FOOTER SECTION --}}
<footer id="footer-section" class="bg-white dark:bg-gray-900">
    <div class="mx-auto w-full max-w-screen-xl p-4 py-6 lg:py-8">
        <div class="md:flex md:justify-between ">
          <div class="mb-6 md:mb-0">
              <a href="https://flowbite.com/" class="flex items-center">
                  {{-- <img src="https://flowbite.com/docs/images/logo.svg" class="h-8 me-3" alt="FlowBite Logo" /> --}}
                  <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">Education</span>
              </a>
          </div>
          <div class="grid grid-cols-2 gap-8 sm:gap-6 sm:grid-cols-2">
              <div>
                  <h2 class="mb-6 text-sm font-semibold text-gray-900 uppercase dark:text-white">Contact Me On</h2>
                  <ul class="text-gray-500 dark:text-gray-400 font-medium">
                      <li class="mb-4">
                          <a href="https://www.instagram.com/mvlhh_" class="hover:underline ">Instagram</a>
                      </li>
                      <li>
                          <a href="https://api.whatsapp.com/send/?phone=6281237436175&text&type=phone_number&app_absent=0" class="hover:underline">Whatsapp</a>
                      </li>
                  </ul>
              </div>
              <div>
                  <h2 class="mb-6 text-sm font-semibold text-gray-900 uppercase dark:text-white">Legal</h2>
                  <ul class="text-gray-500 dark:text-gray-400 font-medium">
                      <li class="mb-4">
                          <a href="#" class="hover:underline">Privacy Policy</a>
                      </li>
                      <li>
                          <a href="#" class="hover:underline">Terms &amp; Conditions</a>
                      </li>
                  </ul>
              </div>
          </div>
      </div>
      <hr class="my-6 border-gray-200 sm:mx-auto dark:border-gray-700 lg:my-8" />
      <div class="sm:flex sm:items-center sm:justify-between">
          <span class="text-sm text-gray-500 sm:text-center dark:text-gray-400">© 2023 <a href="https://github.com/MvLx" class="hover:underline">MvL™</a>. All Rights Reserved.
          </span>
          <div class="flex mt-4 sm:justify-center sm:mt-0">
              <a href="https://www.facebook.com/share/1DbUFrG26u/" class="text-gray-500 hover:text-gray-900 dark:hover:text-white">
                  <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 8 19">
                        <path fill-rule="evenodd"  d="M6.135 3H8V0H6.135a4.147 4.147 0 0 0-4.142 4.142V6H0v3h2v9.938h3V9h2.021l.592-3H5V3.591A.6.6 0 0 1 5.592 3h.543Z" clip-rule="evenodd"/>
                    </svg>
                  <span class="sr-only">Facebook page</span>
              </a>
              <a href="discordapp.com/users/740927705784123424" class="text-gray-500 hover:text-gray-900 dark:hover:text-white ms-5">
                  <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 21 16">
                        <path d="M16.942 1.556a16.3 16.3 0 0 0-4.126-1.3 12.04 12.04 0 0 0-.529 1.1 15.175 15.175 0 0 0-4.573 0 11.585 11.585 0 0 0-.535-1.1 16.274 16.274 0 0 0-4.129 1.3A17.392 17.392 0 0 0 .182 13.218a15.785 15.785 0 0 0 4.963 2.521c.41-.564.773-1.16 1.084-1.785a10.63 10.63 0 0 1-1.706-.83c.143-.106.283-.217.418-.33a11.664 11.664 0 0 0 10.118 0c.137.113.277.224.418.33-.544.328-1.116.606-1.71.832a12.52 12.52 0 0 0 1.084 1.785 16.46 16.46 0 0 0 5.064-2.595 17.286 17.286 0 0 0-2.973-11.59ZM6.678 10.813a1.941 1.941 0 0 1-1.8-2.045 1.93 1.93 0 0 1 1.8-2.047 1.919 1.919 0 0 1 1.8 2.047 1.93 1.93 0 0 1-1.8 2.045Zm6.644 0a1.94 1.94 0 0 1-1.8-2.045 1.93 1.93 0 0 1 1.8-2.047 1.918 1.918 0 0 1 1.8 2.047 1.93 1.93 0 0 1-1.8 2.045Z"/>
                    </svg>
                  <span class="sr-only">Discord</span>
              </a>
              <a href="#" class="text-gray-500 hover:text-gray-900 dark:hover:text-white ms-5">
                  <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 17">
                    <path fill-rule="evenodd" d="M20 1.892a8.178 8.178 0 0 1-2.355.635 4.074 4.074 0 0 0 1.8-2.235 8.344 8.344 0 0 1-2.605.98A4.13 4.13 0 0 0 13.85 0a4.068 4.068 0 0 0-4.1 4.038 4 4 0 0 0 .105.919A11.705 11.705 0 0 1 1.4.734a4.006 4.006 0 0 0 1.268 5.392 4.165 4.165 0 0 1-1.859-.5v.05A4.057 4.057 0 0 0 4.1 9.635a4.19 4.19 0 0 1-1.856.07 4.108 4.108 0 0 0 3.831 2.807A8.36 8.36 0 0 1 0 14.184 11.732 11.732 0 0 0 6.291 16 11.502 11.502 0 0 0 17.964 4.5c0-.177 0-.35-.012-.523A8.143 8.143 0 0 0 20 1.892Z" clip-rule="evenodd"/>
                </svg>
                  <span class="sr-only">Twitter page</span>
              </a>
              <a href="#" class="text-gray-500 hover:text-gray-900 dark:hover:text-white ms-5">
                  <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 .333A9.911 9.911 0 0 0 6.866 19.65c.5.092.678-.215.678-.477 0-.237-.01-1.017-.014-1.845-2.757.6-3.338-1.169-3.338-1.169a2.627 2.627 0 0 0-1.1-1.451c-.9-.615.07-.6.07-.6a2.084 2.084 0 0 1 1.518 1.021 2.11 2.11 0 0 0 2.884.823c.044-.503.268-.973.63-1.325-2.2-.25-4.516-1.1-4.516-4.9A3.832 3.832 0 0 1 4.7 7.068a3.56 3.56 0 0 1 .095-2.623s.832-.266 2.726 1.016a9.409 9.409 0 0 1 4.962 0c1.89-1.282 2.717-1.016 2.717-1.016.366.83.402 1.768.1 2.623a3.827 3.827 0 0 1 1.02 2.659c0 3.807-2.319 4.644-4.525 4.889a2.366 2.366 0 0 1 .673 1.834c0 1.326-.012 2.394-.012 2.72 0 .263.18.572.681.475A9.911 9.911 0 0 0 10 .333Z" clip-rule="evenodd"/>
                  </svg>
                  <span class="sr-only">GitHub account</span>
              </a>
          </div>
      </div>
    </div>
</footer>



<script>
    // Daftar quotes
    const quotes = [
        "Code is like humor. When you have to explain it, it’s bad.",
        "First, solve the problem. Then, write the code.",
        "Experience is the name everyone gives to their mistakes.",
        "In order to be irreplaceable, one must always be different.",
        "Java is to JavaScript what car is to Carpet."
    ];

    // Pilih quote secara random
    const randomQuote = quotes[Math.floor(Math.random() * quotes.length)];

    // Sisipkan quote ke dalam elemen h1
    document.getElementById('quotes').innerText = `"${randomQuote}"`;
</script>
    {{-- @auth
        <a href="{{ route('dashboard') }}">Go to Dashboard</a>
    @else
        <a href="{{ route('login') }}">Login</a>
        <a href="{{ route('register') }}">Register</a>
    @endauth --}}
</body>
</html>