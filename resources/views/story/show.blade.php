@extends('layouts.welcome')
@section('page_header')
    <header class="bg-white shadow">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            <h2 @if(app()->getLocale() === 'ar') style="direction: rtl;" @endif class="text-center font-black text-xl text-gray-800 leading-tight @if(app()->getLocale() === 'ar') cairo-font @endif">
                @if(app()->getLocale() === 'en')
                    {{ strtoupper($project->name_en) }}
                @else
                    {{ strtoupper($project->name_ar) }}
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
                            {{ $project->name_en }}
                        @else
                            {{ $project->name_ar }}
                        @endif
                    </h2>
                    @if(app()->getLocale() === 'ar') <div class="clearfix"></div> @endif
                    <p @if(app()->getLocale() === 'ar') style="direction: rtl;" @endif class="text-lg font-bold text-gray-700 ml-2 @if(app()->getLocale() === 'ar') float-right cairo-font mr-2 @endif">
                        @if(app()->getLocale() === 'en')
                            {{ $project->description_en }}
                        @else
                            {{ $project->description_ar }}
                        @endif
                    </p>
                    @if(app()->getLocale() === 'ar') <div class="clearfix"></div> @endif
                    @if($project->video)
                        <hr class="my-3 bg-gray-400">
                        <video src="{{ $project->video }}"></video>
                @endif
                <!-- comments badge -->
                    <span class="absolute top-3 left-3 bg-white px-5 rounded-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-5 h-5 inline-block">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z" />
                        </svg>
                        {{ count($project->comments) }}
                    </span>
                    <!-- likes badge -->
                    <span class="absolute top-3 right-3 bg-white px-5 rounded-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5 inline-block mb-1">
                          <path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd" />
                        </svg>
                        {{ count($project->likes) }}
                    </span>
                </div>
            </div>
        </div>
    </div>

    <div class="container mx-auto">
        @if(count($project->comments) > 0)
            <ul>
                @foreach($project->comments as $comment)
                    <li>{{ $comment->body }}</li>
                @endforeach
                <form action="{{ route('saveProjectComment', ['locale', app()->getLocale(), 'project' => $project, 'id' => $project->id]) }}" method="POST" enctype="multipart/form-data">
                    <div class="flex flex-wrap">
                        <div class="w-full mx-3">
                            <label @if(app()->getLocale() === 'ar') style="direction: rtl;" @endif class="font-semibold text-xl mb-3 @if(app()->getLocale() === 'ar') float-right cairo-font @endif">{{ __('projectpage.commentBodyLabelText') }}</label>
                            @if(app()->getLocale() === 'ar') <div class="clearfix"></div> @endif
                        </div>
                        <div class="w-full mx-3"><textarea class="p-3 placeholder:text-gray-700 w-full border rounded" required placeholder="Enter your comment here"></textarea></div>
                        <div class="w-full">
                            <button type="submit" @if(app()->getLocale() === 'ar') style="direction: rtl;" @endif class="@if(app()->getLocale() === 'ar') float-right cairo-font @endif font-semibold mx-3 mt-3 bg-blue-700 text-white px-5 py-3 rounded shadow-sm">{{ __('projectpage.submitCommentButtonText') }}</button>
                            @if(app()->getLocale() === 'ar') <div class="clearfix"></div> @endif
                        </div>
                    </div>
                </form>
            </ul>
        @else
            <form action="{{ route('saveProjectComment', ['locale', app()->getLocale(), 'project' => $project, 'id' => $project->id]) }}" method="POST" enctype="multipart/form-data">
                <div class="flex flex-wrap">
                    <div class="w-full mx-3">
                        <label @if(app()->getLocale() === 'ar') style="direction: rtl;" @endif class="font-semibold text-xl mb-3 @if(app()->getLocale() === 'ar') float-right cairo-font @endif">{{ __('projectpage.commentBodyLabelText') }}</label>
                        @if(app()->getLocale() === 'ar') <div class="clearfix"></div> @endif
                    </div>
                    <div class="w-full mx-3"><textarea class="p-3 placeholder:text-gray-700 w-full border rounded" required placeholder="Enter your comment here"></textarea></div>
                    <div class="w-full">
                        <button type="submit" @if(app()->getLocale() === 'ar') style="direction: rtl;" @endif class="@if(app()->getLocale() === 'ar') float-right cairo-font @endif font-semibold mx-3 mt-3 bg-blue-700 text-white px-5 py-3 rounded shadow-sm">{{ __('projectpage.submitCommentButtonText') }}</button>
                        @if(app()->getLocale() === 'ar') <div class="clearfix"></div> @endif
                    </div>
                </div>
            </form>
        @endif
    </div>
@endsection
