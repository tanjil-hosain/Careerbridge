@extends('backend.admin.layouts.master')

@section('content')

<main class="page-content">

    <div class="container-fluid px-3 px-lg-4 py-4">

        <!-- Header -->
        <div class="d-flex justify-content-between align-items-center mb-4">

            <div>

                <h3 class="fw-bold mb-1">Jobs Management</h3>

                <p class="text-muted mb-0">
                    Manage all job posts
                </p>

            </div>

            <span class="badge bg-primary fs-6 px-3 py-2">
                Total Jobs : {{ $jobs->total() }}
            </span>

        </div>

        <div class="card border-0 shadow rounded-4">

            <div class="card-body">

                <div class="table-responsive">

                    <table class="table table-hover align-middle">

                        <thead class="table-light">

                            <tr>

                                <th>#</th>

                                <th>Job Title</th>

                                <th>Company</th>

                                <th>Category</th>

                                <th>Location</th>

                                <th>Deadline</th>

                                <th>Status</th>

                                <th width="150">Action</th>

                            </tr>

                        </thead>

                        <tbody>

                            @forelse ($jobs as $job)

                                <tr>

                                    <td>{{ $loop->iteration }}</td>

                                    <td>

                                        <strong>{{ $job->title }}</strong>

                                    </td>

                                    <td>

                                        {{ $job->company->company_name ?? 'N/A' }}

                                    </td>

                                    <td>

                                        {{ $job->category->name ?? 'N/A' }}

                                    </td>

                                    <td>

                                        {{ $job->location }}

                                    </td>

                                    <td>

                                        {{ \Carbon\Carbon::parse($job->deadline)->format('d M Y') }}

                                    </td>

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

                                    <td>

                                        <a
                                            href="{{ route('admin.jobs.show',$job->id) }}"
                                            class="btn btn-outline-primary btn-sm">

                                            <i class="bi bi-eye"></i>

                                        </a>

                                        <form
                                            action="{{ route('admin.jobs.destroy',$job->id) }}"
                                            method="POST"
                                            class="d-inline">

                                            @csrf
                                            @method('DELETE')

                                            <button
                                                class="btn btn-outline-danger btn-sm"
                                                onclick="return confirm('Delete this job?')">

                                                <i class="bi bi-trash"></i>

                                            </button>

                                        </form>

                                    </td>

                                </tr>

                            @empty

                                <tr>

                                    <td colspan="8" class="text-center py-5">

                                        <h5 class="text-muted">

                                            No Jobs Found

                                        </h5>

                                    </td>

                                </tr>

                            @endforelse

                        </tbody>

                    </table>

                </div>

                <div class="mt-4">

                    {{ $jobs->links() }}

                </div>

            </div>

        </div>

    </div>

</main>

@endsection