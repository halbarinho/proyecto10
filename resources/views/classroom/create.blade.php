@extends('layout.templateCRUD')

@section('title', 'Registrar Nuevo Clase')
<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
    crossorigin="anonymous"></script>
@vite(['resources/css/app.css', 'resources/js/app.js'])

@section('content')

    <main>
        <div class="container py-4">
            {{-- INCLUYO MENSAJES DE ERROR --}}
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <h2>Registrar Nueva Clase</h2>
            <form action="{{ route('classroom.store') }}" method="post">
                @csrf

                <div class="mb-3 row">
                    <label for="class_name" class="mb-3 block text-base font-medium text-[#07074D]">Nombre de la Clase</label>
                    <div class="sm-5">
                        <input type="text" name="class_name"
                            class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
                            value="{{ old('class_name') }}" placeholder="Nombre" required>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="user_id" class="mb-3 block text-base font-medium text-[#07074D]">Aula</label>
                    <div class="sm-5">
                        <select name="user_id" id="user_id" class="form-select">
                            <option value="">Seleccione Tutor</option>
                            @if ($docentes->isEmpty())
                                <option value="">No Existen Docentes</option>
                            @else
                                <option value="">No Asignar</option>
                                @foreach ($docentes as $docente)
                                    <option value="{{ $docente->user_id }}">
                                        {{ $docente->User->name }} {{ $docente->User->last_name_1 }}
                                        {{ $docente->User->last_name_2 }}</option>
                                @endforeach
                            @endif

                        </select>
                    </div>
                </div>


                <a href="{{ url('welcome') }}"
                    class="hover:shadow-form rounded-md bg-[#6A64F1] py-3 px-8 text-base
                    font-semibold text-white outline-none">Regresar</a>


                <input type="submit" name="submit" id="submit"
                    class="hover:shadow-form rounded-md bg-[#6A64F1] py-3 px-8 text-base font-semibold text-white outline-none"
                    value="Registrar">
            </form>
        </div>
    </main>
@endsection
