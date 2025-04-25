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
                                    <th>Action</th>
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
                                        <td> <button type="button"
                                                class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm delete-customer"
                                                data-id="{{ $customer->id }}">
                                                <i class="bi bi-trash"></i>
                                            </button> </td>
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

@push('page_js')
    <script>
        $(document).ready(function() {
            $('.delete-customer').on('click', function(e) {
                e.preventDefault();
                let userId = $(this).data('id');
                let deleteUrl = "{{ route('customers.destroy', ':id') }}".replace(':id', userId);

                Swal.fire({
                    title: "Are you sure?",
                    text: "This will delete the customer",
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
                                        "Customer deleted successfully.",
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
