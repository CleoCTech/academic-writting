<div>
    {{-- Because she competes with no one, no one can compete with her. --}}
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

        <div wire:loading>
            @livewire('general.please-wait')
        </div>

        <button wire:click='settings' type="button" class="rounded btn btn-primary">
            <i style="font-size: 1rem !important;" class="bi bi-arrow-bar-left fa-2x"></i>
            Back
        </button>
        <div class="bg-white">
            <nav class="tabs flex flex-col sm:flex-row">
                <button data-target="panel-1"
                    class="tab active text-gray-600 py-4 px-6 block hover:text-blue-500 focus:outline-none text-blue-500 border-b-2 font-medium border-blue-500">
                    General
                </button><button data-target="panel-2"
                    class="tab ext-gray-600 py-4 px-6 block hover:text-blue-500 focus:outline-none">
                    Sign-in Security
                </button><button data-target="panel-3"
                    class="tab text-gray-600 py-4 px-6 block hover:text-blue-500 focus:outline-none">
                    Notifications
                </button>
            </nav>
        </div>

        <div id="panels">
            <div class="panel-1 tab-content active py-5">
                <div class="bg-white shadow rounded-lg p-6">
                    <p class="text-lg text-gray-700 font-bold hover:text-gray-600">
                        Account
                    </p>
                    <div class="border-t mt-6 pt-3"></div>
                    <div class="grid lg:grid-cols-3 gap-6">
                        <div
                            class="border focus-within:border-blue-500 focus-within:text-blue-500 transition-all duration-500 relative rounded p-1">
                            <div class="-mt-4 absolute tracking-wider px-1 uppercase text-xs">
                                <p>
                                    <label for="name" class="bg-white text-gray-600 px-1">First name *</label>
                                </p>
                            </div>
                            <p>
                                <input wire:model.defer='first_name' id="name" autocomplete="false" tabindex="0"
                                    type="text" class="py-1 px-1 text-gray-900 outline-none block h-full w-50">
                            </p>
                        </div>
                        <div
                            class="border focus-within:border-blue-500 focus-within:text-blue-500 transition-all duration-500 relative rounded p-1">
                            <div class="-mt-4 absolute tracking-wider px-1 uppercase text-xs">
                                <p>
                                    <label for="lastname" class="bg-white text-gray-600 px-1">Last name *</label>
                                </p>
                            </div>
                            <p>
                                <input wire:model.defer='last_name' id="lastname" autocomplete="false" tabindex="1"
                                    type="text" class="py-1 px-1 outline-none block h-full w-full">
                            </p>
                        </div>
                        <div
                            class="border focus-within:border-blue-500 focus-within:text-blue-500 transition-all duration-500 relative rounded p-1">
                            <div class="-mt-4 absolute tracking-wider px-1 uppercase text-xs">
                                <p>
                                    <label for="date" class="bg-white text-gray-600 px-1">Date of Birth *</label>
                                </p>
                            </div>
                            <p>
                                <input wire:model.defer='dob' autocomplete="false" tabindex="0" type="date"
                                    class="py-1 px-1 outline-none block h-full w-full">
                            </p>
                        </div>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="">
                            <p class="text-lg text-gray-700 font-bold hover:text-gray-600"></p>
                        </span>
                        <button wire:click='saveNames' type="button"
                            class="mt-2 bg-transparent border border-gray-500 hover:border-indigo-500 text-gray-500 hover:text-indigo-500 font-bold py-2 px-4 rounded-full">Save</button>
                    </div>
                    <div class="border-t mt-6 pt-3"></div>
                </div>
                <br>

                <div class="bg-white shadow rounded-lg p-6">
                    <a class="text-lg text-gray-700 font-bold hover:text-gray-600" href="#">
                        Email
                    </a>
                    <div class="border-t mt-6 pt-3"></div>
                    <div class="grid md:grid-cols-3 gap-6">
                        <div
                            class=" focus-within:border-blue-500 focus-within:text-blue-500 transition-all duration-500 relative rounded p-1">
                            <p>
                                <label id="name" class="py-1 px-1 text-gray-900 outline-none block h-full w-50">
                                    {{$email}}
                                </label>
                            </p>
                        </div>
                        <div
                            class=" focus-within:border-blue-500 focus-within:text-blue-500 transition-all duration-500 relative rounded p-1">
                            <p>
                                <label id="lastname"
                                    class="badge badge-success py-1 px-1 outline-none block h-full w-full">

                                    @if ($verified)
                                    Verified
                                    @else
                                    Unverified
                                    @endif
                                    <label>
                            </p>
                        </div>
                        <div
                            class="text-end focus-within:border-blue-500 focus-within:text-blue-500 transition-all duration-500 relative rounded p-1">
                            <p>
                                <button type="button"
                                    class="bg-transparent border border-gray-500 hover:border-indigo-500 text-gray-500 hover:text-indigo-500 font-bold py-2 px-4 rounded-full"
                                   > Change Email</button>
                            </p>
                        </div>
                    </div>
                </div>
                <br>
                <div class="bg-white shadow rounded-lg p-6">
                    <div class="flex justify-between items-center">
                        <span class="">
                            <a class="text-lg text-gray-700 font-bold hover:text-gray-600" href="#">
                                Phone Number
                            </a>
                        </span>
                        <button type="button"
                            class="bg-transparent border border-gray-500 hover:border-indigo-500 text-gray-500 hover:text-indigo-500 font-bold py-2 px-4 rounded-full"
                            x-data="{}" x-on:click="$dispatch('dlg-modal');$wire.addPhoneNumber()"> Add Phone Number
                        </button>
                    </div>
                    <div x-data="{isDlgModal:false}" :class="{ 'block': isDlgModal, 'hidden': !isDlgModal }"
                        class="hidden" x-on:dlg-modal.window="isDlgModal = !isDlgModal"
                        @click.away="isDlgModal = false">
                        @include('livewire.general.global-modal')
                    </div>
                    <div class="border-t mt-6 pt-3"></div>

                    <div
                        class=" focus-within:border-blue-500 focus-within:text-blue-500 transition-all duration-500 relative rounded p-1">

                        <table class="w-full">
                            <thead>
                                <tr class="border-b">
                                    <th class="p-2 text-left">Number</th>
                                    <th class="p-2 text-left">Type</th>
                                    <th class="p-2 text-right"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (count($phoneNumbers) > 0)
                                @foreach ($phoneNumbers as $key =>$phoneNumber)
                                <tr class="hover:bg-yellow-100">
                                    <td class="p-2 text-left flex flex-col">
                                        {{$phoneNumber->phone}}
                                    </td>
                                    <td class="p-2 text-left">
                                        {{$phoneNumber->type}}
                                    </td>
                                    <td class="text-right" x-data="{ 'isHamburgerOpen': false }">
                                        <button type="button" title="Open the actions menu"
                                            class="font-mono text-2xl px-2" @click="isHamburgerOpen = true"
                                            :class="{ 'bg-gray-100': isHamburgerOpen }">
                                            &ctdot;
                                        </button>

                                        <ul x-show="isHamburgerOpen" x-cloak @click.away="isHamburgerOpen = false"
                                            class="absolute border bg-white shadow-md text-left -mt-10 -ml-12">
                                            <input type="hidden" name="" wire:model.defer='id' value={{$phoneNumber->id}}>
                                            <li class="p-2 hover:bg-gray-200">✏ Edit</li>
                                            <li class="p-2 hover:bg-gray-200"  x-data="{}" x-on:click="$dispatch('dlg-modal');$wire.deleteModal({{$phoneNumber->id}}, 'PhoneNumber')">❌ Delete</li>
                                            <li class="p-2 hover:bg-gray-200">🦄 Other action</li>
                                        </ul>
                                    </td>
                                </tr>
                                @endforeach
                                @else
                                <tr>
                                    <td class="italic text-center" >
                                        <br>*** No records
                                        found ***</td>
                                </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                    <div class="border-t mt-6 pt-3">

                    </div>
                </div>

            </div>
            {{-- security --}}
            <div class="panel-2 tab-content py-5">
                <div class="grid lg:grid-cols-2 gap-2">
                    <div class="bg-white shadow rounded-lg p-6">
                        <div class="flex justify-between items-center">
                            <span class="">
                                <a class="text-lg text-gray-700 font-bold hover:text-gray-600" href="#">
                                    Account
                                </a>
                            </span>
                            <button type="button"
                                class="bg-transparent border border-gray-500 hover:border-indigo-500 text-gray-500 hover:text-indigo-500 font-bold py-2 px-4 rounded-full">Deactivate
                                Account</button>
                        </div>
                        <div class="border-t mt-6 pt-3"></div>
                        <div class="grid lg:grid-cols-3 gap-1">
                            <div
                                class=" focus-within:border-blue-500 focus-within:text-blue-500 transition-all duration-500 relative rounded p-1">
                                <p>
                                    <label id="name"
                                        class="py-1 px-1 text-gray-900 outline-none block h-full w-20">Email:</label>
                                </p>
                            </div>
                            <div
                                class=" focus-within:border-blue-500 focus-within:text-blue-500 transition-all duration-500 relative rounded p-1">
                                <p>
                                    <label id="lastname"
                                        class="py-1 px-1 outline-none block h-full w-full">cleoctech@gmail.com<label>
                                </p>
                            </div>
                        </div>

                        <div class="grid lg:grid-cols-3 gap-1">
                            <div
                                class=" focus-within:border-blue-500 focus-within:text-blue-500 transition-all duration-500 relative rounded p-1">
                                <p>
                                    <label id="name"
                                        class="py-1 px-1 text-gray-900 outline-none block h-full w-20">Password:</label>
                                </p>
                            </div>
                            <div
                                class=" focus-within:border-blue-500 focus-within:text-blue-500 transition-all duration-500 relative rounded p-1">
                                <p>
                                    <label id="lastname"
                                        class="py-1 px-1 outline-none block h-full w-full">**********<label>
                                </p>
                            </div>
                            <div
                                class=" focus-within:border-blue-500 focus-within:text-blue-500 transition-all duration-500 relative rounded p-1">
                                <p>
                                    <button type="button"
                                        class="float-right bg-transparent border border-gray-500 hover:border-indigo-500 text-gray-500 hover:text-indigo-500 font-bold py-2 px-4 rounded-full">Change</button>
                                </p>
                            </div>
                        </div>
                        <div class="grid lg:grid-cols-3 gap-1">
                            <div
                                class=" focus-within:border-blue-500 focus-within:text-blue-500 transition-all duration-500 relative rounded p-1">
                                <p>
                                    <label id="name"
                                        class="py-1 px-0 text-gray-900 outline-none block h-full w-full">Two-Factor
                                        Authentication:</label>
                                </p>
                            </div>
                            <div
                                class=" focus-within:border-blue-500 focus-within:text-blue-500 transition-all duration-500 relative rounded p-1">
                                <p>
                                    <label id="lastname"
                                        class="danger py-1 px-1 outline-none block h-full w-full">Disabled<label>
                                </p>
                            </div>
                            <div
                                class=" focus-within:border-blue-500 focus-within:text-blue-500 transition-all duration-500 relative rounded p-1">
                                <p>
                                    <button type="button"
                                        class="float-right bg-transparent border border-gray-500 hover:border-indigo-500 text-gray-500 hover:text-indigo-500 font-bold py-2 px-4 rounded-full">Activate</button>

                                </p>
                            </div>
                        </div>

                        <div class="border-t mt-6 pt-3"></div>
                    </div>

                    <div class="bg-white shadow rounded-lg p-6">
                        <a class="text-lg text-gray-700 font-bold hover:text-gray-600" href="#">
                            Links to social networks
                        </a>
                        <div class="border-t mt-6 pt-3"></div>
                        <div class="grid lg:grid-cols-1 gap-0">
                            <div
                                class=" focus-within:border-blue-500 focus-within:text-blue-500 transition-all duration-500 relative rounded p-1">
                                <p>
                                    <button type="button" class="btn btn-outline-danger">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-google" viewBox="0 0 16 16">
                                            <path
                                                d="M15.545 6.558a9.42 9.42 0 0 1 .139 1.626c0 2.434-.87 4.492-2.384 5.885h.002C11.978 15.292 10.158 16 8 16A8 8 0 1 1 8 0a7.689 7.689 0 0 1 5.352 2.082l-2.284 2.284A4.347 4.347 0 0 0 8 3.166c-2.087 0-3.86 1.408-4.492 3.304a4.792 4.792 0 0 0 0 3.063h.003c.635 1.893 2.405 3.301 4.492 3.301 1.078 0 2.004-.276 2.722-.764h-.003a3.702 3.702 0 0 0 1.599-2.431H8v-3.08h7.545z">
                                            </path>
                                        </svg>
                                        Link Google
                                    </button>
                                </p>
                            </div>
                        </div>
                        <div class="grid lg:grid-cols-1 gap-0">
                            <div
                                class=" focus-within:border-blue-500 focus-within:text-blue-500 transition-all duration-500 relative rounded p-1">
                                <p>
                                    <button type="button" class="btn btn-primary">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-facebook" viewBox="0 0 16 16">
                                            <path
                                                d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z">
                                            </path>
                                        </svg>
                                        Link Facebook
                                    </button>
                                </p>
                            </div>
                        </div>
                        <div class="border-t mt-6 pt-3"></div>
                    </div>
                </div>
                <br>
                <div class="bg-white shadow rounded-lg p-6">
                    <div class="flex justify-between items-center">
                        <span class="">
                            <a class="text-lg text-gray-700 font-bold hover:text-gray-600" href="#">
                                Web Sessions
                            </a>
                        </span>
                        <button type="button"
                            class="bg-transparent border border-gray-500 hover:border-indigo-500 text-gray-500 hover:text-indigo-500 font-bold py-2 px-4 rounded-full">
                            Logout on all devices</button>
                    </div>

                    <div class="overflow-x-auto">
                        <div
                            class="min-w-screen bg-gray-100 flex items-center justify-center bg-gray-100 font-sans overflow-hidden">
                            <div class="w-full lg:w-6/6">
                                <div class="bg-white shadow-md rounded my-1">
                                    <table class="min-w-max w-full table-auto">
                                        <thead>
                                            <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                                                <th class="py-3 px-6 text-left">Device</th>
                                                <th class="py-3 px-6 text-left">IP</th>
                                                <th class="py-3 px-6 text-center">Last Activity</th>
                                            </tr>
                                        </thead>
                                        <tbody class="text-gray-600 text-sm font-light">
                                            <tr class="border-b border-gray-200 hover:bg-gray-100">
                                                <td class="py-3 px-6 text-left whitespace-nowrap">
                                                    <div class="flex items-center">
                                                        <span class="font-medium">PC/Windows 10/Edge 91.0.846
                                                            (current)</span>
                                                    </div>
                                                </td>
                                                <td class="py-3 px-6 text-left">
                                                    <div class="flex items-center">
                                                        <span class="font-medium">196.250.209.97</span>
                                                    </div>
                                                </td>
                                                <td class="py-3 px-6 text-left">
                                                    <div class="flex items-center">
                                                        <span class="font-medium">Just now</span>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="border-t mt-6 pt-3"></div>
                </div>

            </div>
            {{-- notifications --}}
            <div class="panel-3 tab-content py-5">
                <div class="bg-white shadow rounded-lg p-6">
                    <div class="flex justify-between items-center">
                        <span class="">
                            <a class="text-lg text-gray-700 font-bold hover:text-gray-600" href="#">
                                Notification Settings
                            </a>
                        </span>
                    </div>

                    <div class="overflow-x-auto">
                        <div
                            class="min-w-screen bg-gray-100 flex items-center justify-center bg-gray-100 font-sans overflow-hidden">
                            <div class="w-full lg:w-6/6">
                                <div class="bg-white shadow-md rounded my-1">
                                    <table class="min-w-max w-full table-auto">
                                        <thead>
                                            <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                                                <th class="py-3 px-6 text-left">Notification</th>
                                                <th class="py-3 px-6 text-left">Email</th>
                                                <th class="py-3 px-6 text-center">SMS</th>
                                                <th class="py-3 px-6 text-center">In-App</th>
                                                <th class="py-3 px-6 text-center">In-App-Sounds</th>
                                            </tr>
                                        </thead>
                                        <tbody class="text-gray-600 text-sm font-light">
                                            <tr class="border-b border-gray-200 hover:bg-gray-100">
                                                <td class="py-3 px-6 text-left whitespace-nowrap">
                                                    <div class="flex items-center">
                                                        <span class="font-medium">Orders</span>
                                                    </div>
                                                </td>
                                                <td class="py-3 px-6 text-left">
                                                    <div class="flex items-center">
                                                        <div class="flex items-start justify-center w-full">
                                                            <label class="inline-flex items-start">
                                                                <input type="checkbox" class="form-checkbox" checked>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="py-3 px-6 text-left">
                                                    <div class="flex items-center">
                                                        <div class="flex items-center justify-center w-full">
                                                            <div class="flex items-start justify-center w-full">
                                                                <label class="inline-flex items-start">
                                                                    <input type="checkbox" class="form-checkbox"
                                                                        checked>
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="py-3 px-6 text-left">
                                                    <div class="flex items-center">
                                                        <div class="flex items-center justify-center w-full">
                                                            <div class="flex items-start justify-center w-full">
                                                                <label class="inline-flex items-start">
                                                                    <input type="checkbox" class="form-checkbox"
                                                                        checked>
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="py-3 px-6 text-left">
                                                    <div class="flex items-center">
                                                        <!-- Toggle A -->
                                                        <div class="flex items-center justify-center w-full">

                                                            <label for="toogleA"
                                                                class="flex items-center cursor-pointer">
                                                                <!-- toggle -->
                                                                <div class="relative">
                                                                    <!-- input -->
                                                                    <input id="toogleA" type="checkbox"
                                                                        class="sr-only" />
                                                                    <!-- line -->
                                                                    <div
                                                                        class="w-10 h-4 bg-gray-400 rounded-full shadow-inner">
                                                                    </div>
                                                                    <!-- dot -->
                                                                    <div
                                                                        class="dot absolute w-6 h-6 bg-white rounded-full shadow -left-1 -top-1 transition">
                                                                    </div>
                                                                </div>
                                                            </label>

                                                        </div>

                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="border-t mt-6 pt-3"></div>
                </div>
            </div>
        </div>
        <div class="mt-2">

        </div>
    </div>

    <style>
        .tab-content {
            display: none;
        }

        .tab-content.active {
            display: block;
        }

        /* Toggle A */
        input:checked~.dot {
            transform: translateX(100%);
            background-color: #48bb78;
        }

        /* modal styles */
        [x-cloak] {
            display: none;
        }

        .duration-300 {
            transition-duration: 300ms;
        }

        .ease-in {
            transition-timing-function: cubic-bezier(0.4, 0, 1, 1);
        }

        .ease-out {
            transition-timing-function: cubic-bezier(0, 0, 0.2, 1);
        }

        .scale-90 {
            transform: scale(.9);
        }

        .scale-100 {
            transform: scale(1);
        }

        /* end modal styles */
    </style>

    <script>
        const tabs = document.querySelectorAll(".tabs");
        const tab = document.querySelectorAll(".tab");
        const panel = document.querySelectorAll(".tab-content");

        function onTabClick(event) {

        // deactivate existing active tabs and panel

        for (let i = 0; i < tab.length; i++) {
            tab[i].classList.remove("active");
        }

        for (let i = 0; i < panel.length; i++) {
            panel[i].classList.remove("active");
        }


        // activate new tabs and panel
        event.target.classList.add('active');
        let classString = event.target.getAttribute('data-target');
        console.log(classString);
        document.getElementById('panels').getElementsByClassName(classString)[0].classList.add("active");
        }

        for (let i = 0; i < tab.length; i++) {
        tab[i].addEventListener('click', onTabClick, false);
        }
        window.livewire.on('alert_remove',()=>{
                setTimeout(function(){ $(".alert").fadeOut('fast');
                }, 5000); // 3 secs
                // $.session.remove('success');
                // $.session.remove('error');
        });
        // Livewire.emit('mount')
    </script>
</div>
