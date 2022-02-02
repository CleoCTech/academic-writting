<div>
    {{-- Close your eyes. Count to one. That is how long forever feels. --}}
    <div>
        {{-- @livewire('dashboard.components.overlay.invoice-notification', ['user_id' => '', 'user_type' => '']) --}}
        @livewire('dashboard.components.top-bar', ['user_id' => session()->get('LoggedClient'), 'user_type' => 'App\Models\Client', 'activity' => $activity])
        {{-- {{ dd($activity->value) }} --}}
    </div>
    <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">
            Chat
        </h2>
        <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
            {{-- <button wire:click='back' class="btn btn-primary shadow-md mr-2">Back</button> --}}
            <button wire:click="back" wire.target="back" type="button"
                class="btn btn-lg btn-primary inline-flex items-center px-4 py-2 border border-transparent text-base leading-6 font-medium rounded-md hover:bg-blue-300 ease-in-out duration-150 "
                wire:loading.class="cursor-not-allowed" wire:loading.attr="disabled">
                <svg wire.loading wire.target="back"
                    class="hidden animate-spin -ml-1 mr-3 h-5 w-5 text-white"
                    wire:loading.class.remove="hidden" xmlns="http://www.w3.org/2000/svg"
                    fill="none" viewBox="0 0 24 24">
                    <circle wire:loading wire:target="back" class="opacity-25" cx="12" cy="12"
                        r="10" stroke="currentColor" stroke-width="4"></circle>
                    <path wire:loading wire:target="back" class="opacity-75" fill="currentColor"
                        d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                    </path>
                </svg>
                Back
            </button>
            <div class="dropdown ml-auto sm:ml-0">
                <button class="dropdown-toggle btn px-2 box text-gray-700 dark:text-gray-300" aria-expanded="false">
                    <span class="w-5 h-5 flex items-center justify-center"> <i class="w-4 h-4" data-feather="plus"></i> </span>
                </button>
                <div class="dropdown-menu w-40">
                    <div class="dropdown-menu__content box dark:bg-dark-1 p-2">
                        <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white dark:bg-dark-1 hover:bg-gray-200 dark:hover:bg-dark-2 rounded-md"> <i data-feather="users" class="w-4 h-4 mr-2"></i> Create Group </a>
                        <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white dark:bg-dark-1 hover:bg-gray-200 dark:hover:bg-dark-2 rounded-md"> <i data-feather="settings" class="w-4 h-4 mr-2"></i> Settings </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @livewire('dashboard.pages.components.oder-sum-with-chatbox', [$orderDetails, $revisions, $clientFiles, $confirm_invoice, $total_fee, $user_type, $orderId])

    @guest
    @if (!$orderStatus)
    <div class="intro-y box mt-5">
        <div class="flex flex-col sm:flex-row items-center p-5 border-b border-gray-200 dark:border-dark-5">
            <h2 class="font-medium text-base mr-auto">
                Get Your Order Here
            </h2>
        </div>
        <div id="link" class="p-5">
            <div class="preview">
                <div>
                    <h2 class="text-blue-400 py-2">Attached Files
                        <span class="svg-icon svg-icon-4 ">
                            <i class="bi bi-paperclip text-blue-400"></i>
                        </span>
                    </h2>
                    @if (count($companyFiles) > 0)
                    @foreach ($companyFiles as $companyFile)
                    <div>
                        @if (session()->has('message'))
                        <div class="alert alert-success">
                            {{ session('message') }}
                        </div>
                        @endif
                    </div>
                    <a wire:click="getAnswer('{{ $companyFile->folder }}/{{ $companyFile->filename }}')"
                    class="text-gray-700 dark:text-gray-600 block link-download"
                    title="Click to download">{{strlen($companyFile->filename) > 20?
                        substr($companyFile->filename,0,20).'...':$companyFile->filename}}
                    </a>
                    @endforeach
                    @elseif(count($writerFiles)>0)
                    @foreach ($writerFiles as $writerFile)
                    <div>
                        @if (session()->has('message'))
                        <div class="alert alert-success">
                            {{ session('message') }}
                        </div>
                        @endif
                    </div>
                    <a wire:click="getAnswer('{{$writerFile->folder}}/{{ $writerFile->filename }}')"
                    class="text-gray-700 dark:text-gray-600 block link-download"
                    title="Click to download">{{strlen($writerFile->filename) > 20?
                        substr($writerFile->filename,0,20).'...':$writerFile->filename}}
                    </a>
                    @endforeach
                    @else
                    <p>*** Yet to be uploaded ***</p>
                    @endif
                </div>
            </div>
            @if (count($companyFiles) > 0 || count($writerFiles)> 0)
                <div class="row">
                    @if ($this->orderCurrentStatus($orderDetails->id) == "Client")
                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="text-blue-400 uppercase " style="margin-top: 1rem;">
                                    Accepting Order From Writer
                                    <span class="svg-icon svg-icon-3 text-yellow-500">
                                        <i class="bi bi-exclamation-triangle text-yellow-500"></i>
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
                                                <circle class="opacity-25" cx="12" cy="12" r="10"
                                                    stroke="currentColor" stroke-width="4"></circle>
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
                                            <i class="bi bi-chat-left-text-fill text-blue-400"></i>
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
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="text-blue-400 uppercase " style="margin-top: 1rem;">
                                    Rejecting Order
                                    <span class="svg-icon svg-icon-4 text-yellow-500">
                                        <i class="bi bi-exclamation-triangle text-yellow-500"></i>
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
                                                <circle class="opacity-25" cx="12" cy="12" r="10"
                                                    stroke="currentColor" stroke-width="4"></circle>
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
                                    {{ $this->checkIfOrderPassedStage($orderDetails->id, 'Client')
                                    }}
                                </p>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
            @endif
        </div>
    </div>

    @endif
    @endguest
    <style>
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

    {{-- <script>

        // Livewire.on('messageAdded', () => {

        // })
        window.onload = function() {
            Livewire.on('scroll-y', () => {
                // scrollToBottomFunc();
            })
        }
        // Get the input field
        var input = document.getElementById("message");


        // Execute a function when the user releases a key on the keyboard
        input.addEventListener("keyup",
        function(event) {

        // Number 13 is the "Enter" key on the keyboard
        if (event.keyCode === 13) {
            // Cancel the default action, if needed
            event.preventDefault();
            // Trigger the button element with a click
            document.getElementById("sendMessage").click();
            input.value = '';
        }
        });

    </script> --}}
</div>
