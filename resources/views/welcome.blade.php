<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Styles -->
    @vite('resources/css/app.css')
    <style>
        /* ! tailwindcss v3.2.4 | MIT License | https://tailwindcss.com */
        *,
        ::after,
        ::before {
            box-sizing: border-box;
            border-width: 0;
            border-style: solid;
            border-color: #e5e7eb
        }

        ::after,
        ::before {
            --tw-content: ''
        }

        html {
            line-height: 1.5;
            -webkit-text-size-adjust: 100%;
            -moz-tab-size: 4;
            tab-size: 4;
            font-family: Figtree, sans-serif;
            font-feature-settings: normal
        }

        body {
            margin: 0;
            line-height: inherit
        }

        hr {
            height: 0;
            color: inherit;
            border-top-width: 1px
        }

        abbr:where([title]) {
            -webkit-text-decoration: underline dotted;
            text-decoration: underline dotted
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            font-size: inherit;
            font-weight: inherit
        }

        a {
            color: inherit;
            text-decoration: inherit
        }

        b,
        strong {
            font-weight: bolder
        }

        code,
        kbd,
        pre,
        samp {
            font-family: ui-monospace, SFMono-Regular, Menlo, Monaco, Consolas, "Liberation Mono", "Courier New", monospace;
            font-size: 1em
        }

        small {
            font-size: 80%
        }

        sub,
        sup {
            font-size: 75%;
            line-height: 0;
            position: relative;
            vertical-align: baseline
        }

        sub {
            bottom: -.25em
        }

        sup {
            top: -.5em
        }

        table {
            text-indent: 0;
            border-color: inherit;
            border-collapse: collapse
        }

        button,
        input,
        optgroup,
        select,
        textarea {
            font-family: inherit;
            font-size: 100%;
            font-weight: inherit;
            line-height: inherit;
            color: inherit;
            margin: 0;
            padding: 0
        }

        button,
        select {
            text-transform: none
        }

        [type=button],
        [type=reset],
        [type=submit],
        button {
            -webkit-appearance: button;
            background-color: transparent;
            background-image: none
        }

        :-moz-focusring {
            outline: auto
        }

        :-moz-ui-invalid {
            box-shadow: none
        }

        progress {
            vertical-align: baseline
        }

        ::-webkit-inner-spin-button,
        ::-webkit-outer-spin-button {
            height: auto
        }

        [type=search] {
            -webkit-appearance: textfield;
            outline-offset: -2px
        }

        ::-webkit-search-decoration {
            -webkit-appearance: none
        }

        ::-webkit-file-upload-button {
            -webkit-appearance: button;
            font: inherit
        }

        summary {
            display: list-item
        }

        blockquote,
        dd,
        dl,
        figure,
        h1,
        h2,
        h3,
        h4,
        h5,
        h6,
        hr,
        p,
        pre {
            margin: 0
        }

        fieldset {
            margin: 0;
            padding: 0
        }

        legend {
            padding: 0
        }

        menu,
        ol,
        ul {
            list-style: none;
            margin: 0;
            padding: 0
        }

        textarea {
            resize: vertical
        }

        input::placeholder,
        textarea::placeholder {
            opacity: 1;
            color: #9ca3af
        }

        [role=button],
        button {
            cursor: pointer
        }

        :disabled {
            cursor: default
        }

        audio,
        canvas,
        embed,
        iframe,
        img,
        object,
        svg,
        video {
            display: block;
            vertical-align: middle
        }

        img,
        video {
            max-width: 100%;
            height: auto
        }

        [hidden] {
            display: none
        }

        *,
        ::before,
        ::after {
            --tw-border-spacing-x: 0;
            --tw-border-spacing-y: 0;
            --tw-translate-x: 0;
            --tw-translate-y: 0;
            --tw-rotate: 0;
            --tw-skew-x: 0;
            --tw-skew-y: 0;
            --tw-scale-x: 1;
            --tw-scale-y: 1;
            --tw-pan-x: ;
            --tw-pan-y: ;
            --tw-pinch-zoom: ;
            --tw-scroll-snap-strictness: proximity;
            --tw-ordinal: ;
            --tw-slashed-zero: ;
            --tw-numeric-figure: ;
            --tw-numeric-spacing: ;
            --tw-numeric-fraction: ;
            --tw-ring-inset: ;
            --tw-ring-offset-width: 0px;
            --tw-ring-offset-color: #fff;
            --tw-ring-color: rgb(59 130 246 / 0.5);
            --tw-ring-offset-shadow: 0 0 #0000;
            --tw-ring-shadow: 0 0 #0000;
            --tw-shadow: 0 0 #0000;
            --tw-shadow-colored: 0 0 #0000;
            --tw-blur: ;
            --tw-brightness: ;
            --tw-contrast: ;
            --tw-grayscale: ;
            --tw-hue-rotate: ;
            --tw-invert: ;
            --tw-saturate: ;
            --tw-sepia: ;
            --tw-drop-shadow: ;
            --tw-backdrop-blur: ;
            --tw-backdrop-brightness: ;
            --tw-backdrop-contrast: ;
            --tw-backdrop-grayscale: ;
            --tw-backdrop-hue-rotate: ;
            --tw-backdrop-invert: ;
            --tw-backdrop-opacity: ;
            --tw-backdrop-saturate: ;
            --tw-backdrop-sepia:
        }

        ::-webkit-backdrop {
            --tw-border-spacing-x: 0;
            --tw-border-spacing-y: 0;
            --tw-translate-x: 0;
            --tw-translate-y: 0;
            --tw-rotate: 0;
            --tw-skew-x: 0;
            --tw-skew-y: 0;
            --tw-scale-x: 1;
            --tw-scale-y: 1;
            --tw-pan-x: ;
            --tw-pan-y: ;
            --tw-pinch-zoom: ;
            --tw-scroll-snap-strictness: proximity;
            --tw-ordinal: ;
            --tw-slashed-zero: ;
            --tw-numeric-figure: ;
            --tw-numeric-spacing: ;
            --tw-numeric-fraction: ;
            --tw-ring-inset: ;
            --tw-ring-offset-width: 0px;
            --tw-ring-offset-color: #fff;
            --tw-ring-color: rgb(59 130 246 / 0.5);
            --tw-ring-offset-shadow: 0 0 #0000;
            --tw-ring-shadow: 0 0 #0000;
            --tw-shadow: 0 0 #0000;
            --tw-shadow-colored: 0 0 #0000;
            --tw-blur: ;
            --tw-brightness: ;
            --tw-contrast: ;
            --tw-grayscale: ;
            --tw-hue-rotate: ;
            --tw-invert: ;
            --tw-saturate: ;
            --tw-sepia: ;
            --tw-drop-shadow: ;
            --tw-backdrop-blur: ;
            --tw-backdrop-brightness: ;
            --tw-backdrop-contrast: ;
            --tw-backdrop-grayscale: ;
            --tw-backdrop-hue-rotate: ;
            --tw-backdrop-invert: ;
            --tw-backdrop-opacity: ;
            --tw-backdrop-saturate: ;
            --tw-backdrop-sepia:
        }

        ::backdrop {
            --tw-border-spacing-x: 0;
            --tw-border-spacing-y: 0;
            --tw-translate-x: 0;
            --tw-translate-y: 0;
            --tw-rotate: 0;
            --tw-skew-x: 0;
            --tw-skew-y: 0;
            --tw-scale-x: 1;
            --tw-scale-y: 1;
            --tw-pan-x: ;
            --tw-pan-y: ;
            --tw-pinch-zoom: ;
            --tw-scroll-snap-strictness: proximity;
            --tw-ordinal: ;
            --tw-slashed-zero: ;
            --tw-numeric-figure: ;
            --tw-numeric-spacing: ;
            --tw-numeric-fraction: ;
            --tw-ring-inset: ;
            --tw-ring-offset-width: 0px;
            --tw-ring-offset-color: #fff;
            --tw-ring-color: rgb(59 130 246 / 0.5);
            --tw-ring-offset-shadow: 0 0 #0000;
            --tw-ring-shadow: 0 0 #0000;
            --tw-shadow: 0 0 #0000;
            --tw-shadow-colored: 0 0 #0000;
            --tw-blur: ;
            --tw-brightness: ;
            --tw-contrast: ;
            --tw-grayscale: ;
            --tw-hue-rotate: ;
            --tw-invert: ;
            --tw-saturate: ;
            --tw-sepia: ;
            --tw-drop-shadow: ;
            --tw-backdrop-blur: ;
            --tw-backdrop-brightness: ;
            --tw-backdrop-contrast: ;
            --tw-backdrop-grayscale: ;
            --tw-backdrop-hue-rotate: ;
            --tw-backdrop-invert: ;
            --tw-backdrop-opacity: ;
            --tw-backdrop-saturate: ;
            --tw-backdrop-sepia:
        }

        .relative {
            position: relative
        }

        .mx-auto {
            margin-left: auto;
            margin-right: auto
        }

        .mx-6 {
            margin-left: 1.5rem;
            margin-right: 1.5rem
        }

        .ml-4 {
            margin-left: 1rem
        }

        .mt-16 {
            margin-top: 4rem
        }

        .mt-6 {
            margin-top: 1.5rem
        }

        .mt-4 {
            margin-top: 1rem
        }

        .-mt-px {
            margin-top: -1px
        }

        .mr-1 {
            margin-right: 0.25rem
        }

        .flex {
            display: flex
        }

        .inline-flex {
            display: inline-flex
        }

        .grid {
            display: grid
        }

        .h-16 {
            height: 4rem
        }

        .h-7 {
            height: 1.75rem
        }

        .h-6 {
            height: 1.5rem
        }

        .h-5 {
            height: 1.25rem
        }

        .min-h-screen {
            min-height: 100vh
        }

        .w-auto {
            width: auto
        }

        .w-16 {
            width: 4rem
        }

        .w-7 {
            width: 1.75rem
        }

        .w-6 {
            width: 1.5rem
        }

        .w-5 {
            width: 1.25rem
        }

        .max-w-7xl {
            max-width: 80rem
        }

        .shrink-0 {
            flex-shrink: 0
        }

        .scale-100 {
            --tw-scale-x: 1;
            --tw-scale-y: 1;
            transform: translate(var(--tw-translate-x), var(--tw-translate-y)) rotate(var(--tw-rotate)) skewX(var(--tw-skew-x)) skewY(var(--tw-skew-y)) scaleX(var(--tw-scale-x)) scaleY(var(--tw-scale-y))
        }

        .grid-cols-1 {
            grid-template-columns: repeat(1, minmax(0, 1fr))
        }

        .items-center {
            align-items: center
        }

        .justify-center {
            justify-content: center
        }

        .gap-6 {
            gap: 1.5rem
        }

        .gap-4 {
            gap: 1rem
        }

        .self-center {
            align-self: center
        }

        .rounded-lg {
            border-radius: 0.5rem
        }

        .rounded-full {
            border-radius: 9999px
        }

        .bg-gray-100 {
            --tw-bg-opacity: 1;
            background-color: rgb(243 244 246 / var(--tw-bg-opacity))
        }

        .bg-white {
            --tw-bg-opacity: 1;
            background-color: rgb(255 255 255 / var(--tw-bg-opacity))
        }

        .bg-red-50 {
            --tw-bg-opacity: 1;
            background-color: rgb(254 242 242 / var(--tw-bg-opacity))
        }

        .bg-dots-darker {
            background-image: url("data:image/svg+xml,%3Csvg width='30' height='30' viewBox='0 0 30 30' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M1.22676 0C1.91374 0 2.45351 0.539773 2.45351 1.22676C2.45351 1.91374 1.91374 2.45351 1.22676 2.45351C0.539773 2.45351 0 1.91374 0 1.22676C0 0.539773 0.539773 0 1.22676 0Z' fill='rgba(0,0,0,0.07)'/%3E%3C/svg%3E")
        }

        .from-gray-700\/50 {
            --tw-gradient-from: rgb(55 65 81 / 0.5);
            --tw-gradient-to: rgb(55 65 81 / 0);
            --tw-gradient-stops: var(--tw-gradient-from), var(--tw-gradient-to)
        }

        .via-transparent {
            --tw-gradient-to: rgb(0 0 0 / 0);
            --tw-gradient-stops: var(--tw-gradient-from), transparent, var(--tw-gradient-to)
        }

        .bg-center {
            background-position: center
        }

        .stroke-red-500 {
            stroke: #ef4444
        }

        .stroke-gray-400 {
            stroke: #9ca3af
        }

        .p-6 {
            padding: 1.5rem
        }

        .px-6 {
            padding-left: 1.5rem;
            padding-right: 1.5rem
        }

        .text-center {
            text-align: center
        }

        .text-right {
            text-align: right
        }

        .text-xl {
            font-size: 1.25rem;
            line-height: 1.75rem
        }

        .text-sm {
            font-size: 0.875rem;
            line-height: 1.25rem
        }

        .font-semibold {
            font-weight: 600
        }

        .leading-relaxed {
            line-height: 1.625
        }

        .text-gray-600 {
            --tw-text-opacity: 1;
            color: rgb(75 85 99 / var(--tw-text-opacity))
        }

        .text-gray-900 {
            --tw-text-opacity: 1;
            color: rgb(17 24 39 / var(--tw-text-opacity))
        }

        .text-gray-500 {
            --tw-text-opacity: 1;
            color: rgb(107 114 128 / var(--tw-text-opacity))
        }

        .underline {
            -webkit-text-decoration-line: underline;
            text-decoration-line: underline
        }

        .antialiased {
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale
        }

        .shadow-2xl {
            --tw-shadow: 0 25px 50px -12px rgb(0 0 0 / 0.25);
            --tw-shadow-colored: 0 25px 50px -12px var(--tw-shadow-color);
            box-shadow: var(--tw-ring-offset-shadow, 0 0 #0000), var(--tw-ring-shadow, 0 0 #0000), var(--tw-shadow)
        }

        .shadow-gray-500\/20 {
            --tw-shadow-color: rgb(107 114 128 / 0.2);
            --tw-shadow: var(--tw-shadow-colored)
        }

        .transition-all {
            transition-property: all;
            transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
            transition-duration: 150ms
        }

        .selection\:bg-red-500 *::selection {
            --tw-bg-opacity: 1;
            background-color: rgb(239 68 68 / var(--tw-bg-opacity))
        }

        .selection\:text-white *::selection {
            --tw-text-opacity: 1;
            color: rgb(255 255 255 / var(--tw-text-opacity))
        }

        .selection\:bg-red-500::selection {
            --tw-bg-opacity: 1;
            background-color: rgb(239 68 68 / var(--tw-bg-opacity))
        }

        .selection\:text-white::selection {
            --tw-text-opacity: 1;
            color: rgb(255 255 255 / var(--tw-text-opacity))
        }

        .hover\:text-gray-900:hover {
            --tw-text-opacity: 1;
            color: rgb(17 24 39 / var(--tw-text-opacity))
        }

        .hover\:text-gray-700:hover {
            --tw-text-opacity: 1;
            color: rgb(55 65 81 / var(--tw-text-opacity))
        }

        .focus\:rounded-sm:focus {
            border-radius: 0.125rem
        }

        .focus\:outline:focus {
            outline-style: solid
        }

        .focus\:outline-2:focus {
            outline-width: 2px
        }

        .focus\:outline-red-500:focus {
            outline-color: #ef4444
        }

        .group:hover .group-hover\:stroke-gray-600 {
            stroke: #4b5563
        }

        .z-10 {
            z-index: 10
        }

        @media (prefers-reduced-motion: no-preference) {
            .motion-safe\:hover\:scale-\[1\.01\]:hover {
                --tw-scale-x: 1.01;
                --tw-scale-y: 1.01;
                transform: translate(var(--tw-translate-x), var(--tw-translate-y)) rotate(var(--tw-rotate)) skewX(var(--tw-skew-x)) skewY(var(--tw-skew-y)) scaleX(var(--tw-scale-x)) scaleY(var(--tw-scale-y))
            }
        }

        @media (prefers-color-scheme: dark) {
            .dark\:bg-gray-900 {
                --tw-bg-opacity: 1;
                background-color: rgb(17 24 39 / var(--tw-bg-opacity))
            }

            .dark\:bg-gray-800\/50 {
                background-color: rgb(31 41 55 / 0.5)
            }

            .dark\:bg-red-800\/20 {
                background-color: rgb(153 27 27 / 0.2)
            }

            .dark\:bg-dots-lighter {
                background-image: url("data:image/svg+xml,%3Csvg width='30' height='30' viewBox='0 0 30 30' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M1.22676 0C1.91374 0 2.45351 0.539773 2.45351 1.22676C2.45351 1.91374 1.91374 2.45351 1.22676 2.45351C0.539773 2.45351 0 1.91374 0 1.22676C0 0.539773 0.539773 0 1.22676 0Z' fill='rgba(255,255,255,0.07)'/%3E%3C/svg%3E")
            }

            .dark\:bg-gradient-to-bl {
                background-image: linear-gradient(to bottom left, var(--tw-gradient-stops))
            }

            .dark\:stroke-gray-600 {
                stroke: #4b5563
            }

            .dark\:text-gray-400 {
                --tw-text-opacity: 1;
                color: rgb(156 163 175 / var(--tw-text-opacity))
            }

            .dark\:text-white {
                --tw-text-opacity: 1;
                color: rgb(255 255 255 / var(--tw-text-opacity))
            }

            .dark\:shadow-none {
                --tw-shadow: 0 0 #0000;
                --tw-shadow-colored: 0 0 #0000;
                box-shadow: var(--tw-ring-offset-shadow, 0 0 #0000), var(--tw-ring-shadow, 0 0 #0000), var(--tw-shadow)
            }

            .dark\:ring-1 {
                --tw-ring-offset-shadow: var(--tw-ring-inset) 0 0 0 var(--tw-ring-offset-width) var(--tw-ring-offset-color);
                --tw-ring-shadow: var(--tw-ring-inset) 0 0 0 calc(1px + var(--tw-ring-offset-width)) var(--tw-ring-color);
                box-shadow: var(--tw-ring-offset-shadow), var(--tw-ring-shadow), var(--tw-shadow, 0 0 #0000)
            }

            .dark\:ring-inset {
                --tw-ring-inset: inset
            }

            .dark\:ring-white\/5 {
                --tw-ring-color: rgb(255 255 255 / 0.05)
            }

            .dark\:hover\:text-white:hover {
                --tw-text-opacity: 1;
                color: rgb(255 255 255 / var(--tw-text-opacity))
            }

            .group:hover .dark\:group-hover\:stroke-gray-400 {
                stroke: #9ca3af
            }
        }

        @media (min-width: 640px) {
            .sm\:fixed {
                position: fixed
            }

            .sm\:top-0 {
                top: 0px
            }

            .sm\:right-0 {
                right: 0px
            }

            .sm\:ml-0 {
                margin-left: 0px
            }

            .sm\:flex {
                display: flex
            }

            .sm\:items-center {
                align-items: center
            }

            .sm\:justify-center {
                justify-content: center
            }

            .sm\:justify-between {
                justify-content: space-between
            }

            .sm\:text-left {
                text-align: left
            }

            .sm\:text-right {
                text-align: right
            }
        }

        @media (min-width: 768px) {
            .md\:grid-cols-2 {
                grid-template-columns: repeat(2, minmax(0, 1fr))
            }
        }

        @media (min-width: 1024px) {
            .lg\:gap-8 {
                gap: 2rem
            }

            .lg\:p-8 {
                padding: 2rem
            }
        }
    </style>

</head>

<body class="bg-gray-50">

    <x-header></x-header>

    {{-- section top --}}
    <section class="relative w-full bg-center bg-cover mt-28"
        style="min-height: 70vh; background-image: url('{{ asset('images/pexels-pixabay-159844.jpg') }}')">
        <div class="container m-auto px-6 pt-32 md:px-12 lg:pt-[4.8rem] lg:px-7">
            <div class="flex items-center">

                <div class="w-1/2">

                </div>

                <div class="w-1/2">
                    <h1 class="text-3xl font-bold text-white md:text-5xl lg:w-10/12">Diketive tu app para la gestión de
                        aulas.</h1>

                    <p class="mt-3 mb-12 text-xl text-white">Donde las aulas se convierten en comunidad
                        Adorado por más de 5 millones de alumnos y padres. Gratis para los docentes, para
                        siempre ,
                        and more.</p>
                </div>
            </div>

    </section>

    <div class="grid grid-cols-1 grid-rows-2 gap-5 py-3 md:grid-cols-2 md:grid-rows-1">
        <div class="p-1.5 items-center justify-center flex max-h-80">
            <img class="w-auto rounded-full ring-4 max-h-80 aspect-square ring-red-300 hover:ring-offset-2 hover:ring-redPersonal"
                src="{{ asset('/images/pexels-rethaferguson-3825567.jpg') }}" alt="">
        </div>

        <div class="flex justify-center text-left align-middle">

            <div class="max-w-96">
                <div class="flex flex-row">
                    <div class="flex items-center justify-center w-16 h-16 rounded-full bg-redPersonal">
                        <div class="h-9 w-9">
                            <svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='#ffffff'
                                class="mx-auto my-auto" width='36' height='36'>
                                <path d="M2 7v1l11 4 9-4V7L11 4z"></path>
                                <path
                                    d="M4 11v4.267c0 1.621 4.001 3.893 9 3.734 4-.126 6.586-1.972 7-3.467.024-.089.037-.178.037-.268V11L13 14l-5-1.667v3.213l-1-.364V12l-3-1z">
                                </path>
                            </svg>
                        </div>
                    </div>
                    <div class="my-auto ml-2 text-xl font-bold md:text-3xl lg:w-10/12 text-redPersonal">TITULO
                        PROVISIONAL</div>
                </div>


                <div class="">
                    <div class="mb-3"></div>
                    <span class="text-lg font-semibold">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis vel sem ac orci gravida luctus
                        a
                        ac
                        risus. Vivamus eu odio ex. Maecenas rutrum turpis semper enim tincidunt hendrerit. Donec at
                        neque
                        ultrices, accumsan purus ac, laoreet quam. Cras id lectus id elit venenatis volutpat. Donec
                        neque
                        eros, consequat et nunc id.
                    </span>
                </div>

            </div>

        </div>

    </div>

    {{-- section invertida --}}
    <div class="grid items-center grid-cols-1 grid-rows-2 gap-5 py-3 bg-yellow-100 md:grid-cols-2 md:grid-rows-1">


        <div class="flex justify-center text-left align-middle">

            <div class="max-w-96">
                <div class="flex flex-row">

                    <div class="flex items-center justify-center w-16 h-16 rounded-full bg-greenPersonal">
                        <div class="h-9 w-9">
                            <svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='#ffffff'
                                class="mx-auto my-auto" width='36' height='36'>
                                <path d="M2 7v1l11 4 9-4V7L11 4z"></path>
                                <path
                                    d="M4 11v4.267c0 1.621 4.001 3.893 9 3.734 4-.126 6.586-1.972 7-3.467.024-.089.037-.178.037-.268V11L13 14l-5-1.667v3.213l-1-.364V12l-3-1z">
                                </path>
                            </svg>
                        </div>
                    </div>

                    <div class="my-auto ml-2 text-xl font-bold md:text-3xl lg:w-10/12 text-greenPersonal">
                        TITULO
                        PROVISIONAL</div>

                </div>


                <div class="">
                    <div class="mb-3"></div>
                    <span class="text-lg font-semibold">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis vel sem ac orci gravida luctus
                        a
                        ac
                        risus. Vivamus eu odio ex. Maecenas rutrum turpis semper enim tincidunt hendrerit. Donec at
                        neque
                        ultrices, accumsan purus ac, laoreet quam. Cras id lectus id elit venenatis volutpat. Donec
                        neque
                        eros, consequat et nunc id.
                    </span>
                </div>

            </div>

        </div>

        <div class="p-1.5 items-center justify-center flex max-h-80">
            <img class="w-auto rounded-full max-h-80 aspect-square ring-4 ring-green-300 hover:ring-offset-2 hover:ring-greenPersonal"
                src="{{ asset('/images/pexels-rethaferguson-3825567.jpg') }}" alt="">
        </div>


    </div>

    {{-- section orientacion normal --}}
    <div class="grid grid-cols-1 grid-rows-2 gap-5 py-3 md:grid-cols-2 md:grid-rows-1">
        <div class="p-1.5 items-center justify-center flex max-h-80">
            <img class="w-auto rounded-full max-h-80 aspect-square ring-4 ring-pink-200 hover:ring-offset-2 hover:ring-pinkPersonal"
                src="{{ asset('/images/pexels-rethaferguson-3825567.jpg') }}" alt="">
        </div>

        <div class="flex justify-center text-left align-middle">

            <div class="max-w-96">
                <div class="flex flex-row">
                    <div class="flex items-center justify-center w-16 h-16 rounded-full bg-pinkPersonal">
                        <div class="h-9 w-9">
                            <svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='#ffffff'
                                class="mx-auto my-auto" width='36' height='36'>
                                <path d="M2 7v1l11 4 9-4V7L11 4z"></path>
                                <path
                                    d="M4 11v4.267c0 1.621 4.001 3.893 9 3.734 4-.126 6.586-1.972 7-3.467.024-.089.037-.178.037-.268V11L13 14l-5-1.667v3.213l-1-.364V12l-3-1z">
                                </path>
                            </svg>
                        </div>
                    </div>
                    <div class="my-auto ml-2 text-xl font-bold md:text-3xl lg:w-10/12 text-pinkPersonal">TITULO
                        PROVISIONAL</div>
                </div>


                <div class="">
                    <div class="mb-3"></div>
                    <span class="text-lg font-semibold">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis vel sem ac orci gravida luctus
                        a
                        ac
                        risus. Vivamus eu odio ex. Maecenas rutrum turpis semper enim tincidunt hendrerit. Donec at
                        neque
                        ultrices, accumsan purus ac, laoreet quam. Cras id lectus id elit venenatis volutpat. Donec
                        neque
                        eros, consequat et nunc id.
                    </span>
                </div>

            </div>

        </div>

    </div>


    {{-- section bottom --}}
    <section class="relative w-full bg-center bg-cover"
        style="min-height: 70vh; background-image: url('{{ asset('images/pexels-max-fischer-5212345.jpg') }}')">
        <div class="container m-auto px-6 pt-32 md:px-12 lg:pt-[4.8rem] lg:px-7">
            <div class="flex items-center">

                <div class="w-1/2">

                </div>

                <div class="w-1/2">
                    <h1 class="text-3xl font-bold text-white md:text-5xl lg:w-10/12">Diketive tu app de gestión de
                        aulas.</h1>
                    <p class="mt-3 mb-12 text-xl text-white">Donde las aulas se convierten en comunidad
                        Adorado por más de 5 millones de alumnos y padres. Gratis para los docentes, para
                        siempre ,
                        and more.</p>
                </div>
            </div>

    </section>

    <!-- footer -->

    <footer class="flex flex-col w-full px-6 text-white bg-blackGray body-font min-h-60">

        <div
            class="container flex flex-row justify-between px-6 py-10 mx-auto mb-4 border-b-2 md:items-center lg:items-start md:flex-row md:flex-no-wrap border-b-white">

            <div class="flex self-start mx-auto text-center basis-1/5 md:mx-0 md:text-left">

                <div class="flex flex-grow gap-2 mt-2 text-sm text-white">
                    <a class="inline-block self-baseline " href="{{ route('welcome') }}">

                        <img class="max-w-20 max-h-20 hover:rotate-6" src="{{ asset('icons/logoTranspDwhite.png') }}"
                            alt="logo Diketive">
                    </a>
                    <p class="hidden md:block">Breve descripción de la aplicación, su funcionalidad y hacia quién
                        va
                        dirigida, de forma que ocupe entre tres y cuatro líneas.</p>
                </div>

            </div>

            <div
                class="flex flex-wrap self-end justify-end flex-grow mt-10 -mb-10 text-center basis-4/5 md:mt-0 md:text-left">

                <div class="pr-4 basis-2/8">
                    <span
                        class="flex flex-col items-center justify-center h-full my-auto space-y-3 align-middle sm:ml-auto sm:mt-0 sm:justify-start">
                        <a class="cursor-pointer text-yellowPersonal ">
                            <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                class="w-6 h-6" viewBox="0 0 24 24">
                                <path d="M18 2h-3a5 5 0 00-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 011-1h3z"></path>
                            </svg>
                        </a>
                        <a class="cursor-pointer text-yellowPersonal ">
                            <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                class="w-6 h-6" viewBox="0 0 24 24">
                                <path
                                    d="M23 3a10.9 10.9 0 01-3.14 1.53 4.48 4.48 0 00-7.86 3v1A10.66 10.66 0 013 4s-4 9 5 13a11.64 11.64 0 01-7 2c9 5 20 0 20-11.5a4.5 4.5 0 00-.08-.83A7.72 7.72 0 0023 3z">
                                </path>
                            </svg>
                        </a>
                        <a class="cursor-pointer text-yellowPersonal ">
                            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" class="w-6 h-6" viewBox="0 0 24 24">
                                <rect width="20" height="20" x="2" y="2" rx="5" ry="5">
                                </rect>
                                <path d="M16 11.37A4 4 0 1112.63 8 4 4 0 0116 11.37zm1.5-4.87h.01"></path>
                            </svg>
                        </a>
                        <a class="cursor-pointer text-yellowPersonal ">
                            <svg fill="currentColor" stroke="currentColor" stroke-linecap="round"
                                stroke-linejoin="round" stroke-width="0" class="w-6 h-6" viewBox="0 0 24 24">
                                <path stroke="none"
                                    d="M16 8a6 6 0 016 6v7h-4v-7a2 2 0 00-2-2 2 2 0 00-2 2v7h-4v-7a6 6 0 016-6zM2 9h4v12H2z">
                                </path>
                                <circle cx="4" cy="4" r="2" stroke="none"></circle>
                            </svg>
                        </a>
                    </span>
                </div>

                <div class="flex basis-1/2">
                    <div class="items-center w-full px-4 basis-1/2">
                        <h2 class="mb-3 text-lg font-extrabold tracking-widest text-white uppercase title-font">
                            Información
                        </h2>
                        <nav class="mb-10 list-none">
                            <li class="mt-3">
                                <a href="{{ route('about.aboutUs') }}"
                                    class="text-gray-400 lowercase cursor-pointer hover:text-white">Sobre
                                    Nosotros</a>
                            </li>
                            <li class="mt-3">
                                <a class="text-gray-400 lowercase cursor-pointer hover:text-white">Politica
                                    Privacidad</a>
                            </li>
                            <li class="mt-3">
                                <a class="text-gray-400 lowercase cursor-pointer hover:text-white">Cookies</a>
                            </li>
                        </nav>
                    </div>

                    <div class="w-full px-4 basis-1/2">
                        <h2 class="mb-3 text-lg font-extrabold tracking-widest text-white uppercase">
                            Contacto
                        </h2>
                        <nav class="mb-10 list-none">
                            <li class="mt-3">
                                <a href="{{ route('contact') }}"
                                    class="text-gray-400 lowercase cursor-pointer hover:text-white">contáctanos</a>
                            </li>
                            <li class="mt-3">
                                <a class="text-gray-400 lowercase cursor-pointer hover:text-white">976-976-976</a>
                            </li>

                        </nav>
                    </div>
                </div>
            </div>



        </div>

        {{-- FOOTER TELEFONOS --}}
        <div
            class="flex flex-wrap self-center justify-center px-6 mt-6 mb-6 text-center md:justify-center md:pl-20 md:mt-0 md:text-left">

            <div class="flex flex-col px-6 mx-3 my-0 text-center">
                <a href="tel:103" class="flex flex-grow">
                    <div class="flex-col pt-2">
                        <svg class="flex flex-col align-top w-7 h-7 " xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 24 24">
                            <defs>
                                <style>
                                    .cls-1 {
                                        fill: #fff;
                                        opacity: 0;
                                    }

                                    .cls-2 {
                                        fill: #fdd306;
                                    }
                                </style>
                            </defs>
                            <title>phone-call</title>
                            <g id="Layer_2" data-name="Layer 2">
                                <g id="phone-call">
                                    <g id="phone-call-2" data-name="phone-call">
                                        <rect class="flex-col cls-1" width="12" height="12" />
                                        <path class="cls-2" d="
                M13,8a3,3,0,0,1,3,3,1,1,0,0,0,2,0,5,5,0,0,0-5-5,1,1,0,0,0,0,2Z" />
                                        <path class="cls-2"
                                            d="M13,4a7,7,0,0,1,7,7,1,1,0,0,0,2,0,9,9,0,0,0-9-9,1,1,0,0,0,0,2Z" />
                                        <path class="cls-2"
                                            d="M21.75,15.91a1,1,0,0,0-.72-.65l-6-1.37a1,1,0,0,0-.92.26c-.14.13-.15.14-.8,1.38a9.91,9.91,0,0,1-4.87-4.89C9.71,10,9.72,10,9.85,9.85a1,1,0,0,0,.26-.92L8.74,3a1,1,0,0,0-.65-.72,3.79,3.79,0,0,0-.72-.18A3.94,3.94,0,0,0,6.6,2,4.6,4.6,0,0,0,2,6.6,15.42,15.42,0,0,0,17.4,22,4.6,4.6,0,0,0,22,17.4a4.77,4.77,0,0,0-.06-.76A4.34,4.34,0,0,0,21.75,15.91Z" />
                                    </g>
                                </g>
                            </g>
                        </svg>
                    </div>
                    <div class="flex flex-col justify-around pl-2">
                        <h3 class="flex flex-row justify-center ">
                            <span class="font-bold ">900 100 456
                            </span>
                        </h3>

                        <p class="flex flex-row">Atención al menor</p>
                    </div>
                </a>
            </div>

            <div class="flex flex-col px-6 mx-3 my-0 text-center">
                <a href="tel:103" class="flex flex-grow">
                    <div class="flex-col pt-2">
                        <svg class="flex flex-col align-top w-7 h-7 " xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 24 24">
                            <defs>
                                <style>
                                    .cls-1 {
                                        fill: #fff;
                                        opacity: 0;
                                    }

                                    .cls-2 {
                                        fill: #fdd306;
                                    }
                                </style>
                            </defs>
                            <title>phone-call</title>
                            <g id="Layer_2" data-name="Layer 2">
                                <g id="phone-call">
                                    <g id="phone-call-2" data-name="phone-call">
                                        <rect class="flex-col cls-1" width="12" height="12" />
                                        <path class="cls-2" d="
                M13,8a3,3,0,0,1,3,3,1,1,0,0,0,2,0,5,5,0,0,0-5-5,1,1,0,0,0,0,2Z" />
                                        <path class="cls-2"
                                            d="M13,4a7,7,0,0,1,7,7,1,1,0,0,0,2,0,9,9,0,0,0-9-9,1,1,0,0,0,0,2Z" />
                                        <path class="cls-2"
                                            d="M21.75,15.91a1,1,0,0,0-.72-.65l-6-1.37a1,1,0,0,0-.92.26c-.14.13-.15.14-.8,1.38a9.91,9.91,0,0,1-4.87-4.89C9.71,10,9.72,10,9.85,9.85a1,1,0,0,0,.26-.92L8.74,3a1,1,0,0,0-.65-.72,3.79,3.79,0,0,0-.72-.18A3.94,3.94,0,0,0,6.6,2,4.6,4.6,0,0,0,2,6.6,15.42,15.42,0,0,0,17.4,22,4.6,4.6,0,0,0,22,17.4a4.77,4.77,0,0,0-.06-.76A4.34,4.34,0,0,0,21.75,15.91Z" />
                                    </g>
                                </g>
                            </g>
                        </svg>
                    </div>
                    <div class="flex flex-col justify-around pl-2">
                        <h3 class="flex flex-row justify-center ">
                            <span class="font-bold">900 018 018
                            </span>
                        </h3>

                        <p class="flex flex-row">Ministerio Interior</p>
                    </div>
                </a>
            </div>

            <div class="flex flex-col px-6 mx-3 my-0 text-center">
                <a href="tel:103" class="flex flex-grow">
                    <div class="flex-col pt-2">
                        <svg class="flex flex-col align-top w-7 h-7 " xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 24 24">
                            <defs>
                                <style>
                                    .cls-1 {
                                        fill: #fff;
                                        opacity: 0;
                                    }

                                    .cls-2 {
                                        fill: #fdd306;
                                    }
                                </style>
                            </defs>
                            <title>phone-call</title>
                            <g id="Layer_2" data-name="Layer 2">
                                <g id="phone-call">
                                    <g id="phone-call-2" data-name="phone-call">
                                        <rect class="flex-col cls-1" width="12" height="12" />
                                        <path class="cls-2" d="
                M13,8a3,3,0,0,1,3,3,1,1,0,0,0,2,0,5,5,0,0,0-5-5,1,1,0,0,0,0,2Z" />
                                        <path class="cls-2"
                                            d="M13,4a7,7,0,0,1,7,7,1,1,0,0,0,2,0,9,9,0,0,0-9-9,1,1,0,0,0,0,2Z" />
                                        <path class="cls-2"
                                            d="M21.75,15.91a1,1,0,0,0-.72-.65l-6-1.37a1,1,0,0,0-.92.26c-.14.13-.15.14-.8,1.38a9.91,9.91,0,0,1-4.87-4.89C9.71,10,9.72,10,9.85,9.85a1,1,0,0,0,.26-.92L8.74,3a1,1,0,0,0-.65-.72,3.79,3.79,0,0,0-.72-.18A3.94,3.94,0,0,0,6.6,2,4.6,4.6,0,0,0,2,6.6,15.42,15.42,0,0,0,17.4,22,4.6,4.6,0,0,0,22,17.4a4.77,4.77,0,0,0-.06-.76A4.34,4.34,0,0,0,21.75,15.91Z" />
                                    </g>
                                </g>
                            </g>
                        </svg>
                    </div>
                    <div class="flex flex-col justify-around pl-2">
                        <h3 class="flex flex-row justify-center ">
                            <span class="font-bold">600 909 073
                            </span>
                        </h3>

                        <p class="flex flex-row">Telegram M. Interior</p>
                    </div>
                </a>
            </div>

            <div class="flex flex-col px-6 mx-3 my-0 text-center">
                <a href="tel:103" class="flex flex-grow">
                    <div class="flex-col pt-2">
                        <svg class="flex flex-col align-top w-7 h-7 " xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 24 24">
                            <defs>
                                <style>
                                    .cls-1 {
                                        fill: #fff;
                                        opacity: 0;
                                    }

                                    .cls-2 {
                                        fill: #fdd306;
                                    }
                                </style>
                            </defs>
                            <title>phone-call</title>
                            <g id="Layer_2" data-name="Layer 2">
                                <g id="phone-call">
                                    <g id="phone-call-2" data-name="phone-call">
                                        <rect class="flex-col cls-1" width="12" height="12" />
                                        <path class="cls-2" d="
                M13,8a3,3,0,0,1,3,3,1,1,0,0,0,2,0,5,5,0,0,0-5-5,1,1,0,0,0,0,2Z" />
                                        <path class="cls-2"
                                            d="M13,4a7,7,0,0,1,7,7,1,1,0,0,0,2,0,9,9,0,0,0-9-9,1,1,0,0,0,0,2Z" />
                                        <path class="cls-2"
                                            d="M21.75,15.91a1,1,0,0,0-.72-.65l-6-1.37a1,1,0,0,0-.92.26c-.14.13-.15.14-.8,1.38a9.91,9.91,0,0,1-4.87-4.89C9.71,10,9.72,10,9.85,9.85a1,1,0,0,0,.26-.92L8.74,3a1,1,0,0,0-.65-.72,3.79,3.79,0,0,0-.72-.18A3.94,3.94,0,0,0,6.6,2,4.6,4.6,0,0,0,2,6.6,15.42,15.42,0,0,0,17.4,22,4.6,4.6,0,0,0,22,17.4a4.77,4.77,0,0,0-.06-.76A4.34,4.34,0,0,0,21.75,15.91Z" />
                                    </g>
                                </g>
                            </g>
                        </svg>
                    </div>
                    <div class="flex flex-col justify-around pl-2">
                        <h3 class="flex flex-row justify-center ">
                            <span class="font-bold">915 822 358
                            </span>
                        </h3>

                        <p class="flex flex-row">Protección Menor NT</p>
                    </div>
                </a>
            </div>

        </div>

        {{-- FOOTER BOTTOM --}}
        <div
            class="container flex flex-row justify-center flex-grow w-full px-6 mx-auto border-t-2 bg-blackGray border-t-white">
            <div class="px-5 py-4 mx-auto">
                <p class="text-sm text-white capitalize xl:text-center">© LetuxMedia 2024 All rights reserved</p>
            </div>
        </div>

    </footer>

</body>

</html>
