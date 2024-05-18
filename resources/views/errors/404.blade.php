@extends('layout.template-dashboard')

@section('js')

@endsection

@section('title', 'Error 4045')

@vite('resources\js\app.js')



@section('content')
    <main class="flex flex-col items-center justify-center w-full h-screen bg-gray-300">

        <h3 class="font-mono text-4xl font-bold text-blackGray">OOOPS! PAGE NOT FOUND.</h3>
        <p class="font-mono text-xl text-blackGray">Esta página no existe o fue eliminada.</p>
        <p class="font-mono text-xl text-blackGray">Te sugerimos regresar a la home page.</p>

        <h1 class="font-extrabold font-mono text-9xl md:text-[400px] text-blackGray">404</h1>

        <a href="{{ route('welcome') }}">
            <button type="button"
                class="text-yellow-600 bg-yellow-200 hover:bg-yellowPersonalLight focus:ring-4 focus:outline-none hover:text-white focus:ring-yellow-200 font-mono rounded-lg text-xl px-5 py-2.5 text-center ">Regresar
                al inicio</button>
        </a>

    </main>
@endsection
