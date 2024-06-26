@extends('layout.template-adminDashboard')

@section('js')

    <script src="{{ asset('js/showHideDialog.js') }}"></script>

    <script>
        function deletePost() {

            const dialog = document.getElementById('dialog');
            const id = dialog.dataset.id;

            if (!id) {
                console.error('No se ha proporcionado un ID de post para eliminar.');
                return;
            }

            fetch(`/post/${id}`, {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Content-Type': 'application/json'
                    },
                })
                .then(response => {

                    // Recarga la página
                    // location.reload(); // O cualquier otra acción necesaria
                    window.location.href = '{{ route('admin.posts') }}';
                })
                .catch(error => {
                    console.error('Ha habido un error al intentar eliminar el post:', error);
                });
        }
    </script>
@endsection

@section('title', 'Editar Posts')

@vite('resources\js\app.js')

@section('content')

    <div
        class="relative gap-16 items-center p-8 mx-auto max-w-4xl bg-white shadow-[0_2px_10px_-3px_rgba(6,81,237,0.3)] rounded-md text-[#333] font-[sans-serif] dark:bg-gray-700">


        @if ($errors->any())
            <div class="">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li class="text-sm"><span
                                class="p-1 text-sm text-white bg-red-300 rounded-md">{{ $error }}</span></li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- header -->
        <div class="flex items-center justify-between p-4 border-b rounded-t md:p-5 dark:border-gray-600">
            <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                Editar el Post: {{ $post->title }}
            </h3>
            <a href="{{ route('docente.posts.index') }}">
                <button type="button"
                    class="inline-flex items-center justify-center w-8 h-8 text-sm text-gray-400 bg-transparent rounded-lg hover:bg-gray-200 hover:text-gray-900 ms-auto dark:hover:bg-gray-600 dark:hover:text-white"
                    data-modal-hide="static-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close</span>
                </button>
            </a>
        </div>
        <!-- body -->
        <div class="p-4 space-y-4 md:p-5">

            <form action="{{ route('post.update', ['post' => $post->id]) }}" method="POST" enctype="multipart/form-data"
                class="p-4 md:p-5">
                @csrf
                @method('PUT')
                <div class="grid grid-cols-2 gap-4 mb-4">
                    <input type="hidden" name="user_id" value="{{ $post->user_id }}">

                    <input type="hidden" name="active" value="{{ $post->active }}">
                    <div class="col-span-2">
                        <label for="title"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Titulo</label>
                        <input type="text" name="title" id="title" value="{{ $post->title }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="{{ $post->title }}" required>
                        @error('title')
                            <div class="my-2 text-sm text-red-600">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-span-2 sm:col-span-1">
                        <label for="category"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Categoría</label>
                        <select id="category_id" name="category_id"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">

                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}"
                                    {{ $post->category->id == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach

                        </select>
                        @error('category_id')
                            <div class="my-2 text-sm text-red-600">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-span-2">
                        <label for="body"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Contenido</label>
                        <textarea id="body" name="body" rows="4" value="{{ $post->body }}"
                            class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="{{ $post->body }}">{{ $post->body }}</textarea>
                        @error('body')
                            <div class="my-2 text-sm text-red-600">{{ $message }}</div>
                        @enderror
                    </div>


                    <div class="col-span-2">

                        <label class="block my-2 mb-2 text-sm font-medium text-gray-900 dark:text-white"
                            for="img_url"></label>

                        @if ($post->img_url)
                            <img class="w-64 h-auto my-2 mx-w-xs" src="/storage/{{ $post->img_url }}" alt="">
                        @else
                            {{ $post->id }}
                        @endif
                        <input
                            class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                            aria-describedby="img_url_help" id="img_url" name="img_url" type="file"
                            value="{{ $post->img_url }}">

                        @error('img_url')
                            <div class="my-2 text-sm text-red-600">{{ $message }}</div>
                        @enderror
                    </div>


                </div>

                <!-- footer -->
                <div
                    class="flex items-center justify-end p-4 border-t border-gray-200 rounded-b md:p-5 dark:border-gray-600">
                    <input type="submit" value="Actualizar"
                        class="justify-end px-4 py-2 font-bold text-white rounded-md bg-blueLighterPersonal border-blueLighterPersonal hover:bg-blueLightPersonal">

                    <button onclick="showDialog({{ $post->id }})" data-modal-hide="static-modal" type="button"
                        class="py-2.5 px-5 ms-3 text-sm font-bold text-red-900 focus:outline-none bg-red-300 rounded-lg border border-red-200 hover:bg-red-600 hover:text-white focus:z-10 focus:ring-4 focus:ring-red-100 dark:focus:ring-red-700 dark:bg-red-800 dark:text-red-400 dark:border-red-600 dark:hover:text-white dark:hover:bg-red-700">
                        Borrar</button>


                    <a href="{{ route('post.index') }}">
                        <button data-modal-hide="static-modal" type="button"
                            class="py-2.5 px-5 ms-3 text-sm font-bold text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                            Cancelar</button>
                    </a>
                </div>
            </form>
        </div>
    </div>
    @include('admin.post.modal.delete-modal')


@endsection
