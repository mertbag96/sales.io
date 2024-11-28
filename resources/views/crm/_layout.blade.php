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
    <!-- Nucleo Icons -->
    <link rel="stylesheet" href="{{ asset('assets/css/nucleo-icons.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/nucleo-svg.css') }}" />
    <!-- Fontawesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <!-- Fonts -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@24,400,0,0" />
    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/material-dashboard.css?v=3.2.0') }}" id="pagestyle" />
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" />
</head>

<body class="g-sidenav-show bg-gray-100">
    <!-- Aside Menu -->
    <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-radius-lg fixed-start ms-2 bg-white my-2"
        id="sidenav-main">
        <!-- Menu Header -->
        <div class="sidenav-header">
            <a class="navbar-brand px-4 py-3 m-0 d-flex justify-content-center align-items-center"
                href="{{ route('crm.index') }}">
                <img src="{{ asset('logo.JPG') }}" alt="Logo" class="border-radius-sm">
            </a>
        </div>

        <hr class="horizontal dark mt-0 mb-2">

        <!-- Menu -->
        <div class="collapse navbar-collapse w-auto" id="sidenav-collapse-main">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link text-dark active" href="{{ route('crm.index') }}">
                        <i class="material-symbols-rounded opacity-5">dashboard</i>
                        <span class="nav-link-text ms-1">Dashboard</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link text-dark" href="{{ route('crm.index') }}">
                        <i class="material-symbols-rounded opacity-5">table_view</i>
                        <span class="nav-link-text ms-1">Link 2</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link text-dark" href="{{ route('crm.index') }}">
                        <i class="material-symbols-rounded opacity-5">receipt_long</i>
                        <span class="nav-link-text ms-1">Link 3</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link text-dark" href="{{ route('crm.index') }}">
                        <i class="material-symbols-rounded opacity-5">view_in_ar</i>
                        <span class="nav-link-text ms-1">Link 4</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link text-dark" href="{{ route('crm.index') }}">
                        <i class="material-symbols-rounded opacity-5">notifications</i>
                        <span class="nav-link-text ms-1">Link 5</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link text-dark" href="{{ route('crm.index') }}">
                        <i class="material-symbols-rounded opacity-5">assignment</i>
                        <span class="nav-link-text ms-1">Link 6</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link text-dark" href="{{ route('crm.index') }}">
                        <i class="material-symbols-rounded opacity-5">home</i>
                        <span class="nav-link-text ms-1">Link 7</span>
                    </a>
                </li>

                <li class="nav-item mt-3">
                    <h6 class="ps-4 ms-2 text-uppercase text-xs text-dark font-weight-bolder opacity-5">
                        Account
                    </h6>
                </li>

                <li class="nav-item">
                    <a class="nav-link text-dark" href="{{ route('crm.index') }}">
                        <i class="material-symbols-rounded opacity-5">person</i>
                        <span class="nav-link-text ms-1">Profile</span>
                    </a>
                </li>

                <li class="nav-item">
                    <form action="{{ route('crm.logout') }}" method="POST" id="logoutForm">
                        @csrf
                        <a type="button" class="nav-link text-dark"
                            onclick="document.getElementById('logoutForm').submit();">
                            <i class="material-symbols-rounded opacity-5">logout</i>
                            <span class="nav-link-text ms-1">Logout</span>
                        </a>
                    </form>
                </li>
            </ul>
        </div>

        <!-- Menu Footer -->
        <div class="sidenav-footer position-absolute w-100 bottom-0">
            <div class="mx-3">
                <a class="btn btn-outline-dark mt-4 w-100" href="#">
                    Link 1
                </a>
                <a class="btn bg-gradient-dark w-100" href="#">
                    Link 2
                </a>
            </div>
        </div>
    </aside>

    <!-- Main -->
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg">
        <!-- Navbar -->
        <nav class="mt-2 fixed navbar navbar-main navbar-expand-lg px-0 mx-3 shadow-none border-radius-xl">
            <div class="container-fluid py-1 px-3">
                <!-- Breadcrumb -->
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                        <li class="breadcrumb-item text-sm">
                            <a class="opacity-5 text-dark" href="javascript:;">
                                CRM
                            </a>
                        </li>
                        <li class="breadcrumb-item text-sm text-dark active" aria-current="page">
                            Dashboard
                        </li>
                    </ol>
                </nav>

                <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
                    <!-- Search -->
                    <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                        <div class="input-group input-group-outline">
                            <label class="form-label">Search...</label>
                            <input type="text" class="form-control">
                        </div>
                    </div>

                    <!-- Icons -->
                    <ul class="navbar-nav d-flex align-items-center justify-content-end">
                        <li class="nav-item px-3 d-flex align-items-center">
                            <a href="#" class="nav-link text-body p-0">
                                <i class="material-symbols-rounded">settings</i>
                            </a>
                        </li>

                        <li class="nav-item dropdown pe-3 d-flex align-items-center">
                            <a href="#" class="nav-link text-body p-0">
                                <i class="material-symbols-rounded">notifications</i>
                            </a>
                        </li>

                        <li class="nav-item d-flex align-items-center">
                            <a href="#" class="nav-link text-body font-weight-bold px-0">
                                <i class="material-symbols-rounded">account_circle</i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <!-- Content -->
        <section class="section-content">
            <div class="p-4">
                @yield('content')
            </div>
        </section>

        <!-- Footer -->
        <footer class="py-2 w-100 flex justify-content-center align-items-center">
            <p class="m-0 w-100 text-center text-sm text-muted">
                &copy; {{ date('Y') }} {{ env('APP_NAME') }} -
                All rights reserved.
            </p>
        </footer>
    </main>

    <!-- Scripts -->
    <script src="{{ asset('assets/js/core/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/core/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/smooth-scrollbar.min.js') }}"></script>
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <script src="{{ asset('assets/js/material-dashboard.min.js?v=3.2.0') }}"></script>
    <script>
        var win = navigator.platform.indexOf('Win') > -1;
        if (win && document.querySelector('#sidenav-scrollbar')) {
            var options = {
                damping: '0.5'
            }
            Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
        }
    </script>
</body>

</html>
