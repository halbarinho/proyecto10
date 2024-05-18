@extends('layout.template-adminDashboard')

@section('title', 'Editar Actividad')

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
                Editar la Actividad: {{ $activity->activity_name }}
            </h3>

        </div>
        <!--  body -->
        <div class="p-4 space-y-4 md:p-5">

            <form action="{{ route('admin.updateActivity', $activity) }}" method="POST" enctype="multipart/form-data"
                class="p-4 md:p-5">
                @csrf
                @method('PUT')
                <div class="grid grid-cols-2 gap-4 mb-4">
                    <input type="hidden" name="user_id" value="{{ $activity->user_id }}">

                    <input type="hidden" name="id" value="{{ $activity->id }}">
                    <div class="col-span-2">
                        <label for="activity_name"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Titulo Actividad</label>
                        <input type="text" name="activity_name" id="activity_name" value="{{ $activity->activity_name }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="{{ $activity->activity_name }}" required>
                        @error('activity_name')
                            <div class="my-2 text-sm text-red-600">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-span-2">
                        <label for="activity_description"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Descripción
                            Actividad</label>
                        <textarea id="activity_description" name="activity_description" rows="4"
                            value="{{ $activity->activity_description }}"
                            class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="{{ $activity->activity_description }}">{{ $activity->activity_description }}</textarea>
                        @error('activity_description')
                            <div class="my-2 text-sm text-red-600">{{ $message }}</div>
                        @enderror
                    </div>

                </div>

                <!-- footer -->
                <div class="flex items-center p-4 border-t border-gray-200 rounded-b md:p-5 dark:border-gray-600">
                    <input type="submit" value="Actualizar"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">

                    <a href="{{ route('activity.destroy', (int) $activity->id) }}">
                        <button data-modal-hide="static-modal" type="button"
                            class="py-2.5 px-5 ms-3 text-sm font-medium text-red-900 focus:outline-none bg-red-300 rounded-lg border border-red-200 hover:bg-red-600 hover:text-white focus:z-10 focus:ring-4 focus:ring-red-100 dark:focus:ring-red-700 dark:bg-red-800 dark:text-red-400 dark:border-red-600 dark:hover:text-white dark:hover:bg-red-700">
                            Borrar</button>
                    </a>

                    <a href="{{ route('admin.activities') }}">
                        <button data-modal-hide="static-modal" type="button"
                            class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                            Cancelar</button>
                    </a>
                </div>
            </form>
        </div>
    </div>
@endsection
