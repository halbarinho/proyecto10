@extends('layout.template-dashboard')

@section('title', 'Gestion Aulas')
@vite(['resources/css/app.css', 'resources/js/app.js'])
@vite('resources/js/modal-delete.js')

@section('content')


    {{-- TABLA CLASSROOM --}}
    {{-- <div class="md:min-h-96 p-4 bg-white sm:flex  border-b border-gray-200 lg:mt-1.5 dark:bg-gray-800 dark:border-gray-700"> --}}
    <div class="relative overflow-x-auto shadow-md md:min-h-96 sm:rounded-lg">

        @if ($classes->isEmpty())
            <h3 class="text-red-600">No hay registros de Aulas</h3>
        @else
            <table class="table w-full text-left">
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
                            <td class="px-6 py-4 leading-4 whitespace-no-wrap border-b border-gray-200">{{ $class->id }}
                            </td>
                            <td class="px-6 py-4 leading-4 whitespace-no-wrap border-b border-gray-200">
                                {{ $class->class_name }}</td>
                            <td class="px-6 py-4 leading-4 whitespace-no-wrap border-b border-gray-200">
                                {{ $class->user_id }}</td>
                            <td>ICONO ALUMNOS</td>
                            <td class="leading-4 text-right">
                                <a class="px-4 py-2 font-bold text-white bg-green-500 border border-green-700 rounded hover:bg-green-700"
                                    href="{{ route('classroom.edit', $class->id) }}">Editar</a>
                                {{-- PRUEBO CON EL MODAL --}}

                                <!-- This button is used to open the dialog -->
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


        @endif
    </div>

@endsection
