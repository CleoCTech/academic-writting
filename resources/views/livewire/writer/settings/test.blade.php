<div>
    {{-- A good traveler has no fixed plans and is not intent upon arriving. --}}
    <div class="px-10 my-4 py-6 rounded shadow-xl bg-white w-5/5 mx-auto">
        <button  wire:click="settings('')" type="button" class="btn btn-primary">
            <i style="font-size: 1rem !important;" class="bi bi-arrow-bar-left fa-2x"></i>
           Back
        </button>
        <h2 class="text-2xl text-gray-700 font-bold hover:text-gray-600">
            Test
        </h2>
        <hr>
        <div class="mt-2">
            <a class="text-lg text-gray-700 font-bold hover:text-gray-600" href="#">
                Instructions:
            </a>
            <ol class="ml-5">
                <li class="">In order to finish the application process, please complete a short sample essay (1-page, 275 words, plagiarism free). The topic of the essay will be available on the next step.
                   <span class="font-bold"> Please note that it is time-limited: you will have 20 minutes.</span></li>
                <li class="">There will be only one attempt to submit the essay.</li>
                <li class="">All the application information has been saved. You may get back to this page later on. You will need to login to your personal account and start writing your sample essay when it is convenient for you.</li>
                <li class="">Are you ready now? Press “Start writing essay” button and show us your outstanding writing skills.</li>
            </ol>
        </div>
        <br>

        <div class="row">
            <div class="col-md-8">
                <div class="px-4 pt-2 pb-4 bg-orange border-t" style="background-color: rgba(224,52,18,.1) !important; color: rgba(224,52,18,.5); border-color:rgba(224,52,18,.5);">
                    <div class="bg-orange-lightest border-l-4 border-orange text-orange-dark p-4" role="alert">
                        <p class="font-bold">Attention!</p>
                        <p>You have only one attempt to pass the test, otherwise your account will be disabled</p>
                    </div>
                </div>
            </div>
            <div class="col-md-2">
                <svg width="181px" height="133px" viewBox="0 0 181 133" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                    <title>Arrow</title>
                    <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" stroke-linecap="square">
                        <g class="svg-main-color" id="registration_step3" transform="translate(-883.000000, -373.000000)" stroke="#4DA950">
                            <path d="M883,374 C938.863157,371.397702 981.93755,382.71173 1012.22318,407.942083 C1042.50881,433.172436 1058.43568,465.621103 1060.00378,505.288086" id="Line-2"></path>
                            <path id="Line-2-decoration-1" d="M1056.57951,494.615018 L1060.00378,505.288086 L1062.57483,494.378012"></path>
                        </g>
                    </g>
                </svg>
            </div>
        </div>
        <div class="mt-5 text-right md:space-x-3 md:block flex flex-col-reverse">
            <button wire:click="settings('test-begin')" type="button" class="btn btn-primary">
                Begin writing the essay
                <i style="font-size: 2rem !important;" class="fas fa-arrow-right fa-3x"></i>
            </button>
            {{-- <input type="button" name="next" id="next" value="Next" class="p-3 rounded-lg bg-purple-600 outline-none text-white shadow justify-center focus:bg-purple-700 hover:bg-purple-500">
            <span class="float-right"><i class="fas fa-arrow-right fa-3x"></i></span> --}}
        </div>
        <div wire:loading>
            @livewire('general.please-wait')
        </div>
    </div>
    <style>
        ol{
            list-style:auto !important;
        }
    </style>
</div>
