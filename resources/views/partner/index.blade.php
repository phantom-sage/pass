@extends('layouts.welcome')
@section('page_header')
    <header class="bg-white shadow">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            <h2 @if(app()->getLocale() === 'ar') style="direction: rtl;" @endif class="font-black text-xl text-gray-800 leading-tight @if(app()->getLocale() === 'ar') cairo-font float-right mb-4 @endif">
                {{ __('partnerspage.header') }}
            </h2>
            @if(app()->getLocale() === 'ar') <div class="clearfix"></div> @endif
        </div>
        <hr>
        <!-- be partner -->
        <section class="my-5" x-data="{ open: false }">
            <div class="flex flex-wrap">

                <div class="w-full mx-auto">
                    <button @click="open = !open" class="text-center mx-auto block mb-3 px-5 bg-blue-500 hover:bg-blue-400 text-white font-bold py-2 px-4 border-b-4 border-blue-700 hover:border-blue-500 rounded">
                        {{ __('welcomepage.beapartner') }}
                    </button>
                </div>

                @if(session('errors'))
                    <div x-data="{ open: true }" x-show="open" class="mx-auto text-center w-4/12 my-5 shadow-lg bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                        <strong class="font-bold">There's something error, please check it again.</strong>
                        <span class="absolute top-0 bottom-0 @if(app()->getLocale() === 'ar') left-0 @else right-0 @endif px-4 py-3">
                            <svg @click="open = false" class="fill-current h-6 w-6 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
                        </span>
                    </div>
                @endif

                @if(session('partner_request'))
                    <div @if(app()->getLocale() === 'ar') style="direction: rtl;" @endif x-data="{ open: true }" x-show="open" class="mx-auto text-center w-4/12 my-5 shadow-lg bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                        <strong class="font-bold">{{ session('partner_request') }}</strong>
                        <span class="absolute top-0 bottom-0 @if(app()->getLocale() === 'ar') left-0 @else right-0 @endif px-4 py-3">
                            <svg @click="open = false" class="fill-current h-6 w-6 text-green-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
                        </span>
                    </div>
                @endif

                <div class="w-full">
                    <div x-show="open" class="my-4">
                        <form action="{{ route('partner',app()->getLocale()) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="flex flex-wrap">

                                <!-- Full name -->
                                <div class="w-8/12 mx-auto my-2">
                                    <input aria-label="Full name" name="full_name" value="{{ old('full_name') }}" type="text" required autofocus class="appearance-none rounded-none relative block w-full px-3 py-2 border @error('full_name') border-red-700 @enderror border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:shadow-outline-blue focus:border-blue-300 focus:z-10 sm:text-sm sm:leading-5" placeholder="Full name">
                                    @error('full_name')
                                    <strong class="text-red-700">{{ $message }}</strong>
                                    @enderror
                                </div>

                                <!-- Organization area -->
                                <div class="w-8/12 mx-auto my-2">
                                    <input aria-label="Business area" name="organization_area" value="{{ old('organization_area') }}" type="text" required class="appearance-none rounded-none relative block w-full px-3 py-2 border @error('organization_area') border-red-700 @enderror border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:shadow-outline-blue focus:border-blue-300 focus:z-10 sm:text-sm sm:leading-5" placeholder="Business area">
                                    @error('organization_area')
                                    <strong class="text-red-700">{{ $message }}</strong>
                                    @enderror
                                </div>

                                <!-- Organization -->
                                <div class="w-8/12 mx-auto my-2">
                                    <input aria-label="Organization name" name="organization" value="{{ old('organization') }}" type="text" required class="appearance-none rounded-none relative block w-full px-3 py-2 border @error('organization') border-red-700 @enderror border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:shadow-outline-blue focus:border-blue-300 focus:z-10 sm:text-sm sm:leading-5" placeholder="Organization name">
                                    @error('organization')
                                    <strong class="text-red-700">{{ $message }}</strong>
                                    @enderror
                                </div>

                                <!-- Email-Address -->
                                <div class="w-8/12 mx-auto my-2">
                                    <input aria-label="Email Address" name="email" value="{{ old('email') }}" type="email" required class="appearance-none rounded-none relative block w-full px-3 py-2 border @error('email') border-red-700 @enderror border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:shadow-outline-blue focus:border-blue-300 focus:z-10 sm:text-sm sm:leading-5" placeholder="Email Address">
                                    @error('email')
                                    <strong class="text-red-700">{{ $message }}</strong>
                                    @enderror
                                </div>

                                <!-- Partnership proposal -->
                                <div class="w-8/12 mx-auto my-2">
                                    <textarea aria-label="Partnership Proposal" name="proposal" required class="appearance-none rounded-none relative block w-full px-3 py-2 border @error('proposal') border-red-700 @enderror border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:shadow-outline-blue focus:border-blue-300 focus:z-10 sm:text-sm sm:leading-5" placeholder="Partnership Proposal"></textarea>
                                    @error('proposal')
                                    <strong class="text-red-700">{{ $message }}</strong>
                                    @enderror
                                </div>

                                <div class="w-8/12 mx-auto">
                                    <button type="submit" class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm leading-5 font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-700 transition duration-150 ease-in-out">
                                        <span class="absolute left-0 inset-y-0 flex items-center pl-3">
                                            <svg class="h-5 w-5 text-indigo-500 group-hover:text-indigo-400 transition ease-in-out duration-150" fill="currentColor" viewBox="0 0 20 20">
                                              <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd" />
                                            </svg>
                                        </span>
                                        Submit
                                    </button>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </section>
    </header>
@endsection
@section('content')
    <div class="container mx-auto">
        @error('partnership_proposal')
        <small>
            <strong class="text-red-900 text-bold px-2">{{ $message }}</strong>
        </small>
        @enderror
        @if(count($partners) > 0)
            <div class="flex flex-wrap">
                @foreach($partners as $partner)
                    <div class="w-full sm:w-full md:w-6/12 lg:w-4/12 xl:w-4/12">
                        <div class="max-w-sm rounded-lg overflow-hidden shadow-lg block mx-auto my-3 hover:shadow-xl transition ease-out duration-500 sm:m-3 md:m-3 lg:m-3">
                            <img class="w-64 h-64 mx-auto rounded-full transition ease-in-out duration-500 transform hover:scale-105" src="{{ asset('img/01.jpg') }}" alt="Sunset in the mountains">
                            <div class="px-6 py-4">
                                <div @if(app()->getLocale() === 'ar') style="direction: rtl;" @endif class="font-bold text-xl mb-2 @if(app()->getLocale() === 'ar') float-right @endif">
                                    {{ $partner->name }}
                                </div>
                                @if(app()->getLocale() === 'ar') <div class="clearfix"></div> @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="my-5 shadow-lg bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                <strong class="font-bold">No Partners!</strong>
                <span class="block sm:inline">Coming soon.</span>
                <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                {{--<svg class="fill-current h-6 w-6 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>--}}
              </span>
            </div>
        @endif
    </div>
@endsection
