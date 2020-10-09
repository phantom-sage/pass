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
{{--                            <img class="w-full transition ease-in-out duration-500 transform hover:scale-105" src="{{ asset('img/02.jpg') }}" alt="Sunset in the mountains">--}}
                            <div class="px-6 py-4">
                                <div @if(app()->getLocale() === 'ar') style="direction: rtl;" @endif class="font-bold text-xl mb-2 @if(app()->getLocale() === 'ar') cairo-font float-right @endif">
                                    {{ $volunteer->name }}
                                </div>
                                @if(app()->getLocale() === 'ar') <div class="clearfix"></div> @endif
{{--                                <p @if(app()->getLocale() === 'ar') style="direction: rtl;" @endif class="text-gray-700 text-base @if(app()->getLocale() === 'ar') cairo-font float-right @endif">--}}
{{--                                    {{ $volunteer->description }}--}}
{{--                                </p>--}}
{{--                                @if(app()->getLocale() === 'ar') <div class="clearfix"></div> @endif--}}
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
