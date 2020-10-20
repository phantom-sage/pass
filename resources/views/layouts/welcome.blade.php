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
    <body @if(app()->getLocale() === 'ar') style="direction: rtl;" @endif class="font-sans antialiased @if(app()->getLocale() === 'ar') cairo-font @endif">
       @yield('upper-header')
        <nav @if(app()->getLocale() === 'ar') style="direction: rtl;" @endif x-data="{ open: false }" class="overflow-x-auto overflow-y-hidden bg-white mt-3 border-b border-gray-100 @if(app()->getLocale() === 'ar') cairo-font @endif">
            <!-- Primary Navigation Menu -->
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-16">
                    <div class="flex text-center mx-auto">
                        <!-- Navigation Links -->
                        <div class="w-full hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
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
                            <x-jet-nav-link href="{{ route('contacts',app()->getLocale()) }}" :active="request()->routeIs('contacts',app()->getLocale())">
                                {{ __('navbarlayout.contactus') }}
                            </x-jet-nav-link>
                            <x-jet-nav-link href="{{ route('volunteers',app()->getLocale()) }}" :active="request()->routeIs('volunteers',app()->getLocale())">
                                {{ __('navbarlayout.volunteer') }}
                            </x-jet-nav-link>
                            <x-jet-nav-link href="{{ route('partners',app()->getLocale()) }}" :active="request()->routeIs('partners',app()->getLocale())">
                                {{ __('navbarlayout.partenership') }}
                            </x-jet-nav-link>
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
                        {{ __('navbarlayout.contactus') }}
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

        <div class="my-3 bg-blue-700 py-3 w-full h-6"></div>

        <!-- Page Heading -->
        @yield('page_header')

        <!-- Page Content -->
        <main>
            @yield('content')
        </main>

        <!-- page footer -->
        <div class="container mx-auto"><hr class="my-3"></div>
        <footer class="py-3 bg-blue-700 text-gray-300 text-xl text-center">
            <h4 class="font-semibold">
                {{ __('welcomepage.poweredby') }}
            </h4>
            <p>{{ __('welcomepage.copyrights') }}</p>
        </footer>

        @stack('modals')

        @livewireScripts
    </body>
</html>
