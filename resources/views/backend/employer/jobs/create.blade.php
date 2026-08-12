@extends('backend.employer.layouts.master')

@section('content')
    <div class="page-content">

        <div class="d-flex align-items-center justify-content-between mb-4">
            <div>
                <h4 class="mb-1">Post New Job</h4>
                <p class="mb-0 text-secondary">Create a new job post for your company.</p>
            </div>

            <a href="{{ route('employer.jobs.index') }}" class="btn btn-light">
                Back to Jobs
            </a>
        </div>

        <div class="card border-0 shadow-sm">
            <div class="card-body">
                <form action="{{ route('employer.jobs.store') }}" method="POST">
                    @csrf

                    <div class="row g-3">

                        <div class="col-md-6">
                            <label class="form-label">Job Title <span class="text-danger">*</span></label>
                            <input type="text" name="title" value="{{ old('title') }}"
                                class="form-control @error('title') is-invalid @enderror"
                                placeholder="Example: Laravel Developer" required>

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
                                        {{ old('category_id') == $category->id ? 'selected' : '' }}>
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
                                <option value="Full Time" {{ old('job_type') == 'Full Time' ? 'selected' : '' }}>
                                    Full Time
                                </option>
                                <option value="Part Time" {{ old('job_type') == 'Part Time' ? 'selected' : '' }}>
                                    Part Time
                                </option>
                                <option value="Remote" {{ old('job_type') == 'Remote' ? 'selected' : '' }}>
                                    Remote
                                </option>
                                <option value="Internship" {{ old('job_type') == 'Internship' ? 'selected' : '' }}>
                                    Internship
                                </option>
                            </select>

                            @error('job_type')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Job Location <span class="text-danger">*</span></label>
                            <input type="text" name="location" value="{{ old('location') }}"
                                class="form-control @error('location') is-invalid @enderror"
                                placeholder="Example: Dhaka / Remote" required>

                            @error('location')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-4">
                            <label class="form-label">Salary</label>
                            <input type="text" name="salary" value="{{ old('salary') }}"
                                class="form-control @error('salary') is-invalid @enderror"
                                placeholder="Example: 30,000 - 40,000 BDT">

                            @error('salary')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-4">
                            <label class="form-label">Experience</label>
                            <input type="text" name="experience" value="{{ old('experience') }}"
                                class="form-control @error('experience') is-invalid @enderror"
                                placeholder="Example: 1-2 Years">

                            @error('experience')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-4">
                            <label class="form-label">Application Deadline <span class="text-danger">*</span></label>
                            <input type="date" name="deadline" value="{{ old('deadline') }}"
                                class="form-control @error('deadline') is-invalid @enderror" required>

                            @error('deadline')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-12">
                            <label class="form-label">Job Description <span class="text-danger">*</span></label>
                            <textarea name="description" rows="6"
                                class="form-control @error('description') is-invalid @enderror"
                                placeholder="Write job responsibilities and details..." required>{{ old('description') }}</textarea>

                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-12">
                            <label class="form-label">Job Requirements</label>
                            <textarea name="requirements" rows="5"
                                class="form-control @error('requirements') is-invalid @enderror"
                                placeholder="Write required skills, education, experience...">{{ old('requirements') }}</textarea>

                            @error('requirements')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-4">
                            <label class="form-label">Status</label>
                            <select name="status" class="form-select">
                                <option value="1" {{ old('status', 1) == 1 ? 'selected' : '' }}>Active</option>
                                <option value="0" {{ old('status') == 0 ? 'selected' : '' }}>Inactive</option>
                            </select>
                        </div>

                        <div class="col-12 mt-4">
                            <button type="submit" class="btn btn-primary">
                                <i class="bi bi-send me-1"></i>
                                Publish Job
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