@extends('backend.employer.layouts.master')

@section('content')
    <main class="page-content">
        <div class="container-fluid">

            <div class="row mb-4">

                <div class="col-12">

                    <div class="d-flex justify-content-between align-items-center">

                        <div>
                            <h3 class="mb-1">Subscription Plans</h3>
                            <p class="text-muted mb-0">
                                Choose the best plan for your career.
                            </p>
                        </div>

                    </div>

                </div>

            </div>
            <div>
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}

                        <button type="button" class="btn-close" data-bs-dismiss="alert">
                        </button>
                    </div>
                @endif

                @if (session('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session('error') }}

                        <button type="button" class="btn-close" data-bs-dismiss="alert">
                        </button>
                    </div>
                @endif
            </div>

            <div class="row">

                @foreach ($plans as $plan)
                    <div class="col-lg-4 col-md-6 mb-4">

                        <div class="card border-0 shadow-sm h-100">

                            <div class="card-body text-center">

                                <h4 class="fw-bold">
                                    {{ $plan->name }}
                                </h4>

                                <h2 class="text-primary my-3">

                                    ৳{{ number_format($plan->price, 0) }}

                                </h2>

                                <p class="text-muted">

                                    {{ $plan->duration }} Days

                                </p>

                                <hr>

                                <ul class="list-group list-group-flush text-start">

                                    <li class="list-group-item border-0">

                                        ✅
                                        @if ($plan->limit == -1)
                                            Unlimited Applications
                                        @else
                                            {{ $plan->limit }} Job Posts
                                        @endif

                                    </li>

                                    <li class="list-group-item border-0">

                                        ✅ Plan Duration :
                                        {{ $plan->duration }} Days

                                    </li>

                                    <li class="list-group-item border-0">

                                        ✅ Premium Support

                                    </li>

                                    <li class="list-group-item border-0">

                                        ✅ Secure Payment

                                    </li>

                                </ul>

                            </div>

                            <div class="card-footer bg-white border-0">

                                <a href="{{ route('employer.subscription.checkout', $plan) }}"
                                    class="btn btn-primary w-100">
                                    Choose Plan
                                </a>

                            </div>

                        </div>

                    </div>
                @endforeach

            </div>

        </div>
    </main>
@endsection
