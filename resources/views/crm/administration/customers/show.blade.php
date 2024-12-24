@extends('crm._layout')

@section('title', 'Customer: ' . $subPage)

@section('content')
    <!-- Customer -->
    <div class="bg-white shadow rounded p-4">

        <!-- Nav -->
        <nav class="d-flex justify-content-between align-items-center mb-4">
            <!-- Title -->
            <h5 class="m-0">Customer: {{ $subPage }}</h5>

            @can('update', 'App\Models\Customer')
                <a href="{{ route('crm.administration.customers.edit', $customer) }}"
                    class="bg-warning rounded py-2 px-3 font-weight-bold text-white">
                    <i class="fas fa-pencil me-1"></i>
                    Edit
                </a>
            @endcan
        </nav>

        <!-- Customer Details -->
        <div class="d-flex flex-wrap justify-content-between align-items-center">
            <!-- Name -->
            <div class="d-flex flex-column w-48 mb-4">
                <label class="p-0 ms-0 mb-2 font-weight-medium fs-6 text-dark">
                    Name
                </label>
                <input type="text" class="outline-none p-2 W-48" value="{{ $customer->user->name }}" disabled>
            </div>

            <!-- Surname -->
            <div class="d-flex flex-column w-48 mb-4">
                <label class="p-0 ms-0 mb-2 font-weight-medium fs-6 text-dark">
                    Surname
                </label>
                <input type="text" class="outline-none p-2 W-48" value="{{ $customer->user->surname }}" disabled>
            </div>

            <!-- Email Address -->
            <div class="d-flex flex-column w-48 mb-4">
                <label class="p-0 ms-0 mb-2 font-weight-medium fs-6 text-dark">
                    Email Address
                </label>
                <input type="text" class="outline-none p-2 W-48" value="{{ $customer->user->email }}" disabled>
            </div>

            <!-- Phone Number -->
            <div class="d-flex flex-column w-48 mb-4">
                <label class="p-0 ms-0 mb-2 font-weight-medium fs-6 text-dark">
                    Phone Number
                </label>
                <input type="text" class="outline-none p-2 W-48" value="{{ $customer->phone }}" disabled>
            </div>

            <!-- Address -->
            <div class="d-flex flex-column w-100 mb-4">
                <label class="p-0 ms-0 mb-2 font-weight-medium fs-6 text-dark">
                    Address
                </label>
                <input type="text" class="outline-none p-2 W-48" value="{{ $customer->address }}" disabled>
            </div>

            <!-- Created At -->
            <div class="d-flex flex-column w-48">
                <label class="p-0 ms-0 mb-2 font-weight-medium fs-6 text-dark">
                    Created At
                </label>
                <input type="text" class="outline-none p-2 W-48" value="{{ $customer->user->formatted_created_at }}"
                    disabled>
            </div>

            <!-- Updated At -->
            <div class="d-flex flex-column w-48">
                <label class="p-0 ms-0 mb-2 font-weight-medium fs-6 text-dark">
                    Updated At
                </label>
                <input type="text" class="outline-none p-2 W-48" value="{{ $customer->user->formatted_updated_at }}"
                    disabled>
            </div>
        </div>
    </div>
@endsection
