@extends('crm._layout')

@section('title', 'Edit Company: ' . $subPage)

@section('content')
    <!-- Edit Company -->
    <div class="bg-white shadow rounded p-4 w-48">
        <!-- Title -->
        <h5 class="mb-4">Edit Company: {{ $subPage }}</h5>

        <!-- Form -->
        <form action="{{ route('crm.administration.companies.update', $company) }}" method="POST" autocomplete="off">
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
                        placeholder="Please enter the name" value="{{ old('name') ?? $company->name }}">
                    @error('name')
                        <small class="mt-1 ms-1 text-danger">
                            {{ $message }}
                        </small>
                    @enderror
                </div>

                <!-- Email Address -->
                <div class="d-flex flex-column w-100 mb-4">
                    <label for="email" class="p-0 ms-0 mb-2 font-weight-medium fs-6 text-dark">
                        Email Address
                        <span class="text-danger">*</span>
                    </label>
                    <input type="text" name="email" id="email" class="outline-none p-2 W-48"
                        placeholder="Please enter the email address" value="{{ old('email') ?? $company->email }}">
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
                        placeholder="Please enter the phone number" value="{{ old('phone') ?? $company->phone }}">
                    @error('phone')
                        <small class="mt-1 ms-1 text-danger">
                            {{ $message }}
                        </small>
                    @enderror
                </div>

                <!-- Website -->
                <div class="d-flex flex-column w-48 mb-4">
                    <label for="website" class="p-0 ms-0 mb-2 font-weight-medium fs-6 text-dark">
                        Website
                        <span class="text-danger">*</span>
                    </label>
                    <input type="text" name="website" id="website" class="outline-none p-2 W-48"
                        placeholder="Please enter the website" value="{{ old('website') ?? $company->website }}">
                    @error('website')
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
                        placeholder="Please enter the address" value="{{ old('address') ?? $company->address }}">
                    @error('address')
                        <small class="mt-1 ms-1 text-danger">
                            {{ $message }}
                        </small>
                    @enderror
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
