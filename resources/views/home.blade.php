@extends('template.header')
@section('body')
<section class="relative text-white min-h-[92svh] flex items-center justify-center overflow-hidden">
    <!-- Animated Gradient Background -->
    <div class="absolute inset-0 animate-gradient bg-gradient-to-r from-blue-400 via-cyan-700 to-green-400 -z-10"></div>

    <div class="text-center px-6 z-10">
        <h1 class="text-3xl lg:text-5xl font-bold mb-4">Selamat Datang di Gapopin Event</h1>
        <p class="text-lg mb-6">Temukan semua kegiatan dan event terbaru di sini</p>
        <a href="#events" class="inline-block px-8 py-3 bg-white text-blue-600 font-semibold rounded-lg hover:bg-gray-100 transition">
            Lihat Event
        </a>
    </div>
</section>

<style>
/* Animasi gradient bergerak */
@keyframes gradientMove {
    0% {
        background-position: 0% 50%;
    }
    50% {
        background-position: 100% 50%;
    }
    100% {
        background-position: 0% 50%;
    }
}

.animate-gradient {
    background-size: 300% 300%;
    animation: gradientMove 15s ease infinite;
}
</style>
<section id="events" class="py-16 bg-gray-50">
    <div class="max-w-7xl mx-auto px-6">
        <h2 class="text-3xl font-bold text-center mb-10 text-gray-800">Daftar Event</h2>
        
        <div class="grid gap-8 md:grid-cols-3">
            @foreach ($events as $event)
                <div class="bg-white shadow-lg rounded-xl overflow-hidden hover:shadow-2xl transition duration-300 transform hover:-translate-y-1">
                    <div class="relative">
                        <img src="{{ asset('storage/' . $event->poster) }}" 
                             alt="{{ $event->title }}" 
                             class="h-56 w-full object-cover">
                        <span class="absolute top-3 left-3 bg-blue-600 text-white text-xs font-semibold px-2 py-1 rounded">Event</span>
                    </div>
                    <div class="p-5">
                        <h3 class="text-xl font-bold text-gray-800 mb-2">{{ $event->title }}</h3>

                        <div class="flex items-center text-gray-500 text-sm mb-1">
                            <i class="fas fa-calendar-alt mr-2"></i>
                            {{ \Carbon\Carbon::parse($event->tanggal)->locale('id')->translatedFormat('d F Y') }}
                        </div>
                        <div class="flex items-center text-gray-500 text-sm mb-4">
                            <i class="fas fa-map-marker-alt mr-2"></i>
                            {{ $event->location }}
                        </div>

                        <a href="{{ route('registrasi.form', ['slug' => $event->slug]) }}"
                           class="inline-block px-5 py-2 bg-blue-600 text-white font-semibold rounded-lg hover:bg-blue-700 transition">
                            Detail
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
<section class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-6 grid gap-8 md:grid-cols-3 text-center">
        <div class="p-6 bg-blue-50 rounded-xl shadow hover:shadow-lg transition">
            <i class="fas fa-chalkboard-teacher text-4xl text-blue-600 mb-4"></i>
            <h3 class="text-xl font-bold mb-2">Workshop</h3>
            <p class="text-gray-500">Belajar langsung dari praktisi dan ahli di bidangnya</p>
        </div>
        <div class="p-6 bg-purple-50 rounded-xl shadow hover:shadow-lg transition">
            <i class="fas fa-users text-4xl text-purple-600 mb-4"></i>
            <h3 class="text-xl font-bold mb-2">Seminar</h3>
            <p class="text-gray-500">Ikuti seminar menarik untuk menambah wawasan dan pengalaman</p>
        </div>
        <div class="p-6 bg-pink-50 rounded-xl shadow hover:shadow-lg transition">
            <i class="fas fa-trophy text-4xl text-pink-600 mb-4"></i>
            <h3 class="text-xl font-bold mb-2">Kompetisi</h3>
            <p class="text-gray-500">Ikuti kompetisi seru dengan hadiah menarik</p>
        </div>
    </div>
</section>
<section class="py-16 bg-blue-600 text-white">
    <div class="max-w-4xl mx-auto px-6 text-center">
        <h2 class="text-3xl font-bold mb-4">Dapatkan Info Event Terbaru</h2>
        <p class="mb-6">Masukkan emailmu untuk menerima update event dan kegiatan terbaru</p>
        <form class="flex flex-col md:flex-row gap-4 justify-center">
            <input type="email" placeholder="Email Anda" class="px-4 py-2 rounded-lg text-gray-800 flex-1">
            <button type="submit" class="px-6 py-2 bg-white text-blue-600 font-semibold rounded-lg hover:bg-gray-100 transition">Subscribe</button>
        </form>
    </div>
</section>
<footer class="bg-gray-800 text-white py-8">
    <div class="max-w-7xl mx-auto px-6 flex flex-col md:flex-row justify-between items-center">
        <p>&copy; {{ date('Y') }} Gapopin Event. All rights reserved.</p>
        <div class="flex gap-4 mt-4 md:mt-0">
            <a href="#" class="hover:text-gray-300"><i class="fab fa-facebook-f"></i></a>
            <a href="#" class="hover:text-gray-300"><i class="fab fa-twitter"></i></a>
            <a href="#" class="hover:text-gray-300"><i class="fab fa-instagram"></i></a>
        </div>
    </div>
</footer>
@endsection