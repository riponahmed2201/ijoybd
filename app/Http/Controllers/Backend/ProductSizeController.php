<?php

namespace App\Http\Controllers\Backend;

use App\Enums\StatusEnum;
use App\Http\Controllers\Controller;
use App\Models\ProductSize;
use App\Http\Requests\StoreProductSizeRequest;
use App\Http\Requests\UpdateProductSizeRequest;
use Exception;

class ProductSizeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sizes = ProductSize::latest()->get();

        return view('backend.product_size.index', compact('sizes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $statuses = StatusEnum::options();

        return view('backend.product_size.form', compact('statuses'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductSizeRequest $request)
    {
        $input = $request->only(['name', 'status']);

        try {
            ProductSize::create($input);
            notify()->success("Size added successfully", "Success");
            return to_route('product-sizes.index');
        } catch (Exception $exception) {
            notify()->error("Something went wrong! Please try again", "Error");
            return back()->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(ProductSize $productSize)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ProductSize $productSize)
    {
        $statuses = StatusEnum::options();

        return view('backend.product_size.form', compact('statuses', 'productSize'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductSizeRequest $request, ProductSize $productSize)
    {
        $input = $request->only(['name', 'status']);

        try {
            $productSize->update($input);
            notify()->success("Size updated successfully", "Success");
            return to_route('product-sizes.index');
        } catch (Exception $exception) {
            notify()->error("Something went wrong! Please try again", "Error");
            return back()->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProductSize $productSize)
    {
        //
    }
}
