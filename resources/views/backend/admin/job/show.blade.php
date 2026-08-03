@extends('backend.admin.layouts.master')

@section('content')

<main class="page-content">

    <div class="container-fluid px-3 px-lg-4 py-4">

        <!-- Header -->
        <div class="d-flex justify-content-between align-items-center mb-4">

            <div>

                <h3 class="fw-bold mb-1">
                    Job Details
                </h3>

                <p class="text-muted mb-0">
                    View complete job information
                </p>

            </div>

            <a href="{{ route('admin.jobs.index') }}"
                class="btn btn-primary">

                <i class="bi bi-arrow-left"></i>

                Back

            </a>

        </div>

        <div class="card border-0 shadow rounded-4">

            <div class="card-body p-4">

                <div class="row">

                    <div class="col-lg-8">

                        <table class="table">

                            <tr>
                                <th width="220">Job Title</th>
                                <td>{{ $job->title }}</td>
                            </tr>

                            <tr>
                                <th>Company</th>
                                <td>{{ $job->company->company_name ?? 'N/A' }}</td>
                            </tr>

                            <tr>
                                <th>Category</th>
                                <td>{{ $job->category->name ?? 'N/A' }}</td>
                            </tr>

                            <tr>
                                <th>Location</th>
                                <td>{{ $job->location }}</td>
                            </tr>

                            <tr>
                                <th>Job Type</th>
                                <td>{{ ucfirst($job->job_type) }}</td>
                            </tr>

                            <tr>
                                <th>Salary</th>
                                <td>{{ $job->salary }}</td>
                            </tr>

                            <tr>
                                <th>Experience</th>
                                <td>{{ $job->experience }}</td>
                            </tr>

                            <tr>
                                <th>Deadline</th>
                                <td>{{ \Carbon\Carbon::parse($job->deadline)->format('d M Y') }}</td>
                            </tr>

                            <tr>
                                <th>Status</th>

                                <td>

                                    @if($job->status)

                                        <span class="badge bg-success">
                                            Active
                                        </span>

                                    @else

                                        <span class="badge bg-danger">
                                            Inactive
                                        </span>

                                    @endif

                                </td>

                            </tr>

                            <tr>

                                <th>Created At</th>

                                <td>

                                    {{ $job->created_at->format('d M Y h:i A') }}

                                </td>

                            </tr>

                        </table>

                    </div>

                    <div class="col-lg-4">

                        <div class="card bg-light border-0">

                            <div class="card-body text-center">

                                @if($job->company && $job->company->logo)

                                    <img
                                        src="{{ asset('storage/'.$job->company->logo) }}"
                                        class="rounded-circle border mb-3"
                                        width="120"
                                        height="120"
                                        style="object-fit:cover">

                                @endif

                                <h5 class="fw-bold">

                                    {{ $job->company->company_name ?? 'N/A' }}

                                </h5>

                                <p class="text-muted">

                                    {{ $job->company->email ?? '' }}

                                </p>

                            </div>

                        </div>

                    </div>

                </div>

                <hr>

                <h5 class="fw-bold mb-3">

                    Job Description

                </h5>

                <div class="border rounded-3 p-3 bg-light">

                    {!! nl2br(e($job->description)) !!}

                </div>

            </div>

        </div>

    </div>

</main>

@endsection