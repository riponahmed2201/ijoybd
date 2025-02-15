@extends('backend.master')

@section('title', 'Product Color List')

@section('admin-content')
    <!--begin::Toolbar  -->
    <x-toolbar title="Product Color" :breadcrumbs="[
        ['label' => 'Home', 'url' => route('admin.dashboard')],
        ['label' => 'Product Color', 'url' => 'javascript:void(0)'],
        ['label' => 'Product Color', 'active' => true],
    ]" actionUrl="{{ route('product-colors.create') }}"
        actionIcon="fas fa-plus-circle" actionLabel="Add Color" />
    <!--end::Toolbar -->

    <div class="post d-flex flex-column-fluid" id="kt_post">
        <!--begin::Container-->
        <div id="kt_content_container" class="container-xxl">
            <!--begin::brand-->
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
                    <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_brand">
                        <!--begin::Table head-->
                        <thead>
                            <!--begin::Table row-->
                            <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                                <th>#</th>
                                <th class="min-w-250px">Name</th>
                                <th class="min-w-150px">Status</th>
                                <th class="text-end min-w-70px">Actions</th>
                            </tr>
                            <!--end::Table row-->
                        </thead>
                        <!--end::Table head-->
                        <!--begin::Table body-->
                        <tbody class="fw-bold text-gray-600">

                            @foreach ($colors as $color)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td> {{ $color->name }} </td>
                                    <td>
                                        @if ($color?->status?->value == 'active')
                                            <div class="badge badge-light-success">Active</div>
                                        @else
                                            <div class="badge badge-light-danger">Inactive</div>
                                        @endif
                                    </td>
                                    <td class="text-end">
                                        <a href="{{ route('product-colors.edit', $color->id) }}"
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
            <!--end::brand-->
        </div>
        <!--end::Container-->
    </div>
@endsection
