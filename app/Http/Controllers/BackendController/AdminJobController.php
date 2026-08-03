<?php

namespace App\Http\Controllers\BackendController;

use App\Http\Controllers\Controller;
use App\Models\Job;

class AdminJobController extends Controller
{
    public function index()
    {
        $jobs = Job::with(['company', 'category'])
            ->latest()
            ->paginate(10);

        return view('backend.admin.job.index', compact('jobs'));
    }

    public function show(Job $job)
    {
        $job->load(['company', 'category']);

        return view('backend.admin.job.show', compact('job'));
    }

    public function destroy(Job $job)
    {
        $job->delete();

        return redirect()
            ->route('admin.jobs.index')
            ->with('success', 'Job deleted successfully.');
    }
}
