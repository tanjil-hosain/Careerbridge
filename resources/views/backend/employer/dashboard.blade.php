@extends('backend.employer.layouts.master')

@section('content')
    <main class="page-content">
        <div class="card bg-primary text-white shadow border-0 mb-4">
            <div class="card-body">
                <h3>
                    👋 Welcome Back,
                    {{ auth()->user()->name }}
                </h3>
                <p class="mb-0">
                    Manage your jobs, applicants and subscription easily.
                </p>
            </div>
        </div>


        <div class="row">
            <div class="col-md-3 mb-4">
                <div class="card shadow-sm border-start border-primary border-4">
                    <div class="card-body">
                        <small>Total Jobs</small>
                        <h2>{{ $totalJobs }}</h2>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mb-4">
                <div class="card shadow-sm border-start border-success border-4">
                    <div class="card-body">
                        <small>Active Jobs</small>
                        <h2>{{ $activeJobs }}</h2>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mb-4">
                <div class="card shadow-sm border-start border-warning border-4">
                    <div class="card-body">
                        <small>Total Applications</small>
                        <h2>{{ $totalApplications }}</h2>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mb-4">
                <div class="card shadow-sm border-start border-danger border-4">
                    <div class="card-body">
                        <small>Remaining Posts</small>
                        <h2>
                            {{ $subscription ? $subscription->remaining_limit : 0 }}
                        </h2>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-7 mb-4">

                <div class="card shadow-sm border-0 h-100">

                    <div class="card-header bg-white d-flex justify-content-between align-items-center">

                        <h5 class="mb-0">
                            <i class="fas fa-crown text-warning me-2"></i>
                            Subscription Details
                        </h5>

                        @if ($subscription)
                            <span class="badge bg-success">
                                {{ ucfirst($subscription->status) }}
                            </span>
                        @endif

                    </div>

                    <div class="card-body">

                        @if ($subscription)
                            <div class="row mb-3">

                                <div class="col-6">

                                    <small class="text-muted">Current Plan</small>

                                    <h5 class="fw-bold">
                                        {{ $subscription->plan->name }}
                                    </h5>

                                </div>

                                <div class="col-6">

                                    <small class="text-muted">Payment</small>

                                    <h5 class="fw-bold text-success">
                                        {{ ucfirst($subscription->payment_status) }}
                                    </h5>

                                </div>

                            </div>

                            <small class="text-muted">
                                Remaining Applications
                            </small>

                            <div class="progress mb-2" style="height:10px;">

                                @php
                                    $limit = $subscription->plan->limit == -1 ? 100 : $subscription->plan->limit;
                                    $remaining = $subscription->remaining_limit;
                                    $percentage =
                                        $subscription->plan->limit == -1 ? 100 : ($remaining / max($limit, 1)) * 100;
                                @endphp

                                <div class="progress-bar bg-success" role="progressbar" style="width: {{ $percentage }}%">

                                </div>

                            </div>

                            <div class="d-flex justify-content-between">

                                <small>
                                    Remaining:
                                    <strong>{{ $remaining }}</strong>
                                </small>

                                <small>

                                    Expire:
                                    <strong>

                                        {{ \Carbon\Carbon::parse($subscription->end_date)->format('d M Y') }}

                                    </strong>

                                </small>

                            </div>

                            <hr>

                            <a href="{{ route('employer.subscription.plans') }}" class="btn btn-warning">

                                Upgrade Plan

                            </a>
                        @else
                            <div class="alert alert-warning">

                                You don't have an active subscription.

                            </div>

                            <a href="{{ route('employer.subscription.plans') }}" class="btn btn-primary">

                                Buy Subscription

                            </a>
                        @endif

                    </div>

                </div>

            </div>
            <div class="col-lg-5">
                <div class="card shadow-sm">
                    <div class="card-header">
                        Quick Actions
                    </div>
                    <div class="card-body d-grid gap-2">
                        <a href="{{ route('employer.jobs.create') }}" class="btn btn-light">
                            Post Job
                        </a>
                        <a href="{{ route('employer.jobs.index') }}" class="btn btn-light">
                            Manage Jobs
                        </a>
                        <a href="{{ route('employer.subscription.my') }}" class="btn btn-light">
                            My Subscription
                        </a>
                        <a href="{{ route('employer.subscription.plans') }}" class="btn btn-info">
                            Upgrade Plan
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="card shadow-sm mt-4">

            <div class="card-header">

                Recent Applications

            </div>

            <div class="card-body">

                <table class="table">

                    <thead>

                        <tr>

                            <th>Applicant</th>

                            <th>Job</th>

                            <th>Status</th>

                            <th>Date</th>

                        </tr>

                    </thead>

                    <tbody>

                        @forelse($recentApplications as $application)
                            <tr>

                                <td>

                                    {{ $application->user->name }}

                                </td>

                                <td>

                                    {{ $application->job->title }}

                                </td>

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

                                    {{ $application->created_at->format('d M Y') }}

                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td colspan="4" class="text-center">

                                    No Applications Found

                                </td>

                            </tr>
                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>


    </main>
@endsection
