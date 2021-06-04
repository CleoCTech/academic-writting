<div>
    {{-- If you look to others for fulfillment, you will never truly be fulfilled. --}}
    <!--begin::Content-->
    <div class="content fs-6 d-flex flex-column-fluid" id="kt_content">
        <!--begin::Container-->
        <div class="container">
            <!--begin::Chat-->
            <div class="d-flex flex-column flex-lg-row">
                <!--begin::Aside-->
                <div class="flex-lg-row-auto w-lg-250px w-xl-400px mb-5 mb-lg-0" id="kt_chat_aside">
                    <!--begin::Card-->
                    <div class="card">
                        <!--begin::Body-->
                        <div class="card-body p-9">
                            <!--begin:Search-->
                            <div class="input-group input-group-solid" id="kt_chat_aside_search">
                                <span class="input-group-text" id="basic-addon1">
                                    <!--begin::Svg Icon | path: icons/stockholm/General/Search.svg-->
                                    <span class="svg-icon svg-icon-1 svg-icon-dark">
                                        <i class="bi bi-search"></i>
                                    </span>
                                    <!--end::Svg Icon-->
                                </span>
                                <input type="text" class="form-control ps-0 py-4 h-auto" placeholder="Search" />
                            </div>
                            <!--end:Search-->
                            <!--begin:Users-->
                            <div class="mt-9 scroll-y me-lg-n6 pe-lg-5" data-kt-scroll="true"
                                data-kt-scroll-height="{'default' : '300px', 'lg': 'auto'}"
                                data-kt-scroll-dependencies="#kt_header, #kt_toolbar, #kt_footer, #kt_chat_aside_search"
                                data-kt-scroll-wrappers="#kt_content, #kt_wrapper"
                                data-kt-scroll-offset="{'default' : '10px', 'lg' : '60px'}" style="height: 644px">
                                <!--begin:User-->
                                @guest
                                @if (count($users) >0)
                                @foreach ($users as $user)
                                <div class="d-flex flex-stack mb-9" wire:click="getMesssage({{ $user->id }})">
                                    <div class="d-flex align-items-center">
                                        <!--begin::Symbol-->
                                        <div class="symbol symbol-50px me-4">
                                            <span class="symbol-label bg-light-primary">
                                                <img src="https://via.placeholder.com/150" class="h-75 align-self-end" alt="" />
                                            </span>
                                        </div>
                                        <!--end::Symbol-->
                                        <div class="d-flex flex-column">
                                            <a href="#" class=" text-gray-600 text-hover-primary fw-bolder fs-6 mb-1 ">{{$user->name}}</a>
                                            <span class="text-muted fw-bold">{{$user->role}}</span>
                                        </div>
                                    </div>
                                    <div class="d-flex flex-column align-items-end text-end">
                                        <span class="text-muted fw-bold fs-7"></span>
                                        @if ($this->countUnreadMessages($user->id)!=0)
                                        <span class="badge badge-primary badge-square">{{ $this->countUnreadMessages($user->id) }}</span>
                                        @endif


                                    </div>
                                </div>
                                @endforeach
                                @endif
                                @endguest
                                @auth
                                @if (count($users) >0)
                                @foreach ($users as $user)
                                <div class="d-flex flex-stack mb-9" wire:click="getMesssage({{ $user->id }})">
                                    <div class="d-flex align-items-center">
                                        <!--begin::Symbol-->
                                        <div class="symbol symbol-50px me-4">
                                            <span class="symbol-label bg-light-primary">
                                                <img src="https://via.placeholder.com/150" class="h-75 align-self-end" alt="" />
                                            </span>
                                        </div>
                                        <!--end::Symbol-->
                                        <div class="d-flex flex-column">
                                            <a href="#" class=" text-gray-600 text-hover-primary fw-bolder fs-6 mb-1 ">{{$user->username}}</a>
                                            {{-- <span class="text-muted fw-bold">{{$user->role}}</span> --}}
                                        </div>
                                    </div>
                                    <div class="d-flex flex-column align-items-end text-end">
                                        <span class="text-muted fw-bold fs-7"></span>
                                        @if ($this->countUnreadMessages($user->id)!=0)
                                        <span class="badge badge-primary badge-square">{{ $this->countUnreadMessages($user->id) }}</span>
                                        @endif


                                    </div>
                                </div>
                                @endforeach
                            @endif
                                @endauth


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
                                <button type="button" class=" btn btn-active-light-primary btn-sm btn-icon btn-icon-md d-lg-none " id="kt_app_chat_toggle">
                                    <!--begin::Svg Icon | path: icons/stockholm/Communication/Adress-book2.svg-->
                                    <span class="svg-icon svg-icon-1">
                                        <i class="bi bi-journal-album"></i>
                                    </span>
                                    <!--end::Svg Icon-->
                                </button>
                                <!--end::Aside Mobile Toggle-->
                                <!--begin::Dropdown-->
                                <button type="button" class=" btn btn-active-light-primary btn-sm btn-icon btn-icon-md ">
                                    <!--begin::Svg Icon | path: icons/stockholm/Communication/Add-user.svg-->
                                    <span class="svg-icon svg-icon-1">
                                        <i class="bi bi-person-plus"></i>
                                    </span>
                                    <!--end::Svg Icon-->
                                </button>
                                <!--end::Dropdown-->
                            </div>
                            {{-- <div class="text-center flex-grow-1">
                                <div class="text-gray-600 fw-bolder fs-6">
                                    Ja Morant
                                </div>
                                <div>
                                    <span class="badge badge-dot badge-primary"></span>
                                    <span class="fw-bold text-muted fs-7">Active</span>
                                </div>
                            </div>
                            <div class="flex-grow-1 d-flex justify-content-end">
                                <!--begin::Dropdown-->
                                <button type="button" class=" btn btn-sm btn-icon btn-color-primary btn-active-light-primary
                                    " data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end" data-kt-menu-flip="top-end">
                                    <!--begin::Svg Icon | path: icons/stockholm/Layout/Layout-4-blocks-2.svg-->
                                    <span class="svg-icon svg-icon-1">
                                        <i class="bi bi-ui-radios-grid"></i>
                                    </span>
                                    <!--end::Svg Icon-->
                                </button>
                                <!--begin::Form-->

                                <!--end::Form-->
                                <!--end::Dropdown-->
                            </div> --}}
                        </div>
                        <!--end::Header-->
                        <!--begin::Body-->
                        <div class="card-body px-9">
                            <!--begin::Scroll-->
                            <div class="scroll-y me-lg-n6 pe-lg-5" data-kt-scroll="true"
                                data-kt-scroll-height="{'default' : '400px', 'lg' : 'auto'}"
                                data-kt-scroll-dependencies="#kt_header, #kt_toolbar, #kt_footer, #kt_chat_content_header, #kt_chat_content_footer"
                                data-kt-scroll-wrappers="#kt_content, #kt_wrapper"
                                data-kt-scroll-offset="{'default' : '10px', 'lg' : '52px'}" style="height: 589px">
                                <hr>
                                <!--begin::Messages-->
                                <div wire:poll class="messages" wire:model.defer='messages'>
                                    @auth
                                     @if (count($messages)>0)
                                     @foreach ($messages as $message)
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
                                                     class="text-gray-600 text-hover-primary fw-bolder">{{ ($message->from_id == Auth::user()->id) ? 'You' : $message->client->username }}</a>
                                                 <span class="text-muted fw-bold fs-7">{{$message->created_at}}</span>
                                             </div>
                                         </div>
                                         <div
                                             class="{{ ($message->from_id == Auth::user()->id) ? 'rounded mt-2 p-5 bg-light-success text-gray-600 text-end mw-400px' : 'rounded mt-2 p-5 bg-light-primary text-gray-600 text-start mw-400px' }}">
                                             {{$message->message}}
                                         </div>
                                     </div>
                                     @endforeach
                                     @endif
                                    @endauth
                                    @guest
                                    @if (count($messages)>0)
                                    @foreach ($messages as $message)
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
                                        <button  onclick="scrollToBottomFunc()" type="submit">

                                            <span class="btn btn-icon btn-sm btn-active-light-primary" onclick="scrollToBottomFunc()">
                                                <i class="fas fa-paper-plane fs-4"></i>
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
        </div>
        <!--end::Container-->
    </div>
    <!--end::Content-->

</div>
<script type="text/javascript">
    function scrollToBottomFunc() {
        $('.scroll-y').scrollTop($('.scroll-y')[1].scrollHeight);
    }
    function resetPond(){
        var pond = document.getElementById("test");
        pond.removeFiles();
    }
</script>
