<header class="fixed top-0 z-10 w-full bg-white h-28 border-y-4 border-t-yellowPersonal border-b-gray-400">

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

        @auth


            @if (Auth::user()->hasRole('docente'))
                <ul class="absolute bottom-0 left-0 right-0 items-center justify-center hidden h-8 px-8 mb-1 md:flex">
                    <li class="relative flex flex-col px-4 align-middle"><a href="{{ route('post.index') }}"
                            class="py-1 text-sm font-bold leading-4 tracking-tight uppercase"><span
                                class="inline-block align-middle text-blueLightPersonal hover:text-blueDarkPersonal">Muro
                                Información</span></a>
                    </li>
                    <li class="relative flex flex-col px-4 align-middle"><a href="{{ route('docente.showClassrooms') }}"
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
                    <li class="relative flex flex-col px-4 align-middle"><a href=""
                            class="py-1 text-sm font-bold leading-4 tracking-tight uppercase"><span
                                class="inline-block align-middle text-blueLightPersonal hover:text-blueDarkPersonal">Mi
                                Perfil</span></a></li>
                </ul>
            @else
                <ul class="absolute bottom-0 left-0 right-0 items-center justify-center hidden h-8 px-8 mb-1 md:flex">
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
                    <li class="relative flex flex-col px-4 align-middle"><a href=""
                            class="py-1 text-sm font-bold leading-4 tracking-tight uppercase"><span
                                class="inline-block align-middle text-blueLightPersonal hover:text-blueDarkPersonal">Mi
                                Perfil</span></a></li>
                </ul>
            @endif
        @endauth

    </nav>



</header>
