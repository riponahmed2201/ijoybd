<?php

namespace App\Http\Controllers\Web;

use App\Enums\StatusEnum;
use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $brands = Brand::query()
            ->where('status', '=', StatusEnum::ACTIVE->value)
            ->get(['id', 'name', 'slug', 'logo']);

        $products = Product::with(['category', 'brand'])->where('status', 'active')->latest()->get();

        $data = [
            'brands' => $brands,
            'products' => $products,
        ];

        return view('frontend.home', $data);
    }

    public function showShop()
    {
        $products = Product::with(['category', 'brand'])->where('status', 'active')->latest()->get();
        return view('frontend.shop.index', compact('products'));
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
}
