<button type="button" class="btn-modal-success d-none" data-bs-toggle="modal" data-bs-target="#modal-success"></button>

<div class="modal fade" id="modal-success" tabindex="-1" aria-labelledby="modal-successLabel" data-bs-backdrop="static"
    data-bs-keyboard="false" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header d-flex justify-content-between align-items-center">
                <h1 class="modal-title text-success fs-5">
                    <i class="fa-solid fa-circle-check me-1"></i>
                    Success!
                </h1>
                <button type="button" class="bg-white border-0" data-bs-dismiss="modal" aria-label="Close">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <div class="modal-body">
                <p class="m-0 text-dark">
                    {{ session('success') }}
                </p>
            </div>
            <div class="modal-footer p-2 d-flex justify-content-center align-items-center">
                <button type="button" data-bs-dismiss="modal"
                    class="bg-success border-0 rounded p-2 w-100 font-weight-bold text-white">
                    OK
                </button>
            </div>
        </div>
    </div>
</div>
