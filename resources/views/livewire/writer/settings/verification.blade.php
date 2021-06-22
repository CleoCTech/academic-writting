<div>
    {{-- A good traveler has no fixed plans and is not intent upon arriving. --}}
    <div class="px-10 my-4 py-6 rounded shadow-xl bg-white w-5/5 mx-auto" wire:poll>
        <button wire:click='settings' type="button" class="btn btn-primary">
            <i style="font-size: 1rem !important;" class="bi bi-arrow-bar-left fa-2x"></i>
           Back
        </button>
        <h2 class="text-2xl text-gray-700 font-bold hover:text-gray-600">
            Id verification
        </h2>
        <hr>
        <div class="mt-2">
            <a class="text-lg text-gray-700 font-bold hover:text-gray-600" href="#">
                Please, upload ONLY 3 photos to this section:
            </a>
            <ol class="ml-5">
                <li class="">ID front</li>
                <li class="">ID back Availability</li>
                <li class="">Your selfie holding the ID.</li>
            </ol>
            <br>
            <p class="mt-2 font-bold text-gray-600">
                The ID's details must be clearly visible. If a photo is blurry - your application will be declined.
            </p>
            <a class="text-lg text-gray-700 font-bold hover:text-gray-600" href="#">
                Note: we accept only NATIONAL IDENTITY CARD.
            </a>
        </div>
        <br>
        <div class="px-4 pt-2 pb-4 bg-white-600 border-t">
            <fieldset>
                <div class=""><label class="text-xs font-medium uppercase text-gray-500 leading-none">Verification variants</label>
                    <div class="">
                        <div class="flex flex-wrap items-center -mx-3">
                            <label for="variant---"
                                class="flex items-center px-3 py-2 "><input id="variant---" type="radio" name="variant"
                                    class="text-gray-500 transition duration-100 ease-in-out border-gray-300 shadow-sm focus:border-blue-500 focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50 focus:ring-offset-0  disabled:opacity-50 disabled:cursor-not-allowed"
                                    value="" checked="checked">
                                    <span class="block ml-3 text-sm font-medium leading-5 text-gray-700 capitalize">
                                    National ID
                                </span>
                            </label>
                            <label for="variant-danger" class="flex items-center px-3 py-2 "><input
                                    value="danger" id="variant-danger" type="radio" name="variant"
                                    class="text-gray-500 transition duration-100 ease-in-out border-gray-300 shadow-sm focus:border-blue-500 focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50 focus:ring-offset-0  disabled:opacity-50 disabled:cursor-not-allowed">
                                <span class="block ml-3 text-sm font-medium leading-5 text-gray-700 capitalize">
                                    Passport
                                </span></label><label for="variant-buttons" class="flex items-center px-3 py-2 "><input
                                    value="buttons" id="variant-buttons" type="radio" name="variant"
                                    class="text-gray-500 transition duration-100 ease-in-out border-gray-300 shadow-sm focus:border-blue-500 focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50 focus:ring-offset-0  disabled:opacity-50 disabled:cursor-not-allowed">
                                <span class=" block ml-3 text-sm font-medium leading-5 text-gray-700 capitalize">
                                    Licence
                                </span></label>
                        </div>
                    </div>
                </div>
            </fieldset>
        </div>
        <div class="flex justify-between items-center mt-4">
            <div class=" mt-6">
                <button wire:click="settings('id-front')" type="button" class="btn btn-primary">
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
