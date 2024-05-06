@extends('layout.template-dashboard')

@section('title', 'Reset Password Page')
@vite(['resources/css/app.css', 'resources/js/app.js'])

@section('content')


    @if ($errors->any())
        <div class="font-mono text-red-600">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    <div class="container mx-auto font-mono">
        <div class="flex justify-center px-6 my-12">

            <div class="flex w-full xl:w-3/4 lg:w-11/12">

                <div class="hidden w-full h-auto bg-gray-400 bg-cover rounded-l-lg lg:block lg:w-5/12"
                    style="background-image: url('https://source.unsplash.com/Mv9hjnEUHR4/600x800')"></div>

                <div class="w-full p-5 bg-white rounded-lg lg:w-7/12 lg:rounded-l-none">
                    <h3 class="pt-4 text-2xl text-center">Restablece Tu Password</h3>
                    <form action="{{ route('password.update') }}" method="post" class="px-8 pt-6 pb-8 mb-4 bg-white rounded">
                        @csrf
                        <input type="text" hidden name="token" id="token" value="{{ $token }}">
                        <h3 class="my-2">Vamos a restablecer el password para: {{ $_GET['email'] }}</h3>
                        <h1 class="my-2"></h1>
                        <div class="mb-4 md:flex md:justify-between">
                            <div class="mb-4 md:mr-2 md:mb-0">
                                <label class="block mb-2 text-sm font-bold text-gray-700" for="password">
                                    Introduce un Password
                                </label>
                                <input
                                    class="w-full px-3 py-2 mb-3 text-sm leading-tight text-gray-700 border border-red-500 rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                    name="password" id="password" type="password" placeholder="******************" />
                                <p class="text-xs italic text-red-500">Introduce un password</p>
                            </div>
                            <div class="md:ml-2">
                                <label class="block mb-2 text-sm font-bold text-gray-700" for="c_password">
                                    Confirma el Password
                                </label>
                                <input
                                    class="w-full px-3 py-2 mb-3 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                    name="password_confirmation" id="password_confirmation" type="password"
                                    placeholder="******************" />
                            </div>
                        </div>
                        <div class="mb-6 text-center">
                            <input type="submit" name="submit"
                                class="w-full px-4 py-2 font-bold text-white bg-blue-500 rounded-full hover:bg-blue-700 focus:outline-none focus:shadow-outline"
                                value="Actualiza tu Password">
                        </div>
                        <hr class="mb-6 border-t" />
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
