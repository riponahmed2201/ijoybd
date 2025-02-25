@extends('backend.master')

@section('title', 'Order List')

@section('admin-content')
    <!--begin::Toolbar  -->
    <x-toolbar title="Order" :breadcrumbs="[
        ['label' => 'Home', 'url' => route('admin.dashboard')],
        ['label' => 'Order Management', 'url' => 'javascript:void(0)'],
        ['label' => 'Order', 'active' => true],
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
                                    <th>Order Number</th>
                                    <th>Customer Details</th>
                                    <th>Address Details</th>
                                    <th>Total Amount</th>
                                    <th>Payment Method</th>
                                    <th>Payment Status</th>
                                    <th>Ordered At</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($orders as $order)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td> {{ $order->order_number }} </td>
                                        <td>
                                            <strong>Name: </strong> {{ $order?->user?->name }} <br>
                                            <strong>Email: </strong> {{ $order?->user?->email }} <br>
                                            <strong>Phone: </strong> {{ $order?->user?->phone }} <br>
                                            <strong>Address: </strong> {{ $order?->user?->address }}
                                        </td>
                                        <td>
                                            <strong>Shipping Address: </strong> {{ $order->shipping_address }} <br>
                                            <strong>Billing Address: </strong> {{ $order->billing_address }}
                                        </td>
                                        <td> {{ $order->total_amount }} </td>
                                        <td> {{ ucwords($order->payment_method) }} </td>
                                        <td> {{ ucwords($order->payment_status) }} </td>
                                        <td> {{ $order->formatted_order_date  }} </td>
                                        <td> {{ ucwords($order->status) }} </td>
                                        <td>
                                            <div class="btn-group">
                                                <a href="javascript:void(0)" class="btn btn-primary btn-sm">Edit</a>
                                                <a href="javascript:void(0)" class="btn btn-info btn-sm">View</a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- Display pagination links -->
                    <div id="data">
                        {{ $orders->links('vendor.pagination.bootstrap-5') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
