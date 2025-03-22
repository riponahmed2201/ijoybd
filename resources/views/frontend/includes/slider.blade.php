<section class="tf-slideshow slider-effect-fade slider-home-5 position-relative">
    <div dir="ltr" class="swiper tf-sw-slideshow" data-preview="1" data-tablet="1" data-mobile="1" data-centered="false"
        data-space="0" data-loop="true" data-auto-play="true" data-delay="2000" data-speed="1000">
        <div class="swiper-wrapper">

            @foreach ($sliders as $slider)
                <div class="swiper-slide" lazy="true">
                    <div class="wrap-slider">
                        <img style="width: 1521px; height:856px" class="lazyload"
                            data-src="{{ Storage::url($slider->image) }}" src="{{ Storage::url($slider->image) }}"
                            alt="Adidas">
                        <div class="box-content text-center">
                            <div class="container">
                                <h1 class="fade-item fade-item-1 text-white heading">{{ $slider->title }}</h1>
                                <p class="fade-item fade-item-2 text-white">{{ $slider->description }}</p>
                                <a href="/shop"
                                    class="fade-item fade-item-3 tf-btn btn-light-icon animate-hover-btn btn-xl radius-3"><span>Shop
                                        collection</span><i class="icon icon-arrow-right"></i></a>
                            </div>

                        </div>
                    </div>
                </div>
            @endforeach

            {{-- <div class="swiper-slide" lazy="true">
                <div class="wrap-slider">
                    <img class="lazyload" data-src="{{ asset('assets/frontend/images/slider/slider_adidas.png') }}"
                        src="{{ asset('assets/frontend/images/slider/slider_adidas.png') }}" alt="Adidas">
                    <div class="box-content text-center">
                        <div class="container">
                            <h1 class="fade-item fade-item-1 text-white heading">Adidas - Sport and Style</h1>
                            <p class="fade-item fade-item-2 text-white">Elevate your game with Adidas. Iconic,
                                innovative, and always in style.</p>
                            <a href="/shop"
                                class="fade-item fade-item-3 tf-btn btn-light-icon animate-hover-btn btn-xl radius-3"><span>Shop
                                    collection</span><i class="icon icon-arrow-right"></i></a>
                        </div>

                    </div>
                </div>
            </div>

            <div class="swiper-slide" lazy="true">
                <div class="wrap-slider">
                    <img class="lazyload" data-src="{{ asset('assets/frontend/images/slider/slider_puma.png') }}"
                        src="{{ asset('assets/frontend/images/slider/slider_puma.png') }}" alt="Puma">
                    <div class="box-content text-center">
                        <div class="container">
                            <h1 class="fade-item fade-item-1 text-white heading">Puma - Forever Faster</h1>
                            <p class="fade-item fade-item-2 text-white">Bold designs meet top performance. Stay fast and
                                stylish with Puma.
                            </p>
                            <a href="/shop"
                                class="fade-item fade-item-3 tf-btn btn-light-icon animate-hover-btn btn-xl radius-3"><span>Shop
                                    collection</span><i class="icon icon-arrow-right"></i></a>
                        </div>

                    </div>
                </div>
            </div>

            <div class="swiper-slide" lazy="true">
                <div class="wrap-slider">
                    <img class="lazyload" data-src="{{ asset('assets/frontend/images/slider/trouser_slider.png') }}"
                        src="{{ asset('assets/frontend/images/slider/trouser_slider.png') }}" alt="Puma">
                    <div class="box-content text-center">
                        <div class="container">
                            <h1 class="fade-item fade-item-1 text-white heading">Trouser - Forever Faster</h1>
                            <p class="fade-item fade-item-2 text-white">Bold designs meet top performance. Stay fast and
                                stylish with Trouser.
                            </p>
                            <a href="/shop"
                                class="fade-item fade-item-3 tf-btn btn-light-icon animate-hover-btn btn-xl radius-3"><span>Shop
                                    collection</span><i class="icon icon-arrow-right"></i></a>
                        </div>

                    </div>
                </div>
            </div>

            <div class="swiper-slide" lazy="true">
                <div class="wrap-slider">
                    <img class="lazyload" data-src="{{ asset('assets/frontend/images/slider/joursy_slider.png') }}"
                        src="{{ asset('assets/frontend/images/slider/joursy_slider.png') }}" alt="Puma">
                    <div class="box-content text-center">
                        <div class="container">
                            <h1 class="fade-item fade-item-1 text-white heading">Jersey - Forever Faster</h1>
                            <p class="fade-item fade-item-2 text-white">Bold designs meet top performance. Stay fast and
                                stylish with Jersey.
                            </p>
                            <a href="/shop"
                                class="fade-item fade-item-3 tf-btn btn-light-icon animate-hover-btn btn-xl radius-3"><span>Shop
                                    collection</span><i class="icon icon-arrow-right"></i></a>
                        </div>

                    </div>
                </div>
            </div> --}}

        </div>
    </div>
    <div class="wrap-pagination">
        <div class="sw-dots style-2 dots-white sw-pagination-slider justify-content-center"></div>
    </div>
</section>
