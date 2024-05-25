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
            $('#activitiesTable').DataTable({
                "order": [
                    [4, "desc"]
                ],
                columnDefs: [{
                    targets: [3, ],
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
                },
            });
        });
    </script>

@endsection

@section('title', 'Listado Actividades')

@vite(['resources/js/app.js'])

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
                <div class="">
                    <span class="p-1 text-white rounded-md bg-greenPersonal">{{ session('success') }}</span>
                </div>
            @endif




            <section class="p-3 antialiased bg-gray-50 dark:bg-gray-900 sm:p-5">
                <div class="max-w-screen-xl px-4 mx-auto lg:px-12">
                    <div
                        class="flex flex-col items-center justify-between p-4 space-y-3 md:flex-row md:space-y-0 md:space-x-4">
                        <h1 class="text-3xl uppercase">Actividades</h1>
                    </div>
                    <div class="relative overflow-hidden bg-white shadow-md dark:bg-gray-800 sm:rounded-lg">
                        <div
                            class="flex flex-col items-center justify-end p-4 space-y-3 md:flex-row md:space-y-0 md:space-x-4">
                            <div class="w-full">

                                @if ($activities->isEmpty())
                                    <div class="flex justify-between w-full mx-auto">
                                        <h3 class="text-red-600">No hay registros de Actividades</h3>
                                        <a href="{{ route('welcome') }}">
                                            <button id="createActivity"
                                                class="px-5 py-2 text-white rounded-md cursor-pointer bg-rose-500 hover:bg-rose-700">Regresar</button>
                                        </a>
                                    </div>
                                @else
                                    <div
                                        class="flex flex-col items-stretch flex-shrink-0 w-full space-y-2 md:justify-end md:w-auto md:flex-row md:space-y-0 md:items-center md:space-x-3">
                                    </div>


                                    <div class="mx-3 mb-5">
                                        <span class="">{{ count($activities) }} actividades</span>
                                        <hr class="h-0.5 mt-5 mx-auto border-t-2 border-opacity-100 border-black ">

                                        <div class="mx-3 mb-5 data-table-container">
                                            <div class="px-4 py-4 -mx-4 overflow-x-auto sm:-mx-8 sm:px-8">
                                                <div class="inline-block min-w-full overflow-hidden rounded-lg shadow">
                                                    <table id="activitiesTable"
                                                        class="min-w-full text-sm leading-normal text-left text-gray-500 table-auto dark:text-gray-400">
                                                        <thead
                                                            class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                                            <tr>

                                                                <th class="">Título</th>
                                                                <th class="">Descripción</th>
                                                                <th class="">Creador</th>
                                                                <th class="text-right "></th>
                                                                <th></th>

                                                            </tr>
                                                        </thead>
                                                        <tbody>

                                                            @foreach ($activities as $item)
                                                                <tr class="border-b dark:border-gray-700 ">

                                                                    <td class=" max-w-[12rem] truncate">

                                                                        {{ $item->activity->activity_name }}
                                                                    </td>
                                                                    <td class=" truncate max-w-[6rem] text-ellipsis">

                                                                        {{ $item->activity->activity_description }}
                                                                    </td>
                                                                    <td class=" max-w-[12rem] truncate">

                                                                        {{ $item->activity->docente->user->name }}
                                                                    </td>

                                                                    {{-- Editar --}}

                                                                    @if ($item->status == 'pending')
                                                                        <td class="max-w-9 max-h-9">
                                                                            <a href="{{ route('activityQuestion.makeActivity', [Auth::user()->id, $item->activity->id]) }}"
                                                                                class="col-span-1 w-9 h-9">
                                                                                <svg viewBox="0 0 24 24"
                                                                                    class="ml-auto w-9 h-9"
                                                                                    xmlns="http://www.w3.org/2000/svg"
                                                                                    fill="none" stroke="currentColor"
                                                                                    stroke-width="2" stroke-linecap="round"
                                                                                    stroke-linejoin="round">
                                                                                    <path
                                                                                        d=" M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                2 0 0 0 2-2v-7" />
                                                                                    <path
                                                                                        d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z" />
                                                                                </svg>
                                                                            </a>
                                                                        </td>
                                                                        <td class="text-right">
                                                                            <span
                                                                                class=" px-2 py-0.5 ml-auto text-xs text-center font-medium tracking-wide text-green-600 bg-green-200 rounded-full">Pendiente</span>
                                                                        </td>
                                                                    @else
                                                                        <td class=" max-w-9 max-h-9">

                                                                            <svg viewBox="0 0 24 24"
                                                                                class="col-span-1 ml-auto text-gray-300 w-9 h-9"
                                                                                xmlns="http://www.w3.org/2000/svg"
                                                                                fill="none" stroke="currentColor"
                                                                                stroke-width="2" stroke-linecap="round"
                                                                                stroke-linejoin="round">
                                                                                <path
                                                                                    d=" M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        2 0 0 0 2-2v-7" />
                                                                                <path
                                                                                    d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z" />
                                                                            </svg>

                                                                        </td>
                                                                        <td class="text-right">
                                                                            <span
                                                                                class=" px-2 py-0.5 ml-auto text-xs font-medium tracking-wide text-red-600 bg-red-200 rounded-full text-center">Completada</span>
                                                                        </td>
                                                                    @endif

                                                                </tr>
                                                            @endforeach

                                                        </tbody>
                                                    </table>
                                                </div>
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
    </main>

@endsection
