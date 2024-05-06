@extends('layout.template-dashboard')

@section('js')
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
        crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            $('form').submit(function(event) {

                //Limpiar mensajes error antiguos
                $('.error-message').remove();

                let error = false;

                let groupQuestions = [];

                $('input[type="radio"]').each(function() {

                    groupQuestions.push($(this).attr('name'));

                });

                let groupResult = groupQuestions.filter((item, index) => {
                    return groupQuestions.indexOf(item) === index;
                });

                $.each(groupResult, function(index, value) {

                    if ($('input[name="' + value + '"]:checked').length === 0) {

                        // Crear el mensaje de error
                        let msjError =
                            "<div class='my-2 text-sm text-red-600 error-message'>Por favor, marca una respuesta para la pregunta " +
                            value + ".</div>";
                        // Insertar el mensaje de error después del último elemento del ul que contiene este conjunto de radios
                        $(msjError).insertAfter($('input[name="' + value + '"]').closest('ul'));
                        error = true; // Establecer error a true
                    }
                });

                $('textarea[name^="shortAnswer"]').each(function() {
                    let questionId = $(this).attr('name').split('-')[1];
                    if (!$(this).val()) {

                        let msjError =
                            "<div class='my-2 text-sm text-red-600 error-message'>Por favor, marca una respuesta para la pregunta.</div>";;

                        $(msjError).insertAfter($(this).closest('ul'));
                        error = true; // Establecer error a true
                    }
                });

                if (error) {

                    event.preventDefault();

                    return false;
                }
            });
        });
    </script>
@endsection
@section('title', 'Realizar Actividad')

@vite(['resources/css/app.css', 'resources/js/app.js', 'resources/js/vueJs/questionaireSlider.js'])
@section('content')

    <main>
        <div class="container py-4 mx-auto">
            {{-- INCLUYO MENSAJES DE ERROR --}}
            @if ($errors->any())
                <div class="">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('activity.sendAnswer') }}" method="POST">
                @csrf
                <input type="hidden" name="activity_id" value="{{ $activity->id }}">
                @foreach ($questions as $question)
                    {{ Log::info($question) }}
                    @switch($question->question_type)
                        @case('boolForm')
                            <div class="bg-[#ecf2f7] flex items-center justify-center min-h-screen font-nunito text-slate-600">
                                <div class="max-w-[968px] w-full mx-4">

                                    <h1 class="mx-2 my-10 text-2xl font-semibold text-center sm:text-3xl">Verdadero/Falso</h1>
                                    <ul
                                        class="w-full bg-white p-8 rounded-lg gap-3 flex items-start justify-center shadow-[0px_10px_15px_9px_#DDE4F1] flex-col sm:flex-row mb-10">
                                        <li class="pr-4 grow">
                                            <h2 class="mb-3 text-xl font-[800] mt-3">{{ $question->question_text }}</h2>
                                            <p class="max-w-lg text-lg">Marca si consideras que la afirmación es verdadera o falsa.
                                            </p>
                                        </li>
                                        <li id="boolQuestion-{{ $question->id }}"
                                            class="bg-[#f4faff] px-4 rounded-md min-w-[240px] self-stretch flex items-start justify-center flex-col">
                                            <label for="boolQuestion-{{ $question->id }}"
                                                class="flex items-center justify-start w-full gap-0 p-3 font-semibold cursor-pointer">
                                                <input type="radio" class="" name="boolQuestion-{{ $question->id }}"
                                                    id="boolQuestion-{{ $question->id }}" value="1">
                                                <span class="inline-block pl-3 text-xl">Verdadero</span>
                                            </label>
                                            <label for="boolQuestion-{{ $question->id }}"
                                                class="flex items-center justify-start w-full gap-2 p-3 font-semibold cursor-pointer">
                                                <input type="radio" class="" name="boolQuestion-{{ $question->id }}"
                                                    id="boolQuestion-{{ $question->id }}" value="0">
                                                <span class="text-xl"> <span class="inline-block pl-3 text-xl">Falso</span></span>
                                            </label>
                                        </li>

                                        @error('boolQuestion-' . $question->id)
                                            <div class="my-2 text-sm text-red-600">{{ $message }}</div>
                                        @enderror
                                    </ul>

                                </div>
                            </div>
                        @break

                        @case('multipleForm')
                            <div class="bg-[#ecf2f7] flex items-center justify-center min-h-screen font-nunito text-slate-600">
                                <div class="max-w-[968px] w-full mx-4">

                                    <h1 class="mx-2 my-10 text-2xl font-semibold text-center sm:text-3xl">Selecciona la correcta
                                    </h1>
                                    <ul
                                        class="w-full bg-white p-8 rounded-lg gap-3 flex items-start justify-center shadow-[0px_10px_15px_9px_#DDE4F1] flex-col sm:flex-row mb-10">
                                        <li class="pr-4 grow">
                                            <h2 class="mb-3 text-xl font-[800] mt-3">{{ $question->question_text }}</h2>
                                            <p class="max-w-lg text-lg">Marca la opción que consideras correcta.
                                            </p>
                                        </li>
                                        <li
                                            class="bg-[#f4faff] px-4 rounded-md min-w-[240px] self-stretch flex items-start justify-center flex-col">

                                            @foreach ($question->questionOption as $option)
                                                <label for=""
                                                    class="flex items-center justify-start w-full gap-0 p-3 font-semibold cursor-pointer">
                                                    <input type="radio" class=""
                                                        name="multipleQuestion-{{ $question->id }}"
                                                        id="multipleQuestion-{{ $question->id }}" value="{{ $option->is_right }}">
                                                    <span class="inline-block pl-3 text-xl">{{ $option->option_text }}</span>
                                                </label>
                                            @endforeach
                                        </li>
                                    </ul>
                                    @error('multipleQuestion-' . $question->id)
                                        <div class="my-2 text-sm text-red-600">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        @break

                        @case('shortForm')
                            <div class="bg-[#ecf2f7] flex items-center justify-center min-h-screen font-nunito text-slate-600">
                                <section class="max-w-[968px] w-full mx-4">

                                    <h1 class="mx-2 my-10 text-2xl font-semibold text-center sm:text-3xl">Pregunta de Respuesta
                                        Corta
                                    </h1>
                                    <ul
                                        class="w-full bg-white p-8 rounded-lg gap-3 flex items-start justify-center shadow-[0px_10px_15px_9px_#DDE4F1] flex-col sm:flex-row mb-10">
                                        <li class="pr-4 grow">
                                            <h2 class="mb-3 text-xl font-[800] mt-3">{{ $question->question_text }}</h2>
                                            <p class="max-w-lg text-lg">Desarrolla tu respuesta en unas pocas líneas.</p>
                                        </li>
                                        <li
                                            class="bg-[#f4faff] px-4 rounded-md min-w-[240px] self-stretch flex items-start justify-center flex-col">
                                            <label for="shortAnswer-{{ $question->id }}"
                                                class="flex items-center justify-start w-full gap-0 p-3 font-semibold cursor-pointer">
                                                <textarea name="shortAnswer-{{ $question->id }}" id="shortAnswer-{{ $question->id }}" cols="50" rows="10"></textarea>
                                            </label>
                                        </li>
                                    </ul>
                                    @error('shortAnswer-' . $question->id)
                                        <div class="my-2 text-sm text-red-600">{{ $message }}</div>
                                    @enderror

                                </section>
                            </div>
                        @break

                        @default
                    @endswitch
                @endforeach

                <!-- Botón para enviar con estado pending -->
                <button
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                    type="submit" name="status" value="pending">Guarda Cambios</button>

                <!-- Botón para enviar con estado completed -->
                <button type="submit" name="status" value="completed">Completar y Enviar</button>

            </form>
    </main>
@endsection
