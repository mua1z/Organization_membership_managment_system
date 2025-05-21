<x-guest-layout>
    @include('auth.navb')
    <div class="flex items-center justify-center min-h-screen px-4 py-12 sm:px-6 lg:px-8 bg-gray-50">
        <!-- Green Header + Card Container -->
        <div class="w-full max-w-md overflow-hidden shadow-lg rounded-xl">
            <!-- Normal Green Top Section (using green-500) -->
            <div class="px-6 py-4 text-center bg-green-500">
                <h2 class="text-2xl font-bold text-white">Welcome Back</h2>
                <p class="mt-1 text-green-100">Enter your email and password to access your account</p>
            </div>

            <!-- White Form Card -->
            <x-authentication-card class="border-0 rounded-t-none">
                <div class="p-8">
                    <!-- Google Login Button -->
                    <div class="mb-6">
                        <a href="{{ route('google.login') }}" class="flex items-center justify-center w-full px-4 py-3 text-sm font-medium text-gray-700 transition-all duration-200 bg-white border border-gray-300 rounded-lg shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                            <svg class="w-5 h-5 mr-3" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z" fill="#4285F4"/>
                                <path d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z" fill="#34A853"/>
                                <path d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z" fill="#FBBC05"/>
                                <path d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z" fill="#EA4335"/>
                            </svg>
                            Continue with Google
                        </a>
                    </div>

                    <!-- Divider -->
                    <div class="relative mb-6">
                        <div class="absolute inset-0 flex items-center">
                            <div class="w-full border-t border-gray-300"></div>
                        </div>
                        <div class="relative flex justify-center text-sm">
                            <span class="px-2 text-gray-500 bg-white">Or sign in with email</span>
                        </div>
                    </div>

                    <!-- Email/Password Form -->
                    <form method="POST" action="{{ route('login') }}" class="space-y-4">
                        @csrf

                        <div>
                            <x-label for="email" value="{{ __('Email') }}" class="block text-sm font-medium text-gray-700" />
                            <x-input id="email" class="block w-full px-4 py-3 mt-1 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500"
                                    type="email" name="email" :value="old('email', 'your.email@example.com')" required autofocus />
                        </div>

                        <div>
                            <x-label for="password" value="{{ __('Password') }}" class="block text-sm font-medium text-gray-700" />
                            <x-input id="password" class="block w-full px-4 py-3 mt-1 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500"
                                    type="password" name="password" required autocomplete="current-password" />
                        </div>

                        <div class="flex items-center justify-between">
                            <label for="remember_me" class="flex items-center">
                                <x-checkbox id="remember_me" name="remember"
                                        class="w-4 h-4 text-green-500 border-gray-300 rounded focus:ring-green-500" />
                                <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                            </label>

                            <a href="{{ route('password.request') }}" class="text-sm text-green-500 hover:text-green-600 hover:underline">
                                {{ __('Forgot password?') }}
                            </a>
                        </div>

                        <x-button class="w-full px-4 py-3 text-white bg-green-500 rounded-lg hover:bg-green-600 focus:ring-2 focus:ring-green-500 focus:ring-offset-2">
                            {{ __('Sign in') }}
                        </x-button>
                    </form>

                    <div class="mt-4 text-center">
                        <p class="text-sm text-gray-600">
                            Don't have an account?
                            <a href="{{ route('register') }}" class="font-medium text-green-500 hover:text-green-600 hover:underline">
                                {{ __('Register') }}
                            </a>
                        </p>
                    </div>
                </div>
            </x-authentication-card>
        </div>
    </div>
    @include('auth.footer')
</x-guest-layout>
