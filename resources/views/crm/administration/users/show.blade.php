@extends('crm._layout')

@section('title', 'User: ' . $subPage)

@section('content')
    <!-- User -->
    <div class="bg-white shadow rounded p-4 mb-5">

        <!-- Nav -->
        <nav class="d-flex justify-content-between align-items-center mb-4">
            <!-- Title -->
            <h5 class="m-0">User: {{ $subPage }}</h5>

            @can('update', 'App\Models\User')
                <a href="{{ route('crm.administration.users.edit', $user) }}"
                    @if ($user->id === 1) disabled style="pointer-events: none;" @endif
                    class="{{ $user->id === 1 ? 'bg-secondary' : 'bg-warning' }} rounded py-2 px-3 font-weight-bold text-white">
                    <i class="fas fa-pencil me-1"></i>
                    Edit
                </a>
            @endcan
        </nav>

        <!-- User Details -->
        <div class="d-flex flex-wrap justify-content-between align-items-center">
            <!-- Role -->
            <div class="d-flex flex-column w-48 mb-4">
                <label class="p-0 ms-0 mb-2 font-weight-medium fs-6 text-dark">
                    Role
                </label>
                <input type="text" class="outline-none p-2 W-48" value="{{ $user->role->name ?? '-' }}" disabled>
            </div>

            <!-- Company -->
            <div class="d-flex flex-column w-48 mb-4">
                <label class="p-0 ms-0 mb-2 font-weight-medium fs-6 text-dark">
                    Company
                </label>
                <input type="text" class="outline-none p-2 W-48" value="{{ $user->company->name ?? '-' }}" disabled>
            </div>

            <!-- Name -->
            <div class="d-flex flex-column w-48 mb-4">
                <label class="p-0 ms-0 mb-2 font-weight-medium fs-6 text-dark">
                    Name
                </label>
                <input type="text" class="outline-none p-2 W-48" value="{{ $user->name }}" disabled>
            </div>

            <!-- Surname -->
            <div class="d-flex flex-column w-48 mb-4">
                <label class="p-0 ms-0 mb-2 font-weight-medium fs-6 text-dark">
                    Surname
                </label>
                <input type="text" class="outline-none p-2 W-48" value="{{ $user->surname }}" disabled>
            </div>

            <!-- Email Address -->
            <div class="d-flex flex-column w-48 mb-4">
                <label class="p-0 ms-0 mb-2 font-weight-medium fs-6 text-dark">
                    Email Address
                </label>
                <input type="text" class="outline-none p-2 W-48" value="{{ $user->email }}" disabled>
            </div>

            <!-- Email Address Verified At -->
            <div class="d-flex flex-column w-48 mb-4">
                <label class="p-0 ms-0 mb-2 font-weight-medium fs-6 text-dark">
                    Email Address Verified At
                </label>
                <input type="text" class="outline-none p-2 W-48" value="{{ $user->formatted_email_verified_at ?? '-' }}"
                    disabled>
            </div>

            <!-- Created At -->
            <div class="d-flex flex-column w-48">
                <label class="p-0 ms-0 mb-2 font-weight-medium fs-6 text-dark">
                    Created At
                </label>
                <input type="text" class="outline-none p-2 W-48" value="{{ $user->formatted_created_at }}" disabled>
            </div>

            <!-- Updated At -->
            <div class="d-flex flex-column w-48">
                <label class="p-0 ms-0 mb-2 font-weight-medium fs-6 text-dark">
                    Updated At
                </label>
                <input type="text" class="outline-none p-2 W-48" value="{{ $user->formatted_updated_at }}" disabled>
            </div>
        </div>
    </div>

    <!-- Role -->
    @can('viewAny', 'App\Models\Role')
        <div class="bg-white shadow rounded p-4 mb-5">
            <h5 class="mb-3">Role</h5>

            <table class="table table-bordered table-striped table-hover table-responsive align-middle mt-2">
                <thead class="bg-secondary">
                    <tr>
                        <th class="text-center text-white text-sm text-uppercase">Id</th>
                        <th class="text-center text-white text-sm text-uppercase">Name</th>
                        <th class="text-center text-white text-sm text-uppercase">Description</th>
                        <th class="text-center text-white text-sm text-uppercase">Created At</th>
                        <th class="text-center text-white text-sm text-uppercase">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @if (!$user->role)
                        <tr>
                            <th colspan="6" class="p-3 text-center">
                                This user does not have a role!
                            </th>
                        </tr>
                    @else
                        <tr>
                            <th class="fw-normal text-center text-dark text-sm">
                                {{ $user->role->id }}
                            </th>
                            <th class="fw-normal text-center text-dark text-sm">
                                {{ $user->role->name }}
                            </th>
                            <th class="fw-normal text-center text-dark text-sm">
                                {{ $user->role->description }}
                            </th>
                            <th class="fw-normal text-center text-dark text-sm">
                                {{ $user->role->formatted_created_at }}
                            </th>
                            <th class="fw-normal text-center text-dark text-sm">
                                <div class="d-flex justify-content-center align-items-center">
                                    <a href="{{ route('crm.administration.roles.show', $user->role) }}"
                                        class="bg-info rounded py-1 px-2 font-weight-bold text-sm text-white me-2"
                                        data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="show-tooltip"
                                        data-bs-title="Show">
                                        <i class="fa-solid fa-eye"></i>
                                    </a>
                                    <a href="{{ route('crm.administration.roles.edit', $user->role) }}"
                                        class="bg-warning rounded py-1 px-2 font-weight-bold text-sm text-white me-2"
                                        data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="edit-tooltip"
                                        data-bs-title="Edit">
                                        <i class="fa-solid fa-pencil"></i>
                                    </a>
                                    <a type="button" data-id="{{ $user->role->id }}" data-type="role"
                                        @if ($user->role->id === 1) disabled style="pointer-events: none; cursor: not-allowed;" @endif
                                        class="{{ $user->role->id === 1 ? 'bg-secondary' : 'bg-danger' }} rounded py-1 px-2 border-0 font-weight-bold text-sm text-white"
                                        @if ($user->role->id !== 1) data-bs-placement="top" data-bs-custom-class="delete-tooltip"
                                    data-bs-title="Delete" data-bs-toggle="tooltip" @endif>
                                        <i class="fa-solid fa-trash"></i>
                                    </a>
                                </div>
                            </th>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    @endcan

    <!-- Company -->
    @can('viewAny', 'App\Models\Company')
        <div class="bg-white shadow rounded p-4">
            <h5 class="mb-3">Company</h5>

            <table class="table table-bordered table-striped table-hover table-responsive align-middle mt-2">
                <thead class="bg-secondary">
                    <tr>
                        <th class="text-center text-white text-sm text-uppercase">Id</th>
                        <th class="text-center text-white text-sm text-uppercase">Name</th>
                        <th class="text-center text-white text-sm text-uppercase">Email Address</th>
                        <th class="text-center text-white text-sm text-uppercase">Phone Number</th>
                        <th class="text-center text-white text-sm text-uppercase">Adress</th>
                        <th class="text-center text-white text-sm text-uppercase">Website</th>
                        <th class="text-center text-white text-sm text-uppercase">Created At</th>
                        <th class="text-center text-white text-sm text-uppercase">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @if (!$user->company)
                        <tr>
                            <th colspan="9" class="p-3 text-center">
                                This user does not have a company!
                            </th>
                        </tr>
                    @else
                        <tr>
                            <th class="fw-normal text-center text-dark text-sm">
                                {{ $user->company->id }}
                            </th>
                            <th class="fw-normal text-center text-dark text-sm">
                                {{ $user->company->name }}
                            </th>
                            <th class="fw-normal text-center text-dark text-sm">
                                {{ $user->company->email }}
                            </th>
                            <th class="fw-normal text-center text-dark text-sm">
                                {{ $user->company->phone }}
                            </th>
                            <th class="fw-normal text-center text-dark text-sm">
                                {{ $user->company->address }}
                            </th>
                            <th class="fw-normal text-center text-dark text-sm">
                                {{ $user->company->website }}
                            </th>
                            <th class="fw-normal text-center text-dark text-sm">
                                {{ $user->company->formatted_created_at }}
                            </th>
                            <th class="fw-normal text-center text-dark text-sm">
                                <div class="d-flex justify-content-center align-items-center">
                                    @can('view', 'App\Models\Company')
                                        <a href="{{ route('crm.administration.companies.show', $user->company) }}"
                                            class="bg-info rounded py-1 px-2 font-weight-bold text-sm text-white me-2"
                                            data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="show-tooltip"
                                            data-bs-title="Show">
                                            <i class="fa-solid fa-eye"></i>
                                        </a>
                                    @endcan
                                    @can('update', 'App\Models\Company')
                                        <a href="{{ route('crm.administration.companies.edit', $user->company) }}"
                                            class="bg-warning rounded py-1 px-2 font-weight-bold text-sm text-white me-2"
                                            data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="edit-tooltip"
                                            data-bs-title="Edit">
                                            <i class="fa-solid fa-pencil"></i>
                                        </a>
                                    @endcan
                                    @can('delete', 'App\Models\Company')
                                        <a type="button" data-id="{{ $user->company->id }}" data-type="company"
                                            class="bg-danger rounded py-1 px-2 border-0 font-weight-bold text-sm text-white"
                                            data-bs-placement="top" data-bs-custom-class="delete-tooltip" data-bs-title="Delete"
                                            data-bs-toggle="tooltip">
                                            <i class="fa-solid fa-trash"></i>
                                        </a>
                                    @endcan
                                </div>
                            </th>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    @endcan
@endsection

@section('scripts')
    <script>
        $('a[data-bs-title="Delete"]').on('click', function() {
            let title = '';
            let body = '';
            let action = '';
            if ($(this).data('type') == 'role') {
                title = 'Role';
                body = 'role';
                action = 'roles';
            } else {
                title = 'Company';
                body = 'company';
                action = 'companies';
            }
            $('#modal-delete .modal-title').text('Delete ' + title);
            $('#modal-delete .modal-body p').text(
                'Are you sure you want to delete this ' +
                body + '? All users associated with this ' + body + ' will also be deleted!'
            );
            $('#modal-delete .modal-footer form').attr('action', '/crm/administration/' + action + '/' +
                $(this).data('id'));
            $(".btn-delete-modal").click();
        });
    </script>
@endsection
