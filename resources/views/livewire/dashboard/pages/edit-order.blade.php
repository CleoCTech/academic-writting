<div>
    {{-- In work, do what you enjoy. --}}
    {{-- @livewire('dashboard.components.top-bar', ['user_id' => session()->get('LoggedClient'), 'user_type' => 'App\Models\Client', 'activity' => '']) --}}

    <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">
            Edit Paper
        </h2>
        <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
            {{-- <button wire:click='back' class="btn btn-primary shadow-md mr-2">Back</button> --}}
            <button wire:click="back" wire.target="back" type="button"
                class="btn btn-lg btn-primary inline-flex items-center px-4 py-2 border border-transparent text-base leading-6 font-medium rounded-md hover:bg-blue-300 ease-in-out duration-150 "
                wire:loading.class="cursor-not-allowed" wire:loading.attr="disabled">
                <svg wire.loading wire.target="back"
                    class="hidden animate-spin -ml-1 mr-3 h-5 w-5 text-white"
                    wire:loading.class.remove="hidden" xmlns="http://www.w3.org/2000/svg"
                    fill="none" viewBox="0 0 24 24">
                    <circle wire:loading wire:target="back" class="opacity-25" cx="12" cy="12"
                        r="10" stroke="currentColor" stroke-width="4"></circle>
                    <path wire:loading wire:target="back" class="opacity-75" fill="currentColor"
                        d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                    </path>
                </svg>
                Back
            </button>
        </div>
    </div>
    <div class="grid grid-cols-12 gap-6">
        <div class="col-span-12 lg:col-span-8 2xl:col-span-9">
            <div class="intro-y box mt-5">
                <div class="flex items-center p-5 border-b border-gray-200 dark:border-dark-5">
                    <h2 class="font-medium text-base mr-auto">
                        Order Details
                    </h2>
                </div>
                <div class="p-5">
                    <div class="grid grid-cols-12 gap-x-5">
                        <div class="col-span-12 xl:col-span-6">
                            <div>
                                <label for="update-profile-form-6" class="form-label">Number of Pages</label>
                                <input  wire:model.defer="pages" id="update-profile-form-6" type="text" class="form-control" placeholder="Input text" value="6">
                            </div>
                            <div class="mt-3">
                                <label for="update-profile-form-7" class="form-label">What is your topic?</label>
                                <input  wire:model.defer="topic" id="update-profile-form-7" type="text" class="form-control" placeholder="Input text" value="Brad Pitt">
                            </div>
                            <div class="mt-3">
                                <label for="update-profile-form-8" class="form-label">Select Subject</label>
                                <select wire:model.defer="category_id" id="update-profile-form-8" class="form-select">
                                    @foreach ($categories as $key => $category)
                                    @if ($key == $category_id)
                                        <option  selected value="{{$category->id}}">{{$category->subject}}</option>
                                    @else
                                        <option value="{{$category->id}}">{{$category->subject}}</option>
                                    @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-span-12 xl:col-span-6">
                            <div class="mt-3 xl:mt-0">
                                <label for="update-profile-form-10" class="form-label">Deadline Date</label>
                                <input wire:model.defer='deadline_date' id="update-profile-form-10" type="date" class="form-control" placeholder="Input text" >
                            </div>
                            <div class="mt-3">
                                <label for="update-profile-form-11" class="form-label">Deadline Time</label>
                                <input wire:model.defer='deadline_time' id="update-profile-form-11" type="time" class="form-control" placeholder="Input text" >
                            </div>
                        </div>

                        <div wire:ignore class="mt-3 col-span-12 xl:col-span-12">
                            <label for="update-profile-form-5" class="form-label">Paper Instructions</label>
                            <textarea  wire:model.defer="instructions" id="editor" class="form-control" placeholder="Instructions" spellcheck="false"></textarea>
                        </div>
                        <div class="mt-3 col-span-12 xl:col-span-12">
                            @foreach ($clientFiles as $clientFile)

                                <div>
                                    @if (session()->has('message'))
                                    <div class="alert alert-danger">
                                        {{ session('message') }}
                                    </div>
                                    @endif
                                </div>
                                <i class="bi bi-dot fs-2 text-active-dark"></i>
                                <label for="update-profile-form-5" class="form-label">{{$clientFile->filename}}
                                    <span class="svg-icon svg-icon-4 ">
                                        <i wire:click="dropFile('{{$clientFile->folder}}/{{$clientFile->filename}}')"
                                            class="bi bi-archive-fill text-red-400
                                            transition duration-150 ease-in-out transform
                                            hover:scale-110 bg-emerald-600
                                            hover: cursor-pointer
                                            hover:text-red-600 "></i>
                                    </span>
                                </label>
                                {{-- <a wire:click="dropFile('{{$clientFile->folder}}/{{$clientFile->filename}}')"
                                    title="Delete"
                                    class="text-gray-600 italic text-hover-danger fw-bold fs-6 mb-3 link-download">{{$clientFile->filename}}
                                    <span
                                    class="svg-icon svg-icon-4 ">
                                    <i class="bi bi-archive-fill text-red-400"></i>
                                    </span>
                                </a> --}}
                            @endforeach
                        </div>
                        <div wire:ignore class="mt-3 col-span-12 xl:col-span-12">
                            <label for="update-profile-form-5" class="form-label">Additional Files(optional)
                                <span
                                class="svg-icon svg-icon-4 ">
                                <i class="bi bi-paperclip text-blue-400"></i>
                                </span>
                            </label>
                            <div class="col-lg-6 col-md-12 col-sm-12">
                                <input type="file" name="paperFile" id="test" multiple>
                            </div>

                        </div>
                    </div>
                    <div class="flex justify-end mt-4">
                        <button wire:click='store' type="button" class="btn btn-primary w-20 mr-auto">Save</button>
                        {{-- <a href="" class="text-theme-6 flex items-center"> <i data-feather="trash-2" class="w-4 h-4 mr-1"></i> Delete Account </a> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- <script src="https://cdn.ckeditor.com/ckeditor5/25.0.0/classic/ckeditor.js"></script> --}}
    <script src="https://unpkg.com/filepond/dist/filepond.js" ></script>
    <script type="text/javascript">
        const inputElement = document.querySelector('input[id="test"]');
        const pond = FilePond.create( inputElement );
        FilePond.setOptions({
            server:{
                url: '/upload',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            }
        });
    </script>
    <script>
        console.log('her');
        ClassicEditor
            .create( document.querySelector( '#editor' ) )
            .then( editor => {
                console.log( editor );
                editor.model.document.on('change:data', () => {
                    @this.set('instructions', editor.getData());
                })
            } )
            .catch( error => {
                    console.error( error );
            } );
    </script>
</div>
