@extends('layouts.app')

@section('style')
<style>
    /**
 * The CSS shown here will not be introduced in the Quickstart guide, but shows
 * how you can use CSS to style your Element's container.
 */
    .StripeElement {
        box-sizing: border-box;

        height: 40px;

        padding: 10px 12px;

        border: 1px solid transparent;
        border-radius: 4px;
        background-color: white;

        box-shadow: 0 1px 3px 0 #e6ebf1;
        -webkit-transition: box-shadow 150ms ease;
        transition: box-shadow 150ms ease;
    }

    .StripeElement--focus {
        box-shadow: 0 1px 3px 0 #cfd7df;
    }

    .StripeElement--invalid {
        border-color: #fa755a;
    }

    .StripeElement--webkit-autofill {
        background-color: #fefde5 !important;
    }

</style>
@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header">
                    Payment
                </div>
                <div class="card-body">
                    <h5 class="card-title">total amount <strong>${{ $totalAmount }}</h5>
                    <form action="{{ route('cart.charge') }}" method="post" id="payment-form">
                        @csrf
                        <input type="hidden" name="amount" value="{{ $totalAmount }}">
                        <div class="">
                            <label for="card-element card-text">
                                Credit or debit card
                            </label>
                            <div id="card-element">
                                <!-- A Stripe Element will be inserted here. -->
                            </div>
                            <!-- Used to display form errors. -->
                            <div id="card-errors" role="alert"></div>
                        </div>
                        <button class="btn btn-primary mt-3">Submit Payment</button>
                    </form>
                </div>
            </div>
        </div>
        <br>
    </div>
</div>
@endsection
@section('script')
@parent
<script src="https://js.stripe.com/v3/"></script>
<script src="{{ asset('js/stripe.js') }}"></script>

@endsection
