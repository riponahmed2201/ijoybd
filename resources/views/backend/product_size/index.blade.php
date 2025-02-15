@extends('backend.master')

@section('title', 'Product Size List')

@section('admin-content')
    <!--begin::Toolbar  -->
    <x-toolbar title="Product Size" :breadcrumbs="[
        ['label' => 'Home', 'url' => route('admin.dashboard')],
        ['label' => 'Product Size', 'url' => 'javascript:void(0)'],
        ['label' => 'Product Size', 'active' => true],
    ]" actionUrl="{{ route('product-sizes.create') }}"
        actionIcon="fas fa-plus-circle" actionLabel="Add Size" />
    <!--end::Toolbar -->

    <div class="post d-flex flex-column-fluid" id="kt_post">
        <!--begin::Container-->
        <div id="kt_content_container" class="container-xxl">
            <!--begin::brand-->
            <div class="card">
                <div class="card-body pt-8">
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

                            @foreach ($sizes as $size)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td> {{ $size->name }} </td>
                                    <td>
                                        @if ($size?->status?->value == 'active')
                                            <div class="badge badge-light-success">Active</div>
                                        @else
                                            <div class="badge badge-light-danger">Inactive</div>
                                        @endif
                                    </td>
                                    <td class="text-end">
                                        <a href="{{ route('product-sizes.edit', $size->id) }}"
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
