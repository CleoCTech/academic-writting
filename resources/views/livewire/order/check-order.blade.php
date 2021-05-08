<div>
    {{-- To attain knowledge, add things every day; To attain wisdom, subtract things every day --}}
    <h3 class="my-4">
        Check your order and add funds to your balance
    </h3>

    <div class="row">
        <div class="col-12 py-4">
            <p class="muted mb-0">Topic</p>
            <p class="lead">Essay Topic</p>

            <div class="d-flex justify-content-around align-item-center">
                <div>
                    <p class="muted">Subject</p>
                    <p class="lead fw-bold">Other</p>
                </div>
                <div>
                    <p class="muted">Pages</p>
                    <p class="lead fw-bold">2 pages / 550 words</p>
                </div>
                <div>
                    <p class="muted">Deadline</p>
                    <p class="lead fw-bold">April 30th - 1:12 AM</p>
                </div>
                <div>
                    <p class="muted">Writers name</p>
                    <p class="lead fw-bold">5 Jobs Completed</p>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-9 col-md-12 col-sm-12 py-4">
            <h3 class="lead">Useful Extras</h3>
            <div class="d-flex justify-content-around align-items-center">
                <div>
                    <p class="fw-bold">100% refund guarantee</p>
                    <p class="small muted">
                        We will refund you the whole amount if you are not
                        happy.
                    </p>
                </div>
                <div>
                    <p class="fw-bold">Privacy #1</p>
                    <p class="small muted">
                        Your email or name will not appear on the website.
                    </p>
                </div>
                <div>
                    <p class="fw-bold">Strict level of security</p>
                    <p class="small muted">
                        We use 128-bit SSL protection and high levels of
                        security.
                    </p>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-12 col-sm-12 shadow py-4">
            <h3 class="lead">Order Summary</h3>
            <p class="muted d-flex justify-content-between align-items-center">
                <span>Paper price</span><span>$36.24</span>
            </p>
            <p class="muted small d-flex justify-content-between align-items-center">
                <span>2 Pages x $20.50</span><span>$41.00</span>
            </p>
            <p class="muted small text-success d-flex justify-content-between align-items-center">
                <span>Discount</span><span>-$4.00</span>
            </p>
            <hr />
            <p class="fw-bold d-flex justify-content-between align-items-center">
                <span>Total Price</span><span>-$36.90</span>
            </p>
            <p class="muted small text-center">
                The funds will be held in your account until you
                release them.
            </p>
            {{-- <button type="submit" class="btn dark-2 btm-md full-width">
                Checkout
            </button> --}}

            <p class="muted small text-center mt-3">
                The funds will be held in your account until you
                release them.
            </p>
        </div>
    </div>
    <hr>
    <div class="btn-group text-center" role="group" aria-label="Basic example" style='display: block;'>
        <button type="button" class="btn mr-2"><a class="btn btn-themex dark mr-2" wire:click='previousStep'>Previous</a></button>
        <button type="button" class="btn mr-2"><a class="btn btn-themex dark mr-2" wire:click='store'>Next</a></button>
    </div>
</div>
