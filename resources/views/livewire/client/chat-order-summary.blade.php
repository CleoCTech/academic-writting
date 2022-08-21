<div>
    {{-- A good traveler has no fixed plans and is not intent upon arriving. --}}
    <div wire:loading wire:target='confrimInvoice, rejectInvoice'>
        @livewire('general.loader')
    </div>
    <div class="content fs-6 d-flex flex-column flex-column-fluid" id="kt_content">


        <!--begin ::Toolbar-->
        @livewire('client.components.toolbar', [$confirm_invoice])
        <!--end ::Toolbar-->
        <!-- Alert Info -->
        @if (session()->get('LoggedClient') != null)
        @if (session()->has('success'))
        <div class="m-auto">
            <div class="bg-white rounded-lg border-gray-300 border p-3 shadow-lg">
                <div class="flex flex-row">
                    <div class="px-2">
                        <svg width="24" height="24" viewBox="0 0 1792 1792" fill="#44C997"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M1299 813l-422 422q-19 19-45 19t-45-19l-294-294q-19-19-19-45t19-45l102-102q19-19 45-19t45 19l147 147 275-275q19-19 45-19t45 19l102 102q19 19 19 45t-19 45zm141 83q0-148-73-273t-198-198-273-73-273 73-198 198-73 273 73 273 198 198 273 73 273-73 198-198 73-273zm224 0q0 209-103 385.5t-279.5 279.5-385.5 103-385.5-103-279.5-279.5-103-385.5 103-385.5 279.5-279.5 385.5-103 385.5 103 279.5 279.5 103 385.5z" />
                        </svg>
                    </div>
                    <div class="">
                        <span class="font-semibold"> {{ session('success-modal') }}</span>
                        {{-- <span class="block text-gray-500">Anyone with a link can now view this file</span> --}}
                    </div>
                </div>
            </div>
        </div>
        @endif
        @if (session()->has('error'))
        <div class="m-auto">
            <div class="bg-danger rounded-lg border-gray-300 border p-3 shadow-lg"
                style="background-color: rgba(224,52,18,.1) !important; color: rgba(224,52,18,.5);">
                <div class="flex flex-row">
                    <div class="px-2 text-damger">
                        <i class="text-danger fas fa-times-circle fa-2x"></i>
                    </div>
                    <div class="">
                        <span class="font-semibold text-danger"> {{ session('error-modal') }}</span>
                        {{-- <span class="block text-gray-500">Anyone with a link can now view this file</span> --}}
                    </div>
                </div>
            </div>
        </div>
        @endif
        @if ($activity != '' )
        <div class="bg-blue-200 px-6 py-4 mx-2 my-4 rounded-md text-lg flex items-center mx-auto w-3/4 xl:w-2/4">
            <svg viewBox="0 0 24 24" class="text-blue-600 w-5 h-5 sm:w-5 sm:h-5 mr-3">
                <path fill="currentColor"
                    d="M12,0A12,12,0,1,0,24,12,12.013,12.013,0,0,0,12,0Zm.25,5a1.5,1.5,0,1,1-1.5,1.5A1.5,1.5,0,0,1,12.25,5ZM14.5,18.5h-4a1,1,0,0,1,0-2h.75a.25.25,0,0,0,.25-.25v-4.5a.25.25,0,0,0-.25-.25H10.5a1,1,0,0,1,0-2h1a2,2,0,0,1,2,2v4.75a.25.25,0,0,0,.25.25h.75a1,1,0,1,1,0,2Z">
                </path>
            </svg>
            <span class="text-blue-800"> Confirm Invoice of ${{ $activity->value }} per page for this task </span>
            <span class="flex justify-end" style=" margin-left: 2rem;">
                <button wire:click='confrimInvoice'
                    class=" btn-primary transition duration-150 ease-in-out transform hover:scale-110 bg-emerald-600 text-white font-semibold py-3 px-6 rounded-md" " >
                        Confirm
                    </button>
                    <span class=" flex justify-end" style=" margin-left: 2rem;">
                    <button wire:click='rejectInvoice'
                        class=" btn-danger transition duration-150 ease-in-out transform hover:scale-110 bg-emerald-600 text-white font-semibold py-3 px-6 rounded-md" " >
                        Reject
                    </button>
                    </span>
                </div>
                @endif
            @elseif(auth()->user() != null)
                <!-- Alert Success -->
                    @if ($InvoiceAccepted)
                    <div class=" bg-green-200 px-6 py-4 mx-2 my-4 rounded-md text-lg flex items-center mx-auto w-3/4
                        xl:w-2/4">
                        <svg viewBox="0 0 24 24" class="text-green-600 w-5 h-5 sm:w-5 sm:h-5 mr-3">
                            <path fill="currentColor"
                                d="M12,0A12,12,0,1,0,24,12,12.014,12.014,0,0,0,12,0Zm6.927,8.2-6.845,9.289a1.011,1.011,0,0,1-1.43.188L5.764,13.769a1,1,0,1,1,1.25-1.562l4.076,3.261,6.227-8.451A1,1,0,1,1,18.927,8.2Z">
                            </path>
                        </svg>
                        <span class="text-green-800"> Invoice Accepted. </span>
        </div>
        @endif
        @if ($InvoiceRejected)
        <!-- Alert Error -->
        <div class="bg-red-200 px-6 py-4 mx-2 my-4 rounded-md text-lg flex items-center mx-auto w-3/4 xl:w-2/4">
            <svg viewBox="0 0 24 24" class="text-red-600 w-5 h-5 sm:w-5 sm:h-5 mr-3">
                <path fill="currentColor"
                    d="M11.983,0a12.206,12.206,0,0,0-8.51,3.653A11.8,11.8,0,0,0,0,12.207,11.779,11.779,0,0,0,11.8,24h.214A12.111,12.111,0,0,0,24,11.791h0A11.766,11.766,0,0,0,11.983,0ZM10.5,16.542a1.476,1.476,0,0,1,1.449-1.53h.027a1.527,1.527,0,0,1,1.523,1.47,1.475,1.475,0,0,1-1.449,1.53h-.027A1.529,1.529,0,0,1,10.5,16.542ZM11,12.5v-6a1,1,0,0,1,2,0v6a1,1,0,1,1-2,0Z">
                </path>
            </svg>
            <span class="text-red-800"> Your was invoice rejected. </span>
        </div>
        <!-- End Alert Error -->
        @endif

        <!-- End Alert Success -->
        @endif


        <!-- End Alert Info -->
        <!--begin::Chat-->
        @livewire('client.components.order-sum-with-chatbox', [$orderDetails, $revisions, $clientFiles,
        $confirm_invoice, $total_fee, $user_type, $orderId ])

        <!--end::Chat-->

        <br>
        <!--begin::Order Submision section-->
        {{-- @livewire('client.components.order-submision', [$orderDetails, $revisions, $clientFiles, $orderStatus,
        $companyFiles, $writerFiles]) --}}
        @guest
        @if (!$orderStatus)
        <div class="d-flex flex-column flex-lg-row">
            <div class="flex-lg-row-fluid">
                <div class='card'>
                    <div class="card-header align-items-center px-9 py-3" id="kt_chat_content_header">
                        <div class="text-start flex-grow-1">
                            <!--begin::Aside Mobile Toggle-->
                            <button type="button"
                                class="btn btn-active-light-primary btn-sm btn-icon btn-icon-md d-lg-none"
                                id="kt_app_chat_toggle">
                                <!--begin::Svg Icon | path: icons/stockholm/Communication/Adress-book2.svg-->
                                <span class="svg-icon svg-icon-1">
                                    <i class="bi bi-journal-album"></i>
                                </span>
                                <!--end::Svg Icon-->
                            </button>
                            <!--end::Aside Mobile Toggle-->
                        </div>
                        <div class="flex-grow-1">
                            <div class="text-primary fw-bolder fs-6">
                                Get Your Order Here
                            </div>

                        </div>
                    </div>
                    <div class="card-body px-9">
                        <div class="flex-stack mb-9">
                            <div class=" align-items-center">
                                <div class=" flex-column mb-4">
                                    <a class="text-primary fw-bolder fs-6 mb-3">Attached
                                        Files</a>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-4 mt-4">
                                        @if (count($companyFiles) > 0)
                                        @foreach ($companyFiles as $companyFile)
                                        <div class="row">
                                            <div>
                                                @if (session()->has('message'))
                                                <div class="alert alert-success">
                                                    {{ session('message') }}
                                                </div>
                                                @endif
                                            </div>
                                            <div class="col-md-8">
                                                <a wire:click="getDownload('{{$companyFile->folder}}')"
                                                    class="text-gray-600 text-hover-primary  fw-bold fs-8 mb-3 link-download"
                                                    title="Click to download">
                                                    {{strlen($companyFile->filename) > 20?
                                                    substr($companyFile->filename,0,20).'...':$companyFile->filename}}
                                                    ?>
                                                </a>
                                            </div>
                                            <div class="col-md-2 p-3">
                                                <a wire:click="getDownload('{{$companyFile->folder}}/{{$companyFile->filename}}')"
                                                    type="button" class="btn-floating btn-small"
                                                    download="{{$companyFile->filename}}">
                                                    <span class="svg-icon svg-icon-3">
                                                        <i class="bi bi-download"></i>
                                                    </span>
                                                </a>

                                            </div>
                                        </div>
                                        @endforeach
                                        @elseif(count($writerFiles)>0)
                                        @foreach ($writerFiles as $writerFile)
                                        <div class="row">
                                            <div>
                                                @if (session()->has('message'))
                                                <div class="alert alert-success">
                                                    {{ session('message') }}
                                                </div>
                                                @endif
                                            </div>

                                            <div class="col-md-8">
                                                <a wire:click="getDownload('{{$writerFile->folder}}/{{$writerFile->filename}}')"
                                                    class="text-gray-600 text-hover-primary  fw-bold fs-8 mb-3 link-download"
                                                    title="Click to download">
                                                    {{strlen($writerFile->filename) > 20?
                                                    substr($writerFile->filename,0,20).'...':$writerFile->filename}}
                                                    ?>
                                                </a>
                                            </div>
                                            <div class="col-md-2 p-3">
                                                <a wire:click="getDownload('{{$writerFile->folder}}/{{$writerFile->filename}}')"
                                                    type="button" class="btn-floating btn-small"
                                                    download="{{$writerFile->filename}}"> <span
                                                        class="svg-icon svg-icon-3">
                                                        <i class="bi bi-download"></i>
                                                    </span>
                                                </a>

                                            </div>
                                        </div>
                                        @endforeach
                                        @else
                                        <p>*** Yet to be uploaded ***</p>
                                        @endif
                                    </div>
                                    @if (count($companyFiles) > 0 || count($writerFiles)> 0)
                                    <div class="col-md-8 mt-0">
                                        <div class="row bg-indigo-600 bg-opacity-25">
                                            @if ($this->orderCurrentStatus($orderDetails->id) == "Client")

                                            <div class="col-sm-6">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <h4 class="text-blue-400 uppercase " style="margin-top: -1rem;">
                                                            Accepting Order From Writer
                                                            <span class="svg-icon svg-icon-3 text-yellow-500">
                                                                <i
                                                                    class="bi bi-exclamation-triangle text-yellow-500"></i>
                                                            </span>
                                                        </h4>
                                                        <p
                                                            class="mb-10 font-sans md:font-serif text-gray-400 text-hover-primary ">
                                                            Before accepting the order, preview the work and
                                                            assertain that everything is okay.</p>
                                                        @if ($acceptBtn)
                                                        <div class="justify-around" x-data=''>

                                                            <span class="relative inline-flex rounded-lg shadow-sm">

                                                                <button wire:click='activateAcceptSection' type="button"
                                                                    class="btn-primary transition duration-150 ease-in-out transform hover:scale-110 bg-emerald-600 text-white font-semibold py-3 px-6 rounded-md">

                                                                    <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white"
                                                                        xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                        viewBox="0 0 24 24" x-data="{show: false}"
                                                                        x-show="show"
                                                                        x-init="@this.on('saved', () => { show = true; setTimeout(() => { show = false;}, 2000) })"
                                                                        style="display: none;">
                                                                        <circle class="opacity-25" cx="12" cy="12"
                                                                            r="10" stroke="currentColor"
                                                                            stroke-width="4"></circle>
                                                                        <path class="opacity-75" fill="currentColor"
                                                                            d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                                                                        </path>
                                                                    </svg>

                                                                    Accept Order
                                                                </button>
                                                            </span>
                                                        </div>
                                                        @endif
                                                        @if ($accept_section)
                                                        <div>
                                                            <h4 class="text-blue-400 " style="margin-top: 1rem;">
                                                                Leave a comment (Optional)
                                                                <span class="svg-icon svg-icon-4 ">
                                                                    <i
                                                                        class="bi bi-chat-left-text-fill text-blue-400"></i>
                                                                </span>
                                                            </h4>
                                                            <div class="mt-1 relative rounded-md shadow-sm">
                                                                <textarea wire:model.defer='comment'
                                                                    class="bg-white focus:shadow-outline text-gray-700 appearance-none inline-block w-full border border-emerald-300 rounded-lg py-3 px-4 focus:outline-none "
                                                                    rows="4"></textarea>
                                                            </div>
                                                        </div>

                                                        <div class="justify-around" x-data=''>

                                                            <span class="relative inline-flex rounded-lg shadow-sm">

                                                                <button onclick="resetPond()" type="button"
                                                                    class="btn-primary transition duration-150 ease-in-out transform hover:scale-110 bg-emerald-600 text-white font-semibold py-3 px-6 rounded-md"
                                                                    x-on:click="$wire.accept('{{$orderDetails->order_no}}')">

                                                                    <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white"
                                                                        xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                        viewBox="0 0 24 24" x-data="{show: false}"
                                                                        x-show="show"
                                                                        x-init="@this.on('saved', () => { show = true; setTimeout(() => { show = false;}, 2000) })"
                                                                        style="display: none;">
                                                                        <circle class="opacity-25" cx="12" cy="12"
                                                                            r="10" stroke="currentColor"
                                                                            stroke-width="4"></circle>
                                                                        <path class="opacity-75" fill="currentColor"
                                                                            d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                                                                        </path>
                                                                    </svg>

                                                                    Submit
                                                                </button>
                                                            </span>
                                                        </div>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <h4 class="text-blue-400 uppercase " style="margin-top: -1rem;">
                                                            Rejecting Order
                                                            <span class="svg-icon svg-icon-4 text-yellow-500">
                                                                <i
                                                                    class="bi bi-exclamation-triangle text-yellow-500"></i>
                                                            </span>
                                                        </h4>
                                                        <p
                                                            class=" mb-4 font-sans md:font-serif text-gray-400 text-hover-blue-700 text-hover-primary hover:text-blue-700">
                                                            Before rejecting the order, preview the work and
                                                            assertain that instructions you gave were not followed.
                                                        </p>
                                                        @if ($rejectBtn)


                                                        <div class="justify-around" x-data=''>

                                                            <span class="relative inline-flex rounded-lg shadow-sm">

                                                                <button wire:click='activateRejectSection' type="button"
                                                                    class="btn-danger transition duration-150 ease-in-out transform hover:scale-110 bg-emerald-600 text-white font-semibold py-3 px-6 rounded-md">

                                                                    <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white"
                                                                        xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                        viewBox="0 0 24 24" x-data="{show: false}"
                                                                        x-show="show"
                                                                        x-init="@this.on('saved', () => { show = true; setTimeout(() => { show = false;}, 2000) })"
                                                                        style="display: none;">
                                                                        <circle class="opacity-25" cx="12" cy="12"
                                                                            r="10" stroke="currentColor"
                                                                            stroke-width="4"></circle>
                                                                        <path class="opacity-75" fill="currentColor"
                                                                            d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                                                                        </path>
                                                                    </svg>

                                                                    Reject Order
                                                                </button>
                                                            </span>
                                                        </div>
                                                        @endif
                                                        @if ($reject_section)
                                                        <div>
                                                            <label for="Instructions"
                                                                class="block text-md font-medium text-gray-700">More
                                                                Instructions</label>
                                                            <div class="mt-1 relative rounded-md shadow-sm">
                                                                <textarea wire:model.defer='comment'
                                                                    class="bg-white focus:shadow-outline text-gray-700 appearance-none inline-block w-full border border-emerald-300 rounded-lg py-3 px-4 focus:outline-none "
                                                                    rows="4"></textarea>
                                                            </div>
                                                        </div>
                                                        <h4 class="text-blue-400 " style="margin-top: 1rem;">Add
                                                            Files (Optional)
                                                            <span class="svg-icon svg-icon-4 ">
                                                                <i class="bi bi-paperclip text-blue-400"></i>
                                                            </span>
                                                        </h4>
                                                        <div wire:ignore class="row">
                                                            <div class="col-lg-12 col-md-12 col-sm-12">
                                                                <input type="file" name="paperFile[]" id="test"
                                                                    multiple>
                                                            </div>
                                                            <script type="text/javascript">
                                                                const inputElement = document.querySelector('input[id="test"]');
                                                                const pond = FilePond.create( inputElement );
                                                                FilePond.setOptions({
                                                                    server:{
                                                                        url: '/upload',
                                                                        headers: {
                                                                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                                                                        }
                                                                    }
                                                                });
                                                            </script>
                                                        </div>
                                                        <div class="justify-around" x-data=''>

                                                            <span class="relative inline-flex rounded-lg shadow-sm">

                                                                <button onclick="resetPond()" type="button"
                                                                    class="btn-primary inline-flex items-center px-6 py-3 text-white leading-6 font-medium rounded-lg  focus:border-purple-300 transition ease-in-out duration-150"
                                                                    x-on:click="$wire.reject('{{$orderDetails->order_no}}')">

                                                                    <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white"
                                                                        xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                        viewBox="0 0 24 24" x-data="{show: false}"
                                                                        x-show="show"
                                                                        x-init="@this.on('saved', () => { show = true; setTimeout(() => { show = false;}, 2000) })"
                                                                        style="display: none;">
                                                                        <circle class="opacity-25" cx="12" cy="12"
                                                                            r="10" stroke="currentColor"
                                                                            stroke-width="4"></circle>
                                                                        <path class="opacity-75" fill="currentColor"
                                                                            d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                                                                        </path>
                                                                    </svg>

                                                                    Submit
                                                                </button>
                                                            </span>
                                                        </div>
                                                        @endif

                                                    </div>
                                                </div>


                                            </div>

                                            @else
                                            <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md"
                                                role="alert">
                                                <div class="flex">
                                                    <div class="py-1"><svg
                                                            class="fill-current h-6 w-6 text-teal-500 mr-4"
                                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                                            <path
                                                                d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z" />
                                                        </svg></div>
                                                    <div>
                                                        <p class="font-bold">
                                                            {{ $this->checkIfOrderPassedStage($orderDetails->id,
                                                            'Client')
                                                            }}
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            @endif
                                        </div>
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif
            @endguest

            @auth
            @if (!$orderStatus)
            <div class="d-flex flex-column flex-lg-row">
                <div class="flex-lg-row-fluid">
                    <div class='card'>
                        <div class="card-header align-items-center px-9 py-3" id="kt_chat_content_header">
                            <div class="text-start flex-grow-1">
                                <!--begin::Aside Mobile Toggle-->
                                <button type="button"
                                    class="btn btn-active-light-primary btn-sm btn-icon btn-icon-md d-lg-none"
                                    id="kt_app_chat_toggle">
                                    <!--begin::Svg Icon | path: icons/stockholm/Communication/Adress-book2.svg-->
                                    <span class="svg-icon svg-icon-1">
                                        <i class="bi bi-journal-album"></i>
                                    </span>
                                    <!--end::Svg Icon-->
                                </button>
                                <!--end::Aside Mobile Toggle-->
                            </div>
                            <div class="flex-grow-1">
                                <div class="text-gray-600 fw-bolder fs-6">
                                    Order Submision
                                </div>

                            </div>
                        </div>
                        <div class="card-body px-9">
                            <div class="flex-stack mb-9">
                                <div class=" align-items-center">
                                    <div class=" flex-column mb-4">
                                        <a class="text-gray-600 text-hover-primary fw-bolder fs-6 mb-3">Attached Files</a>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-4 mt-4">
                                            @foreach ($companyFiles as $companyFile)
                                            <div class="row">
                                                <div>
                                                    @if (session()->has('message'))
                                                    <div class="alert alert-success">
                                                        {{ session('message') }}
                                                    </div>
                                                    @endif
                                                </div>
                                                <div class="col-md-8">
                                                    <a class="text-gray-600 text-hover-primary fw-bold fs-6 mb-3 ">{{$companyFile->filename}}
                                                    </a><span>
                                                        <a wire:click="dropFile('{{$companyFile->id}}','{{$companyFile->folder}}', '{{$companyFile->filename}}')"
                                                            class="text-gray-600 text-hover-danger fw-bold fs-4 mb-1">
                                                            <i class="bi bi-x-circle" style="font-size:1.5rem;"></i></a>

                                                    </span>
                                                </div>
                                                <div class="col-md-2 p-3">
                                                    <a wire:click="getDownload('{{$companyFile->folder}}/{{$companyFile->filename}}')"
                                                        type="button" class="btn-floating btn-small"
                                                        download="{{$companyFile->filename}}"> <span
                                                            class="svg-icon svg-icon-3">
                                                            <i class="bi bi-download"></i>
                                                        </span>
                                                    </a>

                                                </div>
                                            </div>
                                            @endforeach
                                            <div>
                                                @if (session()->has('success'))
                                                <div class="alert alert-success">
                                                    {{ session('success') }}
                                                </div>
                                                @endif
                                            </div>
                                            <h4 class="text-blue-400 " style="margin-top: 1rem;">Add Files
                                                <span class="svg-icon svg-icon-4 ">
                                                    <i class="bi bi-paperclip text-blue-400"></i>
                                                </span>
                                            </h4>
                                            <div wire:ignore class="row">
                                                <div class="col-lg-12 col-md-12 col-sm-12">
                                                    <input type="file" wire:model.defer='companyFile' name="paperFile[]"
                                                        id="test" multiple>
                                                </div>
                                                <script type="text/javascript">
                                                    const inputElement = document.querySelector('input[id="test"]');
                                                    const pond = FilePond.create( inputElement );
                                                    FilePond.setOptions({
                                                        server:{
                                                            url: '/upload',
                                                            headers: {
                                                                'X-CSRF-TOKEN': '{{ csrf_token() }}'
                                                            }
                                                        }
                                                    });
                                                    function resetPond(){
                                                        var pond = document.getElementById("test");
                                                        pond.removeFiles();
                                                    }
                                                </script>
                                            </div>
                                            <div class="justify-around">

                                                <span class="relative inline-flex rounded-lg shadow-sm">

                                                    <button onclick="resetPond()" type="button"
                                                        class="btn-primary inline-flex items-center px-6 py-3 text-white leading-6 font-medium rounded-lg  focus:border-purple-300 transition ease-in-out duration-150"
                                                        wire:click='store' wire.target='store'>

                                                        <svg wire.loading wire.target="back" wire:loading.class.remove="hidden" class=" hidden animate-spin -ml-1 mr-3 h-5 w-5 text-white"
                                                            xmlns="http://www.w3.org/2000/svg" fill="none"
                                                            viewBox="0 0 24 24"
                                                            {{-- x-data="{show: false}" x-show="show"
                                                            x-init="@this.on('saved', () => { show = true; setTimeout(() => { show = false;}, 2000) })"
                                                            style="display: none; --}}
                                                            ">
                                                            <circle class="opacity-25" cx="12" cy="12" r="10"
                                                                stroke="currentColor" stroke-width="4"></circle>
                                                            <path class="opacity-75" fill="currentColor"
                                                                d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                                                            </path>
                                                        </svg>

                                                        Submit
                                                    </button>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="col-md-8 mt-0">
                                            <div class="row bg-indigo-600 bg-opacity-25">
                                                <div class="col-sm-6">

                                                    <div class="card">
                                                        <div class="card-body">
                                                            <div class="flex-stack mb-9">
                                                                <div class=" align-items-center">
                                                                    <div class=" flex-column mb-4">
                                                                        <h4 class="text-blue-400 "
                                                                            style="margin-top: 1rem;">
                                                                            Attached
                                                                            Files
                                                                            <span class="svg-icon svg-icon-4 ">
                                                                                <i
                                                                                    class="bi bi-paperclip text-blue-400"></i>
                                                                            </span>
                                                                        </h4>
                                                                    </div>
                                                                    @foreach ($writerFiles as $writerFile)
                                                                    <div class="row">
                                                                        <div>
                                                                            @if (session()->has('message'))
                                                                            <div class="alert alert-danger">
                                                                                {{ session('message') }}
                                                                            </div>
                                                                            @endif
                                                                        </div>

                                                                        @if(($this->orderCurrentStatus($writerFile->order_id)
                                                                        ) === auth()->user()->role || $orderNextLevel)
                                                                        <div class="col-md-10">
                                                                            <a wire:click="getDownload('{{$writerFile->folder}}/{{$writerFile->filename}}')"
                                                                                class="text-gray-600 text-hover-primary  fw-bold fs-8 mb-3 link-download"
                                                                                title="Click to download">
                                                                                {{strlen($writerFile->filename) > 20?
                                                                                substr($writerFile->filename,0,20).'...':$writerFile->filename}}
                                                                                ?>
                                                                            </a>
                                                                        </div>
                                                                        <div class="col-md-2 p-1">
                                                                            <span class="float-end">
                                                                                <a wire:click="getDownload('{{$writerFile->folder}}/{{$writerFile->filename}}')"
                                                                                    type="button"
                                                                                    class="btn-floating btn-xs"
                                                                                    download="{{$writerFile->filename}}">
                                                                                    <span
                                                                                        class="svg-icon svg-icon-8 text-hover-primary">
                                                                                        <i
                                                                                            class="bi bi-download fs-4"></i>
                                                                                    </span></a>
                                                                            </span>
                                                                        </div>
                                                                        @else
                                                                        <h4 class="text-blue-400 "
                                                                            style="margin-top: 1rem;">
                                                                            ***No Files Found***
                                                                            <span class="svg-icon svg-icon-4 ">
                                                                                <i
                                                                                    class="bi bi-paperclip text-blue-400"></i>
                                                                            </span>
                                                                        </h4>
                                                                        @endif

                                                                    </div>
                                                                    @endforeach
                                                                </div>
                                                            </div>
                                                            @if ($showOperationSection)

                                                            <h4 class="text-blue-400 uppercase "
                                                                style="margin-top: -1rem;">
                                                                Accepting Order From
                                                                Writer
                                                                <span class="svg-icon svg-icon-3 text-yellow-500">
                                                                    <i
                                                                        class="bi bi-exclamation-triangle text-yellow-500"></i>
                                                                </span>
                                                            </h4>
                                                            <p class="mb-10 font-sans md:font-serif text-gray-400">
                                                                Before accepting the order, preview the work and
                                                                assertain that everything is okay.</p>

                                                            @if ($acceptBtn)
                                                            <div class="justify-around" x-data=''>

                                                                <span class="relative inline-flex rounded-lg shadow-sm">

                                                                    <button wire:click='activateAcceptSection'
                                                                        type="button"
                                                                        class="btn-primary transition duration-150 ease-in-out transform hover:scale-110 bg-emerald-600 text-white font-semibold py-3 px-6 rounded-md">

                                                                        <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white"
                                                                            xmlns="http://www.w3.org/2000/svg"
                                                                            fill="none" viewBox="0 0 24 24"
                                                                            x-data="{show: false}" x-show="show"
                                                                            x-init="@this.on('saved', () => { show = true; setTimeout(() => { show = false;}, 2000) })"
                                                                            style="display: none;">
                                                                            <circle class="opacity-25" cx="12" cy="12"
                                                                                r="10" stroke="currentColor"
                                                                                stroke-width="4"></circle>
                                                                            <path class="opacity-75" fill="currentColor"
                                                                                d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                                                                            </path>
                                                                        </svg>

                                                                        Accept Order
                                                                    </button>
                                                                </span>
                                                            </div>
                                                            @endif

                                                            @if ($accept_section)
                                                            <div>
                                                                <h4 class="text-blue-400 " style="margin-top: 1rem;">
                                                                    Leave a comment (Optional)
                                                                    <span class="svg-icon svg-icon-4 ">
                                                                        <i
                                                                            class="bi bi-chat-left-text-fill text-blue-400"></i>
                                                                    </span>
                                                                </h4>
                                                                <div class="mt-1 relative rounded-md shadow-sm">
                                                                    <textarea wire:model.defer='comment'
                                                                        class="bg-white focus:shadow-outline text-gray-700 appearance-none inline-block w-full border border-emerald-300 rounded-lg py-3 px-4 focus:outline-none "
                                                                        rows="4"></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="justify-around" x-data=''>

                                                                <span class="relative inline-flex rounded-lg shadow-sm">

                                                                    <button onclick="resetPond()" type="button"
                                                                        class="btn-primary transition duration-150 ease-in-out transform hover:scale-110 bg-emerald-600 text-white font-semibold py-3 px-6 rounded-md"
                                                                        x-on:click="$wire.accept('{{$orderDetails->order_no}}')">

                                                                        <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white"
                                                                            xmlns="http://www.w3.org/2000/svg"
                                                                            fill="none" viewBox="0 0 24 24"
                                                                            x-data="{show: false}" x-show="show"
                                                                            x-init="@this.on('saved', () => { show = true; setTimeout(() => { show = false;}, 2000) })"
                                                                            style="display: none;">
                                                                            <circle class="opacity-25" cx="12" cy="12"
                                                                                r="10" stroke="currentColor"
                                                                                stroke-width="4"></circle>
                                                                            <path class="opacity-75" fill="currentColor"
                                                                                d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                                                                            </path>
                                                                        </svg>

                                                                        Submit
                                                                    </button>
                                                                </span>
                                                            </div>
                                                            @endif

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="card">
                                                        <div class="card-body">
                                                            <h4 class="text-blue-400 uppercase "
                                                                style="margin-top: -1rem;">
                                                                Rejecting Order
                                                                <span class="svg-icon svg-icon-4 text-yellow-500">
                                                                    <i
                                                                        class="bi bi-exclamation-triangle text-yellow-500"></i>
                                                                </span>
                                                            </h4>
                                                            <p
                                                                class=" mb-4 font-sans md:font-serif text-gray-400 text-hover-blue-700 text-hover-primary hover:text-blue-700">
                                                                Before rejecting the order, preview the work and
                                                                assertain that instructions you gave were not followed.
                                                            </p>
                                                            @if ($rejectBtn)


                                                            <div class="justify-around" x-data=''>

                                                                <span class="relative inline-flex rounded-lg shadow-sm">

                                                                    <button wire:click='activateRejectSection'
                                                                        type="button"
                                                                        class="btn-danger transition duration-150 ease-in-out transform hover:scale-110 bg-emerald-600 text-white font-semibold py-3 px-6 rounded-md">

                                                                        <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white"
                                                                            xmlns="http://www.w3.org/2000/svg"
                                                                            fill="none" viewBox="0 0 24 24"
                                                                            x-data="{show: false}" x-show="show"
                                                                            x-init="@this.on('saved', () => { show = true; setTimeout(() => { show = false;}, 2000) })"
                                                                            style="display: none;">
                                                                            <circle class="opacity-25" cx="12" cy="12"
                                                                                r="10" stroke="currentColor"
                                                                                stroke-width="4"></circle>
                                                                            <path class="opacity-75" fill="currentColor"
                                                                                d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                                                                            </path>
                                                                        </svg>

                                                                        Reject Order
                                                                    </button>
                                                                </span>
                                                            </div>
                                                            @endif
                                                            @if ($reject_section)
                                                            <div>
                                                                <label for="Instructions"
                                                                    class="block text-md font-medium text-gray-700">More
                                                                    Instructions</label>
                                                                <div class="mt-1 relative rounded-md shadow-sm">
                                                                    <textarea wire:model.defer='comment'
                                                                        class="bg-white focus:shadow-outline text-gray-700 appearance-none inline-block w-full border border-emerald-300 rounded-lg py-3 px-4 focus:outline-none "
                                                                        rows="4"></textarea>
                                                                </div>
                                                            </div>
                                                            <h4 class="text-blue-400 " style="margin-top: 1rem;">Add
                                                                Files (Optional)
                                                                <span class="svg-icon svg-icon-4 ">
                                                                    <i class="bi bi-paperclip text-blue-400"></i>
                                                                </span>
                                                            </h4>
                                                            <div wire:ignore class="row">
                                                                <div class="col-lg-12 col-md-12 col-sm-12">
                                                                    <input type="file" name="paperFile[]" id="test"
                                                                        multiple>
                                                                </div>
                                                                <script type="text/javascript">
                                                                    const inputElement = document.querySelector('input[id="test"]');
                                                                    const pond = FilePond.create( inputElement );
                                                                    FilePond.setOptions({
                                                                        server:{
                                                                            url: '/upload',
                                                                            headers: {
                                                                                'X-CSRF-TOKEN': '{{ csrf_token() }}'
                                                                            }
                                                                        }
                                                                    });
                                                                </script>
                                                            </div>
                                                            <div class="justify-around" x-data=''>

                                                                <span class="relative inline-flex rounded-lg shadow-sm">

                                                                    <button onclick="resetPond()" type="button"
                                                                        class="btn-primary inline-flex items-center px-6 py-3 text-white leading-6 font-medium rounded-lg  focus:border-purple-300 transition ease-in-out duration-150"
                                                                        x-on:click="$wire.reject('{{$orderDetails->order_no}}')">

                                                                        <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white"
                                                                            xmlns="http://www.w3.org/2000/svg"
                                                                            fill="none" viewBox="0 0 24 24"
                                                                            x-data="{show: false}" x-show="show"
                                                                            x-init="@this.on('saved', () => { show = true; setTimeout(() => { show = false;}, 2000) })"
                                                                            style="display: none;">
                                                                            <circle class="opacity-25" cx="12" cy="12"
                                                                                r="10" stroke="currentColor"
                                                                                stroke-width="4"></circle>
                                                                            <path class="opacity-75" fill="currentColor"
                                                                                d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                                                                            </path>
                                                                        </svg>

                                                                        Submit
                                                                    </button>
                                                                </span>
                                                            </div>
                                                            @endif

                                                        </div>
                                                    </div>


                                                </div>

                                                @else
                                                <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md"
                                                    role="alert">
                                                    <div class="flex">
                                                        <div class="py-1"><svg
                                                                class="fill-current h-6 w-6 text-teal-500 mr-4"
                                                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                                                <path
                                                                    d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z" />
                                                            </svg></div>
                                                        <div>
                                                            <p class="font-bold">
                                                                {{ $this->checkIfOrderPassedStage($orderDetails->id,
                                                                auth()->user()->role) }}
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif
            @endauth
            <!--end::Order Submision section-->

            <script>
                // window.checkScroll = false;
                // setInterval(() => {
                //     if (window.checkScroll) {
                //         // console.log("do nothing");
                //         window.checkScroll = false;
                //     }else{
                //         scrollToBottomFunc();
                //     }

                // }, 4000);
                // $('.scroll-y').scroll( function(evt) {
                //     window.checkScroll = true;
                //     // console.log("scroll true1");
                // });

                // $('.scroll-y').onscroll
                // object.onscroll = function() { /*...*/ }
                document.addEventListener("keyup", function(event) {
                    var sendmsg = document.getElementById('sendmsg');
                    if (event.keyCode === 13) {
                        sendmsg.click();
                    }
                });

                // function scrollToBottomFunc() {
                //     $('.scroll-y').scrollTop($('.scroll-y')[1].scrollHeight);
                // }

                function resetPond(){
                    var pond = document.getElementById("test");
                    pond.removeFiles();
                }
            </script>

        </div>
    </div>
    <style>
        [type=button], button {
            -webkit-appearance: button;
            background-color: #00A3FF;
            background-image: none;
        }
        .link-download:hover {
            text-decoration: underline !important;
            cursor: pointer;
        }

        .btn-floating {
            -webkit-appearance: none;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
            display: -webkit-box;
            display: flex;
            -webkit-box-align: center;
            align-items: center;
            -webkit-box-pack: center;
            justify-content: center;
            outline: none;
            cursor: pointer;
            width: 30px;
            height: 30px;
            background-image: -webkit-gradient(linear, left bottom, left top, from(#d8d9db), color-stop(80%, #fff), to(#fdfdfd));
            background-image: linear-gradient(to top, #d8d9db 0%, #fff 80%, #fdfdfd 100%);
            border-radius: 30px;
            border: 1px solid #8f9092;
            box-shadow: 0 4px 3px 1px #fcfcfc, 0 6px 8px #d6d7d9, 0 -4px 4px #cecfd1, 0 -6px 4px #fefefe, inset 0 0 3px 0 #cecfd1;
            -webkit-transition: all 0.2s ease;
            transition: all 0.2s ease;
            font-family: "Source Sans Pro", sans-serif;
            font-size: 14px;
            font-weight: 600;
            color: #606060;
            text-shadow: 0 1px #fff;
            position: relative;
            z-index: 1;
            vertical-align: middle;
            overflow: hidden;
            margin-top: -15px;
            margin-left: 0px;
            -webkit-border-radius: 50%;
            border-radius: 50%;
            cursor: pointer;
        }

        .btn-floating i {
            font-size: 1.25rem;
            line-height: 47px;
            display: inline-block;
            width: inherit;
            text-align: center;
            /* color: #fff; */
        }

        .btn-floating:hover {
            box-shadow: 0 4px 3px 1px #fcfcfc, 0 6px 8px #d6d7d9, 0 -4px 4px #cecfd1, 0 -6px 4px #fefefe, inset 0 0 3px 3px #cecfd1;
        }
    </style>
