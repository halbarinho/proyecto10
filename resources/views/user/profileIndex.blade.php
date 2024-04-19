@extends('layout.template-dashboard')

@section('css')
@endsection
@section('js')
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
        crossorigin="anonymous"></script>
@endsection
@section('title', 'Pefil Usuario')

@vite(['resources/css/app.css', 'resources/js/app.js'])


@section('content')

    <div class="mr-4 overflow-auto ml-14 mt-14">
        <div class="flex justify-between w-full ">
            {{-- INCLUYO MENSAJES DE ERROR
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif --}}
            @if (session('error'))
                <div>
                    <ul>
                        <li class="text-xs text-redPersonal">{{ session('error') }}</li>
                    </ul>
                </div>
            @endif
        </div>
        <h2>Editar Mi Información</h2>
        <form action="{{ route('user.updateProfilePhoto', ['user' => $user->id]) }}" method="post"
            enctype="multipart/form-data" class="text-center">
            @csrf
            @method('put')

            @if ($user->profile_photo_path)
                <img class="w-32 h-32 mx-auto rounded-full" src="/storage/{{ $user->profile_photo_path }}"
                    alt="Foto perfil {{ $user->name }}">
            @else
                <img class="w-32 h-32 mx-auto rounded-full" src="https://picsum.photos/200" alt="Foto perfil">
            @endif
            <div class="mb-3 text-center row">
                <label for="profile_photo_path" class="mb-3 block text-base font-medium text-[#07074D]">Editar Imagen
                    Perfil</label>
                <div class="sm-5">
                    <input type="file" name="profile_photo_path" id="profile_photo_path" accept="image/*" class="hidden">
                    @if ($errors->has('profile_photo_path'))
                        <div class="text-xs text-redPersonal">{{ $errors->first('profile_photo_path') }}</div>
                    @endif
                </div>
            </div>
            <h2 class="mt-3 text-2xl font-semibold text-center">{{ $user->name }}</h2>
            <p class="mt-1 text-center text-gray-600">{{ $user->user_type }}</p>
            <div class="flex justify-center mt-5">
                <a href="{{ route('forgetPassword') }}" class="mx-3 text-blue-500 hover:text-blue-700">Password Update</a>
                <a href="#" class="mx-3 text-blue-500 hover:text-blue-700">LinkedIn</a>
                <a href="#" class="mx-3 text-blue-500 hover:text-blue-700">GitHub</a>
            </div>
            <div class="mt-5 text-center">
                <h3 class="text-xl font-semibold">Info</h3>
                <p class="mt-2 text-gray-600">Utiliza esta sección para cambiar tu imagen de perfil, o solicitar algun
                    cambio en
                    tus datos personales al administrador del sitio.</p>
            </div>
            </br>
            <a href="{{ route('welcome') }}"
                class="hover:shadow-form rounded-md bg-[#6A64F1] py-3 px-8 text-base
                    font-semibold text-white outline-none">Cancelar</a>


            <input type="submit" name="submit" id="submit"
                class="hover:shadow-form rounded-md bg-[#6A64F1] py-3 px-8 text-base font-semibold text-white outline-none"
                value="Actualizar">
        </form>
    </div>

@endsection
