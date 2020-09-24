@extends('layouts.welcome')
@section('page_header')
    <header class="bg-white shadow">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            <h2 @if(app()->getLocale() === 'ar') style="direction: rtl;" @endif class="font-black text-xl text-gray-800 leading-tight @if(app()->getLocale() === 'ar') cairo-font float-right @endif">
                {{ __('storypage.header') }}
            </h2>
            @if(app()->getLocale() === 'ar') <div class="clearfix"></div> @endif
        </div>
    </header>
@endsection
@section('content')
    <div class="container mx-auto">
        @if(count($stories) > 0)
            <div class="flex flex-wrap">
                @foreach($stories as $story)
                    <div class="w-full sm:w-full md:w-6/12 lg:w-4/12 xl:w-4/12">
                        <div class="max-w-sm rounded overflow-hidden shadow-lg block mx-auto my-3 hover:shadow-xl transition ease-out duration-500 sm:m-3 md:m-3 lg:m-3">
                            <img class="w-full transition ease-in-out duration-500 transform hover:scale-105" src="{{ asset('img/02.jpg') }}" alt="Sunset in the mountains">
                            <div class="px-6 py-4">
                                <div style="direction: @if(\App::getLocale() === 'ar') rtl @else ltr @endif;" class="font-bold text-xl mb-2 @if(\App::getLocale() === 'ar') float-right @endif">
                                    @if(app()->getLocale() === 'ar')
                                        {{ $story->name_ar }}
                                    @else
                                        {{ $story->name_en }}
                                    @endif
                                </div>
                                @if(\App::getLocale() === 'ar') <div class="clearfix"></div> @endif
                                <p style="direction: @if(\App::getLocale() === 'ar') rtl @else ltr @endif;" class="text-gray-700 text-base @if(\App::getLocale() === 'ar') float-right @endif">
                                    @if(app()->getLocale() === 'ar')
                                        {{ $story->description_ar }}
                                    @else
                                        {{ $story->description_en }}
                                    @endif
                                </p>
                                @if(\App::getLocale() === 'ar') <div class="clearfix"></div> @endif
                            </div>
                            @if($story->video)
                                <hr>
                                <div class="px-6 pt-4 pb-2">
                                    <button class="px-5 mr-2 bg-blue-500 hover:bg-blue-400 text-white font-bold py-2 px-4 border-b-4 border-blue-700 hover:border-blue-500 rounded">
                                        <a href="{{ $story->video }}">See Video</a>
                                    </button>
                                </div>
                            @endif
                            <hr class="my-4">
                            <div class="px-6 pt-4 pb-2 mx-auto text-center">
                                <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">
                                    {{ count($story->comments) }}
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-5 h-5 inline-block mb-1 ml-2">
                                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z" />
                                    </svg>
                                </span>
                                <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">
                                    {{ count($story->likes) }}
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5 inline-block mb-1 ml-2">
                                      <path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd" />
                                    </svg>
                                </span>
                                <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">
                                    <a href="">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="inline-block h-5 w-5">
                                          <path d="M15 8a3 3 0 10-2.977-2.63l-4.94 2.47a3 3 0 100 4.319l4.94 2.47a3 3 0 10.895-1.789l-4.94-2.47a3.027 3.027 0 000-.74l4.94-2.47C13.456 7.68 14.19 8 15 8z" />
                                        </svg>
                                    </a>
                                </span>
                            </div>
                            <hr class="my-2">
                            <div class="px-6 pt-4 pb-2 mx-auto text-center mb-2">
                                <a class="@if(app()->getLocale() === 'ar') cairo-font @endif bg-blue-600 text-white px-4 py-2 border rounded shadow-sm" href="{{route('story.show',['locale'=>app()->getLocale(),'story'=>$story->id])}}">
                                    {{ __('storypage.seemore') }}
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
@endsection
