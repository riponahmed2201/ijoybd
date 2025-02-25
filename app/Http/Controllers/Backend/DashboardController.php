<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $categoryCount = Category::count();
        $brandCount = Brand::count();
        $productCount = Product::count();
        $customerCount = User::where('role', 'customer')->count();

        $data = [
            'categoryCount' => $categoryCount,
            'brandCount' => $brandCount,
            'productCount' => $productCount,
            'customerCount' => $customerCount,
        ];

        return view('backend.dashboard', $data);
    }
}
