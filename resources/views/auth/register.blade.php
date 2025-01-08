@extends('auth._layout')

@section('title', 'Register')

@section('action')
    {{ route('auth.doRegister') }}
@endsection

@section('content')
    <div class="flex flex-col mb-4">
        <label for="name" class="mb-1 font-medium">
            {{ __('auth.name') }}
            <span class="text-red-600">*</span>
        </label>
        <input type="text" name="name" id="name" class="border-2 border-black p-2" placeholder="{{ __('auth.name') }}"
            value="{{ old('name') }}">
        @error('name')
            <small class="mt-1 font-medium text-xs italic text-red-600">{{ $message }}</small>
        @enderror
    </div>
    <div class="flex flex-col mb-4">
        <label for="surname" class="mb-1 font-medium">
            {{ __('auth.surname') }}
            <span class="text-red-600">*</span>
        </label>
        <input type="text" name="surname" id="surname" class="border-2 border-black p-2"
            placeholder="{{ __('auth.surname') }}" value="{{ old('surname') }}">
        @error('surname')
            <small class="mt-1 font-medium text-xs italic text-red-600">{{ $message }}</small>
        @enderror
    </div>
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
    <div class="flex flex-col mb-4">
        <div class="flex items-start">
            <input type="checkbox" name="check" id="check" class="mt-2" style="accent-color: black;"
                @if (old('check') === 'on') checked @endif>
            <label for="check" class="ms-2 font-medium">{{ __('auth.terms_and_conditions') }}</label>
        </div>
        @error('check')
            <div class="w-full">
                <small class="font-medium text-xs italic text-red-600">{{ $message }}</small>
            </div>
        @enderror
    </div>
    <div class="flex flex-col mb-6">
        <button type="submit" class="bg-black border-2 border-black shadow-sm p-2 font-bold text-white">
            {{ __('auth.register') }}
        </button>
    </div>
    <div class="flex flex-col">
        <a href="{{ route('auth.login') }}" class="underline font-medium text-center">
            {{ __('auth.login') }}
        </a>
    </div>
@endsection
