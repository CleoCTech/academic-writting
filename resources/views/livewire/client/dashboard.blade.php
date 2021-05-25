<div>
    {{-- To attain knowledge, add things every day; To attain wisdom, subtract things every day --}}

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
        <!--begin::Post-->
        <div class="post fs-6 d-flex flex-column-fluid" id="kt_post">
            <!--begin::Container-->
            <div class="container">
                <!--begin::Row-->
                <div class="row g-xl-8">
                    <!--begin::Col-->
                    <div class="col-xxl-8">
                        <!--begin::Row-->
                        <div class="g-xl-8">
                            <!--begin::Row-->
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
                                                    id="kt_table_widget_1"  x-data=''>
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
                                                                        value="1"  x-on:click="$wire.select('{{$pending_order[$keyCol]}}')"
                                                                        {{$isSelectAll? 'checked':''}}/>
                                                                </div>
                                                            </td>
                                                            @foreach($cols as $col)
                                                            @if($col['isList'] == true)
                                                            @if(isset($col['isKey']))
                                                            <td class="p-0" x-on:click="$wire.view('{{$pending_order[$keyCol]}}')">
                                                                <div class="d-flex align-items-center">
                                                                    <div class="ps-3">
                                                                        <a href="#"
                                                                            class="text-gray-400 mb-1" >{{$pending_order[$col['colName']]}}
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
                                                                            class="text-gray-500  fs-5  mb-1">{!! htmlspecialchars_decode(date('j<\s\up>S</\s\up> F Y', strtotime($pending_order[$col['colName']]))) !!}
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            @elseif(isset($col['isRelationship']) && $col['isRelationship'] == true)
                                                            <td class="p-0">
                                                                <div class="d-flex align-items-center">
                                                                    <div class="ps-3">
                                                                        <a href="#" class="text-gray-400 mb-1"> {{$pending_order[$col['relName']][$col['colName']]}}
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
                                                                        <a href="#" class="text-gray-400 mb-1"> {{$pending_order[$col['colName']]}}
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            @endif
                                                            @endif
                                                            @endif
                                                            @endforeach

                                                            <td class="pe-0 text-end">
                                                                <a  class="btn btn-light text-muted fw-boldest text-hover-primary btn-sm px-5" x-on:click="$wire.chat('{{$pending_order[$keyCol]}}')">View</a>
                                                            </td>
                                                        </tr>
                                                        @endforeach
                                                        @else
                                                        <tr>
                                                            <td class="italic text-center" colspan="{{count($cols)}}"><br>*** No records
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
                            <!--begin::Row-->
                            <div class="row g-5 gx-xxl-8 mb-xxl-3">
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
                                                    Orders</span>
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
                                                    id="kt_table_widget_1">
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
                                                            <th class="min-w-200px">Date</th>
                                                            <th class="min-w-200px">Order ID</th>
                                                            <th class="min-w-125px">Details</th>
                                                            <th class="min-w-125px">Progress</th>
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
                                                                            class="text-gray-500  fs-5  mb-1">{!! htmlspecialchars_decode(date('j<\s\up>S</\s\up> F Y', strtotime($other->created_at))) !!}
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
                                                                        <a href="#" class="text-gray-400 mb-1">{{$other->topic}}
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                                {{-- <span class="text-gray-400 fw-bold">
                                                                    Darknight transparency 36 Icons Pack</span> --}}
                                                            </td>
                                                            <td>
                                                                <div class="d-flex flex-column w-100 me-2 mt-2">

                                                                      @if ($other->status=='In progress')
                                                                        <span wire:class="text-gray-400 me-2 fw-boldest mb-2">85%</span>
                                                                        <div class="progress bg-light-info w-100 h-5px">
                                                                            <div class="progress-bar bg-info"
                                                                                role="progressbar" style="width: 85%"></div>
                                                                        </div>
                                                                      @elseif($other->status=='Complete')
                                                                      <span class="text-gray-400 me-2 fw-boldest mb-2">100%</span>
                                                                      <div class="progress bg-light-primary w-100 h-5px">
                                                                        <div class="progress-bar bg-primary"
                                                                            role="progressbar" style="width: 100%"></div>
                                                                        </div>
                                                                      @endif
                                                                </div>
                                                            </td>
                                                            <td class="pe-0 text-end">
                                                                <a href="#"
                                                                    class="btn btn-light text-muted fw-boldest text-hover-primary btn-sm px-5">View</a>
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
                                </div>
                                <!--end::Col-->
                            </div>
                            <!--end::Row-->
                        </div>
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
                                                <span class="fs-4 text-gray-400 fw-boldest pe-2">Current
                                                    Jobs</span>
                                                <!--begin::Carousel Indicators-->
                                                <ol class="p-0 m-0 carousel-indicators carousel-indicators-dots">
                                                    <li data-bs-target="#kt_stats_widget_8_carousel"
                                                        data-bs-slide-to="0" class="ms-1 active"></li>
                                                    <li data-bs-target="#kt_stats_widget_8_carousel"
                                                        data-bs-slide-to="1" class="ms-1"></li>
                                                    <li data-bs-target="#kt_stats_widget_8_carousel"
                                                        data-bs-slide-to="2" class="ms-1"></li>
                                                    <li data-bs-target="#kt_stats_widget_8_carousel"
                                                        data-bs-slide-to="3" class="ms-1"></li>
                                                </ol>
                                                <!--end::Carousel Indicators-->
                                            </div>
                                            <!--end::Heading-->
                                            <!--begin::Carousel-->
                                            <div class="carousel-inner pt-6">
                                                <!--begin::Item-->
                                                <div class="carousel-item active">
                                                    <div class="carousel-wrapper">
                                                        <div
                                                            class="d-flex flex-column justify-content-between flex-grow-1">
                                                            <a href=""
                                                                class="fs-2 text-gray-800 text-hover-primary fw-boldest">Marlin
                                                                Marvin</a>
                                                            <p class="text-gray-600 fs-6 fw-bold pt-4 mb-0">
                                                                Write an essay about blahblahblah Lorem
                                                                ipsum, dolor sit amet consectetur
                                                            </p>
                                                        </div>
                                                        <!--begin::Info-->
                                                        <div class="d-flex flex-stack pt-8">
                                                            <span
                                                                class="badge badge-light-primary fs-7 fw-boldest me-2">2hrs
                                                                Ago</span>
                                                        </div>
                                                        <!--end::Info-->
                                                    </div>
                                                </div>
                                                <!--end::Item-->
                                                <!--begin::Item-->
                                                <div class="carousel-item">
                                                    <div class="carousel-wrapper">
                                                        <!--begin::Title-->
                                                        <div
                                                            class="d-flex flex-column justify-content-between flex-grow-1">
                                                            <a href=""
                                                                class="fs-2 text-gray-800 text-hover-primary fw-boldest">Achi
                                                                Van</a>
                                                            <p class="text-gray-600 fs-6 fw-bold pt-4 mb-0">
                                                                Write an essay about blahblahblah Lorem
                                                                ipsum, dolor sit amet
                                                            </p>
                                                        </div>
                                                        <!--end::Title-->
                                                        <!--begin::Info-->
                                                        <div class="d-flex flex-stack pt-8">
                                                            <span
                                                                class="badge badge-light-primary fs-7 fw-boldest me-2">5hrs
                                                                Ago</span>
                                                        </div>
                                                        <!--end::Info-->
                                                    </div>
                                                </div>
                                                <!--end::Item-->
                                                <!--begin::Item-->
                                                <div class="carousel-item">
                                                    <div class="carousel-wrapper">
                                                        <!--begin::Title-->
                                                        <div
                                                            class="d-flex flex-column justify-content-between flex-grow-1">
                                                            <a href=""
                                                                class="fs-2 text-gray-800 text-hover-primary fw-boldest">Sin
                                                                Gau</a>
                                                            <p class="text-gray-600 fs-6 fw-bold pt-4 mb-0">
                                                                To start a blog, think of a topic about
                                                                and first brainstorm ways to write
                                                                details
                                                            </p>
                                                        </div>
                                                        <!--end::Title-->
                                                        <!--begin::Info-->
                                                        <div class="d-flex flex-stack pt-8">
                                                            <span
                                                                class="badge badge-light-primary fs-7 fw-boldest me-2">2hrs
                                                                Ago</span>
                                                        </div>
                                                        <!--end::Info-->
                                                    </div>
                                                </div>
                                                <!--end::Item-->
                                                <!--begin::Item-->
                                                <div class="carousel-item">
                                                    <div class="carousel-wrapper">
                                                        <!--begin::Title-->
                                                        <div
                                                            class="d-flex flex-column justify-content-between flex-grow-1">
                                                            <a href=""
                                                                class="fs-2 text-gray-800 text-hover-primary fw-boldest">Jim
                                                                Jaun</a>
                                                            <p class="text-gray-600 fs-6 fw-bold pt-4 mb-0">
                                                                To start a blog, think of a topic about
                                                                and first brainstorm ways to write
                                                                details
                                                            </p>
                                                        </div>
                                                        <!--end::Title-->
                                                        <!--begin::Info-->
                                                        <div class="d-flex flex-stack pt-8">
                                                            <span
                                                                class="badge badge-light-primary fs-7 fw-boldest me-2">10hrs
                                                                Ago</span>
                                                        </div>
                                                        <!--end::Info-->
                                                    </div>
                                                </div>
                                                <!--end::Item-->
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
                                                <span class="text-gray-400 fw-bold fs-6">April 8 - May
                                                    5</span>
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
                                        <div class="fs-2hx fw-boldest">237</div>
                                        <div class="fs-4 fw-bold text-gray-400 mb-7">
                                            Active Projects
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
                                                        30
                                                    </div>
                                                </div>
                                                <!--end::Label-->
                                                <!--begin::Label-->
                                                <div class="d-flex fs-6 fw-bold align-items-center mb-3">
                                                    <div class="bullet bg-success me-3"></div>
                                                    <div class="text-gray-400">Completed</div>
                                                    <div class="ms-auto fw-boldest text-gray-700">
                                                        45
                                                    </div>
                                                </div>
                                                <!--end::Label-->
                                                <!--begin::Label-->
                                                <div class="d-flex fs-6 fw-bold align-items-center">
                                                    <div class="bullet bg-gray-300 me-3"></div>
                                                    <div class="text-gray-400">Yet to start</div>
                                                    <div class="ms-auto fw-boldest text-gray-700">
                                                        25
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
                                        <span class="fw-boldest fs-2hx d-block mt-n1">KES.
                                            37,562.00</span>
                                    </div>
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
                                                <a href="#"
                                                    class="fs-4 text-gray-800 text-hover-primary fw-boldest">Essay
                                                    Globe</a>
                                                <div class="text-gray-400 fw-bold">
                                                    508 Pages
                                                </div>
                                            </div>
                                            <!--end::Title-->
                                            <!--begin::Label-->
                                            <div class="d-flex align-items-center">
                                                <div class="fw-bolder fs-4 text-gray-800 pe-1">
                                                    KES. 2,000.00
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
                                                <a href="#"
                                                    class="fs-4 text-gray-800 text-hover-primary fw-boldest">Essay
                                                    Focus</a>
                                                <div class="text-gray-400 fw-bold">
                                                    957 Pages
                                                </div>
                                            </div>
                                            <!--end::Title-->
                                            <!--begin::Label-->
                                            <div class="d-flex align-items-center">
                                                <div class="fw-bolder fs-4 text-gray-800 pe-1">
                                                    KES. 4,700.00
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
                                                <a href="#"
                                                    class="fs-4 text-gray-800 text-hover-primary fw-boldest">Essay
                                                    Timing</a>
                                                <div class="text-gray-400 fw-bold">
                                                    82 Pages
                                                </div>
                                            </div>
                                            <!--end::Title-->
                                            <!--begin::Label-->
                                            <div class="d-flex align-items-center">
                                                <div class="fw-bolder fs-4 text-gray-800 pe-1">
                                                    KES. 4,254.00
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
                                    <div class="d-flex align-items-center mb-">
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
                                    </div>
                                    <!--end::Item-->
                                </div>
                                <!--end::Items-->
                            </div>
                            <!--end::Body-->
                        </div>
                        <!--end::Engage Widget 1-->
                    </div>
                    <!--end::Col-->
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
    @endif

</div>
