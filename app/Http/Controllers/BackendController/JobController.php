<?php

namespace App\Http\Controllers\BackendController;

use App\Http\Controllers\Controller;
use App\Models\Application;
use App\Models\Category;
use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $company = auth()->user()->company;

        if (!$company) {
            return redirect()
                ->route('employer.company.create')
                ->with('warning', 'Please create your company profile first.');
        }

        $jobs = Job::where('company_id', $company->id)
            ->latest()
            ->get();

        return view('backend.employer.jobs.index', compact('jobs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $company = auth()->user()->company;

        if (!$company) {
            return redirect()->route('employer.company.create')->with('warning', 'Please create your company profile first.');
        }
        $categories = Category::where('status', true)->get();

        return view('backend.employer.jobs.create', compact('company', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'job_type' => 'required|string',
            'location' => 'required|string',
            'salary' => 'nullable|string',
            'experience' => 'nullable|string',
            'deadline' => 'required|date',
            'description' => 'required|string',
            'requirements' => 'nullable|string',
            'status' => 'required',
        ]);

        $company = auth()->user()->company;

        if (!$company) {
            return redirect()
                ->route('employer.company.create')
                ->with('warning', 'Please create your company profile first.');
        }

        $job = new Job();

        $job->company_id = $company->id;
        $job->category_id = $request->category_id;
        $job->title = $request->title;
        $job->slug = Str::slug($request->title);
        $job->job_type = $request->job_type;
        $job->location = $request->location;
        $job->salary = $request->salary;
        $job->experience = $request->experience;
        $job->deadline = $request->deadline;
        $job->description = $request->description;
        $job->requirements = $request->requirements;
        $job->status = $request->status;

        $job->save();

        return redirect()
            ->route('employer.jobs.index')
            ->with('success', 'Job posted successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Job $job)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Job $job)
    {
        $company = auth()->user()->company;

        if (!$company || $job->company_id != $company->id) {
            abort(403);
        }

        $categories = Category::where('status', true)->get();

        return view('backend.employer.jobs.edit', compact('job', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Job $job)
    {
        $request->validate([
            'title' => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'job_type' => 'required|string',
            'location' => 'required|string',
            'salary' => 'nullable|string',
            'experience' => 'nullable|string',
            'deadline' => 'required|date',
            'description' => 'required|string',
            'requirements' => 'nullable|string',
            'status' => 'required',
        ]);

        $company = auth()->user()->company;

        if (!$company) {
            return redirect()
                ->route('employer.company.create')
                ->with('warning', 'Please create your company profile first.');
        }

        $job->company_id = $company->id;
        $job->category_id = $request->category_id;
        $job->title = $request->title;
        $job->slug = Str::slug($request->title);
        $job->job_type = $request->job_type;
        $job->location = $request->location;
        $job->salary = $request->salary;
        $job->experience = $request->experience;
        $job->deadline = $request->deadline;
        $job->description = $request->description;
        $job->requirements = $request->requirements;
        $job->status = $request->status;

        $job->update();

        return redirect()
            ->route('employer.jobs.index')
            ->with('success', 'Job post Updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Job $job)
    {
        $company = auth()->user()->company;

        if (!$company || $job->company_id != $company->id) {
            abort(403);
        }

        $job->delete();

        return redirect()
            ->route('employer.jobs.index')
            ->with('success', 'Job deleted successfully.');
    }

    public function applications(Job $job)
    {
        // Security
        if ($job->company_id != auth()->user()->company->id) {
            abort(403);
        }

        $applications = $job->applications()
            ->with('user.jobSeekerProfile')
            ->latest()
            ->get();

        return view(
            'backend.employer.jobs.applications',
            compact('job', 'applications')
        );
    }


    public function showApplication(Application $application)
    {
        // Security
        if ($application->job->company_id != auth()->user()->company->id) {
            abort(403);
        }

        return view(
            'backend.employer.jobs.application_show',
            compact('application')
        );
    }

    public function updateApplication(Request $request, Application $application)
    {
        // Security
        if ($application->job->company_id != auth()->user()->company->id) {
            abort(403);
        }

        $request->validate([
            'status' => 'required|in:pending,shortlisted,rejected',
        ]);

        $application->update([
            'status' => $request->status,
        ]);

        return back()->with('success', 'Application status updated successfully.');
    }
}
