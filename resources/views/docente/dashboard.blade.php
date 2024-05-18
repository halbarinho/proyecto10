@extends('layout.template-dashboard')
@section('title', 'Docente Dashboard')
@vite(['resources/css/app.css'])
<meta name="csrf-token" content="{{ csrf_token() }}">



@section('content')

    <div class="container w-2/3 mx-auto">

        <div class="flex flex-wrap justify-center px-4 mx-3 sm:px-6 lg:px-4">
            <!-- En pantallas  grandes muestra 3 columnas -->
            <div class="w-full p-8 lg:w-1/3 xl:w-1/3 md:w-1/2">
                <div>
                    <a href="{{ route('post.index') }}">
                        <img class="object-cover object-center w-full h-auto" src="{{ asset('icons/articulos.svg') }}"
                            alt="photo">
                    </a>
                </div>
                <div class="py-8 text-center sm:py-6">
                    <p class="mb-2 text-xl font-bold text-gray-700">Muro Información</p>
                    <p class="text-base font-normal text-gray-400">Contenido Informativo</p>
                </div>
            </div>


            <div class="w-full p-8 lg:w-1/3 xl:w-1/3 md:w-1/2">
                <div>
                    <a href="{{ route('docente.showClassrooms') }}">
                        <img class="object-cover object-center w-full h-auto" src="{{ asset('icons/schoolIcon.svg') }}"
                            alt="photo">
                    </a>
                </div>
                <div class="py-8 text-center sm:py-6">
                    <p class="mb-2 text-xl font-bold text-gray-700">Aulas</p>
                    <p class="text-base font-normal text-gray-400">Gestión Aulas</p>
                </div>
            </div>


            <div class="w-full p-8 lg:w-1/3 xl:w-1/3 md:w-1/2">
                <div>
                    <a href="{{ route('activity.index') }}">
                        <img class="object-cover object-center w-full h-auto" src="{{ asset('icons/test.svg') }}"
                            alt="photo">
                    </a>
                </div>
                <div class="py-8 text-center sm:py-6">
                    <p class="mb-2 text-xl font-bold text-gray-700">Dinámicas</p>
                    <p class="text-base font-normal text-gray-400">Gestión Dinámicas</p>
                </div>
            </div>


            <div class="w-full p-8 lg:w-1/3 xl:w-1/3 md:w-1/2">
                <div>
                    <a href="{{ route('alerta.index') }}">
                        <img class="object-cover object-center w-full h-auto" src="{{ asset('icons/alertExclama.svg') }}"
                            alt="photo">
                    </a>
                </div>
                <div class="py-8 text-center sm:py-6">
                    <p class="mb-2 text-xl font-bold text-gray-700">Alertas</p>
                    <p class="text-base font-normal text-gray-400">Todo lo relacionado con las alertas</p>
                </div>
            </div>
            <div class="w-full p-8 lg:w-1/3 xl:w-1/3 md:w-1/2">
                <div>
                    <a href="{{ route('chat.index') }}">
                        <img class="object-cover object-center w-full h-auto" src="{{ asset('icons/chatIcon.svg') }}"
                            alt="photo">
                    </a>
                </div>
                <div class="py-8 text-center sm:py-6">
                    <p class="mb-2 text-xl font-bold text-gray-700">Mensajes</p>
                    <p class="text-base font-normal text-gray-400">Área de Chat</p>
                </div>
            </div>
            <div class="w-full p-8 lg:w-1/3 xl:w-1/3 md:w-1/2">
                <div>
                    <a href="{{ route('user.userProfile') }}">
                        <img class="object-cover object-center w-full h-auto" src="{{ asset('icons/student.png') }}"
                            alt="photo">
                    </a>
                </div>
                <div class="py-8 text-center sm:py-6">
                    <p class="mb-2 text-xl font-bold text-gray-700">Mi Perfil</p>
                    <p class="text-base font-normal text-gray-400">Gestionar mis datos</p>
                </div>
            </div>

        </div>


    </div>

@endsection
