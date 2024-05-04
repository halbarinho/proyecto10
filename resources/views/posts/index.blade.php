@extends('layout.template-dashboard')

@section('title', 'Posts')
{{-- @vite(['resources/css/app.css']) --}}
@vite('resources\js\posts.js')

@section('content')

    {{-- flowbite --}}
    <main class="relative py-6 mt-2 mb-2 z-3">

        <div class="grid grid-cols-1 gap-3 md:grid-cols-3">

            {{-- mostrar errores si no los coge en el componente vue --}}
            @if ($errors->any())
                <div class="">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li class="text-sm text-red-600">{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @elseif (session('success'))
                <div class="">
                    {{ session('success') }}
                </div>
            @endif

            {{ Log::info($posts) }}
            @if ($posts->count() < 1)
                <h2>No existen post para mostrar.</h2>
            @else
                @foreach ($posts as $post)
                    <div class="p-2 bg-white md:p-8">
                        <!--Banner image-->
                        <a href="{{ route('post.show', $post->id) }}">
                            <img class="w-full rounded-lg" src="{{ asset('/storage/' . $post->img_url) }}" />
                        </a>
                        <!--Tag-->
                        <p class="mt-2 text-base font-semibold text-indigo-500">{{ $post->slug }}</p>
                        <!--Title-->
                        <h1 class="mt-1 text-xl font-semibold leading-none text-gray-900 capitalize truncate">
                            {{ $post->title }}
                        </h1>
                        <!--Description-->
                        <div class="max-w-full">
                            <p class="mt-1 text-base font-medium tracking-wide text-gray-600">
                                {{ $post->body }}
                            </p>
                        </div>
                        <div class="flex items-center mt-20 space-x-2">
                            <!--Author's profile photo-->
                            {{-- <img class="object-cover object-center w-10 h-10 rounded-full"
                                src="https://randomuser.me/api/portraits/men/54.jpg" alt="random user" /> --}}
                            @if ($post->user->profile_photo_path)
                                <img src="/storage/{{ $post->user->profile_photo_path }}" alt="Foto de perfil"
                                    class="object-cover object-center w-10 h-10 rounded-full">
                            @else
                                <div
                                    class="flex items-center justify-center w-10 h-10 text-gray-600 bg-gray-200 rounded-full">
                                    {{ strtoupper(substr($post->User->name, 0, 1)) }}
                                </div>
                            @endif
                            <div>
                                <!--Author name-->
                                <p class="font-semibold text-gray-900">{{ $post->user->name }}</p>
                                <p class="text-sm font-semibold text-gray-500">
                                    {{ $post->updated_at }}
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif




        </div>

    </main>
@endsection
