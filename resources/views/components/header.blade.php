<script>
    // function showMenu() {
    //     let menuMobile = document.getElementById('menu');

    //     menuMobile.classList.remove('hidden');
    //     // alert('hola');
    // }

    function toggleMenu() {
        let menuMobile = document.getElementById('menu');
        menuMobile.classList.toggle('hidden'); // Cambiar el estado de la clase hidden
    }

    // Función para ocultar el menú
    function hideMenu() {
        let menuMobile = document.getElementById('menu');
        menuMobile.classList.add('hidden');
    }

    // Agregar un listener de eventos al documento para ocultar el menú cuando se haga clic en cualquier parte de la página
    document.addEventListener('click', function(event) {
        // Verificar si el clic ocurrió fuera del menú
        if (!event.target.closest('#menu') && !event.target.closest('label[for="menu-toggle"]')) {
            hideMenu(); // Ocultar el menú si el clic ocurrió fuera de él
        }
    });
</script>

<header class="fixed top-0 z-10 w-full bg-white h-28 border-y-4 border-t-yellowPersonal border-b-gray-400">

    <nav class="block">
        <div class="flex items-center h-12 px-8 pt-6 my-1">
            <div class="flex items-center justify-center w-20 h-20">
                <a href="{{ route('welcome') }}">
                    {{-- <img class="max-w-16 max-h-16" src="https://img.icons8.com/glyph-neue/64/darth-vader.png"
                        alt="darth-vader"> --}}
                    <img class="mx-auto max-w-16 max-h-16 hover:rotate-6" src="{{ asset('icons/logo.png') }}"
                        alt="logo Diketive">
                </a>
            </div>
            <h2 class="float-left text-3xl font-medium leading-3"><span class="font-bold ">Dike<span
                        class="font-bold text-yellowPersonal">Tive</span>
            </h2>


            <div class="relative p-2 ml-auto ">
                @if (Route::has('login'))
                    <div class="top-0 right-0 p-6 text-right">
                        @auth

                            <div class="flex flex-row items-start">




                                <div>

                                    <span>{{ auth()->user()->name }}</span>

                                    <a href="{{ route('logout') }}"
                                        onclick="event.preventDefault(); document.getElementById('logout-form').submit()"
                                        class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Logout</a>



                                    <div id="notificationDropdown"></div>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        style="display: none;">
                                        @csrf
                                    </form>
                                </div>


                                <div class="ml-4 md:hidden md:m-0">
                                    <label for="menu-toggle" class="z-20 flex justify-end cursor-pointer"
                                        onclick="toggleMenu()">
                                        <svg class="justify-center fill-current text-blueDarkPersonal hover:cursor-pointer"
                                            xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                            viewBox="0 0 20 20">
                                            <title>menu</title>
                                            <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"></path>
                                        </svg>
                                    </label>
                                </div>


                            </div>
                        @else
                            <div class="flex menu-header">
                                <ul class="flex flex-row pl-4">
                                    <li class="mr-4">
                                        <a href="{{ route('login') }}"
                                            class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-yellowPersonal">Log
                                            in</a>
                                    </li>
                                    <li class="ml-4">
                                        <a href="{{ route('contact') }}"
                                            class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-yellowPersonal">Registrate</a>
                                    </li>
                                </ul>
                            </div>
                        @endauth
                    </div>
                @endif
            </div>

        </div>

        @auth

            {{-- <div class="md:hidden">
                <label for="menu-toggle" class="z-20 flex justify-end cursor-pointer" onclick="toggleMenu()">
                    <svg class="justify-center text-gray-900 fill-current" xmlns="http://www.w3.org/2000/svg" width="20"
                        height="20" viewBox="0 0 20 20">
                        <title>menu</title>
                        <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"></path>
                    </svg>
                </label>
            </div> --}}

            <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1 md:justify-center"
                id="menu">
                <nav>

                    @if (Auth::user()->hasRole('docente'))
                        {{-- <ul id="menuMobile"
                            class="absolute bottom-0 left-0 right-0 items-center justify-center h-8 px-8 mb-1 md:flex"> --}}
                        {{-- <ul id="menuMobile"
                            class="flex flex-col w-full mt-4 overflow-hidden font-medium bg-white max-h-64 lg:flex-row lg:space-x-8 lg:mt-0 top-full lg:static"> --}}
                        <ul id="menuMobile"
                            class="static bottom-0 left-0 right-0 z-40 flex flex-col items-center justify-center w-full h-screen px-8 mb-1 bg-white md:h-8 md:bg-transparent md:flex-row md:w-auto">

                            <li class="relative flex flex-col px-4 align-middle"><a href="{{ route('post.index') }}"
                                    class="py-1 text-sm font-bold leading-4 tracking-tight uppercase"><span
                                        class="inline-block align-middle text-blueLightPersonal hover:text-blueDarkPersonal">Muro
                                        Información</span></a>
                            </li>
                            <li class="relative flex flex-col px-4 align-middle"><a
                                    href="{{ route('docente.showClassrooms') }}"
                                    class="py-1 text-sm font-bold leading-4 tracking-tight uppercase "><span
                                        class="inline-block align-middle text-blueLightPersonal hover:text-blueDarkPersonal">Aulas</span></a>
                            </li>
                            <li class="relative flex flex-col px-4 align-middle"><a href="{{ route('activity.index') }}"
                                    class="py-1 text-sm font-bold leading-4 tracking-tight uppercase "><span
                                        class="inline-block align-middle text-blueLightPersonal hover:text-blueDarkPersonal">Dinamicas</span></a>
                            </li>
                            <li class="relative flex flex-col px-4 align-middle"><a href="{{ route('alerta.index') }}"
                                    class="py-1 text-sm font-bold leading-4 tracking-tight uppercase"><span
                                        class="inline-block align-middle text-blueLightPersonal hover:text-blueDarkPersonal">Alertas</span></a>
                            </li>
                            <li class="relative flex flex-col px-4 align-middle"><a href="{{ route('chat.index') }}"
                                    class="py-1 text-sm font-bold leading-4 tracking-tight uppercase"><span
                                        class="inline-block align-middle text-blueLightPersonal hover:text-blueDarkPersonal">Chat</span></a>
                            </li>
                            <li class="relative flex flex-col px-4 align-middle"><a href="{{ route('user.userProfile') }}"
                                    class="py-1 text-sm font-bold leading-4 tracking-tight uppercase"><span
                                        class="inline-block align-middle text-blueLightPersonal hover:text-blueDarkPersonal">Mi
                                        Perfil</span></a></li>
                        </ul>
                    @else
                        {{-- <ul
                            class="absolute bottom-0 left-0 right-0 items-center justify-center hidden h-8 px-8 mb-1 md:flex"> --}}
                        <ul id="menuMobile"
                            class="static bottom-0 left-0 right-0 z-40 flex flex-col items-center justify-center w-full h-screen px-8 mb-1 bg-white md:h-8 md:bg-transparent md:flex-row md:w-auto">
                            <li class="relative flex flex-col px-4 align-middle"><a href="{{ route('post.index') }}"
                                    class="py-1 text-sm font-bold leading-4 tracking-tight uppercase"><span
                                        class="inline-block align-middle text-blueLightPersonal hover:text-blueDarkPersonal">Muro
                                        Información</span></a>
                            </li>

                            <li class="relative flex flex-col px-4 align-middle"><a href="{{ route('activity.index') }}"
                                    class="py-1 text-sm font-bold leading-4 tracking-tight uppercase "><span
                                        class="inline-block align-middle text-blueLightPersonal hover:text-blueDarkPersonal">Dinamicas</span></a>
                            </li>
                            <li class="relative flex flex-col px-4 align-middle"><a href="{{ route('alerta.create') }}"
                                    class="py-1 text-sm font-bold leading-4 tracking-tight uppercase"><span
                                        class="inline-block align-middle text-blueLightPersonal hover:text-blueDarkPersonal">Alertas</span></a>
                            </li>
                            <li class="relative flex flex-col px-4 align-middle"><a href="{{ route('chat.index') }}"
                                    class="py-1 text-sm font-bold leading-4 tracking-tight uppercase"><span
                                        class="inline-block align-middle text-blueLightPersonal hover:text-blueDarkPersonal">Chat</span></a>
                            </li>
                            <li class="relative flex flex-col px-4 align-middle"><a href="{{ route('user.userProfile') }}"
                                    class="py-1 text-sm font-bold leading-4 tracking-tight uppercase"><span
                                        class="inline-block align-middle text-blueLightPersonal hover:text-blueDarkPersonal">Mi
                                        Perfil</span></a></li>
                        </ul>
                    @endif

                </nav>
            </div>
        @endauth

    </nav>



</header>
