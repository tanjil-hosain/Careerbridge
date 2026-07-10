@extends('backend.employer.layouts.master')

@section('content')
    <div class="page-content">

        <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-4">
            <div>
                <h4 class="mb-1">Company Profile</h4>
                <p class="mb-0 text-secondary">Manage your company information and public profile.</p>
            </div>

            @if ($company)
                <a href="{{ route('employer.company.edit', $company->id) }}" class="btn btn-primary">
                    <i class="bi bi-pencil-square me-1"></i>
                    Edit Profile
                </a>
            @else
                <a href="{{ route('employer.company.create') }}" class="btn btn-primary">
                    <i class="bi bi-plus-circle me-1"></i>
                    Create Company Profile
                </a>
            @endif
        </div>

        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="bi bi-check-circle me-1"></i>
                {{ session('success') }}

                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        @if ($company)
            <div class="card border-0 shadow-sm overflow-hidden">

                <div class="card-body p-0">
                    <div class="p-4 border-bottom">
                        <div class="row align-items-center g-4">

                            <div class="col-md-auto text-center">
                                @if ($company->logo)
                                    <img
                                        src="{{ asset('storage/' . $company->logo) }}"
                                        alt="{{ $company->company_name }}"
                                        class="rounded-circle border p-1 bg-white"
                                        style="width: 120px; height: 120px; object-fit: cover;"
                                    >
                                @else
                                    <div
                                        class="rounded-circle bg-light border d-inline-flex align-items-center justify-content-center"
                                        style="width: 120px; height: 120px;"
                                    >
                                        <i class="bi bi-building fs-1 text-primary"></i>
                                    </div>
                                @endif
                            </div>

                            <div class="col-md">
                                <div class="d-flex flex-wrap align-items-center gap-2 mb-2">
                                    <h3 class="mb-0">{{ $company->company_name }}</h3>

                                    @if ($company->status)
                                        <span class="badge bg-success">
                                            <i class="bi bi-patch-check me-1"></i>
                                            Active
                                        </span>
                                    @else
                                        <span class="badge bg-secondary">Inactive</span>
                                    @endif
                                </div>

                                <p class="text-secondary mb-3">
                                    {{ $company->description ?: 'No company description added yet.' }}
                                </p>

                                <div class="d-flex flex-wrap gap-3 text-secondary">
                                    @if ($company->address)
                                        <span>
                                            <i class="bi bi-geo-alt me-1"></i>
                                            {{ $company->address }}
                                        </span>
                                    @endif

                                    @if ($company->website)
                                        <a
                                            href="{{ $company->website }}"
                                            target="_blank"
                                            class="text-decoration-none"
                                        >
                                            <i class="bi bi-globe2 me-1"></i>
                                            Visit Website
                                        </a>
                                    @endif
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="p-4">
                        <h5 class="mb-4">Contact Information</h5>

                        <div class="row g-4">
                            <div class="col-md-6">
                                <div class="border rounded p-3 h-100">
                                    <div class="d-flex align-items-center gap-3">
                                        <div class="bg-light rounded-circle d-flex align-items-center justify-content-center"
                                            style="width: 45px; height: 45px;">
                                            <i class="bi bi-envelope text-primary fs-5"></i>
                                        </div>

                                        <div>
                                            <small class="text-secondary d-block">Company Email</small>
                                            <span>{{ $company->email ?: 'Not added yet' }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="border rounded p-3 h-100">
                                    <div class="d-flex align-items-center gap-3">
                                        <div class="bg-light rounded-circle d-flex align-items-center justify-content-center"
                                            style="width: 45px; height: 45px;">
                                            <i class="bi bi-telephone text-primary fs-5"></i>
                                        </div>

                                        <div>
                                            <small class="text-secondary d-block">Phone Number</small>
                                            <span>{{ $company->phone ?: 'Not added yet' }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="border rounded p-3 h-100">
                                    <div class="d-flex align-items-center gap-3">
                                        <div class="bg-light rounded-circle d-flex align-items-center justify-content-center"
                                            style="width: 45px; height: 45px;">
                                            <i class="bi bi-globe2 text-primary fs-5"></i>
                                        </div>

                                        <div>
                                            <small class="text-secondary d-block">Website</small>

                                            @if ($company->website)
                                                <a href="{{ $company->website }}" target="_blank">
                                                    {{ $company->website }}
                                                </a>
                                            @else
                                                <span>Not added yet</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="border rounded p-3 h-100">
                                    <div class="d-flex align-items-center gap-3">
                                        <div class="bg-light rounded-circle d-flex align-items-center justify-content-center"
                                            style="width: 45px; height: 45px;">
                                            <i class="bi bi-calendar-check text-primary fs-5"></i>
                                        </div>

                                        <div>
                                            <small class="text-secondary d-block">Profile Created</small>
                                            <span>{{ $company->created_at->format('d M, Y') }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <hr class="my-4">

                        <h5 class="mb-3">About Company</h5>
                        <p class="mb-0 text-secondary lh-lg">
                            {{ $company->description ?: 'No company description added yet.' }}
                        </p>
                    </div>
                </div>
            </div>
        @else
            <div class="card border-0 shadow-sm">
                <div class="card-body text-center py-5">
                    <div class="bg-light rounded-circle d-inline-flex align-items-center justify-content-center mb-3"
                        style="width: 80px; height: 80px;">
                        <i class="bi bi-building fs-2 text-primary"></i>
                    </div>

                    <h5>Company profile not created yet</h5>
                    <p class="text-secondary mb-4">
                        Create your company profile before posting jobs on CareerBridge.
                    </p>

                    <a href="{{ route('employer.company.create') }}" class="btn btn-primary">
                        <i class="bi bi-plus-circle me-1"></i>
                        Create Company Profile
                    </a>
                </div>
            </div>
        @endif

    </div>
@endsection