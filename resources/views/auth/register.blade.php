@extends('auth._layout')

@section('title', 'Register')

@section('action')
    {{ route('auth.doRegister') }}
@endsection

@section('content')
    <div class="flex flex-col mb-4">
        <label for="name" class="mb-1 font-medium">
            Name
            <span class="text-red-600">*</span>
        </label>
        <input type="text" name="name" id="name" class="border-2 border-black p-2" placeholder="Name"
            value="{{ old('name') }}">
        @error('name')
            <small class="mt-1 font-medium text-xs text-red-600">{{ $message }}</small>
        @enderror
    </div>
    <div class="flex flex-col mb-4">
        <label for="surname" class="mb-1 font-medium">
            Surname
            <span class="text-red-600">*</span>
        </label>
        <input type="text" name="surname" id="surname" class="border-2 border-black p-2" placeholder="Surname"
            value="{{ old('surname') }}">
        @error('surname')
            <small class="mt-1 font-medium text-xs text-red-600">{{ $message }}</small>
        @enderror
    </div>
    <div class="flex flex-col mb-4">
        <label for="email" class="mb-1 font-medium">
            Email
            <span class="text-red-600">*</span>
        </label>
        <input type="text" name="email" id="email" class="border-2 border-black p-2" placeholder="Email"
            value="{{ old('email') }}">
        @error('email')
            <small class="mt-1 font-medium text-xs text-red-600">{{ $message }}</small>
        @enderror
    </div>
    <div class="flex flex-col mb-4">
        <label for="password" class="mb-1 font-medium">
            Password
            <span class="text-red-600">*</span>
        </label>
        <input type="password" name="password" id="password" class="border-2 border-black p-2" placeholder="Password">
        @error('password')
            <small class="mt-1 font-medium text-xs text-red-600">{{ $message }}</small>
        @enderror
    </div>
    <div class="flex flex-wrap mb-4">
        <input type="checkbox" name="check" id="check" style="accent-color: black;"
            @if (old('check') === 'on') checked @endif>
        <label for="check" class="ms-2 font-medium">I read and accept the terms and conditions.</label>
        @error('check')
            <div class="w-full">
                <small class="font-medium text-xs text-red-600">{{ $message }}</small>
            </div>
        @enderror
    </div>
    <div class="flex flex-col mb-6">
        <button type="submit" class="bg-black border-2 border-black shadow-sm p-2 font-bold text-white">Register</button>
    </div>
    <div class="flex flex-col">
        <a href="{{ route('auth.login') }}" class="underline font-medium text-center">Login</a>
    </div>
@endsection
