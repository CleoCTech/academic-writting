<div>
    {{-- Stop trying to control. --}}
    <!-- Custom CSS -->
    <link href="{{ asset('assets/css/styles.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/custom.css') }}" rel="stylesheet" />
    <div wire:loading wire:target='pay'>
        @livewire('general.loader')
    </div>
    <div class="row">
        <button wire:click='back' class="btn btn-sm btn-primary btn-active-light-text-primary">
            Back
         </button>
        <section class="gray-light min-sec">
            <div class="container">
                <div class="row form-submit">
                    <div class="col-lg-8 col-md-12 col-sm-12">
                        <!-- row -->
                        <div class="row m-0">

                            <div class="panel-group pay_opy980" id="payaccordion">
                                <!-- Pay By Paypal -->
                                <div class="panel panel-default">
                                    <div class="panel-heading" id="pay">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" role="button" data-parent="#payaccordion"
                                                href="#payPal" aria-expanded="false" aria-controls="payPal"
                                                class="collapsed">PayPal<img src="/dash-assets/img/paypal.png"
                                                    class="img-fluid" alt="" /></a>
                                        </h4>
                                    </div>
                                    <div id="payPal" class="panel-collapse collapse" aria-labelledby="pay"
                                        data-parent="#payaccordion" style="">
                                        <div class="panel-body">
                                            <form>
                                                {{-- <div class="form-group">
                                                    <label class="active">PayPal Email</label>
                                                    <input type="text" class="form-control with-light"
                                                        placeholder="paypal@gmail.com" />
                                                </div>
                                                <div class="form-group">
                                                    <button type="submit" class="btn dark-2 btm-md full-width">
                                                        Pay 400.00 USD
                                                    </button>
                                                </div> --}}
                                                <h2 class="italic ">Coming Soon...</h2>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                <!-- Pay By Strip -->
                                <div class="panel panel-default">
                                    <div class="panel-heading" id="stripes">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" role="button" data-parent="#payaccordion"
                                                href="#stripePay" aria-expanded="false" aria-controls="stripePay"
                                                class="collapsed">Stripe<img src="/dash-assets/img/strip.png"
                                                    class="img-fluid" alt="" /></a>
                                        </h4>
                                    </div>
                                    {{-- {!! action('\App\Http\Controllers\StripePaymentController@store') !!} --}}
                                    <div id="stripePay" class="collapse" aria-labelledby="stripes"
                                        data-parent="#payaccordion" style="">
                                        <div class="panel-body">
                                            <form action="{!! action('\App\Http\Controllers\StripePaymentController@store') !!} " method="POST"
                                                id="payment-form" ata-cc-on-file="false"
                                                data-stripe-publishable-key="{{env('pk_test_51HnQaRLEkRDa8FVJs5PeiFGYOFIlCgYXlgDjJWZvooKXqyuuIYK2E6midFUYN4mzyeOOxo2Y7Hmfobm3RsI3D6W100fTtTjM6m')}}"
                                                enctype="multipart/form-data" autocomplete="off">
                                                @csrf
                                                <div class="form-row">
                                                    <input type="hidden" name="client_Id" wire:model.defer='clientId'>

                                                    <label for="card-element">
                                                        Your Name
                                                    </label>
                                                    <input type="text" name="name" class="form-control"
                                                        placeholder="Enter Your Name" id="x">
                                                    <label for="card-element">
                                                        Your Payable Amount
                                                    </label>
                                                    <input type="text" name="grandTotal" class="form-control"
                                                        placeholder="Enter Your Amount" id="y">
                                                    <label for="card-element">
                                                        Credit or debit card
                                                    </label>
                                                    <div id="card-element" class="form-control">
                                                        <!-- A Stripe Element will be inserted here. -->
                                                    </div>

                                                    <!-- Used to display form errors. -->
                                                    <div id="card-errors" role="alert"></div>
                                                </div>

                                                <input type="button" class="previous action-button-previous btn btn-dark"
                                                    style="margin-left: -11rem; margin-top:15px;" value="Previous" wire:click='previousStep' />
                                                <input wire:click='pay' type="submit" class="next action-button btn btn-primary"
                                                    style="float:right; margin-top:15px;" value="Submit Payment"  />

                                            </form>
                                        </div>
                                    </div>
                                </div>

                                <!-- Pay By Debit or credtit -->
                                <div class="panel panel-default">
                                    <div class="panel-heading" id="dabit">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" role="button" href="#payaccordion"
                                                data-target="#debitPay" aria-expanded="false" aria-controls="debitPay"
                                                class="collapsed">Debit Or Credit<img src="/dash-assets/img/debit.png"
                                                    class="img-fluid" alt="" /></a>
                                        </h4>
                                    </div>
                                    <div id="debitPay" class="panel-collapse collapse" aria-labelledby="dabit"
                                        data-parent="#payaccordion" style="">
                                        <div class="panel-body">
                                            <form>
                                                {{-- <div class="row">
                                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                                        <div class="form-group">
                                                            <label>Card Holder Name</label>
                                                            <input type="text" class="form-control with-light" />
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                                        <div class="form-group">
                                                            <label>Card Number</label>
                                                            <input type="text" class="form-control with-light" />
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-5 col-md-5 col-sm-6">
                                                        <div class="form-group">
                                                            <label>Expire Month</label>
                                                            <input type="text" class="form-control with-light" />
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-5 col-md-5 col-sm-6">
                                                        <div class="form-group">
                                                            <label>Expire Year</label>
                                                            <input type="text" class="form-control with-light" />
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-2 col-md-2 col-sm-12">
                                                        <div class="form-group">
                                                            <label>CVC</label>
                                                            <input type="text" class="form-control with-light" />
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                                        <div class="form-group">
                                                            <input id="ct-2" class="checkbox-custom" name="ct-2"
                                                                type="checkbox" />
                                                            <label for="ct-2" class="checkbox-custom-label">By
                                                                Continuing, you ar'e agree
                                                                to conditions</label>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                                        <div class="form-group text-center">
                                                            <a href="#" class="btn dark-2 full-width">Pay 202.00 USD</a>
                                                        </div>
                                                    </div>
                                                </div> --}}
                                                <h2 class="italic ">Coming Soon...</h2>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--/row -->
                    </div>

                    <!-- Col-lg 4 -->
                    <!-- /col-lg-4 -->
                </div>
            </div>
        </section>
    </div>
</div>
<script type="text/javascript">

    // alert('900');
    // Create a Stripe client.

    var stripe = Stripe("pk_test_51HnQaRLEkRDa8FVJs5PeiFGYOFIlCgYXlgDjJWZvooKXqyuuIYK2E6midFUYN4mzyeOOxo2Y7Hmfobm3RsI3D6W100fTtTjM6m");

    // Create an instance of Elements.
    var elements = stripe.elements();

    // Custom styling can be passed to options when creating an Element.
    // (Note that this demo uses a wider set of styles than the guide below.)
    var style = {
        base: {
            color: '#32325d',
            fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
            fontSmoothing: 'antialiased',
            fontSize: '16px',
            '::placeholder': {
                color: '#aab7c4'
            }
        },
        invalid: {
            color: '#fa755a',
            iconColor: '#fa755a'
        }
    };

    // Create an instance of the card Element.
    var card = elements.create('card', {
        style: style
    });

    // Add an instance of the card Element into the `card-element` <div>.
    card.mount('#card-element');
    // Handle real-time validation errors from the card Element.
    card.on('change', function(event) {
        var displayError = document.getElementById('card-errors');
        if (event.error) {
            displayError.textContent = event.error.message;
        } else {
            displayError.textContent = '';
        }
    });

    var form = document.getElementById('payment-form');
    form.addEventListener('submit', function(event) {
        event.preventDefault();

        stripe.createToken(card).then(function(result) {
            if (result.error) {
                // Inform the user if there was an error.
                var errorElement = document.getElementById('card-errors');
                errorElement.textContent = result.error.message;
            } else {
                // Send the token to your server.
                stripeTokenHandler(result.token);
            }
        });
    });


   // Submit the form with the token ID.
    function stripeTokenHandler(token) {
        // Insert the token ID into the form so it gets submitted to the server
        var form = document.getElementById('payment-form');
        var hiddenInput = document.createElement('input');
        hiddenInput.setAttribute('type', 'hidden');
        hiddenInput.setAttribute('name', 'stripeToken');
        hiddenInput.setAttribute('value', token.id);
        form.appendChild(hiddenInput);

        // Submit the form
        form.submit();
    }

</script>
