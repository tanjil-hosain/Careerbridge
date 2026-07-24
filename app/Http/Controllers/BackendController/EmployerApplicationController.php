<?php

namespace App\Http\Controllers\BackendController;

use App\Http\Controllers\Controller;
use App\Models\Application;
use Illuminate\Http\Request;

class EmployerApplicationController extends Controller
{
    public function index(){
        
    }
        public function showApplication(Application $application)
    {
        // Security
        if ($application->job->company_id != auth()->user()->company->id) {
            abort(403);
        }

        return view('backend.employer.jobs.application_show', compact('application')
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

        // return back()->with('success', 'Application status updated successfully.');
      return redirect()->route('employer.jobs.applications', $application->job_id)
    ->with('success', 'Application updated successfully.');;
}
}