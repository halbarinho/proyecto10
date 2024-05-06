@extends('layout.template-adminDashboard')

@section('css')
@endsection
@section('js')
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
        crossorigin="anonymous"></script>
@endsection
@section('title', 'Editar Usuario')

@vite(['resources/css/app.css', 'resources/js/app.js'])
@vite('resources/js/refreshSelectUserType.js')


@section('content')

    <div class="mr-4 overflow-auto ml-14 mt-14">
        <div class="flex justify-between w-full ">

            @if (session('error'))
                <div>
                    <ul>
                        <li class="text-xs text-redPersonal">{{ session('error') }}</li>
                    </ul>
                </div>
            @endif
        </div>
        <h2>Editar Datos Usuario</h2>
        <form action="{{ route('user.update', $user) }}" method="post">
            @csrf
            @method('put')
            <div class="mb-3 row">
                <label for="name" class="mb-3 block text-base font-medium text-[#07074D]">Nombre</label>
                <div class="sm-5">
                    <input type="text" name="name" id="name"
                        class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
                        value="{{ $user->name }}" placeholder="Nombre" required>
                    @if ($errors->has('name'))
                        <div class="text-xs text-redPersonal">{{ $errors->first('name') }}</div>
                    @endif
                </div>
            </div>
            <div class="mb-3 row">
                <label for="last_name_1" class="mb-3 block text-base font-medium text-[#07074D]">last_name_1</label>
                <div class="sm-5">
                    <input type="text" name="last_name_1" id="last_name_1"
                        class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
                        value="{{ $user->last_name_1 }}" placeholder="Primer Apellido" required>
                    @if ($errors->has('last_name_1'))
                        <div class="text-xs text-redPersonal">{{ $errors->first('last_name_1') }}</div>
                    @endif
                </div>
            </div>
            <div class="mb-3 row">
                <label for="last_name_2" class="mb-3 block text-base font-medium text-[#07074D]">last_name_2</label>
                <div class="sm-5">
                    <input type="text" name="last_name_2" id="last_name_2"
                        class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
                        value="{{ $user->last_name_2 }}" placeholder="Segundo Apellido" required>
                    @if ($errors->has('last_name_2'))
                        <div class="text-xs text-redPersonal">{{ $errors->first('last_name_2') }}</div>
                    @endif
                </div>
            </div>
            <div class="mb-3 row">
                <label for="dni" class="mb-3 block text-base font-medium text-[#07074D]">Dni/Nie</label>
                <div class="sm-5">
                    <input type="text" name="dni" id="dni"
                        class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
                        value="{{ $user->dni }}" placeholder="DNI o NIE" required>
                    @if ($errors->has('dni'))
                        <div class="text-xs text-redPersonal">{{ $errors->first('dni') }}</div>
                    @endif
                </div>
            </div>
            <div class="mb-3 row">
                <label for="email" class="mb-3 block text-base font-medium text-[#07074D]">Email</label>
                <div class="sm-5">
                    <input type="email" name="email" id="email"
                        class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
                        value="{{ $user->email }}" placeholder="Email" required>
                    @if ($errors->has('email'))
                        <div class="text-xs text-redPersonal">{{ $errors->first('email') }}</div>
                    @endif
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

            @if ($user->user_type == 'docente')

                {{-- CAMPOS FORM VARIABLES SEGUN TIPO USUARIO --}}
                {{-- DOCENTE --}}
                <div id="campo_docente" class="">
                    <div class="mb-3 row">
                        <label for="speciality" class="mb-3 block text-base font-medium text-[#07074D]">Especialidad</label>
                        <div class="sm-5">
                            <input type="text" name="speciality" id="speciality"
                                class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
                                value="{{ $user->docente->speciality }}">
                            @if ($errors->has('speciality'))
                                <div class="text-xs text-redPersonal">{{ $errors->first('speciality') }}</div>
                            @endif
                        </div>
                    </div>
                </div>
            @else
                {{-- ALUMNO --}}
                <div id="campo_alumno" class="">
                    <div class="mb-3 row">
                        <label for="history" class="mb-3 block text-base font-medium text-[#07074D]">Historial</label>
                        <div class="sm-5">
                            <input type="text" name="history" id="history"
                                class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
                                value="{{ $user->Estudiante->history }}">
                            @if ($errors->has('history'))
                                <div class="text-xs text-redPersonal">{{ $errors->first('history') }}</div>
                            @endif
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="date_of_birth" class="mb-3 block text-base font-medium text-[#07074D]">Fecha
                            Nacimiento</label>
                        <div class="sm-5">
                            <input type="date" name="date_of_birth" id="date_of_birth" {{-- class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" --}}
                                value="{{ $user->Estudiante->date_of_birth }}">
                            @if ($errors->has('date_of_birth'))
                                <div class="text-xs text-redPersonal">{{ $errors->first('date_of_birth') }}</div>
                            @endif
                        </div>
                    </div>
                </div>
            @endif

            <div class="mb-3 md:flex md:justify-between">
                <div class="mb-4 md:mr-2 md:mb-0">
                    <label class="mb-3 block text-base font-medium text-[#07074D]" for="password">
                        Introduce un Password
                    </label>
                    <input
                        class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
                        name="password" id="password" type="password" placeholder="******************" />
                    <p class="text-xs italic text-red-500">Introduce un password</p>
                    @if ($errors->has('password'))
                        <div class="text-xs text-redPersonal">{{ $errors->first('password') }}</div>
                    @endif
                </div>
                <div class="md:ml-2">
                    <label class="mb-3 block text-base font-medium text-[#07074D]" for="password_confirmation">
                        Confirma el Password
                    </label>
                    <input
                        class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
                        name="password_confirmation" id="password_confirmation" type="password"
                        placeholder="******************" />
                    @if ($errors->has('password_confirmation'))
                        <div class="text-xs text-redPersonal">{{ $errors->first('password_confirmation') }}</div>
                    @endif
                </div>
            </div>

            <a href="{{ route('user.listUsers') }}"
                class="hover:shadow-form rounded-md bg-[#6A64F1] py-3 px-8 text-base
                    font-semibold text-white outline-none">Regresar</a>


            <input type="submit" name="submit" id="submit"
                class="hover:shadow-form rounded-md bg-[#6A64F1] py-3 px-8 text-base font-semibold text-white outline-none"
                value="Actualizar">
        </form>
    </div>

@endsection
