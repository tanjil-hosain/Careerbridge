<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Application;
use App\Models\Category;
use App\Models\Company;
use App\Models\Job;
use Illuminate\Http\Request;
use Inertia\Inertia;

class HomeController extends Controller
{
public function index()
    {
        $jobs = Job::where('status', true)
            ->with('company') // <-- Ekhane relation ta add kore dite hobe!
            ->latest()
            ->take(10)
            ->get();

        $categories = Category::where('status', true)
        ->withCount('job')
        ->get();
        $companies = Company::where('status', true)->latest()->take(8)->get();

       return Inertia::render('Home', [
            'jobs' => $jobs,
            'categories' => $categories,
            'companies' => $companies
        ]);
    }

    public function jobDetails(Job $job)
    {
       
        $job->load(['company', 'category']);

        $alreadyApplied = false;

        if(auth()->check() && auth()->user()->role=='job_seeker'){
            $alreadyApplied = Application::where('job_id', $job->id)
            ->where('user_id', auth()->id())->exists();
        }

        return Inertia::render('JobDetails', [
            'job' => $job,
            'alreadyApplied' => $alreadyApplied
        ]);
    }
}
