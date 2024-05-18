<div id="statusDialog"
    class="fixed top-0 left-0 z-40 hidden w-screen h-screen transition-opacity duration-500 bg-black opacity-0">

    <div class="w-1/4 p-8 mx-auto my-20 bg-white rounded shadow-md">
        <div class="flex items-center gap-5">
            <div class="flex items-center justify-center w-10 h-10 p-5 text-red-500 bg-red-200 rounded-full">

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

                </form>
            </div>

            <div>
                <button type="submit" form="statusForm" onclick="submitStatusForm()"
                    class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    Aceptar
                </button>
                <button class="px-6 py-2 text-black bg-gray-100 border border-gray-300 rounded hover:bg-gray-200"
                    onclick="hidestatusDialog(); event.preventDefault();">Cancel</button>

            </div>
        </div>
    </div>
</div>
