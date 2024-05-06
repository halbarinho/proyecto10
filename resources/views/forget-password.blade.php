@extends('layout.template-dashboard')
@section('title', 'Reset Password')
@vite(['resources/css/app.css'])
<meta name="csrf-token" content="{{ csrf_token() }}">



@section('content')

    <div class="container mx-auto font-mono">
        <div class="flex justify-center px-6 my-12">

            <div class="flex w-full xl:w-3/4 lg:w-11/12">

                <div class="hidden w-full h-auto lg:block lg:w-5/12">
                    <img class="p-4 max-w-5/12 max-h-5/12 hover:rotate-6" src="{{ asset('icons/logoTranspDwhite.png') }}"
                        alt="logo Diketive">
                </div>

                <div class="w-full p-5 bg-white rounded-lg lg:w-7/12 lg:rounded-l-none">
                    @if (Route::has('login'))
                        <h3 class="pt-4 text-2xl text-center">Cambia tu Password!</h3>
                    @else
                        <h3 class="pt-4 text-2xl text-center">Recupera tu Password!</h3>
                    @endif

                    <p class="justify-center px-8 mt-2 text-sm text-gray-600 dark:text-gray-400">
                        Proporcionanos tu dirección de emalil y recibirás en tu correo un link para que puedas cambiar tu
                        password por uno nuevo.
                    </p>

                    <form action="{{ route('forgetPasswordPost') }}" method="post"
                        class="px-8 pt-6 pb-8 mb-4 bg-white rounded">
                        @csrf

                        <div class="mb-4">
                            <label class="block mb-2 text-sm font-bold text-gray-700" for="email">
                                Email
                            </label>
                            <input
                                class="w-full px-3 py-2 mb-3 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                name="email" id="email" type="email" placeholder="Email" />
                        </div>
                        <div class="mb-6 text-center">
                            <input type="submit" name="submit"
                                class="w-full px-4 py-2 font-bold text-white bg-blue-500 rounded-full hover:bg-blue-700 focus:outline-none focus:shadow-outline"
                                value="Enviar Mail">
                        </div>
                        <hr class="mb-6 border-t" />
                    </form>
                </div>
            </div>
        </div>
    </div>


@endsection
