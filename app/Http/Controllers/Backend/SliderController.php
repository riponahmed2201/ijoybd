<?php

namespace App\Http\Controllers\Backend;

use App\Enums\StatusEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSliderRequest;
use App\Http\Requests\UpdateSliderRequest;
use App\Models\Slider;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sliders = Slider::latest()->get();
        return view('backend.sliders.index', compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $statuses = StatusEnum::options();
        return view('backend.sliders.form', compact('statuses'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSliderRequest $request)
    {
        $input = $request->only(['title', 'description', 'status']);

        $image = $request->file('image');

        if ($image) {
            // Generate unique name for the image
            $imageName = md5(Str::random(30) . time()) . '.' . $image->getClientOriginalExtension();
            // Store the image in the specified directory
            $imagePath = $image->storeAs('sliders', $imageName, 'public');
            $input['image'] = $imagePath;
        }

        DB::beginTransaction();
        try {
            Slider::create($input);

            DB::commit();

            notify()->success("Slider added successfully", "Success");

            return to_route('sliders.index');
        } catch (Exception $exception) {

            DB::rollBack();

            // If an image was uploaded, delete the file to prevent orphaned files
            if (isset($input['image']) && Storage::disk('public')->exists($input['image'])) {
                Storage::disk('public')->delete($input['image']);
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
    public function show(Slider $brand)
    {
        return $brand;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Slider $slider)
    {
        $statuses = StatusEnum::options();
        return view('backend.sliders.form', compact('slider', 'statuses'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSliderRequest $request, Slider $slider)
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
            $logoPath = $logo->storeAs('sliders', $logoName, 'public');
            $input['logo'] = $logoPath;

            // Delete the old logo if it exists
            if ($slider->logo && Storage::disk('public')->exists($slider->logo)) {
                Storage::disk('public')->delete($slider->logo);
            }
        }

        DB::beginTransaction();

        try {
            // Update the slider with the new data
            $slider->update($input);

            DB::commit();

            notify()->success("Slider updated successfully", "Success");

            return to_route('sliders.index');
        } catch (Exception $exception) {
            dd($exception);
            DB::rollBack();

            // If an image was uploaded, delete the newly uploaded file to prevent orphaned files
            if (isset($input['image']) && Storage::disk('public')->exists($input['image'])) {
                Storage::disk('public')->delete($input['image']);
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
    public function destroy(Slider $slider)
    {
        //
    }
}
