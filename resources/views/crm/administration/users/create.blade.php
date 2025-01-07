@extends('crm._layout')

@section('title', 'Create User')

@section('content')
    <div class="d-flex justify-content-between align-items-start">
        <!-- Create User -->
        <div class="bg-white shadow rounded p-4 w-48">
            <!-- Title -->
            <h5 class="mb-4">Create User</h5>

            <!-- Form -->
            <form action="{{ route('crm.administration.users.store') }}" method="POST" autocomplete="off">
                @csrf

                <div class="d-flex flex-wrap justify-content-between">
                    <!-- Role -->
                    <div class="d-flex flex-column w-100 mb-4">
                        <label for="role" class="p-0 ms-0 mb-2 font-weight-medium fs-6 text-dark">
                            Role
                            <span class="text-danger">*</span>
                        </label>
                        <select name="role" id="role" class="outline-none p-2 W-48">
                            <option value="0">Please select a role</option>
                            @foreach ($roles as $id => $name)
                                <option value="{{ $id }}" @if (old('role') == $id) selected @endif>
                                    {{ $name }}
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
                    <div class="@if (old('role') && old('role') > 1) d-flex @else d-none @endif flex-column w-100 mb-4">
                        <label for="company" class="p-0 ms-0 mb-2 font-weight-medium fs-6 text-dark">
                            Company
                            <span class="d-none text-danger">*</span>
                        </label>
                        <select name="company" id="company" class="outline-none p-2 W-48">
                            @if (auth()->user()->isAdmin())
                                <option value="0">Please select a company</option>
                            @endif
                            @foreach ($companies as $id => $name)
                                <option value="{{ $id }}" @if (old('company') == $id || (!auth()->user()->isAdmin() && auth()->user()->company_id == $id)) selected @endif>
                                    {{ $name }}
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
                    <div class="w-100 d-flex flex-column mb-4">
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

                    <!-- Password Confirmation -->
                    <div class="d-flex flex-column w-48 mb-4">
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
                            Create
                        </button>
                    </div>
                </div>
            </form>
        </div>

        <!-- Latest Users -->
        @if (count($latestUsers) > 0)
            <div class="bg-white shadow rounded p-4 w-48">
                <!-- Title -->
                <h5 class="mb-4">Latest Users</h5>

                <!-- Latest Users List -->
                <ul class="list-group">
                    @foreach ($latestUsers as $latestUser)
                        <li class="list-group-item">
                            <a href="{{ route('crm.administration.users.show', $latestUser) }}">
                                <div class="w-100 d-flex justify-content-between">
                                    <h6 class="mb-1">
                                        {{ $latestUser->fullName }}
                                        -
                                        <small class="font-weight-normal">
                                            {{ $latestUser->role->name }}
                                        </small>
                                    </h6>
                                    <small>{{ $latestUser->created_at_human }}</small>
                                </div>
                                <p class="m-0 text-xs">{{ $latestUser->email }}</p>
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
@endsection

@section('scripts')
    <script>
        $('#role').on('change', function() {
            @if (auth()->user()->isAdmin())
                $('#company').val('0');
            @endif
            ['2', '3'].includes(this.value) ? toggleCompanyField(1) : toggleCompanyField(0);
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
    </script>
@endsection
