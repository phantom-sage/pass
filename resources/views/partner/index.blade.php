@extends('layouts.welcome')
@section('page_header')
    <header class="bg-white shadow">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            <h2 class="font-black text-xl text-gray-800 leading-tight">
                {{ __('Partners') }}
            </h2>
            <button id="bePartnerBtn" class="float-right px-5 mr-2 bg-blue-500 hover:bg-blue-400 text-white font-bold py-2 px-4 border-b-4 border-blue-700 hover:border-blue-500 rounded">
                <a href="#">Be a partner</a>
            </button>
            <div class="clearfix"></div>
        </div>
    </header>
@endsection
@section('content')
    <div class="container mx-auto">
        @if(count($partners) > 0)
            <div class="flex flex-wrap">
                @foreach($partners as $partner)
                    <div class="w-full sm:w-full md:w-6/12 lg:w-4/12 xl:w-4/12">
                        <div class="max-w-sm rounded overflow-hidden shadow-lg block mx-auto my-3 hover:shadow-xl transition ease-out duration-500 sm:m-3 md:m-3 lg:m-3">
                            <img class="w-full rounded-lg" src="{{ asset('img/01.jpg') }}" alt="Sunset in the mountains">
                            <div class="px-6 py-4">
                                <div class="font-bold text-xl mb-2">{{ $partner->name }}</div>
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
    <div class="container mx-auto"><hr></div>
    <footer class="py-3">
        <h4 class="text-center text-gray-900 text-black">
            Powered by <a href="#" class="text-black font-black border-b border-dashed border-gray-700">NSD</a>
        </h4>
    </footer>

    <div id="bePartnerModal" class="fixed z-10 inset-0 overflow-y-auto hidden">
        <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
            <!--
              Background overlay, show/hide based on modal state.

              Entering: "ease-out duration-300"
                From: "opacity-0"
                To: "opacity-100"
              Leaving: "ease-in duration-200"
                From: "opacity-100"
                To: "opacity-0"
            -->
            <div class="fixed inset-0 transition-opacity">
                <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
            </div>

            <!-- This element is to trick the browser into centering the modal contents. -->
            <span class="hidden sm:inline-block sm:align-middle sm:h-screen"></span>&#8203;
            <!--
              Modal panel, show/hide based on modal state.

              Entering: "ease-out duration-300"
                From: "opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                To: "opacity-100 translate-y-0 sm:scale-100"
              Leaving: "ease-in duration-200"
                From: "opacity-100 translate-y-0 sm:scale-100"
                To: "opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
            -->
            <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full" role="dialog" aria-modal="true" aria-labelledby="modal-headline">
                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                    <div class="sm:flex sm:items-start">
                        {{--<div class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10">--}}
                            {{--<!-- Heroicon name: exclamation -->--}}
                            {{--<svg class="h-6 w-6 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">--}}
                                {{--<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />--}}
                            {{--</svg>--}}
                        {{--</div>--}}
                        <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                            <h3 class="text-lg leading-6 font-black text-gray-900" id="modal-headline">
                                Be Partner
                            </h3>
                            <div class="mt-2">
                                <!-- form -->
                                <div class="bg-gray-50 px-4 sm:px-6 lg:px-8">
                                    <div class="max-w-md w-full">
                                        <div>
                                            {{--<img class="mx-auto h-12 w-auto" src="https://tailwindui.com/img/logos/workflow-mark-on-white.svg" alt="Workflow">--}}
                                            <h2 class="mt-6 text-center text-3xl leading-9 font-extrabold text-gray-900">
                                                Be a partner for blah blah blah
                                            </h2>
                                        </div>
                                        <form class="mt-8" action="#" method="POST" enctype="multipart/form-data">
                                            <input type="hidden" name="remember" value="true">
                                            <div class="rounded-md shadow-sm">
                                                <div class="my-3">
                                                    <input aria-label="Forth name" name="forth_name" type="text" required autofocus class="appearance-none rounded-none relative block w-full px-3 py-2 border @error('forth_name') border-red-700 @enderror border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:shadow-outline-blue focus:border-blue-300 focus:z-10 sm:text-sm sm:leading-5" placeholder="Forth name">
                                                    @error('forth_name')
                                                    <small>
                                                        <strong class="text-red-900 text-bold px-2">{{ $message }}</strong>
                                                    </small>
                                                    @enderror
                                                </div>
                                                <div  class="my-3">
                                                    <input aria-label="Business area" name="business_area" type="text" required class="appearance-none rounded-none relative block w-full px-3 py-2 border @error('business_area') border-red-700 @enderror border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:shadow-outline-blue focus:border-blue-300 focus:z-10 sm:text-sm sm:leading-5" placeholder="Business area">
                                                    @error('business_area')
                                                    <small>
                                                        <strong class="text-red-900 text-bold px-2">{{ $message }}</strong>
                                                    </small>
                                                    @enderror
                                                </div>
                                                <div  class="my-3">
                                                    <input aria-label="Organization name" name="organization_name" type="text" required class="appearance-none rounded-none relative block w-full px-3 py-2 border @error('organization_name') border-red-700 @enderror border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:shadow-outline-blue focus:border-blue-300 focus:z-10 sm:text-sm sm:leading-5" placeholder="Organization name">
                                                    @error('organization_name')
                                                    <small>
                                                        <strong class="text-red-900 text-bold px-2">{{ $message }}</strong>
                                                    </small>
                                                    @enderror
                                                </div>
                                                <div  class="my-3">
                                                    <input aria-label="Email Address" name="email" type="email" required class="appearance-none rounded-none relative block w-full px-3 py-2 border @error('email') border-red-700 @enderror border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:shadow-outline-blue focus:border-blue-300 focus:z-10 sm:text-sm sm:leading-5" placeholder="Email Address">
                                                    @error('email')
                                                    <small>
                                                        <strong class="text-red-900 text-bold px-2">{{ $message }}</strong>
                                                    </small>
                                                    @enderror
                                                </div>
                                                <div  class="my-3">
                                                    <textarea aria-label="Partnership Proposal" name="partnership_proposal" required class="appearance-none rounded-none relative block w-full px-3 py-2 border @error('partnership_proposal') @enderror border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:shadow-outline-blue focus:border-blue-300 focus:z-10 sm:text-sm sm:leading-5" placeholder="Partnership Proposal"></textarea>
                                                    @error('partnership_proposal')
                                                    <small>
                                                        <strong class="text-red-900 text-bold px-2">{{ $message }}</strong>
                                                    </small>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="mt-1">
                                                <button type="submit" class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm leading-5 font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-700 transition duration-150 ease-in-out">
                                                  <span class="absolute left-0 inset-y-0 flex items-center pl-3">
                                                    <svg class="h-5 w-5 text-indigo-500 group-hover:text-indigo-400 transition ease-in-out duration-150" fill="currentColor" viewBox="0 0 20 20">
                                                      <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd" />
                                                    </svg>
                                                  </span>
                                                    Submit
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                    {{--<span class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">--}}
                      {{--<button type="button" class="inline-flex justify-center w-full rounded-md border border-transparent px-4 py-2 bg-red-600 text-base leading-6 font-medium text-white shadow-sm hover:bg-red-500 focus:outline-none focus:border-red-700 focus:shadow-outline-red transition ease-in-out duration-150 sm:text-sm sm:leading-5">--}}
                        {{--Submit--}}
                      {{--</button>--}}
                    {{--</span>--}}
                    <span class="mt-3 flex w-full rounded-md shadow-sm sm:mt-0 sm:w-auto">
                      <button id="bePartnerModalCancelBtn" type="button" class="inline-flex justify-center w-full rounded-md border border-gray-300 px-4 py-2 bg-white text-base leading-6 font-medium text-gray-700 shadow-sm hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue transition ease-in-out duration-150 sm:text-sm sm:leading-5">
                        Cancel
                      </button>
                    </span>
                </div>
            </div>
        </div>
    </div>
@endsection