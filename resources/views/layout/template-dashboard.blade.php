<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- Añado meta para axios --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Styles -->

    @vite(['resources/css/app.css'])

    @vite(['resources/js/app.js'])

    @vite(['resources/js/vueJs/notificationMenu.js'])

    @yield('css')

    @yield('js')

    <title>@yield('title')</title>



</head>

<body class="bg-gray-50 h-min">

    <x-header></x-header>

    <main class="relative py-12 mt-16 z-3 ">

        @yield('content')
    </main>
    <x-footer></x-footer>

</body>

</html>
