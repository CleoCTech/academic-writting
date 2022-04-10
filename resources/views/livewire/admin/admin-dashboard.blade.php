<div>
    {{-- Because she competes with no one, no one can compete with her. --}}
    <!--begin::Content-->
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
        <!-- Alert Info -->
        {{-- <div class="bg-blue-200 px-6 py-4 mx-2 my-4 rounded-md text-lg flex items-center mx-auto w-3/4 xl:w-2/4">
            <svg viewBox="0 0 24 24" class="text-blue-600 w-5 h-5 sm:w-5 sm:h-5 mr-3">
                <path fill="currentColor"
                    d="M12,0A12,12,0,1,0,24,12,12.013,12.013,0,0,0,12,0Zm.25,5a1.5,1.5,0,1,1-1.5,1.5A1.5,1.5,0,0,1,12.25,5ZM14.5,18.5h-4a1,1,0,0,1,0-2h.75a.25.25,0,0,0,.25-.25v-4.5a.25.25,0,0,0-.25-.25H10.5a1,1,0,0,1,0-2h1a2,2,0,0,1,2,2v4.75a.25.25,0,0,0,.25.25h.75a1,1,0,1,1,0,2Z">
                </path>
            </svg>
            <span class="text-blue-800"> We've updated a few things. We've updated a few things. </span>
            <span class="flex justify-end" style=" margin-left: 2rem;">
            <button
                class=" btn-primary transition duration-150 ease-in-out transform hover:scale-110 bg-emerald-600 text-white font-semibold py-3 px-6 rounded-md"
                " >
                Create Invoice
            </button>
            </span>
        </div> --}}
        <!-- End Alert Info -->
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

                <div class="text-md text-center md:text-base">Newly Created Orders Are Under Pending Orders</div>
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

                <div class="text-md text-center md:text-base">Confirm Order By Clicking <strong>"View"</strong> Button</div>
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

                <div class="text-md text-center md:text-base">Negotiate Price Under Chat Section</div>
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

                <div class="text-md text-center md:text-base">Send Invoice For Client To Confirm</div>
              </div>
            </div>
        </div>
        <!--End How it Works-->
        <!--begin::Post-->
        <div class="post fs-6 d-flex flex-column-fluid" id="kt_post">
            <!--begin::Container-->
            <div class="container">
                <!--begin::Row-->
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
                         <!-- Earnings (Monthly) Card Example -->
                        <div wire:click='pending' class="col-xl-3 col-md-6 mb-4 cursor-pointer">
                            <div class=" border-l-2 border-gray-600 shadow h-70 py-2 transition duration-150 ease-in-out transform hover:scale-110 bg-emerald-600 text-white font-semibold py-3 px-6 rounded-md" >
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-md font-weight-bold text-primary text-uppercase mb-1">
                                               Pending Orders</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                @php $counter=0; @endphp
                                                @foreach ($orders as $order)
                                                @if ($order->status == 'Pending')
                                                @php $counter++; @endphp
                                                @endif
                                                @endforeach
                                                {{$counter}}
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-pause-circle fa-2x text-info"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div wire:click='cancelled' class="col-xl-3 col-md-6 mb-4 cursor-pointer">
                            <div class=" border-l-2 border-success shadow h-70 py-2 transition duration-150 ease-in-out transform hover:scale-110 bg-emerald-600 text-white font-semibold py-3 px-6 rounded-md">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-md font-weight-bold text-primary text-uppercase mb-1">
                                                Cancled Orders</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">0</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-ban fa-2x text-danger"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div wire:click='progress' class="col-xl-3 col-md-6 mb-4 cursor-pointer">
                            <div class=" border-l-2 border-success shadow h-70 py-2 transition duration-150 ease-in-out transform hover:scale-110 bg-emerald-600 text-white font-semibold py-3 px-6 rounded-md">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-md font-weight-bold text-primary text-uppercase mb-1">
                                                Orders In Progress</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                @php $counter=0; @endphp
                                                @foreach ($orders as $order)
                                                @if ($order->status == 'In progress')
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
                        </div>

                        <div wire:click='completed' class="col-xl-3 col-md-6 mb-4 cursor-pointer">
                            <div class=" border-l-2 border-success shadow h-70 py-2 transition duration-150 ease-in-out transform hover:scale-110 bg-emerald-600 text-white font-semibold py-3 px-6 rounded-md">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-md font-weight-bold text-primary text-uppercase mb-1">
                                              Completed Orders</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                @php $counter=0; @endphp
                                                @foreach ($orders as $order)
                                                @if ($order->status == 'Complete')
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
                        </div>

                        <div wire:click='revisions' class="col-xl-3 col-md-6 mb-4 cursor-pointer">
                            <div class=" border-l-2 border-success shadow h-70 py-2 transition duration-150 ease-in-out transform hover:scale-110 bg-emerald-600 text-white font-semibold py-3 px-6 rounded-md">
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
                                            <i class="fas fa-redo fa-2x text-danger"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div wire:click='doneRevisions' class="col-xl-3 col-md-6 mb-4 cursor-pointer">
                            <div class=" border-l-2 border-success shadow h-70 py-2 transition duration-150 ease-in-out transform hover:scale-110 bg-emerald-600 text-white font-semibold py-3 px-6 rounded-md">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-md font-weight-bold text-primary text-uppercase mb-1">
                                            Revised Orders</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                @php $counter=0; @endphp
                                                @foreach ($revisions as $revision)
                                                @if ($revision->status == 'Done')
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
                        </div>
                    @endif



                        @if ($centerView == '')
                             <!--begin::Col-->
                        <div class="col-xxl-8">
                            <!--begin::Row-->
                            <div class="row g-xl-8">
                                <!--begin::Col-->
                                <div class="col-xl-6">
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
                                                    <span class="fw-boldest text-gray-800 fs-2">Essay Orders</span>
                                                    <span class="text-gray-400 fw-bold fs-6">April 1 - May 5</span>
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
                                <!--begin::Col-->
                                <div class="col-xl-6">
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
                                                        @foreach ($progress_orders as $key=> $progress_order)
                                                        <li data-bs-target="#kt_stats_widget_8_carousel"
                                                        data-bs-slide-to="{{$x}}" class="{{$x == 0? 'ms-1 active' : 'ms-1'}}"></li>
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
                                                    @foreach ($progress_orders as $key=> $progress_order)
                                                    <div class=" {{$x == 0? 'carousel-item active' : 'carousel-item'}}">
                                                        <div class="carousel-wrapper">
                                                            <div
                                                                class="d-flex flex-column justify-content-between flex-grow-1">
                                                                <a href="" class="fs-2 text-gray-800 text-hover-primary fw-boldest">{{$progress_order->order->username}}</a>
                                                                <a href="" class="fs-2 text-gray-600 text-hover-primary fw-bold">{{$progress_order->category->subject}}</a>
                                                                <p class="text-gray-600 fs-6 fw-bold pt-4 mb-0">
                                                                    {{strlen($progress_order->instructions) > 50? substr($progress_order->instructions,0,50).'...':$progress_order->instructions}}

                                                                </p>
                                                            </div>
                                                            <!--begin::Info-->
                                                            <div class="d-flex flex-stack pt-8">
                                                                @php
                                                                $startTime = \Carbon\Carbon::parse($progress_order->deadline_date);
                                                                // $startTime = $ongoing_order->deadline_date $ongoing_order->deadline_time ;
                                                                // {{ \Carbon\Carbon::now()->toDateString() }}
                                                                // $now = ;
                                                                $endTime = \Carbon\Carbon::now()->toDateString();

                                                                $totalDuration = $startTime->diff($endTime)->format('%H:%I:%S'). " Time left"
                                                                // $totalDuration = $endTime->diffForHumans($startTime);
                                                                // dd($totalDuration);
                                                                @endphp
                                                                @if ($totalDuration == 0)
                                                                <span class="badge badge-light-danger fs-7 fw-boldest me-2">{{$totalDuration}}</span>
                                                                @elseif($totalDuration > 1)
                                                                <span class="badge badge-light-primary fs-7 fw-boldest me-2">{{$totalDuration}}</span>
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
                            </div>
                            <!--end::Row-->
                            <!--begin::Row-->
                            <div class="row g-xl-8">
                                <!--begin::Col-->
                                <div class="col-xl-6">
                                    <!--begin::Chart Widget 2-->
                                    <div class="card card-xl-stretch mb-5 mb-xl-8">
                                        <!--begin::Body-->
                                        <div
                                            class="card-body p-0 d-flex justify-content-between flex-column overflow-hidden">
                                            <div class="d-flex flex-stack flex-grow-1 px-9 pt-9 pb-3">
                                                <!--begin::Icon-->
                                                <div class="symbol symbol-45px">
                                                    <div class="symbol-label">
                                                        <!--begin::Svg Icon | path: icons/stockholm/Shopping/Cart5.svg-->
                                                        <span class="svg-icon svg-icon-2x">
                                                            <i class="bi bi-basket2"></i>
                                                        </span>
                                                        <!--end::Svg Icon-->
                                                    </div>
                                                </div>
                                                <!--end::Icon-->
                                                <!--begin::Text-->
                                                <div class="d-flex flex-column text-end">
                                                    <span class="fw-boldest text-gray-800 fs-2">Earnings</span>
                                                    <span class="text-gray-400 fw-bold fs-6">April 8 - May 5</span>
                                                </div>
                                                <!--end::Text-->
                                            </div>
                                            <!--begin::Chart-->
                                            <div id="kt_charts_widget_2_chart" style="height: 165px"></div>
                                            <!--end::Chart-->
                                        </div>
                                    </div>
                                    <!--end::Chart Widget 2-->
                                </div>
                                <!--end::Col-->
                                <!--begin::Col-->
                                <div class="col-xl-6">
                                    <!--begin::Slider widget 2-->
                                    <div class="card card-xl-stretch mb-5 mb-xl-8">
                                        <!--begin::Body-->
                                        <div class="card-body p-9">
                                            <!--begin::Heading-->
                                            <div class="fs-2hx fw-boldest">{{count($orders)}}</div>
                                            <div class="fs-4 fw-bold text-gray-400 mb-7">
                                                Commpany Projects
                                            </div>
                                            <!--end::Heading-->
                                            <!--begin::Wrapper-->
                                            <div class="d-flex flex-wrap">
                                                <!--begin::Chart-->
                                                <div class="d-flex flex-center h-100px w-100px me-9 mb-5">
                                                    <canvas id="kt_project_list_chart"></canvas>
                                                </div>
                                                <!--end::Chart-->
                                                <!--begin::Labels-->
                                                <div
                                                    class="d-flex flex-column justify-content-center flex-row-fluid pe-11 mb-5">
                                                    <!--begin::Label-->
                                                    <div class="d-flex fs-6 fw-bold align-items-center mb-3">
                                                        <div class="bullet bg-primary me-3"></div>
                                                        <div class="text-gray-400">Active</div>
                                                        <div class="ms-auto fw-boldest text-gray-700">
                                                            @php $counter=0; @endphp
                                                            @foreach ($orders as $order)
                                                            @if ($order->status == 'In progress')
                                                            @php $counter++; @endphp
                                                            @endif
                                                            @endforeach
                                                            {{$counter}}
                                                        </div>
                                                    </div>
                                                    <!--end::Label-->
                                                    <!--begin::Label-->
                                                    <div class="d-flex fs-6 fw-bold align-items-center mb-3">
                                                        <div class="bullet bg-success me-3"></div>
                                                        <div class="text-gray-400">Completed</div>
                                                        <div class="ms-auto fw-boldest text-gray-700">
                                                            @php $counter=0; @endphp
                                                            @foreach ($orders as $order)
                                                            @if ($order->status == 'Complete')
                                                            @php $counter++; @endphp
                                                            @endif
                                                            @endforeach
                                                            {{$counter}}
                                                        </div>
                                                    </div>
                                                    <!--end::Label-->
                                                    <!--begin::Label-->
                                                    <div class="d-flex fs-6 fw-bold align-items-center">
                                                        <div class="bullet bg-gray-300 me-3"></div>
                                                        <div class="text-gray-400">Yet to start</div>
                                                        <div class="ms-auto fw-boldest text-gray-700">
                                                            @php $counter=0; @endphp
                                                            @foreach ($orders as $order)
                                                            @if ($order->status == 'Pending')
                                                            @php $counter++; @endphp
                                                            @endif
                                                            @endforeach
                                                            {{$counter}}
                                                        </div>
                                                    </div>
                                                    <!--end::Label-->
                                                </div>
                                                <!--end::Labels-->
                                            </div>
                                            <!--end::Wrapper-->
                                        </div>
                                        <!--end::Body-->
                                    </div>
                                    <!--end::Slider widget 2-->
                                </div>
                                <!--end::Col-->
                            </div>
                            <!--end::Row-->
                        </div>
                        <!--end::Col-->
                        <!--begin::Col-->
                        <div class="col-xxl-4 gy-0 gy-xxl-8">
                            <!--begin::Engage Widget 1-->
                            <div class="card card-xxl-stretch mb-5 mb-xl-8">
                                <!--begin::Body-->
                                <div class="card-body p-0">
                                    <!--begin::Header-->
                                    <div class="px-9 pt-6 card-rounded h-250px w-100 bgi-no-repeat bgi-size-cover bgi-position-y-top h-200px"
                                        style="background-image: url('img/bg-green.png'); background-color: #00a3ff">
                                        <!--begin::Heading-->
                                        <div class="flex flex-stack">
                                            <h3 class="m-0 text-white fw-bolder fs-3">
                                                Quick Stats
                                            </h3>
                                        </div>
                                        <!--end::Heading-->
                                        <!--begin::Balance-->
                                        {{-- <div class="fw-bolder fs-7 text-center text-white pt-5">
                                            You Balance
                                            <span class="fw-boldest fs-2hx d-block mt-n1">KES. 37,562.00</span>
                                        </div> --}}
                                        <!--end::Balance-->
                                    </div>
                                    <!--end::Header-->
                                    <!--begin::Items-->
                                    <div class="shadow-xs card-rounded mx-9 mb-9 px-6 py-9 position-relative z-index-1 bg-white"
                                        style="margin-top: -100px">
                                        <!--begin::Item-->
                                        <div class="d-flex align-items-center mb-9">
                                            <!--begin::Symbol-->
                                            <div class="symbol symbol-40px me-5">
                                                <span class="symbol-label">
                                                    <!--begin::Svg Icon | path: icons/stockholm/Home/Globe.svg-->
                                                    <span class="svg-icon svg-icon-gray-400 svg-icon-2">
                                                        <i class="bi bi-watch"></i>
                                                    </span>
                                                    <!--end::Svg Icon-->
                                                </span>
                                            </div>
                                            <!--end::Symbol-->
                                            <!--begin::Description-->
                                            <div class="d-flex align-items-center flex-wrap w-100">
                                                <!--begin::Title-->
                                                <div class="mb-1 pe-3 flex-grow-1">
                                                    <a href="{{route('clients')}}"
                                                        class="fs-4 text-gray-800 text-hover-primary fw-boldest">Online Clients</a>
                                                    <div class="text-gray-400 fw-bold">

                                                    </div>
                                                </div>
                                                <!--end::Title-->
                                                <!--begin::Label-->
                                                <div class="d-flex align-items-center">
                                                    <div class="fw-bolder fs-4 text-gray-800 pe-1">
                                                        {{ $onlineClients }}
                                                    </div>
                                                    <a href="#" class="btn btn-icon btn-sm me-n2">
                                                        <!--begin::Svg Icon | path: icons/stockholm/Navigation/Right-2.svg-->
                                                        <span class="svg-icon svg-icon-4 svg-icon-gray-400">
                                                            <i class="bi bi-chevron-right"></i>
                                                        </span>
                                                        <!--end::Svg Icon-->
                                                    </a>
                                                </div>
                                                <!--end::Label-->
                                            </div>
                                            <!--end::Description-->
                                        </div>
                                        <!--end::Item-->
                                        <!--begin::Item-->
                                        <div class="d-flex align-items-center mb-9">
                                            <!--begin::Symbol-->
                                            <div class="symbol symbol-40px me-5">
                                                <span class="symbol-label">
                                                    <!--begin::Svg Icon | path: icons/stockholm/Layout/Layout-4-blocks-2.svg-->
                                                    <span class="svg-icon svg-icon-gray-400 svg-icon-2">
                                                        <i class="bi bi-watch"></i>
                                                    </span>
                                                    <!--end::Svg Icon-->
                                                </span>
                                            </div>
                                            <!--end::Symbol-->
                                            <!--begin::Description-->
                                            <div class="d-flex align-items-center flex-wrap w-100">
                                                <!--begin::Title-->
                                                <div class="mb-1 pe-3 flex-grow-1">
                                                    <a href="{{route('writers')}}"
                                                        class="fs-4 text-gray-800 text-hover-primary fw-boldest">Online Writers</a>
                                                    <div class="text-gray-400 fw-bold">

                                                    </div>
                                                </div>
                                                <!--end::Title-->
                                                <!--begin::Label-->
                                                <div class="d-flex align-items-center">
                                                    <div class="fw-bolder fs-4 text-gray-800 pe-1">
                                                        {{ $onlineWriters }}
                                                    </div>
                                                    <a href="#" class="btn btn-icon btn-sm me-n2">
                                                        <!--begin::Svg Icon | path: icons/stockholm/Navigation/Right-2.svg-->
                                                        <span class="svg-icon svg-icon-4 svg-icon-gray-400">
                                                            <i class="bi bi-chevron-right"></i>
                                                        </span>
                                                        <!--end::Svg Icon-->
                                                    </a>
                                                </div>
                                                <!--end::Label-->
                                            </div>
                                            <!--end::Description-->
                                        </div>
                                        <!--end::Item-->
                                        <!--begin::Item-->
                                        <div class="d-flex align-items-center mb-9">
                                            <!--begin::Symbol-->
                                            <div class="symbol symbol-40px me-5">
                                                <span class="symbol-label">
                                                    <!--begin::Svg Icon | path: icons/stockholm/Devices/Watch2.svg-->
                                                    <span class="svg-icon svg-icon-gray-400 svg-icon-2">
                                                        <i class="bi bi-watch"></i>
                                                    </span>
                                                    <!--end::Svg Icon-->
                                                </span>
                                            </div>
                                            <!--end::Symbol-->
                                            <!--begin::Description-->
                                            <div class="d-flex align-items-center flex-wrap w-100">
                                                <!--begin::Title-->
                                                <div class="mb-1 pe-3 flex-grow-1">
                                                    <a href="{{route('staff')}}"
                                                        class="fs-4 text-gray-800 text-hover-primary fw-boldest">Online Staff</a>
                                                    <div class="text-gray-400 fw-bold">

                                                    </div>
                                                </div>
                                                <!--end::Title-->
                                                <!--begin::Label-->
                                                <div class="d-flex align-items-center">
                                                    <div class="fw-bolder fs-4 text-gray-800 pe-1">
                                                        {{ $onlineStaff }}
                                                    </div>
                                                    <a href="#" class="btn btn-icon btn-sm me-n2">
                                                        <!--begin::Svg Icon | path: icons/stockholm/Navigation/Right-2.svg-->
                                                        <span class="svg-icon svg-icon-4 svg-icon-gray-400">
                                                            <i class="bi bi-chevron-right"></i>
                                                        </span>
                                                        <!--end::Svg Icon-->
                                                    </a>
                                                </div>
                                                <!--end::Label-->
                                            </div>
                                            <!--end::Description-->
                                        </div>
                                        <!--end::Item-->
                                        <!--begin::Item-->
                                        {{-- <div class="d-flex align-items-center mb-">
                                            <!--begin::Symbol-->
                                            <div class="symbol symbol-40px me-5">
                                                <span class="symbol-label">
                                                    <!--begin::Svg Icon | path: icons/stockholm/General/Clipboard.svg-->
                                                    <span class="svg-icon svg-icon-gray-400 svg-icon-2">
                                                        <i class="bi bi-watch"></i>
                                                    </span>
                                                    <!--end::Svg Icon-->
                                                </span>
                                            </div>
                                            <!--end::Symbol-->
                                            <!--begin::Description-->
                                            <div class="d-flex align-items-center flex-wrap w-100">
                                                <!--begin::Title-->
                                                <div class="mb-1 pe-3 flex-grow-1">
                                                    <a href="#"
                                                        class="fs-4 text-gray-800 text-hover-primary fw-boldest">Essay
                                                        Report</a>
                                                    <div class="text-gray-400 fw-bold">
                                                        100 Pages
                                                    </div>
                                                </div>
                                                <!--end::Title-->
                                                <!--begin::Label-->
                                                <div class="d-flex align-items-center">
                                                    <div class="fw-bolder fs-4 text-gray-800 pe-1">
                                                        KES. 7,300.00
                                                    </div>
                                                    <a href="#" class="btn btn-icon btn-sm me-n2">
                                                        <!--begin::Svg Icon | path: icons/stockholm/Navigation/Right-2.svg-->
                                                        <span class="svg-icon svg-icon-4 svg-icon-gray-400">
                                                            <i class="bi bi-chevron-right"></i>
                                                        </span>
                                                        <!--end::Svg Icon-->
                                                    </a>
                                                </div>
                                                <!--end::Label-->
                                            </div>
                                            <!--end::Description-->
                                        </div> --}}
                                        <!--end::Item-->
                                    </div>
                                    <!--end::Items-->
                                </div>
                                <!--end::Body-->
                            </div>
                            <!--end::Engage Widget 1-->
                        </div>
                        <!--end::Col-->
                        @elseif($centerView=='revisions')
                        @livewire('admin.components.center-view')
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
                                {{ $pending_orders->links('components.pagination-links') }}
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
                                            <span class="card-label fw-boldest text-gray-800 fs-2">Cancelled Orders</span>
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

                                                        <td colspan="6" class="pe-0 text-end italic text-center" >
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
                                {{ $cancled->links('components.pagination-links') }}
                            </div>
                            <!--end::Col-->
                        </div>
                        @elseif($centerView == 'In Progress')
                        <div class="row g-5 gx-xxl-8 mb-xxl-3">
                            <!--begin::Col-->
                            <div class="col-xxl-12">
                                <!--begin::Table widget 1-->
                                <div class="card card-xxl-stretch mb-5 mb-xl-3">
                                    <!--begin::Header-->
                                    <div class="card-header border-0 pt-5 pb-3">
                                        <!--begin::Heading-->
                                        <h3 class="card-title align-items-start flex-column">
                                            <span class="card-label fw-boldest text-gray-800 fs-2">Orders In Progress</span>
                                            <span class="text-gray-400 fw-bold mt-2 fs-6">{{count($progress_orders)}}
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
                                                        <th class="min-w-125px">Deadline</th>
                                                        <th class="min-w-180px">Order ID</th>
                                                        <th class="min-w-125px">Details</th>
                                                        <th class="min-w-125px">Price</th>
                                                        <th class="min-w-120px">Progress</th>
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
                                                                        class="text-gray-500  fs-5  mb-1">{!!
                                                                        htmlspecialchars_decode(date('j<\s\up>S
                                                                        </\s\up> F Y',
                                                                        strtotime($progress_order->created_at))) !!}
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td class="p-0">
                                                            <div class="d-flex align-items-center">
                                                                <div class="ps-3">
                                                                    <a href="#"
                                                                        class="text-gray-400 mb-1">{{$progress_order->order->order_no}}
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td class="p-0">
                                                            <div class="d-flex align-items-center">
                                                                <div class="ps-3">
                                                                    <a href="#"
                                                                        class="text-gray-400 mb-1">{{$progress_order->order->topic}}
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
                                                                        class="text-gray-400 mb-1">$ {{$progress_order->amount}}
                                                                    </a>
                                                                </div>
                                                            </div>
                                                            {{-- <span class="text-gray-400 fw-bold">
                                                                Darknight transparency 36 Icons Pack</span> --}}
                                                        </td>
                                                        <td>
                                                            <div class="d-flex flex-column w-100 me-2 mt-2">

                                                                @if ($progress_order->order->status=='In progress')
                                                                <span
                                                                    wire:class="text-gray-400 me-2 fw-boldest mb-2">85%</span>
                                                                <div class="progress bg-light-info w-100 h-5px">
                                                                    <div class="progress-bar bg-info"
                                                                        role="progressbar" style="width: 85%"></div>
                                                                </div>

                                                                @endif
                                                            </div>
                                                        </td>
                                                        <td class="pe-0 text-start">
                                                            <a class="btn btn-light text-muted fw-boldest text-hover-primary btn-sm px-5"
                                                                x-on:click="$wire.chat('{{$progress_order->order->order_no}}')">View</a>
                                                            @if ($progress_order->order->publish == 0)
                                                            <a class="btn btn-light text-muted fw-boldest text-hover-primary btn-sm px-5"
                                                            x-data="{}" x-on:click="$dispatch('dlg-modal');$wire.publishOrder({{$progress_order->order->id}}, '{{$progress_order->amount}}')">Publish Order</a>
                                                            @endif
                                                            <a class="btn btn-light text-muted fw-boldest text-hover-primary btn-sm px-5"
                                                                x-on:click="$wire.bids('{{$progress_order->order->id}}')">View Bids</a>
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
                                            <div x-data="{isDlgModal:false}" :class="{ 'block': isDlgModal, 'hidden': !isDlgModal }"
                                            class="hidden" x-on:dlg-modal.window="isDlgModal = !isDlgModal"
                                            @click.away="isDlgModal = false">
                                            @include('livewire.general.global-modal')
                                        </div>
                                        </div>
                                        <!--end::Table-->
                                    </div>
                                    <!--end::Body-->
                                </div>
                                <!--end::Table widget 1-->
                                {{ $active->links('components.pagination-links') }}
                            </div>
                            <!--end::Col-->
                        </div>
                        @elseif($centerView == 'Completed')
                        <div class="row g-5 gx-xxl-8 mb-xxl-3">
                            <!--begin::Col-->
                            <div class="col-xxl-12">
                                <!--begin::Table widget 1-->
                                <div class="card card-xxl-stretch mb-5 mb-xl-3">
                                    <!--begin::Header-->
                                    <div class="card-header border-0 pt-5 pb-3">
                                        <!--begin::Heading-->
                                        <h3 class="card-title align-items-start flex-column">
                                            <span class="card-label fw-boldest text-gray-800 fs-2">Completed Orders</span>
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
                                                    @foreach ($complete as $done)
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
                                                                        strtotime($done->created_at))) !!}
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td class="p-0">
                                                            <div class="d-flex align-items-center">
                                                                <div class="ps-3">
                                                                    <a href="#"
                                                                        class="text-gray-400 mb-1">{{$done->order_no}}
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td class="p-0">
                                                            <div class="d-flex align-items-center">
                                                                <div class="ps-3">
                                                                    <a href="#"
                                                                        class="text-gray-400 mb-1">{{$done->topic}}
                                                                    </a>
                                                                </div>
                                                            </div>
                                                            {{-- <span class="text-gray-400 fw-bold">
                                                                Darknight transparency 36 Icons Pack</span> --}}
                                                        </td>
                                                        <td>
                                                            <div class="d-flex flex-column w-100 me-2 mt-2">

                                                                @if ($done->status=='Complete')
                                                                <span
                                                                    wire:class="text-gray-400 me-2 fw-boldest mb-2">100%</span>
                                                                <div class="progress bg-light-info w-100 h-5px">
                                                                    <div class="progress-bar bg-success"
                                                                        role="progressbar" style="width: 100%"></div>
                                                                </div>

                                                                @endif
                                                            </div>
                                                        </td>
                                                        <td class="pe-0 text-end">
                                                            <a class="btn btn-light text-muted fw-boldest text-hover-primary btn-sm px-5"
                                                                x-on:click="$wire.chat('{{$done->order_no}}')">View</a>
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                    @else
                                                    <tr>
                                                        <td colspan="6" class="pe-0 text-end italic text-center" >
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
                        @elseif($centerView == 'ongoing revisions')
                        @livewire('admin.components.center-view')
                        @elseif($centerView == 'done revisions')
                        @livewire('admin.components.center-view')
                        @elseif($centerView == 'bidders')
                        @livewire('admin.order.order-bids')
                        @elseif($centerView == 'bid-details')
                        @livewire('admin.order.bid-details')
                        @endif

                </div>
                <!--end::Row-->
                <!--end::Row-->
            </div>
            <!--end::Container-->
        </div>
        <!--end::Post-->
    </div>
    @elseif($varView=='jobs')
    @livewire('admin.job')
    @elseif($varView == 'chat')
    @livewire('client.chat-order-summary')
    @endif
    <!--end::Content-->
</div>
<style>
 .card{

 }
</style>
