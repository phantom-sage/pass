@extends('layouts.welcome')

@section('content')
    <div class="container mx-auto">
        @if(count($contacts) > 0)
            <div class="flex flex-wrap">
                @foreach($contacts as $contact)
                    <div class="w-full sm:w-full md:w-6/12 lg:w-4/12 xl:w-4/12">
                        <div class="max-w-sm rounded-lg overflow-hidden shadow-lg block mx-auto my-3 hover:shadow-xl transition ease-out duration-500 sm:m-3 md:m-3 lg:m-3">
                            <img class="w-40 h-40 block mx-auto rounded-full" src="{{ asset('img/02.jpg') }}" alt="Sunset in the mountains">
                            <div class="px-6 py-4">
                                <div class="font-semibold text-xl mb-2">
                                    <h3>{{ $contact->name }}</h3>
                                    <span>
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" class="inline w-3 h-3">
                                            <path d="M10 20a10 10 0 1 1 0-20 10 10 0 0 1 0 20zM7 6v2a3 3 0 1 0 6 0V6a3 3 0 1 0-6 0zm-3.65 8.44a8 8 0 0 0 13.3 0 15.94 15.94 0 0 0-13.3 0z"/>
                                        </svg>
                                        <small class="text-sm font-light">{{ $contact->job }}</small>
                                    </span>
                                </div>
                                <hr class="my-2 bg-gray-800">
                                <p class="text-gray-700 text-base">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" class="inline w-3 h-3">
                                        <path d="M18 2a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4c0-1.1.9-2 2-2h16zm-4.37 9.1L20 16v-2l-5.12-3.9L20 6V4l-10 8L0 4v2l5.12 4.1L0 14v2l6.37-4.9L10 14l3.63-2.9z"/>
                                    </svg>
                                    {{ $contact->email }}
                                </p>
                                <p class="text-gray-700 text-base">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" class="inline w-3 h-3">
                                        <path d="M20 18.35V19a1 1 0 0 1-1 1h-2A17 17 0 0 1 0 3V1a1 1 0 0 1 1-1h4a1 1 0 0 1 1 1v4c0 .56-.31 1.31-.7 1.7L3.16 8.84c1.52 3.6 4.4 6.48 8 8l2.12-2.12c.4-.4 1.15-.71 1.7-.71H19a1 1 0 0 1 .99 1v3.35z"/>
                                    </svg>
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
