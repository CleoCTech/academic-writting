<div>
    {{-- To attain knowledge, add things every day; To attain wisdom, subtract things every day --}}
    <div class="flex justify-between items-center pb-3" x-data ="{}">
        <p class="text-2xl font-bold">Delete</p>
        <div class="cursor-pointer z-50" x-on:click="$dispatch('dlg-modal');">
            <svg class="fill-current text-black" xmlns="http://www.w3.org/2000/svg" width="18"
                height="18" viewBox="0 0 18 18">
                <path
                    d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z">
                </path>
            </svg>
        </div>
    </div>
    <!-- content -->
    <p class="">Are you sure you want to delete this record?</p>

    <!--Footer  click="alert('Additional Action') wire:click='DeletePhone';"-->
    <div class="flex justify-end pt-2">
        <button wire:click='DeletePhone'  x-on:click="$dispatch('dlg-modal');"
            class="px-4 bg-transparent p-3 rounded-lg text-indigo-500 hover:bg-gray-100 hover:text-indigo-400 mr-2">Delete</button>
        <button class="modal-close px-4 bg-indigo-500 p-3 rounded-lg text-white hover:bg-indigo-400"
        x-on:click="$dispatch('dlg-modal');" >No</button>
    </div>
</div>
