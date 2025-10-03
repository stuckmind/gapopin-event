@extends('template.app')
@section('header')
    <div class="flex h-screen">
    <!-- Sidebar -->
    @include('admin.template.sidebar')

    <!-- Main Content -->
    <div class="flex flex-col flex-1">
        <!-- Header -->
        @include('admin.template.header')

        <!-- Page Content -->
        <main class="flex-1 p-6 overflow-y-auto">
            @yield('content')
        </main>
    </div>
</div>
@endsection