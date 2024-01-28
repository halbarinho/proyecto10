@extends('layout.templateCRUD')

@section('title', 'Registrar Nuevo Usuario')
<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
    crossorigin="anonymous"></script>
@vite('resources/js/refreshSelectUserType.js')

@section('content')

    <main>
        <div class="container py-4">
            <h2>Registrar Nuevo Usuario</h2>
            <form action="{{ url('registro') }}" method="post">
                @csrf
                {{-- <div class="mb-3 row">
                    <label for="" class="col-sm-2 col-form-label"></label>
                    <div class="sm-5">
                        <input type="text" name="" id="" class="form-control" value="{{ old('') }}">
                    </div>
                </div> --}}
                <div class="mb-3 row">
                    <label for="name" class="mb-3 block text-base font-medium text-[#07074D]">Nombre</label>
                    <div class="sm-5">
                        <input type="text" name="name" id="name"
                            class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
                            value="{{ old('name') }}" required>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="last_name_1" class="mb-3 block text-base font-medium text-[#07074D]">last_name_1</label>
                    <div class="sm-5">
                        <input type="text" name="last_name_1" id="last_name_1"
                            class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
                            value="{{ old('last_name_1') }}" required>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="last_name_2" class="mb-3 block text-base font-medium text-[#07074D]">last_name_2</label>
                    <div class="sm-5">
                        <input type="text" name="last_name_2" id="last_name_2"
                            class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
                            value="{{ old('last_name_2') }}" required>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="dni" class="mb-3 block text-base font-medium text-[#07074D]">Dni/Nie</label>
                    <div class="sm-5">
                        <input type="text" name="dni" id="dni"
                            class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
                            value="{{ old('dni') }}" required>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="email" class="mb-3 block text-base font-medium text-[#07074D]">email</label>
                    <div class="sm-5">
                        <input type="email" name="email" id="email"
                            class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
                            value="{{ old('email') }}" required>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="gender" class="mb-3 block text-base font-medium text-[#07074D]">Genero</label>
                    <div class="sm-5">
                        <select name="gender" id="gender" class="form-select" required>
                            <option value="">Seleccionar Tipo Usuario</option>
                            <option value="male">Hombre</option>
                            <option value="female">Femenino</option>
                            <option value="other">Otros</option>
                        </select>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="user_type" class="mb-3 block text-base font-medium text-[#07074D]">Genero</label>
                    <div class="sm-5">
                        <select name="user_type" id="user_type" class="form-select" required>
                            <option value="">Seleccione Tipo Usuario</option>
                            <option value="docente">Docente</option>
                            <option value="alumno">Alumno</option>
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
                                value="{{ old('speciality') }}" required>
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
                                value="{{ old('history') }}" required>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="data_of_birth" class="mb-3 block text-base font-medium text-[#07074D]">Fecha
                            Nacimiento</label>
                        <div class="sm-5">
                            <input type="date" name="data_of_birth" id="data_of_birth" {{-- class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" --}}
                                value="{{ old('data_of_birth') }}" required>
                        </div>
                    </div>
                </div>


                <a href="{{ url('welcome') }}"
                    class="hover:shadow-form rounded-md bg-[#6A64F1] py-3 px-8 text-base
                    font-semibold text-white outline-none">Regresar</a>
                <button type="submit"
                    class="hover:shadow-form rounded-md bg-[#6A64F1] py-3 px-8 text-base font-semibold text-white outline-none">Registrar</button>
            </form>
        </div>
    </main>
@endsection
