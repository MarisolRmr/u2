<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="{{ asset('img/Logos.png') }}" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />


    {{-- Estilos de tailwind --}}
    {{-- @vite('resources/css/app.css')  --}}
    <link rel="stylesheet" href="/resources/css/app.css">


    {{-- Scripts de tailwind --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/dropzone@5.9.3/dist/min/dropzone.min.css">
    {{-- <script src="https://cdn.jsdelivr.net/npm/dropzone@5.9.3/dist/min/dropzone.min.js"></script>     --}}

    
    <script src="resources/js/app.js"></script>
    {{-- @vite('resources/js/app.js') --}}


    <!-- Fonts and icons -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />

    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>

    {{-- @vite('resources/css/nucleo-icons.css')
    @vite('resources/css/nucleo-svg.css')
    @vite('resources/css/argon-dashboard-tailwind.css') --}}

    <link rel="stylesheet" href="resources/css/nucleo-icons.css">
    <link rel="stylesheet" href="resources/css/nucleo-icons.css">
    <link rel="stylesheet" href="resources/css/nucleo-svg.css">
    <link rel="stylesheet" href="resources/css/argon-dashboard-tailwind.css">

    <!-- Popper -->
    <script src="https://unpkg.com/@popperjs/core@2"></script>

    {{-- @vite('resources/js/plugins/chartjs.min.js')
    @vite('resources/js/plugins/perfect-scrollbar.min.js')
    @vite('resources/js/argon-dashboard-tailwind.js')
    @vite('resources/js/argon-dashboard-tailwind.min.js') --}}

    <script src="resources/js/plugins/chartjs.min.js"></script>
    <script src="resources/js/plugins/perfect-scrollbar.min.js"></script>
    <script src="resources/js/argon-dashboard-tailwind.js"></script>
    <script src="resources/js/argon-dashboard-tailwind.min.js"></script>

    <title>Facturas</title>
</head>

<body
    class="m-0 font-sans text-base antialiased font-normal dark:bg-slate-900 leading-default bg-gray-50 text-slate-500">

    @yield('contenido_top')

    @auth
        <!-- sidenav  -->
        <aside
            class="fixed inset-y-0 flex-wrap items-center justify-between block w-full p-0 my-4 overflow-y-auto antialiased transition-transform duration-200 -translate-x-full bg-white border-0 shadow-xl dark:shadow-none dark:bg-slate-850 max-w-64 ease-nav-brand z-990 xl:ml-6 rounded-2xl xl:left-0 xl:translate-x-0"
            aria-expanded="false">
            <div class="h-19">
                <i class="absolute top-0 right-0 p-4 opacity-50 cursor-pointer fas fa-times dark:text-white text-slate-400 xl:hidden"
                    sidenav-close></i>
                <a class="block px-8 py-6 m-0 text-sm whitespace-nowrap dark:text-white text-slate-700"
                    href=" {{ route('posts.index', auth()->user()->username) }} ">
                    <img src="{{ asset('img/Logos.png') }}"
                        class="inline h-full max-w-full transition-all duration-200 dark:hidden ease-nav-brand max-h-8"
                        alt="main_logo" />
                    <span class="ml-1 font-semibold transition-all duration-200 ease-nav-brand">Facturas</span>
                </a>
            </div>

            <hr
                class="h-px mt-0 bg-transparent bg-gradient-to-r from-transparent via-black/40 to-transparent dark:bg-gradient-to-r dark:from-transparent dark:via-white dark:to-transparent" />

            <div class="items-center block w-auto max-h-screen overflow-auto h-sidenav grow basis-full">
                <ul class="flex flex-col pl-0 mb-0">

                    <li class="mt-0.5 w-full">
                        <a class="py-2.7 dark:text-white dark:opacity-80 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap rounded-lg px-4 font-semibold text-slate-700 transition-colors"
                            href=" {{ route('posts.index', auth()->user()->username) }} ">
                            <div
                                class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                                <i class="relative top-0 text-sm leading-normal text-blue-500 ni ni-tv-2"></i>
                            </div>
                            <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Dashboard</span>
                        </a>
                    </li>

                    <li class="mt-0.5 w-full">
                        <a class=" dark:text-white dark:opacity-80 py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors"
                            href=" {{ route('emisora.listado', auth()->user()->username) }} ">
                            <div
                                class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                                <i class="relative top-0 text-sm leading-normal text-orange-500 ni ni-calendar-grid-58"></i>
                            </div>
                            <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Empresa Emisora</span>
                        </a>
                    </li>

                    <li class="mt-0.5 w-full">
                        <a class=" dark:text-white dark:opacity-80 py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors"
                            href=" {{ route('receptora.listado', auth()->user()->username) }} ">
                            <div
                                class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center fill-current stroke-0 text-center xl:p-2.5">
                                <i class="relative top-0 text-sm leading-normal text-emerald-500 ni ni-credit-card"></i>
                            </div>
                            <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Empresa Receptora</span>
                        </a>
                    </li>

                    <li class="mt-0.5 w-full">
                        <a class=" dark:text-white dark:opacity-80 py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors"
                            href="{{ route('factura.listado', auth()->user()->username) }}">
                            <div
                                class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                                <i class="relative top-0 text-sm leading-normal text-cyan-500 ni ni-app"></i>
                            </div>
                            <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Factura</span>
                        </a>
                    </li>


                    <li class="w-full mt-4">
                        <h6 class="pl-6 ml-2 text-xs font-bold leading-tight uppercase dark:text-white opacity-60">Portal Web</h6>
                    </li>

                    <li class="mt-0.5 w-full">
                        <a class=" dark:text-white dark:opacity-80 py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors"
                            href=" {{ route('home') }} ">
                            <div
                                class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                                <i class="relative top-0 text-sm leading-normal text-orange-500 ni ni-single-copy-04"></i>
                            </div>
                            <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Consultar Factura</span>
                        </a>
                    </li>


                </ul>
            </div>

        </aside>
    @endauth

    <!-- end sidenav -->

    @guest
        <div
            class="absolute bg-y-50 w-full top-0 bg-[url('https://raw.githubusercontent.com/creativetimofficial/public-assets/master/argon-dashboard-pro/assets/img/profile-layout-header.jpg')] min-h-75">
            <span class="absolute top-0 left-0 w-full h-full bg-blue-500 opacity-60"></span>
        </div>
        <main class="relative h-full max-h-screen transition-all duration-200 rounded-xl">
        @endguest

        @auth
            <main class="relative h-full max-h-screen transition-all duration-200 ease-in-out xl:ml-68 rounded-xl">
            @endauth

            <!-- Navbar -->
            <nav class="relative flex flex-wrap items-center justify-between px-0 py-2 mx-6 transition-all ease-in shadow-none duration-250 rounded-2xl lg:flex-nowrap lg:justify-start"
                navbar-main navbar-scroll="false">
                <div class="flex items-center justify-between w-full px-4 py-1 mx-auto flex-wrap-inherit">
                    <nav>
                        <!-- breadcrumb -->
                        <ol class="flex flex-wrap pt-1 mr-12 bg-transparent rounded-lg sm:mr-16">
                            <li class="text-sm leading-normal">
                                @auth
                                    <a class="text-white opacity-50"
                                        href=" {{ route('posts.index', auth()->user()->username) }} ">
                                        Home</a>
                                @endauth

                                @guest
                                    <a class="text-white opacity-50" href=" {{ route('home') }} "> Home</a>
                                @endguest

                            </li>
                            <li class="text-sm pl-2 capitalize leading-normal text-white before:float-left before:pr-2 before:text-white before:content-['/']"
                                aria-current="page">@yield('titulo')</li>
                        </ol>
                        <h4 class="mb-0 font-bold text-white capitalize"> @yield('titulo') </h4>
                    </nav>

                    <div class="flex items-center mt-2 grow sm:mt-0 sm:mr-6 md:mr-0 lg:flex lg:basis-auto">
                        <div class="flex items-center md:ml-auto md:pr-4">
                            <div class="relative flex flex-wrap items-stretch w-full transition-all rounded-lg ease">


                            </div>
                        </div>
                        <ul class="flex flex-row justify-end pl-0 mb-0 list-none md-max:w-full">

                            @auth
                                <li class="flex items-center">
                                    <a href=" {{ route('posts.index', auth()->user()->username) }} "
                                        class="block px-0 py-2 text-sm font-semibold text-white transition-all ease-nav-brand">
                                        <i class="fa fa-user sm:mr-1"></i>
                                        <span class="hidden sm:inline p-2"> {{ auth()->user()->username }} </span>
                                    </a>
                                </li>

                                <li class="flex items-center">
                                    <a href="{{ route('logout') }}"
                                        class="block px-0 py-2 text-sm font-semibold text-white transition-all ease-nav-brand">
                                        <span class="hidden sm:inline"> Cerrar Sesión </span>
                                    </a>
                                </li>
                            @endauth

                            @guest
                                <li class="flex items-center">
                                    <a href="{{ route('login') }}"
                                        class="block px-0 py-2 text-sm font-semibold text-white transition-all ease-nav-brand">
                                        <i class="fa fa-user sm:mr-1"></i>
                                        <span class="hidden sm:inline"> Iniciar Sesión</span>
                                    </a>
                                </li>
                            @endguest

                            <li class="flex items-center pl-4 xl:hidden">
                                <a href="javascript:;"
                                    class="block p-0 text-sm text-white transition-all ease-nav-brand" sidenav-trigger>
                                    <div class="w-4.5 overflow-hidden">
                                        <i
                                            class="ease mb-0.75 relative block h-0.5 rounded-sm bg-white transition-all"></i>
                                        <i
                                            class="ease mb-0.75 relative block h-0.5 rounded-sm bg-white transition-all"></i>
                                        <i class="ease relative block h-0.5 rounded-sm bg-white transition-all"></i>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- end Navbar -->

            @yield('contenido')
        </main>

        
</body>

</html>
