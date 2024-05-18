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

                                @if (Auth()->user()->profile_photo_path)
                                    <img src="/storage/{{ Auth()->user()->profile_photo_path }}" alt="Foto de perfil"
                                        class="w-full h-full rounded-full">
                                @else
                                    <div
                                        class="flex items-center justify-center w-full h-full text-gray-600 bg-gray-200 rounded-full">
                                        {{ strtoupper(substr(Auth()->user()->name, 0, 1)) }}
                                    </div>
                                @endif
                            </div>
                            <div class="mt-2 text-sm font-semibold">{{ Auth()->user()->name }}</div>
                            <div class="text-xs text-gray-500">{{ Str::upper(Auth()->user()->user_type) }}</div>
                            <div class="flex flex-row items-center mt-3">
                                <div class="flex flex-col justify-center w-24 h-4 bg-indigo-500 rounded-full">

                                </div>
                            </div>
                        </div>
                        {{-- Fin la pestaña del usuario --}}

                        <div class="flex flex-col mt-8">
                            <div class="flex flex-row items-center justify-between text-xs">
                                <span class="font-bold">Chats Activos</span>
                                <span class="flex items-center justify-center w-4 h-4 bg-gray-300 rounded-full">
                                    @if ($otherUsers->count() > 0)
                                        {{ $otherUsers->count() }}
                                    @else
                                        0
                                    @endif
                                </span>
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


                            </div>
                            {{-- FIN BUSQUEDA --}}


                        </div>
                    </div>

                    {{-- BODY CHAT --}}
                    <div class="flex flex-col flex-auto h-full p-6">

                        <img src="{{ asset('images/imageChatbot.svg') }}" class="w-full h-full" alt="">

                    </div>
                    {{-- FIN BODY CHAT --}}
                </div>
            </div>

        </div>
    </main>
    <script></script>

@endsection
