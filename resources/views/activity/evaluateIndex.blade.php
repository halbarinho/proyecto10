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
                    [3, "desc"]
                ],
                columnDefs: [{
                    targets: [0, 5, 6, ],
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

    <script>
        let selectedActivityId;
        let selectedStudentId;

        function showDialog(id, studentId) {

            selectedActivityId = id;
            selectedStudentId = studentId;

            let dialog = document.getElementById('dialog');
            dialog.classList.remove('hidden');
            setTimeout(() => {
                dialog.classList.remove('opacity-0');
            }, 20);
        }

        function hideDialog() {

            let dialog = document.getElementById('dialog');
            dialog.classList.add('opacity-0');
            setTimeout(() => {
                dialog.classList.add('hidden');
            }, 500);
        }

        function deleteActivity() {

            // console.log('aqui');

            fetch(`/activitiesResult/${selectedActivityId}/${selectedStudentId}`, {
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
                    console.error('Ha habido un error al intentar eliminar la actividad:', error);
                });
        }
    </script>

@endsection

@section('title', 'Listado Actividades')

@vite(['resources/js/app.js'])

@section('content')

    <main>
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
                        <h1 class="text-3xl uppercase">Actividades para Evaluar</h1>
                    </div>
                    <div class="relative overflow-hidden bg-white shadow-md dark:bg-gray-800 sm:rounded-lg">
                        <div
                            class="flex flex-col items-center justify-end p-4 space-y-3 md:flex-row md:space-y-0 md:space-x-4">
                            <div class="w-full">

                                @if ($activities->isEmpty())
                                    <div class="flex justify-between w-full mx-auto">
                                        <h3 class="text-red-600">No hay registros de Actividades para evaluar</h3>
                                        <a href="{{ route('activity.create') }}">
                                            <button id="createActivity"
                                                class="px-5 py-2 text-white rounded-md cursor-pointer bg-rose-500 hover:bg-rose-700">Crear
                                                Nueva
                                                Actividad</button>
                                        </a>
                                        <a href="{{ route('activity.index') }}">
                                            <button id="createActivity"
                                                class="px-5 py-2 text-sm font-medium text-white bg-blue-500 rounded-lg cursor-pointerpx-4 hover:bg-blue-600 focus:ring-4 focus:ring-blue-300 focus:outline-none">Indice
                                                Actividades</button>
                                        </a>
                                    </div>
                                @else
                                    <div
                                        class="flex flex-col items-stretch flex-shrink-0 w-full space-y-2 md:justify-end md:w-auto md:flex-row md:space-y-0 md:items-center md:space-x-3">
                                        <a class="" href="{{ route('activity.create') }}">
                                            <button type="button" id="createProductModalButton"
                                                class="justify-end px-4 py-2 font-bold text-white rounded-md bg-blueLighterPersonal border-blueLighterPersonal hover:bg-blueLightPersonal">
                                                Añadir Actividad
                                            </button>
                                        </a>
                                    </div>


                                    <div class="mx-3 mb-5">
                                        <span class="">{{ count($activities) }} actividades</span>
                                        <hr class="h-0.5 mt-5 mx-auto border-t-2 border-opacity-100 border-black ">
                                        @include('activity.modal.deleteMultiple-modal')
                                        <form action="{{ route('activitiesResult.deleteActivities') }}"
                                            onsubmit="handleSubmit(event);event.preventDefault();" method="POST"
                                            id="form">
                                            @csrf

                                            <div
                                                class="flex flex-col items-stretch justify-end flex-shrink-0 w-full mb-4 space-y-2 md:w-auto md:flex-row md:space-y-0 md:items-center md:space-x-3">

                                                <button
                                                    class="flex items-center justify-center px-4 py-2 text-sm font-medium text-white bg-red-600 rounded-lg bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 focus:outline-none dark:focus:ring-primary-800"
                                                    type="submit" id="submitBtn"
                                                    onclick="showDeleteMultipleModal();event.preventDefault();">Eliminar
                                                    Seleccionadas

                                                </button>
                                            </div>


                                            <div class="mx-3 mb-5 data-table-container">
                                                <div class="px-4 py-4 -mx-4 overflow-x-auto sm:-mx-8 sm:px-8">
                                                    <div class="inline-block min-w-full overflow-hidden rounded-lg shadow">
                                                        <table id="activitiesTable"
                                                            class="min-w-full text-sm leading-normal text-left text-gray-500 table-auto dark:text-gray-400">
                                                            <thead
                                                                class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                                                <tr>
                                                                    <th class=""></th>
                                                                    <th class="">Clase</th>
                                                                    <th class="">Estudiante</th>
                                                                    <th class="">Estado</th>
                                                                    <th class="">Evaluación</th>
                                                                    <th class="text-right "></th>
                                                                    <th class="text-right "></th>

                                                                </tr>
                                                            </thead>
                                                            <tbody>

                                                                @foreach ($activities as $activity)
                                                                    <tr class="border-b dark:border-gray-700 ">

                                                                        <td><input type="checkbox" name="activitiesList[]"
                                                                                value="{{ $activity->id }}">
                                                                        </td>
                                                                        <td class=" max-w-[12rem] truncate">
                                                                            {{ $activity->class_id }}
                                                                        </td>
                                                                        <td class=" max-w-[12rem] truncate">

                                                                            {{ $activity->estudiante->user->name }}
                                                                            {{ $activity->estudiante->user->last_name_1 }}
                                                                            {{ $activity->estudiante->user->last_name_2 }}
                                                                        </td>
                                                                        @if ($activity->status == 'pending')
                                                                            <td class="text-right">
                                                                                <span
                                                                                    class=" px-2 py-0.5 ml-auto text-xs text-center font-medium tracking-wide text-green-600 bg-green-200 rounded-full">Pendiente</span>
                                                                            </td>
                                                                        @else
                                                                            <td class="text-right">
                                                                                <span
                                                                                    class=" px-2 py-0.5 ml-auto text-xs font-medium tracking-wide text-red-600 bg-red-200 rounded-full text-center">Completada</span>
                                                                            </td>
                                                                        @endif

                                                                        @if ($activity->evaluated == 'pending')
                                                                            <td class="text-right">
                                                                                <span
                                                                                    class=" px-2 py-0.5 ml-auto text-xs text-center font-medium tracking-wide text-green-600 bg-green-200 rounded-full">Pendiente</span>
                                                                            </td>
                                                                        @else
                                                                            <td class="text-right">
                                                                                <span
                                                                                    class=" px-2 py-0.5 ml-auto text-xs font-medium tracking-wide text-red-600 bg-red-200 rounded-full text-center">Evaluada</span>
                                                                            </td>
                                                                        @endif

                                                                        {{-- Corregir --}}

                                                                        <td class="max-w-9 max-h-9">
                                                                            @if ($activity->status == 'pending')
                                                                                <svg viewBox="0 0 24 24"
                                                                                    class="text-gray-200 w-9 h-9"
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
                                                                            @else
                                                                                <a href="{{ route('activity.evaluateActivity', ['student_id' => $activity->estudiante_id, 'activity_id' => $activity->activity_id]) }}"
                                                                                    class="w-9 h-9">
                                                                                    <svg viewBox="0 0 24 24" class="w-9 h-9"
                                                                                        xmlns="http://www.w3.org/2000/svg"
                                                                                        fill="none" stroke="currentColor"
                                                                                        stroke-width="2"
                                                                                        stroke-linecap="round"
                                                                                        stroke-linejoin="round">
                                                                                        <path
                                                                                            d=" M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    2 0 0 0 2-2v-7" />
                                                                                        <path
                                                                                            d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z" />
                                                                                    </svg>

                                                                                </a>
                                                                            @endif
                                                                        </td>



                                                                        {{-- Eliminar --}}
                                                                        <td class="max-w-9 max-h-9">
                                                                            <button type="button"
                                                                                id="delete-{{ $activity->id }}"
                                                                                class="w-9 h-9"
                                                                                onclick="showDialog({{ $activity->activity_id }}, {{ $activity->estudiante_id }}); event.preventDefault();">
                                                                                <svg version="1.1" width="36"
                                                                                    height="36" viewBox="0 0 36 36"
                                                                                    preserveAspectRatio="xMidYMid meet"
                                                                                    xmlns="http://www.w3.org/2000/svg"
                                                                                    xmlns:xlink="http://www.w3.org/1999/xlink">
                                                                                    <title>trash-line</title>
                                                                                    <path
                                                                                        class="clr-i-outline clr-i-outline-path-1"
                                                                                        d=" M27.14,34H8.86A2.93,2.93,0,0,1,6,31V11.23H8V31a.93.93,0,0,0,.86,1H27.14A.93.93,0,0,0,28,31V11.23h2V31A2.93,2.93,0,0,1,27.14,34Z" />
                                                                                    <path
                                                                                        class="clr-i-outline clr-i-outline-path-2"d="M30.78,9H5A1,1,0,0,1,5,7H30.78a1,1,0,0,1,0,2Z">
                                                                                    </path>
                                                                                    <rect
                                                                                        class="clr-i-outline clr-i-outline-path-3"
                                                                                        x="21" y="13" width="2"
                                                                                        height="15">
                                                                                    </rect>
                                                                                    <rect
                                                                                        class="clr-i-outline clr-i-outline-path-4"
                                                                                        x="13" y="13" width="2"
                                                                                        height="15">
                                                                                    </rect>
                                                                                    <path
                                                                                        class="clr-i-outline clr-i-outline-path-5"
                                                                                        d="M23,5.86H21.1V4H14.9V5.86H13V4a2,2,0,0,1,1.9-2h6.2A2,2,0,0,1,23,4Z">
                                                                                    </path>
                                                                                    <rect x="0" y="0" width="36"
                                                                                        height="36" fill-opacity="0" />
                                                                                </svg>
                                                                            </button>
                                                                        </td>
                                                                    </tr>
                                                                @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>

                                    </div>
                                    @include('activity.modal.deleteActivityEvaluated-modal')
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </section>


        </div>
    </main>

@endsection
