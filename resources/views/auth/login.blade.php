<x-guest-layout>

    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo  />
            </a>
        </x-slot>


        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <x-input-label for="email" :value="__('Email')" />

                <x-text-input id="email" class="form-control" type="email" name="email" :value="old('email')" required autofocus />

                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="password" :value="__('Password')" />

                <x-text-input id="password" class="form-control"
                                type="password"
                                name="password"
                                required autocomplete="current-password" />

                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <div class="flex items-center justify-end mt-4">

                <x-primary-button class="ml-3 mb-3">
                    {{ __('Log in') }}
                </x-primary-button>
                <br>
                @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
