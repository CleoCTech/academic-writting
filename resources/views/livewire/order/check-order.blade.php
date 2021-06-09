<div>
     <!-- Custom CSS -->
     <link href="{{ asset('assets/css/styles.css') }}" rel="stylesheet" />
     <link href="{{ asset('assets/css/custom.css') }}" rel="stylesheet" />
    {{-- To attain knowledge, add things every day; To attain wisdom, subtract things every day --}}
    <div wire:loading>
        @livewire('general.loader')
    </div>
    <h3 class="my-4">
        Check your order and add funds to your balance
    </h3>
    <button wire:click='back' class="btn btn-sm btn-primary btn-active-light-text-primary">
       Back
    </button>
    <div class="row">
        <div class="col-12 py-4">
            <p class="muted mb-0 text-primary">Topic</p>
            <p class="lead">{{$orderDetails->topic}}</p>

            <div class="d-flex justify-content-around align-item-center">
                <div>
                    <p class="muted text-primary">Subject</p>
                    <p class="lead fw-bold">{{$orderDetails->category->subject}}</p>
                </div>
                <div>
                    <p class="muted text-primary">Pages</p>
                    <p class="lead fw-bold">{{$orderDetails->pages}} pages /{{$orderDetails->pages*275}} words</p>
                </div>
                <div>
                    <p class="muted text-primary">Deadline</p>
                    <p class="lead fw-bold">{!! date('d/M/y', strtotime($orderDetails->deadline_date)) !!}- {!! date('H:i', strtotime($orderDetails->deadline_time)) !!}</p>
                </div>
                <div>
                    {{--
                        {!! date('d/M/y', strtotime($orderDetails->deadline_date)) !!}
                        {!! date('H:i', strtotime($orderDetails->deadline_time)) !!}
                        <p class="muted">Writers name</p>
                    <p class="lead fw-bold">5 Jobs Completed</p> --}}
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-9 col-md-12 col-sm-12 py-4">
            <h3 class="lead text-primary">Useful Extras</h3>
            <div class="d-flex justify-content-around align-items-center">
                <div>
                    <p class="fw-bold text-primary">100% refund guarantee</p>
                    <p class="small muted">
                        We will refund you the whole amount if you are not
                        happy.
                    </p>
                </div>
                <div>
                    <p class="fw-bold text-primary">Privacy #1</p>
                    <p class="small muted">
                        Your email or name will not appear on the website.
                    </p>
                </div>
                <div>
                    <p class="fw-bold text-primary">Strict level of security</p>
                    <p class="small muted">
                        We use 128-bit SSL protection and high levels of
                        security.
                    </p>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-12 col-sm-12 shadow py-4">
            <h3 class="lead text-primary">Order Summary</h3>
            <p class="muted d-flex justify-content-between align-items-center">
                <span>Paper price</span><span>${{$orderDetails->bill->amount}}</span>
            </p>
            <p class="muted small d-flex justify-content-between align-items-center">
                <span>{{$orderDetails->pages}} Pages x ${{$orderDetails->bill->amount}}</span><span>${{$orderDetails->bill->total_amount}}</span>
            </p>
            <p class="muted small text-success d-flex justify-content-between align-items-center">
                <span>Tax</span><span>-$0.00</span>
            </p>
            <hr />
            <p class="fw-bold d-flex justify-content-between align-items-center">
                <span>Total Price</span><span>-${{$orderDetails->bill->total_amount}}</span>
            </p>
            <p class="fw-bold d-flex justify-content-between align-items-center">
                <span>Paid Amount</span><span>+${{$orderDetails->bill->paid_amount}}</span>
            </p>
            <hr />
            <p class="fw-bold d-flex justify-content-between align-items-center">
                <span>Balance</span><span>-${{$orderDetails->bill->total_amount - $orderDetails->bill->paid_amount}}</span>
            </p>
            <p class="muted small text-center">
                The funds will be held in your account until you
                release them.
            </p>
            <button wire:click='checkOut' class="btn dark-2 btm-md full-width">
                Checkout
            </button>

            <p class="muted small text-center mt-3">
                The funds will be held in your account until you
                release them.
            </p>
        </div>
    </div>
</div>

