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
                            <figure class="img-product">
                                <img src="images/products/brown.jpg" alt="product">
                            </figure>
                            <div class="content">
                                <div class="badge">In Progress</div>
                                <h6 class="mt-8 fw-5">Order #17493</h6>
                            </div>
                        </div>
                        <div class="tf-grid-layout md-col-2 gap-15">
                            <div class="item">
                                <div class="text-2 text_black-2">Item</div>
                                <div class="text-2 mt_4 fw-6">Fashion</div>
                            </div>
                            <div class="item">
                                <div class="text-2 text_black-2">Courier</div>
                                <div class="text-2 mt_4 fw-6">Ribbed modal T-shirt</div>
                            </div>
                            <div class="item">
                                <div class="text-2 text_black-2">Start Time</div>
                                <div class="text-2 mt_4 fw-6">04 September 2024, 13:30:23</div>
                            </div>
                            <div class="item">
                                <div class="text-2 text_black-2">Address</div>
                                <div class="text-2 mt_4 fw-6">1234 Fashion Street, Suite 567, New York</div>
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
                                <li class="item-title">
                                    <span class="inner">Courier</span>
                                </li>
                                <li class="item-title">
                                    <span class="inner">Receiver</span>
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
                                                    <p><strong>Courier Service : </strong>FedEx World Service Center</p>
                                                    <p><strong>Estimated Delivery Date : </strong>12/07/2024</p>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="timeline-badge success"></div>
                                                <div class="timeline-box">
                                                    <a class="timeline-panel" href="javascript:void(0);">
                                                        <div class="text-2 fw-6">Product Shipped</div>
                                                        <span>10/07/2024 4:30pm</span>
                                                    </a>
                                                    <p><strong>Tracking Number : </strong>2307-3215-6759</p>
                                                    <p><strong>Warehouse : </strong>T-Shirt 10b</p>
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
                                                        <span>11/07/2024 2:36pm</span>
                                                    </a>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="widget-content-inner">
                                    <div class="order-head">
                                        <figure class="img-product">
                                            <img src="images/products/brown.jpg" alt="product">
                                        </figure>
                                        <div class="content">
                                            <div class="text-2 fw-6">Ribbed modal T-shirt</div>
                                            <div class="mt_4"><span class="fw-6">Price :</span> $28.95</div>
                                            <div class="mt_4"><span class="fw-6">Size :</span> XL</div>
                                        </div>
                                    </div>
                                    <ul>
                                        <li class="d-flex justify-content-between text-2">
                                            <span>Total Price</span>
                                            <span class="fw-6">$28.95</span>
                                        </li>
                                        <li class="d-flex justify-content-between text-2 mt_4 pb_8 line">
                                            <span>Total Discounts</span>
                                            <span class="fw-6">$10</span>

                                        </li>
                                        <li class="d-flex justify-content-between text-2 mt_8">
                                            <span>Order Total</span>
                                            <span class="fw-6">$18.95</span>
                                        </li>
                                    </ul>
                                </div>
                                <div class="widget-content-inner">
                                    <p>Our courier service is dedicated to providing fast, reliable, and secure delivery
                                        solutions tailored to meet your needs. Whether you're sending documents, parcels, or
                                        larger shipments, our team ensures that your items are handled with the utmost care
                                        and delivered on time. With a commitment to customer satisfaction, real-time
                                        tracking, and a wide network of routes, we make it easy for you to send and receive
                                        packages both locally and internationally. Choose our service for a seamless and
                                        efficient delivery experience.</p>
                                </div>
                                <div class="widget-content-inner">
                                    <p class="text-2 text_success">Thank you Your order has been received</p>
                                    <ul class="mt_20">
                                        <li>Order Number : <span class="fw-7">#17493</span></li>
                                        <li>Date : <span class="fw-7"> 17/07/2024, 02:34pm</span></li>
                                        <li>Total : <span class="fw-7">$18.95</span></li>
                                        <li>Payment Methods : <span class="fw-7">Cash on Delivery</span></li>

                                    </ul>
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
