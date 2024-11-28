<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Sales.io - @yield('title')</title>
</head>

<body class="py-24 flex justify-center items-center">
    <form action="@yield('action')" method="POST" class="w-1/5" autocomplete="off">
        @csrf
        <div class="mb-4 flex justify-center">
            <img src="{{ asset('logo.JPG') }}" alt="" width="144px">
        </div>
        @yield('content')
    </form>
</body>

</html>
