<x-guest-layout>
    <div class="flex min-h-screen bg-gray-900 items-center justify-center px-4 sm:px-6 lg:px-8">
        <div class="max-w-md w-full bg-sky-950 p-8 rounded-lg shadow-lg transition-all duration-300 hover:shadow-xl">
            <!-- Logo -->
            <div class="flex justify-center">
                <img src="{{ asset('images/logo.png') }}" alt="Logo" class="h-24 mb-6 animate-fade-in">
            </div>

            <x-validation-errors class="mb-4" />

            <form method="POST" action="{{ route('register') }}" class="space-y-4">
                @csrf

                <!-- Name -->
                <div>
                    <x-label for="name" value="{{ __('Name') }}" class="text-white font-medium" />
                    <x-input id="name" class="block mt-1 w-full border-gray-300 rounded-lg shadow-sm focus:border-gray-500 focus:ring focus:ring-gray-300 transition-all duration-200 font-extrabold sky-950" 
                        type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                </div>

                <!-- Email -->
                <div>
                    <x-label for="email" value="{{ __('Email') }}" class="text-white font-medium" />
                    <x-input id="email" class="block mt-1 w-full border-gray-300 rounded-lg shadow-sm focus:border-gray-500 focus:ring focus:ring-gray-300 transition-all duration-200 font-extrabold sky-950" 
                        type="email" name="email" :value="old('email')" required autocomplete="username" />
                </div>

                <!-- Phone -->
                <div>
                    <x-label for="phone" value="{{ __('Phone') }}" class="text-white font-medium" />
                    <x-input id="phone" class="block mt-1 w-full border-gray-300 rounded-lg shadow-sm focus:border-gray-500 focus:ring focus:ring-gray-300 transition-all duration-200 font-extrabold sky-950" 
                        type="text" name="phone" :value="old('phone')" required autocomplete="phone" />
                </div>

                <!-- User Type -->
                <div>
                    <x-label for="usertype" value="{{ __('Usertype') }}" class="text-white font-medium" />
                    <select id="usertype" class="block mt-1 w-full border-gray-300 rounded-lg shadow-sm focus:border-gray-500 focus:ring focus:ring-gray-300 transition-all duration-200 text-black" name="usertype" required>
                        <option value="candidate">Candidate</option>
                        <option value="company">Company</option>
                    </select>
                </div>

                <!-- Password -->
                <div>
                    <x-label for="password" value="{{ __('Password') }}" class="text-white font-medium" />
                    <x-input id="password" class="block mt-1 w-full border-gray-300 rounded-lg shadow-sm focus:border-gray-500 focus:ring focus:ring-gray-300 transition-all duration-200 font-extrabold sky-950" 
                        type="password" name="password" required autocomplete="new-password" />
                </div>

                <!-- Confirm Password -->
                <div>
                    <x-label for="password_confirmation" value="{{ __('Confirm Password') }}" class="text-white font-medium" />
                    <x-input id="password_confirmation" class="block mt-1 w-full border-gray-300 rounded-lg shadow-sm focus:border-gray-500 focus:ring focus:ring-gray-300 transition-all duration-200 font-extrabold sky-950" 
                        type="password" name="password_confirmation" required autocomplete="new-password" />
                </div>

                <!-- Terms & Conditions -->
                @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                    <div class="mt-4">
                        <x-label for="terms">
                            <div class="flex items-center">
                                <x-checkbox name="terms" id="terms" required class="text-sky-950" />
                                <span class="ms-2 text-sm text-gray-600">
                                    {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                            'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Terms of Service').'</a>',
                                            'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Privacy Policy').'</a>',
                                    ]) !!}
                                </span>
                            </div>
                        </x-label>
                    </div>
                @endif

                <!-- Register Button -->
                <div class="flex items-center justify-center">
                    <button type="submit" class="w-full py-2 px-4 bg-gray-600 text-white font-semibold rounded-lg shadow-md hover:bg-gray-700 hover:shadow-lg transition-all duration-300 transform hover:scale-105">
                        {{ __('Register') }}
                    </button>
                </div>

                <!-- Already Registered Link -->
                <div class="flex items-center justify-center mt-4">
                    <a href="{{ route('login') }}" class="text-sm hover:text-gray-300 transition-all duration-200 text-white">
                        {{ __('Already registered?') }}
                    </a>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>
