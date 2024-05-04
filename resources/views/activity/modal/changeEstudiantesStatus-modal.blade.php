<div id="statusDialog"
    class="fixed top-0 left-0 z-40 hidden w-screen h-screen transition-opacity duration-500 bg-black opacity-0">
    {{-- onclick="hideSendDialog({{ $activity->id }}); event.preventDefault();"> --}}
    <div class="w-1/4 p-8 mx-auto my-20 bg-white rounded shadow-md">
        <div class="flex items-center gap-5">
            <div class="flex items-center justify-center w-10 h-10 p-5 text-red-500 bg-red-200 rounded-full">
                <!-- Your SVG icon can be placed here -->
            </div>
            <div>
                <h1 class="mb-2 text-lg font-bold">Modificar Seguimiento</h1>
                <p>¿Está seguro de modificar el nivel de seguimiento?<br>Pulsa aceptar para confirmar.
                </p>
            </div>
        </div>
        <div class="flex flex-wrap items-center justify-center gap-4 mt-5">
            <div class="">
                <form id="statusForm" action="{{ route('estudiante.statusUpdate') }}" method="POST">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="estudianteId" id="estudianteId" value="{{ $studentId }}">

                    <select name="status" id="status" class="form-select">
                        @foreach ($status as $item => $value)
                            <option value="{{ $value }}">{{ $item }}</option>
                        @endforeach
                    </select>

                    {{-- <input type="submit" value="Enviar"
                    class="px-4 py-2 font-bold text-white bg-red-500 border border-red-700 rounded hover:bg-red-700"> --}}
                </form>
            </div>

            <div>
                <button type="submit" form="statusForm" onclick="submitStatusForm()"
                    class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    {{-- <svg class="w-5 h-5 me-1 -ms-1" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                                        clip-rule="evenodd"></path>
                                </svg> --}}
                    Aceptar
                </button>
                <button class="px-6 py-2 text-black bg-gray-100 border border-gray-300 rounded hover:bg-gray-200"
                    onclick="hidestatusDialog(); event.preventDefault();">Cancel</button>
                {{-- <button class="px-6 py-2 text-white bg-red-500 rounded hover:bg-red-600">Deactivate</button> --}}

                {{-- <button class="px-4 py-2 font-bold text-white bg-red-500 border border-red-700 rounded hover:bg-red-700"
                onclick="deleteActivity({{ $activity->id }})">Eliminar</button> --}}
            </div>
        </div>
    </div>
</div>
