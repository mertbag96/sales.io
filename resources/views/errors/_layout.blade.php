<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
    <!-- Title -->
    <title>Sales.io CRM - @yield('title')</title>
    <!-- Fonts -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700,900" />
    <!-- Fonts -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@24,400,0,0" />
    <!-- CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <!-- Main -->
    <main class="bg-white w-full min-h-dvh flex flex-col justify-center items-center">
        <div class="mb-8">
            <a href="{{ route('crm.index') }}">
                <img src="{{ asset('logo.JPG') }}" alt="Logo" class="border-radius-sm" width="240">
            </a>
        </div>
        <div class="mb-8">
            <p class="m-0 font-medium text-black text-4xl text-center">
                {{ __('general.errors.oops') }}
            </p>
        </div>
        <div class="mb-8">
            <p class="m-0 font-bold text-black text-9xl text-center">
                @yield('code')
            </p>
        </div>
        <div>
            <p class="m-0 font-bold text-black text-4xl text-center">
                @yield('error')
            </p>
        </div>
    </main>
</body>

</html>
