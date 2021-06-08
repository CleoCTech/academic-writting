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
                    <a class="btn btn-primary" id="kt_toolbar_primary_button" wire:click='back'><span
                            class="svg-icon svg-icon-2 rotate-180"> <i class="bi bi-arrow-bar-left"></i> </span>Back</a>
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
                                        {{-- <textarea class="form-control" rows="5" id="body" disabled>{{$orderDetails->instructions}}</textarea> --}}
                                    </div>
                                </div>
                                <h4 class="text-blue-400 " style="margin-top: 1rem;">Additional Insructions (Revision)
                                    <span
                                        class="svg-icon svg-icon-4 ">
                                        <i class="bi bi-paperclip text-blue-400"></i>
                                    </span>
                                  </h4>
                                  @auth
                                  <h4 class="text-blue-400 text-sm" style="margin-top: 1rem;">Remember to check additional attached files below (if any)
                                    <span
                                        class="svg-icon svg-icon-4 ">
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
                                        <textarea class="form-control" rows="5" id="body" disabled>{{$orderDetails->instructions}}</textarea> --}}
                                    </div>
                                </div>
                                <div class="flex-stack mb-9">
                                    <div class=" align-items-center">
                                        <div class=" flex-column mb-4">
                                            <h4 class="text-blue-400 " style="margin-top: 1rem;">Attached
                                                Files
                                                <span
                                                    class="svg-icon svg-icon-4 ">
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
                                                <a class="text-gray-600 text-hover-primary fw-bold fs-6 mb-3 ">{{$clientFile->filename}}
                                                </a>
                                            </div>
                                            <div class="col-md-4 p-3">
                                                <a wire:click="getDownload('{{$clientFile->folder}}/{{$clientFile->filename}}')"
                                                    type="button" class="btn-floating btn-small"
                                                    download="{{$clientFile->filename}}"> <span
                                                        class="svg-icon svg-icon-3">
                                                        <i class="bi bi-download"></i>
                                                    </span></a>
                                            </div>
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
                        <div class="card-body px-9">
                            <div class="row mt-0">
                                <div class="col-md-6 mt-3">
                                    <a href="">{{$orderDetails->order_no}}</a>
                                </div>
                                <div wire:poll class="col-md-6 align-items-end text-end"
                                    wire:model.defer='confirm_invoice'>
                                    @guest @if ($confirm_invoice)
{{--
                                    <a>
                                        <x-jet-button wire:click='confrimInvoice'>Confirm Invoice</x-jet-button>
                                    </a> --}}
                                    <div class="justify-around">

                                        <span class="relative inline-flex rounded-md shadow-sm">

                                          <button  wire:click='confrimInvoice' type="button" class="uppercase inline-flex items-center px-4 py-2 border border-purple-400 text-base leading-6 font-medium rounded-md text-purple-800 bg-white hover:text-purple-700 focus:border-purple-300 transition ease-in-out duration-150">
                                            Confirm Invoice
                                          </button>
                                          <span class="flex absolute h-3 w-3 top-0 right-0 -mt-1 -mr-1">
                                            <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-purple-400 opacity-75"></span>
                                            <span class="relative inline-flex rounded-full h-3 w-3 bg-purple-500"></span>
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

                                          <button  wire:click='sendInvoice' type="button" class="uppercase inline-flex items-center px-4 py-2 border border-purple-400 text-base leading-6 font-medium rounded-md text-purple-800 bg-white hover:text-purple-700 focus:border-purple-300 transition ease-in-out duration-150">
                                            Send Invoice
                                          </button>
                                          <span class="flex absolute h-3 w-3 top-0 right-0 -mt-1 -mr-1">
                                            <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-purple-400 opacity-75"></span>
                                            <span class="relative inline-flex rounded-full h-3 w-3 bg-purple-500"></span>
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
                                        <button type="submit"  onclick="scrollToBottomFunc()" id="sendmsg">
                                            <span
                                                class="btn btn-icon btn-active-light-primary">
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
            <!--end::Chat-->
            <br>
            @guest
            @if (!$orderStatus)
            <div class="d-flex flex-column flex-lg-row">
                <div class="flex-lg-row-fluid">
                    <div class='card'>
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
                                <div class="text-primary fw-bolder fs-6">
                                  Get Your Order Here
                                </div>

                            </div>
                        </div>
                        <div class="card-body px-9">
                            <div class="flex-stack mb-9">
                                <div class=" align-items-center">
                                    <div class=" flex-column mb-4">
                                        <a class="text-primary fw-bolder fs-6 mb-3">Attached
                                            Files</a>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-4 mt-4">
                                            @if (count($companyFiles) > 0)
                                            @foreach ($companyFiles as $companyFile)
                                            <div class="row">
                                                <div>
                                                    @if (session()->has('message'))
                                                    <div class="alert alert-success">
                                                        {{ session('message') }}
                                                    </div>
                                                    @endif
                                                </div>
                                                <div class="col-md-8">
                                                    <a class="text-gray-600 text-hover-primary fw-bold fs-6 mb-3 ">{{$companyFile->filename}}
                                                    </a>
                                                </div>
                                                <div class="col-md-2 p-3">
                                                    <a wire:click="getDownload('{{$companyFile->folder}}/{{$companyFile->filename}}')"
                                                        type="button" class="btn-floating btn-small"
                                                        download="{{$companyFile->filename}}"> <span
                                                            class="svg-icon svg-icon-3">
                                                            <i class="bi bi-download"></i>
                                                        </span>
                                                    </a>

                                                </div>
                                            </div>
                                            @endforeach
                                            @else
                                            <p>*** Yet to be uploaded ***</p>
                                            @endif
                                        </div>
                                        @if (count($companyFiles) > 0)
                                        <div class="col-md-8 mt-0">
                                            <div class="row bg-indigo-600 bg-opacity-25">
                                                <div class="col-sm-6">
                                                    <div class="card">
                                                      <div class="card-body">
                                                        <h4 class="text-blue-400 uppercase " style="margin-top: -1rem;">Accepting Order From Writer
                                                          <span
                                                              class="svg-icon svg-icon-3 text-yellow-500">
                                                              <i class="bi bi-exclamation-triangle text-yellow-500"></i>
                                                          </span>
                                                      </h4>
                                                        <p class="mb-10 font-sans md:font-serif text-gray-400 text-hover-primary ">Before accepting the order, preview the work and assertain that everything is okay.</p>
                                                        {{-- <a wire:click='activateAcceptSection' class="btn btn-primary">Accept Order</a> --}}
                                                        <div class="justify-around" x-data=''>

                                                            <span class="relative inline-flex rounded-lg shadow-sm">

                                                              <button wire:click='activateAcceptSection' type="button" class="btn-primary transition duration-150 ease-in-out transform hover:scale-110 bg-emerald-600 text-white font-semibold py-3 px-6 rounded-md"  >

                                                                    <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                                    x-data="{show: false}"
                                                                    x-show="show"
                                                                    x-init="@this.on('saved', () => { show = true; setTimeout(() => { show = false;}, 2000) })"
                                                                    style="display: none;">
                                                                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                                                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                                                  </svg>

                                                               Accept Order
                                                              </button>
                                                            </span>
                                                        </div>
                                                        @if ($accept_section)
                                                        <div>
                                                            <h4 class="text-blue-400 " style="margin-top: 1rem;">Leave a comment (Optional)
                                                                <span
                                                                    class="svg-icon svg-icon-4 ">
                                                                    <i class="bi bi-chat-left-text-fill text-blue-400"></i>
                                                                </span>
                                                              </h4>
                                                            {{-- <label for="Instructions" class="block text-md font-medium text-gray-700">Leave a comment (Optional)</label> --}}
                                                            <div class="mt-1 relative rounded-md shadow-sm">
                                                              <textarea wire:model.defer='comment' class="bg-white focus:shadow-outline text-gray-700 appearance-none inline-block w-full border border-emerald-300 rounded-lg py-3 px-4 focus:outline-none " rows="4" ></textarea>
                                                            </div>
                                                        </div>

                                                        <div class="justify-around" x-data=''>

                                                            <span class="relative inline-flex rounded-lg shadow-sm">

                                                              <button onclick="resetPond()" type="button" class="btn-primary transition duration-150 ease-in-out transform hover:scale-110 bg-emerald-600 text-white font-semibold py-3 px-6 rounded-md" x-on:click="$wire.accept('{{$orderDetails->order_no}}')" >

                                                                    <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                                    x-data="{show: false}"
                                                                    x-show="show"
                                                                    x-init="@this.on('saved', () => { show = true; setTimeout(() => { show = false;}, 2000) })"
                                                                    style="display: none;">
                                                                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                                                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                                                  </svg>

                                                               Submit
                                                              </button>
                                                            </span>
                                                        </div>
                                                        @endif
                                                      </div>
                                                    </div>
                                                  </div>
                                                  <div class="col-sm-6">
                                                    <div class="card">
                                                      <div class="card-body">
                                                        <h4 class="text-blue-400 uppercase " style="margin-top: -1rem;">Rejecting Order
                                                          <span
                                                              class="svg-icon svg-icon-4 text-yellow-500">
                                                              <i class="bi bi-exclamation-triangle text-yellow-500"></i>
                                                          </span>
                                                        </h4>
                                                        <p class=" mb-4 font-sans md:font-serif text-gray-400 text-hover-blue-700 text-hover-primary hover:text-blue-700">Before rejecting the order, preview the work and assertain that instructions you gave were not followed.</p>
                                                        {{-- <a  wire:click='activateRejectSection' class="btn btn-danger">Reject Order</a> --}}
                                                        <div class="justify-around" x-data=''>

                                                            <span class="relative inline-flex rounded-lg shadow-sm">

                                                              <button wire:click='activateRejectSection' type="button" class="btn-danger transition duration-150 ease-in-out transform hover:scale-110 bg-emerald-600 text-white font-semibold py-3 px-6 rounded-md"  >

                                                                    <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                                    x-data="{show: false}"
                                                                    x-show="show"
                                                                    x-init="@this.on('saved', () => { show = true; setTimeout(() => { show = false;}, 2000) })"
                                                                    style="display: none;">
                                                                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                                                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                                                  </svg>

                                                              Reject Order
                                                              </button>
                                                            </span>
                                                        </div>
                                                        @if ($reject_section)
                                                        <div>
                                                            <label for="Instructions" class="block text-md font-medium text-gray-700">More Instructions</label>
                                                            <div class="mt-1 relative rounded-md shadow-sm">
                                                              <textarea wire:model.defer='comment' class="bg-white focus:shadow-outline text-gray-700 appearance-none inline-block w-full border border-emerald-300 rounded-lg py-3 px-4 focus:outline-none " rows="4" ></textarea>
                                                            </div>
                                                        </div>
                                                        <h4 class="text-blue-400 " style="margin-top: 1rem;">Add Files (Optional)
                                                            <span
                                                                class="svg-icon svg-icon-4 ">
                                                                <i class="bi bi-paperclip text-blue-400"></i>
                                                            </span>
                                                          </h4>
                                                        <div wire:ignore class="row">
                                                            <div class="col-lg-12 col-md-12 col-sm-12">
                                                                <input type="file"  name="paperFile" id="test" multiple>
                                                            </div>
                                                            <script type="text/javascript">
                                                                const inputElement = document.querySelector('input[id="test"]');
                                                                const pond = FilePond.create( inputElement );
                                                                FilePond.setOptions({
                                                                    server:{
                                                                        url: '/upload',
                                                                        headers: {
                                                                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                                                                        }
                                                                    }
                                                                });
                                                            </script>
                                                        </div>
                                                        <div class="justify-around" x-data=''>

                                                            <span class="relative inline-flex rounded-lg shadow-sm">

                                                              <button onclick="resetPond()" type="button" class="btn-primary inline-flex items-center px-6 py-3 text-white leading-6 font-medium rounded-lg  focus:border-purple-300 transition ease-in-out duration-150" x-on:click="$wire.reject('{{$orderDetails->order_no}}')" >

                                                                    <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                                    x-data="{show: false}"
                                                                    x-show="show"
                                                                    x-init="@this.on('saved', () => { show = true; setTimeout(() => { show = false;}, 2000) })"
                                                                    style="display: none;">
                                                                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                                                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                                                  </svg>

                                                               Submit
                                                              </button>
                                                            </span>
                                                        </div>
                                                        @endif

                                                      </div>
                                                    </div>


                                                  </div>
                                            </div>
                                        </div>
                                        @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif
            @endguest

            @auth
            @if (!$orderStatus)
            <div class="d-flex flex-column flex-lg-row">
                <div class="flex-lg-row-fluid">
                    <div class='card'>
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
                                <div class="text-gray-600 fw-bolder fs-6">
                                  Order Submision
                                </div>

                            </div>
                        </div>
                        <div class="card-body px-9">
                            <div class="flex-stack mb-9">
                                <div class=" align-items-center">
                                    <div class=" flex-column mb-4">
                                        <a class="text-gray-600 text-hover-primary fw-bolder fs-6 mb-3">Attache
                                            Files</a>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-4 mt-4">
                                            @foreach ($companyFiles as $companyFile)
                                            <div class="row">
                                                <div>
                                                    @if (session()->has('message'))
                                                    <div class="alert alert-success">
                                                        {{ session('message') }}
                                                    </div>
                                                    @endif
                                                </div>
                                                <div class="col-md-8">
                                                    <a class="text-gray-600 text-hover-primary fw-bold fs-6 mb-3 ">{{$companyFile->filename}}
                                                    </a><span>
                                                        <a wire:click="dropFile('{{$companyFile->id}}','{{$companyFile->folder}}', '{{$companyFile->filename}}')" class="text-gray-600 text-hover-danger fw-bold fs-4 mb-1" >
                                                            <i class="bi bi-x-circle" style="font-size:1.5rem;"></i></a>

                                                    </span>
                                                </div>
                                                <div class="col-md-2 p-3">
                                                    <a wire:click="getDownload('{{$companyFile->folder}}/{{$companyFile->filename}}')"
                                                        type="button" class="btn-floating btn-small"
                                                        download="{{$companyFile->filename}}"> <span
                                                            class="svg-icon svg-icon-3">
                                                            <i class="bi bi-download"></i>
                                                        </span>
                                                    </a>

                                                </div>
                                            </div>
                                            @endforeach
                                            <div>
                                                @if (session()->has('success'))
                                                <div class="alert alert-success">
                                                    {{ session('success') }}
                                                </div>
                                                @endif
                                            </div>
                                            <h4 class="text-blue-400 " style="margin-top: 1rem;">Add Files
                                                <span
                                                    class="svg-icon svg-icon-4 ">
                                                    <i class="bi bi-paperclip text-blue-400"></i>
                                                </span>
                                              </h4>
                                            <div wire:ignore class="row">
                                                <div class="col-lg-12 col-md-12 col-sm-12">
                                                    <input type="file" wire:model.defer='companyFile' name="paperFile" id="test" multiple>
                                                </div>
                                                <script type="text/javascript">
                                                    const inputElement = document.querySelector('input[id="test"]');
                                                    const pond = FilePond.create( inputElement );
                                                    FilePond.setOptions({
                                                        server:{
                                                            url: '/upload',
                                                            headers: {
                                                                'X-CSRF-TOKEN': '{{ csrf_token() }}'
                                                            }
                                                        }
                                                    });
                                                    function resetPond(){
                                                       var pond = document.getElementById("test");
                                                       pond.removeFiles();
                                                    }
                                                </script>
                                            </div>
                                            <div class="justify-around" >

                                                <span class="relative inline-flex rounded-lg shadow-sm">

                                                  <button onclick="resetPond()" type="button" class="btn-primary inline-flex items-center px-6 py-3 text-white leading-6 font-medium rounded-lg  focus:border-purple-300 transition ease-in-out duration-150"  wire:click='store' >

                                                        <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                        x-data="{show: false}"
                                                        x-show="show"
                                                        x-init="@this.on('saved', () => { show = true; setTimeout(() => { show = false;}, 2000) })"
                                                        style="display: none;">
                                                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                                      </svg>

                                                   Submit
                                                  </button>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="col-md-8 mt-0">
                                            <div class="row bg-indigo-600 bg-opacity-25">
                                                <div class="col-sm-6">
                                                    <div class="card">
                                                      <div class="card-body">
                                                        <h4 class="text-blue-400 uppercase " style="margin-top: -1rem;">Accepting Order From Writer
                                                          <span
                                                              class="svg-icon svg-icon-3 text-yellow-500">
                                                              <i class="bi bi-exclamation-triangle text-yellow-500"></i>
                                                          </span>
                                                      </h4>
                                                        <p class="mb-10 font-sans md:font-serif text-gray-400">Before accepting the order, preview the work and assertain that everything is okay.</p>
                                                        <a href="#" class="btn btn-primary">Accept Order</a>
                                                      </div>
                                                    </div>
                                                  </div>
                                                  <div class="col-sm-6">
                                                    <div class="card">
                                                      <div class="card-body">
                                                        <h4 class="text-blue-400 uppercase " style="margin-top: -1rem;">Rejecting Order
                                                          <span
                                                              class="svg-icon svg-icon-4 text-yellow-500">
                                                              <i class="bi bi-exclamation-triangle text-yellow-500"></i>
                                                          </span>
                                                        </h4>
                                                        <p class=" mb-4 font-sans md:font-serif text-gray-400 hover:text-blue-700">Before rejecting the order, preview the work and assertain that instructions you gave were not followed.</p>
                                                        <a href="#" class="btn btn-danger">Reject Order</a>
                                                        @if ($reject_section)
                                                        <div>
                                                            <label for="Instructions" class="block text-md font-medium text-gray-700">More Instructions</label>
                                                            <div class="mt-1 relative rounded-md shadow-sm">
                                                              <textarea  class="bg-white focus:shadow-outline text-gray-700 appearance-none inline-block w-full border border-emerald-300 rounded-lg py-3 px-4 focus:outline-none " rows="4" ></textarea>
                                                            </div>
                                                        </div>
                                                        <h4 class="text-blue-400 " style="margin-top: 1rem;">Add Files
                                                            <span
                                                                class="svg-icon svg-icon-4 ">
                                                                <i class="bi bi-paperclip text-blue-400"></i>
                                                            </span>
                                                          </h4>
                                                        <div wire:ignore class="row">
                                                            <div class="col-lg-12 col-md-12 col-sm-12">
                                                                <input type="file"  name="paperFile" id="test" multiple>
                                                            </div>
                                                            <script type="text/javascript">
                                                                const inputElement = document.querySelector('input[id="test"]');
                                                                const pond = FilePond.create( inputElement );
                                                                FilePond.setOptions({
                                                                    server:{
                                                                        url: '/upload',
                                                                        headers: {
                                                                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                                                                        }
                                                                    }
                                                                });
                                                            </script>
                                                        </div>
                                                        <a href="#" class="btn btn-primary">Submit</a>
                                                        @endif

                                                      </div>
                                                    </div>


                                                  </div>
                                            </div>
                                        </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif
            @endauth
        </div>
    </div>
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
