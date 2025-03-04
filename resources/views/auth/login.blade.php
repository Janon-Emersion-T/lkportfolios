<x-guest-layout>
    <div class="flex min-h-screen bg-gray-900 items-center justify-center px-4 sm:px-6 lg:px-8">
        <div class="max-w-md w-full bg-sky-950 p-8 rounded-lg shadow-lg transition-all duration-300 hover:shadow-xl">
            <!-- Logo -->
            <div class="flex justify-center">
                <img src="{{ asset('images/logo.png') }}" alt="Logo" class="h-24 mb-6 animate-fade-in">
            </div>

            <x-validation-errors class="mb-4" />

            @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600 animate-slide-in">
                {{ session('status') }}
            </div>
            @endif

            <form method="POST" action="{{ route('login') }}" class="space-y-4">
                @csrf

                <!-- Email -->
                <div>
                    <x-label for="email" value="{{ __('Email') }}" class="text-white font-medium" />
                    <x-input id="email" class="block mt-1 w-full border-gray-300 rounded-lg shadow-sm focus:border-gray-500 focus:ring focus:ring-gray-300 transition-all duration-200 font-extrabold sky-950" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                </div>

                <!-- Password -->
                <div>
                    <x-label for="password" value="{{ __('Password') }}" class="text-white font-medium" />
                    <x-input id="password" class="block mt-1 w-full border-gray-300 rounded-lg shadow-sm focus:border-gray-500 focus:ring focus:ring-gray-300 transition-all duration-200 font-extrabold sky-950" type="password" name="password" required autocomplete="current-password" />
                </div>

                <!-- Remember Me -->
                <div class="flex items-center justify-between">
                    <label for="remember_me" class="flex items-center">
                        <x-checkbox id="remember_me" name="remember" class="text-sky-950" />
                        <span class="ms-2 text-sm text-white">{{ __('Remember me') }}</span>
                    </label>

                    @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}" class="text-sm hover:text-gray-800 transition-all duration-200 text-white">
                        {{ __('Forgot your password?') }}
                    </a>
                    @endif
                </div>

                <!-- Login Button -->
                <div class="flex items-center justify-center">
                    <button type="submit" class="w-full py-2 px-4 bg-gray-600 text-white font-semibold rounded-lg shadow-md hover:bg-gray-700 hover:shadow-lg transition-all duration-300 transform hover:scale-105">
                        {{ __('Log in') }}
                    </button>
                </div>
            </form>

            <!-- Create Account Link -->
            <div class="mt-6 text-center text-white">
                <p>Don't have an Account<a href="#" class="inline-block text-sm text-white  py-2 px-6 rounded-lg font-semibold transition-all duration-200 transform hover:scale-105" {{ __('Register') }}>
                    Create account
                </a></p>
            </div>
        </div>
    </div>
</x-guest-layout>
