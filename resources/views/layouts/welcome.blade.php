<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">

        @if(app()->getLocale() === 'ar')
        <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@700&display=swap" rel="stylesheet">
        @endif

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        @livewireStyles

        <!-- Scripts -->
        <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.6.0/dist/alpine.js" defer></script>
        <script src="{{ asset('js/app.js') }}"></script>
    </head>
    <body class="font-sans antialiased">
        <!-- top nav -->
        @livewire('top-nav')
        <nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
            <!-- Primary Navigation Menu -->
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-16">
                    <div class="flex">
                        <!-- Logo -->
                        <div class="flex-shrink-0 flex items-center">
                            <a href="{{ route('home',app()->getLocale()) }}">
                                <x-jet-application-mark class="block h-9 w-auto" />
                            </a>
                        </div>

                        <!-- Navigation Links -->
                        <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                            <x-jet-nav-link href="{{ route('home',app()->getLocale()) }}" :active="request()->routeIs('/')">
                                {{ __('Home') }}
                            </x-jet-nav-link>
                            <x-jet-nav-link href="{{ route('projects',app()->getLocale()) }}" :active="request()->routeIs('/')">
                                {{ __('Projects') }}
                            </x-jet-nav-link>
                            <x-jet-nav-link href="{{ route('story',app()->getLocale()) }}" :active="request()->routeIs('/',app()->getLocale())">
                                {{ __('Stories') }}
                            </x-jet-nav-link>
                            <x-jet-nav-link href="{{ route('news',app()->getLocale()) }}" :active="request()->routeIs('/',app()->getLocale())">
                                {{ __('News') }}
                            </x-jet-nav-link>
                            <x-jet-nav-link href="{{ route('files',app()->getLocale()) }}" :active="request()->routeIs('/',app()->getLocale())">
                                Reports
                            </x-jet-nav-link>
                            <x-jet-nav-link href="{{ route('contacts',app()->getLocale()) }}" :active="request()->routeIs('/',app()->getLocale())">
                                {{ __('About') }}
                            </x-jet-nav-link>
                            <div class="hidden sm:flex sm:items-center sm:ml-6">
                                <x-jet-dropdown align="right" width="48">
                                    <x-slot name="trigger">
                                        <button class="flex text-sm border-2 border-transparent rounded focus:outline-none focus:border-gray-300 transition duration-150 ease-in-out">
                                            More
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" class="w-3 h-3 text-gray-700 ml-1 mt-1">
                                                <polygon points="9 16.172 2.929 10.101 1.515 11.515 10 20 10.707 19.293 18.485 11.515 17.071 10.101 11 16.172 11 0 9 0"/>
                                            </svg>
                                        </button>
                                    </x-slot>

                                    <x-slot name="content">
                                        <!-- More links -->
                                        <div class="block px-4 py-2 text-xs text-gray-400">
                                            More links
                                        </div>

                                        <x-jet-dropdown-link href="{{ route('partners',app()->getLocale()) }}">
                                            {{ __('Partenership') }}
                                        </x-jet-dropdown-link>
                                        <x-jet-dropdown-link href="{{ route('volunteers',app()->getLocale() ) }}">
                                            {{ __('Volunteer') }}
                                        </x-jet-dropdown-link>

                                        <div class="border-t border-gray-100"></div>
                                        @if (Route::has('login'))
                                            @auth
                                                <x-jet-dropdown-link href="/dashboard">
                                                    {{ __('Dashboard') }}
                                                </x-jet-dropdown-link>
                                            @else
                                                <x-jet-dropdown-link href="/login">
                                                    {{ __('Login') }}
                                                </x-jet-dropdown-link>

                                                @if (Route::has('register'))
                                                    <x-jet-dropdown-link href="/register">
                                                        {{ __('Register') }}
                                                    </x-jet-dropdown-link>
                                                @endif
                                            @endif
                                        @endif
                                    </x-slot>
                                </x-jet-dropdown>
                            </div>
                        </div>
                    </div>

                    <!-- Hamburger -->
                    <div class="-mr-2 flex items-center sm:hidden">
                        <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                            <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                                <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Responsive Navigation Menu -->
            <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
                <div class="pt-2 pb-3 space-y-1">
                    <x-jet-responsive-nav-link href="/" :active="request()->routeIs('/')">
                        {{ __('Home') }}
                    </x-jet-responsive-nav-link>
                    <x-jet-responsive-nav-link href="{{ route('projects',app()->getLocale()) }}" :active="request()->routeIs('/',app()->getLocale())">
                        {{ __('Projects') }}
                    </x-jet-responsive-nav-link>
                    <x-jet-responsive-nav-link href="{{ route('story',app()->getLocale()) }}" :active="request()->routeIs('/',app()->getLocale())">
                        {{ __('Stories') }}
                    </x-jet-responsive-nav-link>
                    <x-jet-responsive-nav-link href="{{ route('news',app()->getLocale()) }}" :active="request()->routeIs('/',app()->getLocale())">
                        {{ __('News') }}
                    </x-jet-responsive-nav-link>
                    <x-jet-responsive-nav-link href="{{ route('files',app()->getLocale()) }}" :active="request()->routeIs('/',app()->getLocale())">
                        Reports
                    </x-jet-responsive-nav-link>
                    <x-jet-responsive-nav-link href="{{ route('contacts',app()->getLocale()) }}" :active="request()->routeIs('/',app()->getLocale())">
                        {{ __('About') }}
                    </x-jet-responsive-nav-link>
                    <x-jet-responsive-nav-link href="{{ route('volunteers',app()->getLocale()) }}" :active="request()->routeIs('/',app()->getLocale())">
                        {{ __('Volunteer') }}
                    </x-jet-responsive-nav-link>
                    <x-jet-responsive-nav-link href="{{ route('partners',app()->getLocale()) }}" :active="request()->routeIs('/',app()->getLocale())">
                        {{ __('Partenership') }}
                    </x-jet-responsive-nav-link>
                    <x-jet-responsive-nav-link href="/register" :active="request()->routeIs('/register')">
                        {{ __('Register') }}
                    </x-jet-responsive-nav-link>
                    <x-jet-responsive-nav-link href="/login" :active="request()->routeIs('/login')">
                        {{ __('Login') }}
                    </x-jet-responsive-nav-link>
                </div>

            </div>
        </nav>

        <!-- Page Heading -->
        @yield('page_header')

        <!-- Page Content -->
        <main>
            @yield('content')
        </main>

        @stack('modals')

        @livewireScripts
    </body>
</html>
