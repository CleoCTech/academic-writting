<div>
    {{-- In work, do what you enjoy. --}}

    <div class="min-h-screen flex items-center justify-center bg-gray-50 py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-md w-full space-y-8">
            <div>
                <img class="mx-auto h-12 w-auto" src="{{ asset('dash-assets/img/logo_full.svg')}}" alt="Workflow">
                <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">
                    Check your inbox
                </h2>
                <p class="mt-2 text-center text-sm text-gray-600">

                    <a href="#" class="font-medium text-indigo-600 hover:text-indigo-500">
                        Verification link has been sent to your email cleoctech@gmail.com. Click the link to activate your account.
                    </a>
                </p>
            </div>
            <div class="mt-8 space-y-6">


                <div>
                    <button type="button" class="group relative w-full flex justify-center py-2 px-4
                        border border-transparent text-sm font-medium rounded-md
                        text-white bg-indigo-600 hover:bg-indigo-700
                        focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" wire:click=''
                        wire:loading.class.remove="bg-indigo-600" wire:loading.class="bg-gray-300" id="signin">
                        <span class="absolute left-0 inset-y-0 flex items-center pl-3">
                            <!-- Heroicon name: solid/lock-closed -->
                            <svg class="h-5 w-5 text-indigo-500 group-hover:text-indigo-400"
                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                aria-hidden="true">
                                <path fill-rule="evenodd"
                                    d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z"
                                    clip-rule="evenodd" />
                            </svg>
                        </span>
                       Re-send link to my email
                    </button>
                </div>

                <div class="text-lg">
                    <p class="" style="margin-left: 5rem;">Want to register with another email?</p>
                    <a wire:click.prevent='registration' href="#" style="margin-left: 5rem;" class=" text-decoration-underline font-medium text-indigo-600 hover:text-indigo-500">
                        Go back to registration
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
