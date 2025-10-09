import Swal from 'sweetalert2';
import Echo from '../bootstrap';

Echo.channel('registrasi-channel')
    .listen('RegistrasiSendEvent', (e) => {
        console.log('Registrasi baru:', e.registrasi);

        const tbody = document.querySelector('tbody');
        if (!tbody) return;

        // ✅ Dapatkan nomor urut baru

        // ✅ Buat elemen baris baru dengan gaya tabel yang sama
        const row = document.createElement('tr');
        row.innerHTML = `
            <td class="px-4 py-3"><span class="inline-block w-3 h-3 bg-green-500 rounded-full animate-pulse"></span></td>
            <td class="px-4 py-3 font-semibold text-gray-800">${e.registrasi.nama}</td>
            <td class="px-4 py-3 text-gray-600 capitalize">${e.registrasi.kategori ?? '-'}</td>
            <td class="px-4 py-3 text-gray-600">${e.registrasi.nama_optik ?? '-'}</td>
            <td class="px-4 py-3 text-gray-600">${e.registrasi.email ?? '-'}</td>
            <td class="px-4 py-3 text-gray-600">${e.registrasi.no_whatsapp ?? '-'}</td>
            <td class="px-4 py-3 text-gray-600">${e.registrasi.wilayah ?? '-'}</td>
            <td class="px-4 py-3 text-gray-600">
                ${new Date(e.registrasi.created_at).toLocaleString('id-ID')}
            </td>
            <td class="px-4 py-3 text-center">
                <span class="inline-flex items-center bg-red-100 text-red-700 px-3 py-1 rounded-full text-xs font-semibold">
                    Belum Hadir
                </span>
            </td>
            <td class="px-4 py-3 text-center">
                <button type="button"
                    class="inline-flex items-center gap-1 bg-gray-600 hover:bg-gray-700 text-white px-3 py-1 rounded-md text-xs font-semibold transition cursor-not-allowed">
                    <i class="fa-solid fa-print"></i> Print
                </button>
            </td>
        `;

        // ✅ Sisipkan ke atas tabel
        tbody.prepend(row);

        // ✅ Tampilkan Toast sukses di kanan atas
        Swal.fire({
            toast: true,
            position: 'top-end',
            icon: 'success',
            title: 'Registrasi baru diterima!',
            text: `${e.registrasi.nama} (${e.registrasi.nama_optik})`,
            showConfirmButton: false,
            timer: 4000,
            timerProgressBar: true,
            background: '#fff',
        });
    });
