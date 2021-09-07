<div>
    {{-- To attain knowledge, add things every day; To attain wisdom, subtract things every day --}}
    <div wire:loading>
        @livewire('general.loader')
    </div>
    @if ($varView == '')
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
                    <!--end::Title-->
                </div>

                @if (session()->has('Invoice-Confirmed'))
                <div class="alert alert-success">
                    {{ session('Invoice-Confirmed') }}
                </div>
                @elseif(session()->has('Invoice-Rejected'))
                <div class="alert alert-danger">
                    {{ session('Invoice-Rejected') }}
                </div>
                @endif
                <!--end::Info-->
                <!--begin::Actions-->
                {{-- <div class="d-flex align-items-center flex-nowrap text-nowrap py-1">
                    <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_new_target"
                        id="kt_toolbar_primary_button">Add a
                        Writer</a>
                </div> --}}
                <!--end::Actions-->
            </div>
        </div>
        <!--end::Toolbar-->
        <!--How it Works-->

        <!--End How it Works-->
        <!--begin::Post-->
        <div class="post fs-6 d-flex flex-column-fluid" id="kt_post">
            <!--begin::Container-->
            <div class="container">
                <!--begin::Row-->

                <div class="row g-xl-8">

                    @if ($menuButtons)
                        <div wire:click='bids'
                        class="col-xl-3 col-md-6 mb-4 border-l-2 border-info shadow h-70 py-2 transition duration-150 ease-in-out transform hover:scale-110 bg-emerald-600 text-white font-semibold py-3 px-6 rounded-md">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-md font-weight-bold text-info text-uppercase mb-1">
                                        Bids</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                                        {{count($bids)}}</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-pause fa-2x text-info"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div wire:click='cancelled'
                        class=" col-xl-3 col-md-6 mb-4 border-l-2 border-danger shadow h-70 py-2 transition duration-150 ease-in-out transform hover:scale-110 bg-emerald-600 text-white font-semibold py-3 px-6 rounded-md">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-md font-weight-bold text-primary text-uppercase mb-1">
                                        Cancelled Orders</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                                        {{-- @php $counter=0; @endphp
                                        @foreach ($others as $other)
                                        @if ($other->status == 'Cancelled')
                                        @php $counter++; @endphp
                                        @endif
                                        @endforeach
                                        {{$counter}} --}}
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-ban fa-2x text-danger"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div wire:click='progress'
                        class="col-xl-3 col-md-6 mb-4 border-l-2 border-success shadow h-70 py-2 transition duration-150 ease-in-out transform hover:scale-110 bg-emerald-600 text-white font-semibold py-3 px-6 rounded-md">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-md font-weight-bold text-primary text-uppercase mb-1">
                                        Orders In Progress</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                                        @php $counter=0; @endphp
                                        @foreach ($activeOrders as $activeOrder)
                                        @if ($activeOrder->status == 'Active')
                                        @php $counter++; @endphp
                                        @endif
                                        @endforeach
                                        {{$counter}}
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-tasks fa-2x text-primary"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div wire:click='completed'
                        class="col-xl-3 col-md-6 mb-4 border-l-2 border-success shadow h-70 py-2 transition duration-150 ease-in-out transform hover:scale-110 bg-emerald-600 text-white font-semibold py-3 px-6 rounded-md">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-md font-weight-bold text-primary text-uppercase mb-1">
                                        Completed Orders</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                                        @php $counter=0; @endphp
                                        @foreach ($activeOrders as $activeOrder)
                                        @if ($activeOrder->status == 'Completed')
                                        @php $counter++; @endphp
                                        @endif
                                        @endforeach
                                        {{$counter}}
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-check fa-2x text-primary"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div wire:click='revisions'
                        class="col-xl-3 col-md-6 mb-4 border-l-2 border-info shadow h-70 py-2 transition duration-150 ease-in-out transform hover:scale-110 bg-emerald-600 text-white font-semibold py-3 px-6 rounded-md">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-md font-weight-bold text-primary text-uppercase mb-1">
                                        Revisions</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                                        @php $counter=0; @endphp
                                        @foreach ($activeOrders as $activeOrder)
                                        @if ($activeOrder->status == 'Revision')
                                        @php $counter++; @endphp
                                        @endif
                                        @endforeach
                                        {{$counter}}
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-tasks fa-2x text-info"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div wire:click='ongoingRevisions'
                        class="col-xl-3 col-md-6 mb-4 border-l-2 border-info shadow h-70 py-2 transition duration-150 ease-in-out transform hover:scale-110 bg-emerald-600 text-white font-semibold py-3 px-6 rounded-md">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-md font-weight-bold text-primary text-uppercase mb-1">
                                        Revisions In Progress</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                                        @php $counter=0; @endphp
                                        @foreach ($activeOrders as $activeOrder)
                                        @if ($activeOrder->status == 'Revision')
                                        @php $counter++; @endphp
                                        @endif
                                        @endforeach
                                        {{$counter}}
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-tasks fa-2x text-info"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif


                        <!--begin::Col-->
                        <div class="col-xxl-12">
                            @if ($quickStats)
                            <div class="quick-stats row g-xl-8">
                                <!--begin::Col-->
                                <div class="col-xl-4">
                                        <!--begin::Engage Widget 1-->
                                    <div class="card card-xxl-stretch mb-5 mb-xl-8">
                                        <!--begin::Body-->
                                        <div class="card-body p-0">
                                            <!--begin::Header-->
                                            <div class="px-9 pt-6 card-rounded h-250px w-100 bgi-no-repeat bgi-size-cover bgi-position-y-top h-200px"
                                                style="background-image: url({{asset('dash-assets/img/bg-green.png')}})">
                                                <!--begin::Heading-->
                                                <div class="d-flex flex-stack">
                                                    <h3 class="m-0 text-white fw-bolder fs-3">
                                                        Quick Stats
                                                    </h3>
                                                </div>
                                                <!--end::Heading-->
                                                <!--begin::Balance-->
                                                <div class="fw-bolder fs-7 text-center text-white pt-5">
                                                    Your Earnings
                                                    <span class="fw-boldest fs-2hx d-block mt-n1">$00.00</span>
                                                </div>
                                                <!--end::Balance-->
                                            </div>
                                            <!--end::Header-->
                                            <!--begin::Items-->

                                            <div class="shadow-xs card-rounded mx-9 mb-9 px-6 py-9 position-relative z-index-1 bg-white"
                                                style="margin-top: -100px">
                                                <!--begin::Item-->
                                                <div class="d-flex align-items-center mb-">
                                                    <div class="card border-l-2 border-info shadow h-70 py-2">
                                                        <div class="card-body">
                                                            <div class="row no-gutters align-items-center">
                                                                <div class="col mr-2">
                                                                    <div class="text-md font-weight-bold text-info text-uppercase mb-1">
                                                                        {{ \Carbon\Carbon::now()->toDateString() }} </div>
                                                                    <div class="h5 mb-0 font-weight-bold text-gray-800"></div>
                                                                </div>
                                                                <div class="col-auto">
                                                                    <i class="fas fa-clock fa-2x text-info"></i>
                                                                </div>
                                                                <a href="{{ route('writer-dashboard') }}">
                                                                    <button
                                                                        class=" btn-primary transition duration-150 ease-in-out transform hover:scale-110 bg-emerald-600 text-white font-semibold py-3 px-6 rounded-md">
                                                                        Check Available Orders
                                                                    </button>
                                                                </a>

                                                                <br>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                            <!--end::Items-->
                                        </div>
                                        <!--end::Body-->
                                    </div>
                                <!--end::Engage Widget 1-->
                                </div>

                                <!--begin::Col-->
                                <div class="col-xl-4">
                                    <!--begin::Slider Widget 1-->
                                    <div class="card card-xl-stretch mb-5 mb-xl-8">
                                        <!--begin::Body-->
                                        <div class="card-body pt-5">
                                            <div id="kt_stats_widget_8_carousel"
                                                class="carousel carousel-custom carousel-stretch slide"
                                                data-bs-ride="carousel" data-bs-interval="8000">
                                                <!--begin::Heading-->
                                                <div class="d-flex flex-stack flex-wrap">
                                                    <span class="fs-4 text-gray-400 fw-boldest pe-2">Current Jobs</span>
                                                    <!--begin::Carousel Indicators-->
                                                    <ol class="p-0 m-0 carousel-indicators carousel-indicators-dots">
                                                        {{-- @php $x=0; @endphp
                                                        @foreach ($ongoing as $key=> $ongoing_order)
                                                        <li data-bs-target="#kt_stats_widget_8_carousel"
                                                            data-bs-slide-to="{{$x}}"
                                                            class="{{$x == 0? 'ms-1 active' : 'ms-1'}}"></li>
                                                        @php $x++; @endphp
                                                        @endforeach --}}
                                                    </ol>
                                                    <!--end::Carousel Indicators-->
                                                </div>
                                                <!--end::Heading-->
                                                <!--begin::Carousel-->
                                                <div class="carousel-inner pt-6">
                                                    <!--begin::Item-->
                                                    {{-- @php $x=0; @endphp
                                                    @foreach ($ongoing as $key=> $ongoing_order)
                                                    <div class=" {{$x == 0? 'carousel-item active' : 'carousel-item'}}">
                                                        <div class="carousel-wrapper">
                                                            <div
                                                                class="d-flex flex-column justify-content-between flex-grow-1">
                                                                <a href=""
                                                                    class="fs-2 text-gray-800 text-hover-primary fw-boldest">{{$ongoing_order->topic}}</a>
                                                                <a href=""
                                                                    class="fs-2 text-gray-600 text-hover-primary fw-bold">{{$ongoing_order->category->subject}}</a>
                                                                <p class="text-gray-600 fs-6 fw-bold pt-4 mb-0">
                                                                    {{strlen($ongoing_order->instructions) > 50? substr($ongoing_order->instructions,0,50).'...':$ongoing_order->instructions}}

                                                                </p>
                                                            </div>
                                                            <!--begin::Info-->
                                                            <div class="d-flex flex-stack pt-8">
                                                                @php
                                                                $startTime =
                                                                \Carbon\Carbon::parse($ongoing_order->deadline_date);
                                                                // $startTime = $ongoing_order->deadline_date
                                                                $ongoing_order->deadline_time ;
                                                                // {{ \Carbon\Carbon::now()->toDateString() }}
                                                                // $now = ;
                                                                $endTime = \Carbon\Carbon::now()->toDateString();

                                                                $totalDuration =
                                                                $startTime->diff($endTime)->format('%H:%I:%S'). " Time left"
                                                                // $totalDuration = $endTime->diffForHumans($startTime);
                                                                // dd($totalDuration);
                                                                @endphp
                                                                @if ($totalDuration == 0)
                                                                <span
                                                                    class="badge badge-light-danger fs-7 fw-boldest me-2">{{$totalDuration}}</span>
                                                                @elseif($totalDuration > 1)
                                                                <span
                                                                    class="badge badge-light-primary fs-7 fw-boldest me-2">{{$totalDuration}}</span>
                                                                @endif

                                                            </div>
                                                            <!--end::Info-->
                                                        </div>
                                                    </div>
                                                    @php $x++; @endphp
                                                    @endforeach --}}

                                                </div>
                                                <!--end::Carousel-->
                                            </div>
                                        </div>
                                        <!--end::Body-->
                                    </div>
                                    <!--end::Slider Widget 1-->
                                </div>
                                <!--end::Col-->
                                <div class="col-xl-4">
                                    <!--begin::Chart Widget 1-->
                                    <div class="card card-xl-stretch mb-5 mb-xl-8">
                                        <!--begin::Body-->
                                        <div class="card-body p-0 d-flex justify-content-between flex-column">
                                            <div class="d-flex flex-stack card-p flex-grow-1">
                                                <!--begin::Icon-->
                                                <div class="symbol symbol-45px">
                                                    <div class="symbol-label">
                                                        <!--begin::Svg Icon | path: icons/stockholm/Shopping/Cart4.svg-->
                                                        <span class="svg-icon svg-icon-2x">
                                                            <i class="bi bi-basket2"></i>
                                                        </span>
                                                        <!--end::Svg Icon-->
                                                    </div>
                                                </div>
                                                <!--end::Icon-->
                                                <!--begin::Text-->
                                                <div class="d-flex flex-column text-end">
                                                    <span class="fw-boldest text-gray-800 fs-2">Essay
                                                        Orders</span>
                                                    <span class="text-gray-400 fw-bold fs-6">April 1 - May
                                                        5</span>
                                                </div>
                                                <!--end::Text-->
                                            </div>
                                            <!--begin::Chart-->
                                            <div class="pt-1">
                                                <div id="kt_chart_widget_1_chart" class="card-rounded-bottom h-125px"></div>
                                            </div>
                                            <!--end::Chart-->
                                        </div>
                                    </div>
                                    <!--end::Chart Widget 1-->
                                </div>
                                <!--end::Col-->

                            </div>
                            @endif

                            <!--begin::Row-->
                            @if ($centerView != '')
                            <button wire:click='resetCenterView'
                                class=" btn-primary transition duration-150 ease-in-out transform hover:scale-110 bg-emerald-600 text-white font-semibold py-3 px-6 rounded-md">
                                <span class="svg-icon svg-icon-2 rotate-180">
                                    <i class="bi bi-arrow-bar-left"></i>
                                </span>
                                Back
                            </button>
                            @endif

                            <br>
                            <div class="g-xl-8">
                                @if ($centerView == '')
                                <!--begin::Row-->

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
                                                    <span class="card-label fw-boldest text-gray-800 fs-2">My Orders</span>
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
                                                                                class="text-gray-400 mb-1">$ {{$progress_order->sale_price}}
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
                                                                        x-on:click="$wire.orderdetails('{{$progress_order->order_id}}')">View</a>
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
                                <!--end::Row-->
                                @endif

                            </div>
                            <!--end::Row-->
                            <!--begin::Row-->
                            <!--end::Row-->
                        </div>
                        <!--end ::Col-->
                </div>
                <!--end::Row-->

            </div>
            <!--end::Container-->
        </div>
        <!--end::Post-->
    </div>
    @elseif($varView == 'order-details')
        @livewire('writer.order.order-details')
    @elseif($varView == 'edit')
        @livewire('client.edit-order')
    @elseif($varView == 'invoice')
        @livewire('client.invoice')
    @elseif($varView == 'my-orders')
        @livewire('writer.order.my-orders')
    @endif

</div>
<style>
    .bs-wizard {margin-top: 40px;}

    /*Form Wizard*/
    .bs-wizard {border-bottom: solid 1px #e0e0e0; padding: 0 0 10px 0;}
    .bs-wizard > .bs-wizard-step {padding: 0; position: relative;}
    .bs-wizard > .bs-wizard-step + .bs-wizard-step {}
    .bs-wizard > .bs-wizard-step .bs-wizard-stepnum {color: #595959; font-size: 16px; margin-bottom: 5px;}
    .bs-wizard > .bs-wizard-step .bs-wizard-info {color: #999; font-size: 14px;}
    .bs-wizard > .bs-wizard-step > .bs-wizard-dot {position: absolute; width: 30px; height: 30px; display: block; background: #fbe8aa; top: 45px; left: 50%; margin-top: -15px; margin-left: -15px; border-radius: 50%;}
    .bs-wizard > .bs-wizard-step > .bs-wizard-dot:after {content: ' '; width: 14px; height: 14px; background: #fbbd19; border-radius: 50px; position: absolute; top: 8px; left: 8px; }
    .bs-wizard > .bs-wizard-step > .progress {position: relative; border-radius: 0px; height: 8px; box-shadow: none; margin: 20px 0;}
    .bs-wizard > .bs-wizard-step > .progress > .progress-bar {width:0px; box-shadow: none; background: #fbe8aa;}
    .bs-wizard > .bs-wizard-step.complete > .progress > .progress-bar {width:100%;}
    .bs-wizard > .bs-wizard-step.active > .progress > .progress-bar {width:50%;}
    .bs-wizard > .bs-wizard-step:first-child.active > .progress > .progress-bar {width:0%;}
    .bs-wizard > .bs-wizard-step:last-child.active > .progress > .progress-bar {width: 100%;}
    .bs-wizard > .bs-wizard-step.disabled > .bs-wizard-dot {background-color: #f5f5f5;}
    .bs-wizard > .bs-wizard-step.disabled > .bs-wizard-dot:after {opacity: 0;}
    .bs-wizard > .bs-wizard-step:first-child  > .progress {left: 50%; width: 50%;}
    .bs-wizard > .bs-wizard-step:last-child  > .progress {width: 50%;}
    .bs-wizard > .bs-wizard-step.disabled a.bs-wizard-dot{ pointer-events: none; }
    /*END Form Wizard*/


    /*responsiveness*/
    @media(max-width :768px){
        .quick-stats{
            display: none;
        }
        .menu-btns{
            /* transform: scale(0.7); */
        }
        .test{
            display: visible;
        }
    }
</style>
@push('scripts')
<script>
    // this works because is it in the master window
    window.addEventListener('swal',function(e){
        Swal.fire(e.detail);
    });
</script>
@endpush
