<div id="dialog-confirm"
    class="fixed top-0 left-0 hidden w-screen h-screen transition-opacity duration-500 bg-black opacity-0">
    <div class="w-1/4 p-8 mx-auto my-20 bg-white rounded shadow-md">
        <div class="flex items-center gap-5">
            <div class="flex items-center justify-center w-10 h-10 p-5 text-red-500 bg-red-200 rounded-full">
                <!-- Your SVG icon can be placed here -->
            </div>
            <div>
                <h1 class="mb-2 text-lg font-bold">Vas a enviar</h1>
                <p>Quieres identificarte o continuar de forma anónima.</p>

                <form method="POST" id="modalForm" onsubmit="preventDefault()">
                    @csrf
                    <input type="radio" name="identificado" id="true" value="true" checked>
                    <label for="true">Si</label>
                    <input type="radio" name="identificado" id="false" value="false">
                    <label for="false">No</label>

            </div>



        </div>
        <div class="flex justify-end gap-4 mt-5">

            @csrf
            @method('POST')

            <button type="button" onclick="submitForm()"
                class="px-4 py-2 font-bold text-white bg-red-500 border border-red-700 rounded hover:bg-red-700">Confirmar</button>

            </form>

            <button class="px-6 py-2 text-black bg-gray-100 border border-gray-300 rounded hover:bg-gray-200"
                onclick="hideDialog()">Cancelar</button>

        </div>
