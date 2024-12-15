<div class="modal fade" id="modal-logout" tabindex="-1" aria-labelledby="modal-logoutLabel" data-bs-backdrop="static"
    data-bs-keyboard="false" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header d-flex justify-content-between align-items-center">
                <h1 class="modal-title fs-5">Log out from Sales.io CRM?</h1>
                <button type="button" class="bg-white border-0" data-bs-dismiss="modal" aria-label="Close">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <div class="modal-body">
                <p class="m-0 text-dark">
                    Are you sure you want to log out?
                </p>
            </div>
            <div class="modal-footer p-2 d-flex justify-content-between align-items-center">
                <button type="button" data-bs-dismiss="modal"
                    class="bg-danger border-0 rounded p-2 w-48 font-weight-bold text-white">
                    Cancel
                </button>
                <form action="{{ route('crm.logout') }}" method="POST" autocomplete="off" class="w-48">
                    @csrf
                    <button type="submit" class="bg-success border-0 rounded p-2 w-100 font-weight-bold text-white">
                        Log out
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
