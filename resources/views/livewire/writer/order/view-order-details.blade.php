<div>
    {{-- To attain knowledge, add things every day; To attain wisdom, subtract things every day --}}
    <div wire:loading>
        @livewire('general.loader')
    </div>
    @if ( session()->has('success') )
    <div
        class="flex justify-center items-center m-1 font-medium py-1 px-2 bg-white rounded-md text-green-700 bg-green-100 border border-green-300  mt-8">
        <div slot="avatar">
            <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" fill="none" viewBox="0 0 24 24"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                class="feather feather-check-circle w-5 h-5 mx-2">
                <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                <polyline points="22 4 12 14.01 9 11.01"></polyline>
            </svg>
        </div>
        <div class="text-xl font-normal  max-w-full flex-initial">
            {{ session('success') }}</div>
        <div class="flex flex-auto flex-row-reverse">
            <div>
                <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="feather feather-x cursor-pointer hover:text-green-400 rounded-full w-5 h-5 ml-2">
                    <line x1="18" y1="6" x2="6" y2="18"></line>
                    <line x1="6" y1="6" x2="18" y2="18"></line>
                </svg>
            </div>
        </div>
    </div>
    @elseif(session()->has('error'))
    <div
        class="flex justify-center items-center m-1 font-medium py-1 px-2 bg-white rounded-md text-red-700 bg-red-100 border border-red-300 ">
        <div slot="avatar">
            <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" fill="none" viewBox="0 0 24 24"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                class="feather feather-alert-octagon w-5 h-5 mx-2">
                <polygon points="7.86 2 16.14 2 22 7.86 22 16.14 16.14 22 7.86 22 2 16.14 2 7.86 7.86 2"></polygon>
                <line x1="12" y1="8" x2="12" y2="12"></line>
                <line x1="12" y1="16" x2="12.01" y2="16"></line>
            </svg>
        </div>
        <div class="text-xl font-normal  max-w-full flex-initial">
            {{ session('error')}}</div>
        <div class="flex flex-auto flex-row-reverse">
            <div>
                <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="feather feather-x cursor-pointer hover:text-red-400 rounded-full w-5 h-5 ml-2">
                    <line x1="18" y1="6" x2="6" y2="18"></line>
                    <line x1="6" y1="6" x2="18" y2="18"></line>
                </svg>
            </div>
        </div>
    </div>
    @endif
    <div class=" flex items-center justify-center px-4 py-6 mt-6">

        <div class="bg-gray-100 w-full rounded-lg shadow-xl">
            <div class="p-4 border-b">
                <h2 class="text-2xl ">
                    Order Details
                </h2>
                <p class="text-sm text-green-500">
                    You can bid price below proposed one.
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
                       Title:
                    </p>
                    <div class="col-span-2 ...">
                    <p>
                        {{ $orderDetails->topic }}
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
                                <div class="border-2 flex items-center p-2 rounded justify-between space-x-2 link-download">
                                    <div class="space-x-2 truncate" wire:click="getDownload('{{$orderFile->folder}}/{{$orderFile->filename}}')">
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
                @if ( session()->has('success') )
                <div
                    class="flex justify-center items-center m-1 font-medium py-1 px-2 bg-white rounded-md text-green-700 bg-green-100 border border-green-300  mt-8">
                    <div slot="avatar">
                        <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="feather feather-check-circle w-5 h-5 mx-2">
                            <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                            <polyline points="22 4 12 14.01 9 11.01"></polyline>
                        </svg>
                    </div>
                    <div class="text-xl font-normal  max-w-full flex-initial">
                        {{ session('success') }}</div>
                    <div class="flex flex-auto flex-row-reverse">
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                class="feather feather-x cursor-pointer hover:text-green-400 rounded-full w-5 h-5 ml-2">
                                <line x1="18" y1="6" x2="6" y2="18"></line>
                                <line x1="6" y1="6" x2="18" y2="18"></line>
                            </svg>
                        </div>
                    </div>
                </div>
                @elseif(session()->has('error'))
                <div
                    class="flex justify-center items-center m-1 font-medium py-1 px-2 bg-white rounded-md text-red-700 bg-red-100 border border-red-300 ">
                    <div slot="avatar">
                        <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="feather feather-alert-octagon w-5 h-5 mx-2">
                            <polygon points="7.86 2 16.14 2 22 7.86 22 16.14 16.14 22 7.86 22 2 16.14 2 7.86 7.86 2"></polygon>
                            <line x1="12" y1="8" x2="12" y2="12"></line>
                            <line x1="12" y1="16" x2="12.01" y2="16"></line>
                        </svg>
                    </div>
                    <div class="text-xl font-normal  max-w-full flex-initial">
                        {{ session('error')}}</div>
                    <div class="flex flex-auto flex-row-reverse">
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                class="feather feather-x cursor-pointer hover:text-red-400 rounded-full w-5 h-5 ml-2">
                                <line x1="18" y1="6" x2="6" y2="18"></line>
                                <line x1="6" y1="6" x2="18" y2="18"></line>
                            </svg>
                        </div>
                    </div>
                </div>
                @endif
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
<style>
    .link-download:hover {
            text-decoration: underline !important;
            cursor: pointer;
        }
</style>
