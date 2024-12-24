<div class="d-flex flex-column justify-content-between align-items-center p-2">
    <h6 class="m-0 font-weight-bold text-success text-center">
        @if (auth()->user()->isSuperAdmin())
            Super
        @endif
        {{ auth()->user()->role->name }}
        <i class="fas fa-check-circle"></i>
    </h6>
    <span class="mb-2 text-sm text-dark text-center">
        {{ auth()->user()->full_name }}
    </span>
</div>
