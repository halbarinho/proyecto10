@extends('layout.template-dashboard')

@section('title', 'Contact Form')

@section('content')

    <div class="mr-4 overflow-auto ml-14 mt-14">

        <div class="my-6">
            <div
                class="grid xs:grid-cols-1 md:grid-cols-2 items-center gap-16 p-8 mx-auto max-w-4xl bg-white shadow-[0_2px_10px_-3px_rgba(6,81,237,0.3)] rounded-md text-[#333] font-[sans-serif]">

                {{-- Zona izquierda --}}
                <div class="hidden md:block">
                    <h1 class="text-3xl font-extrabold">Háblanos</h1>
                    <br>
                    <p class="mt-3 text-justify text-gray-400 text-md">Si necesitas mas informacion sobre el funcionamiento
                        de la web,
                        tienes dudas
                        o quieres que te resolvamos alguna cuestion especifica, ponte en contacto con nosotros.</p>
                    <div class="mt-12">

                    </div>
                    <div class="mt-12">
                        <h2 class="text-lg font-extrabold">Social</h2>
                        <ul class="flex mt-3 space-x-4">
                            <li
                                class="flex items-center justify-center w-10 h-10 rounded-full bg-yellowPersonal shrink-0 hover:rotate-12">
                                <a href="">
                                    <svg fill="white" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        class="w-6 h-6" viewBox="0 0 24 24">
                                        <path d="M18 2h-3a5 5 0 00-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 011-1h3z"></path>
                                    </svg>
                                </a>
                            </li>
                            <li
                                class="flex items-center justify-center w-10 h-10 rounded-full bg-yellowPersonal shrink-0 hover:rotate-12">
                                <a href="">
                                    <svg fill="white" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="0" class="w-6 h-6" viewBox="0 0 24 24">
                                        <path stroke="none"
                                            d="M16 8a6 6 0 016 6v7h-4v-7a2 2 0 00-2-2 2 2 0 00-2 2v7h-4v-7a6 6 0 016-6zM2 9h4v12H2z">
                                        </path>
                                        <circle cx="4" cy="4" r="2" stroke="none"></circle>
                                    </svg>
                                </a>
                            </li>
                            <li
                                class="flex items-center justify-center w-10 h-10 rounded-full bg-yellowPersonal shrink-0 hover:rotate-12">
                                <a href="">
                                    <svg fill="white" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        class="w-6 h-6" viewBox="0 0 24 24">
                                        <path
                                            d="M23 3a10.9 10.9 0 01-3.14 1.53 4.48 4.48 0 00-7.86 3v1A10.66 10.66 0 013 4s-4 9 5 13a11.64 11.64 0 01-7 2c9 5 20 0 20-11.5a4.5 4.5 0 00-.08-.83A7.72 7.72 0 0023 3z">
                                        </path>
                                    </svg>
                                </a>
                            </li>
                            <li
                                class="flex items-center justify-center w-10 h-10 rounded-full bg-yellowPersonal shrink-0 hover:rotate-12">
                                <a href="">
                                    <svg fill="none" stroke="white" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" class="w-6 h-6" viewBox="0 0 24 24">
                                        <rect width="20" height="20" x="2" y="2" rx="5" ry="5">
                                        </rect>
                                        <path d="M16 11.37A4 4 0 1112.63 8 4 4 0 0116 11.37zm1.5-4.87h.01"></path>
                                    </svg>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>



                {{-- Form Derecha --}}
                <div>
                    <h1 class="visible text-3xl font-extrabold md:hidden">Háblanos</h1>
                    <form action="{{ route('contact.send') }}" method="POST" class="ml-auto space-y-4">
                        @csrf
                        <input name="name" type='text' placeholder='Nombre y apellidos'
                            class="w-full rounded-md py-2.5 px-4 border text-sm outline-[#fdd306]"
                            value="{{ old('name') }}">

                        @error('name')
                            <div class="my-2 text-sm text-red-600">{{ $message }}</div>
                        @enderror

                        <input name="mail" type='email' placeholder='Email'
                            class="w-full rounded-md py-2.5 px-4 border text-sm outline-[#fdd306]"
                            value="{{ old('mail') }}">

                        @error('mail')
                            <div class="my-2 text-sm text-red-600">{{ $message }}</div>
                        @enderror

                        <input name="asunto" type='text' placeholder='Asunto'
                            class="w-full rounded-md py-2.5 px-4 border text-sm outline-[#fdd306]"
                            value="{{ old('asunto') }}">

                        @error('asunto')
                            <div class="my-2 text-sm text-red-600">{{ $message }}</div>
                        @enderror

                        <textarea name="mensaje" placeholder='Mensaje' rows="6"
                            class="w-full rounded-md px-4 border text-sm pt-2.5 outline-[#fdd306]">{{ old('mensaje') }}</textarea>

                        @error('mensaje')
                            <div class="my-2 text-sm text-red-600">{{ $message }}</div>
                        @enderror

                        <input type="submit" value="Enviar"
                            class="justify-end w-full px-4 py-2 font-bold text-white rounded-md bg-blueLighterPersonal border-blueLighterPersonal hover:bg-blueLightPersonal">
                    </form>
                </div>

            </div>
        </div>
    </div>

@endsection
