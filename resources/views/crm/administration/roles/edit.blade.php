@extends('crm._layout')

@section('title', 'Edit Role: ' . $subPage)

@section('content')
    <div class="d-flex justify-content-between align-items-start">
        <!-- Edit Role -->
        <div class="bg-white shadow rounded w-48 p-4">
            <!-- Title -->
            <h5 class="mb-4">Edit Role: {{ $subPage }}</h5>

            <!-- Form -->
            <form action="{{ route('crm.administration.roles.update', $role) }}" method="POST" autocomplete="off">
                @csrf

                @method('PUT')

                <div class="d-flex flex-wrap justify-content-between align-items-start">
                    <!-- Name -->
                    <div class="d-flex flex-column w-100 mb-4">
                        <label for="name" class="p-0 ms-0 mb-2 font-weight-medium fs-6 text-dark">
                            Name
                            <span class="text-danger">*</span>
                        </label>
                        <input type="text" name="name" id="name" class="outline-none p-2 W-48"
                            placeholder="Please enter the name" value="{{ old('name') ?? $role->name }}">
                        @error('name')
                            <small class="mt-1 ms-1 text-danger">
                                {{ $message }}
                            </small>
                        @enderror
                    </div>

                    <!-- Description -->
                    <div class="d-flex flex-column w-100 mb-4">
                        <label for="description" class="p-0 ms-0 mb-2 font-weight-medium fs-6 text-dark">
                            Description
                            <span class="text-danger">*</span>
                        </label>
                        <input type="text" name="description" id="description" class="outline-none p-2 W-48"
                            placeholder="Please enter the description"
                            value="{{ old('description') ?? $role->description }}">
                        @error('description')
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
    </div>
@endsection
