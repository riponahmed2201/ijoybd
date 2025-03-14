@extends('backend.master')

@if (isset($subcategory))
    @section('title', 'Edit Subcategory')
@else
    @section('title', 'Add Subcategory')
@endif

@section('admin-content')
    <!--begin::Toolbar -->
    <x-toolbar :title="isset($subcategory) && $subcategory->id ? 'Edit Subcategory' : 'Add Subcategory'" :breadcrumbs="[
        ['label' => 'Home', 'url' => route('admin.dashboard')],
        ['label' => 'Subcategories', 'url' => route('subcategories.index')],
        ['label' => isset($subcategory) && $subcategory->id ? 'Edit Subcategory' : 'Add Subcategory', 'active' => true],
    ]" :actionUrl="route('subcategories.index')" actionIcon="fas fa-list" actionLabel="Back to List" />
    <!--end::Toolbar -->

    <div class="post d-flex flex-column-fluid" id="kt_post">
        <!--begin::Container-->
        <div id="kt_content_container" class="container-fluid">
            <!-- Form -->
            <form method="POST"
                action="{{ isset($subcategory) && $subcategory->id ? route('subcategories.update', $subcategory->id) : route('subcategories.store') }}"
                class="form d-flex flex-column flex-lg-row" enctype="multipart/form-data">
                @csrf
                @if (isset($subcategory) && $subcategory->id)
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
                                style="background-image: url({{ isset($subcategory) && $subcategory->avatar ? Storage::url($subcategory->avatar) : 'assets/backend/media/svg/files/blank-image.svg' }})">
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
                                <label class="required form-label">Category</label>
                                <select class="form-select form-select-solid" name="category_id" required data-control="select2"
                                    data-hide-search="true" data-placeholder="Select Category Name">
                                    <option></option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}"
                                            {{ isset($subcategory) && $subcategory?->category_id == $category->id ? 'selected' : '' }}>
                                            {{ $category->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                    <span class="text-danger mt-2">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3 fv-row">
                                <label class="required form-label">Subcategory Name</label>
                                <input type="text" name="name" class="form-control form-control-solid mb-2"
                                    placeholder="Enter subcategory name" required
                                    value="{{ isset($subcategory) ? $subcategory->name : '' }}" />
                                @error('name')
                                    <span class="text-danger mt-2">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3 fv-row">
                                <label class="form-label">Description</label>
                                <textarea class="form-control form-control-solid mb-2" data-kt-autosize="true" name="description" placeholder="Enter description">{{ isset($subcategory) ? $subcategory->description : '' }}</textarea>
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
                                            {{ isset($subcategory) && $subcategory->status->value == $status['value'] ? 'selected' : '' }}>
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

                    <div class="d-flex justify-content-start">
                        <button type="submit" class="btn btn-primary">
                            <span
                                class="indicator-label">{{ isset($subcategory) && $subcategory->id ? 'Update' : 'Submit' }}</span>
                        </button>
                    </div>
                </div>
                <!-- End: Main column -->
            </form>
        </div>
    </div>
@endsection
