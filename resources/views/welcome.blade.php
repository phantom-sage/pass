@extends('layouts.welcome')

@section('content')
    @livewire('slider')
    {{--<hr class="my-5">--}}
    <section class="bg-gradient-to-r from-blue-900 to-blue-400">
        <div class="container mx-auto py-5">
            <h2 class="uppercase text-xl font-black text-white">Current projects</h2>
            <div class="flex flex-wrap justify-center">
                @foreach($projects as $project)
                    <livewire:current-projects :project="$project" />
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
                    <a href="{{ route('volunteers') }}">Become a volunteer</a>
                </button>
                <button class="px-5 mr-2 bg-blue-500 hover:bg-blue-400 text-white font-bold py-2 px-4 border-b-4 border-blue-700 hover:border-blue-500 rounded">
                    <a href="{{ route('partners') }}">Be a partner</a>
                </button>
            </div>
        </div>
    </section>
    <div class="container mx-auto"><hr></div>
    <footer class="py-3">
        <h4 style="direction: @if(app()->getLocale() === 'ar') rtl @else ltr @endif;" class="text-center text-gray-900 text-black @if(app()->getLocale() === 'ar') float-right @endif">
            {{ __('welcomepage.poweredby') }}
        </h4>@if(app()->getLocale() === 'ar') <div class="clearfix"></div> @endif
    </footer>
@endsection
