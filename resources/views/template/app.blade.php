<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="{{ asset('assets/logo.png') }}" type="image/x-icon">
    <title>{{ $title }}</title>
     @vite('resources/css/app.css')
      @vite('resources/js/app.js')
</head>
<body>
    @yield('header')
</body>
</html>