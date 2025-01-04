@extends('crm._layout')

@section('title', 'Edit Profile')

@section('content')
    <div class="d-flex justify-content-between align-items-start">
        <!-- Edit Profile -->
        <div class="bg-white shadow rounded p-4 w-48">
            <!-- Title -->
            <h5 class="mb-4">Edit Profile</h5>

            <!-- Form -->
            <form action="{{ route('crm.profile.update', $user) }}" method="POST" autocomplete="off">
                @csrf

                @method('PUT')

                <div class="d-flex flex-wrap justify-content-between">
                    <!-- Name -->
                    <div class="d-flex flex-column w-100 mb-4">
                        <label for="name" class="p-0 ms-0 mb-2 font-weight-medium fs-6 text-dark">
                            Name
                            <span class="text-danger">*</span>
                        </label>
                        <input type="text" name="name" id="name" class="outline-none p-2 W-48"
                            placeholder="Please enter the name" value="{{ old('name') ?? $user->name }}">
                        @error('name')
                            <small class="mt-1 ms-1 text-danger">
                                {{ $message }}
                            </small>
                        @enderror
                    </div>

                    <!-- Surname -->
                    <div class="d-flex flex-column w-100 mb-4">
                        <label for="surname" class="p-0 ms-0 mb-2 font-weight-medium fs-6 text-dark">
                            Surname
                            <span class="text-danger">*</span>
                        </label>
                        <input type="text" name="surname" id="surname" class="outline-none p-2 W-48"
                            placeholder="Please enter the surname" value="{{ old('surname') ?? $user->surname }}">
                        @error('surname')
                            <small class="mt-1 ms-1 text-danger">
                                {{ $message }}
                            </small>
                        @enderror
                    </div>

                    <!-- Email Address -->
                    <div class="w-100 d-flex flex-column mb-4">
                        <label for="email" class="p-0 ms-0 mb-2 font-weight-medium fs-6 text-dark">
                            Email Address
                            <span class="text-danger">*</span>
                        </label>
                        <input type="text" name="email" id="email" class="outline-none p-2 W-48"
                            placeholder="Please enter the email address" value="{{ old('email') ?? $user->email }}">
                        @error('email')
                            <small class="mt-1 ms-1 text-danger">
                                {{ $message }}
                            </small>
                        @enderror
                    </div>

                    <!-- Submit Button -->
                    <div>
                        <button type="submit" class="bg-success border-0 rounded py-2 px-4 font-weight-bold text-white">
                            Update Profile
                        </button>
                    </div>
                </div>
            </form>
        </div>

        <!-- Change Password -->
        <div class="bg-white shadow rounded p-4 w-48">
            <!-- Title -->
            <h5 class="mb-4">Change Password</h5>

            <!-- Form -->
            <form action="{{ route('crm.profile.change-password', $user) }}" method="POST" autocomplete="off">
                @csrf

                @method('PUT')

                <div class="d-flex flex-wrap justify-content-between">
                    <!-- Password -->
                    <div class="d-flex flex-column w-100 mb-4">
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

                    <!-- Password Confirmation -->
                    <div class="d-flex flex-column w-100 mb-4">
                        <label for="password-confirmation" class="p-0 ms-0 mb-2 font-weight-medium fs-6 text-dark">
                            Password Confirmation
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
                            Change Password
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
