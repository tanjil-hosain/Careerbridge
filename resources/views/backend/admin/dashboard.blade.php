@extends('backend.admin.layouts.master')


@section('content')
<div class="page-content">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Admin Dashboard</h1>
    </div>


    <div class="row">
        
        <!-- Total Employers -->
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Employers</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalEmployers }}</div>
                        </div>
                        <div class="col-auto"><i class="fas fa-briefcase fa-2x text-gray-300"></i></div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Total Job Seekers -->
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Total Job Seekers</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalJobSeekers }}</div>
                        </div>
                        <div class="col-auto"><i class="fas fa-users fa-2x text-gray-300"></i></div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Total Companies -->
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Total Companies</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalCompanies }}</div>
                        </div>
                        <div class="col-auto"><i class="fas fa-building fa-2x text-gray-300"></i></div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Total Jobs -->
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Total Jobs</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalJobs }}</div>
                        </div>
                        <div class="col-auto"><i class="fas fa-file-alt fa-2x text-gray-300"></i></div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Applications -->
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Applications</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalApplications }}</div>
                        </div>
                        <div class="col-auto"><i class="fas fa-paper-plane fa-2x text-gray-300"></i></div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Active Plans -->
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-secondary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-secondary text-uppercase mb-1">Active Plans</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalPlans }}</div>
                        </div>
                        <div class="col-auto"><i class="fas fa-medal fa-2x text-gray-300"></i></div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- ================= TABLES SECTION (Latest Data) ================= -->
    <div class="row">
        
        <!-- Latest Jobs Table -->
        <div class="col-lg-6 mb-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Latest Jobs</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Job Title</th>
                                    <th>Company</th>
                                    <th>Posted</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($latestJobs as $job)
                                    <tr>
                                        <td>{{ $job->title }}</td>
                                        <td>{{ $job->company->company_name ?? 'N/A' }}</td>
                                        <td>{{ $job->created_at->diffForHumans() }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3" class="text-center">No jobs found</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Latest Companies Table -->
        <div class="col-lg-6 mb-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-info">Latest Companies</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Company Name</th>
                                    <th>Joined</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($latestCompanies as $company)
                                    <tr>
                                        <td>{{ $company->company_name }}</td>
                                        <td>{{ $company->created_at->diffForHumans() }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="2" class="text-center">No companies found</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>
@endsection