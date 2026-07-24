@extends('backend.employer.layouts.master')

@section('content')
    <div class="page-content">
        <div class="card">

            <div class="card-header">

                <h4>
                    Applicants - {{ $job->title }}
                </h4>
            </div>

            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Status</th>
                            <th>Resume</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($applications as $application)
                            <tr>
                                
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $application->user->name }}</td>
                                <td>{{ $application->user->email }}</td>
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
                                <td>

                                    <a href="{{ asset('storage/' . $application->resume) }}" target="_blank">

                                        Resume

                                    </a>

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

                                <td colspan="6" class="text-center">

                                    No Applicants Found.

                                </td>

                            </tr>
                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>
    </div>
@endsection
