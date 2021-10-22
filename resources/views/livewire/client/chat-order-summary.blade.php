<div>
    {{-- A good traveler has no fixed plans and is not intent upon arriving. --}}
    <div wire:loading wire:target='confrimInvoice, rejectInvoice'>
        @livewire('general.loader')
    </div>
    <div class="content fs-6 d-flex flex-column flex-column-fluid" id="kt_content">


    <!--begin ::Toolbar-->
        @livewire('client.components.toolbar', [$confirm_invoice])
    <!--end ::Toolbar-->
    <!-- Alert Info -->
    @if (session()->get('LoggedClient') != null)
    @if ($activity != '' )
    <div class="bg-blue-200 px-6 py-4 mx-2 my-4 rounded-md text-lg flex items-center mx-auto w-3/4 xl:w-2/4">
        <svg viewBox="0 0 24 24" class="text-blue-600 w-5 h-5 sm:w-5 sm:h-5 mr-3">
            <path fill="currentColor"
                d="M12,0A12,12,0,1,0,24,12,12.013,12.013,0,0,0,12,0Zm.25,5a1.5,1.5,0,1,1-1.5,1.5A1.5,1.5,0,0,1,12.25,5ZM14.5,18.5h-4a1,1,0,0,1,0-2h.75a.25.25,0,0,0,.25-.25v-4.5a.25.25,0,0,0-.25-.25H10.5a1,1,0,0,1,0-2h1a2,2,0,0,1,2,2v4.75a.25.25,0,0,0,.25.25h.75a1,1,0,1,1,0,2Z">
            </path>
        </svg>
        <span class="text-blue-800"> Confirm Invoice of ${{ $activity->value }} per page for this task </span> 
        <span class="flex justify-end" style=" margin-left: 2rem;">
        <button wire:click='confrimInvoice'
            class=" btn-primary transition duration-150 ease-in-out transform hover:scale-110 bg-emerald-600 text-white font-semibold py-3 px-6 rounded-md"
            " >
            Confirm 
        </button>
        <span class="flex justify-end" style=" margin-left: 2rem;">
        <button wire:click='rejectInvoice'
            class=" btn-danger transition duration-150 ease-in-out transform hover:scale-110 bg-emerald-600 text-white font-semibold py-3 px-6 rounded-md"
            " >
            Reject
        </button>
        </span>
    </div>
    @endif
    @elseif(auth()->user() != null)
     <!-- Alert Success -->
     @if ($InvoiceAccepted)
     <div class="bg-green-200 px-6 py-4 mx-2 my-4 rounded-md text-lg flex items-center mx-auto w-3/4 xl:w-2/4">
        <svg viewBox="0 0 24 24" class="text-green-600 w-5 h-5 sm:w-5 sm:h-5 mr-3">
            <path fill="currentColor"
                d="M12,0A12,12,0,1,0,24,12,12.014,12.014,0,0,0,12,0Zm6.927,8.2-6.845,9.289a1.011,1.011,0,0,1-1.43.188L5.764,13.769a1,1,0,1,1,1.25-1.562l4.076,3.261,6.227-8.451A1,1,0,1,1,18.927,8.2Z">
            </path>
        </svg>
        <span class="text-green-800"> Invoice Accepted. </span>
    </div>
     @endif
     @if ($InvoiceRejected)
         <!-- Alert Error -->
        <div class="bg-red-200 px-6 py-4 mx-2 my-4 rounded-md text-lg flex items-center mx-auto w-3/4 xl:w-2/4">
            <svg viewBox="0 0 24 24" class="text-red-600 w-5 h-5 sm:w-5 sm:h-5 mr-3">
                <path fill="currentColor"
                    d="M11.983,0a12.206,12.206,0,0,0-8.51,3.653A11.8,11.8,0,0,0,0,12.207,11.779,11.779,0,0,0,11.8,24h.214A12.111,12.111,0,0,0,24,11.791h0A11.766,11.766,0,0,0,11.983,0ZM10.5,16.542a1.476,1.476,0,0,1,1.449-1.53h.027a1.527,1.527,0,0,1,1.523,1.47,1.475,1.475,0,0,1-1.449,1.53h-.027A1.529,1.529,0,0,1,10.5,16.542ZM11,12.5v-6a1,1,0,0,1,2,0v6a1,1,0,1,1-2,0Z">
                </path>
            </svg>
            <span class="text-red-800"> Your was invoice rejected. </span>
        </div>
    <!-- End Alert Error -->
     @endif
        
    <!-- End Alert Success -->
    @endif
        
        
        <!-- End Alert Info -->
    <!--begin::Chat-->
        @livewire('client.components.order-sum-with-chatbox', [$orderDetails, $revisions, $clientFiles, $confirm_invoice, $total_fee, $user_type, $orderId ])
    <!--end::Chat-->

        <br>
    <!--begin::Order Submision section-->
        {{-- @livewire('client.components.order-submision') --}}
    <!--end::Order Submision section-->

        <script>
            // window.checkScroll = false;
            // setInterval(() => {
            //     if (window.checkScroll) {
            //         // console.log("do nothing");
            //         window.checkScroll = false;
            //     }else{
            //         scrollToBottomFunc();
            //     }

            // }, 4000);
            // $('.scroll-y').scroll( function(evt) {
            //     window.checkScroll = true;
            //     // console.log("scroll true1");
            // });

            // $('.scroll-y').onscroll
            // object.onscroll = function() { /*...*/ }
            document.addEventListener("keyup", function(event) {
                var sendmsg = document.getElementById('sendmsg');
                if (event.keyCode === 13) {
                    sendmsg.click();
                }
            });
      
            // function scrollToBottomFunc() {
            //     $('.scroll-y').scrollTop($('.scroll-y')[1].scrollHeight);
            // }

            function resetPond(){
                var pond = document.getElementById("test");
                pond.removeFiles();
            }
        </script>

    </div>

    <style>
        .link-download:hover {
            text-decoration: underline !important;
            cursor: pointer;
        }

        .btn-floating {
            -webkit-appearance: none;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
            display: -webkit-box;
            display: flex;
            -webkit-box-align: center;
            align-items: center;
            -webkit-box-pack: center;
            justify-content: center;
            outline: none;
            cursor: pointer;
            width: 30px;
            height: 30px;
            background-image: -webkit-gradient(linear, left bottom, left top, from(#d8d9db), color-stop(80%, #fff), to(#fdfdfd));
            background-image: linear-gradient(to top, #d8d9db 0%, #fff 80%, #fdfdfd 100%);
            border-radius: 30px;
            border: 1px solid #8f9092;
            box-shadow: 0 4px 3px 1px #fcfcfc, 0 6px 8px #d6d7d9, 0 -4px 4px #cecfd1, 0 -6px 4px #fefefe, inset 0 0 3px 0 #cecfd1;
            -webkit-transition: all 0.2s ease;
            transition: all 0.2s ease;
            font-family: "Source Sans Pro", sans-serif;
            font-size: 14px;
            font-weight: 600;
            color: #606060;
            text-shadow: 0 1px #fff;
            position: relative;
            z-index: 1;
            vertical-align: middle;
            overflow: hidden;
            margin-top: -15px;
            margin-left: 0px;
            -webkit-border-radius: 50%;
            border-radius: 50%;
            cursor: pointer;
        }

        .btn-floating i {
            font-size: 1.25rem;
            line-height: 47px;
            display: inline-block;
            width: inherit;
            text-align: center;
            /* color: #fff; */
        }

        .btn-floating:hover {
            box-shadow: 0 4px 3px 1px #fcfcfc, 0 6px 8px #d6d7d9, 0 -4px 4px #cecfd1, 0 -6px 4px #fefefe, inset 0 0 3px 3px #cecfd1;
        }
    </style>
