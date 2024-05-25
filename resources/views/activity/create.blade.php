@extends('layout.template-dashboard')

@section('js')
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
        crossorigin="anonymous"></script>
    <script>
        $('#form').submit(function(evento) {
            evento.preventDefault(); // Evita que se envíe el formulario
        });
    </script>
@endsection

@section('title', 'Registrar Nuevo Actividad')

@vite(['resources/css/app.css'])
@vite(['resources/js/app.js'])
@vite(['resources\js\vueJs\questionPanel.js'])

@section('content')

    <main>
        <div class="container py-4 mx-auto">
            {{-- INCLUYO MENSAJES DE ERROR --}}

            @if ($errors->any())
                <div class="">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li class="text-sm"><span
                                    class="p-1 text-sm text-white bg-red-300 rounded-md">{{ $error }}</span></li>
                        @endforeach
                    </ul>
                </div>
            @elseif (session('success'))
                <div class="">
                    <span class="p-1 text-white rounded-md bg-greenPersonal">{{ session('success') }}</span>
                </div>
            @endif

            <div id="questionPanel"></div>



    </main>


@endsection
