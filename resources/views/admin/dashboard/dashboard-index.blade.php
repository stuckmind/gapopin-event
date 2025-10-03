@extends('admin.template.layout')
@section('content')
<div class="space-y-6">
    <!-- Welcome Card -->
    <div class="bg-gradient-to-r from-indigo-600 to-purple-600 rounded-lg shadow-lg p-6 text-white">
        <h2 class="text-2xl font-bold mb-2">Selamat Datang, {{ Auth::user()->name ?? 'Admin' }} 👋</h2>
        <p class="text-white/90">Senang bertemu kembali! Berikut ringkasan data terbaru untuk aplikasi Event Management.</p>
    </div>

    <!-- Menu Grid -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <!-- Card 1 -->
        <a href="#" class="bg-white rounded-lg shadow hover:shadow-lg transition p-6 flex items-center">
            <div class="p-3 rounded-full bg-indigo-100 text-indigo-600 mr-4">
                <i class="fa-solid fa-calendar-check fa-lg"></i>
            </div>
            <div>
                <p class="text-gray-600">Kelola Event</p>
                <p class="text-lg font-bold">Lihat semua event</p>
            </div>
        </a>

        <!-- Card 2 -->
        <a href="#" class="bg-white rounded-lg shadow hover:shadow-lg transition p-6 flex items-center">
            <div class="p-3 rounded-full bg-green-100 text-green-600 mr-4">
                <i class="fa-solid fa-users fa-lg"></i>
            </div>
            <div>
                <p class="text-gray-600">Registrasi</p>
                <p class="text-lg font-bold">Peserta terdaftar</p>
            </div>
        </a>

        <!-- Card 3 -->
        <a href="#" class="bg-white rounded-lg shadow hover:shadow-lg transition p-6 flex items-center">
            <div class="p-3 rounded-full bg-yellow-100 text-yellow-600 mr-4">
                <i class="fa-solid fa-chart-line fa-lg"></i>
            </div>
            <div>
                <p class="text-gray-600">Laporan</p>
                <p class="text-lg font-bold">Statistik event</p>
            </div>
        </a>
    </div>

    <!-- Event Mendatang -->
    <div>
        <h3 class="text-xl font-bold mb-4">📅 Event Mendatang</h3>
        <div class="space-y-4">
            <!-- Event Card -->
            <div class="bg-white rounded-lg shadow p-4 flex items-center justify-between">
                <div class="flex items-center">
                    <div class="p-3 rounded-full bg-indigo-100 text-indigo-600 mr-4">
                        <i class="fa-solid fa-bullhorn fa-lg"></i>
                    </div>
                    <div>
                        <p class="font-bold">Seminar Teknologi 2025</p>
                        <p class="text-sm text-gray-500">10 Oktober 2025 • Jakarta</p>
                    </div>
                </div>
                <a href="#" class="bg-indigo-600 text-white px-4 py-2 rounded-md hover:bg-indigo-700 transition">
                    Cek Registrasi
                </a>
            </div>

            <!-- Event Card -->
            <div class="bg-white rounded-lg shadow p-4 flex items-center justify-between">
                <div class="flex items-center">
                    <div class="p-3 rounded-full bg-green-100 text-green-600 mr-4">
                        <i class="fa-solid fa-microphone fa-lg"></i>
                    </div>
                    <div>
                        <p class="font-bold">Workshop UI/UX</p>
                        <p class="text-sm text-gray-500">15 Oktober 2025 • Bandung</p>
                    </div>
                </div>
                <a href="#" class="bg-green-600 text-white px-4 py-2 rounded-md hover:bg-green-700 transition">
                    Cek Registrasi
                </a>
            </div>
        </div>
    </div>
</div>

@endsection