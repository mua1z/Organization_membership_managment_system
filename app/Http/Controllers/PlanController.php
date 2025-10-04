<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Plan;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class PlanController extends Controller
{

public function showUpgradePlan()
    {
        $user = Auth::user();
        $plans = Plan::where('type', $user->role)->get();

        return view('plans.upgrade', compact('plans', 'user'));
    }

    public function UpgradePlan(Request $request)
{
$user = Auth::user();
        $plan = Plan::findOrFail($request->plan_id);

        // Ensure the plan matches user role
        if ($plan->type !== $user->role) {
            return back()->with('error', 'Invalid plan for your role.');
        }

        // Handle free plans automatically
        if ($plan->price == 0) {
            $expiry = $plan->billing_cycle === 'free' && $plan->type === 'member'
                      ? now()->addDays($plan->duration_days)
                      : null;

            $user->update([
                'plan_id' => $plan->id,
                'plan_expiry' => $expiry,
            ]);
        }

            return back()->with('success', 'Plan upgraded successfully!');
/*If the plan is paid, redirect to payment page // Pass the plan ID to payment page
return redirect()->url('organAdmin.payment', ['plan_id' => $plan->id]);*/
}

}
