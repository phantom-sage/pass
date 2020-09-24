@extends('layouts.welcome')
@section('page_header')
    <header class="bg-white shadow">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            <h2 @if(app()->getLocale() === 'ar') style="direction: rtl;" @endif class="text-center font-black text-xl text-gray-800 leading-tight @if(app()->getLocale() === 'ar') cairo-font @endif">
                @if(app()->getLocale() === 'en')
                    {{ strtoupper($new->name_en) }}
                @else
                    {{ strtoupper($new->name_ar) }}
                @endif
            </h2>
        </div>
    </header>
@endsection
@section('content')
    <div class="container mx-auto">
        <div class="flex flex-wrap">
            <div class="w-full">
                <div class="rounded shadow-sm border my-5 relative">
                    <img class="w-full rounded-lg mb-4" src="{{ asset('img/01.jpg') }}">
                    <h2 @if(app()->getLocale() === 'ar') style="direction: rtl;" @endif class="font-semibold text-xl text-black ml-2 @if(app()->getLocale() === 'ar') float-right cairo-font mr-2 @endif">
                        @if(app()->getLocale() === 'en')
                            {{ $new->name_en }}
                        @else
                            {{ $new->name_ar }}
                        @endif
                    </h2>
                    @if(app()->getLocale() === 'ar') <div class="clearfix"></div> @endif
                    <p @if(app()->getLocale() === 'ar') style="direction: rtl;" @endif class="text-lg font-bold text-gray-700 ml-2 @if(app()->getLocale() === 'ar') float-right cairo-font mr-2 @endif">
                        @if(app()->getLocale() === 'en')
                            {{ $new->description_en }}
                        @else
                            {{ $new->description_ar }}
                        @endif
                    </p>
                    @if(app()->getLocale() === 'ar') <div class="clearfix"></div> @endif
                    @if($new->video)
                        <hr class="my-3 bg-gray-400">
                        <video src="{{ $new->video }}"></video>
                @endif
                <!-- comments badge -->
                    <span class="absolute top-3 left-3 bg-white px-5 rounded-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-5 h-5 inline-block">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z" />
                        </svg>
                        {{ count($new->comments) }}
                    </span>
                    <!-- likes badge -->
                    <span class="absolute top-3 right-3 bg-white px-5 rounded-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5 inline-block mb-1">
                          <path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd" />
                        </svg>
                        {{ count($new->likes) }}
                    </span>
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
    </div>
    <hr class="my-2">
    <div class="mx-auto container"><h3 class="@if(app()->getLocale() === 'ar') cairo-font @endif text-center text-xl text-gray-700 font-semibold m-3">{{ __('newspage.comments') }}</h3></div>
    <!-- comment form -->
    <div class="container mx-auto" @if(app()->getLocale() === 'ar') style="direction: rtl;" @endif>
        @if(count($new->comments) > 0)
            <div class="flex flex-wrap">
                <ul class="w-full ml-4 my-4">
                    @foreach($new->comments as $comment)
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
                        <form action="{{ route('storeNewsReply', ['locale' => app()->getLocale(), 'news' => $new, 'comment' => $comment]) }}" method="POST" enctype="multipart/form-data">
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
                    <form action="{{ route('saveNewsComment', ['locale' => app()->getLocale(), 'news' => $new]) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="flex flex-wrap">
                            <div class="w-full mx-3">
                                <label @if(app()->getLocale() === 'ar') style="direction: rtl;" @endif class="font-semibold text-xl mb-3 @if(app()->getLocale() === 'ar') float-right cairo-font @endif">{{ __('projectpage.commentBodyLabelText') }}</label>
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
                                <button type="submit" @if(app()->getLocale() === 'ar') style="direction: rtl;" @endif class="mb-2 @if(app()->getLocale() === 'ar') float-right cairo-font @endif font-semibold mx-3 mt-3 bg-blue-700 text-white px-5 py-3 rounded shadow-sm">{{ __('projectpage.submitCommentButtonText') }}</button>
                                @if(app()->getLocale() === 'ar') <div class="clearfix"></div> @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        @else
            <div class="flex flex-wrap">
                <div class="w-full ml-4 my-4">
                    <form action="{{ route('saveNewsComment', ['locale' => app()->getLocale(), 'news' => $new]) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="flex flex-wrap">
                            <div class="w-full mx-3">
                                <label @if(app()->getLocale() === 'ar') style="direction: rtl;" @endif class="font-semibold text-xl mb-3 @if(app()->getLocale() === 'ar') float-right cairo-font @endif">{{ __('projectpage.commentBodyLabelText') }}</label>
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
                                <button type="submit" @if(app()->getLocale() === 'ar') style="direction: rtl;" @endif class="@if(app()->getLocale() === 'ar') float-right cairo-font @endif font-semibold mx-3 mt-3 bg-blue-700 text-white px-5 py-3 rounded shadow-sm">{{ __('projectpage.submitCommentButtonText') }}</button>
                                @if(app()->getLocale() === 'ar') <div class="clearfix"></div> @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        @endif
    </div><!-- container -->
@endsection
