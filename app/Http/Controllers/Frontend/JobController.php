<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Job;
use Illuminate\Http\Request;
use Inertia\Inertia;

class JobController extends Controller
{
    public function index(Request $request)
    {
        $jobs = Job::with(['company', 'category'])
            ->where('status', true)

            ->when($request->keyword, function ($query) use ($request) {
                $query->where('title', 'LIKE', '%' . $request->keyword . '%');
            })

            ->when($request->category, function ($query) use ($request) {
                $query->where('category_id', $request->category);
            })

            ->when($request->location, function ($query) use ($request) {
                $query->where('location', 'LIKE', '%' . $request->location . '%');
            })
            ->when($request->job_type, function ($query) use ($request) {
                $query->where('job_type', $request->job_type);
            })

            ->latest()
            ->paginate(9)
            ->withQueryString();

        return Inertia::render('Jobs/Index', [

            'jobs' => $jobs,

            'categories' => Category::all(),

            'filters' => $request->only([
                'keyword',
                'category',
                'location'
            ])

        ]);
    }

    public function show($slug)
    {
        $job = Job::with([
            'company',
            'category'
        ])
            ->where('slug', $slug)
            ->where('status', 1)
            ->firstOrFail();

        // Related Jobs
        $relatedJobs = Job::with('company')
            ->where('category_id', $job->category_id)
            ->where('id', '!=', $job->id)
            ->where('status', 1)
            ->latest()
            ->take(4)
            ->get();

        return Inertia::render('Jobs/Show', [
            'job' => $job,
            'relatedJobs' => $relatedJobs,
        ]);
    }
}
