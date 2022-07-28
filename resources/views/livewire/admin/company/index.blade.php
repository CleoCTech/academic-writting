<div>
    <div>
        <div wire:loading>
            @livewire('general.loader')
        </div>
        <div class="content fs-6 d-flex flex-column flex-column-fluid" id="kt_content">
            <div class="toolbar" id="kt_toolbar">
                <div class="container-fluid d-flex flex-stack flex-wrap flex-sm-nowrap">
                    <!--begin::Info-->
                    <div class="d-flex flex-column align-items-start justify-content-center flex-wrap me-2">
                        <!--begin::Title-->
                        <h1 class="text-dark fw-bolder my-1 fs-2">{{ $pageTitle }}</h1>
                        <!--end::Title-->
                    </div>
                    <!--begin::Info-->
                    <div class="d-flex flex-column align-items-start justify-content-center flex-wrap me-2">
                        <!--begin::Title-->
                        <button wire:click='back' type="button" class="rounded btn btn-primary">
                            <i style="font-size: 1rem !important;" class="bi bi-arrow-bar-left fa-2x"></i>
                           Back
                        </button>
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

            {{-- form --}}
            <div class="container mx-auto my-5 p-5">

                <form class="w-full max-w-lg">
                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                            <label class="block uppercase tracking-wide text-gray-700 text-md font-bold mb-2" for="grid-first-name">
                            Account No
                            </label>
                            <input wire:model.defer='account_no' class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="grid-first-name" type="text" placeholder="210145" disabled>

                        </div>
                        <div class="w-full md:w-1/2 px-3">
                            <label class="block uppercase tracking-wide text-gray-700 text-md font-bold mb-2" for="grid-last-name">
                                Componany Name
                            </label>
                            <input wire:model.defer='company_name' class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-last-name" type="text" placeholder="Doe">
                            @error('company_name') <span class="error"><p class="text-red-500 text-md italic">{{ $message }}</p></span> @enderror
                        </div>
                    </div>
                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                            <label class="block uppercase tracking-wide text-gray-700 text-md font-bold mb-2" for="grid-first-name">
                                Short Name
                            </label>
                            <input wire:model.defer='short_name' class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="grid-first-name" type="text" placeholder="Jane">

                        </div>
                        <div class="w-full md:w-1/2 px-3">
                            <label class="block uppercase tracking-wide text-gray-700 text-md font-bold mb-2" for="grid-last-name">
                            Establishment Date
                            </label>
                            <input wire:model.defer='establishment_date' class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-last-name" type="date">
                            @error('establishment_date') <span class="error"><p class="text-red-500 text-md italic">{{ $message }}</p></span> @enderror
                        </div>
                    </div>
                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                            <label class="block uppercase tracking-wide text-gray-700 text-md font-bold mb-2" for="grid-first-name">
                                History
                            </label>
                            <textarea
                                class="
                                    form-control
                                    block
                                    w-full
                                    px-3
                                    py-1.5
                                    text-base
                                    font-normal
                                    text-gray-700
                                    bg-white bg-clip-padding
                                    border border-solid border-gray-300
                                    rounded
                                    transition
                                    ease-in-out
                                    m-0
                                    focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none
                                "
                                id="exampleFormControlTextarea1"
                                rows="3"
                                placeholder="Your message"
                                >
                            </textarea>
                            {{-- <input wire:model.defer='history' class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="grid-first-name" type="text" placeholder="Jane"> --}}

                        </div>
                        <div class="w-full md:w-1/2 px-3">
                            <label class="block uppercase tracking-wide text-gray-700 text-md font-bold mb-2" for="grid-last-name">
                                Vision
                            </label>
                            <input wire:model.defer='vision' class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-last-name" type="text">
                            @error('vision') <span class="error"><p class="text-red-500 text-md italic">{{ $message }}</p></span> @enderror
                        </div>
                    </div>
                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                            <label class="block uppercase tracking-wide text-gray-700 text-md font-bold mb-2" for="grid-first-name">
                                Mission
                            </label>
                            <input wire:model.defer='mission' class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="grid-first-name" type="text" placeholder="Jane">
                        </div>
                        <div class="w-full md:w-1/2 px-3">
                            <label class="block uppercase tracking-wide text-gray-700 text-md font-bold mb-2" for="grid-last-name">
                                Location
                            </label>
                            <input wire:model.defer='location' class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-last-name" type="text">
                            @error('location') <span class="error"><p class="text-red-500 text-md italic">{{ $message }}</p></span> @enderror
                        </div>
                    </div>
                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                            <label class="block uppercase tracking-wide text-gray-700 text-md font-bold mb-2" for="grid-first-name">
                                Emails
                            </label>
                            <input wire:model.defer='emails' class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="grid-first-name" type="text" placeholder="Jane">
                        </div>
                        <div class="w-full md:w-1/2 px-3">
                            <label class="block uppercase tracking-wide text-gray-700 text-md font-bold mb-2" for="grid-last-name">
                                Phone Numbers
                            </label>
                            <input wire:model.defer='phone_numbers' class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-last-name" type="text">
                            @error('phone_numbers') <span class="error"><p class="text-red-500 text-md italic">{{ $message }}</p></span> @enderror
                        </div>
                    </div>
                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                            <label class="block uppercase tracking-wide text-gray-700 text-md font-bold mb-2" for="grid-first-name">
                                Address
                            </label>
                            <input wire:model.defer='emails' class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="grid-first-name" type="text" placeholder="Jane">
                        </div>
                        <div class="w-full md:w-1/2 px-3">
                            <label class="block uppercase tracking-wide text-gray-700 text-md font-bold mb-2" for="grid-last-name">
                                Address
                            </label>
                            <input wire:model.defer='address' class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-last-name" type="text">
                            @error('address') <span class="error"><p class="text-red-500 text-md italic">{{ $message }}</p></span> @enderror
                        </div>
                    </div>
                    <div class="flex flex-wrap -mx-3 mb-2">
                        <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                            <label class="block uppercase tracking-wide text-gray-700 text-md font-bold mb-2" for="grid-state">
                            Status
                            </label>
                            <div class="relative">
                            <select wire:model.defer='status' class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-state">
                                @if ($status == 'Active')
                                <option value="Active" selected>Active</option>
                                <option value="Inactive">Inactive</option>
                                @elseif($status == 'Inactive')
                                <option value="Inactive" selected>Inactive</option>
                                <option value="Active">Active</option>
                                @endif
                            </select>
                            @error('status') <span class="error"><p class="text-red-500 text-md italic">{{ $message }}</p></span> @enderror
                            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                            </div>
                            </div>
                        </div>

                    </div>
                    <div class="d-flex flex-column align-items-start justify-content-center flex-wrap me-2">
                        <!--begin::Title-->
                        <button wire:click='update' type="button" class="rounded btn btn-primary">
                           Save
                        </button>
                        <!--end::Title-->
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>
