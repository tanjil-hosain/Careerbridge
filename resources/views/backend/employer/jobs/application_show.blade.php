@extends('backend.employer.layouts.master')

@section('content')
    <div class="page-content">
<div class="card">

    <div class="card-header">
        <h4>Applicant Details</h4>
    </div>

    <div class="card-body">

        <table class="table table-bordered">

            <tr>
                <th>Name</th>
                <td>{{ $application->user->name }}</td>
            </tr>

            <tr>
                <th>Email</th>
                <td>{{ $application->user->email }}</td>
            </tr>

            <tr>
                <th>Job</th>
                <td>{{ $application->job->title }}</td>
            </tr>

            <tr>
                <th>Cover Letter</th>
                <td>{{ $application->cover_letter }}</td>
            </tr>

            <tr>
                <th>Resume</th>
                <td>

                    <a href="{{ asset('storage/'.$application->resume) }}"
                       target="_blank"
                       class="btn btn-success btn-sm">

                        Download Resume

                    </a>

                </td>
            </tr>

        </table>

        <hr>

        <form action="{{ route('employer.applications.update', $application) }}"
              method="POST">

            @csrf
            @method('PUT')

            <div class="mb-3">

                <label>Status</label>

                <select name="status" class="form-select">

                    <option value="pending"
                        {{ $application->status == 'pending' ? 'selected' : '' }}>
                        Pending
                    </option>

                    <option value="shortlisted"
                        {{ $application->status == 'shortlisted' ? 'selected' : '' }}>
                        Shortlisted
                    </option>

                    <option value="rejected"
                        {{ $application->status == 'rejected' ? 'selected' : '' }}>
                        Rejected
                    </option>

                </select>

            </div>

            <button class="btn btn-primary">

                Update Status

            </button>

        </form>

    </div>

</div>
    </div>

@endsection