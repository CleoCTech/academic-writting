
    {{-- Close your eyes. Count to one. That is how long forever feels. --}}
    <div class="flex flex-col flex-1">
        <div class="flex flex-col md:flex-row flex-column-fluid">
          <div
            class="
              flex flex-col flex-lg-row-auto
              bg-primary
              w-xl-600px
              xl:relative
            "
          >
            <div
              class="flex flex-col xl:fixed top-0 bottom-0 w-xl-600px scroll-y"
            >
              <div class="flex flex-row-fluid flex-col text-center p-10 lg:pt-20">
                <a href="#" class="py-9 lg:pt-20 flex justify-center">
                  <img alt="Logo" src="{{ asset('s-assets/logo-ellipse.svg') }}" class="h-16" />
                </a>
                <h1 class="font-bolder text-white fs-2qx pb-5 md:pb-10">
                  Welcome to Writer
                </h1>
                <p class="font-bold fs-2 text-white">
                  Plan your blog post by choosing a topic creating <br />an
                  outline and checking facts
                </p>
              </div>
              <div
                class="
                  flex flex-row-auto
                  bgi-no-repeat
                  bgi-position-x-center
                  bgi-size-contain
                  bgi-position-y-bottom
                  min-h-100px min-h-lg-350px
                  mb-60
                "
                style="background-image: url({{asset('s-assets/17.png')}})"
              ></div>
            </div>
          </div>

          <div class="flex flex-col flex-lg-row-fluid py-10 w-full">
            <div class="flex justify-center align-center flex-col flex-column-fluid">
              <div class="w-lg-500px p-10 lg:p-15 mx-auto">
                <form class="form w-full">
                  <div class="text-center mb-10">
                    <h1 class="text-dark mb-3 font-bold text-3xl">
                      Sign In
                    </h1>
                    <div class="text-gray-400 font-bold text-xl">
                      New Here?
                      <a href="#" class="link-primary font-bolder no-underline hover:underline"
                        >Create an Account</a
                      >
                    </div>
                  </div>
                    @if (session()->has('message'))
                    <div class="bg-red-50 border-l-8 border-red-900 mb-2">
                        <div class="flex items-center">
                            <div class="p-2">
                                <div class="flex items-center">
                                    <div class="ml-2">
                                        <svg class="h-8 w-8 text-red-900 mr-2 cursor-pointer"
                                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                    stroke-width="2"
                                                    d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                        </svg>
                                    </div>
                                    <p class="px-6 py-4 text-red-900 font-semibold text-lg">Please fix the
                                        following
                                        errors.</p>
                                </div>
                                <div class="px-16 mb-4">
                                    <li class="text-md font-bold text-red-500 text-sm">{{ session('message') }}</li>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                 
                  <div class="fv-row mb-10 relative">
                    <label class="mb-4 fs-6 font-bold text-dark">Email</label>
                    <input
                      class="
                        block
                        w-full
                        py-2
                        px-4
                        text-xl
                        font-bold
                        form-control form-control-solid
                        my-5
                        @error('email'): border-red-500 @enderror
                      "
                      wire:model.lazy ='email'
                      type="email"
                      autocomplete="off"
                    />
                    @error('email')
                        <div class="block w-full text-red-500">{{  $message }}</div>
                    @enderror
                  </div>
                  <div class="fv-row mb-10 relative">
                    <label class="mb-4 fs-6 font-bold text-dark">Password</label>
                    <input
                      class="
                        block
                        w-full
                        py-2
                        px-4
                        text-xl
                        font-bold
                        form-control form-control-solid
                        my-5
                        @error('password'): border-red-500 @enderror
                      "
                      wire:model.defer='password'
                      type="password"
                      autocomplete="off"
                    />
                    @error('password')
                    <div class="block w-full text-red-500">{{ $message }}</div>
                    @enderror
                  </div>
                  <div class="fv-row mb-10 relative">
                    <div class="flex flex-stack mb-2">
                      <div class="flex items-center font-bold">
                        <input type="checkbox" class="mr-3" /> Remember me?
                      </div>
                      <a href="#" class="link-primary fs-6 font-bold no-underline hover:underline"
                        >Forgot Password ?</a
                      >
                      <!--end::Link-->
                    </div>
                  </div>
                  {{-- <div class="fv-row mb-10 relative" wire:loading.remove>
                    <button id="signin" wire:click='auth' type="button" class=" font-bold btn btn-lg btn-primary inline-flex items-center px-4 py-2 border border-transparent text-base leading-6 font-medium rounded-md hover:bg-blue-300 ease-in-out duration-150">
                        Sign In
                    </button>
                  </div> --}}
                  <div class="fv-row mb-10 relative">
                    <button id="signin" wire:click='auth' type="button" 
                    class=" font-bold btn btn-lg btn-primary inline-flex items-center px-4 py-2 border border-transparent text-base leading-6 font-medium rounded-md hover:bg-blue-300 ease-in-out duration-150 "  wire:loading.class= "cursor-not-allowed"
                    wire:loading.attr="disabled" >
                        <svg wire.loading wire.target='auth' 
                        class="hidden animate-spin -ml-1 mr-3 h-5 w-5 text-white" 
                        wire:loading.class.remove= "hidden"
                        xmlns="http://www.w3.org/2000/svg" 
                        fill="none" viewBox="0 0 24 24" >
                        <circle  wire:loading wire:target="auth" class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path  wire:loading wire:target="auth" class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                        </svg>
                        Sign In
                    </button>
                  </div>
                </form>
              </div>
            </div>

            <div class="flex justify-center align-center flex-wrap fs-6 p-5 pb-0">
              <!--begin::Links-->
              <div class="flex justify-center align-center font-bold text-6">
                <a
                  href="#"
                  class="text-muted text-hover-primary px-2"
                  target="_blank"
                  >About</a
                >
                <a
                  href="http://wenlasoftwares.com/"
                  class="text-muted text-hover-primary px-2 no-underline hover:underline"
                  target="_blank"
                  >Sponsored By Wenla Softwares</a
                >

              </div>
              <!--end::Links-->
            </div>

          </div>

        </div>
        {{-- <div wire:loading wire:target="auth">
            @livewire('general.loader')
        </div> --}}
        <script>
            document.addEventListener("keyup", function(event) {
                var signin = document.getElementById('signin');
                if (event.keyCode === 13) {
                   signin.click();
                }
            });
        </script>
    </div>
