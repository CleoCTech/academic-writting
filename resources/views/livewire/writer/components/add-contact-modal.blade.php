<div>
    {{-- Because she competes with no one, no one can compete with her. --}}
    {{-- <x-modal wire:model="show">
        <div class="p-6">
            Contact Modal
        </div>
    </x-modal> --}}
    <div class="flex justify-between items-center pb-3">
        <p class="text-2xl font-bold">Add Number</p>
        <div class="cursor-pointer z-50" >
            <svg class="fill-current text-black" xmlns="http://www.w3.org/2000/svg" width="18"
                height="18" viewBox="0 0 18 18">
                <path
                    d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z">
                </path>
            </svg>
        </div>
    </div>
    @if (session()->has('success-modal'))
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
                    <span class="font-semibold"> {{ session('success-modal') }}</span>
                    {{-- <span class="block text-gray-500">Anyone with a link can now view this file</span> --}}
                </div>
            </div>
        </div>
    </div>
    @endif
    @if (session()->has('error-modal'))
    <div class="m-auto">
        <div class="bg-danger rounded-lg border-gray-300 border p-3 shadow-lg"
            style="background-color: rgba(224,52,18,.1) !important; color: rgba(224,52,18,.5);">
            <div class="flex flex-row">
                <div class="px-2 text-damger">
                    <i class="text-danger fas fa-times-circle fa-2x"></i>
                </div>
                <div class="">
                    <span class="font-semibold text-danger"> {{ session('error-modal') }}</span>
                    {{-- <span class="block text-gray-500">Anyone with a link can now view this file</span> --}}
                </div>
            </div>
        </div>
    </div>
    @endif
    <!-- content -->
    <label class="font-semibold text-gray-700 py-2">Type<abbr title="required">*</abbr></label>
    <select wire:model.defer='type'
        class="block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-4 md:w-full "
        required="required" name="integration[city_id]" id="integration_city_id">
        <option value="">Seleted type</option>
        <option value="Primary">Primary</option>
        <option value="Secondary">Secondary</option>
    </select>
    @error('type') <label class="error mb-2" style="color:red">{{ $message }}</label> @enderror <br>
    <label class="font-semibold text-gray-700 py-2">Enter Phone No<abbr
            title="required">*</abbr></label>
    <input wire:model.defer='phone' placeholder="0746961234"
        class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-4"
        type="text">
    @error('phone') <label class="error" style="color:red">{{ $message }}</label> @enderror
    <!--Footer  click="alert('Additional Action');"-->
    <div class="flex justify-end pt-2">
        <button wire:click='savePhoneNo'
            class="px-4 bg-transparent p-3 rounded-lg text-indigo-500 hover:bg-gray-100 hover:text-indigo-400 mr-2">Save</button>
        <button class="modal-close px-4 bg-indigo-500 p-3 rounded-lg text-white hover:bg-indigo-400"
           >Close</button>
    </div>

</div>
