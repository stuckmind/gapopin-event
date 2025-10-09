@extends('template.app')
@section('header')
<header class="bg-white shadow sticky top-0 z-50">
    <div class="container mx-auto px-4">
        <div class="flex justify-between items-center h-16">
            <!-- Logo -->
            <a href="/" class="flex items-center space-x-2 text-2xl font-bold text-blue-600 hover:text-blue-700 transition">
                <i class="fa-solid fa-calendar-day"></i>
                <span>Gapopin <span class="text-gray-800 font-semibold">Event</span></span>
            </a>

            <!-- Navigation -->
            <nav class="hidden md:flex items-center space-x-6">
                <a href="/" class="flex items-center gap-2 text-gray-600 hover:text-blue-600 transition">
                    <i class="fa-solid fa-house"></i> 
                    <span>Beranda</span>
                </a>
                <a href="#events" class="flex items-center gap-2 text-gray-600 hover:text-blue-600 transition">
                    <i class="fa-solid fa-calendar-days"></i> 
                    <span>Event</span>
                </a>
                <a href="{{ route('registrasi.search') }}" 
                   class="flex items-center gap-2 bg-blue-600 text-white px-4 py-2 rounded-md shadow hover:bg-blue-700 transition">
                    <i class="fa-solid fa-id-card"></i>
                    <span>Registrasi</span>
                </a>
                <a href="#contact" class="flex items-center gap-2 text-gray-600 hover:text-blue-600 transition">
                    <i class="fa-solid fa-envelope"></i> 
                    <span>Kontak</span>
                </a>
            </nav>

            <!-- Mobile Menu Button -->
            <button id="mobile-menu-btn" class="md:hidden text-gray-700 hover:text-blue-600 focus:outline-none">
                <i class="fa-solid fa-bars text-xl"></i>
            </button>
        </div>

        <!-- Mobile Menu -->
        <div id="mobile-menu" class="hidden flex-col space-y-4 mt-2 pb-4 md:hidden">
            <a href="/" class="flex items-center gap-2 text-gray-600 hover:text-blue-600 transition">
                <i class="fa-solid fa-house"></i> 
                <span>Beranda</span>
            </a>
            <a href="#events" class="flex items-center gap-2 text-gray-600 hover:text-blue-600 transition">
                <i class="fa-solid fa-calendar-days"></i> 
                <span>Event</span>
            </a>
            <a href="{{ route('registrasi.search') }}" 
               class="flex items-center gap-2 bg-blue-600 text-white px-4 py-2 rounded-md shadow hover:bg-blue-700 transition">
                <i class="fa-solid fa-id-card"></i>
                <span>Registrasi</span>
            </a>
            <a href="#contact" class="flex items-center gap-2 text-gray-600 hover:text-blue-600 transition">
                <i class="fa-solid fa-envelope"></i> 
                <span>Kontak</span>
            </a>
        </div>
    </div>

    <!-- Mobile Menu Toggle Script -->
    <script>
        const btn = document.getElementById('mobile-menu-btn');
        const menu = document.getElementById('mobile-menu');
        btn.addEventListener('click', () => {
            menu.classList.toggle('hidden');
        });
    </script>
</header>


    @yield('body')
@endsection