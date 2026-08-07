<?php

namespace App\Http\Controllers\BackendController;

use App\Http\Controllers\Controller;
use App\Models\User;

class AdminUserManagementController extends Controller
{
    public function employers()
    {
        $users = User::role('employer')
            ->with(['company', 'job'])
            ->latest()
            ->paginate(10);

        return view('admin.user.employers', compact('users'));
    }

    public function jobSeekers()
    {
        $users = User::role('job_seeker')
            ->withCount('applications')
            ->latest()
            ->paginate(10);

        return view('admin.user.job_seekers', compact('users'));
    }

    public function show(User $user)
    {
        $user->load([
            'company',
            'job',
            'applications'
        ]);

        return view('admin.user.show', compact('user'));
    }

    public function destroy(User $user)
    {
        if ($user->hasRole('admin')) {

            return back()->with('error', 'Admin cannot be deleted.');

        }

        $user->delete();

        return back()->with('success', 'User deleted successfully.');
    }
}