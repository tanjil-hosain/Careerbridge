@extends('backend.job_seeker.layouts.master')

@section('content')

<main class="page-content">

<div class="container-fluid">

    <!-- Welcome Card -->
    <div class="card bg-primary text-white border-0 shadow mb-4">

        <div class="card-body d-flex justify-content-between align-items-center">

            <div>

                <h3 class="fw-bold mb-2">
                    👋 Welcome Back, {{ auth()->user()->name }}
                </h3>

                <p class="mb-0">
                    Welcome to CareerBridge Job Seeker Dashboard.
                    Manage your applications and subscription easily.
                </p>

            </div>

            <div class="d-none d-md-block">

                <i class="fas fa-user-graduate fa-5x opacity-50"></i>

            </div>

        </div>

    </div>


    <!-- Statistics -->
    <div class="row">

        <!-- Applied Jobs -->
        <div class="col-xl-3 col-md-6 mb-4">

            <div class="card border-start border-primary border-4 shadow-sm h-100">

                <div class="card-body">

                    <div class="d-flex justify-content-between">

                        <div>

                            <small class="text-muted">
                                Applied Jobs
                            </small>

                            <h2 class="fw-bold mt-2">

                                {{ $appliedJobs }}

                            </h2>

                        </div>

                        <div>

                            <i class="fas fa-file-alt fa-2x text-primary"></i>

                        </div>

                    </div>

                </div>

            </div>

        </div>


        <!-- Current Plan -->
        <div class="col-xl-3 col-md-6 mb-4">

            <div class="card border-start border-success border-4 shadow-sm h-100">

                <div class="card-body">

                    <div class="d-flex justify-content-between">

                        <div>

                            <small class="text-muted">
                                Current Plan
                            </small>

                            <h4 class="fw-bold mt-2">

                                {{ $subscription ? $subscription->plan->name : 'No Plan' }}

                            </h4>

                        </div>

                        <div>

                            <i class="fas fa-crown fa-2x text-success"></i>

                        </div>

                    </div>

                </div>

            </div>

        </div>


        <!-- Remaining -->
        <div class="col-xl-3 col-md-6 mb-4">

            <div class="card border-start border-warning border-4 shadow-sm h-100">

                <div class="card-body">

                    <div class="d-flex justify-content-between">

                        <div>

                            <small class="text-muted">
                                Remaining Applications
                            </small>

                            <h2 class="fw-bold mt-2">

                                {{ $subscription ? $subscription->remaining_limit : 0 }}

                            </h2>

                        </div>

                        <div>

                            <i class="fas fa-layer-group fa-2x text-warning"></i>

                        </div>

                    </div>

                </div>

            </div>

        </div>


        <!-- Expire -->
        <div class="col-xl-3 col-md-6 mb-4">

            <div class="card border-start border-danger border-4 shadow-sm h-100">

                <div class="card-body">

                    <div class="d-flex justify-content-between">

                        <div>

                            <small class="text-muted">
                                Expire Date
                            </small>

                            <h5 class="fw-bold mt-2">

                                {{ $subscription ? \Carbon\Carbon::parse($subscription->end_date)->format('d M Y') : '--' }}

                            </h5>

                        </div>

                        <div>

                            <i class="fas fa-calendar-alt fa-2x text-danger"></i>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

        <div class="row">

        <!-- Subscription Card -->
        <div class="col-lg-7 mb-4">

            <div class="card shadow-sm border-0 h-100">

                <div class="card-header bg-white d-flex justify-content-between align-items-center">

                    <h5 class="mb-0">
                        <i class="fas fa-crown text-warning me-2"></i>
                        Subscription Details
                    </h5>

                    @if($subscription)
                        <span class="badge bg-success">
                            {{ ucfirst($subscription->status) }}
                        </span>
                    @endif

                </div>

                <div class="card-body">

                    @if($subscription)

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
                                $percentage = $subscription->plan->limit == -1
                                    ? 100
                                    : ($remaining / max($limit,1))*100;
                            @endphp

                            <div class="progress-bar bg-success"
                                 role="progressbar"
                                 style="width: {{ $percentage }}%">

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

                        <a href="{{ route('job_seeker.subscription.plans') }}"
                           class="btn btn-warning">

                            Upgrade Plan

                        </a>

                    @else

                        <div class="alert alert-warning">

                            You don't have an active subscription.

                        </div>

                        <a href="{{ route('job_seeker.subscription.plans') }}"
                           class="btn btn-primary">

                            Buy Subscription

                        </a>

                    @endif

                </div>

            </div>

        </div>

        <!-- Quick Actions -->
        <div class="col-lg-5 mb-4">

            <div class="card shadow-sm border-0 h-100">

                <div class="card-header bg-white">

                    <h5 class="mb-0">

                        <i class="fas fa-bolt text-primary me-2"></i>

                        Quick Actions

                    </h5>

                </div>

                <div class="card-body d-grid gap-3">

                    <a href=""
                       class="btn btn-outline-primary">

                        <i class="fas fa-search me-2"></i>

                        Browse Jobs

                    </a>

                    <a href="{{ route('job_seeker.application.index') }}"
                       class="btn btn-outline-success">

                        <i class="fas fa-file-alt me-2"></i>

                        My Applications

                    </a>

                    <a href="{{ route('job_seeker.subscription.my') }}"
                       class="btn btn-outline-warning">

                        <i class="fas fa-credit-card me-2"></i>

                        My Subscription

                    </a>

                    <a href="{{ route('job_seeker.profile.index') }}"
                       class="btn btn-outline-secondary">

                        <i class="fas fa-user-edit me-2"></i>

                        Edit Profile

                    </a>

                </div>

            </div>

        </div>

    </div>
    <div class="row">

    <div class="col-12">

        <div class="card shadow-sm border-0">

            <div class="card-header bg-white d-flex justify-content-between align-items-center">

                <h5 class="mb-0">

                    <i class="fas fa-history text-primary me-2"></i>

                    Recent Applications

                </h5>

                <a href="{{ route('job_seeker.application.index') }}"
                   class="btn btn-sm btn-primary">

                    View All

                </a>

            </div>

            <div class="card-body">

                @if($recentApplications->count())

                    <div class="table-responsive">

                        <table class="table table-hover align-middle">

                            <thead class="table-light">

                                <tr>

                                    <th>Job</th>

                                    <th>Company</th>

                                    <th>Status</th>

                                    <th>Date</th>

                                </tr>

                            </thead>

                            <tbody>

                                @foreach($recentApplications as $application)

                                    <tr>

                                        <td>

                                            {{ $application->job->title }}

                                        </td>

                                        <td>

                                            {{ $application->job->company->name }}

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

                                @endforeach

                            </tbody>

                        </table>

                    </div>

                @else

                    <div class="text-center py-5">

                        <i class="fas fa-folder-open fa-4x text-muted mb-3"></i>

                        <h5>

                            No Applications Yet

                        </h5>

                        <p class="text-muted">

                            Start applying for jobs to see your recent activity.

                        </p>

                        <a href="{{ route('jobs') }}"
                           class="btn btn-primary">

                            Browse Jobs

                        </a>

                    </div>

                @endif

            </div>

        </div>

    </div>

</div>

</div>

</main>

@endsection

