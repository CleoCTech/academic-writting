<div>
    {{-- Stop trying to control. --}}
    @if ($component == '')

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
        <br class="">
        <button wire:click='varView("application")' type="button" class="rounded btn btn-primary">
            <i style="font-size: 1rem !important;" class="bi bi-arrow-bar-left fa-2x"></i>
           Back
        </button>
        <div class="grid  gap-8 grid-cols-1">
            <div class="flex flex-col ">
                <div class="flex flex-col sm:flex-row items-center">
                    <h2 class="font-semibold text-lg mr-auto underline">Portfolio Info</h2>
                    <div class="w-full sm:w-auto sm:ml-auto mt-3 sm:mt-0"></div>
                </div>
                <div class="mt-5">
                    <div class="form">
                        <div class="md:flex flex-row md:space-x-4 w-full text-md">
                            <div class="mb-3 space-y-2 w-full text-md">
                                <label class="font-bold text-gray-600 py-2">About me (short) <abbr
                                        title="required">*</abbr></label>
                                        <p class="">{{$aboutMeShort}}</p>
                            </div>
                        </div>
                        <div class="flex-auto w-full mb-1 text-md space-y-2">
                            <label class="font-bold text-gray-600 py-2">About me(detailed)</label>
                            <p class="">{{$aboutMeDetail}}</p>
                        </div>

                        <div class="md:flex md:flex-row md:space-x-4 w-full text-md">
                            <div class="w-full flex flex-col mb-3">
                                <label class="font-bold text-gray-600 py-2">Academic Degree<abbr title="required">*</abbr></label>
                                <p class="">{{$degree}}</p>
                            </div>
                        </div>

                        <div class="md:flex md:flex-row md:space-x-4 w-full text-md">
                            <label class="font-bold text-gray-600 py-2">Services</label>
                        </div>
                        <div class="md:flex md:flex-row md:space-x-1 w-full text-md">
                            <ul class="list-inside bg-rose-200 ...">
                                @foreach ($services as $service)
                                <li>{{$service->service}}</li>
                                @endforeach
                              </ul>
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
                                    <label class="font-semibold text-blue-600 py-2 item-center">

                                      ***No records***
                                    </label>
                                @endif
                            </div>
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
                                <label class="font-semibold text-blue-600 py-2 item-center">

                                  ***No records***
                                </label>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <hr class="">
            {{--  Identity Verification Begins here --}}
            <div class="flex flex-col sm:flex-row items-center">
                <h2 class="font-semibold text-lg mr-auto underline">Identity Verification</h2>

                <span class=""> <!-- Red Label -->
                    @if ($IdentityKey->status == "unverified")
                    <label  class="inline-block rounded-full text-white
                        bg-red-400 hover:bg-red-500 duration-300
                        text-xs font-bold
                        mr-1 md:mr-2 mb-2 px-2 md:px-4 py-1
                        opacity-90 hover:opacity-100">
                        Unverified
                    </label>
                    @elseif($IdentityKey->status == "verified")
                    <label class="inline-block rounded-full text-white
                    bg-green-400 hover:bg-green-500 duration-300
                    text-xs font-bold
                    mr-1 md:mr-2 mb-2 px-2 md:px-4 py-1
                    opacity-90 hover:opacity-100">
                    Verified
                    </label>

                    @endif
             </span>
                {{-- <div class="w-full sm:w-auto sm:ml-auto mt-3 sm:mt-0"></div> --}}
            </div>
            <div class="flex flex-col sm:flex-row items-center" style="margin-top: -2rem;">
                <label class="font-bold text-gray-600 py-0">Full Name:</label>
                <span class="float-right">
                @if ($fName != null && $lName != null)
                <label for="" class="ml-2">
                    {{$fName. " " . $lName}}
                </label>
                @endif
                </span>
                <label class="font-bold text-gray-600 py-0 px-3">Date of Birth:</label>
                <span class="float-right">
                @if ($dob != null)
                <label for="" class="ml-2">
                    {{$dob}}
                </label>
                @endif
                </span>
            </div>

            <div class="flex-stack mb-4">
                <div class=" align-items-center">
                    <div class=" flex-column mb-4">
                        <h4 class="text-blue-400 " style="margin-top: 1rem;">Attached
                            Files
                            <span class="svg-icon svg-icon-4 ">
                                <i class="bi bi-paperclip text-blue-400"></i>
                            </span>
                        </h4>
                    </div>
                    @foreach ($IdentityDetails as $IdentityDetail)
                    <div class="row">
                        <div>
                            @if (session()->has('message'))
                            <div class="alert alert-danger">
                                {{ session('message') }}
                            </div>
                            @endif
                        </div>
                        <div class="col-md-3">
                            <a class="text-gray-600 text-hover-primary fw-bold fs-6 mb-3 ">{{$IdentityDetail->filename}}
                            </a>
                        </div>
                        <div class="col-md-3 p-1">
                            <a wire:click="getDownload('{{$IdentityDetail->folder}}/{{$IdentityDetail->filename}}', 'writer_files')"
                                type="button" class="btn-floating 
                                hover:bg-green-500
                                btns 
                                rounded-full h-7 w-7 flex items-center justify-center
                                btn-small"
                                download="{{$IdentityDetail->filename}}"> <span
                                    class="svg-icon svg-icon-3">
                                    <i class="text-purple-600 btns
                                    bi bi-download"></i>
                                </span></a>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="flex-auto flex flex-row-reverse">
                    @if ($IdentityKey->status == "unverified")
                    <button wire:click='verifyIdentity' class="text-base hover:scale-110 focus:outline-none flex justify-center px-4 py-2 rounded font-bold cursor-pointer
                    hover:bg-green-500
                    bg-gray-100
                    btns
                    text-gray-700
                    border duration-200 ease-in-out
                    border-gray-600 transition">
                    Verify</button>
                    @elseif($IdentityKey->status == "verified")
                    <button wire:click='revertIdentity' class="text-base hover:scale-110 focus:outline-none flex justify-center px-4 py-2 rounded font-bold cursor-pointer
                    hover:bg-red-500
                    bg-gray-100
                    btns
                    text-gray-700
                    border duration-200 ease-in-out
                    border-gray-600 transition">
                    Revert</button>
                    @endif
                    
                </div>
            </div>

            <hr class="">
            {{--  Identity Verification ends here --}}

            {{-- Education begins here --}}
            <div class="flex flex-col sm:flex-row items-center">
                <h2 class="font-semibold text-lg mr-auto underline">Education Details</h2>

                <span class=""> <!-- Red Label -->
                    @if ($educationVerified)
                    <label class="inline-block rounded-full text-white
                    bg-green-400 hover:bg-green-500 duration-300
                    text-xs font-bold
                    mr-1 md:mr-2 mb-2 px-2 md:px-4 py-1
                    opacity-90 hover:opacity-100">
                    Verified
                    </label>
                    @else
                    <label  class="inline-block rounded-full text-white
                        bg-red-400 hover:bg-red-500 duration-300
                        text-xs font-bold
                        mr-1 md:mr-2 mb-2 px-2 md:px-4 py-1
                        opacity-90 hover:opacity-100">
                        Unverified
                    </label>
                    @endif
             </span>
                {{-- <div class="w-full sm:w-auto sm:ml-auto mt-3 sm:mt-0"></div> --}}
            </div>
            <div class="flex flex-col sm:flex-row items-center" style="margin-top: -2rem;">
                <label class="font-bold text-gray-600 py-0">Qualification:</label>
                <span class="float-right">
                @if ($degree != null)
                <label for="" class="ml-2">
                    {{$degree. "'s" . " " . "holder"}}
                </label>
                @endif
                </span>
            </div>

            <div class="flex-stack mb-4">
                <div class=" align-items-center">
                    <div class=" flex-column mb-4">
                        <h4 class="text-blue-400 " style="margin-top: 1rem;">Attached
                            Files
                            <span class="svg-icon svg-icon-4 ">
                                <i class="bi bi-paperclip text-blue-400"></i>
                            </span>
                        </h4>
                    </div>
                    @foreach ($EducationDetails as $EducationDetail)
                    <div class="row">
                        <div>
                            @if (session()->has('message'))
                            <div class="alert alert-danger">
                                {{ session('message') }}
                            </div>
                            @endif
                        </div>
                        <div class="col-md-3">
                            <a class="text-gray-600 text-hover-primary fw-bold fs-6 mb-3 ">{{$EducationDetail->filename}}
                            </a>
                        </div>
                        <div class="col-md-3 p-1">
                            <a wire:click="getDownload('{{$EducationDetail->folder}}/{{$EducationDetail->filename}}', 'writer_files')"
                                type="button" class="btn-floating
                                hover:bg-green-500
                                btns 
                                rounded-full h-7 w-7 flex items-center justify-center
                                btn-small"
                                download="{{$EducationDetail->filename}}"> <span
                                    class="svg-icon svg-icon-3">
                                    <i class="text-purple-600 btns bi bi-download"></i>
                                </span></a>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="flex-auto flex flex-row-reverse">
                    @if ($educationVerified)
                    <button wire:click='revertEducation' class="text-base hover:scale-110 focus:outline-none flex justify-center px-4 py-2 rounded font-bold cursor-pointer
                    hover:bg-red-500
                    bg-gray-100
                    btns
                    text-gray-700
                    border duration-200 ease-in-out
                    border-gray-600 transition">Revert</button>
                    @else
                    <button wire:click='verifyEducation' class="text-base hover:scale-110 focus:outline-none flex justify-center px-4 py-2 rounded font-bold cursor-pointer
                    hover:bg-green-500
                    bg-gray-100
                    btns
                    text-gray-700
                    border duration-200 ease-in-out
                    border-gray-600 transition">Verify</button>
                    @endif
                   
                </div>
            </div>

            <hr class="">
            {{-- Education begins ends here --}}

            {{-- Education work experience starts here --}}

            <div class="flex flex-col sm:flex-row items-center">
                <h2 class="font-semibold text-lg mr-auto underline">Work Experience/CV</h2>

                <span class=""> <!-- Red Label -->
                    @if ($cvVerified)
                    <label class="inline-block rounded-full text-white
                    bg-green-400 hover:bg-green-500 duration-300
                    text-xs font-bold
                    mr-1 md:mr-2 mb-2 px-2 md:px-4 py-1
                    opacity-90 hover:opacity-100">
                    Verified
                    </label>
                    @else
                    <label  class="inline-block rounded-full text-white
                        bg-red-400 hover:bg-red-500 duration-300
                        text-xs font-bold
                        mr-1 md:mr-2 mb-2 px-2 md:px-4 py-1
                        opacity-90 hover:opacity-100">
                        Unverified
                    </label>
                    @endif
             </span>
                {{-- <div class="w-full sm:w-auto sm:ml-auto mt-3 sm:mt-0"></div> --}}
            </div>

            <div class="flex-stack mb-4">
                <div class=" align-items-center">
                    <div class=" flex-column mb-4">
                        <h4 class="text-blue-400 " style="margin-top: 1rem;">Attached
                            Files
                            <span class="svg-icon svg-icon-4 ">
                                <i class="bi bi-paperclip text-blue-400"></i>
                            </span>
                        </h4>
                    </div>
                    @foreach ($WorkExpriences as $WorkExprience)
                    <div class="row">
                        <div>
                            @if (session()->has('message'))
                            <div class="alert alert-danger">
                                {{ session('message') }}
                            </div>
                            @endif
                        </div>
                        <div class="col-md-3">
                            <a class="text-gray-600 text-hover-primary fw-bold fs-6 mb-3 ">{{$WorkExprience->filename}}
                            </a>
                        </div>
                        <div class="col-md-3 p-1">
                            <a wire:click="getDownload('{{$WorkExprience->folder}}/{{$WorkExprience->filename}}', 'writer_files')"
                                type="button" class="btn-floating
                                hover:bg-green-500
                                btns 
                                rounded-full h-7 w-7 flex items-center justify-center
                                btn-small"
                                download="{{$WorkExprience->filename}}"> <span
                                    class="svg-icon svg-icon-3">
                                    <i class="text-purple-600 btns bi bi-download"></i>
                                </span></a>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="flex-auto flex flex-row-reverse">
                    @if ($cvVerified)
                    <button wire:click='revertCV' class="text-base hover:scale-110 focus:outline-none flex justify-center px-4 py-2 rounded font-bold cursor-pointer
                    hover:bg-red-500
                    bg-gray-100
                    btns
                    text-gray-700
                    border duration-200 ease-in-out
                    border-gray-600 transition">Revert</button>
                    @else
                    <button wire:click='verifyCV' class="text-base hover:scale-110 focus:outline-none flex justify-center px-4 py-2 rounded font-bold cursor-pointer
                    hover:bg-green-500
                    bg-gray-100
                    btns
                    text-gray-700
                    border duration-200 ease-in-out
                    border-gray-600 transition">Verify</button>
                    @endif
                    
                </div>
            </div>
            <hr class="">
            {{-- Education work experience  ends here --}}
            <div class="mt-5 text-right md:space-x-3 md:block flex flex-col-reverse">
                <button wire:click="changeComponent('test')" type="button" class="btn btn-primary">
                    Next
                    <i style="font-size: 2rem !important;" class="fas fa-arrow-right fa-3x"></i>
                </button>
                {{-- <input type="button" name="next" id="next" value="Next" class="p-3 rounded-lg bg-purple-600 outline-none text-white shadow justify-center focus:bg-purple-700 hover:bg-purple-500">
                <span class="float-right"><i class="fas fa-arrow-right fa-3x"></i></span> --}}
            </div>
        </div>
        <div wire:loading>
            @livewire('general.please-wait')
        </div>
    </div>
    @elseif($component == 'test')
        @livewire('admin.test-details')
    @endif
    <style>
        input:checked + svg {
            display: block;
        }
        .btns:hover{
            color:white !important;
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
