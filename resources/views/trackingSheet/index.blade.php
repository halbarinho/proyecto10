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
    @if ($trackingSheets->isNotEmpty())
        <script>
            $(document).ready(function() {
                $('#classTable').DataTable({
                    "order": [
                        [1, "desc"]
                    ],
                    columnDefs: [{
                        targets: [2],
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
    <script type="text/javascript">
        function showTrackingSheet(sheet) {

            let dialog = document.getElementById('showTrackingSheet');
            dialog.classList.remove('hidden');
            setTimeout(() => {
                dialog.classList.remove('opacity-0');
            }, 20);

            document.getElementById('observations').value = sheet.observations;
            document.getElementById('trackingSheetId').value = sheet.id;
            document.getElementById('studentId').value = sheet.student_id;

        }

        function hideTrackingSheet() {

            let dialog = document.getElementById('showTrackingSheet');
            dialog.classList.add('opacity-0');
            setTimeout(() => {
                dialog.classList.add('hidden');
            }, 500);
        }

        function submit() {
            document.getElementById('updateForm').submit();
        }
    </script>

    <script>
        let sheetToDeleteId;

        function showDialog(id) {

            sheetToDeleteId = id;

            let dialog = document.getElementById('deleteDialog');
            dialog.classList.remove('hidden');
            setTimeout(() => {
                dialog.classList.remove('opacity-0');
            }, 20);
        }

        function hideDialog() {

            let dialog = document.getElementById('deleteDialog');
            dialog.classList.add('opacity-0');
            setTimeout(() => {
                dialog.classList.add('hidden');
            }, 500);
        }

        function deleteSheet() {

            if (!sheetToDeleteId) {
                console.error('No se ha proporcionado un ID de sheet para eliminar.');
                return;
            }

            fetch(`/trackingSheet/${sheetToDeleteId}`, {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Content-Type': 'application/json'
                    },
                })
                .then(response => {
                    // if (!response.ok) {
                    //     throw new Error('Network response was not ok');
                    // }
                    // Recarga la página
                    location.reload(); // O cualquier otra acción necesaria
                })
                .catch(error => {
                    console.error('Ha habido un error al intentar eliminar la hoja:', error);
                });
        }
    </script>

@endsection


@section('title', 'TrackingSheet Alumno')

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
                        <h1 class="text-3xl uppercase">Hojas de Seguimiento de {{ $student->user->name }}
                            {{ $student->user->last_name_1 }} {{ $student->user->last_name_2 }}</h1>
                    </div>
                    <div class="relative overflow-hidden bg-white shadow-md dark:bg-gray-800 sm:rounded-lg">

                        <div class="mx-3 mb-5">
                            <span class="">{{ count($trackingSheets) }} hojas de seguimiento</span>
                            <hr class="h-0.5 mt-5 mx-auto border-t-2 border-opacity-100 border-black ">
                        </div>
                        <div class="mx-3 mb-5 data-table-container">
                            <div class="px-4 py-4 -mx-4 overflow-x-auto sm:-mx-8 sm:px-8">
                                <div class="inline-block min-w-full px-4 mx-3 overflow-hidden rounded-lg shadow">
                                    <table id="classTable"
                                        class="min-w-full mx-3 text-sm leading-normal text-left text-gray-500 table-auto dark:text-gray-400">
                                        <thead
                                            class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                            <tr>
                                                {{-- <th class="px-4 py-4">Estado</th> --}}
                                                <th class="py-3 ">Contenido</th>
                                                <th class="py-3 text-right ">Fecha Última Actualización</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            @if ($trackingSheets->isEmpty())
                                                <tr class="col-span-3 text-center">
                                                    <td class="text-red-600">No hay registros</td>
                                                </tr>
                                                <hr
                                                    class="h-0.5 mt-5 mx-auto border-t-2 border-opacity-100 border-gray-300">
                                            @else
                                                @foreach ($trackingSheets as $sheet)
                                                    <tr class="border-b dark:border-gray-700 ">
                                                        <td
                                                            class="py-3 font-medium text-center text-gray-900 truncate  whitespace-nowrap dark:text-white">
                                                            {{ $sheet->observations }}
                                                        </td>

                                                        <td class="py-3 truncate ">
                                                            {{ $sheet->updated_at->format('d-m-Y h:m') }}
                                                        </td>
                                                        {{--
                                                        <td class="px-4 py-3 max-w-[12rem]">

                                                        </td> --}}

                                                        <td class="flex items-center justify-end py-3">



                                                            {{-- <a
                                                                href="{{ route('trackingSheet.edit', ['trackingSheet' => $sheet]) }}"> --}}

                                                            <svg class="w-7 h-7" xmlns="http://www.w3.org/2000/svg"
                                                                viewBox="0 0 32 32">

                                                                <g id="_15_notification-text"
                                                                    data-name="15 notification-text"
                                                                    onclick="showTrackingSheet({{ json_encode($sheet) }})">
                                                                    <rect x="8" y="10" width="15.75" height="2" />
                                                                    <rect x="8" y="15" width="15.75" height="2" />
                                                                    <rect x="8" y="20" width="8" height="2" />
                                                                    <path
                                                                        d="M29,6a3,3,0,0,0-5.22-2H7A3,3,0,0,0,4,7V25a3,3,0,0,0,3,3H25a3,3,0,0,0,3-3V8.22A3,3,0,0,0,29,6ZM26,5a1,1,0,1,1-1,1A1,1,0,0,1,26,5Zm0,20a1,1,0,0,1-1,1H7a1,1,0,0,1-1-1V7A1,1,0,0,1,7,6H23a3,3,0,0,0,3,3Z" />
                                                                </g>
                                                            </svg>

                                                            {{-- </a> --}}




                                                            {{-- <a href="{{ route('trackingSheet.destroy', ['trackingSheet' => $sheet]) }}"> --}}
                                                            <div onclick="showDialog({{ $sheet->id }})">
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
                                                            </div>
                                                        </td>

                                                    </tr>
                                                @endforeach
                                                @include('trackingSheet.modal.tracking-modal')
                                                @include('trackingSheet.modal.delete-modal')
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
