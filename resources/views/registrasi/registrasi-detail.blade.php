@extends('template.header')
@section('body')
<section class="min-h-[90svh] bg-gray-50 flex items-center justify-center text-center px-4">
    <div id="kartu" class="max-w-md w-full bg-white rounded-xl p-8 space-y-4">
        <!-- Judul -->
        <h2 class="text-3xl font-bold text-gray-800 mb-4">Registrasi Berhasil!</h2>

        <!-- Kode Registrasi -->
        <div class="text-sm font-semibold text-gray-400">
            <p>{{ $event->title }}</p>
            <p>Kode Registrasi: {{ $registrasi->kode_registrasi }}</p>
        </div>

        <!-- Nama Peserta & Optik -->
        <div class="text-gray-700 text-lg">
            {{ $registrasi->nama }} - {{ $registrasi->nama_optik }}
        </div>
        
        <!-- QR Code -->
        <div class="flex justify-center my-4">
            {!! QrCode::size(220)->generate($registrasi->kode_registrasi) !!}
        </div>

        <!-- Petunjuk -->
        <p class="text-gray-500">
            Silakan simpan QR code ini dan tunjukkan saat kehadiran.
        </p>

        <!-- Tombol Kembali -->
        <button type="button" onclick="downloadKartu()"
           class="inline-block mt-4 px-6 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">
           Simpan
        </button>
    </div>
</section>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
<script>
function downloadKartu() {
    const kartu = document.getElementById('kartu');
    const tombol = kartu.querySelector('button');

    // Sembunyikan tombol
    tombol.style.display = 'none';

    html2canvas(kartu, {backgroundColor: '#fff', scale: 2}).then(canvas => {
        const link = document.createElement('a');
        link.download = 'registrasi-event.png';
        link.href = canvas.toDataURL('image/png');
        link.click();

        // Tampilkan tombol lagi
        tombol.style.display = 'inline-block';
    });
}
</script>

@endsection