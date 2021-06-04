<div>
    {{-- To attain knowledge, add things every day; To attain wisdom, subtract things every day --}}
    <!-- ============================ Order Start ======================================-->
    <section class="gray-bg">
        <div class="container">
            {{-- <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="_filt_tag786">
                        <div class="col-3 order-title py-4">
                            <span> Place Order </span>
                        </div>
                        <div class="col-3 order-title py-4">
                            <span> Select a Writer </span>
                        </div>
                        <div class="col-3 order-title py-4">
                            <span> Check Order </span>
                        </div>
                        <div class="col-3 order-title py-4">
                            <span> Add funds to my balance </span>
                        </div>
                    </div>
                </div>
            </div> --}}
            <div class="row">
                <div class="col-12">
                    <div class="_wrap_box_slice">
                        <div class="_job_detail_single">
                            @if ($varView=="")
                            @livewire('order.place-order')
                            @elseif($varView=="step2")
                            @elseif($varView=="auth")
                            @livewire('order.auth')
                            @elseif($varView=="success")
                            @livewire('order.success')
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ============================ Order End ======================================== -->

</div>
