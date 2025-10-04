

<x-app-layout>
    <div class="max-w-6xl px-6 py-12 mx-auto">
        <h2 class="mb-8 text-3xl font-bold text-center">Upgrade Your Plan</h2>

        {{-- Toggle Personal / Business (optional) --}}
        <div class="flex justify-center mb-10">
            <div class="flex p-1 space-x-2 bg-gray-200 rounded-full">
                <button type="button" class="px-4 py-1 text-sm font-medium bg-white rounded-full shadow">
                    Personal
                </button>

            </div>
        </div>

        {{-- Plans Grid --}}
        <div class="grid grid-cols-1 gap-6 md:grid-cols-3">
            @foreach($plans as $plan)
                <div class="flex flex-col p-6 bg-white border border-gray-200 shadow-lg rounded-2xl">

                    {{-- Header --}}
                    <h3 class="mb-2 text-xl font-semibold">{{ $plan->name }}</h3>
                    <p class="mb-4 text-gray-500">
                        {{ $plan->billing_cycle === 'free' ? 'Free forever' : ucfirst($plan->billing_cycle) }} plan
                    </p>

                    {{-- Price --}}
                    <div class="mb-6 text-4xl font-bold">
                        ${{ $plan->price }}
                        <span class="text-base font-medium text-gray-500">/month</span>
                    </div>

                    {{-- Features --}}
                    <ul class="flex-grow space-y-2 text-gray-600">
                        @if($plan->type === 'organAdmin')
                            <li>👥 Up to {{ $plan->max_members ?? 'Unlimited' }} members</li>
                        @endif
                        @if($plan->duration_days)
                            <li>📅 Duration: {{ $plan->duration_days }} days</li>
                        @endif
                        <li>⚡ Priority support</li>
                        <li>🔒 Secure system access</li>
                    </ul>

                    {{-- Action --}}
                    <form action="{{ route('organAdmin.plans.upgrade') }}" method="POST" class="mt-6">
                        @csrf
                        <input type="hidden" name="plan_id" value="{{ $plan->id }}">
                        <button
                            type="submit"
                            class="w-full py-3 rounded-full font-semibold transition
                                   {{ $user->plan_id == $plan->id
                                        ? 'bg-gray-300 text-gray-600 cursor-not-allowed'
                                        : 'bg-indigo-600 text-white hover:bg-indigo-700' }}">
                            {{ $user->plan_id == $plan->id ? 'Your Current Plan' : 'Get ' . $plan->name }}
                        </button>
                    </form>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>

