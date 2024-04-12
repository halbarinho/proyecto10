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
    <main>
        <div class="container py-4 mx-auto">

            {{-- INCLUYO MENSAJES DE ERROR --}}
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @elseif (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if ($classes->isEmpty())
                <h3 class="text-red-600">No hay registros de Aulas</h3>
            @else
                {{-- <div class="flex flex-wrap justify-center gap-1 px-4 mx-3 sm:px-6 lg:px-4"> --}}
                <div class="flex flex-wrap justify-center px-4 mx-3 sm:px-6 lg:px-4">
                    <!-- En pantallas extra grandes y grandes, se muestran 3 columnas -->

                    <div
                        class="flex flex-col items-center justify-between w-full p-4 space-y-3 md:flex-row md:space-y-0 md:space-x-4">
                        <h1 class="text-3xl uppercase">Aulas</h1>
                    </div>

                    @foreach ($classes as $class)
                        <div class="w-full p-8 lg:w-1/3 xl:w-1/3 md:w-1/2">
                            <div class="w-2/3 mx-auto">
                                <a href="{{ route('classroom.edit', [$class]) }}">
                                    <img class="object-cover object-center w-full h-auto"
                                        src="{{ asset('icons/university256.png') }}" alt="{{ $class->class_name }}">
                                </a>
                            </div>
                            <div class="py-8 text-center sm:py-6">
                                <p class="mb-2 text-xl font-bold text-gray-700">{{ $class->class_name }}</p>
                                <p class="text-base font-normal text-gray-400">Gestión de los alumnos</p>
                            </div>
                        </div>
                    @endforeach


                </div>
            @endif


        </div>

    </main>

@endsection
