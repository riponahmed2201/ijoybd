@extends('frontend.master')

@section('home_title', 'View Cart')

@section('home-content')
    <!-- page-title -->
    <div class="tf-page-title">
        <div class="container-full">
            <div class="heading text-center">Shopping Cart</div>
        </div>
    </div>
    <!-- /page-title -->

    <!-- page-cart -->
    <section class="flat-spacing-11">
        <div class="container">
            <div class="tf-page-cart-wrap">
                <div class="tf-page-cart-item">
                    <form>
                        <table class="tf-table-page-cart">
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>

                                @php
                                    $totalAmount = 0;
                                @endphp

                                @forelse ($carts as $cart)
                                    @php
                                        $totalAmount += $cart['price'] * $cart['quantity'] ?? 0;
                                    @endphp
                                    <tr class="tf-cart-item file-delete">
                                        <td class="tf-cart-item_product">
                                            <a href="{{ route('shop.view', $cart['id']) }}" class="img-box">
                                                <img src="{{ Storage::url($cart['thumbnail']) }}" alt="img-product">
                                            </a>
                                            <div class="cart-info">
                                                <a href="{{ route('shop.view', $cart['id']) }}"
                                                    class="cart-title link">{{ $cart['name'] }}</a>
                                                <span data-product-id="{{ $cart['id'] }}"
                                                    class="remove-cart tf-mini-cart-remove link remove">Remove</span>
                                            </div>
                                        </td>
                                        <td class="tf-cart-item_price" cart-data-title="Price">
                                            <div class="cart-price">{{ $cart['price'] }}</div>
                                        </td>
                                        <td class="tf-cart-item_quantity" cart-data-title="Quantity">
                                            <div class="cart-quantity">
                                                <div class="wg-quantity">
                                                    <span data-product-id="{{ $cart['id'] }}"
                                                        class="btn-quantity minus-btn">
                                                        <svg class="d-inline-block" width="9" height="1"
                                                            viewBox="0 0 9 1" fill="currentColor">
                                                            <path
                                                                d="M9 1H5.14286H3.85714H0V1.50201e-05H3.85714L5.14286 0L9 1.50201e-05V1Z">
                                                            </path>
                                                        </svg>
                                                    </span>
                                                    <input type="text" name="number" name="quantity"
                                                        class="quantity-input" value="{{ $cart['quantity'] }}">
                                                    <span data-product-id="{{ $cart['id'] }}"
                                                        class="btn-quantity plus-btn">
                                                        <svg class="d-inline-block" width="9" height="9"
                                                            viewBox="0 0 9 9" fill="currentColor">
                                                            <path
                                                                d="M9 5.14286H5.14286V9H3.85714V5.14286H0V3.85714H3.85714V0H5.14286V3.85714H9V5.14286Z">
                                                            </path>
                                                        </svg>
                                                    </span>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="tf-cart-item_total" cart-data-title="Total">
                                            <div class="cart-total">{{ $cart['price'] * $cart['quantity'] }}</div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="text-center text-danger">No Product Found!</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </form>
                </div>
                <div class="tf-page-cart-footer">
                    <div class="tf-cart-footer-inner">
                        <div class="tf-free-shipping-bar">
                            <div class="tf-progress-bar">
                                <span style="width: 50%;">
                                    <div class="progress-car">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="21" height="14"
                                            viewBox="0 0 21 14" fill="currentColor">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M0 0.875C0 0.391751 0.391751 0 0.875 0H13.5625C14.0457 0 14.4375 0.391751 14.4375 0.875V3.0625H17.3125C17.5867 3.0625 17.845 3.19101 18.0104 3.40969L20.8229 7.12844C20.9378 7.2804 21 7.46572 21 7.65625V11.375C21 11.8582 20.6082 12.25 20.125 12.25H17.7881C17.4278 13.2695 16.4554 14 15.3125 14C14.1696 14 13.1972 13.2695 12.8369 12.25H7.72563C7.36527 13.2695 6.39293 14 5.25 14C4.10706 14 3.13473 13.2695 2.77437 12.25H0.875C0.391751 12.25 0 11.8582 0 11.375V0.875ZM2.77437 10.5C3.13473 9.48047 4.10706 8.75 5.25 8.75C6.39293 8.75 7.36527 9.48046 7.72563 10.5H12.6875V1.75H1.75V10.5H2.77437ZM14.4375 8.89937V4.8125H16.8772L19.25 7.94987V10.5H17.7881C17.4278 9.48046 16.4554 8.75 15.3125 8.75C15.0057 8.75 14.7112 8.80264 14.4375 8.89937ZM5.25 10.5C4.76676 10.5 4.375 10.8918 4.375 11.375C4.375 11.8582 4.76676 12.25 5.25 12.25C5.73323 12.25 6.125 11.8582 6.125 11.375C6.125 10.8918 5.73323 10.5 5.25 10.5ZM15.3125 10.5C14.8293 10.5 14.4375 10.8918 14.4375 11.375C14.4375 11.8582 14.8293 12.25 15.3125 12.25C15.7957 12.25 16.1875 11.8582 16.1875 11.375C16.1875 10.8918 15.7957 10.5 15.3125 10.5Z">
                                            </path>
                                        </svg>
                                    </div>
                                </span>
                            </div>
                        </div>
                        <div class="tf-page-cart-checkout">
                            <div class="tf-cart-totals-discounts">
                                <h3>Subtotal</h3>
                                <span class="total-value">{{ number_format($totalAmount, 2) }} TK</span>
                            </div>
                            <div class="cart-checkbox">
                                <input type="checkbox" class="tf-check" id="check-agree">
                                <label for="check-agree" class="fw-4">
                                    I agree with the <a href="/terms-conditions">terms and conditions</a>
                                </label>
                            </div>
                            <div class="cart-checkout-btn">
                                <a href="{{ route('checkout') }}"
                                    class="tf-btn w-100 btn-fill animate-hover-btn radius-3 justify-content-center">
                                    <span>Check out</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- page-cart -->
@endsection
