<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Company;
use App\Models\Job;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $jobs = Job::where('status', true)
            ->latest()
            ->take(10)
            ->get();

        $categories = Category::where('status', true)->get();
        $companies = Company::where('status', true)->latest()->take(8)->get();

        return view('frontend.home', compact('jobs', 'categories', 'companies'));
    }

    public function jobDetails(Job $job)
    {
        $job->load(['company', 'category']);

        return view('frontend.pages.job_details', compact('job'));
    }
}
