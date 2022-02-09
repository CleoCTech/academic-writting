<div>
    {{-- Stop trying to control. --}}
    <div wire:loading wire:target="getMessage, sendFiles, deleteFile, getDownload, orderSubmitTab, messagesTab, optionTwo, optionOne">
        @livewire('general.loader')
    </div>
    <button wire:click='default' type="button" class="rounded btn btn-primary">
        <i style="font-size: 1rem !important;" class="bi bi-arrow-bar-left fa-2x"></i>
       Back
    </button>
    <div class="content fs-6 d-flex flex-column flex-column-fluid" id="kt_content">
        <div class="max-w-full  bg-white flex flex-col rounded overflow-hidden shadow-lg" id="kt_post"
            style="margin: 2rem;">
            <div class="flex flex-row items-baseline flex-nowrap bg-gray-100 p-2">
                <h1 class="ml-2 uppercase font-bold text-gray-500"> {{ $orderDetails->order_no }}</h1>
                <p class="ml-2 font-normal text-gray-500"> {{ $orderDetails->topic }}</p>
            </div>
            <div class="md:grid md:grid-cols-3 hover:bg-gray-50 md:space-y-0 space-y-1 p-2 border-b">

                <p class="text-gray-600 pl-2">
                    Price:
                </p>
                <div class="col-span-2 ...">
                    <p class="font-semibold">
                        $ {{ $orderDetails->bill->sale_price }} per page
                    </p>
                </div>
            </div>
            <div class="md:grid md:grid-cols-3 hover:bg-gray-50 md:space-y-0 space-y-1 p-2 border-b">

                <p class="text-gray-600 pl-2">
                    Pages:
                </p>
                <div class="col-span-2 ...">
                    <p class="font-semibold">
                        {{ $orderDetails->pages }} page
                    </p>
                </div>
            </div>
            <div class="md:grid md:grid-cols-3 hover:bg-gray-50 md:space-y-0 space-y-1 p-2 border-b">

                <p class="text-gray-600 pl-2">
                    Subject:
                </p>
                <div class="col-span-2 ...">
                    <p class="font-semibold">
                        {{ $orderDetails->category->subject }}
                    </p>
                </div>
            </div>
            <div class="md:grid md:grid-cols-3 hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
                <p class="text-gray-600">
                    Deadline:
                </p>
                <div class="col-span-2 ...">
                <p class="font-semibold">
                    {{$this->calDeadline($orderDetails->deadline_date, $orderDetails->deadline_time)}}
                </p>
                </div>
            </div>
            <div class="md:grid md:grid-cols-3 hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
                <p class="text-gray-600">
                    Order Description:
                </p>
                <div class="col-span-3 ...">
                <p class="font-semibold">
                    {{ $orderDetails->instructions }}
                </p>
                </div>
            </div>
            <div class="md:grid md:grid-cols-3 hover:bg-gray-50 md:space-y-0 space-y-1 p-4">
                <p class="text-gray-600">
                    Attachments:
                </p>
                <div class="col-span-2 ...">
                <div class="space-y-2">
                    <div>
                        @if (session()->has('message'))
                        <div class="alert alert-danger">
                            {{ session('message') }}
                        </div>
                        @endif
                    </div>
                    @if (count($orderFiles)>0)
                        @foreach ($orderFiles as $orderFile)
                            <div class="border-2 flex items-center p-2 rounded justify-between space-x-2">
                                <div class="space-x-2 truncate">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="fill-current inline text-gray-500" width="24" height="24"
                                        viewBox="0 0 24 24">
                                        <path
                                            d="M17 5v12c0 2.757-2.243 5-5 5s-5-2.243-5-5v-12c0-1.654 1.346-3 3-3s3 1.346 3 3v9c0 .551-.449 1-1 1s-1-.449-1-1v-8h-2v8c0 1.657 1.343 3 3 3s3-1.343 3-3v-9c0-2.761-2.239-5-5-5s-5 2.239-5 5v12c0 3.866 3.134 7 7 7s7-3.134 7-7v-12h-2z" />
                                        </svg>
                                    <span>
                                        {{$orderFile->filename}}
                                    </span>
                                </div>
                                <a wire:click="getDownload('{{$orderFile->folder}}/{{$orderFile->filename}}')"
                                    class="text-purple-700 cursor-pointer hover:underline" download="{{$orderFile->filename}}">
                                    Download
                                </a>
                            </div>
                        @endforeach
                    @else
                    <p class="font-semibold">*** No files ***</p>
                    @endif

                </div>
                </div>
            </div>
            <hr>
        </div>

        <div class="max-w-full  bg-white flex flex-col rounded overflow-hidden shadow-lg" id="kt_post" style="margin: 2rem; ">
            <div class="flex flex-row items-baseline flex-nowrap bg-gray-100 p-2">
                {{-- <h1 class="ml-2 uppercase font-bold text-gray-500"> Messages </h1> --}}
                <nav class="flex sm:flex-row">
                    <button wire:click='messagesTab'
                    class="text-gray-600
                     py-4 px-6 block
                     hover:text-blue-500
                     focus:outline-none
                     {{ ($messagesTab)? 'text-blue-500 border-b-2 font-medium border-blue-500  ':'' }}
                     ">
                        Messages
                    </button><button wire:click='orderSubmitTab'
                    class="text-gray-600
                    py-4 px-6 block
                    hover:text-blue-500
                    focus:outline-none
                    {{ ($orderSubmitTab)? 'text-blue-500 border-b-2 font-medium border-blue-500  ':'' }}
                    ">
                        Order Submision
                    </button>
                </nav>
            </div>

            @if ($messagesTab)
            <div  class="tabs  text-blue-800 m-10">
                <div class="top flex text-gray-100 rounded-t-md overflow-hidden">
                  {{-- <div class="header p-2 px-3 bg-indigo-800 w-full font-semibold uppercase">Tabs</div> --}}
                  <div class="buttons ml-auto my-auto flex">
                    <span wire:click='optionOne' tab="1" class="{{ ($option1) ? 'btn bg-gray-400' : 'btn bg-gray-100'}} cursor-pointer p-2 px-3">Support</span>
                    <span wire:click='optionTwo' tab="2" class="{{ ($option2) ? 'btn bg-gray-400' : 'btn bg-gray-100'}} cursor-pointer p-2 px-3">Client</span>
                  </div>
                </div>
                <div class="center text-gray-800 relative">
                    @if ($option1)
                         <!-- tab start -->
                         <div class="grid grid-cols-3 gap-4">
                            <div class="flex flex-col bg-gray-200">

                                 <ul class="overflow-auto">
                                    <h2 class="ml-2 mb-2 text-gray-600 text-lg my-2">Chats</h2>

                                    <li>
                                        @foreach ($supports as $key => $item)
                                            {{-- {{  dd($item['model_type']) }} --}}
                                            @if ($item['model_type'] == 'App\Models\User')
                                            <a wire:click="getMesssage('{{ $item['id'] }}', '{{ $item['model_type'] }}')" class="hover:bg-gray-100 border-b border-gray-300 px-3 py-2 cursor-pointer flex items-center text-sm focus:outline-none focus:border-gray-300 transition duration-150 ease-in-out">
                                                <img class="h-10 w-10 rounded-full object-cover"
                                                src="{{ Avatar::create($item['name'])->toBase64() }}"
                                                alt="username" />
                                                <div class="w-full pb-2">
                                                    <div class="flex justify-between">
                                                        <span class="block ml-2 font-semibold text-base text-gray-600 ">{{ $item['name'] }}</span>
                                                        <span class="block ml-2 text-sm text-gray-600"> {{ $this->getTimeForLastMsg( $item['id'], $item['model_type']) }}</span>
                                                    </div>
                                                    <span class="block ml-2 text-sm text-gray-600">{{ $this->getlastMessage( $item['id'], $item['model_type']) }}</span>
                                                </div>
                                            </a>
                                            @endif
                                        @endforeach
                                    </li>
                                 </ul>
                            </div>
                            <div class="col-span-2">
                                <div class="flex flex-col bg-white">
                                    <div id="chat" class="flex mt-2 flex-col overflow-y-scroll	 space-y-3 mb-20 pb-3 " style="max-height: 300px">
                                        @foreach ($txtMessages as $item)
                                            @if ($item->fromable_type != "App\Models\Writer")
                                                 <div class="other break-all mt-2  ml-5 rounded-bl-none float-none bg-gray-300 mr-auto rounded-2xl p-2">
                                                    {{ $item->message }}
                                                </div>
                                            @else
                                                 <div
                                                    class="w-max ml-auto break-all mt-2 mb-1 p-2 rounded-br-none bg-blue-500 rounded-2xl text-white text-left mr-5">
                                                    {{ $item->message }}
                                                </div>
                                            @endif
                                        @endforeach
                                    </div>
                                    <div class="flex flex-row  items-center  bottom-0 my-2 w-full">
                                        <div class="ml-2 flex flex-row border-gray items-center w-full border rounded-3xl h-12 px-2">
                                            <div class="w-full">
                                                <input wire:model.defer='messageText' type="text" id="message"
                                                    class="border rounded-2xl border-transparent w-full focus:outline-none text-sm h-10 flex items-center {{ ($toable_id != null) ? '' : 'cursor-not-allowed' }}"
                                                    placeholder="Type your message...."  {{ ($toable_id != null) ? '' : 'disabled' }}/>
                                            </div>
                                        </div>
                                        <div>
                                            <button wire:click='sendMessage' id="self"
                                                class="flex items-center justify-center h-10 w-10 mr-2 rounded-full bg-gray-200 hover:bg-gray-300
                                                text-indigo-800  focus:outline-none" {{ ($toable_id != null) ? '' : 'disabled' }}>
                                                <svg class="w-5 h-5 transform rotate-90 -mr-px" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path>
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                         </div>
                        <!--     tab end -->
                    @endif
                    @if ($option2)
                        <!-- tab start -->
                        @if ($approved)
                         <div class="grid grid-cols-3 gap-4 mt-5">
                            <div class="flex flex-col bg-gray-200">

                            </div>
                            <div class="col-span-2">
                                <div class="flex flex-col bg-white">
                                    <div id="chat" class="flex flex-col mt-2 overflow-y-scroll	 space-y-3 mb-20 pb-3 " style="max-height: 300px">
                                        @foreach ($clientmessages as $item)
                                            @if ($item->fromable_type != "App\Models\Writer")
                                            @if ($item->is_read == 0)
                                            {{ $this->setOnread($item->id) }}
                                            @endif
                                                 <div class="other break-all mt-2  ml-5 rounded-bl-none float-none bg-gray-300 mr-auto rounded-2xl p-2">
                                                    {{ $item->message }}
                                                </div>
                                            @else
                                                 <div
                                                    class="w-max ml-auto break-all mt-2 mb-1 p-2 rounded-br-none bg-blue-500 rounded-2xl text-white text-left mr-5">
                                                    {{ $item->message }}
                                                </div>
                                            @endif
                                        @endforeach
                                    </div>
                                    <div class="flex flex-row  items-center  bottom-0 my-2 w-full">
                                        <div class="ml-2 flex flex-row border-gray items-center w-full border rounded-3xl h-12 px-2">
                                            <div class="w-full">
                                                <input wire:model.defer='cleintmessageText' type="text" id="message"
                                                    class="border rounded-2xl border-transparent w-full focus:outline-none text-sm h-10 flex items-center {{ ($toableclient_id != null) ? '' : 'cursor-not-allowed' }}"
                                                    placeholder="Type your message...." {{ ($toableclient_id != null) ? '' : 'disabled' }}/>
                                            </div>
                                        </div>
                                        <div>
                                            <button wire:click='sendMessage' id="self"
                                                class="flex items-center justify-center h-10 w-10 mr-2 rounded-full bg-gray-200 hover:bg-gray-300
                                                text-indigo-800 focus:outline-none" {{ ($toableclient_id != null) ? '' : 'disabled' }}>
                                                <svg class="w-5 h-5 transform rotate-90 -mr-px" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path>
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                         </div>
                         @else

                         <div class="grid grid-cols-3 gap-4 mt-5">
                            <div class="flex flex-col bg-gray-200">

                                <div class="flex justify-center mt-3">
                                    <label for="" class="font-semibold mr-3 mt-2">Select Admin:</label>
                                    <div class="mb-3 xl:w-96">
                                        <select wire:model.defer='admin_id' class="form-select appearance-none
                                        block
                                        w-full
                                        px-3
                                        py-1.5
                                        text-base
                                        font-normal
                                        text-gray-700
                                        bg-white bg-clip-padding bg-no-repeat
                                        border border-solid border-gray-300
                                        rounded
                                        transition
                                        ease-in-out
                                        m-0
                                        focus:text-gray-700 focus:bg-white focus:border-blue-600  @error('admin_id'): border-red-600 outline-red-600 @enderror" aria-label="Default select example">
                                            <option selected>Open this select menu</option>
                                            @foreach ($supports as $item)
                                                <option  value="{{ $item['id'] }}">{{ $item['name'] }}</option>
                                            @endforeach
                                        </select>
                                        @error('admin_id')
                                        <div class="block w-full text-red-500">{{  $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="col-span-2">
                                <div class="flex flex-col">
                                    <button wire:click='makeClientChatRequest' wire.target='makeClientChatRequest'
                                    wire:loading.class= "cursor-not-allowed"
                                    wire:loading.attr="disabled"
                                    type="button" class="rounded btn btn-primary" >
                                        <i style="font-size: 1rem !important;" class="bi bi-info-square fa-2x"></i>
                                        <svg wire.loading wire.target='makeClientChatRequest'
                                        class="hidden animate-spin -ml-1 mr-3 h-5 w-5 text-white"
                                        wire:loading.class.remove= "hidden"
                                        xmlns="http://www.w3.org/2000/svg"
                                        fill="none" viewBox="0 0 24 24" >
                                        <circle wire:loading wire:target="makeClientChatRequest" class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                        <path wire:loading wire:target="makeClientChatRequest" class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                        </svg>
                                        Request to chat with the client
                                    </button>
                                </div>
                            </div>
                        </div>
                         @endif
                    @endif
                </div>
            </div>
            @endif
            @if ($orderSubmitTab)
            <div class="container pb-5">
                <div class="flex-stack mb-9">
                    <div class=" align-items-center">
                        <div class=" flex-column mb-4">
                            <h4 class="text-blue-400 " style="margin-top: 1rem;">Your
                                Files
                                <span class="svg-icon svg-icon-4 ">
                                    <i class="bi bi-paperclip text-blue-400"></i>
                                </span>
                            </h4>
                        </div>
                        @foreach ($writerFiles as $writerFile)
                        {{-- @php
                            $path = $clientFile->folder.'/'.$clientFile->filename;
                            // getDownload( {{$clientFile->folder'/'$clientFile->filename}} )
                        // dd($path);
                        @endphp --}}
                        <div class="row">
                            <div>
                                @if (session()->has('message'))
                                <div class="alert alert-danger">
                                    {{ session('message') }}
                                </div>
                                @endif
                            </div>
                            <div class="col-md-4">
                                <a wire:click="getDownload('{{$writerFile->folder}}/{{$writerFile->filename}}')" class="text-gray-600 text-hover-primary link-download fw-bold fs-6 mb-3 ">{{$writerFile->filename}}
                                </a>
                            </div>
                            <div class="col-md-2 p-1">
                                <a wire:click="deleteFile('{{$writerFile->folder}}')"
                                    type="button" class="btn-floating btn-small"
                                    download="{{$writerFile->filename}}"> <span
                                        class="svg-icon svg-icon-3 text-hover-danger">
                                        <i class="bi bi-trash-fill fs-4"></i>
                                    </span></a>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                <h4 class="text-blue-400 pb-1" style="margin-top: 1rem;">Add
                    Files
                    <span class="svg-icon svg-icon-4 ">
                        <i class="bi bi-paperclip text-blue-400"></i>
                    </span>
                </h4>
                <div  class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <input type="file" name="paperFile" id="test"
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
                <br>
               <button wire:click='sendFiles'
                    class=" btn-primary transition duration-150 ease-in-out transform hover:scale-110 bg-emerald-600 text-white font-semibold py-3 px-6 rounded-md">
                    <span class="text-white svg-icon svg-icon-2 rotate-180">
                        <i class="bi bi-check2-all fs-4 text-white"></i>
                    </span>
                    Confirm

                </button>
            </div>
            @endif

        </div>
        </div>
    </div>

    <style>
        .link-download:hover {
                text-decoration: underline !important;
                cursor: pointer;
            }
    </style>
    <script>
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
            document.getElementById("self").click();
            input.value = '';
        }
        });
    </script>
</div>

