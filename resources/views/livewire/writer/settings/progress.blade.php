<div>
    {{-- The whole world belongs to you --}}
    <div class="px-10 my-4 py-6 rounded shadow-xl bg-white w-5/5 mx-auto" wire:poll>
        <div class="bg-white shadow rounded-lg p-6">
            <div class="flex justify-between items-center">
                <span class="">
                    <a class="text-lg text-gray-700 font-bold hover:text-gray-600" href="#">
                        Completed 2 of 9
                    </a>
                </span>
            </div>
            <div class="border-t mt-6 pt-3"></div>

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
</div>
