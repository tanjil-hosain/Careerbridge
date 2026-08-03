<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Application;
use App\Models\Job;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ApplicationController extends Controller
{
public function create(Job $job)
{
    $job->load('company');

    // Check if current user already applied
    $hasApplied = Application::where('job_id', $job->id)
        ->where('user_id', auth()->id())
        ->exists();

    return Inertia::render('Jobs/Apply', [
        'job' => $job,
        'hasApplied' => $hasApplied,
    ]);
}

    public function store(Request $request, Job $job)
    {
        $request->validate([
            'resume' => 'required|mimes:pdf,doc,docx|max:2048',
            'cover_letter' => 'required|min:5',
        ]);

        // Check Job
        if ($job->status != 1) {
            return back()->with('error', 'This job is not available.');
        }

        if ($job->deadline && now()->gt($job->deadline)) {
            return back()->with('error', 'Application deadline has passed.');
        }

        // Already Applied
        $exists = Application::where('job_id', $job->id)
            ->where('user_id', auth()->id())
            ->exists();

        if ($exists) {
            return back()->with('error', 'You have already applied for this job.');
        }

        // Upload Resume
        $resumePath = null;

        if ($request->hasFile('resume')) {
            $resumePath = $request->file('resume')->store('resumes', 'public');
        }

        // Save
        Application::create([
            'job_id' => $job->id,
            'user_id' => auth()->id(),
            'cover_letter' => $request->cover_letter,
            'resume' => $resumePath,
            'status' => 'pending',
        ]);

        return redirect()
            ->route('jobs.show', $job->slug)
            ->with('success', 'Application submitted successfully.');
    }
}