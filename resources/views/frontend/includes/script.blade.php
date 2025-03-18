<script type="text/javascript" src="{{ asset('assets/frontend/js/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/frontend/js/jquery.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/frontend/js/swiper-bundle.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/frontend/js/carousel.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/frontend/js/bootstrap-select.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/frontend/js/lazysize.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/frontend/js/bootstrap-select.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/frontend/js/count-down.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/frontend/js/wow.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/frontend/js/multiple-modal.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/frontend/js/main.js') }}"></script>

<!-- IziToast Js-->
<script src="{{ asset('js/iziToast.js') }}"></script>

<script>
    $(document).ready(function() {
        // Fetch cart count on page load
        $.ajax({
            url: '{{ route('cart.count') }}',
            method: 'GET',
            success: function(response) {
                $('#cart-count').text(response.cartCount);
            },
            error: function() {
                console.log("Something went wrong while fetching the cart count.");
            }
        });

        // Add to cart function
        $('.quick-add').on('click', function() {
            let productId = $(this).data('id');

            $.ajax({
                url: '{{ route('cart.add') }}',
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    product_id: productId
                },
                success: function(response) {
                    if (response.success) {
                        alert(response.message);
                        // toastr.success(response.message);
                        $('#cart-count').text(response.cartCount);
                    } else {
                        // toastr.error(response.message);
                        alert(response.message);
                    }
                },
                error: function() {
                    alert("Something went wrong!");
                }
            });
        });

        // Remove product from cart (only once)
        $(document).on('click', '.tf-mini-cart-remove', function() {
            let productId = $(this).data('product-id');

            $.ajax({
                url: '{{ route('cart.remove') }}',
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    product_id: productId
                },
                success: function(response) {
                    if (response.success) {
                        // toastr.success(response.message);
                        alert(response.message);
                        location.reload(); // Reload to update the cart and count
                    } else {
                        // toastr.error(response.message);
                        alert(response.message);
                    }
                },
                error: function() {
                    // toastr.error("Something went wrong!");
                    alert("Something went wrong");
                }
            });
        });

        // Update product quantity in cart
        $(document).on('change', '.quantity-input', function() {
            let productId = $(this).data('product-id');
            let quantity = $(this).val();

            $.ajax({
                url: '{{ route('cart.update') }}',
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    product_id: productId,
                    quantity: quantity
                },
                success: function(response) {
                    if (response.success) {
                        alert(response.message);
                        // toastr.success(response.message);
                        $('#cart-count').text(response.cartCount); // Update cart count
                        $('#cart-total').text(response.totalPrice +
                            ' TK'); // Update total price
                    } else {
                        // toastr.error(response.message);
                        alert(response.message);
                    }
                },
                error: function() {
                    // toastr.error("Something went wrong!");
                    alert("Something went wrong!");
                }
            });
        });

        // Show the shopping cart modal with updated items
        $('#shoppingCart').on('show.bs.modal', function() {
            $.ajax({
                url: '/cart',
                method: 'GET',
                success: function(response) {

                    console.log({response});

                    if (response.success) {
                        var cartItems = response.cart;
                        var cartHtml = '';
                        var totalPrice = 0;

                        $('#cart-items').empty();

                        $.each(cartItems, function(key, item) {
                            cartHtml += '<div class="tf-mini-cart-item">';
                            cartHtml +=
                                '<div class="tf-mini-cart-image"><a href="/product/' +
                                key + '"><img src="/storage/' + item.thumbnail +
                                '" alt=""></a></div>';
                            cartHtml += '<div class="tf-mini-cart-info">';
                            cartHtml += '<a class="title link" href="/product/' +
                                key + '">' + item.name + '</a>';
                            cartHtml += '<div class="price fw-6">' + item.price +
                                ' TK</div>';
                            cartHtml += '<div class="wg-quantity small">';
                            cartHtml +=
                                '<span class="btn-quantity minus-btn" data-product-id="' +
                                key + '">-</span>';
                            cartHtml +=
                                '<input type="text" name="quantity" value="' + item
                                .quantity +
                                '" class="quantity-input" data-product-id="' + key +
                                '">';
                            cartHtml +=
                                '<span class="btn-quantity plus-btn" data-product-id="' +
                                key + '">+</span>';
                            cartHtml += '</div>';
                            cartHtml +=
                                '<div class="tf-mini-cart-remove" data-product-id="' +
                                key + '">Remove</div>';
                            cartHtml += '</div></div>';

                            totalPrice += item.price * item.quantity;
                        });

                        $('#cart-items').html(cartHtml);
                        $('#cart-total').text(totalPrice + ' TK');
                        $('#cart-count').text(response.cartCount);
                    } else {
                        // toastr.error(response.message);
                        alert(response.message);
                    }
                },
                error: function() {
                    // toastr.error("Something went wrong!");
                    alert("Something went wrong!");
                }
            });
        });

        // Handle quantity change (increment/decrement)
        $(document).on('click', '.plus-btn, .minus-btn', function() {
            var productId = $(this).data('product-id');
            var quantityInput = $(this).siblings('.quantity-input');
            var quantity = parseInt(quantityInput.val());

            if ($(this).hasClass('plus-btn')) {
                quantity += 1;
            } else if ($(this).hasClass('minus-btn') && quantity > 1) {
                quantity -= 1;
            }

            quantityInput.val(quantity);

            $.ajax({
                url: '/cart/update',
                method: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    product_id: productId,
                    quantity: quantity
                },
                success: function(response) {
                    if (response.success) {
                        $('#cart-count').text(response.cartCount);
                        $('#cart-total').text(response.totalPrice + ' TK');
                    } else {
                        // toastr.error(response.message);
                        alert(response.message);
                    }
                },
                error: function() {
                    // toastr.error("Something went wrong!");
                    alert("Something went wrong!");
                }
            });
        });
    });
</script>

@yield('page_js')
