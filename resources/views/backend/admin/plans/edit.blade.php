@extends('backend.admin.layouts.master')

@section('content')
    <main class="page-content">
        <div class="container-fluid">

            <div class="row">

                <div class="col-lg-8 mx-auto">

                    <div class="card shadow-sm">

                        <div class="card-header d-flex justify-content-between align-items-center">

                            <h4 class="mb-0">Edit Subscription Plan</h4>

                            <a href="{{ route('admin.plans.index') }}" class="btn btn-secondary btn-sm">
                                Back
                            </a>

                        </div>

                        <div class="card-body">

                            <form action="{{ route('admin.plans.update', $plan) }}" method="POST">

                                @csrf
                                @method('PUT')

                                <div class="row">

                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Plan Name</label>

                                        <input type="text" name="name" value="{{ old('name', $plan->name) }}"
                                            class="form-control @error('name') is-invalid @enderror">

                                        @error('name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Price (BDT)</label>

                                        <input type="number" step="0.01" name="price"
                                            value="{{ old('price', $plan->price) }}"
                                            class="form-control @error('price') is-invalid @enderror">

                                        @error('price')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Job Limit</label>

                                        <input type="number" name="job_limit"
                                            value="{{ old('job_limit', $plan->job_limit) }}"
                                            class="form-control @error('job_limit') is-invalid @enderror">

                                        @error('job_limit')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Duration (Days)</label>

                                        <input type="number" name="duration" value="{{ old('duration', $plan->duration) }}"
                                            class="form-control @error('duration') is-invalid @enderror">

                                        @error('duration')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-12 mb-3">
                                        <label class="form-label">Description</label>

                                        <textarea name="description" rows="4" class="form-control @error('description') is-invalid @enderror">{{ old('description', $plan->description) }}</textarea>

                                        @error('description')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-md-6 mb-4">
                                        <label class="form-label">Status</label>

                                        <select name="status" class="form-select">

                                            <option value="1" {{ $plan->status ? 'selected' : '' }}>
                                                Active
                                            </option>

                                            <option value="0" {{ !$plan->status ? 'selected' : '' }}>
                                                Inactive
                                            </option>

                                        </select>

                                    </div>

                                </div>

                                <button type="submit" class="btn btn-primary">
                                    Update Plan
                                </button>

                                <a href="{{ route('admin.plans.index') }}" class="btn btn-light">
                                    Cancel
                                </a>

                            </form>

                        </div>

                    </div>

                </div>

            </div>

        </div>
        </div>
    @endsection
