@extends('layout.templateCRUD')

@section('title', 'Usuarios')
@vite(['resources/css/app.css', 'resources/js/app.js'])
@vite('resources/js/modal-delete.js')

@section('content')


    {{-- TABLA DOCENTE --}}
    <div
        class="p-4 bg-white block sm:flex items-center justify-between border-b border-gray-200 lg:mt-1.5 dark:bg-gray-800 dark:border-gray-700">

        @if ($docentes->isEmpty())
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
                            Dni/Nie</th>
                        <th
                            class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                            Nombre</th>
                        <th
                            class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                            Primer Apellido</th>
                        <th
                            class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                            Segundo Apellido</th>
                        <th
                            class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                            Genero</th>
                        <th
                            class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                            Email</th>
                        <th
                            class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                            Foto Perfil</th>
                        <th
                            class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                            Especialidad</th>
                    </tr>
                </thead>

                @foreach ($docentes as $docente)
                    <tr>
                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">{{ $docente->User->id }}</td>
                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">{{ $docente->User->dni }}</td>
                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">{{ $docente->User->name }}</td>
                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">{{ $docente->User->last_name_1 }}
                        </td>
                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">{{ $docente->User->last_name_2 }}
                        </td>
                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">{{ $docente->User->gender }}</td>
                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">{{ $docente->User->email }}</td>
                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                            {{ $docente->User->profile_photo }}
                        </td>
                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">{{ $docente->speciality }}</td>
                        {{-- <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200"><a
                            class="px-4 py-2 font-bold text-white bg-red-500 border border-red-700 rounded hover:bg-red-700"
                            href="{{ route('user.destroy', $docente->User->id) }}">Delete</a></td> --}}
                        {{-- ESTE FORM FUNCIONA --}}
                        {{-- <td>
                        <form action="{{ route('user.destroy', $docente->User->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <input type="submit" value="Delete"
                                class="px-4 py-2 font-bold text-white bg-red-500 border border-red-700 rounded hover:bg-red-700">
                        </form>
                    </td> --}}

                        <td><a class="px-4 py-2 font-bold text-white bg-green-500 border border-green-700 rounded hover:bg-green-700"
                                href="{{ route('user.edit', $docente->User->id) }}">Editar</a></td>

                        {{-- PRUEBO CON EL MODAL --}}
                        <td>
                            <!-- This button is used to open the dialog -->
                            <button id="delete-btn"
                                class="px-5 py-2 text-white rounded-md cursor-pointer bg-rose-500 hover:bg-rose-700"
                                onclick="showDialog()">
                                Eliminar
                            </button>
                        </td>
                        @include('user.modal.delete-modal')
                    </tr>
                @endforeach
            </table>

            <script>
                function showDialog() {
                    let dialog = document.getElementById('dialog-{{ $docente->User->id }}');
                    dialog.classList.remove('hidden');
                    setTimeout(() => {
                        dialog.classList.remove('opacity-0');
                    }, 20);
                }

                function hideDialog() {
                    let dialog = document.getElementById('dialog-{{ $docente->User->id }}');
                    dialog.classList.add('opacity-0');
                    setTimeout(() => {
                        dialog.classList.add('hidden');
                    }, 500);
                }
            </script>

        @endif
    </div>

    {{-- TABLA ESTUDIANTES --}}
    <div
        class="p-4 bg-white block sm:flex items-center justify-between border-b border-gray-200 lg:mt-1.5 dark:bg-gray-800 dark:border-gray-700">

        @if ($estudiantes->count() == 0)
            <h3>No hay registros de Estudiante</h3>
        @else
            <table class="table">
                <thead>
                    <tr>
                        <th
                            class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                            Id</th>
                        <th
                            class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                            Dni/Nie</th>
                        <th
                            class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                            Nombre</th>
                        <th
                            class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                            Primer Apellido</th>
                        <th
                            class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                            Segundo Apellido</th>
                        <th
                            class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                            Genero</th>
                        <th
                            class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                            Email</th>
                        <th
                            class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                            Foto Perfil</th>
                        <th
                            class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                            Fecha Nacimiento</th>
                        <th
                            class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                            Biografia</th>
                    </tr>
                </thead>
                @foreach ($estudiantes as $estudiante)
                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">{{ $estudiante->User->id }}</td>
                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">{{ $estudiante->User->dni }}</td>
                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">{{ $estudiante->User->name }}</td>
                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">{{ $estudiante->User->last_name_1 }}
                    </td>
                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">{{ $estudiante->User->last_name_2 }}
                    </td>
                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">{{ $estudiante->User->gender }}</td>
                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">{{ $estudiante->User->email }}</td>
                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                        {{ $estudiante->User->profile_photo }}</td>
                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">{{ $estudiante->date_of_birth }}</td>
                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">{{ $estudiante->history }}</td>
                    {{-- <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200"><a
                            class="px-4 py-2 font-bold text-white bg-red-500 border border-red-700 rounded hover:bg-red-700"
                            href="{{ route('user.destroy', $estudiante->User->id) }}">Delete</a></td> --}}
                    <td>
                        <form action="{{ route('user.destroy', $estudiante->User->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <input type="submit" value="Delete"
                                class="px-4 py-2 font-bold text-white bg-red-500 border border-red-700 rounded hover:bg-red-700">
                        </form>
                    </td>
                    <td><a class="px-4 py-2 font-bold text-white bg-green-500 border border-green-700 rounded hover:bg-green-700"
                            href="{{ route('user.edit', $estudiante->User->id) }}">Update</a></td>
                @endforeach
            </table>
        @endif
    </div>






@endsection
