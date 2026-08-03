@extends('backend.admin.layouts.master')

@section('content')

<main class="page-content">

    <div class="container-fluid px-3 px-lg-4 py-4">

        <div class="mb-4 d-flex justify-content-between align-items-center">

            <div>

                <h3 class="fw-bold mb-1">
                    Company Details
                </h3>

                <p class="text-muted mb-0">
                    View company information
                </p>

            </div>

            <a href="{{ route('admin.companies.index') }}"
               class="btn btn-primary">

                <i class="bi bi-arrow-left"></i>

                Back

            </a>

        </div>

        <div class="card border-0 shadow rounded-4">

            <div class="card-body p-4">

                <div class="row">

                    <div class="col-md-3 text-center">

                        <img
                            src="{{ asset('storage/'.$company->logo) }}"
                            class="rounded-circle border"
                            width="150"
                            height="150"
                            style="object-fit:cover">

                    </div>

                    <div class="col-md-9">

                        <table class="table">

                            <tr>
                                <th width="200">Company</th>
                                <td>{{ $company->company_name }}</td>
                            </tr>

                            <tr>
                                <th>Owner</th>
                                <td>{{ $company->user->name }}</td>
                            </tr>

                            <tr>
                                <th>Email</th>
                                <td>{{ $company->email }}</td>
                            </tr>

                            <tr>
                                <th>Phone</th>
                                <td>{{ $company->phone }}</td>
                            </tr>

                            <tr>
                                <th>Website</th>
                                <td>

                                    <a
                                        href="{{ $company->website }}"
                                        target="_blank">

                                        {{ $company->website }}

                                    </a>

                                </td>
                            </tr>

                            <tr>
                                <th>Address</th>
                                <td>{{ $company->address }}</td>
                            </tr>

                            <tr>
                                <th>Total Jobs</th>
                                <td>

                                    <span class="badge bg-success">

                                        {{ $company->job->count() }}

                                    </span>

                                </td>
                            </tr>

                            <tr>
                                <th>Description</th>
                                <td>{{ $company->description }}</td>
                            </tr>

                        </table>

                    </div>

                </div>

            </div>

        </div>

    </div>

</main>

@endsection