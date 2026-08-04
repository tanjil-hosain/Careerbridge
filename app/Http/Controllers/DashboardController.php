<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Company;
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


   public function adminDashboard()
    {
        return view('backend.admin.dashboard', [
            // Spatie er bodole normal database column query use korbi:
            'totalEmployers' => User::where('role', 'employer')->count(),
            'totalJobSeekers' => User::where('role', 'job_seeker')->count(),
            
            'totalCompanies' => Company::count(),
            'totalJobs' => Job::where('status', 'active')->count(), 
            'totalApplications' => Application::count(),
            'totalPlans' => Plan::where('status', 'active')->count(), 
            
            'latestJobs' => Job::with('company')
                ->latest()
                ->take(5)
                ->get(),

            'latestApplications' => Application::with([
                    'user',
                    'job'
                ])
                ->latest()
                ->take(5)
                ->get(),

            'latestCompanies' => Company::latest()
                ->take(5)
                ->get(),
        ]);
    }

    public function employerDashboard()
    {
        $company = Company::where('user_id', auth()->id())->first();

        $totalJobs = 0;
        $activeJobs = 0;
        $totalApplications = 0;

        if ($company) {
            $totalJobs = Job::where('company_id', $company->id)->count();

            $activeJobs = Job::where('company_id', $company->id)
                ->where('status', 1)
                ->count();

            $totalApplications = Application::whereHas('job', function ($q) use ($company) {
                $q->where('company_id', $company->id);
            })->count();
        }

        $subscription = Subscription::with('plan')
            ->where('user_id', auth()->id())
            ->where('status', 'active')
            ->latest()
            ->first();

        $recentApplications = Application::with(['user', 'job'])
            ->whereHas('job', function ($q) use ($company) {
                if ($company) {
                    $q->where('company_id', $company->id);
                }
            })
            ->latest()
            ->take(5)
            ->get();

        return view('backend.employer.dashboard', compact(
            'totalJobs',
            'activeJobs',
            'totalApplications',
            'subscription',
            'recentApplications'
        ));
    }

    // Spelling fixed: jobSeekerDashboard (or match with your web.php route)
    public function jobSeekerDashboard()
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