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

                                    <span class="badge bg-warning">

                                        {{ ucfirst($application->status) }}

                                    </span>

                                </td>

                                <td>

                                    <a href="{{ asset('storage/' . $application->resume) }}" target="_blank">

                                        Resume

                                    </a>

                                </td>

                                <td>

                                    <a href="{{ route('employer.applications.show', $job) }}"
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
