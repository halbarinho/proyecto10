@extends('layout.template-dashboard')
@section('title', 'Docente Dashboard')
@vite(['resources/css/app.css'])
<meta name="csrf-token" content="{{ csrf_token() }}">



@section('content')

    <main>
        <div class="container py-4 mx-auto">

            {{-- INCLUYO MENSAJES DE ERROR --}}
            @if ($errors->any())
                <div class="">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li class="text-sm "><span
                                    class="p-1 text-sm text-white bg-red-300 rounded-md">{{ $error }}</span></li>
                        @endforeach
                    </ul>
                </div>
            @elseif (session('success'))
                <div class="text-sm ">
                    <span class="p-1 text-white rounded-md bg-greenPersonal">{{ session('success') }}</span>
                </div>
            @endif

            @if ($classes->isEmpty())
                <h3 class="text-red-600">No hay registros de Aulas</h3>
            @else
                <div class="flex flex-wrap justify-center px-4 mx-3 sm:px-6 lg:px-4">
                    <!-- En pantallas grandes se muestran 3 columnas -->

                    <div
                        class="flex flex-col items-center justify-between w-full p-4 space-y-3 md:flex-row md:space-y-0 md:space-x-4">
                        <h1 class="text-3xl uppercase">Aulas</h1>
                    </div>

                    @foreach ($classes as $class)
                        <div class="w-full p-8 mb-2 lg:w-1/3 xl:w-1/3 md:w-1/2">
                            <div class="w-2/3 mx-auto">
                                <a href="{{ route('classroom.classroomStudents', [$class]) }}">

                                    <div
                                        class="flex items-center justify-center mx-auto my-auto rounded-full aspect-square bg-yellowPersonalLight hover:bg-yellowPersonal">
                                        <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"
                                            xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                            class="mx-auto my-auto max-w-32 max-h-32 fill-white hover:rotate-3"
                                            viewBox="0 0 100 100" style="enable-background:new 0 0 100 100;"
                                            xml:space="preserve">

                                            <path class="st0"
                                                d="M97.2,10H28.1c-0.9,0-1.8,0.8-1.8,1.8v39.1c0,0.9,0.8,1.8,1.8,1.8l0,0c0.9,0,1.8-0.8,1.8-1.8V13.6h65.5v40.6
                                                                                                                                                                                 H48.3c-0.9,0-1.8,0.8-1.8,1.8l0,0c0,0.9,0.8,1.8,1.8,1.8h48.8c0.9,0,1.8-0.8,1.8-1.8V11.8C98.9,10.8,98.2,10,97.2,10z" />
                                            <circle class="st0" cx="11.8" cy="40.6" r="9.6" />
                                            <circle class="st0" cx="83.2" cy="69.9" r="8.5" />
                                            <circle class="st0" cx="51.4" cy="69.9" r="8.5" />
                                            <path class="st0"
                                                d="M45.1,49.9L57.4,34c0.4-0.5,0.3-1.3-0.2-1.7c-0.5-0.4-1.3-0.3-1.7,0.2l-12.2,16c-1.2-0.4-2.5-0.2-3.5,0.6
                                                                                                                                                                                 l-8.2,7.1l-16.7-3.4c-0.2,0-0.5-0.1-0.7-0.1c-0.7-0.1-1.5-0.2-2.3-0.2h-0.2c-5.5,0-10,3.8-10,8.5v27.1h20.1V61.6l10,2
                                                                                                                                                                                 c0.2,0,0.4,0.1,0.7,0.1c0.8,0,1.7-0.3,2.3-0.8l9.5-8.2C45.8,53.4,46.1,51.4,45.1,49.9z" />
                                            <path class="st0"
                                                d="M83.3,80.2h-0.2c-6,0-10.7,3.4-10.7,7.6v0.4h21.8v-0.4C94.1,83.6,89.3,80.2,83.3,80.2z" />
                                            <path class="st0"
                                                d="M51.5,80.2h-0.2c-6,0-10.7,3.4-10.7,7.6v0.4h21.8v-0.4C62.2,83.6,57.4,80.2,51.5,80.2z" />
                                            <path class="st0"
                                                d="M86.7,19.4H43.6c-0.9,0-1.8,0.8-1.8,1.8c0,0.9,0.8,1.8,1.8,1.8h43.2c0.9,0,1.8-0.8,1.8-1.8S87.8,19.4,86.7,19.4
                                                                                                                                                                                 z" />
                                            <path class="st0"
                                                d="M86.7,32.1H64.8c-0.9,0-1.8,0.8-1.8,1.8s0.8,1.8,1.8,1.8h22c0.9,0,1.8-0.8,1.8-1.8
                                                                                                                                                                                 C88.5,32.8,87.8,32.1,86.7,32.1z" />
                                            <path class="st0"
                                                d="M86.7,45.6H59.7c-0.9,0-1.8,0.8-1.8,1.8c0,0.9,0.8,1.8,1.8,1.8h27.2c0.9,0,1.8-0.8,1.8-1.8
                                                                                                                                                                                 C88.5,46.3,87.8,45.6,86.7,45.6z" />
                                        </svg>

                                    </div>
                                </a>
                            </div>
                            <div class="py-2 text-center ">
                                <span class="px-2 py-1 mb-2 text-xl font-bold text-white rounded-md w-min- bg-semidarkGray">
                                    {{ $class->class_name }}</span>

                            </div>
                        </div>
                    @endforeach


                </div>
            @endif


        </div>

    </main>

@endsection
