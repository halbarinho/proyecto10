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
    {{-- @vite('resources/css/app.css', 'resources/js/refreshSelectUserType.js', 'resources/js/userDropdownMenu.js')
    --}}
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
            {{-- <div
                class="flex items-center w-full max-w-xl p-2 mr-4 bg-white border border-gray-200 rounded shadow-sm">
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
                    <a href="#" class="flex items-center mr-4 hover:text-blue-100">
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

                    <h2 class="text-2xl font-bold ">Dike <span
                            class="px-2 text-white rounded-md bg-yellowPersonal">Tive</span>
                    </h2>
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
                        <a href=""
                            class="flex font-semibold items-center py-2 px-4 text-gray-900 hover:bg-gray-950 hover:text-gray-100 rounded-md group-[.active]:bg-gray-800 group-[.active]:text-white group-[.selected]:bg-gray-950 group-[.selected]:text-gray-100">
                            <i class='mr-3 text-lg bx bx-list-ul'></i>
                            <span class="hidden text-sm md:inline">Activities</span>
                        </a>
                    </li>
                    <span class="pl-2 font-bold text-gray-400">BLOG</span>
                    <li class="mb-1 group">
                        <a href=""
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
                        <a href=""
                            class="flex font-semibold items-center py-2 px-4 text-gray-900 hover:bg-gray-950 hover:text-gray-100 rounded-md group-[.active]:bg-gray-800 group-[.active]:text-white group-[.selected]:bg-gray-950 group-[.selected]:text-gray-100">
                            <i class='mr-3 text-lg bx bx-bell'></i>
                            <span class="hidden text-sm md:inline">Notifications</span>
                            <span
                                class=" md:block px-2 py-0.5 ml-auto text-xs font-medium tracking-wide text-red-600 bg-red-200 rounded-full">5</span>
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
                </ul>
            </div>
        </div>
        {{-- <div class="fixed top-0 left-0 z-40 w-full h-full bg-black/50 md:hidden sidebar-overlay"></div> --}}
        <!-- end sidenav -->
        <div class="flex flex-row basis-full flex-grow-1 flex-shrink-1">
            <main class="flex flex-row flex-shrink w-full h-full mb-10 ml-14 mt-14 md:ml-64 flex-grow-1">

                @yield('content')
            </main>

        </div>



        <script>
            // start: Sidebar
            const sidebarToggle = document.querySelector('.sidebar-toggle')
            const sidebarOverlay = document.querySelector('.sidebar-overlay')
            const sidebarMenu = document.querySelector('.sidebar-menu')
            const main = document.querySelector('.main')
            sidebarToggle.addEventListener('click', function (e) {
                e.preventDefault()
                main.classList.toggle('active')
                sidebarOverlay.classList.toggle('hidden')
                sidebarMenu.classList.toggle('-translate-x-full')
            })
            sidebarOverlay.addEventListener('click', function (e) {
                e.preventDefault()
                main.classList.add('active')
                sidebarOverlay.classList.add('hidden')
                sidebarMenu.classList.add('-translate-x-full')
            })
            document.querySelectorAll('.sidebar-dropdown-toggle').forEach(function (item) {
                item.addEventListener('click', function (e) {
                    e.preventDefault()
                    const parent = item.closest('.group')
                    if (parent.classList.contains('selected')) {
                        parent.classList.remove('selected')
                    } else {
                        document.querySelectorAll('.sidebar-dropdown-toggle').forEach(function (i) {
                            i.closest('.group').classList.remove('selected')
                        })
                        parent.classList.add('selected')
                    }
                })
            })
            // end: Sidebar



            // start: Popper
            const popperInstance = {}
            document.querySelectorAll('.dropdown').forEach(function (item, index) {
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
            document.addEventListener('click', function (e) {
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
                document.querySelectorAll('.dropdown-menu').forEach(function (item) {
                    item.classList.add('hidden')
                })
            }

            function showPopper(popperId) {
                popperInstance[popperId].setOptions(function (options) {
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
                popperInstance[popperId].setOptions(function (options) {
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
            document.querySelectorAll('[data-tab]').forEach(function (item) {
                item.addEventListener('click', function (e) {
                    e.preventDefault()
                    const tab = item.dataset.tab
                    const page = item.dataset.tabPage
                    const target = document.querySelector('[data-tab-for="' + tab + '"][data-page="' + page +
                        '"]')
                    document.querySelectorAll('[data-tab="' + tab + '"]').forEach(function (i) {
                        i.classList.remove('active')
                    })
                    document.querySelectorAll('[data-tab-for="' + tab + '"]').forEach(function (i) {
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