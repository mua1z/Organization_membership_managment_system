<x-guest-layout>
    @include('auth.navb')
    <div class="px-4 py-12 sm:px-6 lg:px-8">
        <x-authentication-card class="max-w-2xl mx-auto overflow-hidden border border-gray-100 shadow-xl bg-gradient-to-br from-white to-gray-50 rounded-2xl">
            <div class="relative">
                <!-- Gradient background overlay -->
                <div class="absolute inset-0 bg-gradient-to-r from-purple-500 to-indigo-600 opacity-10"></div>

                <x-slot name="logo">
                    <div class="flex justify-center">
                        <x-authentication-card-logo class="w-auto h-16" />
                    </div>
                </x-slot>

                <x-validation-errors class="p-4 mb-6 border border-red-100 rounded-lg bg-red-50/80" />

                <form method="POST" action="{{ route('register') }}" class="relative px-8 py-8 space-y-6">
                    @csrf

                    <div class="space-y-6">
                        <!-- Personal Information -->
                        <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
                            <div>
                                <x-label for="name" value="{{ __('Name') }}" class="block mb-1 text-sm font-medium text-gray-700" />
                                <x-input id="name" class="block w-full px-4 py-3 transition duration-200 border border-gray-300 shadow-sm rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"
                                         type="text" name="name" :value="old('name')" required autofocus autocomplete="name"
                                         placeholder="John Doe" />
                            </div>

                            <div>
                                <x-label for="email" value="{{ __('Email') }}" class="block mb-1 text-sm font-medium text-gray-700" />
                                <x-input id="email" class="block w-full px-4 py-3 transition duration-200 border border-gray-300 shadow-sm rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"
                                         type="email" name="email" :value="old('email')" required autocomplete="username"
                                         placeholder="john@example.com" />
                            </div>
                        </div>

                        <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
                            <div>
                                <x-label for="phone" value="{{ __('Phone') }}" class="block mb-1 text-sm font-medium text-gray-700" />
                                <x-input id="phone" class="block w-full px-4 py-3 transition duration-200 border border-gray-300 shadow-sm rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"
                                         type="text" name="phone" :value="old('phone')" required autofocus autocomplete="phone"
                                         placeholder="+1 (555) 123-4567" />
                            </div>

                            <div>
                                <x-label for="organization_name" value="{{ __('Organization Name') }}" class="block mb-1 text-sm font-medium text-gray-700" />
                                <x-input id="organization_name" class="block w-full px-4 py-3 transition duration-200 border border-gray-300 shadow-sm rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"
                                         type="text" name="organization_name" :value="old('organization_name')" required autofocus autocomplete="organization_name"
                                         placeholder="Acme Inc." />
                            </div>
                        </div>

                        <!-- Organization Details -->
                        <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
                            <div>
                                <x-label for="organization_type" value="{{ __('Organization Type') }}" class="block mb-1 text-sm font-medium text-gray-700" />
                                <select id="organization_type" name="organization_type"
                                        class="block w-full px-4 py-3 transition duration-200 bg-white border border-gray-300 shadow-sm rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"
                                        required>
                                    <option value="">Select Organization Type</option>
                                    <option value="corporate" {{ old('organization_type') == 'corporate' ? 'selected' : '' }}>Corporate</option>
                                    <option value="non_profit" {{ old('organization_type') == 'non_profit' ? 'selected' : '' }}>Non-Profit</option>
                                    <option value="government" {{ old('organization_type') == 'government' ? 'selected' : '' }}>Government</option>
                                    <option value="startup" {{ old('organization_type') == 'startup' ? 'selected' : '' }}>Startup</option>
                                    <option value="educational" {{ old('organization_type') == 'educational' ? 'selected' : '' }}>Educational</option>
                                </select>
                            </div>

                            <div>
                                <x-label for="plan" value="{{ __('Plan') }}" class="block mb-1 text-sm font-medium text-gray-700" />
                                <select id="plan" name="plan"
                                        class="block w-full px-4 py-3 transition duration-200 bg-white border border-gray-300 shadow-sm rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"
                                        required>
                                    <option value="">Select Plan Type</option>
                                    <option value="basic" {{ old('plan') == 'basic' ? 'selected' : '' }}>Basic</option>
                                    <option value="pro" {{ old('plan') == 'pro' ? 'selected' : '' }}>Pro</option>
                                    <option value="enter" {{ old('plan') == 'enter' ? 'selected' : '' }}>Enterprise</option>
                                </select>
                            </div>
                        </div>

                        <div>
                            <x-label for="member" value="{{ __('Members Numbers') }}" class="block mb-1 text-sm font-medium text-gray-700" />
                            <x-input id="member" class="block w-full px-4 py-3 transition duration-200 border border-gray-300 shadow-sm rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"
                                     type="number" name="member" :value="old('member')" required autofocus autocomplete="member"
                                     placeholder="10" />
                        </div>

                        <!-- Password Fields -->
                        <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
                            <div>
                                <x-label for="password" value="{{ __('Password') }}" class="block mb-1 text-sm font-medium text-gray-700" />
                                <x-input id="password" class="block w-full px-4 py-3 transition duration-200 border border-gray-300 shadow-sm rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"
                                         type="password" name="password" required autocomplete="new-password"
                                         placeholder="••••••••" />
                            </div>

                            <div>
                                <x-label for="password_confirmation" value="{{ __('Confirm Password') }}" class="block mb-1 text-sm font-medium text-gray-700" />
                                <x-input id="password_confirmation" class="block w-full px-4 py-3 transition duration-200 border border-gray-300 shadow-sm rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"
                                         type="password" name="password_confirmation" required autocomplete="new-password"
                                         placeholder="••••••••" />
                            </div>
                        </div>
                    </div>

                    @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                        <div class="mt-6">
                            <x-label for="terms">
                                <div class="flex items-center">
                                    <x-checkbox name="terms" id="terms" required
                                                class="w-4 h-4 text-indigo-600 border-gray-300 rounded focus:ring-indigo-500" />

                                    <div class="text-sm text-gray-600 ms-2">
                                        {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                                'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="font-medium text-indigo-600 hover:text-indigo-500 hover:underline">'.__('Terms of Service').'</a>',
                                                'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="font-medium text-indigo-600 hover:text-indigo-500 hover:underline">'.__('Privacy Policy').'</a>',
                                        ]) !!}
                                    </div>
                                </div>
                            </x-label>
                        </div>
                    @endif

                    <div class="flex flex-col items-center justify-between mt-8 space-y-4 sm:flex-row sm:space-y-0">
                        <a href="{{ route('login') }}" class="text-sm font-medium text-indigo-600 transition duration-200 hover:text-indigo-500 hover:underline">
                            Already have an account? Login
                        </a>

                        <x-button class="px-6 py-3 bg-gradient-to-r from-indigo-600 to-purple-600 hover:from-indigo-700 hover:to-purple-700 text-white font-medium rounded-xl shadow-md hover:shadow-lg transform hover:-translate-y-0.5 transition duration-200 ease-in-out">
                            {{ __('Register') }}
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 ml-2 -mr-1" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L12.586 11H5a1 1 0 110-2h7.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </x-button>
                    </div>
                </form>
            </div>
        </x-authentication-card>
    </div>
    @include('auth.footer')
</x-guest-layout>
