<?php

namespace App\Http\Controllers\Web;

use App\Enums\StatusEnum;
use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\Slider;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class HomeController extends Controller
{
    public function index()
    {
        $sliders = Slider::query()
            ->where('status', '=', StatusEnum::ACTIVE->value)
            ->get(['id', 'title', 'description', 'image']);

        $brands = Brand::query()
            ->where('status', '=', StatusEnum::ACTIVE->value)
            ->get(['id', 'name', 'slug', 'logo']);

        $products = Product::with(['category', 'brand'])->where('status', 'active')->latest()->get();

        $data = [
            'sliders' => $sliders,
            'brands' => $brands,
            'products' => $products,
        ];

        return view('frontend.home', $data);
    }

    public function showShop(Request $request)
    {
        // $products = Product::with(['category', 'brand'])->where('status', 'active')->latest()->get();

        $query = Product::with(['category', 'subcategory', 'brand'])
            ->where('status', 'active');

        // Filter by brand
        if ($request->has('brand')) {
            $query->whereHas('brand', function ($q) use ($request) {
                $q->where('slug', $request->brand);
            });
        }

        // Filter by category
        if ($request->has('category')) {
            $query->whereHas('category', function ($q) use ($request) {
                $q->where('slug', $request->category);
            });
        }

        // Filter by subcategory
        if ($request->has('subcategory')) {
            $query->whereHas('subcategory', function ($q) use ($request) {
                $q->where('slug', $request->subcategory);
            });
        }

        // Filter by size
        if ($request->has('size')) {
            $query->whereHas('sizes', function ($q) use ($request) {
                $q->where('name', $request->size);
            });
        }

        // Filter by color
        if ($request->has('color')) {
            $query->whereHas('colors', function ($q) use ($request) {
                $q->where('name', $request->color);
            });
        }

        $products = $query->latest()->get();

        return view('frontend.shop.index', compact('products'));
    }

    public function showCheckout()
    {
        $carts = session()->get('cart', []);

        return view('frontend.checkout.index', compact('carts'));
    }

    public function storeCustomerOrder(Request $request)
    {
        $request->validate([
            'address' => 'required|string',
            'notes' => 'required|string',
        ]);

        $carts = session('cart', []);

        if (empty($carts)) {
            return back()->with('error', 'Your cart is empty.');
        }

        $totalAmount = collect($carts)->sum(fn($item) => $item['price'] * $item['quantity']);

        $orderData = [
            'user_id' => Auth::id(),
            'order_number' => 'ORD-' . strtoupper(uniqid()),
            'total_amount' => $totalAmount,
            'status' => 'pending',
            'shipping_address' => $request->address,
            'billing_address' => $request->address,
            'notes' => $request->notes,
            'payment_method' => 'COD (Cash on Delivery)',
            'payment_status' => 'Unpaid',
        ];

        DB::beginTransaction();

        try {
            $order = Order::create($orderData);
            $timestamp = now();

            foreach ($carts as $item) {
                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $item['id'],
                    'quantity' => $item['quantity'],
                    'price' => $item['price'],
                    'total' => $item['quantity'] * $item['price'],
                    'created_at' => $timestamp,
                    'updated_at' => $timestamp,
                ]);
            }

            DB::commit();
            session()->forget('cart'); // Optionally clear the cart

            return redirect()->route('customer.dashboard')->with('success', 'Thank you your order has been received');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Order creation failed: ' . $e->getMessage());
            return back()->with('error', 'Something went wrong! Please try again.');
        }
    }

    public function showShopView(Product $product)
    {
        $product->load(['category', 'brand']);

        $latestProducts = Product::with(['category', 'brand'])->where('status', 'active')->latest()->get();

        return view('frontend.shop.view', compact('product', 'latestProducts'));
    }

    public function showContactUs()
    {
        return view('frontend.contact.index');
    }

    public function showAboutUs()
    {
        return view('frontend.about.index');
    }

    public function showTermsConditions()
    {
        return view('frontend.pages.terms-conditions');
    }

    public function showPrivacyPolicy()
    {
        return view('frontend.pages.privacy-policy');
    }
}
