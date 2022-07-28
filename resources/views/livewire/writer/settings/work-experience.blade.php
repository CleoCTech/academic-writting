<div>
    {{-- Care about people's approval and you will be their prisoner. --}}
    <div class="px-10 my-4 py-6 rounded shadow-xl bg-white w-5/5 mx-auto">
        <button wire:click="settings('')" type="button" class="btn btn-primary">
            <i style="font-size: 1rem !important;" class="bi bi-arrow-bar-left fa-2x"></i>
            Back
        </button>
        <h2 class="text-2xl text-gray-700 font-bold hover:text-gray-600">
            Work Experience
        </h2>
        <hr>
        <div class="mt-2">
            <p class="text-lg text-gray-700 font-bold hover:text-gray-600">
                Please, upload ONLY YOUR CV to this section.
            </p>
            <p class="text-md text-gray-700 font-bold hover:text-gray-600">
                Pay attention that your CV must have the following information:
            </p>
            <ol class="ml-5">
                <li class="">Education;</li>
                <li class="">Skills.</li>
            </ol>
        </div>
        <br>
        <div wire:ignore class="row">

            <div class="col-lg-6 col-md-12 col-sm-12">
                <input type="file" name="paperFile[]" id="test" accept=".pdf,.doc">
                {{-- <div class="custom-file">
                    <input type="file" name="paperFile[]" class="custom-file-input" id="uploadfiles" />
                </div> --}}
            </div>
        </div>
        <hr>

        <div class="flex justify-between items-center mt-4">
            <div class=" mt-6">
                <button wire:click="store" type="button" class="btn btn-primary">
                    Submit
                </button>
            </div>
        </div>
        <div wire:loading>
            @livewire('general.please-wait')
        </div>
    </div>
    <style>
        ol {
            list-style: auto !important;
        }
    </style>
    <script type="text/javascript">
        const inputElement = document.querySelector('input[id="test"]');
        const pond = FilePond.create( inputElement );
        FilePond.setOptions({
            server:{
                url: '/upload-cv',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            }
        });
    </script>
</div>
