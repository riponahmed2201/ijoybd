<?php

namespace App\Http\Controllers\Backend;

use App\Enums\StatusEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSubcategoryRequest;
use App\Http\Requests\UpdateSubcategoryRequest;
use App\Models\Category;
use App\Models\Subcategory;
use Exception;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

class SubcategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $subcategories = Subcategory::with('category')->latest()->get();

        return view('backend.subcategories.index', compact('subcategories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::where('status', 'active')->latest()->get();
        $statuses = StatusEnum::options();

        return view('backend.subcategories.form', compact('categories', 'statuses'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSubcategoryRequest $request)
    {
        $input = $request->only(['category_id', 'name', 'status']);
        $input['slug'] = strtolower(Str::slug($input['name'])); // Ensure slug is derived from 'name'

        $avatar = $request->file('avatar');

        if ($avatar) {
            // Generate unique name for the avatar
            $avatarName = md5(Str::random(30) . time()) . '.' . $avatar->getClientOriginalExtension();
            // Store the avatar in the specified directory
            $avatarPath = $avatar->storeAs('subcategories', $avatarName, 'public');
            $input['avatar'] = $avatarPath;
        }

        DB::beginTransaction();
        try {
            Subcategory::create($input);

            DB::commit();

            notify()->success("Subcategory added successfully", "Success");

            return to_route('subcategories.index');
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
    public function show(Subcategory $subcategory)
    {
        return $subcategory;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Subcategory $subcategory)
    {
        $categories = Category::where('status', 'active')->latest()->get();
        $statuses = StatusEnum::options();

        return view('backend.subcategories.form', compact('subcategory', 'categories', 'statuses'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSubcategoryRequest $request, Subcategory $subcategory)
    {
        // Get only the necessary inputs
        $input = $request->only(['category_id', 'name', 'status']);
        $input['slug'] = strtolower(Str::slug($input['name'])); // Ensure slug is derived from 'name'

        // Check if a new avatar is being uploaded
        $avatar = $request->file('avatar');

        if ($avatar) {
            // Generate a unique name for the avatar
            $avatarName = md5(Str::random(30) . time()) . '.' . $avatar->getClientOriginalExtension();
            // Store the avatar in the specified directory
            $avatarPath = $avatar->storeAs('subcategories', $avatarName, 'public');
            $input['avatar'] = $avatarPath;

            // Delete the old avatar if it exists
            if ($subcategory->avatar && Storage::disk('public')->exists($subcategory->avatar)) {
                Storage::disk('public')->delete($subcategory->avatar);
            }
        }

        DB::beginTransaction();

        try {
            // Update the subcategory with the new data
            $subcategory->update($input);

            DB::commit();

            notify()->success("Subcategory updated successfully", "Success");

            return to_route('subcategories.index');
        } catch (Exception $exception) {
            dd($exception);
            DB::rollBack();

            // If an avatar was uploaded, delete the newly uploaded file to prevent orphaned files
            if (isset($input['avatar']) && Storage::disk('public')->exists($input['avatar'])) {
                Storage::disk('public')->delete($input['avatar']);
            }

            // Log the error for debugging
            Log::error('Error while updating subcategory', [
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
