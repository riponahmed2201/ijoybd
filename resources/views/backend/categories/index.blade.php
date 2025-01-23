@extends('backend.master')

@section('admin-content')
    <!--begin::Toolbar  -->
    <x-toolbar title="Categories" :breadcrumbs="[
        ['label' => 'Home', 'url' => route('admin.dashboard')],
        ['label' => 'Categories', 'url' => 'javascript:void(0)'],
        ['label' => 'Categories', 'active' => true],
    ]" actionUrl="{{ route('categories.create') }}"
        actionIcon="fas fa-plus-circle" actionLabel="Add Category" />
    <!--end::Toolbar -->

    <div class="post d-flex flex-column-fluid" id="kt_post">
        <!--begin::Container-->
        <div id="kt_content_container" class="container-xxl">
            <!--begin::Category-->
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
                    <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_ecommerce_category_table">
                        <!--begin::Table head-->
                        <thead>
                            <!--begin::Table row-->
                            <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                                <th>#</th>
                                <th class="min-w-250px">Category</th>
                                <th class="min-w-250px">Type</th>
                                <th class="min-w-150px">Status</th>
                                <th class="text-end min-w-70px">Actions</th>
                            </tr>
                            <!--end::Table row-->
                        </thead>
                        <!--end::Table head-->
                        <!--begin::Table body-->
                        <tbody class="fw-bold text-gray-600">

                            @foreach ($categories as $category)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        <div class="d-flex">
                                            <a target="_blank" href="{{ Storage::url($category->avatar) }}" class="symbol symbol-50px">
                                                @if (!empty($category->avatar))
                                                    <span class="symbol-label"
                                                        style="background-image:url({{ Storage::url($category->avatar) }});"></span>
                                                @else
                                                    <span class="symbol-label"
                                                        style="background-image:url(assets/backend/media/stock/ecommerce/68.gif);"></span>
                                                @endif
                                            </a>
                                            <div class="ms-5">
                                                <a href="javscript:void(0)"
                                                    class="text-gray-800 text-hover-primary fs-5 fw-bolder mb-1"
                                                    data-kt-ecommerce-category-filter="category_name">{{ $category->name }}</a>
                                                <div class="text-muted fs-7 fw-bolder">{{ $category->slug }}</div>
                                                <div class="text-muted fs-7 fw-bolder">{{ $category->description }}</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td> {{ $category?->category_type?->label() }} </td>
                                    <td>
                                        @if ($category?->status?->value == 'active')
                                            <div class="badge badge-light-success">Active</div>
                                        @else
                                            <div class="badge badge-light-danger">Inactive</div>
                                        @endif
                                    </td>
                                    <td class="text-end">
                                        <a href="{{ route('categories.edit', $category->id) }}"
                                            class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm">
                                            <i class="bi bi-eye-fill"></i>
                                        </a>

                                        <a href="{{ route('categories.edit', $category->id) }}"
                                            class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm">
                                            <i class="bi bi-pencil-fill"></i>
                                        </a>
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
            <!--end::Category-->
        </div>
        <!--end::Container-->
    </div>
@endsection
