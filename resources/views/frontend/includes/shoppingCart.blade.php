<!-- Shopping Cart Modal -->
<div class="modal fullRight fade modal-shopping-cart" id="shoppingCart">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="header">
                <div class="title fw-5">Shopping Cart</div>
                <span class="icon-close icon-close-popup" data-bs-dismiss="modal"></span>
            </div>
            <div class="wrap">
                <div class="tf-mini-cart-wrap">
                    <div class="tf-mini-cart-main">
                        <div class="tf-mini-cart-sroll">
                            <div class="tf-mini-cart-items" id="cart-items">
                                <!-- Cart items will be appended here dynamically -->
                            </div>
                        </div>
                    </div>
                    <div class="tf-mini-cart-bottom">
                        <div class="tf-mini-cart-bottom-wrap">
                            <div class="tf-cart-totals-discounts">
                                <div class="tf-cart-total">Subtotal</div>
                                <div class="tf-totals-total-value fw-6" id="cart-total"></div>
                            </div>
                            <div class="tf-mini-cart-view-checkout">
                                <a href="{{ route('cart.view') }}" class="tf-btn btn-outline radius-3 link w-100 justify-content-center">View Cart</a>
                                <a href="{{ route('cart.view') }}" class="tf-btn btn-fill animate-hover-btn radius-3 w-100 justify-content-center"><span>Check Out</span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
