@extends('layout.template-dashboard')

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
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @elseif (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if ($activities->isEmpty())
                <h3>No hay registros de Actividades</h3>
                <a href="{{ route('activity.create') }}">
                    <button id="createActivity"
                        class="px-5 py-2 text-white rounded-md cursor-pointer bg-rose-500 hover:bg-rose-700">Crear Nueva
                        Actividad</button>
                </a>
            @else
                <section class="p-3 antialiased bg-gray-50 dark:bg-gray-900 sm:p-5">
                    <div class="max-w-screen-xl px-4 mx-auto lg:px-12">
                        <div
                            class="flex flex-col items-center justify-between p-4 space-y-3 md:flex-row md:space-y-0 md:space-x-4">
                            <h1 class="text-3xl uppercase">Actividades</h1>
                        </div>
                        <div class="relative overflow-hidden bg-white shadow-md dark:bg-gray-800 sm:rounded-lg">
                            <div
                                class="flex flex-col items-center justify-between p-4 space-y-3 md:flex-row md:space-y-0 md:space-x-4">
                                <div class="w-full md:w-1/2">
                                    {{-- form para busqueda --}}
                                    <form class="flex items-center" onsubmit="handleSubmit(event)">
                                        <label for="simple-search" class="sr-only">Search</label>
                                        <div class="relative w-full">
                                            <div
                                                class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                                <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400"
                                                    fill="currentColor" viewbox="0 0 20 20"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd"
                                                        d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                                        clip-rule="evenodd" />
                                                </svg>
                                            </div>
                                            <input type="text" id="simple-search"
                                                class="block w-full p-2 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                placeholder="Search" required="">
                                        </div>
                                    </form>
                                </div>
                                <div
                                    class="flex flex-col items-stretch justify-end flex-shrink-0 w-full space-y-2 md:w-auto md:flex-row md:space-y-0 md:items-center md:space-x-3">
                                    <button type="button" id="createProductModalButton"
                                        class="flex items-center justify-center px-4 py-2 text-sm font-medium text-white bg-red-800 rounded-lg bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 focus:outline-none dark:focus:ring-primary-800">
                                        Añadir Actividad
                                    </button>

                                </div>
                            </div>
                            <div class="mx-3 mb-5">
                                <span class="">{{ count($activities) }} actividades</span>
                                <hr class="h-0.5 mt-5 mx-auto border-t-2 border-opacity-100 border-black ">
                            </div>
                            <div class="mx-2 overflow-x-auto">
                                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                    <thead
                                        class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                        <tr>
                                            <th class="px-4 py-4"></th>
                                            <th class="px-4 py-3">Id</th>
                                            <th class="px-4 py-3">Título</th>
                                            <th class="px-4 py-3">Descripción</th>
                                            <th class="px-4 py-3">Creador</th>
                                            <th class="px-4 py-3 text-right"></th>
                                            <th class="px-4 py-3 text-right"></th>
                                            <th class="px-4 py-3 text-right"></th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @if ($activities->isEmpty())
                                            <tr class="col-span-3 text-center">
                                                <td class="text-red-600">No hay registros de Actividades</td>
                                            </tr>
                                            <hr class="h-0.5 mt-5 mx-auto border-t-2 border-opacity-100 border-gray-300">
                                        @else
                                            <form action="{{ route('activity.deleteActivities') }}" method="POST"
                                                id="form">
                                                @csrf
                                                {{-- @method('PUT') --}}
                                                <div
                                                    class="flex flex-col items-stretch justify-end flex-shrink-0 w-full mb-4 space-y-2 md:w-auto md:flex-row md:space-y-0 md:items-center md:space-x-3">

                                                    <button
                                                        class="flex items-center justify-center px-4 py-2 text-sm font-medium text-white bg-green-600 rounded-lg bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 focus:outline-none dark:focus:ring-primary-800"
                                                        type="button" id="deleteActivities">Enviar Actividad</button>

                                                    <button
                                                        class="flex items-center justify-center px-4 py-2 text-sm font-medium text-white bg-red-600 rounded-lg bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 focus:outline-none dark:focus:ring-primary-800"
                                                        type="submit" id="submit">Eliminar
                                                        {{-- <input type="submit" value="Eliminar"> --}}
                                                    </button>
                                                </div>
                                                {{-- <input type="hidden" name="classroom" value="{{ $classroom }}"> --}}
                                                @foreach ($activities as $activity)
                                                    <tr class="border-b dark:border-gray-700 ">
                                                        {{-- <td
                                                    class="px-4 py-3 font-medium text-center text-gray-900 whitespace-nowrap dark:text-white">
                                                    </td> --}}
                                                        <td><input type="checkbox" name="activitiesList[]"
                                                                value="{{ $activity->id }}"></td>
                                                        <td class="px-4 py-3 max-w-[12rem] truncate">
                                                            {{ $activity->id }}
                                                        </td>
                                                        <td class="px-4 py-3 max-w-[12rem] truncate">

                                                            {{ $activity->activity_name }}
                                                        </td>
                                                        <td class="px-4 py-3 max-w-[12rem] truncate">

                                                            {{ $activity->activity_description }}
                                                        </td>
                                                        <td class="px-4 py-3 max-w-[12rem] truncate">

                                                            {{ $activity->docente->user->name }}
                                                        </td>

                                                        {{-- Editar --}}
                                                        <td class="">
                                                            <a href="{{ route('activity.edit', ['activity' => $activity->id]) }}"
                                                                class="w-9 h-9">
                                                                <svg width="36" height="36" viewBox="0 0 24 24"
                                                                    xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                    stroke="currentColor" stroke-width="2"
                                                                    stroke-linecap="round" stroke-linejoin="round">
                                                                    <path
                                                                        d=" M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2
                                                                                                                                                                                                                                                        2 0 0 0 2-2v-7" />
                                                                    <path
                                                                        d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z" />
                                                                </svg>

                                                            </a>
                                                        </td>



                                                        {{-- <td>
                                                            <a class="px-4 py-2 font-bold text-white bg-green-500 border border-green-700 rounded hover:bg-green-700"
                                                                href="{{ route('activity.edit', $activity->id) }}">Editar</a>
                                                        </td> --}}

                                                        {{-- Enviar --}}
                                                        <td class="">
                                                            {{-- <a href="" class="" ">Enviar</a> --}}
                                                            <button type="button" id="send-{{ $activity->id }}"
                                                                class="w-9 h-9"
                                                                onclick="showSendDialog({{ $activity->id }}); event.preventDefault();">
                                                                Enviar
                                                            </button>
                                                        </td>

                                                        {{-- Eliminar --}}
                                                        <td>
                                                            <button type="button" id="delete-{{ $activity->id }}"
                                                                class="w-9 h-9"
                                                                onclick="showDialog({{ $activity->id }}); event.preventDefault();">
                                                                <svg version="1.1" width="36" height="36"
                                                                    viewBox="0 0 36 36" preserveAspectRatio="xMidYMid meet"
                                                                    xmlns="http://www.w3.org/2000/svg"
                                                                    xmlns:xlink="http://www.w3.org/1999/xlink">
                                                                    <title>trash-line</title>
                                                                    <path class="clr-i-outline clr-i-outline-path-1"
                                                                        d=" M27.14,34H8.86A2.93,2.93,0,0,1,6,31V11.23H8V31a.93.93,0,0,0,.86,1H27.14A.93.93,0,0,0,28,31V11.23h2V31A2.93,2.93,0,0,1,27.14,34Z" />
                                                                    <path
                                                                        class="clr-i-outline clr-i-outline-path-2"d="M30.78,9H5A1,1,0,0,1,5,7H30.78a1,1,0,0,1,0,2Z">
                                                                    </path>
                                                                    <rect class="clr-i-outline clr-i-outline-path-3" x="21"
                                                                        y="13" width="2" height="15"></rect>
                                                                    <rect class="clr-i-outline clr-i-outline-path-4" x="13"
                                                                        y="13" width="2" height="15"></rect>
                                                                    <path class="clr-i-outline clr-i-outline-path-5"
                                                                        d="M23,5.86H21.1V4H14.9V5.86H13V4a2,2,0,0,1,1.9-2h6.2A2,2,0,0,1,23,4Z">
                                                                    </path>
                                                                    <rect x="0" y="0" width="36" height="36"
                                                                        fill-opacity="0" />
                                                                </svg>
                                                            </button>
                                                        </td>
                                                    </tr>
                                                @endforeach

                                            </form>
                                            {{ Log::info($classrooms) }}
                                            @foreach ($activities as $activity)
                                                @include('activity.modal.delete-modal')
                                                @include('activity.modal.send-modal')
                                            @endforeach
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                            <nav class="flex flex-col items-start justify-between p-4 space-y-3 md:flex-row md:items-center md:space-y-0"
                                aria-label="Table navigation">
                                <span class="text-sm font-normal text-gray-500 dark:text-gray-400">
                                    Mostrando
                                    <span class="font-semibold text-gray-900 dark:text-white">1-10</span>
                                    de
                                    <span class="font-semibold text-gray-900 dark:text-white">1000</span>
                                </span>
                                <ul class="inline-flex items-stretch -space-x-px">
                                    <li>
                                        <a href="#"
                                            class="flex items-center justify-center h-full py-1.5 px-3 ml-0 text-gray-500 bg-white rounded-l-lg border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                                            <span class="sr-only">Previous</span>
                                            <svg class="w-5 h-5" aria-hidden="true" fill="currentColor"
                                                viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd"
                                                    d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#"
                                            class="flex items-center justify-center px-3 py-2 text-sm leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">1</a>
                                    </li>
                                    <li>
                                        <a href="#"
                                            class="flex items-center justify-center px-3 py-2 text-sm leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">2</a>
                                    </li>
                                    <li>
                                        <a href="#" aria-current="page"
                                            class="z-10 flex items-center justify-center px-3 py-2 text-sm leading-tight border text-primary-600 bg-primary-50 border-primary-300 hover:bg-primary-100 hover:text-primary-700 dark:border-gray-700 dark:bg-gray-700 dark:text-white">3</a>
                                    </li>
                                    <li>
                                        <a href="#"
                                            class="flex items-center justify-center px-3 py-2 text-sm leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">...</a>
                                    </li>
                                    <li>
                                        <a href="#"
                                            class="flex items-center justify-center px-3 py-2 text-sm leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">100</a>
                                    </li>
                                    <li>
                                        <a href="#"
                                            class="flex items-center justify-center h-full py-1.5 px-3 leading-tight text-gray-500 bg-white rounded-r-lg border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                                            <span class="sr-only">Next</span>
                                            <svg class="w-5 h-5" aria-hidden="true" fill="currentColor"
                                                viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd"
                                                    d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </section>
            @endif

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
                    console.error('There has been a problem with your fetch operation:', error);
                });
        }

        function handleSubmit(event) {


            let form = document.getElementById('form');

            let formData = new FormData(form);
            let activitiesList = formData.getAll('activitiesList[]');
            console.log('de vedad', activitiesList);
            // event.preventDefault();

            if (activitiesList.length < 1) {
                location.reload();
            } else {
                form.submit();
            }

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
    </script>
@endsection
