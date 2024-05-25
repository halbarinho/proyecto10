@extends('layout.template-dashboard')

@section('css')
    {{-- Datatables --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.3/css/dataTables.tailwindcss.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.3/css/dataTables.dataTables.css" />

@endsection

@section('js')

    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
        crossorigin="anonymous"></script>

    {{-- Datatables --}}
    <script src="https://cdn.datatables.net/2.0.3/js/dataTables.js"></script>
    <script>
        $(document).ready(function() {
            $('#postsTable').DataTable({
                "order": [
                    [3, "desc"]
                ],
                columnDefs: [{
                    targets: [0, 5, 6],
                    sortable: false,
                    searchable: false
                }],
                language: {
                    "decimal": "",
                    "emptyTable": "No hay datos",
                    "info": "Mostrando _START_ a _END_ de _TOTAL_ registros",
                    "infoEmpty": "Mostrando 0 a 0 de 0 registros",
                    "infoFiltered": "(Filtro de _MAX_ total registros)",
                    "infoPostFix": "",
                    "thousands": ",",
                    "lengthMenu": "Mostrar _MENU_ registros",
                    "loadingRecords": "Cargando...",
                    "processing": "Procesando...",
                    "search": "Buscar:",
                    "zeroRecords": "No se encontraron coincidencias",
                    "paginate": {
                        "first": "Primero",
                        "last": "Ultimo",
                        "next": "Próximo",
                        "previous": "Anterior"
                    },
                    "aria": {
                        "sortAscending": ": Activar orden de columna ascendente",
                        "sortDescending": ": Activar orden de columna desendente"
                    }
                },
                layout: {
                    topStart: null
                }
            });
        });
    </script>

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
                    location.reload(); // O cualquier otra acción necesaria
                })
                .catch(error => {
                    console.error('Ha habido un error al intentar eliminar el post:', error);
                });
        }
    </script>

    {{-- <script>
        let postToDeleteId;

        function showDialog(id) {

            postToDeleteId = id;

            let dialog = document.getElementById('dialog');
            dialog.classList.remove('hidden');
            setTimeout(() => {
                dialog.classList.remove('opacity-0');
            }, 20);
        }

        function hideDialog(id) {

            let dialog = document.getElementById('dialog');
            dialog.classList.add('opacity-0');
            setTimeout(() => {
                dialog.classList.add('hidden');
            }, 500);
        }

        function deletePost(id) {

            if (!postToDeleteId) {
                console.error('No se ha proporcionado un ID de post para eliminar.');
                return;
            }

            fetch(`/post/${postToDeleteId}`, {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Content-Type': 'application/json'
                    },
                })
                .then(response => {

                    // Recarga la página
                    location.reload(); // O cualquier otra acción necesaria
                })
                .catch(error => {
                    console.error('Ha habido un error al intentar eliminar el post:', error);
                });
        }
    </script> --}}

@endsection

@section('title', 'Posts')

@vite('resources\js\posts.js')

@section('content')

    <main>
        <div class="container py-4 mx-auto">


            {{-- INCLUYO MENSAJES DE ERROR --}}
            @if ($errors->any())
                <div class="">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li class="text-sm "><span
                                    class="p-1 text-sm text-white bg-red-300 rounded-md">{{ $error }}</span></li>
                        @endforeach
                    </ul>
                </div>
            @elseif (session('success'))
                <div class="">
                    <span class="p-1 text-white rounded-md bg-greenPersonal">{{ session('success') }}</span>
                </div>
            @endif

            <section class="p-3 antialiased bg-gray-50 dark:bg-gray-900 sm:p-5">
                <div class="max-w-screen-xl px-4 mx-auto lg:px-12">
                    <div
                        class="flex flex-col items-center justify-between p-4 space-y-3 md:flex-row md:space-y-0 md:space-x-4">
                        <h1 class="text-3xl uppercase">Posts</h1>

                        <div id="postsModalCreate">
                            <postsModalCreate">
                                </postsModalCreate>
                        </div>

                    </div>
                    <div class="relative overflow-hidden bg-white shadow-md dark:bg-gray-800 sm:rounded-lg">
                        <div
                            class="flex flex-col items-center justify-between p-4 space-y-3 md:flex-row md:space-y-0 md:space-x-4">

                            <div class="w-1/2 md:w-full">

                                @if ($posts->isEmpty())
                                    <h3 class="text-red-600">No hay registros de Posts</h3>
                                @else
                                    <div class="mx-3 mb-5">
                                        <span class="">{{ count($posts) }} posts</span>
                                        <hr class="h-0.5 mt-5 mx-auto border-t-2 border-opacity-100 border-black ">
                                    </div>
                                    {{-- Tabla POST --}}

                                    <table id="postsTable"
                                        class="table w-full text-sm text-left text-gray-500 rtl:text-right dark:text-gray-400">
                                        <thead
                                            class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                            <tr>
                                                <th class="px-6 py-3">
                                                    Imagen
                                                </th>
                                                <th class="px-6 py-3">
                                                    <div class="flex items-center">
                                                        Titulo
                                                    </div>
                                                </th>
                                                <th class="px-6 py-3">
                                                    <div class="flex items-center">
                                                        Texto
                                                    </div>
                                                </th>
                                                <th class="px-6 py-3">
                                                    <div class="flex items-center">
                                                        Categoria
                                                    </div>
                                                </th>
                                                <th class="px-6 py-3">
                                                    <div class="flex items-center">
                                                        Fecha Edicion
                                                    </div>
                                                </th>
                                                <th class="px-6 py-3">
                                                    <div class="flex items-center">
                                                        <span class="sr-only">Opciones</span>
                                                    </div>
                                                </th>
                                                <th class="px-6 py-3">
                                                    <span class="sr-only">Edit</span>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($posts as $post)
                                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                                    <th
                                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                        @if ($post->img_url)
                                                            <img class="w-40 h-auto max-w-xs"
                                                                src="/storage/{{ $post->img_url }}" alt="">
                                                        @else
                                                            {{ $post->id }}
                                                        @endif

                                                    </th>
                                                    <td class="px-6 py-4">
                                                        {{ $post->title }}
                                                    </td>
                                                    <td class="px-6 py-4">
                                                        <span
                                                            style="display: inline-block;
                                                                 width:180px;
                                                                    white-space:nowrap;
                                                                     overflow:hidden !important;
                                                   text-overflow:ellipsis;">{{ $post->body }}</span>
                                                    </td>
                                                    <td class="px-6 py-4">
                                                        {{ $post->Category->name }}
                                                    </td>
                                                    <td class="px-6 py-4">
                                                        {{ $post->created_at->format('d-m-Y') }}
                                                    </td>
                                                    <td class="px-6 py-4 text-right">
                                                        <a href="{{ route('post.edit', $post->id) }}"
                                                            class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
                                                            <svg viewBox="0 0 24 24" class="w-9 h-9"
                                                                xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round">
                                                                <path
                                                                    d=" M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    2 0 0 0 2-2v-7" />
                                                                <path
                                                                    d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z" />
                                                            </svg>
                                                        </a>
                                                    </td>
                                                    <td class="px-6 py-4 text-right">

                                                        <div onclick="showDialog({{ $post->id }})">
                                                            <svg version="1.1" width="36" height="36"
                                                                class="hover:cursor-pointer" viewBox="0 0 36 36"
                                                                preserveAspectRatio="xMidYMid meet"
                                                                xmlns="http://www.w3.org/2000/svg"
                                                                xmlns:xlink="http://www.w3.org/1999/xlink">
                                                                <title>trash-line</title>
                                                                <path class="clr-i-outline clr-i-outline-path-1"
                                                                    d=" M27.14,34H8.86A2.93,2.93,0,0,1,6,31V11.23H8V31a.93.93,0,0,0,.86,1H27.14A.93.93,0,0,0,28,31V11.23h2V31A2.93,2.93,0,0,1,27.14,34Z" />
                                                                <path
                                                                    class="clr-i-outline clr-i-outline-path-2"d="M30.78,9H5A1,1,0,0,1,5,7H30.78a1,1,0,0,1,0,2Z">
                                                                </path>
                                                                <rect class="clr-i-outline clr-i-outline-path-3" x="21"
                                                                    y="13" width="2" height="15">
                                                                </rect>
                                                                <rect class="clr-i-outline clr-i-outline-path-4" x="13"
                                                                    y="13" width="2" height="15">
                                                                </rect>
                                                                <path class="clr-i-outline clr-i-outline-path-5"
                                                                    d="M23,5.86H21.1V4H14.9V5.86H13V4a2,2,0,0,1,1.9-2h6.2A2,2,0,0,1,23,4Z">
                                                                </path>
                                                                <rect x="0" y="0" width="36" height="36"
                                                                    fill-opacity="0" />
                                                            </svg>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach

                                        </tbody>
                                    </table>


                            </div>





                        </div>
                        <div class="flex flex-col items-end my-2 mr-2">

                            <div>
                                <a href="{{ route('post.showPosts') }}">
                                    <button type="button"
                                        class="py-2.5 px-5 ms-3 text-sm font-medium text-red-900 focus:outline-none bg-red-300 rounded-lg border border-red-200 hover:bg-red-600 hover:text-white focus:z-10 focus:ring-4 focus:ring-red-100 dark:focus:ring-red-700 dark:bg-red-800 dark:text-red-400 dark:border-red-600 dark:hover:text-white dark:hover:bg-red-700">
                                        Previsualizar Posts</button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            @include('docente.modal.delete-modal')
            @endif

        </div>

    </main>

@endsection
