@extends('backend.master')

@section('title', 'Subcategory List')

@section('admin-content')
    <!--begin::Toolbar  -->
    <x-toolbar title="Subcategories" :breadcrumbs="[
        ['label' => 'Home', 'url' => route('admin.dashboard')],
        ['label' => 'Subcategories', 'url' => 'javascript:void(0)'],
        ['label' => 'Subcategories', 'active' => true],
    ]" actionUrl="{{ route('subcategories.create') }}"
        actionIcon="fas fa-plus-circle" actionLabel="Add Subcategory" />
    <!--end::Toolbar -->

    <div class="post d-flex flex-column-fluid" id="kt_post">
        <!--begin::Container-->
        <div id="kt_content_container" class="container-fluid">
            <!--begin::Subcategory-->
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
                    <table class="table align-middle table-row-dashed fs-6 gy-5">
                        <!--begin::Table head-->
                        <thead>
                            <!--begin::Table row-->
                            <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                                <th>#</th>
                                <th>Category Name</th>
                                <th>Subcategory Name</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                            <!--end::Table row-->
                        </thead>
                        <!--end::Table head-->
                        <!--begin::Table body-->
                        <tbody class="fw-bold text-gray-600">

                            @foreach ($subcategories as $subcategory)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        <div class="d-flex">
                                            <a target="_blank" href="{{ Storage::url($subcategory->avatar) }}"
                                                class="symbol symbol-50px">
                                                @if (!empty($subcategory->avatar))
                                                    <span class="symbol-label"
                                                        style="background-image:url({{ Storage::url($subcategory->avatar) }});"></span>
                                                @else
                                                    <span class="symbol-label"
                                                        style="background-image:url(assets/backend/media/stock/ecommerce/68.gif);"></span>
                                                @endif
                                            </a>
                                            <div class="ms-5">
                                                <a href="javscript:void(0)"
                                                    class="text-gray-800 text-hover-primary fs-5 fw-bolder mb-1">{{ $subcategory?->category?->name }}</a>
                                                <a href="javscript:void(0)"
                                                    class="text-gray-800 text-hover-primary fs-5 fw-bolder mb-1">{{ $subcategory->subcategory_name }}</a>
                                                <div class="text-muted fs-7 fw-bolder">{{ $subcategory->slug }}</div>
                                                <div class="text-muted fs-7 fw-bolder">{{ $subcategory->description }}</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td> {{ $subcategory?->subcategory_type?->label() }} </td>
                                    <td>
                                        @if ($subcategory?->status?->value == 'active')
                                            <div class="badge badge-light-success">Active</div>
                                        @else
                                            <div class="badge badge-light-danger">Inactive</div>
                                        @endif
                                    </td>
                                    <td class="text-end">
                                        <a href="{{ route('subcategories.edit', $subcategory->id) }}"
                                            class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm">
                                            <i class="bi bi-eye-fill"></i>
                                        </a>

                                        <a href="{{ route('subcategories.edit', $subcategory->id) }}"
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
