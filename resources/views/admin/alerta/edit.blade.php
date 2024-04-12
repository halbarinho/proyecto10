@extends('layout.template-adminDashboard')

@section('title', 'Editar Alerta')
{{-- @vite(['resources/css/app.css']) --}}
@vite('resources\js\app.js')

@section('content')

    <div
        class="relative gap-16 items-center p-8 mx-auto max-w-4xl bg-white shadow-[0_2px_10px_-3px_rgba(6,81,237,0.3)] rounded-md text-[#333] font-[sans-serif] dark:bg-gray-700">


        {{-- @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li class="text-sm text-red-600">{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif --}}

        @if (session('error'))
            <div>
                <ul>
                    <li class="text-xs text-redPersonal">{{ session('error') }}</li>
                </ul>
            </div>
        @endif

        <!-- Modal header -->
        <div class="flex items-center justify-between p-4 border-b rounded-t md:p-5 dark:border-gray-600">
            <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                Alerta : {{ $alerta->id }} del aula {{ $alerta->Classroom->class_name }} </h3>
            {{-- <button type="button" @click="closeModal"
                class="inline-flex items-center justify-center w-8 h-8 text-sm text-gray-400 bg-transparent rounded-lg hover:bg-gray-200 hover:text-gray-900 ms-auto dark:hover:bg-gray-600 dark:hover:text-white"
                data-modal-hide="static-modal">
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                </svg>
                <span class="sr-only">Close</span>
            </button> --}}
        </div>
        <!-- Modal body -->
        <div class="p-4 space-y-4 md:p-5">

            <form action="{{ route('admin.updateAlerta', $alerta->id) }}" method="POST" enctype="multipart/form-data"
                class="p-4 md:p-5">
                @csrf
                @method('PUT')
                <div class="grid grid-cols-2 gap-4 mb-4">
                    {{-- <input type="hidden" name="user_id" value="{{ $alerta->user_id }}"> --}}
                    {{-- este tengo que modificarlo --}}
                    {{-- <input type="hidden" name="active" value="{{ $alerta->active }}"> --}}
                    <div class="col-span-2">
                        <label for="title"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Titulo</label>
                        <input type="text" name="title" id="title" value="{{ $alerta->id }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="{{ $alerta->id }}" required>
                        @if ($errors->has('title'))
                            <div class="text-xs text-redPersonal">{{ $errors->first('title') }}</div>
                        @endif
                    </div>

                    <div class="col-span-2">
                        <label for="content"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Contenido</label>
                        <textarea id="content" name="content" rows="4" value="{{ $alerta->content }}"
                            class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="{{ $alerta->content }}">{{ $alerta->content }}</textarea>
                        @if ($errors->has('content'))
                            <div class="text-xs text-redPersonal">{{ $errors->first('content') }}</div>
                        @endif
                    </div>

                    <div class="col-span-2">

                        <label for="active">Marcar como solucionada</label>
                        @if ($alerta->active == false)
                            <input type="checkbox" name="active" id="active">
                        @else
                            <input type="checkbox" name="active" checked id="active">
                        @endif


                    </div>


                </div>

                <!-- Modal footer -->
                <div class="flex items-center p-4 border-t border-gray-200 rounded-b md:p-5 dark:border-gray-600">
                    <input type="submit" value="Actualizar"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">


                    {{-- <a href="{{ route('alerta.delete', $alerta->id) }}"> --}}
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
        @include('alerta.modal.delete-modal')
    </div>

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
                    // if (!response.ok) {
                    //     throw new Error('Network response was not ok');
                    // }
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