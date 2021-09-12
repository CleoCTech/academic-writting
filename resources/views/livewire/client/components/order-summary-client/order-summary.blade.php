<div>
    {{-- A good traveler has no fixed plans and is not intent upon arriving. --}}
    <!--begin::Toolbar-->
    <div class="toolbar" id="kt_toolbar">
        <div class="container-fluid d-flex flex-stack flex-wrap flex-sm-nowrap">
            <!--begin::Info-->
            <div class="d-flex flex-column align-items-start justify-content-center flex-wrap me-2">
                <!--begin::Title-->
                <h1 class="text-primary fw-bolder my-1 fs-2">
                    @if ($confirm_invoice)
                    Invoice Inquiry
                    @else
                    Order Progress (Check Answers If Attached Below)
                    @endif

                    <small class="text-muted fs-6 fw-normal ms-1"></small>
                </h1>
                <!--end::Title-->
            </div>
            <!--end::Info-->
            <!--begin::Actions-->
            <div class="d-flex align-items-center flex-nowrap text-nowrap py-1">
                <a class="btn btn-primary" id="kt_toolbar_primary_button" wire:click='back'><span
                        class="svg-icon svg-icon-2 rotate-180"> <i class="bi bi-arrow-bar-left"></i> </span>Back</a>
            </div>
            <!--end::Actions-->
        </div>
    </div>
    <!--end::Toolbar-->


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
                                            <a wire:click="getDownload('{{$writerFile->folder}}')"
                                                class="text-gray-600 text-hover-primary  fw-bold fs-8 mb-3 link-download"
                                                title="Click to download">
                                                {{strlen($writerFile->filename) > 20? substr($writerFile->filename,0,20).'...':$writerFile->filename}}
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
                                                {{strlen($writerFile->filename) > 20? substr($writerFile->filename,0,20).'...':$writerFile->filename}}
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
                                        @if ($this->checkIfOrderPassedStage($orderDetails->id, 'Client') === "Client")

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
                                                    {{-- <a wire:click='activateAcceptSection' class="btn btn-primary">Accept Order</a> --}}
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
                                                        {{-- <label for="Instructions" class="block text-md font-medium text-gray-700">Leave a comment (Optional)</label> --}}
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
                                                    {{-- <a  wire:click='activateRejectSection' class="btn btn-danger">Reject Order</a> --}}
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
                                                            <input type="file" name="paperFile" id="test" multiple>
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
                                        <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md" role="alert">
                                            <div class="flex">
                                                <div class="py-1"><svg class="fill-current h-6 w-6 text-teal-500 mr-4" xmlns="http://www.w3.org/2000/svg"
                                                        viewBox="0 0 20 20">
                                                        <path
                                                            d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z" />
                                                    </svg></div>
                                                <div>
                                                    <p class="font-bold">
                                                        {{ $this->checkIfOrderPassedStage($orderDetails->id, 'Client') }}
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

    </div>
</div>
