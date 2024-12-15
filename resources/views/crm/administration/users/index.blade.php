@extends('crm._layout')

@section('title', $page)

@section('content')
    <!-- Users -->
    <div class="bg-white shadow rounded p-4 mb-5">
        <!-- Nav -->
        <nav class="d-flex justify-content-between align-items-center mb-4">
            <!-- Title -->
            <h5 class="m-0">{{ $page }}</h5>

            <a href="{{ route('crm.administration.users.create') }}"
                class="bg-success rounded py-2 px-3 font-weight-bold text-white">
                Create User
            </a>
        </nav>

        <!-- Users Table -->
        <table class="table table-bordered table-striped table-hover table-responsive align-middle">
            <thead class="bg-secondary">
                <tr>
                    <th class="text-center text-white text-sm text-uppercase">Id</th>
                    <th class="text-center text-white text-sm text-uppercase">Role</th>
                    <th class="text-center text-white text-sm text-uppercase">Company</th>
                    <th class="text-center text-white text-sm text-uppercase">Name</th>
                    <th class="text-center text-white text-sm text-uppercase">Surname</th>
                    <th class="text-center text-white text-sm text-uppercase">Email Address</th>
                    <th class="text-center text-white text-sm text-uppercase">Created At</th>
                    <th class="text-center text-white text-sm text-uppercase">Updated At</th>
                    <th class="text-center text-white text-sm text-uppercase">Actions</th>
                </tr>
            </thead>
            <tbody>
                @if (count($users) < 1)
                    <tr>
                        <th colspan="11" class="p-3 text-center">
                            No users were found!
                        </th>
                    </tr>
                @else
                    @foreach ($users as $user)
                        <tr>
                            <th class="fw-normal text-center text-dark text-sm">
                                {{ $user->id }}
                            </th>
                            <th class="fw-normal text-center text-dark text-sm">
                                {{ $user->role->name ?? '-' }}
                            </th>
                            <th class="fw-normal text-center text-dark text-sm">
                                {{ $user->company->name ?? '-' }}
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
                                {{ $user->formatted_created_at }}
                            </th>
                            <th class="fw-normal text-center text-dark text-sm">
                                {{ $user->formatted_updated_at }}
                            </th>
                            <th class="fw-normal text-center text-dark text-sm">
                                <div class="d-flex justify-content-center align-items-center">
                                    <a href="{{ route('crm.administration.users.show', $user) }}"
                                        class="bg-info rounded py-1 px-2 font-weight-bold text-sm text-white me-2"
                                        data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="show-tooltip"
                                        data-bs-title="Show">
                                        <i class="fa-solid fa-eye"></i>
                                    </a>
                                    <a href="{{ route('crm.administration.users.edit', $user) }}"
                                        @if ($user->id === 1) disabled style="pointer-events: none; cursor: not-allowed;" @endif
                                        class="{{ $user->id === 1 ? 'bg-secondary' : 'bg-warning' }} rounded py-1 px-2 font-weight-bold text-sm text-white me-2"
                                        @if ($user->id !== 1) data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="edit-tooltip"
                                        data-bs-title="Edit" @endif>
                                        <i class="fa-solid fa-pencil"></i>
                                    </a>
                                    <a type="button" data-id="{{ $user->id }}"
                                        @if ($user->id === 1) disabled style="pointer-events: none; cursor: not-allowed;" @endif
                                        class="btn-delete-user {{ $user->id === 1 ? 'bg-secondary' : 'bg-danger' }} rounded py-1 px-2 border-0 font-weight-bold text-sm text-white"
                                        @if ($user->id !== 1) data-bs-placement="top" data-bs-custom-class="delete-tooltip"
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

    <!-- Pending Users -->
    <div class="bg-white shadow rounded p-4">
        <!-- Title -->
        <h5 class="mb-4">Pending Users</h5>

        <!-- Pending Users Table -->
        <table class="table table-bordered table-striped table-hover table-responsive align-middle">
            <thead class="bg-secondary">
                <tr>
                    <th class="text-center text-white text-sm text-uppercase">Id</th>
                    <th class="text-center text-white text-sm text-uppercase">Role</th>
                    <th class="text-center text-white text-sm text-uppercase">Company</th>
                    <th class="text-center text-white text-sm text-uppercase">Name</th>
                    <th class="text-center text-white text-sm text-uppercase">Surname</th>
                    <th class="text-center text-white text-sm text-uppercase">Email Address</th>
                    <th class="text-center text-white text-sm text-uppercase">Created At</th>
                    <th class="text-center text-white text-sm text-uppercase">Updated At</th>
                    <th class="text-center text-white text-sm text-uppercase">Actions</th>
                </tr>
            </thead>
            <tbody>
                @if (count($pendingUsers) < 1)
                    <tr>
                        <th colspan="11" class="p-3 text-center">
                            No pending users were found!
                        </th>
                    </tr>
                @else
                    @foreach ($pendingUsers as $pendingUser)
                        <tr>
                            <th class="fw-normal text-center text-dark text-sm">
                                {{ $pendingUser->id }}
                            </th>
                            <th class="fw-normal text-center text-dark text-sm">
                                {{ $pendingUser->role->name ?? '-' }}
                            </th>
                            <th class="fw-normal text-center text-dark text-sm">
                                {{ $pendingUser->company->name ?? '-' }}
                            </th>
                            <th class="fw-normal text-center text-dark text-sm">
                                {{ $pendingUser->name }}
                            </th>
                            <th class="fw-normal text-center text-dark text-sm">
                                {{ $pendingUser->surname }}
                            </th>
                            <th class="fw-normal text-center text-dark text-sm">
                                {{ $pendingUser->email }}
                            </th>
                            <th class="fw-normal text-center text-dark text-sm">
                                {{ $pendingUser->formatted_created_at }}
                            </th>
                            <th class="fw-normal text-center text-dark text-sm">
                                {{ $pendingUser->formatted_updated_at }}
                            </th>
                            <th class="fw-normal text-center text-dark text-sm">
                                <div class="d-flex justify-content-center align-items-center">
                                    <a href="{{ route('crm.administration.users.show', $pendingUser) }}"
                                        class="bg-info rounded py-1 px-2 font-weight-bold text-sm text-white me-2"
                                        data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="show-tooltip"
                                        data-bs-title="Show">
                                        <i class="fa-solid fa-eye"></i>
                                    </a>
                                    <a href="{{ route('crm.administration.users.edit', $pendingUser) }}"
                                        class="bg-warning rounded py-1 px-2 font-weight-bold text-sm text-white me-2"
                                        data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="edit-tooltip"
                                        data-bs-title="Edit">
                                        <i class="fa-solid fa-pencil"></i>
                                    </a>
                                    <a type="button" data-id="{{ $pendingUser->id }}"
                                        @if ($pendingUser->id === 1) disabled style="pointer-events: none; cursor: not-allowed;" @endif
                                        class="btn-delete-user {{ $pendingUser->id === 1 ? 'bg-secondary' : 'bg-danger' }} rounded py-1 px-2 border-0 font-weight-bold text-sm text-white"
                                        @if ($pendingUser->id !== 1) data-bs-placement="top" data-bs-custom-class="delete-tooltip"
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
        $('.btn-delete-user').on('click', function() {
            $('#modal-delete .modal-title').text('Delete User');
            $('#modal-delete .modal-body p').text('Are you sure you want to delete this user?');
            $('#modal-delete .modal-footer form').attr('action', '/crm/administration/users/' +
                $(this).data('id'));
            $(".btn-delete-modal").click();
        });
    </script>
@endsection
