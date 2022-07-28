<div>
    <div wire:loading>
        @livewire('general.loader')
    </div>
    @if ($varView == "")
    <div class="content fs-6 d-flex flex-column flex-column-fluid" id="kt_content">
        <div class="toolbar" id="kt_toolbar">
            <div class="container-fluid d-flex flex-stack flex-wrap flex-sm-nowrap">
                <!--begin::Info-->
                <div class="d-flex flex-column align-items-start justify-content-center flex-wrap me-2">
                    <!--begin::Title-->
                    <h1 class="text-dark fw-bolder my-1 fs-2">{{ $pageTitle }}</h1>
                    <!--end::Title-->
                </div>
                <!--end::Info-->
            </div>
        </div>
        <div>
            @if (session()->has('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            @endif
            @if (session()->has('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
            @endif
        </div>
        <!--end::Toolbar-->
        <div class="post fs-6 d-flex flex-column-fluid" id="kt_post">
            <!--begin::Container-->
            <div class="container">
                <!--begin::Row-->
                <!--end::Row-->
                <!--begin::Statements-->
                <div class="card">
                    <!--begin::Header-->
                    <div class="card-header card-header-stretch">
                        <!--begin::Title-->
                        <div class="card-title">
                            <h3 class="fw-bolder fs-2 m-0 text-gray-800">
                                {{ $pageTitle }} List
                            </h3>
                        </div>
                    </div>
                    <!--end::Header-->
                    <!--begin::Tab Content-->
                    <div id="kt_referred_users_tab_content" class="tab-content">
                        <!--begin::Tab panel-->
                        <div id="kt_referrals_1" class="card-body p-0 tab-pane fade show active" role="tabpanel">
                            <div class="table-responsive">
                                <!--begin::Table-->
                                <table class="table table-row-bordered table-flush align-middle gy-4" x-data=''>
                                    <!--begin::Thead-->
                                    <thead
                                        class="border-bottom border-gray-200 fs-5 fw-bold bg-light bg-opacity-75">
                                        <tr>
                                            @foreach($cols as $col)
                                            @if($col['isList'] == true)

                                                @if ($col['colCaption'] == 'Date')
                                                <th class="min-w-150px ps-9">{{$col['colCaption']}}</th>
                                                @elseif($col['colCaption'] == 'Journal')
                                                <th class="min-w-150px px-0">{{$col['colCaption']}}</th>
                                                @else
                                                <th class="min-w-125px text-start">{{$col['colCaption']}}</th>
                                                @endif
                                            @endif
                                            @endforeach
                                            <th class="min-w-125px text-start">Actions</th>
                                        </tr>
                                    </thead>
                                    <!--end::Thead-->
                                    <!--begin::Tbody-->
                                    <tbody class="fs-5 fw-bold text-gray-600">
                                        @if (count($data) > 0)

                                        @foreach ($data as $key => $record)
                                            <tr>
                                                @foreach ($cols as $col)
                                                @if ($col['isList'] == true)

                                                    @if (isset($col['isRelationship']) && $col['isRelationship'] == true)
                                                        @if ($col['colCaption'] == 'Date')
                                                            <td class="ps-9">
                                                                {!! date('d/M/y', strtotime($record[$col['relName']][$col['colName']])) !!}
                                                                {{-- {{$record[$col['relName']][$col['colName']]}} --}}
                                                            </td>
                                                        @else
                                                            <td>
                                                                {{$record[$col['relName']][$col['colName']]}}
                                                            </td>
                                                        @endif
                                                    @else
                                                        @if ($col['colCaption'] == 'Date')
                                                            <td class="ps-9">
                                                                {!! date('d/M/y', strtotime($record[$col['colName']])) !!}
                                                                {{-- {{$record[$col['colName']]}} --}}
                                                            </td>
                                                        @else
                                                        <td>
                                                            {{$record[$col['colName']]}}
                                                        </td>
                                                        @endif
                                                    @endif
                                                @endif
                                                @endforeach
                                                <td class="text-start">
                                                    <button class="btn btn-sm btn-light btn-active-light-primary"
                                                    x-on:click="$wire.view('{{$record[$keyCol]}}')">
                                                        View
                                                    </button>

                                                    <span>
                                                    {{-- <button class="btn btn-sm btn-light btn-active-light-danger">
                                                        Delete
                                                    </button> --}}
                                                    </span>
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
                                    <!--end::Tbody-->
                                </table>
                                <!--end::Table-->
                            </div>
                        </div>
                    </div>
                    <!--end::Tab Content-->
                </div>
                <!--end::Statements-->
            </div>
            <!--end::Container-->
        </div>

    </div>

    @elseif($varView == "show-details")
        {{-- @livewire('admin.writers.show', ['id' => $writer_id]) --}}
    @endif
</div>
