<div>
    {{-- Care about people's approval and you will be their prisoner. --}}
    <div class="px-10 my-4 py-6 rounded shadow-xl bg-white w-5/5 mx-auto" wire:poll>
        <button wire:click='settings' type="button" class="btn btn-primary">
            <i style="font-size: 1rem !important;" class="bi bi-arrow-bar-left fa-2x"></i>
           Back
        </button>
        <h2 class="text-2xl text-gray-700 font-bold hover:text-gray-600">
            Education verification
        </h2>
        <hr>
        <div class="mt-2">
            <p class="text-lg text-gray-700 font-bold hover:text-gray-600">
                Please, upload both a PDF format of your certificate and a photo of you holding it to this section:
            </p>
            <p class="text-lg text-gray-700 font-bold hover:text-gray-600">
                All of the files MUST have appropriate names.
            </p>
            <p class="text-md text-gray-700 font-bold">For example:</p>
            <ol class="ml-5">
                <li class="">diploma_PDF;</li>
                <li class="">selfie_diploma;</li>
            </ol>
            <br>
            <p class="mt-2 font-bold text-gray-600">
                TThe certificate details must be clearly visible. If a photo is blurry - your application will be declined.
            </p>
        </div>
        <hr>
        <div class="flex justify-between items-center mt-4">
            <div class=" mt-6">
                <button wire:click="settings('upload-cert')" type="button" class="btn btn-primary">
                    Begin
                    <i style="font-size: 2rem !important;" class="fas fa-arrow-right fa-3x"></i>
                </button>
                {{-- <input type="button" name="next" id="next" value="Next" class="p-3 rounded-lg bg-purple-600 outline-none text-white shadow justify-center focus:bg-purple-700 hover:bg-purple-500">
                <span class="float-right"><i class="fas fa-arrow-right fa-3x"></i></span> --}}
            </div>
            {{-- <a class="px-2 py-1 bg-blue-600 text-gray-100 font-bold
             rounded hover:bg-gray-500 hover:underline" href="#">Start Application</a> --}}

        </div>

    </div>
    <style>
        ol{
            list-style:auto !important;
        }
    </style>
</div>
