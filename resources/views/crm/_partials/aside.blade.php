<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-radius-lg fixed-start ms-2 bg-white my-2"
    id="sidenav-main" style="z-index: 999 !important;">
    <!-- Menu Header -->
    <div class="sidenav-header">
        <a class="navbar-brand px-4 py-3 m-0 d-flex justify-content-center align-items-center"
            href="{{ route('crm.index') }}">
            <img src="{{ asset('logo.JPG') }}" alt="Logo" class="border-radius-sm">
        </a>
    </div>

    <hr class="horizontal dark mt-0 mb-2">

    @include('crm._components.user-card')

    <hr class="horizontal dark mt-0 mb-2">

    <!-- Menu -->
    <div class="collapse navbar-collapse w-auto" id="sidenav-collapse-main">
        <ul class="navbar-nav">
            <!-- Overview -->
            <li class="nav-item mt-3">
                <h6 class="ps-4 ms-2 text-uppercase text-xs text-dark font-weight-bolder">
                    <span class="opacity-5">Overview</span>
                    @include('crm._components.badge-coming-soon')
                </h6>
            </li>

            <!-- Dashboard -->
            <li class="nav-item">
                <a class="nav-link text-dark @if (request()->route()->getName() === 'crm.index') active @endif"
                    href="{{ route('crm.index') }}">
                    <i class="material-symbols-rounded opacity-5">dashboard</i>
                    <span class="nav-link-text ms-1">Dashboard</span>
                </a>
            </li>

            <!-- Monitoring -->
            @can('see-monitoring')
                <li class="nav-item">
                    <a class="nav-link text-dark @if (request()->route()->getName() === 'crm.monitoring') active @endif"
                        href="{{ route('crm.monitoring') }}">
                        <i class="material-symbols-rounded opacity-5">monitoring</i>
                        <span class="nav-link-text ms-1">Monitoring</span>
                    </a>
                </li>
            @endcan

            <!-- Administration -->
            @can('manage-administration')
                <li class="nav-item mt-3">
                    <h6 class="ps-4 ms-2 text-uppercase text-xs text-dark font-weight-bolder opacity-5">
                        Administration
                    </h6>
                </li>
            @endcan

            <!-- Roles -->
            @can('viewAny', 'App\Models\Role')
                <li class="nav-item">
                    <a class="nav-link text-dark @if (Str::startsWith(Route::currentRouteName(), 'crm.administration.roles.')) active @endif"
                        href="{{ route('crm.administration.roles.index') }}">
                        <i class="material-symbols-rounded opacity-5">id_card</i>
                        <span class="nav-link-text ms-1">Roles</span>
                    </a>
                </li>
            @endcan

            <!-- Users -->
            @can('viewAny', 'App\Models\User')
                <li class="nav-item">
                    <a class="nav-link text-dark @if (Str::startsWith(Route::currentRouteName(), 'crm.administration.users.')) active @endif"
                        href="{{ route('crm.administration.users.index') }}">
                        <i class="material-symbols-rounded opacity-5">people</i>
                        <span class="nav-link-text ms-1">Users</span>
                    </a>
                </li>
            @endcan

            <!-- Companies -->
            @can('viewAny', 'App\Models\Company')
                <li class="nav-item">
                    <a class="nav-link text-dark @if (Str::startsWith(Route::currentRouteName(), 'crm.administration.companies.')) active @endif"
                        href="{{ route('crm.administration.companies.index') }}">
                        <i class="material-symbols-rounded opacity-5">apartment</i>
                        <span class="nav-link-text ms-1">Companies</span>
                    </a>
                </li>
            @endcan

            <!-- Customers -->
            @can('viewAny', 'App\Models\Customer')
                <li class="nav-item">
                    <a class="nav-link text-dark @if (Str::startsWith(Route::currentRouteName(), 'crm.administration.customers.')) active @endif"
                        href="{{ route('crm.administration.customers.index') }}">
                        <i class="material-symbols-rounded opacity-5">groups</i>
                        <span class="nav-link-text ms-1">Customers</span>
                    </a>
                </li>
            @endcan

            <!-- Business -->
            <li class="nav-item mt-3">
                <h6 class="ps-4 ms-2 text-uppercase text-xs text-dark font-weight-bolder">
                    <span class="opacity-5">Business</span>
                    @include('crm._components.badge-coming-soon')
                </h6>
            </li>

            <!-- Categories -->
            <li class="nav-item">
                <a class="nav-link text-dark" href="{{ route('crm.index') }}">
                    <i class="material-symbols-rounded opacity-5">category</i>
                    <span class="nav-link-text ms-1">Categories</span>
                </a>
            </li>

            <!-- Products -->
            <li class="nav-item">
                <a class="nav-link text-dark" href="{{ route('crm.index') }}">
                    <i class="material-symbols-rounded opacity-5">box</i>
                    <span class="nav-link-text ms-1">Products</span>
                </a>
            </li>

            <!-- Inventory -->
            <li class="nav-item">
                <a class="nav-link text-dark" href="{{ route('crm.index') }}">
                    <i class="material-symbols-rounded opacity-5">inventory</i>
                    <span class="nav-link-text ms-1">Inventory</span>
                </a>
            </li>

            <!-- Orders -->
            <li class="nav-item">
                <a class="nav-link text-dark" href="{{ route('crm.index') }}">
                    <i class="material-symbols-rounded opacity-5">orders</i>
                    <span class="nav-link-text ms-1">Orders</span>
                </a>
            </li>

            <!-- Comments -->
            <li class="nav-item">
                <a class="nav-link text-dark" href="{{ route('crm.index') }}">
                    <i class="material-symbols-rounded opacity-5">forum</i>
                    <span class="nav-link-text ms-1">Comments</span>
                </a>
            </li>

            <!-- Invoices -->
            <li class="nav-item">
                <a class="nav-link text-dark" href="{{ route('crm.index') }}">
                    <i class="material-symbols-rounded opacity-5">assignment</i>
                    <span class="nav-link-text ms-1">Invoices</span>
                </a>
            </li>
        </ul>
    </div>

    <!-- Menu Footer -->
    <div class="sidenav-footer position-absolute w-100 bottom-0">
        <p class="mb-2 font-weight-bold text-body text-xs text-center">
            Sales.io CRM v.1.0.
        </p>
    </div>
</aside>
