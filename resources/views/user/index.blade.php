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
            if ($('#docentesTable').length > 0) {
                $('#docentesTable').DataTable({
                    "order": [
                        [2, "desc"]
                    ],
                    columnDefs: [{
                            targets: [0, 4],
                            sortable: false,
                            searchable: false
                        },
                        {
                            targets: 7,
                            visible: false,
                        }
                    ],
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
                    }
                });
            }

            if ($('#estudiantesTable').length > 0) {
                $('#estudiantesTable').DataTable({
                    "order": [
                        [2, "desc"]
                    ],
                    columnDefs: [{
                            targets: [0, 4],
                            sortable: false,
                            searchable: false
                        },
                        {
                            targets: 7,
                            visible: false,
                        }
                    ],
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
                    }
                });
            }

        });
    </script>


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

@section('title', 'Usuarios')
@vite(['resources/css/app.css', 'resources/js/app.js'])
@vite('resources/js/modal-delete.js')

@section('content')

    <div class="grid grid-cols-1 ml-4 mr-4 mt-14">
        <div class="">
            <div class="flex justify-between w-full ">

                <div class="flex flex-col items-center justify-between p-4 space-y-3 md:flex-row md:space-y-0 md:space-x-4">
                    <h1 class="text-3xl uppercase">Usuarios</h1>
                </div>
                <button class="justify-end px-4 py-2 text-white bg-green-500">
                    <a href="{{ route('user.create') }}">Nuevo Usuario</a>
                </button>
            </div>
            {{-- TABLA DOCENTE --}}
            <div class="mx-3 mb-5">
                <span class="">{{ count($docentes) }} docentes</span>
                <hr class="h-0.5 mt-5 mx-auto border-t-2 border-opacity-100 border-black ">
                {{-- @include('activity.modal.deleteMultiple-modal') --}}
                {{-- <form action="{{ route('activity.deleteActivities') }}"
                    onsubmit="handleSubmit(event)" method="POST" id="form">
                    @csrf

                    <div
                        class="flex flex-col items-stretch justify-end flex-shrink-0 w-full mb-4 space-y-2 md:w-auto md:flex-row md:space-y-0 md:items-center md:space-x-3">

                        <button
                            class="flex items-center justify-center px-4 py-2 text-sm font-medium text-white bg-red-600 rounded-lg bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 focus:outline-none dark:focus:ring-primary-800"
                            type="submit" id="submitBtn"
                            onclick="showDeleteMultipleModal();event.preventDefault();">Eliminar
                            Seleccionadas
                            {{-- <input type="submit" value="Eliminar">
                        </button>
                    </div>
                </form> --}}
            </div>
            <div
                class="items-center justify-between block bg-white border-b border-gray-200 sm:flex dark:bg-gray-800 dark:border-gray-700">

                @if ($docentes->isEmpty())
                    <h3>No hay registros de Docentes</h3>
                @else
                    <table id="docentesTable"
                        class="table w-full text-sm text-left text-gray-500 rtl:text-right dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th
                                    class="px-2 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                    Id</th>
                                <th
                                    class="px-2 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                    Dni/Nie</th>
                                <th
                                    class="px-2 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                    Nombre</th>
                                <th
                                    class="px-2 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                    Primer Apellido</th>
                                <th
                                    class="px-2 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                    Segundo Apellido</th>
                                <th
                                    class="px-2 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                    Genero</th>
                                <th
                                    class="px-2 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                    Email</th>
                                <th
                                    class="px-2 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                    Foto Perfil</th>
                                <th
                                    class="px-2 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                    Especialidad</th>
                                <th
                                    class="px-2 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                    Clases</th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($docentes as $docente)
                                <tr>
                                    <td class="px-2 py-1 whitespace-no-wrap border-b border-gray-200">
                                        {{ $docente->User->id }}
                                    </td>
                                    <td class="px-2 py-1 whitespace-no-wrap border-b border-gray-200">
                                        {{ $docente->User->dni }}
                                    </td>
                                    <td class="px-2 py-1 whitespace-no-wrap border-b border-gray-200">
                                        {{ $docente->User->name }}
                                    </td>
                                    <td class="px-2 py-1 whitespace-no-wrap border-b border-gray-200">
                                        {{ $docente->User->last_name_1 }}
                                    </td>
                                    <td class="px-2 py-1 whitespace-no-wrap border-b border-gray-200">
                                        {{ $docente->User->last_name_2 }}
                                    </td>
                                    <td class="px-2 py-1 whitespace-no-wrap border-b border-gray-200">
                                        {{ $docente->User->gender }}
                                    </td>
                                    <td class="px-2 py-1 whitespace-no-wrap border-b border-gray-200">
                                        {{ $docente->User->email }}
                                    </td>
                                    <td class="px-2 py-1 whitespace-no-wrap border-b border-gray-200">
                                        {{ $docente->User->profile_photo }}
                                    </td>
                                    <td class="px-2 py-1 whitespace-no-wrap border-b border-gray-200">
                                        {{ $docente->speciality }}
                                    </td>
                                    <td class="px-2 py-1 whitespace-no-wrap border-b border-gray-200">

                                        @if (isset($classes))
                                            @if ($classes->contains('user_id', $docente->user_id))
                                                <?php
                                                $filtered = $classes->where('user_id', $docente->user_id);
                                                ?>
                                                @foreach ($filtered as $item)
                                                    <div class="text-blue-500">Aula: {{ $item->class_name }}</div></br>
                                                @endforeach
                                            @else
                                                <div class="text-red-500"> No hay aulas asignadas</div>
                                            @endif
                                        @endif

                                    </td>

                                    <td><a class="px-2 py-2 font-bold text-white bg-green-500 border border-green-700 rounded hover:bg-green-700"
                                            href="{{ route('user.edit', $docente->User->id) }}">Editar</a></td>

                                    {{-- PRUEBO CON EL MODAL --}}
                                    <td>
                                        <!-- This button is used to open the dialog -->
                                        <button id="delete-btn"
                                            class="px-5 py-2 text-white rounded-md cursor-pointer bg-rose-500 hover:bg-rose-700"
                                            onclick="showDialog({{ $docente->User->id }})">
                                            Eliminar
                                        </button>
                                    </td>
                                    @include('user.modal.delete-modal', ['userId' => $docente->User->id])
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    {{-- <script>
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
                    </script> --}}

                @endif
            </div>

            {{-- <hr class="h-0.5 mt-5 mx-auto border-t-2 border-opacity-100 border-black my-4"> --}}


            {{-- TABLA ESTUDIANTES --}}
            <div class="mx-3 mt-5 mb-5">
                <span class="">{{ count($estudiantes) }} estudiantes</span>
                <hr class="h-0.5 mt-5 mx-auto border-t-2 border-opacity-100 border-black ">
                {{-- @include('activity.modal.deleteMultiple-modal') --}}
                {{-- <form action="{{ route('activity.deleteActivities') }}"
                    onsubmit="handleSubmit(event)" method="POST" id="form">
                    @csrf

                    <div
                        class="flex flex-col items-stretch justify-end flex-shrink-0 w-full mb-4 space-y-2 md:w-auto md:flex-row md:space-y-0 md:items-center md:space-x-3">

                        <button
                            class="flex items-center justify-center px-4 py-2 text-sm font-medium text-white bg-red-600 rounded-lg bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 focus:outline-none dark:focus:ring-primary-800"
                            type="submit" id="submitBtn"
                            onclick="showDeleteMultipleModal();event.preventDefault();">Eliminar
                            Seleccionadas
                            {{-- <input type="submit" value="Eliminar">
                        </button>
                    </div>
                </form> --}}
            </div>
            <div
                class="items-center justify-between block p-4 mt-4 bg-white border-b border-gray-200 sm:flex dark:bg-gray-800 dark:border-gray-700">

                @if ($estudiantes->count() == 0)
                    <h3>No hay registros de Estudiante</h3>
                @else
                    <table id="estudiantesTable"
                        class="table w-full text-sm text-left text-gray-500 rtl:text-right dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th
                                    class="px-2 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                    Id</th>
                                <th
                                    class="px-2 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                    Dni/Nie</th>
                                <th
                                    class="px-2 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                    Nombre</th>
                                <th
                                    class="px-2 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                    Primer Apellido</th>
                                <th
                                    class="px-2 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                    Segundo Apellido</th>
                                <th
                                    class="px-2 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                    Genero</th>
                                <th
                                    class="px-2 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                    Email</th>
                                <th
                                    class="px-2 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                    Foto Perfil</th>
                                <th
                                    class="px-2 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                    Fecha Nacimiento</th>
                                <th
                                    class="px-2 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                    Biografia</th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        </tbody>
                        @foreach ($estudiantes as $estudiante)
                            <tr>
                                <td class="px-2 py-4 whitespace-no-wrap border-b border-gray-200">
                                    {{ $estudiante->User->id }}
                                </td>
                                <td class="px-2 py-4 whitespace-no-wrap border-b border-gray-200">
                                    {{ $estudiante->User->dni }}
                                </td>
                                <td class="px-2 py-4 whitespace-no-wrap border-b border-gray-200">
                                    {{ $estudiante->User->name }}
                                </td>
                                <td class="px-2 py-4 whitespace-no-wrap border-b border-gray-200">
                                    {{ $estudiante->User->last_name_1 }}
                                </td>
                                <td class="px-2 py-4 whitespace-no-wrap border-b border-gray-200">
                                    {{ $estudiante->User->last_name_2 }}
                                </td>
                                <td class="px-2 py-4 whitespace-no-wrap border-b border-gray-200">
                                    {{ $estudiante->User->gender }}
                                </td>
                                <td class="px-2 py-4 whitespace-no-wrap border-b border-gray-200">
                                    {{ $estudiante->User->email }}
                                </td>
                                <td class="px-2 py-4 whitespace-no-wrap border-b border-gray-200">
                                    {{ $estudiante->User->profile_photo }}</td>
                                <td class="px-2 py-4 whitespace-no-wrap border-b border-gray-200">
                                    {{ $estudiante->date_of_birth }}
                                </td>
                                <td class="px-2 py-4 whitespace-no-wrap border-b border-gray-200">
                                    {{ $estudiante->history }}
                                </td>

                                <td>
                                    {{-- <form action="{{ route('user.destroy', $estudiante->User->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <input type="submit" value="Delete"
                                            class="px-4 py-2 font-bold text-white bg-red-500 border border-red-700 rounded hover:bg-red-700">
                                    </form> --}}

                                    <button id="delete-btn-{{ $estudiante->User->id }}"
                                        class="px-5 py-2 text-white rounded-md cursor-pointer bg-rose-500 hover:bg-rose-700"
                                        onclick="showDialog({{ $estudiante->User->id }})">
                                        Eliminar
                                    </button>
                                </td>
                                @include('user.modal.delete-modal', ['userId' => $estudiante->User->id])
                                <td>
                                    <a class="px-4 py-2 font-bold text-white bg-green-500 border border-green-700 rounded hover:bg-green-700"
                                        href="{{ route('user.edit', $estudiante->User->id) }}">Update</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                @endif
            </div>
        </div>
    </div>

@endsection
