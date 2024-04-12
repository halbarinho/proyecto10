@extends('layout.template-adminDashboard')

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
                    targets: [0, 4],
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
                }
            });
        });
    </script>

@endsection

@section('title', 'Admin Posts')
{{-- @vite(['resources/css/app.css']) --}}
@vite('resources\js\posts.js')

@section('content')

    <div class="grid grid-cols-1 ml-4 mr-4 mt-14">
        <div class="container py-4 mx-auto">


            {{-- INCLUYO MENSAJES DE ERROR --}}
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li class="text-sm text-red-600">{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @elseif (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
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
                                    <h3>No hay registros de Posts</h3>
                                    <a href="{{ route('post.create') }}">
                                        <button id="createPost"
                                            class="px-5 py-2 text-white rounded-md cursor-pointer bg-rose-500 hover:bg-rose-700">Crear
                                            Nueva
                                            Post</button>
                                    </a>
                                @else
                                    @if ($posts->isEmpty())
                                        <h3>No hay registros de Aulas</h3>
                                    @else
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
                                                            Opciones
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
                                                                {{-- <img class="w-64 h-auto mx-w-xs" src="{{ asset($post->img_url) }}" alt=""> --}}
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
                                                            {{ $post->created_at }}
                                                        </td>
                                                        <td class="px-6 py-4 text-right">
                                                            <a href="{{ route('post.edit', $post->id) }}"
                                                                class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                                                        </td>
                                                        <td class="px-6 py-4 text-right">
                                                            <a href="{{ route('post.delete', $post->id) }}"
                                                                class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Borrar</a>
                                                        </td>
                                                    </tr>
                                                @endforeach

                                            </tbody>
                                        </table>


                            </div>




                            @endif
                        </div>
                        <div class="flex flex-col items-end my-2 mr-2">
                            {{-- <div id="postsModalCreate" class="">
                                    <postsModalCreate">
                                        </postsModalCreate>
                                </div> --}}

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

            @endif

        </div>

        </main>
    @endsection
