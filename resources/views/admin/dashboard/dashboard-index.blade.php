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
        <a href="{{ route('management-event.index') }}" class="bg-white rounded-lg shadow hover:shadow-lg transition p-6 flex items-center">
            <div class="p-3 rounded-full bg-indigo-100 text-indigo-600 mr-4">
                <i class="fa-solid fa-calendar-check fa-lg"></i>
            </div>
            <div>
                <p class="text-gray-600">Kelola Event</p>
                <p class="text-lg font-bold">Lihat semua event</p>
            </div>
        </a>

        <!-- Card 2 -->
        <a href="{{ route('registrasi-event.index') }}" class="bg-white rounded-lg shadow hover:shadow-lg transition p-6 flex items-center">
            <div class="p-3 rounded-full bg-green-100 text-green-600 mr-4">
                <i class="fa-solid fa-users fa-lg"></i>
            </div>
            <div>
                <p class="text-gray-600">Registrasi</p>
                <p class="text-lg font-bold">Peserta terdaftar</p>
            </div>
        </a>

        <!-- Card 3 -->
        <a href="{{ route('laporan-event.index') }}" class="bg-white rounded-lg shadow hover:shadow-lg transition p-6 flex items-center">
            <div class="p-3 rounded-full bg-yellow-100 text-yellow-600 mr-4">
                <i class="fa-solid fa-file-alt fa-lg"></i>
            </div>
            <div>
                <p class="text-gray-600">Laporan</p>
                <p class="text-lg font-bold">Laporan & Cetak</p>
            </div>
        </a>
    </div>

    <!-- Event Mendatang -->
<div>
    <h3 class="text-xl font-bold mb-4">
        <i class="fas fa-calendar"></i> Event Mendatang
    </h3>

    @if ($eventMendatang->count() > 0)
        <div class="space-y-4">
            @foreach ($eventMendatang as $event)
                <div class="bg-white rounded-lg shadow p-4 flex items-center justify-between">
                    <div class="flex items-center">
                        <div class="p-3 rounded-full 
                            {{ $loop->iteration % 2 == 0 ? 'bg-green-100 text-green-600' : 'bg-indigo-100 text-indigo-600' }} 
                            mr-4">
                            <i class="{{ $loop->iteration % 2 == 0 ? 'fa-solid fa-microphone' : 'fa-solid fa-bullhorn' }} fa-lg"></i>
                        </div>

                        <div>
                            <p class="font-bold">{{ $event->title }}</p>
                            <p class="text-sm text-gray-500">
                                {{ \Carbon\Carbon::parse($event->tanggal)->translatedFormat('d F Y') }} • 
                                {{ $event->location ?? '-' }}
                            </p>
                        </div>
                    </div>

                    <a href="{{ route('registrasi-event.detail', $event->slug) }}"
                       class="bg-indigo-600 text-white px-4 py-2 rounded-md hover:bg-indigo-700 transition">
                        Cek Registrasi
                    </a>
                </div>
            @endforeach
        </div>
    @else
        <div class="bg-gray-50 text-gray-500 text-center p-6 rounded-lg shadow">
            Belum ada event mendatang.
        </div>
    @endif
</div>

</div>

@endsection