@extends('layouts.welcome')
@section('page_header')
    <header class="bg-white shadow">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            <h2 @if(app()->getLocale() === 'ar') style="direction: rtl;" @endif class="font-black text-xl text-gray-800 leading-tight @if(app()->getLocale() === 'ar') cairo-font float-right @endif">
                {{ __('volunteerpage.header') }}
            </h2>
            @if(app()->getLocale() === 'ar') <div class="clearfix"></div> @endif
        </div>
    </header>
@endsection
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
                                    <a class="text-blue-600 font-semibold text-xl" href="{{ url('/login') }}">
                                        {{ __('navbarlayout.login') }}
                                    </a>
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
    <div class="container mx-auto">
        @if(count($volunteers) > 0)
            <div class="flex flex-wrap">
                @if(session('volunteer_request_message'))
                    <div class="w-full">
                        <div x-data="{ open: true }" x-show="open" class="mx-auto w-4/12 my-5 shadow-md bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                            <strong class="font-bold">{{ session('volunteer_request_message') }}</strong>
                            <span class="absolute top-0 bottom-0 @if(app()->getLocale() === 'ar') left-0 @else right-0 @endif px-4 py-3">
                                <svg @click="open = false" class="fill-current h-6 w-6 text-green-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
                            </span>
                        </div>
                    </div>
                @endif
                @foreach($volunteers as $volunteer)
                    <div class="w-full sm:w-full md:w-6/12 lg:w-4/12 xl:w-4/12">
                        <div class="max-w-sm rounded overflow-hidden border block mx-auto my-3 hover:shadow-xl transition ease-out duration-500 sm:m-3 md:m-3 lg:m-3">
                            <div class="px-6 py-4">
                                <div @if(app()->getLocale() === 'ar') style="direction: rtl;" @endif class="font-bold text-xl mb-2 @if(app()->getLocale() === 'ar') cairo-font @endif text-center">
                                    {{ $volunteer->name }}
                                </div>
                                <p>
                                    {{ $volunteer->description }}
                                </p>
                                <p>
                                    <span>
                                        <strong>{{ __('volunteerpage.endat') }} </strong>
                                        {{ $volunteer->end_at }}
                                    </span>
                                </p>
                            </div>
                            <hr>
                            <div class="px-6 pt-4 pb-2">
                                <a href="{{ route('volunteer.show', ['locale' => app()->getLocale(), 'volunteer' => $volunteer->id]) }}" class="text-uppercase bg-blue-700 px-4 py-2 float-right font-black text-white shadow-sm hover:shadow-lg transition ease-in-out duration-75">
                                    {{ __('volunteerpage.bevolunteertext') }}
                                </a>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="my-5 shadow-lg bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                <strong class="font-bold">No Volunteers!</strong>
                <span class="block sm:inline">Coming soon.</span>
                <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                {{--<svg class="fill-current h-6 w-6 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>--}}
              </span>
            </div>
        @endif
    </div>
@endsection
