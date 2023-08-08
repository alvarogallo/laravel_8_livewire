<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    
    <!-- Styles -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    <style type="text/css">
        .dropdown:hover .dropdown-menu {
          display: block;
        }        
    </style>
    <link rel="stylesheet" type="text/css" href="/css/menu.css">
</head>
<body class="bg-gray-100 h-screen antialiased leading-none font-sans">
    <div id="app">
    <header class="h-20 bg-white">
        <nav class="relative px-2 py-4">
        <div class="container mx-auto flex justify-between items-center">
            <img src="https://avrasys.hu/logoipsum-logo-54.svg" alt="Tailwindcss Navigation">
            <ul class="hidden md:flex space-x-6">
                <li><a href="#">Home</a></li>
                <li><a href="#">News</a></li>
                <li class="flex relative group">
                    <a href="#" class="mr-1">Services</a> 
                    <i class="fa-solid fa-chevron-down fa-2xs pt-3"></i>
                    <!-- Submenu starts -->
                    <ul class="absolute bg-white p-3 w-52 top-6 transform scale-0 group-hover:scale-100 transition duration-150 ease-in-out origin-top shadow-lg">
                        <li class="text-sm hover:bg-slate-100 leading-8"><a href="#">Webdesign</a></li>
                        <li class="text-sm hover:bg-slate-100 leading-8"><a href="#">Digital marketing</a></li>
                        <li class="text-sm hover:bg-slate-100 leading-8"><a href="#">SEO</a></li>
                        <li class="text-sm hover:bg-slate-100 leading-8"><a href="#">Ad campaigns</a></li>
                        <li class="text-sm hover:bg-slate-100 leading-8"><a href="#">UX Design</a></li>
                    </ul>
                <!-- Submenu ends -->
                </li>
                <li><a href="#">About</a></li>
                <li><a href="#">Contact</a></li>
            </ul>
            <ul class="hidden md:flex space-x-6">
                @guest
                    <a href="#" class="bg-red-400 px-5 py-1 rounded-3xl hover:bg-red-500 text-white hidden md:flex" role="button">{{ __('Login') }}</a>
                @else
                    <li class="flex relative group">
                        <span>{{ Auth::user()->name }}</span> 
                        <ul class="absolute bg-white p-3 w-52 top-6 transform scale-0 group-hover:scale-100 transition duration-150 ease-in-out origin-top shadow-lg">
                            <li class="text-sm hover:bg-slate-100 leading-8"><a href="#">Yo</a></li>
                            <li class="text-sm hover:bg-slate-100 leading-8"><a href="#">MiCuenta</a></li>
                            <li class="text-sm hover:bg-slate-100 leading-8">
                                <a href="{{ route('logout') }}" class="no-underline hover:underline" onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                                    {{ csrf_field() }}
                                </form>                                
                            </li>
                        </ul>                    
                    </li>          
                @endguest
            </ul>

        
            <!-- Mobile menu icon -->
            <button id="mobile-icon" class="md:hidden"><i onclick="changeIcon(this)" class="fa-solid fa-bars"></i></button>
        </div>
        <!-- Mobile menu -->
        <div class="md:hidden flex justify-center mt-3 w-full">
            <div id="mobile-menu" class="mobile-menu absolute top-23 w-full"> <!-- add hidden here later -->
                <ul class="bg-gray-100 shadow-lg leading-9 font-bold h-screen">
                    <li class="border-b-2 border-white hover:bg-red-400 hover:text-white pl-4"><a href="https://google.com" class="block pl-7">Home</a></li>
                    <li class="border-b-2 border-white hover:bg-red-400 hover:text-white pl-4"><a href="#" class="block pl-7">News</a></li>
                    <li class="border-b-2 border-white hover:bg-red-400 hover:text-white">
                        <a href="#" class="block pl-11">Services <i class="fa-solid fa-chevron-down fa-2xs pt-4"></i></a> 
                        <!-- Submenu starts -->
                        <ul class="bg-white text-gray-800 w-full">
                            <li class="text-sm leading-8 font-normal hover:bg-slate-200"><a class="block pl-16" href="#">Webdesign</a></li>
                            <li class="text-sm leading-8 font-normal hover:bg-slate-200"><a class="block pl-16" href="#">Digital marketing</a></li>
                            <li class="text-sm leading-8 font-normal hover:bg-slate-200"><a class="block pl-16" href="#">SEO</a></li>
                            <li class="text-sm leading-8 font-normal hover:bg-slate-200"><a class="block pl-16" href="#">Ad campaigns</a></li>
                            <li class="text-sm leading-8 font-normal hover:bg-slate-200"><a class="block pl-16" href="#">UX Design</a></li>
                        </ul>
                        <!-- Submenu ends -->
                    </li>
                    <li class="border-b-2 border-white hover:bg-red-400 hover:text-white pl-4"><a href="#" class="block pl-7">About</a></li>
                    <li class="border-b-2 border-white hover:bg-red-400 hover:text-white pl-4"><a href="#" class="block pl-7">Contact</a></li>
                </ul>
            </div>
        </div>
        </nav>
    </header>
        @yield('content')
    </div>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2/dist/alpine.min.js" defer></script>
    <script src="/js/menu.js"></script>
</body>    
</body>
</html>
