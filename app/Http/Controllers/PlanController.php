<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Plan;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;



class PlanController extends Controller
{


   public function ShowUpgradePlan()
    {
        $user = Auth::user();
        $plans = Plan::where('type', $user->role)->get();

        return view('organAdmin.plans.upgrade', compact('plans', 'user'));
    }

    public function UpgradePlan(Request $request)
    {
        $user = Auth::user();
        $plan = Plan::findOrFail($request->plan_id);

        if ($plan->type !== $user->role) {
            return back()->with('error', 'Invalid plan for your role.');
        }

        // If free, upgrade instantly
       if ($plan->price == 0) {
            $expiry = $plan->billing_cycle === 'free' && $plan->type === 'member'
                      ? now()->addDays($plan->duration_days)
                      : null;

            $user->update([
                'plan_id' => $plan->id,
                'plan_expiry' => $expiry,
            ]);


            return back()->with('success', 'Plan upgraded successfully!');
        }

        // If paid, redirect to payment page
      return redirect()->to('/payment/' . $plan->id);
    }
}
