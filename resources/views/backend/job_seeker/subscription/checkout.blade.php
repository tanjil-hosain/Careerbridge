@extends('backend.job_seeker.layouts.master')

@section('content')
<main class="main">
    <div class="container py-5">

        <div class="row justify-content-center">

            <div class="col-lg-8">

                <div class="card shadow">

                    <div class="card-header">
                        <h3 class="mb-0">Checkout</h3>
                    </div>

                    <div class="card-body">

                        <table class="table">

                            <tr>
                                <th width="35%">Plan</th>
                                <td>{{ $plan->name }}</td>
                            </tr>

                            <tr>
                                <th>Type</th>
                                <td>{{ ucfirst(str_replace('_',' ',$plan->type)) }}</td>
                            </tr>

                            <tr>
                                <th>Duration</th>
                                <td>{{ $plan->duration }} Days</td>
                            </tr>

                            <tr>
                                <th>Limit</th>
                                <td>{{ $plan->limit == -1 ? 'Unlimited' : $plan->limit }}</td>
                            </tr>

                            <tr>
                                <th>Price</th>
                                <td class="fw-bold text-success">
                                    ৳ {{ number_format($plan->price,2) }}
                                </td>
                            </tr>

                        </table>

                        <hr>

                        <h5 class="mb-3">
                            Select Payment Method
                        </h5>

                        <div class="form-check border rounded p-3 mb-3">

                            <input class="form-check-input"
                                   type="radio"
                                   name="payment_method"
                                   value="bkash"
                                   id="bkash"
                                   checked>

                            <label class="form-check-label ms-2" for="bkash">

                                <img src="{{ asset('assets/images/payment/bkash.png') }}"
                                     width="70">

                            </label>

                        </div>

                        <div class="form-check border rounded p-3 mb-3">

                            <input class="form-check-input"
                                   type="radio"
                                   name="payment_method"
                                   value="nagad"
                                   id="nagad">

                            <label class="form-check-label ms-2" for="nagad">

                                <img src="{{ asset('assets/images/payment/nagad.webp') }}"
                                     width="70">

                            </label>

                        </div>

                        <div class="form-check border rounded p-3 mb-4">

                            <input class="form-check-input"
                                   type="radio"
                                   name="payment_method"
                                   value="card"
                                   id="card">

                            <label class="form-check-label ms-2" for="card">

                                💳 Visa / MasterCard

                            </label>

                        </div>

                        <div class="d-flex justify-content-between">

                            <a href="{{ route('job_seeker.subscription.plans')}}"
                               class="btn btn-secondary">

                                Back

                            </a>

                            <button class="btn btn-success"
                                    data-bs-toggle="modal"
                                    data-bs-target="#paymentModal">

                                Continue Payment

                            </button>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

    <!-- Payment Modal -->
<div class="modal fade" id="paymentModal" tabindex="-1" aria-hidden="true">

    <div class="modal-dialog modal-dialog-centered">

        <div class="modal-content">

            <div class="modal-header">

                <h5 class="modal-title" id="paymentTitle">
                    bKash Payment
                </h5>

                <button type="button"
                        class="btn-close"
                        data-bs-dismiss="modal">
                </button>

            </div>

            <div class="modal-body">

                <div class="alert alert-warning mb-3">
                    <strong>Demo Payment</strong><br>
                    This payment gateway is for project demonstration only.
                </div>

                <form action="{{ route('job_seeker.subscription.pay') }}" method="POST">

                    @csrf

                    <input type="hidden"
                           name="plan_id"
                           value="{{ $plan->id }}">

                    <input type="hidden"
                           name="payment_method"
                           id="payment_method">

                    <div class="mb-3">

                        <label class="form-label">
                            Mobile Number
                        </label>

                        <input type="text"
                               name="mobile"
                               class="form-control"
                               placeholder="01XXXXXXXXX"
                               required>

                    </div>

                    <div class="mb-3">

                        <label class="form-label">
                            PIN
                        </label>

                        <input type="password"
                               name="pin"
                               class="form-control"
                               placeholder="****"
                               required>

                    </div>

                    <div class="border rounded p-3 mb-3 bg-light">

                        <div class="d-flex justify-content-between">
                            <span>Plan</span>
                            <strong>{{ $plan->name }}</strong>
                        </div>

                        <div class="d-flex justify-content-between">
                            <span>Duration</span>
                            <strong>{{ $plan->duration }} Days</strong>
                        </div>

                        <div class="d-flex justify-content-between">
                            <span>Total</span>
                            <strong class="text-success">
                                ৳ {{ number_format($plan->price,2) }}
                            </strong>
                        </div>

                    </div>

                    <button type="submit"
                            class="btn btn-success w-100">

                        Confirm Payment

                    </button>

                </form>

            </div>

        </div>

    </div>

</div>

</main>
<script>

document.addEventListener('DOMContentLoaded', function () {

    const paymentTitle = document.getElementById('paymentTitle');

    const paymentMethod = document.getElementById('payment_method');

    document.querySelectorAll('input[name="payment_method"]').forEach(function(item){

        item.addEventListener('change', function(){

            paymentMethod.value = this.value;

            if(this.value === 'bkash'){
                paymentTitle.innerHTML = '🟣 bKash Payment';
            }

            if(this.value === 'nagad'){
                paymentTitle.innerHTML = '🟠 Nagad Payment';
            }

            if(this.value === 'card'){
                paymentTitle.innerHTML = '💳 Card Payment';
            }

        });

    });

    paymentMethod.value = 'bkash';

});

</script>
@endsection