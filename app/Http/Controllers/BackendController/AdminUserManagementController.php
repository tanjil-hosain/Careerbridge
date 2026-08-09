<?php

namespace App\Http\Controllers\BackendController;

use App\Http\Controllers\Controller;
use App\Models\User;

class AdminUserManagementController extends Controller
{
    public function employers()
    {
        $users = User::where('role', 'employer')
            ->with('company')
            ->latest()
            ->paginate(10);

        return view('backend.admin.user.employer', compact('users'));
    }

    public function jobSeekers()
    {
        $users = User::where('role', 'job_seeker')
            ->withCount('applications')
            ->latest()
            ->paginate(10);

        return view('backend.admin.user.job_seeker', compact('users'));
    }

    public function show(User $user)
    {
        $user->load([
            'company',
            'jobSeekerProfile',
            'applications'
        ]);

        return view('backend.admin.user.show', compact('user'));
    }

    public function destroy(User $user)
    {
        if ($user->role === 'admin') {
            return back()->with('error', 'Admin cannot be deleted.');
        }

        $role = $user->role;

        $user->delete();

        if ($role === 'employer') {

            return redirect()
                ->route('admin.users.employers')
                ->with('success', 'Employer deleted successfully.');
        }

        return redirect()
            ->route('admin.users.job_seekers')
            ->with('success', 'Job seeker deleted successfully.');
    }
}
