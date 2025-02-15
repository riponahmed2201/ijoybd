@extends('backend.master')

@if (isset($productColor))
    @section('title', 'Edit Product Color')
@else
    @section('title', 'Add Product Color')
@endif

@section('admin-content')
    <!--begin::Toolbar -->
    <x-toolbar :title="isset($productColor) && $productColor->id ? 'Edit color' : 'Add color'" :breadcrumbs="[
        ['label' => 'Home', 'url' => route('admin.dashboard')],
        ['label' => 'Product Color', 'url' => route('product-colors.index')],
        ['label' => isset($productColor) && $productColor->id ? 'Edit color' : 'Add color', 'active' => true],
    ]" :actionUrl="route('product-colors.index')" actionIcon="fas fa-list" actionLabel="Back to List" />
    <!--end::Toolbar -->

    <div class="post d-flex flex-column-fluid" id="kt_post">
        <!--begin::Container-->
        <div id="kt_content_container" class="container-fluid">
            <!-- Form -->
            <form method="POST"
                action="{{ isset($productColor) && $productColor->id ? route('product-colors.update', $productColor->id) : route('product-colors.store') }}"
                class="form d-flex flex-column flex-lg-row">
                @csrf
                @if (isset($productColor) && $productColor->id)
                    @method('PUT')
                    <input type="hidden" name="id" value="{{ $productColor->id }}">
                @endif

                <div class="col-md-12">
                    <div class="card py-4">

                        @include('message')
                        @include('multiple_message')

                        <div class="card-body pt-0">

                            <div class="mb-3 fv-row">
                                <label class="required form-label">Name</label>
                                <input type="text" name="name" class="form-control mb-2" placeholder="Enter name"
                                    required value="{{ isset($productColor) ? $productColor->name : '' }}" />
                                @error('name')
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
                                            {{ isset($productColor) && $productColor->status->value == $status['value'] ? 'selected' : '' }}>
                                            {{ $status['label'] }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('status')
                                    <span class="text-danger mt-2">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="card-footer">
                            <div class="d-flex">
                                <button type="submit" class="btn btn-primary">
                                    <span
                                        class="indicator-label">{{ isset($productColor) && $productColor->id ? 'Update' : 'Submit' }}</span>
                                </button>
                            </div>
                        </div>
                    </div>

                </div>
            </form>
        </div>
    </div>
@endsection
