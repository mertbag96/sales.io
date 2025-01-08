@extends('crm._layout')

@section('title', 'Role: ' . $subPage)

@section('content')
    <!-- Role -->
    <div class="bg-white shadow rounded p-4 mb-5">

        <!-- Nav -->
        <nav class="d-flex justify-content-between align-items-center mb-4">
            <!-- Title -->
            <h5 class="m-0">Role: {{ $subPage }}</h5>

            @can('update', 'App\Models\Role')
                <a href="{{ route('crm.administration.roles.edit', $role) }}"
                    class="bg-warning rounded py-2 px-3 font-weight-bold text-white">
                    <i class="fas fa-pencil me-1"></i>
                    Edit
                </a>
            @endcan
        </nav>

        <!-- Role Details -->
        <div class="d-flex flex-wrap justify-content-between align-items-center">
            <!-- Name -->
            <div class="d-flex flex-column w-48 mb-4">
                <label class="p-0 ms-0 mb-2 font-weight-medium fs-6 text-dark">
                    Name
                </label>
                <input type="text" class="outline-none p-2 W-48" value="{{ $role->name }}" disabled>
            </div>

            <!-- Description -->
            <div class="d-flex flex-column w-48 mb-4">
                <label class="p-0 ms-0 mb-2 font-weight-medium fs-6 text-dark">
                    Description
                </label>
                <input type="text" class="outline-none p-2 W-48" value="{{ $role->description }}" disabled>
            </div>

            <!-- Created At -->
            <div class="d-flex flex-column w-48">
                <label class="p-0 ms-0 mb-2 font-weight-medium fs-6 text-dark">
                    Created At
                </label>
                <input type="text" class="outline-none p-2 W-48" value="{{ $role->formatted_created_at }}" disabled>
            </div>

            <!-- Updated At -->
            <div class="d-flex flex-column w-48">
                <label class="p-0 ms-0 mb-2 font-weight-medium fs-6 text-dark">
                    Updated At
                </label>
                <input type="text" class="outline-none p-2 W-48" value="{{ $role->formatted_updated_at }}" disabled>
            </div>
        </div>
    </div>

    <!-- Users -->
    @can('viewAny', 'App\Models\User')
        <div class="bg-white shadow rounded p-4">
            <h5 class="mb-3">{{ $subPage }} Users</h5>

            <table class="table table-bordered table-striped table-hover table-responsive align-middle mt-2">
                <thead class="bg-secondary">
                    <tr>
                        <th class="text-center text-white text-sm text-uppercase">Id</th>
                        @if (in_array($subPage, ['Manager', 'Employee']))
                            <th class="text-center text-white text-sm text-uppercase">Company</th>
                        @endif
                        <th class="text-center text-white text-sm text-uppercase">Name</th>
                        <th class="text-center text-white text-sm text-uppercase">Surname</th>
                        <th class="text-center text-white text-sm text-uppercase">Email Address</th>
                        <th class="text-center text-white text-sm text-uppercase">Created At</th>
                        <th class="text-center text-white text-sm text-uppercase">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @if (count($users) < 1)
                        <tr>
                            <th colspan="7" class="p-3 text-center">
                                There are no users associated with this role!
                            </th>
                        </tr>
                    @else
                        @foreach ($users as $user)
                            <tr>
                                <th class="fw-normal text-center text-dark text-sm">
                                    {{ $user->id }}
                                </th>
                                @if (in_array($user->role_id, [2, 3]))
                                    <th class="fw-normal text-center text-dark text-sm">
                                        {{ $user->company->name ?? '-' }}
                                    </th>
                                @endif
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
    @endcan
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
