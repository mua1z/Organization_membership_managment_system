<x-app-layout>
    <div class="container">
        <h2>Upgrade Your Plan</h2>

        <form action="{{ route('organAdmin.plans.upgrade') }}" method="POST">
            @csrf
            <select name="plan_id" required>
                @foreach($plans as $plan)
                    <option value="{{ $plan->id }}" {{ $user->plan_id == $plan->id ? 'selected' : '' }}>
                        {{ $plan->name }} - ${{ $plan->price }}
                    </option>
                @endforeach
            </select>
            <button type="submit">Upgrade Plan</button>
        </form>
    </div>
</x-app-layout>
