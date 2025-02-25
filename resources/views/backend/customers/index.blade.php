@extends('backend.master')

@section('title', 'Customer List')

@section('admin-content')
    <!--begin::Toolbar  -->
    <x-toolbar title="Customer" :breadcrumbs="[
        ['label' => 'Home', 'url' => route('admin.dashboard')],
        ['label' => 'Customer Management', 'url' => 'javascript:void(0)'],
        ['label' => 'Customer', 'active' => true],
    ]" />
    <!--end::Toolbar -->

    <div class="post d-flex flex-column-fluid" id="kt_post">
        <div id="kt_content_container" class="container-xxl">
            <div class="card">
                <div class="card-body pt-8">
                    <div class="table-responsive">
                        <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_brand">
                            <thead>
                                <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Address</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($customers as $customer)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td> {{ $customer->name }} </td>
                                        <td> {{ $customer?->email }} </td>
                                        <td> {{ $customer->phone }} </td>
                                        <td> {{ $customer->address }} </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- Display pagination links -->
                    <div id="data">
                        {{ $customers->links('vendor.pagination.bootstrap-5') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
