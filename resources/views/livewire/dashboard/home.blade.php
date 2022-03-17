<div>
    {{-- A good traveler has no fixed plans and is not intent upon arriving. --}}
    @if ($varView == '')
    @livewire('dashboard.components.top-bar', ['user_id' => session()->get('LoggedClient'), 'user_type' => 'App\Models\Client', 'activity' => ''])
    <div class="grid grid-cols-12 gap-6">
       <div class="col-span-12 2xl:col-span-9">
            <div class="grid grid-cols-12 gap-6">
                @livewire('dashboard.components.general-report')
            </div>
            <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
                <h2 class="text-lg font-medium mr-auto">
                    Pending Orders
                </h2>
            </div>
            <!-- BEGIN: HTML Table Data -->
            <div class="intro-y box p-5 mt-5">
                <div class="flex flex-col sm:flex-row sm:items-end xl:items-start">
                    <form id="tabulator-html-filter-form" class="xl:flex sm:mr-auto">

                        <div class="sm:flex items-center sm:mr-4 mt-2 xl:mt-0">
                            {{-- <label class="w-12 flex-none xl:w-auto xl:flex-initial mr-2">Value</label> --}}
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
                                            <div class="form-check form-check-sm form-check-custom form-check-solid">
                                                <input class="form-check-input" type="checkbox" value="1"
                                                    x-on:click="$wire.select('{{$pending_order[$keyCol]}}')"
                                                    {{$isSelectAll? 'checked' :''}} />
                                            </div>
                                        </td>
                                        @foreach($cols as $col)
                                        @if($col['isList'] == true)
                                        @if(isset($col['isKey']))
                                        <td class="p-0" x-on:click="$wire.view('{{$pending_order[$keyCol]}}')">
                                            <div class="d-flex align-items-center">
                                                <div class="ps-3">
                                                    <a href="#" class="text-gray-400 mb-1">{{$pending_order[$col['colName']]}}
                                                    </a>
                                                </div>
                                            </div>
                                        </td>
                                        @else
                                        @if($col['type'] == 'date')
                                        <td class="p-0">
                                            <div class="d-flex align-items-center">
                                                <div class="ps-3">
                                                    <a href="#" class="text-gray-500  fs-5  mb-1">{!!
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

                                        <td class="pe-0 text-end" wire:key="{{ $pending_order[$keyCol] }}">
                                            <button wire:click="chat('{{$pending_order[$keyCol]}}')" wire.target="chat('{{$pending_order[$keyCol]}}')"
                                                type="button"
                                                class="btn btn-lg btn-primary inline-flex items-center px-4 py-2 border border-transparent text-base leading-6 font-medium rounded-md hover:bg-blue-300 ease-in-out duration-150 "
                                                wire:loading.class="cursor-not-allowed" wire:loading.attr="disabled">
                                                <svg wire.loading wire.target="chat('{{$pending_order[$keyCol]}}')"
                                                    class="hidden animate-spin -ml-1 mr-3 h-5 w-5 text-white"
                                                    wire:loading.class.remove="hidden" xmlns="http://www.w3.org/2000/svg"
                                                    fill="none" viewBox="0 0 24 24">
                                                    <circle wire:loading wire:target="chat('{{$pending_order[$keyCol]}}')" class="opacity-25" cx="12" cy="12"
                                                        r="10" stroke="currentColor" stroke-width="4"></circle>
                                                    <path wire:loading wire:target="chat('{{$pending_order[$keyCol]}}')" class="opacity-75" fill="currentColor"
                                                        d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                                                    </path>
                                                </svg>
                                                View
                                            </button>

                                            {{-- <a
                                                class="btn btn-light text-muted fw-boldest text-hover-primary btn-sm px-5 hover:bg-green-500"
                                                x-on:click="$wire.chat('{{$pending_order[$keyCol]}}')">View</a> --}}
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
                        {{ $pending_orders->links('components.pagination-links') }}
                    </div>
                </div>
            </div>
            <!-- END: HTML Table Data -->

            <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
                <h2 class="text-lg font-medium mr-auto">
                    Orders
                </h2>
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
                                    @if(count($others) > 0)
                                    @foreach ($others as $other)
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
                                                    <a href="#" class="text-gray-400 mb-1">{{$other->order_no}}
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
                                                    <div class="progress-bar bg-info" role="progressbar" style="width: 85%">
                                                    </div>
                                                </div>
                                                @elseif($other->status=='Complete')
                                                <span class="text-gray-400 me-2 fw-boldest mb-2">100%</span>
                                                <div class="progress bg-light-primary w-100 h-5px">
                                                    <div class="progress-bar bg-primary" role="progressbar" style="width: 100%">
                                                    </div>
                                                </div>
                                                @endif
                                            </div>
                                        </td>
                                        <td class="pe-0 text-end" wire:key="{{ $other->order_no }}">
                                            <button wire.target="chat('{{$other->order_no}}')" type="button" wire:click="chat('{{$other->order_no}}')"
                                                class="btn btn-lg btn-primary inline-flex items-center px-4 py-2 border border-transparent text-base leading-6 font-medium rounded-md hover:bg-blue-300 ease-in-out duration-150 "
                                                wire:loading.class="cursor-not-allowed" wire:loading.attr="disabled">
                                                <svg wire.loading wire.target="chat('{{$other->order_no}}')"
                                                    class="hidden animate-spin -ml-1 mr-3 h-5 w-5 text-white"
                                                    wire:loading.class.remove="hidden" xmlns="http://www.w3.org/2000/svg"
                                                    fill="none" viewBox="0 0 24 24">
                                                    <circle wire:loading wire:target="chat('{{$other->order_no}}')" class="opacity-25" cx="12" cy="12"
                                                        r="10" stroke="currentColor" stroke-width="4"></circle>
                                                    <path wire:loading wire:target="chat('{{$other->order_no}}')" class="opacity-75" fill="currentColor"
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
                        {{ $others->links('components.pagination-links') }}
                    </div>
                </div>

            </div>
        </div>

        <div class="col-span-12 2xl:col-span-3">
            <div class="2xl:border-l border-theme-5 -mb-10 pb-10">
                <div class="2xl:pl-6 grid grid-cols-12 gap-6">
                     <!-- BEGIN: Transactions -->
                     <div class="col-span-12 md:col-span-6 xl:col-span-4 2xl:col-span-12 mt-3 2xl:mt-8">
                        <div class="intro-x flex items-center h-10">
                            <h2 class="text-lg font-medium truncate mr-5">
                                Transactions
                            </h2>
                        </div>
                        <div class="mt-5">
                            <div class="intro-x">
                                <div class="box px-5 py-3 mb-3 flex items-center zoom-in">
                                    <div class="ml-4 mr-auto">
                                        <div class="font-medium">order_6190e9d57324d</div>
                                        <div class="text-gray-600 text-xs mt-0.5">16 November 2021</div>
                                    </div>
                                    <div class="text-theme-9">-$131</div>
                                </div>
                            </div>
                            <div class="intro-x">
                                <div class="box px-5 py-3 mb-3 flex items-center zoom-in">
                                    <div class="ml-4 mr-auto">
                                        <div class="font-medium uppercase">order_6190e9d57324d</div>
                                        <div class="text-gray-600 text-xs mt-0.5">11 October 2021</div>
                                    </div>
                                    <div class="text-theme-9">+$41</div>
                                </div>
                            </div>
                            <a href="" class="intro-x w-full block text-center rounded-md py-3 border border-dotted border-theme-15 dark:border-dark-5 text-theme-16 dark:text-gray-600">View More</a>
                        </div>
                    </div>
                    <!-- END: Transactions -->
                </div>
            </div>
        </div>
    </div>
    @elseif($varView == 'chat')
    {{-- @livewire('client.chat-order-summary') --}}
    @livewire('dashboard.pages.chat-order-sumry')
    @elseif($varView == 'edit-paper')
    @livewire('dashboard.pages.edit-order', ['oderId' => $editorderId])
    @elseif($varView == 'pending-orders')
    @livewire('dashboard.pages.pending-orders')
    @elseif($varView == 'progress')
    @livewire('dashboard.pages.progress-orders')
    @elseif($varView == 'completed')
    @livewire('dashboard.pages.completed-orders')
    @elseif($varView == 'revisions')
    @livewire('dashboard.pages.revision-orders')
    @elseif($varView == 'profile')
    @livewire('dashboard.pages.profile')
    @endif

</div>
<script>
    window.addEventListener('DOMContentLoaded', event => {
        livewire.emitTo('dashboard.inc.side-menu', 'update_SelectedItem', 'dashboard');
        // livewire.emit('update_SelectedItem', 'dashboard');
    })
</script>
