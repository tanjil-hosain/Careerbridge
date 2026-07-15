@extends('backend.admin.layouts.master')

@section('content')
    <main class="page-content">
        <div class="container-fluid">

            <div class="card shadow-sm">

                <div class="card-header d-flex justify-content-between align-items-center">

                    <div>
                        <h4 class="mb-1">Subscription Plans</h4>
                        <small class="text-muted">
                            Manage all subscription plans.
                        </small>
                    </div>

                    <a href="{{ route('admin.plans.create') }}" class="btn btn-primary">

                        <i class="fas fa-plus me-2"></i>
                        Add New Plan

                    </a>

                </div>

                <div class="card-body">

                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show">

                            {{ session('success') }}

                            <button class="btn-close" data-bs-dismiss="alert"></button>

                        </div>
                    @endif

                    <div class="table-responsive">

                        <table class="table table-hover align-middle">

                            <thead class="table-light">

                                <tr>

                                    <th>#</th>

                                    <th>Plan Name</th>
                                    <th>Type</th>

                                    <th>Price</th>

                                    <th> Limit</th>

                                    <th>Duration</th>

                                    <th>Status</th>

                                    <th width="180">Action</th>

                                </tr>

                            </thead>

                            <tbody>

                                @forelse($plans as $plan)
                                    <tr>

                                        <td>
                                            {{ $loop->iteration }}
                                        </td>

                                        <td>

                                            <strong>

                                                {{ $plan->name }}

                                            </strong>

                                        </td>
                                        <td>

                                            @if ($plan->type == 'employer')
                                                <span class="badge bg-primary">

                                                    Employer

                                                </span>
                                            @else
                                                <span class="badge bg-info">

                                                    Job Seeker

                                                </span>
                                            @endif

                                        </td>

                                        <td>

                                            ৳ {{ number_format($plan->price, 2) }}

                                        </td>

                                        <td>

                                            {{ $plan->job_limit }}

                                        </td>

                                        <td>

                                            {{ $plan->duration }} Days

                                        </td>

                                        <td>

                                            @if ($plan->status)
                                                <span class="badge bg-success">

                                                    Active

                                                </span>
                                            @else
                                                <span class="badge bg-danger">

                                                    Inactive

                                                </span>
                                            @endif

                                        </td>

                                        <td class="text-end">
                                            <a href="{{ route('admin.plans.edit', $plan->id) }}"
                                                class="btn btn-sm btn-outline-primary" title="Edit">
                                                Edit
                                            </a>

                                            <form action="{{ route('admin.plans.destroy', $plan->id) }}" method="POST"
                                                class="d-inline">
                                                @csrf
                                                @method('Delete')

                                                <button type="submit"
                                                    onclick="return confirm('Are you sure you want to delete this category?')"
                                                    class="btn btn-sm btn-outline-danger" title="Delete">
                                                    Delete
                                                </button>
                                            </form>
                                        </td>

                                    </tr>

                                @empty

                                    <tr>

                                        <td colspan="7" class="text-center py-5">

                                            <h6 class="text-muted">

                                                No Subscription Plan Found

                                            </h6>

                                        </td>

                                    </tr>
                                @endforelse

                            </tbody>

                        </table>

                    </div>

                </div>

            </div>

        </div>
        </div>
    @endsection
