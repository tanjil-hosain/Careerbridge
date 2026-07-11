<?php

namespace App\Http\Controllers\BackendController;

use App\Http\Controllers\Controller;
use App\Models\JobSeekerProfile;
use Illuminate\Http\Request;

class JobSeekerProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $profile = auth()->user()->jobSeekerProfile;

        return view('backend.job_seeker.profile.index', compact('profile'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $profile = auth()->user()->jobSeekerProfile;

        if ($profile) {
            return redirect()->route('job_seeker.profile.index');
        }

        return view('backend.job_seeker.profile.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(JobSeekerProfile $jobSeekerProfile)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(JobSeekerProfile $jobSeekerProfile)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, JobSeekerProfile $jobSeekerProfile)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(JobSeekerProfile $jobSeekerProfile)
    {
        //
    }
}
