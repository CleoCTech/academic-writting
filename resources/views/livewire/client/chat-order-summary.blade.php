<div>
    {{-- A good traveler has no fixed plans and is not intent upon arriving. --}}

    <div class="content fs-6 d-flex flex-column flex-column-fluid" id="kt_content">
        <!--begin::Toolbar-->
    <div class="toolbar" id="kt_toolbar">
        <div class="container-fluid d-flex flex-stack flex-wrap flex-sm-nowrap">
            <!--begin::Info-->
            <div class="d-flex flex-column align-items-start justify-content-center flex-wrap me-2">
                <!--begin::Title-->
                @auth
                <h1 class="text-dark fw-bolder my-1 fs-2">
                    Send Invoice
                    <small class="text-muted fs-6 fw-normal ms-1"></small>
                </h1>
                @endauth
                @guest
                <h1 class="text-dark fw-bolder my-1 fs-2">
                    Invoice Inquiry
                    <small class="text-muted fs-6 fw-normal ms-1"></small>
                </h1>
                @endguest

                <!--end::Title-->
            </div>
            <!--end::Info-->
            <!--begin::Actions-->
            <div class="d-flex align-items-center flex-nowrap text-nowrap py-1">
                <a  class="btn btn-primary" id="kt_toolbar_primary_button" wire:click='back'><span class="svg-icon svg-icon-2 rotate-180"> <i class="bi bi-arrow-bar-left"></i> </span>Back</a>
            </div>
            <!--end::Actions-->
        </div>
    </div>
    <!--end::Toolbar-->
    <div class="container">
        <!--begin::Chat-->
        <div class="d-flex flex-column flex-lg-row">
            <!--begin::Aside-->
            <div class="flex-lg-row-auto w-lg-250px w-xl-400px mb-5 mb-lg-0" id="kt_chat_aside">
                <!--begin::Card-->
                <div class="card">
                    <div class="card-header align-items-center px-9 py-3" id="kt_chat_content_header">
                        <div class="text-start flex-grow-1">
                            <label for="">Order Details</label>
                        </div>
                        <div class="text-end flex-grow-1">
                            <label for=""><button class="btn btn-info"><span class="rounded btn-info">Not Confirmed</span></button></label>
                        </div>
                      </div>
                    <!--begin::Body-->
                    <div class="card-body p-9">
                        <!--begin:Users-->
                        <div class="mt-9 scroll-y me-lg-n6 pe-lg-5" data-kt-scroll="true"
                            data-kt-scroll-height="{'default' : '300px', 'lg': 'auto'}"
                            data-kt-scroll-dependencies="#kt_header, #kt_toolbar, #kt_footer, #kt_chat_aside_search"
                            data-kt-scroll-wrappers="#kt_content, #kt_wrapper"
                            data-kt-scroll-offset="{'default' : '10px', 'lg' : '60px'}" style="height: 644px">
                            <!--begin:User-->
                            <div class="d-flex flex-stack mb-9">
                                <div class="d-flex align-items-center">
                                    <div class="d-flex flex-column">
                                        <a  class="text-muted text-gray-600 text-hover-primary fw-bolder fs-6 mb-1">Order ID</a>
                                    </div>
                                </div>
                                <div class="d-flex flex-column align-items-end text-end">
                                    <span class="fw-bolder fs-5">{{$orderDetails->order_no}}</span>
                                </div>
                            </div>
                            <div class="d-flex flex-stack mb-9">
                                <div class="d-flex align-items-center">
                                    <div class="d-flex flex-column">
                                        <a  class="text-gray-600 text-hover-primary fw-bolder fs-6 mb-1">Subject</a>
                                    </div>
                                </div>
                                <div class="d-flex flex-column align-items-end text-end">
                                    <span class="fw-bolder fs-5">{{$orderDetails->category->subject}}</span>
                                </div>
                            </div>
                            <div class="d-flex flex-stack mb-9">
                                <div class="d-flex align-items-center">
                                    <div class="d-flex flex-column">
                                        <a  class="text-gray-600 text-hover-primary fw-bolder fs-6 mb-1">Pages</a>
                                    </div>
                                </div>
                                <div class="d-flex flex-column align-items-end text-end">
                                    <span class="badge xbadge-primary badge-square" style="color: #fff;
                                    background-color: #929ea5;">4</span>
                                </div>
                            </div>
                            <div class="d-flex flex-stack mb-9">
                                <div class="d-flex align-items-center">
                                    <div class="d-flex flex-column">
                                        <a  class="text-gray-600 text-hover-primary fw-bolder fs-6 mb-1">Deadline</a>
                                    </div>
                                </div>
                                <div class="d-flex flex-column align-items-end text-end">
                                    <span class="fw-bolder fs-5">{{$orderDetails->deadline_date}}</span>
                                    <span class="badge xbadge-primary badge-square" style="color: #fff;
                                    background-color: #929ea5;">{{$orderDetails->deadline_time}}</span>
                                </div>
                            </div>
                            <div class="d-flex flex-stack mb-9">
                                <div class="d-flex align-items-center">
                                    <div class="d-flex flex-column">
                                        <a  class="text-gray-600 text-hover-primary fw-bolder fs-6 mb-1">Status</a>
                                    </div>
                                </div>
                                <div class="d-flex flex-column align-items-end text-end">
                                    <span class="badge badge-danger badge-square">{{$orderDetails->status}}</span>
                                </div>
                            </div>
                            <div class="d-flex flex-stack mb-9">
                                <div class="d-flex align-items-center">
                                    <div class="d-flex flex-column">
                                        <a  class="text-gray-600 text-hover-primary fw-bolder fs-6 mb-1">Fee</a>
                                    </div>
                                </div>
                                <div class="d-flex flex-column align-items-end text-end">
                                    <span class="badge badge-danger badge-square">Pending</span>
                                </div>
                            </div>
                            <div class="d-flex flex-stack mb-9">
                                <div class="d-flex align-items-center">
                                    <div class="d-flex flex-column">
                                        <a  class="text-gray-600 text-hover-primary fw-bolder fs-6 mb-1">Order Created</a>
                                    </div>
                                </div>
                                <div class="d-flex flex-column align-items-end text-end">
                                    <span class="fw-bolder fs-5">{{$orderDetails->created_at}}</span>
                                </div>
                            </div>
                            <div class="flex-stack mb-9">
                                <div class=" align-items-center">
                                    <div class=" flex-column">
                                        <a  class="text-gray-600 text-hover-primary fw-bolder fs-6 mb-3">Order Description</a>
                                    </div>
                                    <textarea class="form-control" rows="5" id="body" {{Auth::user()!=null? 'disabled':''}} >{{$orderDetails->instructions}}</textarea>
                                </div>
                            </div>
                            <div class="flex-stack mb-9">
                                <div class=" align-items-center">
                                    <div class=" flex-column mb-4">
                                        <a  class="text-gray-600 text-hover-primary fw-bolder fs-6 mb-3">Attached Files</a>
                                    </div>
                                    <a href="#" class="text-gray-600 text-hover-primary fw-bolder fs-6 mb-3"> <i class="fas fa-paperclip fs-4">file.pdf</i> </a><button type="button" class="close" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    <a href="#" class="text-gray-600 text-hover-primary fw-bolder fs-6 mb-3"> <i class="fas fa-paperclip fs-4">file2.pdf</i> <button type="button" class="close" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    <a href="#" class="text-gray-600 text-hover-primary fw-bolder fs-6 mb-3"> <i class="fas fa-paperclip fs-4">file3.pdf</i> </a><button type="button" class="close" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                </div>
                                @guest
                                <button class="btn btn-info"> Add Files</button>
                                @endguest

                            </div>
                            <!--end:User-->

                        </div>
                        <!--end:Users-->
                    </div>
                    <!--end::Body-->
                </div>
                <!--end::Card-->
            </div>
            <!--end::Aside-->
            <!--begin::Content-->
            <div class="flex-lg-row-fluid ms-lg-12" id="kt_chat_content">
                <!--begin::Card-->
                <div class="card">
                    <!--begin::Header-->
                    <div class="card-header align-items-center px-9 py-3" id="kt_chat_content_header">
                        <div class="text-start flex-grow-1">
                            <!--begin::Aside Mobile Toggle-->
                            <button type="button"
                                class="btn btn-active-light-primary btn-sm btn-icon btn-icon-md d-lg-none"
                                id="kt_app_chat_toggle">
                                <!--begin::Svg Icon | path: icons/stockholm/Communication/Adress-book2.svg-->
                                <span class="svg-icon svg-icon-1">
                                    <i class="bi bi-journal-album"></i>
                                </span>
                                <!--end::Svg Icon-->
                            </button>
                            <!--end::Aside Mobile Toggle-->
                        </div>
                        <div class="flex-grow-1">
                            @auth
                            <div class="text-gray-600 fw-bolder fs-6">
                                {{ Auth::user()->name }}
                            </div>
                            <div>
                                <span class="badge badge-dot badge-primary"></span>
                                <span class="fw-bold text-muted fs-7">Active</span>
                            </div>
                            @endauth
                            @guest
                            <div class="text-gray-600 fw-bolder fs-6">
                                Admin
                            </div>
                            <div>
                                <span class="badge badge-dot badge-primary"></span>
                                <span class="fw-bold text-muted fs-7">Active</span>
                            </div>
                            @endguest

                        </div>
                    </div>
                    <!--end::Header-->
                    <!--begin::Body-->
                    <div class="card-body px-9">
                        <div class="row mt-0" >
                            <div class="col-md-6 mt-3">
                                <a href="http://">{{$orderDetails->order_no}}</a>
                            </div>
                            <div class="col-md-6 align-items-end text-end">
                                @guest
                                <a href="#" ><x-jet-button>Confirm Invoice</x-jet-button></a>
                                @endguest
                                @auth
                                <x-jet-input></x-jet-input>
                                <a href="#" ><x-jet-button>Send Invoice</x-jet-button></a>
                                @endauth
                            </div>
                         </div>
                        <!--begin::Scroll-->
                        <div class="scroll-y me-lg-n6 pe-lg-5" data-kt-scroll="true"
                            data-kt-scroll-height="{'default' : '400px', 'lg' : 'auto'}"
                            data-kt-scroll-dependencies="#kt_header, #kt_toolbar, #kt_footer, #kt_chat_content_header, #kt_chat_content_footer"
                            data-kt-scroll-wrappers="#kt_content, #kt_wrapper"
                            data-kt-scroll-offset="{'default' : '10px', 'lg' : '52px'}" style="height: 589px" >

                             <hr>
                            <!--begin::Messages-->
                            <div wire:poll class="messages"  wire:model.defer='messages'>
                                @auth
                                @foreach ($messages as $message)
                                <div class="{{ ($message->from_id == Auth::user()->id) ? 'd-flex flex-column mb-5 align-items-end' : 'd-flex flex-column mb-5 align-items-start' }}">
                                    <div class="d-flex align-items-center">
                                        <!--begin::Symbol-->
                                        <div class="symbol symbol-40px flex-shrink-0 me-4">
                                            <span class="symbol-label bg-light">
                                                <img src="img/avatar.jpg" class="h-75 align-self-end" alt="" />
                                            </span>
                                        </div>
                                        <!--end::Symbol-->
                                        <div class="{{ ($message->from_id == Auth::user()->id) ? 'd-flex flex-column text-end' : 'd-flex flex-column' }}">
                                            <a href="#" class="text-gray-600 text-hover-primary fw-bolder">{{ ($message->from_id == Auth::user()->id) ? 'You' : $orderDetails->order->username }}</a>
                                            <span class="text-muted fw-bold fs-7">{{$message->created_at}}</span>
                                        </div>
                                    </div>
                                    <div class="{{ ($message->from_id == Auth::user()->id) ? 'rounded mt-2 p-5 bg-light-success text-gray-600 text-end mw-400px' : 'rounded mt-2 p-5 bg-light-primary text-gray-600 text-start mw-400px' }}">
                                       {{$message->message}}
                                    </div>
                                </div>
                                @endforeach
                                @endauth

                                @guest
                                @foreach ($messages as $message)
                                <div class="{{ ($message->from_id == $client[0] && $message->type == 'Client') ? 'd-flex flex-column mb-5 align-items-end' : 'd-flex flex-column mb-5 align-items-start' }}">
                                    <div class="d-flex align-items-center">
                                        <!--begin::Symbol-->
                                        <div class="symbol symbol-40px flex-shrink-0 me-4">
                                            <span class="symbol-label bg-light">
                                                <img src="img/avatar.jpg" class="h-75 align-self-end" alt="" />
                                            </span>
                                        </div>
                                        <!--end::Symbol-->
                                        <div class="{{ ($message->from_id == $client[0] && $message->type == 'Client') ? 'd-flex flex-column text-end' : 'd-flex flex-column' }}">
                                            <a href="#" class="text-gray-600 text-hover-primary fw-bolder">{{ ($message->from_id == $client[0] && $message->type == 'Client') ? 'You' : 'Admin' }}</a>
                                            <span class="text-muted fw-bold fs-7">{{$message->created_at}}</span>
                                        </div>
                                    </div>
                                    <div class="{{ ($message->from_id == $client[0] && $message->type == 'Client') ? 'rounded mt-2 p-5 bg-light-success text-gray-600 text-end mw-400px' : 'rounded mt-2 p-5 bg-light-primary text-gray-600 text-start mw-400px' }}">
                                       {{$message->message}}
                                    </div>
                                </div>
                                @endforeach
                                @endguest
                            </div>
                            <!--end::Messages-->
                        </div>
                        <!--end::Scroll-->
                    </div>
                    <!--end::Body-->
                    <!--begin::Footer-->
                    <div class="card-footer align-items-center px-7 py-4" id="kt_chat_content_footer">
                        <!--begin::Compose-->
                       <form wire:submit.prevent='sendMessage'>
                           @csrf
                        <div class="position-relative">
                            <textarea  wire:model.defer='messageText' class="form-control border-0 p-2 resize-none overflow-hidden" rows="1"
                                placeholder="Reply..."></textarea>
                            <div class="position-absolute top-0 end-0 mr-n2">
                                <span class="btn btn-icon btn-sm btn-active-light-primary">
                                    <i class="fas fa-paperclip fs-4"></i>
                                </span>
                                <button type="submit"> <span class="btn btn-icon btn-sm btn-active-light-primary" onclick="scrollToBottomFunc()">
                                    <i class="fas fa-map-marker-alt fs-4"></i>
                                    Send
                                </span></button>

                            </div>
                        </div>
                       </form>
                        <!--begin::Compose-->
                    </div>
                    <!--end::Footer-->
                </div>
                <!--end::Card-->
            </div>
            <!--end::Content-->
        </div>
        <!--end::Chat-->
    </div>
</div>
</div>
<script>

    // $(document).ready(function(){

    //     setInterval(() => {
    //         scrollToBottomFunc();
    //         // $('#messages').html(data);
    //         //     scrollToBottomFunc();
    //         // },
    //     }, 4000);

    // });
    function scrollToBottomFunc() {
        $('.scroll-y').scrollTop($('.scroll-y')[1].scrollHeight);
    }
</script>
