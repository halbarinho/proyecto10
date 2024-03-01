@extends('layout.templateCRUD')

@section('title', 'Registrar Nuevo Actividad')
<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
    crossorigin="anonymous"></script>
@vite(['resources/css/app.css', 'resources/js/app.js', 'resources\js\vueJs\questionPanel.js'])

@section('content')

    <main>
        <div class="container py-4">
            {{-- INCLUYO MENSAJES DE ERROR --}}
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div id="questionPanel"></div>


            <a href="{{ url('welcome') }}"
                class="hover:shadow-form rounded-md bg-[#6A64F1] py-3 px-8 text-base font-semibold text-white outline-none">Regresar</a>
    </main>
    <script>
        $('#form').submit(function(evento) {
            evento.preventDefault(); // Evita que se envíe el formulario
            // Tu lógica personalizada aquí
        });
    </script>

@endsection
