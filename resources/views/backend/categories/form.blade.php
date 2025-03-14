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

                    <div class="card card-flush py-8">
                        @include('message')
                        @include('multiple_message')

                        <div class="card-body pt-0">
                           <div class="col-md-12">
                            <div class="row">
                                <div class="mb-3 fv-row">
                                    <label class="required form-label">Category Name</label>
                                    <input type="text" name="name" class="form-control form-control-solid mb-2"
                                        placeholder="Enter name" required
                                        value="{{ isset($category) ? $category->name : '' }}" />
                                    @error('name')
                                        <span class="text-danger mt-2">{{ $message }}</span>
                                    @enderror
                                </div>
    
                                <div class="mb-3 fv-row">
                                    <label class="required form-label">Status</label>
                                    <select class="form-select form-select-solid" name="status" data-control="select2"
                                        data-hide-search="true" required data-placeholder="Select Status">
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
    
                                <div class="fv-row">
                                    <label class="form-label">Description</label>
                                    <textarea class="form-control form-control-solid mb-2" data-kt-autosize="true" name="description"
                                        placeholder="Enter description">{{ isset($category) ? $category->description : '' }}</textarea>
                                    @error('description')
                                        <span class="text-danger mt-2">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                           </div>
                        </div>

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">
                                {{ isset($category) && $category->id ? 'Update' : 'Submit' }}
                            </button>
                        </div>
                    </div>
            </form>
        </div>
    </div>
@endsection
