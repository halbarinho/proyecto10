@extends('layout.template-dashboard')

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
                }
            });
        });
    </script>

@endsection

@section('title', 'Admin Gestion Aulas')
@vite(['resources/css/app.css', 'resources/js/app.js'])


@section('content')

    <div class="grid grid-cols-1 ml-4 mr-4 mt-14">
        {{-- TABLA CLASSROOM --}}

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
                <section>
                    <div class="max-w-screen-xl px-4 mx-auto lg:px-12">

                        <div
                            class="flex flex-col items-center justify-between p-4 space-y-3 md:flex-row md:space-y-0 md:space-x-4">
                            <h1 class="text-3xl uppercase">Aulas</h1>
                        </div>

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
                                        <td class="px-6 py-4 leading-4 whitespace-no-wrap border-b border-gray-200">
                                            {{ $class->id }}
                                        </td>
                                        <td class="px-6 py-4 leading-4 whitespace-no-wrap border-b border-gray-200">
                                            {{ $class->class_name }}</td>
                                        <td class="px-6 py-4 leading-4 whitespace-no-wrap border-b border-gray-200">
                                            {{ $class->Docente->User->name }} {{ $class->Docente->User->last_name_1 }}</td>
                                        <td>ICONO ALUMNOS</td>
                                        <td class="leading-4 text-right">
                                            <a class="px-4 py-2 font-bold text-white bg-green-500 border border-green-700 rounded hover:bg-green-700"
                                                href="{{ route('classroom.edit', $class->id) }}">Editar</a>

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


                    </div>
                </section>
            @endif
        </div>



        </main>
    @endsection
