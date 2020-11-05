@extends('layouts.welcome')

@section('upper-header')
    <!-- logo -->
    <section class="shadow-md pb-3 relative">
        <section>
            <div class="container mx-auto mb-5">
                <div class="flex flex-wrap">
                    <div class="w-full sm:w-6/12 mx-auto">
                        <img src="{{ asset('img/pass_logo.svg') }}" class="block mx-auto sm:inline md:inline lg:inline xl:inline w-auto h-64" alt="pass logo" />
                    </div>
                    <div class="w-full sm:w-6/12 hidden md:block lg:block xl:block relative md:mt-0">
                        <div class="flex flex-wrap justify-center items-center my-auto h-full">
                            <div class="w-3/12 md:w-4/12 hidden md:block lg:block xl:block">
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
                                <div class="w-3/12 md:w-4/12" style="z-index: 9999;">
                                    @guest
                                    <a class="text-blue-600 font-semibold text-xl" href="{{ url('/login') }}">
                                        {{ __('navbarlayout.login') }}
                                    </a>
                                    @endguest
                                    @auth
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf

                                        <a href="{{ route('logout') }}" class="text-blue-600 font-semibold text-xl"
                                                             onclick="event.preventDefault();
                                                                    this.closest('form').submit();">
                                            {{ __('Logout') }}
                                        </a>
                                    </form>
                                    @endauth
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('content')
    <!-- hot slider -->
    <div @if(app()->getLocale() === 'ar') style="direction: rtl;" class="cairo-font" @endif>
        <div class="sliderAx h-auto py-5 shadow-lg my-5">
            <div id="slider-1" class="container mx-auto">
                <div class="bg-cover bg-center  h-auto text-white py-24 px-10 object-fill" style="background-image: url(https://images.unsplash.com/photo-1544427920-c49ccfb85579?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1422&q=80)">
                    <div class="md:w-1/2">
                        <p class="font-bold text-sm uppercase">{{ __('welcomepage.hotstory') }}</p>
                        <p class="text-3xl font-bold">Story name{{-- $hot_story->name --}}</p>
                        <p class="text-2xl mb-10 leading-none">Story description{{-- $hot_story->description --}}</p>
                        <a href="#{{--route('story.show',['locale'=>app()->getLocale(),'story'=>$hot_story->id])--}}" class="bg-purple-800 py-4 px-8 text-white font-bold uppercase text-xs rounded hover:bg-gray-200 hover:text-gray-800">
                            {{ __('welcomepage.readmore') }}
                        </a>
                    </div>
                </div> <!-- container -->
                <br>
            </div>

            <div id="slider-2" class="container mx-auto">
                <div class="bg-cover bg-top  h-auto text-white py-24 px-10 object-fill" style="background-image: url(https://images.unsplash.com/photo-1544144433-d50aff500b91?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1350&q=80)">

                    <p class="font-bold text-sm uppercase">{{ __('welcomepage.hotproject') }}</p>
                    <p class="text-3xl font-bold">Project name{{-- $hot_project->name --}}</p>
                    <p class="text-2xl mb-10 leading-none">Project description{{-- $hot_project->description --}}</p>
                    <a href="#{{--route('project.show',['locale'=>app()->getLocale(),'project'=>$hot_project->id])--}}" class="bg-purple-800 py-4 px-8 text-white font-bold uppercase text-xs rounded hover:bg-gray-200 hover:text-gray-800">
                        {{ __('welcomepage.readmore') }}
                    </a>
                </div> <!-- container -->
                <br>
            </div>
        </div>
    </div>

    <!-- current projects -->
    <section @if(app()->getLocale() === 'ar') style="direction: rtl;" @endif class="bg-gradient-to-r from-blue-900 to-blue-400">
        <div class="container mx-auto py-5">
            <h2 class="@if(app()->getLocale() === 'ar') cairo-font @endif uppercase text-xl font-black text-white">{{ __('welcomepage.currentprojects') }}</h2>
            <div class="flex flex-wrap justify-center">
                @foreach($projects as $project)
                    <div class="w-full mx-3 m-3 rounded overflow-hidden shadow-lg relative hover:shadow-2xl transition ease-in-out duration-500 sm:w-full md:w-6/12 lg:w-4/12 xl:w-3/12">
                        <img class="w-full" src="https://images.unsplash.com/photo-1544427920-c49ccfb85579?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1422&q=80" alt="Sunset in the mountains">
                        <div class="px-6 py-4">
                            <div class="font-bold text-xl mb-2 text-white font-bold">Project name{{-- $project->name --}}</div>
                            <p class="text-base text-white">Project description{{-- $project->description --}}</p>
                        </div>
                        <div class="flex flex-wrap">
                            <a class="border border-white px-3 py-2 mb-2 mx-2 rounded text-white transition ease-in-out duration-500 hover:border-white hover:bg-white hover:text-blue-700 font-black" href="{{route('project.show',['locale'=>app()->getLocale(),'project'=>$project->id])}}">
                                {{ __('projectpage.seemore') }}
                            </a>
                        </div>
                        <div class="@if(app()->getLocale() === 'ar') mr-2 @endif mt-2 ml-2 rounded-md bg-blue-400 text-xl font-semibold absolute top-0 p-2">
                            <span>1{{-- $project->id --}}</span>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- news slider -->
    <div @if(app()->getLocale() ==='ar') style="direction: rtl;" @endif>
        <div class="container mx-auto">
            <h2 class="@if(app()->getLocale() === 'ar') cairo-font @endif text-xl font-black pt-5 uppercase">{{ __('welcomepage.currentnews') }}</h2>
        </div>
        <div class="sliderAx h-auto shadow-lg my-5">
            <div id="slider-3" class="container mx-auto">
                <div class="bg-cover bg-center  h-auto text-white py-24 px-10 object-fill" style="background-image: url(https://images.unsplash.com/photo-1544427920-c49ccfb85579?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1422&q=80)">
                    <div class="md:w-1/2">
                        <p class="font-bold text-sm uppercase">{{ __('welcomepage.news') }}</p>
                        <p class="text-3xl font-bold">New name{{-- $first_hot_news->name --}}</p>
                        <p class="text-2xl mb-10 leading-none">new description {{-- $first_hot_news->description --}}</p>
                        <a href="#{{--route('news.show',['locale'=>app()->getLocale(),'news'=>$first_hot_news->id])--}}" class="@if(app()->getLocale() === 'ar') cairo-font @endif bg-purple-800 py-4 px-8 text-white font-bold uppercase text-xs rounded hover:bg-gray-200 hover:text-gray-800">
                            {{ __('welcomepage.readmore') }}
                        </a>
                    </div>
                </div> <!-- container -->
                <br>
            </div>

            <div id="slider-4" class="container mx-auto">
                <div class="bg-cover bg-top h-auto text-white py-24 px-10 object-fill" style="background-image: url(https://images.unsplash.com/photo-1544144433-d50aff500b91?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1350&q=80)">

                    <p class="font-bold text-sm uppercase">{{ __('welcomepage.news') }}</p>
                    <p class="text-3xl font-bold">New name{{-- $second_hot_news->name --}}</p>
                    <p class="text-2xl mb-10 leading-none">New description{{-- $second_hot_news->description --}}</p>
                    <a href="#{{--route('news.show',['locale'=>app()->getLocale(),'news'=>$second_hot_news->id])--}}" class="@if(app()->getLocale() === 'ar') cairo-font @endif bg-purple-800 py-4 px-8 text-white font-bold uppercase text-xs rounded hover:bg-gray-200 hover:text-gray-800">
                        {{ __('welcomepage.readmore') }}
                    </a>
                </div> <!-- container -->
                <br>
            </div>
        </div>
    </div>

    <section class="py-5">
        <div class="container mx-auto">
            <div class="flex flex-wrap justify-center">
                @livewire('who-we-are')
                @livewire('what-we-do')
            </div>
        </div>
    </section>
    <div class="container mx-auto"><hr class="my-3"></div>
    <section @if(app()->getLocale() === 'ar') style="direction: rtl;" @endif class="@if(app()->getLocale() === 'ar') cairo-font @endif py-5">
        <div class="container mx-auto">
            <div class="flex flex-wrap justify-center">
                <button class="px-5 mx-3 bg-blue-500 hover:bg-blue-400 text-white font-bold py-2 px-4 border-b-4 border-blue-700 hover:border-blue-500 rounded">
                    <a href="{{ route('volunteers',app()->getLocale()) }}">
                        {{ __('welcomepage.becomeavolunteer') }}
                    </a>
                </button>
                <button class="px-5 mx-3 bg-blue-500 hover:bg-blue-400 text-white font-bold py-2 px-4 border-b-4 border-blue-700 hover:border-blue-500 rounded">
                    <a href="{{ route('partners',app()->getLocale()) }}">
                        {{ __('welcomepage.beapartner') }}
                    </a>
                </button>
            </div>
        </div>
    </section>

    <!-- forms and bottom links -->
    <section style="background: #24739e;" class="py-4">
        <div class="container mx-auto">

                <!-- form -->
                <form class="w-full">

                    <div class="flex flex-wrap">
                        <!-- first name -->
                        <div class="w-9/12 md:w-6/12 mx-auto">
                            <input type="text" style="background: #3578a3;" class="text-white @error('first_name') border-red-500 focus:outline-none focus:shadow-outline-red focus:border-red-500 @enderror text-white mt-1 form-input block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5" placeholder="{{ __('welcomepage.firstname') }}">
                            <p class="mt-2 text-sm text-red-500">
                                @error('first_name') <span class="error">{{ $message }}</span> @enderror
                            </p>
                        </div>
                        <div class="w-full"></div>
                        <hr style="height: 2px;" class="bg-white w-9/12 md:w-6/12 mx-auto mb-1">
                        <div class="w-full"></div>

                        <!-- last name -->
                        <div class="w-9/12 md:w-6/12 mx-auto">
                            <input type="text" style="background: #3578a3;" class="text-white @error('last_name') border-red-500 focus:outline-none focus:shadow-outline-red focus:border-red-500 @enderror text-white mt-1 form-input block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5" placeholder="{{ __('welcomepage.lastname') }}">
                            <p class="mt-2 text-sm text-red-500">
                                @error('last_name') <span class="error">{{ $message }}</span> @enderror
                            </p>
                        </div>
                        <div class="w-full"></div>
                        <hr style="height: 2px;" class="bg-white w-9/12 md:w-6/12 mx-auto mb-1">
                        <div class="w-full"></div>

                        <!-- Email -->
                        <div class="w-9/12 md:w-6/12 mx-auto">
                            <input type="email" style="background: #3578a3;" class="text-white @error('email') border-red-500 focus:outline-none focus:shadow-outline-red focus:border-red-500 @enderror text-white mt-1 form-input block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5" placeholder="{{ __('welcomepage.email') }}">
                            <p class="mt-2 text-sm text-red-500">
                                @error('email') <span class="error">{{ $message }}</span> @enderror
                            </p>
                        </div>
                        <div class="w-full"></div>
                        <hr style="height: 2px;" class="bg-white w-9/12 md:w-6/12 mx-auto mb-1">
                        <div class="w-full"></div>

                        <!-- Password -->
                        <div class="w-9/12 md:w-6/12 mx-auto">
                            <input type="password" style="background: #3578a3;" class="text-white @error('password') border-red-500 focus:outline-none focus:shadow-outline-red focus:border-red-500 @enderror text-white mt-1 form-input block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5" placeholder="{{ __('welcomepage.password') }}">
                            <p class="mt-2 text-sm text-red-500">
                                @error('password') <span class="error">{{ $message }}</span> @enderror
                            </p>
                        </div>
                        <div class="w-full"></div>

                        <!-- Submit button -->
                        <div class="w-4/12 md:w-2/12 mx-auto">
                            <button type="submit" style="background: #3578a3; color: #105888;" class="mt-1 form-input block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out font-black sm:text-xl sm:leading-5">{{ __('welcomepage.signin') }}</button>
                        </div>

                    </div>

                </form>

                <hr class="my-3 bg-gray-400 mx-auto w-10/12">

                <div class="flex flex-wrap text-white text-center">

                    <div class="w-full sm:w-6/12 md:w-3/12 my-2 sm:my-2 md:my-0"><a class="@if(request()->routeIs('home',app()->getLocale())) border-b @endif" href="{{ route('home', app()->getLocale()) }}">{{ __('navbarlayout.home') }}</a></div>
                    <div class="w-full sm:w-6/12 md:w-3/12 my-2 sm:my-2 md:my-0"><a href="{{ route('files',app()->getLocale()) }}">{{ __('navbarlayout.reports') }}</a></div>
                    <div class="w-full sm:w-6/12 md:w-3/12 my-2 sm:my-2 md:my-0"><a href="{{ route('story',app()->getLocale()) }}">{{ __('navbarlayout.stories') }}</a></div>
                    <div class="w-full sm:w-6/12 md:w-3/12 my-2 sm:my-2 md:my-0"><a href="{{ route('contacts',app()->getLocale()) }}">{{ __('navbarlayout.contactus') }}</a></div>

                    <div class="w-full sm:w-6/12 md:w-3/12 my-2 sm:my-2 md:my-0 md:mt-4"><a href="{{ route('projects',app()->getLocale()) }}">{{ __('navbarlayout.projects') }}</a></div>
                    <div class="w-full sm:w-6/12 md:w-3/12 my-2 sm:my-2 md:my-0 md:mt-4"><a href="{{ route('contacts',app()->getLocale()) }}">{{ __('navbarlayout.contactus') }}</a></div>
                    <div class="w-full sm:w-6/12 md:w-3/12 my-2 sm:my-2 md:my-0 md:mt-4"><a href="{{ route('partners',app()->getLocale()) }}">{{ __('navbarlayout.partenership') }}</a></div>
                    <div class="w-full sm:w-6/12 md:w-3/12 my-2 sm:my-2 md:my-0 md:mt-4"><a href="{{ route('volunteers',app()->getLocale()) }}">{{ __('navbarlayout.volunteer') }}</a></div>

                </div>

        </div>
    </section>
@endsection
