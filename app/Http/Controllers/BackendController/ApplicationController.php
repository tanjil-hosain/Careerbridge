<?php

namespace App\Http\Controllers\BackendController;

use App\Http\Controllers\Controller;
use App\Models\Application;
use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $applications = Application::with(['job.company'])
            ->where('user_id', auth()->id())
            ->latest()
            ->get();

        return view('backend.job_seeker.aplications.index', compact('applications'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Job $job)
    {
        return view('backend.job_seeker.aplications.create', compact('job'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
      
        $request->validate([
            'job_id' => 'required|exists:job_posts,id',
            'resume' => 'required|mimes:pdf|max:2048',
            'cover_letter' => 'nullable|string',
        ]);

        // Already Applied Check
        $exists = Application::where('job_id', $request->job_id)
            ->where('user_id', Auth::id())
            ->exists();

        if ($exists) {
            return back()->with('error', 'You have already applied for this job.');
        }

        // Resume Upload
        $resume = null;

        if ($request->hasFile('resume')) {
            $resume = $request->file('resume')->store('resumes', 'public');
        }

        $application = new Application();

        $application->job_id = $request->job_id;

        $application->user_id = Auth::id();

        $application->resume = $resume;

        $application->cover_letter = $request->cover_letter;

        $application->status = 'pending';

        $application->save();

        return redirect()
            ->route('job_seeker.application.index')
            ->with('success', 'Application submitted successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Application $application)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Application $application)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Application $application)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Application $application)
    {
        //
    }
}
