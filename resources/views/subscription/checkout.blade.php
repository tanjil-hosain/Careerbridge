@extends('frontend.layouts.master')

@section('content')
    <main class="main">
        <div class="container py-5">

            <div class="row justify-content-center">

                <div class="col-lg-8">

                    <div class="card shadow">

                        <div class="card-header">

                            <h3 class="mb-0">
                                Checkout
                            </h3>

                        </div>

                        <div class="card-body">

                            <table class="table">

                                <tr>
                                    <th>Plan</th>
                                    <td>{{ $plan->name }}</td>
                                </tr>

                                <tr>
                                    <th>Type</th>
                                    <td>{{ ucfirst(str_replace('_', ' ', $plan->type)) }}</td>
                                </tr>

                                <tr>
                                    <th>Duration</th>
                                    <td>{{ $plan->duration }} Days</td>
                                </tr>

                                <tr>
                                    <th>Limit</th>
                                    <td>
                                        {{ $plan->limit == -1 ? 'Unlimited' : $plan->limit }}
                                    </td>
                                </tr>

                                <tr>
                                    <th>Price</th>
                                    <td class="fw-bold text-success">
                                        ৳ {{ number_format($plan->price, 2) }}
                                    </td>
                                </tr>

                            </table>

                            <hr>

                            <div class="d-flex justify-content-between">

                                <a href="{{ url()->previous() }}" class="btn btn-secondary">

                                    Back

                                </a>

                                <a href="#" class="btn btn-success">

                                    Proceed To Payment

                                </a>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>
    </main>
@endsection
