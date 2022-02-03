<div>
    <!-- BEGIN: Personal Information -->
    <div class="intro-y box mt-5">
        <div class="flex items-center p-5 border-b border-gray-200 dark:border-dark-5">
            <h2 class="font-medium text-base mr-auto">
                Personal Information
            </h2>
        </div>
        <div class="p-5">
            <div class="grid grid-cols-12 gap-x-5">
                <div class="col-span-12 xl:col-span-6">
                    @if(session()->has('status'))
                    <div class="alert alert-outline-success alert-dismissible show flex items-center mb-2" role="alert">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                        stroke-linejoin="round" class="feather feather-alert-triangle w-6 h-6 mr-2">
                        <path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"></path>
                        <line x1="12" y1="9" x2="12" y2="13"></line><line x1="12" y1="17" x2="12.01" y2="17"></line>
                        </svg> {{ session()->get('status') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x w-4 h-4"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg> </button>
                    </div>
                    @endif
                    <div>
                        <label for="update-profile-form-6" class="form-label">Email</label>
                        <input wire:model.defer='email' id="update-profile-form-6" type="text" class="form-control @error('email') alert-outline-danger @enderror" placeholder="Input text" >
                    </div>
                    <div class="mt-3">
                        <label for="update-profile-form-7" class="form-label">Name</label>
                        <input wire:model.defer='username' id="update-profile-form-7" type="text" class="form-control @error('username') alert-outline-danger @enderror" placeholder="Input text">
                    </div>

                </div>
            </div>
            <div class="flex justify-end mt-4">
                <button wire:click='store' type="button" class="btn btn-primary w-20 mr-auto" wire:loading.class="cursor-not-allowed" wire:loading.attr="disabled">
                    <svg wire.loading wire.target="store"
                        class="hidden animate-spin -ml-1 mr-3 h-5 w-5 text-white"
                        wire:loading.class.remove="hidden" xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 24 24">
                        <circle wire:loading wire:target="store" class="opacity-25" cx="12" cy="12"
                            r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path wire:loading wire:target="store" class="opacity-75" fill="currentColor"
                            d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                        </path>
                    </svg>
                    Save
                </button>
                <a href="#" class="text-theme-6 flex items-center"> <i data-feather="trash-2" class="w-4 h-4 mr-1"></i> Delete Account </a>
            </div>
        </div>
    </div>
    <!-- END: Personal Information -->
</div>
