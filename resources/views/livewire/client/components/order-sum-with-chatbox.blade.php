<div>
    {{-- The whole world belongs to you --}}
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
                            @if ($orderDetails->status == "Pending")
                            <label for=""><button class="btn btn-info"><span class="rounded btn-info">Not
                                        Confirmed</span></button></label> @elseif($orderDetails->status == "In
                            progress")
                            <label for=""><button class="btn btn-success"><span
                                        class="rounded btn-success">Confirmed</span></button></label> @endif

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
                                        <a class="text-muted text-gray-600 text-hover-primary fw-bolder fs-6 mb-1">Order
                                            ID</a>
                                    </div>
                                </div>
                                <div class="d-flex flex-column align-items-end text-end">
                                    <span class="fw-bolder fs-5">{{$orderDetails->order_no}}</span>
                                </div>
                            </div>
                            <div class="d-flex flex-stack mb-9">
                                <div class="d-flex align-items-center">
                                    <div class="d-flex flex-column">
                                        <a class="text-gray-600 text-hover-primary fw-bolder fs-6 mb-1">Subject</a>
                                    </div>
                                </div>
                                <div class="d-flex flex-column align-items-end text-end">
                                    <span class="fw-bolder fs-5">{{$orderDetails->category->subject}}</span>
                                </div>
                            </div>
                            <div class="d-flex flex-stack mb-9">
                                <div class="d-flex align-items-center">
                                    <div class="d-flex flex-column">
                                        <a class="text-gray-600 text-hover-primary fw-bolder fs-6 mb-1">Pages</a>
                                    </div>
                                </div>
                                <div class="d-flex flex-column align-items-end text-end">
                                    <span class="badge xbadge-primary badge-square" style="color: #fff;
                                background-color: #929ea5;">{{$orderDetails->pages}}</span>
                                </div>
                            </div>
                            <div class="d-flex flex-stack mb-9">
                                <div class="d-flex align-items-center">
                                    <div class="d-flex flex-column">
                                        <a class="text-gray-600 text-hover-primary fw-bolder fs-6 mb-1">Deadline</a>
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
                                        <a class="text-gray-600 text-hover-primary fw-bolder fs-6 mb-1">Status</a>
                                    </div>
                                </div>
                                <div class="d-flex flex-column align-items-end text-end">
                                    @if ($orderDetails->status == "Pending")
                                    <span class="badge badge-danger badge-square">{{$orderDetails->status}}</span>
                                    @elseif($orderDetails->status =="In progress")
                                    <span class="badge badge-info badge-square">{{$orderDetails->status}}</span>
                                    @elseif($orderDetails->status =="Complete")
                                    <span class="badge badge-success badge-square">{{$orderDetails->status}}</span>
                                    @endif

                                </div>
                            </div>
                            <div class="d-flex flex-stack mb-9">
                                <div class="d-flex align-items-center">
                                    <div class="d-flex flex-column">
                                        <a class="text-gray-600 text-hover-primary fw-bolder fs-6 mb-1">Fee</a>
                                    </div>
                                </div>
                                <div class="d-flex flex-column align-items-end text-end">
                                    @if ($orderDetails->status=="Pending")
                                    <span class="badge badge-danger badge-square">${{$total_fee}}</span>
                                    @elseif($orderDetails->status=="In progress")
                                    <span class="badge badge-success badge-square">${{$total_fee}}</span>
                                    @elseif($orderDetails->status=="Complete")
                                    <span class="badge badge-success badge-square">${{$total_fee}}</span>
                                    @endif

                                </div>
                            </div>
                            <div class="d-flex flex-stack mb-9">
                                <div class="d-flex align-items-center">
                                    <div class="d-flex flex-column">
                                        <a class="text-gray-600 text-hover-primary fw-bolder fs-6 mb-1">Order
                                            Created</a>
                                    </div>
                                </div>
                                <div class="d-flex flex-column align-items-end text-end">
                                    <span class="fw-bolder fs-5">{{$orderDetails->created_at}}</span>
                                </div>
                            </div>
                            <div class="flex-stack mb-9">
                                <div class=" align-items-center">
                                    <div class=" flex-column">
                                        <a class="text-blue-400 text-hover-primary fw-bolder fs-6 mb-3">Order
                                            Description</a>
                                    </div>
                                    <p>{{$orderDetails->instructions}}</p>
                                    {{-- <textarea class="form-control" rows="5" id="body" disabled>{{$orderDetails->instructions}}</textarea>
                                    --}}
                                </div>
                            </div>
                            <h4 class="text-blue-400 " style="margin-top: 1rem;">Additional Insructions (Revision)
                                <span class="svg-icon svg-icon-4 ">
                                    <i class="bi bi-paperclip text-blue-400"></i>
                                </span>
                            </h4>
                            @auth
                            <h4 class="text-blue-400 text-sm" style="margin-top: 1rem;">Remember to check additional
                                attached files below (if any)
                                <span class="svg-icon svg-icon-4 ">
                                    <i class="bi bi-bell-fill text-blue-400"></i>
                                </span>
                            </h4>
                            @endauth

                            <div class="flex-stack mb-9">
                                <div class=" align-items-center">
                                    @if (count($revisions)>0)
                                    @foreach ($revisions as $revision)
                                    <p>{{$revision->comment}}</p>
                                    @endforeach
                                    @endif
                                    {{-- <div class=" flex-column">
                                        <a class="text-gray-600 text-hover-primary fw-bolder fs-6 mb-3">Order
                                            Description</a>
                                    </div>
                                    <textarea class="form-control" rows="5" id="body" disabled>{{$orderDetails->instructions}}</textarea>
                                    --}}
                                </div>
                            </div>
                            <div class="flex-stack mb-9">
                                <div class=" align-items-center">
                                    <div class=" flex-column mb-4">
                                        <h4 class="text-blue-400 " style="margin-top: 1rem;">Attached
                                            Files
                                            <span class="svg-icon svg-icon-4 ">
                                                <i class="bi bi-paperclip text-blue-400"></i>
                                            </span>
                                        </h4>
                                    </div>
                                    @foreach ($clientFiles as $clientFile)
                                    {{-- @php
                                        $path = $clientFile->folder.'/'.$clientFile->filename;
                                        // getDownload( {{$clientFile->folder'/'$clientFile->filename}} )
                                    // dd($path);
                                    @endphp --}}
                                    <div class="row">
                                        <div>
                                            @if (session()->has('message'))
                                            <div class="alert alert-danger">
                                                {{ session('message') }}
                                            </div>
                                            @endif
                                        </div>
                                        <div class="col-md-8">
                                            <i class="bi bi-dot fs-2 text-active-dark"></i>
                                            <a wire:click="getDownload('{{$clientFile->folder}}/{{$clientFile->filename}}')"
                                                title="Click to download"
                                                class="text-gray-600 italic text-hover-primary fw-bold fs-6 mb-3 link-download">{{$clientFile->filename}}
                                            </a>
                                        </div>
                                        {{-- <div class="col-md-4 p-3">
                                            <a wire:click="getDownload('{{$clientFile->folder}}/{{$clientFile->filename}}')"
                                        type="button" class="btn-floating btn-small"
                                        download="{{$clientFile->filename}}"> <span class="svg-icon svg-icon-3">
                                            <i class="bi bi-download"></i>
                                        </span></a>
                                    </div> --}}
                                </div>
                                @endforeach
                            </div>
                            @guest
                            <button wire:click='edit' class="btn btn-info"> Edit Record</button> @endguest
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
                        @endauth @guest
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
                <div>
                    @if (session()->has('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                    @endif
                </div>
                <div>
                    @if (session()->has('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                    @endif
                </div>
                <div class="card-body px-9">
                    <div class="row mt-0">
                        <div class="col-md-6 mt-3">
                            <a href="">{{$orderDetails->order_no}}</a>
                        </div>
                        <div wire:poll class="col-md-6 align-items-end text-end" wire:model.defer='confirm_invoice'>
                            @guest @if ($confirm_invoice)
                            {{--
                                <a>
                                    <x-jet-button wire:click='confrimInvoice'>Confirm Invoice</x-jet-button>
                                </a> --}}
                            <div class="justify-around">

                                <span class="relative inline-flex rounded-md shadow-sm">

                                    <button wire:click='confrimInvoice' type="button"
                                        class="uppercase inline-flex items-center px-4 py-2 border border-purple-400 text-base leading-6 font-medium rounded-md text-purple-800 bg-white hover:text-purple-700 focus:border-purple-300 transition ease-in-out duration-150">
                                        Confirm Invoice
                                    </button>
                                    <span class="flex absolute h-3 w-3 top-0 right-0 -mt-1 -mr-1">
                                        <span
                                            class="animate-ping absolute inline-flex h-full w-full rounded-full bg-purple-400 opacity-75"></span>
                                        <span
                                            class="relative inline-flex rounded-full h-3 w-3 bg-purple-500"></span>
                                    </span>
                                </span>
                            </div>

                            @endif @endguest @auth
                            <x-jet-input wire:model.defer='fee' style="width: 100px;"></x-jet-input>
                            {{-- <a wire:click='sendInvoice'>
                                    <x-jet-button>Send Invoice</x-jet-button>
                                </a> --}}
                            <div class="justify-around">

                                <span class="relative inline-flex rounded-md shadow-sm">

                                    <button wire:click='sendInvoice' type="button"
                                        class="uppercase inline-flex items-center px-4 py-2 border border-purple-400 text-base leading-6 font-medium rounded-md text-purple-800 bg-white hover:text-purple-700 focus:border-purple-300 transition ease-in-out duration-150">
                                        Send Invoice
                                    </button>
                                    <span class="flex absolute h-3 w-3 top-0 right-0 -mt-1 -mr-1">
                                        <span
                                            class="animate-ping absolute inline-flex h-full w-full rounded-full bg-purple-400 opacity-75"></span>
                                        <span
                                            class="relative inline-flex rounded-full h-3 w-3 bg-purple-500"></span>
                                    </span>
                                </span>
                            </div>
                            <div class="row">

                            </div>
                            @endauth
                        </div>
                    </div>
                    <!--begin::Scroll-->
                    <div class="scroll-y me-lg-n6 pe-lg-5" data-kt-scroll="true"
                        data-kt-scroll-height="{'default' : '400px', 'lg' : 'auto'}"
                        data-kt-scroll-dependencies="#kt_header, #kt_toolbar, #kt_footer, #kt_chat_content_header, #kt_chat_content_footer"
                        data-kt-scroll-wrappers="#kt_content, #kt_wrapper"
                        data-kt-scroll-offset="{'default' : '10px', 'lg' : '52px'}" style="height: 589px">

                        <hr>
                        <!--begin::Messages-->
                        <div wire:poll class="messages" wire:model.defer='messages' id="messages">
                            @auth @foreach ($messages as $message)
                            <div
                                class="{{ ($message->from_id == Auth::user()->id) ? 'd-flex flex-column mb-5 align-items-end' : 'd-flex flex-column mb-5 align-items-start' }}">
                                <div class="d-flex align-items-center">
                                    <!--begin::Symbol-->
                                    <div class="symbol symbol-40px flex-shrink-0 me-4">
                                        <span class="symbol-label bg-light">
                                            <img src="img/avatar.jpg" class="h-75 align-self-end" alt="" />
                                        </span>
                                    </div>
                                    <!--end::Symbol-->
                                    <div
                                        class="{{ ($message->from_id == Auth::user()->id) ? 'd-flex flex-column text-end' : 'd-flex flex-column' }}">
                                        <a href="#"
                                            class="text-gray-600 text-hover-primary fw-bolder">{{ ($message->from_id == Auth::user()->id) ? 'You' : $orderDetails->order->username }}</a>
                                        <span class="text-muted fw-bold fs-7">{{$message->created_at}}</span>
                                    </div>
                                </div>
                                <div
                                    class="{{ ($message->from_id == Auth::user()->id) ? 'rounded mt-2 p-5 bg-light-success text-gray-600 text-end mw-400px' : 'rounded mt-2 p-5 bg-light-primary text-gray-600 text-start mw-400px' }}">
                                    {{$message->message}}
                                </div>
                            </div>
                            @endforeach @endauth @guest @foreach ($messages as $message)
                            <div
                                class="{{ ($message->from_id == $client[0] && $message->type == 'Client') ? 'd-flex flex-column mb-5 align-items-end' : 'd-flex flex-column mb-5 align-items-start' }}">
                                <div class="d-flex align-items-center">
                                    <!--begin::Symbol-->
                                    <div class="symbol symbol-40px flex-shrink-0 me-4">
                                        <span class="symbol-label bg-light">
                                            <img src="img/avatar.jpg" class="h-75 align-self-end" alt="" />
                                        </span>
                                    </div>
                                    <!--end::Symbol-->
                                    <div
                                        class="{{ ($message->from_id == $client[0] && $message->type == 'Client') ? 'd-flex flex-column text-end' : 'd-flex flex-column' }}">
                                        <a href="#"
                                            class="text-gray-600 text-hover-primary fw-bolder">{{ ($message->from_id == $client[0] && $message->type == 'Client') ? 'You' : 'Admin' }}</a>
                                        <span class="text-muted fw-bold fs-7">{{$message->created_at}}</span>
                                    </div>
                                </div>
                                <div
                                    class="{{ ($message->from_id == $client[0] && $message->type == 'Client') ? 'rounded mt-2 p-5 bg-light-success text-gray-600 text-end mw-400px' : 'rounded mt-2 p-5 bg-light-primary text-gray-600 text-start mw-400px' }}">
                                    {{$message->message}}
                                </div>
                            </div>

                            @endforeach
                            @if ($confirm_invoice)
                            <div class="justify-around">
                                <div class="flex">
                                    <span class="relative inline-flex rounded-md shadow-sm cursor-pointer">

                                        <button wire:click='confrimInvoice' type="button"
                                            class="uppercase inline-flex items-center px-4 py-2 border border-purple-400 text-base leading-6 font-medium rounded-md text-purple-800 bg-white hover:text-purple-700 focus:border-purple-300 transition ease-in-out duration-150">
                                            Confirm Invoice
                                        </button>
                                        <span class="flex absolute h-3 w-3 top-0 right-0 -mt-1 -mr-1">
                                            <span
                                                class="animate-ping absolute inline-flex h-full w-full rounded-full bg-purple-400 opacity-75"></span>
                                            <span
                                                class="relative inline-flex rounded-full h-3 w-3 bg-purple-500"></span>
                                        </span>
                                    </span>

                                    <span
                                        class="relative inline-flex rounded-md shadow-sm ml-2 cursor-pointer hover:bg-purple-700">

                                        <button wire:click='rejectInvoice' type="button"
                                            class="uppercase inline-flex items-center px-4 py-2 border border-purple-400 text-base leading-6 font-medium rounded-md text-purple-800 bg-white hover:text-purple-700 focus:border-purple-300 transition ease-in-out duration-150">
                                            Reject Invoice
                                        </button>
                                        <span class="flex absolute h-3 w-3 top-0 right-0 -mt-1 -mr-1">
                                            <span
                                                class="animate-ping absolute inline-flex h-full w-full rounded-full bg-purple-400 opacity-75"></span>
                                            <span
                                                class="relative inline-flex rounded-full h-3 w-3 bg-purple-500"></span>
                                        </span>
                                    </span>
                                </div>

                            </div>
                            @endif
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
                            <textarea wire:model.defer='messageText'
                                class="form-control border-0 p-2 resize-none overflow-hidden" rows="1"
                                placeholder="Reply..."></textarea>
                            <div class="position-absolute top-0 end-0 mr-n2">
                                <span class="btn btn-icon btn-active-light-primary">
                                    <i class="bi bi-paperclip"></i>
                                </span>
                                <button type="submit" onclick="scrollToBottomFunc()" id="sendmsg">
                                    <span class="btn btn-icon btn-active-light-primary">
                                        <i class="bi bi-telegram"></i>
                                        Send
                                    </span>

                                </button>

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
</div>
