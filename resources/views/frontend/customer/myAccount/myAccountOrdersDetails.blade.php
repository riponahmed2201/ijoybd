@extends('frontend.master')

@section('home_title', 'My Orders Details')

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
                    <div class="wd-form-order">
                        <div class="order-head">
                            <div class="content">
                                <div class="badge">In Progress</div>
                                <h6 class="mt-8 fw-5">Order Number: {{ $order->order_number }}</h6>
                            </div>
                        </div>
                        <div class="tf-grid-layout md-col-2 gap-15">
                            <div class="item">
                                <div class="text-2 text_black-2">Order placed At</div>
                                <div class="text-2 mt_4 fw-6">
                                    {{ \Carbon\Carbon::parse($order->created_at)->diffForHumans() }}</div>
                            </div>
                            <div class="item">
                                <div class="text-2 text_black-2">Address</div>
                                <div class="text-2 mt_4 fw-6">{{ $order->billing_address }}</div>
                            </div>
                        </div>
                        <div class="widget-tabs style-has-border widget-order-tab">
                            <ul class="widget-menu-tab">
                                <li class="item-title active">
                                    <span class="inner">Order History</span>
                                </li>
                                <li class="item-title">
                                    <span class="inner">Item Details</span>
                                </li>
                            </ul>
                            <div class="widget-content-tab">
                                <div class="widget-content-inner active">
                                    <div class="widget-timeline">
                                        <ul class="timeline">
                                            <li>
                                                <div class="timeline-badge success"></div>
                                                <div class="timeline-box">
                                                    <a class="timeline-panel" href="javascript:void(0);">
                                                        <div class="text-2 fw-6">Product Shipped</div>
                                                        <span>10/07/2024 4:30pm</span>
                                                    </a>
                                                    <p><strong>Estimated Delivery Date : </strong>12/07/2024</p>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="timeline-badge"></div>
                                                <div class="timeline-box">
                                                    <a class="timeline-panel" href="javascript:void(0);">
                                                        <div class="text-2 fw-6">Product Packaging</div>
                                                        <span>12/07/2024 4:34pm</span>
                                                    </a>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="timeline-badge"></div>
                                                <div class="timeline-box">
                                                    <a class="timeline-panel" href="javascript:void(0);">
                                                        <div class="text-2 fw-6">Order Placed</div>
                                                        <span>{{ date('F j, Y \a\t g:i A', strtotime($order->created_at)) }}</span>
                                                    </a>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="widget-content-inner">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Product</th>
                                                <th>Price</th>
                                                <th>Quantity</th>
                                                <th>Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            @forelse ($order->orderItems as $item)
                                                <tr class="tf-cart-item file-delete">
                                                    <td class="tf-cart-item_product">
                                                        <a href="javascript:void(0)" class="img-box">
                                                            <img src="{{ Storage::url($item?->product?->thumbnail) }}"
                                                                alt="img-product">
                                                        </a>
                                                        {{ $item?->product?->name }}
                                                    </td>
                                                    <td>
                                                        {{ $item->price }}
                                                    </td>
                                                    <td>
                                                        {{ $item->quantity }}
                                                    </td>
                                                    <td>
                                                        {{ $item->price * $item->quantity }}
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="4" class="text-center text-danger">No Product Found!
                                                    </td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- page-cart -->
@endsection
