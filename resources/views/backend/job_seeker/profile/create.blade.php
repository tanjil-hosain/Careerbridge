@extends('backend.job_seeker.layouts.master')

@section('content')
<div class="page-content">

    <div class="d-flex align-items-center justify-content-between mb-4">
        <div>
            <h4 class="mb-1">Create Profile</h4>
            <p class="mb-0 text-secondary">Complete your job seeker profile.</p>
        </div>

        <a href="''{{route('job_seeker.profile.index')}}" class="btn btn-light">
            Back
        </a>
    </div>

    <div class="card">
        <div class="card-body">

            <form action="{{route('job_seeker.profile.store')}}"
                  method="POST"
                  enctype="multipart/form-data">

                @csrf

                <div class="row g-3">

                    <div class="col-md-6">
                        <label class="form-label">Full Name <span class="text-danger">*</span></label>
                        <input type="text"
                               name="full_name"
                               value="{{ old('full_name') }}"
                               class="form-control @error('full_name') is-invalid @enderror" placeholder="exp:- Tanjil Hossain">

                        @error('full_name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Email</label>
                        <input type="email"
                               class="form-control"
                               value="{{ auth()->user()->email }}"
                               readonly>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Phone</label>
                        <input type="text"
                               name="phone"
                               value="{{ old('phone') }}"
                               class="form-control" placeholder="o18XXXXXXXX">
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Education</label>
                        <input type="text"
                               name="education"
                               value="{{ old('education') }}"
                               class="form-control"  placeholder="CSE">
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Experience</label>
                        <input type="text"
                               name="experience"
                               value="{{ old('experience') }}"
                               class="form-control" placeholder="2 Years">
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Skills</label>
                        <input type="text"
                               name="skills"
                               value="{{ old('skills') }}"
                               class="form-control" placeholder="php,laravel...">
                    </div>

                    <div class="col-12">
                        <label class="form-label">Address</label>
                        <textarea name="address"
                                  rows="4"
                                  class="form-control" placeholder="Mirpur,Dhaka">{{ old('address') }}</textarea>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Resume (PDF)</label>
                        <input type="file"
                               name="resume"
                               class="form-control"
                               accept=".pdf" >
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Profile Photo</label>
                        <input type="file"
                               name="profile_photo"
                               class="form-control"
                               accept=".jpg,.jpeg,.png,.webp">
                    </div>

                    <div class="col-12 mt-4">
                        <button type="submit" class="btn btn-primary">
                            Create Profile
                        </button>

                        <a href="{{route('job_seeker.profile.index')}}"
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