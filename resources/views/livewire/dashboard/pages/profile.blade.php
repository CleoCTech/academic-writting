<div>
    @livewire('dashboard.components.top-bar', ['user_id' => session()->get('LoggedClient'), 'user_type' => 'App\Models\Client', 'activity' => ''])
    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">
            Profile
        </h2>
        <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
            {{-- <button wire:click='back' class="btn btn-primary shadow-md mr-2">Back</button> --}}
            <button wire:click="back" wire.target="back" type="button"
                class="btn btn-lg btn-primary inline-flex items-center px-4 py-2 border border-transparent text-base leading-6 font-medium rounded-md hover:bg-blue-300 ease-in-out duration-150 "
                wire:loading.class="cursor-not-allowed" wire:loading.attr="disabled">
                <svg wire.loading wire.target="back"
                    class="hidden animate-spin -ml-1 mr-3 h-5 w-5 text-white"
                    wire:loading.class.remove="hidden" xmlns="http://www.w3.org/2000/svg"
                    fill="none" viewBox="0 0 24 24">
                    <circle wire:loading wire:target="back" class="opacity-25" cx="12" cy="12"
                        r="10" stroke="currentColor" stroke-width="4"></circle>
                    <path wire:loading wire:target="back" class="opacity-75" fill="currentColor"
                        d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                    </path>
                </svg>
                Back
            </button>

        </div>
    </div>
    <!-- BEGIN: Profile Info -->
    <div class="intro-y box px-5 pt-5 mt-5">
        <div class="flex flex-col lg:flex-row border-b border-gray-200 dark:border-dark-5 pb-5 -mx-5">
            <div class="flex flex-1 px-5 items-center justify-center lg:justify-start">
                <div class="w-20 h-20 sm:w-24 sm:h-24 flex-none lg:w-32 lg:h-32 image-fit relative">
                    <img alt="img" class="rounded-full" src="{{ Avatar::create($client->username)->toBase64() }}">
                </div>
                <div class="ml-5">
                    <div class="w-24 sm:w-40 truncate sm:whitespace-normal font-medium text-lg">{{ $client->username }}</div>
                    <div class="text-gray-600">Client</div>
                </div>
            </div>
            <div class="mt-6 lg:mt-0 flex-1 dark:text-gray-300 px-5 border-l border-r border-gray-200 dark:border-dark-5 border-t lg:border-t-0 pt-5 lg:pt-0">
                <div class="font-medium text-center lg:text-left lg:mt-3">Contact Details</div>
                <div class="flex flex-col justify-center items-center lg:items-start mt-4">
                    <div class="truncate sm:whitespace-normal flex items-center"> <i class="w-4 h-4 mr-2 bi bi-envelope"></i> {{ $client->email }} </div>
                </div>
            </div>
            <div class="mt-6 lg:mt-0 flex-1 flex items-center justify-center px-5 border-t lg:border-0 border-gray-200 dark:border-dark-5 pt-5 lg:pt-0">
                <div class="text-center rounded-md w-20 py-3">
                    <div class="font-medium text-theme-1 dark:text-theme-10 text-xl">{{ $ordersCount }}</div>
                    <div class="text-gray-600">Orders</div>
                </div>
                <div class="text-center rounded-md w-20 py-3">
                    <div class="font-medium text-theme-1 dark:text-theme-10 text-xl">-</div>
                    <div class="text-gray-600">Spent</div>
                </div>
            </div>
        </div>
        <div class="nav nav-tabs flex-col sm:flex-row justify-center lg:justify-start" role="tablist">

            <div x-data="{ show: true}">
                <a @click="show = !show" id="profile-tab" data-toggle="tab" data-target="#profile" href="javascript:;"
                class="py-4 sm:mr-8 flex items-center" :class="{ 'active': show }" role="tab" aria-controls="profile"
                :aria-selected="show ? 'true' : 'false'"> <i class="w-4 h-4 mr-2 bi-person" ></i> Profile </a>
            </div>
            <div x-data="{ account: false}">
                <a @click="account = !account" id="account-tab" data-toggle="tab" data-target="#account" href="javascript:;"
                class="py-4 sm:mr-8 flex items-center" :class="{ 'active': account }" role="tab"
                :aria-selected="account ? 'true' : 'false'" aria-controls="account-tab"> <i class="w-4 h-4 mr-2 bi-shield" ></i> Account </a>
            </div>
            <div x-data="{ password: false}">
                <a @click="password = !password" id="password-tab" data-toggle="tab" data-target="#password" href="javascript:;"
                class="py-4 sm:mr-8 flex items-center" :class="{ 'active': password }" role="tab"
                :aria-selected="password ? 'true' : 'false'" aria-controls="password-tab"> <i class="w-4 h-4 mr-2 bi-lock" ></i> Change Password </a>
            </div>
            <div x-data="{ settings: false}">
                <a @click="settings = !settings" id="settings-tab" data-toggle="tab" data-target="#settings" href="javascript:;"
                class="py-4 sm:mr-8 flex items-center" :class="{ 'active': settings }" role="tab"
                :aria-selected="settings ? 'true' : 'false'" aria-controls="settings-tab"> <i class="w-4 h-4 mr-2 bi-gear" ></i> Settings </a>
            </div>
            {{-- <a id="change-password-tab" data-toggle="tab" data-target="#change-password" href="javascript:;" class="py-4 sm:mr-8 flex items-center" role="tab" aria-selected="false"> <i class="w-4 h-4 mr-2 bi-lock"></i> Change Password </a>
            <a wire:click="section('settings')" id="settings-tab" data-toggle="tab" data-target="#settings" href="javascript:;" class="py-4 sm:mr-8 flex items-center" role="tab" aria-selected="false"> <i class="w-4 h-4 mr-2 bi-gear" ></i> Settings </a> --}}
        </div>
    </div>
    <!-- END: Profile Info -->
    <div class="tab-content mt-5">
        <div id="profile" class="tab-pane active" :class="{ 'active': show }" role="tabpanel" aria-labelledby="profile-tab">
            <div class="grid grid-cols-12 gap-6">
                <!-- BEGIN: Latest Uploads -->
                <div class="intro-y box col-span-12 lg:col-span-6">
                    <div class="flex items-center px-5 py-5 sm:py-3 border-b border-gray-200 dark:border-dark-5">
                        <h2 class="font-medium text-base mr-auto">
                            Latest Uploads
                        </h2>
                        <div class="dropdown ml-auto sm:hidden">
                            <a class="dropdown-toggle w-5 h-5 block" href="javascript:;" aria-expanded="false"> <i data-feather="more-horizontal" class="w-5 h-5 text-gray-600 dark:text-gray-300"></i> </a>
                            <div class="dropdown-menu w-40">
                                <div class="dropdown-menu__content box dark:bg-dark-1 p-2"> <a href="javascript:;" class="block p-2 transition duration-300 ease-in-out bg-white dark:bg-dark-1 hover:bg-gray-200 dark:hover:bg-dark-2 rounded-md">All Files</a> </div>
                            </div>
                        </div>
                        <button class="btn btn-outline-secondary hidden sm:flex">All Files</button>
                    </div>
                    <div class="p-5">
                        @foreach ($files as $file)
                        <div class="flex items-center">
                            <div class="file"> <a href="" class="w-12 file__icon file__icon--directory"></a> </div>
                            <div class="ml-4">
                                <a class="font-medium" href="">{{ $file->filename }}</a>
                                <div class="text-gray-600 text-xs mt-0.5">{{ $this->filesize($file->folder, $file->filename) }}</div>
                            </div>
                            <div class="dropdown ml-auto">
                                <a class="dropdown-toggle w-5 h-5 block" href="javascript:;" aria-expanded="false"> <i  class="w-5 h-5 three-dots text-gray-600 dark:text-gray-300"></i> </a>
                                <div class="dropdown-menu w-40">
                                    <div class="dropdown-menu__content box dark:bg-dark-1 p-2">
                                        <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white dark:bg-dark-1 hover:bg-gray-200 dark:hover:bg-dark-2 rounded-md"> <i  class="w-4 h-4 mr-2 people"></i> Share File </a>
                                        <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white dark:bg-dark-1 hover:bg-gray-200 dark:hover:bg-dark-2 rounded-md"> <i  class="w-4 h-4 mr-2 trash"></i> Delete </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        @endforeach
                    </div>
                </div>
                <!-- END: Latest Uploads -->
                <!-- BEGIN: Work In Progress -->
                <div class="intro-y box col-span-12 lg:col-span-6">
                    <div class="flex items-center px-5 py-5 sm:py-0 border-b border-gray-200 dark:border-dark-5">
                        <h2 class="font-medium text-base mr-auto">
                            Work In Progress
                        </h2>
                        <div class="dropdown ml-auto sm:hidden">
                            <a class="dropdown-toggle w-5 h-5 block" href="javascript:;" aria-expanded="false"> <i data-feather="more-horizontal" class="w-5 h-5 text-gray-600 dark:text-gray-300"></i> </a>
                            <div class="nav nav-tabs dropdown-menu w-40" role="tablist">
                                <div class="dropdown-menu__content box dark:bg-dark-1 p-2"> <a id="work-in-progress-new-tab" href="javascript:;" data-toggle="tab" data-target="#work-in-progress-new" class="block p-2 transition duration-300 ease-in-out bg-white dark:bg-dark-1 hover:bg-gray-200 dark:hover:bg-dark-2 rounded-md" role="tab" aria-controls="work-in-progress-new" aria-selected="true">New</a> <a id="work-in-progress-last-week-tab" href="javascript:;" data-toggle="tab" data-target="#work-in-progress-last-week" class="block p-2 transition duration-300 ease-in-out bg-white dark:bg-dark-1 hover:bg-gray-200 dark:hover:bg-dark-2 rounded-md" role="tab" aria-selected="false">Last Week</a> </div>
                            </div>
                        </div>
                        <div class="nav nav-tabs ml-auto hidden sm:flex" role="tablist"> <a id="work-in-progress-mobile-new-tab" data-toggle="tab" data-target="#work-in-progress-new" href="javascript:;" class="py-5 ml-6 active" role="tab" aria-selected="true">New</a> <a id="week-work-in-progress-mobile-last-week-tab" data-toggle="tab" data-target="#work-in-progress-last-week" href="javascript:;" class="py-5 ml-6" role="tab" aria-selected="false">Last Week</a> </div>
                    </div>
                    <div class="p-5">
                        <div class="tab-content">
                            <div id="work-in-progress-new" class="tab-pane active" role="tabpanel" aria-labelledby="work-in-progress-new-tab">
                                <div>
                                    <div class="flex">
                                        <div class="mr-auto">Pending Tasks</div>
                                        <div>20%</div>
                                    </div>
                                    <div class="progress h-1 mt-2">
                                        <div class="progress-bar w-1/4 bg-theme-1" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                                <div class="mt-5">
                                    <div class="flex">
                                        <div class="mr-auto">Completed Tasks</div>
                                        <div>2 / 20</div>
                                    </div>
                                    <div class="progress h-1 mt-2">
                                        <div class="progress-bar w-1/4 bg-theme-1" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                                <div class="mt-5">
                                    <div class="flex">
                                        <div class="mr-auto">Tasks In Progress</div>
                                        <div>42</div>
                                    </div>
                                    <div class="progress h-1 mt-2">
                                        <div class="progress-bar w-3/4 bg-theme-1" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                                <a href="" class="btn btn-secondary block w-40 mx-auto mt-5">View More Details</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END: Work In Progress -->
                <!-- BEGIN: Daily Sales -->
                <div class="intro-y box col-span-12 lg:col-span-6">
                    <div class="flex items-center px-5 py-5 sm:py-3 border-b border-gray-200 dark:border-dark-5">
                        <h2 class="font-medium text-base mr-auto">
                            Latest Payments
                        </h2>
                        <div class="dropdown ml-auto sm:hidden">
                            <a class="dropdown-toggle w-5 h-5 block" href="javascript:;" aria-expanded="false"> <i data-feather="more-horizontal" class="w-5 h-5 text-gray-600 dark:text-gray-300"></i> </a>
                            <div class="dropdown-menu w-40">
                                <div class="dropdown-menu__content box dark:bg-dark-1 p-2">
                                    <a href="javascript:;" class="flex items-center p-2 transition duration-300 ease-in-out bg-white dark:bg-dark-1 hover:bg-gray-200 rounded-md"> <i data-feather="file" class="w-4 h-4 mr-2"></i> Download Excel </a>
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-outline-secondary hidden sm:flex"> <i data-feather="file" class="w-4 h-4 mr-2"></i> Download Excel </button>
                    </div>
                    <div class="p-5">
                        @foreach ($latestPayments as $payment)
                        <div class="relative flex items-center">
                            <div class="ml-4 mr-auto">
                                <a href="" class="font-medium">{{ $payment->created_at->diffForHumans() }}</a>
                                <div class="text-gray-600 mr-5 sm:mr-5 uppercase">{{ $payment->currency }}</div>
                            </div>
                            <div class="font-medium text-gray-700 dark:text-gray-600">+${{ $payment->amount }}</div>
                        </div>
                        @endforeach
                    </div>
                </div>
                <!-- END: Daily Sales -->
                <!-- BEGIN: Latest Tasks -->
                <div class="intro-y box col-span-12 lg:col-span-6">
                    <div class="flex items-center px-5 py-5 sm:py-0 border-b border-gray-200 dark:border-dark-5">
                        <h2 class="font-medium text-base mr-auto">
                            Latest Tasks
                        </h2>
                        <div class="dropdown ml-auto sm:hidden">
                            <a class="dropdown-toggle w-5 h-5 block" href="javascript:;" aria-expanded="false"> <i data-feather="more-horizontal" class="w-5 h-5 text-gray-600 dark:text-gray-300"></i> </a>
                            <div class="nav nav-tabs dropdown-menu w-40" role="tablist">
                                <div class="dropdown-menu__content box dark:bg-dark-1 p-2"> <a id="latest-tasks-new-tab" href="javascript:;" data-toggle="tab" data-target="#latest-tasks-new" class="block p-2 transition duration-300 ease-in-out bg-white dark:bg-dark-1 hover:bg-gray-200 dark:hover:bg-dark-2 rounded-md" role="tab" aria-controls="latest-tasks-new" aria-selected="true">New</a> <a id="latest-tasks-last-week-tab" href="javascript:;" data-toggle="tab" data-target="#latest-tasks-last-week" class="block p-2 transition duration-300 ease-in-out bg-white dark:bg-dark-1 hover:bg-gray-200 dark:hover:bg-dark-2 rounded-md" role="tab" aria-selected="false">Last Week</a> </div>
                            </div>
                        </div>
                        <div class="nav nav-tabs ml-auto hidden sm:flex" role="tablist"> <a id="latest-tasks-mobile-new-tab" data-toggle="tab" data-target="#latest-tasks-new" href="javascript:;" class="py-5 ml-6 active" role="tab" aria-selected="true">New</a> <a id="latest-tasks-mobile-last-week-tab" data-toggle="tab" data-target="#latest-tasks-last-week" href="javascript:;" class="py-5 ml-6" role="tab" aria-selected="false">Last Week</a> </div>
                    </div>
                    <div class="p-5">
                        <div class="tab-content">
                            <div id="latest-tasks-new" class="tab-pane active" role="tabpanel" aria-labelledby="latest-tasks-new-tab">
                                @foreach ($latestOrders as $order)
                                <div class="flex items-center">
                                    <div class="border-l-2 border-theme-1 pl-4">
                                        <a href="" class="font-medium">{{ $order->order_no }}</a>
                                        <div class="text-gray-600">{{ $order->topic }}</div>
                                        <div class="text-gray-600">{{ $order->created_at->diffForHumans() }}</div>
                                    </div>
                                    {{-- <input class="form-check-switch ml-auto" type="checkbox"> --}}
                                </div>
                                <br>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END: Latest Tasks -->
            </div>
        </div>
        <div id="account" class="tab-pane " :class="{ 'active': account }" role="tabpanel" aria-labelledby="account-tab">
            @livewire('dashboard.pages.profile.account')
        </div>
        <div id="password" class="tab-pane " :class="{ 'active': password }" role="tabpanel" aria-labelledby="password-tab">
            @livewire('dashboard.pages.profile.change-password')
        </div>
        <div id="settings" class="tab-pane " :class="{ 'active': settings }" role="tabpanel" aria-labelledby="settings-tab">
            @livewire('dashboard.pages.profile.settings')
        </div>
    </div>
</div>
