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
            $('#alertasTable').DataTable({
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

@section('title', 'Chat')

@vite(['resources/css/app.css'])
@vite(['resources/js/app.js'])

@vite(['resources/js/chatSearchUser.js'])



@section('content')

    <main>
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


            <!-- component -->
            <div class="flex h-screen antialiased text-gray-800">
                <div class="flex flex-row w-full h-full overflow-x-hidden">

                    <div class="flex flex-col flex-shrink-0 w-64 py-8 pl-6 pr-2 bg-white">
                        {{-- Comienza la pestaña del usuario --}}
                        <div class="flex flex-row items-center justify-center w-full h-12">
                            <div
                                class="flex items-center justify-center w-10 h-10 text-indigo-700 bg-indigo-100 rounded-2xl">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z">
                                    </path>
                                </svg>
                            </div>
                            <div class="ml-2 text-2xl font-bold">Chat</div>
                        </div>

                        <div
                            class="flex flex-col items-center w-full px-4 py-6 mt-4 bg-indigo-100 border border-gray-200 rounded-lg">
                            <div class="w-20 h-20 overflow-hidden border rounded-full">
                                <img src="https://avatars3.githubusercontent.com/u/2763884?s=128" alt="Avatar"
                                    class="w-full h-full" />
                            </div>
                            <div class="mt-2 text-sm font-semibold">{{ Auth()->user()->name }}</div>
                            <div class="text-xs text-gray-500">{{ Str::upper(Auth()->user()->user_type) }}</div>
                            <div class="flex flex-row items-center mt-3">
                                <div class="flex flex-col justify-center w-24 h-4 bg-indigo-500 rounded-full">
                                    {{-- <div class="self-end w-3 h-3 mr-1 bg-white rounded-full"></div> --}}

                                    {{-- <div class="mx-auto ml-1 text-xs leading-none text-white">Active</div> --}}
                                </div>
                            </div>
                        </div>
                        {{-- Fin la pestaña del usuario --}}

                        <div class="flex flex-col mt-8">
                            <div class="flex flex-row items-center justify-between text-xs">
                                <span class="font-bold">Active Conversations</span>
                                <span class="flex items-center justify-center w-4 h-4 bg-gray-300 rounded-full">4</span>
                            </div>
                            <div class="flex flex-col h-48 mt-4 -mx-2 space-y-1 overflow-y-auto">


                                @if (count($otherUsers) < 1)
                                    <button class="flex flex-row items-center p-2 hover:bg-gray-100 rounded-xl">
                                        <div class="flex items-center justify-center w-8 h-8 bg-indigo-200 rounded-full">
                                        </div>
                                        <div class="ml-2 text-sm font-semibold">Sin Chats Activos</div>
                                    </button>
                                @else
                                    @foreach ($otherUsers as $user)
                                        <a href="{{ route('chat.with', ['user' => $user->id]) }}">
                                            <button class="flex flex-row items-center p-2 hover:bg-gray-100 rounded-xl">
                                                <div
                                                    class="flex items-center justify-center w-8 h-8 bg-indigo-200 rounded-full">
                                                    {{ Str::upper(Str::substr($user->name, 0, 1)) }}
                                                </div>
                                                <div class="ml-2 text-sm font-semibold">{{ $user->name }}</div>
                                            </button>
                                        </a>
                                    @endforeach
                                @endif

                            </div>
                            {{-- BUSQUEDA --}}
                            <div class="flex flex-row items-center justify-between mt-6 text-xs">
                                <span class="font-bold">Otros Usuarios</span>
                                <span id="usersNumber"
                                    class="flex items-center justify-center w-4 h-4 bg-gray-300 rounded-full">-</span>
                            </div>

                            {{-- campo busqueda --}}
                            <div class="flex flex-col mt-4 -mx-2 space-y-1">
                                <input type="text" name="userSearch" id="userSearch">
                            </div>

                            <div class="flex flex-col mt-4 -mx-2 space-y-1">

                                <ul id="usersList"></ul>

                                {{-- <button class="flex flex-row items-center p-2 hover:bg-gray-100 rounded-xl">
                                    <div class="flex items-center justify-center w-8 h-8 bg-indigo-200 rounded-full">
                                        H
                                    </div>
                                    <div class="ml-2 text-sm font-semibold">Henry Boyd</div>
                                </button> --}}
                            </div>
                            {{-- FIN BUSQUEDA --}}


                        </div>
                    </div>

                    {{-- BODY CHAT --}}
                    <div class="flex flex-col flex-auto h-full p-6">
                        <div class="flex flex-col flex-auto flex-shrink-0 h-full p-4 bg-gray-100 rounded-2xl">
                            <div class="flex flex-col h-full mb-4 overflow-x-auto">
                                <div class="flex flex-col h-full">
                                    <div class="grid grid-cols-12 gap-y-2">
                                        <div class="col-start-1 col-end-8 p-3 rounded-lg">
                                            <div class="flex flex-row items-center">
                                                <div
                                                    class="flex items-center justify-center flex-shrink-0 w-10 h-10 bg-indigo-500 rounded-full">
                                                    A
                                                </div>
                                                <div class="relative px-4 py-2 ml-3 text-sm bg-white shadow rounded-xl">
                                                    <div>Hey How are you today?</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-start-1 col-end-8 p-3 rounded-lg">
                                            <div class="flex flex-row items-center">
                                                <div
                                                    class="flex items-center justify-center flex-shrink-0 w-10 h-10 bg-indigo-500 rounded-full">
                                                    A
                                                </div>
                                                <div class="relative px-4 py-2 ml-3 text-sm bg-white shadow rounded-xl">
                                                    <div>
                                                        Lorem ipsum dolor sit amet, consectetur adipisicing
                                                        elit. Vel ipsa commodi illum saepe numquam maxime
                                                        asperiores voluptate sit, minima perspiciatis.
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-start-6 col-end-13 p-3 rounded-lg">
                                            <div class="flex flex-row-reverse items-center justify-start">
                                                <div
                                                    class="flex items-center justify-center flex-shrink-0 w-10 h-10 bg-indigo-500 rounded-full">
                                                    A
                                                </div>
                                                <div
                                                    class="relative px-4 py-2 mr-3 text-sm bg-indigo-100 shadow rounded-xl">
                                                    <div>I'm ok what about you?</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-start-6 col-end-13 p-3 rounded-lg">
                                            <div class="flex flex-row-reverse items-center justify-start">
                                                <div
                                                    class="flex items-center justify-center flex-shrink-0 w-10 h-10 bg-indigo-500 rounded-full">
                                                    A
                                                </div>
                                                <div
                                                    class="relative px-4 py-2 mr-3 text-sm bg-indigo-100 shadow rounded-xl">
                                                    <div>
                                                        Lorem ipsum dolor sit, amet consectetur adipisicing. ?
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-start-1 col-end-8 p-3 rounded-lg">
                                            <div class="flex flex-row items-center">
                                                <div
                                                    class="flex items-center justify-center flex-shrink-0 w-10 h-10 bg-indigo-500 rounded-full">
                                                    A
                                                </div>
                                                <div class="relative px-4 py-2 ml-3 text-sm bg-white shadow rounded-xl">
                                                    <div>Lorem ipsum dolor sit amet !</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-start-6 col-end-13 p-3 rounded-lg">
                                            <div class="flex flex-row-reverse items-center justify-start">
                                                <div
                                                    class="flex items-center justify-center flex-shrink-0 w-10 h-10 bg-indigo-500 rounded-full">
                                                    A
                                                </div>
                                                <div
                                                    class="relative px-4 py-2 mr-3 text-sm bg-indigo-100 shadow rounded-xl">
                                                    <div>
                                                        Lorem ipsum dolor sit, amet consectetur adipisicing. ?
                                                    </div>
                                                    <div class="absolute bottom-0 right-0 mr-2 -mb-5 text-xs text-gray-500">
                                                        Seen
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-start-1 col-end-8 p-3 rounded-lg">
                                            <div class="flex flex-row items-center">
                                                <div
                                                    class="flex items-center justify-center flex-shrink-0 w-10 h-10 bg-indigo-500 rounded-full">
                                                    A
                                                </div>
                                                <div class="relative px-4 py-2 ml-3 text-sm bg-white shadow rounded-xl">
                                                    <div>
                                                        Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                                        Perspiciatis, in.
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-start-1 col-end-8 p-3 rounded-lg">
                                            <div class="flex flex-row items-center">
                                                <div
                                                    class="flex items-center justify-center flex-shrink-0 w-10 h-10 bg-indigo-500 rounded-full">
                                                    A
                                                </div>
                                                <div class="relative px-4 py-2 ml-3 text-sm bg-white shadow rounded-xl">
                                                    <div class="flex flex-row items-center">
                                                        <button
                                                            class="flex items-center justify-center w-10 h-8 bg-indigo-600 rounded-full hover:bg-indigo-800">
                                                            <svg class="w-6 h-6 text-white" fill="none"
                                                                stroke="currentColor" viewBox="0 0 24 24"
                                                                xmlns="http://www.w3.org/2000/svg">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    stroke-width="1.5"
                                                                    d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z">
                                                                </path>
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    stroke-width="1.5"
                                                                    d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                                            </svg>
                                                        </button>
                                                        <div class="flex flex-row items-center ml-4 space-x-px">
                                                            <div class="w-1 h-2 bg-gray-500 rounded-lg"></div>
                                                            <div class="w-1 h-2 bg-gray-500 rounded-lg"></div>
                                                            <div class="w-1 h-4 bg-gray-500 rounded-lg"></div>
                                                            <div class="w-1 h-8 bg-gray-500 rounded-lg"></div>
                                                            <div class="w-1 h-8 bg-gray-500 rounded-lg"></div>
                                                            <div class="w-1 h-10 bg-gray-500 rounded-lg"></div>
                                                            <div class="w-1 h-10 bg-gray-500 rounded-lg"></div>
                                                            <div class="w-1 h-12 bg-gray-500 rounded-lg"></div>
                                                            <div class="w-1 h-10 bg-gray-500 rounded-lg"></div>
                                                            <div class="w-1 h-6 bg-gray-500 rounded-lg"></div>
                                                            <div class="w-1 h-5 bg-gray-500 rounded-lg"></div>
                                                            <div class="w-1 h-4 bg-gray-500 rounded-lg"></div>
                                                            <div class="w-1 h-3 bg-gray-500 rounded-lg"></div>
                                                            <div class="w-1 h-2 bg-gray-500 rounded-lg"></div>
                                                            <div class="w-1 h-2 bg-gray-500 rounded-lg"></div>
                                                            <div class="w-1 h-2 bg-gray-500 rounded-lg"></div>
                                                            <div class="w-1 h-10 bg-gray-500 rounded-lg"></div>
                                                            <div class="w-1 h-2 bg-gray-500 rounded-lg"></div>
                                                            <div class="w-1 h-10 bg-gray-500 rounded-lg"></div>
                                                            <div class="w-1 h-8 bg-gray-500 rounded-lg"></div>
                                                            <div class="w-1 h-8 bg-gray-500 rounded-lg"></div>
                                                            <div class="w-1 h-1 bg-gray-500 rounded-lg"></div>
                                                            <div class="w-1 h-1 bg-gray-500 rounded-lg"></div>
                                                            <div class="w-1 h-2 bg-gray-500 rounded-lg"></div>
                                                            <div class="w-1 h-8 bg-gray-500 rounded-lg"></div>
                                                            <div class="w-1 h-8 bg-gray-500 rounded-lg"></div>
                                                            <div class="w-1 h-2 bg-gray-500 rounded-lg"></div>
                                                            <div class="w-1 h-2 bg-gray-500 rounded-lg"></div>
                                                            <div class="w-1 h-2 bg-gray-500 rounded-lg"></div>
                                                            <div class="w-1 h-2 bg-gray-500 rounded-lg"></div>
                                                            <div class="w-1 h-4 bg-gray-500 rounded-lg"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="flex flex-row items-center w-full h-16 px-4 bg-white rounded-xl">
                                <div>
                                    <button class="flex items-center justify-center text-gray-400 hover:text-gray-600">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13">
                                            </path>
                                        </svg>
                                    </button>
                                </div>
                                <div class="flex-grow ml-4">
                                    <div class="relative w-full">
                                        <input type="text"
                                            class="flex w-full h-10 pl-4 border rounded-xl focus:outline-none focus:border-indigo-300" />
                                        <button
                                            class="absolute top-0 right-0 flex items-center justify-center w-12 h-full text-gray-400 hover:text-gray-600">
                                            <svg class="w-6 h-6" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                                                </path>
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                                <div class="ml-4">
                                    <button
                                        class="flex items-center justify-center flex-shrink-0 px-4 py-1 text-white bg-indigo-500 hover:bg-indigo-600 rounded-xl">
                                        <span>Send</span>
                                        <span class="ml-2">
                                            <svg class="w-4 h-4 -mt-px transform rotate-45" fill="none"
                                                stroke="currentColor" viewBox="0 0 24 24"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path>
                                            </svg>
                                        </span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- FIN BODY CHAT --}}
                </div>
            </div>

        </div>
    </main>
    <script></script>

@endsection
