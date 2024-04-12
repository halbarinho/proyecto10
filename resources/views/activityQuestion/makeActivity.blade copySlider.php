@extends('layout.template-dashboard')

@section('title', 'Realizar Actividad')
{{-- <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
    crossorigin="anonymous"></script> --}}
@vite(['resources/css/app.css', 'resources/js/app.js', 'resources/js/vueJs/questionaireSlider.js'])
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

            {{-- <div class="mx-auto" id="questionApp" :activity="@json($activity)"
                :questions="@json($questions)">
            </div> --}}
            {{-- <div class="mx-auto" id="questionApp" :activity="{{ $activity }}" :questions="{{ $questions }}">
            </div> --}}
            {{-- <div class="mx-auto" id="questionApp" v-bind:activity="{{ json_encode($activity) }}"
                :questions="{{ json_encode($questions) }}">
            </div> --}}
            {{-- @foreach ($questions as $question)
                <li>Jooo</li>
            @endforeach --}}
            <div class="mx-auto" id="questionApp">
                <questionaire :activity="{{ json_encode($activity) }}" :questions="{{ json_encode($questions) }}">
                </questionaire>
            </div>
    </main>
@endsection
