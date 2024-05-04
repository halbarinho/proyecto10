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

    <title>Mensaje Enviado</title>



</head>

<body class="bg-gray-50 h-min">




    <script>
        // setTimeout(function() {
        //     window.history.back();
        // }, 3000);

        function goBack() {

            window.history.back();

        }
    </script>



    <div class="mr-4 overflow-auto ml-14 mt-14">
        <div class="flex justify-between w-full ">

            @if (session('error'))
                <div>
                    <ul>
                        <li class="text-xs text-redPersonal">{{ session('error') }}</li>
                    </ul>
                </div>
            @endif
        </div>

        <div class="my-6">
            <div
                class="grid xs:grid-cols-1 md:grid-cols-2 items-center gap-16 p-8 mx-auto max-w-4xl bg-white shadow-[0_2px_10px_-3px_rgba(6,81,237,0.3)] rounded-md text-[#333] font-[sans-serif]">

                <div class="mx-auto text-center">
                    <h1 class="my-1 text-4xl text-red-600">Mensaje Enviado</h1>
                    <br>
                    <p class="my-1 text-xl text-gray-600 ">En breve nos pondremos en contacto contigo</p>
                    <p class="my-1 text-xl text-gray-600">Un salud, hasta pronto.</p>
                    <br>
                    <button onclick="goBack(); event.preventDefault();"
                        class="px-5 py-2 text-white rounded-md cursor-pointer bg-rose-500 hover:bg-rose-700">Regresar</button>
                </div>

                <div>
                    <img class="rounded-full" src="{{ asset('storage\images\mensajeEnviado.png') }}" alt="">
                </div>

            </div>
        </div>




    </div>






</body>
