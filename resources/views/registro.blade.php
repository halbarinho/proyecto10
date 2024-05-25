<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
        crossorigin="anonymous"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @vite('resources/js/refreshSelectUserType.js')
    <title>Register</title>

</head>

<body class="font-mono bg-gray-400">

    <div class="container mx-auto">
        <div class="flex justify-center px-6 my-12">

            <div class="flex w-full xl:w-3/4 lg:w-11/12">

                <div class="hidden w-full h-auto bg-gray-400 bg-cover rounded-l-lg lg:block lg:w-5/12"
                    style="background-image: url('https://source.unsplash.com/Mv9hjnEUHR4/600x800')"></div>

                <div class="w-full p-5 bg-white rounded-lg lg:w-7/12 lg:rounded-l-none">
                    @if ($errors->any())
                        <div class="">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li><span
                                            class="p-1 text-sm text-white bg-red-300 rounded-md">{{ $error }}</span>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <h3 class="pt-4 text-2xl text-center">Create an Account!</h3>
                    <form action="{{ route('registro.post') }}" method="post" id="registerForm"
                        class="px-8 pt-6 pb-8 mb-4 bg-white rounded">
                        @csrf
                        <div class="mb-4 md:flex md:justify-between">
                            <div class="mb-4 md:mr-2 md:mb-0">
                                <label class="block mb-2 text-sm font-bold text-gray-700" for="dni">
                                    Dni o Nie
                                </label>
                                <input
                                    class="w-full px-3 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                    name="dni" id="dni" type="text" placeholder="Dni/Nie"
                                    value="{{ old('dni') }}" />
                            </div>
                            <div class="mb-4 md:mr-2 md:mb-0">
                                <label class="block mb-2 text-sm font-bold text-gray-700" for="name">
                                    Nombre
                                </label>
                                <input
                                    class="w-full px-3 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                    name="name" id="name" type="text" placeholder="Nombre"
                                    value="{{ old('name') }}" />
                            </div>
                            <div class="md:ml-2">
                                <label class="block mb-2 text-sm font-bold text-gray-700" for="last_name_1">
                                    1ER Apellido
                                </label>
                                <input
                                    class="w-full px-3 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                    name="last_name_1" id="last_name_1" type="text" placeholder="Primer Apellido"
                                    value="{{ old('last_name_1') }}" />
                            </div>
                            <div class="md:ml-2">
                                <label class="block mb-2 text-sm font-bold text-gray-700" for="last_name_2">
                                    2º Apellido
                                </label>
                                <input
                                    class="w-full px-3 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                    name="last_name_2" id="last_name_2" type="text" placeholder="Segundo Apellido"
                                    value="{{ old('last_name_2') }}" />
                            </div>
                        </div>
                        <div class="mb-4">
                            <label class="block mb-2 text-sm font-bold text-gray-700" for="gender">
                                Genero
                            </label>
                            <select name="gender" id="gender"
                                class="w-full px-3 py-2 mb-3 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline">
                                <option value="male">Masculino</option>
                                <option value="female">Femenino</option>
                                <option value="other" selected>Otros</option>
                            </select>
                        </div>
                        <div class="mb-4">
                            <label class="block mb-2 text-sm font-bold text-gray-700" for="email">
                                Email
                            </label>
                            <input
                                class="w-full px-3 py-2 mb-3 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                name="email" id="email" type="email" placeholder="Email"
                                value="{{ old('email') }}" />
                        </div>

                        <div class="mb-4">
                            <label class="block mb-2 text-sm font-bold text-gray-700" for="user_type">
                                Tipo Usuario
                            </label>
                            <select name="user_type" id="user_type"
                                class="w-full px-3 py-2 mb-3 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline">
                                <option value="">Seleccione Tipo Usuario</option>
                                <option value="docente">Docente</option>
                                <option value="estudiante">Estudiante</option>
                            </select>
                        </div>


                        {{-- CAMPOS FORM VARIABLES SEGUN TIPO USUARIO --}}
                        {{-- DOCENTE --}}
                        <div id="campo_docente" class="hidden">
                            <div class="mb-3 row">
                                <label for="speciality"
                                    class="block mb-2 text-sm font-bold text-gray-700">Especialidad</label>
                                <input type="text" name="speciality" id="speciality"
                                    class="w-full px-3 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                    value="{{ old('speciality') }}">
                            </div>
                        </div>

                        {{-- ALUMNO --}}
                        <div id="campo_alumno" class="hidden">
                            <div class="mb-3 row">
                                <label for="history"
                                    class="block mb-2 text-sm font-bold text-gray-700">Historial</label>

                                <input type="text" name="history" id="history"
                                    class="w-full px-3 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                    value="{{ old('history') }}">

                            </div>
                            <div class="mb-3 row">
                                <label for="date_of_birth" class="block mb-2 text-sm font-bold text-gray-700">Fecha
                                    Nacimiento</label>
                                <div class="sm-5">
                                    <input type="date" name="date_of_birth" id="date_of_birth"
                                        class="w-full px-3 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                        value="{{ old('date_of_birth') }}">
                                </div>
                            </div>
                        </div>

                        <div class="mb-4 md:flex md:justify-between">
                            <div class="mb-4 md:mr-2 md:mb-0">
                                <label class="block mb-2 text-sm font-bold text-gray-700" for="password">
                                    Introduce un Password
                                </label>
                                <input
                                    class="w-full px-3 py-2 mb-3 text-sm leading-tight text-gray-700 border border-red-500 rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                    name="password" id="password" type="password"
                                    placeholder="******************" />
                                <p class="text-xs italic text-red-500">Introduce un password</p>
                            </div>
                            <div class="md:ml-2">
                                <label class="block mb-2 text-sm font-bold text-gray-700" for="password_confirmation">
                                    Confirma el Password
                                </label>
                                <input
                                    class="w-full px-3 py-2 mb-3 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                    name="password_confirmation" id="password_confirmation" type="password"
                                    placeholder="******************" />
                            </div>
                        </div>
                        <div class="mb-6 text-center">
                            <input type="submit" name="submit" id="submit"
                                class="w-full px-4 py-2 font-bold text-white bg-blue-500 rounded-full hover:bg-blue-700 focus:outline-none focus:shadow-outline"
                                value="Registrar Usuario">

                        </div>
                        <hr class="mb-6 border-t" />
                    </form>

                </div>
            </div>
        </div>
    </div>
</body>


</html>
