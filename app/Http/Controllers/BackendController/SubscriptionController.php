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
}
