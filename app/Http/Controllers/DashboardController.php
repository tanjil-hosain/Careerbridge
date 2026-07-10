<?php

namespace App\Http\Controllers;

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

        return redirect()->route('jobseeker.dashboard');
    }

    public function adminDashbaord(){
        return view('backend.admin.dashboard');
    }

    public function employerDashboard(){
        return view('backend.employer.dashboard');

    }


    public function job_seekerdDashboard(){
        return view('backend.job_seeker.dashboard');
    }
}
