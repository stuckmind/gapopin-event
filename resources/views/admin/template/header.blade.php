<header class="bg-white shadow flex items-center justify-between px-6 py-3">
  <h1 class="text-xl font-semibold text-gray-700">{{ $title }}</h1>
  <div class="flex items-center space-x-4">
    <span class="text-gray-600">Halo, Admin</span>
    <form action="{{ route('logout') }}" method="post">
        @csrf
        <button type="submit" class="p-2 rounded-full hover:bg-gray-100">
          <i class="fa-solid fa-right-from-bracket text-gray-500"></i>
        </button>
    </form>
  </div>
</header>
