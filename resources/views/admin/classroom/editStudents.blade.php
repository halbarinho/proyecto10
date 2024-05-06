@extends('layout.template-adminDashboard')

@section('css')
    {{-- Datatables --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.3/css/dataTables.tailwindcss.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.3/css/dataTables.dataTables.css" />

@endsection

@section('js')

    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
        crossorigin="anonymous"></script>

    @if ($studentList->isNotEmpty())
        {{ Log::info('aqui', [$studentList]) }}
        {{-- Datatables --}}
        <script src="https://cdn.datatables.net/2.0.3/js/dataTables.js"></script>

        <script>
            $(document).ready(function() {
                $('#classTable').DataTable({
                    "order": [
                        [0, "desc"]
                    ],
                    columnDefs: [{
                        targets: [1],
                        sortable: false,
                        searchable: false
                    }],
                    language: {
                        "decimal": "",
                        "emptyTable": "No hay datos",
                        "info": "Mostrando _START_ a _END_ de _TOTAL_ registros",
                        "infoEmpty": "Mostrando 0 a 0 de 0 registros",
                        "infoFiltered": "(Filtro de _MAX_ total registros)",
                        "infoPostFix": "",
                        "thousands": ",",
                        "lengthMenu": "Mostrar _MENU_ registros",
                        "loadingRecords": "Cargando...",
                        "processing": "Procesando...",
                        "search": "Buscar:",
                        "zeroRecords": "No se encontraron coincidencias",
                        "paginate": {
                            "first": "Primero",
                            "last": "Ultimo",
                            "next": "Próximo",
                            "previous": "Anterior"
                        },
                        "aria": {
                            "sortAscending": ": Activar orden de columna ascendente",
                            "sortDescending": ": Activar orden de columna desendente"
                        }
                    },
                    layout: {
                        topStart: null
                    }
                });
            });
        </script>
    @endif

@endsection


@section('title', 'Editar Clase')

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
                        <h1 class="text-3xl uppercase">Aula {{ $classroom->id }}</h1>
                    </div>
                    <div class="relative overflow-hidden bg-white shadow-md dark:bg-gray-800 sm:rounded-lg">
                        <div
                            class="flex flex-col items-center justify-end p-4 space-y-3 md:flex-row md:space-y-0 md:space-x-4">

                            <div
                                class="flex flex-col items-stretch justify-end flex-shrink-0 w-full space-y-2 md:w-auto md:flex-row md:space-y-0 md:items-center md:space-x-3">
                                <a href="{{ route('studentsList.index', ['classroom' => $classroom->id]) }}">
                                    <button type="button" id="createProductModalButton"
                                        class="flex items-center justify-center px-4 py-2 text-sm font-medium text-white bg-red-800 rounded-lg bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 focus:outline-none dark:focus:ring-primary-800">
                                        Añadir Alumn@
                                    </button>
                                </a>

                            </div>
                        </div>
                        <div class="mx-3 mb-5">
                            <span class="">{{ count($studentList) }} alumn@s</span>
                            <hr class="h-0.5 mt-5 mx-auto border-t-2 border-opacity-100 border-black ">
                        </div>
                        <div class="mx-3 mb-5 data-table-container">
                            <div class="px-4 py-4 -mx-4 overflow-x-auto sm:-mx-8 sm:px-8">
                                <div class="inline-block min-w-full overflow-hidden rounded-lg shadow">
                                    <table id="classTable"
                                        class="min-w-full text-sm leading-normal text-left text-gray-500 table-auto dark:text-gray-400">
                                        <thead
                                            class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                            <tr>

                                                <th class="px-4 py-3">Alumno</th>

                                                <th class="px-4 py-3 text-right">Opciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            @if ($studentList->isEmpty())
                                                <tr class="col-span-3 text-center">
                                                    <td class="text-red-600">No hay registro de Alumnos para este Aula</td>
                                                    <td></td>
                                                </tr>
                                                <hr
                                                    class="h-0.5 mt-5 mx-auto border-t-2 border-opacity-100 border-gray-300">
                                            @else
                                                @foreach ($studentList as $student)
                                                    <tr class="border-b dark:border-gray-700 ">

                                                        <td class="px-4 py-3 max-w-[12rem] truncate">
                                                            {{ $student->user->name }} {{ $student->user->last_name_1 }}
                                                            {{ $student->user->last_name_2 }}
                                                        </td>

                                                        <td class="flex items-center justify-end px-4 py-3">


                                                            <a
                                                                href="{{ route('estudiante.discardClassroom', ['estudiante' => $student->user_id]) }}">
                                                                <svg class="w-7 h-7">
                                                                    <?xml version="1.0" ?><svg viewBox="0 0 32 32"
                                                                        xmlns="http://www.w3.org/2000/svg">
                                                                        <defs>
                                                                            <style>
                                                                                .cls-1 {
                                                                                    fill: none;
                                                                                }
                                                                            </style>
                                                                        </defs>
                                                                        <title />
                                                                        <g data-name="Layer 2" id="Layer_2">
                                                                            <path
                                                                                d="M16,29A13,13,0,1,1,29,16,13,13,0,0,1,16,29ZM16,5A11,11,0,1,0,27,16,11,11,0,0,0,16,5Z" />
                                                                            <path
                                                                                d="M11.76,21.24a1,1,0,0,1-.71-.29,1,1,0,0,1,0-1.41l8.49-8.49A1,1,0,0,1,21,12.46L12.46,21A1,1,0,0,1,11.76,21.24Z" />
                                                                            <path
                                                                                d="M20.24,21.24a1,1,0,0,1-.7-.29l-8.49-8.49a1,1,0,0,1,1.41-1.41L21,19.54A1,1,0,0,1,21,21,1,1,0,0,1,20.24,21.24Z" />
                                                                        </g>
                                                                        <g id="frame">
                                                                            <rect class="cls-1" height="32"
                                                                                width="32" />
                                                                        </g>
                                                                    </svg>
                                                                </svg>
                                                            </a>
                                                        </td>

                                                    </tr>
                                                @endforeach
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </main>
@endsection
