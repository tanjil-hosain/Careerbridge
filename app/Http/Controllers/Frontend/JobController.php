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
            ->where('status', 'active')

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
}
