@extends('admin.template.layout')
@section('content')
<div class="space-y-6">
    <!-- Header + Create Button -->
    <div class="flex items-center justify-between">
        <h2 class="text-2xl font-bold text-gray-800">Management Event</h2>
        <a href="{{ route('management-event.create') }}"
           class="bg-indigo-600 text-white px-4 py-2 rounded-lg shadow hover:bg-indigo-700 transition">
            <i class="fa-solid fa-plus mr-1"></i> Create Event
        </a>
    </div>

    @if(session('success'))
        <div class="mb-4 p-4 rounded-lg bg-green-100 text-green-700 border border-green-200">
            {{ session('success') }}
        </div>
    @endif

    <!-- Table -->
    <div class="bg-white rounded-lg shadow overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200 text-sm">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-4 py-3 text-left font-medium text-gray-600">No</th>
                    <th class="px-4 py-3 text-left font-medium text-gray-600">Poster</th>
                    <th class="px-4 py-3 text-left font-medium text-gray-600">Title</th>
                    <th class="px-4 py-3 text-left font-medium text-gray-600">Location</th>
                    <th class="px-4 py-3 text-left font-medium text-gray-600">Tanggal</th>
                    <th class="px-4 py-3 text-center font-medium text-gray-600">Action</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @forelse($events as $index => $event)
                    <tr>
                        <td class="px-4 py-3">
                            {{ $events->firstItem() + $index }}
                        </td>
                        <td class="px-4 py-3">
                            <img src="{{ asset('storage/' . $event->poster) }}" 
                                alt="{{ $event->title }}" 
                                class="w-16 h-16 object-cover rounded-md shadow">
                        </td>
                        <td class="px-4 py-3 font-semibold text-gray-800">
                            {{ $event->title }}
                        </td>
                        <td class="px-4 py-3 text-gray-600">
                            {{ $event->location }}
                        </td>
                        <td class="px-4 py-3 text-gray-600">
                            {{ \Carbon\Carbon::parse($event->tanggal)->format('d M Y') }}
                        </td>
                        <td class="px-4 py-3">
                            <div class="flex items-center justify-center space-x-2">
                                <!-- Show -->
                                <a href="{{ route('management-event.show', $event->id) }}" 
                                class="text-blue-500 hover:text-blue-700" title="Show">
                                    <i class="fa-solid fa-eye"></i>
                                </a>
                                <!-- Edit -->
                                <a href="{{ route('management-event.edit', $event->id) }}" 
                                class="text-green-500 hover:text-green-700" title="Edit">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </a>
                                <!-- Delete -->
                                <form action="{{ route('management-event.destroy', $event->id) }}" method="POST" class="inline-block"
                                    onsubmit="return confirm('Yakin hapus event ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 hover:text-red-700" title="Delete">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                </form>
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