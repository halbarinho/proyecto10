@extends('layout.template-dashboard')

@section('title', 'View Post')

@vite('resources\js\posts.js')

@section('content')

    <div class="container mx-auto">

        {{-- INCLUYO MENSAJES DE ERROR --}}
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @elseif (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif


        <div class="relative flex flex-col justify-center py-6 overflow-hidden bg-gray-100 sm:py-12">
            <div class="items-center w-full max-w-screen-lg mx-auto">
                <div class="grid w-full grid-cols-2 group">
                    <div>
                        <div class="pr-12">
                            <p class="mb-6 text-gray-400 peer">
                                {{ $post->Category->name }}
                            </p>

                            <h3 class="mb-4 text-xl font-semibold text-gray-400">{{ $post->title }}</h3>

                            <p>{{ $post->body }}</p>
                            {{-- <ul role="list" class="pl-5 space-y-3 list-disc marker:text-sky-400 text-slate-500">

                                <li>{{ $post->slug }}</li>
                            </ul> --}}
                        </div>
                    </div>
                    <div
                        class="relative flex flex-col items-end pl-16 overflow-hidden before:block before:absolute before:h-1/6 before:w-4 before:bg-blue-500 before:bottom-0 before:left-0 before:rounded-lg before:transition-all group-hover:before:bg-orange-300">



                        <div class="overflow-hidden rounded-xl ">
                            <img src="/storage/{{ $post->img_url }}" alt="{{ $post->title }}"
                                class="object-contain h-48 w-96">
                        </div>



                    </div>

                </div>

            </div>

            <div class="grid w-full grid-cols-2 px-4 pt-4">
                @if ($prevPostId)
                    <a class="flex items-center gap-2 mt-2 mb-2 text-sm font-bold"
                        href="{{ route('post.show', ['post' => $prevPostId]) }}">

                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6 transform -rotate-180">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
                        </svg>
                        <span>Previo</span>
                    </a>
                @else
                    <!-- Elemento de relleno para mantener estructura -->
                    <div class="flex mt-2 mb-2 justify-self-start"></div>
                @endif

                @if ($nextPostId)
                    <a class="flex items-center justify-end gap-2 mt-2 mb-2 text-sm font-bold"
                        href="{{ route('post.show', ['post' => $nextPostId]) }}">
                        <span>Siguiente</span>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
                        </svg>
                    </a>
                @else
                    <!-- Elemento de relleno para mantener estructura -->
                    <div class="flex mt-2 mb-2 justify-self-end"></div>
                @endif
            </div>
        </div>

    </div>
@endsection
