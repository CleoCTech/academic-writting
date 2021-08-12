<div>
    {{-- To attain knowledge, add things every day; To attain wisdom, subtract things every day --}}
    <div wire:loading>
        @livewire('general.loader')
    </div>
    <div class=" flex items-center justify-center px-4 py-6">

        <div class="bg-gray-100 w-full rounded-lg shadow-xl">
            <div class="p-4 border-b">
                <h2 class="text-2xl ">
                    Order Details
                </h2>
                <p class="text-sm text-gray-500">
                    Personal details and application.
                </p>
            </div>
            <div>
                <div class="md:grid md:grid-cols-3 hover:bg-gray-50 md:space-y-0 space-y-1 p-2 border-b">

                    <p class="text-gray-600 pl-2">
                        Order ID:
                    </p>
                    <div class="col-span-2 ...">
                        <p class="uppercase">
                            {{ $orderDetails->order_no }}
                        </p>
                    </div>
                </div>
                <div class="md:grid md:grid-cols-3 hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
                    <p class="text-gray-600">
                       Subject:
                    </p>
                    <div class="col-span-2 ...">
                    <p>
                        {{ $orderDetails->category->subject }}
                    </p>
                    </div>
                </div>
                <div class="md:grid md:grid-cols-3 hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
                    <p class="text-gray-600">
                        Pages:
                    </p>
                    <div class="col-span-2 ...">
                    <p>
                        {{ $orderDetails->pages }}
                    </p>
                    </div>
                </div>
                <div class="md:grid md:grid-cols-3 hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
                    <p class="text-gray-600">
                        Price:
                    </p>
                    <div class="col-span-2 ...">
                    <p>
                        $ {{ $orderDetails->bill->proposed_resell_price }} per page
                    </p>
                    </div>
                </div>
                <div class="md:grid md:grid-cols-3 hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
                    <p class="text-gray-600">
                        Deadline:
                    </p>
                    <div class="col-span-2 ...">
                    <p>
                        {{$this->calDeadline($orderDetails->deadline_date, $orderDetails->deadline_time)}}
                    </p>
                    </div>
                </div>
                <div class="md:grid md:grid-cols-3 hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
                    <p class="text-gray-600">
                        Order Description:
                    </p>
                    <div class="col-span-2 ...">
                    <p>
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
                        <p>*** No files ***</p>
                        @endif

                    </div>
                    </div>
                </div>
                <hr>

                <div class="p-4">
                    <label class="font-semibold text-gray-700 py-2">Your Bid Price (per page)</label>
                    <input wire:model.defer='bidPrice' placeholder=""
                        class="my-4 py-2 appearance-none block w-1/3 bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-4"
                        type="number">
                    <textarea wire:model.defer='message' cols="30" rows="4" class="border-4 border-light-blue-500 border-opacity-25  border-2 p-3 md:text-xl w-1/2" placeholder="Message"></textarea>

                     <div class="text-right md:space-x-3 md:block flex flex-col-reverse">
                        <a class="btn btn-primary p-3 mb-2" id="kt_toolbar_primary_button" wire:click='bid'>Submit Bid</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
