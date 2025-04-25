@extends('frontend.master')

@section('home_title', 'Checkout')

@section('home-content')
    <!-- page-title -->
    <div class="tf-page-title">
        <div class="container-full">
            <div class="heading text-center">Check Out</div>
        </div>
    </div>
    <!-- /page-title -->

    <!-- page-cart -->
    <section class="flat-spacing-11">
        <div class="container">

            @include('message')

            <form action="{{ route('storeCustomerOrder') }}" method="POST">
                @csrf
                @auth
                    <div class="tf-page-cart-wrap layout-2">
                        <div class="tf-page-cart-item">
                            <h5 class="fw-5 mb_20">Billing details</h5>
                            <div class="form-checkout">
                                <fieldset class="box fieldset">
                                    <label for="last-name">Name</label>
                                    <input type="text" class="bg-gray" readonly value="{{ Auth::user()->name }}">
                                </fieldset>
                                <fieldset class="box fieldset">
                                    <label for="phone">Phone Number</label>
                                    <input type="number" readonly class="bg-gray" value="{{ Auth::user()->phone }}">
                                </fieldset>
                                <fieldset class="box fieldset">
                                    <label for="email">Email</label>
                                    <input type="email" readonly class="bg-gray" value="{{ Auth::user()->email }}">
                                </fieldset>
                                <fieldset class="box fieldset">
                                    <label for="note">Address</label>
                                    <textarea name="address" id="address" placeholder="Enter your address">{{ Auth::user()->address ?? old('address') }}</textarea>
                                </fieldset>
                                <fieldset class="box fieldset">
                                    <label for="notes">Order notes (optional)</label>
                                    <textarea name="notes" id="notes" placeholder="Enter your details here size, color etc...">{{ old('notes') }}</textarea>
                                </fieldset>
                            </div>
                        </div>
                        <div class="tf-page-cart-footer">
                            <div class="tf-cart-footer-inner">
                                <h5 class="fw-5 mb_20">Your order</h5>
                                <div class="tf-page-cart-checkout widget-wrap-checkout">
                                    <ul class="wrap-checkout-product">

                                        @php
                                            $totalAmount = 0;
                                        @endphp
                                        @forelse ($carts as $cart)
                                            @php
                                                $totalAmount += $cart['price'] * $cart['quantity'] ?? 0;
                                            @endphp
                                            <li class="checkout-product-item">
                                                <figure class="img-product">
                                                    <img src="{{ Storage::url($cart['thumbnail']) }}" alt="product">
                                                    <span class="quantity">{{ $cart['quantity'] }}</span>
                                                </figure>
                                                <div class="content">
                                                    <div class="info">
                                                        <p class="name">{{ $cart['name'] }}</p>
                                                    </div>
                                                    <span class="price">{{ $cart['price'] }}</span>
                                                </div>
                                            </li>
                                        @empty
                                            <p class="text-danger">No Product Found!</p>
                                        @endforelse
                                    </ul>
                                    <div class="d-flex justify-content-between line pb_20">
                                        <h6 class="fw-5">Total</h6>
                                        <h6 class="total fw-5">{{ number_format($totalAmount, 2) }} TK</h6>
                                    </div>
                                    <div class="wd-check-payment">
                                        <div class="fieldset-radio mb_20">
                                            <input type="radio" name="payment" id="delivery" checked class="tf-check">
                                            <label for="delivery">Cash on delivery</label>
                                        </div>
                                        <p class="text_black-2 mb_20">Your personal data will be used to process your order,
                                            support your experience throughout this website, and for other purposes described in
                                            our
                                            <a href="/privacy-policy" class="text-decoration-underline">privacy policy</a>.
                                        </p>
                                        <div class="box-checkbox fieldset-radio mb_20">
                                            <input type="checkbox" id="check-agree" class="tf-check">
                                            <label for="check-agree" class="text_black-2">I have read and agree to the website
                                                <a href="/terms-conditions" class="text-decoration-underline">terms and
                                                    conditions</a>.</label>
                                        </div>
                                    </div>
                                    <button type="submit"
                                        class="tf-btn radius-3 btn-fill btn-icon animate-hover-btn justify-content-center">Place
                                        order</button>
                                </div>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="text-center">
                        <a href="/login"
                            class="tf-btn radius-3 btn-fill btn-icon animate-hover-btn justify-content-center">Login/Register</a>
                    </div>
                @endauth
            </form>
        </div>
    </section>
    <!-- page-cart -->
@endsection
