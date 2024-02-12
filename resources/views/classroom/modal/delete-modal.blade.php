<!-- Modal Overlay and Content -->
<div id="dialog-{{ $class->id }}"
    class="fixed top-0 left-0 hidden w-screen h-screen transition-opacity duration-500 bg-black opacity-0"
    onclick="hideDialog()">
    <div class="w-1/4 p-8 mx-auto my-20 bg-white rounded shadow-md">
        <div class="flex items-center gap-5">
            <div class="flex items-center justify-center w-10 h-10 p-5 text-red-500 bg-red-200 rounded-full">
                <!-- Your SVG icon can be placed here -->
            </div>
            <div>
                <h1 class="mb-2 text-lg font-bold">Deactivate Account</h1>
                <p>Are you sure you want to deactivate your account? All of your data will be permanently removed. This
                    action cannot be undone.</p>
            </div>
        </div>
        <div class="flex justify-end gap-4 mt-5">

            <button class="px-6 py-2 text-black bg-gray-100 border border-gray-300 rounded hover:bg-gray-200"
                onclick="hideDialog()">Cancel</button>
            {{-- <button class="px-6 py-2 text-white bg-red-500 rounded hover:bg-red-600">Deactivate</button> --}}
            <form action="{{ route('classroom.destroy', $class->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <input type="submit" value="Delete"
                    class="px-4 py-2 font-bold text-white bg-red-500 border border-red-700 rounded hover:bg-red-700">
            </form>
        </div>
