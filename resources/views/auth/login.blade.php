@extends('auth._layout')

@section('title', 'Login')

@section('action')
    {{ route('auth.doLogin') }}
@endsection

@section('content')
    <div class="flex flex-col mb-4">
        <label for="email" class="mb-1 font-medium">
            {{ __('auth.email') }}
            <span class="text-red-600">*</span>
        </label>
        <input type="text" name="email" id="email" class="border-2 border-black p-2"
            placeholder="{{ __('auth.email') }}" value="{{ old('email') }}">
        @error('email')
            <small class="mt-1 font-medium text-xs italic text-red-600">{{ $message }}</small>
        @enderror
    </div>
    <div class="flex flex-col mb-4">
        <label for="password" class="mb-1 font-medium">
            {{ __('auth.password') }}
            <span class="text-red-600">*</span>
        </label>
        <input type="password" name="password" id="password" class="border-2 border-black p-2"
            placeholder="{{ __('auth.password') }}">
        @error('password')
            <small class="mt-1 font-medium text-xs italic text-red-600">{{ $message }}</small>
        @enderror
    </div>
    <div class="flex flex-col mb-6">
        <button type="submit" class="bg-black border-2 border-black shadow-sm p-2 font-bold text-white">
            {{ __('auth.login') }}
        </button>
    </div>
    <div class="flex flex-col">
        <a href="{{ route('auth.register') }}" class="underline font-medium text-center">
            {{ __('auth.register') }}
        </a>
    </div>
@endsection
