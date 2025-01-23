@extends('frontend.master')

@section('home-content')
    <!-- Slider -->
    @include('frontend.includes.slider')
    <!-- /Slider -->

    <!-- Collection -->
    <section class="flat-spacing-15">
        <div class="container-full">
            <div class="flat-title flex-row justify-content-between px-0">
                <span class="title wow fadeInUp" data-wow-delay="0s">Featured Collections</span>
                <div class="box-sw-navigation">
                    <div class="nav-sw nav-next-slider nav-next-collection"><span class="icon icon-arrow-left"></span></div>
                    <div class="nav-sw nav-prev-slider nav-prev-collection"><span class="icon icon-arrow-right"></span></div>
                </div>
            </div>
            <div dir="ltr" class="swiper tf-sw-collection sw-wrapper-right" data-preview="4.5" data-tablet="2.4"
                data-mobile="2.4" data-space-lg="30" data-space-md="30" data-space="15" data-loop="false"
                data-auto-play="false">
                <div class="swiper-wrapper">
                    <div class="swiper-slide" lazy="true">
                        <div class="collection-item-v3 hover-img">
                            <a href="shop-collection-sub.html" class="collection-image img-style">
                                <img class="lazyload" data-src="assets/frontend/images/collections/collection-32.jpg"
                                    src="assets/frontend/images/collections/collection-32.jpg" alt="collection-img">
                                <span class="box-icon">
                                    <i class="icon-icon icon-arrow1-top-left"></i>
                                </span>
                            </a>
                            <div class="collection-content">
                                <a href="shop-collection-sub.html" class="link title fw-5">Blazers</a>
                                <div class="count">14 items </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide" lazy="true">
                        <div class="collection-item-v3 hover-img">
                            <a href="shop-collection-sub.html" class="collection-image img-style">
                                <img class="lazyload" data-src="assets/frontend/images/collections/collection-33.jpg"
                                    src="assets/frontend/images/collections/collection-33.jpg" alt="collection-img">
                                <span class="box-icon">
                                    <i class="icon-icon icon-arrow1-top-left"></i>
                                </span>
                            </a>
                            <div class="collection-content">
                                <a href="shop-collection-sub.html" class="link title fw-5">Sweaters</a>
                                <div class="count">23 items </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide" lazy="true">
                        <div class="collection-item-v3 hover-img">
                            <a href="shop-collection-sub.html" class="collection-image img-style">
                                <img class="lazyload" data-src="assets/frontend/images/collections/collection-34.jpg"
                                    src="assets/frontend/images/collections/collection-34.jpg" alt="collection-img">
                                <span class="box-icon">
                                    <i class="icon-icon icon-arrow1-top-left"></i>
                                </span>
                            </a>
                            <div class="collection-content">
                                <a href="shop-collection-sub.html" class="link title fw-5">Sneakers</a>
                                <div class="count">21 items </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide" lazy="true">
                        <div class="collection-item-v3 hover-img">
                            <a href="shop-collection-sub.html" class="collection-image img-style">
                                <img class="lazyload" data-src="assets/frontend/images/collections/collection-35.jpg"
                                    src="assets/frontend/images/collections/collection-35.jpg" alt="collection-img">
                                <span class="box-icon">
                                    <i class="icon-icon icon-arrow1-top-left"></i>
                                </span>
                            </a>
                            <div class="collection-content">
                                <a href="shop-collection-sub.html" class="link title fw-5">Clothing</a>
                                <div class="count">31 items </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide" lazy="true">
                        <div class="collection-item-v3 hover-img">
                            <a href="shop-collection-sub.html" class="collection-image img-style">
                                <img class="lazyload" data-src="assets/frontend/images/collections/collection-36.jpg"
                                    src="assets/frontend/images/collections/collection-36.jpg" alt="collection-img">
                                <span class="box-icon">
                                    <i class="icon-icon icon-arrow1-top-left"></i>
                                </span>
                            </a>
                            <div class="collection-content">
                                <a href="shop-collection-sub.html" class="link title fw-5">Accessories</a>
                                <div class="count">14 items </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="collection-item-v3 hover-img">
                            <a href="shop-collection-sub.html" class="collection-image img-style">
                                <img class="lazyload" data-src="assets/frontend/images/collections/collection-37.jpg"
                                    src="assets/frontend/images/collections/collection-37.jpg" alt="collection-img">
                                <span class="box-icon">
                                    <i class="icon-icon icon-arrow1-top-left"></i>
                                </span>
                            </a>
                            <div class="collection-content">
                                <a href="shop-collection-sub.html" class="link title fw-5">Men</a>
                                <div class="count">9 items </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="collection-item-v3 hover-img">
                            <a href="shop-collection-sub.html" class="collection-image img-style">
                                <img class="lazyload" data-src="assets/frontend/images/collections/collection-38.jpg"
                                    src="assets/frontend/images/collections/collection-38.jpg" alt="collection-img">
                                <span class="box-icon">
                                    <i class="icon-icon icon-arrow1-top-left"></i>
                                </span>
                            </a>
                            <div class="collection-content">
                                <a href="shop-collection-sub.html" class="link title fw-5">Shoes</a>
                                <div class="count">21 items </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /Collection -->


    <!-- Product -->
    <section class="flat-spacing-6 pt_0">
        <div class="container">
            <div class="flat-title wow fadeInUp" data-wow-delay="0s">
                <span class="title">Editor's Picks</span>
                <div class="d-flex gap-16 align-items-center box-pagi-arr">
                    <div class="nav-sw-arrow nav-next-slider nav-next-product"><span class="icon icon-arrow1-left"></span>
                    </div>
                    <a href="product-style-05.html" class="tf-btn btn-line fs-12 fw-6">VIEW ALL</a>
                    <div class="nav-sw-arrow nav-prev-slider nav-prev-product"><span
                            class="icon icon-arrow1-right"></span></div>
                </div>
            </div>
            <div class="hover-sw-nav hover-sw-2">
                <div dir="ltr" class="swiper tf-sw-product-sell wrap-sw-over" data-preview="4" data-tablet="3"
                    data-mobile="2" data-space-lg="30" data-space-md="15" data-pagination="2" data-pagination-md="3"
                    data-pagination-lg="3">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide" lazy="true">
                            <div class="card-product style-5">
                                <div class="card-product-wrapper">
                                    <a href="product-detail.html" class="product-img">
                                        <img class="lazyload img-product"
                                            data-src="assets/frontend/images/products/orange-1.jpg"
                                            src="assets/frontend/images/products/orange-1.jpg" alt="image-product">
                                        <img class="lazyload img-hover"
                                            data-src="assets/frontend/images/products/white-1.jpg"
                                            src="assets/frontend/images/products/white-1.jpg" alt="image-product">
                                    </a>
                                    <div class="list-product-btn gap-0">
                                        <a href="#quick_add" data-bs-toggle="modal"
                                            class="box-icon bg_white quick-add tf-btn-loading shadow-none">
                                            <span class="icon icon-bag"></span>
                                            <span class="tooltip">Quick Add</span>
                                        </a>
                                        <a href="javascript:void(0);"
                                            class="box-icon bg_white wishlist btn-icon-action shadow-none">
                                            <span class="icon icon-heart"></span>
                                            <span class="tooltip">Add to Wishlist</span>
                                            <span class="icon icon-delete"></span>
                                        </a>
                                        <a href="#compare" data-bs-toggle="offcanvas" aria-controls="offcanvasLeft"
                                            class="box-icon bg_white compare btn-icon-action shadow-none">
                                            <span class="icon icon-compare"></span>
                                            <span class="tooltip">Add to Compare</span>
                                            <span class="icon icon-check"></span>
                                        </a>
                                        <a href="#quick_view" data-bs-toggle="modal"
                                            class="box-icon bg_white quickview tf-btn-loading shadow-none">
                                            <span class="icon icon-view"></span>
                                            <span class="tooltip">Quick View</span>
                                        </a>
                                    </div>
                                    <div class="size-list style-3">
                                        <span>S</span>
                                        <span>M</span>
                                        <span>L</span>
                                        <span>XL</span>
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
                        </div>
                        <div class="swiper-slide" lazy="true">
                            <div class="card-product style-5">
                                <div class="card-product-wrapper">
                                    <a href="product-detail.html" class="product-img">
                                        <img class="lazyload img-product"
                                            data-src="assets/frontend/images/products/brown.jpg"
                                            src="assets/frontend/images/products/brown.jpg" alt="image-product">
                                        <img class="lazyload img-hover"
                                            data-src="assets/frontend/images/products/purple.jpg"
                                            src="assets/frontend/images/products/purple.jpg" alt="image-product">
                                    </a>
                                    <div class="list-product-btn gap-0">
                                        <a href="#quick_add" data-bs-toggle="modal"
                                            class="box-icon bg_white quick-add tf-btn-loading shadow-none">
                                            <span class="icon icon-bag"></span>
                                            <span class="tooltip">Quick Add</span>
                                        </a>
                                        <a href="javascript:void(0);"
                                            class="box-icon bg_white wishlist btn-icon-action shadow-none">
                                            <span class="icon icon-heart"></span>
                                            <span class="tooltip">Add to Wishlist</span>
                                            <span class="icon icon-delete"></span>
                                        </a>
                                        <a href="#compare" data-bs-toggle="offcanvas" aria-controls="offcanvasLeft"
                                            class="box-icon bg_white compare btn-icon-action shadow-none">
                                            <span class="icon icon-compare"></span>
                                            <span class="tooltip">Add to Compare</span>
                                            <span class="icon icon-check"></span>
                                        </a>
                                        <a href="#quick_view" data-bs-toggle="modal"
                                            class="box-icon bg_white quickview tf-btn-loading shadow-none">
                                            <span class="icon icon-view"></span>
                                            <span class="tooltip">Quick View</span>
                                        </a>
                                    </div>
                                    <div class="size-list style-3">
                                        <span>S</span>
                                        <span>M</span>
                                        <span>L</span>
                                        <span>XL</span>
                                    </div>
                                    <div class="on-sale-wrap text-end">
                                        <div class="on-sale-item">-33%</div>
                                    </div>
                                    <div class="countdown-box">
                                        <div class="js-countdown" data-timer="1007500" data-labels="d :,h :,m :,s"></div>
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
                        </div>
                        <div class="swiper-slide" lazy="true">
                            <div class="card-product style-5">
                                <div class="card-product-wrapper">
                                    <a href="product-detail.html" class="product-img">
                                        <img class="lazyload img-product"
                                            data-src="assets/frontend/images/products/white-3.jpg"
                                            src="assets/frontend/images/products/white-3.jpg" alt="image-product">
                                        <img class="lazyload img-hover"
                                            data-src="assets/frontend/images/products/white-4.jpg"
                                            src="assets/frontend/images/products/white-4.jpg" alt="image-product">
                                    </a>
                                    <div class="list-product-btn gap-0 absolute-2">
                                        <a href="#shoppingCart" data-bs-toggle="modal"
                                            class="box-icon bg_white quick-add tf-btn-loading shadow-none">
                                            <span class="icon icon-bag"></span>
                                            <span class="tooltip">Add to cart</span>
                                        </a>
                                        <a href="javascript:void(0);"
                                            class="box-icon bg_white wishlist btn-icon-action shadow-none">
                                            <span class="icon icon-heart"></span>
                                            <span class="tooltip">Add to Wishlist</span>
                                            <span class="icon icon-delete"></span>
                                        </a>
                                        <a href="#compare" data-bs-toggle="offcanvas" aria-controls="offcanvasLeft"
                                            class="box-icon bg_white compare btn-icon-action shadow-none">
                                            <span class="icon icon-compare"></span>
                                            <span class="tooltip">Add to Compare</span>
                                            <span class="icon icon-check"></span>
                                        </a>
                                        <a href="#quick_view" data-bs-toggle="modal"
                                            class="box-icon bg_white quickview tf-btn-loading shadow-none">
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
                        </div>
                        <div class="swiper-slide" lazy="true">
                            <div class="card-product style-5">
                                <div class="card-product-wrapper">
                                    <a href="product-detail.html" class="product-img">
                                        <img class="lazyload img-product"
                                            data-src="assets/frontend/images/products/white-2.jpg"
                                            src="assets/frontend/images/products/white-2.jpg" alt="image-product">
                                        <img class="lazyload img-hover"
                                            data-src="assets/frontend/images/products/pink-1.jpg"
                                            src="assets/frontend/images/products/pink-1.jpg" alt="image-product">
                                    </a>
                                    <div class="list-product-btn gap-0">
                                        <a href="#quick_add" data-bs-toggle="modal"
                                            class="box-icon bg_white quick-add tf-btn-loading shadow-none">
                                            <span class="icon icon-bag"></span>
                                            <span class="tooltip">Quick Add</span>
                                        </a>
                                        <a href="javascript:void(0);"
                                            class="box-icon bg_white wishlist btn-icon-action shadow-none">
                                            <span class="icon icon-heart"></span>
                                            <span class="tooltip">Add to Wishlist</span>
                                            <span class="icon icon-delete"></span>
                                        </a>
                                        <a href="#compare" data-bs-toggle="offcanvas" aria-controls="offcanvasLeft"
                                            class="box-icon bg_white compare btn-icon-action shadow-none">
                                            <span class="icon icon-compare"></span>
                                            <span class="tooltip">Add to Compare</span>
                                            <span class="icon icon-check"></span>
                                        </a>
                                        <a href="#quick_view" data-bs-toggle="modal"
                                            class="box-icon bg_white quickview tf-btn-loading shadow-none">
                                            <span class="icon icon-view"></span>
                                            <span class="tooltip">Quick View</span>
                                        </a>
                                    </div>
                                    <div class="size-list style-3">
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
                        </div>
                        <div class="swiper-slide" lazy="true">
                            <div class="card-product style-5">
                                <div class="card-product-wrapper">
                                    <a href="product-detail.html" class="product-img">
                                        <img class="lazyload img-product"
                                            data-src="assets/frontend/images/products/brown-2.jpg"
                                            src="assets/frontend/images/products/brown-2.jpg" alt="image-product">
                                        <img class="lazyload img-hover"
                                            data-src="assets/frontend/images/products/brown-3.jpg"
                                            src="assets/frontend/images/products/brown-3.jpg" alt="image-product">
                                    </a>
                                    <div class="list-product-btn gap-0">
                                        <a href="#quick_add" data-bs-toggle="modal"
                                            class="box-icon bg_white quick-add tf-btn-loading shadow-none">
                                            <span class="icon icon-bag"></span>
                                            <span class="tooltip">Quick Add</span>
                                        </a>
                                        <a href="javascript:void(0);"
                                            class="box-icon bg_white wishlist btn-icon-action shadow-none">
                                            <span class="icon icon-heart"></span>
                                            <span class="tooltip">Add to Wishlist</span>
                                            <span class="icon icon-delete"></span>
                                        </a>
                                        <a href="#compare" data-bs-toggle="offcanvas" aria-controls="offcanvasLeft"
                                            class="box-icon bg_white compare btn-icon-action shadow-none">
                                            <span class="icon icon-compare"></span>
                                            <span class="tooltip">Add to Compare</span>
                                            <span class="icon icon-check"></span>
                                        </a>
                                        <a href="#quick_view" data-bs-toggle="modal"
                                            class="box-icon bg_white quickview tf-btn-loading shadow-none">
                                            <span class="icon icon-view"></span>
                                            <span class="tooltip">Quick View</span>
                                        </a>
                                    </div>
                                    <div class="size-list style-3">
                                        <span>S</span>
                                        <span>M</span>
                                        <span>L</span>
                                        <span>XL</span>
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
                        </div>
                        <div class="swiper-slide" lazy="true">
                            <div class="card-product style-5">
                                <div class="card-product-wrapper">
                                    <a href="product-detail.html" class="product-img">
                                        <img class="lazyload img-product"
                                            data-src="assets/frontend/images/products/light-green-1.jpg"
                                            src="assets/frontend/images/products/light-green-1.jpg" alt="image-product">
                                        <img class="lazyload img-hover"
                                            data-src="assets/frontend/images/products/light-green-2.jpg"
                                            src="assets/frontend/images/products/light-green-2.jpg" alt="image-product">
                                    </a>
                                    <div class="list-product-btn gap-0 absolute-2">
                                        <a href="#quick_add" data-bs-toggle="modal"
                                            class="box-icon bg_white quick-add tf-btn-loading shadow-none">
                                            <span class="icon icon-bag"></span>
                                            <span class="tooltip">Quick Add</span>
                                        </a>
                                        <a href="javascript:void(0);"
                                            class="box-icon bg_white wishlist btn-icon-action shadow-none">
                                            <span class="icon icon-heart"></span>
                                            <span class="tooltip">Add to Wishlist</span>
                                            <span class="icon icon-delete"></span>
                                        </a>
                                        <a href="#compare" data-bs-toggle="offcanvas" aria-controls="offcanvasLeft"
                                            class="box-icon bg_white compare btn-icon-action shadow-none">
                                            <span class="icon icon-compare"></span>
                                            <span class="tooltip">Add to Compare</span>
                                            <span class="icon icon-check"></span>
                                        </a>
                                        <a href="#quick_view" data-bs-toggle="modal"
                                            class="box-icon bg_white quickview tf-btn-loading shadow-none">
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
                                            <img class="lazyload"
                                                data-src="assets/frontend/images/products/light-green-1.jpg"
                                                src="assets/frontend/images/products/light-green-1.jpg"
                                                alt="image-product">
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
                                            <img class="lazyload"
                                                data-src="assets/frontend/images/products/light-grey.jpg"
                                                src="assets/frontend/images/products/light-grey.jpg" alt="image-product">
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="nav-sw nav-next-slider nav-next-product box-icon w_46 round"><span
                        class="icon icon-arrow-left"></span></div>
                <div class="nav-sw nav-prev-slider nav-prev-product box-icon w_46 round"><span
                        class="icon icon-arrow-right"></span></div>
            </div>
        </div>
    </section>
    <!-- /Product -->

    <!-- Icon box -->
    <section class="flat-spacing-9 flat-iconbox-v2">
        <div class="container">
            <div class="wrap-carousel wrap-mobile wow fadeInUp" data-wow-delay="0s">
                <div dir="ltr" class="swiper tf-sw-mobile" data-preview="1" data-space="15">
                    <div class="swiper-wrapper wrap-iconbox">
                        <div class="swiper-slide">
                            <div class="tf-icon-box text-center">
                                <div class="icon">
                                    <i class="icon-shipping-1"></i>
                                </div>
                                <div class="content">
                                    <div class="title">Free Shipping</div>
                                    <p>Free shipping over order $120</p>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="tf-icon-box text-center">
                                <div class="icon">
                                    <i class="icon-payment-1"></i>
                                </div>
                                <div class="content">
                                    <div class="title">Flexible Payment</div>
                                    <p>Pay with Multiple Credit Cards</p>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="tf-icon-box text-center">
                                <div class="icon">
                                    <i class="icon-return-1"></i>
                                </div>
                                <div class="content">
                                    <div class="title">14 Day Returns</div>
                                    <p>Within 30 days for an exchange</p>
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

    <!-- Shop Gram -->
    <section class="flat-spacing-7">
        <div class="container">
            <div class="flat-title wow fadeInUp" data-wow-delay="0s">
                <span class="title">Shop Gram</span>
                <p class="sub-title">Inspire and let yourself be inspired, from one unique fashion to another.</p>
            </div>
            <div class="wrap-carousel wrap-shop-gram">
                <div dir="ltr" class="swiper tf-sw-shop-gallery" data-preview="5" data-tablet="3" data-mobile="2"
                    data-space-lg="7" data-space-md="7">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <div class="gallery-item hover-img wow fadeInUp" data-wow-delay="0s">
                                <div class="img-style">
                                    <img class="lazyload img-hover"
                                        data-src="assets/frontend/images/shop/gallery/gallery-7.jpg"
                                        src="assets/frontend/images/shop/gallery/gallery-7.jpg" alt="image-gallery">
                                </div>
                                <a href="#quick_add" data-bs-toggle="modal" class="box-icon"><span
                                        class="icon icon-bag"></span> <span class="tooltip">Quick Add</span></a>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="gallery-item hover-img wow fadeInUp" data-wow-delay=".1s">
                                <div class="img-style">
                                    <img class="lazyload img-hover"
                                        data-src="assets/frontend/images/shop/gallery/gallery-3.jpg"
                                        src="assets/frontend/images/shop/gallery/gallery-3.jpg" alt="image-gallery">
                                </div>
                                <a href="#quick_add" data-bs-toggle="modal" class="box-icon"><span
                                        class="icon icon-bag"></span> <span class="tooltip">Quick Add</span></a>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="gallery-item hover-img wow fadeInUp" data-wow-delay=".2s">
                                <div class="img-style">
                                    <img class="lazyload img-hover"
                                        data-src="assets/frontend/images/shop/gallery/gallery-5.jpg"
                                        src="assets/frontend/images/shop/gallery/gallery-5.jpg" alt="image-gallery">
                                </div>
                                <a href="#quick_add" data-bs-toggle="modal" class="box-icon"><span
                                        class="icon icon-bag"></span> <span class="tooltip">Quick Add</span></a>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="gallery-item hover-img wow fadeInUp" data-wow-delay=".3s">
                                <div class="img-style">
                                    <img class="lazyload img-hover"
                                        data-src="assets/frontend/images/shop/gallery/gallery-8.jpg"
                                        src="assets/frontend/images/shop/gallery/gallery-8.jpg" alt="image-gallery">
                                </div>
                                <a href="product-detail.html" class="box-icon"><span class="icon icon-bag"></span> <span
                                        class="tooltip">View
                                        product</span></a>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="gallery-item hover-img wow fadeInUp" data-wow-delay=".4s">
                                <div class="img-style">
                                    <img class="lazyload img-hover"
                                        data-src="assets/frontend/images/shop/gallery/gallery-6.jpg"
                                        src="assets/frontend/images/shop/gallery/gallery-6.jpg" alt="image-gallery">
                                </div>
                                <a href="product-detail.html" class="box-icon"><span class="icon icon-bag"></span> <span
                                        class="tooltip">View
                                        product</span></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="sw-dots sw-pagination-gallery justify-content-center"></div>
            </div>
        </div>
    </section>
    <!-- /Shop Gram -->
@endsection
