@extends('backend.job_seeker.layouts.master')

@section('content')
<div class="page-content">

    <div class="d-flex align-items-center justify-content-between mb-4">
        <div>
            <h4 class="mb-1">Edit Profile</h4>
            <p class="mb-0 text-secondary">Update your job seeker profile.</p>
        </div>

        <a href="{{ route('job_seeker.profile.index') }}" class="btn btn-light">
            Back to Profile
        </a>
    </div>

    <div class="card">
        <div class="card-body">

            <form action="{{ route('job_seeker.profile.update', $jobSeekerProfile->id) }}"
                  method="POST"
                  enctype="multipart/form-data">

                @csrf
                @method('PUT')

                <div class="row g-3">

                    <div class="col-md-6">
                        <label class="form-label">Full Name <span class="text-danger">*</span></label>
                        <input type="text"
                               name="full_name"
                               value="{{ old('full_name', $jobSeekerProfile->full_name) }}"
                               class="form-control @error('full_name') is-invalid @enderror">

                        @error('full_name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Email</label>
                        <input type="email"
                               value="{{ auth()->user()->email }}"
                               class="form-control"
                               readonly>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Phone</label>
                        <input type="text"
                               name="phone"
                               value="{{ old('phone', $jobSeekerProfile->phone) }}"
                               class="form-control">
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Education</label>
                        <input type="text"
                               name="education"
                               value="{{ old('education', $jobSeekerProfile->education) }}"
                               class="form-control">
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Experience</label>
                        <input type="text"
                               name="experience"
                               value="{{ old('experience', $jobSeekerProfile->experience) }}"
                               class="form-control">
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Skills</label>
                        <input type="text"
                               name="skills"
                               value="{{ old('skills', $jobSeekerProfile->skills) }}"
                               class="form-control">
                    </div>

                    <div class="col-12">
                        <label class="form-label">Address</label>
                        <textarea name="address"
                                  rows="4"
                                  class="form-control">{{ old('address', $jobSeekerProfile->address) }}</textarea>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Resume (PDF)</label>

                        <input type="file"
                               name="resume"
                               class="form-control"
                               accept=".pdf">

                        @if($jobSeekerProfile->resume)
                            <div class="mt-2">
                                <a href="{{ asset('storage/'.$jobSeekerProfile->resume) }}"
                                   target="_blank"
                                   class="btn btn-sm btn-outline-primary">
                                    View Current Resume
                                </a>
                            </div>
                        @endif
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Profile Photo</label>

                        <input type="file"
                               name="profile_photo"
                               class="form-control"
                               accept=".jpg,.jpeg,.png,.webp">

                        @if($jobSeekerProfile->profile_photo)
                            <div class="mt-3">
                                <img src="{{ asset('storage/'.$jobSeekerProfile->profile_photo) }}"
                                     class="rounded border"
                                     style="width:90px;height:90px;object-fit:cover;">
                            </div>
                        @endif
                    </div>

                    <div class="col-12 mt-4">

                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-check-circle me-1"></i>
                            Update Profile
                        </button>

                        <a href="{{ route('employer.jobs.index') }}"
                           class="btn btn-light">
                            Cancel
                        </a>

                    </div>

                </div>

            </form>

        </div>
    </div>

</div>
@endsection