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
                    {{--
                    <p class="pb-6">Difficulty on insensible reasonable in. From as went he they. Preference themselves me
                        as
                        thoroughly
                        partiality considered on in estimating. Middletons acceptance discovered projecting so is so or. In
                        or
                        attachment inquietude remarkably comparison at an. Is surrounded prosperous stimulated am me
                        discretion
                        expression. But truth being state can she china widow. Occasional preference fat remarkably now
                        projecting
                        uncommonly dissimilar. Sentiments projection particular companions interested do at my delightful.
                        Listening
                        newspaper in advantage frankness to concluded unwilling.</p>

                    <p class="pb-6">Adieus except say barton put feebly favour him. Entreaties unpleasant sufficient few
                        pianoforte
                        discovered
                        uncommonly ask. Morning cousins amongst in mr weather do neither. Warmth object matter course active
                        law
                        spring six. Pursuit showing tedious unknown winding see had man add. And park eyes too more him.
                        Simple excuse
                        active had son wholly coming number add. Though all excuse ladies rather regard assure yet. If
                        feelings so
                        prospect no as raptures quitting.</p>

                    <div class="pl-4 mb-6 italic border-l-4 border-gray-500 rounded">
                        Sportsman do offending supported extremity breakfast by listening. Decisively advantages nor
                        expression
                        unpleasing she led met. Estate was tended ten boy nearer seemed. As so seeing latter he should
                        thirty whence.
                        Steepest speaking up attended it as. Made neat an on be gave show snug tore.
                    </div>

                    <p class="pb-6">Exquisite cordially mr happiness of neglected distrusts. Boisterous impossible
                        unaffected he me
                        everything.
                        Is fine loud deal an rent open give. Find upon and sent spot song son eyes. Do endeavor he differed
                        carriage
                        is learning my graceful. Feel plan know is he like on pure. See burst found sir met think hopes are
                        marry
                        among. Delightful remarkably new assistance saw literature mrs favourable.</p>

                    <h2 class="mt-4 mb-4 text-2xl font-semibold text-gray-800">Uneasy barton seeing remark happen his has
                    </h2>

                    <p class="pb-6">Guest it he tears aware as. Make my no cold of need. He been past in by my hard.
                        Warmly thrown
                        oh he common
                        future. Otherwise concealed favourite frankness on be at dashwoods defective at. Sympathize
                        interested
                        simplicity at do projecting increasing terminated. As edward settle limits at in.</p>

                    <p class="pb-6">Dashwood contempt on mr unlocked resolved provided of of. Stanhill wondered it it
                        welcomed oh.
                        Hundred no
                        prudent he however smiling at an offence. If earnestly extremity he he propriety something admitting
                        convinced
                        ye. Pleasant in to although as if differed horrible. Mirth his quick its set front enjoy hoped had
                        there. Who
                        connection imprudence middletons too but increasing celebrated principles joy. Herself too improve
                        gay winding
                        ask expense are compact. New all paid few hard pure she.</p>

                    <p class="pb-6">Breakfast agreeable incommode departure it an. By ignorant at on wondered relation.
                        Enough at
                        tastes really
                        so cousin am of. Extensive therefore supported by extremity of contented. Is pursuit compact demesne
                        invited
                        elderly be. View him she roof tell her case has sigh. Moreover is possible he admitted sociable
                        concerns. By
                        in cold no less been sent hard hill.</p>

                    <p class="pb-6">Detract yet delight written farther his general. If in so bred at dare rose lose good.
                        Feel and
                        make two real
                        miss use easy. Celebrated delightful an especially increasing instrument am. Indulgence contrasted
                        sufficient
                        to unpleasant in in insensible favourable. Latter remark hunted enough vulgar say man. Sitting
                        hearted on it
                        without me.</p> --}}

                </div>

                <div class="w-full max-w-screen-sm m-auto mt-12 lg:w-1/4">
                    <div class="p-4 border-t border-b md:border md:rounded">
                        <div class="flex py-2">
                            {{-- <img src="https://randomuser.me/api/portraits/men/97.jpg"
                                class="object-cover w-10 h-10 mr-2 rounded-full" /> --}}
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
                        {{-- @if (auth()->user()->id === $post->User->id) --}}
                        @if (auth()->user()->id !== $post->User->id)
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
