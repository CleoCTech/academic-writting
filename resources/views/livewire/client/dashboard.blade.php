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

                @if (session()->has('success'))
                <div class="m-auto">
                    <div class="bg-white rounded-lg border-gray-300 border p-3 shadow-lg">
                        <div class="flex flex-row">
                            <div class="px-2">
                                <svg width="24" height="24" viewBox="0 0 1792 1792" fill="#44C997" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M1299 813l-422 422q-19 19-45 19t-45-19l-294-294q-19-19-19-45t19-45l102-102q19-19 45-19t45 19l147 147 275-275q19-19 45-19t45 19l102 102q19 19 19 45t-19 45zm141 83q0-148-73-273t-198-198-273-73-273 73-198 198-73 273 73 273 198 198 273 73 273-73 198-198 73-273zm224 0q0 209-103 385.5t-279.5 279.5-385.5 103-385.5-103-279.5-279.5-103-385.5 103-385.5 279.5-279.5 385.5-103 385.5 103 279.5 279.5 103 385.5z" />
                                </svg>
                            </div>
                            <div class="">
                                <span class="font-semibold"> {{ session('success-modal') }}</span>
                                {{-- <span class="block text-gray-500">Anyone with a link can now view this file</span> --}}
                            </div>
                        </div>
                    </div>
                </div>
                @endif
                @if (session()->has('error'))
                <div class="m-auto">
                    <div class="bg-danger rounded-lg border-gray-300 border p-3 shadow-lg"
                        style="background-color: rgba(224,52,18,.1) !important; color: rgba(224,52,18,.5);">
                        <div class="flex flex-row">
                            <div class="px-2 text-damger">
                                <i class="text-danger fas fa-times-circle fa-2x"></i>
                            </div>
                            <div class="">
                                <span class="font-semibold text-danger"> {{ session('error-modal') }}</span>
                                {{-- <span class="block text-gray-500">Anyone with a link can now view this file</span> --}}
                            </div>
                        </div>
                    </div>
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
        <div class="w-full py-6">
            <div class="flex">
              <div class="w-1/4">
                <div class="relative mb-2">
                  <div class="w-10 h-10 mx-auto bg-green-500 rounded-full text-lg text-white flex items-center">
                    <span class="text-center text-white w-full">
                      1
                    </span>
                  </div>
                </div>

                <div class="text-xs text-center md:text-base">Newly Created Orders Are Under Pending Orders</div>
              </div>

              <div class="w-1/4">
                <div class="relative mb-2">
                  <div class="absolute flex align-center items-center align-middle content-center" style="width: calc(100% - 2.5rem - 1rem); top: 50%; transform: translate(-50%, -50%)">
                    <div class="w-full bg-gray-200 rounded items-center align-middle align-center flex-1">
                      <div class="w-0 bg-green-300 py-1 rounded" style="width: 100%;"></div>
                    </div>
                  </div>

                  <div class="w-10 h-10 mx-auto bg-green-500 rounded-full text-lg text-white flex items-center">
                    <span class="text-center text-white w-full">
                      2
                    </span>
                  </div>
                </div>

                <div class="text-xs text-center md:text-base">Confirm Order By Clicking <strong>"View"</strong> Button</div>
              </div>

              <div class="w-1/4">
                <div class="relative mb-2">
                  <div class="absolute flex align-center items-center align-middle content-center" style="width: calc(100% - 2.5rem - 1rem); top: 50%; transform: translate(-50%, -50%)">
                    <div class="w-full bg-gray-200 rounded items-center align-middle align-center flex-1">
                      <div class="w-0 bg-green-300 py-1 rounded" style="width: 100%;"></div>
                    </div>
                  </div>

                  <div class="w-10 h-10 mx-auto bg-green-500 rounded-full text-lg text-white flex items-center">
                    <span class="text-center text-white w-full">
                      3
                    </span>
                  </div>
                </div>

                <div class="text-xs text-center md:text-base">Negotiate Price Under Chat Section</div>
              </div>

              <div class="w-1/4">
                <div class="relative mb-2">
                  <div class="absolute flex align-center items-center align-middle content-center" style="width: calc(100% - 2.5rem - 1rem); top: 50%; transform: translate(-50%, -50%)">
                    <div class="w-full bg-gray-200 rounded items-center align-middle align-center flex-1">
                      <div class="w-0 bg-green-300 py-1 rounded" style="width: 100%;"></div>
                    </div>
                  </div>

                  <div class="w-10 h-10 mx-auto bg-green-500 rounded-full text-lg text-white flex items-center">
                    <span class="text-center text-white w-full">
                      4
                    </span>
                  </div>
                </div>

                <div class="text-xs text-center md:text-base">Confirm Invoice To Move Your Order In Progress</div>
              </div>
            </div>
        </div>
        <!--End How it Works-->
        <!--begin::Post-->
        <div class="post fs-6 d-flex flex-column-fluid" id="kt_post">
            <!--begin::Container-->
            <div class="container">
                <!--begin::Row-->

                <div class="row g-xl-8">

                    @if ($menuButtons)
                    <div {{-- wire:click='pending' --}}
                        class="cursor-pointer col-xl-3 col-md-6 mb-4 border-l-2 border-info shadow h-70 py-2 transition duration-150 ease-in-out transform hover:scale-110 bg-emerald-600 text-white font-semibold py-3 px-6 rounded-md">
                        <a href="#pendingorders">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-md font-weight-bold text-info text-uppercase mb-1">
                                        Pending Orders</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                                        {{count($pending_orders)}}</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-pause fa-2x text-info"></i>
                                </div>
                            </div>
                        </div>
                        </a>
                    </div>

                    <div wire:click='cancelled'
                        class=" cursor-pointer col-xl-3 col-md-6 mb-4 border-l-2 border-danger shadow h-70 py-2 transition duration-150 ease-in-out transform hover:scale-110 bg-emerald-600 text-white font-semibold py-3 px-6 rounded-md">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-md font-weight-bold text-primary text-uppercase mb-1">
                                        Cancelled Orders</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                                        @php $counter=0; @endphp
                                        @foreach ($others as $other)
                                        @if ($other->status == 'Cancelled')
                                        @php $counter++; @endphp
                                        @endif
                                        @endforeach
                                        {{$counter}}
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-ban fa-2x text-danger"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div wire:click='progress'
                        class="cursor-pointer col-xl-3 col-md-6 mb-4 border-l-2 border-success shadow h-70 py-2 transition duration-150 ease-in-out transform hover:scale-110 bg-emerald-600 text-white font-semibold py-3 px-6 rounded-md">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-md font-weight-bold text-primary text-uppercase mb-1">
                                        Orders In Progress</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                                        @php $counter=0; @endphp
                                        @foreach ($others as $other)
                                        @if ($other->status == 'In progress')
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
                        class="cursor-pointer col-xl-3 col-md-6 mb-4 border-l-2 border-success shadow h-70 py-2 transition duration-150 ease-in-out transform hover:scale-110 bg-emerald-600 text-white font-semibold py-3 px-6 rounded-md">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-md font-weight-bold text-primary text-uppercase mb-1">
                                        Completed Orders</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                                        @php $counter=0; @endphp
                                        @foreach ($others as $other)
                                        @if ($other->status == 'Complete')
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
                        class="cursor-pointer col-xl-3 col-md-6 mb-4 border-l-2 border-info shadow h-70 py-2 transition duration-150 ease-in-out transform hover:scale-110 bg-emerald-600 text-white font-semibold py-3 px-6 rounded-md">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-md font-weight-bold text-primary text-uppercase mb-1">
                                        Revisions</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                                        @php $counter=0; @endphp
                                        @foreach ($revisions as $revision)
                                        @if ($revision->status == 'Pending')
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
                        class="cursor-pointer col-xl-3 col-md-6 mb-4 border-l-2 border-info shadow h-70 py-2 transition duration-150 ease-in-out transform hover:scale-110 bg-emerald-600 text-white font-semibold py-3 px-6 rounded-md">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-md font-weight-bold text-primary text-uppercase mb-1">
                                        Revisions In Progress</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                                        @php $counter=0; @endphp
                                        @foreach ($revisions as $revision)
                                        @if ($revision->status == 'In Progress')
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
                    <div wire:click='doneRevisions'
                        class="cursor-pointer col-xl-3 col-md-6 mb-4 border-l-2 border-success shadow h-70 py-2 transition duration-150 ease-in-out transform hover:scale-110 bg-emerald-600 text-white font-semibold py-3 px-6 rounded-md">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-md font-weight-bold text-primary text-uppercase mb-1">
                                        Completed Revisions</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                                        @php $counter=0; @endphp
                                        @foreach ($revisions as $revision)
                                        @if ($revision->status == 'Complete')
                                        @php $counter++; @endphp
                                        @endif
                                        @endforeach
                                        {{$counter}}
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-check-double fa-2x text-primary"></i>
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
                                                    You Balance
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
                                                                <a href="{{ route('create-order') }}">
                                                                    <button
                                                                        class=" btn-primary transition duration-150 ease-in-out transform hover:scale-110 bg-emerald-600 text-white font-semibold py-3 px-6 rounded-md">
                                                                        Create New Order
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
                                                        @php $x=0; @endphp
                                                        @foreach ($ongoing as $key=> $ongoing_order)
                                                        <li data-bs-target="#kt_stats_widget_8_carousel"
                                                            data-bs-slide-to="{{$x}}"
                                                            class="{{$x == 0? 'ms-1 active' : 'ms-1'}}"></li>
                                                        @php $x++; @endphp
                                                        @endforeach
                                                    </ol>
                                                    <!--end::Carousel Indicators-->
                                                </div>
                                                <!--end::Heading-->
                                                <!--begin::Carousel-->
                                                <div class="carousel-inner pt-6">
                                                    <!--begin::Item-->
                                                    @php $x=0; @endphp
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
                                                    @endforeach

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
                            <button wire:click='default'
                                class="btn-primary transition duration-150 ease-in-out transform hover:scale-110 bg-emerald-600 text-white font-semibold py-3 px-6 rounded-md">
                                <span class="svg-icon svg-icon-2 rotate-180">
                                    <i class="bi bi-arrow-bar-left"></i>
                                </span>
                                Back
                            </button>
                            @endif

                            <br class="py-3">
                            <div class="g-xl-8 pt-3">
                                @if ($centerView == '')
                                <!--begin::Row-->
                                <div id="pendingorders" class="row g-5 gx-xxl-8 mb-xxl-3">
                                    <!--begin::Col-->
                                    <div class="col-xxl-12">
                                        <!--begin::Table widget 1-->
                                        <div class="card card-xxl-stretch mb-5 mb-xl-3">
                                            <!--begin::Header-->
                                            <div class="card-header border-0 pt-5 pb-3">
                                                <!--begin::Heading-->
                                                <h3 class="card-title align-items-start flex-column">
                                                    <span class="card-label fw-boldest text-gray-800 fs-2">Pending
                                                        Orders</span>

                                                    <span class="text-gray-400 fw-bold mt-2 fs-6">
                                                        {{count($pending_orders)}} Pending Orders
                                                    </span>

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
                                                                @foreach($cols as $col)
                                                                @if($col['isList'] == true)
                                                                <th class="">{{$col['colCaption']}}</th>
                                                                @endif
                                                                @endforeach
                                                                <th class="text-end pe-2 min-w-70px">Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @if(count($pending_orders) > 0)
                                                            @foreach ($pending_orders as $key=> $pending_order)
                                                            <tr>

                                                                <td class="p-0">
                                                                    <div
                                                                        class="form-check form-check-sm form-check-custom form-check-solid">
                                                                        <input class="form-check-input" type="checkbox"
                                                                            value="1"
                                                                            x-on:click="$wire.select('{{$pending_order[$keyCol]}}')"
                                                                            {{$isSelectAll? 'checked':''}} />
                                                                    </div>
                                                                </td>
                                                                @foreach($cols as $col)
                                                                @if($col['isList'] == true)
                                                                @if(isset($col['isKey']))
                                                                <td class="p-0"
                                                                    x-on:click="$wire.view('{{$pending_order[$keyCol]}}')">
                                                                    <div class="d-flex align-items-center">
                                                                        <div class="ps-3">
                                                                            <a href="#"
                                                                                class="text-gray-400 mb-1">{{$pending_order[$col['colName']]}}
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                @else
                                                                @if($col['type'] == 'date')
                                                                <td class="p-0">
                                                                    <div class="d-flex align-items-center">
                                                                        <div class="ps-3">
                                                                            <a href="#"
                                                                                class="text-gray-500  fs-5  mb-1">{!!
                                                                                htmlspecialchars_decode(date('j<\s\up>S
                                                                                </\s\up> F Y',
                                                                                strtotime($pending_order[$col['colName']])))
                                                                                !!}
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                @elseif(isset($col['isRelationship']) &&
                                                                $col['isRelationship'] == true)
                                                                <td class="p-0">
                                                                    <div class="d-flex align-items-center">
                                                                        <div class="ps-3">
                                                                            <a href="#" class="text-gray-400 mb-1">
                                                                                {{$pending_order[$col['relName']][$col['colName']]}}
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                @elseif($col['colName'] == 'status')
                                                                <td>
                                                                    <div class="d-flex flex-column w-100 me-2 mt-2 ">
                                                                        <span
                                                                            class="text-red-400 me-2 fw-boldest mb-2 text-danger">{{$pending_order[$col['colName']]}}</span>
                                                                    </div>
                                                                </td>
                                                                @else
                                                                <td class="p-0">
                                                                    <div class="d-flex align-items-center">
                                                                        <div class="ps-3">
                                                                            <a href="#" class="text-gray-400 mb-1">
                                                                                {{$pending_order[$col['colName']]}}
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                @endif
                                                                @endif
                                                                @endif
                                                                @endforeach

                                                                <td class="pe-0 text-end">
                                                                    <a class="btn btn-light text-muted fw-boldest text-hover-primary btn-sm px-5"
                                                                        x-on:click="$wire.chat('{{$pending_order[$keyCol]}}')">View</a>
                                                                </td>
                                                            </tr>
                                                            @endforeach
                                                            @else
                                                            <tr>
                                                                <td class="italic text-center" colspan="{{count($cols)}}">
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
                                        {{ $pending_orders->links('components.pagination-links') }}
                                    </div>
                                    <!--end::Col-->
                                </div>
                                <!--end::Row-->
                                <!--begin::Row-->

                                <div id="ongoinorders" class="row g-5 gx-xxl-8 mb-xxl-3">
                                    <!--begin::Col-->
                                    <div class="col-xxl-12">
                                        <!--begin::Table widget 1-->
                                        <div class="card card-xxl-stretch mb-5 mb-xl-3">
                                            <!--begin::Header-->
                                            <div class="card-header border-0 pt-5 pb-3">
                                                <!--begin::Heading-->
                                                <h3 class="card-title align-items-start flex-column">
                                                    <span class="card-label fw-boldest text-gray-800 fs-2">Orders</span>
                                                    <span class="text-gray-400 fw-bold mt-2 fs-6">{{count($others)}}
                                                        Order(s)</span>
                                                </h3>
                                                <!--end::Heading-->
                                                <!--begin::Toolbar-->
                                                <div class="card-toolbar">
                                                    <!--begin::Select-->
                                                    <div class="pe-6 my-1">
                                                        <select class="form-select form-select-sm form-select-solid w-125px"
                                                            data-control="select2" data-placeholder="All Users"
                                                            data-hide-search="true">
                                                            <option value="1" selected="selected">
                                                                All Orders
                                                            </option>
                                                            <option value="2">Completed</option>
                                                            <option value="3">In Progress</option>
                                                        </select>
                                                    </div>
                                                    <!--end::Select-->
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
                                                                <th class="min-w-125px">Date</th>
                                                                <th class="min-w-180px">Order ID</th>
                                                                <th class="min-w-125px">Details</th>
                                                                <th class="min-w-120px">Progress</th>
                                                                <th class="text-end pe-2 min-w-70px">Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($others as $other)
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
                                                                                class="text-gray-500  fs-5  mb-1">{!!
                                                                                htmlspecialchars_decode(date('j<\s\up>S
                                                                                </\s\up> F Y',
                                                                                strtotime($other->created_at))) !!}
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td class="p-0">
                                                                    <div class="d-flex align-items-center">
                                                                        <div class="ps-3">
                                                                            <a href="#"
                                                                                class="text-gray-400 mb-1">{{$other->order_no}}
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td class="p-0">
                                                                    <div class="d-flex align-items-center">
                                                                        <div class="ps-3">
                                                                            <a href="#"
                                                                                class="text-gray-400 mb-1">{{$other->topic}}
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                    {{-- <span class="text-gray-400 fw-bold">
                                                                        Darknight transparency 36 Icons Pack</span> --}}
                                                                </td>
                                                                <td>
                                                                    <div class="d-flex flex-column w-100 me-2 mt-2">

                                                                        @if ($other->status=='In progress')
                                                                        <span
                                                                            wire:class="text-gray-400 me-2 fw-boldest mb-2">85%</span>
                                                                        <div class="progress bg-light-info w-100 h-5px">
                                                                            <div class="progress-bar bg-info"
                                                                                role="progressbar" style="width: 85%"></div>
                                                                        </div>
                                                                        @elseif($other->status=='Complete')
                                                                        <span
                                                                            class="text-gray-400 me-2 fw-boldest mb-2">100%</span>
                                                                        <div class="progress bg-light-primary w-100 h-5px">
                                                                            <div class="progress-bar bg-primary"
                                                                                role="progressbar" style="width: 100%">
                                                                            </div>
                                                                        </div>
                                                                        @endif
                                                                    </div>
                                                                </td>
                                                                <td class="pe-0 text-end">
                                                                    <a class="btn btn-light text-muted fw-boldest text-hover-primary btn-sm px-5"
                                                                        x-on:click="$wire.chat('{{$other->order_no}}')">View</a>
                                                                </td>
                                                            </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <!--end::Table-->
                                            </div>
                                            <!--end::Body-->
                                        </div>
                                        <!--end::Table widget 1-->
                                        {{ $others->links('components.pagination-links') }}
                                    </div>
                                    <!--end::Col-->
                                </div>
                                <!--end::Row-->
                                @elseif($centerView=='revisions')
                                @livewire('client.components.center-view')
                                @elseif($centerView=='pending')
                                <div class="row g-5 gx-xxl-8 mb-xxl-3">
                                    <!--begin::Col-->
                                    <div class="col-xxl-12">
                                        <!--begin::Table widget 1-->
                                        <div class="card card-xxl-stretch mb-5 mb-xl-3">
                                            <!--begin::Header-->
                                            <div class="card-header border-0 pt-5 pb-3">
                                                <!--begin::Heading-->
                                                <h3 class="card-title align-items-start flex-column">
                                                    <span class="card-label fw-boldest text-gray-800 fs-2">Pending
                                                        Orders</span>

                                                    <span class="text-gray-400 fw-bold mt-2 fs-6">
                                                        {{count($pending_orders)}} Pending Order(s)
                                                    </span>

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
                                                                @foreach($cols as $col)
                                                                @if($col['isList'] == true)
                                                                <th class="">{{$col['colCaption']}}</th>
                                                                @endif
                                                                @endforeach
                                                                <th class="text-end pe-2 min-w-70px">Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @if(count($pending_orders) > 0)
                                                            @foreach ($pending_orders as $key=> $pending_order)
                                                            <tr>

                                                                <td class="p-0">
                                                                    <div
                                                                        class="form-check form-check-sm form-check-custom form-check-solid">
                                                                        <input class="form-check-input" type="checkbox"
                                                                            value="1"
                                                                            x-on:click="$wire.select('{{$pending_order[$keyCol]}}')"
                                                                            {{$isSelectAll? 'checked':''}} />
                                                                    </div>
                                                                </td>
                                                                @foreach($cols as $col)
                                                                @if($col['isList'] == true)
                                                                @if(isset($col['isKey']))
                                                                <td class="p-0"
                                                                    x-on:click="$wire.view('{{$pending_order[$keyCol]}}')">
                                                                    <div class="d-flex align-items-center">
                                                                        <div class="ps-3">
                                                                            <a href="#"
                                                                                class="text-gray-400 mb-1">{{$pending_order[$col['colName']]}}
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                @else
                                                                @if($col['type'] == 'date')
                                                                <td class="p-0">
                                                                    <div class="d-flex align-items-center">
                                                                        <div class="ps-3">
                                                                            <a href="#"
                                                                                class="text-gray-500  fs-5  mb-1">{!!
                                                                                htmlspecialchars_decode(date('j<\s\up>S
                                                                                </\s\up> F Y',
                                                                                strtotime($pending_order[$col['colName']])))
                                                                                !!}
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                @elseif(isset($col['isRelationship']) &&
                                                                $col['isRelationship'] == true)
                                                                <td class="p-0">
                                                                    <div class="d-flex align-items-center">
                                                                        <div class="ps-3">
                                                                            <a href="#" class="text-gray-400 mb-1">
                                                                                {{$pending_order[$col['relName']][$col['colName']]}}
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                @elseif($col['colName'] == 'status')
                                                                <td>
                                                                    <div class="d-flex flex-column w-100 me-2 mt-2 ">
                                                                        <span
                                                                            class="text-red-400 me-2 fw-boldest mb-2 text-danger">{{$pending_order[$col['colName']]}}</span>
                                                                    </div>
                                                                </td>
                                                                @else
                                                                <td class="p-0">
                                                                    <div class="d-flex align-items-center">
                                                                        <div class="ps-3">
                                                                            <a href="#" class="text-gray-400 mb-1">
                                                                                {{$pending_order[$col['colName']]}}
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                @endif
                                                                @endif
                                                                @endif
                                                                @endforeach

                                                                <td class="pe-0 text-end">
                                                                    <a class="btn btn-light text-muted fw-boldest text-hover-primary btn-sm px-5"
                                                                        x-on:click="$wire.chat('{{$pending_order[$keyCol]}}')">View</a>
                                                                </td>
                                                            </tr>
                                                            @endforeach
                                                            @else
                                                            <tr>
                                                                <td class="italic text-center" colspan="{{count($cols)}}">
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
                                @elseif($centerView=='cancelled')
                                <div class="row g-5 gx-xxl-8 mb-xxl-3">
                                    <!--begin::Col-->
                                    <div class="col-xxl-12">
                                        <!--begin::Table widget 1-->
                                        <div class="card card-xxl-stretch mb-5 mb-xl-3">
                                            <!--begin::Header-->
                                            <div class="card-header border-0 pt-5 pb-3">
                                                <!--begin::Heading-->
                                                <h3 class="card-title align-items-start flex-column">
                                                    <span class="card-label fw-boldest text-gray-800 fs-2">Cancelled
                                                        Orders</span>
                                                    <span class="text-gray-400 fw-bold mt-2 fs-6">{{count($cancelled)}}
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
                                                                <th class="min-w-125px">Date</th>
                                                                <th class="min-w-180px">Order ID</th>
                                                                <th class="min-w-125px">Details</th>
                                                                <th class="min-w-120px">Status</th>
                                                                <th class="text-end pe-2 min-w-70px">Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @if (count($cancelled) > 0)
                                                            @foreach ($cancelled as $cancel)
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
                                                                                class="text-gray-500  fs-5  mb-1">{!!
                                                                                htmlspecialchars_decode(date('j<\s\up>S
                                                                                </\s\up> F Y',
                                                                                strtotime($cancel->created_at))) !!}
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td class="p-0">
                                                                    <div class="d-flex align-items-center">
                                                                        <div class="ps-3">
                                                                            <a href="#"
                                                                                class="text-gray-400 mb-1">{{$cancel->order_no}}
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td class="p-0">
                                                                    <div class="d-flex align-items-center">
                                                                        <div class="ps-3">
                                                                            <a href="#"
                                                                                class="text-gray-400 mb-1">{{$cancel->topic}}
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                    {{-- <span class="text-gray-400 fw-bold">
                                                                        Darknight transparency 36 Icons Pack</span> --}}
                                                                </td>
                                                                <td>
                                                                    <div class="d-flex flex-column w-100 me-2 mt-2 ">
                                                                        <span
                                                                            class="text-red-400 me-2 fw-boldest mb-2 text-danger">{{$cancel->status}}</span>
                                                                    </div>
                                                                </td>
                                                                <td class="pe-0 text-end">
                                                                    <a class="btn btn-light text-muted fw-boldest text-hover-primary btn-sm px-5"
                                                                        x-on:click="$wire.chat('{{$cancel->order_no}}')">View</a>
                                                                </td>
                                                            </tr>
                                                            @endforeach
                                                            @else

                                                            <tr>

                                                                <td colspan="6" class="pe-0 text-end italic text-center">
                                                                    *** No records
                                                                    found ***
                                                                </td>
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
                                        {{ $cancelled->links('components.pagination-links') }}
                                    </div>
                                    <!--end::Col-->
                                </div>
                                @elseif($centerView=='In Progress')
                                <div class="row g-5 gx-xxl-8 mb-xxl-3">
                                    <!--begin::Col-->
                                    <div class="col-xxl-12">
                                        <!--begin::Table widget 1-->
                                        <div class="card card-xxl-stretch mb-5 mb-xl-3">
                                            <!--begin::Header-->
                                            <div class="card-header border-0 pt-5 pb-3">
                                                <!--begin::Heading-->
                                                <h3 class="card-title align-items-start flex-column">
                                                    <span class="card-label fw-boldest text-gray-800 fs-2">Orders In
                                                        Progress</span>
                                                    <span class="text-gray-400 fw-bold mt-2 fs-6">{{count($ongoing)}}
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
                                                                <th class="min-w-125px">Date</th>
                                                                <th class="min-w-180px">Order ID</th>
                                                                <th class="min-w-125px">Details</th>
                                                                <th class="min-w-120px">Progress</th>
                                                                <th class="text-end pe-2 min-w-70px">Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @if (count($ongoing) > 0)
                                                            @foreach ($ongoing as $on)
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
                                                                                class="text-gray-500  fs-5  mb-1">{!!
                                                                                htmlspecialchars_decode(date('j<\s\up>S
                                                                                </\s\up> F Y',
                                                                                strtotime($on->created_at))) !!}
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td class="p-0">
                                                                    <div class="d-flex align-items-center">
                                                                        <div class="ps-3">
                                                                            <a href="#"
                                                                                class="text-gray-400 mb-1">{{$on->order_no}}
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td class="p-0">
                                                                    <div class="d-flex align-items-center">
                                                                        <div class="ps-3">
                                                                            <a href="#"
                                                                                class="text-gray-400 mb-1">{{$on->topic}}
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                    {{-- <span class="text-gray-400 fw-bold">
                                                                        Darknight transparency 36 Icons Pack</span> --}}
                                                                </td>
                                                                <td>
                                                                    <div class="d-flex flex-column w-100 me-2 mt-2">

                                                                        @if ($on->status=='In progress')
                                                                        <span
                                                                            wire:class="text-gray-400 me-2 fw-boldest mb-2">85%</span>
                                                                        <div class="progress bg-light-info w-100 h-5px">
                                                                            <div class="progress-bar bg-info"
                                                                                role="progressbar" style="width: 85%"></div>
                                                                        </div>

                                                                        @endif
                                                                    </div>
                                                                </td>
                                                                <td class="pe-0 text-end">
                                                                    <a class="btn btn-light text-muted fw-boldest text-hover-primary btn-sm px-5"
                                                                        x-on:click="$wire.chat('{{$on->order_no}}')">View</a>
                                                                </td>
                                                            </tr>
                                                            @endforeach
                                                            @else
                                                            <tr>
                                                                <td class="pe-0 text-end italic text-center">
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
                                        {{ $ongoing->links('components.pagination-links') }}
                                    </div>
                                    <!--end::Col-->
                                </div>
                                @elseif($centerView=='Completed')
                                <div class="row g-5 gx-xxl-8 mb-xxl-3">
                                    <!--begin::Col-->
                                    <div class="col-xxl-12">
                                        <!--begin::Table widget 1-->
                                        <div class="card card-xxl-stretch mb-5 mb-xl-3">
                                            <!--begin::Header-->
                                            <div class="card-header border-0 pt-5 pb-3">
                                                <!--begin::Heading-->
                                                <h3 class="card-title align-items-start flex-column">
                                                    <span class="card-label fw-boldest text-gray-800 fs-2">Completed
                                                        Orders</span>
                                                    <span class="text-gray-400 fw-bold mt-2 fs-6">{{count($complete)}}
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
                                                                <th class="min-w-125px">Date</th>
                                                                <th class="min-w-180px">Order ID</th>
                                                                <th class="min-w-125px">Details</th>
                                                                <th class="min-w-120px">Progress</th>
                                                                <th class="text-end pe-2 min-w-70px">Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @if (count($complete) > 0)
                                                            @foreach ($complete as $complete)
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
                                                                                class="text-gray-500  fs-5  mb-1">{!!
                                                                                htmlspecialchars_decode(date('j<\s\up>S
                                                                                </\s\up> F Y',
                                                                                strtotime($complete->created_at))) !!}
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td class="p-0">
                                                                    <div class="d-flex align-items-center">
                                                                        <div class="ps-3">
                                                                            <a href="#"
                                                                                class="text-gray-400 mb-1">{{$complete->order_no}}
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td class="p-0">
                                                                    <div class="d-flex align-items-center">
                                                                        <div class="ps-3">
                                                                            <a href="#"
                                                                                class="text-gray-400 mb-1">{{$complete->topic}}
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                    {{-- <span class="text-gray-400 fw-bold">
                                                                        Darknight transparency 36 Icons Pack</span> --}}
                                                                </td>
                                                                <td>
                                                                    <div class="d-flex flex-column w-100 me-2 mt-2">

                                                                        @if ($complete->status=='Complete')
                                                                        <span
                                                                            wire:class="text-gray-400 me-2 fw-boldest mb-2">100%</span>
                                                                        <div class="progress bg-light-info w-100 h-5px">
                                                                            <div class="progress-bar bg-success"
                                                                                role="progressbar" style="width: 100%">
                                                                            </div>
                                                                        </div>

                                                                        @endif
                                                                    </div>
                                                                </td>
                                                                <td class="pe-0 text-end">
                                                                    <a class="btn btn-light text-muted fw-boldest text-hover-primary btn-sm px-5"
                                                                        x-on:click="$wire.chat('{{$complete->order_no}}')">View</a>
                                                                </td>
                                                            </tr>
                                                            @endforeach
                                                            @else
                                                            <tr>
                                                                <td colspan="6" class="pe-0 text-end italic text-center">
                                                                    *** No records
                                                                    found ***
                                                                </td>
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
                                        {{ $complete->links('components.pagination-links') }}
                                    </div>
                                    <!--end::Col-->
                                </div>
                                @elseif($centerView=='done revisions')
                                @livewire('client.components.center-view')
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
    @elseif($varView == 'chat')
    @livewire('client.chat-order-summary')
    @elseif($varView == 'edit')
    @livewire('client.edit-order')
    @elseif($varView == 'invoice')
    @livewire('client.invoice')
    @endif

    {{-- <div class="ease-in-out duration-500">

    </div> --}}

</div>
<style>
    #pendingorders {
        transition-duration: 500ms;
        transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
    }
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
