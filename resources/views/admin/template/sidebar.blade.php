<!-- Sidebar -->
<aside id="sidebar" class="w-64 bg-indigo-700 text-white flex flex-col h-screen transition-transform transform -translate-x-full md:translate-x-0 fixed md:relative z-40">
    <!-- Logo + Title -->
    <div class="flex flex-col items-center justify-center p-4 border-b border-indigo-600">
        <div class="bg-white p-2 rounded-full shadow">
            <img src="{{ asset('assets/logo.png') }}" alt="Logo" class="w-32 h-32 object-contain">
        </div>
        <span class="mt-2 text-xl font-bold">Gapopin Admin</span>
    </div>

    <!-- Navigation -->
    <nav class="flex-1 px-2 py-4 space-y-2">
        <a href="{{ route('dashboard') }}" 
           class="flex items-center px-3 py-2 rounded-md transition 
           {{ request()->routeIs('dashboard') ? 'bg-indigo-600' : 'hover:bg-indigo-600' }}">
            <i class="fa-solid fa-house mr-2"></i> Dashboard
        </a>
        <a href="{{ route('management-event.index') }}" class="flex items-center px-3 py-2 rounded-md transition {{ request()->routeIs('management-event.*') ? 'bg-indigo-600' : 'hover:bg-indigo-600' }}">
            <i class="fa-solid fa-calendar-check mr-2"></i> Event
        </a>
        <a href="{{ route('registrasi-event.index') }}" class="flex items-center px-3 py-2 rounded-md transition {{ request()->routeIs('registrasi-event.*') ? 'bg-indigo-600' : 'hover:bg-indigo-600' }}">
            <i class="fa-solid fa-users mr-2"></i> Registrasi
        </a>
        <a href="{{ route('laporan-event.index') }}" class="flex items-center px-3 py-2 rounded-md transition {{ request()->routeIs('laporan-event.*') ? 'bg-indigo-600' : 'hover:bg-indigo-600' }}">
            <i class="fa-solid fa-chart-bar mr-2"></i> Laporan
        </a>
    </nav>
</aside>

<!-- Fixed Toggle Button -->
<button id="sidebarToggle" 
    class="fixed bottom-4 md:hidden left-4 z-50 bg-yellow-700 text-white p-3 rounded-full shadow-lg hover:bg-yellow-800 focus:outline-none transition">
    <i class="fa-solid fa-bars"></i>
</button>

<!-- Script Toggle -->
<script>
    const sidebar = document.getElementById('sidebar');
    const toggleBtn = document.getElementById('sidebarToggle');

    toggleBtn.addEventListener('click', () => {
        sidebar.classList.toggle('-translate-x-full');
    });
</script>
