@extends('layouts.welcome')

@section('content')
    @livewire('slider')
    {{--<hr class="my-5">--}}
    <section class="bg-gradient-to-r from-blue-900 to-blue-400">
        <div class="container mx-auto py-5">
            <h2 class="uppercase text-xl font-black text-white">Current projects</h2>
            <div class="flex flex-wrap justify-center">
                @foreach($projects as $project)
                    <div class="w-full mx-3 m-3 rounded overflow-hidden shadow-lg relative hover:shadow-2xl transition ease-in-out duration-500 sm:w-full md:w-6/12 lg:w-4/12 xl:w-3/12">
                        <img class="w-full" src="https://images.unsplash.com/photo-1544427920-c49ccfb85579?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1422&q=80" alt="Sunset in the mountains">
                        <div class="px-6 py-4">
                            <div class="font-bold text-xl mb-2 text-white font-bold">{{ $project->name }}</div>
                            <p class="text-base text-white">{{ $project->description }}</p>
                        </div>
                        <div class="mt-2 ml-2 rounded-md bg-blue-400 text-xl font-semibold absolute top-0 p-2">
                            <span>{{ $project->id }}</span>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    @livewire('news-slider')
    <section class="py-5">
        <div class="container mx-auto">
            <div class="flex flex-wrap justify-center">
                @livewire('who-we-are')
                @livewire('what-we-do')
            </div>
        </div>
    </section>
    <div class="container mx-auto"><hr class="my-3"></div>
    <section class="py-5">
        <div class="container mx-auto">
            <div class="flex flex-wrap justify-between">
                <button class="px-5 ml-2 bg-blue-500 hover:bg-blue-400 text-white font-bold py-2 px-4 border-b-4 border-blue-700 hover:border-blue-500 rounded">
                    <a href="{{ route('volunteers',app()->getLocale()) }}">Become a volunteer</a>
                </button>
                <button class="px-5 mr-2 bg-blue-500 hover:bg-blue-400 text-white font-bold py-2 px-4 border-b-4 border-blue-700 hover:border-blue-500 rounded">
                    <a href="{{ route('partners',app()->getLocale()) }}">Be a partner</a>
                </button>
            </div>
        </div>
    </section>
@endsection
