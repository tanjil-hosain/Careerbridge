@extends('backend.admin.layouts.master')

@section('content')

<main class="page-content">

    <div class="container-fluid px-3 px-lg-4 py-4">

        <!-- Page Header -->
        <div class="d-flex justify-content-between align-items-center mb-4">

            <div>

                <h3 class="fw-bold mb-1">Companies Management</h3>

                <p class="text-muted mb-0">
                    Manage all registered companies
                </p>

            </div>

            <span class="badge bg-primary fs-6 px-3 py-2">
                Total Companies : {{ $companies->total() }}
            </span>

        </div>

        <!-- Card -->
        <div class="card shadow-sm border-0 rounded-4">

            <div class="card-body">

                <div class="table-responsive">

                    <table class="table align-middle table-hover">

                        <thead class="table-light">

                            <tr>

                                <th>#</th>

                                <th>Logo</th>

                                <th>Company</th>

                                <th>Owner</th>

                                <th>Email</th>

                                <th>Phone</th>

                                <th>Jobs</th>

                                <th width="150">Action</th>

                            </tr>

                        </thead>

                        <tbody>

                            @forelse ($companies as $company)

                                <tr>

                                    <td>{{ $loop->iteration }}</td>

                                    <td>

                                        <img
                                            src="{{ asset('storage/'.$company->logo) }}"
                                            class="rounded-circle border"
                                            width="55"
                                            height="55"
                                            style="object-fit:cover"
                                        >

                                    </td>

                                    <td>

                                        <h6 class="fw-semibold mb-1">
                                            {{ $company->company_name }}
                                        </h6>

                                        <small class="text-muted">
                                            {{ $company->address }}
                                        </small>

                                    </td>

                                    <td>

                                        {{ $company->user->name ?? 'N/A' }}

                                    </td>

                                    <td>

                                        {{ $company->email }}

                                    </td>

                                    <td>

                                        {{ $company->phone }}

                                    </td>

                                    <td>

                                        <span class="badge bg-success">

                                            {{ $company->job_count }}

                                        </span>

                                    </td>

                                    <td>

                                        <a
                                            href="{{ route('admin.companies.show',$company->id) }}"
                                            class="btn btn-outline-primary btn-sm"
                                        >
                                            <i class="bi bi-eye"></i>
                                        </a>

                                        <form
                                            action="{{ route('admin.companies.destroy',$company->id) }}"
                                            method="POST"
                                            class="d-inline"
                                        >

                                            @csrf
                                            @method('DELETE')

                                            <button
                                                class="btn btn-outline-danger btn-sm"
                                                onclick="return confirm('Delete this company?')"
                                            >

                                                <i class="bi bi-trash"></i>

                                            </button>

                                        </form>

                                    </td>

                                </tr>

                            @empty

                                <tr>

                                    <td colspan="8" class="text-center py-5">

                                        <img
                                            src="{{ asset('assets/images/no-data.svg') }}"
                                            width="120"
                                            class="mb-3"
                                        >

                                        <h5>No Company Found</h5>

                                    </td>

                                </tr>

                            @endforelse

                        </tbody>

                    </table>

                </div>

                <div class="mt-4">

                    {{ $companies->links() }}

                </div>

            </div>

        </div>

    </div>

</main>

@endsection