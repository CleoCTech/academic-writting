<div>
    {{-- Do your work, then step back. --}}
    @if($currentView == 'revisions')
    <div class="row g-5 gx-xxl-8 mb-xxl-3">
        <!--begin::Col-->
        <div class="col-xxl-12">
            <!--begin::Table widget 1-->
            <div class="card card-xxl-stretch mb-5 mb-xl-3">
                <!--begin::Header-->
                <div class="card-header border-0 pt-5 pb-3">
                    <!--begin::Heading-->
                    <h3 class="card-title align-items-start flex-column">
                        <span class="card-label fw-boldest text-gray-800 fs-2">Revisions</span>
                        <span class="text-gray-400 fw-bold mt-2 fs-6">{{count($items)}}
                            Revisions</span>
                    </h3>
                    <!--end::Heading-->
                    <!--begin::Toolbar-->
                    <div class="card-toolbar">
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
                                @if (count($items) > 0)

                                @foreach ($items as $item)
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
                                                    class="text-gray-500  fs-5  mb-1">{!! htmlspecialchars_decode(date('j<\s\up>S</\s\up> F Y', strtotime($item->created_at))) !!}
                                                </a>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="p-0">
                                        <div class="d-flex align-items-center">
                                            <div class="ps-3">
                                                <a href="#"
                                                    class="text-gray-400 mb-1">{{$item->order->order_no}}
                                                </a>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="p-0">
                                        <div class="d-flex align-items-center">
                                            <div class="ps-3">
                                                <a href="#" class="text-gray-400 mb-1">{{$item->comment}}
                                                </a>
                                            </div>
                                        </div>
                                        {{-- <span class="text-gray-400 fw-bold">
                                            Darknight transparency 36 Icons Pack</span> --}}
                                    </td>
                                    <td>
                                        <div class="d-flex flex-column w-100 me-2 mt-2">

                                              @if ($item->status=='In progress')
                                                <span wire:class="text-gray-400 me-2 fw-boldest mb-2">85%</span>
                                                <div class="progress bg-light-info w-100 h-5px">
                                                    <div class="progress-bar bg-info"
                                                        role="progressbar" style="width: 85%"></div>
                                                </div>
                                              @elseif($item->status=='Pending')
                                              <span wire:class="text-gray-400 me-2 fw-boldest mb-2">0%</span>
                                                <div class="progress bg-light-secondary w-100 h-5px">
                                                    <div class="progress-bar bg-info"
                                                        role="progressbar" style="width: 0%"></div>
                                                </div>
                                              @elseif($item->status=='Complete')
                                              <span class="text-gray-400 me-2 fw-boldest mb-2">100%</span>
                                              <div class="progress bg-light-primary w-100 h-5px">
                                                <div class="progress-bar bg-primary"
                                                    role="progressbar" style="width: 100%"></div>
                                                </div>
                                              @endif
                                        </div>
                                    </td>
                                    <td class="pe-0 text-end">
                                        <a  class="btn btn-light text-muted fw-boldest text-hover-primary btn-sm px-5" x-on:click="$wire.chat('{{$item->order->order_no}}')">View</a>
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
            {{ $items->links('components.pagination-links') }}
        </div>
        <!--end::Col-->
    </div>
    @elseif ($currentView=='done revisions')
    <div class="row g-5 gx-xxl-8 mb-xxl-3">
        <!--begin::Col-->
        <div class="col-xxl-12">
            <!--begin::Table widget 1-->
            <div class="card card-xxl-stretch mb-5 mb-xl-3">
                <!--begin::Header-->
                <div class="card-header border-0 pt-5 pb-3">
                    <!--begin::Heading-->
                    <h3 class="card-title align-items-start flex-column">
                        <span class="card-label fw-boldest text-gray-800 fs-2">Revisions</span>
                        <span class="text-gray-400 fw-bold mt-2 fs-6">{{count($items)}}
                            Revisions</span>
                    </h3>
                    <!--end::Heading-->
                    <!--begin::Toolbar-->
                    <div class="card-toolbar">
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
                                @if (count($items) > 0)
                                @foreach ($items as $item)
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
                                                    class="text-gray-500  fs-5  mb-1">{!! htmlspecialchars_decode(date('j<\s\up>S</\s\up> F Y', strtotime($item->created_at))) !!}
                                                </a>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="p-0">
                                        <div class="d-flex align-items-center">
                                            <div class="ps-3">
                                                <a href="#"
                                                    class="text-gray-400 mb-1">{{$item->order->order_no}}
                                                </a>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="p-0">
                                        <div class="d-flex align-items-center">
                                            <div class="ps-3">
                                                <a href="#" class="text-gray-400 mb-1">{{$item->comment}}
                                                </a>
                                            </div>
                                        </div>
                                        {{-- <span class="text-gray-400 fw-bold">
                                            Darknight transparency 36 Icons Pack</span> --}}
                                    </td>
                                    <td>
                                        <div class="d-flex flex-column w-100 me-2 mt-2">

                                              <span class="text-gray-400 me-2 fw-boldest mb-2">100%</span>
                                              <div class="progress bg-light-primary w-100 h-5px">
                                                <div class="progress-bar bg-primary"
                                                    role="progressbar" style="width: 100%"></div>
                                                </div>
                                        </div>
                                    </td>
                                    <td class="pe-0 text-end">
                                        <a  class="btn btn-light text-muted fw-boldest text-hover-primary btn-sm px-5" x-on:click="$wire.chat('{{$item->order->order_no}}')">View</a>
                                    </td>
                                </tr>
                                @endforeach
                                @else
                                <tr>
                                    <td colspan="5" class="pe-0 text-end italic text-center" >
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
            {{ $items->links('components.pagination-links') }}
        </div>
        <!--end::Col-->
    </div>
    @elseif ($currentView=='ongoing revisions')
    <div class="row g-5 gx-xxl-8 mb-xxl-3">
        <!--begin::Col-->
        <div class="col-xxl-12">
            <!--begin::Table widget 1-->
            <div class="card card-xxl-stretch mb-5 mb-xl-3">
                <!--begin::Header-->
                <div class="card-header border-0 pt-5 pb-3">
                    <!--begin::Heading-->
                    <h3 class="card-title align-items-start flex-column">
                        <span class="card-label fw-boldest text-gray-800 fs-2">Revisions</span>
                        <span class="text-gray-400 fw-bold mt-2 fs-6">{{count($items)}}
                            Revisions</span>
                    </h3>
                    <!--end::Heading-->
                    <!--begin::Toolbar-->
                    <div class="card-toolbar">
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
                                    <th class="text-start pe-2 min-w-120px">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (count($items) > 0)
                                @foreach ($items as $item)
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
                                                    class="text-gray-500  fs-5  mb-1">{!! htmlspecialchars_decode(date('j<\s\up>S</\s\up> F Y', strtotime($item->created_at))) !!}
                                                </a>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="p-0">
                                        <div class="d-flex align-items-center">
                                            <div class="ps-3">
                                                <a href="#"
                                                    class="text-gray-400 mb-1">{{$item->order->order_no}}
                                                </a>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="p-0">
                                        <div class="d-flex align-items-center">
                                            <div class="ps-3">
                                                <a href="#" class="text-gray-400 mb-1">{{$item->comment}}
                                                </a>
                                            </div>
                                        </div>
                                        {{-- <span class="text-gray-400 fw-bold">
                                            Darknight transparency 36 Icons Pack</span> --}}
                                    </td>
                                    <td>
                                        <div class="d-flex flex-column w-100 me-2 mt-2">

                                              <span class="text-gray-400 me-2 fw-boldest mb-2">100%</span>
                                              <div class="progress bg-light-primary w-100 h-5px">
                                                <div class="progress-bar bg-primary"
                                                    role="progressbar" style="width: 100%"></div>
                                                </div>
                                        </div>
                                    </td>
                                    <td class="pe-0 text-start">
                                        <a  class="btn btn-light text-muted fw-boldest text-hover-primary btn-sm px-5" x-on:click="$wire.chat('{{$item->order->order_no}}')">View</a>
                                        <a  class="btn btn-light text-muted fw-boldest text-hover-primary btn-sm px-5" x-on:click="$wire.chat('{{$item->order->order_no}}')">View</a>
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
            {{ $items->links('components.pagination-links') }}
        </div>
        <!--end::Col-->
    </div>
    @elseif ($currentView=='applications')
        <div class="">
            <h2>Applications</h2>
        </div>
    @endif
</div>
