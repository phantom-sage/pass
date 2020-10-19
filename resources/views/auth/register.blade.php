<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
{{--            <img src="{{ asset('img/pass_logo.jpg') }}" class="block h-20 w-auto" alt="pass logo" />--}}
            <div class="flex flex-wrap">
                <div class="w-3/12">
                    <img src="{{ asset('img/pass_logo.svg') }}" class="inline w-auto h-20" alt="pass logo" />
                </div>
                <div class="w-9/12">
                    <p class="text-custom-blue font-semibold">
                        <span class="uppercase text-4xl font-black">pass</span><span class="uppercase">sudan</span><br>
                        <span class="uppercase">paralegals association</span><br>
                        <span class="text-custom-red">For equal access to justice and development</span>
                    </p>
                </div>
            </div>
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div>
                <x-jet-label value="{{ __('Name') }}" />
                <x-jet-input class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            </div>

            <div class="mt-4">
                <x-jet-label value="{{ __('Email') }}" />
                <x-jet-input class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

            <div class="mt-4">
                <x-jet-label value="{{ __('Password') }}" />
                <x-jet-input class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-jet-label value="{{ __('Confirm Password') }}" />
                <x-jet-input class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-jet-button class="ml-4">
                    {{ __('Register') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>
