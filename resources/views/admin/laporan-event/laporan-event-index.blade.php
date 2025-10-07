@extends('admin.template.layout')
@section('content')
<div class="space-y-6">
    <!-- Header + Create Button -->
    <div class="flex items-center justify-between">
        <h2 class="text-2xl font-bold text-gray-800">Laporan Event</h2>
    </div>

    <!-- Table -->
    <div class="bg-white rounded-lg shadow overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200 text-sm">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-4 py-3 text-left font-medium text-gray-600">No</th>
                    <th class="px-4 py-3 text-left font-medium text-gray-600">Nama Event</th>
                    <th class="px-4 py-3 text-left font-medium text-gray-600">Tanggal Event</th>
                    <th class="px-4 py-3 text-center font-medium text-gray-600">Action</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @forelse($events as $index => $event)
                    <tr>
                        <td class="px-4 py-3">
                            {{ $events->firstItem() + $index }}
                        </td>
                        <td class="px-4 py-3 font-semibold text-gray-800">
                            {{ $event->title }}
                        </td>
                        <td class="px-4 py-3 text-gray-600">
                            {{ \Carbon\Carbon::parse($event->tanggal)->format('d M Y') }}
                        </td>
                        <td class="px-4 py-3">
                            <div class="flex items-center justify-center space-x-2">
                                <a href="{{ route('laporan-event.detail', ['slug' => $event->slug]) }}" 
                                class="flex items-center justify-center gap-2 py-2 px-4 bg-yellow-700 text-white hover:opacity-80 rounded-lg" title="Registrasi">
                                    <i class="fa-solid fa-file-alt"></i>
                                    Lihat Laporan
                                </a>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="px-4 py-6 text-center text-gray-500">
                            Belum ada event yang tersedia.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    <div class="mt-4">
        {{ $events->links() }}
    </div>
</div>
@endsection