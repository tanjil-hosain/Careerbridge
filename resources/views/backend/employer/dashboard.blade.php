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
            <div class="col-lg-7">
                <div class="card shadow-sm">
                    <div class="card-header">
                        Subscription Details
                    </div>
                    <div class="card-body">
                        @if ($subscription)
                            <p>
                                <b>Plan :</b>
                                {{ $subscription->plan->name }}
                            </p>
                            <p>
                                <b>Status :</b>
                                <span class="badge bg-success">
                                    {{ ucfirst($subscription->status) }}
                                </span>
                            </p>
                            <p>
                                <b>Remaining :</b>
                                {{ $subscription->remaining_limit }}
                            </p>
                            <p>
                                <b>Expire :</b>

                                {{ $subscription->end_date }}
                            </p>
                            <a href="{{ route('employer.subscription.plans') }}" class="btn btn-warning">
                                Upgrade Plan
                            </a>
                        @else
                            <div class="alert alert-warning">
                                No Subscription Found
                            </div>
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




    </main>
@endsection
