@extends('backend.admin.layouts.master')

@section('content')
    <main class="page-content">

        <div class="container-fluid px-3 px-lg-4 py-4">

            <div class="d-flex justify-content-between align-items-center mb-4">

                <div>

                    <h3 class="fw-bold">Applications Management</h3>

                    <p class="text-muted mb-0">
                        Manage all job applications
                    </p>

                </div>

                <span class="badge bg-primary fs-6">
                    {{ $applications->total() }} Applications
                </span>

            </div>

            <div class="card shadow border-0 rounded-4">

                <div class="card-body">

                    <div class="table-responsive">

                        <table class="table table-hover align-middle">

                            <thead class="table-light">

                                <tr>

                                    <th>#</th>

                                    <th>Applicant</th>

                                    <th>Job</th>

                                    <th>Company</th>

                                    <th>Status</th>

                                    <th>Date</th>

                                    <th width="150">Action</th>

                                </tr>

                            </thead>

                            <tbody>

                                @forelse($applications as $application)
                                    <tr>

                                        <td>{{ $loop->iteration }}</td>

                                        <td>{{ $application->user->name }}</td>

                                        <td>{{ $application->job->title }}</td>

                                        <td>{{ $application->job->company->company_name }}</td>

                                        <td>

                                            <span class="badge bg-info">

                                                {{ ucfirst($application->status) }}

                                            </span>

                                        </td>

                                        <td>

                                            {{ $application->created_at->format('d M Y') }}

                                        </td>

                                        <td>

                                            <a href="{{ route('admin.applications.show', $application->id) }}"
                                                class="btn btn-outline-primary btn-sm">

                                                <i class="bi bi-eye"></i>

                                            </a>

                                            <form action="{{ route('admin.applications.destroy', $application->id) }}"
                                                method="POST" class="d-inline">

                                                @csrf
                                                @method('DELETE')

                                                <button class="btn btn-outline-danger btn-sm"
                                                    onclick="return confirm('Delete application?')">

                                                    <i class="bi bi-trash"></i>

                                                </button>

                                            </form>

                                        </td>

                                    </tr>

                                @empty

                                    <tr>

                                        <td colspan="7" class="text-center py-5">

                                            No Applications Found

                                        </td>

                                    </tr>
                                @endforelse

                            </tbody>

                        </table>

                    </div>

                    <div class="mt-3">

                        {{ $applications->links() }}

                    </div>

                </div>

            </div>

        </div>

    </main>
@endsection
