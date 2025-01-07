@extends('crm._layout')

@section('title', 'Profile')

@section('content')
    <!-- Profile -->
    <div class="bg-white shadow rounded p-4 mb-5">

        <!-- Nav -->
        <nav class="d-flex justify-content-between align-items-center mb-4">
            <!-- Title -->
            <h5 class="m-0">Profile</h5>


            <a href="{{ route('crm.profile.edit', $user) }}"
                class="bg-warning rounded py-2 px-3 border-0 font-weight-bold text-white">
                <i class="fas fa-pencil me-1"></i>
                Edit
            </a>
        </nav>

        <!-- Profile Details -->
        <div class="d-flex flex-wrap justify-content-between align-items-center">
            <!-- Role -->
            <div class="d-flex flex-column mb-4 {{ $user->company ? 'w-48' : 'w-100' }}">
                <label class="p-0 ms-0 mb-2 font-weight-medium fs-6 text-dark">
                    Role
                </label>
                <input type="text" class="outline-none p-2 W-48" value="{{ $user->role->name ?? '-' }}" disabled>
            </div>

            <!-- Company -->
            @if ($user->company)
                <div class="d-flex flex-column w-48 mb-4">
                    <label class="p-0 ms-0 mb-2 font-weight-medium fs-6 text-dark">
                        Company
                    </label>
                    <input type="text" class="outline-none p-2 W-48" value="{{ $user->company->name ?? '-' }}" disabled>
                </div>
            @endif

            <!-- Name -->
            <div class="d-flex flex-column w-48 mb-4">
                <label for="name" class="p-0 ms-0 mb-2 font-weight-medium fs-6 text-dark">
                    Name
                </label>
                <input type="text" class="outline-none p-2 W-48" value="{{ $user->name }}" disabled>
            </div>

            <!-- Surname -->
            <div class="d-flex flex-column w-48 mb-4">
                <label for="surname" class="p-0 ms-0 mb-2 font-weight-medium fs-6 text-dark">
                    Surname
                </label>
                <input type="text" class="outline-none p-2 W-48" value="{{ $user->surname }}" disabled>
            </div>

            <!-- Email Address -->
            <div class="d-flex flex-column w-48 mb-4">
                <label for="email" class="p-0 ms-0 mb-2 font-weight-medium fs-6 text-dark">
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
@endsection
