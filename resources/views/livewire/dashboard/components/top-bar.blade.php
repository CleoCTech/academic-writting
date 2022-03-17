<div>
    <div wire:loading wire:target='gotToOrder, progress, completed, revisions, profile'>
        @livewire('general.loader')
    </div>
    <div class="top-bar" {{--  x-data='' x-init="Livewire.emit('fire-notification-bar')" --}}>
         <!-- BEGIN: Breadcrumb -->
         <div class="-intro-x breadcrumb mr-auto hidden sm:flex"> <a href="">Application</a> <i data-feather="chevron-right" class="breadcrumb__icon"></i> <a href="" class="breadcrumb--active">Dashboard</a> </div>
         <!-- END: Breadcrumb -->
         @if (session()->get('LoggedClient') != null)
         @if ($activity != '' )
            {{-- @livewire('dashboard.components.overlay.buttons-below-notification',
            ['title' => 'Invoice',
            'message' => 'Confirm Invoice of $ '.$activity->value.' per page for this task',
            'actions' => true,
            'action1' => 'confrimInvoice',
            'action2' => 'rejectInvoice',
            'actionName1' => 'Confirm',
            'actionName2' => 'Reject']) --}}

         @endif
         @elseif(auth()->user() != null)
         @endif
          <!-- BEGIN: MessageNotification -->
          <div class="intro-x dropdown mr-auto sm:mr-6">
            <div class="dropdown-toggle  notification--bullet cursor-pointer"
            role="button" aria-expanded="false">
            <i class="bi bi-chat-dots-fill fs-4 notification__icon dark:text-gray-300" style="font-size: x-large;"></i>
            @if ($count > 0)
            <span class="text-xs px-1 rounded-full bg-theme-6 text-white mr-1" style="margin-left: -1rem; margin-bottom: 1rem;">{{ $count }}</span>
            @endif
            </div>
            <div class="notification-content pt-2 dropdown-menu">
                <div class="notification-content__box dropdown-menu__content box dark:bg-dark-6">
                    <div class="notification-content__title">Messages</div>
                    @foreach ($receivedMsgs as $item)
                    <div wire:click="chatbox('{{ $item->fromable_type }}', '{{ $this->getId($item->fromable_id,
                        $item->fromable_type) }}')" class="cursor-pointer relative flex items-center zoom-in">
                        <div class="w-12 h-12 flex-none image-fit mr-1">
                            <img alt="img" class="rounded-full" src="{{ Avatar::create($this->getUsername($item->fromable_id, $item->fromable_type))->toBase64() }}">
                            <div class="w-3 h-3 bg-theme-9 absolute right-0 bottom-0 rounded-full border-2 border-white"></div>
                        </div>
                        <div class="ml-2 overflow-hidden">
                            <div class="flex items-center">
                                <a href="javascript:;" class="font-medium truncate mr-5">{{ $this->getUsername($item->fromable_id, $item->fromable_type)
                                }}</a>
                                <div class="text-xs text-gray-500 ml-auto whitespace-nowrap">{{ $item->created_at->diffForHumans() }}</div>
                            </div>
                            <div class="w-full truncate text-gray-600 mt-0.5">{{ strlen($item->message) >30? substr($item->message, 0, 30).'...':$item->message }} </div>
                        </div>
                    </div>
                    @endforeach

                </div>
            </div>
          </div>
         <!-- END: MessageNotification -->
          <!-- BEGIN: Notifications -->
          <div class="intro-x dropdown mr-auto sm:mr-6">
            <div class="dropdown-toggle notification {{$notificationsCounts > 0? 'notification--bullet ':''}} cursor-pointer" role="button" aria-expanded="false">
                <i class="bi bi-bell-fill fs-4 notification__icon dark:text-gray-300" style="font-size: x-large;"></i>
            </div>
            <div class="notification-content pt-2 dropdown-menu">
                <div class="notification-content__box dropdown-menu__content box dark:bg-dark-6">
                    <div class="notification-content__title">Notifications</div>
                    @foreach ($notifications as $notification)
                    <div class="cursor-pointer relative flex items-center ">
                        <div class="ml-2 overflow-hidden">
                            <div class="flex items-center">
                                <a href="javascript:;" class="font-medium truncate mr-5">{{ $notification->title }}</a>
                                <div class="text-xs text-gray-500 ml-auto whitespace-nowrap">{{ $notification->created_at->diffForHumans() }}</div>
                            </div>
                            <div class="w-full truncate text-gray-600 mt-0.5">
                                @if ($notification->title == 'Order Submitted')
                                    Answers for
                                    <span>
                                        <a  wire:click="gotToOrder('{{ $notification->order_no }}', '{{ $notification->id }}')"
                                            class="md:hover:underline" style="color: #2196f3;" href="#">{{ $notification->order_no }}
                                        </a>
                                    </span>
                                    <br> has been submitted.
                                    <span>
                                        <a class="md:hover:underline" style="color: #2196f3;"
                                            wire:click="gotToOrder('{{ $notification->order_no }}', '{{ $notification->id }}')" href="#">
                                            Click here to check.
                                        </a>
                                    </span>
                                @endif
                                @if ($notification->title == 'Sent Invoice')
                                    An invoice of {{ $notification->value }} for
                                    <span>
                                        <a  wire:click="gotToOrder('{{ $notification->order_no }}', '{{ $notification->id }}')"
                                            class="md:hover:underline" style="color: #2196f3;" href="#">{{ $notification->order_no }}
                                        </a>
                                    </span>
                                    <br> has been sent.
                                    <span>
                                        <a  class="md:hover:underline" style="color: #2196f3;"
                                        wire:click="gotToOrder('{{ $notification->order_no }}', '{{ $notification->id }}')" href="#">
                                        Click here to view.
                                        </a>
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
          </div>
         <!-- END: Notifications -->
        <!-- BEGIN: Account Menu -->
        <div class="intro-x dropdown w-8 h-8">
            <div class="dropdown-toggle w-8 h-8 rounded-full overflow-hidden shadow-lg image-fit zoom-in" role="button" aria-expanded="false">
                <img alt="img" src="{{ Avatar::create($client->username)->toBase64() }}">
            </div>
            <div class="dropdown-menu w-56">
                <div class="dropdown-menu__content box bg-theme-26 dark:bg-dark-6 text-white">
                    <div class="p-4 border-b border-theme-27 dark:border-dark-3">
                        <div class="font-medium">{{ $client->username }}</div>
                        <div class="text-xs text-theme-28 mt-0.5 dark:text-gray-600">Client</div>
                    </div>
                    <div class="p-2" style=" ">
                        <a href="#" wire:click='profile' class="flex items-center block p-2 transition duration-300 ease-in-out hover:bg-theme-1 dark:hover:bg-dark-3 rounded-md"> <i data-feather="user" class="w-4 h-4 mr-2"></i> Profile </a>
                        <a href="#" class="flex items-center block p-2 transition duration-300 ease-in-out hover:bg-theme-1 dark:hover:bg-dark-3 rounded-md"> <i data-feather="help-circle" class="w-4 h-4 mr-2"></i> Help </a>
                    </div>
                    <div class="p-2 border-t border-theme-27 dark:border-dark-3">
                        <a href="{{ route('client-logout') }}" class="flex items-center block p-2 transition duration-300 ease-in-out hover:bg-theme-1 rounded-md"> <i data-feather="toggle-right" class="w-4 h-4 mr-2"></i> Logout </a>
                    </div>
                </div>
            </div>
        </div>
        <!-- END: Account Menu -->
    </div>
</div>
