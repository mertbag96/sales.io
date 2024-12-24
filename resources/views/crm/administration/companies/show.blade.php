@extends('crm._layout')

@section('title', 'Company: ' . $subPage)

@section('content')
    <!-- Company -->
    <div class="bg-white shadow rounded p-4 mb-5">

        <!-- Nav -->
        <nav class="d-flex justify-content-between align-items-center mb-4">
            <!-- Title -->
            <h5 class="m-0">Company: {{ $subPage }}</h5>

            @can('update', 'App\Models\Company')
                <a href="{{ route('crm.administration.companies.edit', $company) }}"
                    class="bg-warning rounded py-2 px-3 font-weight-bold text-white">
                    <i class="fas fa-pencil me-1"></i>
                    Edit
                </a>
            @endcan
        </nav>

        <!-- Company Details -->
        <div class="d-flex flex-wrap justify-content-between align-items-center">
            <!-- Name -->
            <div class="d-flex flex-column w-48 mb-4">
                <label class="p-0 ms-0 mb-2 font-weight-medium fs-6 text-dark">
                    Name
                </label>
                <input type="text" class="outline-none p-2 W-48" value="{{ $company->name }}" disabled>
            </div>

            <!-- Email Address -->
            <div class="d-flex flex-column w-48 mb-4">
                <label class="p-0 ms-0 mb-2 font-weight-medium fs-6 text-dark">
                    Email Address
                </label>
                <input type="text" class="outline-none p-2 W-48" value="{{ $company->email }}" disabled>
            </div>

            <!-- Phone Number -->
            <div class="d-flex flex-column w-48 mb-4">
                <label class="p-0 ms-0 mb-2 font-weight-medium fs-6 text-dark">
                    Phone Number
                </label>
                <input type="text" class="outline-none p-2 W-48" value="{{ $company->phone }}" disabled>
            </div>

            <!-- Website -->
            <div class="d-flex flex-column w-48 mb-4">
                <label class="p-0 ms-0 mb-2 font-weight-medium fs-6 text-dark">
                    Website
                </label>
                <input type="text" class="outline-none p-2 W-48" value="{{ $company->website }}" disabled>
            </div>

            <!-- Address -->
            <div class="d-flex flex-column w-100 mb-4">
                <label class="p-0 ms-0 mb-2 font-weight-medium fs-6 text-dark">
                    Address
                </label>
                <input type="text" class="outline-none p-2 W-48" value="{{ $company->address }}" disabled>
            </div>

            <!-- Created At -->
            <div class="d-flex flex-column w-48">
                <label class="p-0 ms-0 mb-2 font-weight-medium fs-6 text-dark">
                    Created At
                </label>
                <input type="text" class="outline-none p-2 W-48" value="{{ $company->formatted_created_at }}" disabled>
            </div>

            <!-- Updated At -->
            <div class="d-flex flex-column w-48">
                <label class="p-0 ms-0 mb-2 font-weight-medium fs-6 text-dark">
                    Updated At
                </label>
                <input type="text" class="outline-none p-2 W-48" value="{{ $company->formatted_updated_at }}" disabled>
            </div>
        </div>
    </div>

    <!-- Users -->
    @can('viewAny', 'App\Models\User')
        <div class="bg-white shadow rounded p-4 mb-5">
            <h5 class="mb-3">{{ $subPage }} Users</h5>

            <table class="table table-bordered table-striped table-hover table-responsive align-middle mt-2">
                <thead class="bg-secondary">
                    <tr>
                        <th class="text-center text-white text-sm text-uppercase">Id</th>
                        <th class="text-center text-white text-sm text-uppercase">Role</th>
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
                            <th colspan="7" class="p-3 text-center">
                                There are no users associated with this company!
                            </th>
                        </tr>
                    @else
                        @foreach ($users as $user)
                            <tr @if ($user->role->id == 2) style="background-color: #D8DEE9;" @endif>
                                <th class="fw-normal text-center text-dark text-sm">
                                    {{ $user->id }}
                                </th>
                                <th class="fw-normal text-center text-dark text-sm">
                                    {{ $user->role->name }}
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
                                        @can('view', 'App\Models\User')
                                            <a href="{{ route('crm.administration.users.show', $user) }}"
                                                class="bg-info rounded py-1 px-2 font-weight-bold text-sm text-white me-2"
                                                data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="show-tooltip"
                                                data-bs-title="Show">
                                                <i class="fa-solid fa-eye"></i>
                                            </a>
                                        @endcan
                                        @can('update', 'App\Models\User')
                                            <a href="{{ route('crm.administration.users.edit', $user) }}"
                                                class="bg-warning rounded py-1 px-2 font-weight-bold text-sm text-white me-2"
                                                data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="edit-tooltip"
                                                data-bs-title="Edit">
                                                <i class="fa-solid fa-pencil"></i>
                                            </a>
                                        @endcan
                                        @can('delete', 'App\Models\User')
                                            <a type="button" data-id="{{ $user->id }}"
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
