@extends('layouts.welcome')

@section('content')
    <!-- hot slider -->
    <div @if(app()->getLocale() === 'ar') style="direction: rtl;" class="cairo-font" @endif>
        <div class="sliderAx h-auto py-5 shadow-lg my-5">
            <div id="slider-1" class="container mx-auto">
                <div class="bg-cover bg-center  h-auto text-white py-24 px-10 object-fill" style="background-image: url(https://images.unsplash.com/photo-1544427920-c49ccfb85579?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1422&q=80)">
                    <div class="md:w-1/2">
                        <p class="font-bold text-sm uppercase">{{ __('welcomepage.hotstory') }}</p>
                        <p class="text-3xl font-bold">{{ $hot_story->name }}</p>
                        <p class="text-2xl mb-10 leading-none">{{ $hot_story->description }}</p>
                        <a href="{{route('story.show',['locale'=>app()->getLocale(),'story'=>$hot_story->id])}}" class="bg-purple-800 py-4 px-8 text-white font-bold uppercase text-xs rounded hover:bg-gray-200 hover:text-gray-800">
                            {{ __('welcomepage.readmore') }}
                        </a>
                    </div>
                </div> <!-- container -->
                <br>
            </div>

            <div id="slider-2" class="container mx-auto">
                <div class="bg-cover bg-top  h-auto text-white py-24 px-10 object-fill" style="background-image: url(https://images.unsplash.com/photo-1544144433-d50aff500b91?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1350&q=80)">

                    <p class="font-bold text-sm uppercase">{{ __('welcomepage.hotproject') }}</p>
                    <p class="text-3xl font-bold">{{ $hot_project->name }}</p>
                    <p class="text-2xl mb-10 leading-none">{{ $hot_project->description }}</p>
                    <a href="{{route('project.show',['locale'=>app()->getLocale(),'project'=>$hot_project->id])}}" class="bg-purple-800 py-4 px-8 text-white font-bold uppercase text-xs rounded hover:bg-gray-200 hover:text-gray-800">
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
                            <div class="font-bold text-xl mb-2 text-white font-bold">{{ $project->name }}</div>
                            <p class="text-base text-white">{{ $project->description }}</p>
                        </div>
                        <div class="flex flex-wrap">
                            <a class="border border-white px-3 py-2 mb-2 mx-2 rounded text-white transition ease-in-out duration-500 hover:border-white hover:bg-white hover:text-blue-700 font-black" href="{{route('project.show',['locale'=>app()->getLocale(),'project'=>$project->id])}}">
                                {{ __('projectpage.seemore') }}
                            </a>
                        </div>
                        <div class="@if(app()->getLocale() === 'ar') mr-2 @endif mt-2 ml-2 rounded-md bg-blue-400 text-xl font-semibold absolute top-0 p-2">
                            <span>{{ $project->id }}</span>
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
                        <p class="text-3xl font-bold">{{ $first_hot_news->name }}</p>
                        <p class="text-2xl mb-10 leading-none">{{ $first_hot_news->description }}</p>
                        <a href="{{ route('news',app()->getLocale()) }}" class="@if(app()->getLocale() === 'ar') cairo-font @endif bg-purple-800 py-4 px-8 text-white font-bold uppercase text-xs rounded hover:bg-gray-200 hover:text-gray-800">
                            {{ __('welcomepage.readmore') }}
                        </a>
                    </div>
                </div> <!-- container -->
                <br>
            </div>

            <div id="slider-4" class="container mx-auto">
                <div class="bg-cover bg-top h-auto text-white py-24 px-10 object-fill" style="background-image: url(https://images.unsplash.com/photo-1544144433-d50aff500b91?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1350&q=80)">

                    <p class="font-bold text-sm uppercase">{{ __('welcomepage.news') }}</p>
                    <p class="text-3xl font-bold">{{ $second_hot_news->name }}</p>
                    <p class="text-2xl mb-10 leading-none">{{ $second_hot_news->description }}</p>
                    <a href="{{ route('news',app()->getLocale()) }}" class="@if(app()->getLocale() === 'ar') cairo-font @endif bg-purple-800 py-4 px-8 text-white font-bold uppercase text-xs rounded hover:bg-gray-200 hover:text-gray-800">
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
@endsection
