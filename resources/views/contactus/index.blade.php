@extends('layouts.welcome')

@section('content')
    <div class="container mx-auto">
        @if(count($contacts) > 0)
            <div class="flex flex-wrap">
                @foreach($contacts as $contact)
                    <div class="w-full sm:w-full md:w-6/12 lg:w-4/12 xl:w-4/12">
                        <div class="max-w-sm rounded overflow-hidden shadow-lg block mx-auto my-3 hover:shadow-xl transition ease-out duration-500 sm:m-3 md:m-3 lg:m-3">
                            <img class="w-full" src="{{ asset('img/02.jpg') }}" alt="Sunset in the mountains">
                            <div class="px-6 py-4">
                                <div class="font-semibold text-xl mb-2">
                                    <h3>{{ $contact->name }}</h3>
                                    <small class="text-sm font-light">{{ $contact->job }}</small>
                                </div>
                                <hr class="my-2 bg-gray-800">
                                <p class="text-gray-700 text-base">
                                    {{ $contact->email }}
                                </p>
                                <p class="text-gray-700 text-base">
                                    {{ $contact->phone }}
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            no contacts coming soon
        @endif
    </div>
@endsection
