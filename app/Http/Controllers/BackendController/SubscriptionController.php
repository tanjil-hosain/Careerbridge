<?php

namespace App\Http\Controllers\BackendController;

use App\Http\Controllers\Controller;
use App\Models\Plan;
use App\Models\Subscription;
use Carbon\Carbon;
use Illuminate\Http\Request;


class SubscriptionController extends Controller
{
    public function employerPlans()
    {
        $plans = Plan::where('type', 'employer')
            ->where('status', true)
            ->orderBy('price')
            ->get();

        return view('backend.employer.subscription.index', compact('plans'));
    }

    public function jobSeekerPlans()
    {
        $plans = Plan::where('type', 'job_seeker')
            ->where('status', 1)
            ->orderBy('price')
            ->get();

        return view('backend.job_seeker.subscription.index', compact('plans'));
    }

    public function checkout(Plan $plan)
    {
        // Inactive plan access block
        if (!$plan->status) {
            abort(404);
        }

        // Employer can only buy employer plans
        if (auth()->user()->role == 'employer' && $plan->type != 'employer') {
            abort(403);
        }

        // Job seeker can only buy job seeker plans
        if (auth()->user()->role == 'job_seeker' && $plan->type != 'job_seeker') {
            abort(403);
        }

        // Load different checkout page based on role
        if (auth()->user()->role == 'employer') {
            return view('backend.employer.subscription.checkout', compact('plan'));
        }

        return view('backend.job_seeker.subscription.checkout', compact('plan'));
    }

    public function pay(Request $request)
    {
        $request->validate([
            'plan_id' => 'required|exists:plans,id',
            'payment_method' => 'required',
            'mobile' => 'required',
            'pin' => 'required|min:4|max:6',
        ]);

        $plan = Plan::findOrFail($request->plan_id);

        // Security Check
        if ($plan->type != auth()->user()->role) {
            abort(403);
        }

        // Old Active Subscription Expire
        Subscription::where('user_id', auth()->id())
            ->where('status', 'active')
            ->update([
                'status' => 'expired',
            ]);

        // New Subscription
        Subscription::create([
            'user_id' => auth()->id(),
            'plan_id' => $plan->id,
            'amount' => $plan->price,
            'remaining_limit' => $plan->limit,
            'start_date' => now(),
            'end_date' => Carbon::now()->addDays($plan->duration),
            'payment_status' => 'paid',
            'status' => 'active',
            'transaction_id' => 'TXN' . time(),
        ]);

        if (auth()->user()->role == 'employer') {
            return redirect()
                ->route('employer.subscription.plans')
                ->with('success', 'Subscription activated successfully.');
        }
        return redirect()
            ->route('job_seeker.subscription.plans')
            ->with('success', 'Subscription activated successfully.');
    }
}
