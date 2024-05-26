@extends('layout.template-dashboard')

@section('title', 'View Post')

@vite('resources\js\posts.js')

@section('content')

    <div class="container mx-auto">

        {{-- INCLUYO MENSAJES DE ERROR --}}
        @if ($errors->any())
            <div class="">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li><span class="p-1 text-sm text-white bg-red-300 rounded-md">{{ $error }}</span></li>
                    @endforeach
                </ul>
            </div>
        @elseif (session('success'))
            <div class="">
                <span class="p-1 text-white rounded-md bg-greenPersonal">{{ session('success') }}</span>
            </div>
        @endif


        <main class="mt-10">

            <div class="relative w-full mx-auto mb-4 md:mb-0">
                <div class="px-4 lg:px-0">
                    <h2 class="text-2xl font-semibold leading-tight text-gray-800">
                        {{ $post->title }}
                    </h2>
                    <a href="#" class="inline-flex items-center justify-center py-2 mb-2 text-green-700">
                        {{ $post->Category->name }}
                    </a>
                </div>

                <img src="/storage/{{ $post->img_url }}" alt="{{ $post->title }}" class="object-cover w-full lg:rounded"
                    style="height: 28em;" />
            </div>

            <div class="flex flex-col lg:flex-row lg:space-x-12">

                <div class="w-full px-4 mt-12 text-lg leading-relaxed text-gray-700 lg:px-0 lg:w-3/4">
                    <p class="pb-6">{{ $post->body }}</p>

                </div>

                <div class="w-full max-w-screen-sm m-auto mt-12 lg:w-1/4">
                    <div class="p-4 border-t border-b md:border md:rounded">
                        <div class="flex py-2">

                            @if ($post->User->profile_photo_path)
                                <img src="/storage/{{ $post->User->profile_photo_path }}" alt="Foto de perfil"
                                    class="w-10 h-10 rounded-full">
                            @else
                                <div
                                    class="flex items-center justify-center w-10 h-10 text-gray-600 bg-gray-200 rounded-full">
                                    {{ strtoupper(substr($post->User->name, 0, 1)) }}
                                </div>
                            @endif
                            <div>
                                <p class="text-sm font-semibold text-gray-700"> {{ $post->User->name }} </p>
                                <p class="text-xs font-semibold text-gray-600"> {{ $post->User->user_type }} </p>
                            </div>
                        </div>
                        <p class="py-3 text-gray-700">
                            Para cualquier duda o tema que quieras tratar con el autor del contenido, envíale un mensaje.
                        </p>

                        @if (auth()->user()->id !== $post->User->id && !$post->User->hasRole('admin'))
                            <a href="{{ route('chat.with', $post->User->id) }}">
                                <button
                                    class="flex items-center justify-center w-full px-2 py-1 text-white rounded bg-greenPersonal hover:bg-green-500">
                                    Contacta
                                    <i class='ml-2 bx bx-user-plus'></i>
                                </button>
                            </a>
                        @endif

                    </div>
                </div>

            </div>

            <div class="relative flex flex-row w-full mx-auto mb-4 md:mb-0 space-between">
                <div class="w-1/2 px-4 lg:px-0">

                    @if ($prevPostId)
                        <h3 class="hidden text-2xl font-semibold leading-tight text-gray-800 md:block">
                            Previo
                        </h3>
                        <a class="flex items-center gap-2 mt-2 mb-2 text-sm font-bold"
                            href="{{ route('post.show', ['post' => $prevPostId]) }}">
                            <div class="flex mt-2 mb-2 justify-self-start">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-6 h-6 transform -rotate-180">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
                                </svg>
                            </div>
                        </a>
                    @else
                        <!-- Elemento de relleno para mantener estructura -->
                        <h3 class="hidden text-2xl font-semibold leading-tight text-gray-300 md:block">
                            No hay previo
                        </h3>
                        <div class="flex mt-2 mb-2 justify-self-start">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="gray-300" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="w-6 h-6 text-gray-300 transform -rotate-180">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
                            </svg>
                        </div>
                    @endif

                </div>
                <div class="flex flex-col justify-end w-1/2 px-4 mr-0 text-end lg:px-0">

                    @if ($nextPostId)
                        <h3 class="hidden text-2xl font-semibold leading-tight text-gray-800 md:block">
                            Siguiente
                        </h3>
                        <a class="flex justify-end gap-2 mt-2 mb-2 text-sm font-bold"
                            href="{{ route('post.show', ['post' => $nextPostId]) }}">
                            <div class="self-end">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
                                </svg>
                            </div>
                        </a>
                    @else
                        <!-- Elemento de relleno para mantener estructura -->
                        <h3 class="hidden text-2xl font-semibold leading-tight text-gray-300 md:block">
                            Siguiente
                        </h3>
                        <div class="self-end">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="w-6 h-6 text-gray-300">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
                            </svg>
                        </div>
                    @endif

                </div>
            </div>

        </main>

    </div>
@endsection
