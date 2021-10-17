<div>
    {{-- A good traveler has no fixed plans and is not intent upon arriving. --}}
    <div wire:loading wire:target='confrimInvoice'>
        @livewire('general.loader')
    </div>
    <div class="content fs-6 d-flex flex-column flex-column-fluid" id="kt_content">


    <!--begin ::Toolbar-->
        @livewire('client.components.toolbar', [$confirm_invoice])
    <!--end ::Toolbar-->

    <!--begin::Chat-->
        @livewire('client.components.order-sum-with-chatbox', [$orderDetails, $revisions, $clientFiles, $confirm_invoice, $total_fee, $user_type, $orderId ])
    <!--end::Chat-->

        <br>
    <!--begin::Order Submision section-->
        {{-- @livewire('client.components.order-submision') --}}
    <!--end::Order Submision section-->

        <script>
            window.checkScroll = false;
        setInterval(() => {
            if (window.checkScroll) {
                // console.log("do nothing");
                window.checkScroll = false;
            }else{
                scrollToBottomFunc();
            }

        }, 4000);
        $('.scroll-y').scroll( function(evt) {
            window.checkScroll = true;
            // console.log("scroll true1");
        });

        // $('.scroll-y').onscroll
        // object.onscroll = function() { /*...*/ }
        document.addEventListener("keyup", function(event) {
            var sendmsg = document.getElementById('sendmsg');
            if (event.keyCode === 13) {
                sendmsg.click();
            }
        });
        function scrollToBottomFunc() {
            $('.scroll-y').scrollTop($('.scroll-y')[1].scrollHeight);
        }
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
