<div>
    {{-- If you look to others for fulfillment, you will never truly be fulfilled. --}}
    <div wire:loading>
        @livewire('general.loader')
    </div>
    <div class="row g-5 gx-xxl-8 mb-xxl-3 mt-4">
        <!--begin::Col-->
        <div class="col-xxl-12">
            <!--begin::Table widget 1-->
            <div class="card card-xxl-stretch mb-5 mb-xl-3">
                <div class="mt-2">
                    <div class="grid grid-cols-2 pl-8 fw-bold text-gray-800 fs-2">
                        <div class="">
                            Order ID:
                        </div>
                        <div class="" style="margin-left: -25rem">
                            {{$orderDetails->order_no}}
                        </div>
                    </div>
                    <div class="grid grid-cols-2 pl-8 fw-bold text-gray-800 fs-2">
                        <div class="">
                            Topic:
                        </div>
                        <div class="" style="margin-left: -25rem">
                            {{$orderDetails->topic}}
                        </div>
                    </div>
                    <div class="grid grid-cols-2 pl-8 fw-bold text-gray-800 fs-2">
                        <div class="">
                            Price:
                        </div>
                        <div class="" style="margin-left: -25rem">
                           $ {{$orderDetails->bill->proposed_resell_price}}
                        </div>
                    </div>
                </div>

                <!--begin::Header-->
                <div class="card-header border-0 pt-5 pb-3">
                    <div class="flex flex-wrap mt-12 justify-start">
                        <div class="grid grid-cols-1 ">
                                    <!--begin::Heading-->
                            <h3 class="card-title align-items-start flex-column">
                                <span class="card-label fw-boldest text-gray-800 fs-2">Bidders</span>
                                <span class="text-gray-400 fw-bold mt-2 fs-6">{{count($bidders)}}
                                    Bidders(s)</span>
                            </h3>
                            <!--end::Heading-->
                        </div>
                    </div>
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
                                    <th class="min-w-180px">Message</th>
                                    <th class="min-w-125px">Price</th>
                                    <th class="min-w-120px">Writer</th>
                                    <th class="text-start pe-2 min-w-70px">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (count($bidders) > 0)
                                @foreach ($bidders as $bidder)
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
                                                    strtotime($bidder->created_at))) !!}
                                                </a>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="p-0">
                                        <div class="d-flex align-items-center">
                                            <div class="ps-3">
                                                <a href="#"
                                                    class="text-gray-400 mb-1">{{$bidder->bid}}
                                                </a>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="p-0">
                                        <div class="d-flex align-items-center">
                                            <div class="ps-3">
                                                <a href="#"
                                                    class="text-green-400 mb-1">$ {{$bidder->price}}
                                                </a>
                                            </div>
                                        </div>
                                    </td>

                                    <td class="p-0">
                                        <div class="d-flex align-items-center">
                                            <div class="ps-3">
                                                <a href="#"
                                                    class="text-gray-400 mb-1"> {{$bidder->writer->firstname}}
                                                </a>
                                                <span>📶</span>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="pe-0 text-start">

                                        <a class="btn btn-light text-muted fw-bold text-hover-primary btn-sm px-5"
                                            x-on:click="$wire.bidDetails('{{$bidder->order_id}}')">View Bid</a>
                                        <a class="btn btn-light text-muted fw-bold text-hover-primary btn-sm px-5"
                                            x-on:click="$wire.award('{{$bidder->id}}')">Award</a>
                                    </td>
                                </tr>
                                @endforeach
                                @else
                                <tr>
                                    <td class="pe-0 text-end italic text-center"> <br>*** No records found ***</td>
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
        </div>
        <!--end::Col-->
    </div>
</div>
