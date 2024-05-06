<!-- footer -->

<footer class="flex flex-col w-full px-6 mt-10 text-white bg-blackGray body-font min-h-60">

    <div
        class="container flex flex-row justify-between px-6 py-10 mx-auto mb-4 border-b-2 md:items-center lg:items-start md:flex-row md:flex-no-wrap border-b-white">

        <div class="flex self-start mx-auto text-center basis-1/5 md:mx-0 md:text-left">

            <div class="flex flex-grow gap-2 mt-2 text-sm text-white">
                <a class="inline-block self-baseline " href="{{ route('welcome') }}">

                    <img class="max-w-20 max-h-20 hover:rotate-6" src="{{ asset('icons/logoTranspDwhite.png') }}"
                        alt="logo Diketive">
                </a>
                <p class="hidden md:block">Breve descripción de la aplicación, su funcionalidad y hacia quién
                    va
                    dirigida, de forma que ocupe entre tres y cuatro líneas.</p>
            </div>

        </div>

        <div
            class="flex flex-wrap self-end justify-end flex-grow mt-10 -mb-10 text-center basis-4/5 md:mt-0 md:text-left">

            <div class="pr-4 basis-2/8">
                <span
                    class="flex flex-col items-center justify-center h-full my-auto space-y-3 align-middle sm:ml-auto sm:mt-0 sm:justify-start">
                    <a class="cursor-pointer text-yellowPersonal ">
                        <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            class="w-6 h-6" viewBox="0 0 24 24">
                            <path d="M18 2h-3a5 5 0 00-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 011-1h3z"></path>
                        </svg>
                    </a>
                    <a class="cursor-pointer text-yellowPersonal ">
                        <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            class="w-6 h-6" viewBox="0 0 24 24">
                            <path
                                d="M23 3a10.9 10.9 0 01-3.14 1.53 4.48 4.48 0 00-7.86 3v1A10.66 10.66 0 013 4s-4 9 5 13a11.64 11.64 0 01-7 2c9 5 20 0 20-11.5a4.5 4.5 0 00-.08-.83A7.72 7.72 0 0023 3z">
                            </path>
                        </svg>
                    </a>
                    <a class="cursor-pointer text-yellowPersonal ">
                        <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                            stroke-width="2" class="w-6 h-6" viewBox="0 0 24 24">
                            <rect width="20" height="20" x="2" y="2" rx="5" ry="5">
                            </rect>
                            <path d="M16 11.37A4 4 0 1112.63 8 4 4 0 0116 11.37zm1.5-4.87h.01"></path>
                        </svg>
                    </a>
                    <a class="cursor-pointer text-yellowPersonal ">
                        <svg fill="currentColor" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                            stroke-width="0" class="w-6 h-6" viewBox="0 0 24 24">
                            <path stroke="none"
                                d="M16 8a6 6 0 016 6v7h-4v-7a2 2 0 00-2-2 2 2 0 00-2 2v7h-4v-7a6 6 0 016-6zM2 9h4v12H2z">
                            </path>
                            <circle cx="4" cy="4" r="2" stroke="none"></circle>
                        </svg>
                    </a>
                </span>
            </div>


            <div class="flex basis-1/2">
                <div class="items-center w-full px-4 basis-1/2">
                    <h2 class="mb-3 text-lg font-extrabold tracking-widest text-white uppercase title-font">
                        Información
                    </h2>
                    <nav class="mb-10 list-none">
                        <li class="mt-3">
                            <a href="{{ route('about.aboutUs') }}"
                                class="text-gray-400 lowercase cursor-pointer hover:text-white">Sobre Nosotros</a>
                        </li>
                        <li class="mt-3">
                            <a class="text-gray-400 lowercase cursor-pointer hover:text-white">Politica Privacidad</a>
                        </li>
                        <li class="mt-3">
                            <a class="text-gray-400 lowercase cursor-pointer hover:text-white">Cookies</a>
                        </li>
                    </nav>
                </div>

                <div class="w-full px-4 basis-1/2">
                    <h2 class="mb-3 text-lg font-extrabold tracking-widest text-white uppercase">
                        Contacto
                    </h2>
                    <nav class="mb-10 list-none">
                        <li class="mt-3">
                            <a href="{{ route('contact') }}"
                                class="text-gray-400 lowercase cursor-pointer hover:text-white">contáctanos</a>
                        </li>
                        <li class="mt-3">
                            <a class="text-gray-400 lowercase cursor-pointer hover:text-white">976-976-976</a>
                        </li>

                    </nav>
                </div>
            </div>
        </div>



    </div>

    {{-- FOOTER TELEFONOS --}}
    <div
        class="flex flex-wrap self-center justify-center px-6 mt-6 mb-6 text-center md:justify-center md:pl-20 md:mt-0 md:text-left">

        <div class="flex flex-col px-6 mx-3 my-0 text-center">
            <a href="tel:103" class="flex flex-grow">
                <div class="flex-col pt-2">
                    <svg class="flex flex-col align-top w-7 h-7 " xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 24 24">
                        <defs>
                            <style>
                                .cls-1 {
                                    fill: #fff;
                                    opacity: 0;
                                }

                                .cls-2 {
                                    fill: #fdd306;
                                }
                            </style>
                        </defs>
                        <title>phone-call</title>
                        <g id="Layer_2" data-name="Layer 2">
                            <g id="phone-call">
                                <g id="phone-call-2" data-name="phone-call">
                                    <rect class="flex-col cls-1" width="12" height="12" />
                                    <path class="cls-2" d="
                M13,8a3,3,0,0,1,3,3,1,1,0,0,0,2,0,5,5,0,0,0-5-5,1,1,0,0,0,0,2Z" />
                                    <path class="cls-2"
                                        d="M13,4a7,7,0,0,1,7,7,1,1,0,0,0,2,0,9,9,0,0,0-9-9,1,1,0,0,0,0,2Z" />
                                    <path class="cls-2"
                                        d="M21.75,15.91a1,1,0,0,0-.72-.65l-6-1.37a1,1,0,0,0-.92.26c-.14.13-.15.14-.8,1.38a9.91,9.91,0,0,1-4.87-4.89C9.71,10,9.72,10,9.85,9.85a1,1,0,0,0,.26-.92L8.74,3a1,1,0,0,0-.65-.72,3.79,3.79,0,0,0-.72-.18A3.94,3.94,0,0,0,6.6,2,4.6,4.6,0,0,0,2,6.6,15.42,15.42,0,0,0,17.4,22,4.6,4.6,0,0,0,22,17.4a4.77,4.77,0,0,0-.06-.76A4.34,4.34,0,0,0,21.75,15.91Z" />
                                </g>
                            </g>
                        </g>
                    </svg>
                </div>
                <div class="flex flex-col justify-around pl-2">
                    <h3 class="flex flex-row justify-center ">
                        <span class="font-bold ">900 100 456
                        </span>
                    </h3>

                    <p class="flex flex-row">Atención al menor</p>
                </div>
            </a>
        </div>

        <div class="flex flex-col px-6 mx-3 my-0 text-center">
            <a href="tel:103" class="flex flex-grow">
                <div class="flex-col pt-2">
                    <svg class="flex flex-col align-top w-7 h-7 " xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 24 24">
                        <defs>
                            <style>
                                .cls-1 {
                                    fill: #fff;
                                    opacity: 0;
                                }

                                .cls-2 {
                                    fill: #fdd306;
                                }
                            </style>
                        </defs>
                        <title>phone-call</title>
                        <g id="Layer_2" data-name="Layer 2">
                            <g id="phone-call">
                                <g id="phone-call-2" data-name="phone-call">
                                    <rect class="flex-col cls-1" width="12" height="12" />
                                    <path class="cls-2" d="
                M13,8a3,3,0,0,1,3,3,1,1,0,0,0,2,0,5,5,0,0,0-5-5,1,1,0,0,0,0,2Z" />
                                    <path class="cls-2"
                                        d="M13,4a7,7,0,0,1,7,7,1,1,0,0,0,2,0,9,9,0,0,0-9-9,1,1,0,0,0,0,2Z" />
                                    <path class="cls-2"
                                        d="M21.75,15.91a1,1,0,0,0-.72-.65l-6-1.37a1,1,0,0,0-.92.26c-.14.13-.15.14-.8,1.38a9.91,9.91,0,0,1-4.87-4.89C9.71,10,9.72,10,9.85,9.85a1,1,0,0,0,.26-.92L8.74,3a1,1,0,0,0-.65-.72,3.79,3.79,0,0,0-.72-.18A3.94,3.94,0,0,0,6.6,2,4.6,4.6,0,0,0,2,6.6,15.42,15.42,0,0,0,17.4,22,4.6,4.6,0,0,0,22,17.4a4.77,4.77,0,0,0-.06-.76A4.34,4.34,0,0,0,21.75,15.91Z" />
                                </g>
                            </g>
                        </g>
                    </svg>
                </div>
                <div class="flex flex-col justify-around pl-2">
                    <h3 class="flex flex-row justify-center ">
                        <span class="font-bold">900 018 018
                        </span>
                    </h3>

                    <p class="flex flex-row">Ministerio Interior</p>
                </div>
            </a>
        </div>

        <div class="flex flex-col px-6 mx-3 my-0 text-center">
            <a href="tel:103" class="flex flex-grow">
                <div class="flex-col pt-2">
                    <svg class="flex flex-col align-top w-7 h-7 " xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 24 24">
                        <defs>
                            <style>
                                .cls-1 {
                                    fill: #fff;
                                    opacity: 0;
                                }

                                .cls-2 {
                                    fill: #fdd306;
                                }
                            </style>
                        </defs>
                        <title>phone-call</title>
                        <g id="Layer_2" data-name="Layer 2">
                            <g id="phone-call">
                                <g id="phone-call-2" data-name="phone-call">
                                    <rect class="flex-col cls-1" width="12" height="12" />
                                    <path class="cls-2" d="
                M13,8a3,3,0,0,1,3,3,1,1,0,0,0,2,0,5,5,0,0,0-5-5,1,1,0,0,0,0,2Z" />
                                    <path class="cls-2"
                                        d="M13,4a7,7,0,0,1,7,7,1,1,0,0,0,2,0,9,9,0,0,0-9-9,1,1,0,0,0,0,2Z" />
                                    <path class="cls-2"
                                        d="M21.75,15.91a1,1,0,0,0-.72-.65l-6-1.37a1,1,0,0,0-.92.26c-.14.13-.15.14-.8,1.38a9.91,9.91,0,0,1-4.87-4.89C9.71,10,9.72,10,9.85,9.85a1,1,0,0,0,.26-.92L8.74,3a1,1,0,0,0-.65-.72,3.79,3.79,0,0,0-.72-.18A3.94,3.94,0,0,0,6.6,2,4.6,4.6,0,0,0,2,6.6,15.42,15.42,0,0,0,17.4,22,4.6,4.6,0,0,0,22,17.4a4.77,4.77,0,0,0-.06-.76A4.34,4.34,0,0,0,21.75,15.91Z" />
                                </g>
                            </g>
                        </g>
                    </svg>
                </div>
                <div class="flex flex-col justify-around pl-2">
                    <h3 class="flex flex-row justify-center ">
                        <span class="font-bold">600 909 073
                        </span>
                    </h3>

                    <p class="flex flex-row">Telegram M. Interior</p>
                </div>
            </a>
        </div>

        <div class="flex flex-col px-6 mx-3 my-0 text-center">
            <a href="tel:103" class="flex flex-grow">
                <div class="flex-col pt-2">
                    <svg class="flex flex-col align-top w-7 h-7 " xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 24 24">
                        <defs>
                            <style>
                                .cls-1 {
                                    fill: #fff;
                                    opacity: 0;
                                }

                                .cls-2 {
                                    fill: #fdd306;
                                }
                            </style>
                        </defs>
                        <title>phone-call</title>
                        <g id="Layer_2" data-name="Layer 2">
                            <g id="phone-call">
                                <g id="phone-call-2" data-name="phone-call">
                                    <rect class="flex-col cls-1" width="12" height="12" />
                                    <path class="cls-2" d="
                M13,8a3,3,0,0,1,3,3,1,1,0,0,0,2,0,5,5,0,0,0-5-5,1,1,0,0,0,0,2Z" />
                                    <path class="cls-2"
                                        d="M13,4a7,7,0,0,1,7,7,1,1,0,0,0,2,0,9,9,0,0,0-9-9,1,1,0,0,0,0,2Z" />
                                    <path class="cls-2"
                                        d="M21.75,15.91a1,1,0,0,0-.72-.65l-6-1.37a1,1,0,0,0-.92.26c-.14.13-.15.14-.8,1.38a9.91,9.91,0,0,1-4.87-4.89C9.71,10,9.72,10,9.85,9.85a1,1,0,0,0,.26-.92L8.74,3a1,1,0,0,0-.65-.72,3.79,3.79,0,0,0-.72-.18A3.94,3.94,0,0,0,6.6,2,4.6,4.6,0,0,0,2,6.6,15.42,15.42,0,0,0,17.4,22,4.6,4.6,0,0,0,22,17.4a4.77,4.77,0,0,0-.06-.76A4.34,4.34,0,0,0,21.75,15.91Z" />
                                </g>
                            </g>
                        </g>
                    </svg>
                </div>
                <div class="flex flex-col justify-around pl-2">
                    <h3 class="flex flex-row justify-center ">
                        <span class="font-bold">915 822 358
                        </span>
                    </h3>

                    <p class="flex flex-row">Protección Menor NT</p>
                </div>
            </a>
        </div>

    </div>

    {{-- FOOTER BOTTOM --}}
    <div
        class="container flex flex-row justify-center flex-grow w-full px-6 mx-auto border-t-2 bg-blackGray border-t-white">
        <div class="px-5 py-4 mx-auto">
            <p class="text-sm text-white capitalize xl:text-center">© LetuxMedia 2024 All rights reserved</p>
        </div>
    </div>

</footer>
