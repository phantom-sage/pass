@extends('layouts.welcome')
@section('page_header')
    <header class="bg-white shadow">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            <h2 @if(app()->getLocale() === 'ar') style="direction: rtl;" @endif class="font-black text-xl text-gray-800 leading-tight @if(app()->getLocale() === 'ar') cairo-font float-right @endif">
                {{ __('projectpage.header') }}
            </h2>
            @if(app()->getLocale() === 'ar') <div class="clearfix"></div> @endif
        </div>
    </header>
@endsection
@section('content')
    <div class="container mx-auto">
        @if(count($projects) > 0)
            <div class="flex flex-wrap">
                @foreach($projects as $project)
                    <div class="w-full sm:w-full md:w-6/12 lg:w-4/12 xl:w-4/12">
                        <div class="max-w-sm rounded overflow-hidden shadow-lg block mx-auto my-3 hover:shadow-xl transition ease-out duration-500 sm:m-3 md:m-3 lg:m-3">
                            <img class="w-full transition ease-in-out duration-500 transform hover:scale-105" src="{{ asset('img/02.jpg') }}" alt="Sunset in the mountains">
                            <div class="px-6 py-4">
                                <div style="direction: @if(\App::getLocale() === 'ar') rtl @else ltr @endif;" class="font-bold text-xl mb-2 @if(\App::getLocale() === 'ar') float-right @endif">
                                    {{ $project->name }}
                                </div>
                                @if(\App::getLocale() === 'ar') <div class="clearfix"></div> @endif
                                <p style="direction: @if(\App::getLocale() === 'ar') rtl @else ltr @endif;" class="text-gray-700 text-base @if(\App::getLocale() === 'ar') float-right @endif">
                                    {{ $project->description }}
                                </p>
                                @if(\App::getLocale() === 'ar') <div class="clearfix"></div> @endif
                            </div>
                            @if($project->video)
                                <hr>
                                <div class="px-6 pt-4 pb-2">
                                    <button class="px-5 mr-2 bg-blue-500 hover:bg-blue-400 text-white font-bold py-2 px-4 border-b-4 border-blue-700 hover:border-blue-500 rounded">
                                        <a href="{{ $project->video }}">See Video</a>
                                    </button>
                                </div>
                            @endif
                            <hr class="my-4">
                            <div class="px-6 pt-4 pb-2 mx-auto text-center">
                                <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">
                                    250
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" class="w-3 h-3 inline-block mb-1 ml-2"><path d="M12.3 3.7l4 4L4 20H0v-4L12.3 3.7zm1.4-1.4L16 0l4 4-2.3 2.3-4-4z"/></svg>
                                </span>
                                <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">
                                    500
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" class="w-3 h-3 inline-block mb-1 ml-2"><path d="M12.3 3.7l4 4L4 20H0v-4L12.3 3.7zm1.4-1.4L16 0l4 4-2.3 2.3-4-4z"/></svg>
                                </span>
                                <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" class="w-5 h-5 inline-block mb-1"><path d="M4 10c0-1.1.9-2 2-2h8c1.1 0 2 .9 2 2v8c0 1.1-.9 2-2 2H6c-1.1 0-2-.9-2-2v-8zm2 0v8h8v-8h-2V8H8v2H6zm3-6.17V16h2V3.83l3.07 3.07 1.42-1.41L10 0l-.7.7-4.8 4.8 1.42 1.4L9 3.84z"/></svg>
                                </span>
                            </div>
                            <hr class="my-2">
                            <div class="px-6 pt-4 pb-2 mx-auto text-center mb-2">
                                <a class="@if(app()->getLocale() === 'ar') cairo-font @endif bg-blue-600 text-white px-4 py-2 border rounded shadow-sm" href="#">
                                    {{ __('projectpage.seemore') }}
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="my-5 shadow-lg bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                <strong class="font-bold">No Projects!</strong>
                <span class="block sm:inline">Coming soon.</span>
                <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                {{--<svg class="fill-current h-6 w-6 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>--}}
              </span>
            </div>
        @endif
    </div>
    <div class="container mx-auto"><hr></div>
    <footer class="py-3">
        <h4 style="direction: @if(app()->getLocale() === 'ar') rtl @else ltr @endif;" class="text-center text-gray-900 text-black @if(app()->getLocale() === 'ar') cairo-font mr-5 float-right @endif">
            {{ __('welcomepage.poweredby') }}
        </h4>@if(app()->getLocale() === 'ar') <div class="clearfix"></div> @endif
    </footer>
@endsection
