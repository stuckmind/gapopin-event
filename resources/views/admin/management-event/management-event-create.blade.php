@extends('admin.template.layout')
@section('content')
<div class="bg-white p-6 space-y-6">
    <h2 class="text-2xl font-bold text-gray-800 mb-6">Tambah Event Baru</h2>

    <form action="{{ route('management-event.store') }}" method="POST" enctype="multipart/form-data" class="space-y-5">
        @csrf

        <!-- Poster -->
        <div>
            <label class="block text-sm font-medium text-gray-700">Poster</label>
            <input type="file" name="poster" accept="image/*"
                   class="mt-1 w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
            @error('poster') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
        </div>

        <!-- Name Tag -->
        <div>
            <label class="block text-sm font-medium text-gray-700">Name Tag</label>
            <input type="file" name="file_name_tag" accept="image/*"
                   class="mt-1 w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
            @error('file_name_tag') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
        </div>

        <!-- Title -->
        <div>
            <label class="block text-sm font-medium text-gray-700">Title</label>
            <input type="text" name="title" value="{{ old('title') }}"
                   class="py-2 px-4 mt-1 w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" placeholder="Masukkan Judul Event">
            @error('title') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
        </div>

        <!-- Location -->
        <div>
            <label class="block text-sm font-medium text-gray-700">Location</label>
            <input type="text" name="location" value="{{ old('location') }}"
                   class="py-2 px-4 mt-1 w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" placeholder="Masukkan Lokasi">
            @error('location') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
        </div>

        <!-- Tanggal -->
        <div>
            <label class="block text-sm font-medium text-gray-700">Tanggal</label>
            <input type="date" name="tanggal" value="{{ old('tanggal') }}"
                   class="py-2 px-4 mt-1 w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
            @error('tanggal') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
        </div>

        <!-- Button -->
        <div class="flex justify-end gap-3 pt-8">
            <a href="{{ route('management-event.index') }}" 
               class="px-4 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300">
               Batal
            </a>
            <button type="submit" 
                    class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 shadow">
                Simpan
            </button>
        </div>
    </form>
</div>
@endsection