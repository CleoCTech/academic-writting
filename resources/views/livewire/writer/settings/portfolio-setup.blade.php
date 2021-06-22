<div>
    {{-- Close your eyes. Count to one. That is how long forever feels. --}}
    <div class="px-10 my-4 py-6 rounded shadow-xl bg-white w-5/5 mx-auto" wire:poll>
        <button wire:click='settings' class="rounded text-gray-100 px-3 py-1 bg-blue-500 hover:shadow-inner hover:bg-blue-700 transition-all duration-300">
            Back
        </button>
        <div class="grid  gap-8 grid-cols-1">
            <div class="flex flex-col ">
                <div class="flex flex-col sm:flex-row items-center">
                    <h2 class="font-semibold text-lg mr-auto">Portfolio Info</h2>
                    <div class="w-full sm:w-auto sm:ml-auto mt-3 sm:mt-0"></div>
                </div>
                <div class="mt-5">
                    <div class="form">
                        <div class="md:space-y-2 mb-3">
                            <div class="flex items-center py-6">
                                <div class="w-12 h-12 mr-4 flex-none rounded-xl border overflow-hidden">
                                    <img class="w-12 h-12 mr-4 object-cover"
                                        src="https://images.unsplash.com/photo-1611867967135-0faab97d1530?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&amp;ixlib=rb-1.2.1&amp;auto=format&amp;fit=crop&amp;w=1352&amp;q=80"
                                        alt="Avatar Upload">
                                </div>
                                <label class="cursor-pointer ">
                                    <span
                                        class="focus:outline-none text-white text-sm py-2 px-4 rounded-full bg-blue-400 hover:bg-blue-500 hover:shadow-lg">Browse</span>
                                    <input type="file" class="hidden" :multiple="multiple" :accept="accept">
                                </label>
                            </div>
                        </div>
                        <div class="md:flex flex-row md:space-x-4 w-full text-md">
                            <div class="mb-3 space-y-2 w-full text-md">
                                <label class="font-semibold text-gray-600 py-2">About me (short) <abbr
                                        title="required">*</abbr></label>
                                <input placeholder="About Me"
                                    class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-4"
                                    required="required" type="text" name="integration[shop_name]"
                                    id="integration_shop_name">
                                <p class="text-red text-xs hidden">Please fill out this field.</p>
                            </div>
                        </div>
                        <div class="flex-auto w-full mb-1 text-md space-y-2">
                            <label class="font-semibold text-gray-600 py-2">About me(detailed)</label>
                            <textarea required="" name="message" id=""
                                class="w-full min-h-[100px] max-h-[300px] h-28 appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg  py-4 px-4"
                                placeholder="Enter more details about you" spellcheck="false"></textarea>
                            <p class="text-xs text-gray-400 text-left my-3">You inserted 0 characters</p>
                        </div>

                        <div class="md:flex md:flex-row md:space-x-4 w-full text-md">
                            <div class="w-full flex flex-col mb-3">
                                <label class="font-semibold text-gray-600 py-2">Academic Degree<abbr title="required">*</abbr></label>
                                <select
                                    class="block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-4 md:w-full "
                                    required="required" name="integration[city_id]" id="integration_city_id">
                                    <option value="">Bachelor</option>
                                    <option value="">Master</option>
                                    <option value="">Phd</option>
                                    <option value="">Associate</option>
                                </select>
                                <p class="text-sm text-red-500 hidden mt-3" id="error">Please fill out this field.</p>
                            </div>
                        </div>

                        <div class="md:flex md:flex-row md:space-x-4 w-full text-md">
                            <label class="font-semibold text-gray-600 py-2">Services</label>
                        </div>
                        <div class="md:flex md:flex-row md:space-x-1 w-full text-md">
                            <div class="w-full flex flex-col mb-1">
                                <label class="flex justify-start items-start">
                                    <div class="bg-white border-2 rounded border-gray-400 w-6 h-6 flex flex-shrink-0 justify-center items-center mr-2 focus-within:border-blue-500">
                                      <input type="checkbox" class="opacity-0 absolute">
                                      <svg class="fill-current hidden w-4 h-4 text-green-500 pointer-events-none" viewBox="0 0 20 20"><path d="M0 11l2-2 5 5L18 3l2 2L7 18z"/></svg>
                                    </div>
                                    <div class="select-none">Writing</div>
                                </label>
                            </div>
                            <div class="w-full flex flex-col mb-1">
                                <label class="flex justify-start items-start">
                                    <div class="bg-white border-2 rounded border-gray-400 w-6 h-6 flex flex-shrink-0 justify-center items-center mr-2 focus-within:border-blue-500">
                                      <input type="checkbox" class="opacity-0 absolute">
                                      <svg class="fill-current hidden w-4 h-4 text-green-500 pointer-events-none" viewBox="0 0 20 20"><path d="M0 11l2-2 5 5L18 3l2 2L7 18z"/></svg>
                                    </div>
                                    <div class="select-none">Rewriting</div>
                                </label>
                            </div>
                            <div class="w-full flex flex-col mb-1">
                                <label class="flex justify-start items-start">
                                    <div class="bg-white border-2 rounded border-gray-400 w-6 h-6 flex flex-shrink-0 justify-center items-center mr-2 focus-within:border-blue-500">
                                      <input type="checkbox" class="opacity-0 absolute">
                                      <svg class="fill-current hidden w-4 h-4 text-green-500 pointer-events-none" viewBox="0 0 20 20"><path d="M0 11l2-2 5 5L18 3l2 2L7 18z"/></svg>
                                    </div>
                                    <div class="select-none">Editing</div>
                                </label>
                            </div>
                            <div class="w-full flex flex-col mb-1">
                                <label class="flex justify-start items-start">
                                    <div class="bg-white border-2 rounded border-gray-400 w-6 h-6 flex flex-shrink-0 justify-center items-center mr-2 focus-within:border-blue-500">
                                      <input type="checkbox" class="opacity-0 absolute">
                                      <svg class="fill-current hidden w-4 h-4 text-green-500 pointer-events-none" viewBox="0 0 20 20"><path d="M0 11l2-2 5 5L18 3l2 2L7 18z"/></svg>
                                    </div>
                                    <div class="select-none">Proofreading</div>
                                </label>
                            </div>
                        </div>
                        <div class="md:flex md:flex-row md:space-x-4 w-full text-md">
                            <label class="font-semibold text-gray-600 py-2">Type of assignments</label>
                        </div>
                        <div class="md:flex md:flex-row md:space-x-1 w-full text-md">
                            <div class="w-full flex flex-col mb-1">
                                <label class="flex justify-start items-start">
                                    <div class="bg-white rounded border-gray-400 w-6 h-6 flex flex-shrink-0 justify-center items-center mr-2 focus-within:border-blue-500">
                                        <i class="bi bi-dash-circle-fill"></i>
                                    </div>
                                    <div class="select-none">Engineering</div>
                                </label>
                            </div>
                            <div class="w-full flex flex-col mb-1">
                                <label class="flex justify-start items-start">
                                    <div class="bg-white rounded border-gray-400 w-6 h-6 flex flex-shrink-0 justify-center items-center mr-2 focus-within:border-blue-500">
                                        <i class="bi bi-dash-circle-fill"></i>
                                    </div>
                                    <div class="select-none">Multiple choice questions</div>
                                </label>
                            </div>
                            <div class="w-full flex flex-col mb-1">
                                <label class="flex justify-start items-start">
                                    <div class="bg-white rounded border-gray-400 w-6 h-6 flex flex-shrink-0 justify-center items-center mr-2 focus-within:border-blue-500">
                                        <i class="bi bi-dash-circle-fill"></i>
                                    </div>
                                    <div class="select-none">Term Paper</div>
                                </label>
                            </div>
                        </div>
                        <div class="md:flex md:flex-row md:space-x-4 w-full text-md">
                            <label class="font-semibold text-blue-600 py-2">
                                <i class="font-semibold text-blue-600 bi bi-plus-circle-fill"></i>
                                Add type of assignments
                            </label>
                        </div>
                        <div class="md:flex md:flex-row md:space-x-4 w-full text-md">
                            <label class="font-semibold text-gray-600 py-2">Subjects</label>
                        </div>
                        <div class="md:flex md:flex-row md:space-x-1 w-full text-md">
                            <div class="w-full flex flex-col mb-1">
                                <label class="flex justify-start items-start">
                                    <div class="bg-white rounded border-gray-400 w-6 h-6 flex flex-shrink-0 justify-center items-center mr-2 focus-within:border-blue-500">
                                        <i class="bi bi-dash-circle-fill"></i>
                                    </div>
                                    <div class="select-none">Computer Science</div>
                                </label>
                            </div>
                            <div class="w-full flex flex-col mb-1">
                                <label class="flex justify-start items-start">
                                    <div class="bg-white rounded border-gray-400 w-6 h-6 flex flex-shrink-0 justify-center items-center mr-2 focus-within:border-blue-500">
                                        <i class="bi bi-dash-circle-fill"></i>
                                    </div>
                                    <div class="select-none">Web Design</div>
                                </label>
                            </div>
                        </div>
                        <div class="md:flex md:flex-row md:space-x-4 w-full text-md">
                            <label class="font-semibold text-blue-600 py-2">
                                <i class="font-semibold text-blue-600 bi bi-plus-circle-fill"></i>
                                Add subjects
                            </label>
                        </div>
                        <p class="text-xs text-red-500 text-right my-3">Required fields are marked with an
                            asterisk <abbr title="Required field">*</abbr></p>
                        <div class="mt-5 text-right md:space-x-3 md:block flex flex-col-reverse">
                            <button
                                class="mb-2 md:mb-0 bg-white px-5 py-2 text-sm shadow-sm font-medium tracking-wider border text-gray-600 rounded-full hover:shadow-lg hover:bg-gray-100">
                                Cancel </button>
                            <button
                                class="mb-2 md:mb-0 bg-blue-400 px-5 py-2 text-sm shadow-sm font-medium tracking-wider text-white rounded-full hover:shadow-lg hover:bg-blue-500">Save</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        input:checked + svg {
            display: block;
        }
    </style>
</div>
