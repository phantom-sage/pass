@extends('layouts.welcome')
@section('page_header')
    <header class="bg-white shadow">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            <h2 class="font-black text-xl text-gray-800 leading-tight">
                {{ __('News') }}
            </h2>
        </div>
    </header>
@endsection
@section('content')
    <div class="container mx-auto">
        @if(count($news) > 0)
            <div class="flex flex-wrap">
                @foreach($news as $new)
                    <div class="w-full sm:w-full md:w-6/12 lg:w-4/12 xl:w-4/12">
                        <div class="max-w-sm rounded overflow-hidden shadow-lg block mx-auto my-3 hover:shadow-xl transition ease-out duration-500 sm:m-3 md:m-3 lg:m-3">
                            <img class="w-full" src="{{ asset('img/02.jpg') }}" alt="Sunset in the mountains">
                            <div class="px-6 py-4">
                                <div class="font-bold text-xl mb-2">{{ $new->name }}</div>
                                <p class="text-gray-700 text-base">
                                    {{ $new->description }}
                                </p>
                            </div>
                            <hr>
                            <div class="px-6 pt-4 pb-2">
                                @if($new->video)
                                    <button class="px-5 mr-2 bg-blue-500 hover:bg-blue-400 text-white font-bold py-2 px-4 border-b-4 border-blue-700 hover:border-blue-500 rounded">
                                        <a href="{{ $new->video }}">See Video</a>
                                    </button>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="my-5 shadow-lg bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                <strong class="font-bold">No News!</strong>
                <span class="block sm:inline">Coming soon.</span>
                <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                {{--<svg class="fill-current h-6 w-6 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>--}}
              </span>
            </div>
        @endif
    </div>
    <div class="container mx-auto"><hr></div>
    <footer class="py-3">
        <h4 class="text-center text-gray-900 text-black">
            Powered by <a href="#" class="text-black font-black border-b border-dashed border-gray-700">NSD</a>
        </h4>
    </footer>
@endsection