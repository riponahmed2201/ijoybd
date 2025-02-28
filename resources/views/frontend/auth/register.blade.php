@extends('frontend.master')

@section('home_title', 'Register')

@section('home-content')
    <!-- page-title -->
    <div class="tf-page-title style-2">
        <div class="container-full">
            <div class="heading text-center">Register</div>
        </div>
    </div>
    <!-- /page-title -->

    <section class="flat-spacing-10">
        <div class="container">
            <div class="form-register-wrap">
                <div class="flat-title align-items-start gap-0 mb_30 px-0">
                    <h5 class="mb_18">Register</h5>
                    <p class="text_black-2">Sign up for early Sale access plus tailored new arrivals, trends and promotions.
                        To opt out, click unsubscribe in our emails</p>
                </div>

                {{-- @include('multiple_message') --}}

                <div>
                    <form action="{{ route('customer.register') }}" method="POST">

                        @csrf

                        <div class="tf-field style-1 mb_15">
                            <input class="tf-field-input tf-input" placeholder="" type="text" id="property1" required
                                name="name">
                            @error('name')
                                <span class="text-danger mt-2">{{ $message }}</span>
                            @enderror
                            <label class="tf-field-label fw-4 text_black-2" for="property1">Name *</label>
                        </div>

                        <div class="tf-field style-1 mb_15">
                            <input class="tf-field-input tf-input" placeholder=" " type="text" id="property2" required
                                name="phone">
                            @error('phone')
                                <span class="text-danger mt-2">{{ $message }}</span>
                            @enderror
                            <label class="tf-field-label fw-4 text_black-2" for="property2">Phone Number *</label>
                        </div>

                        <div class="tf-field style-1 mb_15">
                            <input class="tf-field-input tf-input" placeholder=" " type="email" id="property3"
                                name="email">
                            @error('email')
                                <span class="text-danger mt-2">{{ $message }}</span>
                            @enderror
                            <label class="tf-field-label fw-4 text_black-2" for="property3">Email</label>
                        </div>

                        <div class="tf-field style-1 mb_30">
                            <input class="tf-field-input tf-input" placeholder=" " type="password" id="property4" required
                                name="password">
                            @error('password')
                                <span class="text-danger mt-2">{{ $message }}</span>
                            @enderror
                            <label class="tf-field-label fw-4 text_black-2" for="property4">Password *</label>
                        </div>

                        <div class="tf-field style-1 mb_30">
                            <input class="tf-field-input tf-input" placeholder=" " type="password" id="property4" required
                                name="password_confirmation">
                            @error('password')
                                <span class="text-danger mt-2">{{ $message }}</span>
                            @enderror
                            <label class="tf-field-label fw-4 text_black-2" for="property4">Confirm Password *</label>
                        </div>

                        <div class="mb_20">
                            <button type="submit"
                                class="tf-btn w-100 radius-3 btn-fill animate-hover-btn justify-content-center">Register</button>
                        </div>

                        <div class="text-center">
                            <a href="/login" class="tf-btn btn-line">Already have an account? Log in here<i
                                    class="icon icon-arrow1-top-left"></i></a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
