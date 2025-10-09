@extends('template.app')
@section('header')
<div class="flex h-screen">
    <!-- Sidebar -->
    @include('admin.template.sidebar')

    <!-- Main Content -->
    <div class="flex flex-col flex-1 min-w-0">
        <!-- Header -->
        @include('admin.template.header')

        <!-- Page Content -->
        <main class="flex-1 p-6 overflow-x-auto bg-gray-50">
            @yield('content')
        </main>
    </div>
</div>
@endsection