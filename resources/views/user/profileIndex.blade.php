@extends('layout.template-dashboard')

@section('css')
@endsection
@section('js')
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
        crossorigin="anonymous"></script>
    <script>
        document.getElementById('profile_photo_path').addEventListener('change', function(event) {
            const selectedImage = event.target.files[0];
            const previewImage = document.getElementById('profileImage');
            if (selectedImage) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    previewImage.src = e.target.result;
                };
                reader.readAsDataURL(selectedImage);
            }
        });
    </script>
@endsection
@section('title', 'Pefil Usuario')

@vite(['resources/css/app.css', 'resources/js/app.js'])


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

        <div class="my-6">
            <div
                class="grid xs:grid-cols-1 md:grid-cols-2 items-center gap-16 p-8 mx-auto max-w-4xl bg-white shadow-[0_2px_10px_-3px_rgba(6,81,237,0.3)] rounded-md text-[#333] font-[sans-serif]">

                <div>
                    <form action="{{ route('user.updateProfilePhoto', ['user' => $user->id]) }}" method="post"
                        enctype="multipart/form-data" class="text-center">
                        @csrf
                        @method('put')

                        @if ($user->profile_photo_path)
                            <img id="profileImage" class="w-32 h-32 mx-auto rounded-full"
                                src="/storage/{{ $user->profile_photo_path }}" alt="Foto perfil {{ $user->name }}">
                        @else
                            <img class="w-32 h-32 mx-auto rounded-full" src="https://picsum.photos/200" alt="Foto perfil">
                        @endif
                        <div class="mb-3 text-center row">
                            <label for="profile_photo_path" class="mb-3 block text-base font-medium text-[#07074D]">Editar
                                Imagen
                                Perfil</label>
                            <div class="sm-5">
                                <input type="file" name="profile_photo_path" id="profile_photo_path" accept="image/*"
                                    class="hidden">
                                @if ($errors->has('profile_photo_path'))
                                    <div class="text-xs text-redPersonal">{{ $errors->first('profile_photo_path') }}</div>
                                @endif
                            </div>
                        </div>
                        <h2 class="mt-3 text-2xl font-semibold text-center">{{ $user->name }}</h2>
                        <span
                            class="p-1 mt-1 text-sm text-center text-white uppercase rounded bg-yellowPersonal">{{ $user->user_type }}</span>
                        <div class="flex justify-center mt-5">
                            <a href="{{ route('forgetPassword') }}"
                                class="mx-3 text-blueLighterPersonal hover:text-blueDarkPersonal">Cambio Password</a>

                        </div>
                        <div class="mt-5 text-center">
                            <h3 class="text-xl font-semibold">Info</h3>
                            <p class="mt-2 text-justify text-gray-600">Utiliza esta sección para modificar tu imagen de
                                perfil, o rellena
                                el formulario para solicitar al administrador algun cambio de tu información personal.</p>
                        </div>
                        </br>
                        <a href="{{ route('welcome') }}"
                            class="px-4 py-3 font-bold text-white rounded-md cursor-pointer bg-rose-500 hover:bg-rose-700">Cancelar</a>


                        <input type="submit" name="submit" id="submit"
                            class="justify-end px-4 py-2 font-bold text-white rounded-md bg-blueLighterPersonal border-blueLighterPersonal hover:bg-blueLightPersonal"
                            value="Actualizar">
                    </form>
                </div>

                <div>
                    <h1 class="text-3xl font-extrabold">Contáctanos</h1>
                    <br>
                    <form id="formContact" action="{{ route('contact.send') }}" method="POST" class="ml-auto space-y-4">
                        @csrf

                        <input name="name" type='text' placeholder='Nombre y apellidos'
                            class="w-full rounded-md py-2.5 px-4 border text-sm outline-[#fdd306]"
                            value="{{ old('name') }}">

                        @error('name')
                            <div class="my-2 text-sm text-red-600">{{ $message }}</div>
                        @enderror

                        <input name="mail" type='email' placeholder='Email'
                            class="w-full rounded-md py-2.5 px-4 border text-sm outline-[#fdd306]"
                            value="{{ old('mail') }}">

                        @error('mail')
                            <div class="my-2 text-sm text-red-600">{{ $message }}</div>
                        @enderror

                        <input name="asunto" type='text' placeholder='Asunto'
                            class="w-full rounded-md py-2.5 px-4 border text-sm outline-[#fdd306]"
                            value="{{ old('asunto') }}">

                        @error('asunto')
                            <div class="my-2 text-sm text-red-600">{{ $message }}</div>
                        @enderror

                        <textarea name="mensaje" placeholder='Mensaje' rows="6"
                            class="w-full rounded-md px-4 border text-sm pt-2.5 outline-[#fdd306]">{{ old('mensaje') }}</textarea>

                        @error('mensaje')
                            <div class="my-2 text-sm text-red-600">{{ $message }}</div>
                        @enderror

                        <button type='submit'
                            class="text-white bg-yellowPersonalLight hover:bg-yellowPersonal font-bold rounded-md px-4 py-2.5 w-full">Enviar</button>
                    </form>
                </div>

            </div>
        </div>

    </div>

@endsection
