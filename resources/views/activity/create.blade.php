@extends('layout.template-dashboard')

@section('title', 'Registrar Nuevo Actividad')
<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
    crossorigin="anonymous"></script>
@vite(['resources/css/app.css'])
@vite(['resources/js/app.js'])
@vite(['resources\js\vueJs\questionPanel.js'])

@section('content')

    <main>
        <div class="container py-4 mx-auto">
            {{-- INCLUYO MENSAJES DE ERROR --}}
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li class="text-red-600 text-sm">{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @elseif (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <div id="questionPanel"></div>



    </main>
    <script>
        $('#form').submit(function(evento) {
            evento.preventDefault(); // Evita que se envíe el formulario
        });
    </script>

@endsection
