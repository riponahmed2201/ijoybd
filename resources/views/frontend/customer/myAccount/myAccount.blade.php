@extends('frontend.master')

@section('home_title', 'My Dashboard')

@section('home-content')
    <!-- page-title -->
    <div class="tf-page-title">
        <div class="container-full">
            <div class="heading text-center">My Account</div>
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
                    <div class="my-account-content account-dashboard">
                        <div class="mb_60">

                            @include('message')

                            <h5 class="fw-5 mb_20">Hello {{ Auth::user()->name }}</h5>
                            <p>
                                From your account dashboard you can view your <a class="text_primary"
                                    href="/my-account-orders">recent orders</a>, manage your <a class="text_primary"
                                    href="/my-account-address">shipping and billing address</a>, and <a class="text_primary"
                                    href="/my-account-edit">edit your password and account
                                    details</a>.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- page-cart -->
@endsection
