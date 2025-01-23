<?php

namespace App\Http\Controllers\Backend;

use App\Enums\StatusEnum;
use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Http\Requests\StoreBrandRequest;
use App\Http\Requests\UpdateBrandRequest;
use Exception;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $brands = Brand::latest()->get();
        return view('backend.brands.index', compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $statuses = StatusEnum::options();
        return view('backend.brands.form', compact('statuses'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBrandRequest $request)
    {
        $input = $request->only(['name', 'description', 'status']);
        $input['slug'] = Str::slug($input['name']);

        $logo = $request->file('logo');

        if ($logo) {
            // Generate unique name for the logo
            $logoName = md5(Str::random(30) . time()) . '.' . $logo->getClientOriginalExtension();
            // Store the logo in the specified directory
            $logoPath = $logo->storeAs('brands', $logoName, 'public');
            $input['logo'] = $logoPath;
        }

        DB::beginTransaction();
        try {
            Brand::create($input);

            DB::commit();

            notify()->success("Brand added successfully", "Success");

            return to_route('brands.index');
        } catch (Exception $exception) {

            DB::rollBack();

            // If an logo was uploaded, delete the file to prevent orphaned files
            if (isset($input['logo']) && Storage::disk('public')->exists($input['logo'])) {
                Storage::disk('public')->delete($input['logo']);
            }

            // Log the error for debugging
            Log::error('Error while storing brand', [
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
    public function show(Brand $brand)
    {
        return $brand;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Brand $brand)
    {
        $statuses = StatusEnum::options();
        return view('backend.brands.form', compact('brand', 'statuses'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBrandRequest $request, Brand $brand)
    {
        // Get only the necessary inputs
        $input = $request->only(['name', 'description', 'status']);
        $input['slug'] = Str::slug($input['name']);

        // Check if a new logo is being uploaded
        $logo = $request->file('logo');

        if ($logo) {
            // Generate a unique name for the logo
            $logoName = md5(Str::random(30) . time()) . '.' . $logo->getClientOriginalExtension();
            // Store the logo in the specified directory
            $logoPath = $logo->storeAs('categories', $logoName, 'public');
            $input['logo'] = $logoPath;

            // Delete the old logo if it exists
            if ($brand->logo && Storage::disk('public')->exists($brand->logo)) {
                Storage::disk('public')->delete($brand->logo);
            }
        }

        DB::beginTransaction();

        try {
            // Update the brand with the new data
            $brand->update($input);

            DB::commit();

            notify()->success("Brand updated successfully", "Success");

            return to_route('brands.index');
        } catch (Exception $exception) {
            dd($exception);
            DB::rollBack();

            // If an logo was uploaded, delete the newly uploaded file to prevent orphaned files
            if (isset($input['logo']) && Storage::disk('public')->exists($input['logo'])) {
                Storage::disk('public')->delete($input['logo']);
            }

            // Log the error for debugging
            Log::error('Error while updating brand', [
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
    public function destroy(Brand $brand)
    {
        //
    }
}
