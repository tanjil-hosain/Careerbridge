@extends('backend.employer.layouts.master')

@section('content')
    <div class="page-content">

        <div class="d-flex align-items-center justify-content-between mb-4">
            <div>
                <h4 class="mb-1">Edit Company Profile</h4>
                <p class="mb-0 text-secondary">Update your company information.</p>
            </div>

            <a href="{{ route('employer.company.index') }}" class="btn btn-light">
                Back to Profile
            </a>
        </div>

        <div class="card">
            <div class="card-body">
                <form action="{{ route('employer.company.update', $company->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="row g-3">

                        <div class="col-md-6">
                            <label class="form-label">Company Name <span class="text-danger">*</span></label>
                            <input type="text" name="company_name"
                                value="{{ old('company_name', $company->company_name) }}"
                                class="form-control @error('company_name') is-invalid @enderror" required>

                            @error('company_name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Company Email</label>
                            <input type="email" name="email"
                                value="{{ old('email', $company->email) }}"
                                class="form-control @error('email') is-invalid @enderror">

                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Phone Number</label>
                            <input type="text" name="phone"
                                value="{{ old('phone', $company->phone) }}"
                                class="form-control @error('phone') is-invalid @enderror">

                            @error('phone')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Website</label>
                            <input type="url" name="website"
                                value="{{ old('website', $company->website) }}"
                                class="form-control @error('website') is-invalid @enderror">

                            @error('website')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-12">
                            <label class="form-label">Company Address</label>
                            <input type="text" name="address"
                                value="{{ old('address', $company->address) }}"
                                class="form-control @error('address') is-invalid @enderror">

                            @error('address')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-12">
                            <label class="form-label">Company Description</label>
                            <textarea name="description" rows="5"
                                class="form-control @error('description') is-invalid @enderror">{{ old('description', $company->description) }}</textarea>

                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Company Logo</label>

                            <input type="file" name="logo"
                                class="form-control @error('logo') is-invalid @enderror"
                                accept=".jpg,.jpeg,.png,.webp">

                            <small class="text-secondary">
                                Leave empty if you do not want to change the logo.
                            </small>

                            @error('logo')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror

                            @if ($company->logo)
                                <div class="mt-3">
                                    <small class="text-secondary d-block mb-2">Current Logo</small>
                                    <img src="{{ asset('storage/' . $company->logo) }}"
                                        alt="{{ $company->company_name }}"
                                        class="border rounded p-1"
                                        style="width: 90px; height: 90px; object-fit: cover;">
                                </div>
                            @endif
                        </div>

                        <div class="col-12 mt-4">
                            <button  class="btn btn-primary">
                                <i class="bi bi-check-circle me-1"></i>
                                Update Company Profile
                            </button>

                            <a href="{{ route('employer.company.index') }}" class="btn btn-light">
                                Cancel
                            </a>
                        </div>

                    </div>
                </form>
            </div>
        </div>

    </div>
@endsection