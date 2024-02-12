@extends('layout.templateCRUD')

@section('title', 'Classroom')
@vite(['resources/css/app.css', 'resources/js/app.js'])
@vite('resources/js/modal-delete.js')

@section('content')


    {{-- TABLA CLASSROOM --}}
    <div
        class="p-4 bg-white block sm:flex items-center justify-between border-b border-gray-200 lg:mt-1.5 dark:bg-gray-800 dark:border-gray-700">

        @if ($classes->isEmpty())
            <h3>No hay registros de Docentes</h3>
        @else
            <table class="table">
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

                    </tr>
                </thead>

                @foreach ($classes as $class)
                    <tr>
                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">{{ $class->id }}</td>
                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">{{ $class->class_name }}</td>
                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">{{ $class->user_id }}</td>

                        <td><a class="px-4 py-2 font-bold text-white bg-green-500 border border-green-700 rounded hover:bg-green-700"
                                href="{{ route('classroom.edit', $class->id) }}">Editar</a></td>
                        {{-- PRUEBO CON EL MODAL --}}
                        <td>
                            <!-- This button is used to open the dialog -->
                            <button id="delete-btn"
                                class="px-5 py-2 text-white rounded-md cursor-pointer bg-rose-500 hover:bg-rose-700"
                                onclick="showDialog()">
                                Eliminar
                            </button>
                        </td>
                        @include('classroom.modal.delete-modal')
                    </tr>
                @endforeach
            </table>
            <script>
                function showDialog() {
                    let dialog = document.getElementById('dialog-{{ $class->id }}');
                    dialog.classList.remove('hidden');
                    setTimeout(() => {
                        dialog.classList.remove('opacity-0');
                    }, 20);
                }

                function hideDialog() {
                    let dialog = document.getElementById('dialog-{{ $class->id }}');
                    dialog.classList.add('opacity-0');
                    setTimeout(() => {
                        dialog.classList.add('hidden');
                    }, 500);
                }
            </script>


        @endif
    </div>

@endsection
