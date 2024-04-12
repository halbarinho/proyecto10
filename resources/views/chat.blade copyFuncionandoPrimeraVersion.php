@extends('layout.templateCRUD')
@section('title', 'Chat')
@vite(['resources/css/app.css', 'resources/css/chat.css', 'resources/js/chat.js'])
<meta name="csrf-token" content="{{ csrf_token() }}">


@section('content')
    <section class="chat">
        <header class="chat-header">
            <div class="chat-header-title">
                <p>Titulo del Chat</p>
                <span id="chatWith" class="chatWith"></span>
                <span id="typing" class="typing" style="display: none;">Escribiendo...</span>
                </span>
            </div>
            <div class="chat-header-status">
                <span id="chatStatus" class="chatStatus offline">
            </div>

            {{-- AQUI EL INCLUYE UN options CON UNA RUEDA DENTADA --}}
        </header>
        <main class="chat-body" id="chat-body">


            {{-- POR DEFECTO --}}
            {{-- <div class="mssg left-mssg">
                <div class="flex items-start gap-2.5">
                    Imagen circular
                    <img class="w-8 h-8 rounded-full" src="https://iconos8.es/icon/k6v69zoAsLLY/frida-kahlo" alt="Jese image">
                    <div class="flex flex-col gap-1 w-full max-w-[320px]">
                        <div class="flex items-center space-x-2 rtl:space-x-reverse">
                            <span class="text-sm font-semibold text-gray-900 dark:text-white">Bonnie Green</span>
                            <span class="text-sm font-normal text-gray-500 dark:text-gray-400">11:46</span>
                        </div>
                        <div
                            class="flex flex-col leading-1.5 p-4 border-gray-200 bg-gray-100 rounded-e-xl rounded-es-xl dark:bg-gray-700">
                            <p class="text-sm font-normal text-gray-900 dark:text-white"> That's awesome. I think our users
                                will really appreciate the improvements.</p>
                        </div>
                        <span class="text-sm font-normal text-gray-500 dark:text-gray-400">Delivered</span>
                    </div>
                </div>


            </div>
            <div class="mssg right-mssg">

                <div class="flex items-start gap-2.5">
                    <img class="w-8 h-8 rounded-full" src="https://iconos8.es/icon/FcohDrWaYlSh/james-brown"
                        alt="Jese image">
                    <div class="flex flex-col gap-1 w-full max-w-[320px]">
                        <div class="flex items-center space-x-2 rtl:space-x-reverse">
                            <span class="text-sm font-semibold text-gray-900 dark:text-white">Bonnie Green</span>
                            <span class="text-sm font-normal text-gray-500 dark:text-gray-400">11:46</span>
                        </div>
                        <div
                            class="flex flex-col leading-1.5 p-4 border-gray-200 bg-gray-100 rounded-e-xl rounded-es-xl dark:bg-gray-700">
                            <p id="mssg-text" class="text-sm font-normal text-gray-900 dark:text-white"> That's awesome. I
                                think our users
                                will really appreciate the improvements.</p>
                        </div>
                        <span class="text-sm font-normal text-gray-500 dark:text-gray-400">Delivered</span>
                    </div>
                </div>

            </div> --}}
        </main>
        <form class="chat-inputarea">
            @csrf
            <input type="hidden" name="chatId" id="chat_id" value="{{ $chat->id }}">
            <input type="text" id="chat-input" class="chat-input" placeholder="Enter your message..." value="">
            <button type="submit" class="chat-send-btn">Send</button>
        </form>
    </section>
@endsection
