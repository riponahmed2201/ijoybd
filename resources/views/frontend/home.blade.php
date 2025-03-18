@extends('frontend.master')

@section('home_title', 'Home')

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

                        @foreach (getSubCategories() as $subcategory)
                            <div class="swiper-slide" lazy="true">
                                <div class="collection-item style-2 hover-img">
                                    <div class="collection-inner">
                                        <a href="#" class="collection-image img-style">
                                            @if (!empty($subcategory->avatar))
                                                <img style="width:260px; height:317px" class="lazyload"
                                                    data-src="{{ Storage::url($subcategory->avatar) }}"
                                                    src="{{ Storage::url($subcategory->avatar) }}"
                                                    alt="{{ $subcategory->slug }}">
                                            @else
                                                <img style="width:260px; height:317px" class="lazyload"
                                                    data-src="{{ asset('assets/frontend/images/default.jpeg') }}"
                                                    src="{{ asset('assets/frontend/images/default.jpeg') }}"
                                                    alt="{{ $subcategory->slug }}">
                                            @endif
                                        </a>
                                        <div class="collection-content">
                                            <a href="#"
                                                class="tf-btn collection-title hover-icon fs-15"><span>{{ $subcategory->name }}</span><i
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
                    @forelse ($products as $product)
                        <div class="card-product fl-item" data-price="18.95" data-size="m l xl"
                            data-color="brown light-purple light-green">
                            <div class="card-product-wrapper">
                                <a href="{{ route('shop.view', $product->id) }}" class="product-img">
                                    <img class="lazyload img-product" data-src="{{ Storage::url($product->thumbnail) }}"
                                        src="{{ Storage::url($product->thumbnail) }}" alt="{{ $product->name }}">
                                    <img class="lazyload img-hover" data-src="{{ Storage::url($product->thumbnail) }}"
                                        src="{{ Storage::url($product->thumbnail) }}" alt="{{ $product->name }}">
                                </a>
                                <div class="list-product-btn">
                                    <a href="javascript:void(0);" class="box-icon bg_white quick-add tf-btn-loading"
                                        data-id="{{ $product->id }}">
                                        <span class="icon icon-bag"></span>
                                        <span class="tooltip">Quick Add</span>
                                    </a>
                                    {{-- <a href="javascript:void(0);" class="box-icon bg_white wishlist btn-icon-action">
                                        <span class="icon icon-heart"></span>
                                        <span class="tooltip">Add to Wishlist</span>
                                        <span class="icon icon-delete"></span>
                                    </a> --}}
                                    <a href="{{ route('shop.view', $product->id) }}"
                                        class="box-icon bg_white quickview tf-btn-loading">
                                        <span class="icon icon-view"></span>
                                        <span class="tooltip">Quick View</span>
                                    </a>
                                </div>
                                @forelse ($product?->size_details as $size)
                                    <div class="size-list">
                                        <span>{{ $size->name }}</span>
                                    </div>
                                @empty
                                    <strong class="text-danger">No sizes available</strong>
                                @endforelse

                                @if ($product->discount > 0)
                                    <div class="on-sale-wrap text-end">
                                        <div class="on-sale-item">-{{ $product->discount }}%</div>
                                    </div>
                                @endif
                            </div>
                            <div class="card-product-info">
                                <a href="{{ route('shop.view', $product->id) }}"
                                    class="title link">{{ $product->name }}</a>

                                @if ($product->discount > 0)
                                    <span
                                        class="price">{{ $product->price - ($product->discount * $product->price) / 100 }}
                                        TK</span>
                                @else
                                    <span class="price">{{ $product->price }} TK</span>
                                @endif

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
                    @empty
                        <strong class="text-danger">No products available</strong>
                    @endforelse

                </div>
                {{-- <div class="tf-pagination-wrap view-more-button text-center tf-pagination-btn">
                    <button class="tf-loading-default loading"></button>
                </div> --}}
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
