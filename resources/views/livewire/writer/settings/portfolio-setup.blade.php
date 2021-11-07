<div>
    {{-- Close your eyes. Count to one. That is how long forever feels. --}}
    <div class="px-10 my-4 py-6 rounded shadow-xl bg-white w-5/5 mx-auto" >
        @if (session()->has('success'))
        <div class="alert float-right grid grid-cols-3 gap-4" style="margin-top: -3rem;">
            <div class="col-span-2 ..."></div>
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
                            <span class="font-semibold"> {{ session('success') }}</span>
                            {{-- <span class="block text-gray-500">Anyone with a link can now view this file</span> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif
        @if (session()->has('error'))
        <div class="alert float-right grid grid-cols-3 gap-4" style="margin-top: -3rem;">
            <div class="col-span-2 ..."></div>
            <div class="m-auto">
                <div class="bg-danger rounded-lg border-gray-300 border p-3 shadow-lg"
                    style="background-color: rgba(224,52,18,.1) !important; color: rgba(224,52,18,.5);">
                    <div class="flex flex-row">
                        <div class="px-2 text-damger">
                            <i class="text-danger fas fa-times-circle fa-2x"></i>
                        </div>
                        <div class="">
                            <span class="font-semibold text-danger"> {{ session('error') }}</span>
                            {{-- <span class="block text-gray-500">Anyone with a link can now view this file</span> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif
        <button wire:click='settings' type="button" class="rounded btn btn-primary">
            <i style="font-size: 1rem !important;" class="bi bi-arrow-bar-left fa-2x"></i>
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
                            <div class="w-20 h-auto mr-4 flex-none rounded-xl border overflow-hidden bg-gray-500 ">
                                <div class="" x-data="imageData()">
                                  <div x-show="previewUrl == ''">
                                    <p class="text-center uppercase text-bold text-white">
                                      <label for="thumbnail" class="text-sm cursor-pointer">
                                        Upload image
                                      </label>
                                      <input type="file" wire:model.defer='avatar' name="thumbnail" id="thumbnail" class="hidden" @change="updatePreview()">
                                      @error('avatar') <span class="error">{{ $message }}</span> @enderror
                                    </p>
                                  </div>
                                  <div x-show="previewUrl !== ''">
                                    <img :src="previewUrl" alt="" class="w-21 h-20 mr-4 object-cover rounded">
                                    <div class="">
                                      <button type="button" class="mb-5 text-white uppercase" @click="clearPreview()">change</button>
                                    </div>
                                  </div>
                                </div>
                            </div>
                        </div>
                        <div class="md:flex flex-row md:space-x-4 w-full text-md">
                            <div class="mb-3 space-y-2 w-full text-md">
                                <label class="font-bold text-gray-600 py-2">About me (short) <abbr
                                        title="required">*</abbr></label>
                                <input placeholder="About Me" wire:model.defer='aboutMeShort'
                                    class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-4"
                                    required="required" type="text" name="integration[shop_name]"
                                    id="integration_shop_name">
                                    @error('aboutMeShort') <span class="error" style="color:red">{{ $message }}</span> @enderror
                                <p class="text-red text-xs hidden">Please fill out this field.</p>
                            </div>
                        </div>
                        <div class="flex-auto w-full mb-1 text-md space-y-2">
                            <label class="font-bold text-gray-600 py-2">About me(detailed)</label>
                            <textarea required="" name="message" id="" wire:model.defer='aboutMeDetail'
                                class="w-full min-h-[100px] max-h-[300px] h-28 appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg  py-4 px-4"
                                placeholder="Enter more details about you" spellcheck="false"></textarea>
                                @error('aboutMeDetail') <span class="error" style="color:red">{{ $message }}</span> @enderror
                            <p class="text-xs text-gray-400 text-left my-3">You inserted 0 characters</p>
                        </div>

                        <div class="md:flex md:flex-row md:space-x-4 w-full text-md">
                            <div class="w-full flex flex-col mb-3">
                                <label class="font-bold text-gray-600 py-2">Academic Degree<abbr title="required">*</abbr></label>
                                <select wire:model.defer='degree'
                                    class="block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-4 md:w-full "
                                    required="required" name="integration[city_id]" id="integration_city_id">
                                    <option value="Bachelor">Bachelor</option>
                                    <option value="Master">Master</option>
                                    <option value="Phd">Phd</option>
                                    <option value="Associate">Associate</option>
                                </select>
                                @error('degree') <span class="error" style="color:red">{{ $message }}</span> @enderror
                                <p class="text-sm text-red-500 hidden mt-3" id="error">Please fill out this field.</p>
                            </div>
                        </div>

                        <div class="md:flex md:flex-row md:space-x-4 w-full text-md">
                            <label class="font-bold text-gray-600 py-2">Services</label>
                        </div>
                        <div class="md:flex md:flex-row md:space-x-1 w-full text-md">
                            <div class="w-full flex flex-col mb-1">
                                <label class="flex justify-start items-start">
                                    <div class="bg-white border-2 rounded border-gray-400 w-6 h-6 flex flex-shrink-0 justify-center items-center mr-2 focus-within:border-blue-500">
                                      <input type="checkbox" name="services[]"  wire:model.defer='xservices' class="opacity-0 absolute" {{$Writing ? 'checked': ''}} value="Writing">
                                      <svg class="fill-current hidden w-4 h-4 text-green-500 pointer-events-none" viewBox="0 0 20 20"><path d="M0 11l2-2 5 5L18 3l2 2L7 18z"/></svg>
                                    </div>
                                    <div class="select-none">Writing</div>
                                </label>
                            </div>
                            <div class="w-full flex flex-col mb-1">
                                <label class="flex justify-start items-start">
                                    <div class="bg-white border-2 rounded border-gray-400 w-6 h-6 flex flex-shrink-0 justify-center items-center mr-2 focus-within:border-blue-500">
                                      <input type="checkbox" name="services[]"  wire:model.defer='xservices' class="opacity-0 absolute" {{$Rewriting ? 'checked': ''}} value="Rewriting">
                                      <svg class="fill-current hidden w-4 h-4 text-green-500 pointer-events-none" viewBox="0 0 20 20"><path d="M0 11l2-2 5 5L18 3l2 2L7 18z"/></svg>
                                    </div>
                                    <div class="select-none">Rewriting</div>
                                </label>
                            </div>
                            <div class="w-full flex flex-col mb-1">
                                <label class="flex justify-start items-start">
                                    <div class="bg-white border-2 rounded border-gray-400 w-6 h-6 flex flex-shrink-0 justify-center items-center mr-2 focus-within:border-blue-500">
                                      <input type="checkbox" name="services[]"  wire:model.defer='xservices' class="opacity-0 absolute" {{$Editing ? 'checked': ''}} value="Editing">
                                      <svg class="fill-current hidden w-4 h-4 text-green-500 pointer-events-none" viewBox="0 0 20 20"><path d="M0 11l2-2 5 5L18 3l2 2L7 18z"/></svg>
                                    </div>
                                    <div class="select-none">Editing</div>
                                </label>
                            </div>
                            <div class="w-full flex flex-col mb-1">
                                <label class="flex justify-start items-start">
                                    <div class="bg-white border-2 rounded border-gray-400 w-6 h-6 flex flex-shrink-0 justify-center items-center mr-2 focus-within:border-blue-500">
                                      <input type="checkbox" name="services[]"  wire:model.defer='xservices' class="opacity-0 absolute" {{$Proofreading ? 'checked': ''}} value="Proofreading">
                                      <svg class="fill-current hidden w-4 h-4 text-green-500 pointer-events-none" viewBox="0 0 20 20"><path d="M0 11l2-2 5 5L18 3l2 2L7 18z"/></svg>
                                    </div>
                                    <div class="select-none">Proofreading</div>
                                </label>
                            </div>
                        </div>
                        <div class="md:flex md:flex-row md:space-x-4 w-full text-md">
                            <label class="font-bold text-gray-600 py-2">Type of assignments</label>
                        </div>
                        <div class="md:flex md:flex-row md:space-x-1 w-full text-md">
                            <div class="md:flex md:flex-row md:space-x-1 w-full text-md">
                                @if ( count($listTypes) >0)
                                    @foreach ($listTypes as $listType)
                                        <div class="w-full flex flex-col mb-1">
                                            <label class="flex justify-start items-start">
                                                <div class="bg-white rounded border-gray-400 w-6 h-6 flex flex-shrink-0 justify-center items-center mr-2 focus-within:border-blue-500">
                                                    <i class="bi bi-dash-circle-fill"></i>
                                                </div>
                                                <div class="select-none">{{$listType->type}}</div>
                                            </label>
                                        </div>
                                    @endforeach
                                @else
                                    <label class="font-semibold text-red-600 py-2 item-center">

                                      ***No records***
                                    </label>
                                @endif
                            </div>
                        </div>
                        <div class="md:flex md:flex-row md:space-x-4 w-full text-md">
                            <a href="#" x-data="{}" x-on:click="$dispatch('dlg-modal');$wire.assignTypes()"class="">
                            <label class="font-semibold text-blue-600 py-2">
                                <i class="font-semibold text-blue-600 bi bi-plus-circle-fill"></i>
                                Add type of assignments
                            </label>
                            </a>
                        </div>
                        <div x-data="{isDlgModal:false}" :class="{ 'block': isDlgModal, 'hidden': !isDlgModal }"
                            class="hidden" x-on:dlg-modal.window="isDlgModal = !isDlgModal"
                            @click.away="isDlgModal = false">
                            @include('livewire.general.global-modal')
                        </div>
                        <div class="md:flex md:flex-row md:space-x-4 w-full text-md">
                            <label class="font-bold text-gray-600 py-2">Subjects</label>
                        </div>
                        <div class="md:flex md:flex-row md:space-x-1 w-full text-md">
                            @if ( count($listSubjects) >0)
                                @foreach ($listSubjects as $listSubject)
                                    <div class="w-full flex flex-col mb-1">
                                        <label class="flex justify-start items-start">
                                            <div class="bg-white rounded border-gray-400 w-6 h-6 flex flex-shrink-0 justify-center items-center mr-2 focus-within:border-blue-500">
                                                <i class="bi bi-dash-circle-fill"></i>
                                            </div>
                                            <div class="select-none">{{$listSubject->subject->subject}}</div>
                                        </label>
                                    </div>
                                @endforeach
                            @else
                                <label class="font-semibold text-red-600 py-2 item-center">

                                  ***No records***
                                </label>
                            @endif
                        </div>
                        <div class="md:flex md:flex-row md:space-x-4 w-full text-md">
                            <a href="#" x-data="{}" x-on:click="$dispatch('dlg-modal');$wire.assignSubjects()"class="">
                                <label class="font-semibold text-blue-600 py-2">
                                    <i class="font-semibold text-blue-600 bi bi-plus-circle-fill"></i>
                                   Add Subjects
                                </label>
                            </a>
                        </div>
                        <div x-data="{isDlgModal:false}" :class="{ 'block': isDlgModal, 'hidden': !isDlgModal }"
                            class="hidden" x-on:dlg-modal.window="isDlgModal = !isDlgModal"
                            @click.away="isDlgModal = false">
                            @include('livewire.general.global-modal')
                        </div>
                        <p class="text-xs text-red-500 text-right my-3">Required fields are marked with an
                            asterisk <abbr title="Required field">*</abbr></p>
                        <div class="mt-5 text-right md:space-x-3 md:block flex flex-col-reverse">
                            {{-- <button
                                class="mb-2 md:mb-0 bg-white px-5 py-2 text-sm shadow-sm font-medium tracking-wider border text-gray-600 rounded-full hover:shadow-lg hover:bg-gray-100">
                                Cancel </button> --}}
                            <button wire:click='updatePortfolio'
                                class="mb-2 md:mb-0 bg-blue-400 px-5 py-2 text-sm shadow-sm font-medium tracking-wider text-white rounded-full hover:shadow-lg hover:bg-blue-500">Save</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div wire:loading>
            @livewire('general.please-wait')
        </div>
    </div>

    <style>
        input:checked + svg {
            display: block;
        }
    </style>
    <script>
        window.imageData = function () {
            // https://github.com/alpinejs/alpine/issues/152#issuecomment-595454553 =>import separate script
            return {
                previewUrl: "",
                updatePreview() {
                var reader,
                    files = document.getElementById("thumbnail").files;

                reader = new FileReader();

                reader.onload = e => {
                    this.previewUrl = e.target.result;
                };

                reader.readAsDataURL(files[0]);
                },
                clearPreview() {
                document.getElementById("thumbnail").value = null;
                this.previewUrl = "";
                }
            };
            }
            window.livewire.on('preview_img',()=>{
                document.getElementById("thumbnail").addEventListener("change");
            });


    </script>
</div>
