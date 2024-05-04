@extends('layout.template-adminDashboard')

@section('css')
    {{-- Datatables --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.3/css/dataTables.tailwindcss.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.3/css/dataTables.dataTables.css" />

@endsection

@section('js')

    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
        crossorigin="anonymous"></script>

    {{-- Datatables --}}
    <script src="https://cdn.datatables.net/2.0.3/js/dataTables.js"></script>
    <script>
        $(document).ready(function() {
            $('#classroomsTable').DataTable({
                "order": [
                    [1, "asc"]
                ],
                columnDefs: [{
                    targets: [0, 3],
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

@endsection

@section('title', 'Admin Gestion Aulas')
@vite(['resources/css/app.css', 'resources/js/app.js'])
@vite('resources/js/modal-delete.js')

@section('content')

    <div class="grid grid-cols-1 ml-4 mr-4 mt-14">
        {{-- TABLA CLASSROOM --}}
        {{-- <div class="md:min-h-96 p-4 bg-white sm:flex  border-b border-gray-200 lg:mt-1.5 dark:bg-gray-800 dark:border-gray-700"> --}}
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
                        <h1 class="text-3xl uppercase">Clases</h1>
                    </div>
                    <div class="relative overflow-hidden bg-white shadow-md dark:bg-gray-800 sm:rounded-lg">
                        <div
                            class="flex flex-col items-center justify-end p-4 space-y-3 md:flex-row md:space-y-0 md:space-x-4">
                            <div class="w-full">



                                @if ($classes->isEmpty())
                                    <h3 class="text-red-600">No hay registros de Aulas</h3>
                                    <a href="{{ route('classroom.create') }}">
                                        <button id="createActivity"
                                            class="justify-end px-4 py-2 font-bold text-white rounded-md bg-blueLighterPersonal border-blueLighterPersonal hover:bg-blueLightPersonal">Añadir
                                            Clase</button>
                                    </a>
                                @else
                                    <div
                                        class="flex flex-col items-stretch flex-shrink-0 w-full space-y-2 md:justify-end md:w-auto md:flex-row md:space-y-0 md:items-center md:space-x-3">
                                        <a class="" href="{{ route('classroom.create') }}">
                                            <button type="button" id="createActivity"
                                                class="justify-end px-4 py-2 font-bold text-white rounded-md bg-blueLighterPersonal border-blueLighterPersonal hover:bg-blueLightPersonal">
                                                Añadir Clase
                                            </button>
                                        </a>
                                    </div>

                                    <div class="mx-3 mb-5">
                                        <span class="">{{ count($classes) }} clases</span>
                                        <hr class="h-0.5 mt-5 mx-auto border-t-2 border-opacity-100 border-black ">
                                    </div>



                                    <div class="mx-3 mb-5 data-table-container">
                                        <div class="px-4 py-4 -mx-4 overflow-x-auto sm:-mx-8 sm:px-8">
                                            <div class="inline-block min-w-full overflow-hidden rounded-lg shadow">

                                                <table id="classroomsTable" class="table w-full text-left">
                                                    <thead>
                                                        <tr>
                                                            <th
                                                                class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                                                Id</th>
                                                            <th
                                                                class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                                                Class Name</th>
                                                            <th
                                                                class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                                                Tutor</th>

                                                            <th
                                                                class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                                                Alumnos</th>
                                                            <th
                                                                class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                                            </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody class="">
                                                        @foreach ($classes as $class)
                                                            <tr class="">
                                                                <td
                                                                    class="px-6 py-4 leading-4 whitespace-no-wrap border-b border-gray-200">
                                                                    {{ $class->id }}
                                                                </td>
                                                                <td
                                                                    class="px-6 py-4 leading-4 whitespace-no-wrap border-b border-gray-200">
                                                                    {{ $class->class_name }}</td>
                                                                <td
                                                                    class="px-6 py-4 leading-4 whitespace-no-wrap border-b border-gray-200">
                                                                    {{ $class->Docente->User->name }}
                                                                    {{ $class->Docente->User->last_name_1 }}</td>
                                                                <td>{{ count($class->estudiante) }}</td>
                                                                <td class="leading-4 text-right">

                                                                    <a class="px-2 py-2 font-bold text-white border rounded-md border-btnGreen bg-btnGreen hover:bg-greenPersonal"
                                                                        href="{{ route('classroom.classroomStudents', $class->id) }}">Alumn@s</a>

                                                                    <a class="px-2 py-2 font-bold text-white border rounded-md border-btnGreen bg-btnGreen hover:bg-greenPersonal"
                                                                        href="{{ route('classroom.edit', $class->id) }}">Editar</a>
                                                                    {{-- PRUEBO CON EL MODAL --}}

                                                                    <!-- This button is used to open the dialog -->
                                                                    <button id="delete-btn"
                                                                        class="px-5 py-2 text-white rounded-md cursor-pointer bg-rose-500 hover:bg-rose-700"
                                                                        onclick="showDialog({{ $class->id }})">
                                                                        Eliminar
                                                                    </button>
                                                                </td>
                                                                @include('classroom.modal.delete-modal')
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>

                                            </div>
                                        </div>
                                    </div>

                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>

    <script>
        function showDialog(id) {
            let dialog = document.getElementById('dialog-' + id);
            dialog.classList.remove('hidden');
            setTimeout(() => {
                dialog.classList.remove('opacity-0');
            }, 20);
        }

        function hideDialog(id) {
            let dialog = document.getElementById('dialog-' + id);
            dialog.classList.add('opacity-0');
            setTimeout(() => {
                dialog.classList.add('hidden');
            }, 500);
        }
    </script>

@endsection
