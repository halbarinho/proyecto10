@extends('layout.template-dashboard')

@section('js')
    <script>
        function showDialog(id) {
            let dialog = document.getElementById('dialog-' + id);
            dialog.classList.remove('hidden');
            setTimeout(() => {
                dialog.classList.remove('opacity-0');
            }, 20);
        }

        function hideDialog(id) {
            let dialog = document.getElementById('dialog-' + id);
            dialog.classList.add('opacity-0');
            setTimeout(() => {
                dialog.classList.add('hidden');
            }, 500);
        }

        function deleteAlerta(id) {

            fetch(`/alerta/${id}`, {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Content-Type': 'application/json'
                    },
                })
                .then(response => {

                    // Recarga la página
                    // location.reload(); //
                    window.history.back();
                })
                .catch(error => {
                    console.error("Ha habido un error al intentar eliminar la alerta: ".id, error);
                });
        }

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

            $('#statusForm').submit();
        }
    </script>
@endsection

@section('title', 'Ver Alerta')

@vite('resources\js\app.js')



@section('content')

    <div
        class="relative gap-16 items-center p-8 mx-auto max-w-4xl bg-white shadow-[0_2px_10px_-3px_rgba(6,81,237,0.3)] rounded-md text-[#333] font-[sans-serif] dark:bg-gray-700">


        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li class="text-sm text-red-600">{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if (!is_null($alerta->estudiante_id))
            @include('alerta.modal.tracking-modal')
            @include('alerta.modal.changeEstudiantesStatus-modal')
        @endif


        <!-- header -->
        <div class="flex items-center justify-between p-4 border-b rounded-t md:p-5 dark:border-gray-600">
            <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                @if (!is_null($alerta->estudiante_id))
                    Alerta : {{ $alerta->id }} del aula: {{ $alerta->Classroom->class_name }}
                @else
                    Alerta Anónima
                @endif
            </h3>

        </div>
        <!--  body -->
        <div class="p-4 space-y-4 md:p-5">

            <form action="{{ route('alerta.update', ['alertum' => $alerta->id]) }}" method="POST"
                enctype="multipart/form-data" class="p-4 md:p-5">
                @csrf
                @method('PUT')
                <div class="grid grid-cols-2 gap-4 mb-4">

                    <div class="col-span-2">
                        <label for="title"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Titulo</label>
                        <input type="hidden" name="title" id="title" value="{{ $alerta->id }}">
                        <div id="titleValue"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            {{ $alerta->id }}</div>
                    </div>

                    <div class="col-span-2">
                        <label for="content"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Contenido</label>
                        <div id="content" rows="4" contenteditable="false"
                            class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            {{ $alerta->content }}</div>
                    </div>
                    <input type="hidden" name="content" value="{{ $alerta->content }}">
                    <div class="col-span-2">

                        <label for="active">Marcar como solucionada</label>
                        @if ($alerta->active == false)
                            <input type="checkbox" name="active" id="active">
                        @else
                            <input type="checkbox" name="active" checked id="active">
                        @endif


                    </div>


                </div>

                <!-- footer -->
                <div
                    class="flex items-center justify-end p-4 border-t border-gray-200 rounded-b md:p-5 dark:border-gray-600">
                    <input type="submit" value="Actualizar"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">


                    @if (!is_null($alerta->estudiante_id))
                        <button type="button" onclick="showTrackingSheet(); event.preventDefault();"
                            class="text-yellow-600 ms-3 bg-yellow-200 hover:bg-yellowPersonalLight focus:ring-4 focus:outline-none hover:text-white focus:ring-yellow-200 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Adjuntar
                            Historial</button>

                        <!-- Botón para añadir seguimiento al usuario -->
                        <button type="button" onclick="addEstudianteStatus(); event.preventDefault();"
                            class="py-2.5 px-5 ms-3 text-sm font-medium text-black focus:outline-none bg-semidarkGray rounded-lg border border-semidarkGray hover:bg-grayDarkerPersonal hover:text-white focus:z-10 focus:ring-4 focus:ring-gray-100"
                            value="">Cambiar Seguimiento</button>
                    @endif

                    <a onclick="showDialog({{ $alerta->id }})">
                        <button data-modal-hide="static-modal" type="button"
                            class="py-2.5 px-5 ms-3 text-sm font-medium text-red-900 focus:outline-none bg-red-300 rounded-lg border border-red-200 hover:bg-red-600 hover:text-white focus:z-10 focus:ring-4 focus:ring-red-100 dark:focus:ring-red-700 dark:bg-red-800 dark:text-red-400 dark:border-red-600 dark:hover:text-white dark:hover:bg-red-700">
                            Borrar</button>
                    </a>

                    <a href="{{ route('alerta.index') }}">
                        <button data-modal-hide="static-modal" type="button"
                            class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                            Cancelar</button>
                    </a>
                </div>
            </form>
        </div>
        @include('alerta.modal.delete-modal')
    </div>


@endsection
