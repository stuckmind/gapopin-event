@extends('template.header')
@section('body')
    <section class="py-16 bg-gray-50">
    <div class="max-w-4xl mx-auto px-6">
        <!-- Card Event -->
        <div class="bg-white shadow-lg rounded-xl overflow-hidden mb-12">
            <img src="{{ asset('storage/' . $event->poster) }}" 
                 alt="{{ $event->title }}" 
                 class="w-full h-72 object-cover">
            <div class="p-6">
                <h1 class="text-3xl font-bold mb-4 text-gray-800">{{ $event->title }}</h1>
                <div class="flex items-center text-gray-500 mb-2">
                    <i class="fas fa-calendar-alt mr-2"></i>
                    {{ \Carbon\Carbon::parse($event->tanggal)->locale('id')->translatedFormat('d F Y') }}
                </div>
                <div class="flex items-center text-gray-500 mb-4">
                    <i class="fas fa-map-marker-alt mr-2"></i>
                    {{ $event->location }}
                </div>
            </div>
        </div>

        <!-- Form Registrasi -->
        <div class="bg-white shadow-lg rounded-xl p-8">
            <h2 class="text-2xl font-bold mb-6 text-gray-800">Registrasi Online</h2>
            <form action="{{ route('registrasi.process', $event->slug) }}" method="POST" class="space-y-4">
                @csrf

                <!-- Nama Lengkap -->
                <div class="relative">
                    <label for="name" class="block text-gray-700 font-semibold mb-1">Nama Lengkap</label>
                    <div class="relative">
                        <i class="fas fa-user absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                        <input type="text" name="name" id="name" 
                            class="w-full px-10 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 @error('name') border-red-500 @enderror" 
                            placeholder="Masukkan Nama Lengkap" autocomplete="off" value="{{ old('name') }}" oninput="this.value = this.value.replace(/\b\w/g, c => c.toUpperCase())">
                    </div>
                    @error('name')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Nama Optik -->
                <div class="relative">
                    <label for="optik" class="block text-gray-700 font-semibold mb-1">Nama Optik</label>
                    <div class="relative">
                        <i class="fas fa-building absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                        <input type="text" name="optik" id="optik"
                            class="w-full px-10 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 @error('optik') border-red-500 @enderror" 
                            placeholder="Masukkan Nama Optik" autocomplete="off" value="{{ old('optik') }}" oninput="this.value = this.value.replace(/\b\w/g, c => c.toUpperCase())">
                    </div>
                    @error('optik')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Email -->
                <div class="relative">
                    <label for="email" class="block text-gray-700 font-semibold mb-1">Email</label>
                    <div class="relative">
                        <i class="fas fa-envelope absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                        <input type="email" name="email" id="email"
                            class="w-full px-10 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 @error('email') border-red-500 @enderror"
                            placeholder="Masukkan Alamat Email" autocomplete="off" value="{{ old('email') }}">
                    </div>
                    @error('email')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Nomor Telepon -->
                <div class="relative">
                    <label for="phone" class="block text-gray-700 font-semibold mb-1">Nomor Telepon</label>
                    <div class="relative">
                        <i class="fas fa-phone-alt absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                        <input 
                            type="tel" 
                            name="phone" 
                            id="phone"
                            inputmode="numeric" 
                            pattern="[0-9]*"
                            oninput="this.value = this.value.replace(/[^0-9]/g, '')"
                            class="w-full px-10 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 @error('phone') border-red-500 @enderror"
                            placeholder="Masukkan Nomor Whatsapp" 
                            autocomplete="off" 
                            value="{{ old('phone') }}"
                        >
                    </div>
                    @error('phone')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Alamat Lengkap -->
                <div class="relative">
                    <label for="address" class="block text-gray-700 font-semibold mb-1">Wilayah</label>
                    <div class="relative">
                        <i class="fas fa-map-marker-alt absolute left-3 top-3 text-gray-400"></i>
                        <input type="text" name="address" id="address" 
                            class="w-full px-10 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 @error('address') border-red-500 @enderror" 
                            placeholder="Masukkan Wilayah (contoh : Jakarta)" autocomplete="off" value="{{ old('address') }}" oninput="this.value = this.value.replace(/\b\w/g, c => c.toUpperCase())">
                    </div>
                    @error('address')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <button type="submit" 
                        class="w-full py-3 bg-blue-600 text-white font-semibold rounded-lg hover:bg-blue-700 transition">
                    Daftar Sekarang
                </button>
            </form>
        </div>
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