<div>
    {{-- If you look to others for fulfillment, you will never truly be fulfilled. --}}
    <div wire:loading wire:target='store'>
        @livewire('general.loader')
    </div>
    <div>
        {{-- @livewire('dashboard.components.overlay.invoice-notification', ['user_id' => '', 'user_type' => '']) --}}
        @livewire('dashboard.components.top-bar', ['user_id' => session()->get('LoggedClient'), 'user_type' => 'App\Models\Client', 'activity' => $activity])
        {{-- {{ dd($activity->value) }} --}}
    </div>
    @if ($varView =='')
    <h2 class="intro-y text-lg font-medium mt-10">
        Statement
    </h2>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2">
            {{--  <button class="btn btn-primary shadow-md mr-2">Add New Product</button>  --}}
            <div class="dropdown">
                <button class="dropdown-toggle btn px-2 box text-gray-700 dark:text-gray-300" aria-expanded="false">
                    <span class="w-5 h-5 flex items-center justify-center"> <i class="w-4 h-4" data-feather="plus"></i> </span>
                </button>
                <div class="dropdown-menu w-40">
                    <div class="dropdown-menu__content box dark:bg-dark-1 p-2">
                        <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white dark:bg-dark-1 hover:bg-gray-200 dark:hover:bg-dark-2 rounded-md"> <i data-feather="printer" class="w-4 h-4 mr-2"></i> Print </a>
                        <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white dark:bg-dark-1 hover:bg-gray-200 dark:hover:bg-dark-2 rounded-md"> <i data-feather="file-text" class="w-4 h-4 mr-2"></i> Export to Excel </a>
                        <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white dark:bg-dark-1 hover:bg-gray-200 dark:hover:bg-dark-2 rounded-md"> <i data-feather="file-text" class="w-4 h-4 mr-2"></i> Export to PDF </a>
                    </div>
                </div>
            </div>
            <div class="hidden md:block mx-auto text-gray-600">Showing 1 to 10 of 150 entries</div>
            <div class="w-full sm:w-auto mt-3 sm:mt-0 sm:ml-auto md:ml-0">
                <div class="w-56 relative text-gray-700 dark:text-gray-300">
                    <input type="text" class="form-control w-56 box pr-10 placeholder-theme-13" placeholder="Search...">
                    <i class="w-4 h-4 absolute my-auto inset-y-0 mr-3 right-0" data-feather="search"></i>
                </div>
            </div>
        </div>
         <!-- BEGIN: Data List -->
         <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
            <table class="table table-report -mt-2">
                <thead>
                    <tr>
                        @foreach($cols as $col)
                            @if($col['isList'] == true)

                            @if ($col['colCaption'] == 'Date')
                            <th class="whitespace-nowrap">{{$col['colCaption']}}</th>
                            @elseif($col['colCaption'] == 'Order No')
                            <th class="whitespace-nowrap">{{$col['colCaption']}}</th>
                            @elseif($col['colCaption'] == 'Details')
                            <th class="whitespace-nowrap">{{$col['colCaption']}}</th>
                            @elseif($col['colCaption'] == 'Total Amount')
                            <th class="text-center whitespace-nowrap">{{$col['colCaption']}}</th>
                            @else
                            <th class="whitespace-nowrap">{{$col['colCaption']}}</th>
                            @endif

                            @endif
                        @endforeach
                        <th class="text-center whitespace-nowrap">ACTIONS</th>
                    </tr>
                </thead>
                {{--  <tbody>
                    <tr class="intro-x">
                        <td class="w-40">
                            <div class="flex">
                                25/Oct/21
                            </div>
                        </td>
                        <td>
                            <a href="" class="font-medium whitespace-nowrap">Psychology - Human Behavior Study</a>
                            <div class="text-gray-600 text-xs whitespace-wrap mt-0.5">Illustrate features showing that someone is lying during conversation. Using psychology skills, wri... &amp; Tablet</div>
                        </td>
                        <td class="w-40">
                            <div class="flex">
                                order_613044536b51d
                            </div>
                        </td>
                        <td class="text-center"> $110</td>
                        <td class="table-report__action w-56">
                            <div class="flex justify-center items-center">
                                <a class="flex items-center mr-3" href="javascript:;"  >
                                    <button  type="button"
                                        class="btn btn-lg btn-secondary inline-flex items-center px-4 py-2 border border-transparent text-base leading-6 font-medium rounded-md hover:bg-blue-300 ease-in-out duration-150 "
                                        >
                                        <i data-feather="dollar-sign" class="w-4 h-4 mr-1"></i> Pay
                                    </button>
                                </a>
                                <a class="flex items-center " href="javascript:;"  >
                                    <button  type="button"
                                        class="btn btn-lg btn-primary inline-flex items-center px-4 py-2 border border-transparent text-base leading-6 font-medium rounded-md hover:bg-blue-300 ease-in-out duration-150 "
                                        >
                                       <i data-feather="eye" class="w-4 h-4 mr-1"></i>View
                                    </button>
                                </a>
                            </div>
                        </td>
                    </tr>
                </tbody>  --}}

                <tbody>
                    @if (count($data) > 0)

                    @foreach ($data as $key => $record)
                        <tr class="intro-x">
                            @foreach ($cols as $col)
                            @if ($col['isList'] == true)

                                @if (isset($col['isRelationship']) && $col['isRelationship'] == true)
                                    @if ($col['colCaption'] == 'Date')
                                        <td class="w-40">
                                            <div class="flex">
                                            {!! date('d/M/y', strtotime($record[$col['relName']][$col['colName']])) !!}
                                            </div>
                                        </td>
                                    @elseif($col['colCaption'] == 'Details')
                                    <td>
                                        <a href="" class="font-medium whitespace-nowrap">{{$record[$col['relName']][$col['colName']]}}</a>
                                        <div class="text-gray-600 text-xs whitespace-wrap mt-0.5 w-60">
                                            {{strlen($record[$col['relName']]['instructions']) > 50? substr($record[$col['relName']]['instructions'],0,50).'...':$record[$col['relName']]['instructions']}}
                                        </div>

                                    </td>
                                    @elseif($col['colCaption'] == 'Order No')
                                        <td class="w-40">
                                            <div class="flex">
                                                {{$record[$col['relName']][$col['colName']]}}
                                            </div>
                                        </td>
                                    @elseif($col['colCaption'] == 'Total Amount')
                                    {{$this->checkPaidStatus($record[$keyCol])}}
                                        @if ($paidStatus)
                                        <td class="w-40">
                                            <div class="flex text-success">
                                                ${{$this->checkBalance($record[$keyCol])}}
                                            </div>
                                        </td>
                                        @else
                                        <td class="w-40">
                                            <div class="flex text-danger">
                                                $ -{{$this->checkBalance($record[$keyCol])}}
                                            </div>
                                        </td>

                                        @endif
                                    @else
                                        <td>
                                            {{$record[$col['relName']][$col['colName']]}}
                                        </td>

                                    @endif

                                @else
                                    @if ($col['colCaption'] == 'Date')
                                    <td class="w-40">
                                        <div class="flex">
                                            {!! date('d/M/y', strtotime($record[$col['colName']])) !!}
                                        </div>
                                    </td>
                                    @elseif($col['colCaption'] == 'Order No')
                                        <td class="w-40">
                                            <div class="flex">
                                                {{$record[$col['colName']]}}
                                            </div>
                                        </td>
                                    @elseif($col['colCaption'] == 'Total Amount')
                                        {{$this->checkPaidStatus($record[$keyCol])}}
                                        {{-- {{$this->checkBalance($record[$keyCol])}} --}}
                                        @if ($paidStatus)
                                        <td class="text-success ">
                                            ${{$this->checkBalance($record[$keyCol])}}
                                        </td>
                                        @else
                                        <td class="text-danger ">
                                           $ -{{$this->checkBalance($record[$keyCol])}}
                                        </td>
                                        @endif
                                    @else
                                        <td>
                                            {{$record[$col['colName']]}}
                                        </td>

                                    @endif

                                @endif
                            @endif
                            @endforeach
                            <td class="table-report__action w-auto">
                                <div class="flex justify-center items-center">
                                    <a class="flex items-center mr-3" href="javascript:;"  >
                                        <button  type="button"
                                            wire:click="checkOrder({{$record[$keyCol]}})"
                                            class="btn btn-lg btn-secondary inline-flex items-center px-4 py-2 border border-transparent text-base leading-6 font-medium rounded-md hover:bg-blue-300 ease-in-out duration-150 "
                                            {{$paidStatus? 'disabled':''}}
                                            >
                                            <i data-feather="dollar-sign" class="w-4 h-4 mr-1"></i> Pay
                                        </button>
                                    </a>
                                    <a class="flex items-center " href="javascript:;"  >
                                        <button  type="button"
                                            class="btn btn-lg btn-primary inline-flex items-center px-4 py-2 border border-transparent text-base leading-6 font-medium rounded-md hover:bg-blue-300 ease-in-out duration-150 "
                                            >
                                           <i data-feather="eye" class="w-4 h-4 mr-1"></i>View
                                        </button>
                                    </a>
                                </div>
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
         <!-- END: Data List -->
    </div>

    @elseif($varView == 'check-order')
    @livewire('order.check-order')
    @elseif($varView == 'checkout')
    @livewire('order.billing')
    @endif
</div>
<script>
    window.addEventListener('DOMContentLoaded', event => {
        livewire.emitTo('dashboard.inc.side-menu', 'update_SelectedItem', 'invoice');
        // livewire.emit('update_SelectedItem', 'dashboard');
    })
</script>
