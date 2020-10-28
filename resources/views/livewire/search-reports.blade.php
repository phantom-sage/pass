<div>
    <input class="w-8/12 p-1 border rounded font-black block mx-auto mb-3" wire:model="fileName" type="search"
    placeholder="@if(app()->getLocale() === 'en') Type here... @elseif(app()->getLocale() === 'ar') اكتب هنا... @endif">
    <hr>
    <div class="container mx-auto">
        @if(count($files) > 0)
        <div class="flex flex-wrap">
            @foreach($files as $file)
            <div class="w-full sm:w-full md:w-6/12 lg:w-4/12 xl:w-4/12">
                <div class="max-w-sm rounded overflow-hidden shadow-lg block mx-auto my-3 hover:shadow-xl transition ease-out duration-500 sm:m-3 md:m-3 lg:m-3">
                    {{--<img class="w-full" src="{{ asset('img/02.jpg') }}" alt="Sunset in the mountains">--}}
                    <div class="px-6 py-4">
                        <div @if(app()->getLocale() === 'ar') style="direction: rtl;" @endif class="font-bold text-xl mb-2 @if(app()->getLocale() === 'ar') float-right @endif">
                            @if(app()->getLocale() === 'en')
                            {{ $file->name_en }}
                            @elseif(app()->getLocale() === 'ar')
                            {{ $file->name_ar }}
                            @endif
                        </div>
                        @if(app()->getLocale() === 'ar') <div class="clearfix"></div> @endif
                    </div>
                    <div class="divider-x divide-black"></div>
                    <button class="float-right @if(app()->getLocale() === 'ar') float-left @endif px-4 py-2 bg-white text-gray-800 border rounded m-3 shadow-md">
                    @php $download = (json_decode($file->file))[0]->download_link; @endphp

                        <a href="{{route('download',['locale'=>app()->getLocale(),'file'=>$file->id])}}" >
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" class="w-5 h-5 inline">
                            <path d="M13 8V2H7v6H2l8 8 8-8h-5zM0 18h20v2H0v-2z"/>
                        </svg>
                        {{ __('reports.download') }}
                        </a>
                    </button>
                    <div class="clearfix"></div>
                    {{--<div class="px-6 pt-4 pb-2">--}}
                        {{--{{ $file->date }}--}}
                    {{--</div>--}}
                </div>
            </div>
            @endforeach
        </div>
        @else
        <div class="my-5 shadow-lg bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
            <strong class="font-bold">
                @if(app()->getLocale() === 'en')
                No Reports!
                @elseif(app()->getLocale() === 'ar')
                لا تقارير !
                @endif
            </strong>
            <span class="block sm:inline">
                @if(app()->getLocale() === 'en')
                Coming soon.
                @elseif(app()->getLocale() === 'ar')
                قادمة قريباّ
                @endif
            </span>
            <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                    {{--<svg class="fill-current h-6 w-6 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>--}}
              </span>
        </div>
        @endif
    </div>
</div>
