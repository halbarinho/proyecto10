@extends('layout.template-dashboard')

@section('js')
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
        crossorigin="anonymous"></script>
    {{-- <script>
        $(document).ready(function() {
            $('form').submit(function(event) {

                //Limpiar mensajes error antiguos
                $('.error-message').remove();

                let error = false;

                console.log('entro')
                let groupQuestions = [];

                $('input[type="radio"]').each(function() {

                    groupQuestions.push($(this).attr('name'));

                });
                console.log(groupQuestions);

                let groupResult = groupQuestions.filter((item, index) => {
                    return groupQuestions.indexOf(item) === index;
                });

                console.log(groupResult)

                $.each(groupResult, function(index, value) {

                    if ($('input[name="' + value + '"]:checked').length === 0) {
                        console.log('entro')
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
                        // alert('Por favor, proporcione una respuesta para la pregunta de respuesta corta ' +
                        //     questionId + '.')
                        let msjError =
                            "<div class='my-2 text-sm text-red-600 error-message'>Por favor, marca una respuesta para la pregunta.</div>";;

                        $(msjError).insertAfter($(this).closest('ul'));
                        error = true; // Establecer error a true
                    }
                });

                // error = true;
                console.log(error)

                if (error) {
                    console.log('aqui llego')

                    event.preventDefault();

                    return false;
                }
            });
        });
    </script> --}}

    <script>
        function showTrackingSheet() {

            let dialog = document.getElementById('showTrackingSheet');
            dialog.classList.remove('hidden');
            setTimeout(() => {
                dialog.classList.remove('opacity-0');
            }, 20);
        }

        function hideTrackingSheet() {

            let dialog = document.getElementById('showTrackingSheet');
            dialog.classList.add('opacity-0');
            setTimeout(() => {
                dialog.classList.add('hidden');
            }, 500);
        }

        function submit() {
            $('#trackingForm').submit();
            // $('#trackingForm').submit();
        }

        function addEstudianteStatus() {
            let dialog = document.getElementById('statusDialog');
            dialog.classList.remove('hidden');
            setTimeout(() => {
                dialog.classList.remove('opacity-0');
            }, 20);
        }

        function hidestatusDialog() {

            let dialog = document.getElementById('statusDialog');
            dialog.classList.add('opacity-0');
            setTimeout(() => {
                dialog.classList.add('hidden');
            }, 500);
        }

        function submitStatusForm() {
            console.log('aqui llegamos');
            $('#statusForm').submit();
        }
    </script>

@endsection
@section('title', 'Realizar Actividad')
{{-- <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
    crossorigin="anonymous"></script> --}}
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
            @include('activity.modal.tracking-modal')
            @include('activity.modal.changeEstudiantesStatus-modal')
            {{-- <form action="{{ route('activity.sendAnswer') }}" method="POST">
                @csrf
                <input type="hidden" name="activity_id" value="{{ $activity->id }}"> --}}
            @foreach ($questionaire as $answer)
                {{-- {{ Log::info($answer) }} --}}
                @switch($answer->Question->question_type)
                    @case('boolForm')
                        <div class="bg-[#ecf2f7] flex items-center justify-center min-h-screen font-nunito text-slate-600">
                            <div class="max-w-[968px] w-full mx-4">

                                <h1 class="mx-2 my-10 text-2xl font-semibold text-center sm:text-3xl">Verdadero/Falso</h1>
                                <ul
                                    class="w-full bg-white p-8 rounded-lg gap-3 flex items-start justify-center shadow-[0px_10px_15px_9px_#DDE4F1] flex-col sm:flex-row mb-10">
                                    <li class="pr-4 grow">
                                        <h2 class="mb-3 text-xl font-[800] mt-3">{{ $answer->Question->question_text }}</h2>
                                        <p class="max-w-lg text-lg">Marca si consideras que la afirmación es verdadera o falsa.
                                        </p>
                                    </li>
                                    <li id="boolQuestion-{{ $answer->Question->id }}"
                                        class="bg-[#f4faff] px-4 rounded-md min-w-[240px] self-stretch flex items-start justify-center flex-col">
                                        <label for="boolQuestion-{{ $answer->Question->id }}"
                                            class="flex items-center justify-start w-full gap-0 p-3 font-semibold cursor-pointer">
                                            <input type="radio" class="" name="boolQuestion-{{ $answer->Question->id }}"
                                                id="boolQuestion-{{ $answer->Question->id }}" value="1"
                                                @if ($answer->answer_bool == true) checked @endif>
                                            <span class="inline-block pl-3 text-xl">Verdadero</span>
                                            {{ Log::info('aqui', [$answer->Question->QuestionOption[0]->is_right]) }}
                                            @if ($answer->answer_bool == $answer->Question->QuestionOption[0]->is_right)
                                                <div class="my-2 text-sm text-green-600">Correcto</div>
                                            @else
                                                <div class="my-2 text-sm text-red-600">Incorrecto</div>
                                            @endif
                                        </label>
                                        <label for="boolQuestion-{{ $answer->Question->id }}"
                                            class="flex items-center justify-start w-full gap-2 p-3 font-semibold cursor-pointer">
                                            <input type="radio" class="" name="boolQuestion-{{ $answer->Question->id }}"
                                                id="boolQuestion-{{ $answer->Question->id }}" value="0"
                                                @if ($answer->answer_bool == true) @else checked @endif>
                                            <span class="text-xl"> <span class="inline-block pl-3 text-xl">Falso</span></span>
                                        </label>
                                    </li>
                                    {{-- <div id="boolQuestionError-{{ $answer->Question->id }}"></div> --}}
                                    @error('boolQuestion-' . $answer->Question->id)
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
                                        <h2 class="mb-3 text-xl font-[800] mt-3">{{ $answer->Question->question_text }}</h2>
                                        <p class="max-w-lg text-lg">Marca la opción que consideras correcta.
                                        </p>
                                    </li>
                                    <li
                                        class="bg-[#f4faff] px-4 rounded-md min-w-[240px] self-stretch flex items-start justify-center flex-col">

                                        {{ Log::info('esto:' . $answer->Question->QuestionOption) }}

                                        @foreach ($answer->Question->questionOption as $option)
                                            <label for=""
                                                class="flex items-center justify-start w-full gap-0 p-3 font-semibold cursor-pointer">
                                                <input type="radio" class=""
                                                    name="multipleQuestion-{{ $answer->Question->id }}"
                                                    id="multipleQuestion-{{ $answer->Question->id }}"
                                                    value="{{ $option->is_right }}">
                                                <span class="inline-block pl-3 text-xl">{{ $option->option_text }}</span>
                                            </label>
                                        @endforeach

                                        @if ($answer->answer_bool == 1)
                                            <div class="my-2 text-sm text-green-600">Correcto</div>
                                        @else
                                            <div class="my-2 text-sm text-red-600">Incorrecto</div>
                                        @endif
                                    </li>
                                </ul>

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
                                        <h2 class="mb-3 text-xl font-[800] mt-3">{{ $answer->Question->question_text }}</h2>
                                        <p class="max-w-lg text-lg">Desarrolla tu respuesta en unas pocas líneas.</p>
                                    </li>
                                    <li
                                        class="bg-[#f4faff] px-4 rounded-md min-w-[240px] self-stretch flex items-start justify-center flex-col">
                                        <label for="shortAnswer-{{ $answer->Question->id }}"
                                            class="flex items-center justify-start w-full gap-0 p-3 font-semibold cursor-pointer">
                                            <textarea name="shortAnswer-{{ $answer->Question->id }}" id="shortAnswer-{{ $answer->Question->id }}" cols="50"
                                                rows="10">{{ $answer->answer_text }}</textarea>
                                        </label>
                                    </li>
                                </ul>
                            </section>
                        </div>
                    @break

                    @default
                @endswitch
            @endforeach


            <div class="flex justify-center md:justify-end mr-4 mt-4">
                <!-- Botón para enviar con estado pending -->
                <button type="button" id="showTrackingSheet" onclick="showTrackingSheet(); event.preventDefault();"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Adjuntar
                    Historial</button>

                <!-- Botón para añadir seguimiento al usuario -->
                <button type="button" onclick="addEstudianteStatus(); event.preventDefault();"
                    class="py-2.5 px-5 ms-3 text-sm font-medium text-red-900 focus:outline-none bg-red-300 rounded-lg border border-red-200 hover:bg-red-600 hover:text-white focus:z-10 focus:ring-4 focus:ring-red-100 dark:focus:ring-red-700 dark:bg-red-800 dark:text-red-400 dark:border-red-600 dark:hover:text-white dark:hover:bg-red-700"
                    value="">Cambiar Seguimiento</button>

                <!-- Botón para enviar con estado completed -->
                <button onclick="window.history.back();"
                    class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700"
                    type="submit" name="status" value="completed">Cerrar</button>
            </div>
            {{-- </form> --}}
    </main>


@endsection
