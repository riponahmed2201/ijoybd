<?php

namespace App\Http\Controllers\Web;

use App\Enums\StatusEnum;
use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Product;
use App\Models\Slider;
use Illuminate\Http\Request;

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
