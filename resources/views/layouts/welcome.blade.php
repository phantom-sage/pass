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
        <nav @if(app()->getLocale() === 'ar') style="direction: rtl;" @endif x-data="{ open: false }" class="bg-white border-b border-gray-100">
            <!-- Primary Navigation Menu -->
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-16">
                    <div class="flex">
                        <!-- Logo -->
                        <div class="flex-shrink-0 flex items-center">
                            <a href="{{ route('home', app()->getLocale()) }}">
                                <img src="{{ asset('img/pass_logo.png') }}" class="block h-9 w-auto" alt="pass logo" />
                            </a>
                        </div>

                        <!-- Navigation Links -->
                        <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                            <x-jet-nav-link href="{{ route('home',app()->getLocale()) }}" :active="request()->routeIs('home',app()->getLocale())">
                                {{ __('navbarlayout.home') }}
                            </x-jet-nav-link>
                            <x-jet-nav-link href="{{ route('projects',app()->getLocale()) }}" :active="request()->routeIs('projects', app()->getLocale())">
                                {{ __('navbarlayout.projects') }}
                            </x-jet-nav-link>
                            <x-jet-nav-link href="{{ route('story',app()->getLocale()) }}" :active="request()->routeIs('story',app()->getLocale())">
                                {{ __('navbarlayout.stories') }}
                            </x-jet-nav-link>
                            <x-jet-nav-link href="{{ route('news',app()->getLocale()) }}" :active="request()->routeIs('news',app()->getLocale())">
                                {{ __('navbarlayout.news') }}
                            </x-jet-nav-link>
                            <x-jet-nav-link href="{{ route('files',app()->getLocale()) }}" :active="request()->routeIs('files',app()->getLocale())">
                                {{ __('navbarlayout.reports') }}
                            </x-jet-nav-link>
                            <!-- language dropdown links -->
                            <div class="hidden sm:flex sm:items-center sm:ml-6">
                            <x-jet-dropdown align="right" width="48">
                                <x-slot name="trigger">
                                    <button class="flex text-sm border-2 border-transparent rounded focus:outline-none focus:border-gray-300 transition duration-150 ease-in-out">
                                        {{ __('navbarlayout.language') }}
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" class="w-3 h-3 text-gray-700 ml-1 mt-1">
                                            <polygon points="9 16.172 2.929 10.101 1.515 11.515 10 20 10.707 19.293 18.485 11.515 17.071 10.101 11 16.172 11 0 9 0"/>
                                        </svg>
                                    </button>
                                </x-slot>

                                <x-slot name="content">
                                    <!-- More links -->
                                    <div class="block px-4 py-2 text-xs text-gray-400">
                                        {{ __('navbarlayout.language') }}
                                    </div>

                                    <x-jet-dropdown-link href="{{ route('set-locale', ['locale' => 'ar']) }}">
                                        {{ __('navbarlayout.ar') }}
                                    </x-jet-dropdown-link>
                                    <x-jet-dropdown-link href="{{ route('set-locale', ['locale' => 'en']) }}">
                                        {{ __('navbarlayout.en') }}
                                    </x-jet-dropdown-link>
                                </x-slot>
                            </x-jet-dropdown>
                            </div>
                            <!-- more links -->
                            <div class="hidden sm:flex sm:items-center sm:ml-6">
                            <x-jet-dropdown align="right" width="48">--}}
                                <x-slot name="trigger">
                                    <button class="flex text-sm border-2 border-transparent rounded focus:outline-none focus:border-gray-300 transition duration-150 ease-in-out">
                                        {{ __('navbarlayout.more') }}
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" class="w-3 h-3 text-gray-700 ml-1 mt-1">
                                            <polygon points="9 16.172 2.929 10.101 1.515 11.515 10 20 10.707 19.293 18.485 11.515 17.071 10.101 11 16.172 11 0 9 0"/>
                                        </svg>
                                    </button>
                                </x-slot>

                                <x-slot name="content">
                                    <!-- More links -->
                                    <div class="block px-4 py-2 text-xs text-gray-400">
                                        {{ __('navbarlayout.morelinks') }}
                                    </div>

                                    <x-jet-dropdown-link href="{{ route('contacts',app()->getLocale()) }}">
                                        {{ __('navbarlayout.about') }}
                                    </x-jet-dropdown-link>
                                    <x-jet-dropdown-link href="{{ route('partners',app()->getLocale()) }}">
                                        {{ __('navbarlayout.partenership') }}
                                    </x-jet-dropdown-link>
                                    <x-jet-dropdown-link href="{{ route('volunteers',app()->getLocale()) }}">
                                        {{ __('navbarlayout.volunteer') }}
                                    </x-jet-dropdown-link>

                                    @auth
                                        <x-jet-dropdown-link href="{{ route('volunteers',app()->getLocale()) }}">
                                            {{ __('navbarlayout.dashboard') }}
                                        </x-jet-dropdown-link>
                                        <hr>
                                        <form method="POST" action="{{ route('logout') }}">
                                            @csrf

                                            <x-jet-responsive-nav-link href="{{ route('logout') }}"
                                                                       onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                                {{ __('Logout') }}
                                            </x-jet-responsive-nav-link>
                                        </form>
                                    @endauth

                                    @guest
                                        <x-jet-dropdown-link href="/login">
                                            {{ __('navbarlayout.login') }}
                                        </x-jet-dropdown-link>
                                        <x-jet-dropdown-link href="/register">
                                            {{ __('navbarlayout.register') }}
                                        </x-jet-dropdown-link>
                                    @endguest

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
                    <x-jet-responsive-nav-link href="{{ route('home',app()->getLocale()) }}" :active="request()->routeIs('profile.show')">
                        {{ __('navbarlayout.home') }}
                    </x-jet-responsive-nav-link>
                    <x-jet-responsive-nav-link href="{{ route('projects',app()->getLocale()) }}">
                        {{ __('navbarlayout.projects') }}
                    </x-jet-responsive-nav-link>
                    <x-jet-responsive-nav-link href="{{ route('story',app()->getLocale()) }}">
                        {{ __('navbarlayout.stories') }}
                    </x-jet-responsive-nav-link>
                    <x-jet-responsive-nav-link href="{{ route('news',app()->getLocale()) }}">
                        {{ __('navbarlayout.news') }}
                    </x-jet-responsive-nav-link>
                    <x-jet-responsive-nav-link href="{{ route('files',app()->getLocale()) }}">
                        {{ __('navbarlayout.reports') }}
                    </x-jet-responsive-nav-link>
                    <x-jet-responsive-nav-link href="{{ route('contacts',app()->getLocale()) }}">
                        {{ __('navbarlayout.about') }}
                    </x-jet-responsive-nav-link>
                </div>

                <!-- Responsive Languages links -->
                <div class="pt-4 pb-1 border-t border-gray-700">
                    <div class="mt-3 space-y-1">
                        <x-jet-responsive-nav-link href="{{ route('set-locale', ['locale' => 'ar']) }}">
                            {{ __('navbarlayout.ar') }}
                        </x-jet-responsive-nav-link>
                        <x-jet-responsive-nav-link href="{{ route('set-locale', ['locale' => 'en']) }}">
                            {{ __('navbarlayout.en') }}
                        </x-jet-responsive-nav-link>
                    </div>
                </div>


                <!-- Responsive authentication links -->
                <div class="pt-4 pb-1 border-t border-gray-700">
                    <div class="mt-3 space-y-1">
                        @if(\Illuminate\Support\Facades\Auth::user())
                            <x-jet-responsive-nav-link href="/dashboard">
                                {{ __('Dashboard') }}
                            </x-jet-responsive-nav-link>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <x-jet-dropdown-link href="{{ route('logout') }}"
                                                     onclick="event.preventDefault();
                                                            this.closest('form').submit();">
                                    {{ __('Logout') }}
                                </x-jet-dropdown-link>
                            </form>
                        @else
                        <x-jet-responsive-nav-link href="{{ route('login') }}">
                            {{ __('navbarlayout.login') }}
                        </x-jet-responsive-nav-link>
                            <x-jet-responsive-nav-link href="{{ route('register') }}">
                                {{ __('navbarlayout.register') }}
                            </x-jet-responsive-nav-link>
                        @endif
                    </div>
                </div>
            </div>
        </nav>


        <!-- Page Heading -->
        @yield('page_header')

        <!-- Page Content -->
        <main>
            @yield('content')
        </main>

        <!-- page footer -->
        <div class="container mx-auto"><hr class="my-3"></div>
        <footer class="py-3">
            <h4 style="direction: @if(app()->getLocale() === 'ar') rtl @else ltr @endif;" class="text-center font-semibold text-gray-900 text-black @if(app()->getLocale() === 'ar') cairo-font @endif">
                {{ __('welcomepage.poweredby') }}
            </h4>@if(app()->getLocale() === 'ar') <div class="clearfix"></div> @endif
        </footer>

        @stack('modals')

        @livewireScripts
    </body>
</html>
