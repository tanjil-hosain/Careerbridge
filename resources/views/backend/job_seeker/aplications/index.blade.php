@extends('backend.job_seeker.layouts.master')

@section('content')
    <div class="page-content">
        <div class="container py-4">

            <div class="card">

                <div class="card-header">
                    <h4>My Applications</h4>
                </div>

                <div class="card-body">

                    <table class="table table-bordered table-hover">

                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Job Title</th>
                                <th>Company</th>
                                <th>Status</th>
                                <th>Applied At</th>
                            </tr>
                        </thead>

                        <tbody>

                            @forelse($applications as $application)
                                <tr>

                                    <td>{{ $loop->iteration }}</td>

                                    <td>{{ $application->job->title }}</td>

                                    <td>{{ $application->job->company->company_name }}</td>

                                    <td>

                                        @if ($application->status == 'pending')
                                            <span class="badge bg-warning">
                                                Pending
                                            </span>
                                        @elseif($application->status == 'shortlisted')
                                            <span class="badge bg-success">
                                                Shortlisted
                                            </span>
                                        @elseif($application->status == 'rejected')
                                            <span class="badge bg-danger">
                                                Rejected
                                            </span>
                                        @endif

                                    </td>

                                    <td>
                                        {{ $application->created_at->format('d M, Y') }}
                                    </td>
                                    <td>
                                        <a href="{{ route('employer.applications.show', $application) }}"
                                            class="btn btn-primary btn-sm">
                                            View
                                        </a>
                                    </td>

                                </tr>

                            @empty

                                <tr>

                                    <td colspan="5" class="text-center">
                                        No Applications Found.
                                    </td>

                                </tr>
                            @endforelse

                        </tbody>

                    </table>

                </div>

            </div>

        </div>
    </div>
@endsection
