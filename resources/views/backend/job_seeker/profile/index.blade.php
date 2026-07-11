@extends('backend.job_seeker.layouts.master')

@section('content')
<div class="page-content">

    <div class="d-flex align-items-center justify-content-between mb-4">
        <div>
            <h4 class="mb-1">My Profile</h4>
            <p class="mb-0 text-secondary">
                View your profile information.
            </p>
        </div>

        <a href="{{route('job_seeker.profile.edit', $profile->id)}}" class="btn btn-primary">
            <i class="bi bi-pencil-square me-1"></i>
            Edit Profile
        </a>
    </div>

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show">
            {{ session('success') }}
            <button class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="card border-0 shadow-sm">
        <div class="card-body">

            <div class="row">

                <div class="col-lg-3 text-center border-end">

                    @if ($profile->profile_photo)
                        <img src="{{ asset('storage/' . $profile->profile_photo) }}"
                            class="rounded-circle border shadow-sm mb-3"
                            style="width:160px;height:160px;object-fit:cover;">
                    @else
                        <img src="{{ asset('backend_assets/images/user/user.png') }}"
                            class="rounded-circle border shadow-sm mb-3"
                            style="width:160px;height:160px;object-fit:cover;">
                    @endif

                    <h5 class="mb-1">
                        {{ $profile->full_name }}
                    </h5>

                    <p class="text-secondary">
                        {{ auth()->user()->email }}
                    </p>

                    @if ($profile->status)
                        <span class="badge bg-success">
                            Active
                        </span>
                    @else
                        <span class="badge bg-danger">
                            Inactive
                        </span>
                    @endif

                </div>

                <div class="col-lg-9">

                    <div class="row">

                        <div class="col-md-6 mb-4">
                            <label class="fw-bold text-secondary">
                                Phone
                            </label>

                            <p>
                                {{ $profile->phone ?: 'N/A' }}
                            </p>
                        </div>

                        <div class="col-md-6 mb-4">
                            <label class="fw-bold text-secondary">
                                Education
                            </label>

                            <p>
                                {{ $profile->education ?: 'N/A' }}
                            </p>
                        </div>

                        <div class="col-md-6 mb-4">
                            <label class="fw-bold text-secondary">
                                Experience
                            </label>

                            <p>
                                {{ $profile->experience ?: 'N/A' }}
                            </p>
                        </div>

                        <div class="col-md-6 mb-4">
                            <label class="fw-bold text-secondary">
                                Skills
                            </label>

                            <p>
                                {{ $profile->skills ?: 'N/A' }}
                            </p>
                        </div>

                        <div class="col-12 mb-4">
                            <label class="fw-bold text-secondary">
                                Address
                            </label>

                            <p>
                                {{ $profile->address ?: 'N/A' }}
                            </p>
                        </div>

                        <div class="col-12">

                            <label class="fw-bold text-secondary d-block mb-2">
                                Resume
                            </label>

                            @if ($profile->resume)
                                <a href="{{ asset('storage/' . $profile->resume) }}"
                                    target="_blank"
                                    class="btn btn-outline-primary btn-sm">

                                    <i class="bi bi-file-earmark-pdf me-1"></i>
                                    View Resume
                                </a>
                            @else
                                <span class="text-danger">
                                    Resume Not Uploaded
                                </span>
                            @endif

                        </div>

                    </div>

                </div>

            </div>

        </div>
    </div>

</div>
@endsection