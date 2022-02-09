<div>
    {{-- If your happiness depends on money, you will never be happy with yourself. --}}
    <div wire:loading>
        @livewire('general.loader')
    </div>
    <div class="row g-5 gx-xxl-8 mb-xxl-3 mt-4">
        @if ( session()->has('success') )
        <div class="flex justify-center items-center m-1 font-medium py-1 px-2 bg-white rounded-md text-green-700 bg-green-25rem0 border border-green-300 ">
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
        <div class="flex justify-center items-center m-1 font-medium py-1 px-2 bg-white rounded-md text-red-700 bg-red-25rem0 border border-red-300 ">
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
        <!--begin::Col-->
        <div class="col-xxl-12">
            <!--begin::Table widget 1-->
            <div  class="card card-xxl-stretch mb-5 mb-xl-3">
                @if ( $orderDetails != '' )
                <div class="mt-2">
                    <div class="grid grid-cols-2 pl-8 fw-bold text-gray-800 fs-2 border-b-2 border-blue-200">
                        <div class=" muted text-primary">
                            Order ID:
                        </div>
                        <div class="" style="margin-left: -25rem">
                            {{$orderDetails[0]->order_no}}
                        </div>
                    </div>
                    <div class="grid grid-cols-2 pl-8 fw-bold text-gray-800 fs-2 border-b-2 border-blue-200">
                        <div class=" muted text-primary">
                            Price:
                        </div>
                        <div class="" style="margin-left: -25rem">
                            <label for="" class="text-green-400 pr-1"> ${{$orderDetails[0]->price}}</label> against
                            <span><label for="" class="text-green-400">${{$orderDetails[0]->proposed_resell_price}}</label></span>
                        </div>
                    </div>
                    <div class="grid grid-cols-2 pl-8 fw-bold text-gray-800 fs-2 border-b-2 border-blue-200">
                        <div class="muted text-primary">
                            Bid:
                        </div>
                        <div class="text-md-start text-gray-800 " style="margin-left: -25rem">
                            {{$orderDetails[0]->bid}}
                        </div>
                    </div>
                    <div class="grid grid-cols-2 pl-8 fw-bold text-gray-800 fs-2 border-b-2 border-blue-200">
                        <div class=" muted text-primary">
                            Writer's Summary:
                        </div>
                        <div class="" style="margin-left: -25rem">

                        </div>
                        <div class="muted text-primary" style="margin-left: 1rem">
                          <p class="text-primary -mb-7 italic fs-4" >=>Name : {{$orderDetails[0]->firstname}} </p> <br>
                          <p class="text-primary -mb-7 italic fs-4" >=>Orders Completed: {{$ordersCompleted}}</p> <br>
                          <p class="text-primary -mb-7 italic fs-4" >=>Orders Rejected: {{$revisions}}</p> <br>
                        </div>
                    </div>
                </div>
                @else
                    <h3 class="card-title align-items-start flex-column">
                        <span class="card-label fw-boldest text-gray-800 fs-2">No details</span>
                    </h3>
                @endif


                <!--begin::Header-->
                <div class="card-header border-0 pt-5 pb-3">
                    <div class="flex flex-wrap mt-12 justify-start">
                        <div class="grid grid-cols-1 ">
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
                            <button wire:click="award({{ $orderDetails[0]->price }}, '{{ $orderDetails[0]->writer_id }}')"
                                class=" btn-primary transition duration-150 ease-in-out transform hover:scale-110 bg-emerald-600 text-white font-semibold py-3 px-6 rounded-md">
                                Award
                            </button>
                            {{-- <a class="btn btn-light text-muted fw-bold text-hover-primary btn-sm px-5"
                                            x-on:click="$wire.award('{{$bidder->id}}')">Award</a> --}}
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
