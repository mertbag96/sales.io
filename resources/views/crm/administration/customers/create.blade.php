@extends('crm._layout')

@section('title', 'Create Customer')

@section('content')
    <div class="d-flex justify-content-between align-items-start">
        <!-- Create Customer -->
        <div class="bg-white shadow rounded p-4 w-48">
            <!-- Title -->
            <h5 class="mb-4">Create Customer</h5>

            <!-- Form -->
            <form action="{{ route('crm.administration.customers.store') }}" method="POST" autocomplete="off">
                @csrf

                <div class="d-flex flex-wrap justify-content-between">
                    <!-- Name -->
                    <div class="d-flex flex-column w-48 mb-4">
                        <label for="name" class="p-0 ms-0 mb-2 font-weight-medium fs-6 text-dark">
                            Name
                            <span class="text-danger">*</span>
                        </label>
                        <input type="text" name="name" id="name" class="outline-none p-2 W-48"
                            placeholder="Please enter the name" value="{{ old('name') }}">
                        @error('name')
                            <small class="mt-1 ms-1 text-danger">
                                {{ $message }}
                            </small>
                        @enderror
                    </div>

                    <!-- Surname -->
                    <div class="d-flex flex-column w-48 mb-4">
                        <label for="surname" class="p-0 ms-0 mb-2 font-weight-medium fs-6 text-dark">
                            Surname
                            <span class="text-danger">*</span>
                        </label>
                        <input type="text" name="surname" id="surname" class="outline-none p-2 W-48"
                            placeholder="Please enter the surname" value="{{ old('surname') }}">
                        @error('surname')
                            <small class="mt-1 ms-1 text-danger">
                                {{ $message }}
                            </small>
                        @enderror
                    </div>

                    <!-- Email Address -->
                    <div class="d-flex flex-column w-48 mb-4">
                        <label for="email" class="p-0 ms-0 mb-2 font-weight-medium fs-6 text-dark">
                            Email Address
                            <span class="text-danger">*</span>
                        </label>
                        <input type="text" name="email" id="email" class="outline-none p-2 W-48"
                            placeholder="Please enter the email address" value="{{ old('email') }}">
                        @error('email')
                            <small class="mt-1 ms-1 text-danger">
                                {{ $message }}
                            </small>
                        @enderror
                    </div>

                    <!-- Phone Number -->
                    <div class="d-flex flex-column w-48 mb-4">
                        <label for="phone" class="p-0 ms-0 mb-2 font-weight-medium fs-6 text-dark">
                            Phone Number
                            <span class="text-danger">*</span>
                        </label>
                        <input type="text" name="phone" id="phone" class="outline-none p-2 W-48"
                            placeholder="Please enter the phone number" value="{{ old('phone') }}">
                        @error('phone')
                            <small class="mt-1 ms-1 text-danger">
                                {{ $message }}
                            </small>
                        @enderror
                    </div>

                    <!-- Address -->
                    <div class="d-flex flex-column w-100 mb-4">
                        <label for="address" class="p-0 ms-0 mb-2 font-weight-medium fs-6 text-dark">
                            Address
                            <span class="text-danger">*</span>
                        </label>
                        <input type="text" name="address" id="address" class="outline-none p-2 W-48"
                            placeholder="Please enter the address" value="{{ old('address') }}">
                        @error('address')
                            <small class="mt-1 ms-1 text-danger">
                                {{ $message }}
                            </small>
                        @enderror
                    </div>

                    <!-- Password -->
                    <div class="d-flex flex-column w-48 mb-4">
                        <label for="password" class="p-0 ms-0 mb-2 font-weight-medium fs-6 text-dark">
                            Password
                            <span class="text-danger">*</span>
                        </label>
                        <input type="password" name="password" id="password" class="outline-none p-2 W-48"
                            placeholder="Please enter the password">
                        @error('password')
                            <small class="mt-1 ms-1 text-danger">
                                {{ $message }}
                            </small>
                        @enderror
                    </div>

                    <!-- Confirm Password -->
                    <div class="d-flex flex-column w-48 mb-4">
                        <label for="password-confirmation" class="p-0 ms-0 mb-2 font-weight-medium fs-6 text-dark">
                            Confirm Password
                            <span class="text-danger">*</span>
                        </label>
                        <input type="password" name="password_confirmation" id="password-confirmation"
                            class="outline-none p-2 W-48" placeholder="Please confirm the password">
                        @error('password_confirmation')
                            <small class="mt-1 ms-1 text-danger">
                                {{ $message }}
                            </small>
                        @enderror
                    </div>

                    <!-- Submit Button -->
                    <div>
                        <button type="submit" class="bg-success border-0 rounded py-2 px-4 font-weight-bold text-white">
                            Create
                        </button>
                    </div>
                </div>
            </form>
        </div>

        <!-- Latest Customers -->
        @if (count($latestCustomers) > 0)
            <div class="bg-white shadow rounded p-4 w-48">
                <!-- Title -->
                <h5 class="mb-4">Latest Customers</h5>

                <!-- Latest Customers List -->
                <ul class="list-group">
                    @foreach ($latestCustomers as $latestCustomer)
                        <li class="list-group-item">
                            <a href="{{ route('crm.administration.customers.show', $latestCustomer) }}">
                                <div class="w-100 d-flex justify-content-between">
                                    <h6 class="mb-1">
                                        {{ $latestCustomer->user->fullName }}
                                    </h6>
                                    <small>{{ $latestCustomer->user->created_at_human }}</small>
                                </div>
                                <p class="m-0 text-xs">{{ $latestCustomer->user->email }}</p>
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
@endsection
