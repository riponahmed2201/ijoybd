@extends('backend.master')

@if (isset($sliders))
    @section('title', 'Edit Slider')
@else
    @section('title', 'Add Slider')
@endif

@section('admin-content')
    <!--begin::Toolbar -->
    <x-toolbar :title="isset($sliders) && $sliders->id ? 'Edit slider' : 'Add slider'" :breadcrumbs="[
        ['label' => 'Home', 'url' => route('admin.dashboard')],
        ['label' => 'sliders', 'url' => route('sliders.index')],
        ['label' => isset($slider) && $slider->id ? 'Edit slider' : 'Add slider', 'active' => true],
    ]" :actionUrl="route('sliders.index')" actionIcon="fas fa-list" actionLabel="Back to List" />
    <!--end::Toolbar -->

    <div class="post d-flex flex-column-fluid" id="kt_post">
        <!--begin::Container-->
        <div id="kt_content_container" class="container-fluid">
            <!-- Form -->
            <form method="POST"
                action="{{ isset($slider) && $slider->id ? route('sliders.update', $slider->id) : route('sliders.store') }}"
                class="form d-flex flex-column flex-lg-row" enctype="multipart/form-data">
                @csrf
                @if (isset($slider) && $slider->id)
                    @method('PUT')
                @endif

                <!-- Begin: Aside column -->
                <div class="d-flex flex-column gap-7 gap-lg-10 w-100 w-lg-300px mb-7 me-lg-10">
                    <div class="card card-flush py-4">
                        <div class="card-header">
                            <div class="card-title">
                                <h2>Thumbnail</h2>
                            </div>
                        </div>
                        <div class="card-body text-center pt-0">
                            <div class="image-input image-input-empty image-input-outline mb-12" data-kt-image-input="true"
                                style="background-image: url({{ isset($slider) && $slider->image ? Storage::url($slider->image) : 'assets/backend/media/svg/files/blank-image.svg' }})">
                                <div class="image-input-wrapper w-150px h-150px"></div>

                                <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                    data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Change image">
                                    <i class="bi bi-pencil-fill fs-7"></i>
                                    <input type="file" name="image" accept=".png, .jpg, .jpeg" />
                                    <input type="hidden" name="image_remove" />
                                </label>

                                <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                    data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="Cancel image">
                                    <i class="bi bi-x fs-2"></i>
                                </span>

                                <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                    data-kt-image-input-action="remove" data-bs-toggle="tooltip" title="Remove image">
                                    <i class="bi bi-x fs-2"></i>
                                </span>
                            </div>
                            <div class="text-muted fs-7">Set the slider image. Only *.png, *.jpg, and *.jpeg are
                                accepted.</div>
                        </div>
                    </div>
                </div>
                <!-- End: Aside column -->

                <!-- Begin: Main column -->
                <div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10">
                    <div class="card card-flush py-4">
                        <div class="card-header">
                            <div class="card-title">
                                <h2>General</h2>
                            </div>
                        </div>

                        @include('message')
                        @include('multiple_message')

                        <div class="card-body pt-0">

                            <div class="mb-3 fv-row">
                                <label class="required form-label">Title</label>
                                <input type="text" name="title" class="form-control form-control-solid mb-2" placeholder="Enter title"
                                    required value="{{ isset($slider) ? $slider->title : '' }}" />
                                @error('title')
                                    <span class="text-danger mt-2">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3 fv-row">
                                <label class="form-label">Description</label>
                                <textarea class="form-control form-control-solid mb-2" data-kt-autosize="true" name="description" placeholder="Enter description">{{ isset($slider) ? $slider->description : '' }}</textarea>
                                @error('description')
                                    <span class="text-danger mt-2">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="fv-row">
                                <label class="required form-label">Status</label>
                                <select class="form-select form-select-solid" name="status" data-control="select2" data-hide-search="true"
                                    required data-placeholder="Select Status">
                                    <option></option>
                                    @foreach ($statuses as $status)
                                        <option value="{{ $status['value'] }}"
                                            {{ isset($slider) && $slider->status->value == $status['value'] ? 'selected' : '' }}>
                                            {{ $status['label'] }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('status')
                                    <span class="text-danger mt-2">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="d-flex justify-content-end">
                        <button type="submit" id="kt_ecommerce_add_slider_submit" class="btn btn-primary">
                            <span class="indicator-label">{{ isset($slider) && $slider->id ? 'Update' : 'Submit' }}</span>
                            <span class="indicator-progress">Please wait...
                                <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                            </span>
                        </button>
                    </div>
                </div>
                <!-- End: Main column -->
            </form>
        </div>
    </div>
@endsection
