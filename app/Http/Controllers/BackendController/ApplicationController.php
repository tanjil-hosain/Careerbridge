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
        //
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
        'job_id' => 'required|exists:jobs,id',
        'resume' => 'required|mimes:pdf|max:2048',
        'cover_letter' => 'nullable|string|max:5000',
    ]);

    // Already Applied Check
    $exists = Application::where('job_id', $request->job_id)
        ->where('user_id', Auth::id())
        ->exists();

    if ($exists) {
        return back()->with('error', 'You have already applied for this job.');
    }

    // Resume Upload
    $resumePath = null;

    if ($request->hasFile('resume')) {
        $resumePath = $request->file('resume')->store('resumes', 'public');
    }

    // Save Application
    Application::create([
        'job_id'       => $request->job_id,
        'user_id'      => Auth::id(),
        'resume'       => $resumePath,
        'cover_letter' => $request->cover_letter,
        'status'       => 'pending',
    ]);

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
