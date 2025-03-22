@extends('frontend.master')

@section('home_title', 'My Orders')

@section('home-content')
    <!-- page-title -->
    <div class="tf-page-title">
        <div class="container-full">
            <div class="heading text-center">My Orders</div>
        </div>
    </div>
    <!-- /page-title -->

    <!-- page-cart -->
    <section class="flat-spacing-11">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    @include('frontend.customer.myAccount.sideHeader')
                </div>
                <div class="col-lg-9">
                    <div class="my-account-content account-order">
                        <div class="wrap-account-order">
                            <table>
                                <thead>
                                    <tr>
                                        <th class="fw-6">Order</th>
                                        <th class="fw-6">Date</th>
                                        <th class="fw-6">Status</th>
                                        <th class="fw-6">Payment Status</th>
                                        <th class="fw-6">Total</th>
                                        <th class="fw-6">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @forelse ($orders as $order)
                                        <tr class="tf-order-item">
                                            <td>
                                                {{ $order->order_number }}
                                            </td>
                                            <td>
                                                {{ date('F j, Y, g:i A', strtotime($order->created_at)) }}
                                            </td>
                                            <td>
                                                {{ $order->status }}
                                            </td>
                                            <td>
                                                {{ $order->payment_status }}
                                            </td>
                                            <td>
                                                {{ number_format($order->total_amount, 2) }}
                                            </td>
                                            <td>
                                                <a href="{{ route('userOrderView', $order->id) }}"
                                                    class="tf-btn btn-fill animate-hover-btn rounded-0 justify-content-center">
                                                    <span>View</span>
                                                </a>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="5" class="text-center text-danger">No Order Found!</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- page-cart -->
@endsection
