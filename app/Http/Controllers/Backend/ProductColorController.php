<?php

namespace App\Http\Controllers\Backend;

use App\Enums\StatusEnum;
use App\Http\Controllers\Controller;
use App\Models\ProductColor;
use App\Http\Requests\StoreProductColorRequest;
use App\Http\Requests\UpdateProductColorRequest;
use Exception;

class ProductColorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $colors = ProductColor::latest()->get();

        return view('backend.product_color.index', compact('colors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $statuses = StatusEnum::options();

        return view('backend.product_color.form', compact('statuses'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductColorRequest $request)
    {
        $input = $request->only(['name', 'status']);

        try {
            ProductColor::create($input);
            notify()->success("Color added successfully", "Success");
            return to_route('product-colors.index');
        } catch (Exception $exception) {
            notify()->error("Something went wrong! Please try again", "Error");
            return back()->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(ProductColor $productColor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ProductColor $productColor)
    {
        $statuses = StatusEnum::options();

        return view('backend.product_color.form', compact('statuses', 'productColor'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductColorRequest $request, ProductColor $productColor)
    {
        $input = $request->only(['name', 'status']);

        try {
            $productColor->update($input);
            notify()->success("Color updated successfully", "Success");
            return to_route('product-colors.index');
        } catch (Exception $exception) {
            notify()->error("Something went wrong! Please try again", "Error");
            return back()->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProductColor $productColor)
    {
        //
    }
}
