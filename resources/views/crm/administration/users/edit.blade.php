@extends('crm._layout')

@section('title', 'Edit User: ' . $subPage)

@section('content')
    <!-- Edit User -->
    <div class="bg-white shadow rounded p-4 w-48">
        <!-- Title -->
        <h5 class="mb-4">Edit User: {{ $subPage }}</h5>

        <!-- Form -->
        <form action="{{ route('crm.administration.users.update', $user) }}" method="POST" autocomplete="off">
            @csrf

            @method('PUT')

            <div class="d-flex flex-wrap justify-content-between">
                <!-- Role -->
                <div class="d-flex flex-column w-100 mb-4">
                    <label for="role" class="p-0 ms-0 mb-2 font-weight-medium fs-6 text-dark">
                        Role
                        <span class="text-danger">*</span>
                    </label>
                    <select name="role" id="role" class="outline-none p-2 W-48">
                        <option value="0">
                            Please select a role
                        </option>
                        @foreach ($roles as $role)
                            <option value="{{ $role->id }}" @if ($user->role && $user->role_id == $role->id) selected @endif>
                                {{ $role->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('role')
                        <small class="mt-1 ms-1 text-danger">
                            {{ $message }}
                        </small>
                    @enderror
                </div>

                <!-- Company -->
                <div class="{{ $user->role && $user->company ? 'd-flex' : 'd-none' }} flex-column w-100 mb-4">
                    <label for="company" class="p-0 ms-0 mb-2 font-weight-medium fs-6 text-dark">
                        Company
                        <span class="d-none text-danger">*</span>
                    </label>
                    <select name="company" id="company" class="outline-none p-2 W-48">
                        <option value="0">Please select a company</option>
                        @foreach ($companies as $company)
                            <option value="{{ $company->id }}" @if ($user->company && $user->company_id == $company->id) selected @endif>
                                {{ $company->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('company')
                        <small class="mt-1 ms-1 text-danger">
                            {{ $message }}
                        </small>
                    @enderror
                </div>

                <!-- Name -->
                <div class="d-flex flex-column w-48 mb-4">
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
                <div class="d-flex flex-column w-48 mb-4">
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
        $('#role').on('change', function() {
            $('#company').val('0');
            ['2', '3'].includes(this.value) ? toggleCompanyField(1) : toggleCompanyField(0);
        });

        $('#change-password').on('change', function() {
            this.checked ? togglePasswordSection(1) : togglePasswordSection(0);
        });

        function toggleCompanyField(type) {
            if (type == 1) {
                $('#company').parent().removeClass('d-none').addClass('d-flex');
                $('#company').siblings('label').find('span').removeClass('d-none');
            } else {
                $('#company').parent().removeClass('d-flex').addClass('d-none');
                $('#company').siblings('label').find('span').addClass('d-none');
            }
        }

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
