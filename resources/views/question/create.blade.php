@extends('layout.templateCRUD')

@section('title', 'Registrar Nuevo Question')
<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
    crossorigin="anonymous"></script>
@vite(['resources/css/app.css', 'resources/js/app.js'])

@section('content')

    <main>
        <div class="container py-4">
            {{-- INCLUYO MENSAJES DE ERROR --}}
            @if ($errors->any())
                <div class="">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li><span class="p-1 text-sm text-white bg-red-300 rounded-md">{{ $error }}</span></li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <h2>Registrar Nueva Actividad</h2>
            <form action="{{ route('question.store') }}" method="post">
                @csrf
                <input type="hidden" name="question_type" value="$question_type">
                <div class="mb-3 row">
                    <label for="question_statement" class="mb-3 block text-base font-medium text-[#07074D]">Enunciado de la
                        Pregunta</label>
                    <div class="sm-5">
                        <input type="text" name="question_statement"
                            class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
                            value="{{ old('question_statement') }}" placeholder="Enunciado" required>
                    </div>
                </div>

                @switch($question_type)
                    @case('choice')
                        @for ($i = 0; $i < 4; $i++)
                            <div class="mb-3 row">
                                <label for="question_option_{{ $i }}"
                                    class="mb-3 block text-base font-medium text-[#07074D]">Respuesta de la
                                    Pregunta {{ $i }}</label>
                                <div class="sm-5">
                                    <input type="text" name="question_option_{{ $i }}"
                                        class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
                                        value="" placeholder="Respuesta" required>
                                </div>
                            </div>
                        @endfor
                    @break

                    @case('bool')
                    @break

                    @case('short')
                    @break

                    @default
                        //AQUI DEBO MANEJAR EL DEFAULT
                @endswitch
                <div class="mb-3 row">
                    <label for="activity_description" class="mb-3 block text-base font-medium text-[#07074D]">Breve
                        Descripción</label>
                    <div class="sm-5">
                        <textarea name="activity_description"
                            class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
                            cols="50" rows="4" placeholder="Breve Descripción" required>
                        </textarea>
                    </div>
                </div>

                <x-add_question_panel></x-add_question_panel>

                <a href="{{ url('welcome') }}"
                    class="hover:shadow-form rounded-md bg-[#6A64F1] py-3 px-8 text-base
                    font-semibold text-white outline-none">Regresar</a>


                <input type="submit" name="submit" id="submit"
                    class="hover:shadow-form rounded-md bg-[#6A64F1] py-3 px-8 text-base font-semibold text-white outline-none"
                    value="Registrar">
            </form>
        </div>
    </main>
@endsection
