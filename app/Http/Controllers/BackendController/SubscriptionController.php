<?php

namespace App\Http\Controllers\BackendController;

use App\Http\Controllers\Controller;
use App\Models\Plan;
use App\Models\Subscription;
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
}
