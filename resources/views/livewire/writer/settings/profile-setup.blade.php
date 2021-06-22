<div>
    {{-- Because she competes with no one, no one can compete with her. --}}
    <div class="px-10 my-4 py-6 rounded shadow-xl bg-white w-5/5 mx-auto">
        {{-- <nav class="text-black font-bold my-8" aria-label="Breadcrumb">
        <ol class="list-none p-0 inline-flex">
          <li class="flex items-center">
            <a href="#">Home</a>
            <svg class="fill-current w-3 h-3 mx-3" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"><path d="M285.476 272.971L91.132 467.314c-9.373 9.373-24.569 9.373-33.941 0l-22.667-22.667c-9.357-9.357-9.375-24.522-.04-33.901L188.505 256 34.484 101.255c-9.335-9.379-9.317-24.544.04-33.901l22.667-22.667c9.373-9.373 24.569-9.373 33.941 0L285.475 239.03c9.373 9.372 9.373 24.568.001 33.941z"/></svg>
          </li>
          <li class="flex items-center">
            <a href="#">Second Level</a>
            <svg class="fill-current w-3 h-3 mx-3" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"><path d="M285.476 272.971L91.132 467.314c-9.373 9.373-24.569 9.373-33.941 0l-22.667-22.667c-9.357-9.357-9.375-24.522-.04-33.901L188.505 256 34.484 101.255c-9.335-9.379-9.317-24.544.04-33.901l22.667-22.667c9.373-9.373 24.569-9.373 33.941 0L285.475 239.03c9.373 9.372 9.373 24.568.001 33.941z"/></svg>
          </li>
          <li>
            <a href="#" class="text-gray-500" aria-current="page">Third Level</a>
          </li>
        </ol>
      </nav> --}}
      <button wire:click='settings' class="rounded text-gray-100 px-3 py-1 bg-blue-500 hover:shadow-inner hover:bg-blue-700 transition-all duration-300">
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
                    <a class="text-lg text-gray-700 font-bold hover:text-gray-600" href="#">
                       Account
                     </a>
                    <div class="border-t mt-6 pt-3"></div>
                    <div class="grid lg:grid-cols-3 gap-6">
                      <div class="border focus-within:border-blue-500 focus-within:text-blue-500 transition-all duration-500 relative rounded p-1">
                        <div class="-mt-4 absolute tracking-wider px-1 uppercase text-xs">
                          <p>
                            <label for="name" class="bg-white text-gray-600 px-1">First name *</label>
                          </p>
                        </div>
                        <p>
                          <input id="name" autocomplete="false" tabindex="0" type="text" class="py-1 px-1 text-gray-900 outline-none block h-full w-50">
                        </p>
                      </div>
                      <div class="border focus-within:border-blue-500 focus-within:text-blue-500 transition-all duration-500 relative rounded p-1">
                        <div class="-mt-4 absolute tracking-wider px-1 uppercase text-xs">
                          <p>
                            <label for="lastname" class="bg-white text-gray-600 px-1">Last name *</label>
                          </p>
                        </div>
                        <p>
                          <input id="lastname" autocomplete="false" tabindex="0" type="text" class="py-1 px-1 outline-none block h-full w-full">
                        </p>
                      </div>
                      <div class="border focus-within:border-blue-500 focus-within:text-blue-500 transition-all duration-500 relative rounded p-1">
                        <div class="-mt-4 absolute tracking-wider px-1 uppercase text-xs">
                          <p>
                            <label for="date" class="bg-white text-gray-600 px-1">Date of Birth *</label>
                          </p>
                        </div>
                        <p>
                          <input id="dob" autocomplete="false" tabindex="0" type="date" class="py-1 px-1 outline-none block h-full w-full">
                        </p>
                      </div>
                    </div>
                    <div class="border-t mt-6 pt-3"></div>
                </div>
                <br>

                <div class="bg-white shadow rounded-lg p-6">
                    <a class="text-lg text-gray-700 font-bold hover:text-gray-600" href="#">
                        Email
                     </a>
                    <div class="border-t mt-6 pt-3"></div>
                    <div class="grid lg:grid-cols-3 gap-6">
                      <div class=" focus-within:border-blue-500 focus-within:text-blue-500 transition-all duration-500 relative rounded p-1">
                        <p>
                          <label id="name" class="py-1 px-1 text-gray-900 outline-none block h-full w-50">cleoctech@gmail.com</label>
                        </p>
                      </div>
                      <div class=" focus-within:border-blue-500 focus-within:text-blue-500 transition-all duration-500 relative rounded p-1">
                        <p>
                          <label id="lastname"  class="badge badge-success py-1 px-1 outline-none block h-full w-full">Verified<label>
                        </p>
                      </div>
                      <div class=" focus-within:border-blue-500 focus-within:text-blue-500 transition-all duration-500 relative rounded p-1">
                        <p>
                            <button class="rounded text-gray-100 px-3 py-1 bg-blue-500 hover:shadow-inner hover:bg-blue-700 transition-all duration-300">
                                Change
                            </button>
                        </p>
                      </div>
                    </div>
                    <div class="border-t mt-6 pt-3">

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
                        <button class="rounded text-gray-100 px-3 py-1 bg-blue-500 hover:shadow-inner hover:bg-blue-700 transition-all duration-300">
                            Add Phone Number
                        </button>
                    </div>

                    <div class="border-t mt-6 pt-3"></div>
                    <div class="grid lg:grid-cols-3 gap-6">
                      <div class=" focus-within:border-blue-500 focus-within:text-blue-500 transition-all duration-500 relative rounded p-1">
                        <p>
                          <label id="name" class="py-1 px-1 text-gray-900 outline-none block h-full w-50">+254727057310</label>
                        </p>
                      </div>
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
                            <button class="rounded text-gray-100 px-3 py-1 bg-blue-500 hover:shadow-inner hover:bg-blue-700 transition-all duration-300">
                               Deactivate Account
                            </button>
                        </div>
                        <div class="border-t mt-6 pt-3"></div>
                        <div class="grid lg:grid-cols-3 gap-1">
                          <div class=" focus-within:border-blue-500 focus-within:text-blue-500 transition-all duration-500 relative rounded p-1">
                            <p>
                              <label id="name" class="py-1 px-1 text-gray-900 outline-none block h-full w-20">Email:</label>
                            </p>
                          </div>
                          <div class=" focus-within:border-blue-500 focus-within:text-blue-500 transition-all duration-500 relative rounded p-1">
                            <p>
                              <label id="lastname"  class="py-1 px-1 outline-none block h-full w-full">cleoctech@gmail.com<label>
                            </p>
                          </div>
                        </div>

                        <div class="grid lg:grid-cols-3 gap-1">
                          <div class=" focus-within:border-blue-500 focus-within:text-blue-500 transition-all duration-500 relative rounded p-1">
                            <p>
                              <label id="name" class="py-1 px-1 text-gray-900 outline-none block h-full w-20">Password:</label>
                            </p>
                          </div>
                          <div class=" focus-within:border-blue-500 focus-within:text-blue-500 transition-all duration-500 relative rounded p-1">
                            <p>
                              <label id="lastname"  class="py-1 px-1 outline-none block h-full w-full">**********<label>
                            </p>
                          </div>
                          <div class=" focus-within:border-blue-500 focus-within:text-blue-500 transition-all duration-500 relative rounded p-1">
                            <p>
                                <button class="float-right rounded text-gray-100 px-3 py-1 bg-blue-500 hover:shadow-inner hover:bg-blue-700 transition-all duration-300">
                                    Change
                                </button>
                            </p>
                          </div>
                        </div>
                        <div class="grid lg:grid-cols-3 gap-1">
                          <div class=" focus-within:border-blue-500 focus-within:text-blue-500 transition-all duration-500 relative rounded p-1">
                            <p>
                              <label id="name" class="py-1 px-0 text-gray-900 outline-none block h-full w-full">Two-Factor Authentication:</label>
                            </p>
                          </div>
                          <div class=" focus-within:border-blue-500 focus-within:text-blue-500 transition-all duration-500 relative rounded p-1">
                            <p>
                              <label id="lastname"  class="danger py-1 px-1 outline-none block h-full w-full">Disabled<label>
                            </p>
                          </div>
                          <div class=" focus-within:border-blue-500 focus-within:text-blue-500 transition-all duration-500 relative rounded p-1">
                            <p>
                                <button class="float-right rounded text-gray-100 px-3 py-1 bg-blue-500 hover:shadow-inner hover:bg-blue-700 transition-all duration-300">
                                   Activate
                                </button>
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
                          <div class=" focus-within:border-blue-500 focus-within:text-blue-500 transition-all duration-500 relative rounded p-1">
                            <p>
                                <button type="button" class="btn btn-outline-danger">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-google" viewBox="0 0 16 16">
                                    <path d="M15.545 6.558a9.42 9.42 0 0 1 .139 1.626c0 2.434-.87 4.492-2.384 5.885h.002C11.978 15.292 10.158 16 8 16A8 8 0 1 1 8 0a7.689 7.689 0 0 1 5.352 2.082l-2.284 2.284A4.347 4.347 0 0 0 8 3.166c-2.087 0-3.86 1.408-4.492 3.304a4.792 4.792 0 0 0 0 3.063h.003c.635 1.893 2.405 3.301 4.492 3.301 1.078 0 2.004-.276 2.722-.764h-.003a3.702 3.702 0 0 0 1.599-2.431H8v-3.08h7.545z"></path>
                                    </svg>
                                    Link Google
                                  </button>
                            </p>
                          </div>
                        </div>
                        <div class="grid lg:grid-cols-1 gap-0">
                          <div class=" focus-within:border-blue-500 focus-within:text-blue-500 transition-all duration-500 relative rounded p-1">
                            <p>
                                <button type="button" class="btn btn-primary">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-facebook" viewBox="0 0 16 16">
                                    <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z"></path>
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
                        <button class="rounded text-gray-100 px-3 py-1 bg-blue-500 hover:shadow-inner hover:bg-blue-700 transition-all duration-300">
                          Logout on all devices
                        </button>
                    </div>

                    <div class="overflow-x-auto">
                        <div class="min-w-screen bg-gray-100 flex items-center justify-center bg-gray-100 font-sans overflow-hidden">
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
                                                        <span class="font-medium">PC/Windows 10/Edge 91.0.846 (current)</span>
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
                        <div class="min-w-screen bg-gray-100 flex items-center justify-center bg-gray-100 font-sans overflow-hidden">
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
                                                                    <input type="checkbox" class="form-checkbox" checked>
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
                                                                    <input type="checkbox" class="form-checkbox" checked>
                                                                  </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="py-3 px-6 text-left">
                                                    <div class="flex items-center">
                                                        <!-- Toggle A -->
                                                        <div class="flex items-center justify-center w-full">

                                                            <label for="toogleA" class="flex items-center cursor-pointer">
                                                                <!-- toggle -->
                                                                <div class="relative">
                                                                    <!-- input -->
                                                                    <input id="toogleA" type="checkbox" class="sr-only" />
                                                                    <!-- line -->
                                                                    <div class="w-10 h-4 bg-gray-400 rounded-full shadow-inner"></div>
                                                                    <!-- dot -->
                                                                    <div class="dot absolute w-6 h-6 bg-white rounded-full shadow -left-1 -top-1 transition"></div>
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
        input:checked ~ .dot {
        transform: translateX(100%);
        background-color: #48bb78;
        }
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
    </script>
</div>
