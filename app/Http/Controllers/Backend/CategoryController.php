<?php

namespace App\Http\Controllers\Backend;

use App\Enums\StatusEnum;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use Exception;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::latest()->get();

        return view('backend.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $statuses = StatusEnum::options();

        return view('backend.categories.form', compact('statuses'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request)
    {
        $input = $request->only(['name', 'description', 'status']);
        $input['slug'] = strtolower(Str::slug($input['name'])); // Ensure slug is derived from 'name'

        try {
            Category::create($input);

            notify()->success("Category added successfully", "Success");

            return to_route('categories.index');
        } catch (Exception $exception) {
            notify()->error("Something went wrong! Please try again", "Error");

            return back()->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        return $category;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        $statuses = StatusEnum::options();

        return view('backend.categories.form', compact('category', 'statuses'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        // Get only the necessary inputs
        $input = $request->only(['name', 'description', 'status']);
        $input['slug'] = strtolower(Str::slug($input['name'])); // Ensure slug is derived from 'name'

        try {
            // Update the category with the new data
            $category->update($input);

            notify()->success("Category updated successfully", "Success");

            return to_route('categories.index');
        } catch (Exception $exception) {
            notify()->error("Something went wrong! Please try again", "Error");
            return back()->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        //
    }
}
