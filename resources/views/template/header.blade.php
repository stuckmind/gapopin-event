@extends('template.app')
@section('header')
    <header class="bg-white shadow sticky top-0 z-50">
        <div class="container mx-auto">
            <div class="flex justify-between items-center h-16">
                <!-- Logo -->
                <a href="/" class="text-2xl font-bold text-blue-600">
                    Event <span class="text-gray-800">Gapopin</span>
                </a>

                <!-- Navigation -->
                <nav class="hidden md:flex space-x-6">
                    <a href="/" class="text-gray-600 hover:text-blue-600">Beranda</a>
                    <a href="#events" class="text-gray-600 hover:text-blue-600">Event</a>
                    <a href="#about" class="text-gray-600 hover:text-blue-600">Tentang</a>
                    <a href="#contact" class="text-gray-600 hover:text-blue-600">Kontak</a>
                </nav>
            </div>
        </div>
    </header>

    @yield('body')
@endsection