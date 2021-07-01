<div>
    {{-- Close your eyes. Count to one. That is how long forever feels. --}}
    <div class="flex justify-between items-center pb-3" x-data ="{}">
        <p class="text-2xl font-bold">Add assignments to handle</p>
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
    <div class="space-y-auto ...">
        <input type="checkbox" name="writerPapers[]"  wire:model.defer='writerPapers' value="Annotated Bibliography" >
        <span class="items-end">Annotated Bibliography</span> <br>
        <input type="checkbox" name="writerPapers[]"  wire:model.defer='writerPapers' value="Essay (any type)" >
        <span class="items-end">Essay (any type)</span> <br>
        <input type="checkbox" name="writerPapers[]"  wire:model.defer='writerPapers' value="Article Review" >
        <span class="items-end">Article Review</span> <br>
        <input type="checkbox" name="writerPapers[]"  wire:model.defer='writerPapers' value="Case Study" >
        <span class="items-end">Case Study</span> <br>
        <input type="checkbox" name="writerPapers[]"  wire:model.defer='writerPapers' value="Business Plan" >
        <span class="items-end">Business Plan</span> <br>
        <input type="checkbox" name="writerPapers[]"  wire:model.defer='writerPapers' value="Business Proposal" >
        <span class="items-end">Business Proposal</span> <br>
        <input type="checkbox" name="writerPapers[]"  wire:model.defer='writerPapers' value="Creative Writing" >
        <span class="items-end">Creative Writing</span> <br>
        <input type="checkbox" name="writerPapers[]"  wire:model.defer='writerPapers' value="Capstone Project" >
        <span class="items-end">Capstone Project</span> <br>
        <input type="checkbox" name="writerPapers[]"  wire:model.defer='writerPapers' value="Lab Report" >
        <span class="items-end">Lab Report</span> <br>
        <input type="checkbox" name="writerPapers[]"  wire:model.defer='writerPapers' value="Marketing Plan" >
        <span class="items-end">Marketing Plan</span> <br>
    </div>


    <!--Footer  click="alert('Additional Action') wire:click='DeletePhone';"-->
    <div class="flex justify-end pt-2">
        <button  x-on:click="$dispatch('dlg-modal');"
            class="px-4 bg-transparent p-3 rounded-lg text-indigo-500 hover:bg-gray-100 hover:text-indigo-400 mr-2">Cancel</button>
        <button wire:click='postAssignmentHandle'  class="modal-close px-4 bg-indigo-500 p-3 rounded-lg text-white hover:bg-indigo-400"
        x-on:click="$dispatch('dlg-modal');" >Save</button>
    </div>
</div>
