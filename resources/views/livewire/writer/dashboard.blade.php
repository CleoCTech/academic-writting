<div>
    {{-- The whole world belongs to you --}}
    <div wire:loading>
        @livewire('general.loader')
    </div>
    @if ($varView=='')
        <div class="content fs-6 d-flex flex-column flex-column-fluid" id="kt_content">
            <!--begin::Toolbar-->
            <div class="toolbar" id="kt_toolbar">
                <div class="container-fluid d-flex flex-stack flex-wrap flex-sm-nowrap">
                    <!--begin::Info-->
                    <div class="d-flex flex-column align-items-start justify-content-center flex-wrap me-2">
                        <!--begin::Title-->
                        <h1 class="text-dark fw-bolder my-1 fs-2">
                            Dashboard
                            <small class="text-muted fs-6 fw-normal ms-1"></small>
                        </h1>
                        {{-- <a href="#"><x-jet-button>Test Jobs List</x-jet-button></a> --}}
                        <!--end::Title-->
                    </div>
                </div>
            </div>
            <!--end::Toolbar-->
            <!--How it Works-->

            <!--begin::Post-->
            <div class="post fs-6 d-flex flex-column-fluid" id="kt_post">
                <div class="container">
                    @if ($centerView != '')
                    <button wire:click='default'
                        class=" btn-primary transition duration-150 ease-in-out transform hover:scale-110 bg-emerald-600 text-white font-semibold py-3 px-6 rounded-md">
                        <span class="text-white svg-icon svg-icon-2 rotate-180">
                            <i class="bi bi-arrow-bar-left"></i>
                        </span>
                        Back
                    </button>
                    @endif
                    <br>

                    <div class="row g-xl-8">
                        @if ($menuButtons)

                        @endif
                    </div>

                    @if ($centerView == '')


                    <div class="w-full py-3 mx-auto rounded-xl bg-gray-100 shadow-lg p-10 text-gray-800 relative overflow-hidden resize-x min-w-80 " x-data="">
                        <div class="relative mt-1">
                            <input type="text" id="password" class="w-full pl-3 pr-10 py-2 border-2 border-gray-200 rounded-xl hover:border-gray-300 focus:outline-none focus:border-blue-500 transition-colors" placeholder="Search...">
                            <button class="block w-7 h-7 text-center text-xl leading-0 absolute top-2 right-2 text-gray-400 focus:outline-none hover:text-gray-900 transition-colors"><i class="mdi mdi-magnify"></i></button>
                        </div>
                        <a href="" class="underline text-gray-800 py-3 hover:underline text-lg">Show More Filters</a>
                    </div>

                    <div class="row g-5 gx-xxl-8 mb-xxl-3">
                        <!--begin::Col-->
                        <div class="col-xxl-12">
                            <!--begin::Table widget 1-->
                            <div class="card card-xxl-stretch mb-5 mb-xl-3">
                                @if ( session()->has('success') )
                                <div class="flex justify-center items-center m-1 font-medium py-1 px-2 bg-white rounded-md text-green-700 bg-green-100 border border-green-300 ">
                                    <div slot="avatar">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check-circle w-5 h-5 mx-2">
                                            <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                                            <polyline points="22 4 12 14.01 9 11.01"></polyline>
                                        </svg>
                                    </div>
                                    <div class="text-xl font-normal  max-w-full flex-initial">
                                        {{ session('success') }}</div>
                                    <div class="flex flex-auto flex-row-reverse">
                                        <div>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x cursor-pointer hover:text-green-400 rounded-full w-5 h-5 ml-2">
                                                <line x1="18" y1="6" x2="6" y2="18"></line>
                                                <line x1="6" y1="6" x2="18" y2="18"></line>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                                @elseif(session()->has('error'))
                                <div class="flex justify-center items-center m-1 font-medium py-1 px-2 bg-white rounded-md text-red-700 bg-red-100 border border-red-300 ">
                                    <div slot="avatar">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-alert-octagon w-5 h-5 mx-2">
                                            <polygon points="7.86 2 16.14 2 22 7.86 22 16.14 16.14 22 7.86 22 2 16.14 2 7.86 7.86 2"></polygon>
                                            <line x1="12" y1="8" x2="12" y2="12"></line>
                                            <line x1="12" y1="16" x2="12.01" y2="16"></line>
                                        </svg>
                                    </div>
                                    <div class="text-xl font-normal  max-w-full flex-initial">
                                        {{ session('error')}}</div>
                                    <div class="flex flex-auto flex-row-reverse">
                                        <div>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x cursor-pointer hover:text-red-400 rounded-full w-5 h-5 ml-2">
                                                <line x1="18" y1="6" x2="6" y2="18"></line>
                                                <line x1="6" y1="6" x2="18" y2="18"></line>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                                @endif

                                <!--begin::Header-->
                                <div class="card-header border-0 pt-5 pb-3">
                                    <!--begin::Heading-->
                                    <h3 class="card-title align-items-start flex-column">
                                        <span class="card-label fw-boldest text-gray-800 fs-2">Available Orders</span>
                                        <span class="text-gray-400 fw-bold mt-2 fs-6">{{count($active)}}
                                            Order(s)</span>
                                    </h3>
                                    <!--end::Heading-->
                                    <!--begin::Toolbar-->
                                    <div class="card-toolbar">
                                        <!--begin::Search-->
                                        <div class="w-125px position-relative my-1">
                                            <!--begin::Svg Icon | path: icons/stockholm/General/Search.svg-->
                                            <span
                                                class="svg-icon svg-icon-3 svg-icon-gray-500 position-absolute top-50 translate-middle ms-6">
                                                <i class="bi bi-search"></i>
                                            </span>
                                            <!--end::Svg Icon-->
                                            <input type="text"
                                                class="form-control form-control-sm form-control-solid ps-10"
                                                name="search" value="" placeholder="Search" />
                                        </div>
                                        <!--end::Search-->
                                    </div>
                                    <!--end::Toolbar-->
                                </div>
                                <!--end::Header-->
                                <!--begin::Body-->
                                <div class="card-body py-0">
                                    <!--begin::Table-->
                                    <div class="table-responsive">
                                        <table
                                            class="table align-middle table-row-bordered table-row-dashed gy-5"
                                            id="kt_table_widget_1" x-data=''>
                                            <thead
                                                class="border-bottom border-gray-200 fs-5 fw-bold bg-light bg-opacity-75">
                                                <tr>
                                                    <th class="w-20px ps-0">
                                                        <div
                                                            class="form-check form-check-sm form-check-custom form-check-solid me-5">
                                                            <input class="form-check-input" type="checkbox"
                                                                data-kt-check="true"
                                                                data-kt-check-target="#kt_table_widget_1 .form-check-input"
                                                                value="1" />
                                                        </div>
                                                    </th>
                                                    <th class="min-w-180px">Order ID</th>
                                                    <th class="min-w-125px">Subject</th>
                                                    <th class="min-w-125px">Price</th>
                                                    <th class="min-w-120px">Amount of work</th>
                                                    <th class="min-w-125px">Deadline</th>
                                                    <th class="text-start pe-2 min-w-70px">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if (count($active) > 0)
                                                @foreach ($active as $progress_order)
                                                <tr>
                                                    <td class="p-0">
                                                        <div
                                                            class="form-check form-check-sm form-check-custom form-check-solid">
                                                            <input class="form-check-input" type="checkbox"
                                                                value="1" />
                                                        </div>
                                                    </td>
                                                    <td class="p-0">
                                                        <div class="d-flex align-items-center">
                                                            <div class="ps-3">
                                                                <a href="#"
                                                                    class="text-gray-400 mb-1">{{$progress_order->order_no}}
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="p-0">
                                                        <div class="d-flex align-items-center">
                                                            <div class="ps-3">
                                                                <a href="#"
                                                                    class="text-gray-400 mb-1">{{$progress_order->subject}}
                                                                </a>
                                                            </div>
                                                        </div>
                                                        {{-- <span class="text-gray-400 fw-bold">
                                                            Darknight transparency 36 Icons Pack</span> --}}
                                                    </td>
                                                    <td class="p-0">
                                                        <div class="d-flex align-items-center">
                                                            <div class="ps-3">
                                                                <a href="#"
                                                                    class="text-gray-400 mb-1">$ {{$progress_order->proposed_resell_price}}
                                                                </a>
                                                            </div>
                                                        </div>
                                                        {{-- <span class="text-gray-400 fw-bold">
                                                            Darknight transparency 36 Icons Pack</span> --}}
                                                    </td>
                                                    <td>
                                                        <div class="d-flex align-items-center">
                                                            <div class="ps-3">
                                                                <a href="#"
                                                                    class="text-gray-400 mb-1">{{$progress_order->pages}} page
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="p-0">
                                                        <div class="d-flex align-items-center">
                                                            <div class="ps-3">
                                                                <a href="#"
                                                                    class="text-gray-400 mb-1"> {{$this->calDeadline($progress_order->deadline_date, $progress_order->deadline_time)}}
                                                                </a>

                                                                {{-- <a href="#"
                                                                    class="text-gray-500  fs-5  mb-1">{!!
                                                                    htmlspecialchars_decode(date('j<\s\up>S
                                                                    </\s\up> F Y',
                                                                    strtotime($progress_order->deadline_date))) !!}
                                                                </a> --}}
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="pe-0 text-start">
                                                        <a class="btn btn-light text-muted fw-boldest text-hover-primary btn-sm px-5"
                                                            x-on:click="$wire.viewOrder('{{$progress_order->id}}')">Bid</a>
                                                    </td>
                                                </tr>
                                                @endforeach
                                                @else
                                                <tr>
                                                    <td class="pe-0 text-end italic text-center" >
                                                        <br>*** No records
                                                        found ***</td>
                                                </tr>
                                                @endif
                                            </tbody>
                                        </table>
                                    </div>
                                    <!--end::Table-->
                                </div>
                                <!--end::Body-->
                            </div>
                            <!--end::Table widget 1-->
                        </div>
                        <!--end::Col-->
                    </div>

                    @elseif($centerView == "order-details")
                    @livewire('writer.order.view-order-details')
                    {{-- @include('livewire.writer.order.view-order-details') --}}
                    @endif

                </div>


            </div>
        </div>
    @elseif($varView == 'chat')
    @livewire('client.chat-order-summary')
    @endif


    <style>
        .min-w-80 {
            min-width: 20rem;
        }
        .resize::-webkit-resizer,
        .resize-x::-webkit-resizer,
        .resize-y::-webkit-resizer {
            background-color: transparent;
        }
        .resize:after,
        .resize-x:after,
        .resize-y:after {
            display: block;
            position: absolute;
            bottom: 5px;
            right: 5px;
            width: 24px;
            height: 24px;
            content: '\F045D';
            font: normal normal normal 24px/1 "Material Design Icons";
            font-size: 24px;
            text-rendering: auto;
            line-height: 24px;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
            color: rgba(0,0,0,0.3);
        }
    </style>

</div>
