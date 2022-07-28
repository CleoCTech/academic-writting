<div>

    <div wire:loading>
        @livewire('general.loader')
    </div>
    <div class="content fs-6 d-flex flex-column flex-column-fluid" id="kt_content">
        <div class="toolbar" id="kt_toolbar">
            <div class="container-fluid d-flex flex-stack flex-wrap flex-sm-nowrap">
                <!--begin::Info-->
                <div class="d-flex flex-column align-items-start justify-content-center flex-wrap me-2">
                    <!--begin::Title-->
                    <h1 class="text-dark fw-bolder my-1 fs-2">{{ $pageTitle }}</h1>
                    <!--end::Title-->
                </div>
                <!--begin::Info-->
                <div class="d-flex flex-column align-items-start justify-content-center flex-wrap me-2">
                    <!--begin::Title-->
                    <button wire:click='back' type="button" class="rounded btn btn-primary">
                        <i style="font-size: 1rem !important;" class="bi bi-arrow-bar-left fa-2x"></i>
                       Back
                    </button>
                    <!--end::Title-->
                </div>
                <!--end::Info-->
            </div>
        </div>
        <div>
            @if (session()->has('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            @endif
            @if (session()->has('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
            @endif
        </div>

        <div class="container mx-auto my-5 p-5">
            <div class="md:flex no-wrap md:-mx-2 ">
                <!-- Left Side -->
                <div class="w-full md:w-3/12 md:mx-2">
                    <!-- Profile Card -->
                    <div class="bg-white p-3 border-t-4 border-green-400">
                        <div class="image overflow-hidden">
                            <img class="h-auto w-full mx-auto"
                                src="{{ asset('storage/').'/'.$writer->avatar }}"

                                alt="">
                        </div>
                        <h1 class="text-gray-900 font-bold text-xl leading-8 my-1">{{ $writer->firstname }}  {{ $writer->lastname }}</h1>
                        <h3 class="text-gray-600 font-lg text-semibold leading-6"></h3>

                        <ul
                            class="bg-gray-100 text-gray-600 hover:text-gray-700 hover:shadow py-2 px-3 mt-3 divide-y rounded shadow-sm">
                            <li class="flex items-center py-3">
                                <span>Status</span>
                                @if ($writer->online == 1)
                                <span class="ml-auto">
                                    <span class="bg-green-500 py-1 px-2 rounded text-white text-sm">Active</span>
                                 </span>
                                @else
                                <span class="ml-auto">
                                    <span class="bg-red-500 py-1 px-2 rounded text-white text-sm">Offline</span>
                                 </span>
                                @endif

                            </li>
                            <li class="flex items-center py-3">
                                <span>Member since</span>
                                <span class="ml-auto">{!! date('M d,Y', strtotime($writer->created_at)) !!}</span>
                            </li>
                        </ul>
                    </div>
                    <!-- End of profile card -->
                    <div class="my-4"></div>
                    <!-- Friends card -->

                    <!-- End of friends card -->
                </div>
                <!-- Right Side -->
                <div class="w-full md:w-9/12 mx-2 h-64">
                    <!-- Profile tab -->
                    <!-- About Section -->
                    <div class="bg-white p-3 shadow-sm rounded-sm">
                        <div class="flex items-center space-x-2 font-semibold text-gray-900 leading-8">
                            <span clas="text-green-500">
                                <svg class="h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                            </span>
                            <span class="tracking-wide">About</span>
                        </div>
                        <div class="text-gray-700">
                            <div class="grid md:grid-cols-2 text-md">
                                <div class="grid grid-cols-2">
                                    <div class="px-4 py-2 font-semibold">Full Name</div>
                                    <div class="px-4 py-2">{{ $writer->firstname }} {{ $writer->lastname }}</div>
                                </div>
                                <div class="grid grid-cols-2">
                                    <div class="px-4 py-2 font-semibold">Email</div>
                                    <div class="px-4 py-2">{{ $writer->email }}</div>
                                </div>
                                <div class="grid grid-cols-2">
                                    <div class="px-4 py-2 font-semibold">Total Orders</div>
                                    <div class="px-4 py-2 text-3xl font-semibold text-indigo-darker">{{ $totalOrders }}</div>
                                </div>
                                <div class="grid grid-cols-2">
                                    <div class="px-4 py-2 font-semibold">Total Earnings</div>
                                    <div class="px-4 py-2 text-3xl font-semibold text-indigo-darker">${{ $totalEarned }}</div>
                                </div>
                                <div class="grid grid-cols-2">
                                    <div class="px-4 py-2 font-semibold">Active orders</div>
                                    <div class="px-4 py-2 text-3xl font-semibold text-indigo-darker">{{ $activeOrders }}</div>
                                </div>
                                <div class="grid grid-cols-2">
                                    <div class="px-4 py-2 font-semibold">Revisions</div>
                                    <div class="px-4 py-2 text-3xl font-semibold text-indigo-darker">{{ $totalRevisions }}</div>
                                </div>
                                <div class="grid grid-cols-2">
                                    <div class="px-4 py-2 font-semibold">Balance</div>
                                    <div class="px-4 py-2 text-3xl font-semibold text-indigo-darker">${{ $balance }}</div>
                                </div>
                            </div>
                        </div>
                        @if ($writer->status == 'Pending')
                        <button wire:click='activateAccount' type="button" class="rounded btn btn-primary block w-full">
                            Activate Account
                         </button>
                        @else
                        <button wire:click='deactivateAccount' type="button" class="rounded btn btn-primary block w-full">
                            Deactivate Account
                         </button>
                        @endif

                        {{-- <button
                            class="block w-full text-blue-800 text-md bg-gray-100 font-semibold rounded-lg hover:bg-blue-500 focus:outline-none focus:shadow-outline focus:bg-gray-100 hover:shadow-xs p-3 my-4">Block Account
                        </button> --}}
                    </div>
                    <!-- End of about section -->

                    <div class="my-4"></div>

                    <!-- Experience and education -->
                    <div class="bg-white p-3 shadow-sm rounded-sm">

                        <div class="grid grid-cols-2">
                            <div>
                                <div class="flex items-center space-x-2 font-semibold text-gray-900 leading-8 mb-3">
                                    <span clas="text-green-500">
                                        <svg class="h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                        </svg>
                                    </span>
                                    <span class="tracking-wide">Recent Activity</span>
                                </div>
                                <ul class="list-inside space-y-2">
                                    <li>
                                        <div class="text-teal-600">Comming Soon...</div>
                                        <div class="text-gray-500 text-xs">March 2020 - Now</div>
                                    </li>
                                    <li>
                                        <div class="text-teal-600">Just Example.</div>
                                        <div class="text-gray-500 text-xs">March 2020 - Now</div>
                                    </li>
                                    <li>
                                        <div class="text-teal-600">Downloaded File No.A88GGSASA.</div>
                                        <div class="text-gray-500 text-xs">March 2020 - Now</div>
                                    </li>
                                    <li>
                                        <div class="text-teal-600">Posted Order</div>
                                        <div class="text-gray-500 text-xs">March 2020 - Now</div>
                                    </li>
                                </ul>
                            </div>
                            {{-- <div>
                                <div class="flex items-center space-x-2 font-semibold text-gray-900 leading-8 mb-3">
                                    <span clas="text-green-500">
                                        <svg class="h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke="currentColor">
                                            <path fill="#fff" d="M12 14l9-5-9-5-9 5 9 5z" />
                                            <path fill="#fff"
                                                d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222" />
                                        </svg>
                                    </span>
                                    <span class="tracking-wide">Education</span>
                                </div>
                                <ul class="list-inside space-y-2">
                                    <li>
                                        <div class="text-teal-600">Masters Degree in Oxford</div>
                                        <div class="text-gray-500 text-xs">March 2020 - Now</div>
                                    </li>
                                    <li>
                                        <div class="text-teal-600">Bachelors Degreen in LPU</div>
                                        <div class="text-gray-500 text-xs">March 2020 - Now</div>
                                    </li>
                                </ul>
                            </div> --}}
                        </div>
                        <!-- End of Experience and education grid -->
                    </div>
                    <!-- End of profile tab -->
                </div>
            </div>
        </div>
    </div>
</div>
