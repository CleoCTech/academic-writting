<div>
    {{-- The whole world belongs to you --}}
    <div class="px-10 my-4 py-6 rounded shadow-xl bg-white w-5/5 mx-auto">
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
        <div class="bg-white shadow rounded-lg p-6">
            <div class="flex justify-between items-center">
                <span class="">
                    <p class="text-lg text-gray-700 font-bold hover:text-gray-600">
                        Completed {{$stage}} of 9
                    </p>
                </span>
            </div>
            <div class="border-t mt-6 pt-3"></div>
            <div wire:loading>
                @livewire('general.please-wait')
            </div>
            <div class="grid lg:grid-cols-1 gap-1" wire:click="settings('contacts')">
              <div class=" focus-within:border-blue-500 focus-within:text-blue-500 transition-all duration-500 relative rounded p-1">
                <div class="flex items-center justify-between w-full p-2 lg:rounded-full md:rounded-full hover:bg-gray-100 cursor-pointer border-2 rounded-lg">

                    <div class="lg:flex md:flex items-center" >
                        @if ($contacts)
                            <i class="bi bi-check-circle fa-3x h-12 w-12 mb-2 lg:mb-0 border md:mb-0 rounded-full mr-3"></i>
                        @else
                            <i class="bi bi-exclamation-circle fa-3x h-12 w-12 mb-2 lg:mb-0 border md:mb-0 rounded-full mr-3"></i>
                        @endif


                    <div class="flex flex-col">

                        <div class="text-sm leading-3 text-gray-700 font-bold w-full">Contacts</div>

                        <div class="text-xs text-gray-600 w-full">Name, Verified Email & Phone Number</div>

                    </div>

                    </div>

                    <i class="bi bi-chevron-compact-right  fa-3x"></i>

                </div>
              </div>
            </div>
            <div class="grid lg:grid-cols-1 gap-1" wire:click="settings('profile')">
              <div class=" focus-within:border-blue-500 focus-within:text-blue-500 transition-all duration-500 relative rounded p-1">
                <div class="flex items-center justify-between w-full p-2 lg:rounded-full md:rounded-full hover:bg-gray-100 cursor-pointer border-2 rounded-lg">

                    <div class="lg:flex md:flex items-center">
                        @if ($profile)
                            <i class="bi bi-check-circle fa-3x h-12 w-12 mb-2 lg:mb-0 border md:mb-0 rounded-full mr-3"></i>
                        @else
                            <i class="bi bi-exclamation-circle fa-3x h-12 w-12 mb-2 lg:mb-0 border md:mb-0 rounded-full mr-3"></i>
                        @endif

                    <div class="flex flex-col">

                        <div class="text-sm leading-3 text-gray-700 font-bold w-full">Profile</div>

                        <div class="text-xs text-gray-600 w-full">Avatar, Username, About, Subjects, Language & Education Degree</div>

                    </div>

                    </div>

                    <i class="bi bi-chevron-compact-right  fa-3x"></i>

                </div>
              </div>
            </div>
            <div class=" grid lg:grid-cols-1 gap-1" wire:click="settings('id-verify')"  >
              <div class="focus-within:border-blue-500 focus-within:text-blue-500 transition-all duration-500 relative rounded p-1" >
                <div class=" flex items-center justify-between w-full p-2 lg:rounded-full md:rounded-full hover:bg-gray-100 cursor-pointer border-2 rounded-lg">

                    <div class="lg:flex md:flex items-center">
                        @if ($first_section)
                            @if ($id_verification)
                                <i class="bi bi-check-circle fa-3x h-12 w-12 mb-2 lg:mb-0 border md:mb-0 rounded-full mr-3"></i>
                            @else
                                <i class="bi bi-exclamation-circle fa-3x h-12 w-12 mb-2 lg:mb-0 border md:mb-0 rounded-full mr-3"></i>
                            @endif

                        @else
                            <i class="bi bi-file-lock fa-3x h-12 w-12 mb-2 lg:mb-0 border md:mb-0 rounded-full mr-3"></i>
                        @endif
                    <div class="flex flex-col">

                        <div class="text-sm leading-3 text-gray-700 font-bold w-full">ID Verification</div>

                        <div class="text-xs text-gray-600 w-full">Valid Goverment ID, Passport or Driver's Licence</div>

                    </div>

                    </div>

                    <i class="bi bi-chevron-compact-right  fa-3x"></i>

                </div>
              </div>
            </div>
            <div class="grid lg:grid-cols-1 gap-1" wire:click="settings('education-verify')">
              <div class=" focus-within:border-blue-500 focus-within:text-blue-500 transition-all duration-500 relative rounded p-1">
                <div class="flex items-center justify-between w-full p-2 lg:rounded-full md:rounded-full hover:bg-gray-100 cursor-pointer border-2 rounded-lg">

                    <div class="lg:flex md:flex items-center">
                        @if ($first_section)
                            @if ($education)
                                <i class="bi bi-check-circle fa-3x h-12 w-12 mb-2 lg:mb-0 border md:mb-0 rounded-full mr-3"></i>
                            @else
                                <i class="bi bi-exclamation-circle fa-3x h-12 w-12 mb-2 lg:mb-0 border md:mb-0 rounded-full mr-3"></i>
                            @endif
                            @else
                            <i class="bi bi-file-lock fa-3x h-12 w-12 mb-2 lg:mb-0 border md:mb-0 rounded-full mr-3"></i>
                        @endif

                    <div class="flex flex-col">

                        <div class="text-sm leading-3 text-gray-700 font-bold w-full">Education</div>

                        <div class="text-xs text-gray-600 w-full">Valid Academic degree Certificates</div>

                    </div>

                    </div>

                    <i class="bi bi-chevron-compact-right  fa-3x"></i>

                </div>
              </div>
            </div>
            <div class="grid lg:grid-cols-1 gap-1" wire:click="settings('work-experience')">
              <div class=" focus-within:border-blue-500 focus-within:text-blue-500 transition-all duration-500 relative rounded p-1">
                <div class="flex items-center justify-between w-full p-2 lg:rounded-full md:rounded-full hover:bg-gray-100 cursor-pointer border-2 rounded-lg">

                    <div class="lg:flex md:flex items-center">
                        @if ($first_section)
                            @if ($work)
                                <i class="bi bi-check-circle fa-3x h-12 w-12 mb-2 lg:mb-0 border md:mb-0 rounded-full mr-3"></i>
                            @else
                                <i class="bi bi-exclamation-circle fa-3x h-12 w-12 mb-2 lg:mb-0 border md:mb-0 rounded-full mr-3"></i>
                            @endif
                        @else
                            <i class="bi bi-file-lock fa-3x h-12 w-12 mb-2 lg:mb-0 border md:mb-0 rounded-full mr-3"></i>
                        @endif

                    <div class="flex flex-col">

                        <div class="text-sm leading-3 text-gray-700 font-bold w-full">Work Experience</div>

                        <div class="text-xs text-gray-600 w-full">CV, Screenshots/Links of account you worked before(if any)</div>

                    </div>

                    </div>

                    <i class="bi bi-chevron-compact-right  fa-3x"></i>

                </div>
              </div>
            </div>
            <div class="grid lg:grid-cols-1 gap-1" wire:click="settings('test')">
              <div class=" focus-within:border-blue-500 focus-within:text-blue-500 transition-all duration-500 relative rounded p-1">
                <div class="flex items-center justify-between w-full p-2 lg:rounded-full md:rounded-full hover:bg-gray-100 cursor-pointer border-2 rounded-lg">

                    <div class="lg:flex md:flex items-center">
                        @if ($first_section)
                            @if ($test)
                                <i class="bi bi-check-circle fa-3x h-12 w-12 mb-2 lg:mb-0 border md:mb-0 rounded-full mr-3"></i>
                            @else
                                <i class="bi bi-exclamation-circle fa-3x h-12 w-12 mb-2 lg:mb-0 border md:mb-0 rounded-full mr-3"></i>
                            @endif
                        @else
                            <i class="bi bi-file-lock fa-3x h-12 w-12 mb-2 lg:mb-0 border md:mb-0 rounded-full mr-3"></i>
                        @endif

                    <div class="flex flex-col">

                        <div class="text-sm leading-3 text-gray-700 font-bold w-full">Writing Samples</div>

                        <div class="text-xs text-gray-600 w-full">Pass a test, add more other sampples</div>

                    </div>

                    </div>

                    <i class="bi bi-chevron-compact-right  fa-3x"></i>

                </div>
              </div>
            </div>
            <div class="grid lg:grid-cols-1 gap-1">
              <div class=" focus-within:border-blue-500 focus-within:text-blue-500 transition-all duration-500 relative rounded p-1">
                <div class="flex items-center justify-between w-full p-2 lg:rounded-full md:rounded-full hover:bg-gray-100 cursor-pointer border-2 rounded-lg">

                    <div class="lg:flex md:flex items-center">
                        @if ($second_section)
                            @if ($payment)
                                <i class="bi bi-check-circle fa-3x h-12 w-12 mb-2 lg:mb-0 border md:mb-0 rounded-full mr-3"></i>
                            @else
                                <i class="bi bi-exclamation-circle fa-3x h-12 w-12 mb-2 lg:mb-0 border md:mb-0 rounded-full mr-3"></i>
                            @endif
                        @else
                            <i class="bi bi-file-lock fa-3x h-12 w-12 mb-2 lg:mb-0 border md:mb-0 rounded-full mr-3"></i>
                        @endif

                    <div class="flex flex-col">

                        <div class="text-sm leading-3 text-gray-700 font-bold w-full">Payment Account</div>

                        <div class="text-xs text-gray-600 w-full">Add personal payment account & verify it</div>

                    </div>

                    </div>

                    <i class="bi bi-chevron-compact-right  fa-3x"></i>

                </div>
              </div>
            </div>
            <div class="grid lg:grid-cols-1 gap-1">
              <div class=" focus-within:border-blue-500 focus-within:text-blue-500 transition-all duration-500 relative rounded p-1">
                <div class="flex items-center justify-between w-full p-2 lg:rounded-full md:rounded-full hover:bg-gray-100 cursor-pointer border-2 rounded-lg">

                    <div class="lg:flex md:flex items-center">
                        @if ($second_section)
                            @if ($depo)
                                <i class="bi bi-check-circle fa-3x h-12 w-12 mb-2 lg:mb-0 border md:mb-0 rounded-full mr-3"></i>
                            @else
                                <i class="bi bi-exclamation-circle fa-3x h-12 w-12 mb-2 lg:mb-0 border md:mb-0 rounded-full mr-3"></i>
                            @endif
                        @else
                            <i class="bi bi-file-lock fa-3x h-12 w-12 mb-2 lg:mb-0 border md:mb-0 rounded-full mr-3"></i>
                        @endif

                    <div class="flex flex-col">

                        <div class="text-sm leading-3 text-gray-700 font-bold w-full">Add Deposit</div>

                        <div class="text-xs text-gray-600 w-full">Deposit 60USD via verified payment account</div>

                    </div>

                    </div>

                    <i class="bi bi-chevron-compact-right  fa-3x"></i>

                </div>
              </div>
            </div>
            <div class="grid lg:grid-cols-1 gap-1">
              <div class=" focus-within:border-blue-500 focus-within:text-blue-500 transition-all duration-500 relative rounded p-1">
                <div class="flex items-center justify-between w-full p-2 lg:rounded-full md:rounded-full hover:bg-gray-100 cursor-pointer border-2 rounded-lg">

                    <div class="lg:flex md:flex items-center">
                        @if ($second_section)
                            @if ($review)
                                <i class="bi bi-check-circle fa-3x h-12 w-12 mb-2 lg:mb-0 border md:mb-0 rounded-full mr-3"></i>
                            @else
                                <i class="bi bi-exclamation-circle fa-3x h-12 w-12 mb-2 lg:mb-0 border md:mb-0 rounded-full mr-3"></i>
                            @endif
                        @else
                            <i class="bi bi-file-lock fa-3x h-12 w-12 mb-2 lg:mb-0 border md:mb-0 rounded-full mr-3"></i>
                        @endif

                    <div class="flex flex-col">

                        <div class="text-sm leading-3 text-gray-700 font-bold w-full">Application Review</div>

                        <div class="text-xs text-gray-600 w-full">Waiting for account to be reviewed...</div>

                    </div>

                    </div>

                    <i class="bi bi-chevron-compact-right  fa-3x"></i>

                </div>
              </div>
            </div>

            <div class="border-t mt-6 pt-3"></div>
        </div>

    </div>

    <style>
        /* .disabled:hover {
            cursor: not-allowed !important;
        } */

        /* .disabled{
            pointer-events: none;
            cursor: not-allowed;
        } */
    </style>
    <script>
        window.livewire.on('alert_remove',()=>{
                setTimeout(function(){ $(".alert").fadeOut('fast');
                }, 3000); // 3 secs
        });
    </script>
</div>
