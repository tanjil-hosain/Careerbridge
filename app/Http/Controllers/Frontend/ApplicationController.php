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
    return Inertia::render('Jobs/Apply', [

        'job' => $job

    ]);
}
    public function store(Job $job)
    {
        // Job Active?
        if ($job->status != 1) {

            return back()->with('error', 'Job is not available.');

        }

        // Deadline Check
        if ($job->deadline < now()->toDateString()) {

            return back()->with('error', 'Application deadline has passed.');

        }

        // Already Applied?
        $exists = Application::where('job_id', $job->id)
            ->where('user_id', auth()->id())
            ->exists();

        if ($exists) {

            return back()->with('error', 'You have already applied.');

        }

        Application::create([

            'job_id' => $job->id,

            'user_id' => auth()->id(),

            'status' => 'Pending',

        ]);

        return back()->with('success', 'Application submitted successfully.');
    }
}