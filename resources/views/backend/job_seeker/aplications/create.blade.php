@extends('backend.job_seeker.master')

@section('content')

<div class="container py-4">

    <div class="card shadow-sm">

        <div class="card-header">
            <h4 class="mb-0">Apply for Job</h4>
        </div>

        <div class="card-body">

            <div class="mb-4">
                <h5>{{ $job->title }}</h5>

                <p class="mb-1">
                    <strong>Company:</strong>
                    {{ $job->company->company_name }}
                </p>

                <p class="mb-1">
                    <strong>Category:</strong>
                    {{ $job->category->name }}
                </p>

                <p class="mb-1">
                    <strong>Location:</strong>
                    {{ $job->location }}
                </p>

                <p class="mb-0">
                    <strong>Salary:</strong>
                    {{ $job->salary }}
                </p>
            </div>

            <form action="{{ route('job_seeker.application.store') }}"
                  method="POST"
                  enctype="multipart/form-data">

                @csrf

                <input type="hidden"
                       name="job_id"
                       value="{{ $job->id }}">

                <div class="mb-3">
                    <label class="form-label">
                        Resume (PDF)
                    </label>

                    <input type="file"
                           name="resume"
                           class="form-control">

                    @error('resume')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">
                        Cover Letter
                    </label>

                    <textarea name="cover_letter"
                              rows="6"
                              class="form-control"
                              placeholder="Write your cover letter...">{{ old('cover_letter') }}</textarea>

                    @error('cover_letter')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <button class="btn btn-primary">
                    Apply Now
                </button>

                <a href="{{ route('jobs.details', $job) }}"
                   class="btn btn-secondary">
                    Cancel
                </a>

            </form>

        </div>

    </div>

</div>

@endsection