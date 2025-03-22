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
                    <a href="#dropdown-menu-men" class="collapsed mb-menu-link current" data-bs-toggle="collapse"
                        aria-expanded="true" aria-controls="dropdown-menu-men">
                        <span>Men</span>
                        <span class="btn-open-sub"></span>
                    </a>
                    <div id="dropdown-menu-men" class="collapse">
                        <ul class="sub-nav-menu" id="sub-menu-navigation">
                            @foreach (getCategories()->toArray() as $menCategory)
                                @if ($menCategory['type'] === 'men')
                                    <li>
                                        <a href="{{ route('shop', ['category' => $menCategory['slug']]) }}"
                                            class="sub-nav-link collapsed">
                                            <strong>{{ $menCategory['name'] }}</strong>
                                            <span class="btn-open-sub"></span>
                                        </a>
                                        <div id="sub-product-one">
                                            <ul class="sub-nav-menu sub-menu-level-2">
                                                @foreach ($menCategory['subcategories'] as $menSubcategory)
                                                    <li>
                                                        <a href="{{ route('shop', ['subcategory' => $menSubcategory['slug']]) }}"
                                                            class="sub-nav-link">
                                                            {{ $menSubcategory['name'] }}
                                                        </a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </li>
                                @endif
                            @endforeach
                        </ul>
                    </div>
                </li>

                <li class="nav-mb-item">
                    <a href="#dropdown-menu-women" class="collapsed mb-menu-link current" data-bs-toggle="collapse"
                        aria-expanded="true" aria-controls="dropdown-menu-women">
                        <span>Women</span>
                        <span class="btn-open-sub"></span>
                    </a>
                    <div id="dropdown-menu-women" class="collapse">
                        <ul class="sub-nav-menu" id="sub-menu-navigation">
                            @foreach (getCategories()->toArray() as $womenCategory)
                                @if ($womenCategory['type'] === 'women')
                                    <li>
                                        <a href="{{ route('shop', ['category' => $womenCategory['slug']]) }}"
                                            class="sub-nav-link collapsed">
                                            <strong>{{ $womenCategory['name'] }}</strong>
                                            <span class="btn-open-sub"></span>
                                        </a>
                                        <div id="sub-product-one">
                                            <ul class="sub-nav-menu sub-menu-level-2">
                                                @foreach ($womenCategory['subcategories'] as $womenSubcategory)
                                                    <li>
                                                        <a href="{{ route('shop', ['subcategory' => $womenSubcategory['slug']]) }}"
                                                            class="sub-nav-link">
                                                            {{ $womenSubcategory['name'] }}
                                                        </a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </li>
                                @endif
                            @endforeach
                        </ul>
                    </div>
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
