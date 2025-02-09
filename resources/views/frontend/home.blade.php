@extends('frontend.master')

@section('home-content')

    <!-- Slider -->
    @include('frontend.includes.slider')
    <!-- /Slider -->

    <!-- Category -->
    <section class="flat-spacing-3 pb_0">
        <div class="container">
            {{-- <div class="flat-title wow fadeInUp" data-wow-delay="0s"
                style="visibility: visible; animation-delay: 0s; animation-name: fadeInUp;">
                <span class="title">Shop by categories</span>
            </div> --}}
            <div class="tf-shop-control grid-3 align-items-center">
                <div class="tf-control-filter">
                    <a href="#filterShop" data-bs-toggle="offcanvas" aria-controls="offcanvasLeft" class="tf-btn-filter"><span
                            class="icon icon-filter"></span><span class="text">Categories</span></a>
                </div>
            </div>

            <div class="hover-sw-nav">
                <div dir="ltr" class="swiper tf-sw-collection" data-preview="5" data-tablet="3" data-mobile="2"
                    data-space-lg="30" data-space-md="30" data-space="15" data-loop="false" data-auto-play="false">
                    <div class="swiper-wrapper">

                        @foreach ($categories as $category)
                            <div class="swiper-slide" lazy="true">
                                <div class="collection-item style-2 hover-img">
                                    <div class="collection-inner">
                                        <a href="#" class="collection-image img-style">
                                            @if (!empty($category->avatar))
                                                <img style="width:260px; height:317px" class="lazyload"
                                                    data-src="{{ Storage::url($category->avatar) }}"
                                                    src="{{ Storage::url($category->avatar) }}" alt="{{ $category->slug }}">
                                            @else
                                                <img style="width:260px; height:317px" class="lazyload"
                                                    data-src="{{ asset('assets/frontend/images/default.jpeg') }}"
                                                    src="{{ asset('assets/frontend/images/default.jpeg') }}"
                                                    alt="{{ $category->slug }}">
                                            @endif
                                        </a>
                                        <div class="collection-content">
                                            <a href="#"
                                                class="tf-btn collection-title hover-icon fs-15"><span>{{ $category->name }}</span><i
                                                    class="icon icon-arrow1-top-left"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
                <div class="nav-sw nav-next-slider nav-next-collection box-icon w_46 round"><span
                        class="icon icon-arrow-left"></span></div>
                <div class="nav-sw nav-prev-slider nav-prev-collection box-icon w_46 round"><span
                        class="icon icon-arrow-right"></span></div>
                <div class="sw-dots style-2 sw-pagination-collection justify-content-center"></div>
            </div>
        </div>
    </section>
    <!-- /Category -->

    <!-- Latest Product -->
    <section class="flat-spacing-1 pb_0">
        <div class="container">
            <div class="tf-shop-control grid-3 align-items-center">
                <div class="tf-control-filter">
                    <a href="#filterShop" data-bs-toggle="offcanvas" aria-controls="offcanvasLeft"
                        class="tf-btn-filter"><span class="icon icon-filter"></span><span class="text">Latest
                            Product</span></a>
                </div>
            </div>
            <div class="wrapper-control-shop">
                <div class="meta-filter-shop"></div>
                <div class="grid-layout wrapper-shop loadmore-item scroll-loadmore" data-grid="grid-4">
                    <!-- card product 1 -->
                    <div class="card-product fl-item" data-price="16.95" data-color="orange black white">
                        <div class="card-product-wrapper">
                            <a href="product-detail.html" class="product-img">
                                <img class="lazyload img-product" data-src="assets/frontend/images/products/orange-1.jpg"
                                    src="assets/frontend/images/products/orange-1.jpg" alt="image-product">
                                <img class="lazyload img-hover" data-src="assets/frontend/images/products/white-1.jpg"
                                    src="assets/frontend/images/products/white-1.jpg" alt="image-product">
                            </a>
                            <div class="list-product-btn absolute-2">
                                <a href="#quick_add" data-bs-toggle="modal"
                                    class="box-icon bg_white quick-add tf-btn-loading">
                                    <span class="icon icon-bag"></span>
                                    <span class="tooltip">Quick Add</span>
                                </a>
                                <a href="javascript:void(0);" class="box-icon bg_white wishlist btn-icon-action">
                                    <span class="icon icon-heart"></span>
                                    <span class="tooltip">Add to Wishlist</span>
                                    <span class="icon icon-delete"></span>
                                </a>
                                <a href="#compare" data-bs-toggle="offcanvas" aria-controls="offcanvasLeft"
                                    class="box-icon bg_white compare btn-icon-action">
                                    <span class="icon icon-compare"></span>
                                    <span class="tooltip">Add to Compare</span>
                                    <span class="icon icon-check"></span>
                                </a>
                                <a href="#quick_view" data-bs-toggle="modal"
                                    class="box-icon bg_white quickview tf-btn-loading">
                                    <span class="icon icon-view"></span>
                                    <span class="tooltip">Quick View</span>
                                </a>
                            </div>
                        </div>
                        <div class="card-product-info">
                            <a href="product-detail.html" class="title link">Ribbed Tank Top</a>
                            <span class="price">$16.95</span>
                            <ul class="list-color-product">
                                <li class="list-color-item color-swatch active">
                                    <span class="tooltip">Orange</span>
                                    <span class="swatch-value bg_orange-3"></span>
                                    <img class="lazyload" data-src="assets/frontend/images/products/orange-1.jpg"
                                        src="assets/frontend/images/products/orange-1.jpg" alt="image-product">
                                </li>
                                <li class="list-color-item color-swatch">
                                    <span class="tooltip">Black</span>
                                    <span class="swatch-value bg_dark"></span>
                                    <img class="lazyload" data-src="assets/frontend/images/products/black-1.jpg"
                                        src="assets/frontend/images/products/black-1.jpg" alt="image-product">
                                </li>
                                <li class="list-color-item color-swatch">
                                    <span class="tooltip">White</span>
                                    <span class="swatch-value bg_white"></span>
                                    <img class="lazyload" data-src="assets/frontend/images/products/white-1.jpg"
                                        src="assets/frontend/images/products/white-1.jpg" alt="image-product">
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- card product 2 -->
                    <div class="card-product fl-item" data-price="18.95" data-size="m l xl"
                        data-color="brown light-purple light-green">
                        <div class="card-product-wrapper">
                            <a href="product-detail.html" class="product-img">
                                <img class="lazyload img-product" data-src="assets/frontend/images/products/brown.jpg"
                                    src="assets/frontend/images/products/brown.jpg" alt="image-product">
                                <img class="lazyload img-hover" data-src="assets/frontend/images/products/purple.jpg"
                                    src="assets/frontend/images/products/purple.jpg" alt="image-product">
                            </a>
                            <div class="list-product-btn">
                                <a href="#quick_add" data-bs-toggle="modal"
                                    class="box-icon bg_white quick-add tf-btn-loading">
                                    <span class="icon icon-bag"></span>
                                    <span class="tooltip">Quick Add</span>
                                </a>
                                <a href="javascript:void(0);" class="box-icon bg_white wishlist btn-icon-action">
                                    <span class="icon icon-heart"></span>
                                    <span class="tooltip">Add to Wishlist</span>
                                    <span class="icon icon-delete"></span>
                                </a>
                                <a href="#compare" data-bs-toggle="offcanvas" aria-controls="offcanvasLeft"
                                    class="box-icon bg_white compare btn-icon-action">
                                    <span class="icon icon-compare"></span>
                                    <span class="tooltip">Add to Compare</span>
                                    <span class="icon icon-check"></span>
                                </a>
                                <a href="#quick_view" data-bs-toggle="modal"
                                    class="box-icon bg_white quickview tf-btn-loading">
                                    <span class="icon icon-view"></span>
                                    <span class="tooltip">Quick View</span>
                                </a>
                            </div>
                            <div class="size-list">
                                <span>M</span>
                                <span>L</span>
                                <span>XL</span>
                            </div>
                            <div class="countdown-box">
                                <div class="js-countdown" data-timer="1007500" data-labels="d :,h :,m :,s"></div>
                            </div>
                            <div class="on-sale-wrap text-end">
                                <div class="on-sale-item">-33%</div>
                            </div>
                        </div>
                        <div class="card-product-info">
                            <a href="product-detail.html" class="title link">Ribbed modal T-shirt</a>
                            <span class="price">From $18.95</span>
                            <ul class="list-color-product">
                                <li class="list-color-item color-swatch active">
                                    <span class="tooltip">Brown</span>
                                    <span class="swatch-value bg_brown"></span>
                                    <img class="lazyload" data-src="assets/frontend/images/products/brown.jpg"
                                        src="assets/frontend/images/products/brown.jpg" alt="image-product">
                                </li>
                                <li class="list-color-item color-swatch">
                                    <span class="tooltip">Light Purple</span>
                                    <span class="swatch-value bg_purple"></span>
                                    <img class="lazyload" data-src="assets/frontend/images/products/purple.jpg"
                                        src="assets/frontend/images/products/purple.jpg" alt="image-product">
                                </li>
                                <li class="list-color-item color-swatch">
                                    <span class="tooltip">Light Green</span>
                                    <span class="swatch-value bg_light-green"></span>
                                    <img class="lazyload" data-src="assets/frontend/images/products/green.jpg"
                                        src="assets/frontend/images/products/green.jpg" alt="image-product">
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- card product 3 -->
                    <div class="card-product fl-item" data-price="10">
                        <div class="card-product-wrapper">
                            <a href="product-detail.html" class="product-img">
                                <img class="lazyload img-product" data-src="assets/frontend/images/products/white-3.jpg"
                                    src="assets/frontend/images/products/white-3.jpg" alt="image-product">
                                <img class="lazyload img-hover" data-src="assets/frontend/images/products/white-4.jpg"
                                    src="assets/frontend/images/products/white-4.jpg" alt="image-product">
                            </a>
                            <div class="list-product-btn absolute-2">
                                <a href="#shoppingCart" data-bs-toggle="modal"
                                    class="box-icon bg_white quick-add tf-btn-loading">
                                    <span class="icon icon-bag"></span>
                                    <span class="tooltip">Add to cart</span>
                                </a>
                                <a href="javascript:void(0);" class="box-icon bg_white wishlist btn-icon-action">
                                    <span class="icon icon-heart"></span>
                                    <span class="tooltip">Add to Wishlist</span>
                                    <span class="icon icon-delete"></span>
                                </a>
                                <a href="#compare" data-bs-toggle="offcanvas" aria-controls="offcanvasLeft"
                                    class="box-icon bg_white compare btn-icon-action">
                                    <span class="icon icon-compare"></span>
                                    <span class="tooltip">Add to Compare</span>
                                    <span class="icon icon-check"></span>
                                </a>
                                <a href="#quick_view" data-bs-toggle="modal"
                                    class="box-icon bg_white quickview tf-btn-loading">
                                    <span class="icon icon-view"></span>
                                    <span class="tooltip">Quick View</span>
                                </a>
                            </div>
                        </div>
                        <div class="card-product-info">
                            <a href="product-detail.html" class="title link">Oversized Printed T-shirt</a>
                            <span class="price">$10.00</span>
                        </div>
                    </div>
                    <!-- card product 4 -->
                    <div class="card-product fl-item" data-price="16.95" data-size="s m l xl"
                        data-color="white purple black">
                        <div class="card-product-wrapper">
                            <a href="product-detail.html" class="product-img">
                                <img class="lazyload img-product" data-src="assets/frontend/images/products/white-2.jpg"
                                    src="assets/frontend/images/products/white-2.jpg" alt="image-product">
                                <img class="lazyload img-hover" data-src="assets/frontend/images/products/pink-1.jpg"
                                    src="assets/frontend/images/products/pink-1.jpg" alt="image-product">
                            </a>
                            <div class="list-product-btn">
                                <a href="#quick_add" data-bs-toggle="modal"
                                    class="box-icon bg_white quick-add tf-btn-loading">
                                    <span class="icon icon-bag"></span>
                                    <span class="tooltip">Quick Add</span>
                                </a>
                                <a href="javascript:void(0);" class="box-icon bg_white wishlist btn-icon-action">
                                    <span class="icon icon-heart"></span>
                                    <span class="tooltip">Add to Wishlist</span>
                                    <span class="icon icon-delete"></span>
                                </a>
                                <a href="#compare" data-bs-toggle="offcanvas" aria-controls="offcanvasLeft"
                                    class="box-icon bg_white compare btn-icon-action">
                                    <span class="icon icon-compare"></span>
                                    <span class="tooltip">Add to Compare</span>
                                    <span class="icon icon-check"></span>
                                </a>
                                <a href="#quick_view" data-bs-toggle="modal"
                                    class="box-icon bg_white quickview tf-btn-loading">
                                    <span class="icon icon-view"></span>
                                    <span class="tooltip">Quick View</span>
                                </a>
                            </div>
                            <div class="size-list">
                                <span>S</span>
                                <span>M</span>
                                <span>L</span>
                                <span>XL</span>
                            </div>
                        </div>
                        <div class="card-product-info">
                            <a href="product-detail.html" class="title">Oversized Printed T-shirt</a>
                            <span class="price">$16.95</span>
                            <ul class="list-color-product">
                                <li class="list-color-item color-swatch active">
                                    <span class="tooltip">White</span>
                                    <span class="swatch-value bg_white"></span>
                                    <img class="lazyload" data-src="assets/frontend/images/products/white-2.jpg"
                                        src="assets/frontend/images/products/white-2.jpg" alt="image-product">
                                </li>
                                <li class="list-color-item color-swatch">
                                    <span class="tooltip">Pink</span>
                                    <span class="swatch-value bg_purple"></span>
                                    <img class="lazyload" data-src="assets/frontend/images/products/pink-1.jpg"
                                        src="assets/frontend/images/products/pink-1.jpg" alt="image-product">
                                </li>
                                <li class="list-color-item color-swatch">
                                    <span class="tooltip">Black</span>
                                    <span class="swatch-value bg_dark"></span>
                                    <img class="lazyload" data-src="assets/frontend/images/products/black-2.jpg"
                                        src="assets/frontend/images/products/black-2.jpg" alt="image-product">
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- card product 5 -->
                    <div class="card-product fl-item" data-price="114.95" data-size="s m l xl" data-color="brown white">
                        <div class="card-product-wrapper">
                            <a href="product-detail.html" class="product-img">
                                <img class="lazyload img-product" data-src="assets/frontend/images/products/brown-2.jpg"
                                    src="assets/frontend/images/products/brown-2.jpg" alt="image-product">
                                <img class="lazyload img-hover" data-src="assets/frontend/images/products/brown-3.jpg"
                                    src="assets/frontend/images/products/brown-3.jpg" alt="image-product">
                            </a>
                            <div class="size-list">
                                <span>S</span>
                                <span>M</span>
                                <span>L</span>
                                <span>XL</span>
                            </div>
                            <div class="list-product-btn">
                                <a href="#quick_add" data-bs-toggle="modal"
                                    class="box-icon bg_white quick-add tf-btn-loading">
                                    <span class="icon icon-bag"></span>
                                    <span class="tooltip">Quick Add</span>
                                </a>
                                <a href="javascript:void(0);" class="box-icon bg_white wishlist btn-icon-action">
                                    <span class="icon icon-heart"></span>
                                    <span class="tooltip">Add to Wishlist</span>
                                    <span class="icon icon-delete"></span>
                                </a>
                                <a href="#compare" data-bs-toggle="offcanvas" aria-controls="offcanvasLeft"
                                    class="box-icon bg_white compare btn-icon-action">
                                    <span class="icon icon-compare"></span>
                                    <span class="tooltip">Add to Compare</span>
                                    <span class="icon icon-check"></span>
                                </a>
                                <a href="#quick_view" data-bs-toggle="modal"
                                    class="box-icon bg_white quickview tf-btn-loading">
                                    <span class="icon icon-view"></span>
                                    <span class="tooltip">Quick View</span>
                                </a>
                            </div>
                        </div>
                        <div class="card-product-info">
                            <a href="product-detail.html" class="title link">V-neck linen T-shirt</a>
                            <span class="price">$114.95</span>
                            <ul class="list-color-product">
                                <li class="list-color-item color-swatch active">
                                    <span class="tooltip">Brown</span>
                                    <span class="swatch-value bg_brown"></span>
                                    <img class="lazyload" data-src="assets/frontend/images/products/brown-2.jpg"
                                        src="assets/frontend/images/products/brown-2.jpg" alt="image-product">
                                </li>
                                <li class="list-color-item color-swatch">
                                    <span class="tooltip">White</span>
                                    <span class="swatch-value bg_white"></span>
                                    <img class="lazyload" data-src="assets/frontend/images/products/white-5.jpg"
                                        src="assets/frontend/images/products/white-5.jpg" alt="image-product">
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- card product 6 -->
                    <div class="card-product fl-item" data-price="10.00"
                        data-color="light-green black blue dark-blue white light-grey">
                        <div class="card-product-wrapper">
                            <a href="product-detail.html" class="product-img">
                                <img class="lazyload img-product"
                                    data-src="assets/frontend/images/products/light-green-1.jpg"
                                    src="assets/frontend/images/products/light-green-1.jpg" alt="image-product">
                                <img class="lazyload img-hover"
                                    data-src="assets/frontend/images/products/light-green-2.jpg"
                                    src="assets/frontend/images/products/light-green-2.jpg" alt="image-product">
                            </a>
                            <div class="list-product-btn absolute-2">
                                <a href="#quick_add" data-bs-toggle="modal"
                                    class="box-icon bg_white quick-add tf-btn-loading">
                                    <span class="icon icon-bag"></span>
                                    <span class="tooltip">Quick Add</span>
                                </a>
                                <a href="javascript:void(0);" class="box-icon bg_white wishlist btn-icon-action">
                                    <span class="icon icon-heart"></span>
                                    <span class="tooltip">Add to Wishlist</span>
                                    <span class="icon icon-delete"></span>
                                </a>
                                <a href="#compare" data-bs-toggle="offcanvas" aria-controls="offcanvasLeft"
                                    class="box-icon bg_white compare btn-icon-action">
                                    <span class="icon icon-compare"></span>
                                    <span class="tooltip">Add to Compare</span>
                                    <span class="icon icon-check"></span>
                                </a>
                                <a href="#quick_view" data-bs-toggle="modal"
                                    class="box-icon bg_white quickview tf-btn-loading">
                                    <span class="icon icon-view"></span>
                                    <span class="tooltip">Quick View</span>
                                </a>
                            </div>
                        </div>
                        <div class="card-product-info">
                            <a href="product-detail.html" class="title link">Loose Fit Sweatshirt</a>
                            <span class="price">$10.00</span>
                            <ul class="list-color-product">
                                <li class="list-color-item color-swatch active">
                                    <span class="tooltip">Light Green</span>
                                    <span class="swatch-value bg_light-green"></span>
                                    <img class="lazyload" data-src="assets/frontend/images/products/light-green-1.jpg"
                                        src="assets/frontend/images/products/light-green-1.jpg" alt="image-product">
                                </li>
                                <li class="list-color-item color-swatch">
                                    <span class="tooltip">Black</span>
                                    <span class="swatch-value bg_dark"></span>
                                    <img class="lazyload" data-src="assets/frontend/images/products/black-3.jpg"
                                        src="assets/frontend/images/products/black-3.jpg" alt="image-product">
                                </li>
                                <li class="list-color-item color-swatch">
                                    <span class="tooltip">Blue</span>
                                    <span class="swatch-value bg_blue-2"></span>
                                    <img class="lazyload" data-src="assets/frontend/images/products/blue.jpg"
                                        src="assets/frontend/images/products/blue.jpg" alt="image-product">
                                </li>
                                <li class="list-color-item color-swatch">
                                    <span class="tooltip">Dark Blue</span>
                                    <span class="swatch-value bg_dark-blue"></span>
                                    <img class="lazyload" data-src="assets/frontend/images/products/dark-blue.jpg"
                                        src="assets/frontend/images/products/dark-blue.jpg" alt="image-product">
                                </li>
                                <li class="list-color-item color-swatch">
                                    <span class="tooltip">White</span>
                                    <span class="swatch-value bg_white"></span>
                                    <img class="lazyload" data-src="assets/frontend/images/products/white-6.jpg"
                                        src="assets/frontend/images/products/white-6.jpg" alt="image-product">
                                </li>
                                <li class="list-color-item color-swatch">
                                    <span class="tooltip">Light Grey</span>
                                    <span class="swatch-value bg_light-grey"></span>
                                    <img class="lazyload" data-src="assets/frontend/images/products/light-grey.jpg"
                                        src="assets/frontend/images/products/light-grey.jpg" alt="image-product">
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- card product 7 -->
                    <div class="card-product fl-item" data-price="10.00" data-size="s m l"
                        data-color="black dark-blue beige light-blue white">
                        <div class="card-product-wrapper">
                            <a href="product-detail.html" class="product-img">
                                <img class="lazyload img-product" data-src="assets/frontend/images/products/black-4.jpg"
                                    src="assets/frontend/images/products/black-4.jpg" alt="image-product">
                                <img class="lazyload img-hover" data-src="assets/frontend/images/products/black-5.jpg"
                                    src="assets/frontend/images/products/black-5.jpg" alt="image-product">
                            </a>
                            <div class="size-list">
                                <span>S</span>
                                <span>M</span>
                                <span>L</span>
                            </div>
                            <div class="list-product-btn">
                                <a href="#quick_add" data-bs-toggle="modal"
                                    class="box-icon bg_white quick-add tf-btn-loading">
                                    <span class="icon icon-bag"></span>
                                    <span class="tooltip">Quick Add</span>
                                </a>
                                <a href="javascript:void(0);" class="box-icon bg_white wishlist btn-icon-action">
                                    <span class="icon icon-heart"></span>
                                    <span class="tooltip">Add to Wishlist</span>
                                    <span class="icon icon-delete"></span>
                                </a>
                                <a href="#compare" data-bs-toggle="offcanvas" aria-controls="offcanvasLeft"
                                    class="box-icon bg_white compare btn-icon-action">
                                    <span class="icon icon-compare"></span>
                                    <span class="tooltip">Add to Compare</span>
                                    <span class="icon icon-check"></span>
                                </a>
                                <a href="#quick_view" data-bs-toggle="modal"
                                    class="box-icon bg_white quickview tf-btn-loading">
                                    <span class="icon icon-view"></span>
                                    <span class="tooltip">Quick View</span>
                                </a>
                            </div>
                        </div>
                        <div class="card-product-info">
                            <a href="product-detail.html" class="title link">Regular Fit Oxford Shirt</a>
                            <span class="price">$10.00</span>
                            <ul class="list-color-product">
                                <li class="list-color-item color-swatch active">
                                    <span class="tooltip">Black</span>
                                    <span class="swatch-value bg_dark"></span>
                                    <img class="lazyload" data-src="assets/frontend/images/products/black-4.jpg"
                                        src="assets/frontend/images/products/black-4.jpg" alt="image-product">
                                </li>
                                <li class="list-color-item color-swatch">
                                    <span class="tooltip">Dark Blue</span>
                                    <span class="swatch-value bg_dark-blue"></span>
                                    <img class="lazyload" data-src="assets/frontend/images/products/dark-blue-2.jpg"
                                        src="assets/frontend/images/products/dark-blue-2.jpg" alt="image-product">
                                </li>
                                <li class="list-color-item color-swatch">
                                    <span class="tooltip">Beige</span>
                                    <span class="swatch-value bg_beige"></span>
                                    <img class="lazyload" data-src="assets/frontend/images/products/beige.jpg"
                                        src="assets/frontend/images/products/beige.jpg" alt="image-product">
                                </li>
                                <li class="list-color-item color-swatch">
                                    <span class="tooltip">Light Blue</span>
                                    <span class="swatch-value bg_light-blue"></span>
                                    <img class="lazyload" data-src="assets/frontend/images/products/light-blue.jpg"
                                        src="assets/frontend/images/products/light-blue.jpg" alt="image-product">
                                </li>
                                <li class="list-color-item color-swatch">
                                    <span class="tooltip">White</span>
                                    <span class="swatch-value bg_white"></span>
                                    <img class="lazyload" data-src="assets/frontend/images/products/white-7.jpg"
                                        src="assets/frontend/images/products/white-7.jpg" alt="image-product">
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- card product 8 -->
                    <div class="card-product fl-item" data-price="9.95" data-size="s m l xl"
                        data-color="white black blue">
                        <div class="card-product-wrapper">
                            <a href="product-detail.html" class="product-img">
                                <img class="lazyload img-product" data-src="assets/frontend/images/products/white-8.jpg"
                                    src="assets/frontend/images/products/white-8.jpg" alt="image-product">
                                <img class="lazyload img-hover" data-src="assets/frontend/images/products/black-6.jpg"
                                    src="assets/frontend/images/products/black-6.jpg" alt="image-product">
                            </a>
                            <div class="size-list">
                                <span>S</span>
                                <span>M</span>
                                <span>L</span>
                                <span>XL</span>
                            </div>
                            <div class="list-product-btn">
                                <a href="#quick_add" data-bs-toggle="modal"
                                    class="box-icon bg_white quick-add tf-btn-loading">
                                    <span class="icon icon-bag"></span>
                                    <span class="tooltip">Quick Add</span>
                                </a>
                                <a href="javascript:void(0);" class="box-icon bg_white wishlist btn-icon-action">
                                    <span class="icon icon-heart"></span>
                                    <span class="tooltip">Add to Wishlist</span>
                                    <span class="icon icon-delete"></span>
                                </a>
                                <a href="#compare" data-bs-toggle="offcanvas" aria-controls="offcanvasLeft"
                                    class="box-icon bg_white compare btn-icon-action">
                                    <span class="icon icon-compare"></span>
                                    <span class="tooltip">Add to Compare</span>
                                    <span class="icon icon-check"></span>
                                </a>
                                <a href="#quick_view" data-bs-toggle="modal"
                                    class="box-icon bg_white quickview tf-btn-loading">
                                    <span class="icon icon-view"></span>
                                    <span class="tooltip">Quick View</span>
                                </a>
                            </div>
                        </div>
                        <div class="card-product-info">
                            <a href="product-detail.html" class="title link">Loose Fit Hoodie</a>
                            <span class="price">$9.95</span>
                            <ul class="list-color-product">
                                <li class="list-color-item color-swatch active">
                                    <span class="tooltip">White</span>
                                    <span class="swatch-value bg_white"></span>
                                    <img class="lazyload" data-src="assets/frontend/images/products/white-8.jpg"
                                        src="assets/frontend/images/products/white-8.jpg" alt="image-product">
                                </li>
                                <li class="list-color-item color-swatch">
                                    <span class="tooltip">Black</span>
                                    <span class="swatch-value bg_dark"></span>
                                    <img class="lazyload" data-src="assets/frontend/images/products/black-7.jpg"
                                        src="assets/frontend/images/products/black-7.jpg" alt="image-product">
                                </li>
                                <li class="list-color-item color-swatch">
                                    <span class="tooltip">Blue</span>
                                    <span class="swatch-value bg_blue-2"></span>
                                    <img class="lazyload" data-src="assets/frontend/images/products/blue-2.jpg"
                                        src="assets/frontend/images/products/blue-2.jpg" alt="image-product">
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- card product 9 -->
                    <div class="card-product fl-item" data-price="14.95" data-size="m l xl" data-color="brown black">
                        <div class="card-product-wrapper">
                            <a href="product-detail.html" class="product-img">
                                <img class="lazyload img-product" data-src="assets/frontend/images/products/brown-4.jpg"
                                    src="assets/frontend/images/products/brown-4.jpg" alt="image-product">
                                <img class="lazyload img-hover" data-src="assets/frontend/images/products/black-8.jpg"
                                    src="assets/frontend/images/products/black-8.jpg" alt="image-product">
                            </a>
                            <div class="size-list">
                                <span>M</span>
                                <span>L</span>
                                <span>XL</span>
                            </div>
                            <div class="list-product-btn">
                                <a href="#quick_add" data-bs-toggle="modal"
                                    class="box-icon bg_white quick-add tf-btn-loading">
                                    <span class="icon icon-bag"></span>
                                    <span class="tooltip">Quick Add</span>
                                </a>
                                <a href="javascript:void(0);" class="box-icon bg_white wishlist btn-icon-action">
                                    <span class="icon icon-heart"></span>
                                    <span class="tooltip">Add to Wishlist</span>
                                    <span class="icon icon-delete"></span>
                                </a>
                                <a href="#compare" data-bs-toggle="offcanvas" aria-controls="offcanvasLeft"
                                    class="box-icon bg_white compare btn-icon-action">
                                    <span class="icon icon-compare"></span>
                                    <span class="tooltip">Add to Compare</span>
                                    <span class="icon icon-check"></span>
                                </a>
                                <a href="#quick_view" data-bs-toggle="modal"
                                    class="box-icon bg_white quickview tf-btn-loading">
                                    <span class="icon icon-view"></span>
                                    <span class="tooltip">Quick View</span>
                                </a>
                            </div>
                        </div>
                        <div class="card-product-info">
                            <a href="product-detail.html" class="title link">Patterned scarf</a>
                            <span class="price">$14.95</span>
                            <ul class="list-color-product">
                                <li class="list-color-item color-swatch active">
                                    <span class="tooltip">Brown</span>
                                    <span class="swatch-value bg_brown"></span>
                                    <img class="lazyload" data-src="assets/frontend/images/products/brown-4.jpg"
                                        src="assets/frontend/images/products/brown-4.jpg" alt="image-product">
                                </li>
                                <li class="list-color-item color-swatch">
                                    <span class="tooltip">Black</span>
                                    <span class="swatch-value bg_dark"></span>
                                    <img class="lazyload" data-src="assets/frontend/images/products/black-8.jpg"
                                        src="assets/frontend/images/products/black-8.jpg" alt="image-product">
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- card product 10 -->
                    <div class="card-product fl-item" data-price="18.95" data-size="s m l" data-color="black white">
                        <div class="card-product-wrapper">
                            <a href="product-detail.html" class="product-img">
                                <img class="lazyload img-product" data-src="assets/frontend/images/products/black-9.jpg"
                                    src="assets/frontend/images/products/black-9.jpg" alt="image-product">
                                <img class="lazyload img-hover" data-src="assets/frontend/images/products/black-10.jpg"
                                    src="assets/frontend/images/products/black-10.jpg" alt="image-product">
                            </a>
                            <div class="size-list">
                                <span>S</span>
                                <span>M</span>
                                <span>L</span>
                            </div>
                            <div class="list-product-btn">
                                <a href="#quick_add" data-bs-toggle="modal"
                                    class="box-icon bg_white quick-add tf-btn-loading">
                                    <span class="icon icon-bag"></span>
                                    <span class="tooltip">Quick Add</span>
                                </a>
                                <a href="javascript:void(0);" class="box-icon bg_white wishlist btn-icon-action">
                                    <span class="icon icon-heart"></span>
                                    <span class="tooltip">Add to Wishlist</span>
                                    <span class="icon icon-delete"></span>
                                </a>
                                <a href="#compare" data-bs-toggle="offcanvas" aria-controls="offcanvasLeft"
                                    class="box-icon bg_white compare btn-icon-action">
                                    <span class="icon icon-compare"></span>
                                    <span class="tooltip">Add to Compare</span>
                                    <span class="icon icon-check"></span>
                                </a>
                                <a href="#quick_view" data-bs-toggle="modal"
                                    class="box-icon bg_white quickview tf-btn-loading">
                                    <span class="icon icon-view"></span>
                                    <span class="tooltip">Quick View</span>
                                </a>
                            </div>
                        </div>
                        <div class="card-product-info">
                            <a href="product-detail.html" class="title link">Slim Fit Fine-knit Turtleneck Sweater</a>
                            <span class="price">$18.95</span>
                            <ul class="list-color-product">
                                <li class="list-color-item color-swatch active">
                                    <span class="tooltip">Black</span>
                                    <span class="swatch-value bg_dark"></span>
                                    <img class="lazyload" data-src="assets/frontend/images/products/black-9.jpg"
                                        src="assets/frontend/images/products/black-9.jpg" alt="image-product">
                                </li>
                                <li class="list-color-item color-swatch">
                                    <span class="tooltip">Black</span>
                                    <span class="swatch-value bg_white"></span>
                                    <img class="lazyload" data-src="assets/frontend/images/products/white-9.jpg"
                                        src="assets/frontend/images/products/white-9.jpg" alt="image-product">
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- card product 11 -->
                    <div class="card-product fl-item" data-price="18.95" data-size="s m l"
                        data-color="grey pink light-pink">
                        <div class="card-product-wrapper">
                            <a href="product-detail.html" class="product-img">
                                <img class="lazyload img-product" data-src="assets/frontend/images/products/grey-2.jpg"
                                    src="assets/frontend/images/products/grey-2.jpg" alt="image-product">
                                <img class="lazyload img-hover" data-src="assets/frontend/images/products/grey.jpg"
                                    src="assets/frontend/images/products/grey.jpg" alt="image-product">
                            </a>
                            <div class="size-list">
                                <span>S</span>
                                <span>M</span>
                                <span>L</span>
                            </div>
                            <div class="list-product-btn">
                                <a href="#quick_add" data-bs-toggle="modal"
                                    class="box-icon bg_white quick-add tf-btn-loading">
                                    <span class="icon icon-bag"></span>
                                    <span class="tooltip">Quick Add</span>
                                </a>
                                <a href="javascript:void(0);" class="box-icon bg_white wishlist btn-icon-action">
                                    <span class="icon icon-heart"></span>
                                    <span class="tooltip">Add to Wishlist</span>
                                    <span class="icon icon-delete"></span>
                                </a>
                                <a href="#compare" data-bs-toggle="offcanvas" aria-controls="offcanvasLeft"
                                    class="box-icon bg_white compare btn-icon-action">
                                    <span class="icon icon-compare"></span>
                                    <span class="tooltip">Add to Compare</span>
                                    <span class="icon icon-check"></span>
                                </a>
                                <a href="#quick_view" data-bs-toggle="modal"
                                    class="box-icon bg_white quickview tf-btn-loading">
                                    <span class="icon icon-view"></span>
                                    <span class="tooltip">Quick View</span>
                                </a>
                            </div>
                        </div>
                        <div class="card-product-info">
                            <a href="product-detail.html" class="title link">Slim Fit Fine-knit Turtleneck Sweater</a>
                            <span class="price">$18.95</span>
                            <ul class="list-color-product">
                                <li class="list-color-item color-swatch active">
                                    <span class="tooltip">Grey</span>
                                    <span class="swatch-value bg_grey"></span>
                                    <img class="lazyload" data-src="assets/frontend/images/products/grey-2.jpg"
                                        src="assets/frontend/images/products/grey-2.jpg" alt="image-product">
                                </li>
                                <li class="list-color-item color-swatch">
                                    <span class="tooltip">Pink</span>
                                    <span class="swatch-value bg_pink"></span>
                                    <img class="lazyload" data-src="assets/frontend/images/products/pink-2.jpg"
                                        src="assets/frontend/images/products/pink-2.jpg" alt="image-product">
                                </li>
                                <li class="list-color-item color-swatch">
                                    <span class="tooltip">Light Pink</span>
                                    <span class="swatch-value bg_light-pink"></span>
                                    <img class="lazyload" data-src="assets/frontend/images/products/light-pink.jpg"
                                        src="assets/frontend/images/products/light-pink.jpg" alt="image-product">
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- card product 12 -->
                    <div class="card-product fl-item" data-price="18.95" data-size="s m l">
                        <div class="card-product-wrapper">
                            <a href="product-detail.html" class="product-img">
                                <img class="lazyload img-product" data-src="assets/frontend/images/products/black-11.jpg"
                                    src="assets/frontend/images/products/black-11.jpg" alt="image-product">
                                <img class="lazyload img-hover" data-src="assets/frontend/images/products/black-12.jpg"
                                    src="assets/frontend/images/products/black-12.jpg" alt="image-product">
                            </a>
                            <div class="size-list">
                                <span>S</span>
                                <span>M</span>
                                <span>L</span>
                            </div>
                            <div class="list-product-btn">
                                <a href="#quick_add" data-bs-toggle="modal"
                                    class="box-icon bg_white quick-add tf-btn-loading">
                                    <span class="icon icon-bag"></span>
                                    <span class="tooltip">Quick Add</span>
                                </a>
                                <a href="javascript:void(0);" class="box-icon bg_white wishlist btn-icon-action">
                                    <span class="icon icon-heart"></span>
                                    <span class="tooltip">Add to Wishlist</span>
                                    <span class="icon icon-delete"></span>
                                </a>
                                <a href="#compare" data-bs-toggle="offcanvas" aria-controls="offcanvasLeft"
                                    class="box-icon bg_white compare btn-icon-action">
                                    <span class="icon icon-compare"></span>
                                    <span class="tooltip">Add to Compare</span>
                                    <span class="icon icon-check"></span>
                                </a>
                                <a href="#quick_view" data-bs-toggle="modal"
                                    class="box-icon bg_white quickview tf-btn-loading">
                                    <span class="icon icon-view"></span>
                                    <span class="tooltip">Quick View</span>
                                </a>
                            </div>
                        </div>
                        <div class="card-product-info">
                            <a href="product-detail.html" class="title link">Slim Fit Fine-knit Turtleneck Sweater</a>
                            <span class="price">$18.95</span>

                        </div>
                    </div>
                    <!-- card product 13 -->
                    <div class="card-product fl-item" data-price="114.95" data-size="s m l xl" data-color="brown white">
                        <div class="card-product-wrapper">
                            <a href="product-detail.html" class="product-img">
                                <img class="lazyload img-product" data-src="assets/frontend/images/products/brown-2.jpg"
                                    src="assets/frontend/images/products/brown-2.jpg" alt="image-product">
                                <img class="lazyload img-hover" data-src="assets/frontend/images/products/brown-3.jpg"
                                    src="assets/frontend/images/products/brown-3.jpg" alt="image-product">
                            </a>
                            <div class="size-list">
                                <span>S</span>
                                <span>M</span>
                                <span>L</span>
                                <span>XL</span>
                            </div>
                            <div class="list-product-btn">
                                <a href="#quick_add" data-bs-toggle="modal"
                                    class="box-icon bg_white quick-add tf-btn-loading">
                                    <span class="icon icon-bag"></span>
                                    <span class="tooltip">Quick Add</span>
                                </a>
                                <a href="javascript:void(0);" class="box-icon bg_white wishlist btn-icon-action">
                                    <span class="icon icon-heart"></span>
                                    <span class="tooltip">Add to Wishlist</span>
                                    <span class="icon icon-delete"></span>
                                </a>
                                <a href="#compare" data-bs-toggle="offcanvas" aria-controls="offcanvasLeft"
                                    class="box-icon bg_white compare btn-icon-action">
                                    <span class="icon icon-compare"></span>
                                    <span class="tooltip">Add to Compare</span>
                                    <span class="icon icon-check"></span>
                                </a>
                                <a href="#quick_view" data-bs-toggle="modal"
                                    class="box-icon bg_white quickview tf-btn-loading">
                                    <span class="icon icon-view"></span>
                                    <span class="tooltip">Quick View</span>
                                </a>
                            </div>
                        </div>
                        <div class="card-product-info">
                            <a href="product-detail.html" class="title link">V-neck linen T-shirt</a>
                            <span class="price">$114.95</span>
                            <ul class="list-color-product">
                                <li class="list-color-item color-swatch active">
                                    <span class="tooltip">Brown</span>
                                    <span class="swatch-value bg_brown"></span>
                                    <img class="lazyload" data-src="assets/frontend/images/products/brown-2.jpg"
                                        src="assets/frontend/images/products/brown-2.jpg" alt="image-product">
                                </li>
                                <li class="list-color-item color-swatch">
                                    <span class="tooltip">White</span>
                                    <span class="swatch-value bg_white"></span>
                                    <img class="lazyload" data-src="assets/frontend/images/products/white-5.jpg"
                                        src="assets/frontend/images/products/white-5.jpg" alt="image-product">
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- card product 14 -->
                    <div class="card-product fl-item" data-price="10.00"
                        data-color="light-green black blue dark-blue white light-grey">
                        <div class="card-product-wrapper">
                            <a href="product-detail.html" class="product-img">
                                <img class="lazyload img-product"
                                    data-src="assets/frontend/images/products/light-green-1.jpg"
                                    src="assets/frontend/images/products/light-green-1.jpg" alt="image-product">
                                <img class="lazyload img-hover"
                                    data-src="assets/frontend/images/products/light-green-2.jpg"
                                    src="assets/frontend/images/products/light-green-2.jpg" alt="image-product">
                            </a>
                            <div class="list-product-btn">
                                <a href="#quick_add" data-bs-toggle="modal"
                                    class="box-icon bg_white quick-add tf-btn-loading">
                                    <span class="icon icon-bag"></span>
                                    <span class="tooltip">Quick Add</span>
                                </a>
                                <a href="javascript:void(0);" class="box-icon bg_white wishlist btn-icon-action">
                                    <span class="icon icon-heart"></span>
                                    <span class="tooltip">Add to Wishlist</span>
                                    <span class="icon icon-delete"></span>
                                </a>
                                <a href="#compare" data-bs-toggle="offcanvas" aria-controls="offcanvasLeft"
                                    class="box-icon bg_white compare btn-icon-action">
                                    <span class="icon icon-compare"></span>
                                    <span class="tooltip">Add to Compare</span>
                                    <span class="icon icon-check"></span>
                                </a>
                                <a href="#quick_view" data-bs-toggle="modal"
                                    class="box-icon bg_white quickview tf-btn-loading">
                                    <span class="icon icon-view"></span>
                                    <span class="tooltip">Quick View</span>
                                </a>
                            </div>
                        </div>
                        <div class="card-product-info">
                            <a href="product-detail.html" class="title link">Loose Fit Sweatshirt</a>
                            <span class="price">$10.00</span>
                            <ul class="list-color-product">
                                <li class="list-color-item color-swatch active">
                                    <span class="tooltip">Light Green</span>
                                    <span class="swatch-value bg_light-green"></span>
                                    <img class="lazyload" data-src="assets/frontend/images/products/light-green-1.jpg"
                                        src="assets/frontend/images/products/light-green-1.jpg" alt="image-product">
                                </li>
                                <li class="list-color-item color-swatch">
                                    <span class="tooltip">Black</span>
                                    <span class="swatch-value bg_dark"></span>
                                    <img class="lazyload" data-src="assets/frontend/images/products/black-3.jpg"
                                        src="assets/frontend/images/products/black-3.jpg" alt="image-product">
                                </li>
                                <li class="list-color-item color-swatch">
                                    <span class="tooltip">Blue</span>
                                    <span class="swatch-value bg_blue-2"></span>
                                    <img class="lazyload" data-src="assets/frontend/images/products/blue.jpg"
                                        src="assets/frontend/images/products/blue.jpg" alt="image-product">
                                </li>
                                <li class="list-color-item color-swatch">
                                    <span class="tooltip">Dark Blue</span>
                                    <span class="swatch-value bg_dark-blue"></span>
                                    <img class="lazyload" data-src="assets/frontend/images/products/dark-blue.jpg"
                                        src="assets/frontend/images/products/dark-blue.jpg" alt="image-product">
                                </li>
                                <li class="list-color-item color-swatch">
                                    <span class="tooltip">White</span>
                                    <span class="swatch-value bg_white"></span>
                                    <img class="lazyload" data-src="assets/frontend/images/products/white-6.jpg"
                                        src="assets/frontend/images/products/white-6.jpg" alt="image-product">
                                </li>
                                <li class="list-color-item color-swatch">
                                    <span class="tooltip">Light Grey</span>
                                    <span class="swatch-value bg_light-grey"></span>
                                    <img class="lazyload" data-src="assets/frontend/images/products/light-grey.jpg"
                                        src="assets/frontend/images/products/light-grey.jpg" alt="image-product">
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- card product 15 -->
                    <div class="card-product fl-item" data-price="10.00" data-size="s m l"
                        data-color="black dark-blue beige light-blue white">
                        <div class="card-product-wrapper">
                            <a href="product-detail.html" class="product-img">
                                <img class="lazyload img-product" data-src="assets/frontend/images/products/black-4.jpg"
                                    src="assets/frontend/images/products/black-4.jpg" alt="image-product">
                                <img class="lazyload img-hover" data-src="assets/frontend/images/products/black-5.jpg"
                                    src="assets/frontend/images/products/black-5.jpg" alt="image-product">
                            </a>
                            <div class="size-list">
                                <span>S</span>
                                <span>M</span>
                                <span>L</span>
                            </div>
                            <div class="list-product-btn">
                                <a href="#quick_add" data-bs-toggle="modal"
                                    class="box-icon bg_white quick-add tf-btn-loading">
                                    <span class="icon icon-bag"></span>
                                    <span class="tooltip">Quick Add</span>
                                </a>
                                <a href="javascript:void(0);" class="box-icon bg_white wishlist btn-icon-action">
                                    <span class="icon icon-heart"></span>
                                    <span class="tooltip">Add to Wishlist</span>
                                    <span class="icon icon-delete"></span>
                                </a>
                                <a href="#compare" data-bs-toggle="offcanvas" aria-controls="offcanvasLeft"
                                    class="box-icon bg_white compare btn-icon-action">
                                    <span class="icon icon-compare"></span>
                                    <span class="tooltip">Add to Compare</span>
                                    <span class="icon icon-check"></span>
                                </a>
                                <a href="#quick_view" data-bs-toggle="modal"
                                    class="box-icon bg_white quickview tf-btn-loading">
                                    <span class="icon icon-view"></span>
                                    <span class="tooltip">Quick View</span>
                                </a>
                            </div>
                        </div>
                        <div class="card-product-info">
                            <a href="product-detail.html" class="title link">Regular Fit Oxford Shirt</a>
                            <span class="price">$10.00</span>
                            <ul class="list-color-product">
                                <li class="list-color-item color-swatch active">
                                    <span class="tooltip">Black</span>
                                    <span class="swatch-value bg_dark"></span>
                                    <img class="lazyload" data-src="assets/frontend/images/products/black-4.jpg"
                                        src="assets/frontend/images/products/black-4.jpg" alt="image-product">
                                </li>
                                <li class="list-color-item color-swatch">
                                    <span class="tooltip">Dark Blue</span>
                                    <span class="swatch-value bg_dark-blue"></span>
                                    <img class="lazyload" data-src="assets/frontend/images/products/dark-blue-2.jpg"
                                        src="assets/frontend/images/products/dark-blue-2.jpg" alt="image-product">
                                </li>
                                <li class="list-color-item color-swatch">
                                    <span class="tooltip">Beige</span>
                                    <span class="swatch-value bg_beige"></span>
                                    <img class="lazyload" data-src="assets/frontend/images/products/beige.jpg"
                                        src="assets/frontend/images/products/beige.jpg" alt="image-product">
                                </li>
                                <li class="list-color-item color-swatch">
                                    <span class="tooltip">Light Blue</span>
                                    <span class="swatch-value bg_light-blue"></span>
                                    <img class="lazyload" data-src="assets/frontend/images/products/light-blue.jpg"
                                        src="assets/frontend/images/products/light-blue.jpg" alt="image-product">
                                </li>
                                <li class="list-color-item color-swatch">
                                    <span class="tooltip">White</span>
                                    <span class="swatch-value bg_white"></span>
                                    <img class="lazyload" data-src="assets/frontend/images/products/white-7.jpg"
                                        src="assets/frontend/images/products/white-7.jpg" alt="image-product">
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- card product 16 -->
                    <div class="card-product fl-item" data-price="9.95" data-size="s m l xl"
                        data-color="white black blue">
                        <div class="card-product-wrapper">
                            <a href="product-detail.html" class="product-img">
                                <img class="lazyload img-product" data-src="assets/frontend/images/products/white-8.jpg"
                                    src="assets/frontend/images/products/white-8.jpg" alt="image-product">
                                <img class="lazyload img-hover" data-src="assets/frontend/images/products/black-6.jpg"
                                    src="assets/frontend/images/products/black-6.jpg" alt="image-product">
                            </a>
                            <div class="size-list">
                                <span>S</span>
                                <span>M</span>
                                <span>L</span>
                                <span>XL</span>
                            </div>
                            <div class="list-product-btn">
                                <a href="#quick_add" data-bs-toggle="modal"
                                    class="box-icon bg_white quick-add tf-btn-loading">
                                    <span class="icon icon-bag"></span>
                                    <span class="tooltip">Quick Add</span>
                                </a>
                                <a href="javascript:void(0);" class="box-icon bg_white wishlist btn-icon-action">
                                    <span class="icon icon-heart"></span>
                                    <span class="tooltip">Add to Wishlist</span>
                                    <span class="icon icon-delete"></span>
                                </a>
                                <a href="#compare" data-bs-toggle="offcanvas" aria-controls="offcanvasLeft"
                                    class="box-icon bg_white compare btn-icon-action">
                                    <span class="icon icon-compare"></span>
                                    <span class="tooltip">Add to Compare</span>
                                    <span class="icon icon-check"></span>
                                </a>
                                <a href="#quick_view" data-bs-toggle="modal"
                                    class="box-icon bg_white quickview tf-btn-loading">
                                    <span class="icon icon-view"></span>
                                    <span class="tooltip">Quick View</span>
                                </a>
                            </div>
                        </div>
                        <div class="card-product-info">
                            <a href="product-detail.html" class="title link">Loose Fit Hoodie</a>
                            <span class="price">$9.95</span>
                            <ul class="list-color-product">
                                <li class="list-color-item color-swatch active">
                                    <span class="tooltip">White</span>
                                    <span class="swatch-value bg_white"></span>
                                    <img class="lazyload" data-src="assets/frontend/images/products/white-8.jpg"
                                        src="assets/frontend/images/products/white-8.jpg" alt="image-product">
                                </li>
                                <li class="list-color-item color-swatch">
                                    <span class="tooltip">Black</span>
                                    <span class="swatch-value bg_dark"></span>
                                    <img class="lazyload" data-src="assets/frontend/images/products/black-7.jpg"
                                        src="assets/frontend/images/products/black-7.jpg" alt="image-product">
                                </li>
                                <li class="list-color-item color-swatch">
                                    <span class="tooltip">Blue</span>
                                    <span class="swatch-value bg_blue-2"></span>
                                    <img class="lazyload" data-src="assets/frontend/images/products/blue-2.jpg"
                                        src="assets/frontend/images/products/blue-2.jpg" alt="image-product">
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="tf-pagination-wrap view-more-button text-center tf-pagination-btn">
                    <button class="tf-loading-default loading"></button>
                </div>
            </div>

        </div>
    </section>
    <!-- /Latest Product -->

    <!-- Icon box -->
    <section class="flat-spacing-11 pb_0 flat-iconbox wow fadeInUp" data-wow-delay="0s"
        style="visibility: visible; animation-delay: 0s; animation-name: fadeInUp;">
        <div class="container">
            <div class="wrap-carousel wrap-mobile">
                <div dir="ltr" class="swiper tf-sw-mobile" data-preview="1" data-space="15">
                    <div class="swiper-wrapper wrap-iconbox">
                        <div class="swiper-slide">
                            <div class="tf-icon-box style-border-line text-center">
                                <div class="icon">
                                    <i class="icon-shipping"></i>
                                </div>
                                <div class="content">
                                    <div class="title">Free Shipping</div>
                                    <p>Free shipping over order $120</p>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="tf-icon-box style-border-line text-center">
                                <div class="icon">
                                    <i class="icon-payment fs-22"></i>
                                </div>
                                <div class="content">
                                    <div class="title">Flexible Payment</div>
                                    <p>Pay with Multiple Credit Cards</p>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="tf-icon-box style-border-line text-center">
                                <div class="icon">
                                    <i class="icon-return fs-22"></i>
                                </div>
                                <div class="content">
                                    <div class="title">14 Day Returns</div>
                                    <p>Within 30 days for an exchange</p>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="tf-icon-box style-border-line text-center">
                                <div class="icon">
                                    <i class="icon-suport"></i>
                                </div>
                                <div class="content">
                                    <div class="title">Premium Support</div>
                                    <p>Outstanding premium support</p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="sw-dots style-2 sw-pagination-mb justify-content-center"></div>
            </div>
        </div>
    </section>
    <!-- /Icon box -->

    <!-- Brand -->
    <section class="flat-spacing-12">
        <div class="container">
            <div class="wrap-carousel wrap-brand wrap-brand-v2 autoplay-linear">
                <div dir="ltr"
                    class="swiper tf-sw-brand border-0 swiper-initialized swiper-horizontal swiper-pointer-events"
                    data-play="true" data-loop="true" data-preview="6" data-tablet="4" data-mobile="2"
                    data-space-lg="30" data-space-md="15">
                    <div class="swiper-wrapper" id="swiper-wrapper-6220e8bd24b1b04a" aria-live="off"
                        style="transform: translate3d(-2899.5px, 0px, 0px); transition-duration: 0ms;">

                        @foreach ($brands as $brand)
                            <div class="swiper-slide" data-swiper-slide-index="0" role="group" aria-label="1 / 6"
                                style="width: 292.167px; margin-right: 30px;">
                                <div class="brand-item-v2">
                                    @if (!empty($brand->logo))
                                        <img class="ls-is-cached lazyloaded" style="width:215px; height:89px"
                                            data-src="{{ Storage::url($brand->logo) }}"
                                            src="{{ Storage::url($brand->logo) }}" alt="{{ $brand->slug }}">
                                    @else
                                        <img class="ls-is-cached lazyloaded" style="width:215px; height:89px"
                                            data-src="{{ asset('assets/frontend/images/default.jpeg') }}"
                                            src="{{ asset('assets/frontend/images/default.jpeg') }}" alt="brand">
                                    @endif
                                </div>
                            </div>
                        @endforeach

                    </div>
                    <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
                </div>
            </div>
        </div>
    </section>
    <!-- /Brand -->
@endsection
