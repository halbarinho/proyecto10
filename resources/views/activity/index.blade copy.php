@extends('layout.templateCRUD')

@section('title', 'Actividad')
@vite(['resources/css/app.css', 'resources/js/app.js'])
@vite('resources/js/modal-delete.js')

@section('content')


    {{-- TABLA CLASSROOM --}}
    <div
        class="p-4 bg-white block sm:flex items-center justify-between border-b border-gray-200 lg:mt-1.5 dark:bg-gray-800 dark:border-gray-700">

        @if ($activities->isEmpty())
            <h3>No hay registros de Actividades</h3>
            <a href="{{ route('activity.create') }}">
                <button id="createActivity"
                    class="px-5 py-2 text-white rounded-md cursor-pointer bg-rose-500 hover:bg-rose-700">Crear Nueva
                    Actividad</button>
            </a>
        @else
            <table class="table">
                <thead>
                    <tr>
                        <th
                            class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                            Id</th>
                        <th
                            class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                            Activity Name</th>
                        <th
                            class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                            Tutor</th>

                    </tr>
                </thead>

                @foreach ($activities as $activity)
                    <tr>
                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">{{ $activity->id }}</td>
                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">{{ $activity->class_name }}</td>
                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">{{ $activity->user_id }}</td>

                        <td><a class="px-4 py-2 font-bold text-white bg-green-500 border border-green-700 rounded hover:bg-green-700"
                                href="{{ route('activity.edit', $activity->id) }}">Editar</a></td>
                        {{-- PRUEBO CON EL MODAL --}}
                        <td>
                            <!-- This button is used to open the dialog -->
                            <button id="delete-btn"
                                class="px-5 py-2 text-white rounded-md cursor-pointer bg-rose-500 hover:bg-rose-700"
                                onclick="showDialog()">
                                Eliminar
                            </button>
                        </td>
                        {{-- @include('classroom.modal.delete-modal') --}}
                    </tr>
                @endforeach
            </table>
            <script>
                function showDialog() {
                    let dialog = document.getElementById('dialog-{{ $activity->id }}');
                    dialog.classList.remove('hidden');
                    setTimeout(() => {
                        dialog.classList.remove('opacity-0');
                    }, 20);
                }

                function hideDialog() {
                    let dialog = document.getElementById('dialog-{{ $activity->id }}');
                    dialog.classList.add('opacity-0');
                    setTimeout(() => {
                        dialog.classList.add('hidden');
                    }, 500);
                }
            </script>


        @endif
    </div>

@endsection
