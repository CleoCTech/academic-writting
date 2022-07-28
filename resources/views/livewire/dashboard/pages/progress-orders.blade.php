<div>

    @livewire('dashboard.components.top-bar', ['user_id' => session()->get('LoggedClient'), 'user_type' =>
    'App\Models\Client', 'activity' => ''])
    <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">
            Orders In Progress
        </h2>
        <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
            {{-- <button wire:click='back' class="btn btn-primary shadow-md mr-2">Back</button> --}}
            <button wire:click="back" wire.target="back" type="button"
                class="btn btn-lg btn-primary inline-flex items-center px-4 py-2 border border-transparent text-base leading-6 font-medium rounded-md hover:bg-blue-300 ease-in-out duration-150 "
                wire:loading.class="cursor-not-allowed" wire:loading.attr="disabled">
                <svg wire.loading wire.target="back" class="hidden animate-spin -ml-1 mr-3 h-5 w-5 text-white"
                    wire:loading.class.remove="hidden" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 24 24">
                    <circle wire:loading wire:target="back" class="opacity-25" cx="12" cy="12" r="10"
                        stroke="currentColor" stroke-width="4"></circle>
                    <path wire:loading wire:target="back" class="opacity-75" fill="currentColor"
                        d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                    </path>
                </svg>
                Back
            </button>
            <div class="dropdown ml-auto sm:ml-0">
                <button class="dropdown-toggle btn px-2 box text-gray-700 dark:text-gray-300" aria-expanded="false">
                    <span class="w-5 h-5 flex items-center justify-center"> <i class="w-4 h-4" data-feather="plus"></i>
                    </span>
                </button>
                <div class="dropdown-menu w-40">
                    <div class="dropdown-menu__content box dark:bg-dark-1 p-2">
                        <a href=""
                            class="flex items-center block p-2 transition duration-300 ease-in-out bg-white dark:bg-dark-1 hover:bg-gray-200 dark:hover:bg-dark-2 rounded-md">
                            <i data-feather="users" class="w-4 h-4 mr-2"></i> Create Group </a>
                        <a href=""
                            class="flex items-center block p-2 transition duration-300 ease-in-out bg-white dark:bg-dark-1 hover:bg-gray-200 dark:hover:bg-dark-2 rounded-md">
                            <i data-feather="settings" class="w-4 h-4 mr-2"></i> Settings </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="intro-y box p-5 mt-5">
        <div class="flex flex-col sm:flex-row sm:items-end xl:items-start">
            <form id="tabulator-html-filter-form" class="xl:flex sm:mr-auto">
                <div class="sm:flex items-center sm:mr-4">
                    {{-- <label class="w-12 flex-none xl:w-auto xl:flex-initial mr-2">Field</label> --}}
                    <select id="tabulator-html-filter-field"
                        class="form-select w-full sm:w-32 2xl:w-full mt-2 sm:mt-0 sm:w-auto">
                        <option value="All">All</option>
                        <option value="active">In Progress</option>
                        <option value="completed">Completed</option>
                    </select>
                </div>

                <div class="sm:flex items-center sm:mr-4 mt-2 xl:mt-0">
                    <label class="w-12 flex-none xl:w-auto xl:flex-initial mr-2">Value</label>
                    <input id="tabulator-html-filter-value" type="text"
                        class="form-control sm:w-40 2xl:w-full mt-2 sm:mt-0" placeholder="Search...">
                </div>
                <div class="mt-2 xl:mt-0">
                    <button id="tabulator-html-filter-go" type="button"
                        class="btn btn-primary w-full sm:w-16">Go</button>
                    <button id="tabulator-html-filter-reset" type="button"
                        class="btn btn-secondary w-full sm:w-16 mt-2 sm:mt-0 sm:ml-1">Reset</button>
                </div>
            </form>
            <div id="" class="flex mt-5 sm:mt-0">
                <button id="tabulator-print" class="btn btn-outline-secondary w-1/2 sm:w-auto mr-2"> <i
                        data-feather="printer" class="w-4 h-4 mr-2"></i> Print </button>
                <div class="dropdown w-1/2 sm:w-auto">
                    <button class="dropdown-toggle btn btn-outline-secondary w-full sm:w-auto" aria-expanded="false"> <i
                            data-feather="file-text" class="w-4 h-4 mr-2"></i> Export <i data-feather="chevron-down"
                            class="w-4 h-4 ml-auto sm:ml-2"></i> </button>
                    <div class="dropdown-menu w-40">
                        <div class="dropdown-menu__content box dark:bg-dark-1 p-2">
                            <a id="tabulator-export-csv" href="javascript:;"
                                class="flex items-center block p-2 transition duration-300 ease-in-out bg-white dark:bg-dark-1 hover:bg-gray-200 dark:hover:bg-dark-2 rounded-md">
                                <i data-feather="file-text" class="w-4 h-4 mr-2"></i> Export CSV </a>
                            <a id="tabulator-export-xlsx" href="javascript:;"
                                class="flex items-center block p-2 transition duration-300 ease-in-out bg-white dark:bg-dark-1 hover:bg-gray-200 dark:hover:bg-dark-2 rounded-md">
                                <i data-feather="file-text" class="w-4 h-4 mr-2"></i> Export XLSX </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="overflow-x-auto scrollbar-hidden">
            <div id="" class="mt-5 table-report table-report--tabulator">
                <div class="tabulator-header" style="padding-right: 0px; margin-left: 0px;">
                    <div class="tabulator-headers" style="margin-left: 0px;">

                    </div>

                </div>
                <div class="table-responsive">
                    <table class="table align-middle table-row-bordered table-row-dashed gy-5" id="kt_table_widget_1"
                        x-data=''>
                        <thead class="border-bottom border-gray-200 fs-5 fw-bold bg-light bg-opacity-75">
                            <tr>
                                <th class="w-20px ps-0">
                                    <div class="form-check form-check-sm form-check-custom form-check-solid me-5">
                                        <input class="form-check-input" type="checkbox" data-kt-check="true"
                                            data-kt-check-target="#kt_table_widget_1 .form-check-input" value="1" />
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
                            @if(count($progress_orders) > 0)
                            @foreach ($progress_orders as $other)
                            <tr>
                                <td class="p-0">
                                    <div class="form-check form-check-sm form-check-custom form-check-solid">
                                        <input class="form-check-input" type="checkbox" value="1" />
                                    </div>
                                </td>
                                <td class="p-0">
                                    <div class="d-flex align-items-center">
                                        <div class="ps-3">
                                            <a href="#" class="text-gray-500  fs-5  mb-1">{!!
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
                                            <a href="#" class="text-gray-900 mb-1">{{$other->order_no}}
                                            </a>
                                        </div>
                                    </div>
                                </td>
                                <td class="p-0">
                                    <div class="d-flex align-items-center">
                                        <div class="ps-3">
                                            <a href="#" class="text-gray-900 mb-1">{{$other->topic}}
                                            </a>
                                        </div>
                                    </div>
                                    {{-- <span class="text-gray-900 fw-bold">
                                        Darknight transparency 36 Icons Pack</span> --}}
                                </td>
                                <td>
                                    <div class="d-flex flex-column w-100 me-2 mt-2">

                                        @if ($other->status=='In progress')
                                        <span wire:class="text-gray-900 me-2 fw-boldest mb-2">85%</span>
                                        <div class="progress bg-light-info w-100 h-5px">
                                            <div class="progress-bar bg-info" role="progressbar" style="width: 85%">
                                            </div>
                                        </div>
                                        @elseif($other->status=='Complete')
                                        <span class="text-gray-900 me-2 fw-boldest mb-2">100%</span>
                                        <div class="progress bg-light-primary w-100 h-5px">
                                            <div class="progress-bar bg-primary" role="progressbar" style="width: 100%">
                                            </div>
                                        </div>
                                        @endif
                                    </div>
                                </td>
                                <td class="pe-0 text-end" wire:key="{{ $other->order_no }}">
                                    <button wire.target="chat('{{$other->order_no}}')" type="button"
                                        wire:click="chat('{{$other->order_no}}')"
                                        class="btn btn-lg btn-primary inline-flex items-center px-4 py-2 border border-transparent text-base leading-6 font-medium rounded-md hover:bg-blue-300 ease-in-out duration-150 "
                                        wire:loading.class="cursor-not-allowed" wire:loading.attr="disabled">
                                        <svg wire.loading wire.target="chat('{{$other->order_no}}')"
                                            class="hidden animate-spin -ml-1 mr-3 h-5 w-5 text-white"
                                            wire:loading.class.remove="hidden" xmlns="http://www.w3.org/2000/svg"
                                            fill="none" viewBox="0 0 24 24">
                                            <circle wire:loading wire:target="chat('{{$other->order_no}}')"
                                                class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                                                stroke-width="4"></circle>
                                            <path wire:loading wire:target="chat('{{$other->order_no}}')"
                                                class="opacity-75" fill="currentColor"
                                                d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                                            </path>
                                        </svg>
                                        View
                                    </button>
                                </td>
                            </tr>
                            @endforeach
                            @else
                            <tr>
                                <td class="italic text-center" colspan="{{count($cols)}}">
                                    <br>*** No records
                                    found ***
                                </td>
                            </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
                <span class="tabulator-paginator"><label>Page Size</label><select class="tabulator-page-size"
                        aria-label="Page Size" title="Page Size">
                        <option value="10">10</option>
                        <option value="20">20</option>
                        <option value="30">30</option>
                        <option value="40">40</option>
                    </select></span>
                {{ $progress_orders->links('components.pagination-links') }}
            </div>
        </div>

    </div>

</div>
