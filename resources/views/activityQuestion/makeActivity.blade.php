@extends('layout.template-dashboard')

@section('js')
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
        crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            $('form').submit(function(event) {

                //Limpiar mensajes error antiguos
                $('.error-message').remove();

                //ESTO FUNCIONA MEJOR
                //     $('input[name^="boolQuestion"]').each(function() {
                //         let questionId = $(this).attr('name').split('-')[1];
                //         if (!$(this).is(':checked')) {
                //             alert('Por favor, marque la respuesta para la pregunta booleana ' +
                //                 questionId + '.');
                //             // let msjError =
                //             //     "<div class='my-2 text-sm text-red-600'>Por favor, marca una respuesta para la pregunta Verdadero/Falso'+questionId+'.</div>';
                //             // // $(msjError).insertAfter('#boolQuestionError-' + questionId);
                //             // $("boolQuestion-" + questionId).insertAfter(msjError);
                //             event.preventDefault();
                //             return false;
                //         }
                //     });

                //     $('input[name^="multipleQuestion"]').each(function() {
                //         let questionId = $(this).attr('name').split('-')[1];
                //         if (!$(this).is(':checked')) {
                //             alert('Por favor, seleccione una opción para la pregunta múltiple ' +
                //                 questionId + '.');
                //             event.preventDefault();
                //             return false;
                //         }
                //     });

                //     $('textarea[name^="shortAnswer"]').each(function() {
                //         let questionId = $(this).attr('name').split('-')[1];
                //         if (!$(this).val()) {
                //             alert('Por favor, proporcione una respuesta para la pregunta de respuesta corta ' +
                //                 questionId + '.');
                //             event.preventDefault();
                //             return false;
                //         }
                //     });
                // });




                let error = false;


                // $('input[name^="boolQuestion"]').each(function() {
                //     let questionId = $(this).attr('name').split('-')[1];
                //     if (!$(this).is(':checked')) {
                //         // alert('Por favor, marque la respuesta para la pregunta booleana ' +
                //         //     questionId + '.');
                //         // let msjError =
                //         //     "<div class='my-2 text-sm text-red-600'>Por favor, marca una respuesta para la pregunta Verdadero/Falso'+questionId+'.</div>';
                //         // // $(msjError).insertAfter('#boolQuestionError-' + questionId);
                //         // $("boolQuestion-" + questionId).insertAfter(msjError);
                //         let msjError =
                //             "<div class='my-2 text-sm text-red-600'>Por favor, marca una respuesta para la pregunta Verdadero/Falso " +
                //             questionId + '.</div>';

                //         $(msjError).insertAfter($(this).closest('ul'));
                //         error = true;
                //     }
                // });

                // $('input[name^="multipleQuestion"]').each(function() {
                //     let questionId = $(this).attr('name').split('-')[1];
                //     if (!$(this).is(':checked')) {
                //         // alert('Por favor, seleccione una opción para la pregunta múltiple ' +
                //         //     questionId + '.');
                //         let msjError =
                //             "<div class='my-2 text-sm text-red-600'>Por favor, marca una respuesta para la pregunta Verdadero/Falso " +
                //             questionId + '.</div>';

                //         $(msjError).insertAfter($(this).closest('ul'));
                //         error = true;
                //     }
                // });

                // $('textarea[name^="shortAnswer"]').each(function() {
                //     let questionId = $(this).attr('name').split('-')[1];
                //     if (!$(this).val()) {
                //         // alert('Por favor, proporcione una respuesta para la pregunta de respuesta corta ' +
                //         //     questionId + '.');

                //         $(msjError).insertAfter($(this).closest('li'));
                //         error = true; // Establecer error a true
                //     }
                // });

                // $('input[type="radio"]').each(function() {
                //     // Obtener el nombre del conjunto de radios
                //     let groupName = $(this).attr('name');
                //     console.log(groupName);
                //     // Verificar si este radio button está seleccionado
                //     if ($('input[name="' + groupName + '"]:checked').length === 0) {
                //         console.log('entro')
                //         // Obtener el ID de la pregunta
                //         let questionId = groupName.split('-')[1];

                //         console.log(questionId)
                //         // Crear el mensaje de error
                //         let msjError =
                //             "<div class='my-2 text-sm text-red-600'>Por favor, marca una respuesta para la pregunta " +
                //             questionId + '.</div>';
                //         // Insertar el mensaje de error después del último elemento del ul que contiene este conjunto de radios
                //         $(msjError).insertAfter($('input[name="' + groupName + '"]').closest('ul'));
                //         error = true; // Establecer error a true
                //         console.log('salgo')
                //         console.log(error)
                //     }
                // });
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

            <form action="{{ route('activity.sendAnswer') }}" method="POST">
                @csrf
                <input type="hidden" name="activity_id" value="{{ $activity->id }}">
                @foreach ($questions as $question)
                    {{ Log::info($question) }}
                    @switch($question->question_type)
                        @case('boolForm')
                            <div class="bg-[#ecf2f7] flex items-center justify-center min-h-screen font-nunito text-slate-600">
                                <div class="max-w-[968px] w-full mx-4">
                                    {{-- <p class="flex justify-center w-full mt-10">
                                    <img src="https://neluttu.github.io/gift-membership/gift.png"
                                        class="max-w-[100px] slide-in-elliptic-top-fwd">
                                    </p> --}}
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
                                        {{-- <div id="boolQuestionError-{{ $question->id }}"></div> --}}
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
                                    {{-- <p class="flex justify-center w-full mt-10">
                                <img src="https://neluttu.github.io/gift-membership/gift.png"
                                    class="max-w-[100px] slide-in-elliptic-top-fwd">
                                </p> --}}
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

                                            {{ Log::info('esto:' . $question->questionOption) }}

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
                                    {{-- <p class="flex justify-center w-full mt-10">
                                         <img src="https://neluttu.github.io/gift-membership/gift.png"
                                    class="max-w-[100px] slide-in-elliptic-top-fwd">
                                     </p> --}}
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
                                    {{-- <button
                                            class="mb-20 px-20 py-4 text-white bg-[#f1626e] mx-auto block mt-5 rounded-xl text-lg transition-all duration-150 ease-in hover:bg-[#d14f5a]">
                                            Order now
                                                </button> --}}
                                </section>
                            </div>
                        @break

                        @default
                    @endswitch
                @endforeach

                {{-- <input type="submit" value="Enviar"> --}}
                <!-- Botón para enviar con estado pending -->
                <button
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                    type="submit" name="status" value="pending">Guarda Cambios</button>

                <!-- Botón para enviar con estado completed -->
                <button type="submit" name="status" value="completed">Completar y Enviar</button>

            </form>
    </main>
@endsection
