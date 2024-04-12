<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- Añado meta para axios --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    {{-- añadidos tamplate --}}
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">

    {{-- fin añadidos template --}}

    <!-- Styles -->
    {{-- @vite('resources/css/app.css', 'resources/js/refreshSelectUserType.js', 'resources/js/userDropdownMenu.js') --}}
    @vite(['resources/css/app.css'])
    {{-- @vite(['resources/js/refreshSelectUserType.js'])
@vite(['resources/js/userDropdownMenu.js']) --}}
    @vite(['resources/js/app.js'])
    {{-- @vite(['resources\js\vueJs\notificationMenu.js']) --}}
    @vite(['resources/js/vueJs/notificationMenu.js'])

    @yield('css')

    @yield('js')

    <style>
        @media (min-width: 768px) {
            .md\:ml-64 {
                margin-left: 16rem;
            }

            .md\:hidden {
                display: none;
            }

            .md\:w-\[calc\(100\%-256px\)\] {
                width: calc(100% - 256px);
            }

            .md\:grid-cols-2 {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }
        }

        @media (min-width: 1024px) {
            .lg\:col-span-2 {
                grid-column: span 2 / span 2;
            }

            .lg\:grid-cols-2 {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }

            .lg\:grid-cols-3 {
                grid-template-columns: repeat(3, minmax(0, 1fr));
            }




            /* Custom style */
            .header-right {
                width: calc(100% - 3.5rem);
            }

            .sidebar:hover {
                width: 16rem;
            }

            @media only screen and (min-width: 768px) {
                .header-right {
                    width: calc(100% - 16rem);
                }
            }
        }
    </style>

    <title>@yield('title')</title>
</head>

<body class="flex flex-col flex-auto flex-shrink-0 min-h-screen antialiased bg-gray-50">


    <!-- navbar -->
    <div class="fixed z-10 flex items-center justify-between w-full bg-blue-800 shadow-md h-14 shadow-black/5">
        <div class="flex items-center justify-start pl-3 bg-blue-800 border-none md:justify-center w-14 md:w-64 h-14">
            <img class="mr-2 overflow-hidden rounded-md w-7 h-7 md:w-10 md:h-10"
                src="https://therminic2018.eu/wp-content/uploads/2018/07/dummy-avatar.jpg" />
            <span class="hidden md:block">ADMIN</span>
        </div>
        <div class="flex items-center justify-end bg-blue-800 h-14 header-right">
            {{-- <div class="flex items-center w-full max-w-xl p-2 mr-4 bg-white border border-gray-200 rounded shadow-sm">
                {{-- <button class="outline-none focus:outline-none">
                    {{-- <svg class="w-5 h-5 text-gray-600 cursor-pointer" fill="none" stroke-linecap="round"
                        stroke-linejoin="round" stroke-width="2" stroke="currentColor" viewBox="0 0 24 24">
                        <path d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                </button>
                <input type="search" name="" id="" placeholder="Search"
                    class="w-full pl-3 text-sm text-black bg-transparent outline-none focus:outline-none" />
         </div> --}}
            <ul class="flex items-center">
                <li>
                    {{-- <div class="block w-px h-6 mx-3 bg-gray-400 dark:bg-gray-700"></div> --}}
                </li>
                <li>

                    <a href="{{ route('logout') }}" class="flex items-center mr-4 hover:text-blue-100"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit()">
                        <span class="inline-flex mr-1">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1">
                                </path>
                            </svg>
                        </span>
                        Logout
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
            </ul>
        </div>
    </div>
    <!-- end navbar -->


    {{-- <div class="flex flex-row mt-14 pt-14"> --}}
    <!--sidenav -->
    <div
        class="fixed left-0 z-10 flex flex-col h-full transition-all duration-300 bg-gray-100 border-none top-14 w-14 hover:w-64 md:w-64 sidebar">
        <div class="flex flex-col justify-between overflow-x-hidden overflow-y-auto">
            <a href="#" class="flex items-center px-4 pt-4 pb-4 border-b border-b-gray-800">

                <h2 class="hidden text-2xl font-bold md:inline ">App <span
                        class="hidden px-2 text-white rounded-md md:inline bg-yellowPersonal">Vader</span>
                </h2>

                <svg class="md:hidden" role="img" focusable="false" aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 14 14">
                    <path
                        d="m 6.34624,12.978733 c -1.56519,-0.1103 -3.170194,-0.6101 -4.281399,-1.3334 -0.626437,-0.4078 -1.055651,-0.8792 -1.055651,-1.1594 0,-0.057 0.291206,-0.8400001 0.849538,-2.2848001 l 0.849537,-2.1983 0.01486,-1.046 c 0.01341,-0.9436 0.01966,-1.0658 0.06383,-1.2481 0.164504,-0.6789 0.466028,-1.2214 0.944684,-1.6996 0.58811,-0.5875 1.31252,-0.9177 2.17038,-0.9891 0.491919,-0.041 2.261002,-0.015 2.535187,0.037 0.71565,0.1358 1.302013,0.4455 1.823007,0.9629 0.498039,0.4945 0.803273,1.0538 0.951914,1.7442 0.0475,0.2206 0.05334,0.3322 0.06553,1.2525 l 0.01338,1.0104 0.849886,2.2021 c 0.467438,1.2111 0.849887,2.2193001 0.849887,2.2403001 0,0.1704 -0.251648,0.5361 -0.541134,0.7864 -1.339365,1.1578 -3.893303,1.8789 -6.103433,1.7233 z m -1.771806,-1.4078 c 0.0323,-0.016 0.08406,-0.067 0.11504,-0.1125 0.172179,-0.2533 -0.118512,-0.594 -0.392312,-0.4598 -0.233035,0.1143 -0.261319,0.426 -0.05032,0.5546 0.08912,0.054 0.23922,0.062 0.327597,0.018 z m 5.209808,-0.062 c 0.08085,-0.081 0.0923,-0.106 0.0923,-0.2032 0,-0.1852 -0.08476,-0.2956 -0.255826,-0.3332 -0.161493,-0.035 -0.343584,0.089 -0.374953,0.2561 -0.02056,0.1096 0.04915,0.2715 0.141085,0.3275 0.04551,0.028 0.117895,0.045 0.189385,0.045 0.102778,0 0.12604,-0.01 0.208014,-0.092 z m -4.067988,-0.864 0,-0.6474001 -0.213958,0.2130001 -0.213957,0.213 0,0.4343 0,0.4344 0.213957,0 0.213958,0 0,-0.6473 z m 1.069787,-0.2086 0,-0.8558001 -0.320936,0 -0.320936,0 0,0.8558001 0,0.8559 0.320936,0 0.320936,0 0,-0.8559 z m 1.069787,0 0,-0.8558001 -0.320936,0 -0.320936,0 0,0.8558001 0,0.8559 0.320936,0 0.320936,0 0,-0.8559 z m 0.85583,0.4215 0,-0.4343 -0.213957,-0.213 -0.213958,-0.2130001 0,0.6474001 0,0.6473 0.213958,0 0.213957,0 0,-0.4344 z m -6.769213,-0.233 c 0.03074,-0.014 0.06785,-0.045 0.08248,-0.068 0.02251,-0.036 0.35654,-0.8881001 1.447763,-3.6930001 0.29691,-0.7632 0.445693,-1.0367 0.712568,-1.31 0.301114,-0.3083 0.615352,-0.44 1.099181,-0.4605 0.477035,-0.02 0.70809,0.049 1.321803,0.3978 0.1183,0.067 0.171197,0.082 0.326983,0.091 0.230331,0.013 0.357497,-0.02 0.550115,-0.1454 0.204611,-0.133 0.461735,-0.2484 0.674685,-0.3029 0.221329,-0.057 0.631003,-0.062 0.874575,-0.011 0.242082,0.051 0.531056,0.2017 0.714765,0.3735 0.279964,0.2619 0.472177,0.5987 0.743671,1.303 0.776849,2.0154 1.463749,3.7517001 1.49789,3.7862001 0.02306,0.023 0.0809,0.049 0.128546,0.056 0.07456,0.012 0.09671,0 0.159046,-0.058 0.04425,-0.044 0.07242,-0.097 0.07242,-0.1354 0,-0.052 -0.492478,-1.3369001 -1.485247,-3.8753001 -0.158276,-0.4047 -0.329179,-0.7635 -0.44726,-0.9389 -0.415943,-0.6179 -0.901447,-0.9121 -1.606111,-0.9733 -0.546409,-0.047 -1.002394,0.073 -1.560701,0.4112 -0.197739,0.1199 -0.330304,0.1204 -0.511922,0 -0.449957,-0.2938 -0.861222,-0.419 -1.366148,-0.416 -0.912153,0 -1.535714,0.4155 -1.982206,1.3035 -0.117587,0.2339 -0.115804,0.2294 -0.982737,2.4543 C 1.538153,10.642433 1.6174,10.418233 1.663606,10.515533 c 0.05574,0.1175 0.164574,0.1594 0.278841,0.1073 z M 7.641738,8.7901329 c -1.43e-4,-0.407 -0.01583,-0.4885 -0.125316,-0.6514 -0.110876,-0.1649 -0.260749,-0.2494 -0.468503,-0.2643 -0.284419,-0.02 -0.51719,0.1129 -0.633858,0.3629 -0.05113,0.1096 -0.05549,0.15 -0.0557,0.5171 l -2.37e-4,0.3982 0.641872,0 0.641872,0 -1.42e-4,-0.3625 z m -1.219031,-1.4146 c 0.05513,-0.03 0.111296,-0.074 0.124809,-0.1 0.01377,-0.026 0.02457,-0.2022 0.02457,-0.4016 0,-0.4098 -0.0422,-0.5966 -0.173687,-0.769 -0.191066,-0.2505 -0.427793,-0.3521 -0.862005,-0.3698 -0.430715,-0.018 -0.720266,0.068 -1.069985,0.3157 -0.21578,0.1529 -0.315391,0.3014 -0.411588,0.6136 -0.08815,0.286 -0.05904,0.526 0.07961,0.6563 0.122438,0.115 0.170501,0.1195 1.213341,0.1135 0.960361,-0.01 0.976169,-0.01 1.074935,-0.059 z m 3.251681,0.039 c 0.131564,-0.037 0.287962,-0.1969 0.31087,-0.3188 0.04177,-0.2223 -0.10476,-0.6797 -0.28244,-0.8815 -0.136745,-0.1554 -0.412369,-0.3293 -0.643348,-0.406 -0.171798,-0.057 -0.230289,-0.064 -0.52611,-0.065 -0.375199,0 -0.506063,0.027 -0.72433,0.1583 -0.151467,0.091 -0.293037,0.2775 -0.345953,0.4557 -0.02494,0.084 -0.03516,0.2344 -0.03516,0.5173 0,0.3783 0.0027,0.4014 0.05142,0.4468 0.04734,0.044 0.125116,0.077 0.245739,0.1042 0.109207,0.024 1.857078,0.015 1.949312,-0.01 z" />
                </svg>

            </a>
            <ul class="mt-4">
                <span class="pl-2 font-bold text-gray-400">PANEL ADMINISTRATIVO</span>
                <li class="mb-1">
                    <a href="{{ route('admin.dashboard') }}"
                        class="flex font-semibold items-center py-2 px-4 text-gray-900 hover:bg-gray-950 hover:text-gray-100 rounded-md group-[.active]:bg-gray-800 group-[.active]:text-white group-[.selected]:bg-gray-950 group-[.selected]:text-gray-100">
                        <i class="mr-3 text-lg ri-home-2-line"></i>
                        <span class="hidden text-sm md:inline">Dashboard</span>
                    </a>
                </li>
                <li class="mb-1 group">
                    <a href="{{ route('user.index') }}"
                        class="flex font-semibold items-center py-2 px-4 text-gray-900 hover:bg-gray-950 hover:text-gray-100 rounded-md group-[.active]:bg-gray-800 group-[.active]:text-white group-[.selected]:bg-gray-950 group-[.selected]:text-gray-100 sidebar-dropdown-toggle">
                        <i class='mr-3 text-lg bx bx-user'></i>
                        <span class="hidden text-sm md:inline">Usuarios</span>
                        <i class="ri-arrow-right-s-line ml-auto group-[.selected]:rotate-90"></i>
                    </a>
                    <ul class="pl-7 mt-2 hidden group-[.selected]:block">
                        <li class="mb-4">
                            <a href=""
                                class="text-gray-900 text-sm flex items-center hover:text-[#f84525] before:contents-[''] before:w-1 before:h-1 before:rounded-full before:bg-gray-300 before:mr-3">All</a>
                        </li>
                        <li class="mb-4">
                            <a href=""
                                class="text-gray-900 text-sm flex items-center hover:text-[#f84525] before:contents-[''] before:w-1 before:h-1 before:rounded-full before:bg-gray-300 before:mr-3">Roles</a>
                        </li>
                    </ul>
                </li>
                <li class="mb-1 group">
                    <a href="{{ route('admin.activities') }}"
                        class="flex font-semibold items-center py-2 px-4 text-gray-900 hover:bg-gray-950 hover:text-gray-100 rounded-md group-[.active]:bg-gray-800 group-[.active]:text-white group-[.selected]:bg-gray-950 group-[.selected]:text-gray-100">
                        <i class='mr-3 text-lg bx bx-list-ul'></i>
                        <span class="hidden text-sm md:inline">Actividades</span>
                    </a>
                </li>
                <li class="mb-1 group">
                    <a href="{{ route('admin.alertas') }}"
                        class="flex font-semibold items-center py-2 px-4 text-gray-900 hover:bg-gray-950 hover:text-gray-100 rounded-md group-[.active]:bg-gray-800 group-[.active]:text-white group-[.selected]:bg-gray-950 group-[.selected]:text-gray-100">
                        <i class='mr-3 text-lg bx bx-list-ul'></i>
                        <span class="hidden text-sm md:inline">Alertas</span>
                    </a>
                </li>
                <li class="mb-1 group">
                    <a href="{{ route('category.index') }}"
                        class="flex font-semibold items-center py-2 px-4 text-gray-900 hover:bg-gray-950 hover:text-gray-100 rounded-md group-[.active]:bg-gray-800 group-[.active]:text-white group-[.selected]:bg-gray-950 group-[.selected]:text-gray-100">
                        <i class='mr-3 text-lg bx bx-list-ul'></i>
                        <span class="hidden text-sm md:inline">Categorias</span>
                    </a>
                </li>
                <li class="mb-1 group">
                    <a href="{{ route('admin.classroom') }}"
                        class="flex font-semibold items-center py-2 px-4 text-gray-900 hover:bg-gray-950 hover:text-gray-100 rounded-md group-[.active]:bg-gray-800 group-[.active]:text-white group-[.selected]:bg-gray-950 group-[.selected]:text-gray-100">
                        <i class='mr-3 text-lg bx bx-list-ul'></i>
                        <span class="hidden text-sm md:inline">Clases</span>
                    </a>
                </li>

                {{-- <span class="pl-2 font-bold text-gray-400">BLOG</span> --}}
                <li class="mb-1 group">
                    <a href="{{ route('admin.posts') }}"
                        class="flex font-semibold items-center py-2 px-4 text-gray-900 hover:bg-gray-950 hover:text-gray-100 rounded-md group-[.active]:bg-gray-800 group-[.active]:text-white group-[.selected]:bg-gray-950 group-[.selected]:text-gray-100 sidebar-dropdown-toggle">
                        <i class='mr-3 text-lg bx bxl-blogger'></i>
                        <span class="hidden text-sm md:inline">Post</span>
                        <i class="ri-arrow-right-s-line ml-auto group-[.selected]:rotate-90"></i>
                    </a>
                    <ul class="pl-7 mt-2 hidden group-[.selected]:block">
                        <li class="mb-4">
                            <a href=""
                                class="text-gray-900 text-sm flex items-center hover:text-[#f84525] before:contents-[''] before:w-1 before:h-1 before:rounded-full before:bg-gray-300 before:mr-3">All</a>
                        </li>
                        <li class="mb-4">
                            <a href=""
                                class="text-gray-900 text-sm flex items-center hover:text-[#f84525] before:contents-[''] before:w-1 before:h-1 before:rounded-full before:bg-gray-300 before:mr-3">Categories</a>
                        </li>
                    </ul>
                </li>
                <li class="mb-1 group">
                    <a href=""
                        class="flex font-semibold items-center py-2 px-4 text-gray-900 hover:bg-gray-950 hover:text-gray-100 rounded-md group-[.active]:bg-gray-800 group-[.active]:text-white group-[.selected]:bg-gray-950 group-[.selected]:text-gray-100">
                        <i class='mr-3 text-lg bx bx-archive'></i>
                        <span class="hidden text-sm md:inline">Archive</span>
                    </a>
                </li>
                <span class="pl-2 font-bold text-gray-400">PERSONAL</span>
                <li class="mb-1 group">
                    <a href="{{ route('admin.notifications') }}"
                        class="flex font-semibold items-center py-2 px-4 text-gray-900 hover:bg-gray-950 hover:text-gray-100 rounded-md group-[.active]:bg-gray-800 group-[.active]:text-white group-[.selected]:bg-gray-950 group-[.selected]:text-gray-100">
                        <i class='mr-3 text-lg bx bx-bell'></i>
                        <span class="hidden text-sm md:inline">Notifications</span>
                        <span
                            class=" md:block px-2 py-0.5 ml-auto text-xs font-medium tracking-wide text-red-600 bg-red-200 rounded-full">{{ count($notifications) }}</span>
                    </a>
                </li>
                <li class="mb-1 group">
                    <a href=""
                        class="flex font-semibold items-center py-2 px-4 text-gray-900 hover:bg-gray-950 hover:text-gray-100 rounded-md group-[.active]:bg-gray-800 group-[.active]:text-white group-[.selected]:bg-gray-950 group-[.selected]:text-gray-100">
                        <i class='mr-3 text-lg bx bx-envelope'></i>
                        <span class="hidden text-sm md:inline">Messages</span>
                        <span
                            class=" md:block px-2 py-0.5 ml-auto text-xs font-medium tracking-wide text-green-600 bg-green-200 rounded-full">2
                            New</span>
                    </a>
                </li>
                <li class="mb-1 group">
                    <a href="{{ route('admin.activities') }}"
                        class="flex font-semibold items-center py-2 px-4 text-gray-900 hover:bg-gray-950 hover:text-gray-100 rounded-md group-[.active]:bg-gray-800 group-[.active]:text-white group-[.selected]:bg-gray-950 group-[.selected]:text-gray-100">
                        <i class='mr-3 text-lg bx bx-list-ul'></i>
                        <span class="hidden text-sm md:inline">Datos Contacto</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    {{-- <div class="fixed top-0 left-0 z-40 w-full h-full bg-black/50 md:hidden sidebar-overlay"></div> --}}
    <!-- end sidenav -->
    <div class="flex flex-row basis-full">
        <main class="w-full h-full mb-10 ml-14 mt-14 md:ml-64 ">

            @yield('content')
        </main>

    </div>



    <script>
        // start: Sidebar
        const sidebarToggle = document.querySelector('.sidebar-toggle')
        const sidebarOverlay = document.querySelector('.sidebar-overlay')
        const sidebarMenu = document.querySelector('.sidebar-menu')
        const main = document.querySelector('.main')
        sidebarToggle.addEventListener('click', function(e) {
            e.preventDefault()
            main.classList.toggle('active')
            sidebarOverlay.classList.toggle('hidden')
            sidebarMenu.classList.toggle('-translate-x-full')
        })
        sidebarOverlay.addEventListener('click', function(e) {
            e.preventDefault()
            main.classList.add('active')
            sidebarOverlay.classList.add('hidden')
            sidebarMenu.classList.add('-translate-x-full')
        })
        document.querySelectorAll('.sidebar-dropdown-toggle').forEach(function(item) {
            item.addEventListener('click', function(e) {
                e.preventDefault()
                const parent = item.closest('.group')
                if (parent.classList.contains('selected')) {
                    parent.classList.remove('selected')
                } else {
                    document.querySelectorAll('.sidebar-dropdown-toggle').forEach(function(i) {
                        i.closest('.group').classList.remove('selected')
                    })
                    parent.classList.add('selected')
                }
            })
        })
        // end: Sidebar



        // start: Popper
        const popperInstance = {}
        document.querySelectorAll('.dropdown').forEach(function(item, index) {
            const popperId = 'popper-' + index
            const toggle = item.querySelector('.dropdown-toggle')
            const menu = item.querySelector('.dropdown-menu')
            menu.dataset.popperId = popperId
            popperInstance[popperId] = Popper.createPopper(toggle, menu, {
                modifiers: [{
                        name: 'offset',
                        options: {
                            offset: [0, 8],
                        },
                    },
                    {
                        name: 'preventOverflow',
                        options: {
                            padding: 24,
                        },
                    },
                ],
                placement: 'bottom-end'
            });
        })
        document.addEventListener('click', function(e) {
            const toggle = e.target.closest('.dropdown-toggle')
            const menu = e.target.closest('.dropdown-menu')
            if (toggle) {
                const menuEl = toggle.closest('.dropdown').querySelector('.dropdown-menu')
                const popperId = menuEl.dataset.popperId
                if (menuEl.classList.contains('hidden')) {
                    hideDropdown()
                    menuEl.classList.remove('hidden')
                    showPopper(popperId)
                } else {
                    menuEl.classList.add('hidden')
                    hidePopper(popperId)
                }
            } else if (!menu) {
                hideDropdown()
            }
        })

        function hideDropdown() {
            document.querySelectorAll('.dropdown-menu').forEach(function(item) {
                item.classList.add('hidden')
            })
        }

        function showPopper(popperId) {
            popperInstance[popperId].setOptions(function(options) {
                return {
                    ...options,
                    modifiers: [
                        ...options.modifiers,
                        {
                            name: 'eventListeners',
                            enabled: true
                        },
                    ],
                }
            });
            popperInstance[popperId].update();
        }

        function hidePopper(popperId) {
            popperInstance[popperId].setOptions(function(options) {
                return {
                    ...options,
                    modifiers: [
                        ...options.modifiers,
                        {
                            name: 'eventListeners',
                            enabled: false
                        },
                    ],
                }
            });
        }
        // end: Popper



        // start: Tab
        document.querySelectorAll('[data-tab]').forEach(function(item) {
            item.addEventListener('click', function(e) {
                e.preventDefault()
                const tab = item.dataset.tab
                const page = item.dataset.tabPage
                const target = document.querySelector('[data-tab-for="' + tab + '"][data-page="' + page +
                    '"]')
                document.querySelectorAll('[data-tab="' + tab + '"]').forEach(function(i) {
                    i.classList.remove('active')
                })
                document.querySelectorAll('[data-tab-for="' + tab + '"]').forEach(function(i) {
                    i.classList.add('hidden')
                })
                item.classList.add('active')
                target.classList.remove('hidden')
            })
        })
        // end: Tab



        // start: Chart
        new Chart(document.getElementById('order-chart'), {
            type: 'line',
            data: {
                labels: generateNDays(7),
                datasets: [{
                        label: 'Active',
                        data: generateRandomData(7),
                        borderWidth: 1,
                        fill: true,
                        pointBackgroundColor: 'rgb(59, 130, 246)',
                        borderColor: 'rgb(59, 130, 246)',
                        backgroundColor: 'rgb(59 130 246 / .05)',
                        tension: .2
                    },
                    {
                        label: 'Completed',
                        data: generateRandomData(7),
                        borderWidth: 1,
                        fill: true,
                        pointBackgroundColor: 'rgb(16, 185, 129)',
                        borderColor: 'rgb(16, 185, 129)',
                        backgroundColor: 'rgb(16 185 129 / .05)',
                        tension: .2
                    },
                    {
                        label: 'Canceled',
                        data: generateRandomData(7),
                        borderWidth: 1,
                        fill: true,
                        pointBackgroundColor: 'rgb(244, 63, 94)',
                        borderColor: 'rgb(244, 63, 94)',
                        backgroundColor: 'rgb(244 63 94 / .05)',
                        tension: .2
                    },
                ]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        function generateNDays(n) {
            const data = []
            for (let i = 0; i < n; i++) {
                const date = new Date()
                date.setDate(date.getDate() - i)
                data.push(date.toLocaleString('en-US', {
                    month: 'short',
                    day: 'numeric'
                }))
            }
            return data
        }

        function generateRandomData(n) {
            const data = []
            for (let i = 0; i < n; i++) {
                data.push(Math.round(Math.random() * 10))
            }
            return data
        }
        // end: Chart
    </script>

</body>

</html>
