@extends('crm._layout')

@section('title', 'Create Company')

@section('content')
    <div class="d-flex justify-content-between align-items-start">
        <!-- Create Company -->
        <div class="bg-white shadow rounded p-4 w-48">
            <!-- Title -->
            <h5 class="mb-4">Create Company</h5>

            <!-- Form -->
            <form action="{{ route('crm.administration.companies.store') }}" method="POST" autocomplete="off">
                @csrf

                <div class="d-flex flex-wrap justify-content-between align-items-start">
                    <!-- Name -->
                    <div class="d-flex flex-column w-100 mb-4">
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

                    <!-- Email Address -->
                    <div class="d-flex flex-column w-100 mb-4">
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

                    <!-- Website -->
                    <div class="d-flex flex-column w-48 mb-4">
                        <label for="website" class="p-0 ms-0 mb-2 font-weight-medium fs-6 text-dark">
                            Website
                            <span class="text-danger">*</span>
                        </label>
                        <input type="text" name="website" id="website" class="outline-none p-2 W-48"
                            placeholder="Please enter the website" value="{{ old('website') }}">
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
                            placeholder="Please enter the address" value="{{ old('address') }}">
                        @error('address')
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

        <!-- Latest Companies -->
        @if (count($latestCompanies) > 0)
            <div class="bg-white shadow rounded p-4 w-48">
                <!-- Title -->
                <h5 class="mb-4">Latest Companies</h5>

                <!-- Latest Companies List -->
                <ul class="list-group">
                    @foreach ($latestCompanies as $latestCompany)
                        <li class="list-group-item">
                            <a href="{{ route('crm.administration.companies.show', $latestCompany) }}">
                                <div class="w-100 d-flex justify-content-between">
                                    <h6 class="mb-1">{{ $latestCompany->name }}</h6>
                                    <small>{{ $latestCompany->created_at_human }}</small>
                                </div>
                                <p class="m-0 text-xs">{{ $latestCompany->website }}</p>
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
@endsection
