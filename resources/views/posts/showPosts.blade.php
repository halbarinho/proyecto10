@extends('layout.template-dashboard')

@section('title', 'Show Posts')
{{-- @vite(['resources/css/app.css']) --}}
@vite('resources\js\posts.js')

@section('content')

    {{-- flowbite --}}

    <div class="container py-4 mx-auto">


        <div class="gap-5 space-y-4 md:px-4 md:grid md:grid-cols-2 lg:grid-cols-3 md:space-y-0">
            {{-- <div
                class="max-w-sm px-6 pt-6 pb-2 transition duration-500 transform bg-white shadow-lg rounded-xl hover:scale-105">
                <h3 class="mb-3 text-xl font-bold text-indigo-600">Beginner Friendly</h3>
                <div class="relative">
                    <img class="w-full rounded-xl"
                        src="https://images.unsplash.com/photo-1541701494587-cb58502866ab?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1050&q=80"
                        alt="Colors" />
                    <p
                        class="absolute top-0 px-3 py-1 font-semibold text-gray-800 bg-yellow-300 rounded-tl-lg rounded-br-lg">
                        FREE</p>
                </div>
                <h1 class="mt-4 text-2xl font-bold text-gray-800 cursor-pointer">Javascript Bootcamp for Absolute Beginners
                </h1>
                <div class="my-4">
                    <div class="flex items-center space-x-1">
                        <span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-indigo-600 mb-1.5" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </span>
                        <p>1:34:23 Minutes</p>
                    </div>
                    <div class="flex items-center space-x-1">
                        <span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-indigo-600 mb-1.5" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M16 4v12l-4-2-4 2V4M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                        </span>
                        <p>3 Parts</p>
                    </div>
                    <div class="flex items-center space-x-1">
                        <span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-indigo-600 mb-1.5" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4" />
                            </svg>
                        </span>
                        <p>Vanilla JS</p>
                    </div>
                    <button class="w-full py-2 mt-4 text-xl text-white bg-indigo-600 shadow-lg rounded-xl">Buy
                        Lesson</button>
                </div>
            </div> --}}

            @foreach ($posts as $post)
                <div
                    class="max-w-sm px-6 pt-6 pb-2 transition duration-500 transform bg-white shadow-lg rounded-xl hover:scale-105">
                    <h3 class="mb-3 text-xl font-bold text-indigo-600">{{ $post->Category->name }}</h3>
                    <div class="relative">
                        <img class="object-contain h-48 w-96 rounded-xl" src="/storage/{{ $post->img_url }}"
                            alt="{{ $post->title }}" />
                    </div>
                    <h1 class="mt-4 text-2xl font-bold text-gray-800 cursor-pointer">{{ $post->title }}
                    </h1>
                    <div class="my-4">
                        <div class="flex items-center space-x-1">
                            <span>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-indigo-600 mb-1.5"
                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </span>
                            <p>{{ $post->updated_at->format('d-m-Y') }}</p>
                        </div>
                        <div class="flex items-center space-x-1">
                            <span>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-indigo-600 mb-1.5"
                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M16 4v12l-4-2-4 2V4M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                            </span>
                            <p>{{ $post->Category->name }}</p>
                        </div>
                        <div class="flex items-center space-x-1">
                            <span>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-indigo-600 mb-1.5"
                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4" />
                                </svg>
                            </span>
                            <p>Publicado por {{ $post->User->name }} {{ $post->User->last_name_1 }}</p>
                        </div>
                        <a href="{{ route('post.show', ['post' => $post->id]) }}">
                            <button
                                class="w-full py-2 mt-4 text-xl text-white bg-indigo-600 shadow-lg rounded-xl">Leer</button>
                        </a>
                    </div>
                </div>
            @endforeach


        </div>


        {{-- Este button no se por que lo tengo aqui --}}

        {{-- <button type="button"
            class="py-2.5 px-5 ms-3 text-sm font-medium text-red-900 focus:outline-none bg-red-300 rounded-lg border border-red-200 hover:bg-red-600 hover:text-white focus:z-10 focus:ring-4 focus:ring-red-100 dark:focus:ring-red-700 dark:bg-red-800 dark:text-red-400 dark:border-red-600 dark:hover:text-white dark:hover:bg-red-700">
            Ver Posts</button> --}}

    </div>


@endsection
