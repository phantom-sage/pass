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
        <section class="my-5">
            <div class="container mx-auto">
                <div x-data="{ open: false }" class="relative inline-block text-left">
                    <div>
                        <span class="rounded-md shadow-sm">
                          <button @click="open = true" type="button" class="inline-flex justify-center w-full rounded-md border border-gray-300 px-4 py-2 bg-white text-sm leading-5 font-medium text-gray-700 hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue active:bg-gray-50 active:text-gray-800 transition ease-in-out duration-150" id="options-menu" aria-haspopup="true" aria-expanded="true">
                            Language
                              <!-- Heroicon name: chevron-down -->
                            <svg class="-mr-1 ml-2 h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                              <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                          </button>
                        </span>
                    </div>
                    <div x-show="open" @click.away="open = false" class="origin-top-right absolute right-0 mt-2 w-56 rounded-md shadow-lg">
                        <div class="rounded-md bg-white shadow-xs">
                            <div class="py-1" role="menu" aria-orientation="vertical" aria-labelledby="options-menu">
                                <a href="{{ route('set-locale', ['locale' => 'ar']) }}" class="block px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 hover:text-gray-900 focus:outline-none focus:bg-gray-100 focus:text-gray-900" role="menuitem">AR</a>
                                <a href="{{ route('set-locale', ['locale' => 'en']) }}" class="block px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 hover:text-gray-900 focus:outline-none focus:bg-gray-100 focus:text-gray-900" role="menuitem">EN</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
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
                        <div @if(app()->getLocale() === 'ar') style="direction: rtl;" @endif class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                            <x-jet-nav-link href="{{ route('home',app()->getLocale()) }}" :active="request()->routeIs('/',app()->getLocale())">
                                {{ __('navbarlayout.home') }}
{{--                        <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">--}}
{{--                            <x-jet-nav-link href="{{ route('home',app()->getLocale()) }}" :active="request()->routeIs('/')">--}}
{{--                                {{ __('Home') }}--}}
                            </x-jet-nav-link>
                            <x-jet-nav-link href="{{ route('projects',app()->getLocale()) }}" :active="request()->routeIs('/',app()->getLocale())">
                                {{ __('navbarlayout.projects') }}
                            </x-jet-nav-link>
                            <x-jet-nav-link href="{{ route('story',app()->getLocale()) }}" :active="request()->routeIs('/',app()->getLocale())">
                                {{ __('navbarlayout.stories') }}
                            </x-jet-nav-link>
                            <x-jet-nav-link href="{{ route('news',app()->getLocale()) }}" :active="request()->routeIs('/',app()->getLocale())">
                                {{ __('navbarlayout.news') }}
                            </x-jet-nav-link>
                            <x-jet-nav-link href="{{ route('files',app()->getLocale()) }}" :active="request()->routeIs('/',app()->getLocale())">
                                {{ __('navbarlayout.reports') }}
                            </x-jet-nav-link>
                            <x-jet-nav-link href="{{ route('contacts',app()->getLocale()) }}" :active="request()->routeIs('/',app()->getLocale())">
                                {{ __('navbarlayout.about') }}
                            </x-jet-nav-link>

                            <div class="hidden sm:flex sm:items-center sm:ml-6">
                                <x-jet-dropdown align="right" width="48">
                                    <x-slot name="trigger">
                                        <button class="flex text-sm border-2 border-transparent rounded focus:outline-none focus:border-gray-300 transition duration-150 ease-in-out">
                                            Language
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" class="w-3 h-3 text-gray-700 ml-1 mt-1">
                                                <polygon points="9 16.172 2.929 10.101 1.515 11.515 10 20 10.707 19.293 18.485 11.515 17.071 10.101 11 16.172 11 0 9 0"/>
                                            </svg>
                                        </button>
                                    </x-slot>

                                    <x-slot name="content">
                                        <!-- More links -->
                                        <div class="block px-4 py-2 text-xs text-gray-400">
                                            Language
                                        </div>

                                        <x-jet-dropdown-link href="{{ route('set-locale', ['locale' => 'ar']) }}">
                                            AR
                                        </x-jet-dropdown-link>
                                        <x-jet-dropdown-link href="{{ route('set-locale', ['locale' => 'en']) }}">
                                            EN
                                        </x-jet-dropdown-link>
                                    </x-slot>
                                </x-jet-dropdown>
                            </div>

                            <div class="hidden sm:flex sm:items-center sm:ml-6">
                                <x-jet-dropdown align="right" width="48">
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

                                        <x-jet-dropdown-link href="{{ route('partners',app()->getLocale()) }}">
                                            {{ __('navbarlayout.partenership') }}
                                        </x-jet-dropdown-link>
                                        <x-jet-dropdown-link href="{{ route('volunteers',app()->getLocale()) }}">
                                            {{ __('navbarlayout.volunteer') }}
                                        </x-jet-dropdown-link>

                                        <div class="border-t border-gray-100"></div>
                                        @if (Route::has('login'))
                                            @auth
{{--                                                <x-jet-dropdown-link href="/dashboard">--}}
{{--                                                    {{ __('Dashboard') }}--}}
{{--                                                </x-jet-dropdown-link>--}}
                                            @else
                                                <x-jet-dropdown-link href="/login">
                                                    {{ __('navbarlayout.login') }}
                                                </x-jet-dropdown-link>

                                                @if (Route::has('register'))
                                                    <x-jet-dropdown-link href="/register">
                                                        {{ __('navbarlayout.register') }}
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
                <div @if(app()->getLocale() === 'ar') style="direction: rtl;" @endif class="pt-2 pb-3 space-y-1">
                    <x-jet-responsive-nav-link href="/" :active="request()->routeIs('/',app()->getLocale())">
                        {{ __('navbarlayout.home') }}
                    </x-jet-responsive-nav-link>
                    <x-jet-responsive-nav-link href="{{ route('projects',app()->getLocale()) }}" :active="request()->routeIs('/',app()->getLocale())">
                        {{ __('navbarlayout.projects') }}
                    </x-jet-responsive-nav-link>
                    <x-jet-responsive-nav-link href="{{ route('story',app()->getLocale()) }}" :active="request()->routeIs('/',app()->getLocale())">
                        {{ __('navbarlayout.stories') }}
                    </x-jet-responsive-nav-link>
                    <x-jet-responsive-nav-link href="{{ route('news',app()->getLocale()) }}" :active="request()->routeIs('/',app()->getLocale())">
                        {{ __('navbarlayout.news') }}
                    </x-jet-responsive-nav-link>
                    <x-jet-responsive-nav-link href="{{ route('files',app()->getLocale()) }}" :active="request()->routeIs('/',app()->getLocale())">
                        {{ __('navbarlayout.reports') }}
                    </x-jet-responsive-nav-link>
                    <x-jet-responsive-nav-link href="{{ route('contacts',app()->getLocale()) }}" :active="request()->routeIs('/',app()->getLocale())">
                        {{ __('navbarlayout.about') }}
                    </x-jet-responsive-nav-link>
                    <x-jet-responsive-nav-link href="{{ route('volunteers',app()->getLocale()) }}" :active="request()->routeIs('/',app()->getLocale())">
                        {{ __('navbarlayout.volunteer') }}
                    </x-jet-responsive-nav-link>
                    <x-jet-responsive-nav-link href="{{ route('partners',app()->getLocale()) }}" :active="request()->routeIs('/',app()->getLocale())">
                        {{ __('navbarlayout.partenership') }}
                    </x-jet-responsive-nav-link>
                    <x-jet-responsive-nav-link href="/register" :active="request()->routeIs('/register')">
                        {{ __('navbarlayout.register') }}
                    </x-jet-responsive-nav-link>
                    <x-jet-responsive-nav-link href="/login" :active="request()->routeIs('/login')">
                        {{ __('navbarlayout.login') }}
                    </x-jet-responsive-nav-link>
                    <x-jet-responsive-nav-link href="{{ route('set-locale', ['locale' => 'ar']) }}">
                        AR
                    </x-jet-responsive-nav-link>
                    <x-jet-responsive-nav-link href="{{ route('set-locale', ['locale' => 'en']) }}">
                        EN
                    </x-jet-responsive-nav-link>
                </div>
                @if(app()->getLocale() === 'ar') <div class="clearfix"></div> @endif

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
