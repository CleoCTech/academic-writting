<div>
    {{-- In work, do what you enjoy. --}}
    <div wire:loading>
        @livewire('general.loader')
    </div>
    <div class="content fs-6 d-flex flex-column flex-column-fluid" id="kt_content">
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
    </div>
</div>
