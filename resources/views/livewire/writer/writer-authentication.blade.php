<div>
    {{-- Be like water. --}}
    <div>
        @if (session()->has('message'))
        <div class="alert alert-danger">
            {{ session('message') }}
        </div>
        @endif
    </div>
    @if ($centerView == 'default')
    <div class="min-h-screen flex items-center justify-center bg-gray-50 py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-md w-full space-y-8">
            <div>
                <img class="mx-auto h-12 w-auto" src="{{ asset('dash-assets/img/logo_full.svg')}}" alt="Workflow">
                <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">
                    Sign in to your account
                </h2>
                <p class="mt-2 text-center text-sm text-gray-600">

                    <a href="#" class="font-medium text-indigo-600 hover:text-indigo-500">
                        to get started...
                    </a>
                </p>
            </div>
            <div class="mt-8 space-y-6">
                <input type="hidden" name="remember" value="true">
                <div class="rounded-md shadow-sm -space-y-px">
                    <div>
                        <label for="email-address" class="sr-only">Email address</label>
                        <input id="email-address" wire:model.defer='email' type="email" autocomplete="email" required
                            class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                            placeholder="Email address" autofocus="autofocus">
                        @error('email') <span class="error" style="color:red">{{ $message }}</span> @enderror
                    </div>
                    <div>
                        <label for="password" class="sr-only">Password</label>
                        <input id="password" id="userpass" wire:model.defer='password' type="password"
                            autocomplete="current-password" required
                            class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                            placeholder="Password">
                        @error('password') <span class="error" style="color:red">{{ $message }}</span> @enderror
                    </div>
                </div>



                @if ($varview == 'login')

                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <input id="remember_me" name="remember_me" type="checkbox"
                            class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded">
                        <label for="remember_me" class="ml-2 block text-sm text-gray-900">
                            Remember me
                        </label>
                    </div>

                    <div class="text-sm">
                        <a href="#" class="font-medium text-indigo-600 hover:text-indigo-500">
                            Forgot your password?
                        </a>
                    </div>
                </div>
                <div>
                    <button type="button" class="group relative w-full flex justify-center py-2 px-4
                        border border-transparent text-sm font-medium rounded-md
                        text-white bg-indigo-600 hover:bg-indigo-700
                        focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" wire:click='auth'
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
                        Sign in
                    </button>
                </div>
                @elseif($varview == 'create-account')
                <div>
                    <button type="button" class="group relative w-full flex justify-center py-2 px-4
                        border border-transparent text-sm font-medium rounded-md
                        text-white bg-indigo-600 hover:bg-indigo-700
                        focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" wire:click='signup'
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
                        Create Account
                    </button>
                </div>

                @endif

                <div class="text-lg">
                    <p class="">Want to become a writer?</p>
                    <span class="float-right" style="margin-top: -1.7rem;">
                        <a wire:click.prevent='createAccount' href="#" style="margin-left: -15rem;" class=" text-decoration-underline font-medium text-indigo-600 hover:text-indigo-500">
                            Register
                        </a>
                    </span>

                </div>
                <div class="text-lg">
                    <p class="">Already have an account?</p>
                    <span class="float-right " style="margin-top: -1.7rem;">
                        <a wire:click.prevent='login' href="#" class="text-decoration-underline font-medium text-indigo-600 hover:text-indigo-500" style="margin-left: -15rem;">
                            Login
                        </a>
                    </span>

                </div>
            </div>
        </div>
    </div>
    @elseif($centerView == 'resend-link')
        @livewire('writer.components.resend-link')
    @endif


    <div wire:loading wire:target="auth, signup">
        @livewire('general.loader')
    </div>
    <script>
        document.addEventListener("keyup", function(event) {
            var signin = document.getElementById('signin');
            if (event.keyCode === 13) {
               signin.click();
            }
        });
    </script>
</div>
