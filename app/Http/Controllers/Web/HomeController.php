<?php

namespace App\Http\Controllers\Web;

use App\Enums\StatusEnum;
use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $categories = Category::query()
            ->where('status', '=', StatusEnum::ACTIVE->value)
            ->get(['id', 'name', 'slug', 'category_type', 'avatar']);

        $brands = Brand::query()
            ->where('status', '=', StatusEnum::ACTIVE->value)
            ->get(['id', 'name', 'slug', 'logo']);

        $data = [
            'categories' => $categories,
            'brands' => $brands,
        ];

        return view('frontend.home', $data);
    }

    public function showShop()
    {
        return view('frontend.shop.index');
    }

    public function showShopView()
    {
        return view('frontend.shop.view');
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
