@extends('layout.template-adminDashboard')

@section('title', 'Editar Notificacion')

@vite('resources\js\app.js')

@section('content')

    <div
        class="relative gap-16 items-center p-8 mx-auto max-w-4xl bg-white shadow-[0_2px_10px_-3px_rgba(6,81,237,0.3)] rounded-md text-[#333] font-[sans-serif] dark:bg-gray-700">


        @if (session('error'))
            <div>
                <ul>
                    <li class="text-xs text-redPersonal">{{ session('error') }}</li>
                </ul>
            </div>
        @endif


        <div class="flex items-center justify-between p-4 border-b rounded-t md:p-5 dark:border-gray-600">
            <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                Editar la Notificacion: {{ $notification->id }}
            </h3>

        </div>
        <!--  body -->
        <div class="p-4 space-y-4 md:p-5">

            <form action="{{ route('admin.updateNotification', $notification) }}" method="POST" enctype="multipart/form-data"
                class="p-4 md:p-5">
                @csrf
                @method('PUT')
                <div class="grid grid-cols-2 gap-4 mb-4">

                    <input type="hidden" name="id" value="{{ $notification->id }}">
                    <div class="col-span-2">
                        <label for="type" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tipo
                            Notificación</label>
                        <input type="text" name="type" id="type" value="{{ $notification->type }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="{{ $notification->type }}" required>
                        @error('type')
                            <div class="my-2 text-sm text-red-600">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-span-2">
                        <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Contenido
                            Notificación</label>
                        <textarea id="message" name="message" rows="4" value="{{ $notification->message }}"
                            class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="{{ $notification->message }}">{{ $notification->message }}</textarea>
                        @error('message')
                            <div class="my-2 text-sm text-red-600">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-span-2">
                        <label for="read"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Notificación Leida</label>
                        @if ($notification->read == false)
                            <input type="checkbox" name="read" id="read">
                        @else
                            <input type="checkbox" name="read" checked id="read">
                        @endif
                        @error('read')
                            <div class="my-2 text-sm text-red-600">{{ $message }}</div>
                        @enderror
                    </div>

                </div>

                <!--  footer -->
                <div class="flex items-center p-4 border-t border-gray-200 rounded-b md:p-5 dark:border-gray-600">
                    <input type="submit" value="Actualizar"
                        class="justify-end px-4 py-2 font-bold text-white rounded-md bg-blueLighterPersonal border-blueLighterPersonal hover:bg-blueLightPersonal">

                    <a href="{{ route('admin.notificationDestroy', (int) $notification->id) }}">
                        <button data-modal-hide="static-modal" type="button"
                            class="py-2.5 px-5 ms-3 text-sm font-bold text-red-900 focus:outline-none bg-red-300 rounded-lg border border-red-200 hover:bg-red-600 hover:text-white focus:z-10 focus:ring-4 focus:ring-red-100 dark:focus:ring-red-700 dark:bg-red-800 dark:text-red-400 dark:border-red-600 dark:hover:text-white dark:hover:bg-red-700">
                            Borrar</button>
                    </a>

                    <a href="{{ route('admin.notifications') }}">
                        <button data-modal-hide="static-modal" type="button"
                            class="py-2.5 px-5 ms-3 text-sm font-bold text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                            Cancelar</button>
                    </a>
                </div>
            </form>
        </div>
    </div>
@endsection
