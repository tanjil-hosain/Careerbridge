<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\SavedJob;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class SavedJobController extends Controller
{
public function index()
    {
       
        $savedJobs = SavedJob::where('user_id', Auth::id())
            ->with(['job.company']) 
            ->get();

        return Inertia::render('Jobs/SaveJob', [
            'savedJobs' => $savedJobs
        ]);
    }

   
   public function toggle(Request $request)
{
    $userId = Auth::id();
    $jobId = $request->job_id;

    // Check korar jonno je job_id asche kina
    if (!$jobId) {
        return back()->with('error', 'Job ID not found!');
    }

    $savedJob = SavedJob::where('user_id', $userId)->where('job_id', $jobId)->first();

    if ($savedJob) {
        $savedJob->delete();
        return back()->with('message', 'Job removed from saved list.');
    } else {
        try {
            SavedJob::create([
                'user_id' => $userId,
                'job_id' => $jobId,
            ]);
            return back()->with('message', 'Job saved successfully!');
        } catch (\Exception $e) {
            // Database-e save na hole error message dekhibe
            return back()->with('error', 'Failed to save: ' . $e->getMessage());
        }
    }
}
}