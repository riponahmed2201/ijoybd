@extends('backend.master')

@section('admin-content')
    <!--begin::Toolbar -->
    <x-toolbar :title="'Add product'" :breadcrumbs="[
        ['label' => 'Home', 'url' => route('admin.dashboard')],
        ['label' => 'Products', 'url' => route('products.index')],
        ['label' => 'Add product', 'active' => true],
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

                        @include('message')
                        @include('multiple_message')

                        <div class="card-body">

                            <div class="row">

                                <div class="col-md-6 mb-3 fv-row">
                                    <label class="required form-label">Category</label>
                                    <select class="form-select form-select-solid" name="size" required
                                        data-control="select2" data-hide-search="true" data-placeholder="Select Category">
                                        <option></option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}"> {{ $category->name }} </option>
                                        @endforeach
                                    </select>
                                    @error('size')
                                        <span class="text-danger mt-2">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-md-6 mb-3 fv-row">
                                    <label class="required form-label">Brand</label>
                                    <select class="form-select form-select-solid" name="size" required
                                        data-control="select2" data-hide-search="true" data-placeholder="Select Brand">
                                        <option></option>
                                        @foreach ($brands as $brand)
                                            <option value="{{ $brand->id }}"> {{ $brand->name }} </option>
                                        @endforeach
                                    </select>
                                    @error('size')
                                        <span class="text-danger mt-2">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-md-6 mb-3 fv-row">
                                    <label class="required form-label">Name</label>
                                    <input type="text" name="name" class="form-control form-control-solid mb-2"
                                        placeholder="Enter name" required />
                                    @error('name')
                                        <span class="text-danger mt-2">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-md-6 mb-3 fv-row">
                                    <label class="required form-label">Price</label>
                                    <input type="text" name="price" class="form-control form-control-solid mb-2"
                                        placeholder="Enter price" required />
                                    @error('price')
                                        <span class="text-danger mt-2">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-md-6 mb-3 fv-row">
                                    <label class="required form-label">Stock Quantity</label>
                                    <input type="text" name="stock_quantity" class="form-control form-control-solid mb-2"
                                        placeholder="Enter stock quantity" required />
                                    @error('stock_quantity')
                                        <span class="text-danger mt-2">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-md-6 mb-3 fv-row">
                                    <label class="required form-label">Color</label>
                                    <input type="text" name="color" class="form-control form-control-solid mb-2"
                                        placeholder="Enter color" required />
                                    @error('color')
                                        <span class="text-danger mt-2">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-md-6 mb-3 fv-row">
                                    <label class="required form-label">Size</label>
                                    <select class="form-select form-select-solid" name="size" required
                                        data-control="select2" data-hide-search="true" multiple="multiple"
                                        data-placeholder="Select Size">
                                        <option></option>
                                        @foreach ($sizes as $size)
                                            <option value="{{ $size['value'] }}"> {{ $size['label'] }} </option>
                                        @endforeach
                                    </select>
                                    @error('size')
                                        <span class="text-danger mt-2">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-md-6 mb-3 fv-row">
                                    <label class="required form-label">Thumbnail</label>
                                    <input type="file" name="thumbnail" class="form-control form-control-solid mb-2"
                                        required />
                                    @error('thumbnail')
                                        <span class="text-danger mt-2">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-md-6 mb-3 fv-row">
                                    <label class="required form-label">Images</label>
                                    <input type="file" name="images" multiple
                                        class="form-control form-control-solid mb-2" />
                                    @error('images')
                                        <span class="text-danger mt-2">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-md-6 mb-3 fv-row">
                                    <label class="required form-label">Status</label>
                                    <select class="form-select form-select-solid" name="status" data-control="select2"
                                        data-hide-search="true" required data-placeholder="Select Status">
                                        <option></option>
                                        @foreach ($statuses as $status)
                                            <option value="{{ $status['value'] }}">
                                                {{ $status['label'] }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('status')
                                        <span class="text-danger mt-2">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-md-12 mb-3 fv-row">
                                    <label class="form-label">Description</label>
                                    <textarea class="form-control form-control-solid mb-2" data-kt-autosize="true" name="description"
                                        placeholder="Enter description">{{ isset($product) ? $product->description : '' }}</textarea>
                                    @error('description')
                                        <span class="text-danger mt-2">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="card-footer">
                                <div class="d-flex justify-content-center">
                                    <button type="submit" class="btn btn-primary"> Submit </button>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </form>
        </div>
    </div>
@endsection
