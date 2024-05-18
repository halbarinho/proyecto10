<div id="sendDialog-{{ $activity->id }}"
    class="fixed top-0 left-0 z-40 hidden w-screen h-screen transition-opacity duration-500 bg-black opacity-0">

    <div class="w-1/4 p-8 mx-auto my-20 bg-white rounded shadow-md">
        <div class="flex items-center gap-5">
            <div class="flex items-center justify-center w-10 h-10 p-5 text-red-500 bg-red-200 rounded-full">

            </div>
            <div>
                <h1 class="mb-2 text-lg font-bold">Enviar Actividad</h1>
                <p>¿Está seguro de enviar la actividad: {{ $activity->id }}?<br>Pulsa enviar para confirmar.
                </p>
            </div>
        </div>
        <div class="flex flex-wrap justify-center gap-4 mt-5">
            <div class="justify-center w-full">
                <form action="{{ route('activity.sendActivity', $activity->id) }}" method="POST">
                    @csrf
                    @method('POST')
                    <select name="classroom" id="classroom" class=" form-select">
                        @foreach ($classrooms as $class)
                            <option value="{{ $class->id }}">{{ $class->class_name }}</option>
                        @endforeach
                    </select>
                    <input type="submit" value="Enviar"
                        class="px-4 py-2 font-bold text-white bg-red-500 border border-red-700 rounded hover:bg-red-700">
                </form>
            </div>
            <button class="w-full px-6 py-2 text-black bg-gray-100 border border-gray-300 rounded hover:bg-gray-200"
                onclick="hideSendDialog({{ $activity->id }}); event.preventDefault();">Cancel</button>

        </div>
    </div>
</div>
