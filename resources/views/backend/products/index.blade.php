@extends('backend.master')

@section('title', 'Product List')

@section('admin-content')
    <!--begin::Toolbar  -->
    <x-toolbar title="Products" :breadcrumbs="[
        ['label' => 'Home', 'url' => route('admin.dashboard')],
        ['label' => 'Products', 'url' => 'javascript:void(0)'],
        ['label' => 'Products', 'active' => true],
    ]" actionUrl="{{ route('products.create') }}" actionIcon="fas fa-plus-circle"
        actionLabel="Add product" />
    <!--end::Toolbar -->

    <div class="post d-flex flex-column-fluid" id="kt_post">
        <!--begin::Container-->
        <div id="kt_content_container" class="container-xxl">
            <!--begin::product-->
            <div class="card card-flush">
                <!--begin::Card header-->
                <div class="card-header align-items-center py-5 gap-2 gap-md-5">
                    <!--begin::Card title-->
                    <div class="card-title">
                        <!--begin::Search-->
                        <x-search />
                        <!--end::Search-->
                    </div>
                    <!--end::Card title-->
                </div>
                <!--end::Card header-->
                <!--begin::Card body-->
                <div class="card-body pt-0">
                    <!--begin::Table-->
                    <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_product">
                        <!--begin::Table head-->
                        <thead>
                            <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                                <th>#</th>
                                <th>Product</th>
                                <th>Colors</th>
                                <th>Sizes</th>
                                <th>Price</th>
                                <th>Stock Quantity</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($products as $product)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        <div class="d-flex">
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
                                            <div class="ms-5">
                                                <a href="javscript:void(0)"
                                                    class="text-gray-800 text-hover-primary fs-5 fw-bolder mb-1">{{ $product->name }}</a>
                                                <div class="fs-8 fw-bolder"> Brand Name:
                                                    {{ $product?->brand?->name }}</div>
                                                <div class="fs-8 fw-bolder">
                                                    Category:
                                                    {{ $product?->category?->category_type }} ->
                                                    {{ $product?->category?->name }}
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        @forelse ($product?->color_details as $color)
                                            <div
                                                style="display: inline-block; width: 20px; height: 20px; background-color: {{ $color->code }}; margin-right: 5px;">
                                            </div>
                                        @empty
                                            <strong class="text-danger">No colors available</strong>
                                        @endforelse
                                    </td>
                                    <td>
                                        @forelse ($product?->size_details as $size)
                                            <div
                                                style="display: inline-block; width: 20px; height: 20px; background-color: {{ $size->name }}; margin-right: 5px;">
                                            </div>
                                        @empty
                                            <strong class="text-danger">No colors available</strong>
                                        @endforelse
                                    </td>

                                    <td> <strong>Price: </strong> {{ $product->price }} TK <br>
                                        <strong>Discount(%): </strong>{{ $product->discount }} %<br>
                                        <strong>Discounted Price:
                                        </strong>{{ $product->price - ($product->discount * $product->price) / 100 }} TK
                                    </td>
                                    <td>{{ $product->stock_quantity }}</td>
                                    <td>
                                        @if ($product?->status?->value == 'active')
                                            <div class="badge badge-light-success">Active</div>
                                        @else
                                            <div class="badge badge-light-danger">Inactive</div>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('products.show', $product->id) }}"
                                            class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm">
                                            <i class="bi bi-eye-fill"></i>
                                        </a>

                                        <a href="{{ route('products.edit', $product->id) }}"
                                            class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm">
                                            <i class="bi bi-pencil-fill"></i>
                                        </a>

                                        <button type="button"
                                            class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm delete-product"
                                            data-id="{{ $product->id }}">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <!--end::Table body-->
                    </table>
                    <!--end::Table-->
                </div>
                <!--end::Card body-->
            </div>
            <!--end::product-->
        </div>
        <!--end::Container-->
    </div>
@endsection

@push('page_js')
    <script>
        $(document).ready(function() {
            $('.delete-product').on('click', function(e) {
                e.preventDefault();
                let productId = $(this).data('id');
                let deleteUrl = "{{ route('products.destroy', ':id') }}".replace(':id', productId);

                Swal.fire({
                    title: "Are you sure?",
                    text: "This will delete the product along with its images.",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#d33",
                    cancelButtonColor: "#3085d6",
                    confirmButtonText: "Yes, delete it!"
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: deleteUrl,
                            type: "POST",
                            data: {
                                _method: "DELETE",
                                _token: "{{ csrf_token() }}"
                            },
                            success: function(response) {
                                Swal.fire("Deleted!",
                                        "The product and its images have been deleted.",
                                        "success")
                                    .then(() => location
                                .reload()); // Reload page after deletion
                            },
                            error: function() {
                                Swal.fire("Error!", "Something went wrong.", "error");
                            }
                        });
                    }
                });
            });
        });
    </script>
@endpush
