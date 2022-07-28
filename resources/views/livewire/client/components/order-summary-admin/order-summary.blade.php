<div>
    {{-- Care about people's approval and you will be their prisoner. --}}
    <!--begin::Toolbar-->
    <div class="toolbar" id="kt_toolbar">
        <div class="container-fluid d-flex flex-stack flex-wrap flex-sm-nowrap">
            <!--begin::Info-->
            <div class="d-flex flex-column align-items-start justify-content-center flex-wrap me-2">
                <!--begin::Title-->
                <h1 class="text-dark fw-bolder my-1 fs-2">
                    @if ($confirm_invoice)
                    Send Invoice
                    @else
                    Order In Progress
                    @endif
                    <small class="text-muted fs-6 fw-normal ms-1"></small>
                </h1>
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

    <!--begin::Chat-->
    <div class="container">
        <!--begin::Aside-->
        <div class="d-flex flex-column flex-lg-row">
            <div class="flex-lg-row-auto w-lg-250px w-xl-400px mb-5 mb-lg-0" id="kt_chat_aside">
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
                                    {{-- <textarea class="form-control" rows="5" id="body"
                                        disabled>{{$orderDetails->instructions}}</textarea>
                                    --}}
                                </div>
                            </div>
                            <h4 class="text-blue-400 " style="margin-top: 1rem;">Additional Insructions (Revision)
                                <span class="svg-icon svg-icon-4 ">
                                    <i class="bi bi-paperclip text-blue-400"></i>
                                </span>
                            </h4>
                            <h4 class="text-blue-400 text-sm" style="margin-top: 1rem;">Remember to check additional
                                attached files below (if any)
                                <span class="svg-icon svg-icon-4 ">
                                    <i class="bi bi-bell-fill text-blue-400"></i>
                                </span>
                            </h4>

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
                                    <textarea class="form-control" rows="5" id="body"
                                        disabled>{{$orderDetails->instructions}}</textarea>
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
                                    </div>
                                    @endforeach
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--end::Aside-->

            <!--begin::Content-->
            <div class="flex-lg-row-fluid ms-lg-12" id="kt_chat_content">
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
                                            <a href="#" class="text-gray-600 text-hover-primary fw-bolder">{{
                                                ($message->from_id == Auth::user()->id) ? 'You' :
                                                $orderDetails->order->username }}</a>
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
                                            <a href="#" class="text-gray-600 text-hover-primary fw-bolder">{{
                                                ($message->from_id == $client[0] && $message->type == 'Client') ? 'You'
                                                : 'Admin' }}</a>
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
            </div>
            <!--end::Content-->
        </div>
        <!--end::Chat-->
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
                                                    <a wire:click="dropFile('{{$companyFile->id}}','{{$companyFile->folder}}', '{{$companyFile->filename}}')"
                                                        class="text-gray-600 text-hover-danger fw-bold fs-4 mb-1">
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
                                            <span class="svg-icon svg-icon-4 ">
                                                <i class="bi bi-paperclip text-blue-400"></i>
                                            </span>
                                        </h4>
                                        <div wire:ignore class="row">
                                            <div class="col-lg-12 col-md-12 col-sm-12">
                                                <input type="file" wire:model.defer='companyFile' name="paperFile[]"
                                                    id="test" multiple>
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
                                        <div class="justify-around">

                                            <span class="relative inline-flex rounded-lg shadow-sm">

                                                <button onclick="resetPond()" type="button"
                                                    class="btn-primary inline-flex items-center px-6 py-3 text-white leading-6 font-medium rounded-lg  focus:border-purple-300 transition ease-in-out duration-150"
                                                    wire:click='store'>

                                                    <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white"
                                                        xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 24 24" x-data="{show: false}" x-show="show"
                                                        x-init="@this.on('saved', () => { show = true; setTimeout(() => { show = false;}, 2000) })"
                                                        style="display: none;">
                                                        <circle class="opacity-25" cx="12" cy="12" r="10"
                                                            stroke="currentColor" stroke-width="4"></circle>
                                                        <path class="opacity-75" fill="currentColor"
                                                            d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                                                        </path>
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
                                                        <div class="flex-stack mb-9">
                                                            <div class=" align-items-center">
                                                                <div class=" flex-column mb-4">
                                                                    <h4 class="text-blue-400 "
                                                                        style="margin-top: 1rem;">
                                                                        Attached
                                                                        Files
                                                                        <span class="svg-icon svg-icon-4 ">
                                                                            <i
                                                                                class="bi bi-paperclip text-blue-400"></i>
                                                                        </span>
                                                                    </h4>
                                                                </div>
                                                                {{-- {{
                                                                $this->checkIfOrderPassedStage($orderDetails->id,
                                                                auth()->user()->role) }}
                                                                --}}
                                                                @foreach ($writerFiles as $writerFile)
                                                                {{-- @php
                                                                $path = $clientFile->folder.'/'.$clientFile->filename;
                                                                // getDownload(
                                                                {{$clientFile->folder'/'$clientFile->filename}}
                                                                )
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

                                                                    @if(($this->orderCurrentStatus($writerFile->order_id)
                                                                    ) === auth()->user()->role || $orderNextLevel)
                                                                    {{-- {{dd(auth()->user()->role)}} --}}
                                                                    <div class="col-md-10">
                                                                        <a wire:click="getDownload('{{$writerFile->folder}}/{{$writerFile->filename}}')"
                                                                            class="text-gray-600 text-hover-primary  fw-bold fs-8 mb-3 link-download"
                                                                            title="Click to download">
                                                                            {{strlen($writerFile->filename) > 20?
                                                                            substr($writerFile->filename,0,20).'...':$writerFile->filename}}
                                                                            ?>
                                                                        </a>
                                                                    </div>
                                                                    <div class="col-md-2 p-1">
                                                                        {{-- <a
                                                                            wire:click="deleteFile('{{$writerFile->folder}}')"
                                                                            type="button" class="btn-floating xs"
                                                                            download="{{$writerFile->filename}}"> <span
                                                                                class="svg-icon svg-icon-3 text-hover-danger">
                                                                                <i class="bi bi-trash-fill fs-4"></i>
                                                                            </span></a> --}}
                                                                        <span class="float-end">
                                                                            <a wire:click="getDownload('{{$writerFile->folder}}/{{$writerFile->filename}}')"
                                                                                type="button"
                                                                                class="btn-floating btn-xs"
                                                                                download="{{$writerFile->filename}}">
                                                                                <span
                                                                                    class="svg-icon svg-icon-8 text-hover-primary">
                                                                                    <i class="bi bi-download fs-4"></i>
                                                                                </span></a>
                                                                        </span>
                                                                    </div>
                                                                    @else
                                                                    {{-- {{dd("False")}} --}}
                                                                    <h4 class="text-blue-400 "
                                                                        style="margin-top: 1rem;">
                                                                        ***No Files Found***
                                                                        <span class="svg-icon svg-icon-4 ">
                                                                            <i
                                                                                class="bi bi-paperclip text-blue-400"></i>
                                                                        </span>
                                                                    </h4>
                                                                    @endif

                                                                </div>
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                        @if ($showOperationSection)

                                                        <h4 class="text-blue-400 uppercase " style="margin-top: -1rem;">
                                                            Accepting Order From
                                                            Writer
                                                            <span class="svg-icon svg-icon-3 text-yellow-500">
                                                                <i
                                                                    class="bi bi-exclamation-triangle text-yellow-500"></i>
                                                            </span>
                                                        </h4>
                                                        <p class="mb-10 font-sans md:font-serif text-gray-400">
                                                            Before accepting the order, preview the work and
                                                            assertain that everything is okay.</p>

                                                        @if ($acceptBtn)
                                                        <div class="justify-around" x-data=''>

                                                            <span class="relative inline-flex rounded-lg shadow-sm">

                                                                <button wire:click='activateAcceptSection' type="button"
                                                                    class="btn-primary transition duration-150 ease-in-out transform hover:scale-110 bg-emerald-600 text-white font-semibold py-3 px-6 rounded-md">

                                                                    <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white"
                                                                        xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                        viewBox="0 0 24 24" x-data="{show: false}"
                                                                        x-show="show"
                                                                        x-init="@this.on('saved', () => { show = true; setTimeout(() => { show = false;}, 2000) })"
                                                                        style="display: none;">
                                                                        <circle class="opacity-25" cx="12" cy="12"
                                                                            r="10" stroke="currentColor"
                                                                            stroke-width="4"></circle>
                                                                        <path class="opacity-75" fill="currentColor"
                                                                            d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                                                                        </path>
                                                                    </svg>

                                                                    Accept Order
                                                                </button>
                                                            </span>
                                                        </div>
                                                        @endif

                                                        @if ($accept_section)
                                                        <div>
                                                            <h4 class="text-blue-400 " style="margin-top: 1rem;">
                                                                Leave a comment (Optional)
                                                                <span class="svg-icon svg-icon-4 ">
                                                                    <i
                                                                        class="bi bi-chat-left-text-fill text-blue-400"></i>
                                                                </span>
                                                            </h4>
                                                            {{-- <label for="Instructions"
                                                                class="block text-md font-medium text-gray-700">Leave a
                                                                comment (Optional)</label> --}}
                                                            <div class="mt-1 relative rounded-md shadow-sm">
                                                                <textarea wire:model.defer='comment'
                                                                    class="bg-white focus:shadow-outline text-gray-700 appearance-none inline-block w-full border border-emerald-300 rounded-lg py-3 px-4 focus:outline-none "
                                                                    rows="4"></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="justify-around" x-data=''>

                                                            <span class="relative inline-flex rounded-lg shadow-sm">

                                                                <button onclick="resetPond()" type="button"
                                                                    class="btn-primary transition duration-150 ease-in-out transform hover:scale-110 bg-emerald-600 text-white font-semibold py-3 px-6 rounded-md"
                                                                    x-on:click="$wire.accept('{{$orderDetails->order_no}}')">

                                                                    <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white"
                                                                        xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                        viewBox="0 0 24 24" x-data="{show: false}"
                                                                        x-show="show"
                                                                        x-init="@this.on('saved', () => { show = true; setTimeout(() => { show = false;}, 2000) })"
                                                                        style="display: none;">
                                                                        <circle class="opacity-25" cx="12" cy="12"
                                                                            r="10" stroke="currentColor"
                                                                            stroke-width="4"></circle>
                                                                        <path class="opacity-75" fill="currentColor"
                                                                            d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                                                                        </path>
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
                                                        <h4 class="text-blue-400 uppercase " style="margin-top: -1rem;">
                                                            Rejecting Order
                                                            <span class="svg-icon svg-icon-4 text-yellow-500">
                                                                <i
                                                                    class="bi bi-exclamation-triangle text-yellow-500"></i>
                                                            </span>
                                                        </h4>
                                                        <p
                                                            class=" mb-4 font-sans md:font-serif text-gray-400 text-hover-blue-700 text-hover-primary hover:text-blue-700">
                                                            Before rejecting the order, preview the work and
                                                            assertain that instructions you gave were not followed.
                                                        </p>
                                                        {{-- <a wire:click='activateRejectSection'
                                                            class="btn btn-danger">Reject Order</a> --}}
                                                        @if ($rejectBtn)


                                                        <div class="justify-around" x-data=''>

                                                            <span class="relative inline-flex rounded-lg shadow-sm">

                                                                <button wire:click='activateRejectSection' type="button"
                                                                    class="btn-danger transition duration-150 ease-in-out transform hover:scale-110 bg-emerald-600 text-white font-semibold py-3 px-6 rounded-md">

                                                                    <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white"
                                                                        xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                        viewBox="0 0 24 24" x-data="{show: false}"
                                                                        x-show="show"
                                                                        x-init="@this.on('saved', () => { show = true; setTimeout(() => { show = false;}, 2000) })"
                                                                        style="display: none;">
                                                                        <circle class="opacity-25" cx="12" cy="12"
                                                                            r="10" stroke="currentColor"
                                                                            stroke-width="4"></circle>
                                                                        <path class="opacity-75" fill="currentColor"
                                                                            d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                                                                        </path>
                                                                    </svg>

                                                                    Reject Order
                                                                </button>
                                                            </span>
                                                        </div>
                                                        @endif
                                                        @if ($reject_section)
                                                        <div>
                                                            <label for="Instructions"
                                                                class="block text-md font-medium text-gray-700">More
                                                                Instructions</label>
                                                            <div class="mt-1 relative rounded-md shadow-sm">
                                                                <textarea wire:model.defer='comment'
                                                                    class="bg-white focus:shadow-outline text-gray-700 appearance-none inline-block w-full border border-emerald-300 rounded-lg py-3 px-4 focus:outline-none "
                                                                    rows="4"></textarea>
                                                            </div>
                                                        </div>
                                                        <h4 class="text-blue-400 " style="margin-top: 1rem;">Add
                                                            Files (Optional)
                                                            <span class="svg-icon svg-icon-4 ">
                                                                <i class="bi bi-paperclip text-blue-400"></i>
                                                            </span>
                                                        </h4>
                                                        <div wire:ignore class="row">
                                                            <div class="col-lg-12 col-md-12 col-sm-12">
                                                                <input type="file" name="paperFile[]" id="test"
                                                                    multiple>
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

                                                                <button onclick="resetPond()" type="button"
                                                                    class="btn-primary inline-flex items-center px-6 py-3 text-white leading-6 font-medium rounded-lg  focus:border-purple-300 transition ease-in-out duration-150"
                                                                    x-on:click="$wire.reject('{{$orderDetails->order_no}}')">

                                                                    <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white"
                                                                        xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                        viewBox="0 0 24 24" x-data="{show: false}"
                                                                        x-show="show"
                                                                        x-init="@this.on('saved', () => { show = true; setTimeout(() => { show = false;}, 2000) })"
                                                                        style="display: none;">
                                                                        <circle class="opacity-25" cx="12" cy="12"
                                                                            r="10" stroke="currentColor"
                                                                            stroke-width="4"></circle>
                                                                        <path class="opacity-75" fill="currentColor"
                                                                            d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                                                                        </path>
                                                                    </svg>

                                                                    Submit
                                                                </button>
                                                            </span>
                                                        </div>
                                                        @endif

                                                    </div>
                                                </div>


                                            </div>

                                            @else
                                            <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md"
                                                role="alert">
                                                <div class="flex">
                                                    <div class="py-1"><svg
                                                            class="fill-current h-6 w-6 text-teal-500 mr-4"
                                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                                            <path
                                                                d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z" />
                                                        </svg></div>
                                                    <div>
                                                        <p class="font-bold">
                                                            {{ $this->checkIfOrderPassedStage($orderDetails->id,
                                                            auth()->user()->role) }}
                                                        </p>
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
                </div>
            </div>
        </div>
    </div>
