<?php

namespace App\Http\Controllers\Backend;

use App\Enums\CategoryType;
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
        $categoryTypes = CategoryType::options();
        $statuses = StatusEnum::options();

        return view('backend.categories.form', compact('categoryTypes', 'statuses'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request)
    {
        $input = $request->only(['category_type', 'name', 'description', 'status']);
        $input['slug'] = strtolower($input['category_type']) . '-' . Str::slug($input['name']); // Ensure slug is derived from 'name'

        $avatar = $request->file('avatar');

        if ($avatar) {
            // Generate unique name for the avatar
            $avatarName = md5(Str::random(30) . time()) . '.' . $avatar->getClientOriginalExtension();
            // Store the avatar in the specified directory
            $avatarPath = $avatar->storeAs('categories', $avatarName, 'public');
            $input['avatar'] = $avatarPath;
        }

        DB::beginTransaction();
        try {
            Category::create($input);

            DB::commit();

            notify()->success("Category added successfully", "Success");

            return to_route('categories.index');
        } catch (Exception $exception) {

            DB::rollBack();

            // If an avatar was uploaded, delete the file to prevent orphaned files
            if (isset($input['avatar']) && Storage::disk('public')->exists($input['avatar'])) {
                Storage::disk('public')->delete($input['avatar']);
            }

            // Log the error for debugging
            Log::error('Error while storing category', [
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
    public function show(Category $category)
    {
        return $category;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        $categoryTypes = CategoryType::options();
        $statuses = StatusEnum::options();

        return view('backend.categories.form', compact('category', 'categoryTypes', 'statuses'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        // Get only the necessary inputs
        $input = $request->only(['category_type', 'name', 'description', 'status']);
        $input['slug'] = strtolower($input['category_type']) . '-' . Str::slug($input['name']); // Ensure slug is derived from 'name'

        // Check if a new avatar is being uploaded
        $avatar = $request->file('avatar');

        if ($avatar) {
            // Generate a unique name for the avatar
            $avatarName = md5(Str::random(30) . time()) . '.' . $avatar->getClientOriginalExtension();
            // Store the avatar in the specified directory
            $avatarPath = $avatar->storeAs('categories', $avatarName, 'public');
            $input['avatar'] = $avatarPath;

            // Delete the old avatar if it exists
            if ($category->avatar && Storage::disk('public')->exists($category->avatar)) {
                Storage::disk('public')->delete($category->avatar);
            }
        }

        DB::beginTransaction();

        try {
            // Update the category with the new data
            $category->update($input);

            DB::commit();

            notify()->success("Category updated successfully", "Success");

            return to_route('categories.index');
        } catch (Exception $exception) {
            dd($exception);
            DB::rollBack();

            // If an avatar was uploaded, delete the newly uploaded file to prevent orphaned files
            if (isset($input['avatar']) && Storage::disk('public')->exists($input['avatar'])) {
                Storage::disk('public')->delete($input['avatar']);
            }

            // Log the error for debugging
            Log::error('Error while updating category', [
                'error' => $exception->getMessage(),
                'trace' => $exception->getTraceAsString(),
            ]);

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
