<div @if(app()->getLocale() === 'ar') style="direction: rtl;" @endif class="@if(app()->getLocale() === 'ar') cairo-font @endif w-full sm:w-full md:w-6/12 lg:w-6/12 xl:w-6/12 hover:bg-gray-700 hover:text-white hover:shadow-2xl transition ease-in-out duration-500">
    <div class="border border-dashed hover:border-0 hover:border-none hover:border-transparent border-black mx-3 my-3 sm:my-3 md:my-0 lg:my-0 xl:my-0 py-5 sm:py-5 md:py-5 lg:py-5 xl:py-5">
        <h3 class="text-center uppercase">
            {{ __('welcomepage.whatwedo') }}
        </h3>
        <p class="text-center">{{ __('welcomepage.whatwedoinfo') }}</p>
    </div>
</div>
