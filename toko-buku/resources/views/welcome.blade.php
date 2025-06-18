<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Yukisea Bookstore</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        .video-bg {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            z-index: -1;
        }
        .overlay {
            position: absolute;
            inset: 0;
            background: rgba(0, 0, 0, 0.5);
            z-index: 0;
        }
    </style>
</head>
<body class="relative text-white overflow-x-hidden">

    <!-- Background Video -->
    <video autoplay loop muted playsinline class="video-bg">
        <source src="{{ asset('video/background.mp4') }}" type="video/mp4">
        Your browser does not support the video tag.
    </video>
    <div class="overlay"></div>

    <!-- Navbar -->
    <header class="fixed w-full z-50 bg-black bg-opacity-60">
        <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">
            <div class="text-2xl font-bold tracking-wide">YUKISEA</div>
            <nav class="space-x-6 text-sm font-medium">
                <a href="#" class="hover:text-pink-400 transition">Home</a>
                <a href="#product" class="hover:text-pink-400 transition">Product</a>

                @if (Route::has('login'))
                    @auth
                        <a href="{{ url('/dashboard') }}" class="hover:text-pink-400 transition">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="hover:text-pink-400 transition">Login</a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="hover:text-pink-400 transition">Register</a>
                        @endif
                    @endauth
                @endif
            </nav>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="h-screen flex items-center justify-center text-center relative z-10 px-4">
        <div class="max-w-2xl">
            <h1 class="text-4xl sm:text-5xl md:text-6xl font-bold mb-4 leading-tight">
                Welcome to Yukisea
            </h1>
            <p class="text-lg md:text-xl text-gray-200 mb-6">
                Explore the sea of stories. Find your next favorite book with us — where every page brings you to a new world.
            </p>
            <a href="#product" class="bg-pink-500 hover:bg-pink-600 transition px-6 py-3 rounded-full text-white font-semibold shadow-md">
                MORE INFO
            </a>
        </div>
    </section>

</body>
</html>