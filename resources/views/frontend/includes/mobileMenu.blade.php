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
                            @foreach (getCategories() as $category)
                                <li>
                                    <a href="/shop" class="sub-nav-link collapsed">
                                        <span>{{$category->name}}</span>
                                        <span class="btn-open-sub"></span>
                                    </a>
                                    <div id="sub-product-one" class="collapse">
                                        <ul class="sub-nav-menu sub-menu-level-2">
                                            @foreach ($category->subcategories as $subategory)
                                                <li>
                                                    <a href="/shop" class="sub-nav-link">
                                                        {{ $subategory?->name }}
                                                    </a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </li>
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