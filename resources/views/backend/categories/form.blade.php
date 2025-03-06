@extends('backend.master')

@if (isset($category))
    @section('title', 'Edit Category')
@else
    @section('title', 'Add Category')
@endif

@section('admin-content')
    <!--begin::Toolbar -->
    <x-toolbar :title="isset($category) && $category->id ? 'Edit Category' : 'Add Category'" :breadcrumbs="[
        ['label' => 'Home', 'url' => route('admin.dashboard')],
        ['label' => 'Categories', 'url' => route('categories.index')],
        ['label' => isset($category) && $category->id ? 'Edit Category' : 'Add Category', 'active' => true],
    ]" :actionUrl="route('categories.index')" actionIcon="fas fa-list" actionLabel="Back to List" />
    <!--end::Toolbar -->

    <div class="post d-flex flex-column-fluid" id="kt_post">
        <!--begin::Container-->
        <div id="kt_content_container" class="container-fluid">
            <!-- Form -->
            <form method="POST"
                action="{{ isset($category) && $category->id ? route('categories.update', $category->id) : route('categories.store') }}"
                class="form d-flex flex-column flex-lg-row" enctype="multipart/form-data">
                @csrf
                @if (isset($category) && $category->id)
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
                                style="background-image: url({{ isset($category) && $category->avatar ? Storage::url($category->avatar) : 'assets/backend/media/svg/files/blank-image.svg' }})">
                                <div class="image-input-wrapper w-150px h-150px"></div>

                                <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                    data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Change avatar">
                                    <i class="bi bi-pencil-fill fs-7"></i>
                                    <input type="file" name="avatar" accept=".png, .jpg, .jpeg" />
                                    <input type="hidden" name="avatar_remove" />
                                </label>

                                <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                    data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="Cancel avatar">
                                    <i class="bi bi-x fs-2"></i>
                                </span>

                                <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                    data-kt-image-input-action="remove" data-bs-toggle="tooltip" title="Remove avatar">
                                    <i class="bi bi-x fs-2"></i>
                                </span>
                            </div>
                            <div class="text-muted fs-7">Set the category thumbnail image. Only *.png, *.jpg, and *.jpeg are
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
                                <label class="required form-label">Category Type</label>
                                <select class="form-select" name="category_type" required data-control="select2"
                                    data-hide-search="true" data-placeholder="Select Category Type">
                                    <option></option>
                                    @foreach ($categoryTypes as $option)
                                        <option value="{{ $option['value'] }}"
                                            {{ isset($category) && $category?->category_type?->value == $option['value'] ? 'selected' : '' }}>
                                            {{ $option['label'] }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('category_type')
                                    <span class="text-danger mt-2">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3 fv-row">
                                <label class="required form-label">Category Name</label>
                                <input type="text" name="name" class="form-control mb-2" placeholder="Enter name"
                                    required value="{{ isset($category) ? $category->name : '' }}" />
                                @error('name')
                                    <span class="text-danger mt-2">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3 fv-row">
                                <label class="form-label">Description</label>
                                <textarea class="form-control mb-2" data-kt-autosize="true" name="description" placeholder="Enter description">{{ isset($category) ? $category->description : '' }}</textarea>
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
                                            {{ isset($category) && $category->status->value == $status['value'] ? 'selected' : '' }}>
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
                        <button type="submit" id="kt_ecommerce_add_category_submit" class="btn btn-primary">
                            <span
                                class="indicator-label">{{ isset($category) && $category->id ? 'Update' : 'Submit' }}</span>
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
