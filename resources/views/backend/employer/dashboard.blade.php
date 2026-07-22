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





    </main>
@endsection
