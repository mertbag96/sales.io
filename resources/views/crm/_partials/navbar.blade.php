<nav class="mt-2 fixed navbar navbar-main navbar-expand-lg px-0 mx-3 shadow-none border-radius-xl">
    <div class="container-fluid py-1 px-3">
        <!-- Breadcrumb -->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                <li class="breadcrumb-item opacity-5 text-dark text-sm">
                    @switch($section)
                        @case(1)
                            Overview
                        @break

                        @case(2)
                            Administration
                        @break

                        @case(3)
                            Business
                        @break

                        @default
                            CRM
                    @endswitch
                </li>
                <li class="breadcrumb-item @unless (is_null($subPage)) opacity-5 @endif text-sm text-dark"
                    aria-current="page">
                    {{ $page }}
                </li>
                @unless (is_null($subPage))
                    <li class="breadcrumb-item text-sm text-dark" aria-current="subpage">
                        {{ $subPage }}
                    </li>
                @endunless
            </ol>
        </nav>

        <!-- Icons -->
        <ul class="navbar-nav
                    d-flex align-items-center justify-content-end">
                <li class="nav-item px-3 d-flex align-items-center">
                    <a href="{{ route('crm.profile.show') }}"
                        class="nav-link d-flex align-items-center font-weight-bold text-body">
                        <i class="material-symbols-rounded">account_circle</i>
                        <span class="ms-1">Profile</span>
                    </a>
                </li>

                <li class="nav-item dropdown pe-3 d-flex align-items-center">
                    <a href="{{ route('crm.notifications') }}"
                        class="nav-link d-flex align-items-center font-weight-bold text-body">
                        <i class="material-symbols-rounded">notifications</i>
                        <span class="ms-1">Notifications</span>
                    </a>
                </li>

                <li class="nav-item d-flex align-items-center">
                    <a type="button" class="nav-link d-flex align-items-center font-weight-bold text-body"
                        data-bs-toggle="modal" data-bs-target="#modal-logout">
                        <i class="material-symbols-rounded">logout</i>
                        <span class="ms-1">Logout</span>
                    </a>
                </li>
                </ul>
    </div>
</nav>
