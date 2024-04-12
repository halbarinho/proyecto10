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
    {{-- @vite('resources/css/app.css', 'resources/js/refreshSelectUserType.js', 'resources/js/userDropdownMenu.js') --}}
    @vite(['resources/css/app.css'])
    {{-- @vite(['resources/js/refreshSelectUserType.js'])
@vite(['resources/js/userDropdownMenu.js']) --}}
    @vite(['resources/js/app.js'])
    {{-- @vite(['resources\js\vueJs\notificationMenu.js']) --}}
    @vite(['resources/js/vueJs/notificationMenu.js'])

    @yield('css')

    @yield('js')

    <title>@yield('title')</title>



</head>

<body class="bg-gray-50 h-min">

    {{-- quito el component header para ver si funciona vue --}}
    <x-header></x-header>
    {{-- <header class="fixed top-0 z-10 w-full bg-white h-28 border-y-4 border-t-yellowPersonal border-b-gray-400">

        <nav class="block">
            <div class="flex items-center h-12 px-8 pt-6 my-1">
                <div class="items-center w-20 h-20">
                    <a href="{{ route('welcome') }}">
                        <img class="max-w-16 max-h-16" src="https://img.icons8.com/glyph-neue/64/darth-vader.png"
                            alt="darth-vader">

                    </a>
                </div>
                <h2 class="float-left text-3xl font-medium leading-3">AppVader</h2>


                <div class="relative p-2 ml-auto ">
                    @if (Route::has('login'))
                        <div class="top-0 right-0 p-6 text-right">
                            @auth
                                <span>{{ auth()->user()->name }}</span>

                                <a href="{{ route('logout') }}"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit()"
                                    class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Logout</a>

                                <div id="notificationDropdown"></div>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            @else
                                <div class="flex menu-header">
                                    <ul class="flex flex-row pl-4">
                                        <li class="mr-4">
                                            <a href="{{ route('login') }}"
                                                class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log
                                                in</a>
                                        </li>
                                        <li class="ml-4">
                                            <a href="{{ route('login') }}"
                                                class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Registrate</a>
                                        </li>
                                    </ul>
                                </div>
                            @endauth
                        </div>
                    @endif
                </div>

            </div>



            <ul class="items-center justify-center hidden h-8 px-8 align-bottom md:flex">
                <li class="relative flex flex-col px-4 align-middle"><a href=""
                        class="py-1 text-sm font-bold leading-4 tracking-tight uppercase"><span
                            class="inline-block align-middle hover:underline hover:text-blueLightPersonal">Muro
                            Información</span></a>
                </li>
                <li class="relative flex flex-col px-4 align-middle"><a href=""
                        class="py-1 text-sm font-bold leading-4 tracking-tight uppercase "><span
                            class="inline-block align-middle hover:underline">Aulas</span></a>
                </li>
                <li class="relative flex flex-col px-4 align-middle"><a href=""
                        class="py-1 text-sm font-bold leading-4 tracking-tight uppercase "><span
                            class="inline-block align-middle hover:underline">Dinamicas</span></a>
                </li>
                <li class="relative flex flex-col px-4 align-middle"><a href=""
                        class="py-1 text-sm font-bold leading-4 tracking-tight uppercase"><span
                            class="inline-block align-middle hover:underline">Alertas</span></a>
                </li>
                <li class="relative flex flex-col px-4 align-middle"><a href=""
                        class="py-1 text-sm font-bold leading-4 tracking-tight uppercase"><span
                            class="inline-block align-middle hover:underline">Chat</span></a>
                </li>
                <li class="relative flex flex-col px-4 align-middle"><a href=""
                        class="py-1 text-sm font-bold leading-4 tracking-tight uppercase"><span
                            class="inline-block align-middle hover:underline">Mi
                            Perfil</span></a></li>
            </ul>

        </nav>



    </header> --}}
    <main class="relative py-12 mt-16 z-3 ">

        @yield('content')
    </main>
    <x-footer></x-footer>

</body>

</html>
