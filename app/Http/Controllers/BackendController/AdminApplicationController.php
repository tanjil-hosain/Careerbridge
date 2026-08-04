<?php

namespace App\Http\Controllers\BackendController;

use App\Http\Controllers\Controller;
use App\Models\Application;

class AdminApplicationController extends Controller
{
    public function index()
    {
        $applications = Application::with([
                'user',
                'job.company'
            ])
            ->latest()
            ->paginate(10);

        return view('backend.admin.application.index', compact('applications'));
    }

    public function show(Application $application)
    {
        $application->load([
            'user',
            'job.company'
        ]);

        return view('backend.admin.application.show', compact('application'));
    }

    public function destroy(Application $application)
    {
        $application->delete();

        return redirect()
            ->route('admin.applications.index')
            ->with('success', 'Application deleted successfully.');
    }
}