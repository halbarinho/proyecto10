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
                    targets: [0, 5, 6, 7, 8],
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
                        <h1 class="text-3xl uppercase">Actividades</h1>
                    </div>
                    <div class="relative overflow-hidden bg-white shadow-md dark:bg-gray-800 sm:rounded-lg">
                        <div
                            class="flex flex-col items-center justify-end p-4 space-y-3 md:flex-row md:space-y-0 md:space-x-4">
                            <div class="w-full">

                                @if ($activities->isEmpty())
                                    <div class="flex justify-between w-full mx-auto">
                                        <h3 class="text-red-600">No hay registros de Actividades</h3>
                                        <a href="{{ route('activity.create') }}">
                                            <button id="createActivity"
                                                class="px-5 py-2 text-white rounded-md cursor-pointer bg-rose-500 hover:bg-rose-700">Crear
                                                Nueva
                                                Actividad</button>
                                        </a>
                                    </div>
                                @else
                                    <div
                                        class="flex flex-col items-stretch flex-shrink-0 w-full space-y-2 md:justify-end md:w-auto md:flex-row md:space-y-0 md:items-center md:space-x-3">
                                        <a class="" href="{{ route('activity.create') }}">
                                            <button type="button" id="createProductModalButton"
                                                class="flex items-center justify-center px-4 py-2 text-sm font-medium text-white bg-red-600 rounded-lg bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 focus:outline-none dark:focus:ring-primary-800">
                                                Añadir Actividad
                                            </button>
                                        </a>
                                    </div>


                                    <div class="mx-3 mb-5">
                                        <span class="">{{ count($activities) }} actividades</span>
                                        <hr class="h-0.5 mt-5 mx-auto border-t-2 border-opacity-100 border-black ">
                                        @include('activity.modal.deleteMultiple-modal')
                                        <form action="{{ route('activity.deleteActivities') }}"
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
                                                    {{-- <input type="submit" value="Eliminar"> --}}
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
                                                                    <th class="">Id</th>
                                                                    <th class="">Título</th>
                                                                    <th class="">Descripción</th>
                                                                    <th class="">Creador</th>
                                                                    <th class="text-right "></th>
                                                                    <th class="text-right "></th>
                                                                    <th class="text-right "></th>
                                                                    <th class="text-right "></th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>

                                                                {{-- @if ($activities->isEmpty())
                                                            <tr class="col-span-3 text-center">
                                                                <td>
                                                                    <h3 class="text-red-600">No hay registros de Actividades
                                                                    </h3>
                                                                </td>
                                                            </tr>
                                                            <hr
                                                                class="h-0.5 mt-5 mx-auto border-t-2 border-opacity-100 border-gray-300">
                                                        @else
                                                            @include('activity.modal.deleteMultiple-modal')
                                                            <form action="{{ route('activity.deleteActivities') }}"
                                                                onsubmit="handleSubmit(event)" method="POST"
                                                                id="form">
                                                                @csrf

                                                                <div
                                                                    class="flex flex-col items-stretch justify-end flex-shrink-0 w-full mb-4 space-y-2 md:w-auto md:flex-row md:space-y-0 md:items-center md:space-x-3">

                                                                    <button
                                                                        class="flex items-center justify-center px-4 py-2 text-sm font-medium text-white bg-red-600 rounded-lg bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 focus:outline-none dark:focus:ring-primary-800"
                                                                        type="submit" id="submitBtn"
                                                                        onclick="showDeleteMultipleModal();event.preventDefault();">Eliminar
                                                                        Seleccionadas
                                                                        {{-- <input type="submit" value="Eliminar"> --}}
                                                                {{-- </button>
                                                         </div> --}}


                                                                {{-- <input type="hidden" name="classroom" value="{{ $classroom }}"> --}}
                                                                @foreach ($activities as $activity)
                                                                    <tr class="border-b dark:border-gray-700 ">

                                                                        <td><input type="checkbox" name="activitiesList[]"
                                                                                value="{{ $activity->id }}"></td>
                                                                        <td class=" max-w-[12rem] truncate">
                                                                            {{ $activity->id }}
                                                                        </td>
                                                                        <td class=" max-w-[12rem] truncate">

                                                                            {{ $activity->activity_name }}
                                                                        </td>
                                                                        <td class=" truncate max-w-[6rem] text-ellipsis">

                                                                            {{ $activity->activity_description }}
                                                                        </td>
                                                                        <td class=" max-w-[12rem] truncate">

                                                                            {{ $activity->docente->user->name }}
                                                                        </td>

                                                                        {{-- Editar --}}
                                                                        <td class="max-w-9 max-h-9">
                                                                            <a href="{{ route('activity.edit', ['activity' => $activity->id]) }}"
                                                                                class="w-9 h-9">
                                                                                <svg viewBox="0 0 24 24" class="w-9 h-9"
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

                                                                        {{-- Corregir --}}
                                                                        @if ($activity->ActivitiesResult->isNotEmpty())
                                                                            <td class="max-w-9 max-h-9">
                                                                                <a href="{{ route('activity.evaluateIndex', ['activity_id' => $activity->id]) }}"
                                                                                    class="w-9 h-9">
                                                                                    <svg class="w-9 h-9"
                                                                                        xmlns="http://www.w3.org/2000/svg"
                                                                                        width="16" height="16"
                                                                                        fill="currentColor"
                                                                                        class="bi bi-check2-square"
                                                                                        viewBox="0 0 16 16">
                                                                                        <path
                                                                                            d="M3 14.5A1.5 1.5 0 0 1 1.5 13V3A1.5 1.5 0 0 1 3 1.5h8a.5.5 0 0 1 0 1H3a.5.5 0 0 0-.5.5v10a.5.5 0 0 0 .5.5h10a.5.5 0 0 0 .5-.5V8a.5.5 0 0 1 1 0v5a1.5 1.5 0 0 1-1.5 1.5H3z" />
                                                                                        <path
                                                                                            d="m8.354 10.354 7-7a.5.5 0 0 0-.708-.708L8 9.293 5.354 6.646a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0z" />
                                                                                    </svg>


                                                                                </a>
                                                                            </td>
                                                                        @else
                                                                            <td>
                                                                                <svg class="w-9 h-9 text-gray-200"
                                                                                    xmlns="http://www.w3.org/2000/svg"
                                                                                    width="16" height="16"
                                                                                    fill="currentColor"
                                                                                    class="bi bi-check2-square"
                                                                                    viewBox="0 0 16 16">
                                                                                    <path
                                                                                        d="M3 14.5A1.5 1.5 0 0 1 1.5 13V3A1.5 1.5 0 0 1 3 1.5h8a.5.5 0 0 1 0 1H3a.5.5 0 0 0-.5.5v10a.5.5 0 0 0 .5.5h10a.5.5 0 0 0 .5-.5V8a.5.5 0 0 1 1 0v5a1.5 1.5 0 0 1-1.5 1.5H3z" />
                                                                                    <path
                                                                                        d="m8.354 10.354 7-7a.5.5 0 0 0-.708-.708L8 9.293 5.354 6.646a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0z" />
                                                                                </svg>
                                                                            </td>
                                                                        @endif

                                                                        {{-- Enviar --}}
                                                                        <td class="max-w-9 max-h-9">
                                                                            {{-- <a href="" class="" ">Enviar</a> --}}
                                                                            <button type="button"
                                                                                id="send-{{ $activity->id }}"
                                                                                class="w-9 h-9"
                                                                                onclick="showSendDialog({{ $activity->id }}); event.preventDefault();">
                                                                                <svg class="w-9 h-9" viewBox="0 0 158 134"
                                                                                    fill="none"
                                                                                    xmlns="http://www.w3.org/2000/svg">
                                                                                    <g clip-path="url(#clip0)">
                                                                                        <path
                                                                                            d="M6.72129 53.8326C5.22886 54.369 3.79008 55.0461 2.42414 55.8549C1.99492 56.0692 1.62306 56.3841 1.33985 56.7732C1.05664 57.1622 0.870351 57.614 0.796627 58.0907C0.728141 58.9623 1.18429 59.8347 2.14826 60.6823C2.95005 61.3417 3.81412 61.9203 4.72808 62.4099C5.42909 62.8132 6.14303 63.1944 6.85696 63.575C7.87906 64.1201 8.93607 64.6808 9.92071 65.3035C23.2735 73.7162 35.4245 81.1753 48.7508 87.2021C48.7223 87.6822 48.6907 88.1609 48.6584 88.6377C48.5679 89.9855 48.4749 91.3782 48.4729 92.7533C48.4699 94.8297 48.4618 96.9073 48.4484 98.9863C48.4141 105.578 48.3786 112.395 48.5989 119.098C48.6784 121.515 49.5403 123.243 51.0256 123.964C52.5872 124.719 54.5946 124.279 56.6783 122.719C57.4297 122.156 58.1998 121.524 59.032 120.785C62.6824 117.545 66.3277 114.298 70.0078 111.02L73.343 108.049C73.3682 108.068 73.3927 108.087 73.4153 108.107L76.4991 110.778C80.01 113.816 83.6397 116.957 87.1829 120.08C88.1921 120.967 89.2071 121.85 90.2279 122.727C93.3395 125.417 96.5596 128.198 99.4515 131.179C100.984 132.756 102.474 133.498 104.264 133.498C105.036 133.487 105.803 133.372 106.546 133.158C109.158 132.442 110.843 130.835 112.011 127.954C116.411 117.096 120.915 106.068 125.269 95.4041C128.844 86.644 132.416 77.8832 135.985 69.1212C143.674 50.3116 150.308 31.082 155.854 11.5231C156.526 9.25442 156.998 6.93056 157.266 4.57852C157.355 4.03355 157.322 3.47531 157.169 2.945C157.015 2.41468 156.745 1.92589 156.379 1.51476C155.937 1.11363 155.412 0.817045 154.841 0.646857C154.272 0.476668 153.671 0.437215 153.083 0.531243C152.306 0.62523 151.539 0.799482 150.796 1.05151L150.696 1.08216C149.028 1.58303 147.355 2.06949 145.682 2.5567C141.796 3.6879 137.778 4.85757 133.878 6.19107C105.715 15.8287 77.1517 26.3209 48.9821 37.3766C40.8575 40.564 32.5849 43.7787 24.5844 46.8861C18.6266 49.1966 12.6722 51.5121 6.72129 53.8326ZM60.3339 83.5438C61.8845 82.2395 63.3543 81.0069 64.863 79.8484C70.7773 75.3015 76.6975 70.7617 82.6228 66.2304C94.2653 57.3147 106.305 48.0953 118.081 38.9404C121.682 36.1433 125.099 32.9988 128.404 29.9637C129.539 28.9229 130.673 27.8776 131.816 26.8465C132.728 26.0243 134.254 24.6486 133.408 21.9607C133.38 21.8729 133.335 21.7918 133.275 21.7225C133.215 21.6532 133.141 21.5973 133.059 21.5582C132.976 21.5193 132.886 21.4978 132.794 21.4951C132.703 21.4924 132.612 21.5085 132.527 21.5424C132.174 21.6862 131.833 21.8131 131.504 21.9328C130.819 22.1684 130.152 22.4534 129.508 22.7856C107.655 34.7331 88.645 50.3999 70.2617 65.552C66.1042 68.9781 62.1856 72.5122 58.0409 76.2499C56.2809 77.8377 54.5032 79.432 52.7074 81.0335L11.7046 58.6697C11.9409 58.5229 12.189 58.3963 12.4463 58.2911C19.0407 55.791 25.6326 53.2819 32.2218 50.7636C48.3566 44.61 65.0432 38.2463 81.5231 32.1929C96.1997 26.8017 111.219 21.5788 125.743 16.5278C130.572 14.8487 135.401 13.1663 140.228 11.4807C142.099 10.8263 143.986 10.3144 145.986 9.77318C146.515 9.63008 147.047 9.48508 147.581 9.33807C139.534 35.016 129.269 60.2022 119.336 84.5728C114.116 97.3783 108.723 110.61 103.68 123.835C89.9733 112.724 76.6781 100.978 63.8163 89.6134C62.0792 88.077 60.3384 86.5399 58.5939 85.0022C59.187 84.5045 59.7653 84.0193 60.3319 83.5438H60.3339ZM67.952 103.131L56.1931 113.163L55.2608 91.3281L67.952 103.131Z"
                                                                                            fill="black" />
                                                                                    </g>
                                                                                    <defs>
                                                                                        <clipPath id="clip0">
                                                                                            <rect width="157"
                                                                                                height="134"
                                                                                                fill="white"
                                                                                                transform="translate(0.777344)" />
                                                                                        </clipPath>
                                                                                    </defs>
                                                                                </svg>
                                                                            </button>
                                                                        </td>

                                                                        {{-- Eliminar --}}
                                                                        <td class="max-w-9 max-h-9">
                                                                            <button type="button"
                                                                                id="delete-{{ $activity->id }}"
                                                                                class="w-9 h-9"
                                                                                onclick="showDialog({{ $activity->id }}); event.preventDefault();">
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

                                                                {{-- </form> --}}
                                                                {{-- {{ Log::info($classrooms) }} --}}
                                                                {{-- @foreach ($activities as $activity)
                                                                    @include('activity.modal.delete-modal')
                                                                    @include('activity.modal.send-modal')
                                                                @endforeach --}}

                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>

                                        @foreach ($activities as $activity)
                                            @include('activity.modal.delete-modal')
                                            @include('activity.modal.send-modal')
                                        @endforeach

                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </section>


        </div>
    </main>
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

        function deleteActivity(id) {


            fetch(`/activity/${id}`, {
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

        function showSendDialog(id) {



            let dialog = document.getElementById('sendDialog-' + id);
            dialog.classList.remove('hidden');
            setTimeout(() => {
                dialog.classList.remove('opacity-0');
            }, 20);
        }

        function hideSendDialog(id) {

            let dialog = document.getElementById('sendDialog-' + id);
            dialog.classList.add('opacity-0');
            setTimeout(() => {
                dialog.classList.add('hidden');
            }, 500);
        }


        function handleSubmit(event) {

            // event.preventDefault();

            let selectedActivities = document.querySelectorAll('input[name="activitiesList[]"]:checked');

            let selectedIds = Array.from(selectedActivities).map(selectedActivities => selectedActivities.value);

            console.log(selectedIds);

            // let formData = new FormData(form);
            // let activitiesList = formData.getAll('activitiesList[]');
            // console.log('de vedad', activitiesList);
            // event.preventDefault();

            if (selectedIds.length < 1) {
                location.reload();
            } else {
                showDeleteMultipleModal();
            }

        }


        function showDeleteMultipleModal() {
            let deleteMultipleModal = document.getElementById('deleteMultipleModal');
            deleteMultipleModal.classList.remove('hidden');
            setTimeout(() => {
                deleteMultipleModal.classList.remove('opacity-0');
            }, 20);
        }

        function hideDeleteMultipleModal() {
            let deleteMultipleModal = document.getElementById('deleteMultipleModal');
            deleteMultipleModal.classList.add('opacity-0');
            setTimeout(() => {
                deleteMultipleModal.classList.add('hidden');
            }, 500);
        }

        function submitDeleteMultipleForm() {
            let form = document.getElementById('form');
            form.submit();
        }
    </script>
@endsection
