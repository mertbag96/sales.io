<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Sales.io - @yield('title')</title>
</head>

<body class="py-24 flex justify-center items-center">
    <form action="@yield('action')" method="POST" class="w-1/5" autocomplete="off">
        @csrf
        <div class="mb-4">
            <h3 class="font-bold text-3xl text-center">Sales.io</h3>
        </div>
        @yield('content')
    </form>
</body>

</html>
