@extends('backend.employer.layouts.master')

@section('content')
    <div class="page-content">

        <div class="d-flex align-items-center justify-content-between mb-4">
            <div>
                <h4 class="mb-1">All Jobs</h4>
                <p class="mb-0 text-secondary">Manage your posted jobs.</p>
            </div>

            <a href="{{ route('employer.jobs.create') }}" class="btn btn-primary">
                <i class="bi bi-plus-circle me-1"></i>
                Post New Job
            </a>
        </div>

        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <div class="card border-0 shadow-sm">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table align-middle mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>#</th>
                                <th>Job Title</th>
                                <th>Category</th>
                                <th>Type</th>
                                <th>Location</th>
                                <th>Deadline</th>
                                <th>Status</th>
                                <th class="text-end">Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse ($jobs as $job)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>

                                    <td>
                                        <strong>{{ $job->title }}</strong>
                                        <small class="d-block text-secondary">
                                            {{ $job->salary ?: 'Salary not mentioned' }}
                                        </small>
                                    </td>

                                    <td>{{ $job->category->name }}</td>

                                    <td>
                                        <span class="badge bg-info text-dark">
                                            {{ $job->job_type }}
                                        </span>
                                    </td>

                                    <td>{{ $job->location }}</td>

                                    <td>{{ \Carbon\Carbon::parse($job->deadline)->format('d M, Y') }}</td>

                                    <td>
                                        @if ($job->status)
                                            <span class="badge bg-success">Active</span>
                                        @else
                                            <span class="badge bg-secondary">Inactive</span>
                                        @endif
                                    </td>

                                    <td class="text-end">
                                        <a href="{{ route('employer.jobs.edit', $job->id) }}"
                                            class="btn btn-sm btn-outline-primary">
                                            Edit
                                        </a>

                                        <form action="{{ route('employer.jobs.destroy', $job->id) }}" method="POST"
                                            class="d-inline"
                                            onsubmit="return confirm('Are you sure you want to delete this job?')">

                                            @csrf
                                            @method('DELETE')

                                            <button type="submit" class="btn btn-sm btn-outline-danger">
                                                Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="8" class="text-center py-5 text-secondary">
                                        No jobs posted yet.
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
