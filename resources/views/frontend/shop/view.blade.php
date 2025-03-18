@extends('frontend.master')

@section('home_title', 'Shop Details')

@section('home-content')
    <!-- breadcrumb -->
    <div class="tf-breadcrumb">
        <div class="container">
            <div class="tf-breadcrumb-wrap d-flex justify-content-between flex-wrap align-items-center">
                <div class="tf-breadcrumb-list">
                    <a href="/" class="text">Home</a>
                    <i class="icon icon-arrow-right"></i>
                    <a href="#" class="text">{{ $product?->category?->name }}</a>
                    <i class="icon icon-arrow-right"></i>
                    <span class="text">{{ $product?->name }}</span>
                </div>
            </div>
        </div>
    </div>
    <!-- /breadcrumb -->
    <!-- default -->
    <section class="flat-spacing-4 pt_0">
        <div class="tf-main-product section-image-zoom">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="tf-product-media-wrap sticky-top">
                            <div class="thumbs-slider">
                                <div dir="ltr" class="swiper tf-product-media-thumbs other-image-zoom"
                                    data-direction="vertical">
                                    <div class="swiper-wrapper stagger-wrap">
                                        <!-- beige -->

                                        <div class="swiper-slide stagger-item" data-color="beige">
                                            <div class="item">
                                                <img class="lazyload" data-src="{{ Storage::url($product->thumbnail) }}"
                                                    src="{{ Storage::url($product->thumbnail) }}" alt="{{ $product->name }}">
                                            </div>
                                        </div>

                                        @php
                                            $images = json_decode($product->images);
                                        @endphp

                                        @forelse ($images as $image)
                                            <div class="swiper-slide stagger-item" data-color="beige">
                                                <div class="item">
                                                    <img class="lazyload" data-src="{{ Storage::url($image) }}"
                                                        src="{{ Storage::url($image) }}" alt="{{ $product->name }}">
                                                </div>
                                            </div>
                                        @empty
                                            <span></span>
                                        @endforelse
                                    </div>
                                </div>
                                <div dir="ltr" class="swiper tf-product-media-main" id="gallery-swiper-started">
                                    <div class="swiper-wrapper">
                                        <div class="swiper-slide" data-color="beige">
                                            <a href="{{ Storage::url($product->thumbnail) }}" target="_blank" class="item"
                                                data-pswp-width="770px" data-pswp-height="1075px">
                                                <img class="tf-image-zoom lazyload"
                                                    data-zoom="{{ Storage::url($product->thumbnail) }}"
                                                    data-src="{{ Storage::url($product->thumbnail) }}"
                                                    src="{{ Storage::url($product->thumbnail) }}" alt="{{ $product->name }}">
                                            </a>
                                        </div>

                                        @forelse ($images as $image)
                                            <div class="swiper-slide" data-color="beige">
                                                <a href="{{ Storage::url($image) }}" target="_blank" class="item"
                                                    data-pswp-width="770px" data-pswp-height="1075px">
                                                    <img class="tf-image-zoom lazyload"
                                                        data-zoom="{{ Storage::url($image) }}"
                                                        data-src="{{ Storage::url($image) }}"
                                                        src="{{ Storage::url($image) }}" alt="{{ $product->name }}">
                                                </a>
                                            </div>
                                        @empty
                                            <span></span>
                                        @endforelse
                                    </div>
                                    <div class="swiper-button-next button-style-arrow thumbs-next"></div>
                                    <div class="swiper-button-prev button-style-arrow thumbs-prev"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="tf-product-info-wrap position-relative">
                            <div class="tf-zoom-main"></div>
                            <div class="tf-product-info-list other-image-zoom">
                                <div class="tf-product-info-title">
                                    <h5>{{ $product->name }}</h5>
                                </div>
                                <div class="tf-product-info-price">
                                    <div class="price-on-sale">
                                        {{ $product->price - ($product->discount * $product->price) / 100 }} TK</div>
                                    <div class="compare-at-price">{{ $product->price }} TK</div>
                                    <div class="badges-on-sale"><span>{{ $product->discount }}</span>% OFF</div>
                                </div>
                                <div class="tf-product-info-variant-picker">
                                    <div class="variant-picker-item">
                                        <div class="variant-picker-label">
                                            Color:
                                            @forelse ($product?->color_details as $color)
                                                <span
                                                    class="fw-6 variant-picker-label-value value-currentColor">{{ $color->name }},
                                                </span>
                                            @empty
                                                <strong class="text-danger">No colors available</strong>
                                            @endforelse
                                        </div>
                                        @forelse ($product?->color_details as $color)
                                            <p title="{{ $color->name }}"
                                                style="display: inline-block; width: 18px; height: 18px; background-color: {{ $color->code }}; margin-right: 5px; border-radius: 50%; border: 3px solid transparent;">
                                            </p>
                                        @empty
                                            <strong class="text-danger">No colors available</strong>
                                        @endforelse
                                    </div>
                                </div>
                                <div class="tf-product-info-quantity">
                                    <div class="quantity-title fw-6">Quantity</div>
                                    <div class="wg-quantity">
                                        <span class="btn-quantity btn-decrease">-</span>
                                        <input type="text" class="quantity-product" name="number" value="1">
                                        <span class="btn-quantity btn-increase">+</span>
                                    </div>
                                </div>
                                <div class="tf-product-info-buy-button">
                                    <form class="">
                                        <a href="javascript:void(0);"
                                            class="tf-btn btn-fill justify-content-center fw-6 fs-16 flex-grow-1 animate-hover-btn btn-add-to-cart">
                                            <span>Add to cart</span>
                                        </a>
                                    </form>
                                </div>
                                <div class="tf-product-info-delivery-return">
                                    <div class="row">
                                        <div class="col-xl-6 col-12">
                                            <div class="tf-product-delivery">
                                                <div class="icon">
                                                    <i class="icon-delivery-time"></i>
                                                </div>
                                                <p>Estimate delivery times: <span class="fw-7">12-26 days</span>
                                                    (International), <span class="fw-7">3-6 days</span> (United States).
                                                </p>
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-12">
                                            <div class="tf-product-delivery mb-0">
                                                <div class="icon">
                                                    <i class="icon-return-order"></i>
                                                </div>
                                                <p>Return within <span class="fw-7">30 days</span> of purchase. Duties &
                                                    taxes are non-refundable.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="tf-sticky-btn-atc">
            <div class="container">
                <div class="tf-height-observer w-100 d-flex align-items-center">
                    <div class="tf-sticky-atc-product d-flex align-items-center">
                        <div class="tf-sticky-atc-img">
                            <img class="lazyloaded" data-src="{{ Storage::url($product->thumbnail) }}"
                                alt="{{ $product->name }}" src="{{ Storage::url($product->thumbnail) }}">
                        </div>
                        <div class="tf-sticky-atc-title fw-5 d-xl-block d-none">{{ $product->name }}</div>
                    </div>
                    <div class="tf-sticky-atc-infos">
                        <form class="">
                            <div class="tf-sticky-atc-btns">
                                <div class="tf-product-info-quantity">
                                    <div class="wg-quantity">
                                        <span class="btn-quantity minus-btn">-</span>
                                        <input type="text" name="number" value="1">
                                        <span class="btn-quantity plus-btn">+</span>
                                    </div>
                                </div>
                                <a href="javascript:void(0);"
                                    class="tf-btn btn-fill radius-3 justify-content-center fw-6 fs-14 flex-grow-1 animate-hover-btn btn-add-to-cart"><span>Add
                                        to cart</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /default -->
    <!-- tabs -->
    <section class="flat-spacing-17 pt_0">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="widget-tabs style-has-border">
                        <ul class="widget-menu-tab">
                            <li class="item-title active">
                                <span class="inner">Description</span>
                            </li>
                            <li class="item-title">
                                <span class="inner">Additional Information</span>
                            </li>
                            <li class="item-title">
                                <span class="inner">Shipping</span>
                            </li>
                            <li class="item-title">
                                <span class="inner">Return Policies</span>
                            </li>
                        </ul>
                        <div class="widget-content-tab">
                            <div class="widget-content-inner active">
                                <div class="">
                                    <p class="mb_30">
                                        {!! $product->description !!}
                                    </p>
                                </div>
                            </div>
                            <div class="widget-content-inner">
                                <table class="tf-pr-attrs">
                                    <tbody>
                                        <tr class="tf-attr-pa-color">
                                            <th class="tf-attr-label">Color</th>
                                            <td class="tf-attr-value">
                                                <p>
                                                    @forelse ($product?->color_details as $color)
                                                        {{ $color->name }},
                                                    @empty
                                                        <strong class="text-danger">No colors available</strong>
                                                    @endforelse
                                                </p>
                                            </td>
                                        </tr>
                                        <tr class="tf-attr-pa-size">
                                            <th class="tf-attr-label">Size</th>
                                            <td class="tf-attr-value">
                                                <p>
                                                    @forelse ($product?->size_details as $size)
                                                        {{ $size->name }},
                                                    @empty
                                                        <strong class="text-danger">No sizes available</strong>
                                                    @endforelse
                                                </p>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="widget-content-inner">
                                <div class="tf-page-privacy-policy">
                                    <div class="title">The Company Private Limited Policy</div>
                                    <p>The Company Private Limited and each of their respective subsidiary, parent and
                                        affiliated companies is deemed to operate this Website (“we” or “us”) recognizes
                                        that you care how information about you is used and shared. We have created this
                                        Privacy Policy to inform you what information we collect on the Website, how we use
                                        your information and the choices you have about the way your information is
                                        collected and used. Please read this Privacy Policy carefully. Your use of the
                                        Website indicates that you have read and accepted our privacy practices, as outlined
                                        in this Privacy Policy.</p>
                                    <p>Please be advised that the practices described in this Privacy Policy apply to
                                        information gathered by us or our subsidiaries, affiliates or agents: (i) through
                                        this Website, (ii) where applicable, through our Customer Service Department in
                                        connection with this Website, (iii) through information provided to us in our free
                                        standing retail stores, and (iv) through information provided to us in conjunction
                                        with marketing promotions and sweepstakes.</p>
                                    <p>We are not responsible for the content or privacy practices on any websites.</p>
                                    <p>We reserve the right, in our sole discretion, to modify, update, add to, discontinue,
                                        remove or otherwise change any portion of this Privacy Policy, in whole or in part,
                                        at any time. When we amend this Privacy Policy, we will revise the “last updated”
                                        date located at the top of this Privacy Policy.</p>
                                    <p>If you provide information to us or access or use the Website in any way after this
                                        Privacy Policy has been changed, you will be deemed to have unconditionally
                                        consented and agreed to such changes. The most current version of this Privacy
                                        Policy will be available on the Website and will supersede all previous versions of
                                        this Privacy Policy.</p>
                                    <p>If you have any questions regarding this Privacy Policy, you should contact our
                                        Customer Service Department by email at marketing@company.com</p>
                                </div>
                            </div>
                            <div class="widget-content-inner">
                                <ul class="d-flex justify-content-center mb_18">
                                    <li class="">
                                        <svg viewBox="0 0 40 40" width="35px" height="35px" color="#222"
                                            margin="5px">
                                            <path fill="currentColor"
                                                d="M8.7 30.7h22.7c.3 0 .6-.2.7-.6l4-25.3c-.1-.4-.3-.7-.7-.8s-.7.2-.8.6L34 8.9l-3-1.1c-2.4-.9-5.1-.5-7.2 1-2.3 1.6-5.3 1.6-7.6 0-2.1-1.5-4.8-1.9-7.2-1L6 8.9l-.7-4.3c0-.4-.4-.7-.7-.6-.4.1-.6.4-.6.8l4 25.3c.1.3.3.6.7.6zm.8-21.6c2-.7 4.2-.4 6 .8 1.4 1 3 1.5 4.6 1.5s3.2-.5 4.6-1.5c1.7-1.2 4-1.6 6-.8l3.3 1.2-3 19.1H9.2l-3-19.1 3.3-1.2zM32 32H8c-.4 0-.7.3-.7.7s.3.7.7.7h24c.4 0 .7-.3.7-.7s-.3-.7-.7-.7zm0 2.7H8c-.4 0-.7.3-.7.7s.3.6.7.6h24c.4 0 .7-.3.7-.7s-.3-.6-.7-.6zm-17.9-8.9c-1 0-1.8-.3-2.4-.6l.1-2.1c.6.4 1.4.6 2 .6.8 0 1.2-.4 1.2-1.3s-.4-1.3-1.3-1.3h-1.3l.2-1.9h1.1c.6 0 1-.3 1-1.3 0-.8-.4-1.2-1.1-1.2s-1.2.2-1.9.4l-.2-1.9c.7-.4 1.5-.6 2.3-.6 2 0 3 1.3 3 2.9 0 1.2-.4 1.9-1.1 2.3 1 .4 1.3 1.4 1.3 2.5.3 1.8-.6 3.5-2.9 3.5zm4-5.5c0-3.9 1.2-5.5 3.2-5.5s3.2 1.6 3.2 5.5-1.2 5.5-3.2 5.5-3.2-1.6-3.2-5.5zm4.1 0c0-2-.1-3.5-.9-3.5s-1 1.5-1 3.5.1 3.5 1 3.5c.8 0 .9-1.5.9-3.5zm4.5-1.4c-.9 0-1.5-.8-1.5-2.1s.6-2.1 1.5-2.1 1.5.8 1.5 2.1-.5 2.1-1.5 2.1zm0-.8c.4 0 .7-.5.7-1.2s-.2-1.2-.7-1.2-.7.5-.7 1.2.3 1.2.7 1.2z">
                                            </path>
                                        </svg>
                                    </li>
                                    <li class="">
                                        <svg viewBox="0 0 40 40" width="35px" height="35px" color="#222"
                                            margin="5px">
                                            <path fill="currentColor"
                                                d="M36.7 31.1l-2.8-1.3-4.7-9.1 7.5-3.5c.4-.2.6-.6.4-1s-.6-.5-1-.4l-7.5 3.5-7.8-15c-.3-.5-1.1-.5-1.4 0l-7.8 15L4 15.9c-.4-.2-.8 0-1 .4s0 .8.4 1l7.5 3.5-4.7 9.1-2.8 1.3c-.4.2-.6.6-.4 1 .1.3.4.4.7.4.1 0 .2 0 .3-.1l1-.4-1.5 2.8c-.1.2-.1.5 0 .8.1.2.4.3.7.3h31.7c.3 0 .5-.1.7-.4.1-.2.1-.5 0-.8L35.1 32l1 .4c.1 0 .2.1.3.1.3 0 .6-.2.7-.4.1-.3 0-.8-.4-1zm-5.1-2.3l-9.8-4.6 6-2.8 3.8 7.4zM20 6.4L27.1 20 20 23.3 12.9 20 20 6.4zm-7.8 15l6 2.8-9.8 4.6 3.8-7.4zm22.4 13.1H5.4L7.2 31 20 25l12.8 6 1.8 3.5z">
                                            </path>
                                        </svg>
                                    </li>
                                    <li class="">
                                        <svg viewBox="0 0 40 40" width="35px" height="35px" color="#222"
                                            margin="5px">
                                            <path fill="currentColor"
                                                d="M5.9 5.9v28.2h28.2V5.9H5.9zM19.1 20l-8.3 8.3c-2-2.2-3.2-5.1-3.2-8.3s1.2-6.1 3.2-8.3l8.3 8.3zm-7.4-9.3c2.2-2 5.1-3.2 8.3-3.2s6.1 1.2 8.3 3.2L20 19.1l-8.3-8.4zM20 20.9l8.3 8.3c-2.2 2-5.1 3.2-8.3 3.2s-6.1-1.2-8.3-3.2l8.3-8.3zm.9-.9l8.3-8.3c2 2.2 3.2 5.1 3.2 8.3s-1.2 6.1-3.2 8.3L20.9 20zm8.4-10.2c-1.2-1.1-2.6-2-4.1-2.6h6.6l-2.5 2.6zm-18.6 0L8.2 7.2h6.6c-1.5.6-2.9 1.5-4.1 2.6zm-.9.9c-1.1 1.2-2 2.6-2.6 4.1V8.2l2.6 2.5zM7.2 25.2c.6 1.5 1.5 2.9 2.6 4.1l-2.6 2.6v-6.7zm3.5 5c1.2 1.1 2.6 2 4.1 2.6H8.2l2.5-2.6zm18.6 0l2.6 2.6h-6.6c1.4-.6 2.8-1.5 4-2.6zm.9-.9c1.1-1.2 2-2.6 2.6-4.1v6.6l-2.6-2.5zm2.6-14.5c-.6-1.5-1.5-2.9-2.6-4.1l2.6-2.6v6.7z">
                                            </path>
                                        </svg>
                                    </li>
                                    <li class="">
                                        <svg viewBox="0 0 40 40" width="35px" height="35px" color="#222"
                                            margin="5px">
                                            <path fill="currentColor"
                                                d="M35.1 33.6L33.2 6.2c0-.4-.3-.7-.7-.7H13.9c-.4 0-.7.3-.7.7s.3.7.7.7h18l.7 10.5H20.8c-8.8.2-15.9 7.5-15.9 16.4 0 .4.3.7.7.7h28.9c.2 0 .4-.1.5-.2s.2-.3.2-.5v-.2h-.1zm-28.8-.5C6.7 25.3 13 19 20.8 18.9h11.9l1 14.2H6.3zm11.2-6.8c0 1.2-1 2.1-2.1 2.1s-2.1-1-2.1-2.1 1-2.1 2.1-2.1 2.1 1 2.1 2.1zm6.3 0c0 1.2-1 2.1-2.1 2.1-1.2 0-2.1-1-2.1-2.1s1-2.1 2.1-2.1 2.1 1 2.1 2.1z">
                                            </path>
                                        </svg>
                                    </li>
                                    <li class="">
                                        <svg viewBox="0 0 40 40" width="35px" height="35px" color="#222"
                                            margin="5px">
                                            <path fill="currentColor"
                                                d="M20 33.8c7.6 0 13.8-6.2 13.8-13.8S27.6 6.2 20 6.2 6.2 12.4 6.2 20 12.4 33.8 20 33.8zm0-26.3c6.9 0 12.5 5.6 12.5 12.5S26.9 32.5 20 32.5 7.5 26.9 7.5 20 13.1 7.5 20 7.5zm-.4 15h.5c1.8 0 3-1.1 3-3.7 0-2.2-1.1-3.6-3.1-3.6h-2.6v10.6h2.2v-3.3zm0-5.2h.4c.6 0 .9.5.9 1.7 0 1.1-.3 1.7-.9 1.7h-.4v-3.4z">
                                            </path>
                                        </svg>
                                    </li>
                                    <li class="">
                                        <svg viewBox="0 0 40 40" width="35px" height="35px" color="#222"
                                            margin="5px">
                                            <path fill="currentColor"
                                                d="M30.2 29.3c2.2-2.5 3.6-5.7 3.6-9.3s-1.4-6.8-3.6-9.3l3.6-3.6c.3-.3.3-.7 0-.9-.3-.3-.7-.3-.9 0l-3.6 3.6c-2.5-2.2-5.7-3.6-9.3-3.6s-6.8 1.4-9.3 3.6L7.1 6.2c-.3-.3-.7-.3-.9 0-.3.3-.3.7 0 .9l3.6 3.6c-2.2 2.5-3.6 5.7-3.6 9.3s1.4 6.8 3.6 9.3l-3.6 3.6c-.3.3-.3.7 0 .9.1.1.3.2.5.2s.3-.1.5-.2l3.6-3.6c2.5 2.2 5.7 3.6 9.3 3.6s6.8-1.4 9.3-3.6l3.6 3.6c.1.1.3.2.5.2s.3-.1.5-.2c.3-.3.3-.7 0-.9l-3.8-3.6z">
                                            </path>
                                        </svg>
                                    </li>
                                    <li class="">
                                        <svg viewBox="0 0 40 40" width="35px" height="35px" color="#222"
                                            margin="5px">
                                            <path fill="currentColor"
                                                d="M34.1 34.1H5.9V5.9h28.2v28.2zM7.2 32.8h25.6V7.2H7.2v25.6zm13.5-18.3a.68.68 0 0 0-.7-.7.68.68 0 0 0-.7.7v10.9a.68.68 0 0 0 .7.7.68.68 0 0 0 .7-.7V14.5z">
                                            </path>
                                        </svg>
                                    </li>
                                </ul>
                                <p class="text-center text-paragraph">LT01: 70% wool, 15% polyester, 10% polyamide, 5%
                                    acrylic 900 Grms/mt</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /tabs -->
    <!-- product -->
    <section class="flat-spacing-1 pt_0">
        <div class="container">
            <div class="flat-title">
                <span class="title">Related Products</span>
            </div>
            <div class="hover-sw-nav hover-sw-2">
                <div dir="ltr" class="swiper tf-sw-product-sell wrap-sw-over" data-preview="4" data-tablet="3"
                    data-mobile="2" data-space-lg="30" data-space-md="15" data-pagination="2" data-pagination-md="3"
                    data-pagination-lg="3">
                    <div class="swiper-wrapper">

                        @forelse ($latestProducts as $latestProduct)
                            <div class="swiper-slide" lazy="true">
                                <div class="card-product">
                                    <div class="card-product-wrapper">
                                        <a href="{{ route('shop.view', $latestProduct->id) }}" class="product-img">
                                            <img class="lazyload img-product"
                                                data-src="{{ Storage::url($latestProduct->thumbnail) }}"
                                                src="{{ Storage::url($latestProduct->thumbnail) }}" alt="image-product">
                                            <img class="lazyload img-hover"
                                                data-src="{{ Storage::url($latestProduct->thumbnail) }}"
                                                src="{{ Storage::url($latestProduct->thumbnail) }}" alt="image-product">
                                        </a>
                                        <div class="list-product-btn">
                                            <a href="#quick_add" data-bs-toggle="modal"
                                                class="box-icon bg_white quick-add tf-btn-loading">
                                                <span class="icon icon-bag"></span>
                                                <span class="tooltip">Quick Add</span>
                                            </a>
                                            <a href="javascript:void(0);"
                                                class="box-icon bg_white wishlist btn-icon-action">
                                                <span class="icon icon-heart"></span>
                                                <span class="tooltip">Add to Wishlist</span>
                                                <span class="icon icon-delete"></span>
                                            </a>
                                            <a href="#quick_view" data-bs-toggle="modal"
                                                class="box-icon bg_white quickview tf-btn-loading">
                                                <span class="icon icon-view"></span>
                                                <span class="tooltip">Quick View</span>
                                            </a>
                                        </div>
                                        <div class="size-list">
                                            @forelse ($product?->size_details as $size)
                                                <span>{{ $size->name }}</span>
                                            @empty
                                                <span class="text-danger">No sizes available</span>
                                            @endforelse
                                        </div>
                                    </div>
                                    <div class="card-product-info">
                                        <a href="{{ route('shop.view', $product->id) }}"
                                            class="title link">{{ $latestProduct->name }}</a>
                                        <span
                                            class="price">{{ $product->price - ($product->discount * $product->price) / 100 }}
                                            TK</span>

                                        <ul class="list-color-product">
                                            @forelse ($product?->color_details as $color)
                                                <p title="{{ $color->name }}"
                                                    style="display: inline-block; width: 18px; height: 18px; background-color: {{ $color->code }}; margin-right: 5px; border-radius: 50%; border: 3px solid transparent;">
                                                </p>
                                            @empty
                                                <strong class="text-danger">No colors available</strong>
                                            @endforelse
                                        </ul>

                                    </div>
                                </div>
                            </div>
                        @empty
                            <strong class="text-danger">No products available</strong>
                        @endforelse
                    </div>
                </div>
                <div class="nav-sw nav-next-slider nav-next-product box-icon w_46 round"><span
                        class="icon icon-arrow-left"></span></div>
                <div class="nav-sw nav-prev-slider nav-prev-product box-icon w_46 round"><span
                        class="icon icon-arrow-right"></span></div>
                <div class="sw-dots style-2 sw-pagination-product justify-content-center"></div>
            </div>
        </div>
    </section>
    <!-- /product -->
@endsection
