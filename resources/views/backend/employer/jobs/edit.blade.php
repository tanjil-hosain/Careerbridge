@extends('backend.employer.layouts.master')

@section('content')
    <div class="page-content">

        <div class="d-flex align-items-center justify-content-between mb-4">
            <div>
                <h4 class="mb-1">Edit Job</h4>
                <p class="mb-0 text-secondary">Update your job post information.</p>
            </div>

            <a href="{{ route('employer.jobs.index') }}" class="btn btn-light">
                Back to Jobs
            </a>
        </div>

        <div class="card border-0 shadow-sm">
            <div class="card-body">
                <form action="{{ route('employer.jobs.update', $job->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="row g-3">

                        <div class="col-md-6">
                            <label class="form-label">Job Title <span class="text-danger">*</span></label>
                            <input type="text" name="title"
                                value="{{ old('title', $job->title) }}"
                                class="form-control @error('title') is-invalid @enderror" required>

                            @error('title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Job Category <span class="text-danger">*</span></label>
                            <select name="category_id"
                                class="form-select @error('category_id') is-invalid @enderror" required>

                                <option value="">Select Category</option>

                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}"
                                        {{ old('category_id', $job->category_id) == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>

                            @error('category_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Job Type <span class="text-danger">*</span></label>
                            <select name="job_type"
                                class="form-select @error('job_type') is-invalid @enderror" required>

                                <option value="">Select Job Type</option>
                                <option value="Full Time"
                                    {{ old('job_type', $job->job_type) == 'Full Time' ? 'selected' : '' }}>
                                    Full Time
                                </option>
                                <option value="Part Time"
                                    {{ old('job_type', $job->job_type) == 'Part Time' ? 'selected' : '' }}>
                                    Part Time
                                </option>
                                <option value="Remote"
                                    {{ old('job_type', $job->job_type) == 'Remote' ? 'selected' : '' }}>
                                    Remote
                                </option>
                                <option value="Internship"
                                    {{ old('job_type', $job->job_type) == 'Internship' ? 'selected' : '' }}>
                                    Internship
                                </option>
                            </select>

                            @error('job_type')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Job Location <span class="text-danger">*</span></label>
                            <input type="text" name="location"
                                value="{{ old('location', $job->location) }}"
                                class="form-control @error('location') is-invalid @enderror" required>
                        </div>

                        <div class="col-md-4">
                            <label class="form-label">Salary</label>
                            <input type="text" name="salary"
                                value="{{ old('salary', $job->salary) }}"
                                class="form-control">
                        </div>

                        <div class="col-md-4">
                            <label class="form-label">Experience</label>
                            <input type="text" name="experience"
                                value="{{ old('experience', $job->experience) }}"
                                class="form-control">
                        </div>

                        <div class="col-md-4">
                            <label class="form-label">Application Deadline <span class="text-danger">*</span></label>
                            <input type="date" name="deadline"
                                value="{{ old('deadline', $job->deadline) }}"
                                class="form-control @error('deadline') is-invalid @enderror" required>
                        </div>

                        <div class="col-12">
                            <label class="form-label">Job Description <span class="text-danger">*</span></label>
                            <textarea name="description" rows="6"
                                class="form-control @error('description') is-invalid @enderror"
                                required>{{ old('description', $job->description) }}</textarea>
                        </div>

                        <div class="col-12">
                            <label class="form-label">Job Requirements</label>
                            <textarea name="requirements" rows="5"
                                class="form-control">{{ old('requirements', $job->requirements) }}</textarea>
                        </div>

                        <div class="col-md-4">
                            <label class="form-label">Status</label>
                            <select name="status" class="form-select">
                                <option value="1"
                                    {{ old('status', $job->status) == 1 ? 'selected' : '' }}>
                                    Active
                                </option>

                                <option value="0"
                                    {{ old('status', $job->status) == 0 ? 'selected' : '' }}>
                                    Inactive
                                </option>
                            </select>
                        </div>

                        <div class="col-12 mt-4">
                            <button type="submit" class="btn btn-primary">
                                <i class="bi bi-check-circle me-1"></i>
                                Update Job
                            </button>

                            <a href="{{ route('employer.jobs.index') }}" class="btn btn-light">
                                Cancel
                            </a>
                        </div>

                    </div>
                </form>
            </div>
        </div>

    </div>
@endsection