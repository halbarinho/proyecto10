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
            $('#activitiesTable').DataTable({
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
    @if ($categories->isNotEmpty())
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
    @endif

@endsection

@section('title', 'Categorías')
@vite(['resources/css/app.css', 'resources/js/app.js'])


@section('content')

    <div class="grid grid-cols-1 ml-4 mr-4 mt-14">


        <div class="container py-4 mx-auto">
            {{-- INCLUYO MENSAJES DE ERROR --}}
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li class="text-sm text-red-600">{{ $error }}</li>
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
                        <h1 class="text-3xl uppercase">Categorías</h1>
                    </div>
                    <div class="relative overflow-hidden bg-white shadow-md dark:bg-gray-800 sm:rounded-lg">
                        <div
                            class="flex flex-col items-center justify-end p-4 space-y-3 md:flex-row md:space-y-0 md:space-x-4">
                            <div class="w-full">


                                @if ($categories->isEmpty())
                                    <h3 class="text-sm text-red-600">No hay registros de Categorías</h3>
                                    <a href="{{ route('category.create') }}">
                                        <button id="createActivity"
                                            class="justify-end px-4 py-2 font-bold text-white rounded-md bg-blueLighterPersonal border-blueLighterPersonal hover:bg-blueLightPersonal">Crear
                                            Nueva
                                            Categoria</button>
                                    </a>
                                @else
                                    <div
                                        class="flex flex-col items-stretch flex-shrink-0 w-full space-y-2 md:justify-end md:w-auto md:flex-row md:space-y-0 md:items-center md:space-x-3">
                                        <a class="" href="{{ route('category.create') }}">
                                            <button type="button" id="createActivity"
                                                class="justify-end px-4 py-2 font-bold text-white rounded-md bg-blueLighterPersonal border-blueLighterPersonal hover:bg-blueLightPersonal">
                                                Añadir Categoría
                                            </button>
                                        </a>
                                    </div>

                                    {{-- ELIMINAR MULTIPLES CATEGORIAS A LA VEZ --}}

                                    <div class="mx-3 mb-5">
                                        <span class="">{{ count($categories) }} categorías</span>
                                        <hr class="h-0.5 mt-5 mx-auto border-t-2 border-opacity-100 border-black ">

                                    </div>
                                    {{-- FIN ELIMINAR MULTIPLES CATEGORIAS A LA VEZ --}}


                                    <div class="mx-3 mb-5 data-table-container">
                                        <div class="px-4 py-4 -mx-4 overflow-x-auto sm:-mx-8 sm:px-8">
                                            <div class="inline-block min-w-full overflow-hidden rounded-lg shadow">
                                                <table id="activitiesTable" class="table">
                                                    <thead>
                                                        <tr>
                                                            <th
                                                                class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                                                Id</th>
                                                            <th
                                                                class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                                                Category Name</th>
                                                            <th
                                                                class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                                                Description</th>
                                                            <th></th>
                                                        </tr>
                                                    </thead>

                                                    @foreach ($categories as $category)
                                                        <tr>
                                                            <td
                                                                class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                                                {{ $category->id }}</td>
                                                            <td
                                                                class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                                                {{ $category->name }}</td>
                                                            <td
                                                                class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                                                {{ $category->description }}</td>

                                                            <td class="text-right"><a
                                                                    class="px-2 py-2 font-bold text-white border rounded-md border-btnGreen bg-btnGreen hover:bg-greenPersonal"
                                                                    href="{{ route('category.edit', $category->id) }}">Editar</a>

                                                                <button id="delete-btn"
                                                                    class="px-5 py-2 text-white rounded-md cursor-pointer bg-rose-500 hover:bg-rose-700"
                                                                    onclick="showDialog({{ $category->id }})">
                                                                    Eliminar
                                                                </button>
                                                            </td>
                                                            @include('category.modal.delete-modal')
                                                        </tr>
                                                    @endforeach
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

@endsection
