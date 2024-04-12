@extends('layout.template-dashboard')
@section('title', 'Docente Dashboard')
@vite(['resources/css/app.css'])
<meta name="csrf-token" content="{{ csrf_token() }}">



@section('content')


    <!-- component -->
    {{-- <section class="max-w-6xl px-4 py-12 mx-auto sm:px-6 lg:px-4"> --}}
    {{-- <section class="max-w-full px-4 py-12 mx-auto sm:px-6 lg:px-4">

        <div class="grid grid-cols-1 gap-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3">
            <div class="flex flex-col items-center justify-center w-full overflow-hidden bg-white rounded-lg sahdow-lg">
                <div>
                    <a href="{{ route('post.index') }}">
                        <img class="object-cover object-center w-full h-auto" src="{{ asset('icons/student.png') }}"
                            alt="photo">
                    </a>
                </div>
                <div class="py-8 text-center sm:py-6">
                    <p class="mb-2 text-xl font-bold text-gray-700">Dany Bailey</p>
                    <p class="text-base font-normal text-gray-400">Software Engineer</p>
                </div>
            </div>


            <div class="flex flex-col items-center justify-center w-full overflow-hidden bg-white rounded-lg sahdow-lg">
                <div>
                    <img class="object-cover object-center w-full h-auto" src="{{ asset('icons/student.png') }}"
                        alt="photo">
                </div>
                <div class="py-8 text-center sm:py-6">
                    <p class="mb-2 text-xl font-bold text-gray-700">Dany Bailey</p>
                    <p class="text-base font-normal text-gray-400">Software Engineer</p>
                </div>
            </div>


            <div class="flex flex-col items-center justify-center w-full overflow-hidden bg-white rounded-lg sahdow-lg">
                <div>
                    <img class="object-cover object-center w-full h-auto" src="{{ asset('icons/student.png') }}"
                        alt="photo">
                </div>
                <div class="py-8 text-center sm:py-6">
                    <p class="mb-2 text-xl font-bold text-gray-700">Dany Bailey</p>
                    <p class="text-base font-normal text-gray-400">Software Engineer</p>
                </div>
            </div>


            <div class="flex flex-col items-center justify-center w-full overflow-hidden bg-white rounded-lg sahdow-lg">
                <div>
                    <img class="object-cover object-center w-full h-auto" src="{{ asset('icons/student256.png') }}"
                        alt="photo">
                </div>
                <div class="py-8 text-center sm:py-6">
                    <p class="mb-2 text-xl font-bold text-gray-700">Dany Bailey</p>
                    <p class="text-base font-normal text-gray-400">Software Engineer</p>
                </div>
            </div>


            <div class="flex flex-col items-center justify-center w-full overflow-hidden bg-white rounded-lg sahdow-lg">
                <div>
                    <img class="object-cover object-center w-full h-auto" src="{{ asset('icons/student256.png') }}"
                        alt="photo">
                </div>
                <div class="py-8 text-center sm:py-6">
                    <p class="mb-2 text-xl font-bold text-gray-700">Dany Bailey</p>
                    <p class="text-base font-normal text-gray-400">Software Engineer</p>
                </div>
            </div>


            <div class="flex flex-col items-center justify-center w-full overflow-hidden bg-white rounded-lg sahdow-lg">
                <div>
                    <img class="object-cover object-center w-full h-auto" src="{{ asset('icons/student256.png') }}"
                        alt="photo">
                </div>
                <div class="py-8 text-center sm:py-6">
                    <p class="mb-2 text-xl font-bold text-gray-700">Dany Bailey</p>
                    <p class="text-base font-normal text-gray-400">Software Engineer</p>
                </div>
            </div>




        </div>
        </div>
    </section> --}}

    <div class="container w-2/3 mx-auto">

        {{-- <div class="flex flex-wrap justify-center gap-1 px-4 mx-3 sm:px-6 lg:px-4"> --}}
        <div class="flex flex-wrap justify-center px-4 mx-3 sm:px-6 lg:px-4">
            <!-- En pantallas extra grandes y grandes, se muestran 3 columnas -->
            <div class="w-full p-8 lg:w-1/3 xl:w-1/3 md:w-1/2">
                <div>
                    <a href="{{ route('post.index') }}">
                        <img class="object-cover object-center w-full h-auto" src="{{ asset('icons/student.png') }}"
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
                        <img class="object-cover object-center w-full h-auto" src="{{ asset('icons/student.png') }}"
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
                        <img class="object-cover object-center w-full h-auto" src="{{ asset('icons/student.png') }}"
                            alt="photo">
                    </a>
                </div>
                <div class="py-8 text-center sm:py-6">
                    <p class="mb-2 text-xl font-bold text-gray-700">Dinámicasa</p>
                    <p class="text-base font-normal text-gray-400">Gestión Dinámicas</p>
                </div>
            </div>


            <div class="w-full p-8 lg:w-1/3 xl:w-1/3 md:w-1/2">
                <div>
                    <a href="{{ route('alerta.index') }}">
                        <img class="object-cover object-center w-full h-auto" src="{{ asset('icons/student.png') }}"
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
                        <img class="object-cover object-center w-full h-auto" src="{{ asset('icons/student.png') }}"
                            alt="photo">
                    </a>
                </div>
                <div class="py-8 text-center sm:py-6">
                    <p class="mb-2 text-xl font-bold text-gray-700">Mensajes</p>
                    <p class="text-base font-normal text-gray-400"></p>
                </div>
            </div>
            <div class="w-full p-8 lg:w-1/3 xl:w-1/3 md:w-1/2">
                <div>
                    <a href="{{ route('post.index') }}">
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
