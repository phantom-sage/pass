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

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <x-jet-label value="{{ __('Email') }}" />
                <x-jet-input class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <div class="mt-4">
                <x-jet-label value="{{ __('Password') }}" />
                <x-jet-input class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
            </div>

            <div class="block mt-4">
                <label class="flex items-center">
                    <input type="checkbox" class="form-checkbox" name="remember">
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <x-jet-button class="ml-4">
                    {{ __('Login') }}
                </x-jet-button>
            </div>

            <div class="flex items-center justify-center mt-4">
                <span class="text-gray-400">Doesn't have an account?</span>
                <a href="/register" class="text-gray-900 border-b border-dotted border-black mx-2">Resgister</a>
            </div>

        </form>
    </x-jet-authentication-card>
</x-guest-layout>
