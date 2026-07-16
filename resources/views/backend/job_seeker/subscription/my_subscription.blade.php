@extends('backend.job_seeker.layouts.master')

@section('content')

    <main  class="page-content">

        <div class="container py-4">

            <div class="card shadow">

                <div class="card-header">

                    <h4 class="mb-0">

                        My Subscription

                    </h4>

                </div>

                <div class="card-body">

                    @if ($subscription)
                        <table class="table table-bordered">

                            <tr>

                                <th width="35%">Plan</th>

                                <td>{{ $subscription->plan->name }}</td>

                            </tr>

                            <tr>

                                <th>Price</th>

                                <td>৳ {{ number_format($subscription->amount, 2) }}</td>

                            </tr>

                            <tr>

                                <th>Remaining Limit</th>

                                <td>{{ $subscription->remaining_limit }}</td>

                            </tr>

                            <tr>

                                <th>Start Date</th>

                                <td>{{ $subscription->start_date }}</td>

                            </tr>

                            <tr>

                                <th>Expire Date</th>

                                <td>{{ $subscription->end_date }}</td>

                            </tr>

                            <tr>

                                <th>Payment</th>

                                <td>

                                    <span class="badge bg-success">

                                        {{ ucfirst($subscription->payment_status) }}

                                    </span>

                                </td>

                            </tr>

                            <tr>

                                <th>Status</th>

                                <td>

                                    @if ($subscription->status == 'active')
                                        <span class="badge bg-success">

                                            Active

                                        </span>
                                    @else
                                        <span class="badge bg-danger">

                                            Expired

                                        </span>
                                    @endif

                                </td>

                            </tr>

                            <tr>

                                <th>Transaction ID</th>

                                <td>{{ $subscription->transaction_id }}</td>

                            </tr>

                        </table>

                        <a href="{{ route('job_seeker.subscription.plans') }}" class="btn btn-primary">

                            Upgrade Plan

                        </a>
                    @else
                        <div class="alert alert-warning">

                            You don't have any subscription.

                        </div>

                        <a href="{{ route('job_seeker.subscription.plans') }}" class="btn btn-success">

                            Buy Subscription

                        </a>
                    @endif

                </div>

            </div>

        </div>

    </main>

@endsection
