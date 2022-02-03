<div>
    <!-- BEGIN: Settings -->
    <div class="intro-y box col-span-12 lg:col-span-6">
        <div class="flex items-center px-5 py-5 sm:py-0 border-b border-gray-200 dark:border-dark-5">
            <h2 class="font-medium text-base mr-auto">
                Settings
            </h2>
            <div class="dropdown ml-auto sm:hidden">
                <a class="dropdown-toggle w-5 h-5 block" href="javascript:;" aria-expanded="false"> <i data-feather="more-horizontal" class="w-5 h-5 text-gray-600 dark:text-gray-300"></i> </a>
                <div class="nav nav-tabs dropdown-menu w-40" role="tablist">
                </div>
            </div>
        </div>
        <div class="p-5">
            <div class="tab-content">
                <div id="latest-tasks-new" class="tab-pane active" role="tabpanel" aria-labelledby="latest-tasks-new-tab">
                    {{-- @foreach ($latestOrders as $order) --}}
                    <div class="flex items-center">
                        <div class="border-l-2 border-theme-1 pl-4">
                            <a href="" class="font-medium">Receive Email Notification On Order Completion</a>

                        </div>
                        <input class="form-check-switch ml-auto" type="checkbox">
                    </div>
                    <br>
                    <div class="flex items-center">
                        <div class="border-l-2 border-theme-1 pl-4">
                            <a href="" class="font-medium">Subscribe To Our Email Notifications</a>
                            <div class="text-gray-600">No spamming</div>
                        </div>
                        <input class="form-check-switch ml-auto" type="checkbox">
                    </div>
                    <br>
                    <div class="flex items-center">
                        <div class="border-l-2 border-theme-1 pl-4">
                            <a href="" class="font-medium">Receive Invoice Report Monthly</a>
                        </div>
                        <input class="form-check-switch ml-auto" type="checkbox">
                    </div>
                    <br>
                    <div class="flex items-center">
                        <div class="border-l-2 border-theme-1 pl-4">
                            <a href="" class="font-medium">Receive Email Notification For Unread Messages</a>
                            <div class="text-gray-600">If you have not logged in a period of 1 hour</div>
                        </div>
                        <input class="form-check-switch ml-auto" type="checkbox">
                    </div>
                    <br>
                    {{-- @endforeach --}}
                </div>
            </div>
        </div>
    </div>
    <!-- END: Latest Tasks -->
</div>
