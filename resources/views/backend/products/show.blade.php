@extends('backend.master')

@section('title', 'Show Product')

@section('admin-content')
    <!--begin::Toolbar -->
    <x-toolbar :title="'Show product'" :breadcrumbs="[
        ['label' => 'Home', 'url' => route('admin.dashboard')],
        ['label' => 'Products', 'url' => route('products.index')],
        ['label' => 'Show product', 'active' => true],
    ]" :actionUrl="route('products.index')" actionIcon="bi bi-cart fs-3"
        actionLabel="Product List" />
    <!--end::Toolbar -->

    <div class="post d-flex flex-column-fluid" id="kt_post">
        <div id="kt_content_container" class="container-fluid">
            <form method="POST" action="{{ route('products.store') }}" class="form d-flex flex-column flex-lg-row"
                enctype="multipart/form-data">
                @csrf

                <div class="col-md-12">
                    <div class="card py-4">
                        <div class="card-body">

                            <div class="row">

                                <div class="col-md-6 mb-3 fv-row">
                                    <label class="form-label">Category Type</label>
                                    <input type="text" class="form-control form-control-solid mb-2" disabled
                                        value="{{ $product?->category?->category_type }}" />
                                </div>

                                <div class="col-md-6 mb-3 fv-row">
                                    <label class="form-label">Category</label>
                                    <input type="text" class="form-control form-control-solid mb-2" disabled
                                        value="{{ $product?->category?->name }}" />
                                </div>

                                <div class="col-md-6 mb-3 fv-row">
                                    <label class="form-label">Brand</label>
                                    <input type="text" class="form-control form-control-solid mb-2" disabled
                                        value="{{ $product?->brand?->name }}" />
                                </div>

                                <div class="col-md-6 mb-3 fv-row">
                                    <label class="form-label">Product Name</label>
                                    <input type="text" class="form-control form-control-solid mb-2" disabled
                                        value="{{ $product->name }}" />
                                </div>

                                <div class="col-md-6 mb-3 fv-row">
                                    <label class="form-label">Price</label>
                                    <input type="text" class="form-control form-control-solid mb-2" disabled
                                        value="{{ $product->price }}" />
                                </div>

                                <div class="col-md-6 mb-3 fv-row">
                                    <label class="form-label">Discount(%)</label>
                                    <input type="text" class="form-control form-control-solid mb-2" disabled
                                        value="{{ $product->discount }}" />
                                </div>

                                <div class="col-md-6 mb-3 fv-row">
                                    <label class="form-label">Discounted Price</label>
                                    <input type="text" class="form-control form-control-solid mb-2" disabled
                                        value="{{ $product->price - ($product->discount * $product->price) / 100 }}" />
                                </div>

                                <div class="col-md-6 mb-3 fv-row">
                                    <label class="form-label">Stock Quantity</label>
                                    <input type="text" class="form-control form-control-solid mb-2" disabled
                                        value="{{ $product->stock_quantity }}" />
                                </div>

                                <div class="col-md-6 mb-3 fv-row">
                                    <label class="form-label">Color</label> <br>
                                    @forelse ($product?->color_details as $color)
                                        <div
                                            style="display: inline-block; width: 20px; height: 20px; background-color: {{ $color->code }}; margin-right: 5px;">
                                        </div>
                                    @empty
                                        <strong class="text-danger">No colors available</strong>
                                    @endforelse
                                </div>

                                <div class="col-md-6 mb-3 fv-row">
                                    <label class="form-label">Size</label> <br>
                                    @forelse ($product?->size_details as $size)
                                        <strong style="margin-right: 3px"> {{ $size->name }}</strong>,
                                    @empty
                                        <strong class="text-danger">No sizes available</strong>
                                    @endforelse
                                </div>

                                <div class="col-md-6 mb-3 fv-row">
                                    <label class="form-label">Thumbnail</label> <br>
                                    <a target="_blank" href="{{ Storage::url($product->thumbnail) }}"
                                        class="symbol symbol-50px">
                                        @if (!empty($product->thumbnail))
                                            <span class="symbol-label"
                                                style="background-image:url({{ Storage::url($product->thumbnail) }});"></span>
                                        @else
                                            <span class="symbol-label"
                                                style="background-image:url(assets/backend/media/stock/ecommerce/68.gif);"></span>
                                        @endif
                                    </a>
                                </div>

                                <div class="col-md-6 mb-3 fv-row">
                                    <label class="form-label">Images</label> <br>
                                    @php
                                        $images = json_decode($product->images);
                                    @endphp

                                    @forelse ($images as $image)
                                        <a target="_blank" href="{{ Storage::url($image) }}" class="symbol symbol-50px">
                                            <span class="symbol-label"
                                                style="background-image:url({{ Storage::url($image) }});"></span>
                                        </a>
                                    @empty
                                        <strong class="text-danger">No images available</strong>
                                    @endforelse
                                </div>

                                <div class="col-md-6 mb-3 fv-row">
                                    <label class="form-label">Status</label>
                                    <input type="text" class="form-control form-control-solid mb-2"
                                        value="{{ ucwords($product?->status?->value) }}" disabled />
                                </div>

                                <div class="col-md-12 mb-3 fv-row">
                                    <label class="form-label">Description</label>
                                    <textarea class="form-control form-control-solid mb-2" disabled data-kt-autosize="true">{{ $product->description }}</textarea>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </div>
@endsection
