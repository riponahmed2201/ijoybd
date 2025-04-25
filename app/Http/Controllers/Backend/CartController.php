<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function getCartCount()
    {
        $cart = session()->get('cart', []);
        return response()->json([
            'cartCount' => count($cart)
        ]);
    }

    public function addToCart(Request $request)
    {
        $product = Product::with(['brand'])->find($request->product_id);

        if (!$product) {
            return response()->json(['success' => false, 'message' => 'Product not found']);
        }

        $cart = session()->get('cart', []);
        if (isset($cart[$product->id])) {
            $cart[$product->id]['quantity'] += 1;
        } else {
            $cart[$product->id] = [
                'id' => $product->id,
                'name' => $product->name,
                'price' => $product->price,
                'brand' => $product?->brand?->name,
                'images' => $product->images,
                'thumbnail' => $product->thumbnail,
                'sizes' => $product?->size_details,
                'colors' => $product?->color_details,
                'quantity' => 1,
            ];
        }

        session()->put('cart', $cart);
        return response()->json([
            'success' => true,
            'message' => 'Product added to cart successfully!',
            'cartCount' => count($cart)
        ]);
    }

    public function getCartDetails()
    {
        $cart = session()->get('cart', []);
        return response()->json([
            'success' => true,
            'cart' => $cart
        ]);
    }

    public function showCartPage()
    {
        $carts = session()->get('cart', []);

        return view('frontend.cart.index', compact('carts'));
    }

    public function removeFromCart(Request $request)
    {
        $cart = session()->get('cart', []);
        if (isset($cart[$request->product_id])) {
            unset($cart[$request->product_id]);
            session()->put('cart', $cart);
        }
        return response()->json([
            'success' => true,
            'message' => 'Product removed from cart!',
            'cartCount' => count($cart)
        ]);
    }

    public function updateCart(Request $request)
    {
        $cart = session()->get('cart', []);
        if (isset($cart[$request->product_id])) {
            $cart[$request->product_id]['quantity'] = $request->quantity;
            session()->put('cart', $cart);
        }

        $totalPrice = 0;
        foreach ($cart as $item) {
            $totalPrice += $item['price'] * $item['quantity'];
        }

        return response()->json([
            'success' => true,
            'cartCount' => count($cart),
            'totalPrice' => $totalPrice
        ]);
    }
}
