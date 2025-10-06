@extends('admin.template.layout')
@section('content')
<div class="bg-white p-6 space-y-6">
    <h2 class="text-2xl font-bold text-gray-800 mb-6">Edit Event</h2>

    <form action="{{ route('management-event.update', $event->id) }}" method="POST" enctype="multipart/form-data" class="space-y-5">
        @csrf
        @method('PUT')

        <div>
            <label class="block text-gray-700 font-semibold mb-2">Judul Event</label>
            <input type="text" name="title" value="{{ old('title', $event->title) }}"
                class="w-full py-2 px-4 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
            @error('title') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
        </div>

        <div>
            <label class="block text-gray-700 font-semibold mb-2">Lokasi</label>
            <input type="text" name="location" value="{{ old('location', $event->location) }}"
                class="w-full py-2 px-4 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
            @error('location') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
        </div>

        <div>
            <label class="block text-gray-700 font-semibold mb-2">Tanggal</label>
            <input type="date" name="tanggal" value="{{ old('tanggal', $event->tanggal) }}"
                class="w-full py-2 px-4 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
            @error('tanggal') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
        </div>

        <div>
            <label class="block text-gray-700 font-semibold mb-2">Poster</label>
            <input type="file" name="poster" class="w-full py-2 px-4 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
            @if ($event->poster)
                <div class="mt-3">
                    <p class="text-gray-600 text-sm mb-1">Poster Saat Ini:</p>
                    <img src="{{ asset('storage/' . $event->poster) }}" class="w-32 h-32 object-cover rounded-md shadow">
                </div>
            @endif
            @error('poster') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
        </div>

        <div class="flex justify-end space-x-3">
            <a href="{{ route('management-event.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-md shadow">
                Kembali
            </a>
            <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-md shadow">
                Simpan Perubahan
            </button>
        </div>
    </form>
</div>
@endsection