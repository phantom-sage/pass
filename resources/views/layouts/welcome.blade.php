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
        <!-- logo -->
        <section class="shadow-md">
            <div class="container mx-auto mb-5">
                <div class="flex flex-wrap">
                    <div class="w-full sm:w-6/12"><img src="{{ asset('img/pass_logo.jpg') }}" class="block w-auto h-64" alt="pass logo" /></div>
                    <div class="w-full sm:w-6/12 hidden md:block lg:block xl:block"><img src="{{ asset('img/header_bg.png') }}" class="block w-auto h-64" alt="header background" /></div>
                </div>
            </div>
        </section>
        <!-- top nav -->
        <div class="container mx-auto">
            <div class="flex flex-wrap mx-1">
                <div class="w-3/12"></div>
                <div class="w-full md:w-9/12">
                    <div class="flex flex-wrap">
                        <div class="w-6/12 md:w-3/12">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" class="h-3 w-3 text-gray-500 inline">
                                <path d="M20 18.35V19a1 1 0 0 1-1 1h-2A17 17 0 0 1 0 3V1a1 1 0 0 1 1-1h4a1 1 0 0 1 1 1v4c0 .56-.31 1.31-.7 1.7L3.16 8.84c1.52 3.6 4.4 6.48 8 8l2.12-2.12c.4-.4 1.15-.71 1.7-.71H19a1 1 0 0 1 .99 1v3.35z"/>
                            </svg>
                            <span>0123456789</span>
                        </div>
                        <div class="w-6/12 md:w-3/12">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" class="h-3 w-3 text-gray-500 inline">
                                <path d="M18 2a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4c0-1.1.9-2 2-2h16zm-4.37 9.1L20 16v-2l-5.12-3.9L20 6V4l-10 8L0 4v2l5.12 4.1L0 14v2l6.37-4.9L10 14l3.63-2.9z"/>
                            </svg>
                            <span>email@email.com</span>
                        </div>
                        <div class="w-full mt-3 sm:mt-0 md:mt-0 lg:mt-0 xl:mt-0 md:w-6/12">
                            <div class="flex flex-wrap">
                                <div class="w-3/12 md:w-2/12">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="h-6 w-6 text-gray-500 inline">
                                        <path d="M12 0c-6.627 0-12 5.373-12 12s5.373 12 12 12 12-5.373 12-12-5.373-12-12-12zm6.066 9.645c.183 4.04-2.83 8.544-8.164 8.544-1.622 0-3.131-.476-4.402-1.291 1.524.18 3.045-.244 4.252-1.189-1.256-.023-2.317-.854-2.684-1.995.451.086.895.061 1.298-.049-1.381-.278-2.335-1.522-2.304-2.853.388.215.83.344 1.301.359-1.279-.855-1.641-2.544-.889-3.835 1.416 1.738 3.533 2.881 5.92 3.001-.419-1.796.944-3.527 2.799-3.527.825 0 1.572.349 2.096.907.654-.128 1.27-.368 1.824-.697-.215.671-.67 1.233-1.263 1.589.581-.07 1.135-.224 1.649-.453-.384.578-.87 1.084-1.433 1.489z"/>
                                    </svg>
                                </div>
                                <div class="w-3/12 md:w-2/12">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="h-6 w-6 text-gray-500 inline">
                                        <path d="M22.675 0h-21.35c-.732 0-1.325.593-1.325 1.325v21.351c0 .731.593 1.324 1.325 1.324h11.495v-9.294h-3.128v-3.622h3.128v-2.671c0-3.1 1.893-4.788 4.659-4.788 1.325 0 2.463.099 2.795.143v3.24l-1.918.001c-1.504 0-1.795.715-1.795 1.763v2.313h3.587l-.467 3.622h-3.12v9.293h6.116c.73 0 1.323-.593 1.323-1.325v-21.35c0-.732-.593-1.325-1.325-1.325z"/>
                                    </svg>
                                </div>
                                <div class="w-3/12 md:w-4/12">
                                    <a class="text-blue-600 font-semibold text-xl" href="/login">
                                        {{ __('navbarlayout.login') }}
                                    </a>
                                </div>
                                <div class="w-3/12 md:w-4/12">
                                    <form id="localeForm" action="{{ route('set-locale') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <select class="border rounded-full @if(app()->getLocale() === 'en') p-1 @endif text-blue-600 shadow-sm" onchange="document.querySelector('#localeForm').submit();" name="locale">
                                            <option value="ar" @if(app()->getLocale() === 'ar') selected @endif>{{ __('navbarlayout.ar') }}</option>
                                            <option value="en" @if(app()->getLocale() === 'en') selected @endif>{{ __('navbarlayout.en') }}</option>
                                        </select>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <nav @if(app()->getLocale() === 'ar') style="direction: rtl;" @endif x-data="{ open: false }" class="overflow-x-auto overflow-y-hidden bg-white border-b border-gray-100 @if(app()->getLocale() === 'ar') cairo-font @endif">
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
