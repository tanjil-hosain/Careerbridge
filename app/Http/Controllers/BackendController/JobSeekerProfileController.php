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

        if (!$profile) {
            return redirect()
                ->route('job_seeker.profile.create')
                ->with('warning', 'Please create your profile first.');
        }

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
        $request->validate([
            'full_name' => 'required|string',
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string',
            'education' => 'nullable|string|max:255',
            'skills' => 'nullable|string|max:255',
            'experience' => 'nullable|string|max:255',
            'resume' => 'nullable|mimes:pdf|max:2048',
            'profile_photo' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $resumePath = null;
        $photoPath = null;

        if ($request->hasFile('resume')) {
            $resumePath = $request->file('resume')->store('resumes', 'public');
        }

        if ($request->hasFile('profile_photo')) {
            $photoPath = $request->file('profile_photo')->store('job_seekers', 'public');
        }

        $profile = new JobSeekerProfile();

        $profile->user_id = auth()->id();
        $profile->full_name = $request->full_name;
        $profile->phone = $request->phone;
        $profile->address = $request->address;
        $profile->education = $request->education;
        $profile->skills = $request->skills;
        $profile->experience = $request->experience;
        $profile->resume = $resumePath;
        $profile->profile_photo = $photoPath;
        $profile->status = true;

        $profile->save();

        return redirect()
            ->route('job_seeker.profile.index')
            ->with('success', 'Profile Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(JobSeekerProfile  $profile)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(JobSeekerProfile  $profile)
    {
        if ($profile->user_id != auth()->id()) {
            abort(403);
        }

        return view('backend.job_seeker.profile.edit', ['jobSeekerProfile'=>$profile]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, JobSeekerProfile  $profile)
    {
        if ($profile->user_id != auth()->id()) {
            abort(403);
        }

        $request->validate([
            'full_name' => 'required|string|max:255',
            'phone' => 'nullable|string',
            'address' => 'nullable|string',
            'education' => 'nullable|string',
            'skills' => 'nullable|string',
            'experience' => 'nullable|string',
            'resume' => 'nullable|mimes:pdf|max:2048',
            'profile_photo' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        if ($request->hasFile('resume')) {
            $profile->resume = $request->file('resume')->store('resumes', 'public');
        }

        if ($request->hasFile('profile_photo')) {
            $profile->profile_photo = $request->file('profile_photo')->store('job_seekers', 'public');
        }

        $profile->full_name = $request->full_name;
        $profile->phone = $request->phone;
        $profile->address = $request->address;
        $profile->education = $request->education;
        $profile->skills = $request->skills;
        $profile->experience = $request->experience;

        $profile->save();

        return redirect()->route('job_seeker.profile.index')
            ->with('success', 'Profile Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(JobSeekerProfile  $profile)
    {
        //
    }
}
