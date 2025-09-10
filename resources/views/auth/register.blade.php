Name, Emaile, Select role, Phone Plan, Password, are comon for all of them

Show for only member Organ field and sex

Therefore the form will change to the following after fill name, email and chose member role Organ field and sex only for member
Plan
Phone
 Password but, not change any thing for admin and organizatin and stay former style  for all
<x-guest-layout>
    @include('auth.navb')
    <div class="flex items-center justify-center min-h-screen px-4 py-12 mt-10 bg-green-500 sm:px-6 lg:px-8">
        <!-- Container -->
        <div class="w-full max-w-md overflow-hidden bg-black shadow-lg rounded-3xl">
            <x-authentication-card class="w-full bg-green-600 border-0">
                 <x-validation-errors class="mb-4" />

        @session('status')
            <div class="mb-4 text-sm font-medium text-green-600">
                {{ $value }}
            </div>
        @endsession

                <div class="w-full px-8 py-3 text-center bg-black">
                    <!-- Dynamic title based on form type -->
                    <h2 class="text-2xl font-bold text-black rounded-full" id="formTitle">Create Account</h2>
                    <p class="mt-1 text-green-100" id="formSubtitle">Sign up with email and start your journey</p>

                    <div class="w-full p-8">
                        <!-- Register Form (initially visible) -->
                        <div id="registerForm">
                            <!-- Google Register -->
                            <div class="w-full mb-6">
                                <a href="{{ route('google.login') }}" class="flex items-center justify-center w-full px-4 py-3 text-sm font-medium text-gray-700 transition-all duration-200 bg-green-800 border border-gray-300 rounded-lg shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
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
                            <div class="relative w-full mb-6">
                                <div class="absolute inset-0 flex items-center">
                                    <div class="w-full border-t border-gray-300"></div>
                                </div>
                                <div class="relative flex justify-center text-sm">
                                    <span class="px-2 text-gray-500 bg-white">Or Register with Email</span>
                                </div>
                            </div>

                            <!-- Registration Form -->
                            <form method="POST" action="{{ route('register') }}" class="w-full space-y-6">
                                @csrf

                                <div class="w-full space-y-6">
                                    <!-- Personal Information -->
                                    <div class="grid w-full grid-cols-1 gap-6 md:grid-cols-2">
                                        <div class="w-full">
                                            <x-label for="name" value="{{ __('Name') }}" class="block w-full mb-1 text-sm font-medium text-gray-700" />
                                            <x-input id="name" class="block w-full px-4 py-3 transition duration-200 border border-gray-300 shadow-sm rounded-xl focus:ring-2 focus:ring-green-500 focus:border-green-500"
                                                     type="text" name="name" :value="old('name')" required autofocus autocomplete="name"
                                                     placeholder="John Doe" />
                                        </div>

                                        <div class="w-full">
                                            <x-label for="email" value="{{ __('Email') }}" class="block w-full mb-1 text-sm font-medium text-gray-700" />
                                            <x-input id="email" class="block w-full px-4 py-3 transition duration-200 border border-gray-300 shadow-sm rounded-xl focus:ring-2 focus:ring-green-500 focus:border-green-500"
                                                     type="email" name="email" :value="old('email')" required autocomplete="username"
                                                     placeholder="john@example.com" />
                                        </div>
                                    </div>

                                    <div class="grid w-full grid-cols-1 gap-6 md:grid-cols-2">
                                        <div class="w-full">
                                            <x-label for="phone" value="{{ __('Phone') }}" class="block w-full mb-1 text-sm font-medium text-gray-700" />
                                            <x-input id="phone" class="block w-full px-4 py-3 transition duration-200 border border-gray-300 shadow-sm rounded-xl focus:ring-2 focus:ring-green-500 focus:border-green-500"
                                                     type="text" name="phone" :value="old('phone')" required autofocus autocomplete="phone"
                                                     placeholder="+1 (555) 123-4567" />
                                        </div>

                                        <div class="w-full">
                                            <x-label for="organization_name" value="{{ __('Organization Name') }}" class="block w-full mb-1 text-sm font-medium text-gray-700" />
                                            <x-input id="organization_name" class="block w-full px-4 py-3 transition duration-200 border border-gray-300 shadow-sm rounded-xl focus:ring-2 focus:ring-green-500 focus:border-green-500"
                                                     type="text" name="organization_name" :value="old('organization_name')" required autofocus autocomplete="organization_name"
                                                     placeholder="Acme Inc." />
                                        </div>
                                    </div>

                                    <!-- Organization Details -->
                                    <div class="grid w-full grid-cols-1 gap-6 md:grid-cols-2">
                                        <div class="w-full">
                                            <x-label for="organization_type" value="{{ __('Organization Type') }}" class="block w-full mb-1 text-sm font-medium text-gray-700" />
                                            <select id="organization_type" name="organization_type"
                                                    class="block w-full px-4 py-3 transition duration-200 bg-white border border-gray-300 shadow-sm rounded-xl focus:ring-2 focus:ring-green-500 focus:border-green-500"
                                                    required>
                                                <option value="">Select Organization Type</option>
                                                <option value="corporate" {{ old('organization_type') == 'corporate' ? 'selected' : '' }}>Corporate</option>
                                                <option value="non_profit" {{ old('organization_type') == 'non_profit' ? 'selected' : '' }}>Non-Profit</option>
                                                <option value="government" {{ old('organization_type') == 'government' ? 'selected' : '' }}>Government</option>
                                                <option value="startup" {{ old('organization_type') == 'startup' ? 'selected' : '' }}>Startup</option>
                                                <option value="educational" {{ old('organization_type') == 'educational' ? 'selected' : '' }}>Educational</option>
                                            </select>
                                        </div>

                                        <div class="w-full">
                                            <x-label for="plan" value="{{ __('Plan') }}" class="block w-full mb-1 text-sm font-medium text-gray-700" />
                                            <select id="plan" name="plan"
                                                    class="block w-full px-4 py-3 transition duration-200 bg-white border border-gray-300 shadow-sm rounded-xl focus:ring-2 focus:ring-green-500 focus:border-green-500"
                                                    required>
                                                <option value="">Select Plan Type</option>
                                                <option value="basic" {{ old('plan') == 'basic' ? 'selected' : '' }}>Basic</option>
                                                <option value="pro" {{ old('plan') == 'pro' ? 'selected' : '' }}>Pro</option>
                                                <option value="enter" {{ old('plan') == 'enter' ? 'selected' : '' }}>Enterprise</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="w-full">
                                        <x-label for="member" value="{{ __('Members Numbers') }}" class="block w-full mb-1 text-sm font-medium text-gray-700" />
                                        <x-input id="member" class="block w-full px-4 py-3 transition duration-200 border border-gray-300 shadow-sm rounded-xl focus:ring-2 focus:ring-green-500 focus:border-green-500"
                                                 type="number" name="member" :value="old('member')" required autofocus autocomplete="member"
                                                 placeholder="10" />
                                    </div>


                                    <!-- Password Fields -->
                                    <div class="grid w-full grid-cols-1 gap-6 md:grid-cols-2">
                                        <div class="w-full">
                                            <x-label for="password" value="{{ __('Password') }}" class="block w-full mb-1 text-sm font-medium text-gray-700" />
                                            <x-input id="password" class="block w-full px-4 py-3 transition duration-200 border border-gray-300 shadow-sm rounded-xl focus:ring-2 focus:ring-green-500 focus:border-green-500"
                                                     type="password" name="password" required autocomplete="new-password"
                                                     placeholder="••••••••" />
                                        </div>

                                        <div class="w-full">
                                            <x-label for="password_confirmation" value="{{ __('Confirm Password') }}" class="block w-full mb-1 text-sm font-medium text-gray-700" />
                                            <x-input id="password_confirmation" class="block w-full px-4 py-3 transition duration-200 border border-gray-300 shadow-sm rounded-xl focus:ring-2 focus:ring-green-500 focus:border-green-500"
                                                     type="password" name="password_confirmation" required autocomplete="new-password"
                                                     placeholder="••••••••" />
                                        </div>
                                    </div>
                                </div>

                                @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                                    <div class="w-full mt-6">
                                        <x-label for="terms">
                                            <div class="flex items-center">
                                                <x-checkbox name="terms" id="terms" required
                                                            class="w-4 h-4 text-green-600 border-gray-300 rounded focus:ring-green-500" />

                                                <div class="text-sm text-gray-600 ms-2">
                                                    {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                                            'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="font-medium text-green-600 hover:text-green-500 hover:underline">'.__('Terms of Service').'</a>',
                                                            'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="font-medium text-green-600 hover:text-green-500 hover:underline">'.__('Privacy Policy').'</a>',
                                                    ]) !!}
                                                </div>
                                            </div>
                                        </x-label>
                                    </div>
                                @endif

                                <x-button class="flex justify-center w-full px-4 py-3 text-white bg-green-500 rounded-lg hover:bg-green-600 focus:ring-2 focus:ring-green-500 focus:ring-offset-2">
                                    {{ __('Register') }}
                                </x-button>
                            </form>

                            <div class="w-full mt-4 text-center">
                                <p class="text-sm text-black">
                                    Already have an account?
                                    <button id="showLoginForm" class="font-medium text-green-500 hover:text-green-600 hover:underline focus:outline-none">
                                        {{ __('Login Here') }}
                                    </button>
                                </p>
                            </div>
                        </div>

                        <!-- Login Form (initially hidden) -->
                        <div id="loginForm" class="hidden">
                            <!-- Google Login -->
                            <div class="w-full mb-6">
                                <a href="{{ route('google.login') }}" class="flex items-center justify-center w-full px-4 py-3 text-sm font-medium text-gray-700 transition-all duration-200 bg-green-800 border border-gray-300 rounded-lg shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
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
                            <div class="relative w-full mb-6">
                                <div class="absolute inset-0 flex items-center">
                                    <div class="w-full border-t border-gray-300"></div>
                                </div>
                                <div class="relative flex justify-center text-sm">
                                    <span class="px-2 text-gray-500 bg-white">Or Login with Email</span>
                                </div>
                            </div>

                            <!-- Login Form -->
                            <form method="POST" action="{{ route('login') }}" class="w-full space-y-6">
                                @csrf

                                <div>
                                    <x-label for="login_email" value="{{ __('Email') }}" class="block text-sm font-medium text-gray-700" />
                                    <x-input id="login_email" class="block w-full px-4 py-3 mt-1 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-green-500 focus:border-green-500"
                                            type="email" name="email" :value="old('email')" required autofocus />
                                </div>

                                <div>
                                    <x-label for="login_password" value="{{ __('Password') }}" class="block text-sm font-medium text-gray-700" />
                                    <x-input id="login_password" class="block w-full px-4 py-3 mt-1 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-green-500 focus:border-green-500"
                                            type="password" name="password" required autocomplete="current-password" />
                                </div>

                                <div class="flex items-center justify-between">
                                    <label for="remember_me" class="flex items-center">
                                        <x-checkbox id="remember_me" name="remember" class="text-green-600 border-gray-300 rounded focus:ring-green-500" />
                                        <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                                    </label>

                                    @if (Route::has('password.request'))
                                        <a href="{{ route('password.request') }}" class="text-sm text-green-600 hover:text-green-500">
                                            {{ __('Forgot your password?') }}
                                        </a>
                                    @endif
                                </div>

                                <x-button class="flex justify-center w-full px-4 py-3 text-white bg-green-500 rounded-lg hover:bg-green-600 focus:ring-2 focus:ring-green-500 focus:ring-offset-2">
                                    {{ __('Log in') }}
                                </x-button>
                            </form>

                            <div class="w-full mt-4 text-center">
                                <p class="text-sm text-black">
                                    Don't have an account?
                                    <button id="showRegisterForm" class="font-medium text-green-500 hover:text-green-600 hover:underline focus:outline-none">
                                        {{ __('Register Here') }}
                                    </button>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </x-authentication-card>
        </div>
    </div>
    @include('auth.footer')

    <script>
        document.getElementById('showLoginForm').addEventListener('click', function() {
            document.getElementById('registerForm').classList.add('hidden');
            document.getElementById('loginForm').classList.remove('hidden');
            document.getElementById('formTitle').textContent = 'Welcome Back';
            document.getElementById('formSubtitle').textContent = 'Enter your email and password to access your account';
        });

        document.getElementById('showRegisterForm').addEventListener('click', function() {
            document.getElementById('loginForm').classList.add('hidden');
            document.getElementById('registerForm').classList.remove('hidden');
            document.getElementById('formTitle').textContent = 'Create Account';
            document.getElementById('formSubtitle').textContent = 'Sign up with email and start your journey';
        });
    </script>
</x-guest-layout>
