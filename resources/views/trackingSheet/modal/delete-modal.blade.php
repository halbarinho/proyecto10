<div id="deleteDialog"
    class="fixed top-0 left-0 z-40 hidden w-screen h-screen transition-opacity duration-500 bg-black opacity-0"
    onclick="hideDialog(); event.preventDefault();">
    <div class="w-1/4 p-8 mx-auto my-20 bg-white rounded shadow-md">
        <div class="flex items-center gap-5">
            <div class="flex items-center justify-center w-10 h-10 p-5 text-red-500 bg-red-200 rounded-full">

            </div>
            <div>
                <h1 class="mb-2 text-lg font-bold">Borrar Actividad</h1>
                <p>¿Está seguro de eliminar definitivamente la hoja de seguimiento?<br> Se perderán los
                    datos.
                </p>
            </div>
        </div>
        <div class="flex justify-end gap-4 mt-5">

            <button class="px-6 py-2 text-black bg-gray-100 border border-gray-300 rounded hover:bg-gray-200"
                onclick="hideDialog(); event.preventDefault();">Cancel</button>

            <button class="px-4 py-2 font-bold text-white bg-red-500 border border-red-700 rounded hover:bg-red-700"
                onclick="deleteSheet();event.preventDefault();">Eliminar</button>
        </div>
    </div>
</div>
