@extends('template.header')
@section('body')
<div class="min-h-screen w-full flex items-center justify-center bg-indigo-300 px-4">
    <div class="bg-white shadow-lg rounded-2xl p-8 max-w-md w-full">
        <div class="text-center mb-6">
            <i class="fa-solid fa-magnifying-glass text-indigo-600 text-4xl mb-2"></i>
            <h1 class="text-2xl font-bold text-gray-800">Cari Data Registrasi</h1>
            <p class="text-gray-500 text-sm">Masukkan nama, email, atau kode registrasi untuk mencari data Anda.</p>
        </div>

        @if (session('error'))
            <div class="bg-red-100 text-red-600 px-4 py-2 rounded-md mb-4 text-sm flex items-center gap-2">
                <i class="fa-solid fa-triangle-exclamation"></i>
                {{ session('error') }}
            </div>
        @endif

        <form method="POST" action="{{ route('registrasi.search.process') }}">
            @csrf
            <div class="relative mb-4">
                <i class="fa-solid fa-user absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                <input type="text" name="keyword" id="keyword"
                    class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:outline-none"
                    placeholder="Masukkan Nama / Email / Kode Registrasi..." autocomplete="off">
            </div>

            <button type="submit"
                class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-3 rounded-lg shadow flex items-center justify-center gap-2 transition">
                <i class="fa-solid fa-search"></i> Cari Data
            </button>
        </form>

        <div class="mt-6 text-center">
            <a href="{{ url('/') }}" class="text-sm text-indigo-600 hover:underline">
                <i class="fa-solid fa-arrow-left mr-1"></i> Kembali ke Beranda
            </a>
        </div>
    </div>
</div>
@endsection