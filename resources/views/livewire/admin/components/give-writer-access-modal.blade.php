<div>
    <div>
        <div class="flex justify-between items-center pb-3" x-data="{}">
            <p class="text-2xl font-bold">Give Access</p>
            <div class="cursor-pointer z-50" x-on:click="$dispatch('dlg-modal');">
                <svg class="fill-current text-black" xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                    viewBox="0 0 18 18">
                    <path
                        d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z">
                    </path>
                </svg>
            </div>
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
    <div wire:loading wire:target='grantAccess'>
        @livewire('general.loader-gif')
    </div>
    <span class="float-center"><label class="font-bold text-green-700 py-2" for="">Grant Access to Writer</label></span>
    <br>
    <div class="flex justify-start mt-3">
        <label for="" class="font-semibold mr-3 mt-2">Approve/Decline:</label>
        <div class="mb-3 xl:w-96">
            <select wire:model.defer='status' class="form-select appearance-none
            block
            w-full
            px-3
            py-1.5
            text-base
            font-normal
            text-gray-700
            bg-white bg-clip-padding bg-no-repeat
            border border-solid border-gray-300
            rounded
            transition
            ease-in-out
            m-0
            focus:text-gray-700 focus:bg-white focus:border-blue-600  @error('status'): border-red-600 outline-red-600 @enderror" aria-label="Default select example">
                <option value="Approved" selected>Approve</option>
                <option value="Declined" selected>Decline</option>
            </select>
            @error('status')
            <div class="block w-full text-red-500">{{  $message }}</div>
            @enderror
        </div>

    </div>
    <div class="flex justify-start mt-3">
        <label for="" class="font-semibold mr-3 mt-2">Set Time Limit (Optional):</label>
        <div class="mb-3 xl:w-96">
            <input wire:model.defer='time_limit' placeholder=""
            class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-4"
            type="time">
        </div>
    </div>
    {{-- <label class="font-bold text-green-700 py-2" for="">Set Time Limit (optional)</label>
    <div class="mt-2 p-5  bg-white rounded-lg shadow-xl">
        <div class="flex">

          <select wire.model.lazy='hr' name="hours" class="bg-transparent text-xl appearance-none outline-none">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
            <option value="7">7</option>
            <option value="8">8</option>
            <option value="9">9</option>
            <option value="10">10</option>
            <option value="11">11</option>
            <option value="12">12</option>
            <option value="13">13</option>
            <option value="14">14</option>
            <option value="15">15</option>
            <option value="16">16</option>
            <option value="17">17</option>
            <option value="18">18</option>
            <option value="19">19</option>
            <option value="20">20</option>
            <option value="21">21</option>
            <option value="22">22</option>
            <option value="23">23</option>
            <option value="00">00</option>
          </select>
          <span class="text-xl mr-3">:</span>
          <select wire.model.lazy='mins' name="minutes" class="bg-transparent text-xl appearance-none outline-none mr-4">
            <option value="0">00</option>
            <option value="15">15</option>
            <option value="30">30</option>
            <option value="45">45</option>
          </select>
        </div>
    </div> --}}

    <div class="flex justify-end pt-2">
        <button wire:click="grantAccess"
            class="px-4 bg-transparent p-3 rounded-lg text-indigo-500 hover:bg-gray-100 hover:text-indigo-400 mr-2">Confirm</button>
        <button x-on:click="$dispatch('dlg-modal');" class="modal-close px-4 bg-indigo-500 p-3 rounded-lg text-white hover:bg-indigo-400"
            >Close</button>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/tw-elements/dist/js/index.min.js"></script>
