@extends('admin.template.layout')
@section('content')
<div class="bg-white space-y-6 p-6">
    <div class="flex items-center justify-between mb-6">
        <div>
            <h2 class="text-2xl font-bold text-gray-800">Laporan Registrasi Event</h2>
            <p class="text-gray-500">{{ $event->title }} - {{ $event->kode_event }}</p>
        </div>
        <a href="{{ route('laporan-event.export', $event->id) }}" 
        target="_blank"
        class="flex items-center justify-center gap-2 bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-md shadow">
            <i class="fas fa-file-pdf"></i>
            Export PDF
        </a>
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
                                {{ \Carbon\Carbon::parse($item->created_at)->format('d M Y, H:i') }}
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
@endsection