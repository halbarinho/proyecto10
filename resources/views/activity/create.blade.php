@extends('layout.templateCRUD')

@section('title', 'Registrar Nuevo Actividad')
<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
    crossorigin="anonymous"></script>
@vite(['resources/css/app.css', 'resources/js/app.js'])

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

            <h2>Registrar Nueva Actividad</h2>
            <form action="{{ route('activity.store') }}" method="post" id="form">
                @csrf
                <div id="formInputs">
                    <div class="mb-3 row">
                        <label for="activity_name" class="mb-3 block text-base font-medium text-[#07074D]">Nombre de la
                            Actividad</label>
                        <div class="sm-5">
                            <input type="text" name="activity_name"
                                class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
                                value="{{ old('activity_name') }}" placeholder="Nombre Actividad" required>
                        </div>
                    </div>

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
                </div>
                <div id="contenedor"></div>

                <a href="{{ url('welcome') }}"
                    class="hover:shadow-form rounded-md bg-[#6A64F1] py-3 px-8 text-base
                    font-semibold text-white outline-none">Regresar</a>


                <input type="submit" name="submit" id="submit"
                    class="hover:shadow-form rounded-md bg-[#6A64F1] py-3 px-8 text-base font-semibold text-white outline-none"
                    value="Registrar">
            </form>
            <x-add_question_panel></x-add_question_panel>
        </div>
    </main>
    <script>
        $(document).ready(function() {
            $('#type_multiple,#type_bool,#type_short').click(function(event) {
                const idElemento = event.target.id;

                console.log("Clicaste sobre el elemento" + idElemento);

                switch (idElemento) {
                    case 'type_short':

                        // console.log('Botonshort');
                        break;
                    case 'type_multiple':
                        console.log('btnMultiple');
                        break;
                    case 'type_bool':
                        // console.log('btnBool');

                        // $.get("/resources/views/components/bool_question_form.blade.php", function(data) {
                        //     $('#moc').html(data);
                        //     $('#formInputs').append(data);
                        // });


                        // $('#formInputs').append("Helloy");
                        // $.ajax({
                        //     url: "/resources/views/components/bool_question_form.blade.php",
                        //     success: function(data) {
                        //         $('#formInputs').append(data);
                        //     },
                        //     dataType: 'html'
                        // });

                        document.getElementById('contenedor').append(
                            "<x-bool_question_form/>");

                        break;
                    default:
                        console.log('Btn Desconocido');
                }

            });
        });
    </script>
@endsection
