@extends('layouts.welcome')
@section('page_header')
    <header class="bg-white shadow">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            <h2 @if(app()->getLocale() === 'ar') style="direction: rtl;" @endif class="text-center font-black text-xl text-gray-800 leading-tight @if(app()->getLocale() === 'ar') cairo-font @endif">
                @if(app()->getLocale() === 'en')
                    {{ strtoupper($story->story_en) }}
                @else
                    {{ strtoupper($story->story_ar) }}
                @endif
            </h2>
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
        <div class="flex flex-wrap">
            <div class="w-full md:w-6/12 md:mx-auto">
                <div class="rounded shadow-sm border my-5 relative">
                    <img class="w-full rounded-lg mb-4" src="{{ asset('img/01.jpg') }}">
                    <h2 @if(app()->getLocale() === 'ar') style="direction: rtl;" @endif class="font-semibold text-xl text-black ml-2 @if(app()->getLocale() === 'ar') float-right cairo-font mr-2 @endif">
                        @if(app()->getLocale() === 'en')
                            {{ $story->name_en }}
                        @else
                            {{ $story->name_ar }}
                        @endif
                    </h2>
                    @if(app()->getLocale() === 'ar') <div class="clearfix"></div> @endif
                    <p @if(app()->getLocale() === 'ar') style="direction: rtl;" @endif class="text-lg font-bold text-gray-700 ml-2 @if(app()->getLocale() === 'ar') float-right cairo-font mr-2 @endif">
                        @if(app()->getLocale() === 'en')
                            {{ $story->description_en }}
                        @else
                            {{ $story->description_ar }}
                        @endif
                    </p>
                    @if(app()->getLocale() === 'ar') <div class="clearfix"></div> @endif
                    <p style="direction: @if(\App::getLocale() === 'ar') rtl @else ltr @endif;" class="text-gray-700 text-lg text-center my-4">
                        @if(app()->getLocale() === 'ar')
                            {!! $story->story_ar !!}
                        @else
                            {!! $story->story_en !!}
                        @endif
                    </p>
                    <hr class="my-2">
                    <!-- comments & likes & views badges -->
                    <div @if(app()->getLocale() === 'ar') style="direction: rtl;" @endif class="flex flex-wrap my-2 text-center">

                        <!-- likes -->
                        <div class="w-3/12 mx-auto">
                            <!-- likes badge -->
                            <form action="{{ route('saveStoryLike', ['locale' => app()->getLocale(), 'story' => $story->id]) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <button type="submit" class="px-2">
                            <span class="bg-white px-5 rounded-lg">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5 inline-block mb-1">
                                  <path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd" />
                                </svg>
                                {{ count($story->likes) }}
                            </span>
                                </button>
                            </form>
                        </div>

                        <!-- comments -->
                        <div class="w-3/12 mx-auto">
                            <!-- comments badge -->
                            <span class="bg-white px-5 rounded-lg">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-5 h-5 inline-block">
                                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z" />
                                </svg>
                                {{ count($story->comments) }}
                            </span>
                        </div>

                        <!-- views -->
                        <div class="w-3/12 mx-auto">
                            <!-- views badge -->
                            <span class="bg-white px-5 rounded-lg">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" class="w-4 h-4 inline-block">
                                    <path d="M.2 10a11 11 0 0 1 19.6 0A11 11 0 0 1 .2 10zm9.8 4a4 4 0 1 0 0-8 4 4 0 0 0 0 8zm0-2a2 2 0 1 1 0-4 2 2 0 0 1 0 4z"/>
                                </svg>
                                {{ count($story->views) }}
                            </span>
                        </div>

                        <!-- share -->
                        <div class="w-3/12 mx-auto">
                            <!-- share badge -->
                            <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">
                                <a href="">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="inline-block h-5 w-5">
                                      <path d="M15 8a3 3 0 10-2.977-2.63l-4.94 2.47a3 3 0 100 4.319l4.94 2.47a3 3 0 10.895-1.789l-4.94-2.47a3.027 3.027 0 000-.74l4.94-2.47C13.456 7.68 14.19 8 15 8z" />
                                    </svg>
                                </a>
                            </span>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!-- saving comment status session -->
        @if(session('commentSaveStatus'))
            <div x-data="{ open: true }" x-show="open" class="my-5 shadow-lg bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                <strong class="font-bold">{{ session('commentSaveStatus') }}</strong>
                <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                    <svg @click="open = false" class="fill-current h-6 w-6 text-green-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
              </span>
            </div>
        @endif
        <!-- saving comment replay status session -->
        @if(session('commentReplaySaveStatus'))
            <div x-data="{ open: true }" x-show="open" class="my-5 shadow-lg bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                <strong class="font-bold">{{ session('commentReplaySaveStatus') }}</strong>
                <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                    <svg @click="open = false" class="fill-current h-6 w-6 text-green-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
              </span>
            </div>
        @endif
    </div>
    <hr class="my-2">
    <div class="mx-auto container"><h3 class="@if(app()->getLocale() === 'ar') cairo-font @endif text-center text-xl text-gray-700 font-semibold m-3">{{ __('storypage.comments') }}</h3></div>
    <!-- comments -->
    <div class="container mx-auto" @if(app()->getLocale() === 'ar') style="direction: rtl;" @endif>
        @if(count($story->comments) > 0)
            <div class="flex flex-wrap">
                <ul class="w-full ml-4 my-4">
                    @foreach($story->parentComments as $comment)
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" class="h-5 w-5 border rounded-full shadow-sm inline-block">--}}
                            <path d="M0 2C0 .9.9 0 2 0h16a2 2 0 0 1 2 2v16a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2zm7 4v2a3 3 0 1 0 6 0V6a3 3 0 1 0-6 0zm11 9.14A15.93 15.93 0 0 0 10 13c-2.91 0-5.65.78-8 2.14V18h16v-2.86z"/>
                        </svg>
                        <strong>
                            {{ $comment->user_id }}:
                            <br />
                            <small class="ml-5">{{ $comment->created_at }}</small>
                        </strong><br />
                        <li class="inline-block ml-5 my-4">{{ $comment->body }}</li><br />
                        <!-- comments replays -->
                        @if(count($comment->allRepliesWithOwner) > 0)
                            <ol>
                                @foreach($comment->allRepliesWithOwner as $replay)
                                    <li class="my-4">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" class="h-5 w-5 border rounded-full shadow-sm inline-block">
                                            <path d="M5 5a5 5 0 0 1 10 0v2A5 5 0 0 1 5 7V5zM0 16.68A19.9 19.9 0 0 1 10 14c3.64 0 7.06.97 10 2.68V20H0v-3.32z"/>
                                        </svg>
                                        <strong>
                                            {{ $replay->owner->name }}
                                        </strong>
                                        <br />
                                        <small class="ml-5">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" class="h-3 w-3 inline-block">
                                                <path d="M15 2h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V4c0-1.1.9-2 2-2h2V0h2v2h6V0h2v2zM3 6v12h14V6H3zm6 5V9h2v2h2v2h-2v2H9v-2H7v-2h2z"/>
                                            </svg>
                                            {{ $replay->created_at }}
                                        </small>
                                        <br />
                                        <span class="ml-5">{{ $replay->body }}</span>
                                    </li>
                                @endforeach
                            </ol>
                        @endif
                        <!-- replay -->
                        <form action="{{ route('storeStoryReply', ['locale' => app()->getLocale(), 'story' => $story, 'comment' => $comment]) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <textarea name="body" required class="border"></textarea>
                            <button type="submit">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" class="h-6 w-6 inline-block">
                                    <path d="M15 17v-2.99A4 4 0 0 0 11 10H8v5L2 9l6-6v5h3a6 6 0 0 1 6 6v3h-2z"/>
                                </svg>
                                <strong>Reply</strong>
                            </button>
                        </form>
                        <hr class="my-1">
                    @endforeach
                </ul>
                <!-- comment form -->
                <div class="w-full ml-4 my-4">
                    <form action="{{ route('saveStoryComment', ['locale' => app()->getLocale(), 'story' => $story]) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="flex flex-wrap">
                            <div class="w-full mx-3">
                                <label @if(app()->getLocale() === 'ar') style="direction: rtl;" @endif class="font-semibold text-xl mb-3 @if(app()->getLocale() === 'ar') float-right cairo-font @endif">{{ __('storypage.commentBodyLabelText') }}</label>
                                @if(app()->getLocale() === 'ar') <div class="clearfix"></div> @endif
                            </div>
                            <div class="w-full mx-3">
                                <textarea name="body" class="p-3 placeholder:text-gray-700 w-full border rounded" required placeholder="Enter your comment here"></textarea>
                                 <small class="text-red-700">
                                @error('body')
                                    {{ $message }}
                                @enderror
                                </small>
                            </div>
                            <div class="w-full">
                                <button type="submit" @if(app()->getLocale() === 'ar') style="direction: rtl;" @endif class="mb-2 @if(app()->getLocale() === 'ar') float-right cairo-font @endif font-semibold mx-3 mt-3 bg-blue-700 text-white px-5 py-3 rounded shadow-sm">{{ __('storypage.submitCommentButtonText') }}</button>
                                @if(app()->getLocale() === 'ar') <div class="clearfix"></div> @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        @else
            <div class="flex flex-wrap">
                <div class="w-full ml-4 my-4">
                    <form action="{{ route('saveStoryComment', ['locale' => app()->getLocale(), 'story' => $story]) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="flex flex-wrap">
                            <div class="w-full mx-3">
                                <label @if(app()->getLocale() === 'ar') style="direction: rtl;" @endif class="font-semibold text-xl mb-3 @if(app()->getLocale() === 'ar') float-right cairo-font @endif">{{ __('storypage.commentBodyLabelText') }}</label>
                                @if(app()->getLocale() === 'ar') <div class="clearfix"></div> @endif
                            </div>
                            <div class="w-full mx-3">
                                <textarea name="body" class="p-3 placeholder:text-gray-700 w-full border rounded" required placeholder="Enter your comment here"></textarea>
                                 <small class="text-red-700">
                                @error('body')
                                    {{ $message }}
                                @enderror
                                </small>
                            </div>
                            <div class="w-full">
                                <button type="submit" @if(app()->getLocale() === 'ar') style="direction: rtl;" @endif class="@if(app()->getLocale() === 'ar') float-right cairo-font @endif font-semibold mx-3 mt-3 bg-blue-700 text-white px-5 py-3 rounded shadow-sm">{{ __('storypage.submitCommentButtonText') }}</button>
                                @if(app()->getLocale() === 'ar') <div class="clearfix"></div> @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        @endif
    </div><!-- container -->
@endsection
