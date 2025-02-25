<?php

namespace App\Http\Controllers\Backend;

use App\Enums\ProductSizeEnum;
use App\Enums\StatusEnum;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Brand;
use App\Models\Category;
use App\Models\ProductColor;
use App\Models\ProductSize;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $products = Product::with(['category', 'brand'])->latest()->get();

        return view('backend.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::where('status', 'active')->latest()->get(['id', 'name']);
        $brands = Brand::where('status', 'active')->latest()->get(['id', 'name']);
        $sizes = ProductSize::where('status', 'active')->latest()->get(['id', 'name']);
        $colors = ProductColor::where('status', 'active')->latest()->get(['id', 'name']);

        $statuses = StatusEnum::options();

        $data = [
            'statuses' => $statuses,
            'sizes' => $sizes,
            'colors' => $colors,
            'categories' => $categories,
            'brands' => $brands
        ];

        return view('backend.products.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
        $input = $request->only(['name', 'description', 'price', 'discount', 'stock_quantity', 'category', 'brand',  'size', 'color', 'status']);

        $input['slug'] = strtolower(Str::slug($input['name']));
        $input['category_id'] = $input['category'];
        $input['brand_id'] = $input['brand'];
        $input['sizes'] = $input['size'];
        $input['colors'] = $input['color'];

        // Handle single thumbnail upload
        if ($request->hasFile('thumbnail')) {
            $thumbnail = $request->file('thumbnail');
            $thumbnailName = md5(Str::random(30) . time()) . '.' . $thumbnail->getClientOriginalExtension();
            $thumbnailPath = $thumbnail->storeAs('products', $thumbnailName, 'public');
            $input['thumbnail'] = $thumbnailPath;
        }

        // Handle multiple image uploads
        $imagePaths = [];

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                if ($image->isValid()) {
                    $imageName = md5(Str::random(5) . time()) . '.' . $image->getClientOriginalExtension();
                    $imagePath = $image->storeAs('products', $imageName, 'public');
                    $imagePaths[] = $imagePath;
                }
            }
        }

        // Store multiple image paths as JSON
        $input['images'] = json_encode($imagePaths);

        DB::beginTransaction();
        try {
            Product::create($input);

            DB::commit();

            notify()->success("Product added successfully", "Success");

            return to_route('products.index');
        } catch (Exception $exception) {
            DB::rollBack();

            // If an thumbnail was uploaded, delete the file to prevent orphaned files
            if (isset($input['thumbnail']) && Storage::disk('public')->exists($input['thumbnail'])) {
                Storage::disk('public')->delete($input['thumbnail']);
            }

            // Log the error for debugging
            Log::error('Error while storing product', [
                'error' => $exception->getMessage(),
                'trace' => $exception->getTraceAsString(),
            ]);

            notify()->error("Something went wrong! Please try again", "Error");

            return back()->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }
}
