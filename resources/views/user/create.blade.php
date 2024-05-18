@extends('layout.template-adminDashboard')

@section('title', 'Registrar Nuevo Usuario')
<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
    crossorigin="anonymous"></script>
@vite(['resources/css/app.css', 'resources/js/app.js'])
@vite('resources/js/refreshSelectUserType.js')

@section('content')

    <div class="mr-4 ml-14 mt-14">
        <div class="container py-4">
            {{-- INCLUYO MENSAJES DE ERROR --}}
            @if ($errors->any())
                <div class="">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li class="text-sm text-red-600">{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <h2>Registrar Nuevo Usuario</h2>
            <form action="{{ route('user.store') }}" method="post">
                @csrf

                <div class="mb-3 row">
                    <label for="name" class="mb-3 block text-base font-medium text-[#07074D]">Nombre</label>
                    <div class="sm-5">
                        <input type="text" name="name" id="name"
                            class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
                            value="{{ old('name') }}" placeholder="Nombre" required>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="last_name_1" class="mb-3 block text-base font-medium text-[#07074D]">last_name_1</label>
                    <div class="sm-5">
                        <input type="text" name="last_name_1" id="last_name_1"
                            class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
                            value="{{ old('last_name_1') }}" placeholder="Primer Apellido" required>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="last_name_2" class="mb-3 block text-base font-medium text-[#07074D]">last_name_2</label>
                    <div class="sm-5">
                        <input type="text" name="last_name_2" id="last_name_2"
                            class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
                            value="{{ old('last_name_2') }}" placeholder="Segundo Apellido" required>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="dni" class="mb-3 block text-base font-medium text-[#07074D]">Dni/Nie</label>
                    <div class="sm-5">
                        <input type="text" name="dni" id="dni"
                            class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
                            value="{{ old('dni') }}" placeholder="DNI o NIE" required>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="email" class="mb-3 block text-base font-medium text-[#07074D]">email</label>
                    <div class="sm-5">
                        <input type="email" name="email" id="email"
                            class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
                            value="{{ old('email') }}" placeholder="Email" required>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="gender" class="mb-3 block text-base font-medium text-[#07074D]">Genero</label>
                    <div class="sm-5">
                        <select name="gender" id="gender" class="form-select">
                            <option value="">Seleccionar Tipo Usuario</option>
                            <option value="male">Hombre</option>
                            <option value="female">Femenino</option>
                            <option value="other" selected>Otros</option>
                        </select>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="user_type" class="mb-3 block text-base font-medium text-[#07074D]">Tipo Usuario</label>
                    <div class="sm-5">
                        <select name="user_type" id="user_type" class="form-select" required>
                            <option value="">Seleccione Tipo Usuario</option>
                            <option value="docente">Docente</option>
                            <option value="estudiante">Estudiante</option>
                        </select>
                    </div>
                </div>

                {{-- CAMPOS FORM VARIABLES SEGUN TIPO USUARIO --}}
                {{-- DOCENTE --}}
                <div id="campo_docente" class="hidden">
                    <div class="mb-3 row">
                        <label for="speciality" class="mb-3 block text-base font-medium text-[#07074D]">Especialidad</label>
                        <div class="sm-5">
                            <input type="text" name="speciality" id="speciality"
                                class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
                                value="{{ old('speciality') }}">
                        </div>
                    </div>
                </div>

                {{-- ALUMNO --}}
                <div id="campo_alumno" class="hidden">
                    <div class="mb-3 row">
                        <label for="history" class="mb-3 block text-base font-medium text-[#07074D]">Historial</label>
                        <div class="sm-5">
                            <input type="text" name="history" id="history"
                                class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
                                value="{{ old('history') }}">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="date_of_birth" class="mb-3 block text-base font-medium text-[#07074D]">Fecha
                            Nacimiento</label>
                        <div class="sm-5">
                            <input type="date" name="date_of_birth" id="date_of_birth" {{-- class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" --}}
                                value="{{ old('date_of_birth') }}">
                        </div>
                    </div>
                </div>

                {{-- AÑADO EL CAMPO TELEFONO --}}
                <div class="mb-3 row">
                    <label for="phone1" class="mb-3 block text-base font-medium text-[#07074D]">Phone 1</label>
                    <div class="sm-5">
                        <input type="tel" name="phone_number" id="phone1"
                            class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
                            value="{{ old('phone1') }}" placeholder="Phone">
                    </div>
                </div>

                {{-- AÑADO LA CLASSROOM --}}

                <div class="mb-3 row">
                    <label for="class_id" class="mb-3 block text-base font-medium text-[#07074D]">Aula</label>
                    <div class="sm-5">
                        <select name="class_id" id="class_id" class="form-select">
                            <option value="">Seleccione Aula</option>
                            @if ($classes->isEmpty())
                                <option value="">No hay aulas creadas</option>
                            @else
                                @foreach ($classes as $class)
                                    <option value="{{ $class->id }}">{{ $class->class_name }}</option>
                                @endforeach
                            @endif

                        </select>
                    </div>
                </div>

                <div class="mb-3 md:flex md:justify-between">
                    <div class="mb-4 md:mr-2 md:mb-0">
                        <label class="mb-3 block text-base font-medium text-[#07074D]" for="password">
                            Introduce un Password
                        </label>
                        <input
                            class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
                            name="password" id="password" type="password" placeholder="******************" />
                        <p class="text-xs italic text-red-500">Introduce un password</p>
                    </div>
                    <div class="md:ml-2">
                        <label class="mb-3 block text-base font-medium text-[#07074D]" for="password_confirmation">
                            Confirma el Password
                        </label>
                        <input
                            class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
                            name="password_confirmation" id="password_confirmation" type="password"
                            placeholder="******************" />
                    </div>
                </div>

                <a href="{{ route('user.listUsers') }}"
                    class="hover:shadow-form rounded-md bg-[#6A64F1] py-3 px-8 text-base
                    font-semibold text-white outline-none">Regresar</a>


                <input type="submit" name="submit" id="submit"
                    class="hover:shadow-form rounded-md bg-[#6A64F1] py-3 px-8 text-base font-semibold text-white outline-none"
                    value="Registrar">
            </form>
        </div>
    </div>
@endsection
