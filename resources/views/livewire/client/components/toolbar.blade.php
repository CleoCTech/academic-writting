<div>
    {{-- The Master doesn't talk, he acts. --}}
      <div class="toolbar" id="kt_toolbar">
        <div class="container-fluid d-flex flex-stack flex-wrap flex-sm-nowrap">
            <!--begin::Info-->
            <div class="d-flex flex-column align-items-start justify-content-center flex-wrap me-2">
                <!--begin::Title-->
                @auth
                <h1 class="text-dark fw-bolder my-1 fs-2">

                    @if ($confirm_invoice)
                    Send Invoice
                    @else
                    Order In Progress
                    @endif
                    <small class="text-muted fs-6 fw-normal ms-1"></small>
                </h1>
                @endauth
                @guest
                <h1 class="text-primary fw-bolder my-1 fs-2">
                    @if ($confirm_invoice)
                    Invoice Inquiry
                    @else
                    Order Progress (Check Answers If Attached Below)
                    @endif

                    <small class="text-muted fs-6 fw-normal ms-1"></small>
                </h1>
                @endguest

                <!--end::Title-->
            </div>
            <!--end::Info-->
            <!--begin::Actions-->
            <div class="d-flex align-items-center flex-nowrap text-nowrap py-1">
                <a class="btn btn-primary" id="kt_toolbar_primary_button" wire:click='back'><span
                        class="svg-icon svg-icon-2 rotate-180"> <i class="bi bi-arrow-bar-left"></i> </span>Back</a>
            </div>
            <!--end::Actions-->
        </div>
    </div>
</div>
