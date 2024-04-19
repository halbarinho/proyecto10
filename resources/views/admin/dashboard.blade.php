@extends('layout.template-adminDashboard')


@section('title', 'Panel Administrador')

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
                        [0, "asc"]
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
                        topStart: null,
                        topEnd: null,
                        // bottomStart: null,
                        // bottomEnd: null,
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

            // if ($('#classTable').length > 0) {
            //     $('#classTable').DataTable({
            //         "order": [
            //             [2, "desc"]
            //         ],
            //         columnDefs: [{
            //                 targets: [0, 4],
            //                 sortable: false,
            //                 searchable: false
            //             },
            //             {
            //                 // targets: 7,
            //                 // visible: false,
            //             }
            //         ],
            //         language: {
            //             "decimal": "",
            //             "emptyTable": "No hay datos",
            //             "info": "Mostrando _START_ a _END_ de _TOTAL_ registros",
            //             "infoEmpty": "Mostrando 0 a 0 de 0 registros",
            //             "infoFiltered": "(Filtro de _MAX_ total registros)",
            //             "infoPostFix": "",
            //             "thousands": ",",
            //             "lengthMenu": "Mostrar _MENU_ registros",
            //             "loadingRecords": "Cargando...",
            //             "processing": "Procesando...",
            //             "search": "Buscar:",
            //             "zeroRecords": "No se encontraron coincidencias",
            //             "paginate": {
            //                 "first": "Primero",
            //                 "last": "Ultimo",
            //                 "next": "Próximo",
            //                 "previous": "Anterior"
            //             },
            //             "aria": {
            //                 "sortAscending": ": Activar orden de columna ascendente",
            //                 "sortDescending": ": Activar orden de columna desendente"
            //             }
            //         }
            //     });
            // }

        });
    </script>


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

@endsection




@section('content')
    <!-- Cards Top -->
    <div class="grid grid-cols-1 gap-4 p-4 sm:grid-cols-2 lg:grid-cols-4">
        <div
            class="flex items-center justify-between p-3 font-medium text-white bg-blue-500 border-b-4 border-blue-600 rounded-md shadow-lg dark:bg-gray-800 dark:border-gray-600 group">
            <div
                class="flex items-center justify-center transition-all duration-300 transform bg-white rounded-full w-14 h-14 group-hover:rotate-12">
                <svg width="30" height="30" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                    class="text-blue-800 transition-transform duration-500 ease-in-out transform stroke-current dark:text-gray-800">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z">
                    </path>
                </svg>
            </div>
            <div class="text-right">
                <p class="text-2xl">{{ count($docentes) }}</p>
                <p>Docentes</p>
            </div>
        </div>
        <div
            class="flex items-center justify-between p-3 font-medium text-white bg-blue-500 border-b-4 border-blue-600 rounded-md shadow-lg dark:bg-gray-800 dark:border-gray-600 group">
            <div
                class="flex items-center justify-center transition-all duration-300 transform bg-white rounded-full w-14 h-14 group-hover:rotate-12">

                <svg version="1" xmlns="http://www.w3.org/2000/svg" fill="none" width="30" height="30"
                    viewBox="0 0 300 262" stroke="currentColor"
                    class="text-blue-800 transition-transform duration-500 ease-in-out transform stroke-current dark:text-gray-800">
                    <g fill="#1565c0">
                        <path stroke-width="2"
                            d="M145.5.6c-1.1.3-29.4 6.9-63 14.6C49 22.9 20 29.7 18.1 30.3c-4.9 1.7-12.6 9-15.2 14.5-5.1 10.4-1.8 24.9 7.4 32.7 4.4 3.8 10 5.8 26.9 9.6l9.7 2.1.3 43.7.3 43.6 2.8 5.4c8.2 15.6 29 25.9 61.7 30.8 16.5 2.5 59.9 2.4 76-.1 33.8-5.3 53.9-15.5 61.7-31.4l2.8-5.7.3-43.2.3-43.1 11.7-2.7c14.8-3.3 19.3-4.9 24.5-8.9 8.4-6.4 12.2-20.8 8.2-31.3-2.4-6.2-8.4-12.6-14.3-15.1C278.2 29.1 159 1.3 151.8.6c-2.4-.3-5.2-.2-6.3 0zM213 33.1c37.6 8.6 62.5 14.8 64 15.8 4.9 3.6 4.9 11.8-.1 15-1.2.7-30.2 7.7-64.5 15.7L150 94 89.3 80c-33.5-7.7-61.9-14.2-63.1-14.5-6.6-1.6-9.3-10-4.9-15.1 2.2-2.6 6.6-3.7 63.8-17 33.8-7.8 62.5-14.2 63.9-14.3 1.3-.1 30.1 6.2 64 14zM106.5 103c21.4 4.9 40.8 9 43.1 9 2.3 0 21.8-4.1 43.3-9 21.6-5 39.6-9 40.2-9 .5 0 .9 14.8.9 38.4 0 38.2 0 38.3-2.2 41.2-3.6 4.6-5.8 6.2-14.5 10.5-9.9 4.8-26.8 9.3-42 10.9-14.9 1.7-49.5.8-62.3-1.5-19.1-3.5-35.7-10.2-43-17.5l-4-4v-39c0-21.5.4-39 .8-39 .5 0 18.3 4 39.7 9z" />
                        <path stroke-width="2"
                            d="M275 95.8c-1.2 1-2.5 3.5-2.9 5.7-.5 3-.7 76.7-.2 87.8.1 1 1.2 2.9 2.6 4.2 3.5 3.6 8.8 3.4 12.6-.4l2.9-2.9V99.8l-2.9-2.9c-3.5-3.4-8.6-3.9-12.1-1.1zm.6 112.3c-5.1 4-11.6 19.7-13.2 31.5-1.3 10 3.9 18.3 13.1 20.9 8.5 2.5 16.8-.8 21.2-8.3 2.3-3.9 2.5-5.1 2-12-.3-4.9-1.6-10.7-3.5-15.9-6-16.4-12.5-21.7-19.6-16.2z" />
                    </g>
                </svg>

                {{-- <svg width="30" height="30" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                    class="text-blue-800 transition-transform duration-500 ease-in-out transform stroke-current dark:text-gray-800">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                </svg> --}}
            </div>
            <div class="text-right">
                <p class="text-2xl">{{ count($estudiantes) }}</p>
                <p>Estudiantes</p>
            </div>
        </div>
        <div
            class="flex items-center justify-between p-3 font-medium text-white bg-blue-500 border-b-4 border-blue-600 rounded-md shadow-lg dark:bg-gray-800 dark:border-gray-600 group">
            <div
                class="flex items-center justify-center transition-all duration-300 transform bg-white rounded-full w-14 h-14 group-hover:rotate-12">
                {{-- <svg width="30" height="30" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                    class="text-blue-800 transition-transform duration-500 ease-in-out transform stroke-current dark:text-gray-800">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                </svg> --}}

                <svg width="30" height="30" fill="#1565c0" id="Layer_1" version="1.1" viewBox="0 0 128 128"
                    stroke-linecap="round" stroke-linejoin="round" stroke-width="3" stroke="#1565c0" xml:space="preserve"
                    xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                    class="text-blue-800 transition-transform duration-500 ease-in-out transform dark:text-gray-800">
                    <g>
                        <path
                            d="M103.98,24.84c0.8,0,1.59-0.31,2.18-0.94l3.07-3.25c1.14-1.2,1.09-3.1-0.12-4.24c-1.2-1.14-3.1-1.09-4.24,0.12l-3.07,3.25   c-1.14,1.2-1.09,3.1,0.12,4.24C102.5,24.57,103.24,24.84,103.98,24.84z" />
                        <path
                            d="M102.16,50.18c1.73,4.74,3.03,9.52,3.88,14.21c0.26,1.45,1.52,2.47,2.95,2.47c0.18,0,0.36-0.02,0.54-0.05   c1.63-0.29,2.71-1.85,2.42-3.48c-0.74-4.09-1.81-8.23-3.17-12.36l13.59-4.95c1.56-0.57,2.36-2.29,1.79-3.85   c-0.57-1.56-2.29-2.36-3.85-1.79c0,0-16.29,5.93-16.35,5.95C102.4,46.9,101.6,48.62,102.16,50.18z" />
                        <path
                            d="M89.14,43.63c-3.63-1.69-7.7-1.87-11.47-0.5c-0.16,0.06-0.31,0.13-0.46,0.21c-0.16,0.03-0.32,0.07-0.48,0.13   c-1.5,0.55-4.09,2.21-4.58,7.22c-0.29,2.94,0.24,6.45,1.48,9.87c2.56,7.02,7.07,11.46,11.32,11.46c0.69,0,1.38-0.12,2.04-0.36   l0.94-0.34c3.77-1.37,6.77-4.12,8.46-7.76s1.87-7.7,0.5-11.47C95.53,48.33,92.77,45.32,89.14,43.63z" />
                        <path
                            d="M123.35,78.3l-19.48-6.74c-1.57-0.54-3.27,0.29-3.82,1.85c-0.54,1.57,0.29,3.27,1.85,3.82l5.17,1.79   c-0.51,9.03-3.45,15.32-8.03,16.99c-4.22,1.53-9.95-0.83-15.74-6.49c-6.43-6.28-12.15-15.74-16.11-26.62s-5.66-21.8-4.77-30.74   c0.79-8.05,3.67-13.55,7.88-15.09c7.4-2.69,18.7,6.52,26.87,21.89c0.78,1.46,2.6,2.02,4.06,1.24c1.46-0.78,2.02-2.59,1.24-4.06   c-9.9-18.63-23.65-28.56-34.22-24.72c-4.72,1.72-8.21,5.91-10.19,12.06L19.77,66.01c-3.8,4.21-4.9,9.91-2.96,15.23   c1.94,5.33,6.45,8.98,12.06,9.77L32,91.45V119c0,4.41,3.59,8,8,8h20c4.41,0,8-3.59,8-8v-14.61c0-1.66-1.34-3-3-3s-3,1.34-3,3V119   c0,1.1-0.9,2-2,2H40c-1.1,0-2-0.9-2-2V92.29l47.53,6.66c3.7,2.33,7.35,3.53,10.78,3.53c1.65,0,3.25-0.28,4.79-0.83   c6.66-2.42,10.87-9.85,11.84-20.6l8.45,2.93c0.33,0.11,0.66,0.17,0.98,0.17c1.24,0,2.41-0.78,2.83-2.02   C125.75,80.55,124.92,78.84,123.35,78.3z M38,86.23l-6-0.84V76c0-1.66,1.34-3,3-3s3,1.34,3,3V86.23z" />
                    </g>
                </svg>

            </div>
            <div class="text-right">
                <p class="text-2xl">{{ count($alertas) }}</p>
                <p>Alertas</p>
            </div>
        </div>
        <div
            class="flex items-center justify-between p-3 font-medium text-white bg-blue-500 border-b-4 border-blue-600 rounded-md shadow-lg dark:bg-gray-800 dark:border-gray-600 group">
            <div
                class="flex items-center justify-center transition-all duration-300 transform bg-white rounded-full w-14 h-14 group-hover:rotate-12">
                {{-- <svg width="30" height="30" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                    class="text-blue-800 transition-transform duration-500 ease-in-out transform stroke-current dark:text-gray-800"> --}}

                <svg id="Outline" viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                    stroke-linecap="round" stroke-linejoin="round" stroke-width="4" stroke="#1565c0">
                    <defs>
                        <style>
                            .cls-1 {
                                fill: #1565c0;
                            }
                        </style>
                    </defs>
                    <path class="cls-1"
                        d="M326.82,71.53a11.79,11.79,0,0,0-1.69.14,24.79,24.79,0,0,0-24.62-22.14H128.2a24.79,24.79,0,0,0-24.6,22c-27.76.75-50.09,20.91-50.09,45.62V419c0,25.17,23.18,45.65,51.67,45.65H326.82c28.49,0,51.67-20.48,51.67-45.65V117.18C378.49,92,355.31,71.53,326.82,71.53Zm-200.7,2.75a2.08,2.08,0,0,1,2.08-2.08H300.51a2.08,2.08,0,0,1,2.08,2.08V93.43a2.08,2.08,0,0,1-2.08,2.08H128.2a2.08,2.08,0,0,1-2.08-2.08ZM355.81,419c0,12.66-13,23-29,23H105.18c-16,0-29-10.31-29-23V117.18C76.19,105,88.28,95,103.47,94.25a24.77,24.77,0,0,0,24.73,23.94H300.51a24.77,24.77,0,0,0,24.74-24.1,11.73,11.73,0,0,0,1.57.12c16,0,29,10.3,29,23Z" />
                    <path class="cls-1"
                        d="M449.87,82.21H402.15a11.34,11.34,0,0,0-11.34,11.33V326.35a205,205,0,0,0,23.31,94.73L416,424.6a11.34,11.34,0,0,0,20.09,0l1.85-3.52a205,205,0,0,0,23.31-94.73V93.54A11.34,11.34,0,0,0,449.87,82.21ZM426,392.56a182.47,182.47,0,0,1-12.07-53.5h24.14A182.79,182.79,0,0,1,426,392.56Zm12.52-76.18h-25V104.88h25Z" />
                    <path class="cls-1"
                        d="M191.59,133.75H132.5a11.34,11.34,0,0,0-11.34,11.33v59.1a11.34,11.34,0,0,0,11.34,11.34h59.09a11.34,11.34,0,0,0,11.34-11.34v-59.1A11.33,11.33,0,0,0,191.59,133.75Zm-11.33,59.09H143.84V156.42h36.42Z" />
                    <path class="cls-1"
                        d="M191.59,239.83H132.5a11.34,11.34,0,0,0-11.34,11.34v59.09A11.34,11.34,0,0,0,132.5,321.6h59.09a11.33,11.33,0,0,0,11.34-11.34V251.17A11.34,11.34,0,0,0,191.59,239.83Zm-11.33,59.1H143.84V262.51h36.42Z" />
                    <path class="cls-1"
                        d="M298.22,163.81H240a11.34,11.34,0,1,0,0,22.67h58.21a11.34,11.34,0,1,0,0-22.67Z" />
                    <path class="cls-1"
                        d="M298.22,269.38H240a11.34,11.34,0,1,0,0,22.68h58.21a11.34,11.34,0,0,0,0-22.68Z" />
                    <path class="cls-1"
                        d="M191.59,345.92H132.5a11.34,11.34,0,0,0-11.34,11.33v59.1a11.34,11.34,0,0,0,11.34,11.34h59.09a11.34,11.34,0,0,0,11.34-11.34v-59.1A11.33,11.33,0,0,0,191.59,345.92ZM180.26,405H143.84V368.59h36.42Z" />
                    <path class="cls-1"
                        d="M298.22,375.46H240a11.34,11.34,0,0,0,0,22.68h58.21a11.34,11.34,0,0,0,0-22.68Z" />
                </svg>
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                </path>
                </svg>
            </div>
            <div class="text-right">
                <p class="text-2xl">{{ count($actividades) }}</p>
                <p>Actividades</p>
            </div>
        </div>
    </div>
    <!-- ./Top Cards -->

    <div class="grid grid-cols-1 gap-4 p-4 lg:grid-cols-2">

        <!-- Actividades por Clases -->
        <div
            class="relative flex flex-col w-full min-w-0 mb-4 break-words rounded shadow-lg lg:mb-0 bg-gray-50 dark:bg-gray-800">
            <div class="px-0 mb-0 border-0 rounded-t">
                <div class="flex flex-wrap items-center px-4 py-2">
                    <div class="relative flex-1 flex-grow w-full max-w-full">
                        <h3 class="text-base font-semibold text-gray-900 dark:text-gray-50">Actividades por Aulas</h3>
                    </div>
                    <div class="relative flex-1 flex-grow w-full max-w-full text-right">
                        <a href="{{ route('admin.activities') }}">
                            <button
                                class="px-3 py-1 mb-1 mr-1 text-xs font-bold text-white uppercase transition-all duration-150 ease-linear bg-blue-500 rounded outline-none dark:bg-gray-100 active:bg-blue-600 dark:text-gray-800 dark:active:text-gray-700 focus:outline-none"
                                type="button">Ver</button>
                        </a>
                    </div>
                </div>
                <div class="block w-full overflow-x-auto">
                    <table class="items-center w-full bg-transparent border-collapse" id="classTable">
                        <thead>
                            <tr>
                                <th
                                    class="px-4 py-3 text-xs font-semibold text-left text-gray-500 uppercase align-middle bg-gray-100 border border-l-0 border-r-0 border-gray-200 border-solid dark:bg-gray-600 dark:text-gray-100 dark:border-gray-500 whitespace-nowrap">
                                    Clase</th>
                                <th
                                    class="px-4 py-3 text-xs font-semibold text-left text-gray-500 uppercase align-middle bg-gray-100 border border-l-0 border-r-0 border-gray-200 border-solid dark:bg-gray-600 dark:text-gray-100 dark:border-gray-500 whitespace-nowrap">
                                    Estudiantes</th>
                                <th
                                    class="px-4 py-3 text-xs font-semibold text-left text-gray-500 uppercase align-middle bg-gray-100 border border-l-0 border-r-0 border-gray-200 border-solid dark:bg-gray-600 dark:text-gray-100 dark:border-gray-500 whitespace-nowrap min-w-140-px">
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($classrooms->isEmpty())
                                <li class="flex px-4">
                                    <h2 class="text-redPersonal">No hay Clases que mostrar.</h2>
                                </li>
                            @else
                                @foreach ($classrooms as $class)
                                    <tr class="text-gray-700 dark:text-gray-100">
                                        <th
                                            class="p-4 px-4 text-xs text-left align-middle border-t-0 border-l-0 border-r-0 whitespace-nowrap">
                                            {{ $class->class_name }}</th>
                                        <td
                                            class="p-4 px-4 text-xs align-middle border-t-0 border-l-0 border-r-0 whitespace-nowrap">
                                            {{ $class->estudiante->count() }}</td>
                                        <td
                                            class="p-4 px-4 text-xs align-middle border-t-0 border-l-0 border-r-0 whitespace-nowrap">
                                            <div class="flex items-center">
                                                <span
                                                    class="mr-2">{{ round(($class->estudiante->count() * 100) / 30) }}%</span>
                                                <div class="relative w-full">
                                                    <div class="flex h-2 overflow-hidden text-xs bg-blue-200 rounded">
                                                        <div style="width: {{ ($class->estudiante->count() * 100) / 30 }}%"
                                                            class="flex flex-col justify-center text-center text-white bg-blue-600 shadow-none whitespace-nowrap">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    @break($loop->iteration == 5)
                                @endforeach
                                {{-- <tr class="text-gray-700 dark:text-gray-100">
                                <th
                                    class="p-4 px-4 text-xs text-left align-middle border-t-0 border-l-0 border-r-0 whitespace-nowrap">
                                    Facebook</th>
                                <td
                                    class="p-4 px-4 text-xs align-middle border-t-0 border-l-0 border-r-0 whitespace-nowrap">
                                    5,480</td>
                                <td
                                    class="p-4 px-4 text-xs align-middle border-t-0 border-l-0 border-r-0 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <span class="mr-2">70%</span>
                                        <div class="relative w-full">
                                            <div class="flex h-2 overflow-hidden text-xs bg-blue-200 rounded">
                                                <div style="width: 70%"
                                                    class="flex flex-col justify-center text-center text-white bg-blue-600 shadow-none whitespace-nowrap">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr class="text-gray-700 dark:text-gray-100">
                                <th
                                    class="p-4 px-4 text-xs text-left align-middle border-t-0 border-l-0 border-r-0 whitespace-nowrap">
                                    Twitter</th>
                                <td
                                    class="p-4 px-4 text-xs align-middle border-t-0 border-l-0 border-r-0 whitespace-nowrap">
                                    3,380</td>
                                <td
                                    class="p-4 px-4 text-xs align-middle border-t-0 border-l-0 border-r-0 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <span class="mr-2">40%</span>
                                        <div class="relative w-full">
                                            <div class="flex h-2 overflow-hidden text-xs bg-blue-200 rounded">
                                                <div style="width: 40%"
                                                    class="flex flex-col justify-center text-center text-white bg-blue-500 shadow-none whitespace-nowrap">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr class="text-gray-700 dark:text-gray-100">
                                <th
                                    class="p-4 px-4 text-xs text-left align-middle border-t-0 border-l-0 border-r-0 whitespace-nowrap">
                                    Instagram</th>
                                <td
                                    class="p-4 px-4 text-xs align-middle border-t-0 border-l-0 border-r-0 whitespace-nowrap">
                                    4,105</td>
                                <td
                                    class="p-4 px-4 text-xs align-middle border-t-0 border-l-0 border-r-0 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <span class="mr-2">45%</span>
                                        <div class="relative w-full">
                                            <div class="flex h-2 overflow-hidden text-xs bg-pink-200 rounded">
                                                <div style="width: 45%"
                                                    class="flex flex-col justify-center text-center text-white bg-pink-500 shadow-none whitespace-nowrap">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr class="text-gray-700 dark:text-gray-100">
                                <th
                                    class="p-4 px-4 text-xs text-left align-middle border-t-0 border-l-0 border-r-0 whitespace-nowrap">
                                    Google</th>
                                <td
                                    class="p-4 px-4 text-xs align-middle border-t-0 border-l-0 border-r-0 whitespace-nowrap">
                                    4,985</td>
                                <td
                                    class="p-4 px-4 text-xs align-middle border-t-0 border-l-0 border-r-0 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <span class="mr-2">60%</span>
                                        <div class="relative w-full">
                                            <div class="flex h-2 overflow-hidden text-xs bg-red-200 rounded">
                                                <div style="width: 60%"
                                                    class="flex flex-col justify-center text-center text-white bg-red-500 shadow-none whitespace-nowrap">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr class="text-gray-700 dark:text-gray-100">
                                <th
                                    class="p-4 px-4 text-xs text-left align-middle border-t-0 border-l-0 border-r-0 whitespace-nowrap">
                                    Linkedin</th>
                                <td
                                    class="p-4 px-4 text-xs align-middle border-t-0 border-l-0 border-r-0 whitespace-nowrap">
                                    2,250</td>
                                <td
                                    class="p-4 px-4 text-xs align-middle border-t-0 border-l-0 border-r-0 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <span class="mr-2">30%</span>
                                        <div class="relative w-full">
                                            <div class="flex h-2 overflow-hidden text-xs bg-blue-200 rounded">
                                                <div style="width: 30%"
                                                    class="flex flex-col justify-center text-center text-white bg-blue-700 shadow-none whitespace-nowrap">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr> --}}
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- ./Actividades por Clases -->

        <!-- Recent Activities -->
        <div class="relative flex flex-col w-full min-w-0 break-words rounded shadow-lg bg-gray-50 dark:bg-gray-800">
            <div class="px-0 mb-0 border-0 rounded-t">
                <div class="flex flex-wrap items-center px-4 py-2">
                    <div class="relative flex-1 flex-grow w-full max-w-full">
                        <h3 class="text-base font-semibold text-gray-900 dark:text-gray-50">Últimas Alertas
                        </h3>
                    </div>
                    <div class="relative flex-1 flex-grow w-full max-w-full text-right">
                        <a href="{{ route('admin.alertas') }}">
                            <button
                                class="px-3 py-1 mb-1 mr-1 text-xs font-bold text-white uppercase transition-all duration-150 ease-linear bg-blue-500 rounded outline-none dark:bg-gray-100 active:bg-blue-600 dark:text-gray-800 dark:active:text-gray-700 focus:outline-none"
                                type="button">Ver</button>
                        </a>
                    </div>
                </div>
                <div class="block w-full">
                    <div
                        class="px-4 py-3 text-xs font-semibold text-left text-gray-500 uppercase align-middle bg-gray-100 border border-l-0 border-r-0 border-gray-200 border-solid dark:bg-gray-600 dark:text-gray-100 dark:border-gray-500 whitespace-nowrap">
                        Últimos días
                    </div>
                    <ul class="my-1">
                        @if ($alertas->isEmpty())
                            <li class="flex px-4">
                                <h2 class="text-redPersonal">Enhorabuena no hay alertas que mostrar.</h2>
                            </li>
                        @else
                            @foreach ($latestAlerts as $alerta)
                                <li class="flex px-4">
                                    <div class="flex-shrink-0 my-2 mr-3 bg-indigo-500 rounded-full w-9 h-9">
                                        <svg class="fill-current w-9 h-9 text-indigo-50" viewBox="0 0 36 36">
                                            <path
                                                d="M18 10c-4.4 0-8 3.1-8 7s3.6 7 8 7h.6l5.4 2v-4.4c1.2-1.2 2-2.8 2-4.6 0-3.9-3.6-7-8-7zm4 10.8v2.3L18.9 22H18c-3.3 0-6-2.2-6-5s2.7-5 6-5 6 2.2 6 5c0 2.2-2 3.8-2 3.8z">
                                            </path>
                                        </svg>
                                    </div>
                                    <div
                                        class="flex items-center flex-grow py-2 text-sm text-gray-600 border-b border-gray-100 dark:border-gray-400 dark:text-gray-100">
                                        <div class="flex items-center justify-between flex-grow">
                                            <div class="self-center">
                                                @if ($alerta->estudiante_id == null)
                                                    <a class="font-medium text-gray-800 hover:text-gray-900 dark:text-gray-50 dark:hover:text-gray-100"
                                                        href="#0" style="outline: none;">Alumno Sin identificar</a>
                                                @else
                                                    <a class="font-medium text-gray-800 hover:text-gray-900 dark:text-gray-50 dark:hover:text-gray-100"
                                                        href="#0"
                                                        style="outline: none;">{{ $alerta->estudiante->user->name }}
                                                        {{ $alerta->estudiante->user->last_name_1 }}</a>
                                                    mandó una alerta a <a
                                                        class="font-medium text-gray-800 dark:text-gray-50 dark:hover:text-gray-100"
                                                        href="#0"
                                                        style="outline: none;">{{ $alerta->classroom->class_name }}</a>
                                                @endif
                                            </div>
                                            <div class="flex-shrink-0 ml-2 min-w-16">
                                                @if ($alerta->active == 1)
                                                    <div
                                                        class="flex justify-center h-4 overflow-hidden text-xs tracking-wide text-red-600 bg-red-200 rounded">
                                                        <span>Activa</span>
                                                        {{-- <div style=""
                                                class="flex flex-col justify-center text-center text-white bg-blue-600 shadow-none whitespace-nowrap">
                                                 </div> --}}
                                                    </div>
                                                @else
                                                    <div
                                                        class="flex justify-center h-4 overflow-hidden text-xs tracking-wide text-green-600 bg-green-200 rounded">
                                                        <span>Cerrada</span>
                                                        {{-- <div style=""
                                                class="flex flex-col justify-center text-center text-white bg-blue-600 shadow-none whitespace-nowrap">
                                            </div> --}}
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                {{-- <li class="flex px-4">
                                    <div class="flex-shrink-0 my-2 mr-3 bg-indigo-500 rounded-full w-9 h-9">
                                        <svg class="fill-current w-9 h-9 text-indigo-50" viewBox="0 0 36 36">
                                            <path
                                                d="M18 10c-4.4 0-8 3.1-8 7s3.6 7 8 7h.6l5.4 2v-4.4c1.2-1.2 2-2.8 2-4.6 0-3.9-3.6-7-8-7zm4 10.8v2.3L18.9 22H18c-3.3 0-6-2.2-6-5s2.7-5 6-5 6 2.2 6 5c0 2.2-2 3.8-2 3.8z">
                                            </path>
                                        </svg>
                                    </div>
                                    <div
                                        class="flex items-center flex-grow py-2 text-sm text-gray-600 border-b border-gray-100 dark:border-gray-400 dark:text-gray-100">
                                        <div class="flex items-center justify-between flex-grow">
                                            <div class="self-center">
                                                <a class="font-medium text-gray-800 hover:text-gray-900 dark:text-gray-50 dark:hover:text-gray-100"
                                                    href="#0" style="outline: none;">Nick Mark</a> mentioned <a
                                                    class="font-medium text-gray-800 dark:text-gray-50 dark:hover:text-gray-100"
                                                    href="#0" style="outline: none;">Sara Smith</a> in a new post
                                            </div>
                                            <div class="flex-shrink-0 ml-2">
                                                <a class="flex items-center font-medium text-blue-500 hover:text-blue-600 dark:text-blue-400 dark:hover:text-blue-500"
                                                    href="#0" style="outline: none;">
                                                    View<span><svg width="20" height="20" viewBox="0 0 20 20"
                                                            fill="currentColor"
                                                            class="transition-transform duration-500 ease-in-out transform">
                                                            <path fill-rule="evenodd"
                                                                d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                                                clip-rule="evenodd"></path>
                                                        </svg></span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </li> --}}
                            @endforeach
                        @endif

                    </ul>
                    {{-- <ul class="my-1">

                        <li class="flex px-4">
                            <div class="flex-shrink-0 my-2 mr-3 bg-indigo-500 rounded-full w-9 h-9">
                                <svg class="fill-current w-9 h-9 text-indigo-50" viewBox="0 0 36 36">
                                    <path
                                        d="M18 10c-4.4 0-8 3.1-8 7s3.6 7 8 7h.6l5.4 2v-4.4c1.2-1.2 2-2.8 2-4.6 0-3.9-3.6-7-8-7zm4 10.8v2.3L18.9 22H18c-3.3 0-6-2.2-6-5s2.7-5 6-5 6 2.2 6 5c0 2.2-2 3.8-2 3.8z">
                                    </path>
                                </svg>
                            </div>
                            <div
                                class="flex items-center flex-grow py-2 text-sm text-gray-600 border-b border-gray-100 dark:border-gray-400 dark:text-gray-100">
                                <div class="flex items-center justify-between flex-grow">
                                    <div class="self-center">
                                        <a class="font-medium text-gray-800 hover:text-gray-900 dark:text-gray-50 dark:hover:text-gray-100"
                                            href="#0" style="outline: none;">Nick Mark</a> mentioned <a
                                            class="font-medium text-gray-800 dark:text-gray-50 dark:hover:text-gray-100"
                                            href="#0" style="outline: none;">Sara Smith</a> in a new post
                                    </div>
                                    <div class="flex-shrink-0 ml-2">
                                        <a class="flex items-center font-medium text-blue-500 hover:text-blue-600 dark:text-blue-400 dark:hover:text-blue-500"
                                            href="#0" style="outline: none;">
                                            View<span><svg width="20" height="20" viewBox="0 0 20 20"
                                                    fill="currentColor"
                                                    class="transition-transform duration-500 ease-in-out transform">
                                                    <path fill-rule="evenodd"
                                                        d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                                        clip-rule="evenodd"></path>
                                                </svg></span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </li>

                        <li class="flex px-4">
                            <div class="flex-shrink-0 my-2 mr-3 bg-red-500 rounded-full w-9 h-9">
                                <svg class="fill-current w-9 h-9 text-red-50" viewBox="0 0 36 36">
                                    <path d="M25 24H11a1 1 0 01-1-1v-5h2v4h12v-4h2v5a1 1 0 01-1 1zM14 13h8v2h-8z">
                                    </path>
                                </svg>
                            </div>
                            <div
                                class="flex items-center flex-grow py-2 text-sm text-gray-600 border-gray-100 dark:text-gray-50">
                                <div class="flex items-center justify-between flex-grow">
                                    <div class="self-center">
                                        The post <a
                                            class="font-medium text-gray-800 dark:text-gray-50 dark:hover:text-gray-100"
                                            href="#0" style="outline: none;">Post Name</a> was removed by
                                        <a class="font-medium text-gray-800 hover:text-gray-900 dark:text-gray-50 dark:hover:text-gray-100"
                                            href="#0" style="outline: none;">Nick Mark</a>
                                    </div>
                                    <div class="flex-shrink-0 ml-2">
                                        <a class="flex items-center font-medium text-blue-500 hover:text-blue-600 dark:text-blue-400 dark:hover:text-blue-500"
                                            href="#0" style="outline: none;">
                                            View<span><svg width="20" height="20" viewBox="0 0 20 20"
                                                    fill="currentColor"
                                                    class="transition-transform duration-500 ease-in-out transform">
                                                    <path fill-rule="evenodd"
                                                        d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                                        clip-rule="evenodd"></path>
                                                </svg></span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul> --}}
                    {{-- <div
                        class="px-4 py-3 text-xs font-semibold text-left text-gray-500 uppercase align-middle bg-gray-100 border border-l-0 border-r-0 border-gray-200 border-solid dark:bg-gray-600 dark:text-gray-100 dark:border-gray-500 whitespace-nowrap">
                        Yesterday
                    </div>
                    <ul class="my-1">
                        <li class="flex px-4">
                            <div class="flex-shrink-0 my-2 mr-3 bg-green-500 rounded-full w-9 h-9">
                                <svg class="fill-current w-9 h-9 text-light-blue-50" viewBox="0 0 36 36">
                                    <path
                                        d="M23 11v2.085c-2.841.401-4.41 2.462-5.8 4.315-1.449 1.932-2.7 3.6-5.2 3.6h-1v2h1c3.5 0 5.253-2.338 6.8-4.4 1.449-1.932 2.7-3.6 5.2-3.6h3l-4-4zM15.406 16.455c.066-.087.125-.162.194-.254.314-.419.656-.872 1.033-1.33C15.475 13.802 14.038 13 12 13h-1v2h1c1.471 0 2.505.586 3.406 1.455zM24 21c-1.471 0-2.505-.586-3.406-1.455-.066.087-.125.162-.194.254-.316.422-.656.873-1.028 1.328.959.878 2.108 1.573 3.628 1.788V25l4-4h-3z">
                                    </path>
                                </svg>
                            </div>
                            <div
                                class="flex items-center flex-grow py-2 text-sm text-gray-600 border-gray-100 dark:text-gray-50">
                                <div class="flex items-center justify-between flex-grow">
                                    <div class="self-center">
                                        <a class="font-medium text-gray-800 hover:text-gray-900 dark:text-gray-50 dark:hover:text-gray-100"
                                            href="#0" style="outline: none;">240+</a> users have
                                        subscribed to <a
                                            class="font-medium text-gray-800 dark:text-gray-50 dark:hover:text-gray-100"
                                            href="#0" style="outline: none;">Newsletter #1</a>
                                    </div>
                                    <div class="flex-shrink-0 ml-2">
                                        <a class="flex items-center font-medium text-blue-500 hover:text-blue-600 dark:text-blue-400 dark:hover:text-blue-500"
                                            href="#0" style="outline: none;">
                                            View<span><svg width="20" height="20" viewBox="0 0 20 20"
                                                    fill="currentColor"
                                                    class="transition-transform duration-500 ease-in-out transform">
                                                    <path fill-rule="evenodd"
                                                        d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                                        clip-rule="evenodd"></path>
                                                </svg></span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul> --}}
                </div>
            </div>
        </div>
        <!-- ./Recent Activities -->
    </div>

    <!-- Task Summaries -->
    {{-- <div class="grid grid-cols-1 gap-4 p-4 text-black md:grid-cols-2 xl:grid-cols-3 dark:text-white">
        <div class="md:col-span-2 xl:col-span-3">
            <h3 class="text-lg font-semibold">Task summaries of recent sprints</h3>
        </div>
        <div class="md:col-span-2 xl:col-span-1">
            <div class="p-3 bg-gray-200 rounded dark:bg-gray-800">
                <div class="flex justify-between py-1 text-black dark:text-white">
                    <h3 class="text-sm font-semibold">Tasks in TO DO</h3>
                    <svg class="h-4 text-gray-600 cursor-pointer fill-current dark:text-gray-500"
                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                        <path
                            d="M5 10a1.999 1.999 0 1 0 0 4 1.999 1.999 0 1 0 0-4zm7 0a1.999 1.999 0 1 0 0 4 1.999 1.999 0 1 0 0-4zm7 0a1.999 1.999 0 1 0 0 4 1.999 1.999 0 1 0 0-4z" />
                    </svg>
                </div>
                <div class="mt-2 text-sm text-black dark:text-gray-50">
                    <div
                        class="p-2 mt-1 bg-white border-b border-gray-100 rounded cursor-pointer dark:bg-gray-600 hover:bg-gray-50 dark:hover:bg-gray-700 dark:border-gray-900">
                        Delete all references from the wiki</div>
                    <div
                        class="p-2 mt-1 bg-white border-b border-gray-100 rounded cursor-pointer dark:bg-gray-600 hover:bg-gray-50 dark:hover:bg-gray-700 dark:border-gray-900">
                        Remove analytics code</div>
                    <div
                        class="p-2 mt-1 bg-white border-b border-gray-100 rounded cursor-pointer dark:bg-gray-600 hover:bg-gray-50 dark:hover:bg-gray-700 dark:border-gray-900">
                        Do a mobile first layout
                        <div class="flex items-start justify-between mt-2 ml-2 text-gray-500 dark:text-gray-200">
                            <span class="flex items-center text-xs">
                                <svg class="h-4 mr-1 fill-current" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 50 50">
                                    <path
                                        d="M11 4c-3.855 0-7 3.145-7 7v28c0 3.855 3.145 7 7 7h28c3.855 0 7-3.145 7-7V11c0-3.855-3.145-7-7-7zm0 2h28c2.773 0 5 2.227 5 5v28c0 2.773-2.227 5-5 5H11c-2.773 0-5-2.227-5-5V11c0-2.773 2.227-5 5-5zm25.234 9.832l-13.32 15.723-8.133-7.586-1.363 1.465 9.664 9.015 14.684-17.324z" />
                                </svg>
                                3/5
                            </span>
                            <img src="https://i.imgur.com/OZaT7jl.png" class="rounded-full" />
                        </div>
                    </div>
                    <div
                        class="p-2 mt-1 bg-white border-b border-gray-100 rounded cursor-pointer dark:bg-gray-600 hover:bg-gray-50 dark:hover:bg-gray-700 dark:border-gray-900">
                        Check the meta tags</div>
                    <div
                        class="p-2 mt-1 bg-white border-b border-gray-100 rounded cursor-pointer dark:bg-gray-600 hover:bg-gray-50 dark:hover:bg-gray-700 dark:border-gray-900">
                        Think more tasks for this example
                        <div class="flex items-start justify-between mt-2 ml-2 text-gray-500 dark:text-gray-200">
                            <span class="flex items-center text-xs">
                                <svg class="h-4 mr-1 fill-current" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 50 50">
                                    <path
                                        d="M11 4c-3.855 0-7 3.145-7 7v28c0 3.855 3.145 7 7 7h28c3.855 0 7-3.145 7-7V11c0-3.855-3.145-7-7-7zm0 2h28c2.773 0 5 2.227 5 5v28c0 2.773-2.227 5-5 5H11c-2.773 0-5-2.227-5-5V11c0-2.773 2.227-5 5-5zm25.234 9.832l-13.32 15.723-8.133-7.586-1.363 1.465 9.664 9.015 14.684-17.324z" />
                                </svg>
                                0/3
                            </span>
                        </div>
                    </div>
                    <p class="mt-3 text-gray-600 dark:text-gray-400">Add a card...</p>
                </div>
            </div>
        </div>
        <div>
            <div class="p-3 bg-gray-200 rounded dark:bg-gray-800">
                <div class="flex justify-between py-1 text-black dark:text-white">
                    <h3 class="text-sm font-semibold">Tasks in DEVELOPMENT</h3>
                    <svg class="h-4 text-gray-600 cursor-pointer fill-current dark:text-gray-500"
                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                        <path
                            d="M5 10a1.999 1.999 0 1 0 0 4 1.999 1.999 0 1 0 0-4zm7 0a1.999 1.999 0 1 0 0 4 1.999 1.999 0 1 0 0-4zm7 0a1.999 1.999 0 1 0 0 4 1.999 1.999 0 1 0 0-4z" />
                    </svg>
                </div>
                <div class="mt-2 text-sm text-black dark:text-gray-50">
                    <div
                        class="p-2 mt-1 bg-white border-b border-gray-100 rounded cursor-pointer dark:bg-gray-600 hover:bg-gray-50 dark:hover:bg-gray-700 dark:border-gray-900">
                        Delete all references from the wiki</div>
                    <div
                        class="p-2 mt-1 bg-white border-b border-gray-100 rounded cursor-pointer dark:bg-gray-600 hover:bg-gray-50 dark:hover:bg-gray-700 dark:border-gray-900">
                        Remove analytics code</div>
                    <div
                        class="p-2 mt-1 bg-white border-b border-gray-100 rounded cursor-pointer dark:bg-gray-600 hover:bg-gray-50 dark:hover:bg-gray-700 dark:border-gray-900">
                        Do a mobile first layout
                        <div class="flex items-start justify-between mt-2 ml-2 text-xs text-white">
                            <span class="flex items-center p-1 text-xs bg-pink-600 rounded">
                                <svg class="h-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                    <path
                                        d="M12 2c-.8 0-1.5.7-1.5 1.5v.688C7.344 4.87 5 7.62 5 11v4.5l-2 2.313V19h18v-1.188L19 15.5V11c0-3.379-2.344-6.129-5.5-6.813V3.5c0-.8-.7-1.5-1.5-1.5zm-2 18c0 1.102.898 2 2 2 1.102 0 2-.898 2-2z" />
                                </svg>
                                2
                            </span>
                        </div>
                    </div>
                    <div
                        class="p-2 mt-1 bg-white border-b border-gray-100 rounded cursor-pointer dark:bg-gray-600 hover:bg-gray-50 dark:hover:bg-gray-700 dark:border-gray-900">
                        Check the meta tags</div>
                    <div
                        class="p-2 mt-1 bg-white border-b border-gray-100 rounded cursor-pointer dark:bg-gray-600 hover:bg-gray-50 dark:hover:bg-gray-700 dark:border-gray-900">
                        Think more tasks for this example
                        <div class="flex items-start justify-between mt-2 ml-2 text-gray-500">
                            <span class="flex items-center text-xs">
                                <svg class="h-4 mr-1 fill-current" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 50 50">
                                    <path
                                        d="M11 4c-3.855 0-7 3.145-7 7v28c0 3.855 3.145 7 7 7h28c3.855 0 7-3.145 7-7V11c0-3.855-3.145-7-7-7zm0 2h28c2.773 0 5 2.227 5 5v28c0 2.773-2.227 5-5 5H11c-2.773 0-5-2.227-5-5V11c0-2.773 2.227-5 5-5zm25.234 9.832l-13.32 15.723-8.133-7.586-1.363 1.465 9.664 9.015 14.684-17.324z" />
                                </svg>
                                0/3
                            </span>
                        </div>
                    </div>
                    <p class="mt-3 text-gray-600 dark:text-gray-400">Add a card...</p>
                </div>
            </div>
        </div>
        <div>
            <div class="p-3 bg-gray-200 rounded dark:bg-gray-800">
                <div class="flex justify-between py-1 text-black dark:text-white">
                    <h3 class="text-sm font-semibold">Tasks in QA</h3>
                    <svg class="h-4 text-gray-600 cursor-pointer fill-current dark:text-gray-500"
                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                        <path
                            d="M5 10a1.999 1.999 0 1 0 0 4 1.999 1.999 0 1 0 0-4zm7 0a1.999 1.999 0 1 0 0 4 1.999 1.999 0 1 0 0-4zm7 0a1.999 1.999 0 1 0 0 4 1.999 1.999 0 1 0 0-4z" />
                    </svg>
                </div>
                <div class="mt-2 text-sm text-black dark:text-gray-50">
                    <div
                        class="p-2 mt-1 bg-white border-b border-gray-100 rounded cursor-pointer dark:bg-gray-600 hover:bg-gray-50 dark:hover:bg-gray-700 dark:border-gray-900">
                        Delete all references from the wiki</div>
                    <div
                        class="p-2 mt-1 bg-white border-b border-gray-100 rounded cursor-pointer dark:bg-gray-600 hover:bg-gray-50 dark:hover:bg-gray-700 dark:border-gray-900">
                        Remove analytics code</div>
                    <div
                        class="p-2 mt-1 bg-white border-b border-gray-100 rounded cursor-pointer dark:bg-gray-600 hover:bg-gray-50 dark:hover:bg-gray-700 dark:border-gray-900">
                        Do a mobile first layout</div>
                    <div
                        class="p-2 mt-1 bg-white border-b border-gray-100 rounded cursor-pointer dark:bg-gray-600 hover:bg-gray-50 dark:hover:bg-gray-700 dark:border-gray-900">
                        Check the meta tags</div>
                    <div
                        class="p-2 mt-1 bg-white border-b border-gray-100 rounded cursor-pointer dark:bg-gray-600 hover:bg-gray-50 dark:hover:bg-gray-700 dark:border-gray-900">
                        Think more tasks for this example
                        <div class="flex items-start justify-between mt-2 ml-2 text-gray-500 dark:text-gray-200">
                            <span class="flex items-center text-xs">
                                <svg class="h-4 mr-1 fill-current" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 50 50">
                                    <path
                                        d="M11 4c-3.855 0-7 3.145-7 7v28c0 3.855 3.145 7 7 7h28c3.855 0 7-3.145 7-7V11c0-3.855-3.145-7-7-7zm0 2h28c2.773 0 5 2.227 5 5v28c0 2.773-2.227 5-5 5H11c-2.773 0-5-2.227-5-5V11c0-2.773 2.227-5 5-5zm25.234 9.832l-13.32 15.723-8.133-7.586-1.363 1.465 9.664 9.015 14.684-17.324z" />
                                </svg>
                                0/3
                            </span>
                        </div>
                    </div>
                    <p class="mt-3 text-gray-600 dark:text-gray-400">Add a card...</p>
                </div>
            </div>
        </div>
    </div> --}}
    <!-- ./Task Summaries -->

    <!-- Añado estas tablas -->
    <div class="grid grid-cols-1 gap-4 p-4 lg:grid-cols-2">

        <!-- Social Traffic -->
        <div
            class="relative flex flex-col w-full min-w-0 mb-4 break-words rounded shadow-lg lg:mb-0 bg-gray-50 dark:bg-gray-800">
            <div class="px-0 mb-0 border-0 rounded-t">
                <div class="flex flex-wrap items-center px-4 py-2">
                    <div class="relative flex-1 flex-grow w-full max-w-full">
                        <h3 class="text-base font-semibold text-gray-900 dark:text-gray-50">Ultimas Alertas</h3>
                    </div>
                    <div class="relative flex-1 flex-grow w-full max-w-full text-right">
                        <a href="{{ route('admin.alertas') }}">
                            <button
                                class="px-3 py-1 mb-1 mr-1 text-xs font-bold text-white uppercase transition-all duration-150 ease-linear bg-blue-500 rounded outline-none dark:bg-gray-100 active:bg-blue-600 dark:text-gray-800 dark:active:text-gray-700 focus:outline-none"
                                type="button">Ver</button>
                        </a>
                    </div>
                </div>
                <div class="block w-full overflow-x-auto">
                    <table class="items-center w-full bg-transparent border-collapse" id="classTable">

                        @if ($alertas->isEmpty())
                            <li class="flex px-4">
                                <h2 class="text-redPersonal">Enhorabuena no hay alertas que mostrar.</h2>
                            </li>
                        @else
                            <thead>
                                <tr>
                                    <th
                                        class="px-4 py-3 text-xs font-semibold text-left text-gray-500 uppercase align-middle bg-gray-100 border border-l-0 border-r-0 border-gray-200 border-solid dark:bg-gray-600 dark:text-gray-100 dark:border-gray-500 whitespace-nowrap">
                                        Alumno</th>
                                    <th
                                        class="px-4 py-3 text-xs font-semibold text-left text-gray-500 uppercase align-middle bg-gray-100 border border-l-0 border-r-0 border-gray-200 border-solid dark:bg-gray-600 dark:text-gray-100 dark:border-gray-500 whitespace-nowrap">
                                        Fecha</th>
                                    <th
                                        class="px-4 py-3 text-xs font-semibold text-left text-gray-500 uppercase align-middle bg-gray-100 border border-l-0 border-r-0 border-gray-200 border-solid dark:bg-gray-600 dark:text-gray-100 dark:border-gray-500 whitespace-nowrap min-w-140-px">
                                    </th>
                                </tr>
                            </thead>

                            <tbody>

                                @foreach ($latestAlerts as $alerta)
                                    <tr class="text-gray-700 dark:text-gray-100">
                                        @if ($alerta->estudiante_id == null)
                                            <th
                                                class="p-4 px-4 text-xs text-left align-middle border-t-0 border-l-0 border-r-0 whitespace-nowrap">
                                                Anonimo</th>
                                        @else
                                            <th
                                                class="p-4 px-4 text-xs text-left align-middle border-t-0 border-l-0 border-r-0 whitespace-nowrap">
                                                {{ $alerta->estudiante->user->name }}
                                                {{ $alerta->estudiante->user->last_name_1 }}</th>
                                        @endif
                                        <td
                                            class="p-4 px-4 text-xs align-middle border-t-0 border-l-0 border-r-0 whitespace-nowrap">
                                            {{ $alerta->updated_at }}</td>
                                        <td
                                            class="p-4 px-4 text-xs align-middle border-t-0 border-l-0 border-r-0 whitespace-nowrap">
                                            <div class="flex items-center">
                                                {{-- <span
                                                    class="mr-2">{{ round(($class->estudiante->count() * 100) / 30) }}%</span> --}}
                                                <div class="relative w-full">
                                                    {{-- md:block px-2 py-0.5 ml-auto text-xs font-medium tracking-wide --}}
                                                    @if ($alerta->active == 1)
                                                        <div
                                                            class="flex justify-center h-4 overflow-hidden text-xs tracking-wide text-red-600 bg-red-200 rounded">
                                                            <span>Activa</span>
                                                            {{-- <div style=""
                                                            class="flex flex-col justify-center text-center text-white bg-blue-600 shadow-none whitespace-nowrap">
                                                        </div> --}}
                                                        </div>
                                                    @else
                                                        <div
                                                            class="flex justify-center h-4 overflow-hidden text-xs tracking-wide text-green-600 bg-green-200 rounded">
                                                            <span>Cerrada</span>
                                                            {{-- <div style=""
                                                            class="flex flex-col justify-center text-center text-white bg-blue-600 shadow-none whitespace-nowrap">
                                                        </div> --}}
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    {{-- @break($loop->iteration == 5) --}}
                                @endforeach
                                {{-- <tr class="text-gray-700 dark:text-gray-100">
                                <th
                                    class="p-4 px-4 text-xs text-left align-middle border-t-0 border-l-0 border-r-0 whitespace-nowrap">
                                    Facebook</th>
                                <td
                                    class="p-4 px-4 text-xs align-middle border-t-0 border-l-0 border-r-0 whitespace-nowrap">
                                    5,480</td>
                                <td
                                    class="p-4 px-4 text-xs align-middle border-t-0 border-l-0 border-r-0 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <span class="mr-2">70%</span>
                                        <div class="relative w-full">
                                            <div class="flex h-2 overflow-hidden text-xs bg-blue-200 rounded">
                                                <div style="width: 70%"
                                                    class="flex flex-col justify-center text-center text-white bg-blue-600 shadow-none whitespace-nowrap">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr class="text-gray-700 dark:text-gray-100">
                                <th
                                    class="p-4 px-4 text-xs text-left align-middle border-t-0 border-l-0 border-r-0 whitespace-nowrap">
                                    Twitter</th>
                                <td
                                    class="p-4 px-4 text-xs align-middle border-t-0 border-l-0 border-r-0 whitespace-nowrap">
                                    3,380</td>
                                <td
                                    class="p-4 px-4 text-xs align-middle border-t-0 border-l-0 border-r-0 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <span class="mr-2">40%</span>
                                        <div class="relative w-full">
                                            <div class="flex h-2 overflow-hidden text-xs bg-blue-200 rounded">
                                                <div style="width: 40%"
                                                    class="flex flex-col justify-center text-center text-white bg-blue-500 shadow-none whitespace-nowrap">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr class="text-gray-700 dark:text-gray-100">
                                <th
                                    class="p-4 px-4 text-xs text-left align-middle border-t-0 border-l-0 border-r-0 whitespace-nowrap">
                                    Instagram</th>
                                <td
                                    class="p-4 px-4 text-xs align-middle border-t-0 border-l-0 border-r-0 whitespace-nowrap">
                                    4,105</td>
                                <td
                                    class="p-4 px-4 text-xs align-middle border-t-0 border-l-0 border-r-0 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <span class="mr-2">45%</span>
                                        <div class="relative w-full">
                                            <div class="flex h-2 overflow-hidden text-xs bg-pink-200 rounded">
                                                <div style="width: 45%"
                                                    class="flex flex-col justify-center text-center text-white bg-pink-500 shadow-none whitespace-nowrap">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr class="text-gray-700 dark:text-gray-100">
                                <th
                                    class="p-4 px-4 text-xs text-left align-middle border-t-0 border-l-0 border-r-0 whitespace-nowrap">
                                    Google</th>
                                <td
                                    class="p-4 px-4 text-xs align-middle border-t-0 border-l-0 border-r-0 whitespace-nowrap">
                                    4,985</td>
                                <td
                                    class="p-4 px-4 text-xs align-middle border-t-0 border-l-0 border-r-0 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <span class="mr-2">60%</span>
                                        <div class="relative w-full">
                                            <div class="flex h-2 overflow-hidden text-xs bg-red-200 rounded">
                                                <div style="width: 60%"
                                                    class="flex flex-col justify-center text-center text-white bg-red-500 shadow-none whitespace-nowrap">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr class="text-gray-700 dark:text-gray-100">
                                <th
                                    class="p-4 px-4 text-xs text-left align-middle border-t-0 border-l-0 border-r-0 whitespace-nowrap">
                                    Linkedin</th>
                                <td
                                    class="p-4 px-4 text-xs align-middle border-t-0 border-l-0 border-r-0 whitespace-nowrap">
                                    2,250</td>
                                <td
                                    class="p-4 px-4 text-xs align-middle border-t-0 border-l-0 border-r-0 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <span class="mr-2">30%</span>
                                        <div class="relative w-full">
                                            <div class="flex h-2 overflow-hidden text-xs bg-blue-200 rounded">
                                                <div style="width: 30%"
                                                    class="flex flex-col justify-center text-center text-white bg-blue-700 shadow-none whitespace-nowrap">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr> --}}
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- ./Social Traffic -->

        <!-- Recent Posts -->
        <div class="relative flex flex-col w-full min-w-0 break-words rounded shadow-lg bg-gray-50 dark:bg-gray-800">
            <div class="px-0 mb-0 border-0 rounded-t">
                <div class="flex flex-wrap items-center px-4 py-2">
                    <div class="relative flex-1 flex-grow w-full max-w-full">
                        <h3 class="text-base font-semibold text-gray-900 dark:text-gray-50">Publicaciones Recientes
                        </h3>
                    </div>
                    <div class="relative flex-1 flex-grow w-full max-w-full text-right">
                        <a href="{{ route('admin.posts') }}">
                            <button
                                class="px-3 py-1 mb-1 mr-1 text-xs font-bold text-white uppercase transition-all duration-150 ease-linear bg-blue-500 rounded outline-none dark:bg-gray-100 active:bg-blue-600 dark:text-gray-800 dark:active:text-gray-700 focus:outline-none"
                                type="button">Ver</button>
                        </a>
                    </div>
                </div>
                <div class="block w-full">
                    @if ($latestPosts->isEmpty())
                        <li class="flex px-4">
                            <h2 class="text-redPersonal">No hay Posts recientes.</h2>
                        </li>
                    @else
                        <div
                            class="px-4 py-3 text-xs font-semibold text-left text-gray-500 uppercase align-middle bg-gray-100 border border-l-0 border-r-0 border-gray-200 border-solid dark:bg-gray-600 dark:text-gray-100 dark:border-gray-500 whitespace-nowrap">
                            Esta Semana
                        </div>
                        <ul class="my-1">

                            @foreach ($latestPosts as $post)
                                <li class="flex px-4">
                                    <div class="flex-shrink-0 my-2 mr-3 bg-indigo-500 rounded-full w-9 h-9">
                                        <svg class="fill-current w-9 h-9 text-indigo-50" viewBox="0 0 36 36">
                                            <path
                                                d="M18 10c-4.4 0-8 3.1-8 7s3.6 7 8 7h.6l5.4 2v-4.4c1.2-1.2 2-2.8 2-4.6 0-3.9-3.6-7-8-7zm4 10.8v2.3L18.9 22H18c-3.3 0-6-2.2-6-5s2.7-5 6-5 6 2.2 6 5c0 2.2-2 3.8-2 3.8z">
                                            </path>
                                        </svg>
                                    </div>
                                    <div
                                        class="flex items-center flex-grow py-2 text-sm text-gray-600 border-b border-gray-100 dark:border-gray-400 dark:text-gray-100">
                                        <div class="flex items-center justify-between flex-grow">
                                            <div class="self-center">
                                                <a class="font-medium text-gray-800 hover:text-gray-900 dark:text-gray-50 dark:hover:text-gray-100"
                                                    href="{{ route('post.edit', ['post' => $post->id]) }}"
                                                    style="outline: none;">{{ $post->user->name }}</a>
                                                publicó <a
                                                    class="font-medium text-gray-800 dark:text-gray-50 dark:hover:text-gray-100"
                                                    href="#0" style="outline: none;">{{ $post->title }}</a> en la
                                                sección de información.
                                            </div>
                                            <div class="flex-shrink-0 ml-2">
                                                <a class="flex items-center font-medium text-blue-500 hover:text-blue-600 dark:text-blue-400 dark:hover:text-blue-500"
                                                    href="{{ route('post.edit', ['post' => $post->id]) }}"
                                                    style="outline: none;">
                                                    Ver<span><svg width="20" height="20" viewBox="0 0 20 20"
                                                            fill="currentColor"
                                                            class="transition-transform duration-500 ease-in-out transform">
                                                            <path fill-rule="evenodd"
                                                                d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                                                clip-rule="evenodd"></path>
                                                        </svg></span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                {{-- <li class="flex px-4">
                                    <div class="flex-shrink-0 my-2 mr-3 bg-indigo-500 rounded-full w-9 h-9">
                                        <svg class="fill-current w-9 h-9 text-indigo-50" viewBox="0 0 36 36">
                                            <path
                                                d="M18 10c-4.4 0-8 3.1-8 7s3.6 7 8 7h.6l5.4 2v-4.4c1.2-1.2 2-2.8 2-4.6 0-3.9-3.6-7-8-7zm4 10.8v2.3L18.9 22H18c-3.3 0-6-2.2-6-5s2.7-5 6-5 6 2.2 6 5c0 2.2-2 3.8-2 3.8z">
                                            </path>
                                        </svg>
                                    </div>
                                    <div
                                        class="flex items-center flex-grow py-2 text-sm text-gray-600 border-b border-gray-100 dark:border-gray-400 dark:text-gray-100">
                                        <div class="flex items-center justify-between flex-grow">
                                            <div class="self-center">
                                                <a class="font-medium text-gray-800 hover:text-gray-900 dark:text-gray-50 dark:hover:text-gray-100"
                                                    href="#0" style="outline: none;">Nick Mark</a> mentioned <a
                                                    class="font-medium text-gray-800 dark:text-gray-50 dark:hover:text-gray-100"
                                                    href="#0" style="outline: none;">Sara Smith</a> in a new post
                                            </div>
                                            <div class="flex-shrink-0 ml-2">
                                                <a class="flex items-center font-medium text-blue-500 hover:text-blue-600 dark:text-blue-400 dark:hover:text-blue-500"
                                                    href="#0" style="outline: none;">
                                                    View<span><svg width="20" height="20" viewBox="0 0 20 20"
                                                            fill="currentColor"
                                                            class="transition-transform duration-500 ease-in-out transform">
                                                            <path fill-rule="evenodd"
                                                                d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                                                clip-rule="evenodd"></path>
                                                        </svg></span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </li> --}}
                            @endforeach
                    @endif

                    </ul>
                    {{-- <ul class="my-1">

                        <li class="flex px-4">
                            <div class="flex-shrink-0 my-2 mr-3 bg-indigo-500 rounded-full w-9 h-9">
                                <svg class="fill-current w-9 h-9 text-indigo-50" viewBox="0 0 36 36">
                                    <path
                                        d="M18 10c-4.4 0-8 3.1-8 7s3.6 7 8 7h.6l5.4 2v-4.4c1.2-1.2 2-2.8 2-4.6 0-3.9-3.6-7-8-7zm4 10.8v2.3L18.9 22H18c-3.3 0-6-2.2-6-5s2.7-5 6-5 6 2.2 6 5c0 2.2-2 3.8-2 3.8z">
                                    </path>
                                </svg>
                            </div>
                            <div
                                class="flex items-center flex-grow py-2 text-sm text-gray-600 border-b border-gray-100 dark:border-gray-400 dark:text-gray-100">
                                <div class="flex items-center justify-between flex-grow">
                                    <div class="self-center">
                                        <a class="font-medium text-gray-800 hover:text-gray-900 dark:text-gray-50 dark:hover:text-gray-100"
                                            href="#0" style="outline: none;">Nick Mark</a> mentioned <a
                                            class="font-medium text-gray-800 dark:text-gray-50 dark:hover:text-gray-100"
                                            href="#0" style="outline: none;">Sara Smith</a> in a new post
                                    </div>
                                    <div class="flex-shrink-0 ml-2">
                                        <a class="flex items-center font-medium text-blue-500 hover:text-blue-600 dark:text-blue-400 dark:hover:text-blue-500"
                                            href="#0" style="outline: none;">
                                            View<span><svg width="20" height="20" viewBox="0 0 20 20"
                                                    fill="currentColor"
                                                    class="transition-transform duration-500 ease-in-out transform">
                                                    <path fill-rule="evenodd"
                                                        d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                                        clip-rule="evenodd"></path>
                                                </svg></span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </li>

                        <li class="flex px-4">
                            <div class="flex-shrink-0 my-2 mr-3 bg-red-500 rounded-full w-9 h-9">
                                <svg class="fill-current w-9 h-9 text-red-50" viewBox="0 0 36 36">
                                    <path d="M25 24H11a1 1 0 01-1-1v-5h2v4h12v-4h2v5a1 1 0 01-1 1zM14 13h8v2h-8z">
                                    </path>
                                </svg>
                            </div>
                            <div
                                class="flex items-center flex-grow py-2 text-sm text-gray-600 border-gray-100 dark:text-gray-50">
                                <div class="flex items-center justify-between flex-grow">
                                    <div class="self-center">
                                        The post <a
                                            class="font-medium text-gray-800 dark:text-gray-50 dark:hover:text-gray-100"
                                            href="#0" style="outline: none;">Post Name</a> was removed by
                                        <a class="font-medium text-gray-800 hover:text-gray-900 dark:text-gray-50 dark:hover:text-gray-100"
                                            href="#0" style="outline: none;">Nick Mark</a>
                                    </div>
                                    <div class="flex-shrink-0 ml-2">
                                        <a class="flex items-center font-medium text-blue-500 hover:text-blue-600 dark:text-blue-400 dark:hover:text-blue-500"
                                            href="#0" style="outline: none;">
                                            View<span><svg width="20" height="20" viewBox="0 0 20 20"
                                                    fill="currentColor"
                                                    class="transition-transform duration-500 ease-in-out transform">
                                                    <path fill-rule="evenodd"
                                                        d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                                        clip-rule="evenodd"></path>
                                                </svg></span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul> --}}
                    {{-- <div
                        class="px-4 py-3 text-xs font-semibold text-left text-gray-500 uppercase align-middle bg-gray-100 border border-l-0 border-r-0 border-gray-200 border-solid dark:bg-gray-600 dark:text-gray-100 dark:border-gray-500 whitespace-nowrap">
                        Yesterday
                    </div>
                    <ul class="my-1">
                        <li class="flex px-4">
                            <div class="flex-shrink-0 my-2 mr-3 bg-green-500 rounded-full w-9 h-9">
                                <svg class="fill-current w-9 h-9 text-light-blue-50" viewBox="0 0 36 36">
                                    <path
                                        d="M23 11v2.085c-2.841.401-4.41 2.462-5.8 4.315-1.449 1.932-2.7 3.6-5.2 3.6h-1v2h1c3.5 0 5.253-2.338 6.8-4.4 1.449-1.932 2.7-3.6 5.2-3.6h3l-4-4zM15.406 16.455c.066-.087.125-.162.194-.254.314-.419.656-.872 1.033-1.33C15.475 13.802 14.038 13 12 13h-1v2h1c1.471 0 2.505.586 3.406 1.455zM24 21c-1.471 0-2.505-.586-3.406-1.455-.066.087-.125.162-.194.254-.316.422-.656.873-1.028 1.328.959.878 2.108 1.573 3.628 1.788V25l4-4h-3z">
                                    </path>
                                </svg>
                            </div>
                            <div
                                class="flex items-center flex-grow py-2 text-sm text-gray-600 border-gray-100 dark:text-gray-50">
                                <div class="flex items-center justify-between flex-grow">
                                    <div class="self-center">
                                        <a class="font-medium text-gray-800 hover:text-gray-900 dark:text-gray-50 dark:hover:text-gray-100"
                                            href="#0" style="outline: none;">240+</a> users have
                                        subscribed to <a
                                            class="font-medium text-gray-800 dark:text-gray-50 dark:hover:text-gray-100"
                                            href="#0" style="outline: none;">Newsletter #1</a>
                                    </div>
                                    <div class="flex-shrink-0 ml-2">
                                        <a class="flex items-center font-medium text-blue-500 hover:text-blue-600 dark:text-blue-400 dark:hover:text-blue-500"
                                            href="#0" style="outline: none;">
                                            View<span><svg width="20" height="20" viewBox="0 0 20 20"
                                                    fill="currentColor"
                                                    class="transition-transform duration-500 ease-in-out transform">
                                                    <path fill-rule="evenodd"
                                                        d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                                        clip-rule="evenodd"></path>
                                                </svg></span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul> --}}
                </div>
            </div>
        </div>
        <!-- ./Recent Posts -->
    </div>
    <!-- FIn tablas añadidas-->

    <!-- Docentes Table -->
    <div class="mx-4 mt-4">
        <div class="w-full overflow-hidden rounded-lg shadow-xs">
            <div class="w-full overflow-x-auto">
                <table id="docentesTable" class="w-full">
                    <thead>
                        <tr
                            class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                            <th class="px-4 py-3">Docente</th>
                            <th class="px-4 py-3">Asignatura</th>
                            <th class="px-4 py-3">Clase Asignada</th>
                            <th class="px-4 py-3">Fecha Ingreso</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                        @foreach ($docentes as $docente)
                            <tr
                                class="text-gray-700 bg-gray-50 dark:bg-gray-800 hover:bg-gray-100 dark:hover:bg-gray-900 dark:text-gray-400">
                                <td class="px-4 py-3">
                                    <div class="flex items-center text-sm">
                                        <div class="relative hidden w-8 h-8 mr-3 rounded-full md:block">
                                            <img class="object-cover w-full h-full rounded-full"
                                                src="https://images.unsplash.com/flagged/photo-1570612861542-284f4c12e75f?ixlib=rb-1.2.1&amp;q=80&amp;fm=jpg&amp;crop=entropy&amp;cs=tinysrgb&amp;w=200&amp;fit=max&amp;ixid=eyJhcHBfaWQiOjE3Nzg0fQ"
                                                alt="" loading="lazy" />
                                            <div class="absolute inset-0 rounded-full shadow-inner" aria-hidden="true">
                                            </div>
                                        </div>
                                        <div>
                                            <p class="font-semibold">{{ $docente->user->name }}</p>
                                            <p class="text-xs text-gray-600 dark:text-gray-400">
                                                {{ $docente->user->last_name_1 }}</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-4 py-3 text-sm">{{ $docente->speciality }}</td>
                                <td class="px-4 py-3 text-xs">

                                    @if (count($docente->classroom) < 1)
                                        <span
                                            class="px-2 py-1 font-semibold leading-tight text-yellow-700 bg-yellow-100 rounded-full">
                                            Sin Asignar </span>
                                    @else
                                        <span
                                            class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">
                                            Asignadas </span>
                                    @endif

                                </td>
                                <td class="px-4 py-3 text-sm">
                                    {{ \Carbon\Carbon::parse($docente->created_at)->format('d-m-Y') }}</td>
                            </tr>
                        @endforeach
                        {{-- <tr
                            class="text-gray-700 bg-gray-50 dark:bg-gray-800 hover:bg-gray-100 dark:hover:bg-gray-900 dark:text-gray-400">
                            <td class="px-4 py-3">
                                <div class="flex items-center text-sm">
                                    <div class="relative hidden w-8 h-8 mr-3 rounded-full md:block">
                                        <img class="object-cover w-full h-full rounded-full"
                                            src="https://images.unsplash.com/flagged/photo-1570612861542-284f4c12e75f?ixlib=rb-1.2.1&amp;q=80&amp;fm=jpg&amp;crop=entropy&amp;cs=tinysrgb&amp;w=200&amp;fit=max&amp;ixid=eyJhcHBfaWQiOjE3Nzg0fQ"
                                            alt="" loading="lazy" />
                                        <div class="absolute inset-0 rounded-full shadow-inner" aria-hidden="true"></div>
                                    </div>
                                    <div>
                                        <p class="font-semibold">Hans Burger</p>
                                        <p class="text-xs text-gray-600 dark:text-gray-400">10x Developer</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-4 py-3 text-sm">$855.85</td>
                            <td class="px-4 py-3 text-xs">
                                <span
                                    class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">
                                    Approved </span>
                            </td>
                            <td class="px-4 py-3 text-sm">15-01-2021</td>
                        </tr>
                        <tr
                            class="text-gray-700 bg-gray-50 dark:bg-gray-800 hover:bg-gray-100 dark:hover:bg-gray-900 dark:text-gray-400">
                            <td class="px-4 py-3">
                                <div class="flex items-center text-sm">
                                    <div class="relative hidden w-8 h-8 mr-3 rounded-full md:block">
                                        <img class="object-cover w-full h-full rounded-full"
                                            src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-0.3.5&amp;q=80&amp;fm=jpg&amp;crop=entropy&amp;cs=tinysrgb&amp;w=200&amp;facepad=3&amp;fit=facearea&amp;s=707b9c33066bf8808c934c8ab394dff6"
                                            alt="" loading="lazy" />
                                        <div class="absolute inset-0 rounded-full shadow-inner" aria-hidden="true"></div>
                                    </div>
                                    <div>
                                        <p class="font-semibold">Jolina Angelie</p>
                                        <p class="text-xs text-gray-600 dark:text-gray-400">Unemployed</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-4 py-3 text-sm">$369.75</td>
                            <td class="px-4 py-3 text-xs">
                                <span
                                    class="px-2 py-1 font-semibold leading-tight text-yellow-700 bg-yellow-100 rounded-full">
                                    Pending </span>
                            </td>
                            <td class="px-4 py-3 text-sm">23-03-2021</td>
                        </tr>
                        <tr
                            class="text-gray-700 bg-gray-50 dark:bg-gray-800 hover:bg-gray-100 dark:hover:bg-gray-900 dark:text-gray-400">
                            <td class="px-4 py-3">
                                <div class="flex items-center text-sm">
                                    <div class="relative hidden w-8 h-8 mr-3 rounded-full md:block">
                                        <img class="object-cover w-full h-full rounded-full"
                                            src="https://images.unsplash.com/photo-1502720705749-871143f0e671?ixlib=rb-0.3.5&amp;q=80&amp;fm=jpg&amp;crop=entropy&amp;cs=tinysrgb&amp;w=200&amp;fit=max&amp;s=b8377ca9f985d80264279f277f3a67f5"
                                            alt="" loading="lazy" />
                                        <div class="absolute inset-0 rounded-full shadow-inner" aria-hidden="true"></div>
                                    </div>
                                    <div>
                                        <p class="font-semibold">Dave Li</p>
                                        <p class="text-xs text-gray-600 dark:text-gray-400">Influencer</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-4 py-3 text-sm">$775.45</td>
                            <td class="px-4 py-3 text-xs">
                                <span
                                    class="px-2 py-1 font-semibold leading-tight text-gray-700 bg-gray-100 rounded-full dark:text-gray-100 dark:bg-gray-700">
                                    Expired </span>
                            </td>
                            <td class="px-4 py-3 text-sm">09-02-2021</td>
                        </tr>
                        <tr
                            class="text-gray-700 bg-gray-50 dark:bg-gray-800 hover:bg-gray-100 dark:hover:bg-gray-900 dark:text-gray-400">
                            <td class="px-4 py-3">
                                <div class="flex items-center text-sm">
                                    <div class="relative hidden w-8 h-8 mr-3 rounded-full md:block">
                                        <img class="object-cover w-full h-full rounded-full"
                                            src="https://images.unsplash.com/photo-1551006917-3b4c078c47c9?ixlib=rb-1.2.1&amp;q=80&amp;fm=jpg&amp;crop=entropy&amp;cs=tinysrgb&amp;w=200&amp;fit=max&amp;ixid=eyJhcHBfaWQiOjE3Nzg0fQ"
                                            alt="" loading="lazy" />
                                        <div class="absolute inset-0 rounded-full shadow-inner" aria-hidden="true"></div>
                                    </div>
                                    <div>
                                        <p class="font-semibold">Rulia Joberts</p>
                                        <p class="text-xs text-gray-600 dark:text-gray-400">Actress</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-4 py-3 text-sm">$1276.75</td>
                            <td class="px-4 py-3 text-xs">
                                <span
                                    class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">
                                    Approved </span>
                            </td>
                            <td class="px-4 py-3 text-sm">17-04-2021</td>
                        </tr>
                        <tr
                            class="text-gray-700 bg-gray-50 dark:bg-gray-800 hover:bg-gray-100 dark:hover:bg-gray-900 dark:text-gray-400">
                            <td class="px-4 py-3">
                                <div class="flex items-center text-sm">
                                    <div class="relative hidden w-8 h-8 mr-3 rounded-full md:block">
                                        <img class="object-cover w-full h-full rounded-full"
                                            src="https://images.unsplash.com/photo-1566411520896-01e7ca4726af?ixlib=rb-1.2.1&amp;q=80&amp;fm=jpg&amp;crop=entropy&amp;cs=tinysrgb&amp;w=200&amp;fit=max&amp;ixid=eyJhcHBfaWQiOjE3Nzg0fQ"
                                            alt="" loading="lazy" />
                                        <div class="absolute inset-0 rounded-full shadow-inner" aria-hidden="true"></div>
                                    </div>
                                    <div>
                                        <p class="font-semibold">Hitney Wouston</p>
                                        <p class="text-xs text-gray-600 dark:text-gray-400">Singer</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-4 py-3 text-sm">$863.45</td>
                            <td class="px-4 py-3 text-xs">
                                <span
                                    class="px-2 py-1 font-semibold leading-tight text-red-700 bg-red-100 rounded-full dark:text-red-100 dark:bg-red-700">
                                    Denied </span>
                            </td>
                            <td class="px-4 py-3 text-sm">11-01-2021</td>
                        </tr> --}}
                    </tbody>
                </table>
            </div>

        </div>
    </div>
    <!-- ./Docentes Table -->

    <!-- Contact Form -->
    <div class="mx-4 mt-8">
        <div class="grid grid-cols-1 md:grid-cols-2">
            <div class="p-6 mr-2 bg-gray-100 dark:bg-gray-800 sm:rounded-lg">
                <h1 class="text-4xl font-extrabold tracking-tight text-gray-800 sm:text-5xl dark:text-white">
                    Contáctanos</h1>
                <p class="mt-2 text-lg font-medium text-gray-600 text-normal sm:text-2xl dark:text-gray-400">
                    Rellena el formulario y ponte en contacto con nosotros</p>

                <div class="flex items-center mt-8 text-gray-600 dark:text-gray-400">
                    <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                        stroke-width="1.5" viewBox="0 0 24 24" class="w-8 h-8 text-gray-500">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                            d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                            d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                    <div class="w-40 ml-4 font-semibold tracking-wide text-md">Zaragoza, Avenida de Navarra 16, España,
                        50010
                    </div>
                </div>

                <div class="flex items-center mt-4 text-gray-600 dark:text-gray-400">
                    <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                        stroke-width="1.5" viewBox="0 0 24 24" class="w-8 h-8 text-gray-500">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                            d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                    </svg>
                    <div class="w-40 ml-4 font-semibold tracking-wide text-md">976 976 976</div>
                </div>

                <div class="flex items-center mt-4 text-gray-600 dark:text-gray-400">
                    <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                        stroke-width="1.5" viewBox="0 0 24 24" class="w-8 h-8 text-gray-500">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                            d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                    </svg>
                    <div class="w-40 ml-4 font-semibold tracking-wide text-md">contact@contact.com</div>
                </div>
            </div>
            <form class="flex flex-col justify-center p-6">
                <div class="flex flex-col">
                    <label for="name" class="hidden">Nombre completo</label>
                    <input type="name" name="name" id="name" placeholder="Full Name"
                        class="px-3 py-3 mt-2 font-semibold text-gray-800 bg-white border border-gray-400 rounded-lg w-100 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-50 focus:border-blue-500 focus:outline-none" />
                </div>

                <div class="flex flex-col mt-2">
                    <label for="email" class="hidden">Email</label>
                    <input type="email" name="email" id="email" placeholder="Email"
                        class="px-3 py-3 mt-2 font-semibold text-gray-800 bg-white border border-gray-400 rounded-lg w-100 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-50 focus:border-blue-500 focus:outline-none" />
                </div>

                <div class="flex flex-col mt-2">
                    <label for="tel" class="hidden">Telefono</label>
                    <input type="tel" name="tel" id="tel" placeholder="Telephone Number"
                        class="px-3 py-3 mt-2 font-semibold text-gray-800 bg-white border border-gray-400 rounded-lg w-100 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-50 focus:border-blue-500 focus:outline-none" />
                </div>

                <button type="submit"
                    class="px-6 py-3 mt-4 font-bold text-white transition duration-300 ease-in-out bg-blue-600 rounded-lg md:w-32 dark:bg-gray-100 dark:text-gray-800 hover:bg-blue-500 dark:hover:bg-gray-200">Enviar</button>
            </form>
        </div>
    </div>
    <!-- ./Contact Form -->

    <!-- External resources -->
    {{-- <div class="mx-4 mt-8">
        <div
            class="p-4 border border-blue-500 rounded-lg shadow-md bg-blue-50 dark:bg-gray-800 dark:text-gray-50 dark:border-gray-500">
            <h4 class="text-lg font-semibold">Have taken ideas & reused components from the following
                resources:</h4>
            <ul>
                <li class="mt-3">
                    <a class="flex items-center text-blue-700 dark:text-gray-100"
                        href="https://tailwindcomponents.com/component/sidebar-navigation-1" target="_blank">
                        <svg width="20" height="20" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                            class="transition-transform duration-500 ease-in-out transform">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 9l3 3m0 0l-3 3m3-3H8m13 0a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <span class="inline-flex pl-2">Sidebar Navigation</span>
                    </a>
                </li>
                <li class="mt-2">
                    <a class="flex items-center text-blue-700 dark:text-gray-100"
                        href="https://tailwindcomponents.com/component/contact-form-1" target="_blank">
                        <svg width="20" height="20" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                            class="transition-transform duration-500 ease-in-out transform">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 9l3 3m0 0l-3 3m3-3H8m13 0a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <span class="inline-flex pl-2">Contact Form</span>
                    </a>
                </li>
                <li class="mt-2">
                    <a class="flex items-center text-blue-700 dark:text-gray-100"
                        href="https://tailwindcomponents.com/component/trello-panel-clone" target="_blank">
                        <svg width="20" height="20" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                            class="transition-transform duration-500 ease-in-out transform">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 9l3 3m0 0l-3 3m3-3H8m13 0a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <span class="inline-flex pl-2">Section: Task Summaries</span>
                    </a>
                </li>
                <li class="mt-2">
                    <a class="flex items-center text-blue-700 dark:text-gray-100"
                        href="https://windmill-dashboard.vercel.app/" target="_blank">
                        <svg width="20" height="20" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                            class="transition-transform duration-500 ease-in-out transform">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 9l3 3m0 0l-3 3m3-3H8m13 0a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <span class="inline-flex pl-2">Section: Client Table</span>
                    </a>
                </li>
                <li class="mt-2">
                    <a class="flex items-center text-blue-700 dark:text-gray-100"
                        href="https://demos.creative-tim.com/notus-js/pages/admin/dashboard.html" target="_blank">
                        <svg width="20" height="20" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                            class="transition-transform duration-500 ease-in-out transform">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 9l3 3m0 0l-3 3m3-3H8m13 0a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <span class="inline-flex pl-2">Section: Social Traffic</span>
                    </a>
                </li>
                <li class="mt-2">
                    <a class="flex items-center text-blue-700 dark:text-gray-100" href="https://mosaic.cruip.com"
                        target="_blank">
                        <svg width="20" height="20" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                            class="transition-transform duration-500 ease-in-out transform">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 9l3 3m0 0l-3 3m3-3H8m13 0a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <span class="inline-flex pl-2">Section: Recent Activities</span>
                    </a>
                </li>
            </ul>
        </div>
    </div> --}}
    <!-- ./External resources -->
@endsection
