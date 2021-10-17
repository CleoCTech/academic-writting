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
        <div class="flex-lg-row-fluid ms-lg-9" id="kt_chat_content">
            <div class="grid grid-cols-3 min-w-full border rounded" style="min-height: 80vh;">
                <div class="col-span-1 bg-white border-r border-gray-300">
                    <div class="my-3 mx-3 ">
                        <div class="relative text-gray-600 focus-within:text-gray-400">
                            <span class="absolute inset-y-0 left-0 flex items-center pl-2">
                                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="w-6 h-6 text-gray-500"><path d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                            </span>
                            <input aria-placeholder="Busca tus amigos o contacta nuevos" placeholder="Busca tus amigos"
                            class="py-2 pl-10 block w-full rounded bg-gray-100 outline-none focus:text-gray-700" type="search" name="search" required autocomplete="search" />
                        </div>
                    </div>

                    <ul class="overflow-auto" style="height: 500px;">
                        <h2 class="ml-2 mb-2 text-gray-600 text-lg my-2">Chats</h2>
                        <li>
                            <a class="hover:bg-gray-100 border-b border-gray-300 px-3 py-2 cursor-pointer flex items-center text-sm focus:outline-none focus:border-gray-300 transition duration-150 ease-in-out">
                                <img class="h-10 w-10 rounded-full object-cover"
                                src="https://images.pexels.com/photos/837358/pexels-photo-837358.jpeg?auto=compress&cs=tinysrgb&h=750&w=1260"
                                alt="username" />
                                <div class="w-full pb-2">
                                    <div class="flex justify-between">
                                        <span class="block ml-2 font-semibold text-base text-gray-600 ">Jhon C</span>
                                        <span class="block ml-2 text-sm text-gray-600">5 minutes</span>
                                    </div>
                                    <span class="block ml-2 text-sm text-gray-600">Hello world!!</span>
                                </div>
                            </a>
                            <a class="bg-gray-100 border-b border-gray-300 px-3 py-2 cursor-pointer flex items-center text-sm focus:outline-none focus:border-gray-300 transition duration-150 ease-in-out">
                                <img class="h-10 w-10 rounded-full object-cover"
                                src="https://images.pexels.com/photos/3777931/pexels-photo-3777931.jpeg?auto=compress&cs=tinysrgb&h=750&w=1260"
                                alt="username" />
                                <div class="w-full pb-2">
                                    <div class="flex justify-between">
                                        <span class="block ml-2 font-semibold text-base text-gray-600 ">Eduard</span>
                                        <span class="block ml-2 text-sm text-gray-600">15 minutes</span>
                                    </div>
                                    <span class="block ml-2 text-sm text-gray-600">I am fine</span>
                                </div>
                            </a>
                            <a class="hover:bg-gray-100 border-b border-gray-300 px-3 py-2 cursor-pointer flex items-center text-sm focus:outline-none focus:border-gray-300 transition duration-150 ease-in-out">
                                <img class="h-10 w-10 rounded-full object-cover"
                                src="https://images.pexels.com/photos/6238133/pexels-photo-6238133.jpeg?auto=compress&cs=tinysrgb&h=750&w=1260"
                                alt="username" />
                                <div class="w-full pb-2">
                                    <div class="flex justify-between">
                                        <span class="block ml-2 font-semibold text-base text-gray-600 ">Celia</span>
                                        <span class="block ml-2 text-sm text-gray-600">1 hour</span>
                                    </div>
                                    <span class="block ml-2 text-sm text-gray-600">Last message</span>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>

                <!--messages -->
                <div class="col-span-2 bg-white">
                    <div class="w-full">
                        <div class="flex items-center border-b border-gray-300 pl-3 py-3">
                            <img class="h-10 w-10 rounded-full object-cover"
                            src="https://images.pexels.com/photos/3777931/pexels-photo-3777931.jpeg?auto=compress&cs=tinysrgb&h=750&w=1260"
                            alt="username" />
                            <span class="block ml-2 font-bold text-base text-gray-600">Eduard</span>
                            <span class="connected text-green-500 ml-2" >
                                <svg width="6" height="6">
                                    <circle cx="3" cy="3" r="3" fill="currentColor"></circle>
                                </svg>
                            </span>
                        </div>
                        <div id="chat" class="w-full overflow-y-auto p-10 relative" style="height: 700px;" ref="toolbarChat">
                            <ul>
                                <li class="clearfix2">
                                    @foreach ($messages as $item)
                                        @if ($item->fromable_type == "App\Models\Client")
                                        <div class="w-full flex justify-start">
                                            <div class="bg-gray-100 rounded px-5 py-2 my-2 text-gray-700 relative" style="max-width: 300px;">
                                                <span class="block">{{ $item->message }}</span>
                                                <span class="block text-xs text-right">{{ $item->created_at }}</span>
                                            </div>
                                        </div>
                                        @endif
                                        @if ($item->fromable_type == "App\Models\Client")
                                        <div class="w-full flex justify-end" >
                                            <div class="bg-gray-100 rounded px-5 py-2 my-2 text-gray-700 relative" style="max-width: 300px;">
                                                <span class="block">{{ $item->message }}</span>
                                                <span class="block text-xs text-left">{{ $item->created_at }}</span>
                                            </div>
                                        </div>
                                        @endif
                                    @endforeach
                                </li>
                            </ul>
                        </div>

                        <div class="w-full py-3 px-3 flex items-center justify-between border-t border-gray-300">
                           

                            <input aria-placeholder="Escribe un mensaje aquí" placeholder="Escribe un mensaje aquí"
                                class="py-2 mx-3 pl-5 block w-full rounded-full bg-gray-100 outline-none focus:text-gray-700" type="text" name="message" required/>

                            <button class="outline-none focus:outline-none" type="submit">
                                <svg class="text-gray-400 h-7 w-7 origin-center transform rotate-90" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                    <path d="M10.894 2.553a1 1 0 00-1.788 0l-7 14a1 1 0 001.169 1.409l5-1.429A1 1 0 009 15.571V11a1 1 0 112 0v4.571a1 1 0 00.725.962l5 1.428a1 1 0 001.17-1.408l-7-14z" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--end::Content-->
    </div>
</div>
