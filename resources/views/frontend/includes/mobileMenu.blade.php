@php

    $fields = ['id', 'name', 'slug', 'category_type', 'avatar'];

    $menCategories = App\Models\Category::query()
        ->where('status', 'active')
        ->where(function ($query) {
            $query->where('category_type', 'men')->orWhere('category_type', 'both');
        })
        ->get($fields);

    $womenCategories = App\Models\Category::query()
        ->where('status', 'active')
        ->where(function ($query) {
            $query->where('category_type', 'women')->orWhere('category_type', 'both');
        })
        ->get($fields);
@endphp

<div class="offcanvas offcanvas-start canvas-mb" id="mobileMenu">
    <span class="icon-close icon-close-popup" data-bs-dismiss="offcanvas" aria-label="Close"></span>
    <div class="mb-canvas-content">
        <div class="mb-body">
            <ul class="nav-ul-mb" id="wrapper-menu-navigation">
                <li class="nav-mb-item">
                    <a href="/" class="mb-menu-link current">
                        <span>Home</span>
                    </a>
                </li>
                <li class="nav-mb-item">
                    <a href="/shop" class="mb-menu-link current">
                        <span>Shop</span>
                    </a>
                </li>
                <li class="nav-mb-item">
                    <a href="#dropdown-menu-three" class="collapsed mb-menu-link current" data-bs-toggle="collapse"
                        aria-expanded="true" aria-controls="dropdown-menu-three">
                        <span>Products</span>
                        <span class="btn-open-sub"></span>
                    </a>
                    <div id="dropdown-menu-three" class="collapse">
                        <ul class="sub-nav-menu" id="sub-menu-navigation">
                            <li>
                                <a href="#sub-product-one" class="sub-nav-link collapsed" data-bs-toggle="collapse"
                                    aria-expanded="true" aria-controls="sub-product-one">
                                    <span>Men</span>
                                    <span class="btn-open-sub"></span>
                                </a>
                                <div id="sub-product-one" class="collapse">
                                    <ul class="sub-nav-menu sub-menu-level-2">
                                        @foreach ($menCategories as $menCategory)
                                            <li>
                                                <a href="/shop" class="sub-nav-link">
                                                    {{ $menCategory->name }}
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </li>
                            <li>
                                <a href="#sub-product-two" class="sub-nav-link collapsed" data-bs-toggle="collapse"
                                    aria-expanded="true" aria-controls="sub-product-two">
                                    <span>Women</span>
                                    <span class="btn-open-sub"></span>
                                </a>
                                <div id="sub-product-two" class="collapse">
                                    <ul class="sub-nav-menu sub-menu-level-2">
                                        @foreach ($womenCategories as $womenCategory)
                                            <li>
                                                <a href="/shop" class="sub-nav-link">
                                                    {{ $womenCategory->name }}
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </li>
                </li>
            </ul>
        </div>
        </li>

        <li class="nav-mb-item">
            <a href="/contact-us" class="mb-menu-link">Contact Us</a>
        </li>
        <li class="nav-mb-item">
            <a href="/about-us" class="mb-menu-link">About Us</a>
        </li>
        </ul>
    </div>
    <div class="mb-bottom">
        <a href="/login" class="site-nav-icon"><i class="icon icon-account"></i>Login</a>
    </div>
</div>
</div>
