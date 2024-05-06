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
                    "responsive": true,
                    "autoWidth": false,
                    columnDefs: [{
                            targets: [7, 10, 11],
                            sortable: false,
                            searchable: false
                        },
                        {
                            targets: [0, ],
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
                    },
                    layout: {
                        topStart: null
                    },

                });
            }

            if ($('#estudiantesTable').length > 0) {
                $('#estudiantesTable').DataTable({
                    "order": [
                        [2, "desc"]
                    ],
                    // "responsive": true,
                    // "autoWidth": false,
                    columnDefs: [{
                            targets: [7, 11, 12],
                            sortable: false,
                            searchable: false
                        },
                        {
                            targets: [0, 9, ],
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
                    },
                    layout: {
                        topStart: null
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


@section('content')

    <div class="grid grid-cols-1 ml-4 mr-4 mt-14">
        <div class="">
            <div class="flex justify-between w-full ">

                <div class="flex flex-col items-center justify-between p-4 space-y-3 md:flex-row md:space-y-0 md:space-x-4">
                    <h1 class="text-3xl uppercase">Usuarios</h1>
                </div>
                <button
                    class="justify-end px-4 py-2 font-bold text-white rounded-md bg-blueLighterPersonal border-blueLighterPersonal hover:bg-blueLightPersonal">
                    <a href="{{ route('user.create') }}">Nuevo Usuario</a>
                </button>
            </div>
            {{-- TABLA DOCENTE --}}
            <div class="mx-3 mb-5">
                <span class="">{{ count($docentes) }} docentes</span>
                <hr class="h-0.5 mt-5 mx-auto border-t-2 border-opacity-100 border-black ">

            </div>
            <div
                class="items-center justify-center flex-1 block bg-white border-b border-gray-200 sm:flex dark:bg-gray-800 dark:border-gray-700">

                @if ($docentes->isEmpty())
                    <h3>No hay registros de Docentes</h3>
                @else
                    <table id="docentesTable"
                        class="min-w-full text-sm text-left text-gray-500 table-auto rtl:text-right dark:text-gray-400">
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
                                        @if ($docente->User->profile_photo_path)
                                            <img src="{{ $docente->User->profile_photo_path }}" alt="Foto de perfil"
                                                class="w-10 h-10 rounded-full">
                                        @else
                                            <div
                                                class="flex items-center justify-center w-10 h-10 text-gray-600 bg-gray-200 rounded-full">
                                                {{ strtoupper(substr($docente->User->name, 0, 1)) }}
                                            </div>
                                        @endif
                                    </td>
                                    <td class="px-2 py-1 whitespace-no-wrap border-b border-gray-200">
                                        {{ $docente->speciality }}
                                    </td>
                                    <td class="px-2 py-1 whitespace-no-wrap border-b border-gray-200">
                                        @if ($docente->Classroom->count() > 0)
                                            @foreach ($docente->Classroom as $aula)
                                                <div class="text-blue-500">{{ $aula->class_name }}</div></br>
                                            @endforeach
                                        @else
                                            <div class="text-red-500"> No hay aulas asignadas</div>
                                        @endif



                                    </td>

                                    <td><a class="px-2 py-2 font-bold text-white border rounded-md border-btnGreen bg-btnGreen hover:bg-greenPersonal"
                                            href="{{ route('user.edit', $docente->User->id) }}">Editar</a></td>

                                    <td>

                                        <button id="delete-btn"
                                            class="px-5 py-2 text-white rounded-md cursor-pointer bg-rose-500 hover:bg-rose-700"
                                            onclick="showDialog({{ $docente->User->id }})">
                                            Eliminar
                                        </button>
                                    </td>
                                    @include('user.modal.delete-modal', [
                                        'userId' => $docente->User->id,
                                    ])
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                @endif
            </div>


            {{-- TABLA ESTUDIANTES --}}
            <div class="mx-3 mt-5 mb-5">
                <span class="">{{ count($estudiantes) }} estudiantes</span>
                <hr class="h-0.5 mt-5 mx-auto border-t-2 border-opacity-100 border-black ">

            </div>
            <div
                class="items-center justify-center flex-1 block p-4 mt-4 bg-white border-b border-gray-200 sm:flex dark:bg-gray-800 dark:border-gray-700">

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
                                <th
                                    class="px-2 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                    Seguimiento
                                </th>
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
                                    @if ($estudiante->User->profile_photo_path)
                                        <img src="/storage/{{ $estudiante->User->profile_photo_path }}"
                                            alt="Foto de perfil" class="w-10 h-10 rounded-full">
                                    @else
                                        <div
                                            class="flex items-center justify-center w-10 h-10 text-gray-600 bg-gray-200 rounded-full">
                                            {{ strtoupper(substr($estudiante->User->name, 0, 1)) }}
                                        </div>
                                    @endif
                                </td>
                                <td class="px-2 py-4 whitespace-no-wrap border-b border-gray-200">
                                    {{ \Carbon\Carbon::parse($estudiante->date_of_birth)->format('d/m/Y') }}
                                </td>
                                <td class="px-2 py-4 break-all whitespace-no-wrap border-b border-gray-200">
                                    {{ $estudiante->history }}
                                </td>
                                <td class="px-2 py-4 whitespace-no-wrap border-b border-gray-200">

                                    @if ($estudiante->status === 'safe')
                                        <span
                                            class=" px-2 py-0.5 ml-auto text-xs text-center font-medium tracking-wide text-green-600 bg-green-200 rounded-full">Sin
                                            Incidencias</span>
                                    @elseif ($estudiante->status === 'caution')
                                        <span
                                            class=" px-2 py-0.5 ml-auto text-xs text-center font-medium tracking-wide text-yellow-600 bg-yellow-200 rounded-full">En
                                            Seguimiento</span>
                                    @elseif ($estudiante->status === 'warning')
                                        <span
                                            class=" px-2 py-0.5 ml-auto text-xs text-center font-medium tracking-wide text-red-600 bg-red-200 rounded-full">Prioritario</span>
                                    @else
                                        <span
                                            class=" px-2 py-0.5 ml-auto text-xs text-center font-medium tracking-wide text-green-600 bg-green-200 rounded-full">{{ $estudiante->status }}</span>
                                    @endif
                                </td>


                                @include('user.modal.delete-modal', ['userId' => $estudiante->User->id])
                                <td>
                                    <a class="px-4 py-2 font-bold text-white border rounded border-btnGreen bg-btnGreen hover:bg-greenPersonal"
                                        href="{{ route('user.edit', $estudiante->User->id) }}">Update</a>
                                </td>


                                <td>


                                    <button id="delete-btn-{{ $estudiante->User->id }}"
                                        class="px-5 py-2 text-white rounded-md cursor-pointer bg-rose-500 hover:bg-rose-700"
                                        onclick="showDialog({{ $estudiante->User->id }})">
                                        Eliminar
                                    </button>
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
