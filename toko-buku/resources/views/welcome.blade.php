<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>YUKISEA — Find Peace in Every Page</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    body, html {
      margin: 0;
      padding: 0;
    }
    .text-shadow {
      text-shadow: 0 2px 4px rgba(0,0,0,0.6);
    }
    .scrollbar-hide::-webkit-scrollbar {
    display: none;
  }
  .scrollbar-hide {
    -ms-overflow-style: none;
    scrollbar-width: none;
  }
  </style>
</head>
<body class="relative font-sans text-white overflow-x-hidden">

  <!-- Background Video -->
  <div class="absolute top-0 left-0 w-full h-screen z-0 overflow-hidden">
    <video autoplay muted loop class="w-full h-full object-cover brightness-75">
      <source src="{{ asset('video/background.mp4') }}" type="video/mp4">
      Your browser does not support the video tag.
    </video>
  </div>

  <!-- Navbar -->
  <header class="relative z-10 w-full flex justify-between items-center px-6 py-4 bg-transparent backdrop-blur-md">
    <div class="text-white text-2xl font-bold">YUKISEA</div>
    <nav class="space-x-4 text-sm md:text-base">
      <a href="/" class="hover:text-blue-200 transition">Home</a>
      <a href="/product" class="hover:text-blue-200 transition">Product</a>

      @if (Route::has('login'))
        @auth
          <a href="{{ url('/dashboard') }}" class="hover:text-blue-300 transition">Dashboard</a>
        @else
          <a href="{{ route('login') }}" class="hover:text-blue-300 transition">Login</a>
          @if (Route::has('register'))
            <a href="{{ route('register') }}" class="ml-2 border border-white px-4 py-1 rounded hover:bg-white hover:text-blue-600 transition">
              Register
            </a>
          @endif
        @endauth
      @endif
    </nav>
  </header>

  <!-- Hero Section -->
  <section class="relative z-10 flex flex-col items-center justify-center h-screen text-center px-4">
    <h1 class="text-4xl sm:text-5xl md:text-6xl font-bold text-white text-shadow mb-6">
      Find Peace in Every Page
    </h1>
    <p class="text-lg sm:text-xl md:text-2xl max-w-2xl text-white text-shadow">
      Welcome to Yukisea — where stories flow like waves. Discover books that calm your soul, spark your curiosity, and carry you beyond the horizon.
    </p>
    <a href="#"
       class="mt-8 bg-blue-600 hover:bg-blue-700 text-white font-semibold px-6 py-3 rounded-lg shadow-md transition">
      Explore Now
    </a>
  </section>

  {{-- Product section --}}

  <!-- Product Section -->
<!-- Product Section -->
<section class="relative z-10 bg-white text-gray-800 py-20 px-4 sm:px-8 md:px-12">
  <h2 class="text-3xl font-bold text-center mb-12">Our Books</h2>

  <div class="relative">
    <!-- Left Arrow -->
    <button onclick="prevSlide()"
      class="absolute left-2 top-1/2 -translate-y-1/2 z-20 bg-white text-blue-600 p-3 rounded-full shadow-lg hover:bg-blue-100 transition hidden sm:block">
      <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none"
           viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M15 19l-7-7 7-7" />
      </svg>
    </button>

    <!-- Product Slider -->
    <div id="slider" class="flex gap-6 overflow-x-auto scroll-smooth snap-x snap-mandatory scrollbar-hide px-6">
      @for ($i = 1; $i <= 10; $i++)
        <div class="min-w-[260px] max-w-[260px] flex-shrink-0 bg-gray-100 rounded-xl shadow-lg snap-start transform hover:scale-105 transition duration-300 ease-in-out">
          <img src="{{ asset('image/book' . $i . '.jpg') }}" alt="Book {{ $i }}" class="w-full h-60 object-cover rounded-t-xl" />
          <div class="p-4">
            <h3 class="font-semibold text-lg mb-1"> {{ $i }}</h3>
            <p class="text-sm text-gray-600 mb-4">A wonderful and inspiring read for every mind.</p>
            <a href="{{ route('login') }}"
               class="block text-center bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 rounded transition">
              Buy Now
            </a>
          </div>
        </div>
      @endfor
    </div>

    <!-- Right Arrow -->
    <button onclick="nextSlide()"
      class="absolute right-2 top-1/2 -translate-y-1/2 z-20 bg-white text-blue-600 p-3 rounded-full shadow-lg hover:bg-blue-100 transition hidden sm:block">
      <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none"
           viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M9 5l7 7-7 7" />
      </svg>
    </button>
  </div>
</section>


</body>
<script>
  let current = 0;

  function nextSlide() {
    const container = document.getElementById('slider');
    const items = container.children;
    current++;
    if (current >= items.length) current = 0;
    container.scrollTo({
      left: items[current].offsetLeft,
      behavior: 'smooth'
    });
  }

  function prevSlide() {
    const container = document.getElementById('slider');
    const items = container.children;
    current--;
    if (current < 0) current = items.length - 1;
    container.scrollTo({
      left: items[current].offsetLeft,
      behavior: 'smooth'
    });
  }
</script>

</html>
