<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Job;
use App\Models\Plan;
use App\Models\Subscription;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        if ($user->role === 'admin') {
            return redirect()->route('admin.dashboard');
        }

        if ($user->role === 'employer') {
            return redirect()->route('employer.dashboard');
        }

        return redirect()->route('job_seeker.dashboard');
    }

    public function adminDashbaord()
    {
        return view('backend.admin.dashboard');
    }

    public function employerDashboard()
    {
        return view('backend.employer.dashboard');
    }


    public function job_seekerdDashboard()
    {

        $appliedJobs = Application::where('user_id', auth()->id())->count();

        $subscription = Subscription::with('plan')
            ->where('user_id', auth()->id())
            ->where('status', 'active')
            ->latest()
            ->first();
        $recentApplications = Application::with('job.company')
            ->where('user_id', auth()->id())
            ->latest()
            ->take(5)
            ->get();

        return view(
            'backend.job_seeker.dashboard',
            compact(
                'appliedJobs',
                'subscription',
                'recentApplications'
            )
        );
    }
}
