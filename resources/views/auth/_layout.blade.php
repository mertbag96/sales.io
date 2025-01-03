<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="//unpkg.com/alpinejs" defer></script>
    <title>Sales.io - @yield('title')</title>
</head>

<body>
    <div class="flex justify-center items-center min-h-dvh">
        <form action="@yield('action')" method="POST" class="w-1/5" autocomplete="off">
            @csrf
            <div class="mb-4 flex justify-center">
                <img src="{{ asset('logo.JPG') }}" alt="" width="144px">
            </div>
            @yield('content')
        </form>
    </div>

    @if (session('success'))
        <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 5000)" x-show="show"
            class="bg-green-400 fixed top-4 right-4 py-2 px-4 rounded-sm shadow-lg transition-opacity duration-500"
            x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100" x-transition:leave="ease-in duration-300"
            x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">
            {{ session('success') }}
        </div>
    @endif
</body>

</html>
