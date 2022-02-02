<div>
    {{-- The best athlete wants his opponent at his best. --}}
    <div wire:loading wire:target='confrimInvoice, rejectInvoice'>
        @livewire('general.loader')
    </div>
    <div class="pos__ticket box p-2 mt-5">
        <a href="javascript:;" class=" items-center p-3 ">
            <h1 class="py-2 text-bold ">Order Details</h1>
            <div class="text-gray-600">
                <hr>
            </div>
        </a>
        <a href="javascript:;"
            class="flex items-center p-3 cursor-pointer transition duration-300 ease-in-out bg-white dark:bg-dark-3 hover:bg-gray-200 dark:hover:bg-dark-1 rounded-md">
            <div class="pos__ticket__item-name truncate mr-1">Order No :</div>
            <div class="ml-auto font-medium">{{$orderDetails->order_no}}</div>
        </a>
        <a href="javascript:;"
            class="flex items-center p-3 cursor-pointer transition duration-300 ease-in-out bg-white dark:bg-dark-3 hover:bg-gray-200 dark:hover:bg-dark-1 rounded-md">
            <div class="pos__ticket__item-name truncate mr-1">Subject</div>
            <div class="ml-auto font-medium">{{$orderDetails->category->subject}}</div>
        </a>
        <a href="javascript:;"
            class="flex items-center p-3 cursor-pointer transition duration-300 ease-in-out bg-white dark:bg-dark-3 hover:bg-gray-200 dark:hover:bg-dark-1 rounded-md">
            <div class="pos__ticket__item-name truncate mr-1">Topic</div>
            <div class="ml-auto font-medium">{{$orderDetails->topic}}</div>
        </a>
        <a href="javascript:;"
            class="flex items-center p-3 cursor-pointer transition duration-300 ease-in-out bg-white dark:bg-dark-3 hover:bg-gray-200 dark:hover:bg-dark-1 rounded-md">
            <div class="pos__ticket__item-name truncate mr-1">Pages</div>
            <div class="ml-auto font-medium">{{$orderDetails->pages}}</div>
        </a>
        <a href="javascript:;"
            class="flex items-center p-3 cursor-pointer transition duration-300 ease-in-out bg-white dark:bg-dark-3 hover:bg-gray-200 dark:hover:bg-dark-1 rounded-md">
            <div class="pos__ticket__item-name truncate mr-1">Deadline</div>
            <div class="ml-auto font-medium">{{$orderDetails->deadline_date}}</div>
        </a>
        <a href="javascript:;"
            class="flex items-center p-3 cursor-pointer transition duration-300 ease-in-out bg-white dark:bg-dark-3 hover:bg-gray-200 dark:hover:bg-dark-1 rounded-md">
            <div class="pos__ticket__item-name truncate mr-1">Status</div>
            @if ($orderDetails->status == "Pending")
            <div class="ml-auto font-medium danger">{{$orderDetails->status}}</div>
            @elseif($orderDetails->status =="In progress")
            <div class="ml-auto font-medium info">{{$orderDetails->status}}</div>
            @elseif($orderDetails->status =="Complete")
            <div class="ml-auto font-medium success">{{$orderDetails->status}}</div>
            @endif

        </a>
        <a href="javascript:;"
            class="flex items-center p-3 cursor-pointer transition duration-300 ease-in-out bg-white dark:bg-dark-3 hover:bg-gray-200 dark:hover:bg-dark-1 rounded-md">
            <div class="pos__ticket__item-name truncate mr-1">Fee</div>
            @if ($orderDetails->status == "Pending")
            <div class="ml-auto py-1 px-2 rounded-full text-xs bg-theme-9 text-white cursor-pointer font-medium">
                ${{$total_fee}}</div>
            {{-- <div class="ml-auto font-medium danger">${{$total_fee}}<div> --}}
                    @elseif($orderDetails->status =="In progress")
                    <div
                        class=" ml-auto py-1 px-2 rounded-full text-xs bg-theme-9 text-white cursor-pointer font-medium">
                        ${{$total_fee}}</div>
                    {{-- <div class="ml-auto font-medium info">${{$total_fee}}<div> --}}
                            @elseif($orderDetails->status =="Complete")
                            <div
                                class=" ml-auto py-1 px-2 rounded-full text-xs bg-theme-9 text-white cursor-pointer font-medium">
                                ${{$total_fee}}</div>
                            {{-- <div class="ml-auto font-medium success">${{$total_fee}}<div> --}}
                                    @endif

        </a>
        <a href="javascript:;"
            class="flex items-center p-3 cursor-pointer transition duration-300 ease-in-out bg-white dark:bg-dark-3 hover:bg-gray-200 dark:hover:bg-dark-1 rounded-md">
            <div class="pos__ticket__item-name truncate mr-1">Created</div>
            <div class="ml-auto font-medium">{{$orderDetails->created_at}}</div>
        </a>
        <div class="p-3">
            <h2 class="py-2">Order Description</h2>
            <div class="ml-auto font-medium">
                <p>
                    {{$orderDetails->instructions}}
                </p>
            </div>
        </div>
        <div class="p-3">
            <h2 class="text-blue-400 py-2">Additional Insructions (Revision)
                <span class="svg-icon svg-icon-4 ">
                    <i class="bi bi-paperclip text-blue-400"></i>
                </span>
            </h2>
            @auth
            <h2 class="text-blue-400 text-sm" style="margin-top: 1rem;">Remember to check additional
                attached files below (if any)
                <span class="svg-icon svg-icon-4 ">
                    <i class="bi bi-bell-fill text-blue-400"></i>
                </span>
            </h2>
            @endauth
            <div class="ml-auto font-medium">
                @if (count($revisions)>0)
                @foreach ($revisions as $revision)
                <p>{{$revision->comment}}</p>
                @endforeach
                @endif
            </div>
        </div>
        <div class="p-3">
            <h2 class="text-blue-400 py-2">Attached Files
                <span class="svg-icon svg-icon-4 ">
                    <i class="bi bi-paperclip text-blue-400"></i>
                </span>
            </h2>
            <div class="ml-auto font-medium">
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
        <div class="p-3">
            @guest
            <button wire:click='edit({{ $orderDetails->id }})' class="btn btn-info hover:bg-blue-600 hover:text-white"> Edit
                Order
            </button>
            @endguest
        </div>
    </div>
    <div class="intro-y chat grid grid-cols-12 gap-5 mt-5">
        <!-- BEGIN: Chat Side Menu -->
        <div class="col-span-12 lg:col-span-4 2xl:col-span-3">
            <div class="intro-y pr-1">
                <div class="box p-2">
                    <div class="chat__tabs nav nav-tabs justify-center" role="tablist"> <a id=" data-toggle=" tab"
                            href="javascript:;" class="flex-1 py-2 rounded-md text-center active" role="tab"
                            aria-controls="chats" aria-selected="true">Chats</a> </div>
                </div>
            </div>
            <div class="tab-content">
                <div id="chats" class="tab-pane active" role="tabpanel" aria-labelledby="chats-tab">
                    <div class="pr-1">
                        <div class="box px-5 pt-5 pb-5 lg:pb-0 mt-5">
                            <div class="relative text-gray-700 dark:text-gray-300">
                                <input type="text"
                                    class="form-control py-3 px-4 border-transparent bg-gray-200 pr-10 placeholder-theme-13"
                                    placeholder="Search for messages or users...">
                                <i class="w-4 h-4 hidden sm:absolute my-auto inset-y-0 mr-3 right-0"
                                    data-feather="search"></i>
                            </div>
                            <div class="hidden overflow-x-auto scrollbar-hidden">
                                <div class="flex mt-5">
                                    <a href="" class="w-10 mr-4 cursor-pointer">
                                        <div class="w-10 h-10 flex-none image-fit rounded-full">
                                            <img alt="img" class="rounded-full" src="dist/images/profile-2.jpg">
                                            <div
                                                class="w-3 h-3 bg-theme-9 absolute right-0 bottom-0 rounded-full border-2 border-white">
                                            </div>
                                        </div>
                                        <div class="text-xs text-gray-600 truncate text-center mt-2">Kevin Spacey</div>
                                    </a>
                                    <a href="" class="w-10 mr-4 cursor-pointer">
                                        <div class="w-10 h-10 flex-none image-fit rounded-full">
                                            <img alt="img" class="rounded-full" src="dist/images/profile-7.jpg">
                                            <div
                                                class="w-3 h-3 bg-theme-9 absolute right-0 bottom-0 rounded-full border-2 border-white">
                                            </div>
                                        </div>
                                        <div class="text-xs text-gray-600 truncate text-center mt-2">Denzel Washington
                                        </div>
                                    </a>
                                    <a href="" class="w-10 mr-4 cursor-pointer">
                                        <div class="w-10 h-10 flex-none image-fit rounded-full">
                                            <img alt="img" class="rounded-full" src="dist/images/profile-5.jpg">
                                            <div
                                                class="w-3 h-3 bg-theme-9 absolute right-0 bottom-0 rounded-full border-2 border-white">
                                            </div>
                                        </div>
                                        <div class="text-xs text-gray-600 truncate text-center mt-2">Johnny Depp</div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="chat__chat-list overflow-y-auto scrollbar-hidden pr-1 pt-1 mt-4">
                        @foreach ($users as $item)
                        @if ($item->model_type == 'App\Models\Client')
                        <div wire:click="openChat('{{ $item->id }}', '{{ $item->model_type }}')"
                            class="intro-x cursor-pointer box relative flex items-center p-5 ">
                            <div class="w-12 h-12 flex-none image-fit mr-1">
                                <img alt="img" class="rounded-full"
                                    src="{{ Avatar::create($item->username)->toBase64() }}">
                                <div
                                    class="w-3 h-3 bg-theme-9 absolute right-0 bottom-0 rounded-full border-2 border-white">
                                </div>
                            </div>
                            <div class="ml-2 overflow-hidden">
                                <div class="flex items-center">
                                    <a href="javascript:;" class="font-medium">{{ $item->username }}</a>
                                    <div class="text-xs text-gray-500 ml-auto">{{ $this->getTimeForLastMsg( $item->id,
                                        $item->model_type) }}</div>
                                </div>
                                <div class="w-full truncate text-gray-600 mt-0.5">{{ $this->getlastMessage( $item->id,
                                    $item->model_type) }}</div>
                            </div>
                            <div
                                class="w-5 h-5 flex items-center justify-center absolute top-0 right-0 text-xs text-white rounded-full bg-theme-1 font-medium -mt-1 -mr-1">
                            </div>
                        </div>
                        @endif
                        @if ($item->model_type == 'App\Models\User')
                        <div wire:click="openChat('{{ $item->id }}', '{{ $item->model_type }}')"
                            class="intro-x cursor-pointer box relative flex items-center p-5 ">
                            <div class="w-12 h-12 flex-none image-fit mr-1">
                                <img alt="img" class="rounded-full" src="{{ Avatar::create($item->name)->toBase64() }}">
                                <div
                                    class="w-3 h-3 bg-theme-9 absolute right-0 bottom-0 rounded-full border-2 border-white">
                                </div>
                            </div>
                            <div class="ml-2 overflow-hidden">
                                <div class="flex items-center">
                                    <a href="javascript:;" class="font-medium">{{ $item->name }}</a>
                                    <div class="text-xs text-gray-500 ml-auto">{{ $this->getTimeForLastMsg( $item->id,
                                        $item->model_type) }}</div>
                                </div>
                                <div class="w-full truncate text-gray-600 mt-0.5">{{ $this->getlastMessage( $item->id,
                                    $item->model_type) }}</div>
                            </div>
                            <div
                                class="w-5 h-5 flex items-center justify-center absolute top-0 right-0 text-xs text-white rounded-full bg-theme-1 font-medium -mt-1 -mr-1">
                            </div>
                        </div>
                        @endif
                        @if ($item->model_type == 'App\Models\Writer')
                        <div wire:click="openChat('{{ $item->id }}', '{{ $item->model_type }}')"
                            class="intro-x cursor-pointer box relative flex items-center p-5 ">
                            <div class="w-12 h-12 flex-none image-fit mr-1">
                                <img alt="img" class="rounded-full"
                                    src="{{ Avatar::create($item->firstname .' '.$item->lastname)->toBase64() }}">
                                <div
                                    class="w-3 h-3 bg-theme-9 absolute right-0 bottom-0 rounded-full border-2 border-white">
                                </div>
                            </div>
                            <div class="ml-2 overflow-hidden">
                                <div class="flex items-center">
                                    <a href="javascript:;" class="font-medium">{{ $item->firstname }} {{ $item->lastname
                                        }}</a>
                                    <div class="text-xs text-gray-500 ml-auto">{{ $this->getTimeForLastMsg( $item->id,
                                        $item->model_type) }}</div>
                                </div>
                                <div class="w-full truncate text-gray-600 mt-0.5">{{ $this->getlastMessage( $item->id,
                                    $item->model_type) }}</div>
                            </div>
                            <div
                                class="w-5 h-5 flex items-center justify-center absolute top-0 right-0 text-xs text-white rounded-full bg-theme-1 font-medium -mt-1 -mr-1">
                            </div>
                        </div>
                        @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <!-- END: Chat Side Menu -->
        <!-- BEGIN: Chat Content -->
        <div class="intro-y col-span-12 lg:col-span-8 2xl:col-span-9">
            <div class="chat__box box">
                <!-- BEGIN: Chat Active -->
                @if ($openId != null)
                <div class="h-full flex flex-col">
                    <div class="flex flex-col sm:flex-row border-b border-gray-200 dark:border-dark-5 px-5 py-4">
                        @if ($this->getUsername() != null)
                        <div class="flex items-center">
                            <div class="w-10 h-10 sm:w-12 sm:h-12 flex-none image-fit relative">
                                <img alt="img" class="rounded-full"
                                    src="{{ Avatar::create($this->getUsername())->toBase64() }}">
                            </div>
                            <div class="ml-3 mr-auto">
                                <div class="font-medium text-base">{{ $this->getUsername() }}</div>
                                <div class="text-gray-600 text-xs sm:text-sm">Hey, I am using chat <span
                                        class="mx-1">•</span> Online</div>
                            </div>
                        </div>
                        @endif
                        <div
                            class="flex items-center sm:ml-auto mt-5 sm:mt-0 border-t sm:border-0 border-gray-200 pt-3 sm:pt-0 -mx-5 sm:mx-0 px-5 sm:px-0">
                            <a href="javascript:;" class="w-5 h-5 text-gray-600"> <i data-feather="search"
                                    class="w-5 h-5"></i> </a>
                            <a href="javascript:;" class="w-5 h-5 text-gray-600 ml-5"> <i data-feather="user-plus"
                                    class="w-5 h-5"></i> </a>
                            <div class="dropdown ml-auto sm:ml-3">
                                <a href="javascript:;" class="dropdown-toggle w-5 h-5 text-gray-600"
                                    aria-expanded="false"> <i data-feather="more-vertical" class="w-5 h-5"></i> </a>
                                <div class="dropdown-menu w-40">
                                    <div class="dropdown-menu__content box dark:bg-dark-1 p-2">
                                        <a href=""
                                            class="flex items-center block p-2 transition duration-300 ease-in-out bg-white dark:bg-dark-1 hover:bg-gray-200 dark:hover:bg-dark-2 rounded-md">
                                            <i data-feather="share-2" class="w-4 h-4 mr-2"></i> Share Contact </a>
                                        <a href=""
                                            class="flex items-center block p-2 transition duration-300 ease-in-out bg-white dark:bg-dark-1 hover:bg-gray-200 dark:hover:bg-dark-2 rounded-md">
                                            <i data-feather="settings" class="w-4 h-4 mr-2"></i> Settings </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="overflow-y-scroll scrollbar-hidden px-5 pt-5 flex-1">
                        @if ($openId != null)
                        @foreach ($messages as $item)
                        @if ($item->fromable_type != $userType)
                        <div class="chat__box__text-box flex items-end float-left mb-4">
                            <div class="w-10 h-10 hidden sm:block flex-none image-fit relative mr-5">
                                <img alt="img" class="rounded-full"
                                    src="{{ Avatar::create($this->getUsername())->toBase64() }}">
                            </div>
                            <div
                                class="bg-gray-200 dark:bg-dark-5 px-4 py-3 text-gray-700 dark:text-gray-300 rounded-r-md rounded-t-md">
                                {{ $item->message }}
                                <div class="mt-1 text-xs text-gray-600">{{ $item->created_at }}</div>
                            </div>
                            <div class="hidden sm:block dropdown ml-3 my-auto">
                                <a href="javascript:;" class="dropdown-toggle w-4 h-4 text-gray-600"
                                    aria-expanded="false"> <i data-feather="more-vertical" class="w-4 h-4"></i> </a>
                                <div class="dropdown-menu w-40">
                                    <div class="dropdown-menu__content box dark:bg-dark-1 p-2">
                                        <a href=""
                                            class="flex items-center block p-2 transition duration-300 ease-in-out bg-white dark:bg-dark-1 hover:bg-gray-200 dark:hover:bg-dark-2 rounded-md">
                                            <i data-feather="corner-up-left" class="w-4 h-4 mr-2"></i> Reply </a>
                                        <a href=""
                                            class="flex items-center block p-2 transition duration-300 ease-in-out bg-white dark:bg-dark-1 hover:bg-gray-200 dark:hover:bg-dark-2 rounded-md">
                                            <i data-feather="trash" class="w-4 h-4 mr-2"></i> Delete </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="clear-both"></div>
                        @else
                        <div class="chat__box__text-box flex items-end float-right mb-4">
                            <div class="hidden sm:block dropdown mr-3 my-auto">
                                <a href="javascript:;" class="dropdown-toggle w-4 h-4 text-gray-600"
                                    aria-expanded="false"> <i data-feather="more-vertical" class="w-4 h-4"></i> </a>
                                <div class="dropdown-menu w-40">
                                    <div class="dropdown-menu__content box dark:bg-dark-1 p-2">
                                        <a href=""
                                            class="flex items-center block p-2 transition duration-300 ease-in-out bg-white dark:bg-dark-1 hover:bg-gray-200 dark:hover:bg-dark-2 rounded-md">
                                            <i data-feather="corner-up-left" class="w-4 h-4 mr-2"></i> Reply </a>
                                        <a href=""
                                            class="flex items-center block p-2 transition duration-300 ease-in-out bg-white dark:bg-dark-1 hover:bg-gray-200 dark:hover:bg-dark-2 rounded-md">
                                            <i data-feather="trash" class="w-4 h-4 mr-2"></i> Delete </a>
                                    </div>
                                </div>
                            </div>
                            <div class="bg-theme-1 px-4 py-3 text-white rounded-l-md rounded-t-md">
                                {{ $item->message }}
                                <div class="mt-1 text-xs text-theme-21">{{ $item->created_at }}</div>
                            </div>
                            <div class="w-10 h-10 hidden sm:block flex-none image-fit relative ml-5">
                                <img alt="img" class="rounded-full" src="{{ Avatar::create('M E')->toBase64() }}">
                            </div>
                        </div>
                        <div class="clear-both"></div>
                        @endif
                        {{-- <div class="text-gray-500 dark:text-gray-600 text-xs text-center mb-10 mt-5">12 June 2020
                        </div> --}}
                        @endforeach
                        @endif
                    </div>
                    <div class="pt-4 pb-10 sm:py-4 flex items-center border-t border-gray-200 dark:border-dark-5">
                        {{-- <textarea wire:model.defer='messageText' class="chat__box__input form-control dark:bg-dark-3 h-16
                        resize-none border-transparent px-5 py-3
                        shadow-none focus:ring-0" rows="1" placeholder="Type your message..." id="message">
                        </textarea> --}}
                        <input wire:model.defer='messageText' aria-placeholder="Type here..." placeholder="Type here..."
                            id="message"
                            class="py-2 mx-3 pl-5 block w-full rounded-full bg-gray-100 outline-none focus:text-gray-700 {{ ($openId != null) ? '' : 'cursor-not-allowed' }} "
                            type="text" name="message" required {{ ($openId !=null) ? '' : 'disabled' }} />

                        <button wire:click='sendMessage' class="{{ ($openId != null) ? '' : 'cursor-not-allowed' }} outline-none focus:outline-none
                        hover:bg-green-500 rounded-md translate-x-1 ease-in-out " type="submit" id="sendMessage" {{
                            ($openId !=null) ? '' : 'disabled' }}>
                            <svg class="text-gray-400 h-7 w-7 origin-center transform rotate-90"
                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path
                                    d="M10.894 2.553a1 1 0 00-1.788 0l-7 14a1 1 0 001.169 1.409l5-1.429A1 1 0 009 15.571V11a1 1 0 112 0v4.571a1 1 0 00.725.962l5 1.428a1 1 0 001.17-1.408l-7-14z" />
                            </svg>
                        </button>
                    </div>
                </div>
                <!-- END: Chat Active -->
                @else
                <!-- BEGIN: Chat Default -->
                <div class="h-full flex items-center">
                    <div class="mx-auto text-center">
                        <div class="w-16 h-16 flex-none image-fit rounded-full overflow-hidden mx-auto">
                            <img alt="img" src="{{ Avatar::create( $this->getOwnerName() )->toBase64() }}">
                        </div>
                        <div class="mt-3">
                            <div class="font-medium">Hey, {{ $this->getOwnerName() }}!</div>
                            <div class="text-gray-600 mt-1">Please select a chat to start messaging.</div>
                        </div>
                    </div>
                </div>
                <!-- END: Chat Default -->
                @endif
            </div>
        </div>
        <!-- END: Chat Content -->
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


</div>
