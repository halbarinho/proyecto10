@extends('layout.template-dashboard')

@section('title', 'Listado Alumnos')
<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
    crossorigin="anonymous"></script>
@vite(['resources/css/app.css', 'resources/js/app.js'])

@section('content')

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

            <section class="p-3 antialiased bg-gray-50 dark:bg-gray-900 sm:p-5">
                <div class="max-w-screen-xl px-4 mx-auto lg:px-12">
                    <div
                        class="flex flex-col items-center justify-between p-4 space-y-3 md:flex-row md:space-y-0 md:space-x-4">
                        <h1 class="text-3xl uppercase">Alumnos</h1>
                    </div>
                    <div class="relative overflow-hidden bg-white shadow-md dark:bg-gray-800 sm:rounded-lg">
                        <div
                            class="flex flex-col items-center justify-between p-4 space-y-3 md:flex-row md:space-y-0 md:space-x-4">
                            <div class="w-full md:w-1/2">
                                {{-- form para busqueda --}}
                                <form class="flex items-center">
                                    <label for="simple-search" class="sr-only">Search</label>
                                    <div class="relative w-full">
                                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                            <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400"
                                                fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd"
                                                    d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </div>
                                        <input type="text" id="simple-search"
                                            class="block w-full p-2 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                            placeholder="Search" required="">
                                    </div>
                                </form>
                            </div>
                            <div
                                class="flex flex-col items-stretch justify-end flex-shrink-0 w-full space-y-2 md:w-auto md:flex-row md:space-y-0 md:items-center md:space-x-3">
                                <button type="button" id="createProductModalButton"
                                    class="flex items-center justify-center px-4 py-2 text-sm font-medium text-white bg-red-800 rounded-lg bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 focus:outline-none dark:focus:ring-primary-800">
                                    Añadir Alumn@
                                </button>

                            </div>
                        </div>
                        <div class="mx-3 mb-5">
                            <span class="">{{ count($estudiantes) }} alumn@s</span>
                            <hr class="h-0.5 mt-5 mx-auto border-t-2 border-opacity-100 border-black ">
                        </div>
                        <div class="overflow-x-auto mx-2">
                            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                <thead
                                    class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                    <tr>
                                        <th class="px-4 py-4"></th>
                                        <th class="px-4 py-3">Alumno</th>
                                        <th class="px-4 py-3">Clase</th>
                                        <th class="px-4 py-3 text-right">Opciones</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @if ($estudiantes->isEmpty())
                                        <tr class="col-span-3 text-center">
                                            <td class="text-red-600">No hay registros de Aulas</td>
                                        </tr>
                                        <hr class="h-0.5 mt-5 mx-auto border-t-2 border-opacity-100 border-gray-300">
                                    @else
                                        <form action="{{ route('estudiante.addStudentsToClass') }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <div
                                                class="mb-4 flex flex-col items-stretch justify-end flex-shrink-0 w-full space-y-2 md:w-auto md:flex-row md:space-y-0 md:items-center md:space-x-3">
                                                <button
                                                    class="flex items-center justify-center px-4 py-2 text-sm font-medium text-white bg-green-600 rounded-lg bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 focus:outline-none dark:focus:ring-primary-800"
                                                    type="button" id="submit">
                                                    <input type="submit" value="Enviar">
                                                </button>
                                            </div>
                                            <input type="hidden" name="classroom" value="{{ $classroom }}">
                                            @foreach ($estudiantes as $student)
                                                <tr class="border-b dark:border-gray-700 ">
                                                    {{-- <td
                                                    class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white text-center">
                                                </td> --}}
                                                    <td><input type="checkbox" name="estudiantesList[]"
                                                            value="{{ $student->user_id }}"></td>
                                                    <td class="px-4 py-3 max-w-[12rem] truncate">
                                                        {{ $student->user->name }} {{ $student->user->last_name_1 }}
                                                        {{ $student->user->last_name_2 }}
                                                    </td>
                                                    <td class="px-4 py-3 max-w-[12rem] truncate">

                                                        {{ $student->Classroom ? $student->Classroom->class_name : '' }}
                                                    </td>
                                                    <td class="flex items-center justify-end px-4 py-3">
                                                        <a
                                                            href="{{ route('estudiante.addStudentToClass', ['estudiante' => $student->user_id, 'classroom' => $classroom]) }}">
                                                            <svg class="w-7 h-7" xmlns="http://www.w3.org/2000/svg"
                                                                viewBox="0 0 32 32">
                                                                <path
                                                                    style="text-indent:0;text-align:start;line-height:normal;text-transform:none;block-progression:tb;-inkscape-font-specification:Bitstream Vera Sans"
                                                                    d="M 14 4 C 10.145852 4 7 7.1458513 7 11 C 7 13.408843 8.2311596 15.55212 10.09375 16.8125 C 6.5266132 18.342333 4 21.881262 4 26 L 6 26 C 6 21.569334 9.5693339 18 14 18 C 15.376046 18 16.65445 18.35784 17.78125 18.96875 C 16.671114 20.342565 16 22.103031 16 24 C 16 28.406433 19.593567 32 24 32 C 28.406433 32 32 28.406433 32 24 C 32 19.593567 28.406433 16 24 16 C 22.252849 16 20.630732 16.574679 19.3125 17.53125 C 18.870028 17.253247 18.392372 17.020656 17.90625 16.8125 C 19.76884 15.55212 21 13.408843 21 11 C 21 7.1458513 17.854148 4 14 4 z M 14 6 C 16.773268 6 19 8.2267317 19 11 C 19 13.773268 16.773268 16 14 16 C 11.226732 16 9 13.773268 9 11 C 9 8.2267317 11.226732 6 14 6 z M 24 18 C 27.325553 18 30 20.674447 30 24 C 30 27.325553 27.325553 30 24 30 C 20.674447 30 18 27.325553 18 24 C 18 20.674447 20.674447 18 24 18 z M 23 20 L 23 23 L 20 23 L 20 25 L 23 25 L 23 28 L 25 28 L 25 25 L 28 25 L 28 23 L 25 23 L 25 20 L 23 20 z"
                                                                    color="#000" overflow="visible"
                                                                    font-family="Bitstream Vera Sans" />
                                                            </svg>
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endforeach

                                        </form>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                        <nav class="flex flex-col items-start justify-between p-4 space-y-3 md:flex-row md:items-center md:space-y-0"
                            aria-label="Table navigation">
                            <span class="text-sm font-normal text-gray-500 dark:text-gray-400">
                                Mostrando
                                <span class="font-semibold text-gray-900 dark:text-white">1-10</span>
                                de
                                <span class="font-semibold text-gray-900 dark:text-white">1000</span>
                            </span>
                            <ul class="inline-flex items-stretch -space-x-px">
                                <li>
                                    <a href="#"
                                        class="flex items-center justify-center h-full py-1.5 px-3 ml-0 text-gray-500 bg-white rounded-l-lg border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                                        <span class="sr-only">Previous</span>
                                        <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewbox="0 0 20 20"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="flex items-center justify-center px-3 py-2 text-sm leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">1</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="flex items-center justify-center px-3 py-2 text-sm leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">2</a>
                                </li>
                                <li>
                                    <a href="#" aria-current="page"
                                        class="z-10 flex items-center justify-center px-3 py-2 text-sm leading-tight border text-primary-600 bg-primary-50 border-primary-300 hover:bg-primary-100 hover:text-primary-700 dark:border-gray-700 dark:bg-gray-700 dark:text-white">3</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="flex items-center justify-center px-3 py-2 text-sm leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">...</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="flex items-center justify-center px-3 py-2 text-sm leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">100</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="flex items-center justify-center h-full py-1.5 px-3 leading-tight text-gray-500 bg-white rounded-r-lg border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                                        <span class="sr-only">Next</span>
                                        <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewbox="0 0 20 20"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </section>
        </div>
    </main>
@endsection
