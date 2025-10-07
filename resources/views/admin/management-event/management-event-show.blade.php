@extends('admin.template.layout')
@section('content')
    <div class="bg-white rounded-lg shadow p-6 relative">
        <!-- Header -->
        <div class="flex items-center justify-between mb-6">
            <h2 class="text-2xl font-bold text-gray-800">
                Detail Event
            </h2>
            <!-- Tombol Generate QR -->
            <a href="{{ route('management-event.qrcode', $event->id) }}" 
            class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-md shadow transition">
                <i class="fa-solid fa-qrcode mr-2"></i> Generate QR Code
            </a>
        </div>

        <!-- Isi Detail -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Poster -->
            <div class="space-y-6">
                <img src="{{ asset('storage/' . $event->poster) }}" 
                    alt="{{ $event->title }}" 
                    class="w-full max-w-sm rounded-lg shadow">

                <!-- Template Name Tag -->
                <div class="border-t pt-4">
                    <h3 class="text-lg font-semibold text-gray-700 mb-2">Template Name Tag</h3>
                    <img src="{{ asset('assets/name-tag.png') }}" 
                        alt="Template Name Tag"
                        class="w-full max-w-sm rounded-lg shadow-md border">
                </div>
            </div>

            <!-- Detail Event -->
            <div class="space-y-4">
                <div>
                    <h3 class="text-lg font-semibold text-gray-700">Judul Event</h3>
                    <p class="text-gray-600">{{ $event->title }}</p>
                </div>
                <div>
                    <h3 class="text-lg font-semibold text-gray-700">Kode Event</h3>
                    <p class="text-gray-600">{{ $event->kode_event }}</p>
                </div>
                <div>
                    <h3 class="text-lg font-semibold text-gray-700">Lokasi</h3>
                    <p class="text-gray-600">{{ $event->location }}</p>
                </div>
                <div>
                    <h3 class="text-lg font-semibold text-gray-700">Tanggal</h3>
                    <p class="text-gray-600">{{ \Carbon\Carbon::parse($event->tanggal)->format('d M Y') }}</p>
                </div>
                <div>
                    <h3 class="text-lg font-semibold text-gray-700">Slug</h3>
                    <p class="text-gray-600">{{ $event->slug }}</p>
                </div>
            </div>
        </div>
    </div>
@endsection