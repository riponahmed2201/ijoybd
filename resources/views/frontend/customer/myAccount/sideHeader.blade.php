<div class="wrap-sidebar-account">
    <ul class="my-account-nav">
        <li>
            <a href="/my-account-dashboard"
                class="my-account-nav-item {{ Request::is('my-account-dashboard') ? 'active' : '' }}">Dashboard</a>
        </li>
        <li>
            <a href="/my-account-orders"
                class="my-account-nav-item {{ Request::is('my-account-orders') ? 'active' : '' }}">Orders</a>
        </li>
        {{-- <li>
            <a href="/my-account-address"
                class="my-account-nav-item {{ Request::is('my-account-address') ? 'active' : '' }}">Address</a>
        </li> --}}
        <li>
            <a href="/my-account-edit"
                class="my-account-nav-item {{ Request::is('my-account-edit') ? 'active' : '' }}">Account Details</a>
        </li>
        {{-- <li>
            <a href="/my-account-wishlist"
                class="my-account-nav-item {{ Request::is('my-account-wishlist') ? 'active' : '' }}">Wishlist</a>
        </li> --}}
        <li>
            <a href="{{ route('customer.logout') }}" class="my-account-nav-item">Logout</a>
        </li>
    </ul>
</div>
