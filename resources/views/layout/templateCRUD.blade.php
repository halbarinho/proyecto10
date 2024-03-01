<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- Añado meta para axios --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @vite('resources/css/app.css', 'resources/js/refreshSelectUserType.js', 'resources/js/userDropdownMenu.js')

    <title>@yield('title')</title>
</head>

<body>

    @yield('content')

</body>

</html>
