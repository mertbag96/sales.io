@extends('crm._layout')

@section('title', 'Edit Customer: ' . $subPage)

@section('content')
    <!-- Edit User -->
    <div class="bg-white shadow rounded p-4 w-48">
        <!-- Title -->
        <h5 class="mb-4">Edit Customer: {{ $subPage }}</h5>

        <!-- Form -->
        <form action="{{ route('crm.administration.customers.update', $customer) }}" method="POST" autocomplete="off">
            @csrf

            @method('PUT')

            <div class="d-flex flex-wrap justify-content-between">
                <!-- Name -->
                <div class="d-flex flex-column w-48 mb-4">
                    <label for="name" class="p-0 ms-0 mb-2 font-weight-medium fs-6 text-dark">
                        Name
                        <span class="text-danger">*</span>
                    </label>
                    <input type="text" name="name" id="name" class="outline-none p-2 W-48"
                        placeholder="Please enter the name" value="{{ old('name') ?? $customer->user->name }}">
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
                        placeholder="Please enter the surname" value="{{ old('surname') ?? $customer->user->surname }}">
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
                        placeholder="Please enter the email address" value="{{ old('email') ?? $customer->user->email }}">
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
                        placeholder="Please enter the phone number" value="{{ old('phone') ?? $customer->phone }}">
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
                        placeholder="Please enter the address" value="{{ old('address') ?? $customer->address }}">
                    @error('address')
                        <small class="mt-1 ms-1 text-danger">
                            {{ $message }}
                        </small>
                    @enderror
                </div>

                <!-- Change Password -->
                <div class="w-100 d-flex align-items-center mb-4">
                    <input type="checkbox" name="change_password" id="change-password" class="cursor-pointer"
                        style="width: 1rem; height: 1rem; accent-color: black;" @error('password') checked @enderror
                        @error('password_confirmation') checked @enderror>
                    <label for="change-password" class="p-0 ms-2 mb-0 font-weight-medium fs-6 text-dark cursor-pointer">
                        Change password
                    </label>
                </div>

                <!-- Password Section -->
                <div
                    class="password-section w-100 @error('password') d-flex @else d-none @enderror justify-content-between align-items-start mb-4">
                    <!-- Password -->
                    <div class="d-flex flex-column w-48">
                        <label for="password" class="p-0 ms-0 mb-2 font-weight-medium fs-6 text-dark">
                            Password
                            <span class="text-danger">*</span>
                        </label>
                        <input type="password" name="password" id="password" class="outline-none p-2 W-48"
                            placeholder="Please enter the password" @error('password') @else disabled @enderror>
                        @error('password')
                            <small class="mt-1 ms-1 text-danger">
                                {{ $message }}
                            </small>
                        @enderror
                    </div>

                    <!-- Password Confirmation -->
                    <div class="d-flex flex-column w-48">
                        <label for="password-confirmation" class="p-0 ms-0 mb-2 font-weight-medium fs-6 text-dark">
                            Password Confirmation
                            <span class="text-danger">*</span>
                        </label>
                        <input type="password" name="password_confirmation" id="password-confirmation"
                            class="outline-none p-2 W-48" placeholder="Please confirm the password"
                            @error('password_confirmation') @else disabled @enderror>
                        @error('password_confirmation')
                            <small class="mt-1 ms-1 text-danger">
                                {{ $message }}
                            </small>
                        @enderror
                    </div>
                </div>

                <!-- Submit Button -->
                <div>
                    <button type="submit" class="bg-success border-0 rounded py-2 px-4 font-weight-bold text-white">
                        Update
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection

@section('scripts')
    <script>
        $('#change-password').on('change', function() {
            this.checked ? togglePasswordSection(1) : togglePasswordSection(0);
        });

        function togglePasswordSection(type) {
            const passwordSection = $('.password-section');
            const password = $('#password');
            const passwordConfirmation = $('#password-confirmation');

            if (type == 1) {
                passwordSection.removeClass('d-none').addClass('d-flex');
                password.prop('disabled', false);
                passwordConfirmation.prop('disabled', false);
            } else {
                passwordSection.removeClass('d-flex').addClass('d-none');
                password.prop('disabled', true);
                passwordConfirmation.prop('disabled', true);
            }
        }
    </script>
@endsection
