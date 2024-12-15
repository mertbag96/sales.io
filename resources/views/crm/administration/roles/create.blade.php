@extends('crm._layout')

@section('title', 'Create Role')

@section('content')
    <div class="d-flex justify-content-between align-items-start">
        <!-- Create Role -->
        <div class="bg-white shadow rounded p-4 w-48">
            <!-- Title -->
            <h5 class="mb-4">Create Role</h5>

            <!-- Form -->
            <form action="{{ route('crm.administration.roles.store') }}" method="POST" autocomplete="off">
                @csrf

                <div class="d-flex flex-wrap justify-content-between align-items-center">
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

                    <!-- Description -->
                    <div class="d-flex flex-column w-100 mb-4">
                        <label for="description" class="p-0 ms-0 mb-2 font-weight-medium fs-6 text-dark">
                            Description
                            <span class="text-danger">*</span>
                        </label>
                        <input type="text" name="description" id="description" class="outline-none p-2 W-48"
                            placeholder="Please enter the description" value="{{ old('description') }}">
                        @error('description')
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

        <!-- Latest Roles -->
        @if (count($latestRoles) > 0)
            <div class="bg-white shadow rounded p-4 w-48">
                <!-- Title -->
                <h5 class="mb-4">Latest Roles</h5>

                <!-- Latest Roles List -->
                <ul class="list-group">
                    @foreach ($latestRoles as $latestRole)
                        <li class="list-group-item">
                            <a href="{{ route('crm.administration.roles.show', $latestRole) }}">
                                <div class="w-100 d-flex justify-content-between">
                                    <h6 class="mb-1">{{ $latestRole->name }}</h6>
                                    <small>{{ $latestRole->created_at_human }}</small>
                                </div>
                                <p class="m-0 text-xs">{{ $latestRole->description }}</p>
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
@endsection
