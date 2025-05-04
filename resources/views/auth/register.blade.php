
<x-guest-layout>
@include('auth.navb')
<div style="margin: 90px">
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <x-validation-errors class="mb-4" />

     
         
          

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div>
                <x-label for="name" value="{{ __('Name') }}" />
                <x-input id="name" class="block w-full mt-1" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            </div>

            <div class="mt-4">
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input id="email" class="block w-full mt-1" type="email" name="email" :value="old('email')" required autocomplete="username" />
            </div>

            <div>
                <x-label for="phone" value="{{ __('Phone') }}" />
                <x-input id="phone" class="block w-full mt-1" type="text" name="phone" :value="old('phone')" required autofocus autocomplete="phone" />
            </div>
           
            <div>
                <x-label for="organization_name" value="{{ __('Organization_name') }}" />
                <x-input id="organization_name" class="block w-full mt-1" type="text" name="organization_name" :value="old('organization_name')" required autofocus autocomplete="organization_name" />
            </div>
            
            <div>
    <x-label for="organization_type" value="{{ __('Organization Type') }}" />

    <select id="organization_type" name="organization_type" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500" required>
        <option value="">Select Organization Type</option>
        <option value="corporate" {{ old('organization_type') == 'corporate' ? 'selected' : '' }}>Corporate</option>
        <option value="non_profit" {{ old('organization_type') == 'non_profit' ? 'selected' : '' }}>Non-Profit</option>
        <option value="government" {{ old('organization_type') == 'government' ? 'selected' : '' }}>Government</option>
        <option value="startup" {{ old('organization_type') == 'startup' ? 'selected' : '' }}>Startup</option>
        <option value="educational" {{ old('organization_type') == 'educational' ? 'selected' : '' }}>Educational</option>
    </select>
    
</div>

<div>

<x-label for="plan" value="{{ __('Plan') }}" />

<select id="plan" name="plan" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500" required>
    <option value="">Select Plan Type</option>
    <option value="basic" {{ old('plan') == 'basic' ? 'selected' : '' }}>Basic</option>
    <option value="pro" {{ old('plan') == 'pro' ? 'selected' : '' }}>Pro</option>
    <option value="enter" {{ old('plan') == 'enter' ? 'selected' : '' }}>Enter</option>
    
</select>
</div>
<div>
<x-label for="member" value="{{ __('Members Numbers') }}" />
        <x-input id="member" class="block w-full mt-1" type="number" name="member" :value="old('member')" required autofocus autocomplete="member" />
</div>



            <div class="mt-4">
                <x-label for="password" value="{{ __('Password') }}" />
                <x-input id="password" class="block w-full mt-1" type="password" name="password" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                <x-input id="password_confirmation" class="block w-full mt-1" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-label for="terms">
                        <div class="flex items-center">
                            <x-checkbox name="terms" id="terms" required />

                            <div class="ms-2">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="text-sm text-gray-600 underline rounded-md hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Terms of Service').'</a>',
                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="text-sm text-gray-600 underline rounded-md hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Privacy Policy').'</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-label>
                </div>
            @endif

            <div class="flex items-center justify-end mt-4">
           
            <a href="{{ route('login') }}" class="text-sm text-blue-600 hover:underline">
        Already have an account? Login
    </a>

              

                <x-button class="ms-4">
                    {{ __('Register') }}
                </x-button>
            </div>
        </form>
     
    </x-authentication-card>

    </div>
    @include('auth.footer')
   
</x-guest-layout>

