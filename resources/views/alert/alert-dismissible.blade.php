@if ($flash = Session::get('success'))
    <div class="alert alert-success alert-dismissible text-white" role="alert">
        <span class="text-sm"> {{ $flash }}</span>
        <button type="button" class="btn-close text-lg py-3 opacity-10" data-bs-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

@if ($flash = Session::get('info'))
    <div class="alert alert-info alert-dismissible text-white" role="alert">
        <span class="text-sm"> {{ $flash }}</span>
        <button type="button" class="btn-close text-lg py-3 opacity-10" data-bs-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

@if ($flash = Session::get('warning'))
    <div class="alert alert-warning alert-dismissible text-white" role="alert">
        <span class="text-sm"> {{ $flash }}</span>
        <button type="button" class="btn-close text-lg py-3 opacity-10" data-bs-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

@if ($flash = Session::get('error'))
    <div class="alert alert-danger alert-dismissible text-white" role="alert">
        <span class="text-sm"> {{ $flash }}</span>
        <button type="button" class="btn-close text-lg py-3 opacity-10" data-bs-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
