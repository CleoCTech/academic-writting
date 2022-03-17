{{-- The best athlete wants his opponent at his best. --}}
<div class="col-span-12 mt-8">
    <div class="intro-y flex items-center h-10">
        <h2 class="text-lg font-medium truncate mr-5">
            General Report
        </h2>
        <a href="{{ route('create-order') }}" class="ml-auto flex items-center text-theme-1 dark:text-theme-10 md:no-underline md:hover:underline"> <i data-feather="plus-circle"
                class="w-4 h-4 mr-3"></i> Create New Order </a>
    </div>
    @livewire('dashboard.components.how-it-works')
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div wire:click='pendingOrders' class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
            <div class="report-box zoom-in">
                <div class="box p-5">
                    <div class="flex">
                        <i data-feather="more-horizontal" class="report-box__icon text-theme-10"></i>
                        <div class="ml-auto">
                            <div class="report-box__indicator bg-theme-9 tooltip cursor-pointer"
                                title="33% Higher than last month"> <i data-feather="chevron-up"
                                    class="w-4 h-4 ml-0.5"></i> </div>
                        </div>
                    </div>
                    <div class="text-3xl font-medium leading-8 mt-6">{{ $pending_orders }}</div>
                    <div class="text-base text-gray-600 mt-1 md:no-underline md:hover:underline">Pending Orders</div>
                </div>
            </div>
        </div>
        <div wire:click='progress' class="md:no-underline md:hover:underline col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
            <div class="report-box zoom-in">
                <div class="box p-5">
                    <div class="flex">
                        <i data-feather="activity" class="report-box__icon text-theme-11"></i>
                        <div class="ml-auto">
                            <div class="report-box__indicator bg-theme-6 tooltip cursor-pointer"
                                title="2% Lower than last month"> 2% <i data-feather="chevron-down"
                                    class="w-4 h-4 ml-0.5"></i> </div>
                        </div>
                    </div>
                    <div class="text-3xl font-medium leading-8 mt-6">{{ $active_orders }}</div>
                    <div class="text-base text-gray-600 mt-1">Orders In Progress</div>
                </div>
            </div>
        </div>
        <div wire:click='allorders' class="md:no-underline md:hover:underline col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
            <div class="report-box zoom-in">
                <div class="box p-5">
                    <div class="flex">
                        <i data-feather="list" class="report-box__icon text-theme-12"></i>
                        <div class="ml-auto">
                            <div class="report-box__indicator bg-theme-9 tooltip cursor-pointer"
                                title="12% Higher than last month"> 12% <i data-feather="chevron-up"
                                    class="w-4 h-4 ml-0.5"></i> </div>
                        </div>
                    </div>
                    <div class="text-3xl font-medium leading-8 mt-6">{{ $all_orders }}</div>
                    <div class="text-base text-gray-600 mt-1">Total Orders</div>
                </div>
            </div>
        </div>
        <div wire:click='transactions' class="md:no-underline md:hover:underline col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
            <div class="report-box zoom-in">
                <div class="box p-5">
                    <div class="flex">
                        <i data-feather="dollar-sign" class="report-box__icon text-theme-9"></i>
                        <div class="ml-auto">
                            <div class="report-box__indicator bg-theme-9 tooltip cursor-pointer"
                                title="22% Higher than last month"> 22% <i data-feather="chevron-up"
                                    class="w-4 h-4 ml-0.5"></i> </div>
                        </div>
                    </div>
                    <div class="text-3xl font-medium leading-8 mt-6">$ {{ $total_spent }}</div>
                    <div class="text-base text-gray-600 mt-1">Total Spent</div>
                </div>
            </div>
        </div>
    </div>
</div>
