<div>
    {{-- Knowing others is intelligence; knowing yourself is true wisdom. --}}
    @livewire('dashboard.components.top-bar', ['user_id' => session()->get('LoggedClient'), 'user_type' =>
    'App\Models\Client', 'activity' => ''])
    <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">
            Chat
        </h2>
        {{-- <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
            <button wire:click='back' class="btn btn-primary shadow-md mr-2">Back</button>
            <div class="dropdown ml-auto sm:ml-0">
                <button class="dropdown-toggle btn px-2 box text-gray-700 dark:text-gray-300" aria-expanded="false">
                    <span class="w-5 h-5 flex items-center justify-center"> <i class="w-4 h-4" data-feather="plus"></i>
                    </span>
                </button>
                <div class="dropdown-menu w-40">
                    <div class="dropdown-menu__content box dark:bg-dark-1 p-2">
                        <a href=""
                            class="flex items-center block p-2 transition duration-300 ease-in-out bg-white dark:bg-dark-1 hover:bg-gray-200 dark:hover:bg-dark-2 rounded-md">
                            <i data-feather="users" class="w-4 h-4 mr-2"></i> Create Group </a>
                        <a href=""
                            class="flex items-center block p-2 transition duration-300 ease-in-out bg-white dark:bg-dark-1 hover:bg-gray-200 dark:hover:bg-dark-2 rounded-md">
                            <i data-feather="settings" class="w-4 h-4 mr-2"></i> Settings </a>
                    </div>
                </div>
            </div>
        </div> --}}

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
                            @if ( $item->is_read == 0 )
                            {{ $this->setOnread($item->id) }}
                            @endif
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
                            <svg class="text-gray-900 h-7 w-7 origin-center transform rotate-90"
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
</div>
<script>
    window.addEventListener('DOMContentLoaded', event => {
        livewire.emitTo('dashboard.inc.side-menu', 'update_SelectedItem', 'chat');
        // livewire.emit('update_SelectedItem', 'dashboard');
    })
</script>
