@vite(['resources/js/event-registrasi/event-registrasi-pusher.js'])
@extends('admin.template.layout')
@section('content')
<div class="bg-white space-y-6 p-6">
    <div class="flex items-center justify-between mb-6">
        <div>
            <h2 class="text-2xl font-bold text-gray-800">Data Registrasi Event</h2>
            <p class="text-gray-500">{{ $event->title }} - {{ $event->kode_event }}</p>
        </div>
        <button id="openScanner" type="button" class="flex items-center justify-center gap-2 bg-gray-200 hover:bg-gray-300 text-gray-700 px-4 py-2 rounded-md shadow">
            <i class="fas fa-expand"></i>
            Scan Registrasi
        </button>
    </div>

    @if ($registrasi->count() > 0)
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200 text-sm">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-4 py-3 text-left font-medium text-gray-600">No</th>
                        <th class="px-4 py-3 text-left font-medium text-gray-600">Nama</th>
                        <th class="px-4 py-3 text-left font-medium text-gray-600">Kategori</th>
                        <th class="px-4 py-3 text-left font-medium text-gray-600">Optik</th>
                        <th class="px-4 py-3 text-left font-medium text-gray-600">Email</th>
                        <th class="px-4 py-3 text-left font-medium text-gray-600">No WA</th>
                        <th class="px-4 py-3 text-left font-medium text-gray-600">Daerah</th>
                        <th class="px-4 py-3 text-left font-medium text-gray-600">Tanggal Daftar</th>
                        <th class="px-4 py-3 text-center font-medium text-gray-600">Kehadiran</th>
                        <th class="px-4 py-3 text-center font-medium text-gray-600">Action</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @foreach ($registrasi as $index => $item)
                        <tr>
                            <td class="px-4 py-3">{{ $registrasi->firstItem() + $index }}</td>
                            <td class="px-4 py-3 font-semibold text-gray-800">{{ $item->nama }}</td>
                            <td class="px-4 py-3 text-gray-600 capitalize">{{ $item->kategori }}</td>
                            <td class="px-4 py-3 text-gray-600">{{ $item->nama_optik }}</td>
                            <td class="px-4 py-3 text-gray-600">{{ $item->email }}</td>
                            <td class="px-4 py-3 text-gray-600">{{ $item->no_whatsapp }}</td>
                            <td class="px-4 py-3 text-gray-600">{{ $item->wilayah }}</td>
                            <td class="px-4 py-3 text-gray-600">
                                {{ \Carbon\Carbon::parse($item->created_at)->locale('id')->translatedFormat('d F Y, H:i') }}
                            </td>
                            <td class="px-4 py-3 text-center">
                                @if ($item->kehadiran)
                                    <span class="inline-flex items-center bg-green-100 text-green-700 px-3 py-1 rounded-full text-xs font-semibold">
                                        Hadir
                                    </span>
                                @else
                                    <span class="inline-flex items-center bg-red-100 text-red-700 px-3 py-1 rounded-full text-xs font-semibold">
                                        Belum Hadir
                                    </span>
                                @endif
                            </td>
                            <td class="px-4 py-3 text-center">
                                @if ($item->kehadiran)
                                    <a href="{{ route('registrasi-event.print', ['id' => $item->id]) }}"
                                    target="_blank"
                                    class="inline-flex items-center gap-1 bg-indigo-600 hover:bg-indigo-700 text-white px-3 py-1 rounded-md text-xs font-semibold transition">
                                        <i class="fa-solid fa-print"></i> Print
                                    </a>
                                @else
                                    <button type="button"
                                    class="inline-flex items-center gap-1 bg-gray-600 hover:bg-gray-700 text-white px-3 py-1 rounded-md text-xs font-semibold transition cursor-not-allowed">
                                        <i class="fa-solid fa-print"></i> Print
                                    </button>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="mt-4">
            {{ $registrasi->links() }}
        </div>
    @else
        <div class="text-center py-8 text-gray-500">
            Belum ada peserta yang mendaftar untuk event ini.
        </div>
    @endif
</div>

<div id="scannerModal" class="hidden fixed inset-0 z-50 bg-black/50 flex items-center justify-center">
    <div class="bg-white w-full max-w-md mx-4 rounded-lg shadow-lg p-6 relative">
        <button id="closeScanner" 
            class="absolute top-3 right-3 text-gray-500 hover:text-gray-800 text-xl">
            &times;
        </button>

        <h2 class="text-xl font-semibold text-gray-800 mb-4 text-center">
            Scan QR Registrasi
        </h2>

        <div id="reader" style="width: 100%;"></div>

        <div id="scanStatus" class="text-center text-sm text-gray-500 mt-3">
            Arahkan kamera ke QR Code peserta...
        </div>
    </div>
</div>

<script src="https://unpkg.com/html5-qrcode" type="text/javascript"></script>
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const modal = document.getElementById('scannerModal');
        const openBtn = document.getElementById('openScanner');
        const closeBtn = document.getElementById('closeScanner');
        const scanStatus = document.getElementById('scanStatus');
        let html5QrCode;

        openBtn.addEventListener('click', () => {
            modal.classList.remove('hidden');
            startScanner();
        });

        closeBtn.addEventListener('click', () => {
            stopScanner();
            modal.classList.add('hidden');
        });

        function startScanner() {
            html5QrCode = new Html5Qrcode("reader");
            const config = { fps: 10, qrbox: { width: 250, height: 250 } };
            html5QrCode.start(
                { facingMode: "environment" },
                config,
                qrCodeSuccessCallback,
                qrCodeErrorCallback
            ).catch(err => {
                scanStatus.textContent = "Gagal membuka kamera: " + err;
            });
        }

        function stopScanner() {
            if (html5QrCode) {
                html5QrCode.stop().then(() => {
                    html5QrCode.clear();
                });
            }
        }

        async function qrCodeSuccessCallback(decodedText) {
        stopScanner();
        scanStatus.textContent = "QR terbaca: " + decodedText;

            try {
                const response = await fetch("{{ route('registrasi-event.scan') }}", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                        "X-CSRF-TOKEN": "{{ csrf_token() }}"
                    },
                    body: JSON.stringify({ kode_registrasi: decodedText })
                });

                const result = await response.json();

                if (result.success) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Berhasil!',
                        text: 'Kehadiran dikonfirmasi untuk: ' + result.nama,
                        showConfirmButton: false,
                        timer: 2000,
                        timerProgressBar: true
                    }).then(() => {
                        window.location.reload();
                    });
                } else {
                    Swal.fire({
                        icon: 'warning',
                        title: 'Gagal!',
                        text: result.message,
                        showConfirmButton: false,
                        timer: 2500,
                        timerProgressBar: true
                    }).then(() => {
                        startScanner();
                    });
                }
            } catch (error) {
                Swal.fire({
                    icon: 'error',
                    title: 'Terjadi Kesalahan',
                    text: error,
                    showConfirmButton: true
                }).then(() => {
                    startScanner();
                });
            }
        }

        function qrCodeErrorCallback(errorMessage) {
            // biarkan kosong biar ga spam di console
        }
    });
</script>

@endsection