@extends('backend.master')

@section('title', 'Edit Product')

@section('admin-content')
    <!--begin::Toolbar -->
    <x-toolbar :title="'Edit product'" :breadcrumbs="[
        ['label' => 'Home', 'url' => route('admin.dashboard')],
        ['label' => 'Products', 'url' => route('products.index')],
        ['label' => 'Edit product', 'active' => true],
    ]" :actionUrl="route('products.index')" actionIcon="bi bi-cart fs-3"
        actionLabel="Product List" />
    <!--end::Toolbar -->

    <div class="post d-flex flex-column-fluid" id="kt_post">
        <div id="kt_content_container" class="container-fluid">
            <form method="POST" action="{{ route('products.update', $product->id) }}"
                class="form d-flex flex-column flex-lg-row" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="col-md-12">
                    <div class="card py-4">

                        @include('message')
                        @include('multiple_message')

                        <div class="card-body">

                            <div class="row">

                                <div class="col-md-6 mb-3 fv-row">
                                    <label class="required form-label">Category</label>
                                    <select class="form-select form-select-solid" name="category_id" id="category" required
                                        data-control="select2" data-hide-search="true" data-placeholder="Select Category">
                                        <option value="">Select Category</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}"
                                                {{ $category->id == $product->category_id ? 'selected' : '' }}>
                                                {{ $category->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('category_id')
                                        <span class="text-danger mt-2">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-md-6 mb-3 fv-row">
                                    <label class="required form-label">Subcategory</label>
                                    <select class="form-select form-select-solid" name="subcategory_id" id="subcategory"
                                        required data-control="select2" data-hide-search="true"
                                        data-placeholder="Select Subcategory">
                                        <option value="">Select Subcategory</option>
                                    </select>
                                    @error('subcategory_id')
                                        <span class="text-danger mt-2">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-md-6 mb-3 fv-row">
                                    <label class="required form-label">Brand</label>
                                    <select class="form-select form-select-solid" name="brand_id" required
                                        data-control="select2" data-hide-search="true" data-placeholder="Select Brand">
                                        <option></option>
                                        @foreach ($brands as $brand)
                                            <option {{ $product->brand_id == $brand->id ? 'selected' : '' }}
                                                value="{{ $brand->id }}"> {{ $brand->name }} </option>
                                        @endforeach
                                    </select>
                                    @error('brand_id')
                                        <span class="text-danger mt-2">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-md-6 mb-3 fv-row">
                                    <label class="required form-label">Product Name</label>
                                    <input type="text" name="name" class="form-control form-control-solid mb-2"
                                        placeholder="Enter product name" required value="{{ $product->name }}" />
                                    @error('name')
                                        <span class="text-danger mt-2">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-md-6 mb-3 fv-row">
                                    <label class="required form-label">Price</label>
                                    <input type="number" step=".01" name="price"
                                        class="form-control form-control-solid mb-2" placeholder="Enter price" required
                                        value="{{ $product->price }}" />
                                    @error('price')
                                        <span class="text-danger mt-2">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-md-6 mb-3 fv-row">
                                    <label class="required form-label">Discount(%)</label>
                                    <input type="number" name="discount" class="form-control form-control-solid mb-2"
                                        placeholder="Enter discount" required value="{{ $product->discount }}" />
                                    @error('discount')
                                        <span class="text-danger mt-2">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-md-6 mb-3 fv-row">
                                    <label class="required form-label">Stock Quantity</label>
                                    <input type="text" name="stock_quantity" class="form-control form-control-solid mb-2"
                                        placeholder="Enter stock quantity" required
                                        value="{{ $product->stock_quantity }}" />
                                    @error('stock_quantity')
                                        <span class="text-danger mt-2">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-md-6 mb-3 fv-row">
                                    <label class="required form-label">Color</label>
                                    <select class="form-select form-select-solid" name="color[]" required
                                        data-control="select2" data-hide-search="true" multiple="multiple"
                                        data-placeholder="Select Color">
                                        <option></option>
                                        @foreach ($colors as $color)
                                            <option {{ in_array($color->id, $product?->colors) ? 'selected' : '' }}
                                                value="{{ $color->id }}"> {{ $color->name }} </option>
                                        @endforeach
                                    </select>
                                    @error('color')
                                        <span class="text-danger mt-2">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-md-6 mb-3 fv-row">
                                    <label class="required form-label">Size</label>
                                    <select class="form-select form-select-solid" name="size[]" required
                                        data-control="select2" data-hide-search="true" multiple="multiple"
                                        data-placeholder="Select Size">
                                        <option></option>
                                        @foreach ($sizes as $size)
                                            <option {{ in_array($size->id, $product?->sizes) ? 'selected' : '' }}
                                                value="{{ $size->id }}"> {{ $size->name }} </option>
                                        @endforeach
                                    </select>
                                    @error('size')
                                        <span class="text-danger mt-2">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-md-6 mb-3 fv-row">
                                    <label class="required form-label">Thumbnail</label>
                                    <input type="file" name="thumbnail" class="form-control form-control-solid mb-2" />

                                    <!-- Show existing thumbnail -->
                                    <img id="thumbnail-preview"
                                        src="{{ $product->thumbnail ? asset('storage/' . $product->thumbnail) : '#' }}"
                                        alt="Thumbnail Preview" class="img-thumbnail mt-2" width="100" height="100"
                                        style="display: {{ $product->thumbnail ? 'block' : 'none' }};">

                                    @error('thumbnail')
                                        <span class="text-danger mt-2">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-md-6 mb-3 fv-row">
                                    <label class="form-label">Images</label>
                                    <input type="file" name="images[]" multiple="multiple"
                                        class="form-control form-control-solid mb-2" />

                                    <!-- Show existing images -->
                                    <div id="images-preview" class="d-flex mt-2">
                                        @foreach (json_decode($product->images, true) ?? [] as $image)
                                            <img src="{{ asset('storage/' . $image) }}" class="img-thumbnail me-2"
                                                width="100" height="100">
                                        @endforeach
                                    </div>

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
                                            <option {{ $product->status->value == $status['value'] ? 'selected' : '' }}
                                                value="{{ $status['value'] }}">
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
                                    <textarea id="kt_docs_ckeditor_classic" class="form-control form-control-solid mb-2" data-kt-autosize="true"
                                        name="description" placeholder="Enter description">{{ $product->description }}</textarea>
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

@push('page_js')
    <script>
        $(document).ready(function() {

            // ClassicEditor
            ClassicEditor
                .create(document.querySelector('#kt_docs_ckeditor_classic'))
                .then(editor => {
                    console.log(editor);
                })
                .catch(error => {
                    console.error(error);
                });

            let selectedCategory = $('#category').val();
            let selectedSubcategory = "{{ $product->subcategory_id }}";

            // Load subcategories if category is already selected (for edit)
            if (selectedCategory) {
                loadSubcategories(selectedCategory, selectedSubcategory);
            }

            // Load subcategories dynamically when category changes
            $('#category').change(function() {
                let categoryId = $(this).val();
                loadSubcategories(categoryId, null);
            });

            function loadSubcategories(categoryId, selectedSubcategory) {
                if (categoryId) {
                    $.ajax({
                        url: '/admin/get-subcategories/' + categoryId,
                        type: 'GET',
                        dataType: 'json',
                        success: function(response) {
                            $('#subcategory').empty().append(
                                '<option value="">Select Subcategory</option>');
                            $.each(response.subcategories, function(key, value) {
                                $('#subcategory').append('<option value="' + value.id + '" ' + (
                                        value.id == selectedSubcategory ? 'selected' : '') +
                                    '>' + value.name + '</option>');
                            });
                        },
                        error: function(jqXHR, textStatus, errorThrown) {
                            console.error("AJAX Error:", textStatus, errorThrown);
                        }
                    });
                } else {
                    $('#subcategory').empty().append('<option value="">Select Subcategory</option>');
                }
            }

            // Preview for thumbnail
            $('input[name="thumbnail"]').on('change', function(event) {
                let input = event.target;
                if (input.files && input.files[0]) {
                    let reader = new FileReader();
                    reader.onload = function(e) {
                        $('#thumbnail-preview').attr('src', e.target.result).show();
                    };
                    reader.readAsDataURL(input.files[0]);
                }
            });

            // Preview for multiple images
            $('input[name="images[]"]').on('change', function(event) {
                let input = event.target;
                $('#images-preview').empty(); // Clear old previews
                if (input.files) {
                    $.each(input.files, function(index, file) {
                        let reader = new FileReader();
                        reader.onload = function(e) {
                            $('#images-preview').append('<img src="' + e.target.result +
                                '" class="img-thumbnail me-2" width="100" height="100">');
                        };
                        reader.readAsDataURL(file);
                    });
                }
            });
        });
    </script>
@endpush
