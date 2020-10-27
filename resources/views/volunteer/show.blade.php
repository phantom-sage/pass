@extends('layouts.welcome')
@section('page_header')
    <header @if(app()->getLocale() === 'ar') style="direction: rtl"; @endif class="bg-white shadow">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            <h2 @if(app()->getLocale() === 'ar') style="direction: rtl;" @endif class="text-center font-black text-xl text-gray-800 leading-tight @if(app()->getLocale() === 'ar') cairo-font @endif uppercase text-center">
                @if(app()->getLocale() === 'ar')
                    {{ $volunteer->name_ar }}
                @else
                    {{ $volunteer->name_en }}
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
                    <div class="w-full sm:w-2/12">
                        <img src="{{ asset('img/pass_logo.svg') }}" class="block mx-auto sm:inline md:inline lg:inline xl:inline w-auto h-64" alt="pass logo" />
                    </div>
                    <div class="w-full sm:w-4/12">
                        <p class="mt-7 text-custom-blue font-semibold text-center sm:mt-5 sm:text-left md:text-left md:mt-5 @if(app()->getLocale() === 'ar') md:text-right @endif lg:text-left @if(app()->getLocale() === 'ar') lg:text-right @endif lg:mt-5 xl:text-left @if(app()->getLocale() === 'ar') xl:text-right @endif">
                            <span class="uppercase text-4xl font-black">pass</span><span class="uppercase">sudan</span><br>
                            <span class="uppercase">paralegals association</span><br>
                            <span class="text-custom-red">For equal access to justice and development</span>
                        </p>
                    </div>
                    <div style="background-image: url('{{ asset('img/header_bg.png') }}'); background-size: cover; background-position: center center;" class="w-full sm:w-6/12 hidden md:block lg:block xl:block">
{{--                        <img src="{{ asset('img/header_bg.png') }}" class="block w-auto h-64" alt="header background" />style="margin-top: 81px; margin-left: -66px;"--}}
                        <div class="text-center" style="margin-top: 5.75rem;">
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
        </section>
    </section>
@endsection
@section('content')
    <div class="container mx-auto" @if(app()->getLocale() === 'ar') style="direction: rtl;" @endif>
        <div class="flex flex-wrap">

            <!-- volunteer form -->
            <div class="w-full px-4 my-5 @if(app()->getLocale() === 'ar') cairo-font @endif">
                <form action="{{ route('volunteer', ['locale' => app()->getLocale(), 'volunteer' => $volunteer->id]) }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="flex flex-wrap my-2">
                        <label for="full_name" class="w-full mb-1">{{ __('volunteerpage.fullname') }}</label>
                        <input type="text" name="full_name" id="full_name" value="{{ old('full_name') }}" class="w-full border rounded @error('full_name') border-red-700 @enderror" required>
                        @error('full_name')
                            <small class="text-red-700 font-bold mt-1">
                                {{ $message }}
                            </small>
                        @enderror
                    </div>

                    <div class="flex flex-wrap my-2">
                        <label for="work_place" class="w-full mb-1">{{ __('volunteerpage.workplace') }}</label>
                        <input type="text" name="work_place" id="work_place" value="{{ old('work_place') }}" class="w-full border rounded @error('full_name') border-red-700 @enderror" required>
                        @error('work_place')
                        <small class="text-red-700 font-bold mt-1">
                            {{ $message }}
                        </small>
                        @enderror
                    </div>

                    <div class="flex flex-wrap my-2">
                        <label for="email" class="w-full mb-1">{{ __('volunteerpage.email') }}</label>
                        <input type="email" name="email" id="email" value="{{ old('email') }}" class="w-full border rounded @error('full_name') border-red-700 @enderror" required>
                        @error('email')
                        <small class="text-red-700 font-bold mt-1">
                            {{ $message }}
                        </small>
                        @enderror
                    </div>

                    <div class="flex flex-wrap my-2">
                        <label for="phone" class="w-full mb-1">{{ __('volunteerpage.phonenumber') }}</label>
                        <input type="phone" name="phone" id="phone" value="{{ old('phone') }}" class="w-full border rounded @error('full_name') border-red-700 @enderror" required>
                        @error('phone')
                        <small class="text-red-700 font-bold mt-1">
                            {{ $message }}
                        </small>
                        @enderror
                    </div>

                    <div class="flex flex-wrap my-2">
                        <label for="age" class="w-full mb-1">{{ __('volunteerpage.age') }}</label>
                        <input type="date" name="age" id="age" value="{{ old('age') }}" class="w-full border rounded @error('full_name') border-red-700 @enderror" required>
                        @error('age')
                        <small class="text-red-700 font-bold mt-1">
                            {{ $message }}
                        </small>
                        @enderror
                    </div>

                    <div class="flex flex-wrap my-2">
                        <label for="gender" class="w-full mb-1">{{ __('volunteerpage.gender') }}</label>
                        <div class="w-4/12"><input required type="radio" name="gender" value="male" id="gender"> {{ __('volunteerpage.male') }}</div>
                        <div class="w-4/12"><input required type="radio" name="gender" value="female" id="gender"> {{ __('volunteerpage.female') }}</div>
                        <div class="w-4/12"><input required type="radio" name="gender" value="other" id="gender"> {{ __('volunteerpage.other') }}</div>
                        @error('gender')
                        <small class="text-red-700 font-bold mt-1">
                            {{ $message }}
                        </small>
                        @enderror
                    </div>

                    <div class="flex flex-wrap my-2">
                        <label for="qualification" class="w-full mb-1">{{ __('volunteerpage.qualification') }}</label>
                        <select id="qualification" required class="rounded border w-full @error('full_name') border-red-700 @enderror" name="qualification">
                            <option value="high school">High school</option>
                            <option value="undergraduate">Undergraduate</option>
                            <option value="graduate">Graduate</option>
                        </select>
                        @error('qualification')
                        <small class="text-red-700 font-bold mt-1">
                            {{ $message }}
                        </small>
                        @enderror
                    </div>

                    <div class="flex flex-wrap my-2">
                        <button type="submit" class="text-center block mx-auto px-4 py-2 border rounded shadow bg-green-700 text-white font-semibold">
                            {{ __('volunteerpage.send') }}
                        </button>
                    </div>

                </form>
            </div><!-- volunteer form column -->

        </div><!-- flex -->
    </div><!-- container -->
@endsection
