@extends('layout.template-adminDashboard')

@section('js')
    <script src="{{ asset('js/showHideDialog.js') }}"></script>

    <script>
        function deleteAlerta() {

            const dialog = document.getElementById('dialog');
            const id = dialog.dataset.id;

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
    </script>
@endsection

@section('title', 'Editar Alerta')
{{-- @vite(['resources/css/app.css']) --}}
@vite('resources\js\app.js')

@section('content')

    <div
        class="relative gap-16 items-center p-8 mx-auto max-w-4xl bg-white shadow-[0_2px_10px_-3px_rgba(6,81,237,0.3)] rounded-md text-[#333] font-[sans-serif] dark:bg-gray-700">

        @if (session('error'))
            <div>
                <ul>
                    <li class="text-sm"><span
                            class="p-1 text-sm text-white bg-red-300 rounded-md">{{ session('error') }}</span></li>
                </ul>
            </div>
        @endif

        <!-- header -->
        <div class="flex items-center justify-between p-4 border-b rounded-t md:p-5 dark:border-gray-600">
            <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                Alerta : {{ $alerta->id }} del aula {{ $alerta->Classroom->class_name }} </h3>

        </div>
        <!-- body -->
        <div class="p-4 space-y-4 md:p-5">

            <form action="{{ route('admin.updateAlerta', $alerta->id) }}" method="POST" enctype="multipart/form-data"
                class="p-4 md:p-5">
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

                <!--  footer -->
                <div class="flex items-center p-4 border-t border-gray-200 rounded-b md:p-5 dark:border-gray-600">
                    <input type="submit" value="Actualizar"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">

                    <a onclick="showDialog({{ $alerta->id }})">
                        <button data-modal-hide="static-modal" type="button"
                            class="py-2.5 px-5 ms-3 text-sm font-medium text-red-900 focus:outline-none bg-red-300 rounded-lg border border-red-200 hover:bg-red-600 hover:text-white focus:z-10 focus:ring-4 focus:ring-red-100 dark:focus:ring-red-700 dark:bg-red-800 dark:text-red-400 dark:border-red-600 dark:hover:text-white dark:hover:bg-red-700">
                            Borrar</button>
                    </a>

                    <a href="{{ route('admin.alertas') }}">
                        <button data-modal-hide="static-modal" type="button"
                            class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                            Cancelar</button>
                    </a>
                </div>
            </form>
        </div>
        @include('admin.alerta.modal.delete-modal')
    </div>


@endsection
