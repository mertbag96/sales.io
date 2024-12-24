@extends('crm._layout')

@section('title', $page)

@section('content')
    <!-- Customers -->
    <div class="bg-white shadow rounded p-4 mb-5">
        <!-- Nav -->
        <nav class="d-flex justify-content-between align-items-center mb-4">
            <!-- Title -->
            <h5 class="m-0">{{ $page }}</h5>

            @can('create', 'App\Models\Customer')
                <a href="{{ route('crm.administration.customers.create') }}"
                    class="bg-success rounded py-2 px-3 font-weight-bold text-white">
                    Create Customer
                </a>
            @endcan
        </nav>

        <!-- Customers Table -->
        <table class="table table-bordered table-striped table-hover table-responsive align-middle">
            <thead class="bg-secondary">
                <tr>
                    <th class="text-center text-white text-sm text-uppercase">Id</th>
                    <th class="text-center text-white text-sm text-uppercase">Name</th>
                    <th class="text-center text-white text-sm text-uppercase">Surname</th>
                    <th class="text-center text-white text-sm text-uppercase">Email Address</th>
                    <th class="text-center text-white text-sm text-uppercase">Phone Number</th>
                    <th class="text-center text-white text-sm text-uppercase">Created At</th>
                    <th class="text-center text-white text-sm text-uppercase">Updated At</th>
                    <th class="text-center text-white text-sm text-uppercase">Actions</th>
                </tr>
            </thead>
            <tbody>
                @if (count($users) < 1)
                    <tr>
                        <th colspan="11" class="p-3 text-center">
                            No customers were found!
                        </th>
                    </tr>
                @else
                    @foreach ($users as $user)
                        <tr>
                            <th class="fw-normal text-center text-dark text-sm">
                                {{ $user->customer->id }}
                            </th>
                            <th class="fw-normal text-center text-dark text-sm">
                                {{ $user->name }}
                            </th>
                            <th class="fw-normal text-center text-dark text-sm">
                                {{ $user->surname }}
                            </th>
                            <th class="fw-normal text-center text-dark text-sm">
                                {{ $user->email }}
                            </th>
                            <th class="fw-normal text-center text-dark text-sm">
                                {{ $user->customer->phone }}
                            </th>
                            <th class="fw-normal text-center text-dark text-sm">
                                {{ $user->formatted_created_at }}
                            </th>
                            <th class="fw-normal text-center text-dark text-sm">
                                {{ $user->formatted_updated_at }}
                            </th>
                            <th class="fw-normal text-center text-dark text-sm">
                                <div class="d-flex justify-content-center align-items-center">
                                    @can('view', 'App\Models\Customer')
                                        <a href="{{ route('crm.administration.customers.show', $user->customer) }}"
                                            class="bg-info rounded py-1 px-2 font-weight-bold text-sm text-white me-2"
                                            data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="show-tooltip"
                                            data-bs-title="Show">
                                            <i class="fa-solid fa-eye"></i>
                                        </a>
                                    @endcan
                                    @can('update', 'App\Models\Customer')
                                        <a href="{{ route('crm.administration.customers.edit', $user->customer) }}"
                                            class="bg-warning rounded py-1 px-2 font-weight-bold text-sm text-white me-2"
                                            data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="edit-tooltip"
                                            data-bs-title="Edit">
                                            <i class="fa-solid fa-pencil"></i>
                                        </a>
                                    @endcan
                                    @can('delete', 'App\Models\Customer')
                                        <a type="button" data-id="{{ $user->customer->id }}"
                                            class="btn-delete-user bg-danger rounded py-1 px-2 border-0 font-weight-bold text-sm text-white"
                                            data-bs-placement="top" data-bs-custom-class="delete-tooltip" data-bs-title="Delete"
                                            data-bs-toggle="tooltip">
                                            <i class="fa-solid fa-trash"></i>
                                        </a>
                                    @endcan
                                </div>
                            </th>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    </div>
@endsection

@section('scripts')
    <script>
        $('.btn-delete-user').on('click', function() {
            $('#modal-delete .modal-title').text('Delete Customer');
            $('#modal-delete .modal-body p').text('Are you sure you want to delete this customer?');
            $('#modal-delete .modal-footer form').attr('action', '/crm/administration/customers/' +
                $(this).data('id'));
            $(".btn-delete-modal").click();
        });
    </script>
@endsection
