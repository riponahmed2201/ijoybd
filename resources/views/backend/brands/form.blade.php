@extends('backend.master')

@if (isset($brand))
    @section('title', 'Edit Brand')
@else
    @section('title', 'Add Brand')
@endif

@section('admin-content')
    <!--begin::Toolbar -->
    <x-toolbar :title="isset($brand) && $brand->id ? 'Edit brand' : 'Add brand'" :breadcrumbs="[
        ['label' => 'Home', 'url' => route('admin.dashboard')],
        ['label' => 'brands', 'url' => route('brands.index')],
        ['label' => isset($brand) && $brand->id ? 'Edit brand' : 'Add brand', 'active' => true],
    ]" :actionUrl="route('brands.index')" actionIcon="fas fa-list" actionLabel="Back to List" />
    <!--end::Toolbar -->

    <div class="post d-flex flex-column-fluid" id="kt_post">
        <!--begin::Container-->
        <div id="kt_content_container" class="container-fluid">
            <!-- Form -->
            <form method="POST"
                action="{{ isset($brand) && $brand->id ? route('brands.update', $brand->id) : route('brands.store') }}"
                class="form d-flex flex-column flex-lg-row" enctype="multipart/form-data">
                @csrf
                @if (isset($brand) && $brand->id)
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
                                style="background-image: url({{ isset($brand) && $brand->logo ? Storage::url($brand->logo) : 'assets/backend/media/svg/files/blank-image.svg' }})">
                                <div class="image-input-wrapper w-150px h-150px"></div>

                                <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                    data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Change logo">
                                    <i class="bi bi-pencil-fill fs-7"></i>
                                    <input type="file" name="logo" accept=".png, .jpg, .jpeg" />
                                    <input type="hidden" name="logo_remove" />
                                </label>

                                <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                    data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="Cancel logo">
                                    <i class="bi bi-x fs-2"></i>
                                </span>

                                <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                    data-kt-image-input-action="remove" data-bs-toggle="tooltip" title="Remove logo">
                                    <i class="bi bi-x fs-2"></i>
                                </span>
                            </div>
                            <div class="text-muted fs-7">Set the brand logo. Only *.png, *.jpg, and *.jpeg are
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
                                <label class="required form-label">Brand Name</label>
                                <input type="text" name="name" class="form-control mb-2" placeholder="Enter name"
                                    required value="{{ isset($brand) ? $brand->name : '' }}" />
                                @error('name')
                                    <span class="text-danger mt-2">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3 fv-row">
                                <label class="form-label">Description</label>
                                <textarea class="form-control mb-2" data-kt-autosize="true" name="description" placeholder="Enter description">{{ isset($brand) ? $brand->description : '' }}</textarea>
                                @error('description')
                                    <span class="text-danger mt-2">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="fv-row">
                                <label class="required form-label">Status</label>
                                <select class="form-select" name="status" data-control="select2" data-hide-search="true"
                                    required data-placeholder="Select Status">
                                    <option></option>
                                    @foreach ($statuses as $status)
                                        <option value="{{ $status['value'] }}"
                                            {{ isset($brand) && $brand->status->value == $status['value'] ? 'selected' : '' }}>
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
                        <button type="submit" id="kt_ecommerce_add_brand_submit" class="btn btn-primary">
                            <span class="indicator-label">{{ isset($brand) && $brand->id ? 'Update' : 'Submit' }}</span>
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
