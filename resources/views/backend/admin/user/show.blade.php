@extends('backend.admin.layouts.master')

@section('content')

<main class="page-content">

    <div class="container-fluid px-3 px-lg-4 py-4">

        <div class="d-flex justify-content-between align-items-center mb-4">

            <div>
                <h3 class="fw-bold mb-1">User Details</h3>

                <p class="text-muted mb-0">
                    View user information
                </p>
            </div>

            <a href="{{ $user->role === 'employer'
                ? route('admin.users.employers')
                : route('admin.users.job_seekers') }}"
                class="btn btn-primary">

                <i class="bi bi-arrow-left me-1"></i>
                Back

            </a>

        </div>


        <div class="row g-4">

            {{-- User Information --}}
            <div class="col-lg-6">

                <div class="card border-0 shadow rounded-4 h-100">

                    <div class="card-body p-4">

                        <h5 class="fw-bold mb-4">
                            User Information
                        </h5>

                        <div class="mb-3">

                            <small class="text-muted d-block">
                                Name
                            </small>

                            <span class="fw-semibold">
                                {{ $user->name }}
                            </span>

                        </div>


                        <div class="mb-3">

                            <small class="text-muted d-block">
                                Email
                            </small>

                            <span class="fw-semibold">
                                {{ $user->email }}
                            </span>

                        </div>


                        <div class="mb-3">

                            <small class="text-muted d-block">
                                Role
                            </small>

                            @if($user->role === 'employer')

                                <span class="badge bg-primary">
                                    Employer
                                </span>

                            @elseif($user->role === 'job_seeker')

                                <span class="badge bg-success">
                                    Job Seeker
                                </span>

                            @else

                                <span class="badge bg-danger">
                                    Admin
                                </span>

                            @endif

                        </div>


                        <div>

                            <small class="text-muted d-block">
                                Joined
                            </small>

                            <span class="fw-semibold">
                                {{ $user->created_at->format('d M Y') }}
                            </span>

                        </div>

                    </div>

                </div>

            </div>


            {{-- Role Specific Information --}}
            <div class="col-lg-6">

                <div class="card border-0 shadow rounded-4 h-100">

                    <div class="card-body p-4">

                        @if($user->role === 'employer')

                            <h5 class="fw-bold mb-4">
                                Employer Information
                            </h5>

                            @if($user->company)

                                <div class="mb-3">

                                    <small class="text-muted d-block">
                                        Company
                                    </small>

                                    <span class="fw-semibold">
                                        {{ $user->company->company_name }}
                                    </span>

                                </div>

                                <div class="mb-3">

                                    <small class="text-muted d-block">
                                        Total Jobs
                                    </small>

                                    <span class="fw-semibold">
                                        {{ $user->company->job?->count() ?? 0 }}
                                    </span>

                                </div>

                            @else

                                <div class="alert alert-warning mb-0">
                                    This employer has not created a company yet.
                                </div>

                            @endif


                        @elseif($user->role === 'job_seeker')

                            <h5 class="fw-bold mb-4">
                                Job Seeker Information
                            </h5>

                            <div class="mb-3">

                                <small class="text-muted d-block">
                                    Total Applications
                                </small>

                                <span class="fw-semibold">
                                    {{ $user->applications->count() }}
                                </span>

                            </div>

                            @if($user->jobSeekerProfile)

                                <div class="mb-3">

                                    <small class="text-muted d-block">
                                        Profile
                                    </small>

                                    <span class="badge bg-success">
                                        Profile Created
                                    </span>

                                </div>

                            @else

                                <div class="alert alert-warning mb-0">
                                    Job seeker profile has not been created yet.
                                </div>

                            @endif

                        @endif

                    </div>

                </div>

            </div>

        </div>


        {{-- Delete --}}
        @if($user->role !== 'admin')

            <div class="card border-0 shadow rounded-4 mt-4">

                <div class="card-body p-4">

                    <div class="d-flex justify-content-between align-items-center">

                        <div>

                            <h6 class="fw-bold mb-1">
                                Delete User
                            </h6>

                            <p class="text-muted mb-0">
                                This action cannot be undone.
                            </p>

                        </div>

                        <form
                            action="{{ route('admin.users.destroy', $user) }}"
                            method="POST"
                            onsubmit="return confirm('Are you sure you want to delete this user?')"
                        >

                            @csrf
                            @method('DELETE')

                            <button class="btn btn-outline-danger">

                                <i class="bi bi-trash me-1"></i>
                                Delete User

                            </button>

                        </form>

                    </div>

                </div>

            </div>

        @endif

    </div>

</main>

@endsection