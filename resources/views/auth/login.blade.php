<x-guest-layout>
    @include('auth.navb')
    <div class="flex items-center justify-center min-h-screen px-4 py-12 sm:px-6 lg:px-8">
        <x-authentication-card class="w-full max-w-md overflow-hidden border border-gray-100 shadow-xl bg-white/90 backdrop-blur-sm rounded-2xl">
            <div class="p-8 sm:p-10">
                <x-slot name="logo">
                    <div class="flex justify-center">
                        <x-authentication-card-logo class="w-auto h-16" />
                    </div>
                </x-slot>

                <!-- Google Login Button -->
                <div class="mt-6">
                    <a href="{{ route('google.login') }}" class="flex items-center justify-center w-full px-4 py-3 text-sm font-medium text-gray-700 transition-all duration-200 bg-white border border-gray-300 shadow-sm rounded-xl hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        <svg class="w-5 h-5 mr-3" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z" fill="#4285F4"/>
                            <path d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z" fill="#34A853"/>
                            <path d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z" fill="#FBBC05"/>
                            <path d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z" fill="#EA4335"/>
                        </svg>
                        Continue with Google
                    </a>
                </div>

                <div class="mt-6">
                    <div class="relative">
                        <div class="absolute inset-0 flex items-center">
                            <div class="w-full border-t border-gray-300"></div>
                        </div>
                        <div class="relative flex justify-center text-sm">
                            <span class="px-2 text-gray-500 bg-white">Or continue with email</span>
                        </div>
                    </div>
                </div>

                <x-validation-errors class="p-4 mt-6 border border-red-100 rounded-lg bg-red-50/80" />

                @session('status')
                    <div class="p-4 mt-6 text-sm font-medium text-green-600 border border-green-100 rounded-lg bg-green-50/80">
                        {{ $value }}
                    </div>
                @endsession

                <form method="POST" action="{{ route('login') }}" class="mt-6 space-y-6">
                    @csrf

                    <div>
                        <x-label for="email" value="{{ __('Email') }}" class="block mb-1 text-sm font-medium text-gray-700" />
                        <x-input id="email" class="block w-full px-4 py-3 transition duration-200 border border-gray-300 shadow-sm rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"
                                 type="email" name="email" :value="old('email')" required autofocus autocomplete="username"
                                 placeholder="your@email.com" />
                    </div>

                    <div class="mt-4">
                        <x-label for="password" value="{{ __('Password') }}" class="block mb-1 text-sm font-medium text-gray-700" />
                        <x-input id="password" class="block w-full px-4 py-3 transition duration-200 border border-gray-300 shadow-sm rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"
                                 type="password" name="password" required autocomplete="current-password"
                                 placeholder="••••••••" />
                    </div>

                    <div class="flex items-center justify-between mt-4">
                        <label for="remember_me" class="flex items-center">
                            <x-checkbox id="remember_me" name="remember"
                                      class="w-4 h-4 text-indigo-600 border-gray-300 rounded focus:ring-indigo-500" />
                            <span class="text-sm text-gray-600 ms-2">{{ __('Remember me') }}</span>
                        </label>

                        @if (Route::has('password.request'))
                            <a class="text-sm text-indigo-600 transition duration-200 hover:text-indigo-500 hover:underline" href="{{ route('password.request') }}">
                                {{ __('Forgot password?') }}
                            </a>
                        @endif
                    </div>

                    <div class="flex flex-col mt-6 space-y-4">
                        <x-button class="w-full flex justify-center px-6 py-3 bg-indigo-600 hover:bg-indigo-700 text-white font-medium rounded-xl shadow-md hover:shadow-lg transform hover:-translate-y-0.5 transition duration-200 ease-in-out">
                            {{ __('Log in') }}
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 ml-2 -mr-1" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L12.586 11H5a1 1 0 110-2h7.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </x-button>

                        <div class="text-sm text-center text-gray-600">
                            Don't have an account?
                            <a href="{{ route('register') }}" class="font-medium text-indigo-600 transition duration-200 hover:text-indigo-500 hover:underline">
                                Register here
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </x-authentication-card>
    </div>
    @include('auth.footer')
</x-guest-layout>
