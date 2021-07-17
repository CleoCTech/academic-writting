<div>
    {{-- Close your eyes. Count to one. That is how long forever feels. --}}
    <div class="px-10 my-4 py-6 rounded shadow-xl bg-white w-5/5 mx-auto" >

        @if (session()->has('success'))
        <div class="alert float-right grid grid-cols-3 gap-4" style="margin-top: -3rem;">
            <div class="col-span-2 ..."></div>
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
                            <span class="font-semibold"> {{ session('success') }}</span>
                            {{-- <span class="block text-gray-500">Anyone with a link can now view this file</span> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif
        @if (session()->has('error'))
        <div class="alert float-right grid grid-cols-3 gap-4" style="margin-top: -3rem;">
            <div class="col-span-2 ..."></div>
            <div class="m-auto">
                <div class="bg-danger rounded-lg border-gray-300 border p-3 shadow-lg"
                    style="background-color: rgba(224,52,18,.1) !important; color: rgba(224,52,18,.5);">
                    <div class="flex flex-row">
                        <div class="px-2 text-damger">
                            <i class="text-danger fas fa-times-circle fa-2x"></i>
                        </div>
                        <div class="">
                            <span class="font-semibold text-danger"> {{ session('error') }}</span>
                            {{-- <span class="block text-gray-500">Anyone with a link can now view this file</span> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif
        <button wire:click='redirecTo()' type="button" class="rounded btn btn-primary">
            <i style="font-size: 1rem !important;" class="bi bi-arrow-bar-left fa-2x"></i>
           Back
        </button>

        <div class="flex flex-col sm:flex-row items-center py-8">
            <h2 class="font-semibold text-lg mr-auto underline">Test Details</h2>

            <span class=""> <!-- Red Label -->
                @if ($testDetails->status != "Pending" )
                <label class="inline-block rounded-full text-white
                bg-green-400 hover:bg-green-500 duration-300
                text-xs font-bold
                mr-1 md:mr-2 mb-2 px-2 md:px-4 py-1
                opacity-90 hover:opacity-100">
                Verified
                </label>
                @else
                <label  class="inline-block rounded-full text-white
                    bg-red-400 hover:bg-red-500 duration-300
                    text-xs font-bold
                    mr-1 md:mr-2 mb-2 px-2 md:px-4 py-1
                    opacity-90 hover:opacity-100">
                    Unverified
                </label>
                @endif
        </span>
            {{-- <div class="w-full sm:w-auto sm:ml-auto mt-3 sm:mt-0"></div> --}}
        </div>

        <div class="flex flex-col sm:flex-row items-center" style="margin-top: -1rem;">
            <label class="font-bold text-gray-600 py-0">Question:</label>
            <span class="float-right">
            <label for="" class="ml-2">
                {{$testDetails->test->question}}
            </label>
            </span>
        </div>
        <br class="">
        <div class="flex flex-col sm:flex-row items-center py-3" style="margin-top: -1rem;">
            <label class="font-bold text-gray-600 py-0">Instructions:</label>
            <span class="float-right">
            <label for="" class="ml-2">
                {{$testDetails->test->instructions}}
            </label>
            </span>
        </div>
        <hr class="">

        <div class="">
            <p class="">{!! $testDetails->paper !!}</p>
        </div>
        <hr class="">

        <div class="">
            <h4 class="text-blue-400 " style="margin-top: 1rem;">
                Verify/Reject With Remarks
            </h4>
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="form-group">
                        <textarea class="form-control" rows="3" id="body" wire:model.defer="remarks"></textarea>@error('instructions') <span class="error" style="color:red">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>
        </div>

        <div class="flex-auto flex flex-row-reverse">
            <button wire:click='verifyTest' class="text-base  ml-2  hover:scale-110 focus:outline-none flex justify-center px-4 py-2 rounded font-bold cursor-pointer
                hover:bg-green-500
                bg-gray-100
                btns
                text-gray-700
                border duration-200 ease-in-out
                border-teal-600 transition">Verify</button>
            <button wire:click='rejectTest' class="text-base hover:scale-110 focus:outline-none  flex justify-center px-4 py-2 rounded font-bold cursor-pointer
                hover:bg-red-600
                bg-gray-100
                btns
                text-gray-700
                border duration-200 ease-in-out
                border-teal-600 transition">Reject</button>
        </div>
    </div>

    <style>
        .btns:hover{
            color:white !important;
        }
        ol, ul {
            list-style: none;
            margin: 0;
            padding: 0;
        }
    </style>
</div>
