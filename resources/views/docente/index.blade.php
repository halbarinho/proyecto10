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

        });
    </script>

    <script src="{{ asset('js/showHideDialog.js') }}"></script>
    <script>
        function deleteUser() {

            const dialog = document.getElementById('dialog');
            const id = dialog.dataset.id;

            fetch(`/user/${id}`, {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Content-Type': 'application/json'
                    },
                })
                .then(response => {

                    // Recarga la página
                    location.reload(); // O cualquier otra acción necesaria
                })
                .catch(error => {
                    console.error('Ha habido un error al intentar eliminar al usuario:', error);
                });
        }
    </script>

@endsection

@section('title', 'Docentes')
@vite(['resources/css/app.css', 'resources/js/app.js'])


@section('content')

    <div class="grid grid-cols-1 ml-4 mr-4 mt-14">
        <div class="">
            <div class="flex justify-between w-full ">

                <div class="flex flex-col items-center justify-between p-4 space-y-3 md:flex-row md:space-y-0 md:space-x-4">
                    <h1 class="text-3xl uppercase">Docentes</h1>
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
                                    {{-- @include('user.modal.delete-modal', [
                                        'userId' => $docente->User->id,
                                    ]) --}}
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @include('user.modal.delete-modal')
                @endif
            </div>
        </div>
    </div>

@endsection
