@extends('backend.admin.layouts.master')

@section('content')

<main class="page-content">

    <div class="container-fluid px-3 px-lg-4 py-4">

        <div class="d-flex justify-content-between align-items-center mb-4">

            <div>

                <h3 class="fw-bold mb-1">Application Details</h3>

                <p class="text-muted mb-0">
                    View applicant information
                </p>

            </div>

            <a href="{{ route('admin.applications.index') }}"
                class="btn btn-primary">

                <i class="bi bi-arrow-left"></i>

                Back

            </a>

        </div>

        <div class="card border-0 shadow rounded-4">

            <div class="card-body p-4">

                <div class="row">

                    <div class="col-lg-6">

                        <table class="table">

                            <tr>
                                <th width="180">Applicant</th>
                                <td>{{ $application->user->name }}</td>
                            </tr>

                            <tr>
                                <th>Email</th>
                                <td>{{ $application->user->email }}</td>
                            </tr>

                            <tr>
                                <th>Job Title</th>
                                <td>{{ $application->job->title }}</td>
                            </tr>

                            <tr>
                                <th>Company</th>
                                <td>{{ $application->job->company->company_name }}</td>
                            </tr>

                            <tr>
                                <th>Status</th>

                                <td>

                                    @if($application->status=='pending')

                                        <span class="badge bg-warning">
                                            Pending
                                        </span>

                                    @elseif($application->status=='shortlisted')

                                        <span class="badge bg-success">
                                            Shortlisted
                                        </span>

                                    @else

                                        <span class="badge bg-danger">
                                            Rejected
                                        </span>

                                    @endif

                                </td>

                            </tr>

                            <tr>
                                <th>Applied At</th>
                                <td>{{ $application->created_at->format('d M Y h:i A') }}</td>
                            </tr>

                        </table>

                    </div>

                    <div class="col-lg-6">

                        <div class="card bg-light border-0">

                            <div class="card-body">

                                <h5 class="fw-bold mb-3">
                                    Resume
                                </h5>

                                <a href="{{ asset('storage/'.$application->resume) }}"
                                    target="_blank"
                                    class="btn btn-outline-primary">

                                    <i class="bi bi-download"></i>

                                    Download Resume

                                </a>

                            </div>

                        </div>

                    </div>

                </div>

                <hr>

                <h5 class="fw-bold mb-3">

                    Cover Letter

                </h5>

                <div class="border rounded-3 p-3 bg-light">

                    {!! nl2br(e($application->cover_letter)) !!}

                </div>

            </div>

        </div>

    </div>

</main>

@endsection