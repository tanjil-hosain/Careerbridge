@extends('backend.employer.layouts.master')

@section('content')
    <div class="page-content">

        <div class="d-flex align-items-center justify-content-between mb-4">
            <div>
                <h4 class="mb-1">Company Profile</h4>
                <p class="mb-0 text-secondary">Add your company information before posting jobs.</p>
            </div>

            <a href="{{ route('employer.company.index') }}" class="btn btn-light">
                Back to Profile
            </a>
        </div>

        <div class="card">
            <div class="card-body">
                <form action="{{ route('employer.company.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="row g-3">

                        <div class="col-md-6">
                            <label class="form-label">Company Name <span class="text-danger">*</span></label>
                            <input type="text" name="company_name"
                                value="{{ old('company_name') }}"
                                class="form-control @error('company_name') is-invalid @enderror"
                                placeholder="Example: ABC Technology Ltd." required>

                            @error('company_name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Company Email</label>
                            <input type="email" name="email"
                                value="{{ old('email') }}"
                                class="form-control @error('email') is-invalid @enderror"
                                placeholder="Example: info@company.com">

                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Phone Number</label>
                            <input type="text" name="phone"
                                value="{{ old('phone') }}"
                                class="form-control @error('phone') is-invalid @enderror"
                                placeholder="Example: 01XXXXXXXXX">

                            @error('phone')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Website</label>
                            <input type="url" name="website"
                                value="{{ old('website') }}"
                                class="form-control @error('website') is-invalid @enderror"
                                placeholder="Example: https://company.com">

                            @error('website')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-12">
                            <label class="form-label">Company Address</label>
                            <input type="text" name="address"
                                value="{{ old('address') }}"
                                class="form-control @error('address') is-invalid @enderror"
                                placeholder="Example: Dhaka, Bangladesh">

                            @error('address')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-12">
                            <label class="form-label">Company Description</label>
                            <textarea name="description" rows="5"
                                class="form-control @error('description') is-invalid @enderror"
                                placeholder="Write a short description about your company...">{{ old('description') }}</textarea>

                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Company Logo</label>
                            <input type="file" name="logo"
                                class="form-control @error('logo') is-invalid @enderror"
                                accept=".jpg,.jpeg,.png,.webp">

                            <small class="text-secondary">Allowed: JPG, JPEG, PNG, WEBP. Maximum 2 MB.</small>

                            @error('logo')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-12 mt-4">
                            <button type="submit" class="btn btn-primary">
                                Save Company Profile
                            </button>

                            <a href="{{ route('employer.dashboard') }}" class="btn btn-light">
                                Cancel
                            </a>
                        </div>

                    </div>
                </form>
            </div>
        </div>

    </div>
@endsection