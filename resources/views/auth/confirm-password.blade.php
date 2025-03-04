<x-guest-layout>
    <div class="flex min-h-screen bg-gray-900 items-center justify-center px-4 sm:px-6 lg:px-8">
        <div class="max-w-md w-full bg-sky-950 p-8 rounded-lg shadow-lg transition-all duration-300 hover:shadow-xl">
            <!-- Logo -->
            <div class="flex justify-center">
                <img src="{{ asset('images/logo.png') }}" alt="Logo" class="h-24 mb-6 animate-fade-in">
            </div>

            <div class="mb-4 text-sm text-gray-300 text-center">
                {{ __('This is a secure area of the application. Please confirm your password before continuing.') }}
            </div>

            <x-validation-errors class="mb-4" />

            <form method="POST" action="{{ route('password.confirm') }}" class="space-y-4">
                @csrf

                <div>
                    <x-label for="password" value="{{ __('Password') }}" class="text-white font-medium" />
                    <x-input id="password" class="block mt-1 w-full border-gray-300 rounded-lg shadow-sm focus:border-gray-500 focus:ring focus:ring-gray-300 transition-all duration-200 font-extrabold sky-950" 
                        type="password" name="password" required autocomplete="current-password" autofocus />
                </div>

                <div class="flex items-center justify-center">
                    <button type="submit" class="w-full py-2 px-4 bg-gray-600 text-white font-semibold rounded-lg shadow-md hover:bg-gray-700 hover:shadow-lg transition-all duration-300 transform hover:scale-105">
                        {{ __('Confirm') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>