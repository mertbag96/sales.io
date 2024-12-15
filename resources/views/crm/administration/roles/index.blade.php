@extends('crm._layout')

@section('title', $page)

@section('content')
    <!-- Roles -->
    <div class="bg-white shadow rounded p-4">
        <!-- Nav -->
        <nav class="d-flex justify-content-between align-items-center mb-4">
            <!-- Title -->
            <h5 class="m-0">{{ $page }}</h5>

            <a href="{{ route('crm.administration.roles.create') }}"
                class="bg-success rounded py-2 px-3 font-weight-bold text-white">
                Create Role
            </a>
        </nav>

        <!-- Table -->
        <table class="table table-bordered table-striped table-hover table-responsive align-middle">
            <thead class="bg-secondary">
                <tr>
                    <th class="text-center text-white text-sm text-uppercase">Id</th>
                    <th class="text-center text-white text-sm text-uppercase">Name</th>
                    <th class="text-center text-white text-sm text-uppercase">Description</th>
                    <th class="text-center text-white text-sm text-uppercase">Created At</th>
                    <th class="text-center text-white text-sm text-uppercase">Updated At</th>
                    <th class="text-center text-white text-sm text-uppercase">Actions</th>
                </tr>
            </thead>
            <tbody>
                @if (count($roles) < 1)
                    <tr>
                        <th colspan="6" class="p-3 text-center">
                            No roles were found!
                        </th>
                    </tr>
                @else
                    @foreach ($roles as $role)
                        <tr>
                            <th class="fw-normal text-center text-dark text-sm">
                                {{ $role->id }}
                            </th>
                            <th class="fw-normal text-center text-dark text-sm">
                                {{ $role->name }}
                            </th>
                            <th class="fw-normal text-center text-dark text-sm">
                                {{ $role->description }}
                            </th>
                            <th class="fw-normal text-center text-dark text-sm">
                                {{ $role->formatted_created_at }}
                            </th>
                            <th class="fw-normal text-center text-dark text-sm">
                                {{ $role->formatted_updated_at }}
                            </th>
                            <th class="fw-normal text-center text-dark text-sm">
                                <div class="d-flex justify-content-center align-items-center">
                                    <a href="{{ route('crm.administration.roles.show', $role) }}"
                                        class="bg-info rounded py-1 px-2 font-weight-bold text-sm text-white me-2"
                                        data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="show-tooltip"
                                        data-bs-title="Show">
                                        <i class="fa-solid fa-eye"></i>
                                    </a>
                                    <a href="{{ route('crm.administration.roles.edit', $role) }}"
                                        class="bg-warning rounded py-1 px-2 font-weight-bold text-sm text-white me-2"
                                        data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="edit-tooltip"
                                        data-bs-title="Edit">
                                        <i class="fa-solid fa-pencil"></i>
                                    </a>
                                    <a type="button" data-id="{{ $role->id }}"
                                        @if ($role->id === 1) disabled style="pointer-events: none; cursor: not-allowed;" @endif
                                        class="{{ $role->id === 1 ? 'bg-secondary' : 'bg-danger' }} rounded py-1 px-2 border-0 font-weight-bold text-sm text-white"
                                        @if ($role->id !== 1) data-bs-placement="top" data-bs-custom-class="delete-tooltip"
                                        data-bs-title="Delete" data-bs-toggle="tooltip" @endif>
                                        <i class="fa-solid fa-trash"></i>
                                    </a>
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
        $('a[data-bs-title="Delete"]').on('click', function() {
            $('#modal-delete .modal-title').text('Delete Role');
            $('#modal-delete .modal-body p').text(
                'Are you sure you want to delete this role? All users associated with this role will also be deleted!'
            );
            $('#modal-delete .modal-footer form').attr('action', '/crm/administration/roles/' +
                $(this).data('id'));
            $(".btn-delete-modal").click();
        });
    </script>
@endsection
