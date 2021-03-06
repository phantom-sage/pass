<div style="direction: rtl;">
    <div class="container mx-auto">
        <h2 class="@if(app()->getLocale() === 'ar') cairo-font @endif text-xl font-black pt-5 uppercase">{{ __('welcomepage.currentnews') }}</h2>
    </div>
    <div class="sliderAx h-auto shadow-lg my-5">
        <div id="slider-3" class="container mx-auto">
            <div class="bg-cover bg-center  h-auto text-white py-24 px-10 object-fill" style="background-image: url(https://images.unsplash.com/photo-1544427920-c49ccfb85579?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1422&q=80)">
                <div class="md:w-1/2">
                    <p class="font-bold text-sm uppercase">Services</p>
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

                <p class="font-bold text-sm uppercase">Services</p>
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
