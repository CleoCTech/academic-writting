<div>
    {{-- In work, do what you enjoy. --}}
    <div class="px-10 my-4 py-6 rounded shadow-xl bg-white w-5/5 mx-auto" wire:poll>
        <button wire:click="settings('')" type="button" class="btn btn-primary">
            <i style="font-size: 1rem !important;" class="bi bi-arrow-bar-left fa-2x"></i>
           Back
        </button>
        <h2 class="text-2xl text-gray-700 font-bold hover:text-gray-600">
            Upload your selfie holding the ID.
        </h2>
        <hr>
        <div class="mt-2 max-w-md w-full text-center items-center">
            <p class="text-md text-gray-700 text-center text-italic font-bold hover:text-gray-600 mb-2">
                Please, name your image appropriately; Example: my_selfie
            </p>
            <p class="text-sm text-gray-700 text-center text-italic font-bold hover:text-gray-600 mb-2">
                The ID's details must be clearly visible. If a photo is blurry - your application will be declined.
            </p>

            <i class="far fa-image fa-4x"></i>
        </div>
        <br>
        <div wire:ignore class="row">

            <div class="col-lg-6 col-md-12 col-sm-12">
                <input type="file" name="paperFile"  id="test">
                {{-- <div class="custom-file">
                    <input type="file" name="paperFile" class="custom-file-input" id="uploadfiles" />
                </div> --}}
            </div>
        </div>
        <hr>
        <div class="flex justify-between items-center mt-4">
            <div class=" mt-6">
                <button wire:click="store" type="button" class="btn btn-primary">
                   Submit
                </button>
                {{-- <input type="button" name="next" id="next" value="Next" class="p-3 rounded-lg bg-purple-600 outline-none text-white shadow justify-center focus:bg-purple-700 hover:bg-purple-500">
                <span class="float-right"><i class="fas fa-arrow-right fa-3x"></i></span> --}}
            </div>
            {{-- <a class="px-2 py-1 bg-blue-600 text-gray-100 font-bold
             rounded hover:bg-gray-500 hover:underline" href="#">Start Application</a> --}}

        </div>

    </div>

    <script type="text/javascript">
        const inputElement = document.querySelector('input[id="test"]');
        const pond = FilePond.create( inputElement );
        FilePond.setOptions({
            server:{
                url: '/upload-selfie',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            }
        });
    </script>
</div>
